<?php
namespace ThemeMountain;

// ThemeStrings - see theme files
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

// Navigation Header
// logo section

TM_Customizer::tm_add_customizer_field('tm_use_top_logo',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'toggle',
		'label'    => $thememountain_customizer_str['tm_use_top_logo'][0],
		'section'  => 'tm_navigation_header_logo',
		'description' => $thememountain_customizer_str['tm_use_top_logo'][1],
		'default'  => 1,
		'priority' => 2,
		) ));

TM_Customizer::tm_add_customizer_field('custom_logo',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'image',
		'label'    => $thememountain_customizer_str['custom_logo'][0],
		'section'  => 'tm_navigation_header_logo',
		'description' => $thememountain_customizer_str['custom_logo'][1],
		'default'  => '',
		'priority' => 2,
		'active_callback'  => array(
			array(
				'setting'  => 'tm_use_top_logo',
				'operator' => '==',
				'value'    => 1,
				),
			)
		) ));
TM_Customizer::tm_add_customizer_field('tm_page_header_logo_common_menu_hover_opacity',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'slider',
		'label'       => $thememountain_customizer_str['tm_page_header_logo_common_menu_hover_opacity'][0],
		'section'     => 'tm_navigation_header_logo',
		'description' => $thememountain_customizer_str['tm_page_header_logo_common_menu_hover_opacity'][1],
		'default'     => 1,
		'priority'    => 10,
		'choices'     => array(
			'min'  => '0.1',
			'max'  => '1',
			'step' => '0.1',
			),
		'css_selector' => '.header .logo a:hover',
		'css'			=> 'opacity: %s !important;',
		) ));

TM_Customizer::tm_add_customizer_field('tm_logo_top_width_hamburger',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'number',
		'label'    => $thememountain_customizer_str['tm_logo_top_width_hamburger'][0],
		'section'  => 'tm_navigation_header_logo',
		'description'  => $thememountain_customizer_str['tm_logo_top_width_hamburger'][1],
		'default'  => 120,
		'css_selector' => '.header .logo',
		'css' => 'width: %spx;',
		'priority' => 10,
		'active_callback'  => array(
			array(
				'setting'  => 'tm_use_top_logo',
				'operator' => '==',
				'value'    => 1,
				),
			array(
				'setting'  => 'tm_header_navigation_type',
				'operator' => '==',
				'value'    => 'hamburger',
				),
			),
		) ));


// logo size (boxed)
	TM_Customizer::tm_add_customizer_field('tm_logo_top_width_default',array (
		TM_ThemeStrings::$theme_id, array(
			'type'     => 'number',
			'label'    => $thememountain_customizer_str['tm_logo_top_width_default'][0],
			'section'  => 'tm_navigation_header_logo',
			'description'  => $thememountain_customizer_str['tm_logo_top_width_default'][1],
			'default'  => '120',
			'css_selector' => '.header .logo',
			'css' => 'width:%spx;',
			'choices'     => array(
				'step' => 1,
				),
			'priority' => 11,
			'active_callback'  => array(
				array(
					'setting'  => 'tm_use_top_logo',
					'operator' => '==',
					'value'    => 1,
					),
				array(
					'setting'  => 'tm_header_navigation_type',
					'operator' => 'contains',
					'value'    => array('default','hybrid'),
					),
				)
			) ));

// body logo
TM_Customizer::tm_add_customizer_field('tm_use_body_logo',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_use_body_logo'][0],
		'section'  => 'tm_navigation_header_logo',
		'description'  => $thememountain_customizer_str['tm_use_body_logo'][1],
		'default'  => 'same_as_top_logo',
		'priority' => 12,
		'choices'     => array(
			'same_as_top_logo' => $thememountain_customizer_str['tm_use_body_logo'][2],
			'differrent_from_top_logo' => $thememountain_customizer_str['tm_use_body_logo'][3],
			'none' => $thememountain_customizer_str['tm_use_body_logo'][4],
			),
		) ));
				// body logo
TM_Customizer::tm_add_customizer_field('tm_logo_body',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'image',
		'label'    => $thememountain_customizer_str['tm_logo_body'][0],
		'section'  => 'tm_navigation_header_logo',
		'description' => $thememountain_customizer_str['tm_logo_body'][1],
		'default'  => '',
		'priority' => 13,
		'active_callback'  => array(
			array(
				'setting'  => 'tm_use_body_logo',
				'operator' => '==',
				'value'    => 'differrent_from_top_logo',
				),
			),
		) ));


TM_Customizer::tm_add_customizer_field('tm_logo_body_width_default',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'number',
		'label'    => $thememountain_customizer_str['tm_logo_body_width_default'][0],
		'section'  => 'tm_navigation_header_logo',
		'description'  => $thememountain_customizer_str['tm_logo_body_width_default'][1],
		'default'  => 95,
		'css_selector' => '.header.header-compact .logo',
		'css' => 'width:%spx;',
		'choices'     => array(
			'step' => 1,
			),
		'priority' => 14,
		'active_callback'  => array(
			array(
				'setting'  => 'tm_use_body_logo',
				'operator' => '==',
				'value'    => 'differrent_from_top_logo',
				),
			array(
				'setting'  => 'tm_header_navigation_type',
				'operator' => 'contains',
				'value'    => array('default','hybrid'),
				),
			),
		) ));

