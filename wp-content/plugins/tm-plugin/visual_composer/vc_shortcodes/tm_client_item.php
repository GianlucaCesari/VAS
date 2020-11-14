<?php
namespace ThemeMountain;

$_output = '';
extract(shortcode_atts(array(
	'title' => '', // textfield
	'client_description' => '', // textfield
	'el_class' => '',
), $atts));

// add spaces for class names
	$el_class = ($el_class!== '') ? ' '.esc_attr($el_class) : '';
	$title = TM_Shortcodes::tm_wp_kses($title);
	$content = wp_strip_all_tags(TM_Shortcodes::tm_do_shortcode($content));

// construct output
	$_output = "<div class='grid-item{$el_class}'><h5 class='client-name'>{$title}</h5><span class='client-description'>{$content}</span></div>";

/* Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);