<?php
namespace ThemeMountain;
/**
 * Overlay Nav Settings (section: tm_overlay_nav_settings)
 * @package ThemeMountain
 * @subpackage Core/marquez-by-thememountain/customizer/fields
 * @since 	1.0
 */

// ThemeStrings - see theme files
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

/**
 * Add Overlay navigation alignment option to customiser and to custom options for pages/posts > navigation #424
 */
TM_Customizer::tm_add_customizer_field('tm_overlay_nav_menu_alignment',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_overlay_nav_menu_alignment'][0],
		'section'  => 'tm_overlay_nav_settings',
		'description' => $thememountain_customizer_str['tm_overlay_nav_menu_alignment'][1],
		'default'  => 'left',
		'priority' => 9,
		'choices'     => array(
			'left' => $thememountain_customizer_str['tm_overlay_nav_menu_alignment'][2],
			'center' => $thememountain_customizer_str['tm_overlay_nav_menu_alignment'][3],
			'right' => $thememountain_customizer_str['tm_overlay_nav_menu_alignment'][4],
			),
		) ));

/**
 * Add options to hide overlay nav menu titles #425
 */
TM_Customizer::tm_add_customizer_field('tm_overlay_menu_title_display',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_overlay_menu_title_display'][0],
		'section'  => 'tm_overlay_nav_settings',
		'description' => $thememountain_customizer_str['tm_overlay_menu_title_display'][1],
		'default'  => 'show',
		'priority' => 9,
		'choices'     => array(
			'show' => $thememountain_customizer_str['tm_overlay_menu_title_display'][2],
			'hide' => $thememountain_customizer_str['tm_overlay_menu_title_display'][3],
			),
		) ));
/** Please add a Overlay Secondary Menu Title Display like we have for Off-screen navigation #430 */
TM_Customizer::tm_add_customizer_field('tm_secondary_overlay_title_display',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_secondary_overlay_title_display'][0],
		'section'  => 'tm_overlay_nav_settings',
		'description' => $thememountain_customizer_str['tm_secondary_overlay_title_display'][1],
		'default'  => 'show',
		'priority' => 9,
		'choices'     => array(
			'show' => $thememountain_customizer_str['tm_secondary_overlay_title_display'][2],
			'hide' => $thememountain_customizer_str['tm_secondary_overlay_title_display'][3],
			),
		) ));


/**
 * Overlay Background Color (colorpicker)
 * Default: rgba(255,255,255,1);
 *
 * Targeting:
 *
 * .overlay-navigation-wrapper {
 * 		background-color: rgba(255,255,255,1);
 * }
 */
TM_Customizer::tm_add_customizer_field('tm_overlay_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_background_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => 'rgba(255,255,255,1)',
		'priority'    => 9,
				'css_selector'	 => '.overlay-navigation-wrapper',
		'css' => 'background-color: %s;',
		) ));

/**
 * Overlay Exit Button Color (colorpicker)
 * Default: #ff4556;
 *
 * Targeting:
 *
 * .overlay-navigation-wrapper .navigation-hide a {
 * 		color: #ff4556;
 * }
 */
TM_Customizer::tm_add_customizer_field('tm_overlay_exit_button_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_exit_button_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '#ff4556',
		'priority'    => 9,
		'css_selector'	 => '.overlay-navigation-wrapper .navigation-hide a',
		'css' => 'color: %s;',
		) ));

/**
 * Overlay Exit Button Hover Color (colorpicker)
 * Default: #000;
 *
 * Targeting:
 *
 * .overlay-navigation-wrapper .navigation-hide a:hover {
 * 		color: #000;
 * }
 */
TM_Customizer::tm_add_customizer_field('tm_overlay_exit_button_color_hover',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_exit_button_color_hover'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '#000',
		'priority'    => 10,
				'css_selector'	 => '.overlay-navigation-wrapper .navigation-hide a:hover',
		'css' => 'color: %s;',
		) ));

/**
 * Overlay Navigation Title Color (colorpicker)
 * Default: #000;
 *
 * Targeting:
 *
 * .overlay-navigation-wrapper .menu-title {
 * 		color: #000;
 * }
 */
TM_Customizer::tm_add_customizer_field('tm_overlay_nav_title_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_nav_title_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '#000',
		'priority'    => 10,
				'css_selector'	 => '.overlay-navigation-wrapper .menu-title',
		'css' => 'color: %s;',
		) ));

/**
 * Overlay Navigation Copyright Color (colorpicker)
 * Default: #666;
 *
 * Targeting:
 *
 * .overlay-navigation-footer,
 * .overlay-navigation-footer .social-list a {
 * 		color: #666;
 * }
 */
TM_Customizer::tm_add_customizer_field('tm_overlay_nav_copyright_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_nav_copyright_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '#666',
		'priority'    => 10,
				'css_selector'	 => '.overlay-navigation-footer, .overlay-navigation-footer .social-list a',
		'css' => 'color: %s;',
		) ));

/**
 * Overlay Navigation Animation (select)
 * Default: scale-in;
 *
 * @see        ThemeMountain/TM_NavMenuServices::preprocess_custom_options_for_nav_menu()
 *
 * Values:
 *
 * Slide in Top
 * Slide in Right
 * Slide in Bottom
 * Slide in Left
 * Scale In
 *
 * Define animation through the data-animation attribute on the div.overlay-navigation-wrapper (slide-in or scale-in), for ex:
 * 		div.overlay-navigation-wrapper[data-no-scrollbar][data-animation="scale-in"]
 *
 * Classes (conditional to values)
 *
 * If Overlay Navigation === Slide In Top, add the class .enter-top to div.overlay-navigation-wrapper
 * If Overlay Navigation === Slide In Right, add the class .enter-right to div.overlay-navigation-wrapper
 * If Overlay Navigation === Slide In Bottom, add the class .enter-bottom to div.overlay-navigation-wrapper
 * If Overlay Navigation === Slide In Left, add the class .enter-left to div.overlay-navigation-wrapper
 */
TM_Customizer::tm_add_customizer_field('tm_overlay_nav_animation',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_overlay_nav_animation'][0],
		'description' => $thememountain_customizer_str['tm_overlay_nav_animation'][1],
		'section'  => 'tm_overlay_nav_settings',
		'priority' => 16,
		'default'  => 'scale-in',
		'choices'     => array(
			'top' => $thememountain_customizer_str['tm_overlay_nav_animation'][2],
			'right' => $thememountain_customizer_str['tm_overlay_nav_animation'][3],
			'bottom' => $thememountain_customizer_str['tm_overlay_nav_animation'][4],
			'left' => $thememountain_customizer_str['tm_overlay_nav_animation'][5],
			'scale-in' => $thememountain_customizer_str['tm_overlay_nav_animation'][6],
			),
		) ));