<?php
/**
 * ThemeMountain Accordion VC Element Map
 */
if (class_exists( 'Vc_Manager' )) {
	vc_map( array(
		'name' => esc_html__( 'Video', 'thememountain-plugin' ),
		'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
		'base' => 'tm_video',
		'icon' => 'tm_vc_icon_video_player',
		'show_settings_on_create' => true,
		'is_container' => true,
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
			// Image
			// data type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Video Type', 'thememountain-plugin' ),
				'param_name' => 'video_type',
				'value' => array(
					esc_html__( 'Vimeo', 'thememountain-plugin' ) => 'vimeo',
					esc_html__( 'Youtube', 'thememountain-plugin' ) => 'youtube',
					esc_html__( 'Other Video', 'thememountain-plugin' ) => 'other',
					),
				'std' => 'image',
				'description' => esc_html__( 'Determines what type of video to show, either Vimeo, YouTube or Other.', 'thememountain-plugin' ),
				),
	    	// video (vimeo)
	    	array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Vimeo Video ID', 'thememountain-plugin' ),
				'param_name' => 'video_vimeo_id',
				'dependency' => array('element' => 'video_type','value'=>'vimeo'),
				'description' => esc_html__( 'This is where you enter the Vimeo video ID, which generally look something like this:
https://vimeo.com/46697798.', 'thememountain-plugin' ),
			),
			// video (youtube)
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Youtube Video ID', 'thememountain-plugin' ),
				'param_name' => 'video_youtube_id',
				'dependency' => array('element' => 'video_type','value'=>'youtube'),
				'description' => esc_html__( 'This is where you enter the YouTube video ID, which generally look something like this: https://www.youtube.com/watch?v=bPg4tk7VFR0.', 'thememountain-plugin' ),
			),
			//
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Video URL Parameters', 'thememountain-plugin' ),
				'param_name' => 'video_url_parameters',
				'dependency' => array('element' => 'video_type','value'=>array('youtube','vimeo')),
				'description' => '',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Video URL', 'thememountain-plugin' ),
				'param_name' => 'video_url',
				'dependency' => array('element' => 'video_type','value'=>'other'),
				'description' => esc_html__( 'This is where you enter the video URL of the video you want to show. Note: the video will be shown in an iframe.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Video Width', 'thememountain-plugin' ),
				'param_name' => 'video_width',
				'value' => '1110',
				'dependency' => array('element' => 'use_lightbox','value'=>'false'),
				'description' => esc_html__( 'Enter the width of the video. Defaults to 1110px (content width). Note: A width is required to determine the scaling ratio of the video.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Video Height', 'thememountain-plugin' ),
				'param_name' => 'video_height',
				'value' => '624',
				'dependency' => array('element' => 'use_lightbox','value'=>'false'),
				'description' => esc_html__( 'Enter the height of the video. Defaults to 624px (content width). Note: A height is required to determine the scaling ratio of the video.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Video Ratio', 'thememountain-plugin' ),
				'param_name' => 'video_ratio',
				'value' => '1.778',
				'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_icon')),
				'description' => '',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' ),
				),
			// files
			/**
	    	array(
				'type' => 'textfield',
				'heading' => esc_html__( 'MP4 Video file URL', 'thememountain-plugin' ),
				'param_name' => 'video_mp4',
				'dependency' => array('element' => 'data_type','value'=>'files'),
				'description' => esc_html__( 'Supported by all the major browsers.', 'thememountain-plugin' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'WebM Video file URL', 'thememountain-plugin' ),
				'param_name' => 'video_webm',
				'dependency' => array('element' => 'data_type','value'=>'files'),
				'description' => esc_html__( 'Supported by Chrome, FireFox and Opera.', 'thememountain-plugin' )
			),
			*/
			array(
				'group' => esc_html__( 'Lightbox', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'param_name' => 'use_lightbox',
				'value' => array( esc_html__( 'Use lightbox', 'thememountain-plugin' ) => 'true' ),
				'value' => array(
					esc_html__( 'Do not use lightbox', 'thememountain-plugin' ) => 'none',
					esc_html__( 'Use lightbox with thumbnail link', 'thememountain-plugin' ) => 'lightbox_with_thumbnail_link',
					esc_html__( 'Use lightbox with thumbnail icon', 'thememountain-plugin' ) => 'lightbox_with_icon',

					),
				'std' => 'none',
				'description' => '',
				),
			//
			ThemeMountain\TM_Vc::get_image_selector_vc_field(esc_html__( 'Lightbox', 'thememountain-plugin' ),esc_html__( 'Thumbnail Image', 'thememountain-plugin'),'',array('element' => 'use_lightbox','value'=>array('lightbox_with_icon','lightbox_with_thumbnail_link'))),
			ThemeMountain\TM_Vc::get_attach_image_vc_field(esc_html__( 'Lightbox', 'thememountain-plugin' )),
			ThemeMountain\TM_Vc::get_image_url_vc_field(esc_html__( 'Lightbox', 'thememountain-plugin' )),
			array(
				'group' => esc_html__( 'Lightbox', 'thememountain-plugin' ),
				'type' => 'textarea_html',
				'heading' => esc_html__( 'Rollover Caption', 'thememountain-plugin' ),
				'param_name' => 'content',
				'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_thumbnail_link')),
				'description' => '',
				),
			ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field(esc_html__( 'Lightbox', 'thememountain-plugin' ), array('element' => 'use_lightbox','value'=>array('lightbox_with_thumbnail_link'))),
			array(
				'group' => esc_html__( 'Lightbox', 'thememountain-plugin' ),
				'type' => 'textfield',
				'heading' => esc_html__( 'Lightbox Group ID', 'thememountain-plugin' ),
				'param_name' => 'lightbox_group_id',
				'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_icon','lightbox_with_thumbnail_link')),
				'description' => esc_html__( 'Associate an image to a specific lightbox group. This will allows user to browser through grouped image in the lightbox.', 'thememountain-plugin' ),
				),
			// lightbox options
			array(
				'group' => esc_html__( 'Lightbox', 'thememountain-plugin' ),
				'type' => 'checkbox',
				'heading' => esc_html__( 'Lightbox Toolbar Zoom Button', 'thememountain-plugin' ),
				'param_name' => 'lightbox_toolbar_zoom_button',
				'value' => array( esc_html__( 'Lightbox Toolbar Zoom Button', 'thememountain-plugin' ) => 'true' ),
				'std' => '',
				'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_icon','lightbox_with_thumbnail_link')),
				'description' => esc_html__( 'Whether the lightbox media should be zoomable.', 'thememountain-plugin' ),
				),
			array(
				'group' => esc_html__( 'Lightbox', 'thememountain-plugin' ),
				'type' => 'checkbox',
				'heading' => esc_html__( 'Lightbox Toolbar Share Button', 'thememountain-plugin' ),
				'param_name' => 'lightbox_toolbar_share_buttons',
				'value' => array( esc_html__( 'Lightbox Toolbar Share Button', 'thememountain-plugin' ) => 'true' ),
				'std' => '',
				'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_icon','lightbox_with_thumbnail_link')),
				'description' => esc_html__( 'Whether the lightbox media should be sharable through Facebook, Twitter and Google+.', 'thememountain-plugin' ),
				),
			array(
				'group' => esc_html__( 'Lightbox', 'thememountain-plugin' ),
				'type' => 'textfield',
				'heading' => esc_html__( 'Lightbox Caption', 'thememountain-plugin' ),
				'param_name' => 'lightbox_caption',
				'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_icon','lightbox_with_thumbnail_link')),
				'description' => esc_html__( 'The lightbox media caption. Leave blank if no caption is wanted.', 'thememountain-plugin' ),
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
				'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_icon','lightbox_with_thumbnail_link')),
				'description' => '',
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
				'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_icon')),
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
				'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_icon')),
				'description' => esc_html__( 'Whether the caption should be left, center or right aligned. This takes effect for all caption types.', 'thememountain-plugin' ),
				),
			// color
			array(
				'group' => 'Design Options',
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Rollover Background Color', 'thememountain-plugin' ),
				'param_name' => 'rollover_bkg_color',
				'std' => 'rgba(255,255,255,0.9)',
				'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_thumbnail_link')),
				),
			array(
				'group' => 'Design Options',
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Caption Text Color', 'thememountain-plugin' ),
				'param_name' => 'caption_text_color',
				'std' => '#232323',
				'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_thumbnail_link')),
				),

			// ICON design options
			array(
				'group' => 'Icon Design Options',
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'thememountain-plugin' ),
				'param_name' => 'icon_id',
				'settings' => array(
					'emptyIcon' => true,
					'type' => 'tm-entypo',
					'iconsPerPage' => 200,
					),
				'std' => 'tm-entypo-icon-play',
				'dependency' => array('element' => 'use_lightbox','value'=>'lightbox_with_icon'),
				'description' => esc_html__( 'Select the icon to be used.', 'thememountain-plugin' ),
			),
			array(
				'group' => 'Icon Design Options',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon Style', 'thememountain-plugin' ),
				'param_name' => 'icon_style',
				'value' => array(
					esc_html__( 'Boxed Icon', 'thememountain-plugin' ) => 'icon-boxed',
					esc_html__( 'Circled Icon', 'thememountain-plugin' ) => 'icon-circled',
				),
				'std' => 'icon-circled',
				'dependency' => array('element' => 'use_lightbox','value'=>'lightbox_with_icon'),
				'description' => '',
			),
			array(
				'group' => 'Icon Design Options',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon Size', 'thememountain-plugin' ),
				'param_name' => 'icon_size',
				'value' => ThemeMountain\TM_Vc::$vc_elements_variable['sizes'],
				'std' => 'medium',
				'dependency' => array('element' => 'use_lightbox','value'=>'lightbox_with_icon'),
				'description' => '',
			),
			// 'group' => esc_html__( 'Icon Design Options', 'thememountain-plugin' ),
			array(
				'group' => esc_html__( 'Icon Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Background Color', 'thememountain-plugin' ),
				'param_name' => 'icon_bkg_color',
				'std' => '#EEE',
				'dependency' => array('element' => 'use_lightbox','value'=>'lightbox_with_icon'),
				),
			array(
				'group' => esc_html__( 'Icon Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Background Color hover', 'thememountain-plugin' ),
				'param_name' => 'icon_bkg_color_hover',
				'std' => '#D0D0D0',
				'dependency' => array('element' => 'use_lightbox','value'=>'lightbox_with_icon'),
				),
			array(
				'group' => esc_html__( 'Icon Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Border color', 'thememountain-plugin' ),
				'param_name' => 'icon_border_color',
				'std' => '#EEE',
				'dependency' => array('element' => 'use_lightbox','value'=>'lightbox_with_icon'),
				),
			array(
				'group' => esc_html__( 'Icon Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Border color hover', 'thememountain-plugin' ),
				'param_name' => 'icon_border_color_hover',
				'std' => '#D0D0D0',
				'dependency' => array('element' => 'use_lightbox','value'=>'lightbox_with_icon'),
				),
			array(
				'group' => esc_html__( 'Icon Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Label Color', 'thememountain-plugin' ),
				'param_name' => 'icon_label_color',
				'std' => '#666',
				'dependency' => array('element' => 'use_lightbox','value'=>'lightbox_with_icon'),
				),
			array(
				'group' => esc_html__( 'Icon Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Label Color Hover', 'thememountain-plugin' ),
				'param_name' => 'icon_label_color_hover',
				'std' => '#666',
				'dependency' => array('element' => 'use_lightbox','value'=>'lightbox_with_icon'),
				),
			// rollover
			array(
				'group' => 'Animation',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Rollover Animation Type', 'thememountain-plugin' ),
				'param_name' => 'rollover_animation',
				'value' => ThemeMountain\TM_Vc::$vc_elements_variable['rollover_animation'],
				'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_thumbnail_link')),
				'std' => '',
				'description' => esc_html__( 'Determines the rollover animation style.', 'thememountain-plugin' ),
				),
			array(
				'group' => 'Animation',
				'type' => 'textfield',
				'heading' => esc_html__( 'Rollover Animation Duration', 'thememountain-plugin' ),
				'param_name' => 'rollover_animation_duration',
				'value' => '1000',
				'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_thumbnail_link')),
				'description' => esc_html__( 'Determines how long the rollover animation should be. Expressed in milliseconds i.e. 1000 represents 1 second.', 'thememountain-plugin' ),
				),
			array(
				'group' => 'Animation',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Rollover Easing Type', 'thememountain-plugin' ),
				'param_name' => 'rollover_easing',
				'value' => ThemeMountain\TM_Vc::$vc_elements_variable['easing'],
				'std' => 'swing',
				'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_thumbnail_link')),
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
	    		'dependency' => array('element' => 'use_lightbox','value'=>array('lightbox_with_icon','lightbox_with_thumbnail_link')),
	    		'description' => esc_html__( 'Determines the animation of the lightbox upon entering the viewport.', 'thememountain-plugin' ),
	    	),
		),
	) );
}

class WPBakeryShortCode_tm_video extends WPBakeryShortCode {
}
