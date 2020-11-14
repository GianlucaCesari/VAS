<?php
/**
 * Common variables used for template config files are defined in this file.
 * This file begins with _ underscore to make sure that this file is loaded first before the config files.
 * This file is loaded in ThemeMountain\TM_TemplateServices::on_init();
 */
namespace ThemeMountain;

$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];
$thememountain_navmenu_str = TM_ThemeStrings::$text_strings['nav_menu_customizer'];
$thememountain_pageoption_str = TM_ThemeStrings::$text_strings['page_options'];

// settings fields_
	TM_PageOptions::add_preset_option_sets('fields_featured_media', array(
		/**
		 * Featured Media
		 * This is a supplement to the wp default thumbnail image uploader
		 * To be identified from the 'page_header_image_url'
		 */
		/**
		 * Featured Media Type featured_media_type
		 * default : image or empty
		 * values: youtube, vimeo, html5
		 * type: select
		 */
		'tm_featured_media_type' => array(
			'name'             => $thememountain_pageoption_str['tm_featured_media_type'][0],
			'desc'             => $thememountain_pageoption_str['tm_featured_media_type'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'image',
			'options'          => array(
				'none'     => $thememountain_pageoption_str['tm_featured_media_type'][2],
				'image'     => $thememountain_pageoption_str['tm_featured_media_type'][3],
				'vimeo'   => $thememountain_pageoption_str['tm_featured_media_type'][4],
				'youtube' => $thememountain_pageoption_str['tm_featured_media_type'][5],
				'html5'     => $thememountain_pageoption_str['tm_featured_media_type'][6],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_use_masthead_title_settings_of',
				'data-conditional-value' => wp_json_encode(array('custom')),
				)
			),
		/**
		 * Youtube Video ID : tm_featured_media_youtube
		 * dependency tm_featured_media_type = youtube
		 * type: text
		 */
		'tm_featured_media_youtube' => array(
			'name'    => $thememountain_pageoption_str['tm_featured_media_youtube'][0],
			'desc'    => $thememountain_pageoption_str['tm_featured_media_youtube'][1],
			'default' => '',
			'type'    => 'text',
			'attributes' => array(
				'data-conditional-id' => 'tm_featured_media_type',
				'data-conditional-value' => 'youtube',
				)
			),
		/**
		 * video Video ID : tm_featured_media_vimeo
		 * dependency tm_featured_media_type = vimeo
		 * type: text
		 */
		'tm_featured_media_vimeo' => array(
			'name'    => $thememountain_pageoption_str['tm_featured_media_vimeo'][0],
			'desc'    => $thememountain_pageoption_str['tm_featured_media_vimeo'][1],
			'default' => '',
			'type'    => 'text',
			'attributes' => array(
				'data-conditional-id' => 'tm_featured_media_type',
				'data-conditional-value' => 'vimeo',
				)
			),
		/**
		 * html5 video and thumbnail
		 * dependency tm_featured_media_type = html5
		 * type: file
		 */
		'tm_featured_media_video_mp4' => array(
				'name'    => $thememountain_pageoption_str['tm_featured_media_video_mp4'][0],
				'desc'    => $thememountain_pageoption_str['tm_featured_media_video_mp4'][1],
				'type'    => 'file',
				'options' => array(
		        'url' => TRUE, // Hide the text input for the url
		        'add_upload_file_text' => $thememountain_pageoption_str['tm_featured_media_video_mp4'][2],
		        ),
				'attributes' => array(
					'data-conditional-id' => 'tm_featured_media_type',
					'data-conditional-value' => 'html5',
					)
				),
		'tm_featured_media_video_webm' => array(
				'name'    => $thememountain_pageoption_str['tm_featured_media_video_webm'][0],
				'desc'    => $thememountain_pageoption_str['tm_featured_media_video_webm'][1],
				'type'    => 'file',
				'options' => array(
		        'url' => TRUE, // Hide the text input for the url
		        'add_upload_file_text' => $thememountain_pageoption_str['tm_featured_media_video_webm'][2],
		        ),
				'attributes' => array(
					'data-conditional-id' => 'tm_featured_media_type',
					'data-conditional-value' => 'html5',
					)
				),
		'tm_featured_media_thumbnail' => array(
				'name'    => $thememountain_pageoption_str['tm_featured_media_thumbnail'][0],
				'desc'    => $thememountain_pageoption_str['tm_featured_media_thumbnail'][1],
				'type'    => 'file',
				'options' => array(
		        'url' => FALSE, // Hide the text input for the url
		        'add_upload_file_text' => $thememountain_pageoption_str['tm_featured_media_thumbnail'][2],
		        ),
				'attributes' => array(
					'data-conditional-id' => 'tm_featured_media_type',
					'data-conditional-value' => 'html5',
					)
				),

		/**
		 * Loop Video : tm_featured_media_loop_video
		 * dependency tm_featured_media_type = any
		 * type: select
		 */
		'tm_featured_media_loop_video' => array(
			'name'             => $thememountain_pageoption_str['tm_featured_media_loop_video'][0],
			'desc'             => $thememountain_pageoption_str['tm_featured_media_loop_video'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'no_loop',
			'options'          => array(
				'no_loop'     => $thememountain_pageoption_str['tm_featured_media_loop_video'][2],
				'loop' => $thememountain_pageoption_str['tm_featured_media_loop_video'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_featured_media_video_mode',
				'data-conditional-value' => 'regular'
				)
			),
		/**
		 * Mute Video : tm_featured_media_mute_video
		 * dependency tm_featured_media_type = any
		 */
		'tm_featured_media_mute_video' => array(
			'name'             => $thememountain_pageoption_str['tm_featured_media_mute_video'][0],
			'desc'             => $thememountain_pageoption_str['tm_featured_media_mute_video'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'mute',
			'options'          => array(
				'mute'     => $thememountain_pageoption_str['tm_featured_media_mute_video'][2],
				'play_sound' => $thememountain_pageoption_str['tm_featured_media_mute_video'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_featured_media_type',
				'data-conditional-value' => wp_json_encode(
					array('vimeo','youtube','html5')
					),
				)
			),
		/**
		 * Video Mode : tm_featured_media_video_mode
		 * regular, background
		 * dependency tm_featured_media_type = any
		 * type: select
		 */
		'tm_featured_media_video_mode' => array(
			'name'             => $thememountain_pageoption_str['tm_featured_media_video_mode'][0],
			'desc'             => $thememountain_pageoption_str['tm_featured_media_video_mode'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'background',
			'options'          => array(
				'regular'     => $thememountain_pageoption_str['tm_featured_media_video_mode'][2],
				'background' => $thememountain_pageoption_str['tm_featured_media_video_mode'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_featured_media_type',
				'data-conditional-value' => wp_json_encode(
					array('vimeo','youtube','html5')
					),
				)
			),
	));
/**
 * Page Head
 */
	TM_PageOptions::add_preset_option_sets('fields_page_head', array(
		/**
		 * Page Head Title related
		 */
		'tm_use_masthead_title_settings_of' => array(
			'name' => $thememountain_pageoption_str['tm_use_masthead_title_settings_of'][0],
			'desc' => $thememountain_pageoption_str['tm_use_masthead_title_settings_of'][1],
			'type' => 'select',
			'default' => 'customizer',
			'options'          => array(
				'customizer'     => $thememountain_pageoption_str['tm_use_masthead_title_settings_of'][2],
				'custom' => $thememountain_pageoption_str['tm_use_masthead_title_settings_of'][3],
				'none' => $thememountain_pageoption_str['tm_use_masthead_title_settings_of'][4],
				),
			) ,
		'tm_masthead_height' => array(
			'name' => $thememountain_pageoption_str['tm_masthead_height'][0],
			'desc'             => $thememountain_pageoption_str['tm_masthead_height'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'regular',
			'options'          => array(
				'regular'     => $thememountain_pageoption_str['tm_masthead_height'][2],
				'window-height'   => $thememountain_pageoption_str['tm_masthead_height'][3],
				'custom'     => $thememountain_pageoption_str['tm_masthead_height'][4],
				),
			'attributes' => array(
					'data-conditional-id' => 'tm_use_masthead_title_settings_of',
					'data-conditional-value' => wp_json_encode(array('custom')),
					)
			),
		'tm_page_head_min_height' => array(
			'name'    => $thememountain_pageoption_str['tm_page_head_min_height'][0],
			'desc'    => $thememountain_pageoption_str['tm_page_head_min_height'][1],
			'default' => '265',
			'type'    => 'text',
			'attributes' => array(
				'data-conditional-id' => 'tm_featured_media_type',
				'data-conditional-value' => wp_json_encode(array('image','youtube','vimeo','html5')),
				)
			),
		'tm_masthead_height_custom' => array(
			'name'    => $thememountain_pageoption_str['tm_masthead_height_custom'][0],
			'desc'    => $thememountain_pageoption_str['tm_masthead_height_custom'][1],
			'default' => '',
			'type'    => 'text',
			'attributes' => array(
				'data-conditional-id' => 'tm_masthead_height',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_head_title_font_color' => array(
			'name'    => $thememountain_customizer_str['tm_page_head_title_font_color_'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#FFFFFF',
			'attributes' => array(
				'data-conditional-id' => 'tm_use_masthead_title_settings_of',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_head_title_background_color' => array(
			'name'    => $thememountain_customizer_str['tm_page_head_title_background_color_'][0],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_page_head_title_background_color_home',
			'default' => 'rgba(255,69,86,1)',
			'attributes' => array(
				'data-conditional-id' => 'tm_use_masthead_title_settings_of',
				'data-conditional-value' => 'custom',
			)
		),
		// Overrides Customizer Settings
		'tm_page_head_title_overlay_background_color' => array(
			'name'    => $thememountain_customizer_str['tm_page_head_title_overlay_background_color_'][0],
			'type'    => 'rgba_colorpicker',
			'default' => 'rgba(0,0,0,0.3)',
			'attributes' => array(
				'data-conditional-id' => 'tm_use_masthead_title_settings_of',
				'data-conditional-value' => 'custom',
				)
			),
		'tm_page_head_title_animation' => array(
			'name'             => $thememountain_pageoption_str['tm_page_head_title_animation'][0],
			'desc'             => $thememountain_pageoption_str['tm_page_head_title_animation'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'none',
			'options'          => array(
				'none' => $thememountain_pageoption_str['tm_page_head_title_animation'][2],
				'fadeIn' => $thememountain_pageoption_str['tm_page_head_title_animation'][3],
				'slideInUpShort' => $thememountain_pageoption_str['tm_page_head_title_animation'][4],
				'slideInRightShort' => $thememountain_pageoption_str['tm_page_head_title_animation'][5],
				'slideInDownShort' => $thememountain_pageoption_str['tm_page_head_title_animation'][6],
				'slideInLeftShort' => $thememountain_pageoption_str['tm_page_head_title_animation'][7],
				'slideInUpLong' => $thememountain_pageoption_str['tm_page_head_title_animation'][8],
				'slideInRightLong' => $thememountain_pageoption_str['tm_page_head_title_animation'][9],
				'slideInDownLong' => $thememountain_pageoption_str['tm_page_head_title_animation'][10],
				'slideInLeftLong' => $thememountain_pageoption_str['tm_page_head_title_animation'][11],
				'bounceIn' => $thememountain_pageoption_str['tm_page_head_title_animation'][12],
				'bounceOut' => $thememountain_pageoption_str['tm_page_head_title_animation'][13],
				'bounceInUp' => $thememountain_pageoption_str['tm_page_head_title_animation'][14],
				'bounceInRight' => $thememountain_pageoption_str['tm_page_head_title_animation'][15],
				'bounceInDown' => $thememountain_pageoption_str['tm_page_head_title_animation'][16],
				'bounceInLeft' => $thememountain_pageoption_str['tm_page_head_title_animation'][17],
				'scaleIn' => $thememountain_pageoption_str['tm_page_head_title_animation'][18],
				'scaleOut' => $thememountain_pageoption_str['tm_page_head_title_animation'][19],
				'flipInX' => $thememountain_pageoption_str['tm_page_head_title_animation'][20],
				'flipInY' => $thememountain_pageoption_str['tm_page_head_title_animation'][21],
				'spinInX' => $thememountain_pageoption_str['tm_page_head_title_animation'][22],
				'spinInY' => $thememountain_pageoption_str['tm_page_head_title_animation'][23],
				'helicopterIn' => $thememountain_pageoption_str['tm_page_head_title_animation'][24],
				'helicopterOut' => $thememountain_pageoption_str['tm_page_head_title_animation'][25],
				'signSwingTop' => $thememountain_pageoption_str['tm_page_head_title_animation'][26],
				'signSwingRight' => $thememountain_pageoption_str['tm_page_head_title_animation'][27],
				'signSwingBottom' => $thememountain_pageoption_str['tm_page_head_title_animation'][28],
				'signSwingLeft' => $thememountain_pageoption_str['tm_page_head_title_animation'][29],
				'wiggleX' => $thememountain_pageoption_str['tm_page_head_title_animation'][30],
				'wiggleY' => $thememountain_pageoption_str['tm_page_head_title_animation'][31],
				'dropUp' => $thememountain_pageoption_str['tm_page_head_title_animation'][32],
				'dropDown' => $thememountain_pageoption_str['tm_page_head_title_animation'][33],
				'rollInLeft' => $thememountain_pageoption_str['tm_page_head_title_animation'][34],
				'rollInRight' => $thememountain_pageoption_str['tm_page_head_title_animation'][35],
				'turnInRight' => $thememountain_pageoption_str['tm_page_head_title_animation'][36],
				'turnInLeft' => $thememountain_pageoption_str['tm_page_head_title_animation'][37],
			),
			'attributes' => array(
				'data-conditional-id' => 'tm_use_masthead_title_settings_of',
				'data-conditional-value' => 'custom',
				)
			),
		// added for Custom options for post - page title animation #111
		'tm_page_head_title_animation_duration' => array(
			'name'    => $thememountain_pageoption_str['tm_page_head_title_animation_duration'][0],
			'desc'    => $thememountain_pageoption_str['tm_page_head_title_animation_duration'][1],
			'default' => '1000',
			'type'    => 'text',
			'attributes' => array(
				'data-conditional-id' => 'tm_page_head_title_animation',
				'data-conditional-value' => wp_json_encode( array( 'fadeIn','slideInUpShort','slideInRightShort','slideInDownShort','slideInLeftShort','slideInUpLong','slideInRightLong','slideInDownLong','slideInLeftLong','bounceIn','bounceOut','bounceInUp','bounceInRight','bounceInDown','bounceInLeft','scaleIn','scaleOut','flipInX','flipInY','spinInX','spinInY','helicopterIn','helicopterOut','signSwingTop','signSwingRight','signSwingBottom','signSwingLeft','wiggleX','wiggleY','dropUp','dropDown','rollInLeft','rollInRight','turnInRight','turnInLeft' ) ),
				)
			),
		'tm_page_head_title_animation_delay' => array(
			'name'    => $thememountain_pageoption_str['tm_page_head_title_animation_delay'][0],
			'desc'    => $thememountain_pageoption_str['tm_page_head_title_animation_delay'][1],
			'default' => '0',
			'type'    => 'text',
			'attributes' => array(
				'data-conditional-id' => 'tm_page_head_title_animation',
				'data-conditional-value' => wp_json_encode( array( 'fadeIn','slideInUpShort','slideInRightShort','slideInDownShort','slideInLeftShort','slideInUpLong','slideInRightLong','slideInDownLong','slideInLeftLong','bounceIn','bounceOut','bounceInUp','bounceInRight','bounceInDown','bounceInLeft','scaleIn','scaleOut','flipInX','flipInY','spinInX','spinInY','helicopterIn','helicopterOut','signSwingTop','signSwingRight','signSwingBottom','signSwingLeft','wiggleX','wiggleY','dropUp','dropDown','rollInLeft','rollInRight','turnInRight','turnInLeft' ) ),
				)
			),
	));

/**
 * Sidebar
 */
	TM_PageOptions::add_preset_option_sets('fields_sidebar', array(
		'tm_use_sidebar' => array(
			'name'             => $thememountain_pageoption_str['tm_use_sidebar'][0],
			'desc'             => $thememountain_pageoption_str['tm_use_sidebar'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'customizer',
			'default_cb' => function () {
				global $post;
				$_post_type = $post->post_type;
				if($_post_type === 'post') {
					return 'customizer';
				}
				return 'none';
				},
			'options_cb' => function () {
				global $post;
				$_post_type = $post->post_type;
				$thememountain_pageoption_str = TM_ThemeStrings::$text_strings['page_options'];
				$_options = array();
				if($_post_type === 'post') {
					$_options['customizer'] = $thememountain_pageoption_str['tm_use_sidebar'][2];
				}
				$_options = $_options +
					array(
						'none' => $thememountain_pageoption_str['tm_use_sidebar'][5],
						'right' => $thememountain_pageoption_str['tm_use_sidebar'][3],
						'left' => $thememountain_pageoption_str['tm_use_sidebar'][4]
					);
				return $_options;
				},
			// 'options'          => array(
			// 	'customizer'     => $thememountain_pageoption_str['tm_use_sidebar'][2],
			// 	'right' => $thememountain_pageoption_str['tm_use_sidebar'][3],
			// 	'left'   => $thememountain_pageoption_str['tm_use_sidebar'][4],
			// 	'none'     => $thememountain_pageoption_str['tm_use_sidebar'][5],
			// 	),
			),
	));

/**
 * Post Media
 */
	TM_PageOptions::add_preset_option_sets('fields_post_media', array(
		'tm_use_post_media' => array(
			'name'             => $thememountain_pageoption_str['tm_use_post_media'][0],
			'desc'             => $thememountain_pageoption_str['tm_use_post_media'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'none',
			'options'          => array(
				'none'     => $thememountain_pageoption_str['tm_use_post_media'][2],
				'vimeo'     => $thememountain_pageoption_str['tm_use_post_media'][3],
				'youtube'   => $thememountain_pageoption_str['tm_use_post_media'][4],
				'video' => $thememountain_pageoption_str['tm_use_post_media'][5],
				'audio' => $thememountain_pageoption_str['tm_use_post_media'][6],
				),
			),
		'tm_media_height' => array(
			'name'             => $thememountain_pageoption_str['tm_media_height'][0],
			'desc'             => $thememountain_pageoption_str['tm_media_height'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'regular',
			'options'          => array(
				'regular'     => $thememountain_pageoption_str['tm_media_height'][2],
				'window-height'   => $thememountain_pageoption_str['tm_media_height'][3],
				'custom'     => $thememountain_pageoption_str['tm_media_height'][4],
				),
			'attributes' => array(
					'data-conditional-id' => 'tm_use_post_media',
					'data-conditional-value' => wp_json_encode(array('video', 'vimeo','youtube')),
					)
			),
		'tm_media_height_custom' => array(
				'name'    => $thememountain_pageoption_str['tm_media_height_custom'][0],
				'desc'    => $thememountain_pageoption_str['tm_media_height_custom'][1],
				'default' => '',
				'type'    => 'text',
				'attributes' => array(
					'data-conditional-id' => 'tm_media_height',
					'data-conditional-value' => 'custom',
					)
				),
		'tm_media_youtube' => array(
				'name'    => $thememountain_pageoption_str['tm_media_youtube'][0],
				'desc'    => $thememountain_pageoption_str['tm_media_youtube'][1],
				'default' => '',
				'type'    => 'text',
				'attributes' => array(
					'data-conditional-id' => 'tm_use_post_media',
					'data-conditional-value' => 'youtube',
					)
				),
		'tm_media_vimeo' => array(
				'name'    => $thememountain_pageoption_str['tm_media_vimeo'][0],
				'desc'    => $thememountain_pageoption_str['tm_media_vimeo'][1],
				'default' => '',
				'type'    => 'text',
				'attributes' => array(
					'data-conditional-id' => 'tm_use_post_media',
					'data-conditional-value' => 'vimeo',
					)
				),
		'tm_media_video_mp4' => array(
				'name'    => $thememountain_pageoption_str['tm_media_video_mp4'][0],
				'desc'    => $thememountain_pageoption_str['tm_media_video_mp4'][1],
				'type'    => 'file',
				'options' => array(
		        'url' => false, // Hide the text input for the url
		        'add_upload_file_text' => $thememountain_pageoption_str['tm_media_video_mp4'][2],
		        ),
				'attributes' => array(
					'data-conditional-id' => 'tm_use_post_media',
					'data-conditional-value' => 'video',
					)
				),
		'tm_media_video_webm' => array(
			'name'    => $thememountain_pageoption_str['tm_media_video_webm'][0],
			'desc'    => $thememountain_pageoption_str['tm_media_video_webm'][1],
			'type'    => 'file',
			'options' => array(
				'url' => false, // Hide the text input for the url
				'add_upload_file_text' => $thememountain_pageoption_str['tm_media_video_webm'][2],
			),
			'attributes' => array(
				'data-conditional-id' => 'tm_use_post_media',
				'data-conditional-value' => 'video',
			)
		),
		'tm_media_thumbnail' => array(
			'name'    => $thememountain_pageoption_str['tm_media_thumbnail'][0],
			'desc'    => $thememountain_pageoption_str['tm_media_thumbnail'][1],
			'type'    => 'file',
			'options' => array(
				'url' => false, // Hide the text input for the url
				'add_upload_file_text' => $thememountain_pageoption_str['tm_media_thumbnail'][2],
			),
			'attributes' => array(
				'data-conditional-id' => 'tm_use_post_media',
				'data-conditional-value' => 'video',
			)
		),
		'tm_use_video_for_featured' => array(
			'name'    => $thememountain_pageoption_str['tm_use_video_for_featured'][0],
			'desc'    => $thememountain_pageoption_str['tm_use_video_for_featured'][1],
			'type'    => 'checkbox',
			'attributes' => array(
				'data-conditional-id' => 'tm_use_post_media',
				'data-conditional-value' => wp_json_encode(array('video', 'vimeo','youtube')),
			)
		),
		/** audio */
		'tm_media_audio' => array(
			'name'    => $thememountain_pageoption_str['tm_media_audio'][0],
			'desc'    => $thememountain_pageoption_str['tm_media_audio'][1],
			'type'    => 'file',
			'options' => array(
				'url' => false, // Hide the text input for the url
				'add_upload_file_text' => $thememountain_pageoption_str['tm_media_audio'][2],
			),
			'query_args' => array(
				'type' => 'audio/mpeg', // Make library only display PDFs.
			),
			'attributes' => array(
				'data-conditional-id' => 'tm_use_post_media',
				'data-conditional-value' => 'audio',
			)
		),
		'tm_use_audio_for_featured' => array(
			'name'    => $thememountain_pageoption_str['tm_use_audio_for_featured'][0],
			'desc' => $thememountain_pageoption_str['tm_use_audio_for_featured'][1],
			'type'    => 'checkbox',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_use_post_media',
				'data-conditional-value' => 'audio',
			)
		),
	));

/**
 * Fields Loop
 */
	TM_PageOptions::add_preset_option_sets('fields_loop', array(
		'tm_hide_excerpt_in_loop' => array(
			'name'    => $thememountain_pageoption_str['tm_hide_excerpt_in_loop'][0],
			'desc' => $thememountain_pageoption_str['tm_hide_excerpt_in_loop'][1],
						'type'    => 'checkbox',
			'default' => '',
			),
	));

/**
 * Grids
 */
	TM_PageOptions::add_preset_option_sets('fields_grids', array(
		'tm_grid_thumbnail' => array(
			'name'	=> $thememountain_pageoption_str['tm_grid_thumbnail'][0],
			'desc'	=> $thememountain_pageoption_str['tm_grid_thumbnail'][1],
			'type'    => 'file',
			'options' => array(
				'url' => true,
				'add_upload_file_text' => $thememountain_pageoption_str['tm_grid_thumbnail'][2],
				),
			),
		'tm_grid_linked_item' => array(
			'name'             => $thememountain_pageoption_str['tm_grid_linked_item'][0],
			'desc'             => $thememountain_pageoption_str['tm_grid_linked_item'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'linked',
			'options'          => array(
				'linked'     => $thememountain_pageoption_str['tm_grid_linked_item'][2],
				'lightbox'     => $thememountain_pageoption_str['tm_grid_linked_item'][3],
				'custom_url'     => $thememountain_pageoption_str['tm_grid_linked_item'][4],
				'not_linked'   => $thememountain_pageoption_str['tm_grid_linked_item'][5],
				),
			),
		'tm_grid_custom_url' => array(
			'name'	=> $thememountain_pageoption_str['tm_grid_custom_url'][0],
			'desc'	=> $thememountain_pageoption_str['tm_grid_custom_url'][1],
			'type'    => 'text',
			'default' => 'http://',
			'attributes' => array(
				'data-conditional-id' => 'tm_grid_linked_item',
				'data-conditional-value' => 'custom_url'
				)
			),
		'tm_grid_lightbox_caption' => array(
			'name'	=> $thememountain_pageoption_str['tm_grid_lightbox_caption'][0],
			'desc'	=> $thememountain_pageoption_str['tm_grid_lightbox_caption'][1],
			'type'    => 'text',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_grid_linked_item',
				'data-conditional-value' => wp_json_encode( array( 'lightbox') )
				)
			),
		/**
		 * see tm_grid item need to add an additional option to grid rollovers #39
		 *  - text_with_thumbnail_rollover added and labels for text_with_thumbnail has been changed
		 */
		'tm_grid_box_type' => array(
			'name'             => $thememountain_pageoption_str['tm_grid_box_type'][0],
			'desc'             => $thememountain_pageoption_str['tm_grid_box_type'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'thumbnail',
			'options_cb' => function () {
				global $post;
				$_post_type = $post->post_type;
				$thememountain_pageoption_str = TM_ThemeStrings::$text_strings['page_options'];
				$_options = array();
				$_options['thumbnail'] = $thememountain_pageoption_str['tm_grid_box_type'][2];
				if($_post_type !== 'post') {
					$_options['text_with_thumbnail'] = $thememountain_pageoption_str['tm_grid_box_type'][3];
					$_options['text_with_thumbnail_rollover'] = $thememountain_pageoption_str['tm_grid_box_type'][4];
				}
				$_options['text'] = $thememountain_pageoption_str['tm_grid_box_type'][5];
				$_options['none'] = $thememountain_pageoption_str['tm_grid_box_type'][6];
				return $_options;
				}
			),
		/**
		 * see tm_grid item need to add an additional option to grid rollovers #39
		 */
		'tm_grid_box_title' => array(
			'name'	=> $thememountain_pageoption_str['tm_grid_box_title'][0],
			'desc'	=> $thememountain_pageoption_str['tm_grid_box_title'][1],
			'type'    => 'text',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_grid_box_type',
				'data-conditional-value' => wp_json_encode(array('text_with_thumbnail','text_with_thumbnail_rollover','text'))
				)
			),
		/**
		 * see tm_grid item need to add an additional option to grid rollovers #39
		 * textarea for text_with_thumbnail and text_with_thumbnail_rollover
		 */
		'tm_grid_box_description' => array(
			'name'	=> $thememountain_pageoption_str['tm_grid_box_description'][0],
			'desc'	=> $thememountain_pageoption_str['tm_grid_box_description'][1],
			'type'    => 'textarea_small',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_grid_box_type',
				'data-conditional-value' => wp_json_encode(array('text_with_thumbnail','text_with_thumbnail_rollover'))
				)
			),
		'tm_grid_box_thumb_format' => array(
			'name'             => $thememountain_pageoption_str['tm_grid_box_thumb_format'][0],
			'desc'             => $thememountain_pageoption_str['tm_grid_box_thumb_format'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'none',
			'options'          => array(
				'none' => $thememountain_pageoption_str['tm_grid_box_thumb_format'][2],
				'large' => $thememountain_pageoption_str['tm_grid_box_thumb_format'][3],
				'portrait'   => $thememountain_pageoption_str['tm_grid_box_thumb_format'][4],
				'large-portrait' => $thememountain_pageoption_str['tm_grid_box_thumb_format'][5],
				'wide' => $thememountain_pageoption_str['tm_grid_box_thumb_format'][6],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_grid_box_type',
				'data-conditional-value' => wp_json_encode( array( 'thumbnail', 'text_with_thumbnail', 'text_with_thumbnail_rollover', 'text' ) )
				)
			),
		// Blog Creative Layout Options and Fixes #15
		'tm_grid_box_content_vertical_alignment' => array(
			'name'             => $thememountain_pageoption_str['tm_grid_box_content_vertical_alignment'][0],
			'desc'             => $thememountain_pageoption_str['tm_grid_box_content_vertical_alignment'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'middle',
			'options'          => array(
				'top' => $thememountain_pageoption_str['tm_grid_box_content_vertical_alignment'][2],
				'middle' => $thememountain_pageoption_str['tm_grid_box_content_vertical_alignment'][3],
				'bottom'   => $thememountain_pageoption_str['tm_grid_box_content_vertical_alignment'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_grid_box_type',
				'data-conditional-value' => wp_json_encode( array( 'thumbnail', 'text_with_thumbnail', 'text_with_thumbnail_rollover', 'text' ) )
				)
			),
		'tm_grid_box_content_horizontal_alignment' => array(
			'name'             => $thememountain_pageoption_str['tm_grid_box_content_horizontal_alignment'][0],
			'desc'             => $thememountain_pageoption_str['tm_grid_box_content_horizontal_alignment'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'center',
			'options'          => array(
				'left' => $thememountain_pageoption_str['tm_grid_box_content_horizontal_alignment'][2],
				'center' => $thememountain_pageoption_str['tm_grid_box_content_horizontal_alignment'][3],
				'right'   => $thememountain_pageoption_str['tm_grid_box_content_horizontal_alignment'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_grid_box_type',
				'data-conditional-value' => wp_json_encode( array( 'thumbnail', 'text_with_thumbnail', 'text_with_thumbnail_rollover', 'text' ) )
				)
			),
		// Blog Creative Layout Options and Fixes #15 End
		// Blog grid item background color and post color needs color options #191
		'tm_grid_layout_box_article_background_color_item' => array(
			'name'    => $thememountain_customizer_str['tm_grid_layout_box_article_background_color_'][0],
			'desc'    => $thememountain_customizer_str['tm_grid_layout_box_article_background_color_'][1],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_grid_layout_box_article_background_color_home',
			'default' => '',
			),
		'tm_grid_layout_box_article_title_color_item' => array(
			'name'    => $thememountain_customizer_str['tm_grid_layout_box_article_title_color_'][0],
			'desc'    => $thememountain_customizer_str['tm_grid_layout_box_article_title_color_'][1],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_grid_layout_box_article_title_color_home',
			'default' => '',
			),
		'tm_grid_layout_box_article_color_item' => array(
			'name'    => $thememountain_customizer_str['tm_grid_layout_box_article_color_'][0],
			'desc'    => $thememountain_customizer_str['tm_grid_layout_box_article_color_'][1],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_grid_layout_box_article_color_home',
			'default' => '',
			),
		'tm_grid_layout_box_article_link_color_item' => array(
			'name'    => $thememountain_customizer_str['tm_grid_layout_box_article_link_color_'][0],
			'desc'    => $thememountain_customizer_str['tm_grid_layout_box_article_link_color_'][1],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_grid_layout_box_article_link_color_home',
			'default' => '',
			),
		// end #191
		// #226
		'tm_grid_layout_box_article_post_meta_color_item' => array(
			'name'    => $thememountain_customizer_str['tm_grid_layout_box_article_post_meta_color_'][0],
			'desc'    => $thememountain_customizer_str['tm_grid_layout_box_article_post_meta_color_'][1],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_grid_layout_box_article_post_meta_color_home',
			'default' => '',
			),
		// End #226
		/** text only option */
		'tm_grid_box_text' => array(
			'name'    => $thememountain_pageoption_str['tm_grid_box_text'][0],
			'desc'    => $thememountain_pageoption_str['tm_grid_box_text'][1],
			'type'    => 'wysiwyg',
			'default' => '',
			'after_field' => "<input type='hidden' data-parent-name='tm_grid_box_text' data-conditional-id='tm_grid_box_type' data-conditional-value='".wp_json_encode( array( 'text' ) )."'>",
			),
	));

/**
 * Pagination (for tm_folio)
 */
	TM_PageOptions::add_preset_option_sets('fields_pagination', array(
		'tm_pagination_hide' => array(
			'name'    => $thememountain_pageoption_str['tm_pagination_hide'][0],
			'desc' => $thememountain_pageoption_str['tm_pagination_hide'][1],
			'type'    => 'checkbox',
			),
	));

/**
 * Navigation Menu
 */
	TM_PageOptions::add_preset_option_sets('fields_nav_menu', array(
		'tm_navigation_menu_deviate' => array(
			'name'    => $thememountain_pageoption_str['tm_navigation_menu_deviate'][0],
			'desc' => $thememountain_pageoption_str['tm_navigation_menu_deviate'][1],
			'type'    => 'checkbox',
			'default' => '',
			),
		/**
		 * Options for Navigation Menu of this page (dependency: tm_navigation_menu_deviate === on)
		 */
		// For the Page Option only
		// (Deviate) Logo
		'tm_deviate_logo' => array(
			'name'             => $thememountain_pageoption_str['tm_deviate_logo'][0],
			'desc'             => $thememountain_pageoption_str['tm_deviate_logo'][1],
			'type'             => 'select',
			'default'          => 'header-absolute', // in customizer header-fixed is default
			'options'          => array(
				'customizer' => $thememountain_pageoption_str['tm_deviate_logo'][2],
				'use_top_logo' => $thememountain_pageoption_str['tm_deviate_logo'][3],
				'use_body_logo' => $thememountain_pageoption_str['tm_deviate_logo'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// Add the following header options to Custom Options for Post/Page > Navigation #47
		// Overrides Customizer Settings
		'tm_header_position' => array(
			'name'             => $thememountain_customizer_str['tm_header_position'][0],
			'desc'             => $thememountain_customizer_str['tm_header_position'][1],
			'type'             => 'select',
			'default'          => 'header-absolute', // in customizer header-fixed is default
			'options'          => array(
				'header-relative' => $thememountain_customizer_str['tm_header_position'][2],
				'header-absolute' => $thememountain_customizer_str['tm_header_position'][3],
				'header-fixed' => $thememountain_customizer_str['tm_header_position'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// Overrides Customizer Settings
		'tm_header_fixed_on_mobile' => array(
			'name'             => $thememountain_customizer_str['tm_header_fixed_on_mobile'][0],
			'desc'             => $thememountain_customizer_str['tm_header_fixed_on_mobile'][1],
			'type'             => 'select',
			'default'          => 'header-absolute',
			'options'          => array(
				'header-fixed-on-mobile' => $thememountain_customizer_str['tm_header_fixed_on_mobile'][2],
				'do-not-fix-header-on-mobile' => $thememountain_customizer_str['tm_header_fixed_on_mobile'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// Overrides Customizer Settings
		'tm_header_vertical_alignment' => array(
			'name'             => $thememountain_customizer_str['tm_header_vertical_alignment'][0],
			'desc'             => $thememountain_customizer_str['tm_header_vertical_alignment'][1],
			'type'             => 'select',
			'default'          => 'top',
			'options'          => array(
				'top' => $thememountain_customizer_str['tm_header_vertical_alignment'][2],
				'bottom' => $thememountain_customizer_str['tm_header_vertical_alignment'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// Overrides Customizer Settings
		'tm_header_vertical_alignment_bottom_value' => array(
			'name'    => $thememountain_customizer_str['tm_header_vertical_alignment_bottom_value'][0],
			'desc'    => $thememountain_customizer_str['tm_header_vertical_alignment_bottom_value'][1],
			'default' => '0',
			'type'    => 'text',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// end #47
		/* Header options for Custom options for pages/posts #82 */
		// Default set to blank so that that in Page Option can accept blank value.
		'tm_body_header_default_menu_height_threshold' => array(
			'name'    => $thememountain_customizer_str['tm_body_header_default_menu_height_threshold'][0],
			'desc'    => $thememountain_customizer_str['tm_body_header_default_menu_height_threshold'][1],
			'default' => '',
			'type'    => 'text',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// Default set to blank so that that in Page Option can accept blank value.
		'tm_body_header_background_color_threshold' => array(
			'name'    => $thememountain_customizer_str['tm_body_header_background_color_threshold'][0],
			'desc'    => $thememountain_customizer_str['tm_body_header_background_color_threshold'][1],
			'default' => '',
			'type'    => 'text',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// Default set to blank so that that in Page Option can accept blank value.
		'tm_body_header_compact_threshold' => array(
			'name'    => $thememountain_customizer_str['tm_body_header_compact_threshold'][0],
			'desc'    => $thememountain_customizer_str['tm_body_header_compact_threshold'][1],
			'default' => '',
			'type'    => 'text',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// Default set to blank so that that in Page Option can accept blank value.
		'tm_body_header_sticky_threshold' => array(
			'name'    => $thememountain_customizer_str['tm_body_header_sticky_threshold'][0],
			'desc'    => $thememountain_customizer_str['tm_body_header_sticky_threshold'][1],
			'default' => '',
			'type'    => 'text',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// Default set to blank so that that in Page Option can accept blank value.
		'tm_body_header_helper_out_threshold' => array(
			'name'    => $thememountain_customizer_str['tm_body_header_helper_out_threshold'][0],
			'desc'    => $thememountain_customizer_str['tm_body_header_helper_out_threshold'][1],
			'default' => '',
			'type'    => 'text',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// end #82
		// others
		// Overrides Customizer Settings
		'tm_header_navigation_type' => array(
			'name'             => $thememountain_customizer_str['tm_header_navigation_type'][0],
			'desc'             => $thememountain_customizer_str['tm_header_navigation_type'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => TM_NavMenuServices::get_default_nav_menu_style(),
			'options'          => TM_NavMenuServices::get_available_nav_menu_styles(),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
		),
		/* Navigation Header Menu Alignment */
		// Overrides Customizer Settings
		'tm_header_navigation_alignment' => array(
			'name'             => $thememountain_navmenu_str['tm_header_navigation_alignment'][0],
			'desc'             => $thememountain_navmenu_str['tm_header_navigation_alignment'][1],
			'type'             => 'select',
			'default'          => 'right',
			'options'          => array(
				'left'     => $thememountain_navmenu_str['tm_header_navigation_alignment'][2],
				'center' => $thememountain_navmenu_str['tm_header_navigation_alignment'][3],
				'right' => $thememountain_navmenu_str['tm_header_navigation_alignment'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		/* Secondary Navigation Alignment */
		// Overrides Customizer Settings
		'tm_header_secondary_navigation_alignment' => array(
			'name'             => $thememountain_navmenu_str['tm_header_secondary_navigation_alignment'][0],
			'desc'             => $thememountain_navmenu_str['tm_header_secondary_navigation_alignment'][1],
			'type'             => 'select',
			'default'          => 'right',
			'options'          => array(
				'left'     => $thememountain_navmenu_str['tm_header_secondary_navigation_alignment'][2],
				'right' => $thememountain_navmenu_str['tm_header_secondary_navigation_alignment'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		/* Secondary Navigation Alignment */
		// Overrides Customizer Settings
		'tm_header_width' => array(
			'name'             => $thememountain_navmenu_str['tm_header_width'][0],
			'desc'             => $thememountain_navmenu_str['tm_header_width'][1],
			'type'             => 'select',
			'default'          => 'fixed',
			'options'          => array(
				'fixed' => $thememountain_navmenu_str['tm_header_width'][2],
				'full' => $thememountain_navmenu_str['tm_header_width'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// tm_navigation_menu_item_main_nav_menu
		'tm_navigation_menu_item_main_nav_menu' => array(
			'name'             => $thememountain_pageoption_str['tm_navigation_menu_item_main_nav_menu'][0],
			'desc'             => $thememountain_pageoption_str['tm_navigation_menu_item_main_nav_menu'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => TM_NavMenuServices::get_current_menu_item_by_menu_location('main_nav_menu'),
			'options'          => TM_NavMenuServices::get_available_nav_menu_items_list(),
			'attributes' => array(
				'data-conditional-id' => 'tm_header_navigation_type',
				'data-conditional-value' => wp_json_encode( array( 'default' ) )
				)
			),
		/* overlay */
		'tm_navigation_menu_item_overlay_menu' => array(
			'name'             => $thememountain_pageoption_str['tm_navigation_menu_item_overlay_menu'][0],
			'desc'             => $thememountain_pageoption_str['tm_navigation_menu_item_overlay_menu'][1],
			'type'             => 'select',
			'show_option_none' => FALSE,
			'default'          => TM_NavMenuServices::get_current_menu_item_by_menu_location('overlay_menu'),
			'options'          => TM_NavMenuServices::get_available_nav_menu_items_list(),
			'attributes' => array(
				'data-conditional-id' => 'tm_header_navigation_type',
				'data-conditional-value' => wp_json_encode( array( 'default' , 'hamburger' , 'hybrid' ) )
				)
			),
		// Overrides Customizer Settings
		'tm_overlay_nav_menu_alignment' => array(
			'name'             => $thememountain_customizer_str['tm_overlay_nav_menu_alignment'][0],
			'desc'             => $thememountain_customizer_str['tm_overlay_nav_menu_alignment'][1],
			'type'             => 'select',
			'default'          => 'left',
			'options'          => array(
				'left'     => $thememountain_customizer_str['tm_overlay_nav_menu_alignment'][2],
				'center' => $thememountain_customizer_str['tm_overlay_nav_menu_alignment'][3],
				'right' => $thememountain_customizer_str['tm_overlay_nav_menu_alignment'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		'tm_navigation_menu_item_overlay_secondary_menu' => array(
			'name'             => $thememountain_pageoption_str['tm_navigation_menu_item_overlay_secondary_menu'][0],
			'desc'             => $thememountain_pageoption_str['tm_navigation_menu_item_overlay_secondary_menu'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => TM_NavMenuServices::get_current_menu_item_by_menu_location('overlay_secondary_menu'),
			'options'          => TM_NavMenuServices::get_available_nav_menu_items_list(TRUE),
			'attributes' => array(
				'data-conditional-id' => 'tm_header_navigation_type',
				'data-conditional-value' => wp_json_encode( array( 'default' , 'hamburger' , 'hybrid' ) )
				)
			),
		// overlay
		// Overrides Customizer Settings
		'tm_overlay_menu_title_display' => array(
			'name'             => $thememountain_customizer_str['tm_overlay_menu_title_display'][0],
			'desc'             => $thememountain_customizer_str['tm_overlay_menu_title_display'][1],
			'type'             => 'select',
			'default'          => 'show',
			'options'          => array(
				'show'     => $thememountain_customizer_str['tm_overlay_menu_title_display'][2],
				'hide' => $thememountain_customizer_str['tm_overlay_menu_title_display'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// Overrides Customizer Settings
		'tm_secondary_overlay_title_display' => array(
			'name'             => $thememountain_customizer_str['tm_secondary_overlay_title_display'][0],
			'desc'             => $thememountain_customizer_str['tm_secondary_overlay_title_display'][1],
			'type'             => 'select',
			'default'          => 'show',
			'options'          => array(
				'show'     => $thememountain_customizer_str['tm_secondary_overlay_title_display'][2],
				'hide' => $thememountain_customizer_str['tm_secondary_overlay_title_display'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		/* offcanvas */
		'tm_navigation_menu_item_off_canvas_menu' => array(
			'name'             => $thememountain_pageoption_str['tm_navigation_menu_item_off_canvas_menu'][0],
			'desc'             => $thememountain_pageoption_str['tm_navigation_menu_item_off_canvas_menu'][1],
			'type'             => 'select',
			'show_option_none' => FALSE,
			'default'          => TM_NavMenuServices::get_current_menu_item_by_menu_location('off_canvas_menu'),
			'options'          => TM_NavMenuServices::get_available_nav_menu_items_list(TRUE),
			'attributes' => array(
				'data-conditional-id' => 'tm_header_navigation_type',
				'data-conditional-value' => wp_json_encode( array( 'default' , 'hamburger' , 'hybrid' ) )
				)
			),
		// Overrides Customizer Settings
		'tm_off_canvas_nav_menu_width' => array(
			'name'             => $thememountain_customizer_str['tm_off_canvas_nav_menu_width'][0],
			'desc'             => $thememountain_customizer_str['tm_off_canvas_nav_menu_width'][1],
			'type'             => 'select',
			'default'          => 'default',
			'options'          => array(
				'default'     => $thememountain_customizer_str['tm_off_canvas_nav_menu_width'][2],
				'50%' => $thememountain_customizer_str['tm_off_canvas_nav_menu_width'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// Overrides Customizer Settings
		'tm_off_canvas_nav_menu_alignment' => array(
			'name'             => $thememountain_customizer_str['tm_off_canvas_nav_menu_alignment'][0],
			'desc'             => $thememountain_customizer_str['tm_off_canvas_nav_menu_alignment'][1],
			'type'             => 'select',
			'default'          => 'left',
			'options'          => array(
				'left'     => $thememountain_customizer_str['tm_off_canvas_nav_menu_alignment'][2],
				'center' => $thememountain_customizer_str['tm_off_canvas_nav_menu_alignment'][3],
				'right' => $thememountain_customizer_str['tm_off_canvas_nav_menu_alignment'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),

		'tm_navigation_menu_item_off_canvas_secondary_menu' => array(
			'name'             => $thememountain_pageoption_str['tm_navigation_menu_item_off_canvas_secondary_menu'][0],
			'desc'             => $thememountain_pageoption_str['tm_navigation_menu_item_off_canvas_secondary_menu'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => TM_NavMenuServices::get_current_menu_item_by_menu_location('off_canvas_secondary_menu'),
			'options'          => TM_NavMenuServices::get_available_nav_menu_items_list(TRUE),
			'attributes' => array(
				'data-conditional-id' => 'tm_header_navigation_type',
				'data-conditional-value' => wp_json_encode( array( 'default' , 'hamburger' , 'hybrid' ) )
				)
			),
		// Overrides Customizer Settings
		'tm_off_canvas_title_display' => array(
			'name'             => $thememountain_customizer_str['tm_off_canvas_title_display'][0],
			'desc'             => $thememountain_customizer_str['tm_off_canvas_title_display'][1],
			'type'             => 'select',
			'default'          => 'show',
			'options'          => array(
				'show'     => $thememountain_customizer_str['tm_off_canvas_title_display'][2],
				'hide' => $thememountain_customizer_str['tm_off_canvas_title_display'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// Overrides Customizer Settings
		'tm_secondary_off_canvas_title_display' => array(
			'name'             => $thememountain_customizer_str['tm_secondary_off_canvas_title_display'][0],
			'desc'             => $thememountain_customizer_str['tm_secondary_off_canvas_title_display'][1],
			'type'             => 'select',
			'default'          => 'show',
			'options'          => array(
				'show'     => $thememountain_customizer_str['tm_secondary_off_canvas_title_display'][2],
				'hide' => $thememountain_customizer_str['tm_secondary_off_canvas_title_display'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		/** position **/
		// Overrides Customizer Settings
		'tm_off_canvas_nav_position' => array(
			'name'             => $thememountain_customizer_str['tm_off_canvas_nav_position'][0],
			'desc'             => $thememountain_customizer_str['tm_off_canvas_nav_position'][1],
			'type'             => 'select',
			'default'          => 'enter-left',
			'options'          => array(
				'enter-left'     => $thememountain_customizer_str['tm_off_canvas_nav_position'][2],
				'enter-right' => $thememountain_customizer_str['tm_off_canvas_nav_position'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		/** animation */
		// Overrides Customizer Settings
		'tm_overlay_nav_animation' => array(
			'name'             => $thememountain_customizer_str['tm_overlay_nav_animation'][0],
			'desc'             => $thememountain_customizer_str['tm_overlay_nav_animation'][1],
			'type'             => 'select',
			'default'          => 'scale-in',
			'options'          => array(
				'top' => $thememountain_customizer_str['tm_overlay_nav_animation'][2],
				'right' => $thememountain_customizer_str['tm_overlay_nav_animation'][3],
				'bottom' => $thememountain_customizer_str['tm_overlay_nav_animation'][4],
				'left' => $thememountain_customizer_str['tm_overlay_nav_animation'][5],
				'scale-in' => $thememountain_customizer_str['tm_overlay_nav_animation'][6],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		// Overrides Customizer Settings
		'tm_off_canvas_nav_animation' => array(
			'name'             => $thememountain_customizer_str['tm_off_canvas_nav_animation'][0],
			'desc'             => $thememountain_customizer_str['tm_off_canvas_nav_animation'][1],
			'type'             => 'select',
			'default'          => 'reveal',
			'options'          => array(
				'reveal' => $thememountain_customizer_str['tm_off_canvas_nav_animation'][2],
				'slide-in' => $thememountain_customizer_str['tm_off_canvas_nav_animation'][3],
				'push-in' => $thememountain_customizer_str['tm_off_canvas_nav_animation'][4],
				'scale-in' => $thememountain_customizer_str['tm_off_canvas_nav_animation'][5],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_menu_deviate',
				'data-conditional-value' => 'on'
				)
			),
		/**
		 * color set options
		 */
		'tm_navigation_color_set' => array(
			'name'             => $thememountain_pageoption_str['tm_navigation_color_set'][0],
			'desc'             => $thememountain_pageoption_str['tm_navigation_color_set'][1],
			'type'             => 'select',
			'default'          => 'default',
			'options'          => array(
				'default'     => $thememountain_pageoption_str['tm_navigation_color_set'][2],
				'custom' => $thememountain_pageoption_str['tm_navigation_color_set'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_header_navigation_type',
				'data-conditional-value' => wp_json_encode( array( 'default', 'hamburger' ,'hybrid' ) )
				)
			),
		/**
		 * Custom Navigation Color (dependency: Navigation Color Set === Custom)
		 */
		/** Top Header Background Color */
		// Overrides Customizer Settings
		'tm_page_header_nav_default_menu_top_color' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_nav_default_menu_top_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => 'rgba(255,255,255,0.6)',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_header_nav_default_menu_top_color_hover' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_nav_default_menu_top_color_hover'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#FFFFFF',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_header_nav_default_menu_top_color_current' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_nav_default_menu_top_color_current'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#FFFFFF',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		/** Body Header Navigation */
		// Overrides Customizer Settings
		'tm_page_header_nav_default_menu_body_color' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_nav_default_menu_body_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => 'rgba(153,153,153,0.6)',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_header_nav_default_menu_body_color_hover' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_nav_default_menu_body_color_hover'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#000',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_header_nav_default_menu_body_color_active' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_nav_default_menu_body_color_active'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#000',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		/** Sub Menu */
		// Overrides Customizer Settings
		'tm_page_header_nav_default_menu_sub_bkg_color' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_nav_default_menu_sub_bkg_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#111',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_header_nav_default_menu_sub_link_color' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_nav_default_menu_sub_link_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#888',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_header_nav_default_menu_sub_link_color_hover' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_nav_default_menu_sub_link_color_hover'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#FFFFFF',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_header_nav_default_menu_sub_link_color_active' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_nav_default_menu_sub_link_color_active'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#FFFFFF',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_header_nav_default_menu_sub_link_background_color_hover' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_nav_default_menu_sub_link_background_color_hover'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#000',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		'tm_page_header_nav_mega_submenu_border_color' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_nav_mega_submenu_border_color'][0],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_page_header_nav_mega_submenu_border_color',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		/**
		 * Nav Button Color Options
		 *
		 * @see			wordpress-common-assets Header Button Colors (customization specs outline needed.) #7
		 * @see			Header button - we need to add body header button colors #177
		 */
		// Overrides Customizer Settings
		'tm_top_header_nav_button_background_color' => array(
			'name'    => $thememountain_navmenu_str['tm_top_header_nav_button_background_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_top_header_nav_button_border_color' => array(
			'name'    => $thememountain_navmenu_str['tm_top_header_nav_button_border_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_top_header_nav_button_text_color' => array(
			'name'    => $thememountain_navmenu_str['tm_top_header_nav_button_text_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_top_header_nav_button_background_color_hover' => array(
			'name'    => $thememountain_navmenu_str['tm_top_header_nav_button_background_color_hover'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_top_header_nav_button_border_color_hover' => array(
			'name'    => $thememountain_navmenu_str['tm_top_header_nav_button_border_color_hover'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_top_header_nav_button_text_color_hover' => array(
			'name'    => $thememountain_navmenu_str['tm_top_header_nav_button_text_color_hover'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),

		// Overrides Customizer Settings
		'tm_body_header_nav_button_background_color' => array(
			'name'    => $thememountain_navmenu_str['tm_body_header_nav_button_background_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_body_header_nav_button_border_color' => array(
			'name'    => $thememountain_navmenu_str['tm_body_header_nav_button_border_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_body_header_nav_button_text_color' => array(
			'name'    => $thememountain_navmenu_str['tm_body_header_nav_button_text_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_body_header_nav_button_background_color_hover' => array(
			'name'    => $thememountain_navmenu_str['tm_body_header_nav_button_background_color_hover'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_body_header_nav_button_border_color_hover' => array(
			'name'    => $thememountain_navmenu_str['tm_body_header_nav_button_border_color_hover'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_body_header_nav_button_text_color_hover' => array(
			'name'    => $thememountain_navmenu_str['tm_body_header_nav_button_text_color_hover'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),

		/** Header Background */
		// Overrides Customizer Settings
		'tm_page_header_default_menu_top_bkg_color' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_default_menu_top_bkg_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => 'rgba(255, 255, 255, 0)',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_header_default_menu_body_bkg_color' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_default_menu_body_bkg_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#FFFFFF',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		/* Top, Body Header Border Color */
		// Overrides Customizer Settings
		'tm_page_header_nav_top_header_border_color' => array(
			'name'    => $thememountain_customizer_str['tm_page_header_nav_top_header_border_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => 'rgba(255,255,255,0.2)',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_header_nav_body_header_border_color' => array(
			'name'    => $thememountain_customizer_str['tm_page_header_nav_body_header_border_color'][0],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_page_header_nav_body_header_border_color',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		/** Hamburger Nav Specific */
		// Overrides Customizer Settings
		'tm_page_header_hamburger_menu_bkg_color' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_hamburger_menu_bkg_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => 'rgba(0,0,0,0)',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_header_hamberger_menu_icon_color' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_hamberger_menu_icon_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#ffffff',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_header_hamberger_menu_icon_hover_color' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_hamberger_menu_icon_hover_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#666666',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_header_hamberger_mobile_header_background_color' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_hamberger_mobile_header_background_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#FFFFFF',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		// Overrides Customizer Settings
		'tm_page_header_hamberger_mobile_header_border_color' => array(
			'name'    => $thememountain_navmenu_str['tm_page_header_hamberger_mobile_header_border_color'][0],
			'type'    => 'rgba_colorpicker',
			'default' => '#FFFFFF',
			'attributes' => array(
				'data-conditional-id' => 'tm_navigation_color_set',
				'data-conditional-value' => 'custom',
				)
			),
		/* END Custom Navigation Color */
		/* End Options for Navigation Menu of this page */
	));

/**
 * Homepage with Posts Template Options
 */
	TM_PageOptions::add_preset_option_sets('fields_recent_posts_grid', array(
		// Show Recent Post Title - Overrides Customizer Settings
		'show_recent_post_title' => array(
			'name'             => $thememountain_customizer_str['show_recent_post_title_'][0],
			'desc'             => $thememountain_customizer_str['show_recent_post_title_'][1],
			'type'             => 'checkbox',
			'default'          => '',
			),
		// Recent Post Title - Overrides Customizer Settings
		'recent_post_title' => array(
			'name'    => $thememountain_customizer_str['recent_post_title_'][0],
			'desc'	  => $thememountain_customizer_str['recent_post_title_'][1],
			'type'    => 'text',
			'default' => $thememountain_customizer_str['recent_post_title_'][2],
			'attributes' => array(
				'data-conditional-id' => 'show_recent_post_title',
				'data-conditional-value' => 'on',
				)
			),
		// Recent Post Title Alignment - Overrides Customizer Settings
		'recent_post_title_alignment' => array(
			'name'             => $thememountain_customizer_str['recent_post_title_alignment_'][0],
			'desc'             =>$thememountain_customizer_str['recent_post_title_alignment_'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'left',
			'options'          => array(
				'left'     => $thememountain_customizer_str['recent_post_title_alignment_'][2],
				'center' => $thememountain_customizer_str['recent_post_title_alignment_'][3],
				'right' => $thememountain_customizer_str['recent_post_title_alignment_'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'show_recent_post_title',
				'data-conditional-value' => 'on',
				)
			),
		// Recent Post Title Bottom Padding - Overrides Customizer Settings
		'recent_post_title_bottom_padding' => array(
			'name'             => $thememountain_customizer_str['recent_post_title_bottom_padding_'][0],
			'desc'             =>$thememountain_customizer_str['recent_post_title_bottom_padding_'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => '50',
			'options'          => array(
				'0' => 0,
				'5' => 5,
				'10' => 10,
				'20' => 20,
				'30' => 30,
				'40' => 40,
				'50' => 50,
				'60' => 60,
				'70' => 70,
				'80' => 80,
				'90' => 90,
				'100' => 100,
				'110' => 110,
				'120' => 120,
				'130' => 130,
				'140' => 140,
				'150' => 150
				),
			'attributes' => array(
				'data-conditional-id' => 'show_recent_post_title',
				'data-conditional-value' => 'on',
				)
			),
		// Overrides Customizer Settings
		'tm_loop_style' => array(
			'name'             => $thememountain_customizer_str['tm_loop_style_'][0],
			'desc'             => $thememountain_customizer_str['tm_loop_style_'][1],
			'type'             => 'select',
			'default'          => TM_Customizer::$tm_loop_style_default,
			'options'          => TM_Customizer::$tm_loop_style_choices,
			),
		// Overrides Customizer Settings
		'tm_excerpt_grid_layout_columns' => array(
			'name'             => $thememountain_customizer_str['tm_excerpt_grid_layout_columns_'][0],
			'desc'             =>$thememountain_customizer_str['tm_excerpt_grid_layout_columns_'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => '3',
			'options'          => array(
				'2' => $thememountain_customizer_str['tm_excerpt_grid_layout_columns_'][2],
				'3'   => $thememountain_customizer_str['tm_excerpt_grid_layout_columns_'][3],
				'4'     => $thememountain_customizer_str['tm_excerpt_grid_layout_columns_'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_loop_style',
				'data-conditional-value' => wp_json_encode(array('grids','creative')) )
			),
		// Overrides Customizer Settings
		'tm_loop_thumbnail_ratio' => array(
			'name'    => $thememountain_customizer_str['tm_loop_thumbnail_ratio_'][0],
			'desc'	  => $thememountain_customizer_str['tm_loop_thumbnail_ratio_'][1],
			'type'    => 'text',
			'default' => '1.5',
			'attributes' => array(
				'data-conditional-id' => 'tm_loop_style',
				'data-conditional-value' => 'creative',
				)
			),
		// Overrides Customizer Settings
		'tm_grid_layout_width' => array(
			'name'             => $thememountain_customizer_str['tm_grid_layout_width_'][0],
			'desc'             => $thememountain_customizer_str['tm_grid_layout_width_'][1],
			'type'             => 'select',
			'default'          => 'fixed_width',
			'options'          => array(
				'fixed_width'     => $thememountain_customizer_str['tm_grid_layout_width_'][2],
				'full_width' => $thememountain_customizer_str['tm_grid_layout_width_'][3],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_loop_style',
				'data-conditional-value' => wp_json_encode(array('grids','creative'))
				)
			),
		// Overrides Customizer Settings
		// Column Gutters (dropdown)
		'tm_column_gutters' => array(
			'name'             => $thememountain_customizer_str['tm_column_gutters_'][0],
			'desc'             =>$thememountain_customizer_str['tm_column_gutters_'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'large',
			'options'          => array(
				'none' => $thememountain_customizer_str['tm_column_gutters_'][2],
				'small'   => $thememountain_customizer_str['tm_column_gutters_'][3],
				'large'     => $thememountain_customizer_str['tm_column_gutters_'][4],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_loop_style',
				'data-conditional-value' => 'creative' )
			),
		// Overrides Customizer Settings
		// Thumbnail Ratio (textfield)
		'tm_loop_thumbnail_ratio' => array(
			'name'    => $thememountain_customizer_str['tm_loop_thumbnail_ratio_'][0],
			'desc'    => $thememountain_customizer_str['tm_loop_thumbnail_ratio_'][1],
			'default' => '1.5',
			'type'    => 'text',
			'attributes' => array(
				'data-conditional-id' => 'tm_loop_style',
				'data-conditional-value' => 'creative' )
			),
		// Overrides Customizer Settings
		'tm_use_sidebar' => array(
			'name'             => $thememountain_customizer_str['tm_use_sidebar_'][0],
			'desc'             =>$thememountain_customizer_str['tm_use_sidebar_'][1],
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'none',
			'options'          => array(
				'customizer'     => $thememountain_pageoption_str['tm_use_sidebar'][2],
				'right' => $thememountain_pageoption_str['tm_use_sidebar'][3],
				'left'   => $thememountain_pageoption_str['tm_use_sidebar'][4],
				'none'     => $thememountain_pageoption_str['tm_use_sidebar'][5],
				),
			'attributes' => array(
				'data-conditional-id' => 'tm_loop_style',
				'data-conditional-value' => 'wide' )
			),
		// Overrides Customizer Settings
		// Post Rollover Background Color for Wide / Grids layouts
		'tm_post_rollover_background_color_wide_grids' => array(
			'name'    => $thememountain_customizer_str['tm_post_rollover_background_color_wide_grids_'][0],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_post_rollover_background_color_wide_grids_home',
			'attributes' => array(
				'data-conditional-id' => 'tm_loop_style',
				'data-conditional-value' => wp_json_encode(array('grids','wide'))
				)
			),
		// Overrides Customizer Settings
		// Post Rollover Background Color for Creative Layout
		'tm_post_rollover_background_color_creative' => array(
			'name'    => $thememountain_customizer_str['tm_post_rollover_background_color_creative_'][0],
			'type'    => 'rgba_colorpicker',
			'default_alias' => 'tm_post_rollover_background_color_creative_home',
			'attributes' => array(
				'data-conditional-id' => 'tm_loop_style',
				'data-conditional-value' => 'creative',
				)
			),
		// tm_post_rollover_color
		// Post Rollover Color
		'tm_post_rollover_color_wide_grids_home' => array(
			'name'    => $thememountain_customizer_str['tm_post_rollover_color_wide_grids_home'][0],
			'type'    => 'rgba_colorpicker',
			'attributes' => array(
				'data-conditional-id' => 'tm_loop_style',
				'data-conditional-value' => wp_json_encode(array('grids','wide'))
				)
			),
		'tm_post_rollover_color_creative_home' => array(
			'name'    => $thememountain_customizer_str['tm_post_rollover_color_creative_home'][0],
			'type'    => 'rgba_colorpicker',
			'attributes' => array(
				'data-conditional-id' => 'tm_loop_style',
				'data-conditional-value' => 'creative',
				)
			),
		// Hide Pagination
		'tm_hide_pagination' => array(
			'name'             => $thememountain_pageoption_str['tm_hide_pagination'][0],
			'desc'             => $thememountain_pageoption_str['tm_hide_pagination'][1],
			'type'             => 'checkbox',
			'default'          => '',
			),
		'tm_post_count' => array(
			'name'    => $thememountain_pageoption_str['tm_post_count'][0],
			'desc'    => $thememountain_pageoption_str['tm_post_count'][1],
			'default' => '3',
			'type'    => 'text',
			),
	));
