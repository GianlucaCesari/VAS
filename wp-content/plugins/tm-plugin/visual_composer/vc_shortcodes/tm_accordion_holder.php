<?php
namespace ThemeMountain;

$_output = $accordion_style_class = '';

$_css_target = array();

extract(shortcode_atts(array(
	'toggle_multiple' => '',
	'accordion_style' => 'default',
	'accordion_size' => '',
	'accordion_border_style' => '',
	'el_class' => '',
	'el_id' => '',
	'use_icon' => '',
	'header_border_color' => '#f4f4f4',
	'header_border_color_active' => '#0cbacf',
	'header_border_color_hover' => '#dddddd',
	'header_background_color' => '#f4f4f4',
	'header_background_color_active' => '#0cbacf',
	'header_background_color_hover' => '#dddddd',
	'header_text_color' => '#666666',
	'header_text_color_active' => '#ffffff',
	'header_text_color_hover' => '#666666',
	'panel_text_color' => '',
	'accordion_content_border_color' => '#eeeeee',
), $atts));

// css ID
	$_css_id = 'accordion-'.TM_Shortcodes::tm_serial_number();

// size & style
	if(!empty($accordion_size)) $accordion_size = ' '.esc_attr($accordion_size);
	if(!empty($accordion_border_style)) $accordion_border_style = ' '.esc_attr($accordion_border_style);
	$el_class = ($el_class !== '' ) ? ' '.esc_attr($el_class) : '';
	$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);
// other static attributes
	if($use_icon !== '' ) $use_icon = ' data-toggle-icon';
	if($toggle_multiple !== '') $toggle_multiple = ' data-toggle-multiple';

// accordion_style
	switch($accordion_style) {
		case 'bordered':
			$accordion_style_class = ' style-1';
			$_css_target = array(
				'header_border_color' => ".{$_css_id}.accordion.style-1 > ul > li > a",
				'header_border_color_active' => ".{$_css_id}.accordion.style-1 > ul > li.active > a",
				'header_border_color_hover' => ".{$_css_id}.accordion.style-1 > ul > li > a:hover",
				'header_text_color' => ".{$_css_id}.accordion.style-1 > ul > li > a",
				'header_text_color_active' => ".{$_css_id}.accordion.style-1 > ul > li.active > a",
				'header_text_color_hover' => ".{$_css_id}.accordion.style-1 > ul > li > a:hover",
				'panel_text_color' => ".{$_css_id}.accordion.style-1 .accordion-content",
				'accordion_content_border_color' => ".{$_css_id}.accordion.style-1 > ul > li > div",
				);
			break;
		case 'line':
			$accordion_style_class = ' style-2';
			$_css_target = array(
				'header_border_color' => ".{$_css_id}.accordion.style-2 > ul > li > a, .{$_css_id}.accordion.style-2 > ul > li.active > div",
				'header_border_color_active' => ".{$_css_id}.accordion.style-2 > ul > li.active > a",
				'header_border_color_hover' => ".{$_css_id}.accordion.style-2 > ul > li > a:hover",
				'header_text_color' => ".{$_css_id}.accordion.style-2 > ul > li > a",
				'header_text_color_active' => ".{$_css_id}.accordion.style-2 > ul > li.active > a",
				'header_text_color_hover' => ".{$_css_id}.accordion.style-2 > ul > li > a:hover",
				'panel_text_color' => ".{$_css_id}.accordion.style-2 .accordion-content",
				'accordion_content_border_color' => ".{$_css_id}.accordion.style-2 > ul > li > div",
				);
			$accordion_border_style = '';
			break;
		default:
			$_css_target = array(
				'header_background_color' => ".{$_css_id}.accordion > ul > li > a",
				'header_background_color_active' => ".{$_css_id}.accordion > ul > li.active > a, .{$_css_id}.accordion > ul > li.active > a:hover",
				'header_background_color_hover' => ".{$_css_id}.accordion ul > li > a:hover",
				'header_border_color' => ".{$_css_id}.accordion > ul > li > a",
				'header_border_color_active' => ".{$_css_id}.accordion > ul > li.active > a, .{$_css_id}.accordion > ul > li.active > a:hover",
				'header_border_color_hover' => ".{$_css_id}.accordion > ul > li > a:hover",
				'header_text_color' => ".{$_css_id}.accordion > ul > li > a",
				'header_text_color_active' => ".{$_css_id}.accordion > ul > li.active > a, .{$_css_id}.accordion > ul > li.active > a:hover",
				'header_text_color_hover' => ".{$_css_id}.accordion > ul > li > a:hover",
				'panel_text_color' => ".{$_css_id}.accordion .accordion-content",
				'accordion_content_border_color' => ".{$_css_id}.accordion > ul > li > div",
				);
			break;

	}


// style settings tab buttons
	// background, active, hover
	if ( $header_background_color !== '' && isset($_css_target['header_background_color'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['header_background_color']." {background-color:$header_background_color;}");
	}
	if ( $header_background_color_hover !== '' && isset($_css_target['header_background_color_hover'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['header_background_color_hover']." {background-color:$header_background_color_hover;}");
	}
	if ( $header_background_color_active !== '' && isset($_css_target['header_background_color_active'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['header_background_color_active']." {background-color:$header_background_color_active;}");
	}
	// border, active, hover
	if ( $header_border_color !== '' && isset($_css_target['header_border_color'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['header_border_color']." {border-color:$header_border_color;}");
	}
	if ( $header_border_color_hover !== '' && isset($_css_target['header_border_color_hover'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['header_border_color_hover']." {border-color:$header_border_color_hover;}");
	}
	if ( $header_border_color_active !== '' && isset($_css_target['header_border_color_active'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['header_border_color_active']." {border-color:$header_border_color_active;}");
	}
	// button text, active, hover
	if ( $header_text_color !== '' && isset($_css_target['header_text_color'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['header_text_color']." {color:$header_text_color;}");
	}
	if ( $header_text_color_hover !== '' && isset($_css_target['header_text_color_hover'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['header_text_color_hover']." {color:$header_text_color_hover;}");
	}
	if ( $header_text_color_active !== '' && isset($_css_target['header_text_color_active'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['header_text_color_active']." {color:$header_text_color_active;}");
	}
	// style settings tab panel
	if ( $panel_text_color !== '' && isset($_css_target['panel_text_color'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['panel_text_color']." {color:$panel_text_color;}");
	}

	// accordion_content_border_color
	if ( $accordion_content_border_color !== '' && isset($_css_target['accordion_content_border_color'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['accordion_content_border_color']." {border-color:{$accordion_content_border_color};}");
	}

$_accordionContent = TM_Shortcodes::tm_do_shortcode($content);
// remove strange p tags
$_accordionContent = str_replace('<p><li', '<li', $_accordionContent);
$_accordionContent = str_replace('</li></p>', '</li>', $_accordionContent);

$_output = "<div class='accordion {$_css_id}{$accordion_style_class}{$accordion_size}{$accordion_border_style}{$el_class}'{$toggle_multiple}{$use_icon}{$el_id}><ul>{$_accordionContent}</ul></div>";

/* Output */
	TM_Shortcodes::output_shortcode_content('inline_holder', $_output);
