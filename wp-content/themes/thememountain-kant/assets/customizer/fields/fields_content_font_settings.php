<?php
namespace ThemeMountain;

$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

/**
 * Font settings presets
 * Loaded in TM_Customizer::__construct()
 * @uses       TM_Customizer::$font_presets
 * @uses       TM_Customizer::get_registered_font_pairs_choices()
 * @see        TM_Customizer::customize_preview_js_css()
 * @see        custom-customizer-ui.js
 */
TM_Customizer::tm_add_customizer_field('tm_content_font_presets',array (
	TM_ThemeStrings::$theme_id, array(
		'type'         => 'select',
		'label'        => $thememountain_customizer_str['tm_content_font_presets'][0],
		'section'      => 'tm_content_font_settings',
		'description' => $thememountain_customizer_str['tm_content_font_presets'][1],
		'default'     => 'none',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => TM_Customizer::get_registered_font_pairs_choices(),
		) ));
// tm_body_font
TM_Customizer::tm_add_customizer_field('tm_body_font',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'typography',
		'label'       => $thememountain_customizer_str['tm_body_font'][0],
		'section'     => 'tm_content_font_settings',
		// 'transport'   => 'postMessage',
		'default'     => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'font-size'      => '14px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			),
		'priority'    => 11,
		'css' => 'font-family: "%1$s", "Helvetica Neue", sans-serif; font-weight: %2$s; font-style: %7$s; font-size: %3$s; line-height: %4$s; letter-spacing: %5$s;'
		) ));
TM_Customizer::tm_add_customizer_field('tm_body_font_target',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_body_font_target'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => 'body',
		'priority' => 11,
		// 'transport'   => 'postMessage',
		) ));
// tm_title_font
TM_Customizer::tm_add_customizer_field('tm_title_font',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'typography',
		'label'       => $thememountain_customizer_str['tm_title_font'][0],
		'section'     => 'tm_content_font_settings',
		// 'transport'   => 'postMessage',
		'default'     => array(
			'font-family'    => 'Lato',
			'variant'        => 'regular',
			'line-height'    => '1',
			'letter-spacing' => '0',
			),
		'priority'    => 11,
		'css' => 'font-family: "%1$s", "Helvetica Neue", sans-serif; font-weight: %2$s; font-style: %7$s; line-height: %4$s; letter-spacing: %5$s;'
		) ));
TM_Customizer::tm_add_customizer_field('tm_title_font_target',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'textarea',
		'label'    => $thememountain_customizer_str['tm_title_font_target'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => 'h1, h2, h3, h4, h5, h6, .post-title, .title-small, .title-medium, .title-large, .title-xlarge',
		// 'transport'   => 'postMessage',
		'priority' => 11,
		'sanitize_callback' => array('ThemeMountain\\TM_Customizer', 'return_as_is'),
		) ));

/**
 * tm_lead_font
 * tm_lead_font color is now a separate setting
 * as tm_lead_font_color in the Content Body Color section
 */
TM_Customizer::tm_add_customizer_field('tm_lead_font',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'typography',
		'label'       => $thememountain_customizer_str['tm_lead_font'][0],
		'section'     => 'tm_content_font_settings',
		// 'transport'   => 'postMessage',
		'default'     => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'font-size'      => '20px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			// 'color'          => '#666666',
			),
		'priority'    => 11,
		'css' => 'font-family: "%1s", "Helvetica Neue", sans-serif; font-weight: %2$s; font-style: %7$s; font-size: %3$s; line-height: %4$s; letter-spacing: %5$s;'
		) ));
TM_Customizer::tm_add_customizer_field('tm_lead_font_target',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_lead_font_target'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '.lead',
		'priority' => 11,
		// 'transport'   => 'postMessage',
		) ));

/**
 * Navigation
 */
TM_Customizer::tm_add_customizer_field('tm_navigtion_font',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'typography',
		'label'       => $thememountain_customizer_str['tm_navigtion_font'][0],
		'section'     => 'tm_content_font_settings',
		// 'transport'   => 'postMessage',
		'default'     => array(
			'font-family'    => 'Lato',
			'variant'        => 'regular',
			'letter-spacing' => '0',
			// 'color'          => '#000000',
			),
		'priority'    => 11,
		'css' => 'font-family: "%1$s", "Helvetica Neue", sans-serif; font-weight: %2$s; font-style: %7$s; letter-spacing: %5$s;'
		) ));
TM_Customizer::tm_add_customizer_field('tm_navigtion_font_target',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_navigtion_font_target'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '.header .navigation > ul > li > a, .side-navigation > ul > li > a, .overlay-navigation > ul > li > a, .grid-filter-menu a',
		'priority' => 11,
		// 'transport'   => 'postMessage',
		) ));
/**
 * Form Elements
 */
TM_Customizer::tm_add_customizer_field('tm_form_font',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'typography',
		'label'       => $thememountain_customizer_str['tm_form_font'][0],
		'section'     => 'tm_content_font_settings',
		// 'transport'   => 'postMessage',
		'default'     => array(
			'font-family'    => 'Lato',
			'variant'        => 'regular',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			// 'color'          => '#000000',
			),
		'priority'    => 11,
		'css' => 'font-family: "%1$s", "Helvetica Neue", sans-serif; font-weight: %2$s; font-style: %7$s; letter-spacing: %5$s;'
		) ));
TM_Customizer::tm_add_customizer_field('tm_form_font_target',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_form_font_target'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => 'input, button, .button, select, textarea',
		'priority' => 11,
		// 'transport'   => 'postMessage',
		) ));

/**
 * Project Title and Description Elements
 */
TM_Customizer::tm_add_customizer_field('tm_project_title_and_description_font',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'typography',
		'label'       => $thememountain_customizer_str['tm_project_title_and_description_font'][0],
		'section'     => 'tm_content_font_settings',
		// 'transport'   => 'postMessage',
		'default'     => array(
			'font-family'    => 'Lato',
			'variant'        => 'regular',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			// 'color'          => '#000000',
			),
		'priority'    => 11,
		'css' => 'font-family: "%1$s", "Helvetica Neue", sans-serif; font-weight: %2$s; font-style: %7$s; letter-spacing: %5$s;'
		) ));
TM_Customizer::tm_add_customizer_field('tm_project_title_and_description_font_target',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_project_title_and_description_font_target'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '.project-title, .product-title, .project-description',
		'priority' => 11,
		// 'transport'   => 'postMessage',
		) ));

/**
 * tm_blockquote_font color is now a separate setting
 * as tm_blockquote_font_color in the Content Body Color section
 */
TM_Customizer::tm_add_customizer_field('tm_blockquote_font',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'typography',
		'label'       => $thememountain_customizer_str['tm_blockquote_font'][0],
		'section'     => 'tm_content_font_settings',
		// 'transport'   => 'postMessage',
		'default'     => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'font-size'      => '20px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			// 'color'          => '#000000',
			),
		'priority'    => 11,
		'css' => 'font-family: "%1$s", "Helvetica Neue", sans-serif; font-weight: %2$s; font-style: %7$s; font-size: %3$s; line-height: %4$s; letter-spacing: %5$s;'
		) ));
// Blockquote Font CSS Target
TM_Customizer::tm_add_customizer_field('tm_blockquote_font_target',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_blockquote_font_target'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => 'blockquote p',
		'priority' => 11,
		// 'transport'   => 'postMessage',
		) ));
// Alt Font 1
TM_Customizer::tm_add_customizer_field('tm_alt_font_1',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'typography',
		'label'       => $thememountain_customizer_str['tm_alt_font_1'][0],
		'section'     => 'tm_content_font_settings',
		// 'transport'   => 'postMessage',
		'default'     => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			),
		'priority'    => 11,
		'css' => 'font-family: "%1$s", "Helvetica Neue", sans-serif !important; font-weight: %2$s; font-style: %7$s; line-height: %4$s; letter-spacing: %5$s;'
		) ));
TM_Customizer::tm_add_customizer_field('tm_alt_font_1_target',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'hidden',
		'label'    => '', // $thememountain_customizer_str['tm_alt_font_1_target'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '.font-alt-1',
		'priority' => 11,
		// 'transport'   => 'postMessage',
		) ));
// Alt Font 2
TM_Customizer::tm_add_customizer_field('tm_alt_font_2',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'typography',
		'label'       => $thememountain_customizer_str['tm_alt_font_2'][0],
		'section'     => 'tm_content_font_settings',
		// 'transport'   => 'postMessage',
		'default'     => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			),
		'priority'    => 11,
		'css' => 'font-family: "%1$s", "Helvetica Neue", sans-serif !important; font-weight: %2$s; font-style: %7$s; line-height: %4$s; letter-spacing: %5$s;'
		) ));
TM_Customizer::tm_add_customizer_field('tm_alt_font_2_target',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'hidden',
		'label'    => '', // $thememountain_customizer_str['tm_alt_font_2_target'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '.font-alt-2',
		'priority' => 11,
		// 'transport'   => 'postMessage',
		) ));
// Alt Font 3
TM_Customizer::tm_add_customizer_field('tm_alt_font_3',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'typography',
		'label'       => $thememountain_customizer_str['tm_alt_font_3'][0],
		'section'     => 'tm_content_font_settings',
		// 'transport'   => 'postMessage',
		'default'     => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			),
		'priority'    => 11,
		'css' => 'font-family: "%1$s", "Helvetica Neue", sans-serif !important; font-weight: %2$s; font-style: %7$s; line-height: %4$s; letter-spacing: %5$s;'
		) ));
TM_Customizer::tm_add_customizer_field('tm_alt_font_3_target',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'hidden',
		'label'    => '', // $thememountain_customizer_str['tm_alt_font_3_target'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '.font-alt-3',
		'priority' => 11,
		// 'transport'   => 'postMessage',
		) ));
/**
 * H Tag Font Sizes
 */
TM_Customizer::tm_add_customizer_field('tm_h_tag_font_sizes',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'custom',
		'section'     => 'tm_content_font_settings',
		'default'     => $thememountain_customizer_str['tm_h_tag_font_sizes'][0],
		'priority'    => 13,
		) ));
// h1
TM_Customizer::tm_add_customizer_field('tm_title_font_size_h1',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_title_font_size_h1'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '45px',
		'css_selector' => 'h1',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));
TM_Customizer::tm_add_customizer_field('tm_title_font_size_h2',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_title_font_size_h2'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '33px',
		'css_selector' => 'h2',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));
TM_Customizer::tm_add_customizer_field('tm_title_font_size_h3',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_title_font_size_h3'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '23px',
		'css_selector' => 'h3',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));
TM_Customizer::tm_add_customizer_field('tm_title_font_size_h4',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_title_font_size_h4'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '18px',
		'css_selector' => 'h4',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));
TM_Customizer::tm_add_customizer_field('tm_title_font_size_h5',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_title_font_size_h5'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '16px',
		'css_selector' => 'h5',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));
TM_Customizer::tm_add_customizer_field('tm_title_font_size_h6',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_title_font_size_h6'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '12px',
		'css_selector' => 'h6',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));

/**
 * Auxiliary Title Font Sizes
 */
TM_Customizer::tm_add_customizer_field('tm_aux_title_font_sizes',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'custom',
		'section'     => 'tm_content_font_settings',
		'default'     => $thememountain_customizer_str['tm_aux_title_font_sizes'][0],
		'priority'    => 13,
		) ));
TM_Customizer::tm_add_customizer_field('tm_title_font_size_extra_large',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_title_font_size_extra_large'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '77.49px',
		'css_selector' => '.title-xlarge',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));
TM_Customizer::tm_add_customizer_field('tm_title_font_size_large',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_title_font_size_large'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '58.26px',
		'css_selector' => '.title-large',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));
TM_Customizer::tm_add_customizer_field('tm_title_font_size_medium',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_title_font_size_medium'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '24.76px',
		'css_selector' => '.title-medium',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));
TM_Customizer::tm_add_customizer_field('tm_title_font_size_small',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_title_font_size_small'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '14px',
		'css_selector' => '.title-small',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));

/**
 * Lead Font Size
 */
TM_Customizer::tm_add_customizer_field('tm_lead_font_size',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'custom',
		'section'     => 'tm_content_font_settings',
		'default'     => $thememountain_customizer_str['tm_lead_font_size'][0],
		'priority'    => 13,
		) ));
TM_Customizer::tm_add_customizer_field('tm_title_font_size_lead',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_title_font_size_lead'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '20.16px',
		'css_selector' => '.lead',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));

/**
 * Auxiliary Title Font Sizes
 */
TM_Customizer::tm_add_customizer_field('tm_aux_text_font_sizes',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'custom',
		'section'     => 'tm_content_font_settings',
		'default'     => $thememountain_customizer_str['tm_aux_text_font_sizes'][0],
		'priority'    => 13,
		) ));
TM_Customizer::tm_add_customizer_field('tm_text_font_size_extra_large',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_text_font_size_extra_large'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '20.16px',
		'css_selector' => '.text-xlarge',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));
TM_Customizer::tm_add_customizer_field('tm_text_font_size_large',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_text_font_size_large'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '16.8px',
		'css_selector' => '.text-large',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));
TM_Customizer::tm_add_customizer_field('tm_text_font_size_medium',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_text_font_size_medium'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '14px',
		'css_selector' => '.text-medium',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));
TM_Customizer::tm_add_customizer_field('tm_text_font_size_small',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'text',
		'label'    => $thememountain_customizer_str['tm_text_font_size_small'][0],
		'section'  => 'tm_content_font_settings',
		'default'  => '11.67px',
		'css_selector' => '.text-small',
		'css' => 'font-size: %s;',
		'priority' => 13,
		// 'transport'   => 'postMessage',
		) ));