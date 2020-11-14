<?php
namespace ThemeMountain;

$_output = $_horizon_attr = $_content_animation_attr = $_text_color_target = $_column_image_target = $_no_margin_top = '';

extract(shortcode_atts(array(
	'title' => '', // textfield
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'el_class' => '',
	'text_color' => '',
	// design options
	'split_content_bkg_color' => 'rgba(0,0,0,0.5)', // colorpicker
	'background_use_gradient' => '',
	'background_gradient_end_color' => '',
	'background_gradient_angle' => '',
	// animation
	'content_animation' => 'fadeIn', // dropdown
	'content_animation_duration' => '1000', // textfield
	'content_animation_delay' => '0', // textfield
	'content_animation_threshold' => '0.5',
	// added by script
	'column_index' => 0,
	'parent_css_id' => '',
), $atts));

// add spaces for class names
	$el_class = ($el_class!== '') ? ' '.esc_attr($el_class) : '';
	$title = TM_Shortcodes::tm_wp_kses($title);
	$content = TM_Shortcodes::tm_do_shortcode($content);

// Column targeting switch
	if($column_index == 0) {
		$_text_color_target = ':first-child';
		$_overlay_color_target = ':nth-child(1)';
		$_column_image_target = ':nth-child(1)';
		$_no_margin_top = ' no-margin-top';
	} else {
		$_text_color_target = ':last-child';
		$_overlay_color_target = ':nth-child(2)';
		$_column_image_target = ':nth-child(2)';
	}


// text color
	if($text_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$parent_css_id} .column{$_text_color_target} * { color: $text_color; }");
	}

// split_content_bkg_color
	if($split_content_bkg_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$parent_css_id} .media-column{$_overlay_color_target} .media-overlay {".TM_Shortcodes::construct_gradient_css($split_content_bkg_color,$background_use_gradient,$background_gradient_end_color,$background_gradient_angle)."}");
	}

// background iamge
	if($image_source === 'image_url') {
		TM_Shortcodes::enqueue_css_bkg_img_by_id(".{$parent_css_id} .media-column{$_column_image_target}",$image_url);
	} else if($image_source === 'image_id') {
		TM_Shortcodes::enqueue_css_bkg_img_by_id(".{$parent_css_id} .media-column{$_column_image_target}",$image_id);
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
		$_content_animation_attr = " data-animate-in='preset:{$content_animation};duration:{$content_animation_duration}ms;delay:{$content_animation_delay}ms;'{$content_animation_threshold}";
		$_horizon_attr = ' horizon';
	}

// construct output
	$_output = "<div class='hero-content split-hero-content{$_no_margin_top}{$_horizon_attr}'{$_content_animation_attr}><div class='hero-content-inner left'>{$content}</div></div>";

/* Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);