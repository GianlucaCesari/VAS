<?php
namespace ThemeMountain;

// ThemeStrings - see theme files
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

/**
 * The followins are included in TM_ThemeServices::on_init()
 * The default values are set in TM_Customizer::setup_kirki()
 */

/**
 * THEME FORM Color settings
 */

// Form Background Color
TM_Customizer::tm_add_customizer_field('tm_theme_form_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_theme_form_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_theme_form_color',
		'default'     => '#fafafa',
		'priority'    => 10,
				'css_selector' => '.form-element',
		'css'			=> 'background-color: %s;',
		) ));

// Form Border Color
TM_Customizer::tm_add_customizer_field('tm_theme_form_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_theme_form_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_theme_form_color',
		'default'     => 'rgba(2552,552,255,0)',
		'priority'    => 10,
				'css_selector' => '.form-element',
		'css'			=> 'border-color: %s;',
		) ));

// Form Placeholder Color
TM_Customizer::tm_add_customizer_field('tm_theme_form_placeholder_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_theme_form_placeholder_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_theme_form_color',
		'default'     => '#666',
		'priority'    => 10,
		'css_selector' => array(
			'.form-element::-webkit-input-placeholder',
			'.form-element::-moz-placeholder',
			'.form-element:-ms-input-placeholder',
		),
		'css' => 'color: %s;',
		) ));

// Form Placeholder Focus Color
TM_Customizer::tm_add_customizer_field('tm_theme_form_placeholder_focus_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_theme_form_placeholder_focus_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_theme_form_color',
		'default'     => '#000',
		'priority'    => 10,
		'css_selector' => array(
			'.form-element:focus::-webkit-input-placeholder',
			'.form-element:focus::-moz-placeholder',
			'.form-element:focus:-ms-input-placeholder',
		),
		'css' => 'color: %s !important;',
		) ));

// Form Focus Background Color
TM_Customizer::tm_add_customizer_field('tm_theme_form_focus_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_theme_form_focus_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_theme_form_color',
		'default'     => '#f4f4f4',
		'priority'    => 10,
				'css_selector' => '.form-element:focus',
		'css' => 'background-color: %s;',
		) ));

// Form Focus Border Color
TM_Customizer::tm_add_customizer_field('tm_theme_form_focus_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_theme_form_focus_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_theme_form_color',
		'default'     => 'rgba(2552,552,255,0)',
		'priority'    => 10,
				'css_selector' => '.form-element:focus',
		'css'			=> 'border-color: %s;',
		) ));

// Form Focus Text Color
TM_Customizer::tm_add_customizer_field('tm_theme_form_focus_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_theme_form_focus_text_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_theme_form_color',
		'default'     => '#000',
		'priority'    => 10,
				'css_selector' => '.form-element:focus',
		'css'			=> 'color: %s;',
		) ));

// Form Submit Background Color
TM_Customizer::tm_add_customizer_field('tm_theme_form_submit_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_theme_form_submit_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_theme_form_color',
		'default'     => '#000',
		'priority'    => 10,
				'css_selector' => 'input[type=submit]',
		'css'			=> 'background-color: %s;',
		) ));

// Form Submit Border Color
TM_Customizer::tm_add_customizer_field('tm_theme_form_submit_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_theme_form_submit_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_theme_form_color',
		'default'     => '#000',
		'priority'    => 10,
				'css_selector' => 'input[type=submit]',
		'css'			=> 'border-color: %s;',
		) ));

// Form Submit Text Color
TM_Customizer::tm_add_customizer_field('tm_theme_form_submit_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_theme_form_submit_text_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_theme_form_color',
		'default'     => '#fff',
		'priority'    => 10,
				'css_selector' => 'input[type=submit]',
		'css'			=> 'color: %s;',
		) ));

// Form Submit Hover Background Color
TM_Customizer::tm_add_customizer_field('tm_theme_form_submit_hover_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_theme_form_submit_hover_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_theme_form_color',
		'default'     => '#ff4556',
		'priority'    => 10,
				'css_selector' => 'input[type=submit]:hover',
		'css'			=> 'background-color: %s;',
		) ));

// Form Submit Hover Border Color
TM_Customizer::tm_add_customizer_field('tm_theme_form_submit_hover_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_theme_form_submit_hover_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_theme_form_color',
		'default'     => '#ff4556',
		'priority'    => 10,
				'css_selector' => 'input[type=submit]:hover',
		'css'			=> 'border-color: %s;',
		) ));

// Form Submit Hover Text Color
TM_Customizer::tm_add_customizer_field('tm_theme_form_submit_hover_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_theme_form_submit_hover_text_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_theme_form_color',
		'default'     => '#fff',
		'priority'    => 10,
				'css_selector' => 'input[type=submit]:hover',
		'css'			=> 'color: %s;',
		) ));

