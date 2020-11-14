<?php
namespace ThemeMountain;

$_output = '';

extract(shortcode_atts(array(
	'icon_margin_bottom' => '30',
	'icon_margin_bottom_mobile' => '30',
	'icon_id' => '',
	'el_id' => '', // textfield
	'el_class' => '', // textfield
	// design options
	'icon_alignment' => 'left',
	'icon_size' => 'medium', // dropdown
	'icon_style' => '', // dropdown
	'bkg_color' => '#eee', // colorpicker
	'bkg_color_hover' => '#d0d0d0', // colorpicker
	'border_color' => '#eee', // colorpicker
	'border_color_hover' => '#d0d0d0', // colorpicker
	'label_color' => '#666', // colorpicker
	'label_color_hover' => '#666', // colorpicker
	), $atts));

// css ID
	$_css_id = 'tm-feature-column-'.TM_Shortcodes::tm_serial_number();

// variable conversion
	$icon_size = ' '.esc_attr($icon_size);
	$icon_id = ' '.str_replace('tm-entypo-','',esc_attr($icon_id));
	$icon_alignment = ' '.esc_attr($icon_alignment);
	$icon_style = ($icon_style !== '') ? ' '.esc_attr($icon_style) : '';

// margin
	if($icon_margin_bottom === 'inherit') {
		$icon_margin_bottom = '';
	} else {
		$icon_margin_bottom = ' mb-'.esc_attr($icon_margin_bottom);
	}
// margin on mobile
	if($icon_margin_bottom_mobile === 'inherit') {
		$icon_margin_bottom_mobile = '';
	} else {
		$icon_margin_bottom_mobile = ' mb-mobile-'.esc_attr($icon_margin_bottom_mobile);
	}

// css
	// bkg_color
	if ( $bkg_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .icon-boxed, .{$_css_id} .icon-circled {background-color:$bkg_color;}");
	}
	// bkg_color_hover
	if ( $bkg_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .icon-boxed:hover, .{$_css_id} .icon-circled:hover {background-color:$bkg_color_hover;}");
	}
	// border_color
	if ( $border_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .icon-boxed, .{$_css_id} .icon-circled {border-color:$border_color;}");
	}
	// border_color_hover
	if ( $border_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .icon-boxed:hover, .{$_css_id} .icon-circled:hover {border-color:$border_color_hover;}");
	}
	// label_color
	if ( $label_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} [class*=icon-] {color:$label_color;}");
	}
	// label_color_hover
	if ( $label_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} [class*=icon-]:hover {color:$label_color_hover;}");
	}

/**
 * dirty fix to remove stray tags
 */
	$content = TM_Shortcodes::tm_rudementary_p_tag_remover($content);
	$content = TM_Shortcodes::tm_do_shortcode($content,FALSE);

// build output
$_output = <<<CONTENT
	<span class="feature-icon{$icon_margin_bottom}{$icon_margin_bottom_mobile}{$icon_style}{$icon_id}"></span>
	<div class="feature-text">
		{$content}
	</div>
CONTENT;

// const argument
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'use_background' => FALSE,
		'padding_class' => '',
		'skip_row_div' => TRUE,
		'skip_section_block' => TRUE,
		);

/* Output */
	TM_Shortcodes::output_shortcode_content('feature_section', $_output, "feature-column{$icon_alignment}{$icon_size}", '', $_args);