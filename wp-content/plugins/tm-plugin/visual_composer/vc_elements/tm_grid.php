<?php
use ThemeMountain\TM_Vc as TM_Vc;
/**
 * ThemeMountain Accordion VC Element Map
 */
if (class_exists( 'Vc_Manager' )) {
	vc_map( array(
		'name' => esc_html__( 'Grid', 'thememountain-plugin' ),
		'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
		'base' => 'tm_grid',
		'icon' => 'tm_vc_icon_folio_grid',
		'is_container' => false,
		'show_settings_on_create' => true,
		'description' => '',
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Grid Preloading', 'thememountain-plugin' ),
				'param_name' => 'grid_preloading',
				'value' => array(
					esc_html__( 'Preload all', 'thememountain-plugin' ) => 'preload_all',
					esc_html__( 'Lazyload on scroll', 'thememountain-plugin' ) => 'lazyload_on_scroll',
					esc_html__( 'Infinite scroll', 'thememountain-plugin' ) => 'infinite_scroll',
					esc_html__( 'Infinite scroll with load more button', 'thememountain-plugin' ) => 'infinite_scroll_with_load_button',
				),
				'std' => 'preload_all',
				'description' => esc_html__( 'Force all the grid item to use the target for their links as set here.', 'thememountain-plugin' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Grid Items To Initially Load', 'thememountain-plugin' ),
				'param_name' => 'grid_items_to_initially_load',
				'value' => '10',
				'description' => esc_html__( 'Determines the number of grid items to initially load so that the grid is not blank at first load. Once the user scrolls past the first intially loaded items, new items will be lazyloaded and shown.', 'thememountain-plugin' ),
				'dependency' => array('element' => 'grid_preloading','value'=>array('lazyload_on_scroll','infinite_scroll','infinite_scroll_with_load_button')),
				),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Filter Menu', 'thememountain-plugin' ),
				'param_name' => 'show_filter_menu',
				'value' => array( esc_html__( 'Show Filter Menu', 'thememountain-plugin' ) => 'true' ),
				'std' => 'true',
				'description' => esc_html__( 'Determines whether the grid should have an accompanying filter menu.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Show Project Title & Description', 'thememountain-plugin' ),
				'param_name' => 'show_project_title_and_description',
				'value' => array(
					esc_html__( 'Hide', 'thememountain-plugin' ) => 'false',
					esc_html__( 'Show', 'thememountain-plugin' ) => 'true',
					),
				'std' => 'false',
				'save_always' => true,
				'description' => esc_html__( 'Determines whether the project title and description should be shown below the grid item thumbnail.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grid Items', 'thememountain-plugin' ),
				'param_name' => 'grid_items',
				'value' => 'size:10|order_by:date',
				'settings' => array(
					'size' => array(
						'hidden' => false,
						'value' => 10,
						),
					'order_by' => array( 'value' => 'date' ),
					),
				'description' => esc_html__( 'This is where you associate projects with the grid.', 'thememountain-plugin' ),
				),
			/** an option for grid_items */
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Force Grid Items Link Targets', 'thememountain-plugin' ),
				'param_name' => 'force_grid_item_link_targets',
				'value' => array(
					esc_html__( 'Off', 'thememountain-plugin' ) => '',
					esc_html__( 'Blank in a new tab or window', 'thememountain-plugin' ) => '_blank',
					esc_html__( 'Same window or context', 'thememountain-plugin' ) => '_self',
					esc_html__( 'Parent browsing context of the current one', 'thememountain-plugin' ) => '_parent',
					esc_html__( 'Top-level browsing context', 'thememountain-plugin' ) => '_top',
				),
				'std' => '',
				'description' => esc_html__( 'Force all the grid item to use the target for their links as set here.', 'thememountain-plugin' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Width', 'thememountain-plugin' ),
				'param_name' => 'width',
				'value' => array(
					esc_html__( 'Fixed Width', 'thememountain-plugin' ) => 'fixed_width',
					esc_html__( 'Full Width', 'thememountain-plugin' ) => 'full_width',
					),
				'std' => 'fixed_width',
				'description' => esc_html__( 'Determines whether the grid should span full content width or full browser width.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Layout Mode', 'thememountain-plugin' ),
				'param_name' => 'layout_mode',
				'value' => array(
					esc_html__( 'Masonry', 'thememountain-plugin' ) => 'masonry',
					esc_html__( 'Fit Rows', 'thememountain-plugin' ) => 'fitRows',
					),
				'std' => 'masonry',
				'description' => esc_html__( 'Determines the layout mode, either Fit Rows or Masonry.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'checkbox',
				'param_name' => 'fixed_thumb_dimensions',
				'heading' => esc_html__( 'Fixed thumbnail dimensions', 'thememountain-plugin' ),
				'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
				'std' => '',
				// 'dependency' => array('element' => 'show_project_title_and_description','value'=>array('do_not_show','show_in_rollover')),
				'description' => esc_html__( 'Determines whether the grid items should receive a calculated with/height. IMPORTANT: This is necessary if you want to use a masonry grid with different sized tiles and rollovers.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'checkbox',
				'param_name' => 'set_as_background_images',
				'heading' => esc_html__( 'Set as background images', 'thememountain-plugin' ),
				'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
				'std' => '',
				'dependency' => array('element' => 'fixed_thumb_dimensions','value'=>'true'),
				'description' => esc_html__( 'Sets grid images as background images of grid items. Using this option means that your image will scale to its container. Note that cropping will occur.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail Ratio', 'thememountain-plugin' ),
				'param_name' => 'thumb_ratio',
				'value' => '1.5',
				'description' => esc_html__( 'The ratio used for calculating grid item with and height. Changing the ratio will change the height of the masonry grid items.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Column Number', 'thememountain-plugin' ),
				'param_name' => 'column_number',
				'value' => array(
					esc_html__('2 Columns', 'thememountain-plugin' ) => '2',
					esc_html__('3 Columns', 'thememountain-plugin' ) => '3',
					esc_html__('4 Columns', 'thememountain-plugin' ) => '4',
					esc_html__('5 Columns', 'thememountain-plugin' ) => '5',
					esc_html__('6 Columns', 'thememountain-plugin' ) => '6',
					),
				'std' => '3',
				'description' => esc_html__( 'Determines the number of columns that grid should have, either 2, 3, 4, 5 or 6 columns.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Column Gutters', 'thememountain-plugin' ),
				'param_name' => 'column_gutters',
				'value' => array(
					esc_html__('None', 'thememountain-plugin' ) => 'none',
					esc_html__('Small', 'thememountain-plugin' ) => 'small',
					esc_html__('Large', 'thememountain-plugin' ) => 'large',
					),
				'std' => 'large',
				'description' => esc_html__( 'Determines the gutter size of the grid, either no gutters, small gutters or larger gutters.', 'thememountain-plugin' ),
				),
			// extra
			// array(
			// 	'type' => 'textfield',
			// 	'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			// 	'param_name' => 'el_id',
			// 	),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
				'param_name' => 'el_class',
				'description'=> esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' )
				),
			// Grid Menu
			array(
				'group' => esc_html__( 'Grid Menu', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Grid Menu Alignment', 'thememountain-plugin' ),
				'param_name' => 'alignment',
				'value' => array(
					esc_html__('Left', 'thememountain-plugin' ) => 'left',
					esc_html__('Center', 'thememountain-plugin' ) => 'center',
					esc_html__('Right', 'thememountain-plugin' ) => 'right',
					),
				'std' => 'left',
				'description' => esc_html__( 'Determines the filter menu alignement either left, center or right aligned.', 'thememountain-plugin' ),
				),
			array(
				'group' => esc_html__( 'Grid Menu', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Link Color', 'thememountain-plugin' ),
				'param_name' => 'link_color',
				'std' => '#666',
				),
			array(
				'group' => esc_html__( 'Grid Menu', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Link Hover Color', 'thememountain-plugin' ),
				'param_name' => 'link_color_hover',
				'std' => '#000',
				),
			array(
				'group' => esc_html__( 'Grid Menu', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Link Active Color', 'thememountain-plugin' ),
				'param_name' => 'link_color_active',
				'std' => '',
				),
			array(
				'group' => esc_html__( 'Grid Menu', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Link Border Active Color', 'thememountain-plugin' ),
				'param_name' => 'link_border_color_active',
				'std' => '#232323',
				),
			// tm_grid filter menu options need updating #1002
			// Use Link Background Color(dropdown)
			array(
				'group' => esc_html__( 'Grid Menu', 'thememountain-plugin' ),
				'type' => 'checkbox',
				'heading' => esc_html__( 'Use Grid Menu Link Background Color', 'thememountain-plugin' ),
				'param_name' => 'use_gridmenu_link_background_color',
				'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
				'std' => '',
				'description' => '',
				),

			// Link Background Color(colorpicker)
			array(
				'group' => esc_html__( 'Grid Menu', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Link Background Color', 'thememountain-plugin' ),
				'param_name' => 'gridmenu_link_background_color',
				'std' => 'rgba(255,255,255,0)',
				'dependency' => array('element' => 'use_gridmenu_link_background_color','value'=>'true'),
				),
			// Link Hover Background Color(colorpicker)
			array(
				'group' => esc_html__( 'Grid Menu', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Link Hover Background Color', 'thememountain-plugin' ),
				'param_name' => 'gridmenu_link_background_color_hover',
				'std' => 'rgba(255,255,255,0)',
				'dependency' => array('element' => 'use_gridmenu_link_background_color','value'=>'true'),
				),
			// Link Active Background Color(colorpicker)
			array(
				'group' => esc_html__( 'Grid Menu', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Link Active Background Color', 'thememountain-plugin' ),
				'param_name' => 'gridmenu_link_background_color_active',
				'std' => '#ddd',
				'dependency' => array('element' => 'use_gridmenu_link_background_color','value'=>'true'),
				),
			// Border Style(dropdown)
			array(
				'group' => esc_html__( 'Grid Menu', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Grid Menu Border Style', 'thememountain-plugin' ),
				'param_name' => 'gridmenu_border_style',
				'value' => array(
					esc_html__('None', 'thememountain-plugin' ) => '',
					esc_html__('Rounded', 'thememountain-plugin' ) => 'rounded',
					esc_html__('Pill', 'thememountain-plugin' ) => 'pill',
					),
				'std' => '',
				'dependency' => array('element' => 'use_gridmenu_link_background_color','value'=>'true'),
				'description' =>'',
				),
			// end #1002
			// 'group' => esc_html__( 'Rollover Options', 'thememountain-plugin' ),
			array(
				'group' => esc_html__( 'Rollover Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Caption Vertical Alignment', 'thememountain-plugin' ),
				'param_name' => 'caption_vertical_alignment',
				'value' => array(
					esc_html__('Top', 'thememountain-plugin' ) => 'v-align-top',
					esc_html__('Middle', 'thememountain-plugin' ) => 'v-align-middle',
					esc_html__('Bottom', 'thememountain-plugin' ) => 'v-align-bottom',
					),
				'std' => 'v-align-middle',
				'description' => esc_html__( 'Whether caption should be vertically aligned top, middle or bottom. This only takes effect if you are using an overlayed or rollover caption.', 'thememountain-plugin' ),
				),
			array(
				'group' => esc_html__( 'Rollover Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Caption Horizontal Alignment', 'thememountain-plugin' ),
				'param_name' => 'caption_horizontal_alignment',
				'value' => array(
					esc_html__('Left', 'thememountain-plugin' ) => 'left',
					esc_html__('Center', 'thememountain-plugin' ) => 'center',
					esc_html__('Right', 'thememountain-plugin' ) => 'right',
					),
				'std' => 'center',
				'description' => esc_html__( 'Whether the caption should be left, center or right aligned. This takes effect for all caption types.', 'thememountain-plugin' ),
				),
			// rollover
			// color
			array(
				'group' => 'Rollover Options',
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Rollover Background Color', 'thememountain-plugin' ),
				'param_name' => 'rollover_bkg_color',
				'std' => 'rgba(255,255,255,0.9)',
				),
			array(
				'group' => esc_html__( 'Rollover Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Project Title Color', 'thememountain-plugin' ),
				'param_name' => 'project_title_color',
				'std' => '#232323',
				),
			array(
				'group' => esc_html__( 'Rollover Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Project Description Color', 'thememountain-plugin' ),
				'param_name' => 'project_description_color',
				'std' => '#666',
				),
			// animation
			array(
				'group' => 'Animation',
				'type' => 'textfield',
				'heading' => esc_html__( 'Filter Duration', 'thememountain-plugin' ),
				'param_name' => 'filter_duration',
				'value' => '700',
				'description' => esc_html__( 'Determines how long the filter animation should be. Expressed in milliseconds i.e. 1000 represents 1 second.', 'thememountain-plugin' ),
				),
			array(
				'group' => 'Animation',
				'type' => 'textfield',
				'heading' => esc_html__( 'Resize Duration', 'thememountain-plugin' ),
				'param_name' => 'resize_duration',
				'value' => '700',
				'description' => esc_html__( 'Determines how long the resize animation should be. Expressed in milliseconds i.e. 1000 represents 1 second.', 'thememountain-plugin' ),
				),
			array(
				'group' => 'Animation',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Rollover Animation Type', 'thememountain-plugin' ),
				'param_name' => 'rollover_animation',
				'value' => ThemeMountain\TM_Vc::$vc_elements_variable['rollover_animation'],
				'std' => '',
				'description' => '',
				),
			array(
				'group' => 'Animation',
				'type' => 'textfield',
				'heading' => esc_html__( 'Rollover Animation Duration', 'thememountain-plugin' ),
				'param_name' => 'rollover_animation_duration',
				'value' => '700',
				'description' => esc_html__( 'Determines how long the rollover animation should be. Expressed in milliseconds i.e. 1000 represents 1 second.', 'thememountain-plugin' ),
				),
			array(
				'group' => 'Animation',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Rollover Easing Type', 'thememountain-plugin' ),
				'param_name' => 'rollover_easing',
				'value' => ThemeMountain\TM_Vc::$vc_elements_variable['easing'],
				'std' => 'swing',
				'description' => esc_html__( 'Determines the rollover animation easing type.', 'thememountain-plugin' ),
				),
		),
	) );
}

class WPBakeryShortCode_tm_grid extends WPBakeryShortCode {
}