<?php
/**
 * This is a nav style config file for hidden nav menu
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

TM_NavMenuServices::add_nav_menu_style_name('hide',TM_ThemeStrings::$text_strings['nav_menu_styles']['hide']);

/**
 * Set up custom options for header. Namely the nav menu.
 *
 * Add inline CSS into the header for custom settings. Selects correct classes.
 *
 * @since 1.0
 * @access public
 *
 * @see        TM_NavMenuServices::preprocess_custom_options_for_nav_menu() This method is called by the method.
 */
add_action('tm_nav_style_config_hide','ThemeMountain\thememountain_nav_style_config_hide');
function thememountain_nav_style_config_hide() {
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
		$thememountain_tm_body_header_background_color_threshold = $thememountain_page_options['tm_body_header_background_color_threshold'];
		$thememountain_ignore_dependency = TRUE;
	} else {
		/** customizer settings */
		$thememountain_tm_body_header_background_color_threshold = TM_Customizer::tm_get_theme_mod('tm_body_header_background_color_threshold');
		$thememountain_ignore_dependency = FALSE;
	}
	/**
	 * Set nav menu header data attributes
	 * Blank values are skipped.
	 *
	 * @uses       TM_TemplateServices::tm_return_field_data_attribute()
 	 * @uses       TM_NavMenuServices::$nav_menu_header_data_attrs
	 */
	TM_NavMenuServices::$nav_menu_header_data_attrs = TM_TemplateServices::tm_return_field_data_attribute('tm_body_header_background_color_threshold',$thememountain_tm_body_header_background_color_threshold,$thememountain_ignore_dependency);

	/*
	 * Menu width handling (for hamburger only) is taken care of as well as loader margin css queue.
	 */
	$thememountain_logo_top_width_hamburger = TM_Customizer::tm_get_theme_mod('tm_logo_top_width_hamburger');
	$thememountain_logo_top_animation_distance = $thememountain_logo_top_width_hamburger * -1;
		TM_StyleAndScripts::tm_add_inline_css_head(".header.header-background .logo a:first-child, .header.header-background .logo a:last-child { transform: translateX({$thememountain_logo_top_animation_distance}px); }");
}

/**
 * Customizer settings
 */
