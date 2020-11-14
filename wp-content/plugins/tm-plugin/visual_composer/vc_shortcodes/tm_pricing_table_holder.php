<?php
namespace ThemeMountain;

$_style = $_column_count = $_border_solid = $_output = '';

extract(shortcode_atts(array(
	'border_style' => '',
	'table_content_alignment' => 'left',
	/* tm_pricing tablet column padding update #841 */
	'table_header_top_padding' => '30',
	'table_header_bottom_padding' => '30',
	'table_price_top_padding' => '30',
	'table_price_bottom_padding' => '30',
	'table_options_top_bottom_padding' => '30',
	'table_footer_top_padding' => '30',
	'table_footer_bottom_padding' => '30',
	'table_size' => '',
	'el_class' => '',
	'el_id' => '',
	// color settings
	'border_color' => '#666',
), $atts));

// count # of columns
preg_match_all( '/\[tm_pricing_table_item /i', $content, $matches, PREG_OFFSET_CAPTURE );

$_column_count = count($matches[0]);
if ($_column_count < 0) return;
$_column_count = esc_attr($_column_count);

// css ID
	$_css_id = 'pricing-option-'.TM_Shortcodes::tm_serial_number();

// add spaces
	$el_class = ($el_class!== '') ? ' '.esc_attr($el_class) : '';
	if($table_size !== '') $table_size = ' '.esc_attr($table_size);
	if($border_style !== '') $border_style = ' '.esc_attr($border_style);
	$table_content_alignment = (!empty($table_content_alignment)) ? ' '.esc_attr($table_content_alignment) : '';


// CSS cue
	if($border_color == '') {
		// force transparent if blank
		$border_color = 'transparent';
	} else {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} { border-color: {$border_color}; }");
		$_border_solid = ' border-solid';
	}

	/* tm_pricing tablet column padding update #841 */
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} .pricing-table-header {padding-top: ".( (int) esc_attr($table_header_top_padding ))."px; }");
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} .pricing-table-header {padding-bottom: ".( (int) esc_attr($table_header_bottom_padding ))."px; }");
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} .pricing-table-price { padding-top: ".( (int) esc_attr($table_price_top_padding ))."px; padding-bottom: ".( (int) esc_attr($table_price_bottom_padding ))."px; }");
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} .pricing-table-text, .{$_css_id} .pricing-table-options { padding-top: ".( (int) esc_attr($table_options_top_bottom_padding ))."px; padding-bottom: ".( (int) esc_attr($table_options_top_bottom_padding ))."px; }");
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} .pricing-table-footer {padding-top: ".( (int) esc_attr($table_footer_top_padding ))."px; }");
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} .pricing-table-footer {padding-bottom: ".( (int) esc_attr($table_footer_bottom_padding ))."px; }");

// table content
$_tableContent = TM_Shortcodes::tm_do_shortcode($content);

$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);

$_output = "<div class='{$_css_id} pricing-table columns-{$_column_count}{$border_style}{$table_size}{$_border_solid}{$table_content_alignment}{$el_class}'{$el_id}>{$_tableContent}</div>";

/* Output */
	TM_Shortcodes::output_shortcode_content('inline_holder', $_output);
