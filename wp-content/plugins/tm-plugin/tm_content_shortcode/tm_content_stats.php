<?php
use ThemeMountain\TM_Shortcodes as TM_Shortcodes;
add_shortcode( 'tm_content_stats', 'tm_content_stats' );
function tm_content_stats($atts, $content, $tagname) {
	// find basename
		if(isset($this)) {
			$_base = $this->settings['base'];
		} else if (isset($tagname)) {
			$_base = $tagname;
		} else {
			$_base = FALSE;
		}

	$_output = $_style = $_mega_menu_class = $_first_row_html = $_second_row_html = $_css_classes = $_boxed = '';

	$_counter_description_enclosure_tag = 'div';

	extract(shortcode_atts(array(
		'margin_bottom' => '30',
		'margin_bottom_mobile' => '30',
		'display_inline' => 'false',
		// stat 1st row
		'stat_from' => '0',
		'stat_to' => '100',
		'stat_measure' => '',
		'description' => '',
		'use_second_row' => '',
		// stat 2nd row
		'stat_from_2nd' => '0',
		'stat_to_2nd' => '100',
		'description_2nd' => '',
		// design option
		'stat_font_size' => '30px',
		'stat_description_font_size' => '14px',
		'stat_color' => '#666666',
		'stat_description_color' => '#666666',
	    'el_class' => '',
	    'is_grid_item' => '',
	    'stat_type' => '',
	    // 'is_mega_menu' => '',
	    'el_id' => '', // textfield
	    'el_class' => '', // textfield
		// box design options
	    'is_boxed' => '',
	    'border_style' => '',
	    'box_size' => 'medium',
	    'background_color' => '',
	    'border_color' => '',
	), $atts));

	// css ID
		$_css_id = 'stats-item-'.TM_Shortcodes::tm_serial_number();

	// add spaces or sanitization
		if($el_class!== '') $el_class = ' '.$el_class;
		if(!empty($stat_measure)) $stat_measure = esc_html($stat_measure);

	//
		$_css_classes = ' in-content';
		if($display_inline === 'true') {
			$_css_classes .= ' no-margins';
		}
		$_counter_description_enclosure_tag = 'span';

	// margin
		if($margin_bottom === 'inherit') {
			$margin_bottom = '';
		} else {
			$margin_bottom = ' mb-'.esc_attr($margin_bottom);
		}
	// margin on mobile
		if($margin_bottom_mobile === 'inherit') {
			$margin_bottom_mobile = '';
		} else {
			$margin_bottom_mobile = ' mb-mobile-'.esc_attr($margin_bottom_mobile);
		}

	// $_boxed
		if($is_boxed === 'true') {
			$_boxed = ' box';
			$_boxed .= ' '.esc_attr($box_size);
			$_boxed .= (!empty($border_style)) ? ' '.esc_attr($border_style) : '';
		}

	// first row
	// description
		$description = ($description !== '') ? "<{$_counter_description_enclosure_tag} class='description'>".urldecode($description)."</{$_counter_description_enclosure_tag}>" : "";
		$_first_row_html = "<{$_counter_description_enclosure_tag} class='counter'><span class='stat-counter{$el_class}' data-count-from='{$stat_from}' data-count-to='{$stat_to}'>{$stat_from}</span>{$stat_measure}</{$_counter_description_enclosure_tag}>{$description}";

	// second row
		if(!empty($use_second_row)) {
			$description_2nd = ($description_2nd !== '') ? "<{$_counter_description_enclosure_tag} class='description'>".urldecode($description_2nd)."</{$_counter_description_enclosure_tag}>" : "";
			$_second_row_html = "<{$_counter_description_enclosure_tag} class='counter'><span class='stat-counter{$el_class}' data-count-from='{$stat_from_2nd}' data-count-to='{$stat_to_2nd}'>{$stat_from_2nd}</span></{$_counter_description_enclosure_tag}>{$description_2nd}";
		}

	// style for stat
		// settings
		if (!empty($stat_font_size)) {
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} .counter { font-size: {$stat_font_size} !important; }");
		}
		if (!empty($stat_color)) {
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} .counter { color: {$stat_color} !important; }");
		}
		if (!empty($stat_description_color)) {
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} .description { color: {$stat_description_color} !important; }");
		}
		if (!empty($stat_description_font_size)) {
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} .description { font-size: {$stat_description_font_size} !important; }");
		}
		// boxed
		if(!empty($background_color)) {
			TM_Shortcodes::tm_add_inline_css(".{$_css_id}.stat.box { background-color: {$background_color}; }");
		}
		if(!empty($border_color)) {
			TM_Shortcodes::tm_add_inline_css(".{$_css_id}.stat.box { border-color: {$border_color}; }");
		}

	// class / id
		$el_class = ($el_class !== '' ) ? ' '.$el_class : '';
		$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);

	// construct output
	$_output = "<span class='{$_css_id} stat{$_boxed}{$_css_classes}{$margin_bottom}{$margin_bottom_mobile}{$el_class}'{$el_id}><span class='stat-inner'>{$_first_row_html}{$_second_row_html}</span></span>";

	if(!empty($is_grid_item)){
		// always for shortcode version (not from the vc)
		// TM_Shortcodes::tm_add_inline_css(".{$_css_id} { display: inline-block; }");
		// TM_Shortcodes::tm_add_inline_css(".{$_css_id} .stat-inner { display: inherit; }");
		if($stat_type =='3' && empty($use_second_row)) $_mega_menu_class = ' mega-stat';
		$_output = "<div class='grid-item{$_mega_menu_class}'>{$_output}</div>";
	}

	/** Output */
	return $_output;
}