<?php
namespace ThemeMountain;

/**
 * Footer Settings
 */

// ThemeStrings - see theme files
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

/** Footer type */
TM_Customizer::tm_add_customizer_field('tm_footer_type',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_footer_type'][0],
		'section'  => 'tm_footer_columns',
		'description'  => $thememountain_customizer_str['tm_footer_type'][1],
		'default'  => 'use_widget_space',
		'priority' => 10,
		'choices'     => array(
			'use_widget_space' => $thememountain_customizer_str['tm_footer_type'][2],
			'use_tm_footer' => $thememountain_customizer_str['tm_footer_type'][3],
			'hide_footer' => $thememountain_customizer_str['tm_footer_type'][4],
			),
		) ));
// Footer Position
TM_Customizer::tm_add_customizer_field('tm_footer_position',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_footer_position'][0],
		'section'  => 'tm_footer_columns',
		'description'  => $thememountain_customizer_str['tm_footer_position'][1],
		'default'  => 'relative',
		'priority' => 10,
		'choices'     => array(
			'relative' => $thememountain_customizer_str['tm_footer_position'][2],
			'fixed' => $thememountain_customizer_str['tm_footer_position'][3],
		),
		'active_callback'  => array(
			array(
				'setting'  => 'tm_footer_type',
				'operator' => '=',
				'value'    => 'use_tm_footer',
			),
		)
	) ));
// Scale content upon footer reveal
TM_Customizer::tm_add_customizer_field('tm_footer_scale_content_upon_footer_reveal', array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'toggle',
		'label'       => $thememountain_customizer_str['tm_footer_scale_content_upon_footer_reveal'][0],
		'section'     => 'tm_footer_columns',
		'description'  => $thememountain_customizer_str['tm_footer_scale_content_upon_footer_reveal'][1],
		'default'     => 0,
		'priority'    => 10,
		'active_callback'  => array(
			array(
				'setting'  => 'tm_footer_type',
				'operator' => '=',
				'value'    => 'use_tm_footer',
			),
		)
	) ));
/** TM footer */
	TM_Customizer::tm_add_customizer_field('tm_footer_id_to_show',array (
		TM_ThemeStrings::$theme_id, array(
			'type'     => 'select',
			'label'    => $thememountain_customizer_str['tm_footer_id_to_show'][0],
			'section'  => 'tm_footer_columns',
			'description'  => $thememountain_customizer_str['tm_footer_id_to_show'][1],
			'default'  => '0',
			'priority' => 10,
			'choices'     => TM_PageOptions::get_posts_list_in_array( array( 'post_type' => 'tm_footer' ,'posts_per_page' => -1 ) ),
			'active_callback'  => array(
				array(
					'setting'  => 'tm_footer_type',
					'operator' => '=',
					'value'    => 'use_tm_footer',
				),
			)
		) ));

/** Columns */
TM_Customizer::tm_add_customizer_field('tm_footer_column_number',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_footer_column_number'][0],
		'section'  => 'tm_footer_columns',
		'description'  => $thememountain_customizer_str['tm_footer_column_number'][1],
		'default'  => '3',
		'priority' => 10,
		'choices'     => array(
			'1' => $thememountain_customizer_str['tm_footer_column_number'][2],
			'2' => $thememountain_customizer_str['tm_footer_column_number'][3],
			'3' => $thememountain_customizer_str['tm_footer_column_number'][4],
			'4' => $thememountain_customizer_str['tm_footer_column_number'][5],
			'5' => $thememountain_customizer_str['tm_footer_column_number'][6],
			),
		'active_callback'  => array(
			array(
				'setting'  => 'tm_footer_type',
				'operator' => '=',
				'value'    => 'use_widget_space',
				),
			)
		) ));

/**
 * Footer Column Alignment
 */
$_count = 1;
while ($_count <= 5) {
	TM_Customizer::tm_add_customizer_field('tm_footer_column_align_'.$_count, array (
		TM_ThemeStrings::$theme_id, array(
			'type'     => 'select',
			'label'    => sprintf($thememountain_customizer_str['tm_footer_column_align_'][0],$_count),
			'section'  => 'tm_footer_columns',
			'description'  => $thememountain_customizer_str['tm_footer_column_align_'][1],
			'default'  => 'left',
			'priority' => 10,
			'choices'     => array(
				'left' => $thememountain_customizer_str['tm_footer_column_align_'][2],
				'center' => $thememountain_customizer_str['tm_footer_column_align_'][3],
				'right' => $thememountain_customizer_str['tm_footer_column_align_'][4],
				),
			'active_callback'  => array(
				array(
					'setting'  => 'tm_footer_column_number',
					'operator' => '<=',
					'value'    => $_count,
					),
				array(
					'setting'  => 'tm_footer_type',
					'operator' => '=',
					'value'    => 'use_widget_space',
					),
				)
			) ));
	$_count++;
}

/**
 * Footer Color Section
 */
	// Footer Background Color
	TM_Customizer::tm_add_customizer_field('tm_footer_background_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_customizer_str['tm_footer_background_color'][0],
			'section'     => 'tm_footer_color',
			'default'     => '#000',
			'priority'    => 10,
			'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.content-is-animated .wrapper,.footer',
			'css' => 'background-color: %s;',
			) ));

	// Footer Text Color
	TM_Customizer::tm_add_customizer_field('tm_footer_text_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_customizer_str['tm_footer_text_color'][0],
			'section'     => 'tm_footer_color',
			'default'     => '#888',
			'priority'    => 10,
			'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.footer',
			'css' => 'color: %s;',
			) ));

	// added 10 nov 2016 #46
	TM_Customizer::tm_add_customizer_field('tm_footer_link_text_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_customizer_str['tm_footer_link_text_color'][0],
			'section'     => 'tm_footer_color',
			'default'     => '#888',
			'priority'    => 10,
			'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.footer-top a:not(.button)',
			'css' => 'color: %s;',
			) ));
	TM_Customizer::tm_add_customizer_field('tm_footer_link_text_color_hover',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_customizer_str['tm_footer_link_text_color_hover'][0],
			'section'     => 'tm_footer_color',
			'default'     => '#ff4556',
			'priority'    => 10,
			'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.footer-top a:not(.button):hover',
			'css' => 'color: %s !important;',
			) ));

	// Footer Title Color
	TM_Customizer::tm_add_customizer_field('tm_footer_title_color',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_customizer_str['tm_footer_title_color'][0],
			'section'     => 'tm_footer_color',
			'default'     => '#888',
			'priority'    => 10,
			'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.footer h1, .footer h2, .footer h3, .footer h4, .footer h5, .footer h6',
			'css' => 'color: %s;',
			) ));
	// Footer Text Font Size
	TM_Customizer::tm_add_customizer_field('tm_footer_text_font_size',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'text',
			'label'       => $thememountain_customizer_str['tm_footer_text_font_size'][0],
			'section'     => 'tm_footer_color',
			'default'     => '13px',
			'priority'    => 10,
			'do_custom_enqueue' =>	TRUE,
			'css_selector'	 => '.footer .widget, .footer .widget a:not([class*="icon-"])',
			'css' => 'font-size: %s;'
			) ));

