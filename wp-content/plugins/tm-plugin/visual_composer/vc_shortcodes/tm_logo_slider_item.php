<?php
namespace ThemeMountain;

$_output = $_slideContent = $_data_attributes = $_image_html = $_caption_html = '';

extract( shortcode_atts( array(
	// General
	'title' => '',
	// slide_description ?
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'el_class' => '', //  textfield
), $atts ) );

// css id
	$_css_id = 'tm_logo_slider_item-'.TM_Shortcodes::tm_serial_number();

// sanitization
	$el_class = ($el_class!== '') ? ' '.esc_attr($el_class) : '';
	$image_url = esc_url($image_url);

// construct $_image_html
	if($image_source === 'image_url' && !empty($image_url)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_url,$title);
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_id,$title);
	}

// sanitization
	$title = esc_attr($title);

// $_slideContent
	$_slideContent = "<div class='thumbnail'>{$_image_html}</div>";


/** Output */
	$_output = "<li class='{$_css_id} tms-slide{$el_class}'>{$_slideContent}</li>";
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);
