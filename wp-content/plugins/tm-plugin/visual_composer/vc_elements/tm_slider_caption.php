<?php
/**
 * tm_slider_caption
 * @since 	1.0
 * @see        tm_aux_caption
 */

vc_map( array(
	'name' => esc_html__( 'Caption', 'thememountain-plugin' ),
	'base' => 'tm_slider_caption',
	'icon'      => 'tm_vc_icon_text_block',
	'is_container' => true,
	'as_child' => array('only' => 'tm_slider_item'),
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
		// column settings
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Column Width', 'thememountain-plugin' ),
			'param_name' => 'column_width',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['column_width'],
			'std' => '12',
			'description'=> esc_html__( 'Determines the column width. Values range from 1 - 12 columns (full width). Ignored if caption is set to display inline under Display Options.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Column Offset', 'thememountain-plugin' ),
			'param_name' => 'column_offset',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['column_offset'],
			'std' => '',
			'description'=> esc_html__( 'Determines the number of columns to offset the caption by. Ignored if caption is set to display inline under Display Options.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textarea_html',
			'heading' => esc_html__( 'Caption', 'thememountain-plugin' ),
			'param_name' => 'content',
			'value' => '',
			'admin_label' => true,
			'description' => esc_html__( 'The slider caption goes here.', 'thememountain-plugin' )
			),
		ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field(),
		array(
			'type' => 'checkbox',
			'param_name' => 'hide_caption_on_mobile',
			'value' => array( esc_html__( 'Hide Caption on Mobile', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'value' => '',
			),
		// display options
		array(
			'group' => esc_html__( 'Display Options', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Insert Caption On Same Line', 'thememountain-plugin' ),
			'param_name' => 'display_inline',
			'value' => array( esc_html__( 'Display inline', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'description' => esc_html__( 'Determines whether the caption should be inserted on its own line or alignd next to the previous caption.', 'thememountain-plugin' )
			),
		// animation
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Caption Animation Type', 'thememountain-plugin' ),
			'param_name' => 'caption_animation',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['animation'],
			'std' => 'fadeIn',
			'description' => esc_html__( 'Determines the type of animation that will be applied to the caption.', 'thememountain-plugin' )
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Caption Animation Duration', 'thememountain-plugin' ),
			'param_name' => 'caption_animation_duration',
			'value' => '1000',
			'description' => esc_html__( 'How long the animation should be. Expressed in milliseconds i.e. 1000 represents 1 second.', 'thememountain-plugin' )
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Caption Animation Delay', 'thememountain-plugin' ),
			'param_name' => 'caption_animation_delay',
			'value' => '0',
			'description' => esc_html__( 'How long before the animation should begin upon entering the viewport. Expressed in milliseconds i.e. 100 represents 0.1 second.', 'thememountain-plugin' )
			),
	),
) );

class WPBakeryShortCode_tm_slider_caption extends WPBakeryShortCode {
}
