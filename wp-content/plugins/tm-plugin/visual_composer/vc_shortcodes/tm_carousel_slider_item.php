<?php
namespace ThemeMountain;

$_output = $_slideContent = $_data_attributes = $_image_html = $_caption_html = $_el_id = '';

extract( shortcode_atts( array(
	// General
	'title' => '',
	// slide_description ?
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'link_image' => '', // link_to_page or use_lightbox
	'link_url' => '',
	'group_id' => '',
	'lightbox_toolbar_zoom_button' => '',
	'lightbox_toolbar_share_buttons' => '',
	'lightbox_caption' => '',
	'el_class' => '', //  textfield
	// Design Options - REFER TO TM_IMAGE
	'caption_type' => '',
	'caption_vertical_alignment' => 'middle',
	'caption_horizontal_alignment' => 'center',
	'rollover_bkg_color' => 'rgba(0,0,0,0.3)',
	'caption_text_color' => '#232323',
	// Animation - REFER TO TM_IMAGE
	'rollover_animation' => '',
	'rollover_animation_duration' => '1000',
	'rollover_easing' => 'swing',
	'lightbox_animation' => 'fade',
	// el_id
	'el_id' => '',
), $atts ) );

// css id
	$_css_id = 'tm_carousel_slider_item-'.TM_Shortcodes::tm_serial_number();
// sanitization
	$el_class = ($el_class!== '') ? ' '.esc_attr($el_class) : '';
	$title = esc_attr($title);
	$link_url = esc_attr($link_url);
	$image_url = esc_url($image_url);
	$caption_vertical_alignment = esc_attr($caption_vertical_alignment);
	$caption_horizontal_alignment = esc_attr($caption_horizontal_alignment);
	$_el_id = (!empty($el_id)) ? ' data-custom-id="'.esc_attr($el_id).'"' : '';

// $_slideContent

	// caption alignment
	$caption_vertical_alignment = ($caption_vertical_alignment!=='') ? ' '.esc_attr($caption_vertical_alignment) : '';
	$caption_horizontal_alignment = ($caption_horizontal_alignment!=='') ? ' '.esc_attr($caption_horizontal_alignment) : '';
	// rollover animation
	$rollover_animation = ($rollover_animation!=='') ? ' '.esc_attr($rollover_animation) : '';
	// css
	if($caption_type === 'caption_over' && $caption_text_color !== '') {
		if($caption_text_color == '#232323') {
			$caption_text_color == '#FFFFFF';
		}
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} p, .{$_css_id} h1, .{$_css_id} h2, .{$_css_id} h3, .{$_css_id} h4, .{$_css_id} h5, .{$_css_id} h6 { color: {$caption_text_color}; }");
	}

	// $caption_text_color
	if($caption_text_color !== '') {
		$caption_text_color = " style='color:{$caption_text_color};'";
	}

	// others
	if($group_id !== '') $group_id = " data-group='{$group_id}'";

// tool bar
if(
	$lightbox_toolbar_zoom_button !=='' &&
	$lightbox_toolbar_share_buttons !== ''
	) {
	$_data_toolbar = ' data-toolbar="zoom;share"';
} else if($lightbox_toolbar_zoom_button !=='' ) {
	$_data_toolbar = ' data-toolbar="zoom"';
} else if ($lightbox_toolbar_share_buttons !== '') {
	$_data_toolbar = ' data-toolbar="share"';
} else {
	$_data_toolbar = ' data-toolbar=""';
}

// construct $_image_html
	if($image_source === 'image_url' && !empty($image_url)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_url,$title);
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_id,$title);
	}

// replace p with blank
	$_caption_content = preg_replace( '/<\/?p\>/', '', TM_Shortcodes::tm_do_shortcode($content));

// caption
	switch($caption_type) {
		case 'caption_over':
			$_caption_html = "<div class='caption-over-outer'><div class='caption-over-inner{$caption_vertical_alignment}{$caption_horizontal_alignment}'{$caption_text_color}>{$_caption_content}</div></div>";
			break;
		case 'caption_below':
			$_caption_html = "<div class='caption-below'{$caption_text_color}>{$_caption_content}</div>";
			break;
		case 'rollover_caption':
			if($link_image == 'use_lightbox') {
				$_caption_html = "<span class='overlay-info{$caption_vertical_alignment}{$caption_horizontal_alignment}'><span><span{$caption_text_color}><span>{$_caption_content}</span></span></span></span>";
			} else {
				$_caption_html = "<span class='overlay-info{$caption_vertical_alignment}{$caption_horizontal_alignment}'><span><span{$caption_text_color}><span>{$_caption_content}</span></span></span></span>";
			}
			$rollover_bkg_color = TM_Shortcodes::tm_fromRGBtoHEX($rollover_bkg_color);
			$rollover_easing = esc_attr($rollover_easing);
			$rollover_animation_duration = esc_attr($rollover_animation_duration);
			$_data_attributes = " data-hover-easing='{$rollover_easing}' data-hover-speed='{$rollover_animation_duration}' data-hover-bkg-color='{$rollover_bkg_color[0]}' data-hover-bkg-opacity='$rollover_bkg_color[1]'";
			break;
		default:
			break;
	}

// link image
	if ($link_image == 'link_to_page') {
		// caption type
		$_slideContent = "<div class='{$_css_id} thumbnail{$rollover_animation}{$el_class}'{$_data_attributes}><a class='overlay-link' href='$link_url'{$group_id}>{$_image_html}{$_caption_html}</a></div>";
	} else if ($link_image == 'use_lightbox') {
		// image
		$href_link_url = TM_Shortcodes::get_image_attributes_by_id($image_source,$image_id,$image_url,FALSE);

		$lightbox_caption = htmlentities($lightbox_caption, ENT_QUOTES);
		$_data_caption = " data-caption='{$lightbox_caption}'";
		$_data_lightbox_animation = " data-lightbox-animation='{$lightbox_animation}'";
		$_slideContent = "<div class='{$_css_id} thumbnail{$rollover_animation}{$el_class}'{$_data_attributes}><a class='overlay-link lightbox-link'{$href_link_url}{$_data_caption}{$_data_lightbox_animation}{$_data_toolbar}{$group_id}>{$_image_html}{$_caption_html}</a></div>";
	} else if ($caption_type == 'rollover_caption') {
		$_slideContent = "<div class='{$_css_id} thumbnail{$rollover_animation}{$el_class}'{$_data_attributes}><a class='overlay-link'>{$_image_html}{$_caption_html}</a></div>";
	} else { // image only
		// caption type
		$_slideContent = "<div class='{$_css_id} thumbnail{$rollover_animation}{$el_class}'{$_data_attributes}>{$_image_html}{$_caption_html}</div>";
	}


/** Output */
	$_output = "<li class='{$_css_id} tms-slide'{$_el_id}>{$_slideContent}</li>";
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);
