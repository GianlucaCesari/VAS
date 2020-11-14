<?php
use ThemeMountain\TM_Shortcodes as TM_Shortcodes;

$_style = $_output = $_grid_nav_html = $_grid_nav_inner_html = $_gridMenu = $_grid_content_html = $_grid_preloaded_content_html = $_the_query = $_post_type_original = $_post_type_matches = $_current_post_permalink = $_current_post_title = $_current_post_categories_string = $_current_post_thumbnail_html = $_current_post_info = $_grid_sizer = $_full_width_class = $_css_id = $_rollOver_data_attributes = $_by_id = $rollover_animation_class = $_gridmenu_classes = $_button_nav = $_grid_preloading_attributes = $_hide_preload_content = '';
$_item_categories = $_current_post_categories = array();
$_grid_preloading_counter = NULL;
$_is_to_be_preloaded = FALSE;

extract(shortcode_atts(array(
	'grid_preloading' => 'preload_all',
	'grid_items_to_initially_load' => '10',
	'show_filter_menu' => 'true',
	'show_project_title_and_description' => 'true',
	'grid_items' => '', // loop.
	'force_grid_item_link_targets' => '',
	'width' => 'fixed_width', // dropdown. fixed_width, full_width
	'layout_mode' => 'masonry', // dropdown. masonry, fitRows
	'fixed_thumb_dimensions' => '', // checkbox
	'set_as_background_images' => '', // checkbox
	'thumb_ratio' => '1.5', // textfield.
	'filter_duration' => '700', // textfield.
	'resize_duration' => '700', // textfield
	'column_number' => '3', // dropdown. 2, 3, 4, 5, 6
	'column_gutters' => 'large', // dropdown none, small, large
	'el_id' => '', //
	'el_class' => '', //
	// design option
	'project_title_color' => '#232323',
	'project_description_color' => '#666',
	// grid menu
	'alignment' => 'left', // dropdown. left, center, right
	'link_color' => '#666', // Link Color colorpicker.
	'link_color_hover' => '#000', // colorpicker
	'link_color_active' => '', // colorpicker
	'link_border_color_active' => '#232323',
	// #1002
	'use_gridmenu_link_background_color' => '', // checkbox.
	'gridmenu_link_background_color' => 'rgba(255,255,255,0)', // colorpicker.
	'gridmenu_link_background_color_hover' => 'rgba(255,255,255,0)', // colorpicker
	'gridmenu_link_background_color_active' => '#ddd', // colorpicker
	'gridmenu_border_style' => '', // dropdown
	// end #1002
	//
	'caption_vertical_alignment' => 'v-align-middle', // dropdown
	'caption_horizontal_alignment' => 'center', // dropdown
	'rollover_animation' => '', // dropdown, Presets are used
	'rollover_animation_duration' => '700', // textfield
	'rollover_easing' => 'swing',
	'rollover_bkg_color' => 'rgba(255,255,255,0.9)', // colorpicker
), $atts));

// css ID
	$_css_id = 'tm_grid-'.ThemeMountain\TM_Shortcodes::tm_serial_number();
// sanitization
	$el_class = ($el_class!=='') ? ' '.esc_attr($el_class) : '';

	$layout_mode = esc_attr($layout_mode);

	$thumb_ratio = esc_attr($thumb_ratio);
	$filter_duration = esc_attr($filter_duration);
	$resize_duration = esc_attr($resize_duration);
	$column_number = esc_attr($column_number);
	$rollover_animation = esc_attr($rollover_animation);
	$rollover_animation_duration = esc_attr($rollover_animation_duration);
	$rollover_easing = esc_attr($rollover_easing);

	/** infinite / lazy loading #1013. attrs added to div.grid-container */
	// making sure that the $grid_items_to_initially_load is int.
	$grid_items_to_initially_load = intval($grid_items_to_initially_load);
	// process flags
	switch($grid_preloading){
		case 'lazyload_on_scroll':
			$_grid_preloading_attributes = ' data-loading-method="lazyload"';
			$_grid_preloading_counter = 0;
			break;
		case 'infinite_scroll':
			$_grid_preloading_attributes = '  data-loading-method="infiniteScroll" data-reveal-method="onScroll"';
			$_grid_preloading_counter = 0;
			$_hide_preload_content = ' hide';
			break;
		case 'infinite_scroll_with_load_button':
			$_grid_preloading_attributes = ' data-loading-method="infiniteScroll" data-reveal-method="loadMore"';
			$_grid_preloading_counter = 0;
			$_hide_preload_content = ' hide';
			break;
		default:
			// no need to process preloading at all
			$_grid_preloading_counter = NULL;
			break;
	}
	// counter for grid preloading.


	if(!empty($use_gridmenu_link_background_color)){
		$_button_nav = ' button-nav';
		switch($gridmenu_border_style){
			case 'rounded':
				$_gridmenu_classes = 'button rounded ';
				break;
			case 'pill':
				$_gridmenu_classes = 'button pill ';
				break;
			default:
				$_gridmenu_classes = 'button ';
				break;
		}
		// css enqueue
		if($gridmenu_link_background_color !=='' ) TM_Shortcodes::tm_add_inline_css(".{$_css_id} .grid-filter-menu a { background-color:  {$gridmenu_link_background_color}; }");
		if($gridmenu_link_background_color_hover !=='' ) TM_Shortcodes::tm_add_inline_css(".{$_css_id} .grid-filter-menu a:hover { background-color:  {$gridmenu_link_background_color_hover}; }");
		if($gridmenu_link_background_color_active !=='' ) TM_Shortcodes::tm_add_inline_css(".{$_css_id} .grid-filter-menu a.active, .{$_css_id} .grid-filter-menu a.active:hover { background-color:  {$gridmenu_link_background_color_active}; }");
	}

// css enqueue
	// link_color
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} .grid-filter-menu a { color:{$link_color} !important;}");
	// link_color_hover
	if($link_color_active !=='') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .grid-filter-menu a.active, .{$_css_id} .grid-filter-menu a.active:hover { color:{$link_color_active} !important;}");
	}
	// link_color_active
	if($link_color_hover !=='') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .grid-filter-menu a:hover { color:{$link_color_hover} !important;}");
	}
	// link_border_color_active
	if($link_border_color_active !=='') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .grid-filter-menu a.active { border-color:{$link_border_color_active} !important;}");
	}

// column gutters
	switch ($column_gutters) {
		case 'none':
			$column_gutters = ' no-margins';
			break;
		case 'small':
			$column_gutters = ' small-margins';
			break;
		default: // large
			$column_gutters = '';
			break;
	}

	if($layout_mode !== 'fitRows') {
		$_grid_sizer = ' grid-sizer';
	}

	//
	if ( $width == 'full_width' ) {
		$_full_width_class = ' full-width';
	}

// rollovers
	$alignment = ($alignment!=='') ? ' '.esc_attr($alignment) : ''; // for grid menu rollovers
	if($project_title_color !== '') $project_title_color = " style='color:".esc_attr($project_title_color)."'";
	if($project_description_color !== '') $project_description_color = " style='color:".esc_attr($project_description_color)."'";
	// caption alignment
	$caption_vertical_alignment = ($caption_vertical_alignment!=='') ? ' '.esc_attr($caption_vertical_alignment) : '';
	$caption_horizontal_alignment = ($caption_horizontal_alignment!=='') ? ' '.esc_attr($caption_horizontal_alignment) : '';
	$rollover_bkg_color = TM_Shortcodes::tm_fromRGBtoHEX($rollover_bkg_color);

// lightbox data-group
	$_lightbox_data_group_id = 'lightbox_data_group-'.time() . rand( 0, 100 );

// loop - sub query
	$grid_items = TM_Shortcodes::build_query($grid_items);

// query
	$_the_query = get_posts( $grid_items );

// grid id counter
	$_grid_id_counter = 0;

// loop through
	foreach ( $_the_query as $_post ) :
		$_postID = $_post->ID;
		$_current_post_thumbnail_html = $_current_post_info = $_current_post_categories_string = $_image_size = $_grid_box_text = $_grid_item_html = $thememountain_grid_box_title = $_grid_box_project_description = $_item_title_and_description = $_current_lightbox_thumbnail_url = $_current_post_thumbnail_src　= $_lightbox_data_attributes = $thememountain_grid_thumbnail_url = $_post_thumbnail_src = $thememountain_use_video_for_featured = $_thumbnail_image_size = $_thumbnail_image_format = $_thumbnail_size = $_link_target = $_current_post_title = '';
		// get relevant options

		// grid box type
		$_grid_box_type = get_post_meta($_postID,'tm_grid_box_type', TRUE);
		if($_grid_box_type === 'none'){
			continue;
		} else if ($_grid_box_type === 'text') {
			// get text
			$_grid_box_text = wp_kses_post(get_post_meta($_postID,'tm_grid_box_text', TRUE));
			$_grid_box_text = TM_Shortcodes::tm_do_shortcode($_grid_box_text);
			// wrap around with p tag if it does not have any html tags
			if(preg_match( "/\/[a-z]*>/i", $_grid_box_text ) == 0){
				$_grid_box_text = '<p>'.$_grid_box_text.'</p>';
			}
		}

		/**
		 * Title and description. Except for text or none or thumbnail. Table chart in markdown:
		 *
|                             	| text_with_thumbnail                   	| text_with_thumbnail_rollover            	|
|-----------------------------	|---------------------------------------	|-----------------------------------------	|
| Output Grid Box Title       	| h4.projec-title                       	| span.project-title                      	|
| Output Grid Box Description 	| span.project-description              	| span.project-description                	|
| If Grid Box Title is empty  	| output POST TITle in h4.project-title 	| output POST TITle in span.project-title 	|
| Out View in the rollover    	| Yes                                   	| No                                      	|
		 *
		 */
		if($show_project_title_and_description == 'false' && $_grid_box_type === 'text_with_thumbnail') {
			$_item_title_and_description = '';
		} else if(
			preg_match("/text_with_thumbnail|text_with_thumbnail_rollover/i", $_grid_box_type)
		) {
			$_current_post_title = get_the_title($_postID);
			$thememountain_grid_box_title = get_post_meta($_postID,'tm_grid_box_title', TRUE);
			$_the_thumb_title = ($thememountain_grid_box_title !== '') ? $thememountain_grid_box_title : $_current_post_title;
			// TITLE. text_with_thumbnail or text_with_thumbnail_rollover
			if($_grid_box_type == 'text_with_thumbnail') {
				$_item_title_and_description .= "<h4 class='project-title'{$project_title_color}>{$_the_thumb_title}</h4>";
			} else {
				// text_with_thumbnail_rollover
				$_item_title_and_description .= "<span class='project-title'{$project_title_color}>{$_the_thumb_title}</span>";
			}
			// DESCRIPTION text_with_thumbnail or text_with_thumbnail_rollover
			$_grid_box_project_description = get_post_meta($_postID,'tm_grid_box_description', TRUE);
			if($_grid_box_project_description !== '') {
				$_item_title_and_description .= "<span class='project-description'{$project_description_color}>{$_grid_box_project_description}</span>";
			}
		}

		// Width : fixed_thumb_dimensions
		if ($fixed_thumb_dimensions !=='' ) {
			// fixed_thumb_dimensions, available only when project_title_and_description is hidden
			$fixed_thumb_dimensions = " data-set-dimensions data-grid-ratio='{$thumb_ratio}'";
			// dependent on $fixed_thumb_dimensions
			if($set_as_background_images !== '') {
				$fixed_thumb_dimensions .= ' data-as-bkg-image';
			}
		}

		// tm_use_video_for_featured. Pseudo Boolean
		$thememountain_use_video_for_featured = get_post_meta($_postID,'tm_use_video_for_featured', TRUE);

		// the thum different from the featured one.
		$thememountain_grid_thumbnail_url = get_post_meta($_postID,'tm_grid_thumbnail', TRUE);

		// image size needs to be set in advance
		if (
			$_grid_box_type === 'thumbnail' ||
			$_grid_box_type === 'text_with_thumbnail' ||
			$_grid_box_type === 'text_with_thumbnail_rollover' ||
			$_grid_box_type === 'text'
		) {
			$_grid_box_thumb_format = get_post_meta($_postID,'tm_grid_box_thumb_format', TRUE);
			// image format / size
			switch($_grid_box_thumb_format) {
				case 'large':
					$_image_size = ' large';
					$_thumbnail_image_format = 'landscape';
					$_thumbnail_image_size = 'large';
					break;
				case 'portrait':
					$_image_size = ' portrait';
					$_thumbnail_image_format = 'portrait';
					$_thumbnail_image_size = 'normal';
					break;
				case 'large-portrait':
					$_image_size = ' large portrait';
					$_thumbnail_image_format = 'portrait';
					$_thumbnail_image_size = 'large';
					break;
				case 'wide':
					$_image_size = ' wide';
					$_thumbnail_image_format = 'landscape';
					$_thumbnail_image_size = 'wide';
					break;
				case 'auto':
					/** find width and height */
					if( !empty($thememountain_grid_thumbnail_url) && $_grid_box_type !== 'text' ) {
						$_thumbnail_size = TM_Shortcodes::find_image_size_from_id($thememountain_grid_thumbnail_url);
					} else if( has_post_thumbnail($_postID) === TRUE && $_grid_box_type !== 'text' ) {
						$_thumbnail_size = TM_Shortcodes::find_image_size_from_id(get_post_thumbnail_id($_postID));
					}
					/** set the size into variables */
					if(!empty($_thumbnail_size)) {
						$_image_width = $_thumbnail_size[0];
						$_image_height = $_thumbnail_size[1];
					} else {
						/** whatever values */
						$_image_width = 640;
						$_image_height = 400;
					}
					/** do auto */
					if($_image_width > $_image_height) {
						$_image_size = ' landscape';
						$_thumbnail_image_format = 'landscape';
						if($_image_width >= 1520) {
							$_image_size .= ' large';
							$_thumbnail_image_size = 'large';
						}
						if($_image_width / $_image_height >= 3 ) {
							$_image_size .= ' wide';
							$_thumbnail_image_size = 'wide';
						}
						if(empty($_thumbnail_image_size)) {
							$_thumbnail_image_size = 'normal';
						}
					} else {
						$_image_size = ' portrait';
						$_thumbnail_image_format = 'portrait';
						if($_image_width >= 1520) {
							$_image_size .= ' large';
							$_thumbnail_image_size = 'large';
						}
						if(empty($_thumbnail_image_size)) {
							$_thumbnail_image_size = 'normal';
						}
					}
					break;
				default: // none or not set
					$_thumbnail_image_format = 'landscape';
					$_thumbnail_image_size = 'normal';
					break;
			}
		}

		// set id
		$_grid_id_counter ++;
		$_grid_box_id = 'grid-box-'.$_css_id.'-'.$_grid_id_counter;
		// grid preloader control flag
		$_is_to_be_preloaded = ($_grid_preloading_counter !== NULL && $_grid_preloading_counter >= $grid_items_to_initially_load) ? TRUE : FALSE;

		// thumbnail image
		if( !empty($thememountain_use_video_for_featured) && $_grid_box_type !== 'text' ) {
			$thememountain_use_post_media = get_post_meta($_postID,'tm_use_post_media');
			$thememountain_media_youtube = get_post_meta($_postID,'tm_media_youtube');
			$thememountain_media_vimeo = get_post_meta($_postID,'tm_media_vimeo');
			$thememountain_media_video_mp4 = get_post_meta($_postID,'tm_media_video_mp4');
			$thememountain_media_video_webm = get_post_meta($_postID,'tm_media_video_webm');
			$thememountain_media_thumbnail = get_post_meta($_postID,'tm_media_thumbnail');
			// video type
			switch($thememountain_use_post_media) {
				case 'youtube':
				$_current_post_thumbnail_html = "<div class='post-media'><div class='video-container'><iframe src='//www.youtube.com/embed/{$thememountain_media_youtube}' width='560' height='315' allow='autoplay'></iframe></div></div>";
				break;
				case 'vimeo':
				$_current_post_thumbnail_html = "<div class='post-media'><div class='video-container'><iframe src='//player.vimeo.com/video/{$thememountain_media_vimeo}?title=0&amp;byline=0&amp;portrait=0&amp;color=304cd1&amp;loop=1' width='500' height='281' allow='autoplay'></iframe></div></div>";
				break;
				case 'video':
				$_current_post_thumbnail_html = '';
				if ( !empty($thememountain_media_video_mp4) ) {
					$_current_post_thumbnail_html .= "<source type='video/mp4' src='{$thememountain_media_video_mp4}'>\n";
				}
				if ( !empty($thememountain_media_video_webm) ) {
					$_current_post_thumbnail_html .= "<source type='video/webm' src='{$thememountain_media_video_webm}'>\n";
				}
				$_current_post_thumbnail_html = "<div class='post-media'><video poster='{$thememountain_media_thumbnail}' autoplay loop width='480' height='271'>\n{$_video_container_html}\n</video></div>";
				break;
				default:
				$_current_post_thumbnail_html = '';
				break;
			}
		} else if( !empty($thememountain_grid_thumbnail_url) && $_grid_box_type !== 'text' ) {
			$_current_post_thumbnail_html = TM_Shortcodes::generate_image_tag_from_id($thememountain_grid_thumbnail_url,get_the_title($_postID),FALSE,'grid-'.$column_number.'-'.$_thumbnail_image_format.'-'.$_thumbnail_image_size,$_is_to_be_preloaded);

		} else if( has_post_thumbnail($_postID) === TRUE && $_grid_box_type !== 'text' ) {
			$_current_post_thumbnail_html = TM_Shortcodes::generate_image_tag_from_id(get_post_thumbnail_id($_postID),get_the_title($_postID),FALSE,'grid-'.$column_number.'-'.$_thumbnail_image_format.'-'.$_thumbnail_image_size,$_is_to_be_preloaded);

		} else if ($_grid_box_type === '' || $_grid_box_type === 'thumbnail' ) {
			// note, if $_grid_box_type is thumnail and is passing by ths conditional
			// the post must not have any featured image (thumbnail) set. continue then.
			continue;
		}

		// set background
		if($_grid_box_type === 'text' ) {
			if($_grid_box_background_color = get_post_meta($_postID,'tm_grid_box_background_color', TRUE)) {
				TM_Shortcodes::tm_add_inline_css("#{$_grid_box_id} .content-outer { background-color:{$_grid_box_background_color}; }");
			}
		}

		/**
		 * Find all the categories or taxonomies the post belongs to.
		 */
		$_taxonomy_slugs_array = array();
		$_taxonomy_included = array();
		$_current_post_type = get_post_type($_postID);

		if(array_key_exists('post_type', $grid_items) || $grid_items['post_type'] === 'any') {
			// post
			if(
				$grid_items['post_type'] === 'any' ||
				in_array('post', $grid_items['post_type']) ||
				isset($grid_items['category__in'])
			) {
				array_push($_taxonomy_slugs_array, 'category');
				if(isset($grid_items['tax_query']) && isset($grid_items['tax_query']['category'])) {
					$_taxonomy_included = array_merge($_taxonomy_included,$grid_items['tax_query']['category']['terms']);
				}
			}
			// tm_folio
			if(
				$grid_items['post_type'] === 'any' ||
				in_array('tm_folio', $grid_items['post_type']) ||
				isset($grid_items['tax_query'])
			) {
				array_push($_taxonomy_slugs_array,'tm_folio_category');
				if(isset($grid_items['tax_query']) && isset($grid_items['tax_query']['tm_folio_category'])) {
					$_taxonomy_included = array_merge($_taxonomy_included,$grid_items['tax_query']['tm_folio_category']['terms']);
				}
			}

			//
			if(
				$grid_items['post_type'] === 'any' ||
				(
					isset($grid_items['tax_query']) &&
					isset($grid_items['tax_query']['post_tag'])
				)
			) {
				if(isset($grid_items['tax_query']) && isset($grid_items['tax_query']['post_tag'])) {
					array_push($_taxonomy_slugs_array, 'post_tag');
					$_taxonomy_included = array_merge($_taxonomy_included,$grid_items['tax_query']['post_tag']['terms']);
				}
			}
		}

		if(!empty($_taxonomy_slugs_array)) {
			$_current_post_categories = wp_get_post_terms($_postID,$_taxonomy_slugs_array);
		}

		/**
		 * Accumulate for the filter menu if the post has any of them.
		 */
		if($_current_post_categories) {
			foreach ($_current_post_categories as $_key => $_value) {
				if(in_array($_value->term_id, $_taxonomy_included) || empty($_taxonomy_included) ) {
					$_current_post_categories_string .= ' '.$_value->slug;
					// accumulate category info
					if(!array_key_exists($_value->slug,$_item_categories)) {
						$_item_categories[$_value->slug] = $_value->name;
					}
				}
			}
		}

		// grid linked item
		$_grid_linked_item = get_post_meta($_postID,'tm_grid_linked_item', TRUE); // default is "linked".
		// permalink
		if($_grid_linked_item === '' || $_grid_linked_item === 'linked' ) {
			$_current_post_permalink = " href='".get_permalink($_postID)."'";
			$_overlay_link = 'overlay-link';
			$rollover_animation_class = ' '.$rollover_animation;
			$_rollOver_data_attributes = " data-hover-easing='{$rollover_easing}' data-hover-speed='{$rollover_animation_duration}' data-hover-bkg-color='{$rollover_bkg_color[0]}' data-hover-bkg-opacity='$rollover_bkg_color[1]'";
			$_link_target = (!empty($force_grid_item_link_targets)) ? ' target="'.esc_attr($force_grid_item_link_targets).'"' : '';
		} else if ($_grid_linked_item === 'custom_url') {
			$thememountain_grid_custom_url = get_post_meta($_postID,'tm_grid_custom_url', TRUE);
			$thememountain_grid_custom_url = (empty($thememountain_grid_custom_url)) ? '' : $thememountain_grid_custom_url;
			$_current_post_permalink = " href='".$thememountain_grid_custom_url."'";
			$_overlay_link = 'overlay-link';
			$rollover_animation_class = ' '.$rollover_animation;
			$_rollOver_data_attributes = " data-hover-easing='{$rollover_easing}' data-hover-speed='{$rollover_animation_duration}' data-hover-bkg-color='{$rollover_bkg_color[0]}' data-hover-bkg-opacity='$rollover_bkg_color[1]'";
			$_link_target = (!empty($force_grid_item_link_targets)) ? ' target="'.esc_attr($force_grid_item_link_targets).'"' : '';
		} else if ( $_grid_linked_item === 'lightbox' ) {
			// lightbox
			$_lightbox_caption = htmlspecialchars(get_post_meta($_postID,'tm_grid_lightbox_caption', TRUE),ENT_QUOTES);
			$thememountain_featured_media_type = get_post_meta($_postID,'tm_featured_media_type', TRUE);
			// set $_current_lightbox_thumbnail_url
			if( has_post_thumbnail($_postID) === TRUE ) {
				$_post_thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($_postID), 'full');
				$_current_lightbox_thumbnail_url = $_post_thumbnail_src[0];
			} else {
				$_current_lightbox_thumbnail_url = $thememountain_grid_thumbnail_url;
			}
			// conditionals
			if( $thememountain_featured_media_type == 'vimeo' ) {
				$thememountain_featured_media_vimeo = get_post_meta($_postID,'tm_featured_media_vimeo', TRUE);
				$_lightbox_href = ($thememountain_featured_media_vimeo !=='' ) ? '//player.vimeo.com/video/'.$thememountain_featured_media_vimeo.'?autoplay=1' : $_current_lightbox_thumbnail_url;
			} else if( $thememountain_featured_media_type == 'youtube' ) {
				$thememountain_featured_media_youtube = get_post_meta($_postID,'tm_featured_media_youtube', TRUE);
				$_lightbox_href = ($thememountain_featured_media_youtube !=='' ) ? '//www.youtube.com/embed/'.$thememountain_featured_media_youtube.'?autoplay=1' : $_current_lightbox_thumbnail_url;
			} else {
				$_lightbox_href = $_current_lightbox_thumbnail_url;
			}
			// set attributes
			$_current_post_permalink = " href='{$_lightbox_href}'";
			$_overlay_link = 'overlay-link lightbox-link';
			$rollover_animation_class = ' '.$rollover_animation;
			$_lightbox_data_attributes = " data-group='{$_lightbox_data_group_id}' data-caption='{$_lightbox_caption}'";
			$_rollOver_data_attributes = " data-hover-easing='{$rollover_easing}' data-hover-speed='{$rollover_animation_duration}' data-hover-bkg-color='{$rollover_bkg_color[0]}' data-hover-bkg-opacity='$rollover_bkg_color[1]'";
			$_link_target = ''; // not used
		} else {
			$_current_post_permalink = '';
			$_overlay_link = '';
			$rollover_animation_class = '';
			$_rollOver_data_attributes = '';
		}

		// for overlays
		if( $_grid_box_type === 'text' ) {
			$_grid_item_html = "<div class='content-outer'><div class='content-inner'>$_grid_box_text</div></div>\n";
		} else if( $_grid_box_type === 'text_with_thumbnail' ) {
			$_grid_item_html = "<div class='thumbnail{$rollover_animation_class}'{$_rollOver_data_attributes}>";
			$_item_title_and_description = (!empty($_item_title_and_description)) ? "<div class='item-description'>{$_item_title_and_description}</div>" : '';
			if($_current_post_permalink !=='') {
				$_grid_item_html .= "<a class='{$_overlay_link}'{$_lightbox_data_attributes}{$_current_post_permalink}{$_link_target}>{$_current_post_thumbnail_html}<span class='overlay-info{$caption_vertical_alignment}{$caption_horizontal_alignment}'><span><span {$project_title_color}>".esc_html__( 'View' , 'thememountain-plugin')."</span></span></span></a></div>{$_item_title_and_description}<!-- text_with_thumbnail without permalink -->";
			} else {
				$_grid_item_html .= $_current_post_thumbnail_html. "</div><!-- text_with_thumbnail with permalink -->\n";
			}
		} else if( $_grid_box_type === 'text_with_thumbnail_rollover' ) {
			// added @ tm_grid item need to add an additional option to grid rollovers #39 (common-asset) on 12SEPT2017
			$_grid_item_html = "<div class='thumbnail{$rollover_animation_class}'{$_rollOver_data_attributes}>";
				if($_current_post_permalink !=='') {
					$_grid_item_html .= "<a class='{$_overlay_link}'{$_lightbox_data_attributes}{$_current_post_permalink}{$_link_target}>{$_current_post_thumbnail_html}<span class='overlay-info{$caption_vertical_alignment}{$caption_horizontal_alignment}'><span><span>{$_item_title_and_description}</span></span></span></a>";
				} else {
					$_grid_item_html .= $_current_post_thumbnail_html;
				}
				$_grid_item_html .= "</div><!-- text_with_thumbnail_rollover -->\n";
		} else {
			// thumbnail
			$_grid_item_html = "<div class='thumbnail{$rollover_animation_class}'{$_rollOver_data_attributes}>";
			if($_current_post_permalink !=='') {
				$_grid_item_html .= "<a class='{$_overlay_link}'{$_lightbox_data_attributes}{$_current_post_permalink}{$_link_target}>{$_current_post_thumbnail_html}<span class='overlay-info{$caption_vertical_alignment}{$caption_horizontal_alignment}'><span><span><span class='project-title'{$project_title_color}>{$_current_post_title}</span></span></span></span></a>";
			} else {
				$_grid_item_html .= $_current_post_thumbnail_html;
			}
			$_grid_item_html .= "</div><!-- end thumbnail -->\n";
		}

		// grid preloading counter control
		if($_is_to_be_preloaded === FALSE){
			// add html
			$_grid_content_html .= "<div id='{$_grid_box_id}' class='grid-item{$_grid_sizer}{$_image_size}{$_current_post_categories_string}'>{$_grid_item_html}</div>\n";
			$_grid_sizer = '';
		} else {
			$_grid_preloaded_content_html .= "<div id='{$_grid_box_id}' class='grid-item{$_grid_sizer}{$_image_size}{$_current_post_categories_string}'>{$_grid_item_html}</div>\n";
		}
		// count up if for preload
		if($_grid_preloading_counter !== NULL) {
			$_grid_preloading_counter++;
		}

	endforeach;
	wp_reset_postdata();

// nav
	// construct
	ksort($_item_categories);
	foreach ($_item_categories as $_key => $_value) {
		//
		$_grid_nav_inner_html .= "<li><a href='#' data-filter='.{$_key}' class='{$_gridmenu_classes}'>{$_value}</a></li>";
	}

// set id
	// ID is mandatory
	if($el_id === '') $el_id = 'tm-grid-'.time() . rand( 0, 100 );

// section block related
	// preloaded
	if(!empty($_grid_preloaded_content_html)){
		$_grid_preloaded_content_html = "\n<!-- Preload content --><div class='row preload content-grid-{$column_number}{$_hide_preload_content}'>{$_grid_preloaded_content_html}</div><!-- End Preload content -->\n";
	}
	// wrap around
	if($show_filter_menu === 'true') {
		$_grid_nav_html = "<div class='{$_css_id} section-block grid-filter-menu{$_button_nav}{$alignment}' data-target-grid='#{$el_id}'><div class='row'><div class='column width-12'><ul><li><a class='{$_gridmenu_classes}active' href='#' data-filter='*'>All</a></li>{$_grid_nav_inner_html}</ul></div></div></div>\n";
	}

// grid_section
	$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);
	$_output = "{$_grid_nav_html}<div{$el_id} class='section-block no-padding grid-container fade-in-progressively{$column_gutters}{$_full_width_class}{$el_class}' data-layout-mode='{$layout_mode}' data-animate-filter-duration='{$filter_duration}' data-animate-resize data-animate-resize-duration='{$resize_duration}'{$fixed_thumb_dimensions}{$_grid_preloading_attributes}><div class='row'><div class='column width-12'><div class='row grid content-grid-{$column_number}'>{$_grid_content_html}</div></div>{$_grid_preloaded_content_html}</div></div>\n";
	$_output .= "<!-- end themeMountain grid -->\n";

// const argument
	$_args = array(
		'css_id' => $_css_id,
		'force_fullwidth' => TRUE,
		'skip_row_div' => TRUE,
		'has_non_replicable_content' => TRUE,
		);

/* Output */
TM_Shortcodes::output_shortcode_content('grid_section', $_output, "" , '', $_args);