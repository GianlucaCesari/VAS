<?php
use ThemeMountain\TM_Vc as TM_Vc;
/**
 * ThemeMountain Accordion VC Element Map
 */
if (class_exists( 'Vc_Manager' )) {
	vc_map( array(
		'name' => esc_html__( 'Full Width Hero With Boxed Content', 'thememountain-plugin' ),
		'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
		'base' => 'tm_hero_3',
		'icon' => 'tm_vc_icon_hero-3',
		'is_container' => true,
		'show_settings_on_create' => true,
		'description' => esc_html__( 'hero-3', 'thememountain-plugin' ),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Height', 'thememountain-plugin' ),
				'param_name' => 'height',
				'value' => array(
					esc_html__( 'Small', 'thememountain-plugin' ) => '',
					esc_html__( 'Window height', 'thememountain-plugin' ) => 'window_height',
					esc_html__( 'Auto', 'thememountain-plugin' ) => 'auto',
					esc_html__( 'Custom', 'thememountain-plugin' ) => 'custom',
					),
				'std' => '',
				'description'=> esc_html__( 'Sets the hero section height to either Small, Window Height, Auto or to Custom.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Custom Height', 'thememountain-plugin' ),
				'param_name' => 'height_custom',
				'dependency' => array('element' => 'height','value'=>'custom'),
				'value' => '400',
				'description'=> esc_html__( 'Allows you to set your preferred height. If you like to enter the value as pixels, it should be i.e. 400.', 'thememountain-plugin' ),
				),
			// Image
			ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Image', 'thememountain-plugin'),esc_html__( 'Upload hero 3 background image.', 'thememountain-plugin' )),
			ThemeMountain\TM_Vc::get_attach_image_vc_field(),
			ThemeMountain\TM_Vc::get_image_url_vc_field(),
			//
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Hero Column Width', 'thememountain-plugin' ),
				'param_name' => 'hero_column_width',
				'value' => ThemeMountain\TM_Vc::$vc_elements_variable['column_width'],
				'std' => '5',
				'description'=> esc_html__( 'Determines the hero column width. Values range from 1 - 12 columns (full width).', 'thememountain-plugin' ),
				),
			// tm_hero 3 add column offset option #413
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Hero Column Offset', 'thememountain-plugin' ),
				'param_name' => 'hero_column_offset',
				'value' => ThemeMountain\TM_Vc::$vc_elements_variable['column_offset'],
				'std' => '',
				'description' => '',
				),
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__( 'Hero Content', 'thememountain-plugin' ),
				'param_name' => 'content',
				'description'=> esc_html__( 'Hero content goes here.', 'thememountain-plugin' ),
				),
			ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field(),
			// extra
			// array(
			// 	'type' => 'textfield',
			// 	'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			// 	'param_name' => 'el_id',
			// 	),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
				'param_name' => 'el_class',
				'description'=> esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' )
				),
			// design options
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Horizontal Content Alignment', 'thememountain-plugin' ),
				'param_name' => 'horizontal_alignment_content',
				'value' => array(
					esc_html__('Left', 'thememountain-plugin' ) => 'left',
					esc_html__('Center', 'thememountain-plugin' ) => 'center',
					esc_html__('Right', 'thememountain-plugin' ) => 'right',
					),
				'std' => 'left',
				'description'=> esc_html__( 'Determines whether the boxed hero content should be left, center or right aligned.', 'thememountain-plugin' ),
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Vertical Content Alignment', 'thememountain-plugin' ),
				'param_name' => 'vertical_alignment_content',
				'value' => array(
					esc_html__('Top', 'thememountain-plugin' ) => 'top',
					esc_html__('Middle', 'thememountain-plugin' ) => 'middle',
					esc_html__('Bottom', 'thememountain-plugin' ) => 'bottom',
					),
				'std' => 'bottom',
				'description'=> esc_html__( 'Determines whether the boxed her content should be top, middle or bottom aligned.', 'thememountain-plugin' ),
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'textfield',
				'heading' => esc_html__( 'Content Padding', 'thememountain-plugin' ),
				'param_name' => 'content_padding',
				'value' => '30',
				'description'=> esc_html__( 'Determines the hero content padding.', 'thememountain-plugin' ),
				),
			/** background color with gradient support */
			array(
				'group' => 'Design Options',
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Content Background Color', 'thememountain-plugin' ),
				'param_name' => 'content_bkg_color',
				'std' => 'rgba(255,255,255,1)',
				'description' => '',
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'checkbox',
				'heading' => esc_html__( 'Use gradient', 'thememountain-plugin' ),
				'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
				'param_name' => 'background_use_gradient',
				'std' => '',
				'description' => esc_html__( 'This will create a background image gradient, which means that if you have set an image as a background, the gradient will replace it. If selected, Background Color will be used as the start color for the gradient.', 'thememountain-plugin' ),
			),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'End Color', 'thememountain-plugin' ),
				'param_name' => 'background_gradient_end_color',
				'std' => '',
				'dependency' => array('element' => 'background_use_gradient','value'=>'true'),
			),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'textfield',
				'heading' => esc_html__( 'Angle', 'thememountain-plugin' ),
				'param_name' => 'background_gradient_angle',
				'description'=> esc_html__( 'Sets the angle of your gradient, acceptable values range from 0-360', 'thememountain-plugin' ),
				'dependency' => array('element' => 'background_use_gradient','value'=>'true'),
			),
			/** end background color with gradient support */
			array(
				'group' => 'Design Options',
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Content Border Color', 'thememountain-plugin' ),
				'param_name' => 'content_border_color',
				'std' => '#333',
				'description' => '',
				),
			array(
				'group' => 'Design Options',
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Text Color', 'thememountain-plugin' ),
				'param_name' => 'text_color',
				'std' => '#666',
				'description' => '',
				),
			// ANIMATION
			array(
				'group' => 'Animation',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Content Animation Type', 'thememountain-plugin' ),
				'param_name' => 'content_animation',
				'value' => ThemeMountain\TM_Vc::$vc_elements_variable['animation'],
				'std' => '',
				'description'=> esc_html__( 'Determines the type of animation that will be applied to the column.', 'thememountain-plugin' ),
				),
			array(
				'group' => 'Animation',
				'type' => 'textfield',
				'heading' => esc_html__( 'Content Animation Duration', 'thememountain-plugin' ),
				'param_name' => 'content_animation_duration',
				'value' => '1000',
				'dependency' => array('element' => 'content_animation','not_empty' => TRUE ),
				'description'=> esc_html__( 'How long the animation should be. Expressed in milliseconds i.e. 1000 represents 1 second.', 'thememountain-plugin' ),
				),
			array(
				'group' => 'Animation',
				'type' => 'textfield',
				'heading' => esc_html__( 'Content Animation Delay', 'thememountain-plugin' ),
				'param_name' => 'content_animation_delay',
				'value' => '0',
				'dependency' => array('element' => 'content_animation','not_empty' => TRUE ),
				'description'=> esc_html__( 'How long before the animation should begin upon entering the viewport. Expressed in milliseconds i.e. 100 represents 0.1 second.', 'thememountain-plugin' ),
				),
			array(
				'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
				'type' => 'textfield',
				'heading' => esc_html__( 'Animation Threshold', 'thememountain-plugin' ),
				'param_name' => 'content_animation_threshold',
				'value' => '0.5',
				'dependency' => array('element' => 'content_animation','not_empty' => TRUE ),
				'description' => esc_html__( 'Represents what percentage of the element should be visible in the viewport before animation begins. Expressed as a decimal i.e. i.e. 0.5 represents 50%.', 'thememountain-plugin' ),
			),
		),
	) );
}

class WPBakeryShortCode_tm_hero_3 extends WPBakeryShortCode {
}