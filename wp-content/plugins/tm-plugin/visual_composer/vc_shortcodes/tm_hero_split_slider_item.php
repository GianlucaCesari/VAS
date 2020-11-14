<?php
/**
 * tm_hero_split_slider_item
 *
 * @since      1.1
 */
namespace ThemeMountain;

$_css_id = $_el_id = '';

extract(shortcode_atts(array(
	'is_hero_content' => '',
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'el_class' => '',
	// el_id
	'el_id' => '',
	/** Design Options */
	// background color
	'background_color' => '#FFFFFF',
	'background_use_gradient' => '',
	'background_gradient_end_color' => '',
	'background_gradient_angle' => '',
	// ovrelay
	'overlay_background_color' => 'rgba(0,0,0,0.3)',
	'overlay_background_use_gradient' => '',
	'overlay_background_gradient_end_color' => '',
	'overlay_background_gradient_angle' => '',
	// pagination
	'pagination_color_palette' => 'nav_color_1',
	/** Animation */
	'slide_animation' => 'fade',
), $atts));

// is_hero_content check up
	if($is_hero_content === 'true') {
		return;
	}

// css ID
	$_css_id = 'tm-hero-split-slider-item-'.TM_Shortcodes::tm_serial_number();

// sanitization
	$el_class = ($el_class!=='') ? ' '.esc_attr($el_class) : '';
	$_el_id = (!empty($el_id)) ? ' data-custom-id="'.esc_attr($el_id).'"' : '';

// $_image_html
	if($image_source === 'image_url' && !empty($image_url)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_url,'Hero split slider item');
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_id,'Hero split slider item');
	} else {
		$_image_html = '';
	}


// background style
	if(!empty($background_color)) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} {".TM_Shortcodes::construct_gradient_css($background_color,$background_use_gradient,$background_gradient_end_color,$background_gradient_angle,TRUE)."}");
	}

// overlay bkg color
	if($overlay_background_color !== '') {
		if(empty($overlay_background_use_gradient)){
			$_overlay_background_color_converted = TM_Shortcodes::tm_fromRGBtoHEX($overlay_background_color);
			$_media_data_attributes = " data-overlay-bkg-color='{$_overlay_background_color_converted[0]}' data-overlay-bkg-opacity='$_overlay_background_color_converted[1]'";
		} else {
			$_media_data_attributes = " data-overlay-bkg-color='#000000' data-overlay-bkg-opacity='0.01'";
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} .tms-overlay {".TM_Shortcodes::construct_gradient_css($overlay_background_color,$overlay_background_use_gradient,$overlay_background_gradient_end_color,$overlay_background_gradient_angle)."}");
		}
	} else {
		$_media_data_attributes = '';
	}

// slide_transition
	if($slide_animation !== '') {
		$slide_animation = esc_attr($slide_animation);
		$slide_animation = " data-animation='{$slide_animation}'";
	}

// $_nav_palette_attribute
	$_nav_palette_attribute = ($pagination_color_palette === 'nav_color_2') ? ' data-nav-dark' : '';

// slideContent
	$_slideContent = TM_Shortcodes::tm_do_shortcode($content,TRUE);

	if ($_slideContent !== '') {
	 	$_slideContent = "<div class='tms-content'><div class='tms-content-inner'><div class='row'><div class='column width-12'>{$_slideContent}</div></div></div></div>";
	}

/** Output */
	$_output = "<li class='{$_css_id} tms-slide{$el_class}' data-image data-force-fit data-as-bkg-image{$_nav_palette_attribute}{$_media_data_attributes}{$slide_animation}{$_el_id}>{$_slideContent}{$_image_html}</li>";

	TM_Shortcodes::output_shortcode_content('holder_item', $_output);
