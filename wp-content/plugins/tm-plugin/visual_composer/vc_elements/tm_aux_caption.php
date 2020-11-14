<?php
/**
 * tm_aux_caption
 * @since 	1.0
 * @see        tm_slider_caption
 */

vc_map( array(
	'name' => esc_html__( 'Caption', 'thememountain-plugin' ),
	'base' => 'tm_aux_caption',
	'icon'      => 'tm_vc_icon_text_block',
	'is_container' => true,
	"as_child" => array('only' => 'tm_slider_item,tm_fullscreen_presentation_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	'description' => '',
	'params' => array(
		// margins
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Margin Bottom', 'thememountain-plugin' ),
			'param_name' => 'margin_bottom',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['spacing_notches'],
			'std' => '30',
			'description' => ''
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Margin Bottom on Mobiles', 'thememountain-plugin' ),
			'param_name' => 'margin_bottom_mobile',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['spacing_notches'],
			'std' => '30',
			'description' => ''
			),
		// content
		array(
			'type' => 'textarea_html',
			'heading' => esc_html__( 'Caption', 'thememountain-plugin' ),
			'param_name' => 'content',
			'value' => '',
			'admin_label' => true,
			'description' => esc_html__( 'The caption goes here.', 'thememountain-plugin' )
		),
		ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field(),
		array(
			'group' => esc_html__( 'Display Options', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Insert Caption On Same Line', 'thememountain-plugin' ),
			'param_name' => 'display_inline',
			'value' => array( esc_html__( 'Display inline', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'description' => esc_html__( 'Determines whether the caption should be inserted on its own line or alignd next to the previous caption.', 'thememountain-plugin' )
			),
		// Content Animation
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Content Animation Preset', 'thememountain-plugin' ),
			'param_name' => 'content_animation',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['animation'],
			'std' => 'fadeIn',
			'description'=> esc_html__( 'Determines the type of animation that will be applied to the column.', 'thememountain-plugin' ),
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Content Animation Duration', 'thememountain-plugin' ),
			'param_name' => 'content_animation_duration',
			'dependency' => array('element' => 'content_animation','not_empty' => TRUE ),
			'value'=>'1000',
			'description'=> esc_html__( 'How long the animation should be. Expressed in milliseconds i.e. 1000 represents 1 second.', 'thememountain-plugin' )
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Content Animation Delay', 'thememountain-plugin' ),
			'param_name' => 'content_animation_delay',
			'dependency' => array('element' => 'content_animation','not_empty' => TRUE ),
			'value'=>'0',
			'description'=> esc_html__( 'How long before the animation should begin upon entering the viewport. Expressed in milliseconds i.e. 100 represents 0.1 second.', 'thememountain-plugin' )
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Animation Threshold', 'thememountain-plugin' ),
			'param_name' => 'content_animation_threshold',
			'value' => '0.5',
			'dependency' => array('element' => 'content_animation','not_empty' => TRUE ),
			'description' => esc_html__( 'How long before the animation should begin upon entering the viewport. Expressed in milliseconds i.e. 100 represents 0.1 second.', 'thememountain-plugin' ),
		),
	)
) );

class WPBakeryShortCode_tm_aux_caption extends WPBakeryShortCode {
}