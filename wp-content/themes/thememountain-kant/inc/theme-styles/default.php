<?php
/**
 * This is a theme style layout config file for Default Theme Style
 *
 * @package ThemeMountain
 * @subpackage thememountain-kant
 * @since thememountain-kant 1.0
 *
 * @uses       ThemeMountain\TM_ThemeServices::__construct(); All the styles are once loaded and defines the default values of the current style being activated for the Customizer.
 * @uses       TM_ThemeServices::add_theme_style() This function is used to define theme style / layout configs.
 *
 */
namespace ThemeMountain;

TM_ThemeServices::add_theme_style( array(
	'id' => 'default',
	'label' => 'Default',
	'is_default' => TRUE,
	'css_files' => array(
			array('tm-timber', get_template_directory_uri().'/assets/css/skin_css/kant/core.min.css', array(), TM_ThemeServices::$theme_version),
			array('kant-skin', get_template_directory_uri().'/assets/css/skin_css/kant/default/skin.css', array(), TM_ThemeServices::$theme_version),
		),
	'js_files' => array(
			array('tm-kant', get_template_directory_uri().'/assets/js/timber.master.min.js', array('jquery'), '1.1.8', TRUE),
		),
	'settings' => array(
		/**
		 * id => default value
		 */		// fonts
		/**
		 * tm_navigtion_font
		 */
		'tm_navigtion_font' => array(
			'font-family'    => 'Montserrat',
			'variant'        => '700',
			'letter-spacing' => '0',
			),
		/**
		 * tm_form_font
		 */
		'tm_form_font' => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			),
		/**
		 * tm_project_title_and_description_font
		 */
		'tm_project_title_and_description_font' => array(
			'font-family'    => 'Montserrat',
			'variant'        => 'regular',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			),
		/**
		 * tm_lead_font
		 * tm_lead_font color is now a separate setting
		 * as tm_lead_font_color in the Content Body Color section
		 */
		'tm_lead_font' => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'font-size'      => '20px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			),
		'tm_lead_font_color' => '#969aa1',
		'tm_blockquote_font' => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'font-size'      => '20px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			),
		'tm_alt_font_1' => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'line-height'    => 'inherit',
			'letter-spacing' => '0',
			),
		'tm_alt_font_2' => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'line-height'    => 'inherit',
			'letter-spacing' => '0',
			),
		'tm_body_font' => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'font-size'      => '15px',
			'line-height'    => '1.7',
			'letter-spacing' => '0',
			),
		'tm_title_font' => array(
			'font-family'    => 'Montserrat',
			'variant'        => '700',
			'line-height'    => '1.2',
			'letter-spacing' => '0',
			),
		'tm_title_font_size_h1' => '43.81px',
		'tm_title_font_size_h2' => '32.94px',
		'tm_title_font_size_h3' => '24.76px',
		'tm_title_font_size_h4' => '18.62px',
		'tm_title_font_size_h5' => '14px',
		'tm_title_font_size_h6' => '10.53px',
		// Auxiliary Title Font Sizes
		'tm_title_font_size_extra_large' => '77.49px',
		'tm_title_font_size_large' => '58.26px',
		'tm_title_font_size_medium' => '24.76px',
		'tm_title_font_size_small' => '14px',
		// Lead Font Size
		'tm_title_font_size_lead' => '20.16px',
		// Auxiliary Text Font Sizes
		'tm_text_font_size_extra_large' => '20.16px',
		'tm_text_font_size_large' => '16.8px',
		'tm_text_font_size_medium' => '14px',
		'tm_text_font_size_small' => '11.67px',
		// in tm_navigation_header_logo section
		'tm_header_navigation_type' => 'default',
		'tm_logo_top_width_default' => 120,
		'tm_logo_body_width_default' => 120,
		'tm_logo_top_width_hamburger' => 120,
		/**
		 * CSS for Nav. Common
		 */
		// 'tm_page_header_nav_common_menu_link_color' => 'rgba(255,255,255,0.6)',
		// 'tm_page_header_nav_common_menu_link_color_hover' => 'rgba(255,255,255,1)',
		// 'tm_page_header_nav_common_menu_link_color_current_and_hover' => 'rgba(255,255,255,1)',
		'tm_page_header_logo_common_menu_hover_opacity' => 1,
		// 'tm_body_menu_link_color' => NULL,
		// 'tm_body_menu_link_color_hover' => NULL,
		// 'tm_body_menu_link_color_current_and_hover' => NULL,
		// 'tm_sub_menu_background_color' => NULL,
		// 'tm_sub_menu_menu_link_color' => NULL,
		// 'tm_sub_menu_menu_link_color_hover' => NULL,
		// 'tm_sub_menu_menu_link_background_color_hover' => NULL,

		/**
		 * Header Button Appearance (tm_page_header_button_appearance)
		 */
		'tm_top_header_nav_button_background_color' => '#33363a',
		'tm_top_header_nav_button_border_color' => '#33363a',
		'tm_top_header_nav_button_text_color' => '#FFF',
		'tm_top_header_nav_button_background_color_hover' => '#3fb58b',
		'tm_top_header_nav_button_border_color_hover' => '#3fb58b',
		'tm_top_header_nav_button_text_color_hover' => '#FFF',

		'tm_body_header_nav_button_background_color' => '#33363a',
		'tm_body_header_nav_button_border_color' => '#33363a',
		'tm_top_header_nav_button_border_color' => '#33363a',
		'tm_body_header_nav_button_text_color' => '#FFF',
		'tm_body_header_nav_button_background_color_hover' => '#3fb58b',
		'tm_body_header_nav_button_border_color_hover' => '#3fb58b',
		'tm_body_header_nav_button_text_color_hover' => '#FFF',

		/**
		 * Overlay Navigation Appeaeance Settings (Customizer section: tm_overlay_nav_appearance)
		 */
		'tm_overlay_navigation_color' => '#999',
		'tm_overlay_navigation_color_hover_active' => '#33363a',
		// Added in #212
		'tm_overlay_sub_menu_navigation_color' => '#999',
		'tm_overlay_sub_menu_navigation_color_hover' => '#33363a',
		'tm_overlay_cart_delete_button_background_color' => '#ddd',
		'tm_overlay_cart_delete_button_color' => '#33363a',
		'tm_overlay_cart_delete_button_color_hover' => '#3fb58b',
		'tm_overlay_cart_price_color' => '#999',
		'tm_overlay_cart_total_color' => '#33363a',
		'tm_overlay_cart_total_divider_color' => '#ddd',
		'tm_overlay_button_background_color' => '#33363a',
		'tm_overlay_button_border_color' => '#33363a',
		'tm_overlay_button_text_color' => '#fff',
		'tm_overlay_button_background_color_hover' => '#3fb58b',
		'tm_overlay_button_border_color_hover' => '#3fb58b',
		'tm_overlay_button_text_color_hover' => '#fff',
		// end #212
		/**
		 * Overlay Appeaeance Settings (Customizer section: tm_overlay_appearance)
		 */
		'tm_overlay_background_color' => 'rgba(255,255,255,1)',
		'tm_overlay_exit_button_color' => 'rgba(51,54,58,0.5)',
		'tm_overlay_exit_button_color_hover' => '#33363a',
		'tm_overlay_nav_title_color' => '#000',
		'tm_overlay_nav_copyright_color' => '#666',
		'tm_overlay_nav_animation' => 'scale-in',
		/* Off Canvas Navigation */
		'tm_off_canvas_nav_color' => '#999',
		'tm_off_canvas_nav_color_hover_active' => '#33363a',
		// Added in #221
		'tm_offcanvas_sub_menu_navigation_color' => '#999',
		'tm_offcanvas_sub_menu_navigation_color_hover' => '#33363a',
		// End #221
		'tm_off_canvas_background_color' => '#f6f6f6',
		'tm_offcanvas_exit_button_color' => 'rgba(51,54,58,0.5)',
		'tm_offcanvas_exit_button_color_hover' => '#33363a',
		// Added in #211
		'tm_offcanvas_cart_delete_button_background_color' => '#ddd',
		'tm_offcanvas_cart_delete_button_color' => '#33363a',
		'tm_offcanvas_cart_delete_button_color_hover' => '#3fb58b',
		'tm_offcanvas_cart_price_color' => '#999',
		'tm_offcanvas_cart_total_color' => '#33363a',
		'tm_offcanvas_cart_total_divider_color' => '#ddd',
		'tm_offcanvas_button_background_color' => '#33363a',
		'tm_offcanvas_button_border_color' => '#33363a',
		'tm_offcanvas_button_text_color' => '#fff',
		'tm_offcanvas_button_background_color_hover' => '#3fb58b',
		'tm_offcanvas_button_border_color_hover' => '#3fb58b',
		'tm_offcanvas_button_text_color_hover' => '#fff',
		// End #221
		'tm_off_canvas_nav_copyright_color' => '#666',
		'tm_off_canvas_nav_position' => 'enter-left',
		'tm_off_canvas_nav_animation' => 'reveal',
		/**
		 * We need to add a color option for cart badge bkg and text color in header and in auxiliary navigation in customiser common-assets#218
		 */
		'tm_page_header_cart_badge_background_color' => '#3fb58b',
		'tm_page_header_cart_badge_color' => '#fff',
		'tm_offcanvas_cart_badge_background_color' => '#3fb58b',
		'tm_offcanvas_cart_badge_color' => '#fff',
		'tm_overlay_cart_badge_background_color' => '#3fb58b',
		'tm_overlay_cart_badge_color' => '#fff',
		/**
		 * CSS for multiple Nav styles
		 */
		'tm_page_header_nav_top_header_border_color' => 'rgba(255,255,255,0.2)',
		'tm_page_header_nav_body_header_border_color' => '#eee',
		/**
		 * CSS for Nav. default
		 */
		'tm_page_header_nav_default_menu_top_color' => 'rgba(255,255,255,0.7)',
		'tm_page_header_nav_default_menu_top_color_hover' => '#fff',
		'tm_page_header_nav_default_menu_top_color_current' => '#fff',
		'tm_page_header_nav_default_menu_body_color' => 'rgba(102,102,102,1)',
		'tm_page_header_nav_default_menu_body_color_hover' => '#000',
		'tm_page_header_nav_default_menu_body_color_active' => '#000',
		'tm_page_header_nav_default_menu_sub_bkg_color' => '#111',
		'tm_page_header_nav_default_menu_sub_link_color' => '#999',
		'tm_page_header_nav_default_menu_sub_link_color_hover' => '#fff',
		'tm_page_header_nav_default_menu_sub_link_color_active' => '#fff',
		'tm_page_header_nav_default_menu_sub_link_background_color_hover' => '#000',
		'tm_page_header_nav_mega_submenu_border_color' => '#303030',
		'tm_page_header_default_menu_top_bkg_color' => 'rgba(255, 255, 255, 0)',
		'tm_page_header_default_menu_body_bkg_color' => '#fff',
		'tm_body_header_default_menu_height_threshold' => '',

		/**
		 * CSS for Nav. hamburger
		 */
		'tm_page_header_hamburger_menu_bkg_color' => '#33363a',
		'tm_page_header_hamberger_menu_icon_color' => '#fff',
		'tm_page_header_hamberger_menu_icon_hover_color' => '#666',
		'tm_header_vertical_alignment_bottom_value' => 0,
		'tm_top_header_common_menu_height' => 80,
		'tm_body_header_default_menu_height' => 60,
		'tm_body_header_background_color_threshold' => 100,

		/**
		 * tm_page_header_logo_background_color. Default is unique for Sartre.
		 */
		'tm_page_header_logo_background_color' => 'rgba(255,255,255,0)',

		/**
		 * Pre-Header Settings section (tm_preheader_settings)
		 */
		'tm_preheader_type' => 'hide_preheader',
		'tm_preheader_height' => 'auto',
		'tm_preheader_link_color' => '#3fb58b',
		'tm_preheader_link_color_hover' => '#666',

		/**
		 * Page Head Title (color)
		 *
		 * These settings items are set for default of tm_page_head_title_background_color_* as well as tm_page_head_title_font_color_*
		 * And Is Not output through enqueueInlineCustomizerCss in ThemeMountain-TM_StyleAndScripts.php
		 * @see        ThemeMountain-TM_MastheadServices::preprocess_custom_options_for_masthead()
		 */
		'tm_page_head_title_background_color_home' => '#33363a',
		'tm_page_head_title_font_color_home' => '#fff',
		/** @since Common Assets version 1.1 */
		'tm_page_head_title_overlay_background_color_home' => 'rgba(0,0,0,0.5)',

		/**
		 * Site Search Appearance
		 */
		'tm_search_modal_overlay_background_color' => 'rgba(0,0,0,0.7)',
		'tm_search_modal_form_placeholder_color' => '#fff',
		'tm_search_modal_form_focus_color' => '#fff',
		'tm_search_modal_close_link_color' => '#fff',

		/**
		 * tm_content_body
		 */
		'tm_content_body_background_color' => '#FFFFFF',
		'tm_section_block_background_color' => '#FFFFFF',
		'tm_content_body_text_color' => '#666',
		'tm_content_body_title_color' => '#000',
		'tm_content_body_title_link_color' => '#33363a',
		'tm_content_body_title_link_color_hover' => '#3fb58b',
		'tm_content_body_link_color' => '#3fb58b',
		'tm_content_body_link_color_hover' => '#666',
		// Global Button Color
		'tm_button_set_global_color' => TRUE,
		'tm_button_size' => 'button-medium',
		'tm_button_style' => 'button-rounded',
		'tm_button_bkg_color' => '#33363a',
		'tm_button_bkg_color_hover' => '#3fb58b',
		'tm_button_border_color' => '#33363a',
		'tm_button_border_color_hover' => '#3fb58b',
		'tm_button_label_color' => '#fff',
		'tm_button_label_color_hover' => '#fff',
		/**
		 * Overlay info color color
		 */
		'tm_post_rollover_background_color_wide_grids_home' => 'rgba(0,0,0,0.5)',
		'tm_post_rollover_background_color_creative_home' => 'rgba(0,0,0,0.5)',
		'tm_post_rollover_color_wide_grids_home' => '#FFF',
		'tm_post_rollover_color_creative_home' => '#FFF',
		/**
		 * Advanced settings for layout
		 */
		'tm_use_custom_settings_tm_folio' => '1',
		'tm_use_custom_settings_post' => '1',
		// Blog grid item background color and post color needs color options in Customiser #192
		'tm_grid_layout_box_article_background_color_home' => '#f8f8f8',
		'tm_grid_layout_box_article_color_home' => '#666666',
		'tm_grid_layout_box_article_title_color_home' => '',
		'tm_grid_layout_box_article_title_color_hover_home' => '',
		'tm_grid_layout_box_article_link_color_home' => '',
		'tm_grid_layout_box_article_link_color_hover_home' => '',
		'tm_grid_layout_box_article_post_meta_color_home' => '#bababa',
		/**
		 * Pagination
		 */
		'tm_pagination_background_color_home' => 'rgba(255,255,255,0)',
		'tm_pagination_background_color_hover_home' => 'rgba(255,255,255,0)',
		'tm_pagination_background_color_active_home' => 'rgba(255,255,255,0)',
		'tm_pagination_border_color_home' => 'rgba(255,255,255,0)',
		'tm_pagination_border_color_hover_home' => 'rgba(255,255,255,0)',
		'tm_pagination_border_color_active_home' => '#3fb58b',
		'tm_pagination_link_color_home' => '#33363a',
		'tm_pagination_link_color_hover_home' => '#3fb58b',
		'tm_pagination_link_color_active_home' => '#3fb58b',
		'tm_pagination_return_to_index_home' => 'label',

		/**
		 * Footer Settings
		 */
		'tm_footer_background_color' => '#1f2225',
		'tm_footer_text_color' => '#7a7d84',
		// added 10 nov 2016 #46
		'tm_footer_link_text_color' => '#7a7d84',
		'tm_footer_link_text_color_hover' => '#3fb58b',
		'tm_footer_title_color' => '#fff',
		'tm_footer_text_font_size' => '13px',
		/**
		 * Theme Form
		 */
		'tm_theme_form_background_color' => '#fff',
		'tm_theme_form_border_color' => '#ddd',
		'tm_theme_form_placeholder_color' => '#666',
		'tm_theme_form_placeholder_focus_color' => '#33363a',
		'tm_theme_form_focus_background_color' => '#fff',
		'tm_theme_form_focus_border_color' => '#3fb58b',
		'tm_theme_form_focus_text_color' => '#33363a',
		'tm_theme_form_submit_background_color' => '#33363a',
		'tm_theme_form_submit_border_color' => '#3fb58b',
		'tm_theme_form_submit_text_color' => '#fff',
		'tm_theme_form_submit_hover_background_color' => '#3fb58b',
		'tm_theme_form_submit_hover_border_color' => '#3fb58b',
		'tm_theme_form_submit_hover_text_color' => '#fff',
		/**
		 * CF7 Footer Form
		 */
		'tm_cf7_background_color' => 'rgba(255,255,255,0)',
		'tm_cf7_border_color' => '#ddd',
		'tm_cf7_placeholder_color' => '#666',
		'tm_cf7_form_text_color' => '#666',
		'tm_cf7_placeholder_focus_color' => '#33363a',
		'tm_cf7_focus_background_color' => 'rgba(255,255,255,0)',
		'tm_cf7_focus_border_color' => '#3fb58b',
		'tm_cf7_focus_text_color' => '#33363a',
		// added 10 nov 1026, issue #44
		'tm_cf7_error_background_color' => 'rgba(255,255,255,0)',
		'tm_cf7_error_border_color' => '#3fb58b',
		'tm_cf7_error_text_color' => '#3fb58b',
		'tm_cf7_submit_background_color' => '#33363a',
		'tm_cf7_submit_border_color' => '#33363a',
		'tm_cf7_submit_hover_background_color' => '#3fb58b',
		'tm_cf7_submit_hover_border_color' => '#3fb58b',
		'tm_cf7_submit_text_color' => '#fff',
		'tm_cf7_submit_hover_text_color' => '#fff',
		'tm_cf7_response_message_color' => '#666',
		// added 9 Jan 2017, issue #352
		'tm_cf7_checkbox_radio_background_color' => '#fff',
		'tm_cf7_checkbox_radio_border_color' => '#ddd',
		'tm_cf7_checkbox_checked_background_color' => '#3fb58b',
		'tm_cf7_radio_checked_background_color' => '#3fb58b',
		'tm_cf7_checkbox_check_color' => '#fff',
		'tm_cf7_radiobutton_checked_color' => '#fff',
		/**
		 * footer Form
		 */
		'tm_footer_form_background_color' => 'rgba(255,255,255,0)',
		'tm_footer_form_border_color' => '#ddd',
		'tm_footer_form_placeholder_color' => '#666',
		'tm_footer_form_focus_background_color' => 'rgba(255,255,255,0)',
		'tm_footer_form_focus_border_color' => '#3fb58b',
		'tm_footer_form_focus_text_color' => '#33363a',

		// added 10 nov 1026, issue #44
		'tm_footer_form_required_background_color' => 'rgba(255,255,255,0)',
		'tm_footer_form_required_border_color' => '#3fb58b',
		'tm_footer_form_required_text_color' => '#7a7d84',

		'tm_footer_form_error_background_color' => 'rgba(255,255,255,0)',
		'tm_footer_form_error_border_color' => '#3fb58b',
		'tm_footer_form_error_text_color' => '#fff',
		'tm_footer_form_submit_background_color' => '#33363a',
		'tm_footer_form_submit_border_color' => '#33363a',
		'tm_footer_form_submit_hover_background_color' => '#3fb58b',
		'tm_footer_form_submit_hover_border_color' => '#3fb58b',
		'tm_footer_form_submit_text_color' => '#fff',
		'tm_footer_form_submit_hover_text_color' => '#fff',
		'tm_footer_form_response_message_color' => '#7a7d84',
		/**
		 * Lightbox (Customizer Section : tm_light_box)
		 */
		'tm_lightbox_overlay_background_color' => 'rgba(255,255,255,1)',
		'tm_lightbox_navigation_color' => 'rgba(0,0,0,0.4)',
		'tm_lightbox_caption_background_color' => 'rgba(255,255,255,1)',
		'tm_lightbox_caption_color' => '#33363a',
		/**
		 * Loader (Customizer Section : tm_loader)
		 */
		'tm_loader_color' => '#3fb58b',
		'tm_loader_border_thickness' => 2,
		'tm_loader_size' => 6,
	)
) );

/**
 * Theme Style Custom Action for Regular Theme Style
 *
 * @package ThemeMountain
 * @subpackage thememountain-kant
 * @since thememountain-kant 1.0
 *
 * @uses       TM_Customizer::tm_get_theme_mod()
 * @uses       TM_StyleAndScripts::tm_add_inline_css_head()
 * @uses       TM_TemplateServices::on_template_include()		Executes action hook of 'tm_theme_style_custom_action_' followed by current theme style slug
 */
function thememountain_theme_style_custom_action_default () {
	/**
	 * tm-loader size margin adjustment
	 */
	$_tm_loader_size = TM_Customizer::tm_get_theme_mod('tm_loader_size');
	$_tm_loader_size_margin_left = -1 * ($_tm_loader_size / 2);
	TM_StyleAndScripts::tm_add_inline_css_head(".tm-loader { margin: {$_tm_loader_size_margin_left}rem 0 0 {$_tm_loader_size_margin_left}rem; }");

	// Header logo width Regular and Boxed site styles #368
	$_tm_header_navigation_type = TM_Customizer::tm_get_theme_mod('tm_header_navigation_type');
	if($_tm_header_navigation_type === 'hamburger') {
		$_tm_logo_top_width = TM_Customizer::tm_get_theme_mod('tm_logo_top_width_hamburger');
	} else {
		$_tm_logo_top_width = TM_Customizer::tm_get_theme_mod('tm_logo_top_width_default');
		TM_StyleAndScripts::tm_add_inline_css_head(".header .logo { width: {$_tm_logo_top_width}px; }");
	}

	/**
	 * Form Border Style
	 */
	$_tm_cf7_border_style = TM_Customizer::tm_get_theme_mod('tm_cf7_border_style');
	if($_tm_cf7_border_style === 'rounded') {
		TM_StyleAndScripts::tm_add_inline_css_head('.form-element, input[type="submit"],.wpcf7-form-control-wrap input,.wpcf7-form-control-wrap textarea,.wpcf7-form-control-wrap[class*="select-"] select,.wpcf7 .wpcf7-submit{border-radius: 0.3rem}');
	} else if ($_tm_cf7_border_style === 'pill') {
		TM_StyleAndScripts::tm_add_inline_css_head('.form-element,.wpcf7 .wpcf7-submit,.wpcf7-form-control-wrap input,.wpcf7-form-control-wrap[class*=select-] select,input[type=submit]{border-radius:10.5rem;}.wpcf7-form-control-wrap textarea,textarea.form-element{border-radius:.3rem;}');
	}

	/**
	 * Post Rollover Background Color for index loops #90 (wordpress-common-assets)
	 *
	 * @since		27 October 2017
	 *
	 * @uses		tm_post_rollover_background_color_wide_grids (set in TM_TemplateServices::set_current_template_data())
	 * @uses		tm_post_rollover_background_color_creative (set in TM_TemplateServices::set_current_template_data())
	 * @uses		tm_loop_style (set in TM_TemplateServices::set_current_template_data())
	 */
	if(!is_admin()) {
		$_tm_loop_style = TM_TemplateServices::get_current_page_data(array('options','tm_loop_style'));
		// only applicable for creative index loop style
		if($_tm_loop_style === 'creative') {
			$_tm_post_rollover_background_color_creative = TM_TemplateServices::get_current_page_data(array('options','tm_post_rollover_background_color_creative'));
			/* Output this CSS to override using a gradient */
			TM_StyleAndScripts::tm_add_inline_css_head(".blog-masonry.masonry-set-dimensions .thumbnail .overlay-info {background-image: -webkit-linear-gradient(to top,{$_tm_post_rollover_background_color_creative} 0%,transparent 100%)!important;background-image: -moz-linear-gradient(to top,{$_tm_post_rollover_background_color_creative} 0%,transparent 100%)!important;background-image: -o-linear-gradient(to top,{$_tm_post_rollover_background_color_creative} 0%,transparent 100%)!important;background-image: linear-gradient(to top,{$_tm_post_rollover_background_color_creative} 0%,transparent 100%)!important;background-color: transparent !important;}");
		}

		// rollover color
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_post_rollover_color_wide_grids_home',TM_TemplateServices::get_current_page_data(array('options','tm_post_rollover_color_wide_grids_home')),TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_post_rollover_color_creative_home',TM_TemplateServices::get_current_page_data(array('options','tm_post_rollover_color_creative_home')),TRUE);
	}
}

/**
 * Adds action hook for thememountain_theme_style_custom_action_default
 */
add_action ('tm_theme_style_custom_action_default','ThemeMountain\\thememountain_theme_style_custom_action_default');

/**
 * Customizer option
 */
function thememountain_load_customizer_fields () {
	// ThemeStrings - see theme files
	$customizer_str = TM_ThemeStrings::$text_strings['customizer'];

	/**
	 * For custom layout choices for tm_loop_style_*
	 *
	 * @uses        TM_Customizer::$tm_loop_style_default
	 * @uses        TM_Customizer::$tm_loop_style_choices
	 * @see         tm_loop_style_* settings in fields_content_layout_settings.php
	 */
	TM_Customizer::$tm_loop_style_default = 'grids';
	TM_Customizer::$tm_loop_style_choices = array(
		'wide' => $customizer_str['tm_loop_style_'][2],
		'grids' => $customizer_str['tm_loop_style_'][3],
		'creative' => $customizer_str['tm_loop_style_'][4],
	);
}

/**
 * Adds action hook for thememountain_load_customizer_fields
 * @see        TM_Customizer class
 */
add_action ('tm_load_customizer_fields','ThemeMountain\\thememountain_load_customizer_fields');
