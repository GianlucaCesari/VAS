<?php
namespace ThemeMountain;

$_output = $_clients_content = $_css_classes = $_use_background = '';

extract(shortcode_atts(array(
	'items_per_row' => '4', // dropdown 3 4 5 6
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'tab_id' => '', // textfield
	'el_id' => '', // textfield
	'el_class' => '', // textfield
	// Design Options
	'client_name_color' => 'rgba(0,0,0,1)', // colorpicker
	'client_description_color' => 'rgba(0,0,0,0.7)', // colorpicker
), $atts));

// css ID
	$_css_id = 'clients-'.TM_Shortcodes::tm_serial_number();

// attributes sanitization
	$items_per_row = esc_attr($items_per_row);

// css
	// client-name
	TM_Shortcodes::tm_add_inline_css(".{$_css_id}.section-block .client-name { color: {$client_name_color}; }");
	// .client-description
	TM_Shortcodes::tm_add_inline_css(".{$_css_id}.section-block .client-description { color: {$client_description_color}; }");
	// specify inherit
	TM_Shortcodes::tm_add_inline_css(".section-block .{$_css_id}.section-block { background-color: inherit; }");

// Contents - do not sanitize. sanitization taken care in the item side.
	$_clients_content = TM_Shortcodes::tm_do_shortcode($content);

$_output = "<div class='column width-12'><div class='row content-grid-{$items_per_row} flex'>{$_clients_content}</div></div>";

// bkg image
	// if (!empty($image_url) || !empty($image_id)) {
		$_use_background = 'true';
	// }

// const argument
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'use_background'=>esc_attr($_use_background),
		'equalize' => ' flex',
		);

	if($image_source === 'image_url') {
		$_args['image_url'] = esc_url($image_url);
	} else if($image_source === 'image_id') {
		$_args['image_id'] = $image_id;
	}

/* Output */
	TM_Shortcodes::output_shortcode_content('holder', $_output, 'clients-1 replicable-content' , '', $_args);
