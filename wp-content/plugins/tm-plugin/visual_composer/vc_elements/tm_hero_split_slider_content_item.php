<?php
use ThemeMountain\TM_Vc as TM_Vc;
/**
 * tm_hero_split_slider_content_item
 *
 * @since      1.1
 */
vc_map( array(
	'name' => esc_html__( 'Slide', 'thememountain-plugin' ),
	'base' => 'tm_hero_split_slider_content_item',
	'is_container' => true,
	"as_child" => array('only' => 'tm_hero_split_slider_content_holder'),
	'content_element' => false,
	'description' => '',
	'params' => array(
		array(
			// group Social List
			'type' => 'textfield',
			'heading' => esc_html__( 'Slider Name', 'thememountain-plugin' ),
			'param_name' => 'title',
			'value' => '',
			'description' => esc_html__( 'This is used for the tab title only.', 'thememountain-plugin' ),
		),

		// image_id
		ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Slide Image', 'thememountain-plugin'),''),
		ThemeMountain\TM_Vc::get_attach_image_vc_field(),
		ThemeMountain\TM_Vc::get_image_url_vc_field(),
		array(
			// group Social List
			'type' => 'textarea_html',
			'heading' => esc_html__( 'Hero Content', 'thememountain-plugin' ),
			'param_name' => 'content',
			'value' => '',
			'admin_label' => true,
			'description' => esc_html__( 'option only when the parent is Sliding image & content', 'thememountain-plugin' ),
		),
		ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field(),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Content Media Width', 'thememountain-plugin' ),
			'param_name' => 'content_media_width',
			'value' => array(
				esc_html__( 'Split 50/50', 'thememountain-plugin' ) => 'split_50_50',
				esc_html__( 'Split 60/40', 'thememountain-plugin' ) => 'split_60_40',
				esc_html__( 'Split 75/25', 'thememountain-plugin' ) => 'split_75_25'
			),
			'std' => 'split_50_50',
			'save_always' => true,
			'description' =>'',
		),
		// extra css class name
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' ),
			),
			// el_id
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			'param_name' => 'el_id',
		),

		/** Design Options */
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Media Alignment', 'thememountain-plugin' ),
			'param_name' => 'media_alignment',
			'value' => array(
				esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
				esc_html__( 'Right', 'thememountain-plugin' ) => 'right'
			),
			'std' => 'left',
			'description' =>esc_html__('Determines whether the hero media column should be left or right aligned.','thememountain-plugin'),
		),
    	// background color with gradient support
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Background Color', 'thememountain-plugin' ),
			'param_name' => 'background_color',
			'std' => '#FFFFFF',
			'description' => esc_html__( 'Sets the background color of the row or section block.', 'thememountain-plugin' ),
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
			'heading' => esc_html__( 'End Background Color Gradient', 'thememountain-plugin' ),
			'param_name' => 'background_gradient_end_color',
			'std' => '',
			'dependency' => array('element' => 'background_use_gradient','value'=>'true'),
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Angle for the Background Color Gradient', 'thememountain-plugin' ),
			'param_name' => 'background_gradient_angle',
			'description'=> esc_html__( 'Sets the angle of your gradient, acceptable values range from 0-360', 'thememountain-plugin' ),
			'dependency' => array('element' => 'background_use_gradient','value'=>'true'),
		),
		// end background color with gradient support
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
		array(
			'group' => esc_html__( 'Pagination', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Pagination Color', 'thememountain-plugin' ),
			'param_name' => 'pagination_color_palette',
			'value' => array(
				esc_html__( 'Color 1', 'thememountain-plugin' ) => 'nav_color_1',
				esc_html__( 'Color 2', 'thememountain-plugin' ) => 'nav_color_2',
			),
			'std' => 'nav_color_1',
			'save_always' => true,
			'description' => '',
			),
		/** Animation */
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Slider Animation', 'thememountain-plugin' ),
			'param_name' => 'slide_animation',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['slide_transition'],
			'std' => 'fade',
			'save_always' => true,
			'description' => '',
			),
	),
	'js_view' => 'TmTabView'
) );

class WPBakeryShortCode_tm_hero_split_slider_content_item extends WPBakeryShortCode_tm_tab_item {

}