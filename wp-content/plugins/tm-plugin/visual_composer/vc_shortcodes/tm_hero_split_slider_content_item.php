<?php
/**
 * tm_hero_split_slider_item
 *
 * @since      1.1
 */
namespace ThemeMountain;

$_output = $_media_column = $_inner_column = $_el_id = '';

extract(shortcode_atts(array(
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'content_media_width' => 'split_50_50',
	'el_class' => '',
	/** Design Options */
	'media_alignment' => 'left',
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
	/** Pagination */
	'pagination_color_palette' => 'nav_color_1',
	/** Animation */
	'slide_animation' => 'fade',
	// el_id
	'el_id' => '',
), $atts));

// css ID
	$_css_id = 'tm-hero-split-slider-content-item-'.TM_Shortcodes::tm_serial_number();

// sanitization
	$el_class = ($el_class!=='') ? ' '.esc_attr($el_class) : '';
	$_el_id = (!empty($el_id)) ? ' data-custom-id="'.esc_attr($el_id).'"' : '';

// $_image_html
	if($image_source === 'image_url' && !empty($image_url)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_url,'Hero split sldier column');
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_id,'Hero split sldier column');
	} else {
		$_image_html = '';
	}

/**
 * Media Column Width
 */
switch ($content_media_width) {
	case 'split_50_50':
		if($media_alignment === 'left') {
			$_media_column = 'width-6';
			$_inner_column = 'width-5 offset-7';
		} else {
			$_media_column = 'width-6';
			$_inner_column = 'width-5';
		}
		break;
	case 'split_60_40':
		if($media_alignment === 'left') {
			$_media_column = 'width-5';
			$_inner_column = 'width-6 offset-6';
		} else {
			$_media_column = 'width-5';
			$_inner_column = 'width-6';
		}
		break;
	case 'split_75_25':
		if($media_alignment === 'left') {
			$_media_column = 'width-4';
			$_inner_column = 'width-7 offset-5';
		} else {
			$_media_column = 'width-4';
			$_inner_column = 'width-7';
		}
		break;
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

// sanitization
	$media_alignment = ($media_alignment !=='') ? ' '.esc_attr($media_alignment) : '';

// shortcodize
	$_slideContent = TM_Shortcodes::tm_do_shortcode($content);

// wrap it up with div.tms-content-scalable
	if ($_slideContent !== '') {
	 	$_slideContent = "<div class='tms-content-scalable'>{$_slideContent}</div>";
	} else {
		$_slideContent = "<div class='tms-content-scalable'></div>";
	}

$_output = "<li class='{$_css_id} tms-slide{$media_alignment}{$el_class}' data-image data-as-bkg-image data-image-wrapper='media-column'{$_nav_palette_attribute}{$_media_data_attributes}{$slide_animation}{$_el_id}><div class='media-column {$_media_column}'></div><div class='row'><div class='tms-caption hero-content split-hero-content column {$_inner_column} no-transition' data-no-scale><div class='hero-content-inner left'>{$_slideContent}</div></div></div>{$_image_html}</li>";

/** Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);
