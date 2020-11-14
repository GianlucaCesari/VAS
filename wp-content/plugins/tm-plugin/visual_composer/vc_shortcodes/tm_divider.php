<?php
namespace ThemeMountain;

	$_output = $_classes = '';

	extract(shortcode_atts(array(
		'show_on' => '',
		'border_style' => 'solid',
		'border_thickness' => 'thin',
	    'border_color' => '#eee',
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

	$_output = "<hr class='{$_css_id} mt-0{$_classes}{$el_class}'>";

/** Output */
	TM_Shortcodes::output_shortcode_content('inline', $_output);