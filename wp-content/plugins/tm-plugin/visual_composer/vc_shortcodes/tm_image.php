<?php
namespace ThemeMountain;

$_output = $_caption_html = $_data_caption = $_data_attributes = $_data_toolbar = $_image_html = $_image_sizes = $href_link_url = $_caption_content = '';
$_class_array = array();

extract(shortcode_atts(array(
	'margin_bottom' => '30',
	'margin_bottom_mobile' => '30',
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'image_width' => '',
	'link_image' => '', // dropdown, None (''), link_to_page, use_lightbox
	'link_url' => '', // textfield
	'group_id' => '', // textfield
	'lightbox_toolbar_zoom_button' => '', // checkbox
	'lightbox_toolbar_share_buttons' => '', // checkbox
	'lightbox_caption' => '', // textfield
	'lightbox_animation' => 'fade',
	// 'content' => '', // textarea_html
	'el_class' => '', // textfield
	// Design Options
	'image_style' => '',
	'caption_type' => '', // dropdown, No caption ('', blank), caption_over, caption_below, rollover_caption
	'caption_vertical_alignment' => 'v-align-middle', // dropdown
	'caption_horizontal_alignment' => 'center', // dropdown
	'rollover_bkg_color' => 'rgba(255,255,255,0.9)', // colorpicker
	'caption_text_color' => '#232323', // colorpicker
	// Animation
	'rollover_animation' => '', // dropdown, Presets are used
	'rollover_animation_duration' => '1000', // textfield
	'rollover_easing' => 'swing',
	), $atts));

// css ID
	$_css_id = 'tm_image-'.TM_Shortcodes::tm_serial_number();

// conversion
	if($el_class!== '') $el_class = ' '.esc_attr($el_class);
	// image_style
	$image_style = ($image_style!=='') ? ' '.esc_attr($image_style) : '';
	// caption alignment
	$caption_vertical_alignment = ($caption_vertical_alignment!=='') ? ' '.esc_attr($caption_vertical_alignment) : '';
	$caption_horizontal_alignment = ($caption_horizontal_alignment!=='') ? ' '.esc_attr($caption_horizontal_alignment) : '';
	// rollover animation
	$rollover_animation = ($rollover_animation!=='') ? ' '.esc_attr($rollover_animation) : '';
	// css
	if($image_width !=='') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} > img { width: {$image_width}px; }");
	}
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
	if($group_id !== '') $group_id = " data-group='".esc_attr($group_id)."'";

// margin
	if($margin_bottom === 'inherit') {
		$margin_bottom = '';
	} else {
		$margin_bottom = ' mb-'.esc_attr($margin_bottom);
	}
// margin on mobile
	if($margin_bottom_mobile === 'inherit') {
		$margin_bottom_mobile = '';
	} else {
		$margin_bottom_mobile = ' mb-mobile-'.esc_attr($margin_bottom_mobile);
	}

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

// replace p with blank
	$_caption_content = preg_replace( '/<\/?p\>/', '', TM_Shortcodes::tm_do_shortcode($content));

// construct $_image_html
	if($image_source === 'image_url' && !empty($image_url)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_url,preg_replace('/(?:\n|\r|\r\n)/', '', $_caption_content ));
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_id,preg_replace('/(?:\n|\r|\r\n)/', '', $_caption_content ));
	}

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
	$_output = "<div class='{$_css_id} thumbnail{$image_style}{$margin_bottom}{$margin_bottom_mobile}{$rollover_animation}{$el_class}'{$_data_attributes}><a class='overlay-link' href='$link_url'{$group_id}>{$_image_html}{$_caption_html}</a></div>";
} else if ($link_image == 'use_lightbox') {
	// image
	$href_link_url = TM_Shortcodes::get_image_attributes_by_id($image_source,$image_id,$image_url,FALSE);

	$lightbox_caption = htmlentities($lightbox_caption, ENT_QUOTES);
	$_data_caption = " data-caption='{$lightbox_caption}'";
	$_data_lightbox_animation = " data-lightbox-animation='{$lightbox_animation}'";
	$_output = "<div class='{$_css_id} thumbnail{$image_style}{$margin_bottom}{$margin_bottom_mobile}{$rollover_animation}{$el_class}'{$_data_attributes}><a class='overlay-link lightbox-link'{$href_link_url}{$_data_caption}{$_data_lightbox_animation}{$_data_toolbar}{$group_id}>{$_image_html}{$_caption_html}</a></div>";
} else if ($caption_type == 'rollover_caption') {
	$_output = "<div class='{$_css_id} thumbnail{$image_style}{$margin_bottom}{$margin_bottom_mobile}{$rollover_animation}{$el_class}'{$_data_attributes}><a class='overlay-link'>{$_image_html}{$_caption_html}</a></div>";
} else { // image only
	// caption type
	$_output = "<div class='{$_css_id} thumbnail{$image_style}{$margin_bottom}{$margin_bottom_mobile}{$rollover_animation}{$el_class}'{$_data_attributes}>{$_image_html}{$_caption_html}</div>";
}

/** Output */
	TM_Shortcodes::output_shortcode_content('inline', $_output);
