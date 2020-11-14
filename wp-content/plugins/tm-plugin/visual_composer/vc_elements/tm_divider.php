<?php
/**
 * ThemeMountain Accordion VC Element Map
 */
if (class_exists( 'Vc_Manager' )) {
	vc_map( array(
		'name' => esc_html__( 'Divider', 'thememountain-plugin' ),
		'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
		'base' => 'tm_divider',
		'icon' => 'tm_vc_icon_divider',
		'is_container' => false,
		'show_settings_on_create' => false,
		'description' => '',
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
				'param_name' => 'el_class',
				'description'=> esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' )
				),
			// design Options
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Show On', 'thememountain-plugin' ),
				'param_name' => 'show_on',
				'value' => array(
					esc_html__('Desktop and Mobile', 'thememountain-plugin' ) => '',
					esc_html__('Mobile Only', 'thememountain-plugin' ) => 'hide show-on-mobile',
					esc_html__('Desktop Only', 'thememountain-plugin' ) => 'show hide-on-mobile',
					),
				'std' => '',
				'description' => esc_html__( 'Choose', 'thememountain-plugin' )
				),
			// border style
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Border Style', 'thememountain-plugin' ),
				'param_name' => 'border_style',
				'value' => array(
					esc_html__('Solid', 'thememountain-plugin' ) => 'solid',
					esc_html__('Dotted', 'thememountain-plugin' ) => 'dotted',
					esc_html__('Dashed', 'thememountain-plugin' ) => 'dashed',
					),
				'std' => 'solid',
				'description' => esc_html__( 'Choose', 'thememountain-plugin' )
				),
			// border_thickness
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Border Thickness', 'thememountain-plugin' ),
				'param_name' => 'border_thickness',
				'value' => array(
					esc_html__('Thin', 'thememountain-plugin' ) => 'thin',
					esc_html__('Thick', 'thememountain-plugin' ) => 'thick',
					),
				'std' => 'thin',
				'description' => esc_html__( 'Choose', 'thememountain-plugin' )
				),
			// color
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Border Color', 'thememountain-plugin' ),
				'param_name' => 'border_color',
				'std' => '#ddd',
				'description' => '',
				),
		),
	) );
}

class WPBakeryShortCode_tm_divider extends WPBakeryShortCode {
}