<?php
namespace ThemeMountain;

$thememountain_current_theme_style = TM_ThemeServices::get_current_theme_style_id();

/**
 * This is a hidden input field. This needs to be present somewhere in the customizer
 */
TM_Customizer::tm_add_customizer_field('tm_theme_style',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'custom',
		'settings'    => 'tm_theme_style',
		'section'     => 'tm_content_navigation',
		'default'     => '<input type="hidden" value="'.$thememountain_current_theme_style.'">',
		) ));

/**
 * Content Navigation : tm_content_navigation
 */
TM_Customizer::tm_add_customizer_field('tm_show_back_to_top',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'settings' => 'tm_show_back_to_top',
		'label'    => TM_ThemeStrings::$text_strings['customizer']['tm_show_back_to_top'][0],
		'section'  => 'tm_content_navigation',
		'description'  => TM_ThemeStrings::$text_strings['customizer']['tm_show_back_to_top'][1],
		'default'  => 'show',
		'priority' => 10,
		'choices'     => array(
			'show' => TM_ThemeStrings::$text_strings['customizer']['tm_show_back_to_top'][2],
			'hide' => TM_ThemeStrings::$text_strings['customizer']['tm_show_back_to_top'][3],
			),
		) ));

/**
 * Site Identity section (title_tagline)
 */
TM_Customizer::tm_add_customizer_field('tm_copyright_notice',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => TM_ThemeStrings::$text_strings['customizer']['tm_copyright_notice'][0],
		'section'  => 'title_tagline',
		'default'  => TM_ThemeStrings::$text_strings['customizer']['tm_copyright_notice'][1],
		'priority' => 99,
		// 'transport' => 'postMessage',
		) ));

/**
 * Link to privacy policy
 */
TM_Customizer::tm_add_customizer_field('tm_privacy_policy_link',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => TM_ThemeStrings::$text_strings['customizer']['tm_privacy_policy_link'][0],
		'section'  => 'title_tagline',
		'default'  => '',
		'priority' => 99,
		// 'transport' => 'postMessage',
		) ));

/**
 * Link to cookie policy
 */
TM_Customizer::tm_add_customizer_field('tm_cookie_policy_link',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => TM_ThemeStrings::$text_strings['customizer']['tm_cookie_policy_link'][0],
		'section'  => 'title_tagline',
		'default'  => '',
		'priority' => 99,
		// 'transport' => 'postMessage',
		) ));

