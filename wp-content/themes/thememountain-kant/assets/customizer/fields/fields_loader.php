<?php
namespace ThemeMountain;

// ThemeStrings - see theme files
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

TM_Customizer::tm_add_customizer_field('tm_loader_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_loader_color'][0],
		'section'     => 'tm_loader',
		'default'     => '#ff4556',
		'priority'    => 10,
				'css_selector'	 => '@keyframes color',
		'css' => '100%%,0%%{stroke:%1$s;border-bottom-color:%1$s;}40%%{stroke:%1$s;border-bottom-color:%1$s;}66%%{stroke:%1$s;border-bottom-color:%1$s;}80%%,90%%{stroke:%1$s;border-bottom-color:%1$s;}',
		) ));

TM_Customizer::tm_add_customizer_field('tm_loader_border_thickness',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'slider',
		'label'       => $thememountain_customizer_str['tm_loader_border_thickness'][0],
		'section'     => 'tm_loader',
		'default'     => 2,
		'choices'     => array(
			'min'  => '0',
			'max'  => '50',
			'step' => '1',
			),
		'priority'    => 10,
		'css_selector'	 => '.tm-loader .stroke',
		'css' => 'stroke-width: %spx;',
		) ));

TM_Customizer::tm_add_customizer_field('tm_loader_size',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'slider',
		'label'       => $thememountain_customizer_str['tm_loader_size'][0],
		'section'     => 'tm_loader',
		'default'     => 4,
		'choices'     => array(
			'min'  => '0',
			'max'  => '10',
			'step' => '1',
			),
		'priority'    => 10,
		'css_selector'	 => '.tm-loader, .tm-loader, .tm-loader #circle',
		'css' => 'width: %1$srem; height: %1$srem;',
		) ));