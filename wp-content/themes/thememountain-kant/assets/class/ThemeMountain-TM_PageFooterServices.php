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
	class TM_PageFooterServices extends TM_TemplateServices {
		/**
		 * Public Run time properties that are used directly from theme template files.
		 */
			/**
			 * Caches tm_footer_type
			 *
			 * @since 1.0
			 * @access public
			 *
			 * @see       TM_PageFooterServices::preprocess_custom_options_for_page_footer()
			 *
			 * @var        string
			 */
			public static $footer_type = '';

			/**
			 * Caches tm_footer_column_number or caches the number of rows in a tm footer content.
			 *
			 * In the latter case, cached and overwritten when TM_PageFooterServices::get_current_tm_footer() is called.
			 *
			 * @since 1.0
			 * @access public
			 *
			 * @see       TM_PageFooterServices::preprocess_custom_options_for_page_footer()
			 * @see       TM_PageFooterServices::get_current_tm_footer()
			 *
			 * @var        string
			 */
			public static $footer_column_number = '';

			/**
			 * Caches tm_footer_column_align 1 through 5 (in 1 based array. 0 is dummy or blank)
			 *
			 * @since 1.0
			 * @access public
			 *
			 * @see       TM_PageFooterServices::preprocess_custom_options_for_page_footer()
			 *
			 * @var        array
			 */
			public static $footer_column_align = array();

			/**
			 * Caches tm_footer_position
			 *
			 * @access public
			 *
			 * @see       TM_PageFooterServices::preprocess_custom_options_for_page_footer()
			 * @see       TM_PageFooterServices::get_tm_footer_classes()
			 *
			 * @var        string
			 */
			public static $footer_position = 'relative';

			/**
			 * Caches tm_footer_scale_content_upon_footer_reveal
			 *
			 * @access public
			 *
			 * @see       TM_PageFooterServices::preprocess_custom_options_for_page_footer()
			 * @see       TM_PageFooterServices::get_tm_footer_classes()
			 *
			 * @var        boolean
			 */
			public static $footer_scale_content_upon_footer_reveal = FALSE;

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
			add_filter( 'tm_preprocess_custom_options', ['ThemeMountain\\TM_PageFooterServices','preprocess_custom_options_for_page_footer'] );
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
		public static function preprocess_custom_options_for_page_footer () {
			/*
			 * Page Option or Customizer
			 * Priority order : Page Option settings > Customizer Settings
			 */

			/**
			 * Get the Page Options. FALSE is returned if the called page does not have any page options.
			 * For example, loop pages.
			 */
			$thememountain_footer_type = TM_TemplateServices::get_current_page_data(array('options','tm_footer_type'));

			// set setting value for archive pages
			if(empty($thememountain_footer_type)) {
				parent::$current_page_data['options']['tm_footer_type'] = TM_Customizer::tm_get_theme_mod('tm_footer_type');
			}

			// set $_use_customizer_settings to FALSE by default
			$_use_customizer_settings = FALSE;

			// is_shop?
			$_is_shop = (function_exists('is_shop') && is_shop()) ? TRUE : FALSE;

			if(
				$_is_shop === TRUE &&
				(empty($thememountain_footer_type) ||
				$thememountain_footer_type === 'use_customizer_settings')
			) {
				$_use_customizer_settings = TRUE;
			} if (!is_singular() && $_is_shop === FALSE){
				$_use_customizer_settings = TRUE;
			} else if (
				is_singular() &&
				(empty($thememountain_footer_type) ||
				$thememountain_footer_type === 'use_customizer_settings')
			) {
				$_use_customizer_settings = TRUE;
			}

			if( $_use_customizer_settings === TRUE ) {
				parent::$current_page_data['options']['tm_footer_type'] = TM_Customizer::tm_get_theme_mod('tm_footer_type');
				/** TM Footer */
				parent::$current_page_data['options']['tm_footer_id_to_show'] = TM_Customizer::tm_get_theme_mod('tm_footer_id_to_show');
				/** columns */
				parent::$current_page_data['options']['tm_footer_column_number'] = TM_Customizer::tm_get_theme_mod('tm_footer_column_number');
				parent::$current_page_data['options']['tm_footer_column_align_1'] = TM_Customizer::tm_get_theme_mod('tm_footer_column_align_1');
				parent::$current_page_data['options']['tm_footer_column_align_2'] = TM_Customizer::tm_get_theme_mod('tm_footer_column_align_2');
				parent::$current_page_data['options']['tm_footer_column_align_3'] = TM_Customizer::tm_get_theme_mod('tm_footer_column_align_3');
				parent::$current_page_data['options']['tm_footer_column_align_4'] = TM_Customizer::tm_get_theme_mod('tm_footer_column_align_4');
				parent::$current_page_data['options']['tm_footer_column_align_5'] = TM_Customizer::tm_get_theme_mod('tm_footer_column_align_5');
				/** color */
				parent::$current_page_data['options']['tm_footer_background_color'] = TM_Customizer::tm_get_theme_mod('tm_footer_background_color');
				parent::$current_page_data['options']['tm_footer_text_color'] = TM_Customizer::tm_get_theme_mod('tm_footer_text_color');
				parent::$current_page_data['options']['tm_footer_link_text_color'] = TM_Customizer::tm_get_theme_mod('tm_footer_link_text_color');
				parent::$current_page_data['options']['tm_footer_link_text_color_hover'] = TM_Customizer::tm_get_theme_mod('tm_footer_link_text_color_hover');
				parent::$current_page_data['options']['tm_footer_title_color'] = TM_Customizer::tm_get_theme_mod('tm_footer_title_color');
				parent::$current_page_data['options']['tm_footer_text_font_size'] = TM_Customizer::tm_get_theme_mod('tm_footer_text_font_size');
				/** Footer Position */
				parent::$current_page_data['options']['tm_footer_position'] = TM_Customizer::tm_get_theme_mod('tm_footer_position');
				/** Scale content upon footer reveal */
				parent::$current_page_data['options']['tm_footer_scale_content_upon_footer_reveal'] = TM_Customizer::tm_get_theme_mod('tm_footer_scale_content_upon_footer_reveal');
			}

			/**
			 * Set variables
			 */
			self::$footer_type = TM_TemplateServices::get_current_page_data(array('options','tm_footer_type'));
			self::$footer_column_number = intval(TM_TemplateServices::get_current_page_data(array('options','tm_footer_column_number')));
			if(self::$footer_column_number == 0) self::$footer_column_number = 3;
			self::$footer_column_align[0] = '';
			self::$footer_column_align[1] = TM_TemplateServices::get_current_page_data(array('options','tm_footer_column_align_1'));
			self::$footer_column_align[2] = TM_TemplateServices::get_current_page_data(array('options','tm_footer_column_align_2'));
			self::$footer_column_align[3] = TM_TemplateServices::get_current_page_data(array('options','tm_footer_column_align_3'));
			self::$footer_column_align[4] = TM_TemplateServices::get_current_page_data(array('options','tm_footer_column_align_4'));
			self::$footer_column_align[5] = TM_TemplateServices::get_current_page_data(array('options','tm_footer_column_align_5'));
			self::$footer_position = TM_TemplateServices::get_current_page_data(array('options','tm_footer_position'));
			self::$footer_scale_content_upon_footer_reveal = (TM_TemplateServices::get_current_page_data(array('options','tm_footer_scale_content_upon_footer_reveal')) == TRUE) ? TRUE : FALSE;

			/**
			 * Enqueue CSS
			 */
			TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_footer_background_color',TM_TemplateServices::get_current_page_data(array('options','tm_footer_background_color')), FALSE);
			TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_footer_text_color',TM_TemplateServices::get_current_page_data(array('options','tm_footer_text_color')), FALSE);
			TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_footer_link_text_color',TM_TemplateServices::get_current_page_data(array('options','tm_footer_link_text_color')), FALSE);
			TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_footer_link_text_color_hover',TM_TemplateServices::get_current_page_data(array('options','tm_footer_link_text_color_hover')), FALSE);
			TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_footer_title_color',TM_TemplateServices::get_current_page_data(array('options','tm_footer_title_color')), FALSE);
			TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_footer_text_font_size',TM_TemplateServices::get_current_page_data(array('options','tm_footer_text_font_size')), FALSE);

			/**
			 * Add body class
			 */
			if(self::$footer_scale_content_upon_footer_reveal === TRUE){
				add_filter( 'body_class',function($classes){
					array_push($classes, 'content-is-animated');
					return $classes;
				});
			}
		}

		/**
		 * Public Methods
		 */

		/**
		 * Gets the footer classes.
		 *
		 * @access public
		 *
		 * @uses       TM_PageFooterServices::$footer_position
		 * @uses       TM_PageFooterServices::$footer_scale_content_upon_footer_reveal
		 *
		 * @see        section-parts/page_footer.php
		 *
		 * @return     string  The footer classes.
		 */
		public static function get_tm_footer_classes(){
			$_classes = '';
			/** Footer position */
			if(self::$footer_position === 'fixed'){
				$_classes .= ' footer-fixed';
			}
			/** Footer reveal */
			if(self::$footer_scale_content_upon_footer_reveal === TRUE){
				$_classes .= ' reveal-footer';
			}
			return $_classes;
		}

		/**
		 * Gets the attributes for footer
		 *
		 * @access public
		 *
		 * @uses       TM_PageFooterServices::$footer_scale_content_upon_footer_reveal
		 *
		 * @see        section-parts/page_footer.php
		 *
		 * @return     string  The attributes for footer.
		 */
		public static function get_tm_footer_attributes(){
			$_attributes = '';
			/** Footer reveal */
			if(self::$footer_scale_content_upon_footer_reveal === TRUE){
				$_attributes .= ' data-animate-reveal';
			}
			return $_attributes;
		}

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
		public static function get_current_tm_footer () {
			$_html_output = '';
			$_page_id = TM_TemplateServices::get_current_page_data(array('options','tm_footer_id_to_show'));
			// in case that the tm_footer_id_to_show is not set yet.
			if(empty($_page_id)) {
				$_query_arg = array('posts_per_page' => 1, 'post_type' => 'tm_footer');
			} else {
			// tm_footer_id_to_show is set
				$_query_arg = array('post__in'=>array($_page_id), 'post_type' => 'tm_footer', 'suppress_filters' => FALSE );
			}

			/** get page */
			$_page_object = get_posts($_query_arg );

			/** set null if no result */
			if(!empty($_page_object)) {
				$_page_object = $_page_object[0];
			} else {
				$_page_object = NULL;
			}

			/** process received data */
			if(!empty($_page_object)) {
				// copy post_content
				$_html_output = $_page_object->post_content;
				// count row
				$_row_count = preg_match_all("/\[(vc_row)\s.*?/s",$_html_output);
				self::$footer_column_number = $_row_count;
			} else {
				self::$footer_column_number = 0;
			}
			wp_reset_postdata();
			return $_html_output;
		}

		/**
		 * End
		 */
	}
}