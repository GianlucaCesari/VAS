<?php
namespace ThemeMountain;
/**
 * Site Search Appeaeance Settings (section: tm_page_header_site_search_appearance)
 * @package ThemeMountain
 * @since 	March 2018
 */

// ThemeStrings - see theme files
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

// Search Modal Overlay Background Color (colorpicker)
TM_Customizer::tm_add_customizer_field('tm_search_modal_overlay_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_search_modal_overlay_background_color'][0],
		'section'     => 'tm_page_header_site_search_appearance',
		'default'     => 'rgba(255,255,255,0.9)',
		'priority'    => 2,
		'css_selector'	 => '#tm-lightbox.tml-search-modal',
		'css' => 'background-color: %s;',
		) ));

// Search Modal Form Placeholder Color (colorpicker)
TM_Customizer::tm_add_customizer_field('tm_search_modal_form_placeholder_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_search_modal_form_placeholder_color'][0],
		'section'     => 'tm_page_header_site_search_appearance',
		'default'     => '#000',
		'priority'    => 4,
		'css_selector'	 => array(
				'.tml-search-modal .form-element::-webkit-input-placeholder',
				'.tml-search-modal .form-element:focus::-webkit-input-placeholder',
				'.tml-search-modal .form-element::-moz-placeholder',
				'.tml-search-modal .form-element:focus::-moz-placeholder',
				'.tml-search-modal .form-element:-ms-input-placeholder',
				'.tml-search-modal .form-element:focus:-ms-input-placeholder',
			),
		'css' => 'color: %s !important;',
		) ));

// Search Modal Form Focus Text Color(colorpicker)
TM_Customizer::tm_add_customizer_field('tm_search_modal_form_focus_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_search_modal_form_focus_color'][0],
		'section'     => 'tm_page_header_site_search_appearance',
		'default'     => '#000',
		'priority'    => 6,
		'css_selector'	 => '.tml-search-modal .form-search,.tml-search-modal .form-search:focus',
		'css' => 'color: %s;',
		) ));

// Search Modal Close Link Color(colorpicker)
TM_Customizer::tm_add_customizer_field('tm_search_modal_close_link_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_search_modal_close_link_color'][0],
		'section'     => 'tm_page_header_site_search_appearance',
		'default'     => '#000',
		'priority'    => 8,
		'css_selector'	 => '.tml-search-modal .tml-aux-exit',
		'css' => 'color: %s;',
		) ));