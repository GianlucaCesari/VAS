<?php
vc_map( array(
	'name' => esc_html__( 'Feature Columns', 'thememountain-plugin' ),
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'base' => 'tm_feature_columns',
	'icon' => 'tm_vc_icon_feature_column',
	'show_settings_on_create' => true,
	'is_container' => TRUE,
	'description' => '',
	'params' => array(
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'thememountain-plugin' ),
			'param_name' => 'icon_id',
			'settings' => array(
				'emptyIcon' => true,
				'type' => 'tm-entypo',
				'iconsPerPage' => 200,
				),
			'admin_label' => TRUE,
			'std' => '',
			'description' => esc_html__( 'Select the icon to be used.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Margin Bottom Icon', 'thememountain-plugin' ),
			'param_name' => 'icon_margin_bottom',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['margin_notches'],
			'std' => '30',
			'description' => ''
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Margin Bottom Icon on Mobiles', 'thememountain-plugin' ),
			'param_name' => 'icon_margin_bottom_mobile',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['margin_notches'],
			'std' => '30',
			'description' => ''
			),
		// content
		array(
			'type' => 'textarea_html',
			'heading' => esc_html__( 'Feature Column Content', 'thememountain-plugin' ),
			'param_name' => 'content',
			'description'=> esc_html__( 'Hero content goes here.', 'thememountain-plugin' ),
			),
		ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field(),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description'=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'thememountain-plugin' )
		),
		array(
			'type' => 'tab_id',
			'heading' => esc_html__( 'Slide ID', 'thememountain-plugin' ),
			'param_name' => "slide_id",
			'description' => esc_html__( 'This is for internal use.', 'thememountain-plugin' )
			),
		// 'group' => 'Design Options',
		array(
			'group' => 'Design Options',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon Alignment', 'thememountain-plugin' ),
			'param_name' => 'icon_alignment',
			'value' => array(
				esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
				esc_html__( 'Center', 'thememountain-plugin' ) => 'center',
				esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
				),
			'std' => 'left',
			'description' => '',
			),
		array(
			'group' => 'Design Options',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon Size', 'thememountain-plugin' ),
			'param_name' => 'icon_size',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['sizes'],
			'std' => 'medium',
			'description' => esc_html__( 'Determines whether the icon should be small, medium, large or extra large in size.', 'thememountain-plugin' ),
			),
		array(
			'group' => 'Design Options',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon Style', 'thememountain-plugin' ),
			'param_name' => 'icon_style',
			'value' => array(
				esc_html__( 'None', 'thememountain-plugin' ) => '',
				esc_html__( 'Boxed Icon', 'thememountain-plugin' ) => 'icon-boxed',
				esc_html__( 'Circled Icon', 'thememountain-plugin' ) => 'icon-circled',
				),
			'std' => '',
			'description' => esc_html__( 'Determines whether icon should have no styling, or whether it should be boxed or circled.', 'thememountain-plugin' ),
			),
		// colors
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Background Color', 'thememountain-plugin' ),
			'param_name' => 'bkg_color',
			'std' => '#EEE',
			'dependency' => array('element' => 'icon_style','value'=>array('icon-boxed','icon-circled')),
			'description' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Background Color Hover', 'thememountain-plugin' ),
			'param_name' => 'bkg_color_hover',
			'std' => '#D0D0D0',
			'dependency' => array('element' => 'icon_style','value'=>array('icon-boxed','icon-circled')),
			'description' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Border Color', 'thememountain-plugin' ),
			'param_name' => 'border_color',
			'std' => '#EEE',
			'dependency' => array('element' => 'icon_style','value'=>array('icon-boxed','icon-circled')),
			'description' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Border Color Hover', 'thememountain-plugin' ),
			'param_name' => 'border_color_hover',
			'std' => '#D0D0D0',
			'dependency' => array('element' => 'icon_style','value'=>array('icon-boxed','icon-circled')),
			'description' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Icon Color', 'thememountain-plugin' ),
			'param_name' => 'label_color',
			'std' => '#666',
			'description' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Icon Color Hover', 'thememountain-plugin' ),
			'param_name' => 'label_color_hover',
			'std' => '#666',
			'description' => '',
			),
	),
) );

class WPBakeryShortCode_tm_feature_columns extends WPBakeryShortCode {

}