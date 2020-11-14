<?php
namespace ThemeMountain {
	/**
	 * All the methods and properties used for shortcodes including those for Visual Composer.
	 *
	 * This class is used even if VC is not active.
	 *
	 * @package ThemeMountain
	 * @subpackage Core/tm-plugin
	 * @since 1.0
	 */
	class TM_Shortcodes {
		/**
		 * Configuration Properties
		 *
		 * @since      1.0
		 * @access     public
		 */
			/**
			 * Cache of plugin_dir_path()
			 *
			 * @var        string 	Set in the constructor.
			 */
			public static $local_plugin_dir;

			/**
			 * Cache of plugins_url()
			 *
			 * @var        string	Set in the constructor.
			 */
			public static $local_plugin_dir_uri;

		/**
		 * Row Manager runtime registers
		 *
		 * @since      1.0
		 * @access     private
		 */
			/**
			 * Current Hiearchy Level of row.
			 *
			 * @var        integer
			 */
			private static $row_level = 0;

			/**
			 * Row settings register.
			 *
			 * @var        array 	array with its index as the hierarchy level. The value holds key arrays with respecting settings on each level.
			 */
			private static $vc_row_settings_to_inherit = array();

			/**
			 * Column settings register.
			 *
			 * The index is row level which is pushed / popped every row level. The value is current column stack number.
			 *
			 * @var        integer
			 */
			private static $column_stacks = array();

			/**
			 * Column settings runtime register.
			 *
			 * @var        array 	array with its index as the row hierarchy level. The next index (integer) is the stack level. The value holds key arrays with respecting settings on each stack.
			 */
			private static $vc_column_settings_to_inherit = array();


		/**
		 * CSS Output Manager runtime registers
		 *
		 * @since      1.0
		 * @access     private
		 */
			/**
			 * Counts up the # of random number generator was used
			 *
			 * @var 	   int
			 * @see
			 */
			private static $serial_num_counter = 0;
			private static $serial_num_counter_footer = 0;


			/**
			 * Variable used for enqueuing scripts (defferred output)
			 *
			 * @uses       self::tm_enqueue_script_extended() Enqueue entries.
			 * @uses       self::tm_add_defer_attribute_to_enqueue_script() Adds defer attributes to enequeued scripts.
			 *
			 * @var        array 	Key array with its key as the handle of enqueue and attributes in its value.
			 */
			private static $defferred_enqueue_scripts = array();

			/**
			 * Holder of CSS of TM shortcode elements to print in the foot.
			 *
			 * @var        array 	Numbered array with css statement in its value.
			 */
			private static $tm_shortcode_elements_inline_styles_head = array();

			/**
			 * Caches page content with the_content filter applied.
			 * Triggered for singular pages only. For FUD Workaround.
			 *
			 * @var        string 	Cached page content.
			 */
			private static $tm_advanced_content_cache = '';

			/**
			 * Flag for Caches page content with the_content filter applied.
			 *
			 * @var        boolean 	TRUE if CSS enqueuing has been done.
			 */
			public static $enquque_deferred_style_in_footer = TRUE;

		/**
		 * img srcset custom sizes
		 *
		 * @since      1.0.1
		 * @access     private
		 */
			/**
			 * Holds custom srcset mode.
			 *
			 * @since 1.0.1
			 * @access private
			 * @uses       self::tm_custom_image_sizes()
			 * @see        self::tm_custom_image_sizes()
			 *
			 * @var        string
			 */
			private static $tm_custom_image_sizes_mode = '';

		/**
		 * END Properties
		 */

		/**
		 * Constructor
		 *
		 * @param      array  $_class_settings  The class settings
		 */
		public function __construct( $_class_settings = array () ) {
			/** Set cache of plugin dir variables */
			self::$local_plugin_dir = $_class_settings['local_plugin_dir'];
			self::$local_plugin_dir_uri = $_class_settings['local_plugin_dir_uri'];
			/** Fallback in case that Visual Composer is not activated. */
			add_action( 'plugins_loaded', array('ThemeMountain\\TM_Shortcodes','plugins_loaded'));

			/** Filter and action hooks for front end */
			if(!is_admin()) {
				/** custom srcset size */
				add_filter( 'wp_calculate_image_sizes', ['ThemeMountain\\TM_Shortcodes','tm_custom_image_sizes'], 10 , 2 );
				/**  Print defferred enqueue scripts */
				add_filter( 'script_loader_tag' , array('ThemeMountain\\TM_Shortcodes', 'tm_add_defer_attribute_to_enqueue_script'), 10, 2);
				/** Stray p tag workaround. Add TM's own instead */
				add_filter( 'the_content', ['ThemeMountain\\TM_Shortcodes','fix_shortcode_stray_p_tag'], 200 );
			}

			/** FUD Workaround */
			add_filter( 'get_header', ['ThemeMountain\\TM_Shortcodes','enqueue_fud_workarounds'] );
		}

		/**
		 * Public methods for hooks and filters
		 *
		 * @since      1.0
		 * @access     public
		 */

		/**
		 * Call fallback method in case Visual Composer is not activated.
		 *
		 * @uses       plugins_loaded action hook
		 * @uses       TM_Shortcodes::$local_plugin_dir
		 * @uses       TM_Shortcodes::add_fallback_shortcodes()
		 */
		public static function plugins_loaded () {
			/**
			 * VC shortcodes are added as fallback only if VC is not activated.
			 * If VC is activated, VC will take care of it.
			 */
			if (!class_exists( 'Vc_Manager' )) {
				self::add_fallback_shortcodes(self::$local_plugin_dir ."visual_composer/vc_shortcodes/*.php",'vc_fallback_shortcodes');
			}
		}

		/**
		 * Adds fallback shortcodes.
		 *
		 * @uses       add_shortcode()
		 * @see        TM_Shortcodes::plugins_loaded()
		 *
		 * @param      string $target_dir_path Shortcode path to scan.
		 * @param      string $callback_functon_name Callback function name.
		 */
		private static function add_fallback_shortcodes ($target_dir_path,$callback_functon_name) {
			$_files = glob( $target_dir_path , GLOB_BRACE );
			foreach ( $_files as $_file_path ) {
				$_tagname = basename( $_file_path , ".php" );
				add_shortcode($_tagname, array('ThemeMountain\\TM_Shortcodes',$callback_functon_name));
			}
		}

		/**
		 * Wrapper method to include a php file for particular shortcode registered as VC elements.
		 *
		 * @uses       TM_Shortcodes::$local_plugin_dir
		 * @see        TM_Shortcodes::add_fallback_shortcodes()
		 * @see        add_shortcode(), do_shortcode_tag(), pre_do_shortcode_tag()
		 *
		 * @param      array   $atts     The attributes
		 * @param      string  $content  The content
		 * @param      string  $tagname  The tagname
		 */
		public static function vc_fallback_shortcodes ( $atts, $content, $tagname ) {
			$_shortcode_file_path = self::$local_plugin_dir ."visual_composer/vc_shortcodes/{$tagname}.php";
			include($_shortcode_file_path);
		}

		/**
		 * Wrapper method to include a php file for particular ThemeMountain Content Shortcodes.
		 *
		 * @uses       TM_Shortcodes::$local_plugin_dir
		 * @see        TM_Shortcodes::add_fallback_shortcodes()
		 * @see        add_shortcode(), do_shortcode_tag(), pre_do_shortcode_tag()
		 *
		 * @param      array   $atts     The attributes
		 * @param      string  $content  The content
		 * @param      string  $tagname  The tagname
		 */
		public static function tm_fallback_shortcodes ( $atts, $content, $tagname ) {
			$_shortcode_file_path = self::$local_plugin_dir ."TM_Shortcodes/shortcodes/{$tagname}.php";
			include($_shortcode_file_path);
		}

		/**
		 * Filter hook function for custom srcset.
		 *
		 * @since 1.0.1
		 * @access public
		 *
		 * @uses       wp_calculate_image_sizes filter hook
		 * @uses       TM_Shortcodes::$tm_custom_image_sizes_mode
		 *
		 * @see        TM_Shortcodes::generate_image_tag_from_id()
		 *
		 * @return     string  ( data attribute declaration )
		 */
		public static function tm_custom_image_sizes ($sizes, $size) {
			$_srcset_size_presets = array(
				/* -2- */
				'grid-2-portrait-normal' => '(min-width: 961px) 50vw, (min-width: 481px) 100vw, 100vw',
				'grid-2-portrait-large' => '(min-width: 481px) 100vw, 100vw',
				'grid-2-landscape-normal' => '(min-width: 961px) 50vw, (min-width: 481px) 100vw, 100vw',
				'grid-2-landscape-large' => '(min-width: 481px) 100vw, 100vw',
				'grid-2-landscape-wide' => '(min-width: 481px) 100vw, 100vw',
				/* -3- */
				'grid-3-portrait-normal' => '(min-width: 1025px) 33.3vw, (min-width: 601px) 50vw, (min-width: 481px) 100vw, 100vw',
				'grid-3-portrait-large' => '(min-width: 961px) 66.6vw, (min-width: 481px) 100vw, 100vw',
				'grid-3-landscape-normal' => '(min-width: 1025px) 33.3vw, (min-width: 601px) 50vw, (min-width: 481px) 100vw, 100vw',
				'grid-3-landscape-large' => '(min-width: 961px) 66.6vw, (min-width: 481px) 100vw, 100vw',
				'grid-3-landscape-wide' => '(min-width: 961px) 66.6vw, (min-width: 481px) 100vw, 100vw',
				/* -4- */
				'grid-4-portrait-normal' => '(min-width: 1141px) 25vw, (min-width: 1025px) 33.3vw, (min-width: 601px) 50vw, (min-width: 481px) 100vw, 100vw',
				'grid-4-portrait-large' => '(min-width: 1141px) 50vw, (min-width: 961px) 66.6vw,
				(min-width: 481px) 100vw, 100vw',
				'grid-4-landscape-normal' => '(min-width: 1141px) 25vw, (min-width: 1025px) 33.3vw, (min-width: 601px) 50vw, (min-width: 481px) 100vw, 100vw',
				'grid-4-landscape-large' => '(min-width: 1141px) 50vw, (min-width: 961px) 66.6vw, (min-width: 481px) 100vw, 100vw',
				'grid-4-landscape-wide' => '(min-width: 1141px) 50vw, (min-width: 961px) 66.6vw, (min-width: 481px) 100vw, 100vw',
				/* -5- */
				'grid-5-portrait-normal' => '(min-width: 1301px) 20vw, (min-width: 1141px) 25vw,
				(min-width: 1025px) 33.3vw, (min-width: 601px) 50vw, (min-width: 481px) 100vw, 100vw',
				'grid-5-portrait-large' => '(min-width: 1301px) 40vw, (min-width: 1141px) 50vw,
				(min-width: 961px) 66.6vw, (min-width: 481px) 100vw, 100vw',
				'grid-5-landscape-normal' => '(min-width: 1301px) 20vw, (min-width: 1141px) 25vw, (min-width: 1025px) 33.3vw, (min-width: 601px) 50vw, (min-width: 481px) 100vw, 100vw',
				'grid-5-landscape-large' => '(min-width: 1301px) 40vw, (min-width: 1141px) 50vw, (min-width: 961px) 66.6vw, (min-width: 481px) 100vw, 100vw',
				'grid-5-landscape-wide' => '(min-width: 1301px) 40vw, (min-width: 1141px) 50vw, (min-width: 961px) 66.6vw, (min-width: 481px) 100vw, 100vw',
				/* -6- */
				'grid-6-portrait-normal' => '(min-width: 1301px) 16.6vw, (min-width: 1141px) 25vw, (min-width: 1025px) 33.3vw, (min-width: 601px) 50vw, (min-width: 481px) 100vw, 100vw',
				'grid-6-portrait-large' => '(min-width: 1301px) 33.3vw, (min-width: 1141px) 50vw,
				(min-width: 961px) 66.6vw, (min-width: 481px) 100vw, 100vw',
				'grid-6-landscape-normal' => '(min-width: 1301px) 16.6vw, (min-width: 1141px) 25vw, (min-width: 1025px) 33.3vw, (min-width: 601px) 50vw, (min-width: 481px) 100vw, 100vw',
				'grid-6-landscape-large' => '(min-width: 1301px) 33.3vw, (min-width: 1141px) 50vw, (min-width: 961px) 66.6vw, (min-width: 481px) 100vw, 100vw',
				'grid-6-landscape-wide' => '(min-width: 1301px) 33.3vw, (min-width: 1141px) 50vw, (min-width: 961px) 66.6vw, (min-width: 481px) 100vw, 100vw',
				);

			if(!empty(self::$tm_custom_image_sizes_mode) && isset($_srcset_size_presets[self::$tm_custom_image_sizes_mode])) {
				return $_srcset_size_presets[self::$tm_custom_image_sizes_mode];
			} else {
				return $sizes;
			}
		}

		/**
		 * Public utils for CSS and scripts enqueue.
		 *
		 * @since      1.0
		 */

		/**
		 * Registers necessary functions for FUD workaround
		 *
		 * @since      1.0
		 */
		public static function enqueue_fud_workarounds () {
			if(is_singular() || is_404()) {
				/* FUD Workaround */
				add_filter( 'wp_enqueue_scripts', ['ThemeMountain\\TM_Shortcodes','get_cached_content'] , 12 );
				/** Print queued CSS declarations */
				add_action( 'wp_enqueue_scripts', array('ThemeMountain\\TM_Shortcodes','tm_enqueue_styles_for_vc_elements'), 80);
				// debug
				// add_action( 'shutdown', function () {
				// 	var_dump(self::$tm_shortcode_elements_inline_styles_head);
				// });
			}
		}

		/**
		 * Queue inline CSS declaration to be printed later as style.
		 *
		 * @since      1.0
		 * @access     public
		 *
		 * @uses       TM_Shortcodes::$tm_shortcode_elements_inline_styles_head		Stores css declarations in array. Key is id and the value is css.
		 * @uses       TM_Shortcodes::$enquque_deferred_style_in_footer
		 * @see        Shortcode files where inline css are queued by using this method.
		 *
		 * @param      string $css		A full CSS declaration including selector and properties.
		 * @param      string $id		Used to identify css declaration. Useful when you want to avoid duplicated declaration.
		 */
		public static function tm_add_inline_css($css, $id = null){
			/* Automatically generate id if not assigned */
			if(is_null($id)) {
				$id = count(self::$tm_shortcode_elements_inline_styles_head);
			}
			/* If enquque_deferred_style_in_footer is set to FALSE enqueue in the header */
			if(self::$enquque_deferred_style_in_footer === FALSE ) {
				self::$tm_shortcode_elements_inline_styles_head[$id] = $css;
			} else if(class_exists('\\ThemeMountain\\TM_StyleAndScripts')) {
				TM_StyleAndScripts::tm_add_inline_css_foot($css);
			}
		}

		/**
		 * Print CSS declarations queued in advance.
		 *
		 * @since      1.0
		 * @access     public
		 *
		 * @uses       TM_Shortcodes::$tm_shortcode_elements_inline_styles_head Stores css declarations in array. Key is id and the value is css.
		 * @see        TM_Shortcodes::tm_add_inline_css()	Queues inline css declaration.
		 */
		public static function tm_enqueue_styles_for_vc_elements (){
			if(!empty(self::$tm_shortcode_elements_inline_styles_head)) {
				$_css = "/* ThemeMountain Theme Plugin CSS Output */\n";
				foreach (self::$tm_shortcode_elements_inline_styles_head as $key => $value) {
					$_css .= html_entity_decode($value)."\n";
				}
				wp_add_inline_style( 'tm-style', $_css);
			}
		}

		/**
		 * Run through content to produce CSS before page loop for FUD workaround
		 */
		public static function get_cached_content () {
			/**
			 * FUD Workaround.
			 * Trigger contents now to buffer content and trigger enqueue styles
			 */

			// init
			$_post_field = '';

			// fetch data
			if(is_404() && class_exists('\\ThemeMountain\\TM_Customizer')){
				$_error_page_type =  TM_Customizer::tm_get_theme_mod('tm_error_page_type');
				$_page_id_to_show =  TM_Customizer::tm_get_theme_mod('tm_error_page_id_to_show');
				if($_error_page_type === 'error_page' && get_post_status($_page_id_to_show) === 'publish') {
					$_post_field = get_post($_page_id_to_show);
				}
			} else if(is_singular()) {
				$_queried_object = get_queried_object();
				if(isset($_queried_object->ID)) {
					$_post_field = get_post($_queried_object->ID);
				}
			}

			if(!empty($_post_field)){
				self::$enquque_deferred_style_in_footer = FALSE;
				self::$tm_advanced_content_cache = apply_filters( 'the_content', $_post_field->post_content );
				self::reset_tm_serial_number();
				self::$enquque_deferred_style_in_footer = TRUE;
			}
		}

		/**
		 * Enqueues scripts with additional attributes to be printed in the footer.
		 *
		 * @since      1.0
		 * @access     public
		 *
		 * @see        tm_map									Used to enqueue google maps api.
		 * @see        ThemeMountain\WP_Widget_tm_contactform 	Used to enqueue google-recaptcha api with "async defer" attributes.
		 *
		 * @param      string  $handle            The handle
		 * @param      string  $url               The url
		 * @param      array   $dependency        The dependency
		 * @param      number  $version           The version
		 * @param      boolean $in_footer         In footer
		 * @param      string  $attribute_to_add  The attribute to add
		 */
		public static function tm_enqueue_script_extended ($handle,$url,$dependency,$version,$in_footer,$attribute_to_add = null) {
			wp_enqueue_script($handle,$url,$dependency,$version,$in_footer);
			if (isset($attribute_to_add) && !array_key_exists($handle, self::$defferred_enqueue_scripts )) {
				self::$defferred_enqueue_scripts[$handle] = $attribute_to_add;
			}
		}

		/**
		 * Filter function for tm_enqueue_script_extended. Adds attributes to those enqueued in self::$defferred_enqueue_scripts.
		 *
		 * @since      1.0
		 * @access     public
		 *
		 * @uses       script_loader_tag filter hook					Filters the HTML script tag of an enqueued script.
		 * @uses       TM_Shortcodes::$defferred_enqueue_scripts		List of enqueued scripts to be deferred.
		 * @see        TM_Shortcodes::tm_enqueue_script_extended()		Enqueues scripts with additional attributes to be printed in the footer.
		 *
		 * @param      string  $tag            The <script> tag for the enqueued script.
		 * @param      string  $handle         The script's registered handle.
		 *
		 * @return     string 	Filtered result.
		 */
		public static function tm_add_defer_attribute_to_enqueue_script ($tag, $handle) {
			if( array_key_exists($handle, self::$defferred_enqueue_scripts )) {
				$tag = str_replace(' src', ' '. self::$defferred_enqueue_scripts[$handle] .' src', $tag);
			}
			return $tag;
		}

		/**
		 * Wordpress Responsive Image (since Wordpress 4.4) related functions
		 *
		 * @since      1.0
		 * @access     public
		 */

		/**
		 * Generate img tag from id.
		 * If the image id is not found in the server or is a string, this method assumes that the id is a URL.
		 *
		 * @uses       wp_get_attachment_image()
		 * @uses       attachment_url_to_postid()
		 *
		 * @param      string|numeric  $image_id         The image identifier
		 *
		 * @return     string  ( returns img tag )
		 */
		public static function generate_image_tag_from_id ( $image_id = '',  $alt = '',  $echo = FALSE, $srcset_sizes_id= FALSE,$is_preloaded=FALSE) {
			/** return if empty */
			if(empty($image_id)) return '';
			/** init local variable */
			$_result = '';
			/**
			 * try to see if the URL (in case of non numeric string)
			 * is available in the server.
			 */
			$_is_locally_avail = (is_numeric($image_id)) ? $image_id : attachment_url_to_postid($image_id);

			/** if locally avail, there should be id */
			if($_is_locally_avail !== 0 && $is_preloaded===FALSE) {
				if($srcset_sizes_id !== FALSE) {
					self::$tm_custom_image_sizes_mode = $srcset_sizes_id;
				}
				$_result = wp_get_attachment_image( $_is_locally_avail, 'full', false);
			} else if($is_preloaded===TRUE) {
				$_result = "<img data-src='{$image_id}' src='data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=' alt='".htmlspecialchars(esc_html($alt))."'>";
			} else {
				/** for all other cases when id is not avail, assume the image id as url */
				$_result = "<img src='{$image_id}' alt='".htmlspecialchars(esc_html($alt))."'>";
			}
			// reset once
			self::$tm_custom_image_sizes_mode = '';
			if($echo === TRUE) {
				echo $_result;
			} else {
				return $_result;
			}
		}

		/**
		 * Find image sizes.
		 *
		 * @see        tm_grids
		 *
		 * @param      string  $image_id         The image identifier
		 *
		 * @return     array
		 */
		public static function find_image_size_from_id ( $image_id = '' ) {
			/** return if empty */
			if(empty($image_id)) return '';
			/** init local variable */
			$_result = '';
			/**
			 * try to see if the URL (in case of non numeric string)
			 * is available in the server.
			 */
			$_is_locally_avail = (is_numeric($image_id)) ? $image_id : attachment_url_to_postid($image_id);

			/** if locally avail, there should be id */
			if($_is_locally_avail !== 0) {
				$_result = wp_get_attachment_image_src( $_is_locally_avail, 'full', false);
				if($_result!==FALSE){
					$_result = array($_result[1],$_result[2]);
				} else {
					$_result = array(640,400);
				}
			} else {
			/** for all other cases when id is not avail, assume the image id as url */
				$_result = array(640,400);
			}
			// reset once
			return $_result;
		}

		/**
		 * Generate and queue a CSS line to show image responsively as backgound of an element.
		 *
		 * @uses       wp_get_attachment_image_srcset()
		 * @uses       TM_Shortcodes::tm_add_inline_css()	Queues inline css declaration.
		 *
		 * @see        vc_shortcodes/tm_fullscreen_presentation_item.php
		 * @see        vc_shortcodes/tm_hero_5.php
		 *
		 * @param      string  $selector  The selector
		 * @param      string  $image_id  The image identifier
		 */
		public static function enqueue_css_bkg_img_by_id( $selector, $image_id = '' ) {
			if(empty($selector) || empty($selector)) return '';
			// local id is set to $_is_locally_avail if the image is available on the local server.
			$_is_locally_avail = (is_numeric($image_id)) ? $image_id : attachment_url_to_postid($image_id);
			$_css = '';
			/** if locally avail, there should be id (non zero) */
			if($_is_locally_avail !== 0) {
				$_has_original_bkg = FALSE;
				$_img_srcset = wp_get_attachment_image_srcset( $_is_locally_avail, 'full' );
				$_sizes = explode( ", ", $_img_srcset );
				$_prev_size = '';
				foreach( $_sizes as $_size ) {
					// Split up the size string, into an array with [0]=>img_url, [1]=>size
					$_split = explode( " ", $_size );
					if( !isset( $_split[0], $_split[1] ) ) {
						continue;
					}
					$_background_css = $selector.' { background-image: url("' . esc_url( $_split[0] ) . '") }'."\n";
					// Grab the previous image size as the min-width and/or add the background css to the main css string
					if( $_has_original_bkg === TRUE) {
						$_breakpoint_size = str_replace( "w", "", $_split[1] );
						if($_breakpoint_size - 256 > 0) {
							$_breakpoint_size = ($_breakpoint_size - 256).'px';
						} else {
							$_breakpoint_size = 256;
						}
						$_css .= '@media only screen and (max-width: ' . $_breakpoint_size . ') {';
						$_css .= $_background_css;
						$_css .= "}\n";
					} else {
						$_css .= $_background_css;
					}
					// Set the current image size as the "previous image" size, for use with media queries
					$_has_original_bkg  = TRUE;
				}
			} else if(is_string($image_id)){
				$_css = "{$selector} { background-image: url(".esc_url($image_id).");}";
			}
			// enqueue CSS
			if ( $_css !== '' ) self::tm_add_inline_css($_css);
		}

		/**
		 * Generate image as attributes for Timber framework
		 *
		 * @param      string  $image_id         The image identifier
		 * @param      boolean $parallax         Is parallax or not
		 * @return     string  $_output_attr	 Attributes
		 */
		public static function get_image_attributes_by_id ( $image_source = 'image_id', $image_id = '' , $image_url = '', $parallax = FALSE ) {
			// if($image_id === '' && $image_url === '') return '';
			// local variables
			$_output_attributes = '';
			$_regular_image_attr_name = ($parallax == TRUE) ? 'data-src' : 'href';
			if($image_source === 'image_id' && $image_id !== '' ){
				// get image info
				$_image_full = wp_get_attachment_image_src ( $image_id, 'full' );
				// regular image
				if($_image_full[1] > 1024 || $_image_full[2] > 1024) {
					$_image_large = wp_get_attachment_image_src ( $image_id, 'large' );
					$_output_attributes = " {$_regular_image_attr_name}='{$_image_large[0]}'";
					$_output_attributes .= " data-retina='{$_image_full[0]}'";
				} else {
					$_output_attributes = " {$_regular_image_attr_name}='{$_image_full[0]}'";
				}
			} else if($image_url !== '') {
				$image_url = esc_url($image_url);
				$_output_attributes = " {$_regular_image_attr_name}='{$image_url}'";
			}
			if ( $_output_attributes !== '' ) {
				return $_output_attributes;
			}
		}

		/**
		 * Row Manager. Content output section.
		 *
		 * All the shortcode must use TM_Shortcodes::output_shortcode_content() method to output shortcode
		 * so that rows and columns and section blocks are printed according to the layout specification of ThemeMountain Timber CSS Framework.
		 *
		 * About the type of shortcode
		 *
		 * 		Inline Element			inline			Inline elements are those output are they are with out div.
		 * 												row>div.column wrapping except when they are the only one under the parent vc_row.
		 * 		Section Element			section			Section elements are those wrapped with div.row.setcion-block.
		 * 												Inherits settings (background color or image) from parent vc_row.
		 * 												- When the section element is the only element wrapped under the parent vc_row,
		 * 													the mark up will be .div.section-block.elementClassName-x
		 * 												- If the parent vc_row holds more than 2 elements,
		 * 													the section element will be once wrapped with the parent vc_row.
		 * 		Holder Element			holder			Holder elements are those wrapped with div.row.setcion-block.
		 * 												They are idential to Section elements but they accompany with
		 * 												their child Holder Item elements.
		 * 		Inline Holder Element	inline_holder	Parent of holder item but treated as an inline element.
		 * 		Holder Item Element		holder_item		Through output. These cannot exist without its parent Holder element.
		 * 		Thru					thru			Through output.
		 * 		Layout Element			row, column
		 * 		Shortcode element		shortcode		Those for shortcode only.
		 * 		Hero Section Element	hero_section	Same as Holder Element which skips column output. Named differently to distinguish.
		 * 		Grid Section Element	grid_section	Same as Holder Element which skips column output. Named differently to distinguish.
		 * 		Grid Section Element	vfx_section		Same as Holder Element which skips column output. Named differently to distinguish.
		 * 		Map Section Element		map_section		Same as Holder Element which skips column output. Named differently to distinguish.
		 */

		/**
		 * Outputs shortcode content.
		 *
		 * @since      1.0
		 * @access     public
		 *
		 * @uses       TM_Shortcodes::wrap_with_row()
		 * @uses       TM_Shortcodes::wrap_with_column()
		 * @uses       TM_Shortcodes::tm_do_shortcode()
		 * @uses       TM_Shortcodes::tm_serial_number()
		 *
		 * @param      string  $type        The type. See above comment.
		 * @param      string  $content     The content
		 * @param      string  $settings  The row settings with keys as attribute names.
		 * @param      string  $data_attributes
		 * @param      array   $attributes  The attributes with keys as attribute names.
		 */
		public static function output_shortcode_content(
			$type, $content, $additional_class = '',$data_attributes = '', $attributes = array()
		) {
			/** settings */
			if(isset(self::$vc_row_settings_to_inherit[self::$row_level])) {
				$_current_row_settings = self::$vc_row_settings_to_inherit[self::$row_level];
				$_has_single_tm_element = $_current_row_settings['has_single_tm_element'];
				$_has_vc_rows = $_current_row_settings['has_vc_rows'];
			} else {
				$_current_row_settings = array();
				$_has_single_tm_element = FALSE ;
				$_has_vc_rows = FALSE;
			}
			/** type */
			switch ($type) {
				case 'section':
				case 'holder':
				case 'hero_section':
				case 'grid_section':
				case 'vfx_section':
				case 'map_section':
				case 'feature_section':
					/**
					 * Local id has the priority over the row settings when the element is single.
					 */
					if($_has_single_tm_element === TRUE && $_has_vc_rows === FALSE) {
						/** the content is a single element */
						/* el_id priority */
						if(isset($attributes['el_id']) && $attributes['el_id'] !== '') {
							$_el_id = $attributes['el_id'];
						} else {
							$_el_id = $_current_row_settings['el_id'];
						}
						$attributes['el_id'] = $_el_id;

						/* el_class priority */
						if(isset($attributes['el_class']) && $attributes['el_class'] !== '') {
							$_el_class = $attributes['el_class'];
						} else {
							$_el_class = $_current_row_settings['el_class'];
						}
						$attributes['el_class'] = $_el_class;
					}

					/**
					 * section elements are wrapped with column automatically.
					 */
					if($type === 'section') {
						$content = self::wrap_with_column($content,$additional_class,'',array( 'css_id'=>'column_inner'.'-'.TM_Shortcodes::tm_serial_number(),'skip_div_wrap'=>(isset($attributes['skip_div_wrap']) && $attributes['skip_div_wrap'] == TRUE)));
					}

					/**
					 * Use 'skip_row_div' switch to suppress output of div.row by self::wrap_with_row()
					 */
					$content = self::wrap_with_row($content,$additional_class,$data_attributes,$attributes);
					break;
				case 'shortcode':
					/**
					 * Output as it is {content} always
					 */
					/** through output */
					break;
				case 'inline':
				case 'inline_holder':
					/**
					 * Output as it is {content} except when this is the only element within the parent row as div.section-block>div>column{content}
					 */
					if($_has_single_tm_element === TRUE && $_has_vc_rows === FALSE) {
						/** the content is a single element */
						/* el_id priority */
						if(isset($attributes['el_id']) && $attributes['el_id'] !== '') {
							$_el_id = $attributes['el_id'];
						} else {
							$_el_id = $_current_row_settings['el_id'];
						}
						$attributes['el_id'] = $_el_id;

						/* el_class priority */
						if(isset($attributes['el_class']) && $attributes['el_class'] !== '') {
							$_el_class = $attributes['el_class'];
						} else {
							$_el_class = $_current_row_settings['el_class'];
						}
						$attributes['el_class'] = $_el_class;
						/** the content is a single element */
						$content = self::wrap_with_column($content);
						$content = self::wrap_with_row($content,$additional_class,$data_attributes,$attributes);
					} else {
						/** through output */
						// $content = self::tm_do_shortcode($content);
					}
					break;
				case 'column':
					if($_has_single_tm_element === TRUE && $_has_vc_rows === FALSE) {
						/** the content is a single element */
						$content = do_shortcode($content);
					} else {
						$content = do_shortcode($content);
						$content = self::wrap_with_column($content,$additional_class,$data_attributes,$attributes);
					}
					break;
				case 'row':
					if($_has_single_tm_element === TRUE && $_has_vc_rows === FALSE) {
						/** the content is a single element */
						$content = do_shortcode($content);
					} else {
						$content = self::tm_rudementary_p_tag_remover(do_shortcode($content));
						$content = self::wrap_with_row($content,$additional_class,$data_attributes,$attributes);
					}
					/** stop gap fix to remove stray p tag which occasionally appears */
					$content = str_replace("column -->\n</p>", "column -->\n", $content);
					break;
				case 'thru':
				case 'holder_item':
					/** through output */
					break;
			}
			/** Data validation / sanitization are supposed to be done earlier right in the shortcode files */
			echo $content;
		}

		/**
		 * Wrap content string with row
		 *
		 * @since      1.0
		 * @access     private
		 *
		 * @uses       TM_Shortcodes::$vc_row_settings_to_inherit, TM_Shortcodes::$row_level
		 * @uses       TM_Shortcodes::wrap_with_id_attr(), TM_Shortcodes::tm_add_inline_css(), TM_Shortcodes::enqueue_css_bkg_img_by_id()
		 * @see        TM_Shortcodes::output_shortcode_content()
		 *
		 * @param      string  $content           The content
		 * @param      string  $additional_class  The additional class
		 * @param      string  $data_attributes   The data attributes. Taken over from $attributes of TM_Shortcodes::output_shortcode_content().
		 * 											About the attribute properties.
		 * 											- set_font_color			bool	Set to TRUE to use font color.
		 * 											- font_color				string	HEX color code of font color.
		 * 											- clear_all_padding			bool	Clears all section block padding by adding no-padding to div.section-block
		 * 											- padding_class				string	Classes for padding.
		 * 											- columns_on_tablet_class	string	Class defining number of columns on tablet.
		 * 											- use_background			bool	Set to TRUE to use background_color and/or image_id
		 * 											- background_color			string	HEX color code of background color.
		 * 											- image_id					string	ID of image to be used as background image.
		 * 											- equalize					string	Class flex to be added to div.row.
		 * 											- el_class					string	Additional class
		 * 											- el_id						string	Section block ID.
		 * 											- css_id					string	Unique id for the section block.
		 * 											=== Sensor Properties
		 * 											- has_vc_rows				boolean
		 * 											- has_single_tm_element		boolean
		 * 											- has_non_replicable_content	boolean
		 * 											- has_element_with_use_fullscreen_row_false		boolean
		 * 											=== EXTRA Property
		 *											- skip_row_div				boolean	Skips div.row wrapper if set to TRUE.
		 *											- skip_section_block		boolean	Skips div.section-block.replicable-content classes if set to TRUE.
		 * @param      array   $local_settings    The local settings to override $data_attributes.
		 *
		 * @return     string  content data wrapped with row and section block
		 */
		private static function wrap_with_row($content, $additional_class = '', $data_attributes = '', $local_settings=array()) {
			/**
			 * Read settings and merge with local settings. The local settings overrides the ones from row.
			 */
			/** row level */
			$_row_level = self::$row_level;
			/** current column settings. merge settings. */
			if(!isset(self::$vc_row_settings_to_inherit[$_row_level])) {
				echo esc_html__('Please ensure that the Visual Composer content is not broken.','thememountain-plugin');
				return false;
			}
			$_current_settings = array_merge(self::$vc_row_settings_to_inherit[$_row_level],$local_settings);

			/** settings */
			if(isset($_current_settings['skip_section_block']) && $_current_settings['skip_section_block'] === TRUE) {
				$_section_block_class = '';
			} else {
				$_section_block_class = '.section-block';
			}

			/**
			 * Classes
			 */
			/** Padding */
			if($_current_settings['clear_all_padding'] !== '') {
				$_padding_class = ' no-padding';
			} else if(!empty($_current_settings['padding_class'])) {
				$_padding_class = $_current_settings['padding_class'];
			} else {
				$_padding_class = '';
			}

			/** replicable-content */
			if(
				strpos($_current_settings['padding_class'], 'pb-' ) !== FALSE ||
				(isset($_current_settings['skip_section_block']) && $_current_settings['skip_section_block'] === TRUE)
			) {
				$_replicable_content_class = '';
			} else if($_current_settings['has_non_replicable_content'] === FALSE) {
				$_replicable_content_class = ' replicable-content';
			} else {
				$_replicable_content_class = '';
			}
			/** full-width */
			if( $_current_settings['force_fullwidth'] !== '' ) {
				$_full_width_class = ' full-width collapse';
			} else {
				$_full_width_class = '';
			}
			/** tablet */
			$_columns_on_tablet_class = $_current_settings['columns_on_tablet_class'];
			/** equalize (flex class for div.row) */
			$_equalize = $_current_settings['equalize'];
			/** element Class */
			$_el_class = (!empty($_current_settings['el_class'])) ? ' '.$_current_settings['el_class'] : '';
			/** CSS ID */
			$_css_id = $_current_settings['css_id'];
			/** Additional classes from parameter */
			$additional_class = (!empty($additional_class)) ? ' '.$additional_class : '';

			/**
			 * Attributes
			 */
			/** element ID */
			$_el_id = self::wrap_with_id_attr($_current_settings['el_id']);

			/**
			 * Overlay Background Color
			 */
			$_media_overlay = '';
			if($_current_settings['add_overlay']!=='') {
				self::tm_add_inline_css(".{$_css_id} .media-overlay {".TM_Shortcodes::construct_gradient_css($_current_settings['overlay_background_color'],$_current_settings['overlay_background_use_gradient'],$_current_settings['overlay_background_gradient_end_color'],$_current_settings['overlay_background_gradient_angle'])."}");
				$_media_overlay = '<div class="media-overlay"></div>';
			}

			/**
			 * CSS
			 */

			$_has_custom_bkg_padding = FALSE;
			$_has_bkg_image = FALSE;
			/* background color or image */
			if(!empty($_current_settings['use_background'])) {
				// get settings
				if(isset($_current_settings['image_id']) && $_current_settings['image_id']!=='') {
					// background image
					self::enqueue_css_bkg_img_by_id(".{$_css_id}{$_section_block_class}",$_current_settings['image_id']);
					$_has_custom_bkg_padding = TRUE;
					$_has_bkg_image = TRUE;
				} else if(isset($_current_settings['image_url']) && $_current_settings['image_url'] !== '') {
					// background color
					self::tm_add_inline_css(".{$_css_id}{$_section_block_class} { background-image: url( {$_current_settings['image_url']} ); }");
					$_has_custom_bkg_padding = TRUE;
					$_has_bkg_image = TRUE;
				}

				if($_background_color = $_current_settings['background_color']) {
					// background color
					self::tm_add_inline_css(".{$_css_id}{$_section_block_class} {".TM_Shortcodes::construct_gradient_css($_current_settings['background_color'],$_current_settings['background_use_gradient'],$_current_settings['background_gradient_end_color'],$_current_settings['background_gradient_angle'])."}");
					$_has_custom_bkg_padding = TRUE;
				}
			} else {
				// self::tm_add_inline_css(".{$_css_id}{$_section_block_class} { background-color: inherit; }");
			}

			/** $_has_custom_bkg_padding */
			if(
				strpos($_current_settings['padding_class'], 'pt-' ) !== FALSE  &&
				$_has_custom_bkg_padding === TRUE
			) {
				$_has_custom_bkg_padding = ' has-custom-bkg-padding';
			} else {
				$_has_custom_bkg_padding = '';
			}

			// $_has_bkg_image = FALSE;
			if($_has_bkg_image === TRUE) {
				$_has_bkg_image = ' has-bkg-image';
			} else {
				$_has_bkg_image = '';
			}

			/** font color */
			if(!empty($_current_settings['set_font_color'])) {
				$_font_color = $_current_settings['font_color'];
				self::tm_add_inline_css(".{$_css_id}, .{$_css_id} * { color: {$_font_color}; }");
			}

			// treat $_section_block_class
			if($_section_block_class!=='') $_section_block_class = 'section-block ';

			// wrap with row and return
			if($_current_settings['skip_row_div'] === FALSE) {
				return "<div{$_el_id} class='{$_section_block_class}{$_css_id}{$_replicable_content_class}{$_padding_class}{$_has_custom_bkg_padding}{$_has_bkg_image}{$_el_class}{$additional_class}'{$data_attributes}>{$_media_overlay}<div class='row{$_equalize}{$_full_width_class}{$_columns_on_tablet_class}'>{$content}</div></div>";
			} else {
				return "<div{$_el_id} class='{$_section_block_class}{$_css_id}{$_replicable_content_class}{$_padding_class}{$_columns_on_tablet_class}{$_has_custom_bkg_padding}{$_has_bkg_image}{$_el_class}{$additional_class}'{$data_attributes}>{$_media_overlay}{$content}</div>";
			}
		}

		/**
		 * Wrap content string with column
		 *
		 * @since      1.0
		 * @access     private
		 *
		 * @uses       TM_Shortcodes::$vc_column_settings_to_inherit, TM_Shortcodes::$row_level, TM_Shortcodes::$column_stacks
		 * @uses       TM_Shortcodes::wrap_with_id_attr(), TM_Shortcodes::tm_add_inline_css(), TM_Shortcodes::enqueue_css_bkg_img_by_id()
		 * @see        TM_Shortcodes::output_shortcode_content()
		 *
		 * @param      string  $content           The content
		 * @param      string  $additional_class  The additional class
		 * @param      string  $data_attributes   The data attributes
		 * @param      array   $local_settings    The local settings
		 *
		 * @return     string  content data wrapped with column
		 */
		private static function wrap_with_column($content,$additional_class = '',$data_attributes = '',$local_settings=array()) {
			/**
			 * Read settings and merge with local settings. The local settings overrides the ones from column.
			 */
			$_row_level = self::$row_level;

			/** merge column settings */
			$_current_settings = array_merge(self::$vc_column_settings_to_inherit[$_row_level][self::$column_stacks[$_row_level]],$local_settings);

			/**
			 * Settings
			 */
			/** Column styling option. It governs CSS output and markup output. */
			$_boxed = $_current_settings['boxed'];

			/**
			 * Classes
			 */
			/** column styling classes */
			$_translated_width = $_current_settings['translated_width'];
			$_h_text_align = $_current_settings['h_text_align'];
			$_h_text_align_mobile = $_current_settings['h_text_align_mobile'];
			$_v_align = $_current_settings['v_align'];
			$_column_offset = $_current_settings['column_offset'];
			$_column_push = $_current_settings['column_push'];
			$_column_pull = $_current_settings['column_pull'];
			$_horizon_class = $_current_settings['horizon'];
			$_freeze_attributes = (isset($_current_settings['freeze_attributes']) && !empty($_current_settings['freeze_attributes'])) ? $_current_settings['freeze_attributes'] : NULL;
			$_parallax_data_attribute = (isset($_current_settings['parallax_data_attribute']) && !empty($_current_settings['parallax_data_attribute'])) ? $_current_settings['parallax_data_attribute'] : NULL;

			/** animation */
			$animation_data_attribute = $_current_settings['animation_data_attribute'];
			/** data attribute */
			$data_attributes = (!empty($data_attributes)) ? " {$data_attributes}" : '';
			/** element class */
			$_el_class = (isset($_current_settings['el_class']) && !empty($_current_settings['el_class'])) ? ' '.$_current_settings['el_class'] : '';

			/** CSS ID */
			$_css_id = $_current_settings['css_id'];
			/** Switch for div wrap */
			$_skip_div_wrap = (isset($_current_settings['skip_div_wrap'])) ? $_current_settings['skip_div_wrap'] : FALSE;
			/** Additional classes from the parameter */
			$additional_class = (!empty($additional_class)) ? ' '.$additional_class : '';

			/** Attributes */
			$_el_id = self::wrap_with_id_attr($_current_settings['el_id']);

			/**
			 * CSS
			 */
			/**
			 * Overlay
			 */
			if($_current_settings['add_overlay'] !=='' ) {
				$_media_overlay = '<div class="media-overlay"></div>';
				if($_current_settings['overlay_background_color'] !== '' && !empty($_boxed)) {
					self::tm_add_inline_css(".{$_css_id} .box .media-overlay {".TM_Shortcodes::construct_gradient_css($_current_settings['overlay_background_color'],$_current_settings['overlay_background_use_gradient'],$_current_settings['overlay_background_gradient_end_color'],$_current_settings['overlay_background_gradient_angle'])."}");
				} else if ($_current_settings['overlay_background_color'] !== '') {
					self::tm_add_inline_css(".{$_css_id} .media-overlay {".TM_Shortcodes::construct_gradient_css($_current_settings['overlay_background_color'],$_current_settings['overlay_background_use_gradient'],$_current_settings['overlay_background_gradient_end_color'],$_current_settings['overlay_background_gradient_angle'])."}");
				}
			} else {
				$_media_overlay = '';
			}

			/** box color */
			if(!empty($_boxed)) {
				// get settings
				$_box_border_color = $_current_settings['box_border_color'];
				$_box_background_color = $_current_settings['box_background_color'];
				if(!empty($_box_border_color)) {
					self::tm_add_inline_css(".{$_css_id} .box { border-color: {$_box_border_color}; }");
				}
				if(!empty($_box_background_color)) {
					self::tm_add_inline_css(".{$_css_id} .box { background-color: {$_box_background_color}; }");
				}
				// vc_column, if Colum Styling has been sed to boxed or boxed with rounded corners, background img should be added to the box not column #85
				$_background_target = ".{$_css_id}.column > .box";
			} else {
				$_background_target = ".{$_css_id}.column";
			}

			/**
			 * background color or image
			 * @uses string	$_background_target dependent on box color above
			 */
			if(!empty($_current_settings['use_background'])) {
				// get settings
				if(isset($_current_settings['image_id']) && $_current_settings['image_id']!=='') {
					// background image
					self::enqueue_css_bkg_img_by_id($_background_target,$_current_settings['image_id']);
				} else if(isset($_current_settings['image_url']) && $_current_settings['image_url']!=='') {
					// background color
					self::tm_add_inline_css($_background_target." { background-image: url({$_current_settings['image_url']}); }");
				} else if($_background_color = $_current_settings['background_color']) {
					// background color
					self::tm_add_inline_css(".{$_css_id}.column {".TM_Shortcodes::construct_gradient_css($_current_settings['background_color'],$_current_settings['background_use_gradient'],$_current_settings['background_gradient_end_color'],$_current_settings['background_gradient_angle'])."}");
				}
			} else {
				self::tm_add_inline_css(".{$_css_id}.column { background-color: inherit; }");
			}

			/**
			 * Construct output
			 */
			if($_boxed !== '') {
				/** boxed wraps content with boxed div*/
				$_class_attribute = (!empty($_horizon_class) || !empty($_boxed) ) ? " class='{$_boxed}{$_horizon_class} background-cover'" : '';
				$output = "\n<div{$_class_attribute}{$animation_data_attribute}{$_parallax_data_attribute}>\n{$_media_overlay}\n<div>\n{$content}\n</div>\n</div>\n";
				$animation_data_attribute = '';
				$_horizon_class = '';
			} else {
				$_horizon_class = trim($_horizon_class);
				$_parallax_data_attribute = (!empty($_parallax_data_attribute)) ? " data-parallax='{$_parallax_data_attribute}'" : '';
				$_class_attribute = (!empty($_horizon_class)) ? " class='{$_horizon_class}'" : '';
				if($_skip_div_wrap === TRUE){
					$output = "\n{$_media_overlay}\n{$content}\n";
				} else {
					$output = "\n<div{$_class_attribute}{$animation_data_attribute}{$_parallax_data_attribute}>\n{$_media_overlay}\n{$content}\n</div>\n";
				}
			}

			/**
			 * Freeze support
			 */
			if(isset($_freeze_attributes)) {
				$output = "<div class='freeze'{$_freeze_attributes}>{$output}</div>";

			}

			/**
			 * Finalize output
			 *
			 * @var        string
			 */
			$output = "<div class='{$_css_id} column background-cover{$_translated_width}{$_column_offset}{$_column_push}{$_column_pull}{$_v_align}{$_h_text_align}{$_h_text_align_mobile}{$_el_class}{$additional_class}'{$data_attributes}{$_el_id}>\n{$output}\n</div><!-- end tm-column content -->\n";

			/* wrap with column and return */
			return $output;
		}

		/**
		 * Row Manager. Row / Column movement section.
		 *
		 * @since      1.0
		 * @access     public
		 *
		 * @see        vc_row.php, vc_column.php
		 */

		/**
		 * Begin a new row. The $row_level is 1 based.
		 *
		 * @param      array  $settings  The settings
		 */
		public static function one_down_row($settings) {
			/** increment row level */
			self::$row_level ++;
			/*+ Cache settings */
			self::$vc_row_settings_to_inherit[self::$row_level] = $settings;
		}

		public static function one_up_row () {
			/** Erase the column  stack counter */
			if(isset(self::$column_stacks[self::$row_level])) {
				array_pop(self::$column_stacks);
			}

			/** decrement row level */
			self::$row_level --;
		}

		/**
		 * Begins a column. The $column_stacks[$row_level] is 0 based.
		 *
		 * @see        vc_column.php
		 * @param      array  $settings  The settings in a key array.
		 */
		public static function begin_column ($settings){
			/**
			 * Column counter register
			 */
			$_row_level = self::$row_level;
			/** Initiate a new row level and set 0 (the 1st column). */
			if(!isset(self::$column_stacks[$_row_level])) {
				self::$column_stacks[$_row_level] = 0;
			/** Otherwise increment the column stack number */
			} else {
				self::$column_stacks[$_row_level] ++;
			}

			/** Cache Settings to the register */
			self::$vc_column_settings_to_inherit[$_row_level][self::$column_stacks[$_row_level]] = $settings;
		}

		/**
		 * Ends a column
		 * @see        vc_column.php
		 */
		public static function end_column (){
			// var_dump(self::$row_level);
			// var_dump(self::$column_stacks);
		}

		/**
		 * Resets row manager. Called at the end of parent row level.
		 *
		 * @see        vc_row.php
		 */
		public static function reset_row_manager () {
			// reset row settings
			self::$row_level = 0;
			self::$vc_row_settings_to_inherit = array();
			// reset column settings
			self::$column_stacks = array();
			self::$vc_column_settings_to_inherit = array();
		}

		/**
		 * END of Row Manager
		 */

		/**
		 * Public util used in processing shortcode.
		 *
		 * @since      1.0
		 * @access     public
		 */

		/**
		 * Perform do_shortcode without autop.
		 *
		 * @since      1.0
		 *
		 * @uses       do_shortcode(), wpautop()
		 *
		 * @param      string   $content  The content
		 * @param      boolean  $convert  Replace p tags with new line then add a new line at the bottom
		 *
		 * @return     string  Return value of do_shortcode();
		 */
		public static function tm_do_shortcode( $content, $convert = TRUE ) {
			if ( $convert === TRUE ) {
				$content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
			}
			return do_shortcode( shortcode_unautop( $content ) );
		}

		/**
		 * Wrapper of wp_kses with allowed_html prefined.
		 *
		 * @since      1.1
		 * @access     public
		 *
		 * @uses       TM_Shortcodes::tm_wp_kses()
		 *
		 * @param      string  $text_string  The text string
		 * @return     string  Text string treated with TM_Shortcodes::tm_wp_kses().
		 */
		public static function tm_wp_kses ($text_string) {
			$allowed_html = array(
				'a' => array(
					'href' => array(),
					'title' => array()
					),
				'br' => array(),
				'em' => array(),
				'strong' => array(),
				'b' => array(),
				'strike' => array(),
				'span' => array(
					'class' => array()
					),
				);
			return wp_kses($text_string,$allowed_html);
		}

		/**
		 * Wrap id with id='' html attribute syntax.
		 *
		 * @since      1.0
		 *
		 * @param      string  $_id  The id
		 * @return     string  Blank if $id is empty. Otherwise returns $id wrapped with html attribute syntax.
		 */
		public static function wrap_with_id_attr ($id) {
			if($id !== '' && !is_null($id)) {
				return " id='".esc_attr($id)."'";
			} else {
				return '';
			}
		}

		/**
		 * Generate a serial number without duplicates.
		 *
		 * @since 1.0
		 *
		 * @uses       TM_Shortcodes::$serial_num_counter Registers the number of times this function has been used.
		 * @see        shortcodes
		 *
		 * @return     string   serial number with a prefix of "css-"
		 */
		public static function tm_serial_number () {
			if(self::$enquque_deferred_style_in_footer == FALSE) {
				self::$serial_num_counter ++;
				return 'css-head-'.self::$serial_num_counter;
			} else {
				self::$serial_num_counter_footer ++;
				return 'css-foot-'.self::$serial_num_counter_footer;
			}
		}

		/**
		 * Resets a serial number for inline CSS counter.
		 *
		 * @uses       TM_Shortcodes::tm_serial_number().
		 */
		public static function reset_tm_serial_number () {
			self::$serial_num_counter = 0;
		}

		/**
		 * Enqueue googlemaps api.
		 *
		 * Adds api key if set in the admin option automatically.
		 *
		 * @since 1.0.5
		 *
		 * @see        shortcodes, tm_map, tm_hero_5
		 */
		public static function enqueue_googlemaps_api () {
			// init variables
			$_url = '//maps.googleapis.com/maps/api/js?';
			$_parameters = '';
			// get option settings
			$_googlemaps_settings = get_option('tm_googlemaps_settings');
			// conditionals
			if(
				is_array($_googlemaps_settings) &&
				array_key_exists('tm_use_googlemaps_api_key', $_googlemaps_settings) &&
				$_googlemaps_settings['tm_use_googlemaps_api_key'] === 'yes' &&
				array_key_exists('tm_googlemaps_api_key', $_googlemaps_settings)
			) {
				$_parameters = 'key='.$_googlemaps_settings['tm_googlemaps_api_key'];
			} else {
				$_parameters = 'v=3';
			}
			TM_Shortcodes::tm_enqueue_script_extended('google-maps-api',$_url.$_parameters, array(), null, true);
		}

		/**
		 * Builds a query.
		 *
		 * @since      1.0.7
		 *
		 * @see        tm_grid, Visual Composer's Build Query field.
		 *
		 * @param      <string>  $atts   The atts
		 *
		 * @return     array   The query to be used for get_post() WP function.
		 */
		public static function build_query( $grid_items ) {
			$grid_items_array = array();
			$grid_items = explode('|', $grid_items);
			$_force_any_post_type = FALSE;
			if(!empty($grid_items)) {
				foreach ($grid_items as $_key => $_value ) {
					if (substr($_value,  0, strlen('order_by:')) === 'order_by:') {
						$_value = str_replace('order_by:','',$_value);
						$grid_items_array['order_by'] = $_value;
					} else if (substr($_value,  0, strlen('order:')) === 'order:') {
						$_value = str_replace('order:','',$_value);
						$grid_items_array['order'] = $_value;
					} else if (substr($_value,  0, strlen('post_type:')) === 'post_type:') {
						$_value = str_replace('post_type:','',$_value);
						$_post_type = explode(',',$_value);
						if(is_array($_post_type)) {
							$grid_items_array['post_type'] = $_post_type;
						} else if (isset($grid_items_array['post_type'])) {
							$grid_items_array['post_type'] = array_unique(array_merge($grid_items_array['post_type'],$_post_type));
						}
					} else if (substr($_value,  0, strlen('size:')) === 'size:') {
						$_value = str_replace('size:','',$_value);
						$_value = str_ireplace('all','-1',$_value);
						$_value = str_ireplace('All','-1',$_value);
						$grid_items_array['posts_per_page'] = (int) $_value;
						$grid_items_array['numberposts'] = (int) $_value;
						// add post types
						$_post_type = array('post');
						if(!isset($grid_items_array['post_type'])) {
							$grid_items_array['post_type'] = $_post_type;
						} else {
							$grid_items_array['post_type'] = array_unique(array_merge($grid_items_array['post_type'],$_post_type));
						}
				// multiple entries possible for all below
					} else if (substr($_value,  0, strlen('by_id:')) === 'by_id:') {
						// Individual Posts/Pages/Custom Post Types
						$_value = str_replace('by_id:','',$_value);
						$_post__in = explode(',',$_value);
						if(is_array($_post__in)) {
							$_post__in = self::_separate_include_exclude_from_query_id($_post__in);
							if(!empty($_post__in['include'])) $grid_items_array['post__in'] = $_post__in['include'];
							if(!empty($_post__in['exclude'])) $grid_items_array['post__not_in'] = $_post__in['exclude'];
							$_force_any_post_type = TRUE;
						}
					} else if (substr($_value,  0, strlen('author:')) === 'author:') {
						// author
						$_value = str_replace('author:','',$_value);
						$_author__in = explode(',',$_value);
						if(is_array($_author__in)) {
							$_author__in = self::_separate_include_exclude_from_query_id($_author__in);
							if(!empty($_author__in['include'])) $grid_items_array['author__in'] = $_author__in['include'];
							if(!empty($_author__in['exclude'])) $grid_items_array['author__not_in'] = $_author__in['exclude'];
							$_force_any_post_type = TRUE;
						}
				// any taxonomies
					} else if (
						substr($_value,  0, strlen('tax_query:')) === 'tax_query:' ||
						substr($_value,  0, strlen('categories:')) === 'categories:' ||
						substr($_value,  0, strlen('tags:')) === 'tags:'
					) {
						// remove any of those
						$_value = str_replace('tax_query:','',$_value);
						$_value = str_replace('categories:','',$_value);
						$_value = str_replace('tags:','',$_value);
						// prepare. convert into an array.
						$_value = explode(',',$_value);
						$_value = self::_separate_include_exclude_from_query_id($_value);
						// get taxonomies
						// $_vc_taxonomies_types = get_taxonomies( array( 'public' => true ) );
						$_terms_args = array( 'hide_empty' => false, 'include' => array() , 'exclude' => array() );
						// include / excluse
						if(!empty($_value['include'])) $_terms_args['include'] = $_value['include'];
						if(!empty($_value['exclude'])) $_terms_args['exclude'] = $_value['exclude'];
						$_terms_args['hierarchical'] = TRUE;
						$_terms = get_terms($_terms_args);
						$_tax_queries = array();

						/**
						 * Get a condition for each taxonomy / post category
						 */
						foreach ( $_terms as $_term_item ) {
							if ( ! isset( $_tax_queries[ $_term_item->taxonomy ] ) ) {
								$_tax_queries[ $_term_item->taxonomy ] = array(
									'taxonomy' => $_term_item->taxonomy,
									'field' => 'id',
									'terms' => array( $_term_item->term_id ),
									'relation' => 'IN',
									);
							} else {
								array_push($_tax_queries[ $_term_item->taxonomy ]['terms'], $_term_item->term_id);
							}
						}

						/**
						 * Get child terms for each taxonomy / post category
						 */
						if(!empty($_terms) && !empty($_terms_args['include'])) {
							$_tax_queries_child = array();
							/**
							 * Get child terms for each in array 'terms'.
							 */
							foreach ($_tax_queries as $_term_taxonomy_slug => $_term_taxonomy_value) {
								foreach( $_term_taxonomy_value['terms'] as $_parent_term ) {
									$_child_terms = get_term_children($_parent_term,$_term_taxonomy_slug);
									foreach( $_child_terms as $_child_term ) {
										array_push($_tax_queries[$_term_taxonomy_slug]['terms'],$_child_term);
									}
								}
							}
						}
						if(is_array($_tax_queries)) {
							if(!isset($grid_items_array['tax_query'])) {
								$grid_items_array['tax_query'] = array('relation' => 'OR');
							}
							$grid_items_array['tax_query'] = array_merge($grid_items_array['tax_query'],$_tax_queries);
							$_force_any_post_type = TRUE;
						}
					}
				}

				if($_force_any_post_type === TRUE ) {
					$grid_items_array['post_type'] = 'any';
				} else if (!array_key_exists('post_type', $grid_items_array)) {
					$grid_items_array['post_type'] = array('post');
				}

				return $grid_items_array;
			}
		}

		/**
		 * Separate include exclude from query id
		 *
		 * @access     private
		 * @since      1.0.7
		 *
		 * @see        TM_Shortcode::build_query()	This is a method only for build_query().
		 */
		private static function _separate_include_exclude_from_query_id ($query_string) {
			$_result = array('include'=>array(),'exclude'=>array());
			foreach($query_string as $_value) {
				if($_value < 0) {
					array_push($_result['exclude'],abs($_value));
				} else {
					array_push($_result['include'],$_value);
				}
			}
			return $_result;
		}

		/**
		 * Get tm_modal attributes
		 *
		 * @since      1.0.7
		 *
		 * @example    data-content="inline" data-aux-classes="tml-form-modal height-auto" data-toolbar data-modal-mode data-modal-width="500" data-modal-animation="fade" data-lightbox-animation="fade" href="#wordpress-modal-xxx" class="lightbox-link button" data-auto-launch data-launch-delay="1000" data-set-cookie="cookie-modal-xxxx"
		 * @see        shortcodes, tm_aux_button as well as tm_content_button
		 */
		public static function get_modal_attributes ($modalID,$data_aux_classes) {
			/* modal content */
			$_modal_content = get_post_field('post_content',$modalID);
			/* get tm_modal page options */

			$_modal_settinigs = TM_PageOptions::get_page_options($modalID,'tm_modal');
			/* current page id */
			$_pageID = get_the_ID();
			/** individual settings */
			$_tm_modal_width = (isset($_modal_settinigs['tm_modal_width'])) ? $_modal_settinigs['tm_modal_width'] : '500';
			$_tm_modal_content_animation = (isset($_modal_settinigs['tm_modal_content_animation'])) ? $_modal_settinigs['tm_modal_content_animation'] : 'fade';
			$_tm_modal_lightbox_overlay_animation = (isset($_modal_settinigs['tm_modal_lightbox_overlay_animation'])) ? $_modal_settinigs['tm_modal_lightbox_overlay_animation'] : 'fade';
			/** auto modal launch */
			$_tm_modal_auto_launch = (isset($_modal_settinigs['tm_modal_auto_launch']) && $_modal_settinigs['tm_modal_auto_launch'] === 'on') ? ' data-auto-launch' : '';
			$_tm_modal_auto_launch_delay = (isset($_modal_settinigs['tm_modal_auto_launch_delay']) && !empty($_tm_modal_auto_launch)) ?  " data-launch-delay='{$_modal_settinigs['tm_modal_auto_launch_delay']}'" : '';
			$_tm_modal_auto_launch_cookie = (isset($_modal_settinigs['tm_modal_auto_launch_cookie']) && $_modal_settinigs['tm_modal_auto_launch_cookie'] === 'on' && !empty($_tm_modal_auto_launch)) ?  " data-set-cookie='cookie-modal-{$_pageID}'" : " data-delete-cookie='cookie-modal-{$_pageID}'";
			/** custom classes from the option settings */
			$data_aux_classes = (isset($_modal_settinigs['tm_modal_custom_classes']) && !empty($_modal_settinigs['tm_modal_custom_classes'])) ? $data_aux_classes.' '.esc_attr($_modal_settinigs['tm_modal_custom_classes']) : $data_aux_classes;
			/** modal header */
			if (isset($_modal_settinigs['tm_modal_header']) && !empty($_modal_settinigs['tm_modal_header'])) {
				$data_aux_classes = (empty($data_aux_classes)) ? 'with-header' : $data_aux_classes.' with-header';
			}
			/** tm_modal_border_style */
			if (isset($_modal_settinigs['tm_modal_border_style']) && !empty($_modal_settinigs['tm_modal_border_style'])) {
				$data_aux_classes = (empty($data_aux_classes)) ? 'rounded' : $data_aux_classes.' rounded';
			}
			/* tm_modal_auto_close and detect contact form 7 shortcode */
			if(isset($_modal_settinigs['tm_modal_auto_close']) && !empty($_modal_settinigs['tm_modal_auto_close']) && strpos($_modal_content,'[contact-form-7 ') !== FALSE) {
				$data_aux_classes = (empty($data_aux_classes)) ? 'destroy-on-success' : $data_aux_classes.' destroy-on-success';
			}
			/** enqueue modal contents wrapped in id */
			if (class_exists('ThemeMountain\TM_NavMenuServices')) {
				TM_NavMenuServices::enqueue_modal_content_in_footer('wordpress-modal-'.$modalID,$modalID);
			}
			/** return the markup with settings value reflected */
			return " data-content='inline' data-aux-classes='{$data_aux_classes}' data-toolbar data-modal-mode data-modal-width='{$_tm_modal_width}' data-modal-animation='{$_tm_modal_content_animation}' data-lightbox-animation='{$_tm_modal_lightbox_overlay_animation}' href='#wordpress-modal-{$modalID}' {$_tm_modal_auto_launch}{$_tm_modal_auto_launch_delay}{$_tm_modal_auto_launch_cookie}";
		}

		/**
		 * Output mail consent form description
		 *
		 * @see WP_Widget_tm_mailchimp() Class
		 * @see tm_content_mailchimp_form() function for tm_content_mailchimp_form shortcut
		 */
		public static function output_mail_consent_form($echo = FALSE, $checkbox_id = 'checkbox-consent') {
			/** get option value for show_marketing_email_consent_checkbox */
			$_show_marketing_email_consent_checkbox = TM_Admin::tm_admin_option('tm_mailchimp_form_settings','show_marketing_email_consent_checkbox');

			/** reurn immediately if the option is not enabled. */
			if($_show_marketing_email_consent_checkbox !=='yes') return '';

			/** Get all the current settings */
			// Marketing email consent checkbox label
			$_marketing_email_consent_checkbox_label = TM_Admin::tm_admin_option('tm_mailchimp_form_settings','marketing_email_consent_checkbox_label');
			// Privacy policy link
			$_marketing_email_consent_privacy_policy_link = TM_Admin::tm_admin_option('tm_mailchimp_form_settings','marketing_email_consent_privacy_policy_link');
			// Terms of use link
			$_marketing_email_consent_cookie_policy_link = TM_Admin::tm_admin_option('tm_mailchimp_form_settings','marketing_email_consent_cookie_policy_link');
			// Marketing email consent notice
			$_marketing_email_consent_notice = TM_Admin::tm_admin_option('tm_mailchimp_form_settings','marketing_email_consent_notice');

			// defaults
			if($_marketing_email_consent_checkbox_label === FALSE) $_marketing_email_consent_checkbox_label = esc_html__('I give my consent to be emailed about promotions and offers.','thememountain-plugin');
			if($_marketing_email_consent_privacy_policy_link === FALSE) $_marketing_email_consent_privacy_policy_link = '';
			if($_marketing_email_consent_cookie_policy_link === FALSE) $_marketing_email_consent_cookie_policy_link = '';
			if($_marketing_email_consent_notice === FALSE) $_marketing_email_consent_notice = esc_html__('You can unsubscribe at any time.','thememountain-plugin');

			//  See [privacy_link] and [terms_link].
			if(!empty($_marketing_email_consent_notice)){
				// sanitize
				$_marketing_email_consent_notice = esc_html($_marketing_email_consent_notice);
				// process links
				$_links = array();
				if(!empty($_marketing_email_consent_privacy_policy_link)) {
					array_push($_links,'<a href="'.$_marketing_email_consent_privacy_policy_link.'">'.esc_html__( "privacy policy", 'thememountain-plugin' ).'</a>');
				}
				if(!empty($_marketing_email_consent_cookie_policy_link)) {
					array_push($_links,'<a href="'.$_marketing_email_consent_cookie_policy_link.'">'.esc_html__( "terms of use", 'thememountain-plugin' ).'</a>');
				}

				// counter
				$_counter_links = count($_links);

				if(!$_counter_links){
					// no links set. Do nothing.
					$_links_string = '';
				} else if ($_counter_links === 1) {
					// only one link provided
					$_links_string = sprintf(esc_html_x( "See %s.", 'For the Marketing email consent notice when there is only a single link set.', 'thememountain-plugin' ),$_links[0]);
				} else {
					// 2 links
					$_links_string = sprintf(esc_html_x( "See %s and %s.", 'For the Marketing email consent notice when there are 2 links set.', 'thememountain-plugin' ),$_links[0],$_links[1]);
				}

				// add link if needed
				if(!empty($_links_string)){
					$_marketing_email_consent_notice .= ' '.$_links_string;
				}
			}

			$_marketing_email_consent_checkbox_label = esc_html($_marketing_email_consent_checkbox_label);

			// output
			$_html_text =
<<<CONTENT
			<div class="column width-12 form-consent">
				<div class="field-wrapper">
				 	<input id="$checkbox_id" class="form-element checkbox" name="checkbox-consent" type="checkbox" required>
				 	<label for="$checkbox_id" class="checkbox-label consent-checkbox-label">$_marketing_email_consent_checkbox_label</label>
				</div>
				<p class='consent-notice'>
					$_marketing_email_consent_notice
				</p>
			</div>
CONTENT;
			if($echo === TRUE){
				echo $_html_text;
			} else {
				return $_html_text;
			}
		}

		/**
		 * Remove unwanted wraping with p for content.
		 *
		 * @since      1.0
		 *
		 * @return string|null
		 */
		public static function fix_shortcode_stray_p_tag( $content = null ) {
			if ( $content ) {
				$_subject = array(
					'/' . preg_quote( '</div>', '/' ) . '[\s\n\f]*' . preg_quote( '</p>', '/' ) . '/i',
					'/' . preg_quote( '<p>', '/' ) . '[\s\n\f]*' . preg_quote( '<div ', '/' ) . '/i',
					'/' . preg_quote( '<p>', '/' ) . '[\s\n\f]*' . preg_quote( '<section ', '/' ) . '/i',
					'/' . preg_quote( '</section>', '/' ) . '[\s\n\f]*' . preg_quote( '</p>', '/' ) . '/i',
					);
				$_replacement = array('</div>','<div ','<section ','</section>',);
				$content = preg_replace( $_subject, $_replacement, $content );
				return $content;
			}
			return null;
		}

		/**
		 * Rudementary stray p tag remover
		 *
		 * @since 1.0
		 *
		 * @param      string  $content  The content
		 *
		 * @return     string  The content with stray p's stripped
		 */
		public static function tm_rudementary_p_tag_remover ($content) {
			// if there is not <p> and there is only </p>, </p> should not be there
			if(preg_match("/<\/?p[^>]*>/i", $content) === FALSE && strpos($content,'</p>') !== FALSE) {
				$content = str_replace('</p>', '', $content);
			}
			// remove p tags in other suspicious cases.
			$content = preg_replace('/^<\/p>/', '', $content);
			$content = preg_replace('/<p>$/', '', $content);
			$content = str_replace('<p>[', '[', $content);
			$content = str_replace(']</p>', ']', $content);
			$content = str_replace("]\n", ']', $content);
			return $content;
		}


		/**
		 * Try to close tags in a textblock
		 *
		 * @see tm_textblock.php
		 *
		 * @param      string 	$html   The html
		 *
		 * @return     string Tesult
		 */
		public static function try_to_close_tags_in_a_textblock($html) {
			if(preg_match("/^\n<p/i", $html) === FALSE && strpos($html,"</p>\n<") !== FALSE) {
				$html = '<p>'.$html;
			} else if (substr_count($html,'</p>') === 1 && preg_match("/<\/?p[^>]*>/i", $html) === FALSE ) {
				$html = '<p>'.$html;
			}
			return $html;
		}

		/**
		 * Determines if it has html tags.
		 *
		 * @since 1.0
		 *
		 * @param      string   $text_string  The text string to evaluate.
		 *
		 * @return     boolean  True if has html tags, False otherwise.
		 */
		public static function has_html_tags($text_string) {
			if($text_string != strip_tags($text_string)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

		/**
		 * Removes http: and https: from link
		 *
		 * @since 1.0.5
		 *
		 * @param      string $linkURL The original link URL
		 *
		 * @return     string Link url with http: and https: striped.
		 */
		public static function strip_http_and_https_from_link ($linkURL) {
			$linkURL = ltrim($linkURL, 'http:');
			$linkURL = ltrim($linkURL, 'https:');
			return $linkURL;
		}

		/**
		 * Construct background / gradient css
		 *
		 * @param      string	$background_overlay_color
		 * @param      string	$use_gradient
		 * @param      string	$gradient_end_color
		 * @param      string	$gradient_angle
		 *
		 * @return     string
		 */
		public static function construct_gradient_css($background_overlay_color,$use_gradient,$gradient_end_color,$gradient_angle) {
			// default value
			$background_overlay_color = (!empty($background_overlay_color)) ? $background_overlay_color : FALSE;
			// return blank if nothing is set to the background / overlay color
			if($background_overlay_color === FALSE) {
				return '';
			}
			// conditional
			if(!empty($use_gradient)) {
				// gradient
				// default / formating
				$gradient_end_color = (!empty($gradient_end_color)) ? $gradient_end_color : 'transparent';
				$gradient_angle = (!empty($gradient_angle)) ? $gradient_angle.'deg' : '0deg';
				// constract
				return "background-image: linear-gradient({$gradient_angle}, {$background_overlay_color} 0%, {$gradient_end_color} 100%) !important;";
			} else {
				// background color
				return "background-color: {$background_overlay_color};";
			}
		}

		/**
		 * Convert RGB to hex
		 *
		 * @since 1.0
		 *
		 * @see        tm_slider_item
		 *
		 * @param      string  rgb/a OR hex color code
		 *
		 * @return     array   hex color code
		 */
		public static function tm_fromRGBtoHEX ($_input_value) {
			$_result = array ('#000000', 1);
			$_input_value = trim(str_replace(' ', '', esc_attr($_input_value) ));
			if(strpos($_input_value,'rgba') === 0 ) {
				$rgba = sscanf($_input_value, "rgba(%d, %d, %d, %f)");
				$R = $rgba[0];
				$G = $rgba[1];
				$B = $rgba[2];
				$_alpha = $rgba[3];
				$R = dechex($R);
				if (strlen($R)<2)
					$R = '0'.$R;

				$G = dechex($G);
				if (strlen($G)<2)
					$G = '0'.$G;

				$B = dechex($B);
				if (strlen($B)<2)
					$B = '0'.$B;
				if($_alpha == 0) $_alpha = '0.01';
				$_result = array('#' . $R . $G . $B, $_alpha);
			} else if(strpos($_input_value,'#') === 0 ) {
				$_result = array ($_input_value, 1);
			}
			return $_result;
		}

		/**
		 *	END plugin utils
		 */
	}
}