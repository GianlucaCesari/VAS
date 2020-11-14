<?php
use ThemeMountain\TM_Vc as TM_Vc;
/**
 * ThemeMountain Accordion VC Element Map
 */
vc_map( array(
	'name' => esc_html__( 'Google Map', 'thememountain-plugin' ),
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'base' => 'tm_map',
	'is_container' => true,
	'icon' => 'tm_vc_icon_map',
	'show_settings_on_create' => true,
	'description' => '',
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Use Embed or Button', 'thememountain-plugin' ),
			'param_name' => 'is_button_or_embed',
			// 'admin_label' => true,
			'value' => array(
				esc_html__( 'Embed', 'thememountain-plugin' ) => 'embed',
				esc_html__( 'Button', 'thememountain-plugin' ) => 'button',
				),
			'std' => 'embed',
			'save_always' => true,
			'description' => esc_html__( 'Determines whether the map should be embedded in the page or be launched in a lightbox using a button.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Button Label', 'thememountain-plugin' ),
			'param_name' => 'button_label',
			'value' => esc_html__('See Google Maps', 'thememountain-plugin'),
			'dependency' => array('element' => 'is_button_or_embed','value'=>'button'),
			'description' => esc_html__( 'Enter button label.', 'thememountain-plugin' ),
			),
		// map style
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Map Style Type', 'thememountain-plugin' ),
			'param_name' => 'map_style',
			// 'admin_label' => true,
			'value' => array(
				esc_html__( 'Color', 'thememountain-plugin' ) => 'color',
				esc_html__( 'Greyscale', 'thememountain-plugin' ) => 'greyscale',
				),
			'dependency' => array('element' => 'is_button_or_embed','value'=>'embed'),
			'std' => 'color',
			'description' => esc_html__( 'Determines whether the map should be shown in <b>color</b> or in <b>greyscale</b>.', 'thememountain-plugin' ),
			),
		// map location 1
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Coordinates 1', 'thememountain-plugin' ),
			'param_name' => 'map_coordinates_1',
			'description' => esc_html__( 'Enter the map coordinates of the first map marker here. Lat/long should be comma separated i.e. <b>40.723301,-74.002988</b>.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Information 1', 'thememountain-plugin' ),
			'param_name' => 'map_info_1',
			'dependency' => array('element' => 'is_button_or_embed','value'=>'embed'),
			'description' => esc_html__( 'Enter the map tooltip information of the first map marker here.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Marker image 1', 'thememountain-plugin' ),
			'param_name' => 'map_marker_1',
			'dependency' => array('element' => 'is_button_or_embed','value'=>'embed'),
			'description' => esc_html__( 'Upload the first map marker.', 'thememountain-plugin' ),
			),
		// map location 2
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Coordinates 2', 'thememountain-plugin' ),
			'param_name' => 'map_coordinates_2',
			'dependency' => array('element' => 'is_button_or_embed','value'=>'embed'),
			'description' => esc_html__( 'Enter the map coordinates of the second map marker here. Lat/long should be comma separated i.e. <b>40.723301,-74.002988</b>.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Information 2', 'thememountain-plugin' ),
			'param_name' => 'map_info_2',
			'dependency' => array('element' => 'is_button_or_embed','value'=>'embed'),
			'description' => esc_html__( 'Enter the map tooltip information of the second map marker here.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Marker image 2', 'thememountain-plugin' ),
			'param_name' => 'map_marker_2',
			'dependency' => array('element' => 'is_button_or_embed','value'=>'embed'),
			'description' => esc_html__( 'Upload the second map marker.', 'thememountain-plugin' ),
			),
		// zoom level
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Zoom level', 'thememountain-plugin' ),
			'param_name' => 'zoom_level',
			'value' => array(
				esc_html__( '0', 'thememountain-plugin' ) => '0',
				esc_html__( '1', 'thememountain-plugin' ) => '1',
				esc_html__( '2', 'thememountain-plugin' ) => '2',
				esc_html__( '3', 'thememountain-plugin' ) => '3',
				esc_html__( '4', 'thememountain-plugin' ) => '4',
				esc_html__( '5', 'thememountain-plugin' ) => '5',
				esc_html__( '6', 'thememountain-plugin' ) => '6',
				esc_html__( '7', 'thememountain-plugin' ) => '7',
				esc_html__( '8', 'thememountain-plugin' ) => '8',
				esc_html__( '9', 'thememountain-plugin' ) => '9',
				esc_html__( '10', 'thememountain-plugin' ) => '10',
				esc_html__( '11', 'thememountain-plugin' ) => '11',
				esc_html__( '12', 'thememountain-plugin' ) => '12',
				esc_html__( '13', 'thememountain-plugin' ) => '13',
				esc_html__( '14', 'thememountain-plugin' ) => '14',
				esc_html__( '15', 'thememountain-plugin' ) => '15',
				esc_html__( '16', 'thememountain-plugin' ) => '16',
				esc_html__( '17', 'thememountain-plugin' ) => '17',
				esc_html__( '18', 'thememountain-plugin' ) => '18',
				esc_html__( '19', 'thememountain-plugin' ) => '19',
				),
			'std' => '16',
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description'=> esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' )
			),
		// Display options
		array(
			'group' => esc_html__( 'Display Options', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Insert Map Inline', 'thememountain-plugin' ),
			'param_name' => 'display_inline',
			'value' => array( esc_html__( 'Display inline', 'thememountain-plugin' ) => 'true' ),
			'dependency' => array('element' => 'is_button_or_embed','value'=>'button'),
			'std' => '',
			'description'=> esc_html__( 'Determines whether the button should be inserted on its own line or alignd next to the previous element.', 'thememountain-plugin' )
			),
		// Design options
		array(
			'group' => 'Design Options',
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'thememountain-plugin' ),
			'param_name' => 'icon_id',
			'settings' => array(
				'emptyIcon' => true,
				'type' => 'tm-entypo',
				'iconsPerPage' => 200,
				),
			'std' => '',
			'dependency' => array('element' => 'is_button_or_embed','value'=>'button'),
			'description' => esc_html__( 'Select the icon to be used.', 'thememountain-plugin' ),
		),
		array(
			'group' => 'Design Options',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon Alignment', 'thememountain-plugin' ),
			'param_name' => 'icon_alignment',
			'value' => array(
				esc_html__( 'Icon Left', 'thememountain-plugin' ) => 'left',
				esc_html__( 'Icon Right', 'thememountain-plugin' ) => 'right',
			),
			'dependency' => array('element' => 'is_button_or_embed','value'=>'button'),
			'std' => 'left',
			'description'=> esc_html__( 'This option is dependant upon General > Icon . Determines whether button icon should be left or right aligned.', 'thememountain-plugin' )
		),
		array(
			'group' => 'Design Options',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Button Size', 'thememountain-plugin' ),
			'param_name' => 'button_size',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['sizes'],
			'dependency' => array('element' => 'is_button_or_embed','value'=>'button'),
			'std' => 'medium',
			'description'=> esc_html__( 'Determines whether button should be small, medium, large or extra large in size.', 'thememountain-plugin' )
		),
		array(
			'group' => 'Design Options',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Button Style', 'thememountain-plugin' ),
			'param_name' => 'border_style',
			'value' => array(
				esc_html__( 'None', 'thememountain-plugin' ) => '',
				esc_html__( 'Rounded', 'thememountain-plugin' ) => 'rounded',
				esc_html__( 'Pill', 'thememountain-plugin' ) => 'pill',
			),
			'dependency' => array('element' => 'is_button_or_embed','value'=>'button'),
			'std' => '',
			'description'=> esc_html__( 'Whether button should have sharp corners, rounded corners, or be pill shaped.', 'thememountain-plugin' )
		),
		// colorpicker
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Background Color', 'thememountain-plugin' ),
			'param_name' => 'bkg_color',
			'std' => '#EEE',
			'dependency' => array('element' => 'is_button_or_embed','value'=>'button'),
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Background Color hover', 'thememountain-plugin' ),
			'param_name' => 'bkg_color_hover',
			'std' => '#D0D0D0',
			'dependency' => array('element' => 'is_button_or_embed','value'=>'button'),
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Border color', 'thememountain-plugin' ),
			'param_name' => 'border_color',
			'std' => '#EEE',
			'dependency' => array('element' => 'is_button_or_embed','value'=>'button'),
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Border color hover', 'thememountain-plugin' ),
			'param_name' => 'border_color_hover',
			'std' => '#D0D0D0',
			'dependency' => array('element' => 'is_button_or_embed','value'=>'button'),
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Label Color', 'thememountain-plugin' ),
			'param_name' => 'label_color',
			'std' => '#666',
			'dependency' => array('element' => 'is_button_or_embed','value'=>'button'),
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Label Color Hover', 'thememountain-plugin' ),
			'param_name' => 'label_color_hover',
			'std' => '#666',
			'dependency' => array('element' => 'is_button_or_embed','value'=>'button'),
			),
		// shadow checkbox
		array(
			'type' => 'checkbox',
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'heading' => esc_html__( 'Drop Shadow', 'thememountain-plugin' ),
			'param_name' => 'drop_shadow',
			'value' => array( esc_html__( 'Drop Shadow', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'dependency' => array('element' => 'is_button_or_embed','value'=>'button'),
			),
	),
	// 'custom_markup' => '<h4 class="wpb_element_title"> <i class="vc_general vc_element-icon icon-wpb-row" data-is-container="true"></i> ThemeMountain Progress Bar</h4><div class="wpb_element_preview"></div>'
	// ,
	// 'js_view' => 'TmProgressBarView'
) );

class WPBakeryShortCode_tm_map extends WPBakeryShortCode {
}
