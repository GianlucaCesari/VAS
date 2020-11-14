<?php
/**
 * ThemeMountain Accordion VC Element Map
 */
if (class_exists( 'Vc_Manager' )) {
	vc_map( array(
		'name' => esc_html__( 'Image', 'thememountain-plugin' ),
		'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
		'base' => 'tm_image',
		'icon' => 'tm_vc_icon_image',
		'show_settings_on_create' => true,
		'is_container' => true,
		'description' => '',
		'params' => array(
			// margin
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
			// Image
			ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Image', 'thememountain-plugin'),esc_html__( 'Upload image.', 'thememountain-plugin' )),
			ThemeMountain\TM_Vc::get_attach_image_vc_field(),
			ThemeMountain\TM_Vc::get_image_url_vc_field(),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Force Image Width', 'thememountain-plugin' ),
				'param_name' => 'image_width',
				'value' => '',
				'description' => esc_html__( 'Set a max width for the image. The image will not scale above this width.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Link Image', 'thememountain-plugin' ),
				'param_name' => 'link_image',
				'value' => array(
					esc_html__( 'None', 'thememountain-plugin' ) => 'none',
					esc_html__( 'Link to image', 'thememountain-plugin' ) => 'link_to_page',
					esc_html__( 'Use lightbox', 'thememountain-plugin' ) => 'use_lightbox',
					),
				'std' => '',
				'description' => esc_html__( 'Determines what the image should link to, either: None, Link to image or Use lightbox. Here is a breakdown of each and their dependent options.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Link URL', 'thememountain-plugin' ),
				'param_name' => 'link_url',
				'dependency' => array('element' => 'link_image','value'=>'link_to_page'),
				'description' => esc_html__( 'The URL of the image to which the image should link to. Note: This need not be the same URL of the image you are inserting into your content, this could be the URL of a different or larger version of the image in question.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Group ID', 'thememountain-plugin' ),
				'param_name' => 'group_id',
				'dependency' => array('element' => 'link_image','value'=>'use_lightbox'),
				'description' => esc_html__( 'Associate an image to a specific lightbox group. This will allows user to browser through grouped image in the lightbox.', 'thememountain-plugin' ),
				),
			// lightbox options
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Lightbox Toolbar Zoom Button', 'thememountain-plugin' ),
				'param_name' => 'lightbox_toolbar_zoom_button',
				'value' => array( esc_html__( 'Lightbox Toolbar Zoom Button', 'thememountain-plugin' ) => 'true' ),
				'std' => '',
				'dependency' => array('element' => 'link_image','value'=>'use_lightbox'),
				'description' => esc_html__( 'Whether the lightbox media should be zoomable.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Lightbox Toolbar Share Button', 'thememountain-plugin' ),
				'param_name' => 'lightbox_toolbar_share_buttons',
				'value' => array( esc_html__( 'Lightbox Toolbar Share Button', 'thememountain-plugin' ) => 'true' ),
				'std' => '',
				'dependency' => array('element' => 'link_image','value'=>'use_lightbox'),
				'description' => esc_html__( 'Whether the lightbox media should be sharable through Facebook, Twitter and Google+.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Lightbox Caption', 'thememountain-plugin' ),
				'param_name' => 'lightbox_caption',
				'dependency' => array('element' => 'link_image','value'=>'use_lightbox'),
				'description' => esc_html__( 'The lightbox media caption. Leave blank if no caption is wanted.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__( 'Caption', 'thememountain-plugin' ),
				'param_name' => 'content',
				'description' => esc_html__( 'The image caption that either appears below, over or as a rollover caption.', 'thememountain-plugin' ),
				),
			ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field(),
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
				'heading' => esc_html__( 'Image Style', 'thememountain-plugin' ),
				'param_name' => 'image_style',
				'value' => array(
					esc_html__( 'None', 'thememountain-plugin' ) => '',
					esc_html__( 'Rounded', 'thememountain-plugin' ) => 'rounded',
					esc_html__( 'Circle', 'thememountain-plugin' ) => 'circle',
					),
				'std' => '',
				'description' => '',
				),
			// caption_type
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Caption Type', 'thememountain-plugin' ),
				'param_name' => 'caption_type',
				'value' => array(
					esc_html__( 'No Caption', 'thememountain-plugin' ) => '',
					esc_html__( 'Overlay', 'thememountain-plugin' ) => 'caption_over',
					esc_html__( 'Below', 'thememountain-plugin' ) => 'caption_below',
					esc_html__( 'Rollover', 'thememountain-plugin' ) => 'rollover_caption',
					),
				'std' => 'overlay',
				'description' => esc_html__( 'Whether caption should appear below the image, over the image or as a rollover caption.', 'thememountain-plugin' ),
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Caption Vertical Alignment', 'thememountain-plugin' ),
				'param_name' => 'caption_vertical_alignment',
				'value' => array(
					esc_html__( 'Top', 'thememountain-plugin' ) => 'v-align-top',
					esc_html__( 'Middle', 'thememountain-plugin' ) => 'v-align-middle',
					esc_html__( 'Bottom', 'thememountain-plugin' ) => 'v-align-bottom',
					),
				'std' => 'v-align-middle',
				'dependency' => array('element' => 'caption_type','value'=>array('rollover_caption','caption_over')),
				'description' => esc_html__( 'Whether caption should be vertically aligned top, middle or bottom. This only takes effect if you are using an overlayed or rollover caption.', 'thememountain-plugin' ),
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Caption Horizontal Alignment', 'thememountain-plugin' ),
				'param_name' => 'caption_horizontal_alignment',
				'value' => array(
					esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
					esc_html__( 'Center', 'thememountain-plugin' ) => 'center',
					esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
					),
				'std' => 'center',
				'description' => esc_html__( 'Whether the caption should be left, center or right aligned. This takes effect for all caption types.', 'thememountain-plugin' ),
				),
			array(
				'group' => 'Design Options',
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Rollover Background Color', 'thememountain-plugin' ),
				'param_name' => 'rollover_bkg_color',
				'std' => 'rgba(255,255,255,0.9)',
				'dependency' => array('element' => 'caption_type','value'=>'rollover_caption'),
				'description' => '',
				),
			array(
				'group' => 'Design Options',
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Caption Text Color', 'thememountain-plugin' ),
				'param_name' => 'caption_text_color',
				'std' => '#232323',
				'description' => '',
				),
			// rollover
			array(
				'group' => 'Animation',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Rollover Animation Type', 'thememountain-plugin' ),
				'param_name' => 'rollover_animation',
				'value' => ThemeMountain\TM_Vc::$vc_elements_variable['rollover_animation'],
				'dependency' => array('element' => 'caption_type','value'=>'rollover_caption'),
				'std' => '',
				'description' => esc_html__( 'Determines the rollover animation style.', 'thememountain-plugin' ),
				),
			array(
				'group' => 'Animation',
				'type' => 'textfield',
				'heading' => esc_html__( 'Rollover Animation Duration', 'thememountain-plugin' ),
				'param_name' => 'rollover_animation_duration',
				'dependency' => array('element' => 'caption_type','value'=>'rollover_caption'),
				'value' => '1000',
				'description' => esc_html__( 'Determines how long the rollover animation should be. Expressed in milliseconds i.e. 1000 represents 1 second.', 'thememountain-plugin' ),
				),
			array(
				'group' => 'Animation',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Rollover Easing Type', 'thememountain-plugin' ),
				'param_name' => 'rollover_easing',
				'value' => ThemeMountain\TM_Vc::$vc_elements_variable['easing'],
				'std' => 'swing',
				'dependency' => array('element' => 'caption_type','value'=>'rollover_caption'),
				'description' => esc_html__( 'Determines the rollover animation easing type.', 'thememountain-plugin' ),
				),
			array(
				'group' => 'Animation',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Lightbox Animation', 'thememountain-plugin' ),
				'param_name' => 'lightbox_animation',
				'value' => array(
					esc_html__( 'Fade In', 'thememountain-plugin' ) => 'fade',
					esc_html__( 'Slide In Top', 'thememountain-plugin' ) => 'slideInTop',
					esc_html__( 'Slide In Right', 'thememountain-plugin' ) => 'slideInRight',
					esc_html__( 'Slide In Bottom', 'thememountain-plugin' ) => 'slideInBottom',
					esc_html__( 'Slide In Left', 'thememountain-plugin' ) => 'slideInLeft',
					),
				'std' => 'fade',
				'dependency' => array('element' => 'link_image','value'=>'use_lightbox'),
				'description' => esc_html__( 'Determines the animation of the lightbox upon entering the viewport.', 'thememountain-plugin' ),
				),
		),
	) );
}

class WPBakeryShortCode_tm_image extends WPBakeryShortCode {
}
