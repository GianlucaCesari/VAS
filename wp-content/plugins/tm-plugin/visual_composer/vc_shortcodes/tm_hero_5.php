<?php
namespace ThemeMountain;

$_media_content_horizon = $_content_media_content = $_media_overlay_html = $_output = $_media_column_width = $_column_width = $_column_offset = $_media_column_html = '';

// Media Column Button / Icon
$_media_column_link_content = $_media_column_link_item = '';

extract(shortcode_atts(array(
	'height' => 'small', // dropdown. small, window_height, auto, custom
	'height_custom' => '400', // textfield
	'media_content_type' => 'image', // dropdown
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'video_youtube_id' => '',
	'video_vimeo_id' => '',
	'video_url' => '',
	'video_url_parameters' => '',
	'content_media_width' => 'split_50_50', // dropdown. split_50_50, split_60_40, split_75_25
	'content_animation' => 'fadeIn', // dropdown
	'content_animation_duration' => '1000', // textfield
	'content_animation_delay' => '0', // textfield
	'content_animation_threshold' => '0.5',
	'media_animation' => 'fadeIn', // dropdown
	'media_animation_duration' => '1000', // textfield
	'media_animation_delay' => '0', // textfield
	'media_animation_threshold' => '0.5',
	'show_media_on_mobile' => 'true', // checkbox
	'el_id' => '', // textfield
	'el_class' => '', // textfield
	// design options
	'media_alignment' => 'left', // dropdown. left, right
	'content_alignment' => 'left', // dropdown. left, right
	'bkg_color' => '#232323', // colorpicker
	'text_color' => '#666', // colorpicker
	'overlay_background_color' => 'rgba(0,0,0,0.3)',
	'overlay_background_use_gradient' => '',
	'overlay_background_gradient_end_color' => '',
	'overlay_background_gradient_angle' => '',
	// MAP
	'is_button_or_embed' => 'embed',
	'button_label' => 'See Google Maps',
	'map_style' => 'color',
	'map_coordinates_1' => '',
	'map_coordinates_2' => '',
	'map_marker_1' => '',
	'map_marker_2' => '',
	'map_info_1' => '',
	'map_info_2' => '',
	'zoom_level' => '16',
	// Media Column Link, button / icon
	'media_column_link' => '',
	'link_to' => 'page',
	'icon_id' => '',
	'button_type' => '',
	'button_label' => '',
	'link_url' => '',
	'link_target' => '_self',
	'lightbox_media_type' => 'image',
	'lightbox_image_source' => 'image_id',
	'lightbox_image_id' => '',
	'lightbox_image_url' => '',
	'lightbox_toolbar_zoom_button' => '',
	'lightbox_toolbar_share_buttons' => '',
	'lightbox_caption' => '',
	'lightbox_video_vimeo_id' => '',
	'lightbox_video_youtube_id' => '',
	'lightbox_video_url' => '',
	'lightbox_video_url_parameters' => '',
	'button_drop_shadow' => '',
	'button_icon_alignment' => 'left',
	'button_button_size' => '',
	'button_border_style' => '',
	'button_bkg_color' => '',
	'button_bkg_color_hover' => '',
	'button_border_color' => '',
	'button_border_color_hover' => '',
	'button_label_color' => '',
	'button_label_color_hover' => '',
	'icon_size' => 'medium',
	'icon_style' => '',
	'icon_drop_shadow' => '',
	'icon_label_color' => '#666', // colorpicker
	'icon_label_color_hover' => '#666', // colorpicker
	'icon_bkg_color' => '#eee', // colorpicker
	'icon_bkg_color_hover' => '#d0d0d0', // colorpicker
	'icon_border_color' => '#eee', // colorpicker
	'icon_border_color_hover' => '#d0d0d0', // colorpicker
), $atts));

// css ID
	$_css_id = 'hero-five-'.TM_Shortcodes::tm_serial_number();

// sanitization
	$media_alignment = esc_attr($media_alignment);
	$content_alignment = ' '.esc_attr($content_alignment);
	$video_youtube_id = esc_attr($video_youtube_id);
	$video_vimeo_id = esc_attr($video_vimeo_id);
	$image_url = esc_url($image_url);
	$map_coordinates_1 = $map_coordinates_1;
	$map_coordinates_2 = $map_coordinates_2;

// show_media_on_mobile
	$show_media_on_mobile = ( $show_media_on_mobile !== '' ) ? ' show-media-column-on-mobile' : '';

// height
	switch($height) {
		case 'window_height':
			$height = ' window-height';
			break;
		case 'auto':
			$height = ' clear-height';
			break;
		case 'custom':
			$height = '';
			if($height_custom !== '') {
				TM_Shortcodes::tm_add_inline_css(".{$_css_id} { height: {$height_custom}px; }");
			}
			break;
		default: // small
		    $height = '';
			break;
	}

// CSS
	if($text_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}, .{$_css_id} * { color: {$text_color}; }");
	}

// animation
	if ($content_animation !== '' ) {
		// sanitization
		$content_animation = esc_attr($content_animation);
		$content_animation_duration = esc_attr($content_animation_duration);
		$content_animation_delay = esc_attr($content_animation_delay);
		$content_animation_threshold = esc_attr($content_animation_threshold);
		if($content_animation_threshold !== ''){
			$content_animation_threshold = " data-threshold='{$content_animation_threshold}'";
		}
		$content_animation = " data-animate-in='preset:{$content_animation};duration:{$content_animation_duration}ms;delay:{$content_animation_delay}ms;'{$content_animation_threshold}";
	}

	if($media_animation !== '') {
		$_media_content_horizon = ' horizon';
		// sanitization
		$media_animation = esc_attr($media_animation);
		$media_animation_duration = esc_attr($media_animation_duration);
		$media_animation_delay = esc_attr($media_animation_delay);
		$media_animation_threshold = esc_attr($media_animation_threshold);
		if($media_animation_threshold !== ''){
			$media_animation_threshold = " data-threshold='{$media_animation_threshold}'";
		}
		$media_animation = " data-animate-in='preset:{$media_animation};duration:{$media_animation_duration}ms;delay:{$media_animation_delay}ms;'{$media_animation_threshold}";
	}

// $_content_media_content
switch($media_content_type) {
	case 'youtube':
		if(!empty($video_url_parameters)){
			$video_url_parameters = '&amp;'.$video_url_parameters;
		}
		$_content_media_content = "<iframe src='//www.youtube.com/embed/{$video_youtube_id}?showinfo=0&amp;loop=1{$video_url_parameters}' allow='autoplay'></iframe>";
		break;
	case 'vimeo':
		if(!empty($video_url_parameters)){
			$video_url_parameters = '&amp;'.$video_url_parameters;
		}
		$_content_media_content = "<iframe src='//player.vimeo.com/video/{$video_vimeo_id}?portrait=0&amp;title=0&amp;byline=0&amp;loop=1{$video_url_parameters}' allow='autoplay'></iframe>";
		break;
	case 'video':
		// video mode
		// $link_url
		if(!empty($video_url_parameters)){
			$video_url_parameters = '&amp;'.$video_url_parameters;
		}
		$_video_src = " src='".esc_url($video_url)."'";

		$_content_media_content .= "<video class='html5-video'";
		if(!empty($video_auto_play)) $_content_media_content .= " autoplay";
		$_content_media_content .= " loop>";

		$_content_media_content .= "<source src='{$_video_src}' type='video/mp4'>";
		$_content_media_content .= "</video>";
		break;
	case 'image':
		// image
		if($image_source === 'image_id') {
			TM_Shortcodes::enqueue_css_bkg_img_by_id(".{$_css_id} div.media-column",$image_id);
		} else if ($image_source === 'image_url' && $image_url !== '') {
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} div.media-column {background-image: url($image_url);}");
		}
		$_media_overlay_html ="<div class='media-overlay'></div>";
		if($overlay_background_color !== '') {
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} .media-overlay {".TM_Shortcodes::construct_gradient_css($overlay_background_color,$overlay_background_use_gradient,$overlay_background_gradient_end_color,$overlay_background_gradient_angle)."}");
		}
		break;
	case 'map':
		$_map_info = $_map_markers = $_map_coordinates = '';
		$_class_array = array();
		$map_id = 'map-canvas-'.time() . rand( 0, 100 );
		// info
		if($map_info_1 !== '') $map_info_1 = '"'.preg_replace('/\"|\'/','',$map_info_1).'"';
		if($map_info_2 !== '') $map_info_2 = '"'.preg_replace('/\"|\'/','',$map_info_2).'"';
		// marker
		// 1st marker image
		if ($map_marker_1 !== '') {
		// regular size image
			$_image_info = wp_get_attachment_image_src($map_marker_1,'full');
			if(!empty($_image_info)) {
				$map_marker_1 = $_image_info[0];
			} else {
				$map_marker_1 = get_template_directory_uri()."/assets/images/assets/map-marker.png";
			}
		} else {
			$map_marker_1 = get_template_directory_uri()."/assets/images/assets/map-marker.png";
		}
		$map_marker_1 = '"'.$map_marker_1.'"';
		// 2nd marker image
		if ($map_marker_2 !== '') {
		// regular size image
			$_image_info = wp_get_attachment_image_src($map_marker_2,'full');
			if(!empty($_image_info)) {
				$map_marker_2 = $_image_info[0];
			} else {
				$map_marker_2 = get_template_directory_uri()."/assets/images/assets/map-marker.png";
			}
		} else {
			$map_marker_2 = get_template_directory_uri()."/assets/images/assets/map-marker.png";
		}
		$map_marker_2 = '"'.$map_marker_2.'"';

		// construct output
		if($map_coordinates_1 !== '') $map_coordinates_1 = "[{$map_coordinates_1}]";
		if($map_coordinates_2 !== '') $map_coordinates_2 = "[{$map_coordinates_2}]";
			// make json array
		if($map_coordinates_2 !=='') {
			$_map_coordinates = $map_coordinates_1.','.$map_coordinates_2;
		} else {
			$_map_coordinates = $map_coordinates_1;
		}
		$_map_coordinates = urldecode($_map_coordinates);

			// info
		if($map_info_2 !=='') {
			$_map_info = $map_info_1.','.$map_info_2;
		} else {
			$_map_info = $map_info_1;
		}
			// markers
		if($map_marker_2 !=='') {
			$_map_markers = $map_marker_1.','.$map_marker_2;
		} else {
			$_map_markers = $map_marker_1;
		}

		$_content_media_content = "<div class='map-container' data-coordinates='[{$_map_coordinates}]' data-icon='{$_map_markers}' data-info='{$_map_info}' data-zoom-level='{$zoom_level}' data-style='{$map_style}'><div class='map-canvas' id='{$map_id}'></div></div>";

		TM_Shortcodes::enqueue_googlemaps_api();
		break;
}

// split_50_50, split_60_40, split_75_25
switch ($content_media_width) {
	case 'split_60_40':
		$_media_column_width = 5;
		$_column_width = 6;
		$_column_offset = ' offset-6';
		break;
	case 'split_75_25':
		$_media_column_width = 4;
		$_column_width = 7;
		$_column_offset = ' offset-5';
		break;
	case 'split_50_50':
	default:
		$_media_column_width = 6;
		$_column_width = 5;
		$_column_offset = ' offset-7';
		break;
}

//
	if($media_alignment == 'right' ) {
		$_column_offset = '';
		$media_alignment = ' '.$media_alignment;
	} else {
		$media_alignment = ' '.$media_alignment;
	}


// tm_hero_5 add option to add button to media column #987
	if($media_content_type === 'image' && !empty($media_column_link)){
		// Translate
		switch($media_column_link){
			case 'button':
				$_media_column_link_item = "[tm_content_button icon_id='$icon_id' button_type='$button_type' button_label='$button_label' link_to='$link_to' link_url='$link_url' link_target='$link_target' media_type='$lightbox_media_type' image_source='$lightbox_image_source' image_id='$lightbox_image_id' image_url='$lightbox_image_url' lightbox_toolbar_zoom_button='$lightbox_toolbar_zoom_button' lightbox_toolbar_share_buttons='$lightbox_toolbar_share_buttons' lightbox_caption='$lightbox_caption' video_vimeo_id='$lightbox_video_vimeo_id' video_youtube_id='$lightbox_video_youtube_id' video_url='$lightbox_video_url' video_url_parameters='$lightbox_video_url_parameters' drop_shadow='$button_drop_shadow' icon_alignment='$button_icon_alignment' button_size='$button_button_size' border_style='$button_border_style' bkg_color='$button_bkg_color' bkg_color_hover='$button_bkg_color_hover' border_color='$button_border_color' border_color_hover='$button_border_color_hover' label_color='$button_label_color' label_color_hover='$button_label_color_hover' icon_size='$icon_size' icon_style='$icon_style' icon_bkg_color='$icon_bkg_color' icon_bkg_color_hover='$icon_bkg_color_hover']";
				break;
			case 'icon':
				// icon id conversion is needed for tm_icon
				$_media_column_link_item = "[tm_icon icon_id='$icon_id' link_icon='$link_to' link_url='$link_url' link_target='$link_target' media_type='$lightbox_media_type' image_source='$lightbox_image_source' image_id='$lightbox_image_id' image_url='$lightbox_image_url' lightbox_toolbar_zoom_button='$lightbox_toolbar_zoom_button' lightbox_toolbar_share_buttons='$lightbox_toolbar_share_buttons' lightbox_caption='$lightbox_caption' video_vimeo_id='$lightbox_video_vimeo_id' video_youtube_id='$lightbox_video_youtube_id' video_url='$lightbox_video_url' video_url_parameters='$lightbox_video_url_parameters' drop_shadow='$icon_drop_shadow' icon_size='$icon_size' bkg_color='$icon_bkg_color' bkg_color_hover='$icon_bkg_color_hover' border_color='$icon_border_color' border_color_hover='$icon_border_color_hover' label_color='$icon_label_color' label_color_hover='$icon_label_color_hover' icon_size='$icon_size' icon_style='$icon_style' icon_bkg_color='$icon_bkg_color' icon_bkg_color_hover='$icon_bkg_color_hover' called_from_other_shortcode='true']";
				break;
		}
		$_media_column_link_content = TM_Shortcodes::tm_do_shortcode($_media_column_link_item);
		// tm_hero_5 - hero-content markup should only be inserted under certain conditions #997
		$_media_column_html = "<div class='hero-content'><div class='hero-content-inner center'>{$_content_media_content}{$_media_column_link_content}</div></div>";
	} else {
		$_media_column_html = "{$_content_media_content}";
	}

/**
 * dirty fix to remove stray tags
 */
	// $content = TM_Shortcodes::tm_rudementary_p_tag_remover($content);
	$_heroContent = TM_Shortcodes::tm_do_shortcode($content,FALSE);
	// P issue workaround
	$_heroContent = TM_Shortcodes::tm_rudementary_p_tag_remover($_heroContent);

// construct output
	$_output = "<div class='media-column width-{$_media_column_width}{$_media_content_horizon}'{$media_animation}>{$_media_overlay_html}{$_media_column_html}</div><div class='row'><div class='column width-{$_column_width}{$_column_offset}'><div class='hero-content split-hero-content horizon'{$content_animation}><div class='hero-content-inner{$content_alignment}'>{$_heroContent}</div></div></div></div>";

// const argument
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'skip_row_div' => TRUE,
		'has_non_replicable_content' => TRUE,
		);

/* Output */
	TM_Shortcodes::output_shortcode_content('hero_section', $_output, "hero-5{$height}{$media_alignment}{$show_media_on_mobile}" , '', $_args);
