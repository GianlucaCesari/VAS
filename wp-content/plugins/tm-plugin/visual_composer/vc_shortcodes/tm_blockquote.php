<?php
namespace ThemeMountain;

// find basename
	if(isset($this)) {
		$_base = $this->settings['base'];
	} else if (isset($tagname)) {
		$_base = $tagname;
	} else {
		$_base = FALSE;
	}

$class = $_output = $_css_id = $_avatar_image_html = '';
$_class_array = array();

extract(shortcode_atts(array(
	'el_class' => '',
	'quote' => '',
    'cite' => '',
    'float' => '',
    'type' => '',
    'icon_id' => 'entypo-icon entypo-icon-quote',
    'icon_color' => '#666',
    'border_color' => '#666',
    'image_source' => 'image_id',
    'image_id' => '',
    'image_url' => '',
    'alignment' => 'left',
    'size' => 'medium',
    /* color */
    'quote_color' => '',
	'cite_color' => '',
), $atts));

// css ID
	$_css_id = 'blockquote-'.TM_Shortcodes::tm_serial_number();

// type
	switch($type) {
		case 'avatar':
			if($image_source == 'image_url'){
				$_avatar_image_html = "<span>".TM_Shortcodes::generate_image_tag_from_id($image_url,$cite)."</span>";
			} else if ($image_source == 'image_id' && $image_id !== '') {
				$_avatar_image_html = "<span>".wp_get_attachment_image($image_id, 'full', false)."</span>";
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
	if($float !== '') {
		array_push($_class_array, $float);
	}
	if($alignment !== '') {
		array_push($_class_array, $alignment);
	}
	if($size !== '') {
		array_push($_class_array, $size);
	}

// add class
	if(!empty($_class_array)) {
		$class = implode(' ',$_class_array);
		if($el_class!=='') $class .= ' '.esc_attr($el_class);
	}

// design options
	// color
	if($quote_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} p, .{$_css_id} span { color: {$quote_color}; }");
	}
	if($cite_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} cite { color: {$cite_color}; }");
	}

// construct output
	$_output = "<blockquote class='{$_css_id} {$class}'>";
	if($type === 'icon') $_output .= "<span class='{$icon_id}'></span>";
	if($_avatar_image_html !== '') $_output .= $_avatar_image_html;
	// quote text
	$quote = TM_Shortcodes::tm_rudementary_p_tag_remover(TM_Shortcodes::tm_do_shortcode($quote));
	if(TM_Shortcodes::has_html_tags($quote) === FALSE) {
		$_output .= '<p>'.TM_Shortcodes::tm_do_shortcode($quote).'</p>';
	} else {
		$_output .= TM_Shortcodes::tm_do_shortcode($quote);
	}
	if($cite !== '') $_output .= '<cite>'.urldecode($cite).'</cite>';
	$_output .= '</blockquote>';

/** Output */
TM_Shortcodes::output_shortcode_content('inline', $_output);

