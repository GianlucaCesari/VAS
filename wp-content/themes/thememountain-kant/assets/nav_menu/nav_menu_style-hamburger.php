<?php
/**
 * This is a nav style config file for default
 *
 * @package ThemeMountain
 * @subpackage thememountain-sartre
 * @since thememountain-sartre 1.0
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

TM_NavMenuServices::add_nav_menu_style_name('hamburger',TM_ThemeStrings::$text_strings['nav_menu_styles']['hamburger']);

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
add_action('tm_nav_style_config_hamburger','ThemeMountain\thememountain_nav_style_config_hamburger');
function thememountain_nav_style_config_hamburger() {
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
		$thememountain_body_header_background_color_threshold = $thememountain_page_options['tm_body_header_background_color_threshold'];
		$thememountain_ignore_dependency = TRUE;
	} else {
		/** customizer settings */
		$thememountain_body_header_background_color_threshold = TM_Customizer::tm_get_theme_mod('tm_body_header_background_color_threshold');
		$thememountain_ignore_dependency = FALSE;
	}
	/**
	 * Set nav menu header data attributes
	 * Blank values are skipped.
	 *
	 * @uses       TM_TemplateServices::tm_return_field_data_attribute()
 	 * @uses       TM_NavMenuServices::$nav_menu_header_data_attrs
	 */
	TM_NavMenuServices::$nav_menu_header_data_attrs = TM_TemplateServices::tm_return_field_data_attribute('tm_body_header_background_color_threshold',$thememountain_body_header_background_color_threshold,$thememountain_ignore_dependency);

	/* Navigation Color Set */
	if(
		$thememountain_page_options !== FALSE &&
		isset($thememountain_page_options['tm_navigation_menu_deviate']) &&
		$thememountain_page_options['tm_navigation_menu_deviate'] !== '' &&
		isset($thememountain_page_options['tm_navigation_color_set']) &&
		$thememountain_page_options['tm_navigation_color_set'] === 'custom'
	) {
		/* Top, Body Header Border Color */
		$thememountain_page_header_nav_top_header_border_color = $thememountain_page_options['tm_page_header_nav_top_header_border_color'];
		$thememountain_page_header_nav_body_header_border_color = $thememountain_page_options['tm_page_header_nav_body_header_border_color'];

		/* Top Header Background Color & Body Header Background Color */
		$thememountain_page_header_default_menu_top_bkg_color = $thememountain_page_options['tm_page_header_default_menu_top_bkg_color'];
		$thememountain_page_header_default_menu_body_bkg_color = $thememountain_page_options['tm_page_header_default_menu_body_bkg_color'];
		/* hamburger specific */
		$thememountain_page_header_logo_hamburger_menu_bkg_color = $thememountain_page_options['tm_page_header_hamburger_menu_bkg_color'];
		$thememountain_page_header_hamberger_menu_icon_color = $thememountain_page_options['tm_page_header_hamberger_menu_icon_color'];
		$thememountain_page_header_hamberger_menu_icon_hover_color = $thememountain_page_options['tm_page_header_hamberger_menu_icon_hover_color'];
		$thememountain_page_header_hamberger_mobile_header_background_color = $thememountain_page_options['tm_page_header_hamberger_mobile_header_background_color'];
		$thememountain_page_header_hamberger_mobile_header_border_color = $thememountain_page_options['tm_page_header_hamberger_mobile_header_border_color'];
	} else {
		/* Top, Body Header Border Color */
		$thememountain_page_header_nav_top_header_border_color = TM_Customizer::tm_get_theme_mod('tm_page_header_nav_top_header_border_color');
		$thememountain_page_header_nav_body_header_border_color = TM_Customizer::tm_get_theme_mod('tm_page_header_nav_body_header_border_color');

		/* Top Header Background Color & Body Header Background Color */
		$thememountain_page_header_default_menu_top_bkg_color = TM_Customizer::tm_get_theme_mod('tm_page_header_default_menu_top_bkg_color');
		$thememountain_page_header_default_menu_body_bkg_color = TM_Customizer::tm_get_theme_mod('tm_page_header_default_menu_body_bkg_color');
		/* hamburger specific */
		$thememountain_page_header_logo_hamburger_menu_bkg_color = TM_Customizer::tm_get_theme_mod('tm_page_header_hamburger_menu_bkg_color');
		$thememountain_page_header_hamberger_menu_icon_color = TM_Customizer::tm_get_theme_mod('tm_page_header_hamberger_menu_icon_color');
		$thememountain_page_header_hamberger_menu_icon_hover_color = TM_Customizer::tm_get_theme_mod('tm_page_header_hamberger_menu_icon_hover_color');
		$thememountain_page_header_hamberger_mobile_header_background_color = TM_Customizer::tm_get_theme_mod('tm_page_header_hamberger_mobile_header_background_color');
		$thememountain_page_header_hamberger_mobile_header_border_color = TM_Customizer::tm_get_theme_mod('tm_page_header_hamberger_mobile_header_border_color');
	}

	/** CSS queue */
		/* Top, Body Header Border Color */
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_top_header_border_color',$thememountain_page_header_nav_top_header_border_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_nav_body_header_border_color',$thememountain_page_header_nav_body_header_border_color, TRUE);

		/* Top Header Background Color */
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_default_menu_top_bkg_color',$thememountain_page_header_default_menu_top_bkg_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_default_menu_body_bkg_color',$thememountain_page_header_default_menu_body_bkg_color, TRUE);

		/* hamburger specific */
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_hamburger_menu_bkg_color',$thememountain_page_header_logo_hamburger_menu_bkg_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_hamberger_menu_icon_color',$thememountain_page_header_hamberger_menu_icon_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_hamberger_menu_icon_hover_color',$thememountain_page_header_hamberger_menu_icon_hover_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_hamberger_mobile_header_background_color',$thememountain_page_header_hamberger_mobile_header_background_color, TRUE);
		TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_page_header_hamberger_mobile_header_border_color',$thememountain_page_header_hamberger_mobile_header_border_color, TRUE);
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

$thememountain_nav_menu_customizer_text = TM_ThemeStrings::$text_strings['nav_menu_customizer'];

	/** See TM_NavMenuServices::preprocess_custom_options_for_nav_menu() where this is eneueued */
	TM_Customizer::tm_add_customizer_field('tm_page_header_hamburger_menu_bkg_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_hamburger_menu_bkg_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => 'rgba(0,0,0,0)',
			'priority'    => 16,
						'do_custom_enqueue' =>	TRUE,
			'css_selector' => '.header-transparent .navigation .navigation-show.nav-icon',
			'css'			=> 'background-color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hamburger','hybrid'),
					),
				),
			) ));

/**
 * "tm_page_header_logo_background_color" (priority set to 18)
 * Only for marquez regular theme style only for now.
 */

	TM_Customizer::tm_add_customizer_field('tm_page_header_hamberger_menu_icon_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_hamberger_menu_icon_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => '#ffffff',
			'priority'    => 20,
						'do_custom_enqueue' =>	TRUE,
			'css_selector'			=> '.header .navigation .navigation-show.nav-icon',
			'css'			=> 'color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hamburger','hybrid'),
					),
				),
			) ));

	/* Hamburger Navigation Hover Color */
	TM_Customizer::tm_add_customizer_field('tm_page_header_hamberger_menu_icon_hover_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_hamberger_menu_icon_hover_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => '#666666',
			'priority'    => 20,
						'do_custom_enqueue' =>	TRUE,
			'css_selector'	=> '.header .navigation .navigation-show.nav-icon:hover',
			'css'			=> 'color: %s !important;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hamburger','hybrid'),
					),
				),
			) ));

	/* Mobile Header Background Color (colorpicker) */
	TM_Customizer::tm_add_customizer_field('tm_page_header_hamberger_mobile_header_background_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_hamberger_mobile_header_background_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => '#FFFFFF',
			'priority'    => 20,
			'do_custom_enqueue' =>	TRUE,
			'css_selector'	=> '@media only screen and (max-width: 960px){.header .header, .header .header-inner, .header.header-transparent .header-inner {%s}}',
			'css'			=> 'background-color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hamburger','hybrid'),
					),
				),
			) ));

	/* Mobile Header Border Color (colorpicker) */
	TM_Customizer::tm_add_customizer_field('tm_page_header_hamberger_mobile_header_border_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_hamberger_mobile_header_border_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => '#FFFFFF',
			'priority'    => 20,
			'do_custom_enqueue' =>	TRUE,
			'css_selector'	=> '@media only screen and (max-width: 960px){.header .header, .header .header-inner,.header.header-transparent .header-inner {%s}}',
			'css'			=> 'border-color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hamburger','hybrid'),
					),
				),
			) ));