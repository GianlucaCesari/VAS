<?php
namespace ThemeMountain;

$_output = '';

extract(shortcode_atts(array(
    'title' => '',
    'is_active' => '',
    'accordion_id' => '',
), $atts));

// attrinutes
	if($is_active !== ''){
		$is_active = ' class="active"';
	}
	$accordion_id = esc_attr($accordion_id);
	$title = TM_Shortcodes::tm_wp_kses($title);

// content
	$_accordionItemContent = TM_Shortcodes::tm_do_shortcode($content);

	$_output = "<li{$is_active}><a class='accordion-header' href='#accordion-{$accordion_id}'>{$title}</a><div id='accordion-{$accordion_id}'><div class='accordion-content'>{$_accordionItemContent}</div></div></li>";

/** Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);