<?php
namespace ThemeMountain;

$_output = $_blockquote = $_avatar_image_html = $_el_id = $_boxed_testimonial_class = $_classes = '';
$_class_array = array();

extract( shortcode_atts( array(
	'title' => '',
	'column_width' => '12',
	'column_offset' => '',
	'el_id' => '',
	'el_class' => '',
	// Background color
	'background_color' => '#FFFFFF',
	// boxed testimonial (#1025)
	'boxed_testimonial' => '',
	// blockquote options
    'float' => '',
    'type' => '',
    'icon_id' => 'entypo-icon entypo-icon-quote',
    'icon_color' => '#666',
    'border_color' => '#666',
    'image_source' => 'image_id',
    'image_id' => '',
    'image_url' => '',
    'alignment' => 'center',
    'size' => 'medium',
    /* color */
    'box_background_color' => '', // #1025
    'box_border_color' => '',
    'box_border_style' => '', // end #1025
    'quote_color' => '',
	'cite_color' => '',
), $atts ) );

// css ID
	$_css_id = 'testimonial-item-'.TM_Shortcodes::tm_serial_number();

// sanitization / conversion
	$_el_id = (!empty($el_id)) ? ' data-custom-id="'.esc_attr($el_id).'"' : '';

// column
	$column_width = esc_attr($column_width);
	$column_offset = ($column_offset !=='') ? " offset-".esc_attr($column_offset) : '';

// type
	switch($type) {
		case 'avatar':
			if($image_source == 'image_url'){
				$_avatar_image_html = "<span>".TM_Shortcodes::generate_image_tag_from_id($image_url,$title)."</span>";
			} else if ($image_source == 'image_id' && $image_id !== '') {
				$_avatar_image_html = "<span>".TM_Shortcodes::generate_image_tag_from_id($image_id,$title)."</span>";
			} else {
				$_avatar_image_html = '';
			}
			array_push($_class_array, 'avatar');
			break;
		case 'icon':
			if($icon_id !== '') {
				$icon_id = str_replace('entypo-icon entypo-','',esc_attr($icon_id));
				array_push($_class_array, 'icon');
			}
			if(!empty($icon_color)) {
				TM_Shortcodes::tm_add_inline_css(".{$_css_id} span[class^=icon-] { color: {$icon_color}; }");
			}
			break;
		case 'border':
			array_push($_class_array, 'border');
			if(!empty($border_color)) {
				TM_Shortcodes::tm_add_inline_css(".{$_css_id}.border, .{$_css_id}.border.center, .{$_css_id}.border.right { border-color: {$border_color}; }");
			}
			break;
	}

// alignment
	if(isset($float) && $float !== '') {
		array_push($_class_array, $float);
	}
	if(isset($alignment) && $alignment !== '') {
		array_push($_class_array, $alignment);
	}
	if(isset($size) && $size !== '') {
		array_push($_class_array, $size);
	}

// el_class
	if($el_class!=='') $el_class .= ' '.esc_attr($el_class);

// add class
	if(!empty($_class_array)) {
		$_classes = implode(' ',$_class_array);
		if($_classes!=='') $_classes .= ' '.esc_attr($_classes);
	}

// boxed testimonial
	if(!empty($boxed_testimonial)){
		$_boxed_testimonial_class = ' box';
		if($box_border_style === 'rounded'){
			$_boxed_testimonial_class .= ' rounded';
		}
		// css for the boxed testimonial
		if($box_background_color !== ''){
			TM_Shortcodes::tm_add_inline_css(".{$_css_id}.box { background-color: {$box_background_color}; }");
		}
		if($box_border_color !== ''){
			TM_Shortcodes::tm_add_inline_css(".{$_css_id}.box { border-color: {$box_border_color}; }");
		}
	}

// design options
	// color
	if($quote_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} p, .{$_css_id} span { color: {$quote_color}; }");
	}
	if($cite_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} cite { color: {$cite_color}; }");
	}

// id attribute
	$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);

// construct $_blockquote
	$_blockquote = "<blockquote class='{$_css_id}{$_boxed_testimonial_class}{$_classes}'>";
	if($type === 'icon') $_blockquote .= "<span class='{$icon_id}'></span>";
	if($_avatar_image_html !== '') $_blockquote .= $_avatar_image_html;
	$content = TM_Shortcodes::tm_do_shortcode($content);
	if(TM_Shortcodes::has_html_tags($content) === FALSE) {
		$_blockquote .= '<p>'.TM_Shortcodes::tm_do_shortcode($content,FALSE).'</p>';
	} else {
		$_blockquote .= TM_Shortcodes::tm_do_shortcode($content,FALSE);
	}
	if($title !== '') $_blockquote .= '<cite>'.urldecode($title).'</cite>';
	$_blockquote .= '</blockquote>';

$_output = "<li class='tms-slide{$el_class} {$_css_id}'{$el_id} data-image{$_el_id}><div class='tms-content-scalable'><div class='row'><div class='column width-{$column_width}{$column_offset}'>{$_blockquote}</div></div></div></li>";

/** Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);
