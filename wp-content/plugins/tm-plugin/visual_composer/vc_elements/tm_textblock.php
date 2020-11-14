<?php
/**
 * tm_textblock
 * @since 	1.0
 */

vc_map( array(
	'name' => esc_html__( 'Textblock', 'thememountain-plugin' ),
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'base' => 'tm_textblock',
	'icon'      => 'tm_vc_icon_text_block',
	'is_container' => true,
	// "as_child" => array('only' => 'tm_slider_item,tm_fullscreen_presentation_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	'description' => '',
	'params' => array(
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__( 'Text', 'thememountain-plugin' ),
			'param_name' => 'content',
			'save_always' => true,
			'value' => esc_html__( 'I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'thememountain-plugin' ),
		),
		ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field(),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			'param_name' => 'el_id',
			'description' => esc_html__( 'Give this section a unique ID. This is useful if you want to initiate scroll or link to this section.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' ),
			),
	)
) );

class WPBakeryShortCode_tm_textblock extends WPBakeryShortCode {
	protected function outputTitle( $title ) {
		return '';
	}
}
