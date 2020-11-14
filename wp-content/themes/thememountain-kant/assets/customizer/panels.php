<?php
namespace ThemeMountain;

// strings
$thememountain_customizer_panels_text = TM_ThemeStrings::$text_strings['customizer_panels'];

TM_Customizer::tm_add_customizer_panel('tm_header_settings',array(
		'priority'    => 2,
		'title'       => $thememountain_customizer_panels_text['tm_header_settings'][0],
		'description' => $thememountain_customizer_panels_text['tm_header_settings'][1],
		) );

TM_Customizer::tm_add_customizer_panel('tm_aux_nav_settings',array(
		'priority'    => 2,
		'title'       => $thememountain_customizer_panels_text['tm_aux_nav_settings'][0],
		'description' => '',
		) );

TM_Customizer::tm_add_customizer_panel('tm_content_settings',array(
		'priority'    => 3,
		'title'       => $thememountain_customizer_panels_text['tm_content_settings'][0],
		'description' => $thememountain_customizer_panels_text['tm_content_settings'][1],
		) );

TM_Customizer::tm_add_customizer_panel('tm_footer_settings',array(
		'priority'    => 4,
		'title'       => $thememountain_customizer_panels_text['tm_footer_settings'][0],
		'description' => $thememountain_customizer_panels_text['tm_footer_settings'][1],
		) );
TM_Customizer::tm_add_customizer_panel('tm_form_settings',array(
		'priority'    => 5,
		'title'       => $thememountain_customizer_panels_text['tm_form_settings'][0],
		'description' => $thememountain_customizer_panels_text['tm_form_settings'][1],
		) );
