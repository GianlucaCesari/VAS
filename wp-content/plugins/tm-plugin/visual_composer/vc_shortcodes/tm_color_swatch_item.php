<?php
namespace ThemeMountain;
/**
 * tm_color_swatch_item
 */
extract(shortcode_atts(array(
	'show_title' => TRUE, // checkbox
	'title' => '', // textfield
	'show_hex' => TRUE, // checkbox TRUE
	'hex_reference' => '', // textfield
	'el_id' => '', // textfield
	'el_class' => '', // textfield
	/* Design Options */
	'title_color' => '#000000', // colorpicker #000000
	'swatch_background_color' => '#666666', // colorpicker #666666
	'swatch_border_color' => '#666666', // colorpicker #666666
	'swatch_icon_color' => '#ffffff', // colorpicker #ffffff
	'swatch_style' => 'icon-boxed', // dropdown .icon-boxed,.icon-circled
	'hex_reference_color' => '#999999', // colorpicker #999999
), $atts));

// css ID
	$_css_id = 'color-swatch-'.TM_Shortcodes::tm_serial_number();

// attributes sanitization
	$swatch_style = esc_attr($swatch_style);

// show_title
if($show_title !== '') {
	$title = "<h5>".TM_Shortcodes::tm_wp_kses($title)."</h5>";
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} h5 { color:{$title_color} !important; }");
} else {
	$title = "";
}

// show_hex
if($show_hex !== '') {
	$hex_reference = "<p class='no-margin-bottom'><small>".TM_Shortcodes::tm_wp_kses($hex_reference)."</small></p>";
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} small { color:{$hex_reference_color} !important; }");
} else {
	$hex_reference = "";
}

// css
TM_Shortcodes::tm_add_inline_css(".{$_css_id} span:before { color:{$swatch_icon_color}; }");
TM_Shortcodes::tm_add_inline_css(".{$_css_id} span { background-color:{$swatch_background_color}; }");
TM_Shortcodes::tm_add_inline_css(".{$_css_id} span { border-color:{$swatch_border_color}; }");

$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);

$_output = "<li {$el_id}><div class='{$_css_id} project-swatch center'>{$title}<span class='{$swatch_style} icon-dot-single no-margin-right'></span>{$hex_reference}</div></li>";

/** Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);