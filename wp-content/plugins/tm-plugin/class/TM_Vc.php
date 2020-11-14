<?php
/**
 *	tm wp plugin manager class for VC customization
 *
 *	http://thememountain.com
 */
namespace ThemeMountain {
	class TM_Vc {
		/**
		 * variables for plugin
		*/
		public static $local_plugin_dir;
		public static $local_plugin_dir_uri;
		public static $vc_templates = array();

		/**
		 * Variable used for VC
		 */
		public static $vc_elements_variable = array();

		/**
		 * Constructor
		 */
		public function __construct( $_class_settings = array () ) {
			self::$local_plugin_dir = $_class_settings['local_plugin_dir'];
			self::$local_plugin_dir_uri = $_class_settings['local_plugin_dir_uri'];

			/**
			* there is a known bug with stray p tag:
			 * https://core.trac.wordpress.org/ticket/6984
			 * Not valid workaround known so far.
			*/
			// remove_filter('the_content', 'wpautop');

			// backend and front end
			if( is_admin() ) {
				// VC init. Priority is set to 99 to ensure that all the VC scripts are loaded before ours.
				add_action( 'admin_print_scripts-post.php', array('ThemeMountain\\TM_Vc', 'vc_admin_enqueue'),99);
				add_action( 'admin_print_scripts-post-new.php', array('ThemeMountain\\TM_Vc', 'vc_admin_enqueue'),99);
				// Modify
				add_action( 'vc_get_all_templates', array('ThemeMountain\\TM_Vc', 'vc_get_all_templates'));
			} else {
				// remove VC actions and filters
				add_action('init', function() {
					// actions and filters added in VC's init()
					remove_action('wp_head', array(visual_composer(), 'addMetaData'));
					remove_action('wp_head', array(visual_composer(), 'addIEMinimalSupport'));
					remove_filter('body_class', array(visual_composer(), 'bodyClass'));
					remove_filter('the_excerpt', array(visual_composer(), 'excerptFilter'));

					// actions and filters added in VC's initPage()
					// addAllMappedShortcodes is needed for the shortcodes to work.
					// remove_action('template_redirect', array('WPBMap', 'addAllMappedShortcodes'));
					remove_action('wp_head', array(visual_composer(), 'frontCss'));
					remove_action('wp_head', array(visual_composer(), 'addFrontCss'));
					remove_action('template_redirect', array(visual_composer(), 'frontCss'));
					remove_action('template_redirect', array(visual_composer(), 'addNoScript'));
					remove_action('template_redirect', array(visual_composer(), 'frontJsRegister'));
					// tm_shortcode class will take care of it (so that the theme shows correctly even without VC activated.)
					remove_filter('the_content', array(visual_composer(), 'fixPContent'));
				}, 100);
				add_action( 'get_header', array('ThemeMountain\\TM_Vc', 'on_get_header'));
				// We are not using any VC WooCommerce components in the front end
				add_action( 'wp_enqueue_scripts', function () {wp_dequeue_script('vc_woocommerce-add-to-cart-js');}, 99 );
			}

			// vc_before_init is called only if VC is present.
			add_action( 'vc_before_init', array('ThemeMountain\\TM_Vc', 'tm_vc_before_init'));
			// remove default vc elements. Using the action hook to ensure the leam map elements are removed.
			// We are not using this code because of a bug in VC. CSS used instead to hide those elements from the UI.
			//add_action( 'vc_mapper_init_after', array('ThemeMountain\\TM_Vc', 'tm_vc_remove_elements'));
		}

		/**
		 * VC
		 */
		/**
		 * VC init hook
		 * @return [type] [description]
		 */
		public static function tm_vc_before_init() {
			$_tm_vc_set_as_theme = TM_Admin::tm_admin_option('tm_advanced_options','tm_vc_set_as_theme');
			if($_tm_vc_set_as_theme === '1') {
				vc_set_as_theme(TRUE);
			}
			// disable frontend editor
			vc_disable_frontend();
			// we disable auto update
			$vc_manager = \Vc_Manager::getInstance();
			$vc_manager->disableUpdater();
			// VC settings
			vc_set_shortcodes_templates_dir(  self::$local_plugin_dir . 'visual_composer/vc_shortcodes' );
			add_action( 'vc_mapper_init_after',array('ThemeMountain\\TM_Vc','vc_files_to_require_once'));
			add_action( 'vc_enqueue_font_icon_element',array('ThemeMountain\\TM_Vc','vc_icon_element_fonts_enqueue'));
			// remove all the Visual Composer factory default templates
			add_filter( 'vc_load_default_templates', function($templates){return array();} ,11);
			add_filter('vc_nav_front_logo',array('ThemeMountain\\TM_Vc','tm_vc_nav_front_logo'));
			// remove 'animate-css'
			add_action( 'add_meta_boxes', function(){wp_deregister_style('animate-css');} ,11);
			// add tm icon support
			require_once( self::$local_plugin_dir . 'visual_composer/include_php/tm_custom_icons.php' );
		}

		/**
		 * at the timing of get_header hook. just after template_redirect and before wp_enqueue_scripts
		 */
		public static function on_get_header() {
			wp_deregister_script('wpb_composer_front_js');

		}

		/**
		 * Enqueue CSS and js needed for the TM VC customization
		 */
		public static function vc_admin_enqueue () {
			/**
			 * CSS
			 */
			wp_enqueue_style('tm-plugin-admin-css', self::$local_plugin_dir_uri.'/visual_composer/assets/css/js_composer_backend_editor.css',array(),'1.1.6');
			wp_enqueue_style('tm-plugin-admin-css-hide-vc-elements', self::$local_plugin_dir_uri.'/visual_composer/assets/css/js_composer_hide_vc_elements.css',array(),'1.1.6');
			wp_enqueue_style('vc-modal', self::$local_plugin_dir_uri.'/visual_composer/assets/css/vc-modal.css',array(),'1.1.6');

			/**
			 * Javascript Library
			 */
			// requried for tm-composer-custom-template-layouts
			wp_enqueue_script('tm-lazyload',self::$local_plugin_dir_uri . '/visual_composer/assets/js/lazyload.min.js',array('jquery'),NULL,TRUE);
			wp_enqueue_script('tm-isotope',self::$local_plugin_dir_uri . '/visual_composer/assets/js/isotope.js',array('jquery'),NULL,TRUE);
			wp_enqueue_script('tm-marquee',self::$local_plugin_dir_uri . '/visual_composer/assets/js/jquery.marquee.min.js',array('jquery'),NULL);

			/**
			 * Javascript Custom Scripts
			 */
			// For customization related to VC modal
			wp_enqueue_script('tm-composer-custom-element-modal',self::$local_plugin_dir_uri . '/visual_composer/assets/js/composer-custom-element-modal.js',array('vc-backend-min-js'),NULL,TRUE);
			// custom views for VC
			wp_enqueue_script('tm-vc-custom-view',self::$local_plugin_dir_uri . '/visual_composer/assets/js/composer-custom-views.js',array('vc-backend-min-js'),NULL,TRUE);
			// tm_textblock
			wp_enqueue_script('tm-composer-custom-textblock',self::$local_plugin_dir_uri . '/visual_composer/assets/js/composer-custom-views.tm_textblock.js',array('vc-backend-min-js'),NULL,TRUE);
			/** ThemeMountain Template Library - TTL */
			wp_enqueue_script('tm-composer-custom-template-layouts',self::$local_plugin_dir_uri . '/visual_composer/assets/js/composer-custom-template-layouts.js',array('vc-backend-min-js','tm-lazyload','tm-isotope'),NULL,TRUE);

			// Find the current theme id
			if(class_exists('\\ThemeMountain\\TM_ThemeMountain')) {
				/** for layout section / templates */
				wp_localize_script( 'tm-composer-custom-template-layouts', 'layout_sections_dir', 'http://placeholders.thememountain.com/wordpress/'.TM_ThemeMountain::get_theme_id().'/thememountain-layout-library/vc_layout_sections_templates/' );
				/** for layout template (theme) */
				wp_localize_script( 'tm-composer-custom-template-layouts', 'theme_layout_templates_dir', 'http://placeholders.thememountain.com/wordpress/'.TM_ThemeMountain::get_theme_id().'/thememountain-layout-library/vc_layout_templates/' );
				/** for footer layout template (theme) */
				wp_localize_script( 'tm-composer-custom-template-layouts', 'theme_footer_layout_templates_dir', 'http://placeholders.thememountain.com/wordpress/'.TM_ThemeMountain::get_theme_id().'/thememountain-layout-library/vc_footer_layout_templates/' );
				/** for modal layout template (theme) */
				wp_localize_script( 'tm-composer-custom-template-layouts', 'theme_modal_layout_templates_dir', 'http://placeholders.thememountain.com/wordpress/'.TM_ThemeMountain::get_theme_id().'/thememountain-layout-library/vc_modal_layout_templates/' );
				/** current theme slug */
				wp_localize_script( 'tm-composer-custom-template-layouts', 'current_stylesheet', get_option('stylesheet') );
				/** AJAX nonce */
				wp_localize_script( 'tm-composer-custom-template-layouts', 'tm_news_nonce', wp_create_nonce( 'TM_Ajax' ) );
			}


		}

		/**
		 * Modify Default Templates label
		 *
		 * @uses       vc_get_all_templates filter hook of Visual Composer
		 * @see        Vc_Templates_Panel_Editor::getAllTemplates()
		 *
		 * @param      array  $data   The data
		 */
		public static function vc_get_all_templates($data) {
			foreach ($data as $_key => $_value) {
				if($_value['category'] === 'default_templates') {
					$data[$_key]['category_name'] = esc_html__('ThemeMountain Library','thememountain-plugin');
					$data[$_key]['category_weight'] = 9;
					$data[$_key]['category_description'] = '';
					break;
				}
			}
			return $data;
		}

		/**
		 * Enqueue entypo stylesheet
		 */
		public static function vc_icon_element_fonts_enqueue ($font) {
			if ( $font === 'entypo' ) wp_enqueue_style( 'entypo' );
		}

		/**
		 * Removes almost all the VC default elements
		 */
		public static function tm_vc_remove_elements () {
			vc_remove_element ("vc_widget_sidebar");
			vc_remove_element ("vc_wp_search");
			vc_remove_element ("vc_wp_meta");
			vc_remove_element ("vc_wp_recentcomments");
			vc_remove_element ("vc_wp_calendar");
			vc_remove_element ("vc_wp_pages");
			vc_remove_element ("vc_wp_tagcloud");
			vc_remove_element ("vc_wp_custommenu");
			vc_remove_element ("vc_wp_text");
			vc_remove_element ("vc_wp_posts");
			vc_remove_element ("vc_wp_links");
			vc_remove_element ("vc_wp_categories");
			vc_remove_element ("vc_wp_archives");
			vc_remove_element ("vc_wp_rss");
			vc_remove_element ("vc_teaser_grid");
			vc_remove_element ("vc_cta_button");
			vc_remove_element ("vc_message");
			vc_remove_element ("vc_progress_bar");
			vc_remove_element ("vc_pie");
			vc_remove_element ("vc_posts_slider");
			vc_remove_element ("vc_posts_grid");
			vc_remove_element ("vc_images_carousel");
			vc_remove_element ("vc_carousel");
			vc_remove_element ("vc_gallery");
			vc_remove_element ("vc_single_image");
			vc_remove_element ("vc_facebook");
			vc_remove_element ("vc_tweetmeme");
			vc_remove_element ("vc_googleplus");
			vc_remove_element ("vc_pinterest");
			vc_remove_element ("vc_single_image");
			vc_remove_element ("vc_cta_button2");
			vc_remove_element ("vc_gmaps");
			vc_remove_element ("vc_raw_html");
			vc_remove_element ("vc_raw_js");
			vc_remove_element ("vc_flickr");
			vc_remove_element ("vc_empty_space");
			vc_remove_element ("vc_custom_heading");
			vc_remove_element ("vc_toggle");
			vc_remove_element ("vc_cta");
			vc_remove_element ("vc_btn");
			vc_remove_element ("vc_column_text");

			/** 3rd party */
			vc_remove_element ("contact-form-7");

			// new with v 5.0
			vc_remove_element ("vc_section");

			// tta
			vc_remove_element ("vc_tta_tabs");
			vc_remove_element ("vc_tta_tour");
			vc_remove_element ("vc_tta_tabs");
			vc_remove_element ("vc_tta_pageable"); // Pageable container
			vc_remove_element ("vc_tta_accordion"); // accordion
			vc_remove_element ("vc_tta_section");

			vc_remove_element ("vc_text_separator");
			vc_remove_element ("vc_separator");
			vc_remove_element ("vc_round_chart");
			vc_remove_element ("vc_line_chart");
			vc_remove_element ("vc_basic_grid");
			vc_remove_element ("vc_media_grid");
			vc_remove_element ("vc_masonry_grid");
			vc_remove_element ("vc_masonry_media_grid");
			vc_remove_element ("vc_video");
			vc_remove_element ("vc_icon");
			// new with 5.2
			vc_remove_element ("vc_zigzag");
			vc_remove_element ("vc_hoverbox");

			// deprecated
			vc_remove_element ("vc_tabs");
			vc_remove_element ("vc_tour");
			vc_remove_element ("vc_accordion");
			vc_remove_element ("vc_button");
			vc_remove_element ("vc_button2");



		}
		/**
		 * Require class / function files needed for the TM VC customization to work.
		 */
		public static function vc_files_to_require_once () {
			require_once( self::$local_plugin_dir . 'visual_composer/include_php/vc_elements_variables.php' );
			require_once( self::$local_plugin_dir . 'visual_composer/include_php/vc_elements_classes.php' );
			self::require_once_in_dir( self::$local_plugin_dir . 'visual_composer/vc_elements/*.php');
			/** vc layout sections in the plugin */
			self::require_once_in_dir( get_template_directory() . '/inc/thememountain-layout-library/vc_layout_sections_templates/*.php');
			/** vc layout templates in the theme */
			self::require_once_in_dir( get_template_directory() . '/inc/thememountain-layout-library/vc_layout_templates/*.php');
			/** vc footer layout templates in the theme */
			self::require_once_in_dir( get_template_directory() . '/inc/thememountain-layout-library/vc_footer_layout_templates/*.php');
			/** vc modal layout templates in the theme */
			self::require_once_in_dir( get_template_directory() . '/inc/thememountain-layout-library/vc_modal_layout_templates/*.php');
		}

		/**
		 * logo customization - remove the VC logo in the VC  editor
		 */
		public static function tm_vc_nav_front_logo ($output) {
			return '';
		}

		/**
		 * VC Map util
		 */
		public static function tabs_custom_markup ($base, $title = '') {
			return "<div class='wpb_element_wrapper '><h4 class='wpb_element_title tm_element_title'> <i class='vc_general vc_element-icon tm_vc_icon_{$base}'></i>{$title}</h4></div><div class='wpb_tabs_holder wpb_holder vc_container_for_children'><ul class='tabs_controls'></ul>%content%</div>";
		}

		/**
		 * Gets the image selector vc field.
		 *
		 * @param      string  $group        The group
		 * @param      string  $heading      The heading
		 * @param      string  $description  The description
		 * @param      array   $dependency   The dependency
		 *
		 * @return     array   The image selector (dropbox) vc field with image_source, image_id (attach_iamge) and image_url (text_field)
		 */
		public static function get_image_selector_vc_field ($group = '', $heading = '', $description = '', $dependency = array(),$param_name = 'image_source') {
			if($description === '') {
				$description = esc_html__( 'Choose where the image should be loaded from.', 'thememountain-plugin' );
			}
			if($heading === '') {
				$heading = esc_html__( 'Image Source', 'thememountain-plugin' );
			}
			$_field = array(
				'type' => 'dropdown',
				'heading' => $heading,
				'param_name' => $param_name,
				'value' => array(
					esc_html__( 'Use Uploaded Image', 'thememountain-plugin' ) => 'image_id',
					esc_html__( 'Use Image URL', 'thememountain-plugin' ) => 'image_url',
					),
				'std' => 'image_id',
				'description' => $description,
				);
			if($group !== '') {
				$_field['group'] = $group;
			}
			if(!empty($dependency)) {
				$_field['dependency'] = $dependency;
			}
			return $_field;
		}

		/**
		 * Gets the image selector vc field.
		 *
		 * @param      string  $group        The group
		 * @param      string  $heading      The heading
		 * @param      string  $description  The description
		 * @param      array   $dependency   The dependency
		 *
		 * @return     array   The image selector (dropbox) vc field with image_source, image_id (attach_iamge) and image_url (text_field)
		 */
		public static function get_attach_image_vc_field ($group = '', $heading = '', $description = '',$param_name = 'image_id', $parent_param_name ='image_source') {
			if($description === '') {
				$description = esc_html__( 'Upload background image for section name.', 'thememountain-plugin' );
			}
			if($heading === '') {
				$heading = esc_html__( 'Uploaded Image', 'thememountain-plugin' );
			}
			$_field = array(
				'type' => 'attach_image',
				'heading' => $heading,
				'param_name' => $param_name,
				'std' => '',
				'description' => $description,
				'dependency' => array('element' => $parent_param_name,'value'=>'image_id')
				);
			if($group !== '') {
				$_field['group'] = $group;
			}
			return $_field;
		}

		/**
		 * Gets the image selector vc field.
		 *
		 * @param      string  $group        The group
		 * @param      string  $heading      The heading
		 * @param      string  $description  The description
		 * @param      array   $dependency   The dependency
		 *
		 * @return     array   The image selector (dropbox) vc field with image_source, image_id (attach_iamge) and image_url (text_field)
		 */
		public static function get_image_url_vc_field ($group = '', $heading = '', $description = '',$param_name = 'image_url', $parent_param_name ='image_source') {
			if($description === '') {
				$description = '';
			}
			if($heading === '') {
				$heading = esc_html__( 'Image URL', 'thememountain-plugin' );
			}
			$_field = array(
				'type' => 'textfield',
				'heading' => esc_html__( $heading, 'thememountain-plugin' ),
				'param_name' => $param_name,
				'value' => '',
				'save_always' => 'true',
				'description'=> $description,
				'dependency' => array('element' => $parent_param_name,'value'=>'image_url')
				);
			if($group !== '') {
				$_field['group'] = $group;
			}
			return $_field;
		}

		/**
		 * Gets the rich text editor background color vc field.
		 *
		 * @param      string  $group   The group
		 *
		 * @return     array the rich text editor background color vc field array for vc_map
		 */
		public static function get_rich_text_editor_background_color_vc_field ($group = '', $dependency = array()) {
			$_field = array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Rich text editor background color', 'thememountain-plugin' ),
				'param_name' => 'textarea_html_bkg_color',
				'save_always' => 'true',
				'std' => '#FFFFFF',
				'description' => esc_html__( 'Changes text editor textarea background color. This is useful for section where you set the text a light color such as white.', 'thememountain-plugin' ),
				);
			if($group !== '') {
				$_field['group'] = $group;
			}
			if(!empty($dependency)) {
				$_field['dependency'] = $dependency;
			}
			return $_field;
		}

		/**
		 * Get an array of posts. Customized for Visual Composer.
		 *
		 * @since 1.0.7
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
				$items[ $post->post_title ] = $post->ID;
			}
			wp_reset_postdata();
			return $items;
		}

		/**
		 *	plugin utils (private)
		 */
		private static function require_once_in_dir ( $_target_dir_path ) {
			// scan through the shortcodes in the parent theme
			foreach (glob( $_target_dir_path ) as $_file_path) {
				require_once( $_file_path );
			}
		}
	}
}