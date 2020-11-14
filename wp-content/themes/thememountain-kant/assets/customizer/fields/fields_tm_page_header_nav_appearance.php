<?php
namespace ThemeMountain;

// ThemeStrings - see theme files
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

/**
 * Page Header Navigation Appearance (tm_page_header_nav_appearance)
 */

// common settings for all the styles
TM_Customizer::tm_add_customizer_field('tm_header_navigation_type',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_header_navigation_type'][0],
		'section'  => 'tm_page_header_nav_appearance',
		'description' => $thememountain_customizer_str['tm_header_navigation_type'][1],
		'default'  => TM_NavMenuServices::get_default_nav_menu_style(),
		'priority' => 10,
		'choices'     => TM_NavMenuServices::get_available_nav_menu_styles(),
		) ));

/**
 * These options are used for multiple nav styles
 */
	/** See TM_NavMenuServices::preprocess_custom_options_for_nav_menu() where this is eneueued */
	TM_Customizer::tm_add_customizer_field('tm_page_header_nav_top_header_border_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_customizer_str['tm_page_header_nav_top_header_border_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => 'rgba(255,255,255,0.2)',
			'priority'    => 14,
						'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.header-transparent .header-inner > .nav-bar',
			'css' => 'border-bottom-color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hamburger','hybrid'),
					),
				),
			) ));

	TM_Customizer::tm_add_customizer_field('tm_page_header_nav_body_header_border_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_customizer_str['tm_page_header_nav_body_header_border_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => 'rgba(255,255,255,0.2)',
			'priority'    => 14,
			'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.header-background .header-inner, .header-background .header-inner > .nav-bar',
			'css' => 'border-bottom-color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hamburger','hybrid'),
					),
				),
			) ));

/**
 * Header Cart Badge Color settings
 */

	// Header Cart Badge Bkg Color (colorpicker)
	TM_Customizer::tm_add_customizer_field('tm_page_header_cart_badge_background_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_customizer_str['tm_page_header_cart_badge_background_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => '',
			'priority'    => 22,
			'css_selector'	=> '.header .cart .badge',
			'css'			=> 'background-color: %s;',
			) ));

	// Header Cart Badge Color (colorpicker)
	TM_Customizer::tm_add_customizer_field('tm_page_header_cart_badge_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_customizer_str['tm_page_header_cart_badge_color'][0],
			'section'     => 'tm_page_header_nav_appearance',
			'default'     => '',
			'priority'    => 22,
			'css_selector'	=> '.header .cart .badge',
			'css'			=> 'color: %s;',
			) ));

/**
 * All the rest of configs are queued in the nav menu style config files
 *
 * @see        TM_NavMenuServices class
 */
