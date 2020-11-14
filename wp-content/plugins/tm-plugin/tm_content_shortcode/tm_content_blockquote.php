<?php
use ThemeMountain\TM_Shortcodes as TM_Shortcodes;
add_shortcode( 'tm_content_blockquote', 'tm_content_blockquote' );
function tm_content_blockquote($atts, $content, $tagname) {
	// find basename
	if(isset($this)) {
		$_base = $this->settings['base'];
	} else if (isset($tagname)) {
		$_base = $tagname;
	} else {
		$_base = FALSE;
	}

	$class = $_output = $_css_id = $avatar_image_html = '';
	$_class_array = array();

	extract(shortcode_atts(array(
		'el_class' => '',
		'el_id' => '',
		'quote' => '',
	    'cite' => '',
	    'float' => '',
	    'type' => '',
	    'icon_id' => 'entypo-icon entypo-icon-quote',
	    'icon_color' => '#666',
	    'border_color' => '#666',
	    'avatar_image' => '',
	    'avatar_image_id' => '',
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
				if($avatar_image !== ''){
					$avatar_image_html = "<span>".TM_Shortcodes::generate_image_tag_from_id($avatar_image,$cite)."</span>";
				} else if ($avatar_image_id !== '') {
					$avatar_image_html = "<span>".wp_get_attachment_image($avatar_image_id, 'full', false)."</span>";
				} else {
					$avatar_image_html = '';
				}
				array_push($_class_array, 'avatar');
				break;
			case 'icon':
				if($icon_id !== '') {
					$icon_id = str_replace('entypo-icon entypo-','',$icon_id);
					array_push($_class_array, 'icon');
				}
				if(!empty($icon_color)) {
					TM_Shortcodes::tm_add_inline_css(".{$_css_id} span[class^=icon-] { color: {$icon_color}; }");
				}
				break;
			case 'border':
				array_push($_class_array,'border');
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
			if($el_class!=='') $class .= ' '.$el_class;
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

	// construct output
	$_output = "<blockquote class='{$_css_id} {$class}'{$el_id}>";
	if($type === 'icon') $_output .= "<span class='{$icon_id}'></span>";
	if($avatar_image_html !== '') $_output .= $avatar_image_html;
	$_output .= '<p>'.$quote.'</p>';
	if($cite !== '') $_output .= '<cite>'.urldecode($cite).'</cite>';
	$_output .= '</blockquote>';
	/** Output */
	return $_output;
}