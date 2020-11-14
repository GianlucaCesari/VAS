<?php
namespace ThemeMountain;

$_output = '';

extract(shortcode_atts(array(
	'height' => 'small', // dropdown. small, window_height, auto, custom
	'height_custom' => '400', // textfield
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'hero_column_width' => '12', // dropdown. uses presets
	'hero_column_offset' => '', // dropdown. uses presets
	'content_animation' => 'fadeIn', // dropdown
	'content_animation_duration' => '1000', // textfield
	'content_animation_delay' => '0', // textfield
	'content_animation_threshold' => '0.5',
	'el_id' => '', // textfield
	'el_class' => '', // textfield
	'text_alignment' => '', // dropdown. left, center, right
	'text_color' => '#FFFFFF', // colorpicker
), $atts));

// css ID
	$_css_id = 'hero-two-'.TM_Shortcodes::tm_serial_number();

// sanitization
	$hero_column_width = esc_attr($hero_column_width);
	if($text_alignment !== '') $text_alignment = ' '.esc_attr($text_alignment);
	$hero_column_offset = ($hero_column_offset !=='') ? " offset-".esc_attr($hero_column_offset) : '';

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

$_heroContent = TM_Shortcodes::tm_do_shortcode($content);

$_output = "<div class='column width-{$hero_column_width}{$hero_column_offset}'><div class='hero-content horizon'{$content_animation}><div class='hero-content-inner{$text_alignment}'>{$_heroContent}</div></div></div>";

// const argument
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'has_non_replicable_content' => TRUE,
		);

	// font_color
	if( $text_color !== '' ) {
		$_args['set_font_color'] = 'true';
		$_args['font_color'] = esc_attr($text_color);
	}

	// image_id. When image_id is 0, there must be error or some sort.
	if($image_source === 'image_url' && !empty($image_url)) {
		$_args['use_background'] = 'true';
		$_args['image_url'] = esc_url($image_url);
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_args['use_background'] = 'true';
		$_args['image_id'] = $image_id;
	}

/* Output */
TM_Shortcodes::output_shortcode_content('hero_section', $_output, "hero-2{$height}" , '', $_args);

