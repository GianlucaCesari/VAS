<?php
vc_map( array(
	'name' => esc_html__( 'Feature Sections', 'thememountain-plugin' ),
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'base' => 'tm_feature_sections',
	'icon' => 'tm_vc_icon_feature-section',
	'show_settings_on_create' => true,
	'is_container' => TRUE,
	'description' => '',
	'params' => array(
    	// image
		ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Feature Image', 'thememountain-plugin'), esc_html__( 'Choose a feature image. Choose nothing to use the background color only.', 'thememountain-plugin' )),
		ThemeMountain\TM_Vc::get_attach_image_vc_field(),
		ThemeMountain\TM_Vc::get_image_url_vc_field(),
		// content
		array(
			'type' => 'textarea_html',
			'heading' => esc_html__( 'Feature Section Content', 'thememountain-plugin' ),
			'param_name' => 'content',
			'description'=> esc_html__( 'Feature section content goes here.', 'thememountain-plugin' ),
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
			'heading' => esc_html__( 'Media Alignment', 'thememountain-plugin' ),
			'param_name' => 'media_alignment',
			'value' => array(
				esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
				esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
				),
			'std' => 'left',
			'description' => '',
			),
		// 'group' => 'Animation',
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
		// media animation
		array(
			'group' => 'Animation',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Media Animation Type', 'thememountain-plugin' ),
			'param_name' => 'media_animation',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['animation'],
			'std' => 'fadeIn',
			'description'=> esc_html__( 'Determines the type of animation that will be applied to the column.', 'thememountain-plugin' ),
			),
		array(
			'group' => 'Animation',
			'type' => 'textfield',
			'heading' => esc_html__( 'Media Animation Duration', 'thememountain-plugin' ),
			'param_name' => 'media_animation_duration',
			'value' => '1000',
			'dependency' => array('element' => 'media_animation','not_empty' => TRUE ),
			'description'=> esc_html__( 'How long the animation should be. Expressed in milliseconds i.e. 1000 represents 1 second.', 'thememountain-plugin' ),
			),
		array(
			'group' => 'Animation',
			'type' => 'textfield',
			'heading' => esc_html__( 'Media Animation Delay', 'thememountain-plugin' ),
			'param_name' => 'media_animation_delay',
			'value' => '0',
			'dependency' => array('element' => 'media_animation','not_empty' => TRUE ),
			'description'=> esc_html__( 'How long before the animation should begin upon entering the viewport. Expressed in milliseconds i.e. 100 represents 0.1 second.', 'thememountain-plugin' ),
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Media Animation Threshold', 'thememountain-plugin' ),
			'param_name' => 'media_animation_threshold',
			'value' => '0.5',
			'dependency' => array('element' => 'media_animation','not_empty' => TRUE ),
			'description' => esc_html__( 'Represents what percentage of the element should be visible in the viewport before animation begins. Expressed as a decimal i.e. i.e. 0.5 represents 50%.', 'thememountain-plugin' ),
			),
	),
) );

class WPBakeryShortCode_tm_feature_sections extends WPBakeryShortCode {

}