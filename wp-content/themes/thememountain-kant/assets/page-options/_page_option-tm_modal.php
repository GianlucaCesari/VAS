<?php
/**
 * Common variables used for template config files are defined in this file.
 * This file begins with _ underscore to make sure that this file is loaded first before the config files.
 * This file is loaded in ThemeMountain\TM_TemplateServices::on_init();
 */
namespace ThemeMountain;

$thememountain_pageoption_str = TM_ThemeStrings::$text_strings['page_options'];

/**
 * TM Modal
 */
	TM_PageOptions::add_preset_option_sets('fields_modal', array(
		/* Modal Width (textfield) */
		'tm_modal_width' => array(
			'name'    => $thememountain_pageoption_str['tm_modal_width'][0],
			'desc'    => $thememountain_pageoption_str['tm_modal_width'][1],
			'default' => '500',
			'type'    => 'text',
			),
		/* Modal Content Animation */
		'tm_modal_content_animation' => array(
			'name'             => $thememountain_pageoption_str['tm_modal_content_animation'][0],
			'desc'             => $thememountain_pageoption_str['tm_modal_content_animation'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'fade',
			'options'          => array(
				'fade' => $thememountain_pageoption_str['tm_modal_content_animation'][2],
				'slideInTop' => $thememountain_pageoption_str['tm_modal_content_animation'][3],
				'slideInBottom' => $thememountain_pageoption_str['tm_modal_content_animation'][4],
				'scaleIn' => $thememountain_pageoption_str['tm_modal_content_animation'][5],
				'scaleOut' => $thememountain_pageoption_str['tm_modal_content_animation'][6],
				)),
		/* Lightbox Overlay Animation */
		'tm_modal_lightbox_overlay_animation' => array(
			'name'             => $thememountain_pageoption_str['tm_modal_lightbox_overlay_animation'][0],
			'desc'             => $thememountain_pageoption_str['tm_modal_lightbox_overlay_animation'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'fade',
			'options'          => array(
				'fade' => $thememountain_pageoption_str['tm_modal_lightbox_overlay_animation'][2],
				'slideInTop' => $thememountain_pageoption_str['tm_modal_lightbox_overlay_animation'][3],
				'slideInRight' => $thememountain_pageoption_str['tm_modal_lightbox_overlay_animation'][4],
				'slideInBottom' => $thememountain_pageoption_str['tm_modal_lightbox_overlay_animation'][5],
				'slideInLeft' => $thememountain_pageoption_str['tm_modal_lightbox_overlay_animation'][6],
				)),
		/* Add Modal Header */
		'tm_modal_header' => array(
			'name'	=> $thememountain_pageoption_str['tm_modal_header'][0],
			'desc'	=> $thememountain_pageoption_str['tm_modal_header'][1],
			'type'    => 'checkbox',
			'default_cb' => function () {return '';},
			),
		/* Modal Border Style (dropdown) */
		'tm_modal_border_style' => array(
			'name'             => $thememountain_pageoption_str['tm_modal_border_style'][0],
			'desc'             => $thememountain_pageoption_str['tm_modal_border_style'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'none',
			'options'          => array(
				'none' => $thememountain_pageoption_str['tm_modal_border_style'][2],
				'rounded' => $thememountain_pageoption_str['tm_modal_border_style'][3],
				)),
		/* Modal Header Title */
		'tm_modal_header_title' => array(
			'name'    => $thememountain_pageoption_str['tm_modal_header_title'][0],
			'desc'    => $thememountain_pageoption_str['tm_modal_header_title'][1],
			'type'    => 'text',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_modal_header',
				'data-conditional-value' => 'on',
				)
			),
		/* Modal Header Background Color */
		'tm_modal_header_background_color' => array(
			'name'    => $thememountain_pageoption_str['tm_modal_header_background_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_modal_header',
				'data-conditional-value' => 'on',
				)
			),
		/* Modal Header Title Color */
		'tm_modal_header_title_color' => array(
			'name'    => $thememountain_pageoption_str['tm_modal_header_title_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_modal_header',
				'data-conditional-value' => 'on',
				)
			),
		/* Modal Close Button Color (colorpicker) */
		'tm_modal_close_button_color' => array(
			'name'    => $thememountain_pageoption_str['tm_modal_close_button_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#111',
			'attributes' => array(
				'data-conditional-id' => 'tm_modal_header',
				'data-conditional-value' => 'on',
				)
			),
		/* Modal Custom Classes */
		'tm_modal_custom_classes' => array(
			'name'    => $thememountain_pageoption_str['tm_modal_custom_classes'][0],
			'desc'    => $thememountain_pageoption_str['tm_modal_custom_classes'][1],
			'type'    => 'text',
			'default' => '',
			),
		/* Auto Launch Modal */
		'tm_modal_auto_launch' => array(
			'name'	=> $thememountain_pageoption_str['tm_modal_auto_launch'][0],
			'desc'	=> $thememountain_pageoption_str['tm_modal_auto_launch'][1],
			'type'    => 'checkbox',
			'default_cb' => function () {return '';},
			),
		/* Auto Launch Modal Delay */
		'tm_modal_auto_launch_delay' => array(
			'name'    => $thememountain_pageoption_str['tm_modal_auto_launch_delay'][0],
			'desc'    => $thememountain_pageoption_str['tm_modal_auto_launch_delay'][1],
			'type'    => 'text',
			'default' => '1000',
			'attributes' => array(
				'data-conditional-id' => 'tm_modal_auto_launch',
				'data-conditional-value' => 'on',
				)
			),
		/* Auto Close Modal (checkbox) */
		'tm_modal_auto_close' => array(
			'name'	=> $thememountain_pageoption_str['tm_modal_auto_close'][0],
			'desc'	=> $thememountain_pageoption_str['tm_modal_auto_close'][1],
			'type'    => 'checkbox',
			'default_cb' => function () {return '';},
			),
		/* Set Cookie */
		'tm_modal_auto_launch_cookie' => array(
			'name'	=> $thememountain_pageoption_str['tm_modal_auto_launch_cookie'][0],
			'desc'	=> $thememountain_pageoption_str['tm_modal_auto_launch_cookie'][1],
			'type'    => 'checkbox',
			'default_cb' => function () {return '';},
			'attributes' => array(
				'data-conditional-id' => 'tm_modal_auto_launch',
				'data-conditional-value' => 'on',
				)
			),
		));