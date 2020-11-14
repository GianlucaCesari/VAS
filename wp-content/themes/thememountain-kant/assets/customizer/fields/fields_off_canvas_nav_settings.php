<?php
namespace ThemeMountain;
/**
 * Off-Canvas Navigation Settings (section: tm_off_canvas_nav_settings)
 * @package ThemeMountain
 * @subpackage Core/marquez-by-thememountain/customizer/fields
 * @since 	1.1.1
*/

// ThemeStrings - see theme files
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

/**
 * Off-Canvas Navigation Width
 * Add new option to set side navigation wrapper width #175
 */
TM_Customizer::tm_add_customizer_field('tm_off_canvas_nav_menu_width',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_off_canvas_nav_menu_width'][0],
		'section'  => 'tm_off_canvas_nav_settings',
		'description' => $thememountain_customizer_str['tm_off_canvas_nav_menu_width'][1],
		'default'  => 'default',
		'priority' => 9,
		'choices'     => array(
			'default' => $thememountain_customizer_str['tm_off_canvas_nav_menu_width'][2],
			'50%' => $thememountain_customizer_str['tm_off_canvas_nav_menu_width'][3],
			),
		) ));

/**
 * Add an option called Off-Canvas Navigation Alignment to Customizing > Auxiliary Navigation Settings > Off-Canvas Navigation Se #431
 */
TM_Customizer::tm_add_customizer_field('tm_off_canvas_nav_menu_alignment',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_off_canvas_nav_menu_alignment'][0],
		'section'  => 'tm_off_canvas_nav_settings',
		'description' => $thememountain_customizer_str['tm_off_canvas_nav_menu_alignment'][1],
		'default'  => 'left',
		'priority' => 9,
		'choices'     => array(
			'left' => $thememountain_customizer_str['tm_off_canvas_nav_menu_alignment'][2],
			'center' => $thememountain_customizer_str['tm_off_canvas_nav_menu_alignment'][3],
			'right' => $thememountain_customizer_str['tm_off_canvas_nav_menu_alignment'][4],
			),
		) ));

/**
 * Add options to hide off-canvas nav menu titles #427
 */
TM_Customizer::tm_add_customizer_field('tm_off_canvas_title_display',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_off_canvas_title_display'][0],
		'section'  => 'tm_off_canvas_nav_settings',
		'description' => $thememountain_customizer_str['tm_off_canvas_title_display'][1],
		'default'  => 'show',
		'priority' => 9,
		'choices'     => array(
			'show' => $thememountain_customizer_str['tm_off_canvas_title_display'][2],
			'hide' => $thememountain_customizer_str['tm_off_canvas_title_display'][3],
			),
		) ));

/** Add off-canvas secondary menu option #420 */
TM_Customizer::tm_add_customizer_field('tm_secondary_off_canvas_title_display',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_secondary_off_canvas_title_display'][0],
		'section'  => 'tm_off_canvas_nav_settings',
		'description' => $thememountain_customizer_str['tm_secondary_off_canvas_title_display'][1],
		'default'  => 'show',
		'priority' => 9,
		'choices'     => array(
			'show' => $thememountain_customizer_str['tm_secondary_off_canvas_title_display'][2],
			'hide' => $thememountain_customizer_str['tm_secondary_off_canvas_title_display'][3],
			),
		) ));


// - Off-Canvas Navigation Color : tm_off_canvas_nav_color
//    - Default: #888;
//    - Targeting: .side-navigation > ul > li > a{color: #xxxxxx;}
TM_Customizer::tm_add_customizer_field('tm_off_canvas_nav_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_off_canvas_nav_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '#888',
		'priority'    => 10,
				'css_selector'	 => '.side-navigation > ul > li > a',
		'css' => 'color: %s;',
		) ));

// - Off-Canvas Navigation Hover & Active Color : tm_off_canvas_nav_color_hover_active
//    - Default: #fff;
//    - Targeting:  .side-navigation ul li a:hover, .side-navigation ul li.current > a, .side-navigation ul li.current a:hover {color: #xxxxxx;}
TM_Customizer::tm_add_customizer_field('tm_off_canvas_nav_color_hover_active',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_off_canvas_nav_color_hover_active'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '#fff',
		'priority'    => 10,
				'css_selector'	 => '.side-navigation ul li a:hover, .side-navigation ul li.current > a, .side-navigation ul li.current a:hover',
		'css' => 'color: %s;',
		) ));

// Off-Canvas Sub Menu Navigation Color
TM_Customizer::tm_add_customizer_field('tm_offcanvas_sub_menu_navigation_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_sub_menu_navigation_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
				'css_selector'	 => '.side-navigation .sub-menu li a,.side-navigation .cart-overview .product-title',
		'css' => 'color: %s;',
		) ));

// Off-Canvas Sub Menu Navigation Hover Color
TM_Customizer::tm_add_customizer_field('tm_offcanvas_sub_menu_navigation_color_hover',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_sub_menu_navigation_color_hover'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
		'css_selector'	 => '.side-navigation li.current .sub-menu li a:hover,.side-navigation .cart-overview .product-title:hover,.side-navigation .sub-menu a:hover',
		'css' => 'color: %s;',
		) ));

// - Off-Canvas Background Color : tm_off_canvas_background_color
//    - Default: #111;
//    - Targeting: .side-navigation-wrapper {background-color: #xxxxxx;}
TM_Customizer::tm_add_customizer_field('tm_off_canvas_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_off_canvas_background_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '#111',
		'priority'    => 10,
				'css_selector'	 => '.side-navigation-wrapper',
		'css' => 'background-color: %s;',
		) ));

// - Off-Canvas Exit Button Color : tm_offcanvas_exit_button_color
//    - Default: #666;
//    - Targeting: .side-navigation-wrapper .navigation-hide a {color: #xxxxxx;}
TM_Customizer::tm_add_customizer_field('tm_offcanvas_exit_button_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_exit_button_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '#666',
		'priority'    => 10,
				'css_selector'	 => '.side-navigation-wrapper .navigation-hide a',
		'css' => 'color: %s;',
		) ));


// - Off-Canvas Exit Button Hover Color : tm_offcanvas_exit_button_color_hover
//    - Default: #fff;
//    - Targeting: .side-navigation-wrapper .navigation-hide a:hover {color: #xxxxxx;}
TM_Customizer::tm_add_customizer_field('tm_offcanvas_exit_button_color_hover',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_exit_button_color_hover'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '#fff',
		'priority'    => 10,
				'css_selector'	 => '.side-navigation-wrapper .navigation-hide a:hover',
		'css' => 'color: %s;',
		) ));

// Off-Canvas Cart Badge Bkg Color (colorpicker)
TM_Customizer::tm_add_customizer_field('tm_offcanvas_cart_badge_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_cart_badge_background_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
		'css_selector'	 => '.side-navigation .cart .badge',
		'css' => 'background-color: %s;',
		) ));

// Off-Canvas Cart Badge Color (colorpicker)
TM_Customizer::tm_add_customizer_field('tm_offcanvas_cart_badge_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_cart_badge_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
		'css_selector'	 => '.side-navigation .cart .badge',
		'css' => 'color: %s;',
		) ));

// Off-Canvas Cart Delete Button Bkg Color
TM_Customizer::tm_add_customizer_field('tm_offcanvas_cart_delete_button_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_cart_delete_button_background_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
				'css_selector'	 => '.side-navigation .cart-overview a.product-remove',
		'css' => 'background-color: %s !important;',
		) ));

// Off-Canvas Cart Delete Button Color
TM_Customizer::tm_add_customizer_field('tm_offcanvas_cart_delete_button_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_cart_delete_button_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
				'css_selector'	 => '.side-navigation .cart-overview a.product-remove',
		'css' => 'color: %s !important;',
		) ));


// Off-Canvas Cart Delete Button Hover Color
TM_Customizer::tm_add_customizer_field('tm_offcanvas_cart_delete_button_color_hover',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_cart_delete_button_color_hover'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
		'css_selector'	 => '.side-navigation .cart-overview a.product-remove:hover',
		'css' => 'color: %s !important;',
		) ));

// Off-Canvas Cart Price Color
TM_Customizer::tm_add_customizer_field('tm_offcanvas_cart_price_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_cart_price_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
		'css_selector'	 => '.side-navigation .cart-overview .product-price,.side-navigation .cart-overview .product-quantity',
		'css' => 'color: %s;',
		) ));

// Off-Canvas Cart Total Color
TM_Customizer::tm_add_customizer_field('tm_offcanvas_cart_total_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_cart_total_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
		'css_selector'	 => '.side-navigation .cart-overview .cart-subtotal',
		'css' => 'color: %s;',
		) ));

// Off-Canvas Cart Total Divider Color
TM_Customizer::tm_add_customizer_field('tm_offcanvas_cart_total_divider_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_cart_total_divider_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
		'css_selector'	 => '.side-navigation .cart-overview .cart-actions',
		'css' => 'border-color: %s;',
		) ));

// Off-Canvas Button Background Color
TM_Customizer::tm_add_customizer_field('tm_offcanvas_button_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_button_background_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
		'css_selector'	 => 'body .side-navigation .button, body .side-navigation .sub-menu .button',
		'css' => 'background-color: %s !important;',
		) ));

// Off-Canvas Button Border Color
TM_Customizer::tm_add_customizer_field('tm_offcanvas_button_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_button_border_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
		'css_selector'	 => 'body .side-navigation .button, body .side-navigation .sub-menu .button',
		'css' => 'border-color: %s !important;',
		) ));

// Off-Canvas Button Text Color
TM_Customizer::tm_add_customizer_field('tm_offcanvas_button_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_button_text_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
		'css_selector'	 => 'body .side-navigation .button, body .side-navigation .sub-menu .button',
		'css' => 'color: %s !important;',
		) ));

// Off-Canvas Button Hover Background Color
TM_Customizer::tm_add_customizer_field('tm_offcanvas_button_background_color_hover',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_button_background_color_hover'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
		'css_selector'	 => 'body .side-navigation .button:hover, body .side-navigation .sub-menu .button:hover',
		'css' => 'background-color: %s !important;',
		) ));

// Off-Canvas Button Hover Border Color
TM_Customizer::tm_add_customizer_field('tm_offcanvas_button_border_color_hover',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_button_border_color_hover'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
		'css_selector'	 => 'body .side-navigation .button:hover, body .side-navigation .sub-menu .button:hover',
		'css' => 'border-color: %s !important;',
		) ));

// Off-Canvas Button Hover Text Color
TM_Customizer::tm_add_customizer_field('tm_offcanvas_button_text_color_hover',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_offcanvas_button_text_color_hover'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '',
		'priority'    => 10,
		'css_selector'	 => 'body .side-navigation .button:hover, body .side-navigation .sub-menu .button:hover',
		'css' => 'color: %s !important;',
		) ));

// - Off-Canvas Navigation Copyright Color : tm_off_canvas_nav_copyright_color
//    - Default: #666;
//    - Targeting: .side-navigation-footer, .side-navigation-footer .social-list a{#xxxxxx;}
TM_Customizer::tm_add_customizer_field('tm_off_canvas_nav_copyright_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_off_canvas_nav_copyright_color'][0],
		'section'     => 'tm_off_canvas_nav_settings',
		'default'     => '#666',
		'priority'    => 10,
				'css_selector'	 => '.side-navigation-footer, .side-navigation-footer .social-list a',
		'css' => 'color: %s;',
		) ));

// - Off-Canvas Navigation Position : tm_off_canvas_nav_position
//   - Default: Enter Left
//   - Options:
//      - Enter Left
//      - Enter Right
TM_Customizer::tm_add_customizer_field('tm_off_canvas_nav_position',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_off_canvas_nav_position'][0],
		'description' => $thememountain_customizer_str['tm_off_canvas_nav_position'][1],
		'section'  => 'tm_off_canvas_nav_settings',
		'priority' => 10,
		'default'  => 'enter-left',
		'choices'     => array(
			'enter-left' => $thememountain_customizer_str['tm_off_canvas_nav_position'][2],
			'enter-right' => $thememountain_customizer_str['tm_off_canvas_nav_position'][3],
			),
		) ));

// - Off-Canvas Navigation Animation : tm_off_canvas_nav_animation
//    - Default: Reveal
//    - Options:
//       - reveal
//       - slide-in
//       - push-in
//       - scale-in
TM_Customizer::tm_add_customizer_field('tm_off_canvas_nav_animation',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_off_canvas_nav_animation'][0],
		'description' => $thememountain_customizer_str['tm_off_canvas_nav_animation'][1],
		'section'  => 'tm_off_canvas_nav_settings',
		'priority' => 10,
		'default'  => 'reveal',
		'choices'     => array(
			'reveal' => $thememountain_customizer_str['tm_off_canvas_nav_animation'][2],
			'slide-in' => $thememountain_customizer_str['tm_off_canvas_nav_animation'][3],
			'push-in' => $thememountain_customizer_str['tm_off_canvas_nav_animation'][4],
			'scale-in' => $thememountain_customizer_str['tm_off_canvas_nav_animation'][5],
			),
		) ));
