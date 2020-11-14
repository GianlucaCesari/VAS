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

TM_NavMenuServices::add_nav_menu_style_name('default',TM_ThemeStrings::$text_strings['nav_menu_styles']['default']);

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
add_action('tm_nav_style_config_default','ThemeMountain\thememountain_nav_style_config_default');
function thememountain_nav_style_config_default() {
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
 */

$thememountain_nav_menu_customizer_text = TM_ThemeStrings::$text_strings['nav_menu_customizer'];

TM_Customizer::tm_add_customizer_field('tm_header_navigation_alignment',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_nav_menu_customizer_text['tm_header_navigation_alignment'][0],
		'section'  => 'tm_page_header_nav_appearance',
		'description' => $thememountain_nav_menu_customizer_text['tm_header_navigation_alignment'][1],
		'default'  => 'right',
		'priority' => 12,
		'choices'     => array(
			'left' => $thememountain_nav_menu_customizer_text['tm_header_navigation_alignment'][2],
			'center' => $thememountain_nav_menu_customizer_text['tm_header_navigation_alignment'][3],
			'right' => $thememountain_nav_menu_customizer_text['tm_header_navigation_alignment'][4],
			),
		'active_callback'  => array(
			array(
				'setting'  => 'tm_header_navigation_type',
				'operator' => 'contains',
				'value'    => array('default','hybrid'),
				),
			),
		) ));

TM_Customizer::tm_add_customizer_field('tm_header_width',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_nav_menu_customizer_text['tm_header_width'][0],
		'section'  => 'tm_page_header_nav_appearance',
		'description' => $thememountain_nav_menu_customizer_text['tm_header_width'][1],
		'default'  => 'fixed',
		'priority' => 12,
		'choices'     => array(
			'fixed' => $thememountain_nav_menu_customizer_text['tm_header_width'][2],
			'full' => $thememountain_nav_menu_customizer_text['tm_header_width'][3],
			),
		// 'active_callback'  => array(
		// 	array(
		// 		'setting'  => 'tm_header_navigation_type',
		// 		'operator' => 'contains',
		// 		'value'    => array('default','hybrid'),
		// 		),
		// 	),
		) ));

TM_Customizer::tm_add_customizer_field('tm_header_secondary_navigation_alignment',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_nav_menu_customizer_text['tm_header_secondary_navigation_alignment'][0],
		'section'  => 'tm_page_header_nav_appearance',
		'description' => $thememountain_nav_menu_customizer_text['tm_header_secondary_navigation_alignment'][1],
		'default'  => 'right',
		'priority' => 12,
		'choices'     => array(
			'left' => $thememountain_nav_menu_customizer_text['tm_header_secondary_navigation_alignment'][2],
			'right' => $thememountain_nav_menu_customizer_text['tm_header_secondary_navigation_alignment'][3],
			),
		'active_callback'  => array(
			array(
				'setting'  => 'tm_header_navigation_type',
				'operator' => 'contains',
				'value'    => array('hybrid','hamburger'),
				),
			),
		) ));


/**
 * Top Header Navigation Color
 */
	/** See TM_NavMenuServices::preprocess_custom_options_for_nav_menu() where this is eneueued */
	TM_Customizer::tm_add_customizer_field('tm_page_header_nav_default_menu_top_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_nav_default_menu_top_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => 'rgba(255,255,255,0.6)',
			'priority'    => 12,
						'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.header-transparent .navigation > ul > li > a, .header-transparent .navigation .nav-icon',
			'css' => 'color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hybrid'),
					),
				),
			) ));

	/** See TM_NavMenuServices::preprocess_custom_options_for_nav_menu() where this is eneueued */
	TM_Customizer::tm_add_customizer_field('tm_page_header_nav_default_menu_top_color_hover',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_nav_default_menu_top_color_hover'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => 'rgba(255,255,255,1)',
			'priority'    => 12,
						'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.header-transparent .navigation > ul > li > a:hover, .header-transparent .navigation .nav-icon:hover',
			'css' => 'color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hybrid'),
					),
				),
			) ));

	/** See TM_NavMenuServices::preprocess_custom_options_for_nav_menu() where this is eneueued */
	TM_Customizer::tm_add_customizer_field('tm_page_header_nav_default_menu_top_color_current',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_nav_default_menu_top_color_current'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => 'rgba(255,255,255,1)',
			'priority'    => 12,
						'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.header-transparent .navigation > ul > li.current > a, .header-transparent .navigation > ul > li.current > a:hover, .header-transparent .navigation .nav-icon.active, .header-transparent .navigation .nav-icon.active:hover',
			'css' => 'color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hybrid'),
					),
				),
			) ));

/**
 * Header Nenu Menu Body
 */
	/** See TM_NavMenuServices::preprocess_custom_options_for_nav_menu() where this is eneueued */
	// Body Header Navigation Color
	TM_Customizer::tm_add_customizer_field('tm_page_header_nav_default_menu_body_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_nav_default_menu_body_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => 'rgba(153,153,153,0.6)',
			'priority'    => 12,
						'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.header-background .navigation > ul > li > a,.header-background .navigation .nav-icon,.mobile .header-transparent .navigation .nav-icon {%1$s} @media only screen and (max-width:960px){.header-transparent .navigation .nav-icon {%1$s}}',
			'css' => 'color: %s !important;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hybrid'),
					),
				),
			) ));
	/** See TM_NavMenuServices::preprocess_custom_options_for_nav_menu() where this is eneueued */
	// Body Header Navigation Hover Color
	TM_Customizer::tm_add_customizer_field('tm_page_header_nav_default_menu_body_color_hover',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_nav_default_menu_body_color_hover'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => '#000000',
			'priority'    => 12,
						'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.header-background .navigation > ul > li > a:hover,
.header-background .navigation .nav-icon:hover,.mobile .header-transparent .navigation .nav-icon:hover {%1$s} @media only screen and (max-width:960px){.header-transparent .navigation .nav-icon:hover {%1$s}}',
			'css' => 'color: %s !important;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hybrid'),
					),
				),
			) ));
	/** See TM_NavMenuServices::preprocess_custom_options_for_nav_menu() where this is eneueued */
	TM_Customizer::tm_add_customizer_field('tm_page_header_nav_default_menu_body_color_active',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_nav_default_menu_body_color_active'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => '#000000',
			'priority'    => 12,
						'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.header-background .navigation > ul > li.current > a, .header-background .navigation > ul > li.current > a:hover, .header-background .navigation .nav-icon.active',
			'css' => 'color: %s !important;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hybrid'),
					),
				),
			) ));
	/** Sub Menu */
	TM_Customizer::tm_add_customizer_field('tm_page_header_nav_default_menu_sub_bkg_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_nav_default_menu_sub_bkg_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => '#111111',
			'priority'    => 12,
						'css_selector'	 => '.navigation .sub-menu:not(.custom-content) a, .navigation .sub-menu.custom-content, .navigation .mega-sub-menu, .navigation .dropdown-list',
			'css' => 'background-color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hybrid'),
					),
				),
			) ));
	TM_Customizer::tm_add_customizer_field('tm_page_header_nav_default_menu_sub_link_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_nav_default_menu_sub_link_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => '#888888',
			'priority'    => 12,
						'css_selector'	 => '.navigation .dropdown-list:not(.custom-content) li a:not(.button), .navigation .sub-menu li a:not(.button), .navigation .mega-sub-menu ul li a:not(.button), .navigation .dropdown-list li a:not(.button)',
			'css' => 'color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hybrid'),
					),
				),
			) ));

	/* Sub Menu Link Hover Color(colorpicker) */
	TM_Customizer::tm_add_customizer_field('tm_page_header_nav_default_menu_sub_link_color_hover',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_nav_default_menu_sub_link_color_hover'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => '#ffffff',
			'priority'    => 12,
						'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.navigation .sub-menu li.current>a:not(.button),.navigation .sub-menu li.current>a:not(.button):hover,.navigation .sub-menu li > a:not(.button):hover,.navigation .mega-sub-menu ul li > a:not(.button):hover,.navigation .mega-sub-menu ul li.current > a:not(.button):hover,.navigation .dropdown-list li > a:not(.button):hover,.navigation .cart-overview .product-title:hover,.navigation .cart-overview .product-remove:hover,.navigation .dropdown-list li>a:not(.button):hover',
			'css' => 'color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hybrid'),
					),
				),
			) ));
	/* Sub Menu Link Active Color(colorpicker) */
	TM_Customizer::tm_add_customizer_field('tm_page_header_nav_default_menu_sub_link_color_active',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_nav_default_menu_sub_link_color_active'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => '#ffffff',
			'priority'    => 12,
						'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.navigation .mega-sub-menu >li.current>a:not(.button),.navigation .mega-sub-menu > li.current>a:not(.button):hover,.navigation .mega-sub-menu > li>a:not(.button):hover,.navigation .sub-menu li.current > a:not(.button),.navigation .dropdown-list li.current > a:not(.button),.navigation .mega-sub-menu ul li.current > a:not(.button)',
			'css' => 'color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hybrid'),
					),
				),
			) ));

	TM_Customizer::tm_add_customizer_field('tm_page_header_nav_default_menu_sub_link_background_color_hover',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_nav_default_menu_sub_link_background_color_hover'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => '#000000',
			'priority'    => 12,
						'css_selector'	 => '.navigation .sub-menu:not(.custom-content) li.current > a, .navigation .sub-menu:not(.custom-content) li:hover > a, .navigation .mega-sub-menu:not(.custom-content) ul li:hover > a, .navigation .dropdown-list:not(.custom-content) li:hover a',
			'css' => 'background-color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hybrid'),
					),
				),
			) ));

	// Mega Sub Menu Border Color (colorpicker)
	TM_Customizer::tm_add_customizer_field('tm_page_header_nav_mega_submenu_border_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_nav_mega_submenu_border_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => '#303030',
			'priority'    => 12,
			'css_selector'	 => '.navigation .mega-sub-menu>li',
			'css' => 'border-color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hybrid'),
				),
			),
		) ));

	/** See TM_NavMenuServices::preprocess_custom_options_for_nav_menu() where this is eneueued */
	TM_Customizer::tm_add_customizer_field('tm_page_header_default_menu_top_bkg_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_default_menu_top_bkg_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => 'rgba(255,255,255,0)',
			'priority'    => 12,
						'do_custom_enqueue' =>	TRUE,
			'css_selector' => '.header .header-inner, .header-transparent .header-inner',
			'css'			=> 'background-color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => '!==',
					'value'    => 'hide',
					),
				),
			) ));
	/** See TM_NavMenuServices::preprocess_custom_options_for_nav_menu() where this is eneueued */
	TM_Customizer::tm_add_customizer_field('tm_page_header_default_menu_body_bkg_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_nav_menu_customizer_text['tm_page_header_default_menu_body_bkg_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'description' => $thememountain_nav_menu_customizer_text['tm_page_header_default_menu_body_bkg_color'][1],
			'default'     => '#ffffff',
			'priority'    => 12,
						'do_custom_enqueue' =>	TRUE,
			'css_selector' => '.header-background .header-inner',
			'css'			=> 'background-color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => '!==',
					'value'    => 'hide',
					),
				),
			) ));