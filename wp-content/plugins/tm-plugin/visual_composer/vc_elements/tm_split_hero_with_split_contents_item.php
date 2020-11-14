<?php
/**
	ThemeMountain tm_client_item
*/

// Checks up if the Visual Composer is activated.
	/**
		Note: please see initVisualComposer.php ... this file is included upon the vc_before_init hook.
	*/
vc_map( array(
	'name' => esc_html__( 'Split Hero With Split Content Column', 'thememountain-plugin' ),
	'base' => 'tm_split_hero_with_split_contents_item',
	// 'allowed_container_element' => false,
	'is_container' => true,
	"as_child" => array('only' => 'tm_split_hero_with_split_contents_holder'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	'content_element' => false,
	'description' => '',
	'params' => array(
		array(
			// group Social List
			'type' => 'textfield',
			'heading' => esc_html__( 'Hero Column Name', 'thememountain-plugin' ),
			'param_name' => 'title',
			'value' => '',
			'description' => esc_html__( 'Enter the hero column name to identify.', 'thememountain-plugin' ),
		),
		// Image
		ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Image', 'thememountain-plugin'),esc_html__( 'Upload hero 5 background image.', 'thememountain-plugin' )),
		ThemeMountain\TM_Vc::get_attach_image_vc_field(),
		ThemeMountain\TM_Vc::get_image_url_vc_field(),
		array(
			'type' => 'textarea_html',
			'heading' => esc_html__( 'Hero Content', 'thememountain-plugin' ),
			'param_name' => 'content',
			'value' => '',
			'admin_label' => true,
			'description' => esc_html__( 'Enter the column content.', 'thememountain-plugin' ),
		),
		ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field(),
		// extra css class name
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' ),
			),
		// Design Options
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Text Color', 'thememountain-plugin' ),
			'param_name' => 'text_color',
			'std' => '#FFFFFF',
			'description' => '',
		),
		/** background color with gradient support */
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Overlay Background Color', 'thememountain-plugin' ),
			'param_name' => 'split_content_bkg_color',
			'std' => 'rgba(0,0,0,0.5)',
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
	'js_view' => 'TmTabView'
) );

class WPBakeryShortCode_tm_split_hero_with_split_contents_item extends WPBakeryShortCode_tm_tab_item {

}