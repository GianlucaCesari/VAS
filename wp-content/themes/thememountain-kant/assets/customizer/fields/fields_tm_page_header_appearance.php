<?php
namespace ThemeMountain;

// ThemeStrings - see theme files
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

/**
 * section for : tm_page_header_appearance
 */

/**
 * Presets
 */
TM_Customizer::tm_add_customizer_field('tm_body_header_presets',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'kirki-preset',
		'label'    => $thememountain_customizer_str['tm_body_header_presets'][0],
		'description' => $thememountain_customizer_str['tm_body_header_presets'][1],
		'section'  => 'tm_page_header_appearance',
		'default'  => 'preset-3',
		'priority' => 10,
		'choices'     => array(
			/* Header Above Content */
			'preset-1' => array(
				'label'    => $thememountain_customizer_str['tm_body_header_presets'][2],
				'settings' => array(
					'tm_header_position' => 'header-relative',
					'tm_header_vertical_alignment' => 'top',
					'tm_header_vertical_alignment_bottom_value' => '0',
					'tm_body_header_background_color_threshold' => '',
					'tm_body_header_compact_threshold' => '',
					'tm_body_header_sticky_threshold' => '',
					'tm_body_header_helper_out_threshold' => '',
					),
				),
			'preset-2' => array(
				'label'    => $thememountain_customizer_str['tm_body_header_presets'][3],
				'settings' => array(
					'tm_header_position' => 'header-relative',
					'tm_header_vertical_alignment' => 'top',
					'tm_header_vertical_alignment_bottom_value' => '0',
					'tm_body_header_background_color_threshold' => '100',
					'tm_body_header_compact_threshold' => '',
					'tm_body_header_sticky_threshold' => '300',
					'tm_body_header_helper_out_threshold' => '500',
					),
				),
			/* Header Over Content */
			'preset-3' => array(
				'label'    => $thememountain_customizer_str['tm_body_header_presets'][4],
				'settings' => array(
					'tm_header_position' => 'header-absolute',
					'tm_header_vertical_alignment' => 'top',
					'tm_header_vertical_alignment_bottom_value' => '0',
					'tm_body_header_background_color_threshold' => '',
					'tm_body_header_compact_threshold' => '',
					'tm_body_header_sticky_threshold' => '',
					'tm_body_header_helper_out_threshold' => '',
					),
				),
			'preset-4' => array(
				'label'    => $thememountain_customizer_str['tm_body_header_presets'][5],
				'settings' => array(
					'tm_header_position' => 'header-absolute',
					'tm_header_vertical_alignment' => 'top',
					'tm_header_vertical_alignment_bottom_value' => '0',
					'tm_body_header_background_color_threshold' => '100',
					'tm_body_header_compact_threshold' => '',
					'tm_body_header_sticky_threshold' => '300',
					'tm_body_header_helper_out_threshold' => '500',
					),
				),
			'preset-5' => array(
				'label'    => $thememountain_customizer_str['tm_body_header_presets'][6],
				'settings' => array(
					'tm_header_position' => 'header-fixed',
					'tm_header_vertical_alignment' => 'top',
					'tm_header_vertical_alignment_bottom_value' => '0',
					'tm_body_header_background_color_threshold' => '100',
					'tm_body_header_compact_threshold' => '',
					'tm_body_header_sticky_threshold' => '',
					'tm_body_header_helper_out_threshold' => '',
					),
				),
			/* Header Bottom */
			'preset-6' => array(
				'label'    => $thememountain_customizer_str['tm_body_header_presets'][7],
				'settings' => array(
					'tm_header_position' => 'header-absolute',
					'tm_header_vertical_alignment' => 'bottom',
					'tm_header_vertical_alignment_bottom_value' => '0',
					'tm_body_header_background_color_threshold' => '0',
					'tm_body_header_compact_threshold' => '',
					'tm_body_header_sticky_threshold' => '',
					'tm_body_header_helper_out_threshold' => '',
					),
				),
			'preset-7' => array(
				'label'    => $thememountain_customizer_str['tm_body_header_presets'][8],
				'settings' => array(
					'tm_header_position' => 'header-absolute',
					'tm_header_vertical_alignment' => 'bottom',
					'tm_header_vertical_alignment_bottom_value' => '0',
					'tm_body_header_background_color_threshold' => 'window-height',
					'tm_body_header_compact_threshold' => '',
					'tm_body_header_sticky_threshold' => 'window-height',
					'tm_body_header_helper_out_threshold' => '',
					),
				),
			),
		) ));

/**
 *
 * tm_header_position
 *
 * Classes that should be added to the header depending on position.
 * Position Relative = no position class added
 * Position Absolute = header.header-absolute
 * Position Fixed = header.header-fixed
 * Set by adding either the class "header-absolute" or "header-fixed to header:
 * <header class="header header-fixed"> ... </header>
 */
TM_Customizer::tm_add_customizer_field('tm_header_position',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_header_position'][0],
		'section'  => 'tm_page_header_appearance',
		'description' => $thememountain_customizer_str['tm_header_position'][1],
		'default'  => 'header-fixed',
		'priority' => 10,
		'choices'     => array(
			'header-relative' => $thememountain_customizer_str['tm_header_position'][2],
			'header-absolute' => $thememountain_customizer_str['tm_header_position'][3],
			'header-fixed' => $thememountain_customizer_str['tm_header_position'][4],
			),
		) ));

/**
 * tm_header_fixed_on_mobile
 *
 * Set by adding the class "header-fixed-on-mobile"
 * <header class="header header-fixed-on-mobile"> ...  </header>
 */
TM_Customizer::tm_add_customizer_field('tm_header_fixed_on_mobile',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_header_fixed_on_mobile'][0],
		'section'  => 'tm_page_header_appearance',
		'description' => $thememountain_customizer_str['tm_header_fixed_on_mobile'][1],
		'default'  => 'header-fixed-on-mobile',
		'priority' => 10,
		'choices'     => array(
			'header-fixed-on-mobile' => $thememountain_customizer_str['tm_header_fixed_on_mobile'][2],
			'do-not-fix-header-on-mobile' => $thememountain_customizer_str['tm_header_fixed_on_mobile'][3],
			),
		) ));

/**
 * Header Vertical Alignment
 * tm_header_vertical_alignment
 *
 * @see Add header vertical alignment option under Customizing > Header Settings > Header Appearance #417
 */
TM_Customizer::tm_add_customizer_field('tm_header_vertical_alignment',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_header_vertical_alignment'][0],
		'section'  => 'tm_page_header_appearance',
		'description' => $thememountain_customizer_str['tm_header_vertical_alignment'][1],
		'default'  => 'top',
		'priority' => 10,
		'choices'     => array(
			'top' => $thememountain_customizer_str['tm_header_vertical_alignment'][2],
			'bottom' => $thememountain_customizer_str['tm_header_vertical_alignment'][3],
			),
		) ));
/**
 * Header Bottom Value
 * tm_header_vertical_alignment_bottom_value
 *
 * @see Add header vertical alignment option under Customizing > Header Settings > Header Appearance #417
 */
TM_Customizer::tm_add_customizer_field('tm_header_vertical_alignment_bottom_value',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'number',
		'label'    => $thememountain_customizer_str['tm_header_vertical_alignment_bottom_value'][0],
		'section'  => 'tm_page_header_appearance',
		'description'  => $thememountain_customizer_str['tm_header_vertical_alignment_bottom_value'][1],
		'default'  => 0,
		'css_selector' => '.header.header-bottom',
		'priority' => 10,
		'active_callback'  => array(
			array(
				'setting'  => 'tm_header_vertical_alignment',
				'operator' => '==',
				'value'    => 'bottom',
				),
			),
		) ));

/**
 * Moved from tm_page_header_nav_appearance
 */
TM_Customizer::tm_add_customizer_field('tm_top_header_common_menu_height',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'number',
		'label'    => $thememountain_customizer_str['tm_top_header_common_menu_height'][0],
		'section'  => 'tm_page_header_appearance',
		'description'  => $thememountain_customizer_str['tm_top_header_common_menu_height'][1],
		'default'  => 80,
		'css_selector' => '.header .logo, .header .header-inner .navigation > ul > li, .header .header-inner .navigation > ul > li > a:not(.button), .header .header-inner .dropdown > .nav-icon',
		'css' => 'height: %1$spx; line-height: %1$spx;',
		'priority' => 10,
		) ));

/**
 * Moved from tm_page_header_nav_appearance
 */
TM_Customizer::tm_add_customizer_field('tm_body_header_default_menu_height',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'number',
		'label'    => $thememountain_customizer_str['tm_body_header_default_menu_height'][0],
		'section'  => 'tm_page_header_appearance',
		'description'  => $thememountain_customizer_str['tm_body_header_default_menu_height'][1],
		'default'  => 60,
		'css_selector' => '.header-compact .logo, .header-compact .header-inner .navigation > ul > li, .header-compact .header-inner .navigation > ul > li > a:not(.button), .header-compact .header-inner .dropdown > .nav-icon',
		'css' => 'height: %1$spx; line-height: %1$spx;',
		'priority' => 10,
		'active_callback'  => array(
			array(
				'setting'  => 'tm_header_navigation_type',
				'operator' => 'contains',
				'value'    => array('default','hybrid'),
				),
			),
		) ));

/**
 * Body Header Height Threshold
 * Default set to blank so that that in Page Option can accept blank value.
 *
 * @see       TM_TemplateServices::tm_return_field_data_attribute()
 * @see       TM_NavMenuServices::$nav_menu_header_data_attrs
 */
TM_Customizer::tm_add_customizer_field('tm_body_header_default_menu_height_threshold',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'number',
		'label'    => $thememountain_customizer_str['tm_body_header_default_menu_height_threshold'][0],
		'section'  => 'tm_page_header_appearance',
		'description'  => $thememountain_customizer_str['tm_body_header_default_menu_height_threshold'][1],
		'default'  => '',
		// 'css_selector' => 'header.header',
		'data_attribute' => '',
		'priority' => 10,
		'active_callback'  => array(
			array(
				'setting'  => 'tm_header_navigation_type',
				'operator' => 'contains',
				'value'    => array('default','hybrid'),
				),
			),
		) ));

/**
 * Body Header Background Color Threshold
 * Default set to blank so that that in Page Option can accept blank value.
 * Set by adding the data attribute "data-bkg-threshold" to header
 * <header class="header" data-bkg-threshold="100"> ... </header>
 *
 * @see       TM_TemplateServices::tm_return_field_data_attribute()
 * @see       TM_NavMenuServices::$nav_menu_header_data_attrs
 */
TM_Customizer::tm_add_customizer_field('tm_body_header_background_color_threshold',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_body_header_background_color_threshold'][0],
		'description' => $thememountain_customizer_str['tm_body_header_background_color_threshold'][1],
		'section'  => 'tm_page_header_appearance',
		'default'  => '',
		'priority' => 10,
		'data_attribute' => 'data-bkg-threshold',
		) ));


/**
 * Body Header Compact Threshold
 * Default set to blank so that that in Page Option can accept blank value.
 * Set by adding the data attribute "data-compact-threshold" to header
 * <header class="header" data-compact-threshold="100"> ... </header>
 *
 * @see       TM_TemplateServices::tm_return_field_data_attribute()
 * @see       TM_NavMenuServices::$nav_menu_header_data_attrs
 */
TM_Customizer::tm_add_customizer_field('tm_body_header_compact_threshold',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_body_header_compact_threshold'][0],
		'description' => $thememountain_customizer_str['tm_body_header_compact_threshold'][1],
		'section'  => 'tm_page_header_appearance',
		'default'  => '',
		'priority' => 10,
		'data_attribute' => 'data-compact-threshold',
		) ));

/**
 * Header Sticky Threshold
 * Default set to blank so that that in Page Option can accept blank value.
 * Set by adding the data attribute "data-sticky-threshold"
 * 		... </header>
 *
 * @see       TM_TemplateServices::tm_return_field_data_attribute()
 * @see       TM_NavMenuServices::$nav_menu_header_data_attrs
 */
TM_Customizer::tm_add_customizer_field('tm_body_header_sticky_threshold',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_body_header_sticky_threshold'][0],
		'description' => $thememountain_customizer_str['tm_body_header_sticky_threshold'][1],
		'section'  => 'tm_page_header_appearance',
		'default'  => '',
		'priority' => 10,
		'data_attribute' => array('data-sticky-threshold'),
		'active_callback'  => array(
			array(
				'setting'  => 'tm_header_position',
				'operator' => '!=',
				'value'    => 'header-fixed',
				),
			),
		) ));

/**
 * Header Helper Out Threshold
 * Default set to blank so that that in Page Option can accept blank value.
 * Set by adding the data attribute "data-helper-out-threshold" to header
 * <header class="header" data-helper-out-threshold="500"> ...  </header>
 *
 * @see       TM_TemplateServices::tm_return_field_data_attribute()
 * @see       TM_NavMenuServices::$nav_menu_header_data_attrs
 */
TM_Customizer::tm_add_customizer_field('tm_body_header_helper_out_threshold',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_body_header_helper_out_threshold'][0],
		'description' => $thememountain_customizer_str['tm_body_header_helper_out_threshold'][1],
		'section'  => 'tm_page_header_appearance',
		'default'  => '',
		'priority' => 10,
		'data_attribute' => 'data-helper-out-threshold',
		'active_callback'  => array(
			array(
				'setting'  => 'tm_header_position',
				'operator' => '!=',
				'value'    => 'header-fixed',
				),
			),
		) ));
