<?php
namespace ThemeMountain;

$_output = $_data_animate_in = $_full_width_class = '';
extract(shortcode_atts(array(
	'margin_bottom' => '30',
	'margin_bottom_mobile' => '30',
	'column_width' => '12',
	'column_offset' => '',
	'caption_display' => 'inline', // dropdown. inline block
	'hide_caption_on_mobile' => '', // checkbox
	// Design Options
	'caption_vertical_alignment' => 'middle', // dropdown top middle bottom
	// Animation
	'caption_animation' => 'fadeIn', // dropdown Ref. Appendix 2: Animation Presets
	'caption_animation_duration' => '1000', // textfield
	'caption_animation_delay' => '0', // textfield
	'el_class' => '',
	'parent' => '', // automatically added
	'display_inline' => '',
), $atts));

// sanitization
	$el_class = ($el_class!=='') ? ' '.esc_attr($el_class) : '';
	$hide_caption_on_mobile = ($hide_caption_on_mobile !== '') ? '  hide-on-mobile' : '';
	$caption_vertical_alignment = " ".esc_attr($caption_vertical_alignment);
	// Animation Attributes
	$caption_animation = esc_attr($caption_animation);
	$caption_animation_duration = esc_attr($caption_animation_duration);
	$caption_animation_delay = esc_attr($caption_animation_delay);
	$_data_animate_in = " data-animate-in='preset:{$caption_animation};duration:{$caption_animation_duration}ms;delay:{$caption_animation_delay}ms;'";
	// column
	$column_width = esc_attr($column_width);
	$column_offset = ($column_offset !=='') ? " offset-".esc_attr($column_offset) : '';

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

$content = TM_Shortcodes::tm_do_shortcode($content);

// display_inline
if ( $display_inline !== '' ) {
	$display_inline = '';
} else {
	$display_inline = '<div class="clear"></div>';
	$_full_width_class = ' full-width';
}

// wrap around
$_output = "<div class='tms-caption{$margin_bottom}{$margin_bottom_mobile}{$hide_caption_on_mobile}{$_full_width_class}{$el_class}' data-no-scale{$_data_animate_in}>{$content}</div>";
// if($caption_display == 'block') {
// 	$_output .= '<div class="clear"></div>';
// }
/** column */
	if(!empty($display_inline)) {
		$_output = "<div class='row'><div class='column width-{$column_width}{$column_offset}'>{$_output}</div></div>";
	} else {
		$_output .= "{$display_inline}";
	}
/** Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);

