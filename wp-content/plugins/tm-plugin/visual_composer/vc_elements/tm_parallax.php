<?php
use ThemeMountain\TM_Vc as TM_Vc;
/**
 * ThemeMountain Parallax
 */
if (class_exists( 'Vc_Manager' )) {
	vc_map( array(
		'name' => esc_html__( 'Parallax', 'thememountain-plugin' ),
		'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
		'base' => 'tm_parallax',
		'icon' => 'tm_vc_icon_parallax_block',
		'as_parent' => array('only' => 'tm_aux_caption,tm_aux_button,tm_aux_icon'),
		'is_container' => true,
		'show_settings_on_create' => true,
		'description' => '',
		'params' => array(
			ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Image', 'thememountain-plugin'),esc_html__( 'Upload parallax image.', 'thememountain-plugin' )),
			ThemeMountain\TM_Vc::get_attach_image_vc_field(),
			ThemeMountain\TM_Vc::get_image_url_vc_field(),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Column Width', 'thememountain-plugin' ),
				'param_name' => 'column_width',
				'value' => ThemeMountain\TM_Vc::$vc_elements_variable['column_width'],
				'std' => '6',
				'description'=> esc_html__( 'Determines the column width. Values range from 1 - 12 columns (full width).', 'thememountain-plugin' ),
				),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Column Offset', 'thememountain-plugin' ),
				'param_name' => 'column_offset',
				'value' => ThemeMountain\TM_Vc::$vc_elements_variable['column_offset'],
				'std' => '3',
				'description'=> esc_html__( 'Determines the column offset. Refer to Rows & Columns > Column Alignment > Understanding Column Offset for detailed examples of column offsets.', 'thememountain-plugin' ),
				),
			// Height
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Height', 'thememountain-plugin' ),
				'param_name' => 'height_type',
				'value' => array(
					esc_html__( 'Small', 'thememountain-plugin' ) => 'default',
					esc_html__( 'Window Height', 'thememountain-plugin' ) => 'use_window_height',
					esc_html__( 'Auto', 'thememountain-plugin' ) => 'auto',
					esc_html__( 'Custom', 'thememountain-plugin' ) => 'custom',
					),
				'std' => 'default',
				'description'=> esc_html__( 'Sets the parallax section height to either Default, Window Height, Auto or to Custom.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Custom Height Value', 'thememountain-plugin' ),
				'param_name' => 'custom_height',
				'value' => '500',
				'dependency' => array('element' => 'height_type','value'=>'custom'),
				'description'=> esc_html__( 'Allows you to set your preferred height. Entered as pixels i.e. 400.', 'thememountain-plugin' )
				),
			array(
				'type' => 'checkbox',
				'param_name' => 'use_fade',
				'value' => array( esc_html__( 'Tick this box to use fade in and out', 'thememountain-plugin' ) => 'true' ),
				'std' => 'true',
				'description'=> esc_html__( 'Determines whether section should fade in/out as it scrolls in/out of viewport.', 'thememountain-plugin' ),
				),
			// scaling
			// array(
			// 	'type' => 'checkbox',
			// 	'heading' => esc_html__( 'Scaling', 'thememountain-plugin' ),
			// 	'param_name' => 'use_scaling',
			// 	'value' => array( esc_html__( 'Tick this box to use scaling', 'thememountain-plugin' ) => 'true' ),
			// 	'std' => 'true',
			// 	),
			// array(
			// 	'type' => 'textfield',
			// 	'heading' => esc_html__( 'Scale under', 'thememountain-plugin' ),
			// 	'param_name' => 'scale_under',
			// 	'value' => '960',
			// 	'dependency' => array('element' => 'use_scaling','value'=>'true'),
			// 	),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
				'param_name' => 'el_id',
				'description'=> esc_html__( 'Give this section a unique ID. This is useful if you want to initiate scroll or link to this section.', 'thememountain-plugin' )
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
				'param_name' => 'el_class',
				'description'=> esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' )
				),
			array(
				'type' => 'tab_id',
				'heading' => esc_html__( 'ID (Internal use only)', 'thememountain-plugin' ),
				'param_name' => 'parallax_id',
				'description' => '',
				),
			// 'group' => 'Design Options',
			array(
				'group' => 'Design Options',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Caption Horizontal Alignment', 'thememountain-plugin' ),
				'param_name' => 'caption_horizontal_alignment',
				'value' => array(
					esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
					esc_html__( 'Center', 'thememountain-plugin' ) => 'center',
					esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
					),
				'std' => 'center',
				'description'=> esc_html__( 'Whether the caption should be left, center or right aligned. This takes effect for all caption types.', 'thememountain-plugin' ),
				),

			array(
				'group' => 'Design Options',
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Text Color', 'thememountain-plugin' ),
				'param_name' => 'text_color',
				'std' => '#FFFFFF',
				),
    		// Overlay background color with gradient support
			array(
				'group' => 'Design Options',
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Overlay Background Color', 'thememountain-plugin' ),
				'param_name' => 'overlay_background_color',
				'std' => 'rgba(0,0,0,0.3)',
				'description' => '',
			),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'checkbox',
				'heading' => esc_html__( 'Use gradient for overlay background', 'thememountain-plugin' ),
				'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
				'param_name' => 'overlay_background_use_gradient',
				'std' => '',
				'description' => esc_html__( 'This will create a background image gradient, which means that if you have set an image as a background, the gradient will replace it. If selected, Background Color will be used as the start color for the gradient.', 'thememountain-plugin' ),
			),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'End Overlay Background Color Gradient', 'thememountain-plugin' ),
				'param_name' => 'overlay_background_gradient_end_color',
				'std' => '',
				'dependency' => array('element' => 'overlay_background_use_gradient','value'=>'true'),
			),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'textfield',
				'heading' => esc_html__( 'Angle for the Overlay Background Color Gradient', 'thememountain-plugin' ),
				'param_name' => 'overlay_background_gradient_angle',
				'description'=> esc_html__( 'Sets the angle of your gradient, acceptable values range from 0-360', 'thememountain-plugin' ),
				'dependency' => array('element' => 'overlay_background_use_gradient','value'=>'true'),
			),
			// End Overlay background color with gradient support
		),
		// 'custom_markup' => '<h4 class="wpb_element_title"> <i class="vc_general vc_element-icon icon-wpb-row" data-is-container="true"></i> ThemeMountain Progress Bar</h4><div class="wpb_element_preview"></div>'
		// ,
		"js_view" => 'VcColumnView'
	) );
}

class WPBakeryShortCode_tm_parallax extends WPBakeryShortCodesContainer {
}