<?php
/**
 * Common variables used for template config files are defined in this file.
 * This file begins with _ underscore to make sure that this file is loaded first before the config files.
 * This file is loaded in ThemeMountain\TM_TemplateServices::on_init();
 */
namespace ThemeMountain;

$thememountain_pageoption_str = TM_ThemeStrings::$text_strings['page_options'];
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

/**
 * TM Footer
 */
	TM_PageOptions::add_preset_option_sets('fields_footer', array(
		/** tm_footer_type */
		'tm_footer_type' => array(
			'name'             => $thememountain_pageoption_str['tm_footer_type'][0],
			'desc'             => $thememountain_pageoption_str['tm_footer_type'][1],
			'type'             => 'select',
			'default'          => 'use_customizer_settings',
			'options'          => array(
				'use_customizer_settings' => $thememountain_pageoption_str['tm_footer_type'][2],
				'use_widget_space' => $thememountain_pageoption_str['tm_footer_type'][3],
				'use_tm_footer' => $thememountain_pageoption_str['tm_footer_type'][4],
				'hide_footer' => $thememountain_pageoption_str['tm_footer_type'][5],
				),
			),
		/** tm_footer_id_to_show */
		'tm_footer_id_to_show' => array(
			'name'             => $thememountain_pageoption_str['tm_footer_id_to_show'][0],
			'desc'             => $thememountain_pageoption_str['tm_footer_id_to_show'][1],
			'type'             => 'select',
			'default'          => '',
			'options'          => TM_PageOptions::get_posts_list_in_array( array( 'post_type' => 'tm_footer' ,'posts_per_page' => -1 ) ),
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_type',
				'data-conditional-value' => 'use_tm_footer' )
			),
		/** Footer Position (dropdown) */
		'tm_footer_position' => array(
			'name'             => $thememountain_customizer_str['tm_footer_position'][0],
			'desc'             => $thememountain_customizer_str['tm_footer_position'][1],
			'type'             => 'select',
			'default'          => 'relative',
			'options'          => array(
				'relative'     => $thememountain_customizer_str['tm_footer_position'][2],
				'fixed' => $thememountain_customizer_str['tm_footer_position'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_type',
				'data-conditional-value' => 'use_tm_footer' )
			),
		/** Scale content upon footer reveal (chekcbox) */
		'tm_footer_scale_content_upon_footer_reveal' => array(
			'name'	=> $thememountain_customizer_str['tm_footer_scale_content_upon_footer_reveal'][0],
			'desc'	=> $thememountain_customizer_str['tm_footer_scale_content_upon_footer_reveal'][1],
			'type'    => 'checkbox',
			'default_cb' => function () {return '';},
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_type',
				'data-conditional-value' => 'use_tm_footer' )
			),
		/** tm_footer_column_number */
		'tm_footer_column_number' => array(
			'name'             => $thememountain_pageoption_str['tm_footer_column_number'][0],
			'desc'             => $thememountain_pageoption_str['tm_footer_column_number'][1],
			'type'             => 'select',
			'default'          => '3',
			'options'          => array(
				'1' => $thememountain_pageoption_str['tm_footer_column_number'][2],
				'2' => $thememountain_pageoption_str['tm_footer_column_number'][3],
				'3' => $thememountain_pageoption_str['tm_footer_column_number'][4],
				'4' => $thememountain_pageoption_str['tm_footer_column_number'][5],
				'5' => $thememountain_pageoption_str['tm_footer_column_number'][6],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_type',
				'data-conditional-value' => 'use_widget_space' )
			),
		/** tm_footer_column_align_1 */
		'tm_footer_column_align_1' => array(
			'name'             => $thememountain_pageoption_str['tm_footer_column_align_1'][0],
			'desc'             => $thememountain_pageoption_str['tm_footer_column_align_1'][1],
			'type'             => 'select',
			'default'          => 'left',
			'options'          => array(
				'left'     => $thememountain_pageoption_str['tm_footer_column_align_1'][2],
				'center' => $thememountain_pageoption_str['tm_footer_column_align_1'][3],
				'right' => $thememountain_pageoption_str['tm_footer_column_align_1'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_column_number',
				'data-conditional-value' => wp_json_encode(array('1','2','3','4','5')) )
			),
		/** tm_footer_column_align_2 */
		'tm_footer_column_align_2' => array(
			'name'             => $thememountain_pageoption_str['tm_footer_column_align_2'][0],
			'desc'             => $thememountain_pageoption_str['tm_footer_column_align_2'][1],
			'type'             => 'select',
			'default'          => 'left',
			'options'          => array(
				'left'     => $thememountain_pageoption_str['tm_footer_column_align_2'][2],
				'center' => $thememountain_pageoption_str['tm_footer_column_align_2'][3],
				'right' => $thememountain_pageoption_str['tm_footer_column_align_2'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_column_number',
				'data-conditional-value' => wp_json_encode(array('2','3','4','5')) )
			),
		/** tm_footer_column_align_3 */
		'tm_footer_column_align_3' => array(
			'name'             => $thememountain_pageoption_str['tm_footer_column_align_3'][0],
			'desc'             => $thememountain_pageoption_str['tm_footer_column_align_3'][1],
			'type'             => 'select',
			'default'          => 'left',
			'options'          => array(
				'left'     => $thememountain_pageoption_str['tm_footer_column_align_3'][2],
				'center' => $thememountain_pageoption_str['tm_footer_column_align_3'][3],
				'right' => $thememountain_pageoption_str['tm_footer_column_align_3'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_column_number',
				'data-conditional-value' => wp_json_encode(array('3','4','5')) )
			),
		/** tm_footer_column_align_4 */
		'tm_footer_column_align_4' => array(
			'name'             => $thememountain_pageoption_str['tm_footer_column_align_4'][0],
			'desc'             => $thememountain_pageoption_str['tm_footer_column_align_4'][1],
			'type'             => 'select',
			'default'          => 'left',
			'options'          => array(
				'left'     => $thememountain_pageoption_str['tm_footer_column_align_4'][2],
				'center' => $thememountain_pageoption_str['tm_footer_column_align_4'][3],
				'right' => $thememountain_pageoption_str['tm_footer_column_align_4'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_column_number',
				'data-conditional-value' => wp_json_encode(array('4','5')) )
			),
		/** tm_footer_column_align_5 */
		'tm_footer_column_align_5' => array(
			'name'             => $thememountain_pageoption_str['tm_footer_column_align_5'][0],
			'desc'             => $thememountain_pageoption_str['tm_footer_column_align_5'][1],
			'type'             => 'select',
			'default'          => 'left',
			'options'          => array(
				'left'     => $thememountain_pageoption_str['tm_footer_column_align_5'][2],
				'center' => $thememountain_pageoption_str['tm_footer_column_align_5'][3],
				'right' => $thememountain_pageoption_str['tm_footer_column_align_5'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_column_number',
				'data-conditional-value' => wp_json_encode(array('5')) )
			),
		/** tm_footer_background_color */
		// Overrides Customizer Settings
		'tm_footer_background_color' => array(
			'name'    => $thememountain_customizer_str['tm_footer_background_color'][0],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_footer_background_color',
			'default' => '#000000',
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_type',
				'data-conditional-value' => wp_json_encode(array('use_widget_space', 'use_tm_footer')),
				)
			),
		/** tm_footer_text_color */
		// Overrides Customizer Settings
		'tm_footer_text_color' => array(
			'name'    => $thememountain_customizer_str['tm_footer_text_color'][0],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_footer_text_color',
			'default' => '#888888',
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_type',
				'data-conditional-value' => wp_json_encode(array('use_widget_space', 'use_tm_footer')),
				)
			),
		/** tm_footer_link_text_color */
		// Overrides Customizer Settings
		'tm_footer_link_text_color' => array(
			'name'    => $thememountain_customizer_str['tm_footer_link_text_color'][0],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_footer_link_text_color',
			'default' => '#888888',
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_type',
				'data-conditional-value' => wp_json_encode(array('use_widget_space', 'use_tm_footer')),
				)
			),
		/** tm_footer_link_text_color_hover */
		// Overrides Customizer Settings
		'tm_footer_link_text_color_hover' => array(
			'name'    => $thememountain_customizer_str['tm_footer_link_text_color_hover'][0],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_footer_link_text_color_hover',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_type',
				'data-conditional-value' => wp_json_encode(array('use_widget_space', 'use_tm_footer')),
				)
			),
		/** tm_footer_title_color */
		// Overrides Customizer Settings
		'tm_footer_title_color' => array(
			'name'    => $thememountain_customizer_str['tm_footer_title_color'][0],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_footer_title_color',
			'default' => '#888888',
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_type',
				'data-conditional-value' => wp_json_encode(array('use_widget_space', 'use_tm_footer')),
				)
			),
		/** tm_footer_text_font_size */
		// Overrides Customizer Settings
		'tm_footer_text_font_size' => array(
			'name'    => $thememountain_customizer_str['tm_footer_text_font_size'][0],
			'type'    => 'text',
			'default_alias' => 'tm_footer_text_font_size',
			'default' => '13px',
			'attributes' => array(
				'data-conditional-id' => 'tm_footer_type',
				'data-conditional-value' => wp_json_encode(array('use_widget_space', 'use_tm_footer')),
				)
			),
	));
