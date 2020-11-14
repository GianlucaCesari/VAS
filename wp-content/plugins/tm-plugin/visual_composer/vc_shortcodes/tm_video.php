<?php
namespace ThemeMountain;

$_output = $_caption_html = $_data_caption = $_data_attributes = $_data_toolbar = $_video_html = $_image_html = $_image_sizes = $_image_url = $_caption_content = $_height_width = $_lightbox_inner_html = '';
$_class_array = array();

extract(shortcode_atts(array(
	'margin_bottom' => '30',
	'margin_bottom_mobile' => '30',
	'video_type' => 'youtube', // dropdown. vimeo youtube other
	'video_vimeo_id' => '',
	'video_youtube_id' => '',
	'video_url_parameters' => '',
	'video_url' => '',
	'video_width' => '1110',
	'video_height' => '624',
	'use_lightbox' => 'none',
	'video_ratio' => '1.778',
	// Background Video (dependency, data_type is files)
	// 'video_mp4' => '',
	// 'video_webm' => '',
	// thumbnail image
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'lightbox_group_id' => '', // textfield
	'lightbox_toolbar_zoom_button' => '', // checkbox
	'lightbox_toolbar_share_buttons' => '', // checkbox
	'lightbox_caption' => '', // textfield
	'lightbox_animation' => 'fade',
	// 'content' => '', // textarea_html
	'el_class' => '', // textfield
	// Design Options
	'image_style' => '',
	'use_icon_button_on_thumbnail' => '', // bool
	'icon_id' => 'tm-entypo-icon-play', // icon id
	'caption_type' => '', // dropdown, No caption ('', blank), caption_over, caption_below, rollover_caption
	'caption_vertical_alignment' => 'v-align-middle', // dropdown
	'caption_horizontal_alignment' => 'center', // dropdown
	'rollover_animation' => '', // dropdown, Presets are used
	'rollover_animation_duration' => '1000', // textfield
	'rollover_easing' => 'swing',
	'rollover_bkg_color' => 'rgba(255,255,255,0.9)', // colorpicker
	'caption_text_color' => '#232323', // colorpicker
	// icon design
	'icon_size' => 'medium', // dropdown
	'icon_style' => 'icon-circled', // dropdown
	'icon_bkg_color' => '#eee', // colorpicker
	'icon_bkg_color_hover' => '#d0d0d0', // colorpicker
	'icon_border_color' => '#eee', // colorpicker
	'icon_border_color_hover' => '#d0d0d0', // colorpicker
	'icon_label_color' => '#666', // colorpicker
	'icon_label_color_hover' => '#666', // colorpicker
	), $atts));

// conversion
	// ID
	$_css_id = 'tm_video-'.TM_Shortcodes::tm_serial_number();
	if($el_class !== '') $el_class = ' '.esc_attr($el_class);
	// image_style
	$image_style = ($image_style!=='') ? ' '.esc_attr($image_style) : '';
	// caption alignment
	$caption_vertical_alignment = ($caption_vertical_alignment!=='') ? ' '.esc_attr($caption_vertical_alignment) : '';
	$caption_horizontal_alignment = ($caption_horizontal_alignment!=='') ? ' '.esc_attr($caption_horizontal_alignment) : '';
	// rollover animation
	$rollover_animation = ($rollover_animation!=='') ? ' '.esc_attr($rollover_animation) : '';
	// others
	if($lightbox_group_id !== '') $lightbox_group_id = " data-group='".esc_attr($lightbox_group_id)."'";
	if($caption_text_color !== '') $caption_text_color = " style='color:".esc_attr($caption_text_color)."'";
	// sanitiztion
	$rollover_animation_duration = esc_attr($rollover_animation_duration);
	$rollover_easing = esc_attr($rollover_easing);
	$icon_size = esc_attr($icon_size);
	$icon_style = esc_attr($icon_style);
	$video_url = $video_url;


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

// tool bar
if(
	$lightbox_toolbar_zoom_button !=='' &&
	$lightbox_toolbar_share_buttons !== ''
	) {
	$_data_toolbar = ' data-toolbar="zoom;share"';
} else if($lightbox_toolbar_zoom_button !=='' ) {
	$_data_toolbar = ' data-toolbar="zoom"';
} else if ($lightbox_toolbar_share_buttons !== '') {
	$_data_toolbar = ' data-toolbar="share"';
} else {
	$_data_toolbar = ' data-toolbar=""';
}

// video type
	switch ( $video_type ) {
		case 'youtube':
			$_autoplay = ($use_lightbox === 'true') ? 1 : 0;
			$video_youtube_id = $video_youtube_id;
			$_autoplay = esc_attr($_autoplay);
			$video_url = "//www.youtube.com/embed/{$video_youtube_id}?autoplay={$_autoplay}";
			break;
		case 'vimeo':
			$_autoplay = ($use_lightbox === 'true') ? 1 : 0;
			$video_vimeo_id = $video_vimeo_id;
			$_autoplay = esc_attr($_autoplay);
			$video_url = "//player.vimeo.com/video/{$video_vimeo_id}?autoplay={$_autoplay}";
			break;
		default:
			break;
	}

	if(!empty($video_url_parameters)){
		$video_url_parameters = $video_url_parameters;
		$video_url .= '&amp;'.$video_url_parameters;
	}

//
if ($use_lightbox == 'lightbox_with_icon' ){
	// construct $_image_html
	if($image_source === 'image_url' && !empty($image_url)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_url,'Video thumbnail');
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_id,'Video thumbnail');
	}
	// replace p with blank
	$_caption_content = preg_replace( '/<\/?p\>/', '', TM_Shortcodes::tm_do_shortcode($content));

	$_caption_html = "<span class='overlay-info'><span><span{$caption_text_color}><span>{$_caption_content}</span></span></span></span>";
	$rollover_bkg_color = TM_Shortcodes::tm_fromRGBtoHEX($rollover_bkg_color);
	$_data_attributes = " data-hover-easing='{$rollover_easing}' data-hover-speed='{$rollover_animation_duration}' data-hover-bkg-color='{$rollover_bkg_color[0]}' data-hover-bkg-opacity='$rollover_bkg_color[1]'";
	$_data_caption = " data-caption='{$lightbox_caption}'";
	$_data_lightbox_animation = " data-lightbox-animation='{$lightbox_animation}'";
	$_data_video_ratio = " data-video-ratio='{$video_ratio}'";

	// bkg_color
	if ( $icon_bkg_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} a.lightbox-link {background-color:$icon_bkg_color;}");
	}
	// bkg_color_hover
	if ( $icon_bkg_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} a.lightbox-link:hover {background-color:$icon_bkg_color_hover;}");
	}
	// border_color
	if ( $icon_border_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} a.lightbox-link {border-color:$icon_border_color;}");
	}
	// border_color_hover
	if ( $icon_border_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} a.lightbox-link:hover {border-color:$icon_border_color_hover;}");
	}
	// label
	if ( $icon_label_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} a.lightbox-link {color:$icon_label_color;}");
	}
	if ( $icon_label_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} a.lightbox-link:hover {color:$icon_label_color_hover;}");
	}

	$icon_id = str_replace('tm-entypo-','',$icon_id);
	$_lightbox_inner_html = "{$_image_html}<div class='caption-over-outer'><div class='caption-over-inner{$caption_vertical_alignment}{$caption_horizontal_alignment}'><a class='lightbox-link {$icon_id} {$icon_style} {$icon_size}' href='{$video_url}'{$lightbox_group_id}{$_data_lightbox_animation}{$_data_video_ratio}{$_data_caption}{$_data_toolbar}></a></div></div>";

	// id
	$_output = "<div class='thumbnail {$_css_id}{$image_style}{$margin_bottom}{$margin_bottom_mobile}{$rollover_animation}{$el_class}'{$_data_attributes}>{$_lightbox_inner_html}</div>";
} else if ( $use_lightbox == 'lightbox_with_thumbnail_link' ) {
	// construct $_image_html
	if($image_source === 'image_url' && !empty($image_url)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_url,'Video thumbnail');
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_id,'Video thumbnail');
	}
	// replace p with blank
	$_caption_content = preg_replace( '/<\/?p\>/', '', TM_Shortcodes::tm_do_shortcode($content));

	$_caption_html = "<span class='overlay-info'><span><span{$caption_text_color}><span>{$_caption_content}</span></span></span></span>";
	$rollover_bkg_color = TM_Shortcodes::tm_fromRGBtoHEX($rollover_bkg_color);
	$_data_attributes = " data-hover-easing='{$rollover_easing}' data-hover-speed='{$rollover_animation_duration}' data-hover-bkg-color='{$rollover_bkg_color[0]}' data-hover-bkg-opacity='$rollover_bkg_color[1]'";
	$_data_caption = " data-caption='{$lightbox_caption}'";
	$_data_lightbox_animation = " data-lightbox-animation='{$lightbox_animation}'";
	$_data_video_ratio = " data-video-ratio='{$video_ratio}'";

	$_lightbox_inner_html = "<a class='overlay-link lightbox-link' data-content='iframe' href='{$video_url}'{$lightbox_group_id}{$_data_lightbox_animation}{$_data_video_ratio}{$_data_caption}{$_data_toolbar}>{$_image_html}{$_caption_html}</a>";

	// id
	$_output = "<div class='thumbnail {$_css_id}{$image_style}{$margin_bottom}{$margin_bottom_mobile}{$rollover_animation}{$el_class}'{$_data_attributes}>{$_lightbox_inner_html}</div>";
} else {
	// height width
	$_height_width .= ($video_width !== '') ? " width='{$video_width}'" : '';
	$_height_width .= ($video_height !== '') ? " height='{$video_height}'" : '';
	$_video_html = "<iframe src='{$video_url}'{$_height_width} allow='autoplay'></iframe>";
	$_output = "<div class='video-container {$_css_id}{$margin_bottom}{$margin_bottom_mobile}{$el_class}'>{$_video_html}</div>";
}

/** Output */
	TM_Shortcodes::output_shortcode_content('inline', $_output);
