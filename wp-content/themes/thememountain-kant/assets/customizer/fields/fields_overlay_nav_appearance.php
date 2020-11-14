<?php
namespace ThemeMountain;
/**
 * Overlay Navigation Appeaeance Settings (section: tm_overlay_nav_settings)
 * @package ThemeMountain
 * @subpackage Core/marquez-by-thememountain/customizer/fields
 * @since 	1.0
 */

// ThemeStrings - see theme files
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

/**
 * Overlay Navigation Color (colorpicker)
 * Default: #999;
 *
 * Targeting:
 *
 * .overlay-navigation>ul>li>a {
 * 		color: #999;
 * }
 */
TM_Customizer::tm_add_customizer_field('tm_overlay_navigation_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_navigation_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '#999',
		'priority'    => 12,
				'css_selector'	 => '.overlay-navigation > ul > li > a',
		'css' => 'color: %s;',
		) ));

/**
 * Overlay Navigation Hover & Active Color (colorpicker)
 * Default: #000;
 *
 * Targeting:
 *
 *.overlay-navigation>ul>li>a:hover,
 *.overlay-navigation>ul>li.current>a,
 *.overlay-navigation ul li.current>a:hover,
 *.overlay-navigation .sub-menu a:hover,
 *.overlay-navigation .sub-menu .current>a
 * 		color: #000;
 * }
 */
TM_Customizer::tm_add_customizer_field('tm_overlay_navigation_color_hover_active',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_navigation_color_hover_active'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '#000',
		'priority'    => 12,
				'css_selector'	 => '.overlay-navigation>ul>li>a:hover, .overlay-navigation>ul>li.current>a, .overlay-navigation ul li.current>a:hover, .overlay-navigation .sub-menu a:hover, .overlay-navigation .sub-menu .current>a',
		'css' => 'color: %s;',
		) ));

// Overlay Sub Menu Navigation Color
TM_Customizer::tm_add_customizer_field('tm_overlay_sub_menu_navigation_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_sub_menu_navigation_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
				'css_selector'	 => '.overlay-navigation .sub-menu li a,.overlay-navigation .cart-overview .product-title',
		'css' => 'color: %s;',
		) ));

// Overlay Sub Menu Navigation Hover Color
TM_Customizer::tm_add_customizer_field('tm_overlay_sub_menu_navigation_color_hover',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_sub_menu_navigation_color_hover'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
				'css_selector'	 => '.overlay-navigation .sub-menu li a:hover,.overlay-navigation .cart-overview .product-title:hover',
		'css' => 'color: %s;',
		) ));

// Overlay Cart Badge Bkg Color (colorpicker)
TM_Customizer::tm_add_customizer_field('tm_overlay_cart_badge_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_cart_badge_background_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
		'css_selector'	 => '.overlay-navigation .cart .badge',
		'css' => 'background-color: %s;',
		) ));

// Overlay Cart Badge Color (colorpicker)
TM_Customizer::tm_add_customizer_field('tm_overlay_cart_badge_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_cart_badge_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
		'css_selector'	 => '.overlay-navigation .cart .badge',
		'css' => 'color: %s;',
		) ));

// Overlay Cart Delete Button Bkg Color
TM_Customizer::tm_add_customizer_field('tm_overlay_cart_delete_button_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_cart_delete_button_background_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
				'css_selector'	 => '.overlay-navigation .cart-overview a.product-remove',
		'css' => 'background-color: %s !important;',
		) ));

// Overlay Cart Delete Button Color
TM_Customizer::tm_add_customizer_field('tm_overlay_cart_delete_button_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_cart_delete_button_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
				'css_selector'	 => '.overlay-navigation .cart-overview a.product-remove',
		'css' => 'color: %s !important;',
		) ));


// Overlay Cart Delete Button Hover Color
TM_Customizer::tm_add_customizer_field('tm_overlay_cart_delete_button_color_hover',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_cart_delete_button_color_hover'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
		'css_selector'	 => '.overlay-navigation .cart-overview a.product-remove:hover',
		'css' => 'color: %s !important;',
		) ));

// Overlay Cart Price Color
TM_Customizer::tm_add_customizer_field('tm_overlay_cart_price_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_cart_price_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
		'css_selector'	 => '.overlay-navigation .cart-overview .product-price,.overlay-navigation .cart-overview .product-quantity',
		'css' => 'color: %s;',
		) ));

// Overlay Cart Total Color
TM_Customizer::tm_add_customizer_field('tm_overlay_cart_total_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_cart_total_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
		'css_selector'	 => '.overlay-navigation .cart-overview .cart-subtotal',
		'css' => 'color: %s;',
		) ));

// Overlay Cart Total Divider Color
TM_Customizer::tm_add_customizer_field('tm_overlay_cart_total_divider_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_cart_total_divider_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
		'css_selector'	 => '.overlay-navigation .cart-overview .cart-actions',
		'css' => 'border-color: %s;',
		) ));

// Overlay Button Background Color
TM_Customizer::tm_add_customizer_field('tm_overlay_button_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_button_background_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
		'css_selector'	 => 'body .overlay-navigation .button, body .overlay-navigation .sub-menu .button',
		'css' => 'background-color: %s !important;',
		) ));

// Overlay Button Border Color
TM_Customizer::tm_add_customizer_field('tm_overlay_button_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_button_border_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
		'css_selector'	 => 'body .overlay-navigation .button, body .overlay-navigation .sub-menu .button',
		'css' => 'border-color: %s !important;',
		) ));

// Overlay Button Text Color
TM_Customizer::tm_add_customizer_field('tm_overlay_button_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_button_text_color'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
		'css_selector'	 => 'body .overlay-navigation .button, body .overlay-navigation .sub-menu .button',
		'css' => 'color: %s !important;',
		) ));

// Overlay Button Hover Background Color
TM_Customizer::tm_add_customizer_field('tm_overlay_button_background_color_hover',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_button_background_color_hover'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
		'css_selector'	 => 'body .overlay-navigation .button:hover, body .overlay-navigation .sub-menu .button:hover',
		'css' => 'background-color: %s !important;',
		) ));

// Overlay Button Hover Border Color
TM_Customizer::tm_add_customizer_field('tm_overlay_button_border_color_hover',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_button_border_color_hover'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
		'css_selector'	 => 'body .overlay-navigation .button:hover, body .overlay-navigation .sub-menu .button:hover',
		'css' => 'border-color: %s !important;',
		) ));

// Overlay Button Hover Text Color
TM_Customizer::tm_add_customizer_field('tm_overlay_button_text_color_hover',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_overlay_button_text_color_hover'][0],
		'section'     => 'tm_overlay_nav_settings',
		'default'     => '',
		'priority'    => 14,
		'css_selector'	 => 'body .overlay-navigation .button:hover, body .overlay-navigation .sub-menu .button:hover',
		'css' => 'color: %s !important;',
		) ));