<?php
namespace ThemeMountain;

$output = $_css_classes = $_columns_on_tablet_class = '';

extract( shortcode_atts( array(
	'use_navigation' => 'true',
	'slider_id' => '',
	'el_id' => '',
	'el_class' => '',
	// design options
	'pagination_color_1' => '#FFFFFF',
	'pagination_color_2' => '#000000',
), $atts ) );

// css ID
	$_css_id = 'fullscreen-presentation-'.TM_Shortcodes::tm_serial_number();

// $use_navigation
	$use_navigation = ( $use_navigation !=='' ) ? '' : ' no-navigation';

// nav color palette CSS 1
	TM_Shortcodes::tm_add_inline_css("section.$_css_id .fs-bullet-nav { background-color: {$pagination_color_1} }");
// 2
	TM_Shortcodes::tm_add_inline_css("section.$_css_id .nav-dark .fs-bullet-nav { background-color: {$pagination_color_2} }");

	$_sliderContent = TM_Shortcodes::tm_do_shortcode($content); // li block for each slide

// const argument
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'padding_class' => ' pt-0 pb-0',
		'skip_row_div' => TRUE,
		);

/* Output */
	TM_Shortcodes::output_shortcode_content('holder', $_sliderContent, "fullscreen-sections-wrapper{$use_navigation}",'',$_args);
