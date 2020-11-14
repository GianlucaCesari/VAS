<?php
namespace ThemeMountain;
/**
 * Content Body Color Settings
 */

/**
 * ThemeStrings - see theme files
 */
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

// Body Background Color
TM_Customizer::tm_add_customizer_field('tm_content_body_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_content_body_background_color'][0],
		'section'     => 'tm_content_body',
		'default'     => '#ffffff',
		'priority'    => 10,
		'css_selector'	 => array('body','.header','.content > .section-block:first-child + .section-block, .content > .scroll-to-top + .section-block + .section-block'),
		'css' => array('background-color: %s;','border-top-color: %s;','border-top-color: %s;')
		) ));

// Section Block Background Color
TM_Customizer::tm_add_customizer_field('tm_section_block_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_section_block_background_color'][0],
		'section'     => 'tm_content_body',
		'default'     => '#ffffff',
		'priority'    => 10,
		'css_selector'	 => 'body, .content',
		'css' => 'background-color: %s;',
		) ));

// Content Body Text Color
TM_Customizer::tm_add_customizer_field('tm_content_body_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_content_body_text_color'][0],
		'section'     => 'tm_content_body',
		'default'     => '#666',
		'priority'    => 10,
		'css_selector'	 => 'body',
		'css' => 'color: %s;',
		) ));

// Title Color
TM_Customizer::tm_add_customizer_field('tm_content_body_title_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_content_body_title_color'][0],
		'section'     => 'tm_content_body',
		'default'     => '#000',
		'priority'    => 10,
		'css_selector'	 => 'h1, h2, h3, h4, h5, h6',
		'css' => 'color: %s;',
		) ));

// Title Link Color
TM_Customizer::tm_add_customizer_field('tm_content_body_title_link_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_content_body_title_link_color'][0],
		'section'     => 'tm_content_body',
		'default'     => '#232323',
		'priority'    => 10,
		'css_selector'	 => 'h1 a,h2 a,h3 a,h4 a,h5 a,h6 a',
		'css' => 'color: %s;',
		) ));

// Title Link Hover Color
TM_Customizer::tm_add_customizer_field('tm_content_body_title_link_color_hover',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_content_body_title_link_color_hover'][0],
		'section'     => 'tm_content_body',
		'default'     => '#ff4556',
		'priority'    => 10,
		'css_selector'	 => 'h1 a:hover,h2 a:hover,h3 a:hover,h4 a:hover,h5 a:hover,h6 a:hover',
		'css' => 'color: %s;',
		) ));

// Link Color
TM_Customizer::tm_add_customizer_field('tm_content_body_link_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_content_body_link_color'][0],
		'section'     => 'tm_content_body',
		'default'     => '#232323',
		'priority'    => 10,
		'css_selector'	 => 'a, p a, .box a:not(.button)',
		'css' => 'color: %s;',
		) ));

// Link Hover Color
TM_Customizer::tm_add_customizer_field('tm_content_body_link_color_hover',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_content_body_link_color_hover'][0],
		'section'     => 'tm_content_body',
		'default'     => '#ff4556',
		'priority'    => 10,
		'css_selector'	 => 'a:hover, p a:hover, .box a:hover:not(.button), .social-list li a:hover, .post-info a:hover, .widget a:hover, .team-1 .social-list a:hover, .team-2 .social-list a:hover, .side-navigation-footer .social-list a:hover, .accordion li a:hover, .accordion li.active a, .tabs li a:hover, .tabs li.active a, .tabs li.active a:hover, .blog-masonry .with-background .post-read-more a:hover, .post-info-over a:hover, .post-info-over a:hover span, .post-author-aside a:hover, .post-love a:hover, .post-love a:hover span, .navigation-hide a, .footer .social-list a:hover, .scroll-to-top a:hover, .footer .list-group a:hover + .post-info .post-date, #tml-exit, .scroll-down a:hover, .footer .navigation a:hover, .footer .footer-top a:not(.button):hover',
		'css' => 'color: %s;',
		) ));

// Lead Font Color
TM_Customizer::tm_add_customizer_field('tm_lead_font_color',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'color-alpha',
		'label'       => $thememountain_customizer_str['tm_lead_font_color'][0],
		'section'     => 'tm_content_body',
		'default'     => '#666666',
		'priority'    => 10,
		'css_selector'	 => '.lead',
		'css' => 'color: %s;',
		) ));

/**
 * Global Button Color
 */

// Set Global Button Color (toggle)
	TM_Customizer::tm_add_customizer_field('tm_button_set_global_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'     => 'toggle',
			'label'    => $thememountain_customizer_str['tm_button_set_global_color'][0],
			'section'  => 'tm_content_body',
			'description'     => $thememountain_customizer_str['tm_button_set_global_color'][1],
			'default'  => 0,
			'priority' => 12,
			) ));

// Button Size (dropdown)
	TM_Customizer::tm_add_customizer_field('tm_button_size', array (
		TM_ThemeStrings::$theme_id, array(
			'type'         => 'select',
			'label'        => $thememountain_customizer_str['tm_button_size'][0],
			'section'      => 'tm_content_body',
			'description'  => $thememountain_customizer_str['tm_button_size'][1],
			'default'     => 'button-medium',
			'priority'    => 12,
			'multiple'    => 1,
			'choices'     => array(
				'button-small' => $thememountain_customizer_str['tm_button_size'][2],
				'button-medium' => $thememountain_customizer_str['tm_button_size'][3],
				'button-large' => $thememountain_customizer_str['tm_button_size'][4],
				'button-xlarge' => $thememountain_customizer_str['tm_button_size'][5],
				),
			'active_callback'  => array(
				array(
					'setting'  => 'tm_button_set_global_color',
					'operator' => '==',
					'value'    => 1,
				),
			),
		) ));

// Button Style (dropdown)
	TM_Customizer::tm_add_customizer_field('tm_button_style', array (
		TM_ThemeStrings::$theme_id, array(
			'type'         => 'select',
			'label'        => $thememountain_customizer_str['tm_button_style'][0],
			'section'      => 'tm_content_body',
			'description'  => $thememountain_customizer_str['tm_button_style'][1],
			'default'     => '',
			'priority'    => 12,
			'multiple'    => 1,
			'choices'     => array(
				'' => $thememountain_customizer_str['tm_button_style'][2],
				'button-rounded' => $thememountain_customizer_str['tm_button_style'][3],
				'button-pill' => $thememountain_customizer_str['tm_button_style'][4],
				),
			'active_callback'  => array(
				array(
					'setting'  => 'tm_button_set_global_color',
					'operator' => '==',
					'value'    => 1,
				),
			),
		) ));

// Global Button Background Color (colorpicker)
	TM_Customizer::tm_add_customizer_field('tm_button_bkg_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'     => 'color-alpha',
			'label'    => $thememountain_customizer_str['tm_button_bkg_color'][0],
			'section'  => 'tm_content_body',
			'default'  => '#eeeeee',
			'priority' => 14,
			'css_selector'	 => 'body .button, body a.button, body input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button:not(.nav-icon), .woocommerce button.button, .woocommerce button.button.alt, .woocommerce input.button:not(:disabled)',
			'css' => 'background-color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_button_set_global_color',
					'operator' => '=',
					'value'    => 1,
					),
				),
		) ));

// Global Button Background Color Hover (colorpicker)
	TM_Customizer::tm_add_customizer_field('tm_button_bkg_color_hover',array (
		TM_ThemeStrings::$theme_id, array(
			'type'     => 'color-alpha',
			'label'    => $thememountain_customizer_str['tm_button_bkg_color_hover'][0],
			'section'  => 'tm_content_body',
			'default'  => '#d0d0d0',
			'priority' => 14,
			'css_selector'	 => 'body .button:hover, body a.button:hover, body input[type="submit"]:hover, body a.button.current,.woocommerce #respond input#submit:hover, .woocommerce a.button:not(.nav-icon):hover, .woocommerce button.button:hover, .woocommerce button.button.alt:hover, .woocommerce input.button:hover:not(:disabled)',
			'css' => 'background-color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_button_set_global_color',
					'operator' => '=',
					'value'    => 1,
					),
				),
		) ));

// Global Button Border Color (colorpicker)
	TM_Customizer::tm_add_customizer_field('tm_button_border_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'     => 'color-alpha',
			'label'    => $thememountain_customizer_str['tm_button_border_color'][0],
			'section'  => 'tm_content_body',
			'default'  => '#eeeeee',
			'priority' => 14,
			'css_selector'	 => 'body .button, body a.button, body input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button:not(.nav-icon), .woocommerce button.button, .woocommerce button.button.alt, .woocommerce input.button:not(:disabled)',
			'css' => 'border-color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_button_set_global_color',
					'operator' => '=',
					'value'    => 1,
					),
				),
		) ));

// Border Color Hover (colorpicker)
	TM_Customizer::tm_add_customizer_field('tm_button_border_color_hover',array (
		TM_ThemeStrings::$theme_id, array(
			'type'     => 'color-alpha',
			'label'    => $thememountain_customizer_str['tm_button_border_color_hover'][0],
			'section'  => 'tm_content_body',
			'default'  => '#d0d0d0',
			'priority' => 14,
			'css_selector'	 => 'body .button:hover, body a.button:hover, body input[type="submit"]:hover, body a.button.current,.woocommerce #respond input#submit:hover, .woocommerce a.button:not(.nav-icon):hover, .woocommerce button.button:hover, .woocommerce button.button.alt:hover, .woocommerce input.button:hover:not(:disabled)',
			'css' => 'border-color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_button_set_global_color',
					'operator' => '=',
					'value'    => 1,
					),
				),
		) ));

// Label Color (colorpicker)
	TM_Customizer::tm_add_customizer_field('tm_button_label_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'     => 'color-alpha',
			'label'    => $thememountain_customizer_str['tm_button_label_color'][0],
			'section'  => 'tm_content_body',
			'default'  => '#666666',
			'priority' => 14,
			'css_selector'	 => 'body .button, body a.button, body input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button:not(.nav-icon), .woocommerce button.button, .woocommerce button.button.alt, .woocommerce input.button:not(:disabled)',
			'css' => 'color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_button_set_global_color',
					'operator' => '=',
					'value'    => 1,
					),
				),
		) ));

// Label Color Hover (colorpicker)
	TM_Customizer::tm_add_customizer_field('tm_button_label_color_hover',array (
		TM_ThemeStrings::$theme_id, array(
			'type'     => 'color-alpha',
			'label'    => $thememountain_customizer_str['tm_button_label_color_hover'][0],
			'section'  => 'tm_content_body',
			'default'  => '#666666',
			'priority' => 14,
			'css_selector'	 => 'body .button:hover, body a.button:hover, body input[type="submit"]:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:not(.nav-icon):hover, .woocommerce button.button:hover, .woocommerce button.button.alt:hover, .woocommerce input.button:hover:not(:disabled)',
			'css' => 'color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_button_set_global_color',
					'operator' => '=',
					'value'    => 1,
					),
				),
		) ));
