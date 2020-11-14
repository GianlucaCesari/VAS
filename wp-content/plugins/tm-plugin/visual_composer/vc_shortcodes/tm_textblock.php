<?php
namespace ThemeMountain;

extract(shortcode_atts(array(
	'el_class' => '',
), $atts));


// css ID
	$_css_id = 'tm_textblock-'.TM_Shortcodes::tm_serial_number();

// const argument
	$_args = array(
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		// 'use_background'=>'true',
		// 'background_color' => 'transparent',
		// 'image_id' => '',
		);

// do shortcode with object buffering

	ob_start();
		echo do_shortcode($content);
	$content = ob_get_clean();

// P issue workaround
	$content = TM_Shortcodes::tm_rudementary_p_tag_remover($content);
	$content = TM_Shortcodes::try_to_close_tags_in_a_textblock($content);

/* Output */
	TM_Shortcodes::output_shortcode_content('inline', $content, '', '', $_args);

