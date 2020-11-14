<?php
/**
 * tm_slider_icon shortcode
 */
namespace ThemeMountain;

// init local variables
	$_output = $_is_scroll_link = $_data_animate_in = $_data_scroll_offset = $_tml_link = $_lightbox_caption = $_image_html = $_image_sizes = $_image_url = $_data_lightbox_animation = $_href_link_url = $_lightbox_toolbar = '';

extract(shortcode_atts(array(
	'margin_bottom' => '30',
	'margin_bottom_mobile' => '30',
	'column_width' => '12',
	'column_offset' => '',
	'icon_id' => '', // iconpicker
	'el_id' => '', // textfield
	'el_class' => '', // textfield
	'link_icon' => '',
	'link_url' => '',
	'scroll_offset' => '0',
	'link_target' => '_self',
	'media_type' => 'image',
	'lightbox_group_id' => '',
	'lightbox_toolbar_zoom_button' => '',
	'lightbox_toolbar_share_buttons' => '',
	'lightbox_caption' => '',
	'video_vimeo_id' => '',
	'video_youtube_id' => '',
	'video_url' => '',
	'video_url_parameters' => '',
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	// design options
	'display_inline' => '',
	'icon_size' => 'medium', // dropdown
	'icon_style' => '', // dropdown
	'bkg_color' => '#eee', // colorpicker
	'bkg_color_hover' => '#d0d0d0', // colorpicker
	'border_color' => '#eee', // colorpicker
	'border_color_hover' => '#d0d0d0', // colorpicker
	'label_color' => '#666', // colorpicker
	'label_color_hover' => '#666', // colorpicker
	'drop_shadow' => '', // checkbox
	// Animation
	'icon_animation' => 'fadeIn', // dropdown Ref. Appendix 2: Animation Presets
	'icon_animation_duration' => '1000', // textfield
	'icon_animation_delay' => '0', // textfield
	'lightbox_animation' => 'fade',
	), $atts));

// css ID
	$_css_id = 'tm_icon-'.TM_Shortcodes::tm_serial_number();

// column
	$column_width = esc_attr($column_width);
	$column_offset = ($column_offset !=='') ? " offset-".esc_attr($column_offset) : '';

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

// display_inline
	if ( $display_inline !== '' ) {
		$display_inline = '';
	} else {
		$display_inline = '<div class="clear"></div>';
	}

// link_icon
switch($link_icon) {
	case 'scroll_to_section':
		$_is_scroll_link = ' scroll-link';
		$_data_scroll_offset = " data-offset='".esc_attr($scroll_offset)."'";
		if($link_url !=='') $_href_link_url = " href='".esc_url($link_url)."'";
		$link_target = '';
		break;
	case 'link_to_page':
		if ($link_target !== '') $link_target = " target='".esc_attr($link_target)."'";
		if($link_url !=='') $_href_link_url = " href='".esc_url($link_url)."'";
		break;
	case 'use_lightbox':
		$_tml_link = ' lightbox-link';
		// lightbox group id
		if( !isset($lightbox_group_id) || $lightbox_group_id == '' ) {
			$lightbox_group_id = 'summit-group-'.time() . rand( 0, 100 );
		}

		$lightbox_group_id = " data-group='".esc_attr($lightbox_group_id)."'";

		if(!empty($video_url_parameters)){
			$video_url_parameters = '&amp;'.$video_url_parameters;
		}

		if($media_type == 'other') {
			$_href_link_url = " href='".esc_url($video_url)."'";
		} else if ($media_type == 'vimeo') {
			$_href_link_url = " href='//player.vimeo.com/video/{$video_vimeo_id}?portrait=0&amp;title=0&amp;byline=0&amp;loop=1{$video_url_parameters}'";
		} else if ($media_type == 'image') {
			$_href_link_url = TM_Shortcodes::get_image_attributes_by_id($image_source,$image_id,$image_url,FALSE);
		} else { // youtube
			$_href_link_url = " href='//www.youtube.com/embed/{$video_youtube_id}?showinfo=0&amp;loop=1{$video_url_parameters}'";
		}

		// caption
		if($lightbox_caption !== '') $_lightbox_caption = "  data-caption='".esc_attr($lightbox_caption)."'";
		// tool bar
		$_lightbox_toolbar = array();
		if($lightbox_toolbar_zoom_button !== '') array_push($_lightbox_toolbar, 'zoom');
		if($lightbox_toolbar_share_buttons !== '') array_push($_lightbox_toolbar, 'share');
		if(!empty($_lightbox_toolbar)) {
			$_lightbox_toolbar = implode(';', $_lightbox_toolbar);
			$_lightbox_toolbar = " data-toolbar='".esc_attr($_lightbox_toolbar)."'";
		} else {
			$_lightbox_toolbar = " data-toolbar";
		}
		// lightbox animation
		$_data_lightbox_animation = " data-lightbox-animation='".esc_attr($lightbox_animation)."'";
		$link_target = '';
		break;
	default: // none
	    $link_icon = 'none';
	    $link_target = '';
		break;
}


// variable conversion
	$el_class = ($el_class !== '' ) ? ' '.$el_class : '';
	$icon_size = ($icon_size !== '') ? " ".esc_attr($icon_size) : '';
	$icon_style = ($icon_style !== '') ? " ".esc_attr($icon_style) : '';
	$drop_shadow = ($drop_shadow !== '') ? " shadow" : '';
	$icon_id = str_replace('tm-entypo-','',esc_attr($icon_id));

// icon style none
if ($icon_style === '') {
	$bkg_color = 'rgba(255,255,255,0)';
	$bkg_color_hover = 'rgba(255,255,255,0)';
	$border_color = 'rgba(255,255,255,0)';
	$border_color_hover = 'rgba(255,255,255,0)';
}

// css
	// bkg_color
	if ( $bkg_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}[class*=icon-] {background-color:$bkg_color;}");
	}
	// bkg_color_hover
	if ( $bkg_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}[class*=icon-]:hover {background-color:$bkg_color_hover;}");
	}
	// border_color
	if ( $border_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}[class*=icon-] {border-color:$border_color;}");
	}
	// border_color_hover
	if ( $border_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}[class*=icon-]:hover {border-color:$border_color_hover;}");
	}
	// label_color
	if ( $label_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}[class*=icon-] {color:$label_color;}");
	}
	// label_color_hover
	if ( $label_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}[class*=icon-]:hover {color:$label_color_hover;}");
	}

// id
	$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);

if($link_icon === 'none') {
	$_output = "<span class='{$_css_id} {$icon_id}{$icon_style}{$icon_size}{$icon_style}{$drop_shadow}{$margin_bottom}{$margin_bottom_mobile}{$el_class}'{$el_id}></span>";
}

/* Animation Attributes */
	if($icon_animation !== '') {
		$_data_animate_in = " data-no-scale data-animate-in='preset:{$icon_animation};duration:{$icon_animation_duration}ms;delay:{$icon_animation_delay}ms;'";
	}
/* Icon */
	if($link_icon !== 'none') {
		$_output = "<a class='{$_css_id} {$icon_id}{$_tml_link}{$icon_style}{$icon_size}{$icon_style}{$drop_shadow}{$_is_scroll_link}{$el_class}'{$_href_link_url}{$link_target}{$_data_scroll_offset}{$lightbox_group_id}{$_lightbox_toolbar}{$_lightbox_caption}{$_data_lightbox_animation}{$el_id}></a>";
	}
/* Construct output */
	$_output = "<div class='tms-caption no-scale{$margin_bottom}{$margin_bottom_mobile}'{$_data_animate_in}>{$_output}</div>";
/** column */
	if(!empty($display_inline)) {
		$_output = "<div class='row'><div class='column width-{$column_width}{$column_offset}'>{$_output}</div></div>";
	} else {
		$_output .= "{$display_inline}";
	}
/** Output */
TM_Shortcodes::output_shortcode_content('holder_item', $_output);
