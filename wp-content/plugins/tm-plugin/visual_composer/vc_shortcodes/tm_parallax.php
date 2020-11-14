<?php
namespace ThemeMountain;

$_parallaxContent = $_output = $_image_attributes = $_horizon = $_data_fade_in_out = '';

extract(shortcode_atts(array(
	'column_width' => '6',
	'column_offset' => '3',
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'height_type' => '', // dropdown
	'custom_height' => '500', // 50
	'use_fade' => 'true', // checkbox
	'use_scaling' => '', // checkbox
	'scale_under' => '960', // textfield
	'content_animation' => '', // dropdown
	'content_animation_duration' => '1000', // textfield
	'content_animation_delay' => '0', // textfield
	'content_animation_threshold' => '0.5',
	// design options
	'caption_horizontal_alignment' => 'center',
	'text_color' => '#FFFFFF',
	// ovrelay
	'overlay_background_color' => 'rgba(0,0,0,0.3)',
	'overlay_background_use_gradient' => '',
	'overlay_background_gradient_end_color' => '',
	'overlay_background_gradient_angle' => '',
	// others
	'el_class' => '', // textfield
	'el_id' => '', // textfield
	'parallax_id' => '', // tab_id
), $atts));

// css ID
	$_css_id = 'parallax-'.TM_Shortcodes::tm_serial_number();

// sanitization
	$column_width = esc_attr($column_width);

// offset
	$column_offset = ($column_offset !=='') ? " offset-".esc_attr($column_offset) : '';

// caption_horizontal_alignment
	$caption_horizontal_alignment = ($caption_horizontal_alignment !== '') ? ' '.esc_attr($caption_horizontal_alignment) : '';

// add spaces for class names
	// height_type
	switch($height_type) {
		case 'use_window_height':
			$height_type = ' window-height';
			break;
		case 'fullscreen':
			$height_type = ' fullscreen';
			break;
		case 'auto':
			$height_type = ' clear-height';
			break;
		case 'custom':
			$height_type = ' fixed-height';
			if($custom_height !== '') {
				TM_Shortcodes::tm_add_inline_css(".{$_css_id} { height: {$custom_height}px; }");
			}
			break;
		case 'default':
		default:
			$height_type = ' fixed-height';
			break;
	}
// add data- for data attributes

// image
	$_image_attributes = TM_Shortcodes::get_image_attributes_by_id($image_source,$image_id,$image_url,TRUE);

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

	if($use_fade !== '') {
		$_data_fade_in_out = " data-fade-in-out='true'";
	} else {
		$_data_fade_in_out = " data-fade-in-out='false'";
	}

// Overlay
	if( !empty($overlay_background_color) ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .media-overlay {".TM_Shortcodes::construct_gradient_css($overlay_background_color,$overlay_background_use_gradient,$overlay_background_gradient_end_color,$overlay_background_gradient_angle)."}");
	}

	if( !empty($text_color) ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .tmp-content * { color: {$text_color}; }");
	}

// Contnet output preparation
	$content = str_replace('[tm_aux_caption','[tm_aux_caption parent="tm_parallax" ',$content);
	// strip stray p's
	$content = TM_Shortcodes::tm_rudementary_p_tag_remover($content);
	// do shortcode
	$_parallaxContent = TM_Shortcodes::tm_do_shortcode($content);
	// construct output
	$_output = "<div class='media-overlay'></div><div class='tmp-content'><div class='tmp-content-inner{$caption_horizontal_alignment}'><div class='row'><div class='column width-{$column_width}{$column_offset}{$_horizon}'>{$_parallaxContent}</div></div></div></div>";
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'skip_row_div' => TRUE,
		);

/* Output */
	TM_Shortcodes::output_shortcode_content('vfx_section', $_output, "parallax{$height_type}" , "{$_image_attributes}{$_data_fade_in_out}", $_args);
