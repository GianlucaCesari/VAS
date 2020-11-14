<?php
namespace ThemeMountain;

$_output = '';

extract(shortcode_atts(array(
	'height' => 'small', // dropdown. small, window_height, auto, custom
	'height_custom' => '400', // textfield
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'hero_column_width' => '5', // dropdown. uses presets
	'hero_column_offset' => '',
	'content_animation' => 'fadeIn', // dropdown
	'content_animation_duration' => '1000', // textfield
	'content_animation_delay' => '0', // textfield
	'content_animation_threshold' => '0.5',
	'el_id' => '', // textfield
	'el_class' => '', // textfield
	// design options
	'horizontal_alignment_content' => 'left', // dropdown. left, center, right
	'vertical_alignment_content' => 'bottom', // dropdown. top, middle, bottom
	'content_padding' => '30',
	'content_bkg_color' => 'rgba(255,255,255,1)', // colorpicker
	'background_use_gradient' => '',
	'background_gradient_end_color' => '',
	'background_gradient_angle' => '',
	'content_border_color' => '#333', // colorpicker
	'text_color' => '#666', // colorpicker
), $atts));

// css ID
	$_css_id = 'hero-three-'.TM_Shortcodes::tm_serial_number();

// sanitization
	$hero_column_width = esc_attr($hero_column_width);
	$hero_column_offset = ($hero_column_offset !=='') ? " offset-".esc_attr($hero_column_offset) : '';

// add spaces
	$horizontal_alignment_content = ($horizontal_alignment_content !== '') ? ' '.$horizontal_alignment_content : '';
	$vertical_alignment_content = ($vertical_alignment_content !== '') ? ' '.$vertical_alignment_content : '';

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

// hero-content
	// border color
	if ( $content_bkg_color !== '' ) {
		$_content_bkg_color_css = TM_Shortcodes::construct_gradient_css($content_bkg_color,$background_use_gradient,$background_gradient_end_color,$background_gradient_angle,TRUE);
		if(!empty($background_use_gradient)) {
			$_content_bkg_color_css .= " background: none;";
		}
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}.section-block .hero-content {".$_content_bkg_color_css."}");
	}
	if ( $content_border_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}.section-block .hero-content { border-color: {$content_border_color}; }");
	}

	if ( $content_padding !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .hero-content-inner { padding: {$content_padding}px; }");
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

$_output = "<div><div class='row'><div class='column width-{$hero_column_width}{$hero_column_offset}'><div class='hero-content horizon'{$content_animation}><div class='hero-content-inner'>{$_heroContent}</div></div></div></div></div>";

// const argument
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'force_fullwidth' => TRUE,
		'skip_row_div' => TRUE,
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
TM_Shortcodes::output_shortcode_content('hero_section', $_output, "hero-3{$height}{$horizontal_alignment_content}{$vertical_alignment_content}" , '', $_args);
