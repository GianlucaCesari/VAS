<?php
namespace ThemeMountain;

$_output = $_push = $_column_num = '';

extract(shortcode_atts(array(
	'height' => 'small', // dropdown. small, window_height, auto, custom
	'height_custom' => '400', // textfield
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'el_id' => '', // textfield
	'el_class' => '', // textfield
	// design options
	'horizontal_alignment_content' => 'left', // dropdown. left, right
	'split_content_bkg_color' => 'rgba(0,0,0,0.5)', // colorpicker
	'background_use_gradient' => '',
	'background_gradient_end_color' => '',
	'background_gradient_angle' => '',
	'text_color' => '#FFFFFF', // colorpicker
	'content_animation' => 'fadeIn', // dropdown
	'content_animation_duration' => '1000', // textfield
	'content_animation_delay' => '0', // textfield
	'content_animation_threshold' => '0.5',
), $atts));

// css ID
	$_css_id = 'hero-4-'.TM_Shortcodes::tm_serial_number();

// add spaces
	if($horizontal_alignment_content === 'left') {
		$_column_num = '5';
		$_push = '';
	} else if($horizontal_alignment_content === 'right') {
		$_column_num = '5';
		$_push = ' push-7';
	}

	$horizontal_alignment_content = ($horizontal_alignment_content !== '') ? ' '.esc_attr($horizontal_alignment_content) : '';

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
				TM_Shortcodes::tm_add_inline_css(".{$_css_id}.section-block { height: {$height_custom}px; }");
			}
			break;
		default: // small
		    $height = '';
			break;
	}

// split_content_bkg_color
	if($split_content_bkg_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} > .row:before {".TM_Shortcodes::construct_gradient_css($split_content_bkg_color,$background_use_gradient,$background_gradient_end_color,$background_gradient_angle)."}");
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

$_output = "<div class='column width-{$_column_num}{$_push}'><div class='hero-content split-hero-content horizon'{$content_animation}><div class='hero-content-inner'>{$_heroContent}</div></div></div>";

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
TM_Shortcodes::output_shortcode_content('hero_section', $_output, "hero-4{$height}{$horizontal_alignment_content}" , '', $_args);

