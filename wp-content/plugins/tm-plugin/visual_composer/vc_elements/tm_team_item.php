<?php
/**
	ThemeMountain tm_team_item
*/


/**
	Note: please see initVisualComposer.php ... this file is included upon the vc_before_init hook.
*/
vc_map( array(
	'name' => esc_html__( 'Team Profile', 'thememountain-plugin' ),
	'base' => 'tm_team_item',
	"icon"      => "tm_vc_icon_team_block",
	// 'allowed_container_element' => false,
	'is_container' => true,
	"as_child" => array('only' => 'tm_team_holder'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"content_element" => true,
	'description' => '',
	'params' => array(
		array(
			// group Social List
			'type' => 'textfield',
			'heading' => esc_html__( 'Team Member Name', 'thememountain-plugin' ),
			'param_name' => 'title',
			'value' => '',
			'admin_label' => true,
			'description' => esc_html__( 'Sets the team section type to either Team Section 1, Team Section 2 or to Team Slider.', 'thememountain-plugin' ),
		),
		array(
			// group Social List
			'type' => 'textfield',
			'heading' => esc_html__( 'Team Member Occupation', 'thememountain-plugin' ),
			'param_name' => 'team_member_occupation',
			'value' => '',
			'admin_label' => true,
			'description' => '',
		),
		/** tm_team add option to link team member thumbnail #816 */
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Link Team Member Image', 'thememountain-plugin' ),
			'param_name' => 'link_team_member_image',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
		),
		//
		array(
			// group Social List
			'type' => 'textfield',
			'heading' => esc_html__( 'Team Member Profile Link', 'thememountain-plugin' ),
			'param_name' => 'link',
			'value' => '',
			'dependency' => array('element' => 'link_team_member_image','value'=>'true'),
		),
		// image
		ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Team Member Image', 'thememountain-plugin'),esc_html__( 'Upload profile image for team member.', 'thememountain-plugin' )),
		ThemeMountain\TM_Vc::get_attach_image_vc_field(),
		ThemeMountain\TM_Vc::get_image_url_vc_field(),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Force Image Width', 'thememountain-plugin' ),
			'param_name' => 'image_width',
			'value' => '',
			'dependency' => array('element' => 'image_id','not_empty'=>true),
			'description' => esc_html__( 'Set a max width for the image. The image will not scale above this width.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'textarea_html',
			'admin_label' => true,
			'heading' => esc_html__( 'Team Member Content', 'thememountain-plugin' ),
			'param_name' => 'content',
			'description' => esc_html__( 'Team member content goes here.', 'thememountain-plugin' ),
			),
		// social_list
		// 1
		array(
			// group Social List
			'type' => 'dropdown',
			'heading' => esc_html__( 'Social Icon 1', 'thememountain-plugin' ),
			'param_name' => 'social_icon_1',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['sns'],
			'std' => '',
			'description' => '',
		),
		array(
			// group Social List
			'type' => 'textfield',
			'heading' => esc_html__( 'Social Icon 1 URL', 'thememountain-plugin' ),
			'param_name' => 'social_icon_url_1',
			'value' => '',
			'dependency' => array('element' => 'social_icon_1','not_empty'=>true),
			'description' => '',
		),
		// 2
		array(
			// group Social List
			'type' => 'dropdown',
			'heading' => esc_html__( 'Social Icon 2', 'thememountain-plugin' ),
			'param_name' => 'social_icon_2',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['sns'],
			'std' => '',
			'description' => '',
		),
		array(
			// group Social List
			'type' => 'textfield',
			'heading' => esc_html__( 'Social Icon 2 URL', 'thememountain-plugin' ),
			'param_name' => 'social_icon_url_2',
			'value' => '',
			'dependency' => array('element' => 'social_icon_2','not_empty'=>true),
			'description' => '',
		),
		// 3
		array(
			// group Social List
			'type' => 'dropdown',
			'heading' => esc_html__( 'Social Icon 3', 'thememountain-plugin' ),
			'param_name' => 'social_icon_3',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['sns'],
			'std' => '',
			'description' => '',
		),
		array(
			// group Social List
			'type' => 'textfield',
			'heading' => esc_html__( 'Social Icon 3 URL', 'thememountain-plugin' ),
			'param_name' => 'social_icon_url_3',
			'value' => '',
			'dependency' => array('element' => 'social_icon_3','not_empty'=>true),
			'description' => '',
		),
		// 4
		array(
			// group Social List
			'type' => 'dropdown',
			'heading' => esc_html__( 'Social Icon 4', 'thememountain-plugin' ),
			'param_name' => 'social_icon_4',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['sns'],
			'std' => '',
			'description' => '',
		),
		array(
			// group Social List
			'type' => 'textfield',
			'heading' => esc_html__( 'Social Icon 4 URL', 'thememountain-plugin' ),
			'param_name' => 'social_icon_url_4',
			'value' => '',
			'dependency' => array('element' => 'social_icon_4','not_empty'=>true),
			'description' => '',
		),
		// extra css class name
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'tab_id',
			'heading' => esc_html__( 'Slide Tab ID', 'thememountain-plugin' ),
			'param_name' => "tab_id",
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon Size', 'thememountain-plugin' ),
			'param_name' => 'sns_icon_size',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['sizes'],
			'std' => 'medium',
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Team Content Alignment', 'thememountain-plugin' ),
			'param_name' => 'team_content_alignment',
			'value' => array(
				esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
				esc_html__( 'Center', 'thememountain-plugin' ) => 'center',
				esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
			),
			'std' => 'left',
			'description' => '',
		),

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
		// with gradient color support
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Team Content Background Color', 'thememountain-plugin' ),
			'param_name' => 'team_content_bkg_color',
			'std' => 'rgba(255,255,255,0)',
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
		// end with gradient color support
		// Box Border Color (colorpicker) #1023
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Box Border Color', 'thememountain-plugin' ),
			'param_name' => 'box_border_color',
			'std' => '#000',
		),
		// Box Background Color (colorpicker) #1023
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Box Background Color', 'thememountain-plugin' ),
			'param_name' => 'box_background_color',
			'std' => '#DDD',
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Team Title Color', 'thememountain-plugin' ),
			'param_name' => 'team_title_color',
			'std' => '#FFF',
		),
		// Team Title Background Color (colorpicker) #1023
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Team Title Background Color', 'thememountain-plugin' ),
			'param_name' => 'team_title_background_color',
			'std' => 'rgba(0,0,0,0.2)',
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Team Occupation Color', 'thememountain-plugin' ),
			'param_name' => 'team_occupation_color',
			'std' => '#666',
		),
		// Team Divider Color (colorpicker) #1023
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Team Divider Color', 'thememountain-plugin' ),
			'param_name' => 'team_divider_color',
			'std' => '#999',
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Team Text Color', 'thememountain-plugin' ),
			'param_name' => 'team_text_color',
			'std' => '#666',
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'SNS Icon Color', 'thememountain-plugin' ),
			'param_name' => 'sns_icon_color',
			'std' => '#333333',
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'SNS Icon Hover Color', 'thememountain-plugin' ),
			'param_name' => 'sns_icon_color_hover',
			'std' => '',
		),
		// Social Network Background Color (colorpicker) #1023
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Social Network Background Color', 'thememountain-plugin' ),
			'param_name' => 'sns_background_color',
			'std' => 'rgba(0,0,0,0.4)',
			'description' => esc_html__( 'This option is available only for the Team Section 2, which can be set in this parent.', 'thememountain-plugin' ),
		),
		// caption_type
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Caption Type', 'thememountain-plugin' ),
			'param_name' => 'caption_type',
			'value' => array(
				'No Caption' => '',
				'Rollover' => 'rollover_caption',
			),
			'std' => 'overlay',
			'dependency' => array('element' => 'link_team_member_image','value'=>'true'),
			'description' => esc_html__( 'Whether caption should appear below the image, over the image or as a rollover caption.', 'thememountain-plugin' ),
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Caption Vertical Alignment', 'thememountain-plugin' ),
			'param_name' => 'caption_vertical_alignment',
			'value' => array(
				'Top' => 'v-align-top',
				'Middle' => 'v-align-middle',
				'Bottom' => 'v-align-bottom',
			),
			'std' => 'v-align-middle',
			'dependency' => array('element' => 'caption_type','value'=>array('rollover_caption')),
			'description' => esc_html__( 'Whether caption should be vertically aligned top, middle or bottom. This only takes effect if you are using an overlayed or rollover caption.', 'thememountain-plugin' ),
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Caption Horizontal Alignment', 'thememountain-plugin' ),
			'param_name' => 'caption_horizontal_alignment',
			'value' => array(
				'Left' => 'left',
				'Center' => 'center',
				'Right' => 'right',
			),
			'std' => 'center',
			'dependency' => array('element' => 'link_team_member_image','value'=>'true'),
			'description' => esc_html__( 'Whether the caption should be left, center or right aligned. This takes effect for all caption types.', 'thememountain-plugin' ),
		),
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Rollover Background Color', 'thememountain-plugin' ),
			'param_name' => 'rollover_bkg_color',
			'std' => 'rgba(0,0,0,0.3)',
			'dependency' => array('element' => 'caption_type','value'=>'rollover_caption'),
			'description' => '',
		),
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Caption Text Color', 'thememountain-plugin' ),
			'param_name' => 'caption_text_color',
			'std' => '#FFFFFF',
			'dependency' => array('element' => 'link_team_member_image','value'=>'true'),
			'description' => '',
		),
		/** Animation */
		array(
			'group' => 'Animation',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Rollover Animation Type', 'thememountain-plugin' ),
			'param_name' => 'rollover_animation',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['rollover_animation'],
			'std' => '',
			'dependency' => array('element' => 'caption_type','value'=>'rollover_caption'),
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
	),
	'js_view' => 'TmTabView'
) );


class WPBakeryShortCode_tm_team_item extends WPBakeryShortCode_tm_tab_item {

}