<?php
namespace ThemeMountain;

// strings
$thememountain_customizer_sections_text = TM_ThemeStrings::$text_strings['customizer_sections'];

// Navigation Header
TM_Customizer::tm_add_customizer_section('tm_preheader_settings',array(
		'title'       => $thememountain_customizer_sections_text['tm_preheader_settings'][0],
		'priority'    => 2,
		'panel'       => 'tm_header_settings',
		'description' => '',
		) );
TM_Customizer::tm_add_customizer_section('tm_navigation_header_logo',array(
		'title'       => $thememountain_customizer_sections_text['tm_navigation_header_logo'][0],
		'priority'    => 4,
		'panel'       => 'tm_header_settings',
		'description' => '',
		) );
// Header Appearance
TM_Customizer::tm_add_customizer_section('tm_page_header_appearance',array(
		'title'       => $thememountain_customizer_sections_text['tm_page_header_appearance'][0],
		'priority'    => 6,
		'panel'       => 'tm_header_settings',
		'description' => '',
		) );
// Header Navigation Appearance
TM_Customizer::tm_add_customizer_section('tm_page_header_nav_appearance',array(
		'title'       => $thememountain_customizer_sections_text['tm_page_header_nav_appearance'][0],
		'priority'    => 8,
		'panel'       => 'tm_header_settings',
		'description' => $thememountain_customizer_sections_text['tm_page_header_nav_appearance'][1],
		) );
// Header Buttons
TM_Customizer::tm_add_customizer_section('tm_page_header_button_appearance',array(
		'title'       => $thememountain_customizer_sections_text['tm_page_header_button_appearance'][0],
		'priority'    => 10,
		'panel'       => 'tm_header_settings',
		'description' => '',
		) );
// Site Search
TM_Customizer::tm_add_customizer_section('tm_page_header_site_search_appearance',array(
		'title'       => $thememountain_customizer_sections_text['tm_page_header_site_search_appearance'][0],
		'priority'    => 10,
		'panel'       => 'tm_header_settings',
		'description' => '',
		) );

// Overlay Navigation
TM_Customizer::tm_add_customizer_section('tm_overlay_nav_settings',array(
		'title'       => $thememountain_customizer_sections_text['tm_overlay_nav_settings'][0],
		'priority'    => 2,
		'panel'       => 'tm_aux_nav_settings',
		'description' => '',
		) );
TM_Customizer::tm_add_customizer_section('tm_off_canvas_nav_settings',array(
		'title'       => $thememountain_customizer_sections_text['tm_off_canvas_nav_settings'][0],
		'priority'    => 6,
		'panel'       => 'tm_aux_nav_settings',
		'description' => '',
		) );

// Content Layout Settings
// TM_Customizer::tm_add_customizer_section('tm_language_settings',array(
// 		'title'       => $thememountain_customizer_sections_text['tm_language_settings'][0],
// 		'priority'    => 2,
// 		'panel'       => 'tm_content_settings',
// 		'description' => '',
// 		) );
TM_Customizer::tm_add_customizer_section('tm_content_font_settings',array(
		'title'       => $thememountain_customizer_sections_text['tm_content_font_settings'][0],
		'priority'    => 2,
		'panel'       => 'tm_content_settings',
		'description' => '',
		) );
TM_Customizer::tm_add_customizer_section('tm_content_navigation',array(
		'title'       => $thememountain_customizer_sections_text['tm_content_navigation'][0],
		'priority'    => 4,
		'panel'       => 'tm_content_settings',
		'description' => '',
		) );
// Content Body Color
TM_Customizer::tm_add_customizer_section('tm_content_body',array(
		'title'       => $thememountain_customizer_sections_text['tm_content_body'][0],
		'priority'    => 6,
		'panel'       => 'tm_content_settings',
		'description' => $thememountain_customizer_sections_text['tm_content_body'][1],
		) );

// home / global
TM_Customizer::tm_add_customizer_section('tm_layout_home',array(
		'title'       => $thememountain_customizer_sections_text['tm_layout_home'][0],
		'priority'    => 8,
		'panel'       => 'tm_content_settings',
		'description' => $thememountain_customizer_sections_text['tm_layout_home'][1],
		) );
// single post
TM_Customizer::tm_add_customizer_section('tm_layout_post',array(
		'title'       => $thememountain_customizer_sections_text['tm_layout_post'][0],
		'priority'    => 10,
		'panel'       => 'tm_content_settings',
		'description' => $thememountain_customizer_sections_text['tm_layout_post'][1],
		) );
TM_Customizer::tm_add_customizer_section('tm_layout_page',array(
		'title'       => $thememountain_customizer_sections_text['tm_layout_page'][0],
		'priority'    => 12,
		'panel'       => 'tm_content_settings',
		'description' => $thememountain_customizer_sections_text['tm_layout_page'][1],
		) );
TM_Customizer::tm_add_customizer_section('tm_layout_tm_folio',array(
		'title'       => $thememountain_customizer_sections_text['tm_layout_tm_folio'][0],
		'priority'    => 14,
		'panel'       => 'tm_content_settings',
		'description' => $thememountain_customizer_sections_text['tm_layout_tm_folio'][1],
		) );
TM_Customizer::tm_add_customizer_section('tm_layout_404',array(
		'title'       => $thememountain_customizer_sections_text['tm_layout_404'][0],
		'priority'    => 16,
		'panel'       => 'tm_content_settings',
		'description' => $thememountain_customizer_sections_text['tm_layout_404'][1],
		) );

if(function_exists('is_shop') === TRUE) {
	TM_Customizer::tm_add_customizer_section('tm_layout_shop',array(
		'title'       => $thememountain_customizer_sections_text['tm_layout_shop'][0],
		'priority'    => 17,
		'panel'       => 'tm_content_settings',
		'description' => $thememountain_customizer_sections_text['tm_layout_shop'][1],
		) );
}

// Index Pages
TM_Customizer::tm_add_customizer_section('tm_layout_archive',array(
		'title'       => $thememountain_customizer_sections_text['tm_layout_archive'][0],
		'priority'    => 18,
		'panel'       => 'tm_content_settings',
		'description' => $thememountain_customizer_sections_text['tm_layout_archive'][1],
		) );
TM_Customizer::tm_add_customizer_section('tm_layout_category',array(
		'title'       => $thememountain_customizer_sections_text['tm_layout_category'][0],
		'priority'    => 20,
		'panel'       => 'tm_content_settings',
		'description' => $thememountain_customizer_sections_text['tm_layout_category'][1],
		) );
TM_Customizer::tm_add_customizer_section('tm_layout_search',array(
		'title'       => $thememountain_customizer_sections_text['tm_layout_search'][0],
		'priority'    => 22,
		'panel'       => 'tm_content_settings',
		'description' => $thememountain_customizer_sections_text['tm_layout_search'][1],
		) );
TM_Customizer::tm_add_customizer_section('tm_layout_author',array(
		'title'       => $thememountain_customizer_sections_text['tm_layout_author'][0],
		'priority'    => 24,
		'panel'       => 'tm_content_settings',
		'description' => $thememountain_customizer_sections_text['tm_layout_author'][1],
		) );
TM_Customizer::tm_add_customizer_section('tm_light_box',array(
		'title'       => $thememountain_customizer_sections_text['tm_light_box'][0],
		'priority'    => 26,
		'panel'       => 'tm_content_settings',
		'description' => '',
		) );
TM_Customizer::tm_add_customizer_section('tm_loader',array(
		'title'       => $thememountain_customizer_sections_text['tm_loader'][0],
		'priority'    => 28,
		'panel'       => 'tm_content_settings',
		'description' => '',
		) );

/**
 * Footer Settings sections
 */
TM_Customizer::tm_add_customizer_section('tm_footer_columns',array(
		'title'       => $thememountain_customizer_sections_text['tm_footer_columns'][0],
		'priority'    => 2,
		'panel'       => 'tm_footer_settings',
		'description' => '',
		) );
TM_Customizer::tm_add_customizer_section('tm_footer_color',array(
		'title'       => $thememountain_customizer_sections_text['tm_footer_color'][0],
		'priority'    => 4,
		'panel'       => 'tm_footer_settings',
		'description' => '',
		) );
TM_Customizer::tm_add_customizer_section('tm_footer_form_color',array(
		'title'       => $thememountain_customizer_sections_text['tm_footer_form_color'][0],
		'priority'    => 6,
		'panel'       => 'tm_footer_settings',
		'description' => '',
		) );

/**
 * Form
 */
TM_Customizer::tm_add_customizer_section('tm_cf7_border_style_section',array(
		'title'       => $thememountain_customizer_sections_text['tm_cf7_border_style_section'][0],
		'priority'    => 2,
		'panel'       => 'tm_form_settings',
		'description' => $thememountain_customizer_sections_text['tm_cf7_border_style_section'][1],
		) );
TM_Customizer::tm_add_customizer_section('tm_cf7_color',array(
		'title'       => $thememountain_customizer_sections_text['tm_cf7_color'][0],
		'priority'    => 2,
		'panel'       => 'tm_form_settings',
		'description' => $thememountain_customizer_sections_text['tm_cf7_color'][1],
		) );
TM_Customizer::tm_add_customizer_section('tm_theme_form_color',array(
		'title'       => $thememountain_customizer_sections_text['tm_theme_form_color'][0],
		'priority'    => 4,
		'panel'       => 'tm_form_settings',
		'description' => $thememountain_customizer_sections_text['tm_theme_form_color'][1],
		) );