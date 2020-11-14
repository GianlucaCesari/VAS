<?php
/**
 * tm_slider_button
 *
 * @since      1.0.10
 * @see        tm_slider_button
 */

vc_map( array(
	'name' => esc_html__( 'Button', 'thememountain-plugin' ),
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'base' => 'tm_slider_button',
	'as_child' => array('only' => 'tm_slider_item'),
	'is_container' => false,
	'icon' => 'tm_vc_icon_button',
	'show_settings_on_create' => true,
	'is_container' => FALSE,
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
		/** tm_button, tm_content_button, tm_slider button - need to add lightbox option #850 */
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Link to', 'thememountain-plugin' ),
			'param_name' => 'link_to',
			'value' => array(
				esc_html__( 'Page', 'thememountain-plugin' ) => 'page',
				esc_html__( 'Lightbox', 'thememountain-plugin' ) => 'lightbox',
				esc_html__( 'Modal', 'thememountain-plugin' ) => 'modal',
				esc_html__( 'Section (scroll)', 'thememountain-plugin' ) => 'scroll',
			),
			'std' => 'page',
			'description' => esc_html__( 'Wheter the lightbox should show a YouTube, Vimeo, self hosted video.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Media Type', 'thememountain-plugin' ),
			'param_name' => 'media_type',
			'value' => array(
				/* Note: we are not offering to link to image for button, doesn't make sense */
				esc_html__( 'Vimeo Video', 'thememountain-plugin' ) => 'vimeo',
				esc_html__( 'YouTube Video', 'thememountain-plugin' ) => 'youtube',
				esc_html__( 'Other Video', 'thememountain-plugin' ) => 'other',
				),
			'std' => 'vimeo',
			'dependency' => array('element' => 'link_to','value'=>'lightbox'),
			'description' => esc_html__( 'Wheter the lightbox should show a YouTube, Vimeo or self hosted video.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Lightbox Toolbar Zoom Button', 'thememountain-plugin' ),
			'param_name' => 'lightbox_toolbar_zoom_button',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'dependency' => array('element' => 'link_to','value'=>'lightbox'),
			'description' => esc_html__( 'Whether the lightbox media should be zoomable.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Lightbox Toolbar Share Button', 'thememountain-plugin' ),
			'param_name' => 'lightbox_toolbar_share_buttons',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'dependency' => array('element' => 'link_to','value'=>'lightbox'),
			'description' => esc_html__( 'Whether the lightbox media should be sharable through Facebook, Twitter and Google+.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Lightbox Caption', 'thememountain-plugin' ),
			'param_name' => 'lightbox_caption',
			'value' => '',
			'dependency' => array('element' => 'link_to','value'=>'lightbox'),
			'description' => esc_html__( 'The lightbox media caption. Leave blank if no caption is wanted.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Vimeo ID', 'thememountain-plugin' ),
			'param_name' => 'video_vimeo_id',
			'value' => '',
			'dependency' => array('element' => 'media_type','value'=>'vimeo'),
			'description' => esc_html__( 'This is where you enter the Vimeo video ID, which generally look something like this:
				https://vimeo.com/<b>46697798</b>.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Youtube ID', 'thememountain-plugin' ),
			'param_name' => 'video_youtube_id',
			'value' => '',
			'dependency' => array('element' => 'media_type','value'=>'youtube'),
			'description' => esc_html__( 'This is where you enter the YouTube video ID, which generally look something like this: https://www.youtube.com/watch?v=<b>bPg4tk7VFR0</b>.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Video URL', 'thememountain-plugin' ),
			'param_name' => 'video_url',
			'value' => '',
			'dependency' => array('element' => 'media_type','value'=>'other'),
			'description' => '',
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Video URL Parameters', 'thememountain-plugin' ),
			'param_name' => 'video_url_parameters',
			'dependency' => array('element' => 'media_type','value'=>array('youtube','vimeo')),
			'description' => '',
			),
		// end #850
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'thememountain-plugin' ),
			'param_name' => 'icon_id',
			'settings' => array(
				'emptyIcon' => true,
				'type' => 'tm-entypo',
				'iconsPerPage' => 200,
				),
			'std' => '',
			'description' => esc_html__( 'Whether the button should have an icon or not.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Button Type', 'thememountain-plugin' ),
			'param_name' => 'button_type',
			'value' => array(
				esc_html__( 'Regular Button', 'thememountain-plugin' ) => '',
				esc_html__( 'App Button', 'thememountain-plugin' ) => 'app',
			),
			'std' => '',
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Button Sub Label', 'thememountain-plugin' ),
			'param_name' => 'button_sub_label',
			'value' => '',
			'dependency' => array('element' => 'button_type','value'=>'app'),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Button label', 'thememountain-plugin' ),
			'param_name' => 'button_label',
			'value' => '',
			'description' => esc_html__( 'What the button should say.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'URL', 'thememountain-plugin' ),
			'param_name' => 'link_url',
			'value' => '',
			'dependency' => array('element' => 'link_to','value'=>array('page','scroll')),
			'description' => esc_html__( 'The page, or site, or section ID that the button should link to.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Scroll Offset', 'thememountain-plugin' ),
			'param_name' => 'scroll_offset',
			'value' => 0,
			'dependency' => array('element' => 'link_to','value'=>'scroll'),
			'description' => esc_html__( 'This option is dependant upon whether the "Link to" option is set to true. This is where you can set the ccroll position offset when scrolling to a section. Accepts negative numbers.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Link Target', 'thememountain-plugin' ),
			'param_name' => 'link_target',
			'value' => array(
				esc_html__( 'Same Window', 'thememountain-plugin' ) => '_self',
				esc_html__( 'Blank', 'thememountain-plugin' ) => '_blank',
				),
			'std' => '_self',
			'dependency' => array('element' => 'link_to','value'=>array('page')),
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Modal Target', 'thememountain-plugin' ),
			'param_name' => 'modal_target',
			'value' => ThemeMountain\TM_Vc::get_posts_list_in_array(array( 'post_type' => 'tm_modal','posts_per_page' => -1)),
			'std' => 0,
			'dependency' => array('element' => 'link_to','value'=>array('modal')),
			),
			// extra
			// array(
			// 	'type' => 'textfield',
			// 	'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			// 	'param_name' => 'el_id',
			// 	'dependency' => array('element' => 'use_lightbox','value'=>'true'),
			// 	),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description'=> esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' )
			),
			// design options
		array(
			'group' => esc_html__( 'Display Options', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Insert Button On Same Line', 'thememountain-plugin' ),
			'param_name' => 'display_inline',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'description'=> esc_html__( 'Determines whether the button should be inserted on its own line or alignd next to the previous element.', 'thememountain-plugin' )
			),
		array(
			'group' => 'Design Options',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon Alignment', 'thememountain-plugin' ),
			'param_name' => 'icon_alignment',
			'value' => array(
				esc_html__( 'Icon Left', 'thememountain-plugin' ) => 'left',
				esc_html__( 'Icon Right', 'thememountain-plugin' ) => 'right',
				),
			'std' => 'left',
			'description'=> esc_html__( 'This option is dependant upon General > Icon . Determines whether button icon should be left or right aligned.', 'thememountain-plugin' )
			),
		array(
			'group' => 'Design Options',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Button Size', 'thememountain-plugin' ),
			'param_name' => 'button_size',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['sizes'],
			'std' => 'medium',
			'description'=> esc_html__( 'Determines whether button should be small, medium, large or extra large in size.', 'thememountain-plugin' )
			),
		array(
			'group' => 'Design Options',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Button Style', 'thememountain-plugin' ),
			'param_name' => 'border_style',
			'value' => array(
				esc_html__( 'None', 'thememountain-plugin' ) => '',
				esc_html__( 'Rounded', 'thememountain-plugin' ) => 'rounded',
				esc_html__( 'Pill', 'thememountain-plugin' ) => 'pill',
				),
			'std' => '',
			'description'=> esc_html__( 'Whether button should have sharp corners, rounded corners, or be pill shaped.', 'thememountain-plugin' )
			),
			// colorpicker
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Background Color', 'thememountain-plugin' ),
			'param_name' => 'bkg_color',
			'std' => '#EEE',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Background Color Hover', 'thememountain-plugin' ),
			'param_name' => 'bkg_color_hover',
			'std' => '#D0D0D0',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Border Color', 'thememountain-plugin' ),
			'param_name' => 'border_color',
			'std' => '#EEE',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Border Color Hover', 'thememountain-plugin' ),
			'param_name' => 'border_color_hover',
			'std' => '#D0D0D0',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Label Color', 'thememountain-plugin' ),
			'param_name' => 'label_color',
			'std' => '#666',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Label Color Hover', 'thememountain-plugin' ),
			'param_name' => 'label_color_hover',
			'std' => '#666',
			),
			// shadow checkbox
		array(
			'type' => 'checkbox',
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'heading' => esc_html__( 'Drop Shadow', 'thememountain-plugin' ),
			'param_name' => 'drop_shadow',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			),
		// animation
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Button Animation Type', 'thememountain-plugin' ),
			'param_name' => 'button_animation',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['animation'],
			'std' => 'fadeIn',
			'description' => esc_html__( 'Determines the type of animation that will be applied to the caption.', 'thememountain-plugin' )
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Button Animation Duration', 'thememountain-plugin' ),
			'param_name' => 'button_animation_duration',
			'value' => '1000',
			'description' => esc_html__( 'How long the animation should be. Expressed in milliseconds i.e. 1000 represents 1 second.', 'thememountain-plugin' )
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Button Animation Delay', 'thememountain-plugin' ),
			'param_name' => 'button_animation_delay',
			'value' => '0',
			'description' => esc_html__( 'How long before the animation should begin upon entering the viewport. Expressed in milliseconds i.e. 100 represents 0.1 second.', 'thememountain-plugin' )
			),
		/** Animation */
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
			'dependency' => array('element' => 'link_to','value'=>'lightbox'),
			'description' => esc_html__( 'Determines the animation of the lightbox upon entering the viewport.', 'thememountain-plugin' ),
			),
	),
	'js_view' => 'TmButtonView',
));

class WPBakeryShortCode_tm_slider_button extends WPBakeryShortCode {}