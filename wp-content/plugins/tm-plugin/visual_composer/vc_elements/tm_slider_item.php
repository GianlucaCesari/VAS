<?php
/**
	ThemeMountain tm_slider_item
*/

// Checks up if the Visual Composer is activated.
if (class_exists( 'Vc_Manager' )) {
	/**
	    Note: please see initVisualComposer.php ... this file is included upon the vc_before_init hook.
	*/
	vc_map( array(
		'name' => esc_html__( 'Slide', 'thememountain-plugin' ),
		'base' => 'tm_slider_item',
		// 'allowed_container_element' => false,
		'is_container' => true,
		"as_parent" => array('only' => 'tm_slider_caption,tm_slider_button,tm_slider_icon'),
		"as_child" => array('only' => 'tm_slider_holder'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    	"content_element" => FALSE,
    	'description' => '',
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Slide Title', 'thememountain-plugin' ),
				'param_name' => 'title',
				'description' => '',
			),
			// data type
			array(
	    		'type' => 'dropdown',
	    		'heading' => esc_html__( 'Slide Type', 'thememountain-plugin' ),
	    		'param_name' => 'data_type',
	    		'admin_label' => true,
				'value' => array(
					esc_html__( 'Image', 'thememountain-plugin' ) => 'image',
					esc_html__( 'Vimeo', 'thememountain-plugin' ) => 'vimeo',
					esc_html__( 'Youtube', 'thememountain-plugin' ) => 'youtube',
					esc_html__( 'HTML5 Video', 'thememountain-plugin' ) => 'files',
					/* background */
					esc_html__( 'Vimeo (background video)', 'thememountain-plugin' ) => 'vimeo_background',
					esc_html__( 'Youtube (background video)', 'thememountain-plugin' ) => 'youtube_background',
					esc_html__( 'HTML5 Video (background video)', 'thememountain-plugin' ) => 'files_background',
				),
	    		'std' => 'image',
	    		'description' => '',
	    	),
	    	// video (vimeo)
	    	array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Vimeo Video ID', 'thememountain-plugin' ),
				'param_name' => 'video_vimeo',
				'dependency' => array('element' => 'data_type','value'=>array('vimeo','vimeo_background')),
				'description' => esc_html__( 'This is where you enter the Vimeo video ID, which generally look something like this:
https://vimeo.com/46697798.', 'thememountain-plugin' ),
			),
			// video (youtube)
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Youtube Video ID', 'thememountain-plugin' ),
				'param_name' => 'video_youtube',
				'dependency' => array('element' => 'data_type','value'=>array('youtube','youtube_background')),
				'description' => esc_html__( 'This is where you enter the YouTube video ID, which generally look something like this: https://www.youtube.com/watch?v=bPg4tk7VFR0.', 'thememountain-plugin' ),
			),
			// files
	    	array(
				'type' => 'textfield',
				'heading' => esc_html__( 'MP4 Video file URL', 'thememountain-plugin' ),
				'param_name' => 'video_mp4',
				'dependency' => array('element' => 'data_type','value'=>array('files','files_background')),
				'description' => '',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'WebM Video file URL', 'thememountain-plugin' ),
				'param_name' => 'video_webm',
				'dependency' => array('element' => 'data_type','value'=>array('files','files_background')),
				'description' => '',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Forcefit', 'thememountain-plugin' ),
				'param_name' => 'force_fit',
				'value' => array( esc_html__( 'Enable forcefit', 'thememountain-plugin' ) => 'true' ),
				'std' => 'true',
				'dependency' => array('element'=>'data_type','value'=>array('image','youtube_background','vimeo_background','files_background')),
				'description' => '',
			),

	    	// image
			ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Slide Image', 'thememountain-plugin'),'',array('element'=>'data_type','value'=>array('image','youtube_background','vimeo_background','files_background')) ),
			ThemeMountain\TM_Vc::get_attach_image_vc_field(),
			ThemeMountain\TM_Vc::get_image_url_vc_field(),
			array(
				'type' => 'tab_id',
				'heading' => esc_html__( 'Slide ID', 'thememountain-plugin' ),
				'param_name' => "slide_id",
				'description' => '',
				),
			// video options
			array(
				'group' => 'Video',
				'type' => 'checkbox',
				'heading' => esc_html__( 'Video Auto Play', 'thememountain-plugin' ),
				'param_name' => 'video_auto_play',
				'value' => array( esc_html__( 'Play video automatically', 'thememountain-plugin' ) => 'true' ),
				'std' => 'true',
				'dependency' => array('element'=>'data_type','value'=>array('youtube','vimeo','files','youtube_background','vimeo_background','files_background')),
				'description' => esc_html__( 'Determines whether the video should autoplay once the slide becomes active.', 'thememountain-plugin' ),
				),
			array(
				'group' => 'Video',
				'type' => 'checkbox',
				'heading' => esc_html__( 'Video Replay On End', 'thememountain-plugin' ),
				'param_name' => 'video_replay_on_end',
				'value' => array( esc_html__( 'Video Replay On End', 'thememountain-plugin' ) => 'true' ),
				'std' => 'true',
				'dependency' => array('element'=>'data_type','value'=>array('youtube','vimeo','files','youtube_background','vimeo_background','files_background')),
				'description' => esc_html__( 'Determines video should replay on ending (loop).', 'thememountain-plugin' ),
				),
			array(
				'group' => 'Video',
				'type' => 'checkbox',
				'heading' => esc_html__( 'Mute Video Sound', 'thememountain-plugin' ),
				'param_name' => 'video_mute',
				'value' => array( esc_html__( 'Mute Video Sound', 'thememountain-plugin' ) => 'true' ),
				'std' => 'true',
				'dependency' => array('element'=>'data_type','value'=>array('youtube','vimeo','files','youtube_background','vimeo_background','files_background')),
				'description' => esc_html__( 'Determines whether video should be muted.', 'thememountain-plugin' ),
				),
			// el_id
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
				'param_name' => 'el_id',
				),
			// Design Options
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
				'description' => esc_html__( 'Determines whether the slider caption should be top, middle or bottom aligned within the column.', 'thememountain-plugin' ),
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
	    		'type' => 'dropdown',
	    		'heading' => esc_html__( 'Caption Horizontal Alignment', 'thememountain-plugin' ),
	    		'param_name' => 'caption_horizontal_alignment',
	    		'admin_label' => true,
				'value' => array(
					esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
					esc_html__( 'Center', 'thememountain-plugin' ) => 'center',
					esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
				),
	    		'std' => 'center',
	    		'description' => esc_html__( 'Whether the caption should be left, center or right aligned. This takes effect for all caption types.', 'thememountain-plugin' ),
	    	),
			// gradient color support
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Background Color', 'thememountain-plugin' ),
				'param_name' => 'background_color',
				'std' => '#FFFFFF',
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
			// end custom only, with gradient color support
			/** Overlay Background Color with gradient support */
			array(
				'group' => 'Design Options',
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Overlay Background Color', 'thememountain-plugin' ),
				'param_name' => 'overlay_background_color',
				'std' => 'rgba(0,0,0,0.3)',
				'description' => '',
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'checkbox',
				'heading' => esc_html__( 'Use gradient for overlay background', 'thememountain-plugin' ),
				'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
				'param_name' => 'overlay_background_use_gradient',
				'std' => '',
				'description' => esc_html__( 'This will create a background image gradient, which means that if you have set an image as a background, the gradient will replace it. If selected, Background Color will be used as the start color for the gradient.', 'thememountain-plugin' ),
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
			/** end Overlay Background Color with gradient support */
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
			// Animation
			array(
				'group' => 'Animation',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Slide Animation Type', 'thememountain-plugin' ),
				'param_name' => 'slide_transition',
				'admin_label' => true,
				'value' => ThemeMountain\TM_Vc::$vc_elements_variable['slide_transition'],
				'std' => 'fade',
				'description' => '',
				),
			),
		'js_view' => 'TmAvalancheSlideView'
	) );
}
