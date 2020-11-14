<?php
/**
 * Common variables used for template config files are defined in this file.
 * This file begins with _ underscore to make sure that this file is loaded first before the config files.
 * This file is loaded in ThemeMountain\TM_TemplateServices::on_init();
 */
namespace ThemeMountain;

$thememountain_preheader_customizer = TM_ThemeStrings::$text_strings['preheader_customizer'];

/**
 * TM Preheader
 */
	TM_PageOptions::add_preset_option_sets('fields_preheader', array(
		/* Pre Header type */
		'tm_preheader_type' => array(
			'name'             => $thememountain_preheader_customizer['tm_preheader_type'][0],
			'desc'             => $thememountain_preheader_customizer['tm_preheader_type'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'customizer',
			'options'          => array(
				'use_tm_preheader' => $thememountain_preheader_customizer['tm_preheader_type'][2],
				'hide_preheader' => $thememountain_preheader_customizer['tm_preheader_type'][3],
				'customizer' => $thememountain_preheader_customizer['tm_preheader_type'][4],
				)),
		/* Pre Header to show */
		'tm_preheader_id_to_show' => array(
			'name'             => $thememountain_preheader_customizer['tm_preheader_id_to_show'][0],
			'desc'             => $thememountain_preheader_customizer['tm_preheader_id_to_show'][1],
			'type'             => 'select',
			'default'          => '',
			'options'          => TM_PageOptions::get_posts_list_in_array( array( 'post_type' => 'tm_preheader' ,'posts_per_page' => -1 ) ),
			'attributes' => array(
				'data-conditional-id' => 'tm_preheader_type',
				'data-conditional-value' => 'use_tm_preheader' )
			),
		/* Pre Header Height (textfield) */
		'tm_preheader_height' => array(
			'name'    => $thememountain_preheader_customizer['tm_preheader_height'][0],
			'desc'    => $thememountain_preheader_customizer['tm_preheader_height'][1],
			'type'    => 'text',
			'default' => 'auto',
			'attributes' => array(
				'data-conditional-id' => 'tm_preheader_type',
				'data-conditional-value' => 'use_tm_preheader',
				)
			),
		/* Pre Header Link Color (colorpicker) */
		'tm_preheader_link_color' => array(
			'name'    => $thememountain_preheader_customizer['tm_preheader_link_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_preheader_type',
				'data-conditional-value' => 'use_tm_preheader',
				)
			),
		/* Pre Header Link Hover Color(colorpicker) */
		'tm_preheader_link_color_hover' => array(
			'name'    => $thememountain_preheader_customizer['tm_preheader_link_color_hover'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_preheader_type',
				'data-conditional-value' => 'use_tm_preheader',
				)
			),
		));