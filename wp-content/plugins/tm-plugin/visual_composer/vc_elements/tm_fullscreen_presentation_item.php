<?php
vc_map( array(
	'name' => esc_html__( 'Presentation Section', 'thememountain-plugin' ),
	'base' => 'tm_fullscreen_presentation_item',
	// 'allowed_container_element' => false,
	'is_container' => true,
	"as_parent" => array('only' => 'tm_aux_caption,tm_aux_button,tm_aux_icon'),
	"as_child" => array('only' => 'tm_fullscreen_presentation_holder'),
	"content_element" => FALSE,
	'description' => '',
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Title', 'thememountain-plugin' ),
			'param_name' => 'title',
		),
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
    	// image
		ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Slide Image', 'thememountain-plugin'), esc_html__( 'Choose a slide image for this slide. Choose nothing to use the background color only.', 'thememountain-plugin' )),
		ThemeMountain\TM_Vc::get_attach_image_vc_field(),
		ThemeMountain\TM_Vc::get_image_url_vc_field(),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Background Attacment', 'thememountain-plugin' ),
			'param_name' => 'bkg_attachment',
			'admin_label' => true,
			'value' => array(
				esc_html__( 'Static', 'thememountain-plugin' ) => 'static',
				esc_html__( 'Fixed', 'thememountain-plugin' ) => 'fixed',
				),
			'std' => 'static',
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Background Image Size', 'thememountain-plugin' ),
			'param_name' => 'bkg_image_size',
			'admin_label' => true,
			'value' => array(
				esc_html__( 'Cover', 'thememountain-plugin' ) => 'cover',
				esc_html__( 'Contain', 'thememountain-plugin' ) => 'contain',
				),
			'std' => 'cover',
			),
		array(
			'type' => 'checkbox',
			'param_name' => 'use_overlay',
			'value' => array( esc_html__( 'Use overlay', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
		),
		array(
			'type' => 'checkbox',
			'param_name' => 'content_below_on_mobile',
			'value' => array( esc_html__( 'Force content below on mobile', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'description' => esc_html__( 'Forces the content below the image on mobile, without it, the content overlays the image.', 'thememountain-plugin' )
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Content Below On Mobile - Min Height', 'thememountain-plugin' ),
			'param_name' => 'content_below_on_mobile_min_height',
			'value' => '400',
			'dependency' => array('element' => 'content_below_on_mobile','value'=>'true'),
		),
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
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Pagination Color', 'thememountain-plugin' ),
			'param_name' => 'pagination_color_palette',
			'admin_label' => true,
			'value' => array(
				esc_html__( 'Color 1', 'thememountain-plugin' ) => 'nav_color_1',
				esc_html__( 'Color 2', 'thememountain-plugin' ) => 'nav_color_2',
				),
			'std' => 'nav_color_light',
			'description' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Caption Vertical Alignment', 'thememountain-plugin' ),
			'param_name' => 'caption_valignment',
			'value' => array(
				esc_html__( 'Top', 'thememountain-plugin' ) => 'v-align-top',
				esc_html__( 'Middle', 'thememountain-plugin' ) => 'v-align-middle',
				esc_html__( 'Bottom', 'thememountain-plugin' ) => 'v-align-bottom',
				),
			'std' => 'v-align-middle',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Caption Horitontal Alignment', 'thememountain-plugin' ),
			'param_name' => 'caption_alignment',
			'value' => array(
				esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
				esc_html__( 'Center', 'thememountain-plugin' ) => 'center',
				esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
				),
			'std' => 'center',
			),
		// background color with gradient support
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Section Background Color', 'thememountain-plugin' ),
			'param_name' => 'image_bkg_color',
			'std' => '#232323',
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
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Image Overlay Background Color', 'thememountain-plugin' ),
			'param_name' => 'image_overlay_bkg_color',
			'std' => 'rgba(0,0,0,.5)',
			'dependency' => array('element' => 'use_overlay','value'=>'true'),
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use gradient for overlay background', 'thememountain-plugin' ),
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'param_name' => 'overlay_background_use_gradient',
			'std' => '',
			'description' => esc_html__( 'This will create a background image gradient, which means that if you have set an image as a background, the gradient will replace it. If selected, Background Color will be used as the start color for the gradient.', 'thememountain-plugin' ),
			'dependency' => array('element' => 'use_overlay','value'=>'true'),
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
	),
	'js_view' => 'TmAvalancheSlideView'
) );

class WPBakeryShortCode_tm_fullscreen_presentation_item extends WPBakeryShortCode_tm_slider_item {

}