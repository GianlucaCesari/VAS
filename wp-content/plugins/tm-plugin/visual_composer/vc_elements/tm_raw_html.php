<?php
/**
 * tm_raw_html
 * Modified version of vc_raw_html
 *
 * @since      1.0
 */

vc_map( array(
	'name' => esc_html__( 'Raw HTML', 'thememountain-plugin' ),
	'base' => 'tm_raw_html',
	'icon' => 'icon-wpb-raw-html',
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'description' => esc_html__( 'Output raw HTML code on your page', 'thememountain-plugin' ),
	'params' => array(
		array(
			'type' => 'textarea_raw_html',
			'holder' => 'div',
			'heading' => esc_html__( 'Raw HTML', 'thememountain-plugin' ),
			'param_name' => 'content',
			'value' => base64_encode( '<p>I am raw html block.<br/>Click edit button to change this html</p>' ),
			'description' => esc_html__( 'Enter your HTML content.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			'param_name' => 'el_id',
			'value' => '',
			'description' => esc_html__('Give this section a unique ID. This is useful if you want to initiate scroll or link to this section.','thememountain-plugin'),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra class name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'thememountain-plugin' ),
		),
	),
));

class WPBakeryShortCode_tm_raw_html extends WPBakeryShortCode {}