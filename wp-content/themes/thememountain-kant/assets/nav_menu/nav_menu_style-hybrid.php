<?php
/**
 * This is a nav style config file for default & hamburger menu hybrid
 *
 * @package ThemeMountain
 * @subpackage thememountain-sartre
 * @since thememountain-sartre 1.1.3
 *
 * @uses       ThemeMountain\TM_NavMenuServices
 */
namespace ThemeMountain;

/**
 * Nav config specs:
 *
 * -
 * - Menu Style and slug (1 each nav style config file)
 * - Menu Settings Processor Use filter hook, 'tm_preprocess_custom_options_' followed by the menu style slug.
 * - Customizer settings in queue bufferred to filter out duplicates. Customizer config is initialized at the timing of init action hook in TM_Customizer::setup_kirki().
*/

TM_NavMenuServices::add_nav_menu_style_name('hybrid',TM_ThemeStrings::$text_strings['nav_menu_styles']['hybrid']);

/**
 * Set up custom options for header. Namely the nav menu.
 *
 * Add inline CSS into the header for custom settings. Selects correct classes.
 *
 * @since 1.0
 * @access public
 *
 * @uses       TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings()
 *
 * @see        TM_NavMenuServices::preprocess_custom_options_for_nav_menu() This method is called by the method.
 */
add_action('tm_nav_style_config_hybrid','ThemeMountain\thememountain_nav_style_config_hybrid');
function thememountain_nav_style_config_hybrid() {
	/*
	 * Page Option or Customizer
	 * Priority order : Page Option settings > Customizer Settings
	 */

	/**
	 * Get the Page Options. FALSE is returned if the called page does not have any page options.
	 * For example, loop pages.
	 */
	$thememountain_page_options = TM_TemplateServices::get_current_page_data('options');

	/* tm_navigation_menu_deviate */
	if(
		$thememountain_page_options !== FALSE &&
		isset($thememountain_page_options['tm_navigation_menu_deviate']) &&
		$thememountain_page_options['tm_navigation_menu_deviate'] !== ''
	) {
		/** custom page option settings */
		$thememountain_body_header_default_menu_height_threshold = $thememountain_page_options['tm_body_header_default_menu_height_threshold'];
		$thememountain_body_header_sticky_threshold = $thememountain_page_options['tm_body_header_sticky_threshold'];
		$thememountain_body_header_helper_out_threshold = $thememountain_page_options['tm_body_header_helper_out_threshold'];
		$thememountain_body_header_background_color_threshold = $thememountain_page_options['tm_body_header_background_color_threshold'];
		$thememountain_body_header_compact_threshold = $thememountain_page_options['tm_body_header_compact_threshold'];
		$ignore_dependency = TRUE;
	} else {
		/** customizer settings */
		$thememountain_body_header_default_menu_height_threshold = TM_Customizer::tm_get_theme_mod('tm_body_header_default_menu_height_threshold');
		$thememountain_body_header_sticky_threshold = TM_Customizer::tm_get_theme_mod('tm_body_header_sticky_threshold');
		$thememountain_body_header_helper_out_threshold = TM_Customizer::tm_get_theme_mod('tm_body_header_helper_out_threshold');
		$thememountain_body_header_background_color_threshold = TM_Customizer::tm_get_theme_mod('tm_body_header_background_color_threshold');
		$thememountain_body_header_compact_threshold = TM_Customizer::tm_get_theme_mod('tm_body_header_compact_threshold');
		$ignore_dependency = FALSE;
	}
	/**
	 * Set nav menu header data attributes
	 * Blank values are skipped.
	 *
	 * @uses       TM_TemplateServices::tm_return_field_data_attribute()
 	 * @uses       TM_NavMenuServices::$nav_menu_header_data_attrs
	 */
	TM_NavMenuServices::$nav_menu_header_data_attrs = TM_TemplateServices::tm_return_field_data_attribute('tm_body_header_default_menu_height_threshold',$thememountain_body_header_default_menu_height_threshold,$ignore_dependency).TM_TemplateServices::tm_return_field_data_attribute('tm_body_header_sticky_threshold',$thememountain_body_header_sticky_threshold,$ignore_dependency).TM_TemplateServices::tm_return_field_data_attribute('tm_body_header_helper_out_threshold',$thememountain_body_header_helper_out_threshold,$ignore_dependency).TM_TemplateServices::tm_return_field_data_attribute('tm_body_header_background_color_threshold',$thememountain_body_header_background_color_threshold,$ignore_dependency).TM_TemplateServices::tm_return_field_data_attribute('tm_body_header_compact_threshold',$thememountain_body_header_compact_threshold,$ignore_dependency);

	/**
	 *If data-helper-out-threshold option is not empty or 0, add data-helper-in-threshold and set it to the same value as data-sticky-threshold
	 */
	if(!empty($thememountain_body_header_helper_out_threshold)) {
		TM_NavMenuServices::$nav_menu_header_data_attrs .= " data-helper-in-threshold='{$thememountain_body_header_sticky_threshold}'";
	}

	/* Navigation Color Set */
	if(
		$thememountain_page_options !== FALSE &&
		isset($thememountain_page_options['tm_navigation_menu_deviate']) &&
		$thememountain_page_options['tm_navigation_menu_deviate'] !== '' &&
		isset($thememountain_page_options['tm_navigation_color_set']) &&
		$thememountain_page_options['tm_navigation_color_set'] === 'custom'
	) {
		/** custom settings */
		/* Top, Body Header Border Color */
		$thememountain_page_header_nav_top_header_border_color = $thememountain_page_options['tm_page_header_nav_top_header_border_color'];
		$thememountain_page_header_nav_body_header_border_color = $thememountain_page_options['tm_page_header_nav_body_header_border_color'];

		/* Top Header Navigation Color */
		$thememountain_page_header_nav_default_menu_top_color = $thememountain_page_options['tm_page_header_nav_default_menu_top_color'];
		$thememountain_page_header_nav_default_menu_top_color_hover = $thememountain_page_options['tm_page_header_nav_default_menu_top_color_hover'];
		$thememountain_page_header_nav_default_menu_top_color_current = $thememountain_page_options['tm_page_header_nav_default_menu_top_color_current'];

		/* Body Header */
		$thememountain_page_header_nav_default_menu_body_color = $thememountain_page_options['tm_page_header_nav_default_menu_body_color'];
		$thememountain_page_header_nav_default_menu_body_color_hover = $thememountain_page_options['tm_page_header_nav_default_menu_body_color_hover'];
		$thememountain_page_header_nav_default_menu_body_color_active = $thememountain_page_options['tm_page_header_nav_default_menu_body_color_active'];

		/* Sub Menu */
		/* tm_page_header_nav_default_menu_sub_bkg_color */
		$thememountain_page_header_nav_default_menu_sub_bkg_color =$thememountain_page_options['tm_page_header_nav_default_menu_sub_bkg_color'];
		/* tm_page_header_nav_default_menu_sub_link_color */
		$thememountain_page_header_nav_default_menu_sub_link_color =$thememountain_page_options['tm_page_header_nav_default_menu_sub_link_color'];
		/* Sub Menu Link Hover Color(colorpicker) */
		$thememountain_page_header_nav_default_menu_sub_link_color_hover =$thememountain_page_options['tm_page_header_nav_default_menu_sub_link_color_hover'];
		/* Sub Menu Active Color(colorpicker) */
		$thememountain_page_header_nav_default_menu_sub_link_color_active =$thememountain_page_options['tm_page_header_nav_default_menu_sub_link_color_active'];
		/* tm_page_header_nav_default_menu_sub_link_background_color_hover */
		$thememountain_page_header_nav_default_menu_sub_link_background_color_hover =$thememountain_page_options['tm_page_header_nav_default_menu_sub_link_background_color_hover'];
		/* Mega Sub Menu Border Color (colorpicker) */
		$thememountain_page_header_nav_mega_submenu_border_color = $thememountain_page_options['tm_page_header_nav_mega_submenu_border_color'];

		/* Top Header Background Color & Body Header Background Color */
		$thememountain_page_header_default_menu_top_bkg_color = $thememountain_page_options['tm_page_header_default_menu_top_bkg_color'];
		$thememountain_page_header_default_menu_body_bkg_color = $thememountain_page_options['tm_page_header_default_menu_body_bkg_color'];

		/* Top Header Background Color & Body Header Background Color */
		/** hamburger spec but still needed for mobile menu */
		$thememountain_page_header_logo_hamburger_menu_bkg_color = $thememountain_page_options['tm_page_header_hamburger_menu_bkg_color'];
		$thememountain_page_header_hamberger_menu_icon_color = $thememountain_page_options['tm_page_header_hamberger_menu_icon_color'];
		$thememountain_page_header_hamberger_menu_icon_hover_color = $thememountain_page_options['tm_page_header_hamberger_menu_icon_hover_color'];
		$thememountain_page_header_hamberger_mobile_header_background_color = $thememountain_page_options['tm_page_header_hamberger_mobile_header_background_color'];
		$thememountain_page_header_hamberger_mobile_header_border_color = $thememountain_page_options['tm_page_header_hamberger_mobile_header_border_color'];
	} else {
		/* Top, Body Header Border Color */
		$thememountain_page_header_nav_top_header_border_color = TM_Customizer::tm_get_theme_mod('tm_page_header_nav_top_header_border_color');
		$thememountain_page_header_nav_body_header_border_color = TM_Customizer::tm_get_theme_mod('tm_page_header_nav_body_header_border_color');

		/*Top Header Navigation Color */
		$thememountain_page_header_nav_default_menu_top_color = TM_Customizer::tm_get_theme_mod('tm_page_header_nav_default_menu_top_color');
		$thememountain_page_header_nav_default_menu_top_color_hover = TM_Customizer::tm_get_theme_mod('tm_page_header_nav_default_menu_top_color_hover');
		$thememountain_page_header_nav_default_menu_top_color_current = TM_Customizer::tm_get_theme_mod('tm_page_header_nav_default_menu_top_color_current');

		/* Body Header */
		$thememountain_page_header_nav_default_menu_body_color = TM_Customizer::tm_get_theme_mod('tm_page_header_nav_default_menu_body_color');
		$thememountain_page_header_nav_default_menu_body_color_hover = TM_Customizer::tm_get_theme_mod('tm_page_header_nav_default_menu_body_color_hover');
		$thememountain_page_header_nav_default_menu_body_color_active = TM_Customizer::tm_get_theme_mod('tm_page_header_nav_default_menu_body_color_active');

		/* Sub Menu */
		/* tm_page_header_nav_default_menu_sub_bkg_color */
		$thememountain_page_header_nav_default_menu_sub_bkg_color =TM_Customizer::tm_get_theme_mod('tm_page_header_nav_default_menu_sub_bkg_color');
		/* tm_page_header_nav_default_menu_sub_link_color */
		$thememountain_page_header_nav_default_menu_sub_link_color =TM_Customizer::tm_get_theme_mod('tm_page_header_nav_default_menu_sub_link_color');
		/* Sub Menu Link Hover Color(colorpicker) */
		$thememountain_page_header_nav_default_menu_sub_link_color_hover =TM_Customizer::tm_get_theme_mod('tm_page_header_nav_default_menu_sub_link_color_hover');
		/* Sub Menu Active Color(colorpicker) */
		$thememountain_page_header_nav_default_menu_sub_link_color_active =TM_Customizer::tm_get_theme_mod('tm_page_header_nav_default_menu_sub_link_color_active');
		/* tm_page_header_nav_default_menu_sub_link_background_color_hover */
		$thememountain_page_header_nav_default_menu_sub_link_background_color_hover =TM_Customizer::tm_get_theme_mod('tm_page_header_nav_default_menu_sub_link_background_color_hover');
		/* Mega Sub Menu Border Color (colorpicker) */
		$thememountain_page_header_nav_mega_submenu_border_color =TM_Customizer::tm_get_theme_mod('tm_page_header_nav_mega_submenu_border_color');

		/* Top Header Background Color & Body Header Background Color */
		$thememountain_page_header_default_menu_top_bkg_color = TM_Customizer::tm_get_theme_mod('tm_page_header_default_menu_top_bkg_color');
		$thememountain_page_header_default_menu_body_bkg_color = TM_Customizer::tm_get_theme_mod('tm_page_header_default_menu_body_bkg_color');

		/* Top Header Background Color & Body Header Background Color */
		/** hamburger spec but still needed for mobile menu */
		$thememountain_page_header_logo_hamburger_menu_bkg_color = TM_Customizer::tm_get_theme_mod('tm_page_header_hamburger_menu_bkg_color');
		$thememountain_page_header_hamberger_menu_icon_color = TM_Customizer::tm_get_theme_mod('tm_page_header_hamberger_menu_icon_color');
		$thememountain_page_header_hamberger_menu_icon_hover_color = TM_Customizer::tm_get_theme_mod('tm_page_header_hamberger_menu_icon_hover_color');
		$thememountain_page_header_hamberger_mobile_header_background_color = TM_Customizer::tm_get_theme_mod('tm_page_header_hamberger_mobile_header_background_color');
		$thememountain_page_header_hamberger_mobile_header_border_color = TM_Customizer::tm_get_theme_mod('tm_page_header_hamberger_mobile_header_border_color');
	}

	/** CSS enqueue */
		/* Top, Body Header Border Color */
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_top_header_border_color',$thememountain_page_header_nav_top_header_border_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_body_header_border_color',$thememountain_page_header_nav_body_header_border_color, TRUE);

		/* Top Header Navigation Color */
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_default_menu_top_color',$thememountain_page_header_nav_default_menu_top_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_default_menu_top_color_hover',$thememountain_page_header_nav_default_menu_top_color_hover, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_default_menu_top_color_current',$thememountain_page_header_nav_default_menu_top_color_current, TRUE);

		/* Body Header */
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_default_menu_body_color',$thememountain_page_header_nav_default_menu_body_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_default_menu_body_color_hover',$thememountain_page_header_nav_default_menu_body_color_hover, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_default_menu_body_color_active',$thememountain_page_header_nav_default_menu_body_color_active, TRUE);

		/* Sub Menu */
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_default_menu_sub_bkg_color',$thememountain_page_header_nav_default_menu_sub_bkg_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_default_menu_sub_link_color',$thememountain_page_header_nav_default_menu_sub_link_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_default_menu_sub_link_color_hover',$thememountain_page_header_nav_default_menu_sub_link_color_hover, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_default_menu_sub_link_color_active',$thememountain_page_header_nav_default_menu_sub_link_color_active, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_default_menu_sub_link_background_color_hover',$thememountain_page_header_nav_default_menu_sub_link_background_color_hover, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_mega_submenu_border_color',$thememountain_page_header_nav_mega_submenu_border_color, TRUE);

		/* Top Header Background Color */
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_default_menu_top_bkg_color',$thememountain_page_header_default_menu_top_bkg_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_default_menu_body_bkg_color',$thememountain_page_header_default_menu_body_bkg_color, TRUE);

		/* hamburger specific but still needed for mobile menu  */
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_hamburger_menu_bkg_color',$thememountain_page_header_logo_hamburger_menu_bkg_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_hamberger_menu_icon_color',$thememountain_page_header_hamberger_menu_icon_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_hamberger_menu_icon_hover_color',$thememountain_page_header_hamberger_menu_icon_hover_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_hamberger_mobile_header_background_color',$thememountain_page_header_hamberger_mobile_header_background_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_hamberger_mobile_header_border_color',$thememountain_page_header_hamberger_mobile_header_border_color, TRUE);

	/** logo alignment class */
		if(TM_NavMenuServices::$header_navigation_alignment === 'center') {
			TM_NavMenuServices::$header_navigation_logo_alignment = ' logo-center';
		}
}

/**
 * Customizer settings
 *
 * See default and hamburger config files
 */