<?php
/**
 * Hero 4 with 2 columns
 */
namespace ThemeMountain;

$_output = $_hero_content = $_css_classes = $_use_background = $_height_class = $_media_column = '';

extract(shortcode_atts(array(
	'height' => 'small', // dropdown. small, window_height, auto, custom
	'height_custom' => '400', // textfield
	'el_id' => '', // textfield
	'el_class' => '', // textfield
), $atts));

// css ID
	$_css_id = 'tm_split_hero_with_split_contents_holder-'.TM_Shortcodes::tm_serial_number();

// height
	switch($height) {
		case 'window_height':
			$_height_class = ' window-height';
			break;
		case 'auto':
			$_height_class = ' clear-height';
			break;
		case 'custom':
			$_height_class = '';
			if($height_custom !== '') {
				TM_Shortcodes::tm_add_inline_css(".{$_css_id}.section-block { height: {$height_custom}px; }");
			}
			break;
		default: // small
		    $height = '';
			break;
	}

// Media Column, Media Overlay
	$_media_column .= '<div class="media-column width-6"><div class="media-overlay"></div></div><div class="media-column width-6"><div class="media-overlay"></div></div>';

// Hero Content
	preg_match_all( '/(\[tm_split_hero_with_split_contents_item.*?\/tm_split_hero_with_split_contents_item\])/si', $content, $matches, PREG_OFFSET_CAPTURE );
	if(is_array($matches) && !empty($matches[1][0])) {
		// set column index because text color css selector needs to be different
		$matches[1][0][0] = str_replace('[tm_split_hero_with_split_contents_item ', '[tm_split_hero_with_split_contents_item column_index="0" parent_css_id="'.$_css_id.'" ', $matches[1][0][0]);
		$_hero_content .= '<div class="column width-5">'.TM_Shortcodes::tm_do_shortcode($matches[1][0][0]).'</div>';
		if(!empty($matches[1][1])) {
			// set column index because text color css selector needs to be different
			$matches[1][1][0] = str_replace('[tm_split_hero_with_split_contents_item ', '[tm_split_hero_with_split_contents_item column_index="1" parent_css_id="'.$_css_id.'" ', $matches[1][1][0]);
			$_hero_content .= '<div class="column width-5 push-2">'.TM_Shortcodes::tm_do_shortcode($matches[1][1][0]).'</div>';
		}
	}

// put together into output
	$_output = $_media_column.'<div class="row">'.$_hero_content.'</div>';

// const argument
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'use_background'=>TRUE,
		'skip_row_div' => TRUE,
		'has_non_replicable_content' => TRUE,
		);

/* Output */
	TM_Shortcodes::output_shortcode_content('hero_section', $_output, "hero-5{$_height_class}" , '', $_args);
