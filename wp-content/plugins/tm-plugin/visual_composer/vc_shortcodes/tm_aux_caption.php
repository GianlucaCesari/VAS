<?php
namespace ThemeMountain;

$_output = $_horizon = '';

extract(shortcode_atts(array(
	/*
		Scalable Caption Postion Data Attributes
	*/
	'caption' => '', // String containing the caption line
	'margin_bottom' => '30',
	'margin_bottom_mobile' => '30',
	'display_inline' => '',
	'parent' => '', // automatically added
	'content_animation' => '', // dropdown
	'content_animation_duration' => '', // textfield
	'content_animation_delay' => '', // textfield
	'content_animation_threshold' => '',
), $atts));

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

// horizon
	if($parent === 'tm_parallax' ) {
		$_horizon = ' horizon';

		// animation
		if ($content_animation !== '' ) {
			// sanitization
			$content_animation = esc_attr($content_animation);
			if(!empty($content_animation_duration)) $content_animation_duration = 'duration:'.esc_attr($content_animation_duration).'ms;';
			if($content_animation_delay !== '') $content_animation_delay = 'delay:'.esc_attr($content_animation_delay).'ms;';
			$content_animation_threshold = esc_attr($content_animation_threshold);
			if($content_animation_threshold !== ''){
				$content_animation_threshold = " data-threshold='{$content_animation_threshold}'";
			}
			$content_animation = " data-animate-in='preset:{$content_animation};{$content_animation_duration}{$content_animation_delay}'{$content_animation_threshold}";
		}
	}

// display_inline
	if ( $display_inline !== '' ) {
		$display_inline = '';
	} else {
		$display_inline = '<div class="clear"></div>';
	}

$_output = TM_Shortcodes::tm_do_shortcode($content);
$_output = "<div class='tmp-caption {$margin_bottom}{$margin_bottom_mobile}{$_horizon}'{$content_animation}>{$_output}</div>{$display_inline}";

/** Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);