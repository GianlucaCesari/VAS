<?php
namespace ThemeMountain;

$_style = $_table_footer_html = $_output = '';

extract(shortcode_atts(array(
	'title' => '',
	'table_currency' => '',
	'table_price' => '',
	'table_interval' => '',
	'show_price_line' => '',
	'display_interval_on_new_line' => '',
	'display_table_option_as' => 'list',
	'is_callout' => '',
	'show_column_button' => '',
	'table_footer_text' => '',
	'link_url' => '',
	'link_target' => '',
	'el_class' => '',
	'el_id' => '',
	// gradient support
	'title_background_color' => '',
	'title_background_use_gradient' => '',
	'title_background_gradient_end_color' => '',
	'title_background_gradient_angle' => '',
	//
	'title_font_color' => '',
	// gradient support
	'price_background_color' => '',
	'price_background_use_gradient' => '',
	'price_background_gradient_end_color' => '',
	'price_background_gradient_angle' => '',
	//
	'price_font_color' => '',
	'price_line_color' => '#DDD',
	'price_interval_opacity' => '0.5',
	// gradient support
	'options_background_color' => '',
	'options_background_use_gradient' => '',
	'options_background_gradient_end_color' => '',
	'options_background_gradient_angle' => '',
	// gradient support
	'footer_background_color' => '',
	'footer_background_use_gradient' => '',
	'footer_background_gradient_end_color' => '',
	'footer_background_gradient_angle' => '',
	//
	'options_font_color' => '',
	// button design options
	'icon_alignment' => 'left', // dropdown
	'button_size' => 'medium', // dropdown
	'border_style' => '', // dropdown
	// gradient support
	'button_bkg_color' => '#EEE',
	'button_background_use_gradient' => '',
	'button_background_gradient_end_color' => '',
	'button_background_gradient_angle' => '',
	//
	'bkg_color_hover' => '#d0d0d0', // colorpicker
	'border_color' => '#eee', // colorpicker
	'border_color_hover' => '#d0d0d0', // colorpicker
	'label_color' => '#666', // colorpicker
	'label_color_hover' => '#666', // colorpicker
	'drop_shadow' => '', // checkbox
), $atts));

// css ID
	$_css_id = 'pricing-option-'.TM_Shortcodes::tm_serial_number();

// add spaces
	$el_class = ($el_class!== '') ? ' '.esc_attr($el_class) : '';
	if($is_callout!== '') $is_callout = ' callout';

// html
	if($title !== '') $title = "<div class='pricing-table-header'><h2>".TM_Shortcodes::tm_wp_kses($title)."</h2></div>";


	if(!empty($table_currency)) $table_currency = "<span class='currency'>".TM_Shortcodes::tm_wp_kses($table_currency)."</span>";
	$display_interval_on_new_line = (!empty($display_interval_on_new_line)) ? ' show' : '';
	if($table_interval!=='') $table_interval = "<span class='interval{$display_interval_on_new_line}'>".TM_Shortcodes::tm_wp_kses($table_interval)."</span>";
	if($table_price !== '') {
		$table_price = TM_Shortcodes::tm_wp_kses($table_price);
		if(!empty($show_price_line)) {
			$show_price_line = '<hr class="mb-0">';
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} .pricing-table-price hr { border-color: {$price_line_color}; }");
		}
		$table_price = "<div class='pricing-table-price'><h4>{$table_currency}{$table_price}{$table_interval}</h4>{$show_price_line}</div>";
	}

// CSS
	if($title_background_color !== '') TM_Shortcodes::tm_add_inline_css(".{$_css_id} .pricing-table-header {".TM_Shortcodes::construct_gradient_css($title_background_color,$title_background_use_gradient,$title_background_gradient_end_color,$title_background_gradient_angle)."}");
	if($title_font_color !== '') TM_Shortcodes::tm_add_inline_css(".{$_css_id} .pricing-table-header h2 { color: {$title_font_color}; }");
	if($price_background_color !== '') TM_Shortcodes::tm_add_inline_css(".{$_css_id} .pricing-table-price {".TM_Shortcodes::construct_gradient_css($price_background_color,$price_background_use_gradient,$price_background_gradient_end_color,$price_background_gradient_angle)."}");
	if($price_font_color !== '') TM_Shortcodes::tm_add_inline_css(".{$_css_id} .pricing-table-price h4 { color: {$price_font_color}; }");
	if($options_background_color !== '') TM_Shortcodes::tm_add_inline_css(".{$_css_id} .pricing-table-options, .{$_css_id} .pricing-table-text {".TM_Shortcodes::construct_gradient_css($options_background_color,$options_background_use_gradient,$options_background_gradient_end_color,$options_background_gradient_angle)."}");
	if($options_font_color !== '') TM_Shortcodes::tm_add_inline_css(".{$_css_id} ul , .{$_css_id} p { color: {$options_font_color}; }");
	if($footer_background_color !== '') TM_Shortcodes::tm_add_inline_css(".{$_css_id} .pricing-table-footer {".TM_Shortcodes::construct_gradient_css($footer_background_color,$footer_background_use_gradient,$footer_background_gradient_end_color,$footer_background_gradient_angle)."}");
	if($price_interval_opacity !== '') TM_Shortcodes::tm_add_inline_css(".{$_css_id} .pricing-table-price .interval { opacity: {$price_interval_opacity}; }");

// button
	if($show_column_button !==''){
		// button settings
		$icon_alignment = ($icon_alignment !== '' ) ? ' '.esc_attr($icon_alignment) : '';
		$button_size = ($button_size !== '') ? " ".esc_attr($button_size) : '';
		$border_style = ($border_style !== '') ? " ".esc_attr($border_style) : '';
		$drop_shadow = ($drop_shadow !== '' && $drop_shadow !== 'false') ? " shadow" : '';

		// attr
		if($link_url =='') {
			$link_url = '';
		} else {
			$link_url = " href='".esc_html($link_url)."' target='".esc_attr($link_target)."'";
		}

		$_table_footer_html = "<div class='pricing-table-footer'><a class='button{$icon_alignment}{$button_size}{$border_style}{$drop_shadow}'{$link_url}>".TM_Shortcodes::tm_wp_kses($table_footer_text)."</a></div>";

		// button css
			// bkg_color
			if ( $button_bkg_color !== '' ) {
				TM_Shortcodes::tm_add_inline_css(".{$_css_id} a.button {background-color:$button_bkg_color;}");
			}
			// bkg_color_hover
			if ( $bkg_color_hover !== '' ) {
				TM_Shortcodes::tm_add_inline_css(".{$_css_id} a.button:hover {background-color:$bkg_color_hover;}");
			}
			// border_color
			if ( $border_color !== '' ) {
				TM_Shortcodes::tm_add_inline_css(".{$_css_id} a.button {border-color:$border_color;}");
			}
			// border_color_hover
			if ( $border_color_hover !== '' ) {
				TM_Shortcodes::tm_add_inline_css(".{$_css_id} a.button:hover {border-color:$border_color_hover;}");
			}
			// label_color
			if ( $label_color !== '' ) {
				TM_Shortcodes::tm_add_inline_css(".{$_css_id} a.button {color:$label_color;}");
			}
			// label_color_hover
			if ( $label_color_hover !== '' ) {
				TM_Shortcodes::tm_add_inline_css(".{$_css_id} a.button:hover {color:$label_color_hover;}");
			}
	}

$_tableCellContent = TM_Shortcodes::tm_do_shortcode($content);

if($display_table_option_as === 'text') {
	$_tableCellContent = "<div class='pricing-table-text'>{$_tableCellContent}</div>";
} else {
	$_tableCellContent = "<div class='pricing-table-options'>{$_tableCellContent}</div>";
}

$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);

$_output = "<div class='{$_css_id} pricing-table-column{$is_callout}{$el_class}'{$el_id}>{$title}{$table_price}{$_tableCellContent}{$_table_footer_html}</div>";

/** Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);

