<?php
namespace ThemeMountain {
	/**
	 * Initializes and define configuration to be used for CMB2 Page Options Meta Box.
	 *
	 * When CMB2 is not active, the theme still has an access to the setting values even though users are not able to modify any settings.
	 *
	 * Note: anything to do with admin panel is initialized in the tm_plugin.
	 *
	 * @package ThemeMountain
	 * @subpackage Core/marquez-by-thememountain
	 * @since 1.0
	 * @uses       TM_ThemeServices, CMB2
	 */
	class TM_PageOptions extends TM_ThemeMountain {
		/**
		 * Config Variables
		 */

		/**
		 * Template configs on each post type. Config files are found under assets/page-options/.
		 *
		 * This variables holds all the available page options config for post types and custom page templates.
		 *
		 * @since 1.0
		 * @access protected
		 * @var        array
		 */
		protected static $page_options_config = array();

		/**
		 * Page option presets
		 *
		 * This variable is set to public because page-options file need to access to it.
		 *
		 * @since 1.0
		 * @access protected
		 * @var        array
		 */
		protected static $page_option_presets = array();

		/**
		 * Runtime Cache
		 */

		/**
		 * Caches page options by id.
		 *
		 * Cache can be referred by post id.
		 *
		 * @since 1.0
		 * @access protected
		 * @see        TM_PageOptions::get_page_options()
		 * @var        array (string) page_option_id => (array) options
		 */
		protected static $cache_page_options = array();

		/**
		 * Class Constructor Magic Method.
		 *
		 * @since 1.0
		 * @access public
		 */
		public function __construct() {
			/**
			 * Load page-options for the Page Options.
			 *
			 * The config files have definitions for page options of each available post type such as post, page and tm_folio.
			 */
			parent::locate_template_in_dir('assets/page-options/*.php');

			/**
			 * Initialize Meta Box only if CMB2 is active & the current page is Admin Dashboard page editng page.
			 */
			if(
				defined( 'CMB2_LOADED' ) &&
				(parent::is_pagenow('post.php') == TRUE || parent::is_pagenow('post-new.php') == TRUE)
			) {
				new \CMB2_JW_Fancy_Color();
				new \CMB2_Conditionals();
				new \CMB2_TM_Textarea_Background();
				add_action( 'cmb2_admin_init', ['ThemeMountain\\TM_PageOptions','init_meta_boxes']);
				add_action( 'admin_enqueue_scripts', ['ThemeMountain\\TM_PageOptions','add_scripts_for_tabs'], 10, 1 );
				// removes custom options meta in the latest posts page
				// add_action( 'dbx_post_advanced', ['ThemeMountain\\TM_PageOptions','remove_meta_boxes_in_latest_posts_editor']);
			}
		}

		/**
		 * Public Methods for hooks
		 */

		/**
		 * Initializes meta boxes
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       TM_PageOptions::$page_options_config
		 */
		public static function init_meta_boxes () {
			if( !defined( 'CMB2_LOADED' )  || empty(self::$page_options_config) ) {
				return false;
			}
			foreach( self::$page_options_config as $_post_type => $_value ) {
				// meta_box_config
				$cmb = new_cmb2_box( $_value['meta_box_config'] );
				$_meta_box_fields = self::add_cmb_box_tab($_value['meta_box_fields']);
				// construct metabox with tab
				// meta_box_fields
				foreach( $_meta_box_fields as $_meta_box_field_id => $_meta_box_field_value ) {
					// set default value
					if(isset($_meta_box_field_value['default_alias'])) {
						$_meta_box_field_value['default'] = TM_Customizer::tm_get_theme_mod($_meta_box_field_value['default_alias']);
					} else if(!isset($_meta_box_field_value['default'])) {
						$_theme_mod = TM_Customizer::tm_get_theme_mod($_meta_box_field_id,TRUE);
						if($_theme_mod !== FALSE) {
							$_meta_box_field_value['default'] = $_theme_mod;
						}
					}
					// set meta box field id
					if(!array_key_exists('id', $_meta_box_field_value) || empty($_meta_box_field_value['id'])) {
						$_meta_box_field_value['id'] = $_meta_box_field_id;
					}
					// add to CMB2
					$cmb->add_field( $_meta_box_field_value ) ;
				}
				unset($cmb);
			}
		}

		/**
		 * Removes a meta boxes in the latest posts editor.
		 *
		 * This is kept as a reference here. Now CMB2's show_on_cb attribute function is used to filter out.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @see        TM_TemplateServices::set_current_template_data()
		 * @see        WordPress/wp-admin/edit-form-advanced.php Also see dbx_post_advanced action hook.
		 * @see        _wp_posts_page_notice() of WordPress/wp-admin/includes/template.php Shows the message of "You are currently editing the page that shows your latest posts."
		 */
		public static function remove_meta_boxes_in_latest_posts_editor ($post) {
			$_post_id = $post->ID;
			if ( $_post_id == get_option( 'page_for_posts' ) && empty( $post->post_content ) ) {
				 add_filter('cmb2_show_on',function(){return FALSE;});
			} else {
				return FALSE;
			}
		}

		/**
		 * Enqueue custom JS & CSS for the tab for the CMB2 plugins.
		 *
		 * @since 1.0
		 * @access public
		 */
		public static function add_scripts_for_tabs () {
			wp_enqueue_script('jquery-ui-tabs');
			wp_enqueue_script(  'cmb2-tabs', get_template_directory_uri().'/assets/js/cmb2-tabs.js' , array('jquery-ui-tabs'));
			wp_enqueue_style(  'cmb2-tabs', get_template_directory_uri().'/assets/css/admin/cmb2-tabs.css' );
		}

		/**
		 * Public Methods for accessng from external files.
		 */

		/**
		 * Adds preset option sets to be used for TM_PageOptions::$page_options_config and even for TM_PageOptions::$page_option_presets itself.
		 *
		 * @since 1.0
		 * @access public
		 * @see       TM_PageOptions::$page_options_config, TM_PageOptions::$page_option_presets
		 *
		 * @param      string  $preset_name  The preset name
		 * @param      array  $presets       The presets
		 */
		public static function add_preset_option_sets( $preset_name, $presets ) {
			self::$page_option_presets[$preset_name] = $presets;
		}

		/**
		 * Register page options for a certain post type
		 *
		 * Used in page options definition files under the page-options directory.
		 *
		 * @since 1.0
		 * @access public
		 * @uses       TM_PageOptions::$page_options_config, TM_PageOptions::$page_option_presets
		 *
		 * @param      string   $post_type    post type
		 * @param      array    $config		  Configuration
		 */
		public static function add_page_options_for_post_type ($post_type, $config) {
			self::$page_options_config[$post_type] = $config;
		}

		/**
		 * Get an array of posts.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @param array $args Define arguments for the get_posts function.
		 *
		 * @return array
		 */
		public static function get_posts_list_in_array( $args ) {
			// Get the posts.
			if ( ! isset( $args['suppress_filters'] ) ) {
				$args['suppress_filters'] = false;
			}
			$posts = get_posts( $args );
			// Properly format the array.
			$items = array();
			foreach ( $posts as $post ) {
				$items[ $post->ID ] = $post->post_title;
			}
			wp_reset_postdata();
			if(empty($items)) {
				$items = array('0' => 'None');
			}
			return $items;
		}

		/**
		 * Returns the page options by post id and post type
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       TM_ThemeServices::$page_options_config	This variables holds all the available page options config for post types and custom page templates.
		 * @uses       TM_Customizer::tm_get_theme_mod()
		 * @uses       TM_PageOptions::$cache_page_options Data cache
		 * @see        TM_TemplateServices::get_post_data_at_once()
		 *
		 * @param      integer			$postID             The post id *required
		 * @param      string			$postType           The post type slug. Optional.
		 * @param      string           $pageTemplateSlug   The page template slug. See get_page_template_slug(). Optional.
		 *
		 * @return     array|boolean  The page options. false if template config not found.
		 */
		public static function get_page_options ( $postID,  $postType = '', $pageTemplateSlug = '' ) {
			/**
			 * Return FALSE if $postID is not set.
			 */
			if(empty($postID)){
				return FALSE;
			}

			/* find $postType automatically if set to none */
			if(empty($postType)) {
				$postType = get_post_type($postType);
			}
			if(empty($pageTemplateSlug)) {
				$pageTemplateSlug = get_page_template_slug($postID);
			}

			/*
			 * Page option id is either post type slug Or Page Tempalte Slug
			 * If the page uses custom template, the custom template option is used.
			 */
			$_pageOptionID = (!empty($pageTemplateSlug)) ? $pageTemplateSlug : $postType;

			/**
			 * Returns cache if available.
			 */
			if(array_key_exists($postID, self::$cache_page_options)) {
				return self::$cache_page_options[$postID];
			}

			// check up if the post_type is available
			if( array_key_exists( $_pageOptionID, self::$page_options_config ) ) {
				$_options = array();
				$_meta_box_fields = self::$page_options_config[$_pageOptionID]['meta_box_fields'];
				foreach ( $_meta_box_fields as $_preset_ids ) {
					foreach ( $_preset_ids as $_preset_id ) {
						foreach ( self::$page_option_presets[$_preset_id] as $_option_id => $_fields ) {
							// ignore_this_field is set then skip
							if(array_key_exists('ignore_this_field',$_fields)) continue;
							// get post meta
							$_value = get_post_meta($postID, $_option_id, true);
							/**
							 * If customizer_default_slug set, the default is set to the setting item as the one indicated by
							 * customizer_default_slug.
							 */
							if ( isset($_fields['customizer_default_slug']) && $_value === '' ) {
								// if default is set then set default of customizer when the return value is blank
								$_value = TM_Customizer::tm_get_theme_mod($_fields['customizer_default_slug']);
							} else if( isset($_fields['default']) && $_value === '' ){
								// if default is set then set default when the return value is blank
								$_value = $_fields['default'];
							}
							// set the final outcome
							$_options[$_option_id] = $_value;
						}
					}
				}
				/**
				 * Cache the result once.
				 */
				self::$cache_page_options[$postID] = $_options;
				return $_options;
			} else {
				return false;
			}
		}

		/**
		 * Private Methods
		 */

		/**
		 * Adds a meta box tab.
		 *
		 * Utility functions to support construction of menu data array. $template_config_fields should have either array (field data) or string (Tab title). The 1st in the array must always be string for a title name.
		 *
		 * @since 1.0
		 * @access private
		 *
		 * @param      array    $template_config_fields  The template configuration fields
		 *
		 * @return     array    Data with tab html markups inserted (merged with tab open / closing divs.)
		 */
		private static function add_cmb_box_tab ( $template_config_model = array() ) {
			// set $_tab_id to 1
			$_tab_id = 1;
			// make an empty $_merged_result buffer array
			$_merged_result = array();
			// loop through the original config data (with ids only) to construct something meaningful from presets
			foreach( $template_config_model as $_key => $_value ) {
				$_before_row_closure_tag = ($_tab_id === 1) ? "" : "</div>";
				$_merged_result += array(
					'tm_tab_'.$_tab_id => array (
						'name' => $_key,
						'id'   => 'tab-'.$_tab_id,
						'type' => 'title',
						'before_row' => $_before_row_closure_tag."<div id='tab-{$_tab_id}' class='cmb2-tabs'>",
						'ignore_this_field' => TRUE
						)
					);
				foreach( $template_config_model[$_key] as $_preset_id ) {
					$_merged_result = array_merge($_merged_result, self::$page_option_presets[$_preset_id] );
				}
				// increment $_tab_id
				$_tab_id ++;
			}
			//close final tab
			$_merged_result += array(
				'tm_closing_tab' => array (
					'name'    => 'The Last Field',
					'id'      => 'tab-closure',
					'type'    => 'text',
					'after_row' => '</div>',
					'ignore_this_field' => TRUE
					)
				);
			// return the final result.
			return $_merged_result;
		}

		/**
		 * End
		 */
	}
}