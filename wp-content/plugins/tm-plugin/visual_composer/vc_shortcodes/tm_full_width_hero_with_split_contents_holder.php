<?php
/**
 * Hero 4 with 2 columns
 */
namespace ThemeMountain;

$_hero_content = $_css_classes = $_use_background = $_height_class = '';

extract(shortcode_atts(array(
	'height' => 'small', // dropdown. small, window_height, auto, custom
	'height_custom' => '400', // textfield
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'el_id' => '', // textfield
	'el_class' => '', // textfield
	// design options
	'split_content_bkg_color' => 'rgba(0,0,0,0.5)', // colorpicker
	'background_use_gradient' => '',
	'background_gradient_end_color' => '',
	'background_gradient_angle' => '',
), $atts));

// css ID
	$_css_id = 'tm_full_width_hero_with_split_contents_holder-'.TM_Shortcodes::tm_serial_number();

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

// split_content_bkg_color
	if($split_content_bkg_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} > .row:before {".TM_Shortcodes::construct_gradient_css($split_content_bkg_color,$background_use_gradient,$background_gradient_end_color,$background_gradient_angle)."}");
	}

// Hero Content
	preg_match_all( '/(\[tm_full_width_hero_with_split_contents_item.*?\/tm_full_width_hero_with_split_contents_item\])/is', $content, $matches, PREG_OFFSET_CAPTURE );
	if(is_array($matches) && !empty($matches[1][0])) {
		// set column index because text color css selector needs to be different
		$matches[1][0][0] = str_replace('[tm_full_width_hero_with_split_contents_item ', '[tm_full_width_hero_with_split_contents_item column_index="0" parent_css_id="'.$_css_id.'" ', $matches[1][0][0]);
		$_hero_content .= '<div class="column width-5">'.TM_Shortcodes::tm_do_shortcode($matches[1][0][0]).'</div>';
		if(!empty($matches[1][1])) {
			// set column index because text color css selector needs to be different
			$matches[1][1][0] = str_replace('[tm_full_width_hero_with_split_contents_item ', '[tm_full_width_hero_with_split_contents_item column_index="1" parent_css_id="'.$_css_id.'" ', $matches[1][1][0]);
			$_hero_content .= '<div class="column width-5 push-2">'.TM_Shortcodes::tm_do_shortcode($matches[1][1][0]).'</div>';
		}
	}

// const argument
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'has_non_replicable_content' => TRUE,
		);

	// image_id. When image_id is 0, there must be error or some sort.
	if($image_source === 'image_url' && !empty($image_url)) {
		$_args['use_background'] = 'true';
		$_args['image_url'] = esc_url($image_url);
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_args['use_background'] = 'true';
		$_args['image_id'] = $image_id;
	}

/* Output */
	TM_Shortcodes::output_shortcode_content('hero_section', $_hero_content, "hero-4{$_height_class}" , '', $_args);
