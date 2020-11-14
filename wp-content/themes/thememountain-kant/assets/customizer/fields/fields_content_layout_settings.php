<?php
namespace ThemeMountain;
/**
 * Content Layout Settings
 */

/**
 * ThemeStrings - see theme files
 *
 * @var        <type>
 */
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

/**
 * Post types
 *
 * tm_folio is for the single page. Not for the tm_folio loop index.
 *
 * @var        array
 */
$thememountain_post_types = array('home','post','tm_folio','page','archive','category','search','author','404');

/** if shop is supported add shop to the post type */
if(function_exists('is_shop') === TRUE) {
	array_push($thememountain_post_types,'shop');
}

// content layout
// Global Loop Settings
TM_Customizer::tm_add_customizer_field('tm_global_loop_info_intro',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'custom',
		'section'     => 'tm_layout_home',
		'default'     => sprintf($thememountain_customizer_str['tm_global_loop_info_intro'][0],'<a href="?type=post" class="changePreview">','</a>'),
		'priority'    => 8,
		) ));

// home common settings added later
// content layout sertings / tm_layout_post
// commmon settings added later

// single post specific options.
TM_Customizer::tm_add_customizer_field('tm_show_author_bio', array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'toggle',
		'label'       => $thememountain_customizer_str['tm_show_author_bio'][0],
		'section'     => 'tm_layout_post',
		'description'  => $thememountain_customizer_str['tm_show_author_bio'][1],
		'default'     => 0,
		'priority'    => 30,
	) ));
TM_Customizer::tm_add_customizer_field('tm_post_twitter',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'toggle',
		'label'    => $thememountain_customizer_str['tm_post_twitter'][0],
		'section'  => 'tm_layout_post',
		'description' => $thememountain_customizer_str['tm_post_twitter'][1],
		'default'  => 1,
		'priority' => 31,
		) ));
TM_Customizer::tm_add_customizer_field('tm_post_facebook',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'toggle',
		'label'    => $thememountain_customizer_str['tm_post_facebook'][0],
		'section'  => 'tm_layout_post',
		'description'     => $thememountain_customizer_str['tm_post_facebook'][1],
		'default'  => 1,
		'priority' => 32,
		) ));
TM_Customizer::tm_add_customizer_field('tm_post_googleplus',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'toggle',
		'label'    => $thememountain_customizer_str['tm_post_googleplus'][0],
		'section'  => 'tm_layout_post',
		'description'     => $thememountain_customizer_str['tm_post_googleplus'][1],
		'default'  => 1,
		'priority' => 33,
		) ));
TM_Customizer::tm_add_customizer_field('tm_post_pinterest',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'toggle',
		'label'    => $thememountain_customizer_str['tm_post_pinterest'][0],
		'section'  => 'tm_layout_post',
		'description'     => $thememountain_customizer_str['tm_post_pinterest'][1],
		'default'  => 1,
		'priority' => 33,
		) ));
/**
 * Page Top Title and other messages
 *
 * tm_page_header_title_ ...
 */
// Home
TM_Customizer::tm_add_customizer_field('tm_page_header_title_home',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'text',
		'label'       => $thememountain_customizer_str['tm_page_header_title_home'][0],
		'section'     => 'tm_layout_home',
		'default'     => '',
		'priority'    => 10,
		'description'     => $thememountain_customizer_str['tm_page_header_title_home'][1],
		) ));
// 404, Not found pages
TM_Customizer::tm_add_customizer_field('tm_error_page_type',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_error_page_type'][0],
		'section'  => 'tm_layout_404',
		'description'  => $thememountain_customizer_str['tm_error_page_type'][1],
		'default'  => '',
		'priority' => 10,
		'choices'     => array(
			'' => $thememountain_customizer_str['tm_error_page_type'][2],
			'error_page' => $thememountain_customizer_str['tm_error_page_type'][3],
			),
		) ));
TM_Customizer::tm_add_customizer_field('tm_error_page_id_to_show',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_error_page_id_to_show'][0],
		'section'  => 'tm_layout_404',
		'description'  => $thememountain_customizer_str['tm_error_page_id_to_show'][1],
		'default'  => '0',
		'placeholder' => $thememountain_customizer_str['tm_error_page_id_to_show'][2],
		'priority' => 10,
		'choices'     => TM_PageOptions::get_posts_list_in_array( array( 'post_type' => 'tm_error_page' ,'posts_per_page' => -1 ) ),
		'active_callback'  => array(
			array(
				'setting'  => 'tm_error_page_type',
				'operator' => '==',
				'value'    => 'error_page',
				),
			)
		) ));
TM_Customizer::tm_add_customizer_field('tm_page_header_title_404',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'text',
		'label'       => $thememountain_customizer_str['tm_page_header_title_404'][0],
		'section'     => 'tm_layout_404',
		'default'     => '',
		'priority'    => 10,
		'description'     => $thememountain_customizer_str['tm_page_header_title_404'][1],
		'active_callback'  => array(
			array(
				'setting'  => 'tm_error_page_type',
				'operator' => '!=',
				'value'    => 'error_page',
				),
			)
		) ));
TM_Customizer::tm_add_customizer_field('tm_search_message_404',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'text',
		'label'       => $thememountain_customizer_str['tm_search_message_404'][0],
		'section'     => 'tm_layout_404',
		'default'     => '',
		'priority'    => 10,
		'description'     => $thememountain_customizer_str['tm_search_message_404'][1],
		'active_callback'  => array(
			array(
				'setting'  => 'tm_error_page_type',
				'operator' => '!=',
				'value'    => 'error_page',
				),
			)
		) ));
// Search
TM_Customizer::tm_add_customizer_field('tm_page_header_title_search',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'text',
		'label'       => $thememountain_customizer_str['tm_page_header_title_search'][0],
		'section'     => 'tm_layout_search',
		'default'     => '',
		'priority'    => 10,
		'description'     => $thememountain_customizer_str['tm_page_header_title_search'][1],
		) ));
TM_Customizer::tm_add_customizer_field('tm_search_message_search',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'text',
		'label'       => $thememountain_customizer_str['tm_search_message_search'][0],
		'section'     => 'tm_layout_search',
		'default'     => '',
		'priority'    => 10,
		'description'     => $thememountain_customizer_str['tm_search_message_search'][1],
		) ));
// Archive
TM_Customizer::tm_add_customizer_field('tm_page_header_title_archive',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'text',
		'label'       => $thememountain_customizer_str['tm_page_header_title_archive'][0],
		'section'     => 'tm_layout_archive',
		'default'     => '',
		'priority'    => 10,
		'description'     => $thememountain_customizer_str['tm_page_header_title_archive'][1],
		) ));
// Category
TM_Customizer::tm_add_customizer_field('tm_page_header_title_category',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'text',
		'label'       => $thememountain_customizer_str['tm_page_header_title_category'][0],
		'section'     => 'tm_layout_category',
		'default'     => '',
		'priority'    => 10,
		'description'     => $thememountain_customizer_str['tm_page_header_title_category'][1],
		) ));
// Author
TM_Customizer::tm_add_customizer_field('tm_page_header_title_author',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'text',
		'label'       => $thememountain_customizer_str['tm_page_header_title_author'][0],
		'section'     => 'tm_layout_author',
		'default'     => '',
		'priority'    => 10,
		'description'     => $thememountain_customizer_str['tm_page_header_title_author'][1],
		) ));
// tm_folio
TM_Customizer::tm_add_customizer_field('tm_page_header_title_tm_folio',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'text',
		'label'       => $thememountain_customizer_str['tm_page_header_title_tm_folio'][0],
		'section'     => 'tm_layout_tm_folio',
		'default'     => '',
		'priority'    => 10,
		'description'     => $thememountain_customizer_str['tm_page_header_title_tm_folio'][1],
		) ));
/**
 * Nice information with links to show an example
 */
// Search Info
TM_Customizer::tm_add_customizer_field('tm_search_loop_info_intro',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'custom',
		'section'     => 'tm_layout_search',
		'default'     => sprintf($thememountain_customizer_str['tm_search_loop_info_intro'][0],'<a href="?s=" class="changePreview">','</a>'),
		'priority'    => 8,
		) ));
// 404
TM_Customizer::tm_add_customizer_field('tm_404_info_intro',array (
	TM_ThemeStrings::$theme_id, array(
		'type'        => 'custom',
		'section'     => 'tm_layout_404',
		'default'     => sprintf($thememountain_customizer_str['tm_404_info_intro'][0],'<a href="404" class="changePreview">','</a>'),
		'priority'    => 8,
		) ));

foreach ($thememountain_post_types as $thememountain_post_type_id ) {
	if($thememountain_post_type_id === 'home') {
		// global , home settings
		TM_Customizer::tm_add_customizer_field('tm_use_custom_settings_home',array (
			TM_ThemeStrings::$theme_id, array(
				'type'     => 'toggle',
				'label'    => $thememountain_customizer_str['tm_use_custom_settings_home'][0],
				'section'  => 'tm_layout_home',
				'description'  => $thememountain_customizer_str['tm_use_custom_settings_home'][1],
				'default'  => 1,
				'priority' => 10,
				'is_advanced_toggle' => TRUE,
				) ));
	} else if (
		$thememountain_post_type_id === 'post' ||
		$thememountain_post_type_id === 'page' ||
		$thememountain_post_type_id === 'tm_folio'
	) {
		// post, page, tm_folio
		TM_Customizer::tm_add_customizer_field('tm_use_custom_settings_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'     => 'toggle',
				'label'    => $thememountain_customizer_str['tm_use_custom_settings_a'][0],
				'section'  => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['tm_use_custom_settings_a'][1],
				'default'  => 0,
				'priority' => 10,
				'is_advanced_toggle' => TRUE,
				) ));
	} else if ($thememountain_post_type_id === '404') {
		// others
		TM_Customizer::tm_add_customizer_field('tm_use_custom_settings_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'     => 'toggle',
				'label'    => $thememountain_customizer_str['tm_use_custom_settings_b'][0],
				'section'  => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['tm_use_custom_settings_b'][1],
				'default'  => 0,
				'priority' => 10,
				'is_advanced_toggle' => TRUE,
				'active_callback'  => array(
					array(
						'setting'  => 'tm_error_page_type',
						'operator' => '!==',
						'value'    => 'error_page',
					),
				),
			) ));
	} else {
		// others
		TM_Customizer::tm_add_customizer_field('tm_use_custom_settings_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'     => 'toggle',
				'label'    => $thememountain_customizer_str['tm_use_custom_settings_b'][0],
				'section'  => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['tm_use_custom_settings_b'][1],
				'default'  => 0,
				'priority' => 10,
				'is_advanced_toggle' => TRUE,
				) ));
	}

	if( in_array($thememountain_post_type_id , array('home','archive','category','author','search')) ) {
		// Recent Post Title
		TM_Customizer::tm_add_customizer_field('show_recent_post_title_'.$thememountain_post_type_id,array (
			TM_ThemeStrings::$theme_id, array(
				'type'     => 'toggle',
				'label'    => TM_ThemeStrings::$text_strings['customizer']['show_recent_post_title_'][0],
				'section'  => 'tm_layout_'.$thememountain_post_type_id,
				'default'  => 0,
				'priority' => 10,
			) ));
		TM_Customizer::tm_add_customizer_field('recent_post_title_'.$thememountain_post_type_id,array (
			TM_ThemeStrings::$theme_id, array(
				'type'     => 'text',
				'label'    => TM_ThemeStrings::$text_strings['customizer']['recent_post_title_'][0],
				'section'  => 'tm_layout_'.$thememountain_post_type_id,
				'default'  => TM_ThemeStrings::$text_strings['customizer']['recent_post_title_'][2],
				'priority' => 10,
				'active_callback'  => array(
					array(
						'setting'  => 'show_recent_post_title_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
						),
					),
			) ));
		// Recent Post Title Alignment
		TM_Customizer::tm_add_customizer_field('recent_post_title_alignment_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'         => 'select',
				'label'        => $thememountain_customizer_str['recent_post_title_alignment_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['recent_post_title_alignment_'][1],
				'default'     => 'left',
				'priority'    => 10,
				'multiple'    => 1,
				'choices'     => array(
					'left' => $thememountain_customizer_str['recent_post_title_alignment_'][2],
					'center' => $thememountain_customizer_str['recent_post_title_alignment_'][3],
					'right' => $thememountain_customizer_str['recent_post_title_alignment_'][4],
					),
				'active_callback'  => array(
					array(
						'setting'  => 'show_recent_post_title_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
						),
					),
			),
		));
		// Recent Post Title Bottom Padding
		TM_Customizer::tm_add_customizer_field('recent_post_title_bottom_padding_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'         => 'select',
				'label'        => $thememountain_customizer_str['recent_post_title_bottom_padding_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['recent_post_title_bottom_padding_'][1],
				'default'     => '50',
				'priority'    => 10,
				'multiple'    => 1,
				'choices'     => array(
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
				'active_callback'  => array(
					array(
						'setting'  => 'show_recent_post_title_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
						),
					),
			),
		));

		TM_Customizer::tm_add_customizer_field('tm_loop_style_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'         => 'select',
				'label'        => $thememountain_customizer_str['tm_loop_style_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['tm_loop_style_'][1],
				'default'     => TM_Customizer::$tm_loop_style_default,
				'priority'    => 10,
				'multiple'    => 1,
				'choices'     => TM_Customizer::$tm_loop_style_choices,
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
						),
					),
				) ));

		TM_Customizer::tm_add_customizer_field('tm_excerpt_grid_layout_columns_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'         => 'select',
				'label'        => $thememountain_customizer_str['tm_excerpt_grid_layout_columns_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['tm_excerpt_grid_layout_columns_'][1],
				'default'     => '3',
				'priority'    => 10,
				'multiple'    => 1,
				'choices'     => array(
					'2' => $thememountain_customizer_str['tm_excerpt_grid_layout_columns_'][2],
					'3'=> $thememountain_customizer_str['tm_excerpt_grid_layout_columns_'][3],
					'4' => $thememountain_customizer_str['tm_excerpt_grid_layout_columns_'][4],
					),
				'active_callback'  => array(
					array(
						'setting'  => 'tm_loop_style_'.$thememountain_post_type_id,
						'operator' => '!=',
						'value'    => 'wide'
						),
				),
			),
		));

		TM_Customizer::tm_add_customizer_field('tm_column_gutters_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'         => 'select',
				'label'        => $thememountain_customizer_str['tm_column_gutters_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['tm_column_gutters_'][1],
				'default'     => 'large',
				'priority'    => 10,
				'multiple'    => 1,
				'choices'     => array(
					'none' => $thememountain_customizer_str['tm_column_gutters_'][2],
					'small' => $thememountain_customizer_str['tm_column_gutters_'][3],
					'large' => $thememountain_customizer_str['tm_column_gutters_'][4],
					),
				'active_callback'  => array(
					array(
						'setting'  => 'tm_loop_style_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 'creative',
						),
					),
				),
			));

		TM_Customizer::tm_add_customizer_field('tm_loop_thumbnail_ratio_'.$thememountain_post_type_id,array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'text',
				'label'       => $thememountain_customizer_str['tm_loop_thumbnail_ratio_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'default'     => '1.5',
				'priority'    => 10,
				'description'     => $thememountain_customizer_str['tm_loop_thumbnail_ratio_'][1],
				'active_callback'  => array(
					array(
						'setting'  => 'tm_loop_style_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 'creative', // for sartre only
					),
				),
			) ));

		TM_Customizer::tm_add_customizer_field('tm_grid_layout_width_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'         => 'select',
				'label'        => $thememountain_customizer_str['tm_grid_layout_width_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['tm_grid_layout_width_'][1],
				'default'     => 'fixed_width',
				'priority'    => 10,
				'multiple'    => 1,
				'choices'     => array(
					'fixed_width' => $thememountain_customizer_str['tm_grid_layout_width_'][2],
					'full_width' => $thememountain_customizer_str['tm_grid_layout_width_'][3],
					),
				'active_callback'  => array(
					array(
						'setting'  => 'tm_loop_style_'.$thememountain_post_type_id,
						'operator' => '!=',
						'value'    => 'wide',
						),
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
						),
					),
				) ));

		// Grid Box Background Color (colorpicker)
		TM_Customizer::tm_add_customizer_field('tm_grid_layout_box_article_background_color_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_grid_layout_box_article_background_color_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_grid_layout_box_article_background_color_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 10,
				'css_selector'	 => '.blog-creative .content-outer,.blog-regular .with-background,.blog-masonry .with-background',
				'css' => 'background-color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));

		// Grid Box Article Color (colorpicker)
		TM_Customizer::tm_add_customizer_field('tm_grid_layout_box_article_color_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_grid_layout_box_article_color_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_grid_layout_box_article_color_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 10,
				'css_selector'	 => '.blog-creative .content-outer,.blog-regular .with-background,.blog-masonry .with-background',
				'css' => 'color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));

		/**
		 * Grid Box Article Title Color (colorpicker)
		 */
		TM_Customizer::tm_add_customizer_field('tm_grid_layout_box_article_title_color_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_grid_layout_box_article_title_color_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_grid_layout_box_article_title_color_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 10,
				'css_selector'	 => '.blog-creative .content-outer .post-title a,.blog-regular .with-background .post-title a,.blog-masonry .with-background .post-title a',
				'css' => 'color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));

		/**
		 * Grid Box Article title Hover Color (colorpicker)
		 */
		TM_Customizer::tm_add_customizer_field('tm_grid_layout_box_article_title_color_hover_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_grid_layout_box_article_title_color_hover_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_grid_layout_box_article_title_color_hover_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 10,
				'css_selector'	 => '.blog-creative .content-outer .post-title a:hover,.blog-regular .with-background .post-title a:hover,.blog-masonry .with-background .post-title a:hover',
				'css' => 'color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));

		/**
		 * Grid Box Article link Color (colorpicker)
		 */
		TM_Customizer::tm_add_customizer_field('tm_grid_layout_box_article_link_color_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_grid_layout_box_article_link_color_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_grid_layout_box_article_link_color_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 10,
				'css_selector'	 => '.blog-creative .content-outer .post-info,.blog-regular .with-background .post-info,.blog-masonry .with-background .post-info,.blog-regular .with-background .post-info a,.blog-masonry .with-background .post-info a,.blog-regular .with-background .post-info .read-more,.blog-masonry .with-background .post-info  .read-more',
				'css' => 'color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));

		/**
		 * Grid Box Article link Hover Color (colorpicker)
		 */
		TM_Customizer::tm_add_customizer_field('tm_grid_layout_box_article_link_color_hover_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_grid_layout_box_article_link_color_hover_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_grid_layout_box_article_link_color_hover_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 10,
				'css_selector'	 => '.blog-regular .with-background .post-info a:hover,.blog-masonry .with-background .post-info a:hover,.blog-regular .with-background .post-info .read-more:hover,.blog-masonry .with-background .post-info  .read-more:hover',
				'css' => 'color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));

		/**
		 * Article Post Meta Color (colorpicker) (#226)
		 */
		TM_Customizer::tm_add_customizer_field('tm_grid_layout_box_article_post_meta_color_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_grid_layout_box_article_post_meta_color_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_grid_layout_box_article_post_meta_color_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 10,
				'css_selector'	 => '.post .post-info,.post .post-info-aside .post-date',
				'css' => 'color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));
	}

	/**
	 * Sidebar
	 *
	 * For all execept for tm_folio / page (pages without the sidebar) and 404
	 */
	if( !in_array($thememountain_post_type_id , array('tm_folio','page','404')) ) {
		TM_Customizer::tm_add_customizer_field('tm_use_sidebar_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'         => 'select',
				'label'        => $thememountain_customizer_str['tm_use_sidebar_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['tm_use_sidebar_'][1],
				'default'     => ( $thememountain_post_type_id !== 'post') ? 'none' : 'right',
				'priority'    => 10,
				'multiple'    => 1,
				'choices'     => array(
					'none' => $thememountain_customizer_str['tm_use_sidebar_'][2],
					'right' => $thememountain_customizer_str['tm_use_sidebar_'][3],
					'left' => $thememountain_customizer_str['tm_use_sidebar_'][4],
					),
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
						),
					),
					array(
						'setting'  => 'tm_loop_style_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 'wide',
						),
				),
			));
	}

	/**
	 * For all the loop indices
	 */
	if( !in_array($thememountain_post_type_id , array('tm_folio','page','post','shop','404')) ) {
		// Post Rollover Background Color (colorpicker)
		TM_Customizer::tm_add_customizer_field('tm_post_rollover_background_color_wide_grids_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_post_rollover_background_color_wide_grids_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_post_rollover_background_color_wide_grids_home',
				'priority'    => 10,
				'do_custom_enqueue' => TRUE,
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
					array(
						'setting'  => 'tm_loop_style_'.$thememountain_post_type_id,
						'operator' => '!=',
						'value'    => 'creative'
					),
				),
			) ));

		// Post Rollover Background Color (colorpicker)
		TM_Customizer::tm_add_customizer_field('tm_post_rollover_background_color_creative_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_post_rollover_background_color_creative_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_post_rollover_background_color_creative_home',
				'priority'    => 10,
				'do_custom_enqueue' => TRUE,
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
					array(
						'setting'  => 'tm_loop_style_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 'creative'
					),
				),
			) ));

	}

	// Post Rollover Color (colorpicker) only for home. Set as inline.
	if($thememountain_post_type_id === 'home' && TM_ThemeServices::get_current_theme_style_id() !== 'marquez'){
		TM_Customizer::tm_add_customizer_field('tm_post_rollover_color_wide_grids_home', array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_post_rollover_color_wide_grids_home'][0],
				'section'     => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['tm_post_rollover_color_wide_grids_home'][1],
				'default'     => '#000',
				'priority'    => 10,
				'do_custom_enqueue' => TRUE,
				'css_selector'	 => '.blog-regular .overlay-info > span > span,.blog-regular .overlay-info > span > span > *,.blog-masonry .overlay-info > span > span,.blog-masonry .overlay-info > span > span > *',
				'css' => 'color: %s !important;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
					array(
						'setting'  => 'tm_loop_style_'.$thememountain_post_type_id,
						'operator' => '!=',
						'value'    => 'creative'
					),
				),
			) ));
		TM_Customizer::tm_add_customizer_field('tm_post_rollover_color_creative_home', array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_post_rollover_color_creative_home'][0],
				'section'     => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['tm_post_rollover_color_creative_home'][1],
				'default'     => '#FFF',
				'priority'    => 10,
				'do_custom_enqueue' => TRUE,
				'css_selector'	 => '.blog-masonry.masonry-set-dimensions .overlay-info > span > span, .blog-masonry.masonry-set-dimensions .overlay-info > span > span > *',
				'css' => 'color: %s !important;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
					array(
						'setting'  => 'tm_loop_style_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 'creative'
					),
				),
			) ));
	}

	// tm_use_masthead_title
	if($thememountain_post_type_id === '404'){
		TM_Customizer::tm_add_customizer_field('tm_use_masthead_title_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'toggle',
				'label'       => $thememountain_customizer_str['tm_use_masthead_title_'][0],
				'section'     => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['tm_use_masthead_title_'][1],
				'default'     => '1',
				'priority'    => 10,
				'active_callback'  => array(
					array(
						'setting'  => 'tm_error_page_type',
						'operator' => '==',
						'value'    => '',
					),
					array(
						'setting'  => 'tm_use_custom_settings_404',
						'operator' => '==',
						'value'    => 1,
						),
					),
				) ));
		/**
		 * Page Head Background Title Color for 404
		 *
		 * These two settings items are set for default of tm_page_head_title_background_color_* as well as tm_page_head_title_font_color_* And Is Not output through enqueueInlineCustomizerCss in ThemeMountain-TM_StyleAndScripts.php
		 *
		 * @since 1.0
		 * @see       TM_TemplateServices::set_current_template_data() The value is used and set in this method.
		 * @see       TM_TemplateServices::preprocess_custom_options_for_header() Output handled
		 */

		TM_Customizer::tm_add_customizer_field('tm_page_head_title_background_color_404',array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_page_head_title_background_color_'][0],
				'section'     => 'tm_layout_404',
				'priority'    => 10,
				'customizer_default_slug' => 'tm_page_head_title_background_color_home',
				'do_custom_enqueue' =>	TRUE,
				'active_callback'  => array(
					array(
						'setting'  => 'tm_error_page_type',
						'operator' => '==',
						'value'    => '',
					),
					array(
						'setting'  => 'tm_use_custom_settings_404',
						'operator' => '==',
						'value'    => 1,
						),
					array(
						'setting'  => 'tm_use_masthead_title_404',
						'operator' => '==',
						'value'    => '1',
						),
					),
				)
			));
		TM_Customizer::tm_add_customizer_field('tm_page_head_title_font_color_404', array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_page_head_title_font_color_'][0],
				'section'     => 'tm_layout_404',
				'priority'    => 10,
				'customizer_default_slug' => 'tm_page_head_title_font_color_home',
				'do_custom_enqueue' => TRUE,
				'active_callback'  => array(
					array(
						'setting'  => 'tm_error_page_type',
						'operator' => '==',
						'value'    => '',
					),
					array(
						'setting'  => 'tm_use_custom_settings_404',
						'operator' => '==',
						'value'    => 1,
						),
					array(
						'setting'  => 'tm_use_masthead_title_404',
						'operator' => '==',
						'value'    => '1',
						),
					),
				)
			));

		// Image
		TM_Customizer::tm_add_customizer_field('tm_page_head_title_background_image_404',array (
			TM_ThemeStrings::$theme_id, array(
				'type'     => 'image',
				'label'    => $thememountain_customizer_str['tm_page_head_title_background_image_'][0],
				'section'  => 'tm_layout_404',
				'description'  => $thememountain_customizer_str['tm_page_head_title_background_image_'][1],
				'default'  => '',
				'priority' => 11,
				'active_callback'  => array(
					array(
						'setting'  => 'tm_error_page_type',
						'operator' => '==',
						'value'    => '',
					),
					array(
						'setting'  => 'tm_use_custom_settings_404',
						'operator' => '==',
						'value'    => 1,
						),
					array(
						'setting'  => 'tm_use_masthead_title_404',
						'operator' => '==',
						'value'    => '1',
						),
					),
				),
			));

		TM_Customizer::tm_add_customizer_field('tm_page_head_title_overlay_background_color_404',array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_customizer_str['tm_page_head_title_overlay_background_color_'][0],
			'section'     => 'tm_layout_404',
			'default'     => 'rgba(0,0,0,0.5)',
			'do_custom_enqueue' => TRUE,
			'priority'    => 11,
			'active_callback'  => array(
					array(
						'setting'  => 'tm_error_page_type',
						'operator' => '==',
						'value'    => '',
					),
					array(
						'setting'  => 'tm_use_custom_settings_404',
						'operator' => '==',
						'value'    => 1,
						),
					array(
						'setting'  => 'tm_use_masthead_title_404',
						'operator' => '==',
						'value'    => '1',
						),
					),
				),
			));
	} else {
		TM_Customizer::tm_add_customizer_field('tm_use_masthead_title_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'toggle',
				'label'       => $thememountain_customizer_str['tm_use_masthead_title_'][0],
				'section'     => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['tm_use_masthead_title_'][1],
				'default'     => '1',
				'priority'    => 10,
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));
		/**
		 * Page Head Background Title Color
		 *
		 * These two settings items are set for default of tm_page_head_title_background_color_* as well as tm_page_head_title_font_color_* And Is Not output through enqueueInlineCustomizerCss in ThemeMountain-TM_StyleAndScripts.php
		 *
		 * @since 1.0
		 * @see       TM_TemplateServices::set_current_template_data() The value is used and set in this method.
		 * @see       TM_TemplateServices::preprocess_custom_options_for_header() Output handled
		 */

		TM_Customizer::tm_add_customizer_field('tm_page_head_title_background_color_'.$thememountain_post_type_id,array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_page_head_title_background_color_'][0],
				'section'     => 'tm_layout_'.$thememountain_post_type_id,
				'priority'    => 10,
				'customizer_default_slug' => 'tm_page_head_title_background_color_home',
				'do_custom_enqueue' =>	TRUE,
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
						),
					array(
						'setting'  => 'tm_use_masthead_title_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => '1',
						),
					),
				)
			));
		TM_Customizer::tm_add_customizer_field('tm_page_head_title_font_color_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_page_head_title_font_color_'][0],
				'section'     => 'tm_layout_'.$thememountain_post_type_id,
				'priority'    => 10,
				'customizer_default_slug' => 'tm_page_head_title_font_color_home',
				'do_custom_enqueue' => TRUE,
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
						),
					array(
						'setting'  => 'tm_use_masthead_title_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => '1',
						),
					),
				)
			));

		// Image
		TM_Customizer::tm_add_customizer_field('tm_page_head_title_background_image_'.$thememountain_post_type_id,array (
			TM_ThemeStrings::$theme_id, array(
				'type'     => 'image',
				'label'    => $thememountain_customizer_str['tm_page_head_title_background_image_'][0],
				'section'  => 'tm_layout_'.$thememountain_post_type_id,
				'description'  => $thememountain_customizer_str['tm_page_head_title_background_image_'][1],
				'default'  => '',
				'priority' => 11,
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
						),
					array(
						'setting'  => 'tm_use_masthead_title_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => '1',
						),
					),
				),
			));

		TM_Customizer::tm_add_customizer_field('tm_page_head_title_overlay_background_color_'.$thememountain_post_type_id,array (
		TM_ThemeStrings::$theme_id, array(
			'type'        => 'color-alpha',
			'label'       => $thememountain_customizer_str['tm_page_head_title_overlay_background_color_'][0],
			'section'     => 'tm_layout_'.$thememountain_post_type_id,
			'default'     => 'rgba(0,0,0,0.5)',
			'do_custom_enqueue' => TRUE,
			'priority'    => 11,
					'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
						),
					array(
						'setting'  => 'tm_use_masthead_title_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => '1',
						),
					),
				),
			));
	}

	/** Pagination Option */
	if( !in_array($thememountain_post_type_id , array('page','404')) ) {
		// Link Background Color (colorpicker)
		TM_Customizer::tm_add_customizer_field('tm_pagination_background_color_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_pagination_background_color_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_pagination_background_color_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 20,
				'css_selector'	 => '.pagination-3 .pagination-previous, .pagination-3 .pagination-next, .pagination-3 a, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span',
				'css' => 'background-color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));
		// Link Background Hover Color (colorpicker)
		TM_Customizer::tm_add_customizer_field('tm_pagination_background_color_hover_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_pagination_background_color_hover_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_pagination_background_color_hover_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 20,
				'css_selector'	 => '.pagination-3 a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover',
				'css' => 'background-color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));
		// Link Active Background Color (colorpicker)
		TM_Customizer::tm_add_customizer_field('tm_pagination_background_color_active_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_pagination_background_color_active_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_pagination_background_color_active_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 20,
				'css_selector'	 => '.pagination-3 a.active, .woocommerce nav.woocommerce-pagination ul li span.current',
				'css' => 'background-color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));
		// LInk Border Color (colorpicker)
		TM_Customizer::tm_add_customizer_field('tm_pagination_border_color_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_pagination_border_color_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_pagination_border_color_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 20,
				'css_selector'	 => '.pagination-3 ul,.pagination-3 .pagination-previous,.pagination-3 .pagination-next,.pagination-3 a, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span',
				'css' => 'border-color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));
		// Link Border Hover Color (colorpicker)
		TM_Customizer::tm_add_customizer_field('tm_pagination_border_color_hover_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_pagination_border_color_hover_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_pagination_border_color_hover_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 20,
				'css_selector'	 => '.pagination-3 a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover',
				'css' => 'border-color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));
		// Link Active Border Color (colorpicker
		TM_Customizer::tm_add_customizer_field('tm_pagination_border_color_active_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_pagination_border_color_active_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_pagination_border_color_active_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 20,
				'css_selector'	 => '.pagination-3 a.active, .woocommerce nav.woocommerce-pagination ul li span.current',
				'css' => 'border-color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));
		// Link Color (colorpicker)
		TM_Customizer::tm_add_customizer_field('tm_pagination_link_color_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_pagination_link_color_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_pagination_link_color_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 20,
				'css_selector'	 => '.pagination-3 .pagination-previous,.pagination-3 .pagination-next,.pagination-3 a, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span',
				'css' => 'color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));
		// Link Hover Color (colorpicker)
		TM_Customizer::tm_add_customizer_field('tm_pagination_link_color_hover_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_pagination_link_color_hover_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_pagination_link_color_hover_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 20,
				'css_selector'	 => '.pagination-3 a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover',
				'css' => 'color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));
		// Link Active Color (colorpicker)
		TM_Customizer::tm_add_customizer_field('tm_pagination_link_color_active_'.$thememountain_post_type_id, array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_customizer_str['tm_pagination_link_color_active_'][0],
				'section'      => 'tm_layout_'.$thememountain_post_type_id,
				'customizer_default_slug' => 'tm_pagination_link_color_active_home',
				'do_custom_enqueue' => TRUE,
				'priority'    => 20,
				'css_selector'	 => '.pagination-3 a.active, .woocommerce nav.woocommerce-pagination ul li span.current',
				'css' => 'color: %s;',
				'active_callback'  => array(
					array(
						'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
						'operator' => '==',
						'value'    => 1,
					),
				),
			) ));
		if( $thememountain_post_type_id !== 'shop' ) {
			// Return to Index (dropdown)
			TM_Customizer::tm_add_customizer_field('tm_pagination_return_to_index_'.$thememountain_post_type_id, array (
				TM_ThemeStrings::$theme_id, array(
					'type'         => 'select',
					'label'        => $thememountain_customizer_str['tm_pagination_return_to_index_'][0],
					'section'      => 'tm_layout_'.$thememountain_post_type_id,
					'description'  => $thememountain_customizer_str['tm_pagination_return_to_index_'][1],
					'default'     => 'label',
					'priority'    => 20,
					'multiple'    => 1,
					'choices'     => array(
						'none' => $thememountain_customizer_str['tm_pagination_return_to_index_'][2],
						'label' => $thememountain_customizer_str['tm_pagination_return_to_index_'][3],
						'icon' => $thememountain_customizer_str['tm_pagination_return_to_index_'][4],
						),
					'active_callback'  => array(
						array(
							'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
							'operator' => '==',
							'value'    => 1,
						),
					),
				) ));
			// Return to Index Label(textfield)
			if(in_array($thememountain_post_type_id , array('tm_folio'))) {
				$thememountain_pagination_return_to_index_label_default = $thememountain_customizer_str['tm_pagination_return_to_index_label_tm_folio'];
			} else {
				$thememountain_pagination_return_to_index_label_default = $thememountain_customizer_str['tm_pagination_return_to_index_label_home'];
			}
			TM_Customizer::tm_add_customizer_field('tm_pagination_return_to_index_label_'.$thememountain_post_type_id, array (
				TM_ThemeStrings::$theme_id, array(
					'type'     => 'text',
					'label'    => TM_ThemeStrings::$text_strings['customizer']['tm_pagination_return_to_index_label_'][0],
					'section' => 'tm_layout_'.$thememountain_post_type_id,
					'default' => $thememountain_pagination_return_to_index_label_default,
					'priority' => 20,
					// 'transport' => 'postMessage',
					'active_callback'  => array(
						array(
							'setting'  => 'tm_use_custom_settings_'.$thememountain_post_type_id,
							'operator' => '==',
							'value'    => 1,
						),
						array(
							'setting'  => 'tm_pagination_return_to_index_'.$thememountain_post_type_id,
							'operator' => '==',
							'value'    => 'label',
						),
					),
				) ));
		}
	}

} // end loop for index pages
