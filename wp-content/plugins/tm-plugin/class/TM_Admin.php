<?php
namespace ThemeMountain {
	/**
	 * CMB Tabbed Theme Options
	 *
	 * @package ThemeMountain
	 * @subpackage theme-plugin
	 * @since 1.0
	 */
	class TM_Admin {
		/**
		 * variables for plugin
		*/
		public static $local_plugin_dir;
		public static $local_plugin_dir_uri;
		public static $plugin_basename;

		/**
		 * Default Option key
		 * @var string
		 */
		private static $key = 'themeMountain_options';

		/**
		 * Array of metaboxes/fields
		 * @var array
		 */
		protected static $option_metabox = array();
		public static $option_metabox_haystack = array();

		/**
		 * Options Page title
		 * @var string
		 */
		protected static $title = '';

		/**
		 * Options Tab Pages
		 * @var array
		 */
		protected static $options_pages = array();

		/**
		 * Cached theme options used in self::tm_admin_option().
		 *
		 * @var        array
		 */
		private static $cached_theme_options = array();

		/**
		 * Constructor
		 * @since 0.1.0
		 */
		public function __construct( $_class_settings = array () ) {
			self::$local_plugin_dir = $_class_settings['local_plugin_dir'];
			self::$local_plugin_dir_uri = $_class_settings['local_plugin_dir_uri'];
			self::$plugin_basename = $_class_settings['plugin_basename'];

			// Set our title
			self::$title = esc_html__( 'ThemeMountain Theme Options', 'thememountain-plugin' );

			// hooks
			add_action( 'admin_init', array( 'ThemeMountain\\TM_Admin', 'init_admin' ) );
			add_action( 'admin_menu', array( 'ThemeMountain\\TM_Admin', 'add_options_page' ) );
			add_filter("plugin_action_links_" . self::$plugin_basename, array('ThemeMountain\\TM_Admin', 'add_settings_link_to_plugin_description'));

			// admin functions
			self::tm_add_rich_editor_to_excerpt_meta();
			self::tm_tag_limiter();
			self::tm_disable_jpeg_compression();
			self::add_image_insert_override();
			self::tm_disable_srcset_support();
		}

		/**
		 * Public getter method for retrieving protected/private variables
		 * @since  0.1.0
		 * @param  string  $field Field to retrieve
		 * @return mixed          Field value or exception is thrown
		 */
		public function __get( $field ) {
			// Allowed fields to retrieve
			switch ($field) {
				case 'key':
					return self::$key;
					break;
				case 'title':
					return self::$title;
					break;
				case 'options_pages':
					return self::$options_pages;
					break;
				case 'option_metabox':
					return self::option_fields();
					break;
			}
			throw new Exception( 'Invalid property: ' . $field );
		}

		/**
		 * Register our setting tabs to WP
		 * @since  0.1.0
		 */
		public static function init_admin () {
			$option_tabs = self::option_fields();
			foreach ($option_tabs as $index => $option_tab) {
				register_setting( $option_tab['id'], $option_tab['id'] );
			}
		}

		/**
		 * Add menu options page
		 * @since 0.1.0
		 */
		public static function add_options_page() {
			$option_tabs = self::option_fields();
			/** loop through and construct the array */
			foreach ($option_tabs as $index => $option_tab) {
				if ( $index == 0) {
					//Link admin menu to first tab
					array_push(self::$options_pages, add_menu_page( self::$title, self::$title, 'manage_options', $option_tab['id'], array( 'ThemeMountain\\TM_Admin', 'admin_page_display' ) ) );
					//Duplicate menu link for first submenu page
					add_submenu_page( $option_tabs[0]['id'], self::$title, $option_tab['title'], 'manage_options', $option_tab['id'], array( 'ThemeMountain\\TM_Admin', 'admin_page_display' ) );
					array_push( self::$option_metabox_haystack, 'toplevel_page_'.$option_tab['id']);
				} else {
					array_push( self::$options_pages, add_submenu_page( $option_tabs[0]['id'], self::$title, $option_tab['title'], 'manage_options', $option_tab['id'], array( 'ThemeMountain\\TM_Admin', 'admin_page_display' ) ) );
					array_push( self::$option_metabox_haystack, 'thememountain_page_'.$option_tab['id'] );
				}
			}
			// for the reset ajax option
			add_action( 'admin_enqueue_scripts', array('ThemeMountain\\TM_Admin','tm_admin_enqueue_scripts') );
		}

		public static function tm_admin_enqueue_scripts ($hook) {
			if($hook == 'thememountain-theme-options_page_tm_advanced_options') {
				wp_enqueue_script( 'tm-admin-custom', self::$local_plugin_dir_uri.'/admin/assets/js/tm_admin_custom.js');
				wp_localize_script( 'tm-admin-custom', 'reset_all_settings_nonce', wp_create_nonce( 'TM_Ajax' ) );
			}
		}

		/**
		 * Admin page markup. Mostly handled by CMB
		 * @since  0.1.0
		 */
		public static function admin_page_display() {
			// compatibility check
			if(!function_exists('cmb2_metabox_form')) {
				echo "<div>CMB2 plugin is required.</div>";
				return false;
			}
			//get all option tabs
			$option_tabs = self::option_fields();
			/** sort by weight */
			usort($option_tabs, function($a, $b) {
				return $a['weight'] - $b['weight'];
			});
			/** tab forms */
			$tab_forms = array();
			?>
			<div class="wrap cmb_options_page <?php echo self::$key; ?>">
				<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

				<!-- Options Page Nav Tabs -->
				<h2 class="nav-tab-wrapper">
					<?php foreach ($option_tabs as $option_tab) :
					$tab_slug = $option_tab['id'];
					$nav_class = 'nav-tab';
					if ( $tab_slug == $_GET['page'] ) {
							$nav_class .= ' nav-tab-active'; //add active class to current tab
							array_push($tab_forms, $option_tab); //add current tab to forms to be rendered
						}
						?>
						<a class="<?php echo $nav_class; ?>" href="<?php menu_page_url( $tab_slug ); ?>"><?php esc_attr_e($option_tab['title']); ?></a>
					<?php endforeach; ?>
				</h2>
				<!-- End of Nav Tabs -->

				<?php foreach ($tab_forms as $tab_form) : //render all tab forms (normaly just 1 form) ?>
				<div id="<?php esc_attr_e($tab_form['id']); ?>" class="group">
					<?php cmb2_metabox_form( $tab_form, $tab_form['id'] ); ?>
				</div>
				<?php endforeach; ?>
			</div>
			<?php
		}

		/**
		 * Defines the theme option metabox and field configuration
		 *
		 * Use Filter "tm_admin_option_option_fields" to modify the option fields array
		 *
		 * @since  1.0
		 * @access     public
		 * @uses        ThemeMountain\WP_ThemeServices::tm_admin_option_option_fields() Theme files have the function to send available theme style names and ids to the admin panel.
		 *
		 * @return     array $option_metabox
		 */
		public static function option_fields() {

			// Only need to initiate the array once per page-load
			if ( ! empty( self::$option_metabox ) ) {
				return self::$option_metabox;
			}

			// load a json file that contains the menu structure.
			require(self::$local_plugin_dir.'admin/option_menu_fields.php');

			// filtered contents will also be cached
			self::$option_metabox = apply_filters('tm_admin_option_option_fields',self::$option_metabox);

			// return the array
			return self::$option_metabox;
		}

		/**
		 * Returns the option key for a given field id
		 * @since  0.1.0
		 * @return array
		 */
		public static function get_option_key($field_id) {
			$option_tabs = self::option_fields();
			foreach ($option_tabs as $option_tab) { //search all tabs
				foreach ($option_tab['fields'] as $field) { //search all fields
					if ($field['id'] == $field_id) {
						return $option_tab['id'];
					}
				}
			}
			return self::$key; //return default key if field id not found
		}

		/**
		 * Admin functions
		 */

		/**
          * Add a direct link to the admin page
          *
          * @param array $links
          * @return array
          */
		  public static function add_settings_link_to_plugin_description($links){
            $settings_link = '<a href="options-general.php?page=tm_general_settings">' . __('ThemeMountain Theme Options','thememountain-plugin') . '</a>';
            array_push($links, $settings_link);
            return $links;
		}

		/**
		 * Add rich editor to excerpt meta
		 *
		 * @since 1.0
		 */
		private static function tm_add_rich_editor_to_excerpt_meta () {
			$thememountain_add_rich_editor_to_excerpt_meta = self::tm_admin_option('tm_general_settings','tm_add_rich_editor_to_excerpt_meta');
			if($thememountain_add_rich_editor_to_excerpt_meta != FALSE) {
				add_action( 'add_meta_boxes', ['ThemeMountain\\TM_ContentShortcode','richtext_excerpt_switch_boxes']);
			}
		}

		/**
		 * Limit the number of tags to be shown.
		 *
		 * @since 1.1
		 *
		 * @uses       Admin settings of tm_post_settings, tm_tags_limit_number. Default is 5. Set to -1 for no limits.
		 *
		 * @param      array $terms Parameter sent from Wordpress
		 */
		private static function tm_tag_limiter () {
			add_action( 'term_links-post_tag', function ($terms) {
				$_tm_tags_limit_number = self::tm_admin_option('tm_post_settings','tm_tags_limit_number');
				if($_tm_tags_limit_number === FALSE) {
					return array_slice($terms,0,5,true);
				} else if($_tm_tags_limit_number == -1 ) {
					return $terms;
				} else {
					return array_slice($terms,0,intval($_tm_tags_limit_number),true);
				}
			});
		}

		private static function tm_disable_jpeg_compression () {
			$thememountain_jpeg_compression = self::tm_admin_option('tm_advanced_options','tm_jpeg_compression');
			if($thememountain_jpeg_compression != FALSE) {
				add_filter('jpeg_quality', function($arg){return 100;});
			}
		}

		private static function add_image_insert_override(){
			$thememountain_jpeg_compression = self::tm_admin_option('tm_advanced_options','tm_disable_image_crop');
			if($thememountain_jpeg_compression != FALSE) {
				add_filter('intermediate_image_sizes_advanced', function($sizes){
					unset( $sizes['thumbnail']);
					unset( $sizes['medium']);
					unset( $sizes['large']);
					return $sizes;
				});
			}
		}

		private static function tm_disable_srcset_support () {
			$thememountain_disable_srcset_support = self::tm_admin_option('tm_advanced_options','tm_disable_srcset_support');
			if($thememountain_disable_srcset_support != FALSE) {
				add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
			}
		}

		/**
		 * Get admin option values.
		 * If settings are not set yet, it returns FALSE instead of default.
		 *
		 * @param      string   $tab    The tab
		 * @param      string   $key    The key
		 *
		 * @return     boolean|mixed	Current option value
		 */
		public static function tm_admin_option ($tab = '',  $key = '') {
			if( !array_key_exists($tab, self::$cached_theme_options) ) {
				self::$cached_theme_options[$tab] = get_option($tab);
			}
			// self::$cached_theme_options[$tab] is false at the initial state
			if(
				is_array(self::$cached_theme_options[$tab]) &&
				array_key_exists($key, self::$cached_theme_options[$tab])
			) {
				return self::$cached_theme_options[$tab][$key];
			} else {
				return FALSE;
			}
		}
	}
}