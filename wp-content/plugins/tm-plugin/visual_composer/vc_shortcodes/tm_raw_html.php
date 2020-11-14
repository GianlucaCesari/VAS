<?php
namespace ThemeMountain;
extract(shortcode_atts(array(
	'el_class' => '',
), $atts));

// css ID
	$_css_id = 'tm_raw_html-'.TM_Shortcodes::tm_serial_number();

// const argument
	$_args = array(
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		);

// decode
	$content = rawurldecode( base64_decode( strip_tags( $content ) ) );

/* Output */
	TM_Shortcodes::output_shortcode_content('inline', $content, '', '', $_args);
