<?php
use ThemeMountain\TM_Shortcodes as TM_Shortcodes;
/**
 * "Social Share" shortcode.
 *
 * This is for content shortcode. Not available as a VC element
 */
add_shortcode( 'tm-contact-form-7', 'tm_contact_form_7' );
function tm_contact_form_7($atts, $content, $tagname) {
	$_output = $_shortcode = '';
	extract(shortcode_atts(array(
		'id' => '',
		'title' => '',
	), $atts));

	$_shortcode = "[contact-form-7 id='{$id}' title='{$title}']";

	$_output = TM_Shortcodes::tm_do_shortcode($_shortcode);

	return $_output;
}