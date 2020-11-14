<?php
namespace ThemeMountain {
	/**
	 * Anything about CSS / Script enqueuing for front end only
	 *
	 * @package ThemeMountain
	 * @subpackage Core
	 * @since 1.0
	 * @uses       TM_ThemeServices
	 */
	class TM_StyleAndScripts extends TM_ThemeMountain {
		/**
		 * Run time variables
		 */

		/**
		 * Stacks google webfonts to be enqueued.
		 *
		 * @since 1.0
		 * @access private
		 * @var        array $enqueue_google_webfonts array('fonts'=>array(),'subsets'=>array());
		 * @uses       TM_StyleAndScripts::enqueueInlineCustomizerCss() Aggrevate google fonts to be used
		 * @see        TM_StyleAndScripts::enqueue_styles_and_scripts() Enqueues google web fonts stacked in this variable.
		 */
		private static $enqueue_google_webfonts = array('fonts'=>array(),'subsets'=>array());

		/**
		 * Stacks inline CSS to be enqueued for the header.
		 *
		 * @since 1.0
		 * @access private
		 * @var        array $tm_customizer_inline_styles_head array('id' => 'css lines');
		 * @uses       TM_StyleAndScripts::tm_add_inline_css_head() Aggrevate inline css lines
		 * @see        TM_StyleAndScripts::tm_print_styles_head() Outputs css lines in the header.
		 */
		private static $tm_customizer_inline_styles_head = array();

		/**
		 * Stacks inline CSS to be enqueued for the header.
		 *
		 * @since 1.0
		 * @access private
		 * @var        array $tm_inline_styles_foot array('id' => 'css lines');
		 * @uses       TM_StyleAndScripts::tm_add_inline_css_foot() Aggrevate inline css lines
		 * @see        TM_StyleAndScripts::tm_print_styles_foot() Outputs css lines in the footer.
		 */
		private static $tm_inline_styles_foot = array();

		/**
		 * Class Constructor Magic Method.
		 *
		 * @since 1.0
		 * @access public
		 */
		public function __construct() {
			/**
			 * Not used in admin. For frontend only.
			 */
			if(!is_admin()) {
				/**
				 * Disable default Contact Form 7 CSS.
				 */
				add_filter( 'wpcf7_load_css', '__return_false' );

				/**
				 *  Disable degault gallery style as we are not using the wp default gallery style.
				 */
				add_filter( "use_default_gallery_style", function () {return false;});

				/**
				 *  Register the wp_enqueue_scripts of the theme
				 */
				add_action('wp_enqueue_scripts', ['ThemeMountain\\TM_StyleAndScripts','enqueue_styles_and_scripts' ] , 11);

				/**
				 * For printing inline css of customizer in the header.
				 * Action added with the lower priority than enqueue_styles_and_scripts() above.
				 */
				add_action('wp_enqueue_scripts', ['ThemeMountain\\TM_StyleAndScripts','tm_enqueue_inline_styles'] , 12);

				/** Print queued CSS declarations */
				add_action('wp_footer', array('ThemeMountain\\TM_StyleAndScripts','tm_enqueue_styles_in_footer'));

				/**
				 * Kirki fallback.
				 * Load google web fonts need to be loaded manually, which Kirki automatically handles when the plugin is active.
				 */
				if ( !class_exists( 'Kirki' ) ) {
					add_action( 'wp_enqueue_scripts', ['ThemeMountain\\TM_StyleAndScripts','tm_enqueue_google_web_fonts'] );
				}
			} else if(get_user_option( 'rich_editing' ) == 'true'){
				add_editor_style(get_template_directory_uri().'/assets/css/admin/editor-style.css');
				add_action( 'tiny_mce_before_init', ['ThemeMountain\\TM_StyleAndScripts','admin_add_editor_styles_google_webdonts'] );
			}
		}

		/**
		 * Public Methods accessible from anywhere
		 */

		public static function enqueue_styles_and_scripts () {
			/**
			 * wp_enqueue_script comment-reply is requried by the Theme-Check plugin.
			 * See : http://codex.wordpress.org/Migrating_Plugins_and_Themes_to_2.7/
			 * Enhanced_Comment_Display#Javascript_Comment_Functionality
			 */
			if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

			/**
			 * Theme Styles CSS files to enqueue
			 */
			$_css_files = TM_ThemeServices::get_current_theme_style_properties('css_files');
			foreach ($_css_files as $_value) {
				wp_enqueue_style(
					$_value[0], // $handle
					$_value[1], // $src
					(isset($_value[2])) ? $_value[2] : array(), // $deps
					(isset($_value[3])) ? $_value[3] : FALSE, // $ver
					(isset($_value[4])) ? $_value[4] : 'all' // $media
				);
			}

			/**
			 * Wordpress default style. Basic requirement.
			 */
			wp_enqueue_style( 'tm-style', get_stylesheet_directory_uri().'/style.css', array(), TM_ThemeServices::$theme_version);

			/**
			 * Theme Styles Javascript files to enqueue
			 */
			$_js_files = TM_ThemeServices::get_current_theme_style_properties('js_files');
			foreach ($_js_files as $_value) {
				wp_enqueue_script(
					$_value[0], // $handle
					$_value[1], // $src
					(isset($_value[2])) ? $_value[2] : array(), // $deps
					(isset($_value[3])) ? $_value[3] : FALSE, // $ver
					(isset($_value[4])) ? $_value[4] : FALSE // $in_footer
				);
			}
		}

		/**
		 * Google Web Fonts Support (fallback in case Kirki is not active)
		 *
		 * @uses       TM_StyleAndScripts::$enqueue_google_webfonts			Stores google fonts information to be enqueued
		 * @uses       TM_StyleAndScripts::tm_get_google_web_fonts_url()	Construct url to request google fonts.
		 * @see        TM_StyleAndScripts::process_and_enqueue_inline_customizer_typography_settings()
		 */
		public static function tm_enqueue_google_web_fonts(){
			if(!empty(self::$enqueue_google_webfonts['fonts'])) {
				wp_enqueue_style( 'tm-google-fonts', self::tm_get_google_web_fonts_url(), array(), '1.0' );
			}
		}
		private static function tm_get_google_web_fonts_url(){
			/**
			 * Subsets
			 */
			$_subsets = '';
			if(!empty(self::$enqueue_google_webfonts['subsets'])){
				$_subsets = '&amp;subset='.implode(',',self::$enqueue_google_webfonts['subsets']);
			}
			/**
			 * font family
			 */
			$_font_family = array();
			foreach (self::$enqueue_google_webfonts['fonts'] as $_key => $_value) {
				$_value = implode(',',$_value);
				array_push($_font_family, $_key.':'.$_value);
			}
			$_font_family = implode('|',$_font_family);

			$font_url = add_query_arg( 'family', urlencode( $_font_family.$_subsets ), "//fonts.googleapis.com/css" );

			return $font_url;
		}

		/**
		 * Enqueue google web fonts css for the post pages
		 *
		 * @param      string  $hook   The hook
		 */
		public static function admin_add_editor_styles_google_webdonts($mceInit){
			$_alt_font_css = '';
			// Enqueue alt font 1
			$_alt_font = self::process_and_enqueue_inline_customizer_typography_settings('tm_alt_font_1',TRUE);
			if(!empty($_alt_font)) {
				$_alt_font_css .= 'html .mceContentBody '.$_alt_font;
			}
			// Alt font 2
			$_alt_font = self::process_and_enqueue_inline_customizer_typography_settings('tm_alt_font_2',TRUE);
			if(!empty($_alt_font)) {
				$_alt_font_css .= 'html .mceContentBody '.$_alt_font;
			}
			// Alt font 3
			$_alt_font = self::process_and_enqueue_inline_customizer_typography_settings('tm_alt_font_3',TRUE);
			if(!empty($_alt_font)) {
				$_alt_font_css .= 'html .mceContentBody '.$_alt_font;
			}

			// enqueue alt google fonts
			if(!empty(self::$enqueue_google_webfonts['fonts'])) {
				add_editor_style(self::tm_get_google_web_fonts_url());
			}

			// enqueue inline css
			if(!empty($_alt_font_css)){
				if(empty($mceInit['content_style'])) $mceInit['content_style'] = '';
				$_alt_font_css = str_replace("\"","'",$_alt_font_css);
				$_alt_font_css = str_replace("\n"," ",$_alt_font_css);
				$mceInit['content_style'] = $_alt_font_css;
			}

			return $mceInit;
		}

		/**
		 * Queue inline CSS declaration to be printed in the head as style.
		 *
		 * @since      1.0
		 * @access     public
		 *
		 * @uses       TM_StyleAndScripts::$tm_customizer_inline_styles_head		Stores css declarations in array. Key is id and the value is css.
		 * @see        Shortcode files where inline css are queued by using this method.
		 *
		 * @param      string $css		A full CSS declaration including selector and properties.
		 * @param      string $id		Used to identify css declaration. Useful when you want to avoid duplicated declaration.
		 */
		public static function tm_add_inline_css_head($css, $id = null){
			if(is_null($id)) {
				$id = count(self::$tm_customizer_inline_styles_head);
			}
			self::$tm_customizer_inline_styles_head[$id] = $css;
		}

		/**
		 * Queue inline CSS declaration to be printed in the footer.php.
		 *
		 * @since      1.0.13
		 * @access     public
		 *
		 * @uses       TM_StyleAndScripts::$tm_shortcode_elements_inline_styles_foot		Stores css declarations in array. Key is id and the value is css.
		 * @see        Shortcode files where inline css are queued by using this method.
		 *
		 * @param      string $css		A full CSS declaration including selector and properties.
		 * @param      string $id		Used to identify css declaration. Useful when you want to avoid duplicated declaration.
		 */
		public static function tm_add_inline_css_foot($css, $id = null){
			if(is_null($id)) {
				$id = count(self::$tm_inline_styles_foot);
			}
			self::$tm_inline_styles_foot[$id] = $css;
		}

		/**
		 * Registers inline css Wordpress's wp_enqueue_style() in the header
		 *
		 * @access     public
		 * @since      1.1
		 */
		public static function tm_enqueue_inline_styles(){
			if(!empty(self::$tm_customizer_inline_styles_head)) {
				$_css = "/* ThemeMountain Theme Customizer CSS Output ".TM_ThemeServices::get_current_theme_style_id()." */\n";
				foreach (self::$tm_customizer_inline_styles_head as $_value) {
					$_css .= html_entity_decode($_value)."\n";
				}
				wp_add_inline_style( 'tm-style', $_css);
			}
		}

		/**
		 * Print CSS declarations queued in advance for deferred output in the footer.
		 *
		 * @since      1.0.13
		 * @access     public
		 *
		 * @uses       TM_StyleAndScripts::$tm_add_inline_css_foot Stores css declarations in array. Key is id and the value is css.
		 * @see        TM_StyleAndScripts::tm_add_inline_css_foot()	Queues inline css declarations.
		 */
		public static function tm_enqueue_styles_in_footer (){
			if(!empty(self::$tm_inline_styles_foot)) {
				/** This script transfers styles inside a script tag with a unique needle to the head */
				wp_enqueue_script( 'tm-deferred-style-support',  get_template_directory_uri().'/assets/js/tm-deferred-style-support.js', array('jquery'), TM_ThemeServices::$theme_version );
				/** Gather all the css accumulated in array */
				wp_localize_script( 'tm-deferred-style-support', 'tm_deferred_css' , self::$tm_inline_styles_foot );
			/**
			 * the above is added to head upon DOM ready by using js to avoid w3c validation errors. w3c does not allow CSS to be present out of <head>.
			 */
			}
		}

		/**
		 * Process customizer field options to enqueue customizer css
		 *
		 * Options requires css_selector array field as well as css to be enququed as inline css.
		 * Otherwise aggravates used fonts into $enqueue_google_webfonts if option type is typography.
		 *
		 * data attributes:
		 *
		 * type				typography or else
		 * do_custom_enqueue 	is set to true : skipped
		 * css_selector		selector. Can be array or string. When there are multiple Selectors are needed.
		 * css				CSS. Can be array or string. CSS can be variated by making it array
		 * 					if necessary when css_selector is array.
		 * default			default value
		 *
		 * 					$_current_value has the current value or default when unset.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @see        TM_TemplateServices::on_template_include() This is a filter hook function for template_include. Current theme style properties are read and enqueued each one of settings defined in the theme style.
		 * @see        TM_ThemeServices::$theme_styles Setting option names and default values are stored in the theme styles. To be entitled to be enqueued, the option names must be enlisted in the theme style config.
		 * @uses       TM_StyleAndScripts::process_and_enqueue_inline_customizer_typography_settings()
		 *
		 * @param      boolean $debug TRUE then print outs option name in css as comment.
		 *
		 */
		public static function enqueueInlineCustomizerCss ( $option_name , $debug = FALSE) {
			// get property
			$_option_type = TM_Customizer::get_theme_mod_field_property($option_name,'type');
			// typography type detection
			if(!isset($_option_type)) {
				echo "Invalid thememod style enqueued: {$option_name}\n";
				return false;
			} else if($_option_type === 'typography' ) {
				self::process_and_enqueue_inline_customizer_typography_settings($option_name,FALSE,$debug);
			} else {
				/**
				 * If do_custom_enqueue is set to true, skip
				 */
				$_do_custom_enqueue = TM_Customizer::get_theme_mod_field_property($option_name,'do_custom_enqueue');
				if($_do_custom_enqueue === TRUE ) {
					return FALSE;
				}
				self::process_and_enqueue_inline_customizer_css_settings($option_name,'',FALSE,$debug);
			}
		}

		/**
		 * Process customizer field options to enqueue customizer font (typography)
		 *
		 * @see        TM_PageFooterServices::preprocess_custom_options_for_page_footer()
		 *
		 * @uses       TM_Customizer::tm_get_theme_mod() Gets ThemeMountain theme mod.
		 * @uses       TM_Customizer::get_theme_mod_field_property() Gets ThemeMountain theme mod property.
		 * @uses       TM_StyleAndScripts::$enqueue_google_webfonts Stacks google web fonts information to be loaded.
		 * @uses       TM_StyleAndScripts::tm_add_inline_css_head() Add inline CSS to be printed in the header.
		 * @uses       TM_StyleAndScripts::_get_font_weight_from_variant()
		 * @uses       TM_StyleAndScripts::_get_font_style_from_variant();
		 *
		 * @param      string  $option_name  The option name
		 * @param      string  $value        The value
		 * @param      boolean  $override_dependency     Set to true to ignore dependencies.
		 * @param      boolean  $debug        The debug
		 */
		public static function process_and_enqueue_inline_customizer_typography_settings ($option_name, $for_enqueueing_google_webfonts = FALSE,$debug = FALSE) {
			$_value = TM_Customizer::tm_get_theme_mod($option_name);
			/** if $_value is not set, return */
			if(!isset($_value)) {
				return FALSE;
			}
			$_target = TM_Customizer::tm_get_theme_mod($option_name.'_target');
			if($_target) {
				$_font_family = $_value['font-family']; (isset($_value['font-family'])) ? $_value['font-family'] : NULL ;
				$_font_family_urlencode = urlencode($_font_family);
				/** this is font-weight but kirki call that way */
				$_font_variant = (isset($_value['variant'])) ? $_value['variant'] : 'regular' ;

				/**
				 * Kirki fallback. Only when Kirki is not present,
				 * Google fonts needs to be loaded manually.
				 */
				if ( !class_exists( 'Kirki' ) || $for_enqueueing_google_webfonts === TRUE) {
					self::enqueue_google_webfonts($_value,$_font_family,$_font_family_urlencode,$_font_variant);
				}
				// Construct CSS
				$_css = $_target.' {'
				.sprintf(
					TM_Customizer::get_theme_mod_field_property($option_name,'css'),
					$_font_family,
					self::_get_font_weight_from_variant($_font_variant),
					(array_key_exists('font-size', $_value)) ? ($_value['font-size']) : '',
					(array_key_exists('line-height', $_value)) ? ($_value['line-height']) : '',
					(array_key_exists('letter-spacing', $_value)) ? ($_value['letter-spacing']) : '',
					(array_key_exists('color', $_value)) ? ($_value['color']) : '',
					self::_get_font_style_from_variant($_font_variant)
					)
				."}\n";
			}
			// output the inline css for the font
			if($for_enqueueing_google_webfonts === TRUE){
				return $_css;
			} else if(!empty($_css)){
				TM_StyleAndScripts::tm_add_inline_css_head($_css);
			}
		}

		/**
		 * Enqueue google webfonts
		 */
		private static function enqueue_google_webfonts($option_value,$font_family,$font_family_urlencode,$font_variant){
			// subsets
			if (isset($option_value['subsets']) && is_array($option_value['subsets'])) {
				foreach($option_value['subsets'] as $option_value ){
					if(!in_array($option_value,self::$enqueue_google_webfonts['subsets'])){
						array_push(self::$enqueue_google_webfonts['subsets'], $option_value);
					}
				}
			}
						// Register font
						// exclude ,serif ,sans-serif
			if( strpos($font_family,',') === FALSE) {
				if(!array_key_exists($font_family_urlencode,self::$enqueue_google_webfonts["fonts"])) {
					self::$enqueue_google_webfonts["fonts"] += array($font_family_urlencode => array());
				}
				array_push(self::$enqueue_google_webfonts["fonts"][$font_family_urlencode], $font_variant);
			}
		}

		/**
		 * Gets the font weight from variant.
		 *
		 * @see       TM_StyleAndScripts::process_and_enqueue_inline_customizer_typography_settings()
		 * @param      String	$original_value  The original value
		 */
		private static function _get_font_weight_from_variant($original_value) {
			$_font_weight = str_replace( 'italic', '', $original_value );
			$_font_weight = ( in_array( $_font_weight, array( '', 'regular' ), true ) ) ? 'normal' : $_font_weight;
			return $_font_weight;
		}
		private static function _get_font_style_from_variant($original_value) {
			if ( strpos( $original_value, 'italic' ) !== FALSE ) {
				$_font_style = 'italic';
			} else if ( strpos( $original_value, 'oblique' ) !== FALSE) {
				$_font_style = 'oblique';
			} else {
				$_font_style = 'normal';
			}
			return $_font_style;
		}

		/**
		 * Process customizer field options to enqueue customizer css
		 *
		 * Note: css_selector property of theme mod field takes 3 forms. string with {, array and string without {. Each behaves differently. See code for info.
		 *
		 * @see        TM_PageFooterServices::preprocess_custom_options_for_page_footer()
		 *
		 * @uses       TM_Customizer::tm_get_theme_mod() Gets ThemeMountain theme mod.
		 * @uses       TM_Customizer::get_theme_mod_field_property() Gets ThemeMountain theme mod property.
		 * @uses       TM_Customizer::evaluate_active_callback() Evaluates Kirki dependency.
		 * @uses       TM_StyleAndScripts::tm_add_inline_css_head() Add inline CSS to be printed in the header.
		 *
		 * @param      string  $option_name  The option name
		 * @param      string  $value        The value
		 * @param      boolean  $override_dependency     Set to true to ignore dependencies.
		 * @param      boolean  $debug        The debug
		 */
		public static function process_and_enqueue_inline_customizer_css_settings ($option_name, $value = '',$override_dependency = FALSE, $debug = FALSE) {
			/** Making sure that the value is set */
			if($value == '') {
				$value = TM_Customizer::tm_get_theme_mod($option_name);
				/** if $value is not set or blank, return */
				if(!isset($value) || $value == '') {
					return FALSE;
				}
			}

			/**
			 * Check for active_callback dependency
			 */
			if(TM_Customizer::evaluate_active_callback($option_name) === FALSE && $override_dependency === FALSE) {
				return FALSE;
			}

			// set $_theme_mod_field
			$_theme_mod_field = TM_Customizer::get_theme_mod_field_property($option_name);

			/**
			 * If css_selector is not set, ignore
			 */
			if(!isset($_theme_mod_field['css_selector'])) {
				return FALSE;
			}

			/**
			 * If the css_selector value is array, the same style is output for each selector.
			 */
			$_css_selector = $_theme_mod_field['css_selector'];
			$_css = '';
			if($debug === TRUE) $_css = "/* {$option_name} */\n";

			/**
			 * Construct CSS
			 */
			if(is_array($_css_selector)) {
				// $_css_selector is an array. There are multiple selectors.
				/** process single css line */
				if(is_string($_theme_mod_field['css'])) {
					$_styles = sprintf($_theme_mod_field['css'],$value);
				}
				foreach ($_css_selector as $_key => $_value) {
					/** accepts array for each css selectors in case it is necessary to deviate the css on each selectors ($_css_selector is array) */
					if(is_array($_theme_mod_field['css'])) {
						$_styles = sprintf($_theme_mod_field['css'][$_key],$value);
					}
					$_css .= $_value.' {'.$_styles."}";
				}
			} else if(strpos($_css_selector,'{') !== FALSE){
				// { is in $_css_selector. css_selector is regarded as a template.
				// Get values and apply to the properties template.
				$_styles = sprintf($_theme_mod_field['css'],$value);
				// Apply the styles into the css selector template
				$_css = sprintf($_css_selector,$_styles);
			} else {
				// $_css_selector is string
				/** accepts string only */
				$_styles = sprintf($_theme_mod_field['css'],$value);
				$_css .= $_css_selector.' {'.$_styles."}";
			}

			TM_StyleAndScripts::tm_add_inline_css_head($_css);
		}

		/**
		 * End
		 */
	}
}