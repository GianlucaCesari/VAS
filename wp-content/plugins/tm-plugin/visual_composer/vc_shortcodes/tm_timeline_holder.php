<?php
namespace ThemeMountain;

$_output = '';

extract(shortcode_atts(array(
	'title' => '', // textfield, not usd in the front end
	'without_indication' => '', // dropdown
	'timeline_alignment' => 'left', // Please update VC timeline element #963
	'el_class' => '', // textfield
	'el_id' => '', // textfield
	// design options
	'border_width' => 'thin', // dropdown
	'dot_bkg_color' => '#fff', // colorpicker
	'dot_border_color' => '#eee', // colorpicker
	'line_bkg_color' => '#eee', // colorpicker
	'date_color' => '#000', // colorpicker
), $atts));

// css ID
	$_css_id = 'tm-timeline-'.TM_Shortcodes::tm_serial_number();

// conversion
	if($el_class!== '') $el_class = ' '.esc_attr($el_class);
	$timeline_alignment = (!empty($timeline_alignment)) ? ' '.esc_attr($timeline_alignment) : '';

	$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);
	$without_indication = (!empty($without_indication)) ? ' no-indication' : '';

// Column settings
	$border_width = ($border_width === 'thick') ? ' thick' : '';

// CSS cue
	// $dot_bkg_color
	if($dot_bkg_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}.timeline .timeline-item:not(.timeline-section):before { background-color: $dot_bkg_color; }");
	}

	// $dot_border_color
	if($dot_border_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}.timeline .timeline-item:not(.timeline-section):before { border-color: $dot_border_color; }");
	}

	// $line_bkg_color
	if($line_bkg_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}.timeline .timeline-item:after { background-color: $line_bkg_color; }");
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}.timeline .timeline-item:before { border-color: $line_bkg_color; }");
	}

	// $date_color
	if($date_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}.timeline .timeline-item .timeline-info { color: $date_color; }");
	}

// Construct output
	$_output = "<ul class='{$_css_id} timeline{$timeline_alignment}{$without_indication}{$border_width}{$el_class}'{$el_id}>".TM_Shortcodes::tm_do_shortcode($content,FALSE).'</ul>';

/* Arguments */
	$_args = array(
		'has_non_replicable_content' => FALSE,
		'skip_row_div' => TRUE,
		);

/* Output */
	TM_Shortcodes::output_shortcode_content('inline_holder', $_output);