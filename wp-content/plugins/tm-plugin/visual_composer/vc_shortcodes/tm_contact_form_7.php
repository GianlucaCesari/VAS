<?php
namespace ThemeMountain;
extract(shortcode_atts(array(
	'id' => '',
	'title' => '',
), $atts));

// css ID
	$_css_id = 'contact-form-7-'.TM_Shortcodes::tm_serial_number();

// const argument
	$_args = array(
		'css_id' => $_css_id,
		);

	$content = TM_Shortcodes::tm_do_shortcode("[contact-form-7 id='{$id}' title='{$title}']");
/* Output */
	TM_Shortcodes::output_shortcode_content('section', $content, '', '', $_args);
