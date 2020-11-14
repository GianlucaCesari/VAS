<?php
namespace ThemeMountain;

$output = $_image_width = $_image_height = $_data_min_height = $_data_width_height = $_slideContent = $_overlay_class = $_nav_palette_class = $_css_classes = $_fullscreen_inner_html = '';

extract( shortcode_atts( array(
	'title' => '',
	'column_width' => '6',
	'column_offset' => '3',
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'bkg_attachment' => 'static', // static or fixed
	'bkg_image_size' => 'cover', // cover or contain
	'use_overlay' => '',
	'content_below_on_mobile' => '',
	'content_below_on_mobile_min_height' => '400',
	'el_class' => '',
	'slide_id' => '',
	'pagination_color_palette' => 'nav_color_1',
	'caption_valignment' => 'v-align-middle',
	'caption_alignment' => 'center',
	// background color with gradient support
	'image_bkg_color' => '#232323', // Section Background Color
	'background_use_gradient' => '',
	'background_gradient_end_color' => '',
	'background_gradient_angle' => '',
	// overlay background color with gradient support
	'image_overlay_bkg_color' => 'rgba(0,0,0,.5)',
	'overlay_background_use_gradient' => '',
	'overlay_background_gradient_end_color' => '',
	'overlay_background_gradient_angle' => '',
), $atts ) );

// css ID
	$_css_id = 'fullscreen-presentation-section-'.TM_Shortcodes::tm_serial_number();

// sanitization
	$column_width = esc_attr($column_width);

// variables to class conversion
	$el_class = ($el_class!=='') ? ' '.esc_attr($el_class) : '';
	$_overlay_class = ($use_overlay !== '') ? '' : ' no-overlay'; // note: blank when true
	$column_offset = ($column_offset !=='') ? " offset-".esc_attr($column_offset) : '';
	if($content_below_on_mobile !== ''){
		$content_below_on_mobile = ' content-below-on-mobile';
		$_data_width_height = " data-width='2500' data-height='1667'";
		$_data_min_height = " data-min-height='".esc_attr($content_below_on_mobile_min_height)."'";
	}

	// alignment caption
	$caption_valignment = ' '.esc_attr($caption_valignment);
	$caption_alignment = ' '.esc_attr($caption_alignment);

	// bkg_attachment
	if($bkg_attachment == 'static') {
		$bkg_attachment = '';
	} else {
		$bkg_attachment = ' background-fixed';
	}
	// bkg_image_size
	if($bkg_image_size == 'cover') {
		$bkg_image_size = ' background-cover';
	} else {
		$bkg_image_size = ' background-contain';
	}

// $_nav_palette_class
	$_nav_palette_class = ($pagination_color_palette === 'nav_color_2') ? ' nav-dark' : '';

	$content = str_replace('[tm_aux_caption','[tm_aux_caption parent="tm_fullscreen_presentation_item" ',$content);
	$_slideContent = TM_Shortcodes::tm_do_shortcode($content);

// use wptexturize(wpautop($content)); for fallback

// enqueue styles
	if($image_source === 'image_id') {
		TM_Shortcodes::enqueue_css_bkg_img_by_id(".{$_css_id} .background-image",$image_id);
	} else if ($image_source === 'image_url' && $image_url !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .background-image {background-image: url($image_url);}");
	}
	// $image_overlay_bkg_color
	if($use_overlay !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}.section-block .fullscreen-inner {".TM_Shortcodes::construct_gradient_css($image_overlay_bkg_color,$overlay_background_use_gradient,$overlay_background_gradient_end_color,$overlay_background_gradient_angle)."}");
	}
	// $image_bkg_color
	TM_Shortcodes::tm_add_inline_css(".{$_css_id}.section-block.fullscreen-section {".TM_Shortcodes::construct_gradient_css($image_bkg_color,$background_use_gradient,$background_gradient_end_color,$background_gradient_angle)."}");

// constract fullscreen inner html
	if($_slideContent !== '') {
		$_fullscreen_inner_html = "<div class='fullscreen-inner{$caption_valignment}{$caption_alignment}'><div class='row'><div class='column width-{$column_width}{$column_offset} horizon' data-animate-in='preset:slideInUpShort;duration:1000ms;' data-threshold='1'>{$_slideContent}</div></div></div>";
	}

// construct output
	$_output = "<div id='{$slide_id}' class='{$_css_id} section-block fullscreen-section{$_nav_palette_class}{$bkg_image_size}{$bkg_attachment}{$content_below_on_mobile}{$el_class}{$_overlay_class}{$_css_classes}'{$_data_min_height}{$_data_width_height}><div class='background-image-wrapper'><div class='background-image'></div></div>{$_fullscreen_inner_html}</div>";

/** Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);
