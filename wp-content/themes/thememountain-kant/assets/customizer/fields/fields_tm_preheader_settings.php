<?php
namespace ThemeMountain;

// ThemeStrings - see theme files
$thememountain_preheader_customizer = TM_ThemeStrings::$text_strings['preheader_customizer'];

/**
 * Pre-Header Settings section (tm_preheader_settings)
 */

/** Pre Header type */
TM_Customizer::tm_add_customizer_field('tm_preheader_type',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_preheader_customizer['tm_preheader_type'][0],
		'section'  => 'tm_preheader_settings',
		'description'  => $thememountain_preheader_customizer['tm_preheader_type'][1],
		'default'  => 'hide_preheader',
		'priority' => 10,
		'choices'     => array(
			'use_tm_preheader' => $thememountain_preheader_customizer['tm_preheader_type'][2],
			'hide_preheader' => $thememountain_preheader_customizer['tm_preheader_type'][3],
			),
		) ));

	/* Pre Header to show */
	TM_Customizer::tm_add_customizer_field('tm_preheader_id_to_show',array (
		TM_ThemeStrings::$theme_id, array(
			'type'     => 'select',
			'label'    => $thememountain_preheader_customizer['tm_preheader_id_to_show'][0],
			'section'  => 'tm_preheader_settings',
			'description'  => $thememountain_preheader_customizer['tm_preheader_id_to_show'][1],
			'default'  => '0',
			'priority' => 10,
			'choices'     => TM_PageOptions::get_posts_list_in_array( array( 'post_type' => 'tm_preheader' ,'posts_per_page' => -1 ) ),
			'active_callback'  => array(
				array(
					'setting'  => 'tm_preheader_type',
					'operator' => '=',
					'value'    => 'use_tm_preheader',
				),
			)
		) ));

	/** Pre Header Height (textfield) */
	TM_Customizer::tm_add_customizer_field('tm_preheader_height',array (
		TM_ThemeStrings::$theme_id, array(
			'type'     => 'text',
			'label'    => $thememountain_preheader_customizer['tm_preheader_height'][0],
			'description' => $thememountain_preheader_customizer['tm_preheader_height'][1],
			'section'  => 'tm_preheader_settings',
			'default'  => 'auto',
			'priority' => 10,
			'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.header .header-inner-top',
			'css' => 'height: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_preheader_type',
					'operator' => '=',
					'value'    => 'use_tm_preheader',
					),
				),
		) ));

	/** Pre Header Link Color (colorpicker) */
	TM_Customizer::tm_add_customizer_field('tm_preheader_link_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_preheader_customizer['tm_preheader_link_color'][0],
			'section'     => 'tm_preheader_settings',
			'default'     => '#0cbacf',
			'priority'    => 14,
			'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.header-inner-top .nav-bar a',
			'css' => 'color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_preheader_type',
					'operator' => '=',
					'value'    => 'use_tm_preheader',
				),
			),
		) ));

	/** Pre Header Link Hover Color(colorpicker) */
	TM_Customizer::tm_add_customizer_field('tm_preheader_link_color_hover',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_preheader_customizer['tm_preheader_link_color_hover'][0],
			'section'     => 'tm_preheader_settings',
			'default'     => '#666666',
			'priority'    => 14,
			'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.header-inner-top .nav-bar a:hover',
			'css' => 'color: %s;',
			'active_callback'  => array(
				array(
					'setting'  => 'tm_preheader_type',
					'operator' => '=',
					'value'    => 'use_tm_preheader',
				),
			),
		) ));

/**
 * Customizer values are set in
 * @see        TM_PreheaderServices class
 */
