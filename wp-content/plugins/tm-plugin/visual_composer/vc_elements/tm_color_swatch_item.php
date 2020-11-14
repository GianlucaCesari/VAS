<?php
/**
	tm_color_swatch_item.php
*/

	// iconpicker custom icons
	// https://wpbakery.atlassian.net/wiki/display/VC/Adding+Icons+to+vc_icon
if (class_exists( 'Vc_Manager' )) {
	vc_map( array(
		'name' => esc_html__( 'Color Swatch', 'thememountain-plugin' ),
		'base' => 'tm_color_swatch_item',
		"icon"      => "tm_vc_icon_color_swatch",
		// 'allowed_container_element' => false,
		'is_container' => true,
		"as_child" => array('only' => 'tm_color_swatch_holder'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    	"content_element" => true,
    	'description' => '',
		'params' => array(
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Show Title', 'thememountain-plugin' ),
				'param_name' => 'show_title',
				'value' => array( esc_html__( 'Show Title', 'thememountain-plugin' ) => 'true' ),
				'std' => 'true',
				'description' => esc_html__( 'Whether color swatch title should be shown or not.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'thememountain-plugin' ),
				'param_name' => 'title',
				'value' => '',
				'dependency' => array('element' => 'show_title','value'=>'true'),
				'description' => esc_html__( 'Color swatch title.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Show Hex', 'thememountain-plugin' ),
				'param_name' => 'show_hex',
				'value' => array( esc_html__( 'Show Hex', 'thememountain-plugin' ) => 'true' ),
				'std' => 'true',
				'description' => esc_html__( 'Whether color swatch hex should be shown.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Hex Reference', 'thememountain-plugin' ),
				'param_name' => 'hex_reference',
				'value' => '',
				'dependency' => array('element' => 'show_hex','value'=>'true'),
				'admin_label' => true,
				'description' => esc_html__( 'Color swatch hex value.', 'thememountain-plugin' ),
				),
			// extra
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
				'param_name' => 'el_class',
				'description'=> esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' )
				),
			// array(
			// 	'type' => 'textfield',
			// 	'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			// 	'param_name' => 'el_id',
			// 	'value' => '',
			// 	),
			/* Design Options */
			array(
				'group' => 'Design Options',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Swatch Style', 'thememountain-plugin' ),
				'param_name' => 'swatch_style',
				'value' => array(
					esc_html__( 'Boxed', 'thememountain-plugin' ) => 'icon-boxed',
					esc_html__( 'Circled', 'thememountain-plugin' ) => 'icon-circled',
					),
				'std' => 'icon-boxed',
				'description' => '',
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Title Color', 'thememountain-plugin' ),
				'param_name' => 'title_color',
				'std' => '#000000',
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Swatch Background Color', 'thememountain-plugin' ),
				'param_name' => 'swatch_background_color',
				'std' => '#666666',
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Swatch Border Color', 'thememountain-plugin' ),
				'param_name' => 'swatch_border_color',
				'std' => '#666666',
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Swatch Icon Color', 'thememountain-plugin' ),
				'param_name' => 'swatch_icon_color',
				'std' => '#ffffff',
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Hex Reference Color', 'thememountain-plugin' ),
				'param_name' => 'hex_reference_color',
				'admin_label' => TRUE,
				'std' => '#999999',
				),
		),
		'js_view' => 'TmTabView',
	) );
}

class WPBakeryShortCode_tm_color_swatch_item extends WPBakeryShortCode_tm_tab_item {
}