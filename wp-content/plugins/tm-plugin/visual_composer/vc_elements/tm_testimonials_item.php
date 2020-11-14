<?php
/**
	ThemeMountain tm_testimonials_item
*/

vc_map( array(
	'name' => esc_html__( 'Testimonials Slider Item', 'thememountain-plugin' ),
	'base' => 'tm_testimonials_item',
	// 'allowed_container_element' => false,
	'is_container' => true,
	"as_child" => array('only' => 'tm_testimonials_holder'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"content_element" => FALSE,
	'description' => '',
	'params' => array(
		array(
			// group Social List
			'type' => 'textfield',
			'heading' => esc_html__( 'Client Name', 'thememountain-plugin' ),
			'param_name' => 'title',
			'value' => '',
			'description' => esc_html__( 'Enter the client name.', 'thememountain-plugin' ),
		),
		// column settings
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Column Width', 'thememountain-plugin' ),
			'param_name' => 'column_width',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['column_width'],
			'std' => '12',
			'description'=> esc_html__( 'Determines the column width. Values range from 1 - 12 columns (full width).', 'thememountain-plugin' ),
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Column Offset', 'thememountain-plugin' ),
			'param_name' => 'column_offset',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['column_offset'],
			'std' => '',
			'description'=> esc_html__( 'Determines the number of columns to offset the blockquote by.', 'thememountain-plugin' ),
			),
		array(
			// group Social List
			'type' => 'textarea_html',
			'heading' => esc_html__( 'Description', 'thememountain-plugin' ),
			'param_name' => 'content',
			'value' => '',
			'admin_label' => true,
			'description' => esc_html__( 'Enter the client description.', 'thememountain-plugin' ),
		),
		ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field(),
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

		// esc_html__( 'Design Options', 'thememountain-plugin' ),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Background Color', 'thememountain-plugin' ),
			'param_name' => 'background_color',
			'std' => '#FFFFFF',
			'description' => '',
			),
		// #1025
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Boxed Testimonial', 'thememountain-plugin' ),
			'param_name' => 'boxed_testimonial',
			'std' => '',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'description' => esc_html__( 'Wraps blockquote in a box for which a background color can be set. This is useful if the testimonial slider is overlaying an image.', 'thememountain-plugin' ),
			),
		// End #1025
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			"type" => "dropdown",
			"heading" => esc_html__("Blockquote Type", 'thememountain-plugin'),
			"param_name" => "type",
			"value" => array(
				esc_html__('None', 'thememountain-plugin') => '',
				esc_html__('With icon', 'thememountain-plugin') => 'icon',
				esc_html__('With border', 'thememountain-plugin') => 'border',
				esc_html__('With avatar', 'thememountain-plugin') => 'avatar',
				),
			"description" => esc_html__("Determines what type of blockquote to use, none (simply text), with icon, with border or with avatar.", 'thememountain-plugin')
		),
		// Image
		ThemeMountain\TM_Vc::get_image_selector_vc_field(esc_html__( 'Design Options', 'thememountain-plugin' ),esc_html__( 'Avatar Image', 'thememountain-plugin'),'',array('element' => 'type','value'=>'avatar')),
		ThemeMountain\TM_Vc::get_attach_image_vc_field(esc_html__( 'Design Options', 'thememountain-plugin' ),'',esc_html__( 'Upload avatar image. Avatar will only be displayed if Blockquote Type is set to with Avatar.', 'thememountain-plugin')),
		ThemeMountain\TM_Vc::get_image_url_vc_field(esc_html__( 'Design Options', 'thememountain-plugin' ),'',esc_html__( 'Enter url of avatar image. Avatar will only be displayed if Blockquote Type is set to with Avatar.', 'thememountain-plugin')),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			"type" => "dropdown",
			"heading" => esc_html__("Text size", 'thememountain-plugin'),
			"param_name" => "size",
			"value" => ThemeMountain\TM_Vc::$vc_elements_variable['sizes'],
			"description" => esc_html__("Determines whether the quote text should be small, medium, large or extra large in size.", 'thememountain-plugin')
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			"type" => "dropdown",
			"heading" => esc_html__("Text alignment", 'thememountain-plugin'),
			"param_name" => "alignment",
			'default' => 'center',
			"value" => array(
				esc_html__('Left', 'thememountain-plugin') => 'left',
				esc_html__('Center', 'thememountain-plugin') => 'center',
				esc_html__('Right', 'thememountain-plugin') => 'right',
				),
			"description" => esc_html__("Determines whether quote text should be left, center, or right aligned.", 'thememountain-plugin')
		),
		// icon
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'thememountain-plugin' ),
			'param_name' => 'icon_id',
			'settings' => array(
				'emptyIcon' => true,
				'type' => 'entypo',
				'iconsPerPage' => 200,
				),
			"value" => 'entypo-icon entypo-icon-quote',
			'description' => esc_html__( 'Select icon from library. Set to blank not to use icon.', 'thememountain-plugin' ),
			'dependency' => array('element' => 'type','value'=>'icon'),
			'description' => ''
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Icon Color', 'thememountain-plugin' ),
			'param_name' => 'icon_color',
			'std' => '#666',
			'dependency' => array('element' => 'type','value'=>'icon'),
			'description' => ''
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Border Color', 'thememountain-plugin' ),
			'param_name' => 'border_color',
			'std' => '#666',
			'dependency' => array('element' => 'type','value'=>'border'),
			'description' => ''
		),
		// color
		// #1025
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Box Background Color', 'thememountain-plugin' ),
			'param_name' => 'box_background_color',
			'std' => '#FFFFFF',
			'dependency' => array('element' => 'boxed_testimonial','not_empty'=>TRUE),
			'description' => ''
		),
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Box Border Color', 'thememountain-plugin' ),
			'param_name' => 'box_border_color',
			'std' => '#FFFFFF',
			'dependency' => array('element' => 'boxed_testimonial','not_empty'=>TRUE),
			'description' => ''
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			"type" => "dropdown",
			"heading" => esc_html__("Box Border Style", 'thememountain-plugin'),
			"param_name" => "box_border_style",
			"value" => array(
				esc_html__('None', 'thememountain-plugin') => '',
				esc_html__('Rounded', 'thememountain-plugin') => 'rounded',
				),
			'dependency' => array('element' => 'boxed_testimonial','not_empty'=>TRUE),
			"description" => ''
		),
		// End #1025
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Quote Color', 'thememountain-plugin' ),
			'param_name' => 'quote_color',
			'std' => '',
			'description' => ''
			),
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Cite Color', 'thememountain-plugin' ),
			'param_name' => 'cite_color',
			'std' => '',
			'description' => ''
			),
	),
	'js_view' => 'TmTabView'
) );

class WPBakeryShortCode_tm_testimonials_item extends WPBakeryShortCode_tm_tab_item {

}