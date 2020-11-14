<?php
$dropdow_options_alignment = array(
	esc_html__('Left', 'thememountain-plugin') => 'left',
	esc_html__('Center', 'thememountain-plugin') => 'center',
	esc_html__('Right', 'thememountain-plugin') => 'right',
);
$dropdow_options_float = array(
	esc_html__('None', 'thememountain-plugin') => '',
	esc_html__('Left', 'thememountain-plugin') => 'left',
	esc_html__('Right', 'thememountain-plugin') => 'right',
);

// Checks up if the Visual Composer is activated.

ThemeMountain\TM_Vc::$vc_elements_variable['vc_map_blockquote'] = array(
	"base"      => "tm_blockquote",
	"name"      => esc_html__("Blockquotes", 'thememountain-plugin'),
	"icon"      => "tm_vc_icon_blockquote",
	'is_container' => false,
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'description' => '',
	"params"    => array(
		array(
			"type" => "textfield",
			//'admin_label' => true,
			"class" => "",
			"heading" => esc_html__("Quote text", 'thememountain-plugin'),
			"param_name" => "quote",
			"value" => '',
			"description" => esc_html__("Blockquote quation goes here.", 'thememountain-plugin')
		),
		array(
			"type" => "textfield",
			// 'admin_label' => true,
			"class" => "",
			"heading" => esc_html__("Citation", 'thememountain-plugin'),
			"param_name" => "cite",
			"value" => '',
			"description" => esc_html__("The person you are quoting goes here.", 'thememountain-plugin')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description'=> esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' )
			),
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
		ThemeMountain\TM_Vc::get_attach_image_vc_field(esc_html__( 'Design Options', 'thememountain-plugin' )),
		ThemeMountain\TM_Vc::get_image_url_vc_field(esc_html__( 'Design Options', 'thememountain-plugin' )),
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
			"value" => $dropdow_options_alignment,
			"description" => esc_html__("Determines whether quote text should be left, center, or right aligned.", 'thememountain-plugin')
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			"type" => "dropdown",
			"heading" => esc_html__("Blockquote float", 'thememountain-plugin'),
			"param_name" => "float",
			"value" => $dropdow_options_float,
			"description" => esc_html__("Determines whether the blockquote should be floated, either none, left or right.", 'thememountain-plugin')
		),
		// array(
		// 	'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
		// 	'type' => 'checkbox',
		// 	'heading' => esc_html__( 'Use icon', 'thememountain-plugin' ),
		// 	'param_name' => 'use_icon',
		// 	'value' => array( esc_html__( 'Use icon.', 'thememountain-plugin' ) => 'true' ),
		// 	'std' => '',
		// 	'description' => esc_html__( 'Whether the blockquote should use an icon. Note: icon will appear above the quotation.', 'thememountain-plugin' ),
		// 	'dependency' => array('element' => 'type','value'=>'icon'),
		// ),
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
	)
);

vc_map(ThemeMountain\TM_Vc::$vc_elements_variable['vc_map_blockquote']);

class WPBakeryShortCode_tm_blockquote extends WPBakeryShortCode {

}