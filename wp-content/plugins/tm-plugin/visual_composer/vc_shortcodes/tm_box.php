<?php
namespace ThemeMountain;

$_style = $_output = '';

extract(shortcode_atts(array(
	'is_dismissable' => '',
	'type' => 'info',
	'size' => 'medium',
	'box_top_bottom_padding' => '15',
	'box_left_right_padding' => '15',
	// background / overlay
	'background_color' => '',
	'background_use_gradient' => '',
	'background_gradient_end_color' => '',
	'background_gradient_angle' => '',
	// other color
	'border_color' => '',
	'text_color' => '',
	'border_style' => '',
    'el_class' => '',
), $atts));

/** CSS ID */
	$_css_id = 'tm_box-'.TM_Shortcodes::tm_serial_number();

// label
	if($is_dismissable !== '') {
		$is_dismissable = '<a href="" class="close icon-cancel"></a>';
		$dismissable = ' dismissable';
	} else {
		$dismissable = '';
	}

// style settings
	// set background color only when type is custom
	if( $type == 'custom') {
		if ($background_color !== '' ) {
			$_style .= TM_Shortcodes::construct_gradient_css($background_color,$background_use_gradient,$background_gradient_end_color,$background_gradient_angle);
		}
		// border color
		if ( $border_color !== '' ) {
			$_style .= "border-color:$border_color;";
		}
		// font color
		if ( $text_color !== '' ) {
			$_style .= "color:$text_color;";
		}
	}

// wrap around if style is set
	if( $_style !== '' ) {
		$_style = ' style="'.$_style.'"';
	}

// add spaces
	if($el_class!== '') $el_class = ' '.esc_attr($el_class);
	if($type !== '') $type = ' '.esc_attr($type);

	if($size === 'custom') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}.box.size-custom { padding: {$box_top_bottom_padding}px {$box_left_right_padding}px; }");
		$size = ' size-custom';
	} else if(!empty($size)) {
		$size = ' '.$size;
	}

	if($border_style !== '') $border_style = ' '.esc_attr($border_style);

$_boxContent = TM_Shortcodes::tm_do_shortcode($content);

$_output = "<div class='{$_css_id} box{$size}{$type}{$border_style}{$dismissable}{$el_class}'{$_style}>{$is_dismissable}{$_boxContent}</div>";

/** Output */
	TM_Shortcodes::output_shortcode_content('inline', $_output);