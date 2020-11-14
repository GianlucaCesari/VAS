<?php
namespace ThemeMountain;

$_output = $_horizon_attr = $_content_animation_attr = $_text_color_target = '';

extract(shortcode_atts(array(
	'title' => '', // textfield
	'el_class' => '',
	'text_color' => '',
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

// text color
	if($text_color !== '') {
		if($column_index == 0) {
			$_text_color_target = ' .column:first-child *';
		} else {
			$_text_color_target = ' .column:last-child *';
		}

		TM_Shortcodes::tm_add_inline_css(".{$parent_css_id}{$_text_color_target} { color: $text_color; }");
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
	$_output = "<div class='hero-content split-hero-content{$_horizon_attr}'{$_content_animation_attr}><div class='hero-content-inner left'>{$content}</div></div>";

/* Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);