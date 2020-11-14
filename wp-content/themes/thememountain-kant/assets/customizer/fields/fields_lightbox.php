<?php
namespace ThemeMountain;
/**
 * Lightbox color settings (section: tm_light_box)
 * @package ThemeMountain
 * @subpackage Core/marquez-by-thememountain/customizer/fields
 * @since 	1.0
 */

// ThemeStrings - see theme files
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

/**
 * Lightbox Overlay Background Color (colorpicker)
 * Default: rgba(255,255,255,1);
 *
 * Targeting:
 *
 * .tm-lightbox {
 * 		background-color: rgba(255,255,255,1);
 * }
 */
TM_Customizer::tm_add_customizer_field('tm_lightbox_overlay_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_lightbox_overlay_background_color'][0],
		'section'     => 'tm_light_box',
		'default'     => 'rgba(255,255,255,1)',
		'priority'    => 10,
				'css_selector'	 => '.tm-lightbox',
		'css' => 'background-color: %s;',
		) ));

/**
 * Lightbox Navigation Color (colorpicker)
 * Default: rgba(0,0,0,0.4);
 *
 * Targeting:
 *
 * .tml-nav {
 * 		color: rgba(0,0,0,0.4);
 * }
 */
TM_Customizer::tm_add_customizer_field('tm_lightbox_navigation_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_lightbox_navigation_color'][0],
		'section'     => 'tm_light_box',
		'default'     => 'rgba(0,0,0,0.4)',
		'priority'    => 10,
				'css_selector'	 => '.tml-nav',
		'css' => 'color: %s;',
		) ));

/**
 * Lightbox Caption Background Color (colorpicker)
 * Default: rgba(255,255,255,1);
 *
 * Targeting:
 *
 * #tml-caption span {
 * 		background-color: rgba(255,255,255,1);
 * }
 */
TM_Customizer::tm_add_customizer_field('tm_lightbox_caption_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_lightbox_caption_background_color'][0],
		'section'     => 'tm_light_box',
		'default'     => 'rgba(255,255,255,1)',
		'priority'    => 10,
				'css_selector'	 => '#tml-caption span',
		'css' => 'background-color: %s;',
		) ));

/**
 * Lightbox Caption Color (colorpicker)
 * Default: #232323;
 *
 * Targeting:
 *
 * #tml-caption span　{
 * 		color: #232323;
 * }
 */
TM_Customizer::tm_add_customizer_field('tm_lightbox_caption_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_lightbox_caption_color'][0],
		'section'     => 'tm_light_box',
		'default'     => '#232323',
		'priority'    => 10,
				'css_selector'	 => '#tml-caption span',
		'css' => 'color: %s;',
		) ));
