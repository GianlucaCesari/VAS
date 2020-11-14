<?php
namespace ThemeMountain;
/**
 * tm_color_swatch_holder
 */
extract(shortcode_atts(array(
	'swatch_list_alignment' => '', // left, center. right
	'el_id' => '', // textfield
	'el_class' => '', // textfield
), $atts));

$swatch_list_alignment = ($swatch_list_alignment!=='') ? ' '.esc_attr($swatch_list_alignment) : '';
$el_class = ($el_class!=='') ? ' '.esc_attr($el_class) : '';
$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);

// Contents - do not sanitize. sanitization taken care in the item side.
$_swatchContent = TM_Shortcodes::tm_do_shortcode($content, FALSE);

/* Output */
	$_output = "<ul class='list-horizontal project-swatch-list center-on-mobile{$el_class}{$swatch_list_alignment}'{$el_id}>{$_swatchContent}</ul>";
	TM_Shortcodes::output_shortcode_content('inline_holder', $_output);
