<?php
namespace ThemeMountain {
	/**
	 * ThemeMountain Navigation Menu Services
	 *
	 * This class is extended from TM_TemplateServices but can still work as an independent class.
	 *
	 * @package ThemeMountain
	 * @subpackage Core
	 * @since 1.0
	 */
	class TM_PreheaderServices extends TM_TemplateServices {
		/**
		 * Public Run time properties that are used directly from theme template files.
		 */
			/**
			 * Caches tm_preheader_type
			 *
			 * @since 1.0
			 * @access public
			 *
			 * @see       TM_PreheaderServices::preprocess_custom_options_for_preheader()
			 *
			 * @var        string
			 */
			public static $preheader_type = '';

		/**
		 * End Properties
		 */

		/**
		 * Class Constructor Magic Method.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       preprocess_custom_options_for_nav_menu action hook
		 * @see        TM_TemplateServices::on_template_include() preprocess_custom_options_for_nav_menu action hook is executed.
		 */
		public function __construct() {
			// add hooks
			add_filter( 'tm_preprocess_custom_options', ['ThemeMountain\\TM_PreheaderServices','preprocess_custom_options_for_preheader'] );
		}

		/**
		 * Public Methods for hooks
		 */

		/**
		 * Set up custom options for the page footer.
		 *
		 * Add inline CSS into the header for custom settings. Selects correct classes.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       TM_TemplateServices::get_current_page_data() Returns cached Data of currently displayed page in TM_TemplateServices::$current_page_data[].
		 * @uses       TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings()
		 *
		 * @see        TM_TemplateServices::on_template_include() This method is called by the tm_preprocess_custom_options action hook.
		 */
		public static function preprocess_custom_options_for_preheader () {
			/*
			 * Page Option or Customizer
			 * Priority order : Page Option settings > Customizer Settings
			 */

			/**
			 * Get the Page Options. FALSE is returned if the called page does not have any page options.
			 * For example, loop pages.
			 */
			$_tm_preheader_type = TM_TemplateServices::get_current_page_data(array('options','tm_preheader_type'));

			// set setting value for archive pages
			if(empty($_tm_preheader_type)) {
				parent::$current_page_data['options']['tm_preheader_type'] = TM_Customizer::tm_get_theme_mod('tm_preheader_type');
			}

			$_use_custom_settings = FALSE;

			if (
				is_singular() &&
				(empty($_tm_preheader_type) ||
				$_tm_preheader_type === 'use_customizer_settings')
			) {
				$_use_custom_settings = TRUE;
			} else if(
				(function_exists('is_shop') && is_shop()) &&
				(empty($_tm_preheader_type) ||
				$_tm_preheader_type === 'use_customizer_settings')
			) {
				$_use_custom_settings = TRUE;
			} else if ($_tm_preheader_type === 'customizer') {
				$_use_custom_settings = TRUE;
			}

			if( $_use_custom_settings === TRUE ) {
				parent::$current_page_data['options']['tm_preheader_type'] = TM_Customizer::tm_get_theme_mod('tm_preheader_type');
				/* tm_preheader to show */
				parent::$current_page_data['options']['tm_preheader_id_to_show'] = TM_Customizer::tm_get_theme_mod('tm_preheader_id_to_show');
				/* height */
				parent::$current_page_data['options']['tm_preheader_height'] = TM_Customizer::tm_get_theme_mod('tm_preheader_height');
				/** color */
				parent::$current_page_data['options']['tm_preheader_link_color'] = TM_Customizer::tm_get_theme_mod('tm_preheader_link_color');
				parent::$current_page_data['options']['tm_preheader_link_color_hover'] = TM_Customizer::tm_get_theme_mod('tm_preheader_link_color_hover');
			}

			/**
			 * Set variables
			 */
			self::$preheader_type = TM_TemplateServices::get_current_page_data(array('options','tm_preheader_type'));

			/**
			 * Enqueue CSS
			 */
			TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_preheader_height',TM_TemplateServices::get_current_page_data(array('options','tm_preheader_height')), FALSE);
			TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_preheader_link_color',TM_TemplateServices::get_current_page_data(array('options','tm_preheader_link_color')), FALSE);
			TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_preheader_link_color_hover',TM_TemplateServices::get_current_page_data(array('options','tm_preheader_link_color_hover')), FALSE);
		}

		/**
		 * Public Methods
		 */

		/**
		 * Gets the current time footer.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @see        section-parts/page_footer.php
		 *
		 * @return     string  The current time footer content html.
		 */
		public static function get_current_tm_preheader () {
			$_html_output = '';
			$_page_id = TM_TemplateServices::get_current_page_data(array('options','tm_preheader_id_to_show'));
			// in case that the tm_preheader_id_to_show is not set yet.
			if(empty($_page_id)) {
				// get any available tm footer page
				$_page_object = get_posts( array('posts_per_page' => 1, 'post_type' => 'tm_preheader') );
				if(!empty($_page_object)) {
					$_page_object = $_page_object[0];
				} else {
					$_page_object = NULL;
				}
			} else {
				/** get page */
				$_page_object = get_post( $_page_id );
			}
			/** process received data */
			if(!empty($_page_object)) {
				// copy post_content
				$_html_output = $_page_object->post_content;
			}
			wp_reset_postdata();
			return $_html_output;
		}

		/**
		 * End
		 */
	}
}