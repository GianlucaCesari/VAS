<?php
/**
 * tm_icon
 *
 * @since      1.0
 *
 * @uses       TM_Vc::$vc_elements_variable['vc_map_icon']
 *
 * @see        tm_slider_icon
 * @see        tm_aux_icon
 */

vc_map(array(
	'name' => esc_html__( 'Icon', 'thememountain-plugin' ),
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'base' => 'tm_icon',
	'is_container' => false,
	'icon' => 'tm_vc_icon_icons',
	'show_settings_on_create' => true,
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
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'thememountain-plugin' ),
			'param_name' => 'icon_id',
			'settings' => array(
				'emptyIcon' => true,
				'type' => 'tm-entypo',
				'iconsPerPage' => 200,
				),
			'admin_label' => TRUE,
			'std' => '',
			'description' => esc_html__( 'Select the icon to be used.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Link to', 'thememountain-plugin' ),
			'param_name' => 'link_icon',
			'value' => array(
				esc_html__( 'Page', 'thememountain-plugin' ) => 'link_to_page',
				esc_html__( 'Lightbox', 'thememountain-plugin' ) => 'use_lightbox',
				esc_html__( 'Section (scroll)', 'thememountain-plugin' ) => 'scroll_to_section',
				),
			'std' => '',
			'description' => esc_html__( 'Determines what the icon should link to, either: None, Scroll to section, Link to page or Use lightbox. Here is a breakdown of each and their dependent options.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Link URL', 'thememountain-plugin' ),
			'param_name' => 'link_url',
			'value' => '',
			'dependency' => array('element' => 'link_icon','value'=>array('link_to_page','scroll_to_section')),
			'description' => esc_html__( 'The URL of the page to which the icon should link to. Or if this is for scroll to section. the section ID that the icon should link to. For the link to initiate a scroll to a given section you need to specify ID as follow: <b>#section</b>. Remember to also give the section in quesiton the same ID.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Scroll Offset', 'thememountain-plugin' ),
			'param_name' => 'scroll_offset',
			'value' => '0',
			'dependency' => array('element' => 'link_icon','value'=>'scroll_to_section'),
			'description' => esc_html__( 'This is where you can set the scroll position offset when scrolling to a section. Accepts negative numbers.', 'thememountain-plugin' ),
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
			'dependency' => array('element' => 'link_icon','value'=>'link_to_page'),
			'description' => esc_html__( 'Whether the page should open in the same window, new tab or in a new window.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Media Type', 'thememountain-plugin' ),
			'param_name' => 'media_type',
			'value' => array(
				esc_html__( 'Image', 'thememountain-plugin' ) => 'image',
				esc_html__( 'Vimeo Video', 'thememountain-plugin' ) => 'vimeo',
				esc_html__( 'YouTube Video', 'thememountain-plugin' ) => 'youtube',
				esc_html__( 'Other Video', 'thememountain-plugin' ) => 'other',
				),
			'std' => 'image',
			'dependency' => array('element' => 'link_icon','value'=>'use_lightbox'),
			'description' => esc_html__( 'Wheter the lightbox should show a YouTube, Vimeo, self hosted video or an image.', 'thememountain-plugin' ),
			),
		// Image
		ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Image for Lightbox', 'thememountain-plugin'),'',array('element' => 'media_type','value'=>'image')),
		ThemeMountain\TM_Vc::get_attach_image_vc_field(),
		ThemeMountain\TM_Vc::get_image_url_vc_field(),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Lightbox Toolbar Zoom Button', 'thememountain-plugin' ),
			'param_name' => 'lightbox_toolbar_zoom_button',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'dependency' => array('element' => 'link_icon','value'=>'use_lightbox'),
			'description' => esc_html__( 'Whether the lightbox media should be zoomable.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Lightbox Toolbar Share Button', 'thememountain-plugin' ),
			'param_name' => 'lightbox_toolbar_share_buttons',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'dependency' => array('element' => 'link_icon','value'=>'use_lightbox'),
			'description' => esc_html__( 'Whether the lightbox media should be sharable through Facebook, Twitter and Google+.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Lightbox Caption', 'thememountain-plugin' ),
			'param_name' => 'lightbox_caption',
			'value' => '',
			'dependency' => array('element' => 'link_icon','value'=>'use_lightbox'),
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
		// extra
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
			'heading' => esc_html__( 'Display as Inline Block', 'thememountain-plugin' ),
			'param_name' => 'display_inline',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'description'=> esc_html__( 'Determines whether the icon should be inserted on its own line or alignd next to the previous element.', 'thememountain-plugin' )
			),
		array(
			'group' => 'Design Options',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon Size', 'thememountain-plugin' ),
			'param_name' => 'icon_size',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['sizes'],
			'std' => 'medium',
			'description' => esc_html__( 'Determines whether the icon should be small, medium, large or extra large in size.', 'thememountain-plugin' ),
			),
		array(
			'group' => 'Design Options',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon Style', 'thememountain-plugin' ),
			'param_name' => 'icon_style',
			'value' => array(
				esc_html__( 'None', 'thememountain-plugin' ) => '',
				esc_html__( 'Boxed Icon', 'thememountain-plugin' ) => 'icon-boxed',
				esc_html__( 'Circled Icon', 'thememountain-plugin' ) => 'icon-circled',
				),
			'std' => '',
			'description' => esc_html__( 'Determines whether icon should have no styling, or whether it should be boxed or circled.', 'thememountain-plugin' ),
			),
			// colorpicker
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Background Color', 'thememountain-plugin' ),
			'param_name' => 'bkg_color',
			'std' => '#EEE',
			'dependency' => array('element' => 'icon_style','value'=>array('icon-boxed','icon-circled')),
			'description' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Background Color Hover', 'thememountain-plugin' ),
			'param_name' => 'bkg_color_hover',
			'std' => '#D0D0D0',
			'dependency' => array('element' => 'icon_style','value'=>array('icon-boxed','icon-circled')),
			'description' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Border Color', 'thememountain-plugin' ),
			'param_name' => 'border_color',
			'std' => '#EEE',
			'dependency' => array('element' => 'icon_style','value'=>array('icon-boxed','icon-circled')),
			'description' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Border Color Hover', 'thememountain-plugin' ),
			'param_name' => 'border_color_hover',
			'std' => '#D0D0D0',
			'dependency' => array('element' => 'icon_style','value'=>array('icon-boxed','icon-circled')),
			'description' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Icon Color', 'thememountain-plugin' ),
			'param_name' => 'label_color',
			'std' => '#666',
			'description' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Icon Color Hover', 'thememountain-plugin' ),
			'param_name' => 'label_color_hover',
			'std' => '#666',
			'description' => '',
			),
		/** animation */
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
			'dependency' => array('element' => 'link_icon','value'=>'use_lightbox'),
			'description' => esc_html__( 'Determines the animation of the lightbox upon entering the viewport.', 'thememountain-plugin' ),
			),
		),
	'js_view' => 'TmIconView',
));

class WPBakeryShortCode_tm_icon extends WPBakeryShortCode {}