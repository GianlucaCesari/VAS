<?php
use ThemeMountain\TM_Shortcodes as TM_Shortcodes;
/**
 * tm_content_divider shortcode.
 *
 * This is for content shortcode. Not available as a VC element
 */
add_shortcode( 'tm_content_divider', 'tm_content_divider' );
function tm_content_divider($atts, $content, $tagname) {
	$_output = $_classes = '';

	extract(shortcode_atts(array(
		'show_on' => '',
		'border_style' => 'solid',
		'border_thickness' => 'thin',
	    'border_color' => '#eee',
	    'el_id' => '', // textfield
	    'el_class' => '', // textfield
	), $atts));

	// css ID
		$_css_id = 'tm-content-divider-'.TM_Shortcodes::tm_serial_number();

	// border_style
		if(!empty($border_style)) {
			$_classes .= ' '.$border_style;
		}
	// border_thickness
		if(!empty($border_thickness)) {
			$_classes .= ' '.$border_thickness;
		}

	// show_on
		$_classes .= ' '.$show_on;

	// css
		if($border_color !==''){
			TM_Shortcodes::tm_add_inline_css("hr.{$_css_id} { border-color:{$border_color}; }");
		}

	// class / id
		$el_class = ($el_class !== '' ) ? ' '.$el_class : '';
		$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);

	$_output = "<hr class='{$_css_id} mt-0{$_classes}{$el_class}'{$el_id}>";

	return $_output;
}