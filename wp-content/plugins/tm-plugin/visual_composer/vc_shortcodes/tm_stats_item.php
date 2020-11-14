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

$_output = $_style = $_mega_menu_class = $_first_row_html = $_second_row_html = $_css_classes = '';

$_counter_description_enclosure_tag = 'div';

extract(shortcode_atts(array(
	'margin_bottom' => '30',
	'margin_bottom_mobile' => '30',
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
	'stat_alignment' => 'center',
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
    // boxed
    'boxed_param' => '',
), $atts));

// css ID
	$_css_id = 'stats-item-'.TM_Shortcodes::tm_serial_number();

// add spaces
	$el_class = ($el_class!== '') ? ' '.esc_attr($el_class) : '';
	$stat_from = esc_attr($stat_from);
	$stat_to = esc_attr($stat_to);
	$stat_alignment = ' '.esc_attr($stat_alignment);

// sanitization
	if(!empty($stat_measure)) $stat_measure = esc_html($stat_measure);

//
	if( $_base === 'tm_content_stats' ) {
		$_css_classes = ' in-content';
		$_counter_description_enclosure_tag = 'span';
	}

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

// id
	$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);

// construct output
$_output = "<div class='{$_css_id} stat{$_css_classes}{$margin_bottom}{$margin_bottom_mobile}{$stat_alignment}{$boxed_param}{$el_class}'{$el_id}><div class='stat-inner'>{$_first_row_html}{$_second_row_html}</div></div>";

if(!empty($is_grid_item)){
	// always for shortcode version (not from the vc)
	// TM_Shortcodes::tm_add_inline_css(".{$_css_id} { display: inline-block; }");
	// TM_Shortcodes::tm_add_inline_css(".{$_css_id} .stat-inner { display: inherit; }");
	if($stat_type =='3' && empty($use_second_row)) $_mega_menu_class = ' mega-stat';
	$_output = "<div class='grid-item{$_mega_menu_class}'>{$_output}</div>";
}

/** Output */
TM_Shortcodes::output_shortcode_content('holder_item', $_output);