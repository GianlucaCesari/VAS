<?php
namespace ThemeMountain;

$_output = $_image_url = $_stats_content = $_css_classes = $_additional_attributes = $_equalize = $_boxed = '';

extract(shortcode_atts(array(
	'stat_type' => '1',
	'items_per_row' => '3',
	'stat_alignment' => 'center',
	'el_id' => '',
	'el_class' => '', // textfield
	// Design Options
	'stat_font_size' => '30px',
	'description_font_size' => '14px',
	'stat_color' => '#666666',
	'description_color' => '#666666',
	'border_color' => 'rgba(0,0,0,0.4)', // colorpicker. dep stat_type = 2 or 3
	'mega_stat_font_size' => '70px', // dep stat_type = 3
	'mega_stat_description_font_size' => '20px', // dep stat_type = 3
	// box design options
	'is_boxed' => '',
	'border_style' => '',
	'box_size' => 'medium',
	'background_color' => '',
), $atts));

// css ID
	$_css_id = 'stats-'.TM_Shortcodes::tm_serial_number();

// sanitization
	$stat_type = esc_attr($stat_type);

// css
	// settings from tm_stats_holder
	// stat_font_size
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} .counter { font-size:{$stat_font_size}; }");
	// description_font_size
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} .description { font-size:{$description_font_size}; }");
	// stat_color
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} .counter { color:{$stat_color}; }");
	// description_color
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} .description { color:{$description_color}; }");
	// border_color
	if($stat_type === '3' || $stat_type === '2') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .grid-item, .{$_css_id} .description { border-color: {$border_color}; }");
		$_equalize = ' equalize';
	} else if ($stat_type === '1' && !empty($is_boxed)) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .stat.box { background-color: {$background_color}; }");
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .stat.box { border-color: {$border_color}; }");
		$_boxed = ' box';
		$_boxed .= ' '.esc_attr($box_size);
		$_boxed .= (!empty($border_style)) ? ' '.esc_attr($border_style) : '';
	}
	// mega_stat_font_size
	// mega_stat_description_font_size
	if($stat_type === '3') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .mega-stat .counter { font-size:{$mega_stat_font_size}; }");
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .mega-stat .description { font-size:{$mega_stat_description_font_size}; }");
	}

	/** item manipulation */
	$_additional_attributes = '[tm_stats_item is_grid_item="true" stat_type="'.$stat_type.'" stat_alignment="'.$stat_alignment.'" boxed_param="'.$_boxed.'" ';
	$content = str_replace('[tm_stats_item ',$_additional_attributes,$content);

	$_stats_content = TM_Shortcodes::tm_do_shortcode($content);

// Construct output
	$_output = "<div class='row'><div class='column width-12'><div class='row content-grid-{$items_per_row}{$_equalize}'>{$_stats_content}</div></div></div>";

// const argument
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'skip_row_div' => TRUE,
		);

/* Output */
	TM_Shortcodes::output_shortcode_content('holder', $_output, "stats-{$stat_type}" , '', $_args);
