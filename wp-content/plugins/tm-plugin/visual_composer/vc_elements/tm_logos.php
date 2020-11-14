<?php
use ThemeMountain\TM_Vc as TM_Vc;
/**
 * ThemeMountain Accordion VC Element Map
 */
if (class_exists( 'Vc_Manager' )) {
	vc_map( array(
		'name' => esc_html__( 'Logos', 'thememountain-plugin' ),
		'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
		'base' => 'tm_logos',
		'icon' => 'tm_vc_icon_logos',
		'is_container' => true,
		'show_settings_on_create' => true,
		'description' => '',
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Items Per Row', 'thememountain-plugin' ),
				'param_name' => 'items_per_row',
				'value' => array(
					'3 Logos' => '3',
					'4 Logos' => '4',
					'5 Logos' => '5',
					'6 Logos' => '6',
					),
				'std' => '3',
				'description' => esc_html__( 'Determines the number of logos per row. Possible values are <b>3-6 logos per row</b>.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Logo Type', 'thememountain-plugin' ),
				'param_name' => 'logo_type',
				'value' => array(
					esc_html__( 'Simple Grid', 'thememountain-plugin' ) => '1',
					esc_html__( 'Grid with boxes', 'thememountain-plugin' ) => '2',
					esc_html__( 'Grid with borders', 'thememountain-plugin' ) => '3',
					esc_html__( 'Grid with dividers', 'thememountain-plugin' ) => '4',
					),
				'std' => '1',
				'description' => esc_html__( 'Determines the logos section type, either simple, logo section with background image, logo section with boxed grid, or logos section with dividers.', 'thememountain-plugin' ),
				),
			// Image
			array(
				'type' => 'attach_images',
				'heading' => esc_html__( 'Logos', 'thememountain-plugin' ),
				'param_name' => 'logos_id',
				'description' => esc_html__( 'Upload the logos required for the logos section. Note: Multiple logos can be uploaded at once.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
				'param_name' => 'el_id',
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
				'param_name' => 'el_class',
				'description'=> esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' )
				),
			// design options
			array(
				'group' => esc_html__( 'Design options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Background Color Logo', 'thememountain-plugin' ),
				'param_name' => 'bkg_color_logo',
				'std' => 'rgba(0,0,0,0.5)',
				'dependency' => array('element' => 'logo_type','value'=>'2'),
				'description' => '',
				),
			array(
				'group' => esc_html__( 'Design options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Background Hover Color Logo', 'thememountain-plugin' ),
				'param_name' => 'bkg_color_logo_hover',
				'std' => 'rgba(0,0,0,0.5)',
				'dependency' => array('element' => 'logo_type','value'=>'2'),
				'description' => '',
				),
			array(
				'group' => esc_html__( 'Design options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Border Color Logo (Hover)', 'thememountain-plugin' ),
				'param_name' => 'border_bkg_color_hover',
				'std' => '#dddddd',
				'dependency' => array('element' => 'logo_type','value'=>array('3','4')),
				'description' => '',
				),
			array(
				'group' => esc_html__( 'Design options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Logo Background Color (Hover)', 'thememountain-plugin' ),
				'param_name' => 'logo_bkg_color_hover',
				'std' => '#dddddd',
				'dependency' => array('element' => 'logo_type','value'=>'3'),
				'description' => '',
				),
			array(
				'group' => esc_html__( 'Design options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Grid Border Color', 'thememountain-plugin' ),
				'param_name' => 'border_color',
				'std' => '#dddddd',
				'dependency' => array('element' => 'logo_type','value'=>array('4')),
				'description' => '',
				),
		),
	) );
}

class WPBakeryShortCode_tm_logos extends WPBakeryShortCode {
}
