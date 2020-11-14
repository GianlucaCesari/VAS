<?php
namespace ThemeMountain;

$_video_attributes = $_image_html = $_media_data_attributes = $_nav_palette_attribute = $_with_control = $_el_id
= '';

$_image_html = TRUE;

extract( shortcode_atts( array(
	'title' => '',
	// data type
	'data_type' => 'image',
	// Image (dependency, data_type is image)
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	// Foreground? YouTube or Vimeo Video (dependency, data_type is youtube or vimeo)
	'video_vimeo' => '',
	'video_youtube' => '',
	// Background Video (dependency, data_type is files)
	'video_mp4' => '',
	'video_webm' => '',
	// Background color with gradient support
	'background_color' => '',
	'background_use_gradient' => '',
	'background_gradient_end_color' => '',
	'background_gradient_angle' => '',
	// overlay
	'overlay_background_color' => 'rgba(0,0,0,0.5)',
	'overlay_background_use_gradient' => '',
	'overlay_background_gradient_end_color' => '',
	'overlay_background_gradient_angle' => '',
	// display options
	'force_fit' => 'true',
	'slide_transition' => 'fade',
	// video
	'video_auto_play' => 'true', // checkbox
	'video_replay_on_end' => 'true', // checkbox
	'video_mute' => 'true', // checkbox
	// design options
	'caption_vertical_alignment' => 'v-align-middle',
	'caption_horizontal_alignment' => 'center',
	'pagination_color_palette' => 'nav_color_1',
	// el_id
	'el_id' => '',
), $atts ) );

// Sanitation
	$image_url = esc_url($image_url);
	$video_vimeo = $video_vimeo;
	$video_youtube = $video_youtube;
	$video_mp4 = esc_url($video_mp4);
	$video_webm = esc_url($video_webm);
	$slide_transition = esc_attr($slide_transition);
	$caption_vertical_alignment = esc_attr($caption_vertical_alignment);
	$caption_horizontal_alignment = esc_attr($caption_horizontal_alignment);
	$pagination_color_palette = esc_attr($pagination_color_palette);
	$_el_id = (!empty($el_id)) ? ' data-custom-id="'.esc_attr($el_id).'"' : '';

// data type
$_video_elements = '';

// Video Options
$video_auto_play = ($video_auto_play !=='') ? ' data-auto-play' : '';
$video_replay_on_end = ($video_replay_on_end !=='') ? ' data-replay-on-end' : '';

switch($data_type) {
	case 'vimeo':
	case 'vimeo_background':
		// video mode
		if($data_type === 'vimeo_background') {
			$video_mute = ($video_mute !=='') ? ' data-mute-video' : '';
			$_media_data_attributes = " data-video data-video-bkg-vimeo data-pause-on-scroll{$video_mute}{$video_auto_play}{$video_replay_on_end}";
			$_video_attributes = " width='2500' height='1600'";
			if($force_fit !== '') $force_fit = " data-force-fit";
		} else {
			$video_mute = ($video_mute !=='') ? ' data-mute-video' : '';
			$_media_data_attributes = " data-video data-pause-on-scroll{$video_mute}{$video_auto_play}{$video_replay_on_end}";
			$_video_attributes = " allowfullscreen";
			$force_fit = '';
			$_image_html = FALSE;
		}

		$_video_elements = "<iframe src='//player.vimeo.com/video/{$video_vimeo}?api=1'{$_video_attributes} allow='autoplay'></iframe>";
		break;
	case 'youtube':
	case 'youtube_background':
		// video mode
		if($data_type === 'youtube_background') {
			$video_mute = ($video_mute !=='') ? ' data-mute-video' : '';
			$_media_data_attributes = " data-video data-video-bkg-youtube data-pause-on-scroll{$video_mute}{$video_auto_play}{$video_replay_on_end}";
			$_video_attributes = " width='2500' height='1600'";
			if($force_fit !== '') $force_fit = " data-force-fit";
		} else {
			$video_mute = ($video_mute !=='') ? ' data-mute-video' : '';
			$_media_data_attributes = " data-video data-pause-on-scroll{$video_mute}{$video_auto_play}{$video_replay_on_end}";
			$_video_attributes = ' allowfullscreen';
			$force_fit = '';
			$_image_html = FALSE;
		}
$_video_attributes = "";
		$_video_elements = "<iframe src='//www.youtube.com/embed/{$video_youtube}?enablejsapi=1'{$_video_attributes} allow='autoplay'></iframe>";
		break;
	case 'files':
	case 'files_background':
		// video mode
		if($data_type === 'files_background') {
			$video_mute = ($video_mute !=='') ? ' data-mute-bkg-video' : '';
			$_media_data_attributes = " data-video data-video-bkg data-pause-on-scroll{$video_mute}{$video_auto_play}{$video_replay_on_end}";
			if($force_fit !== '') $force_fit = " data-force-fit";
			$_with_control = ' controls';
		} else {
			$video_mute = ($video_mute !=='') ? ' data-mute-video' : '';
			$_media_data_attributes = " data-video data-pause-on-scroll{$video_mute}{$video_auto_play}{$video_replay_on_end}";
			$force_fit = '';
			$_image_html = FALSE;
			$_with_control = '';
		}

		$_video_elements .= "<video class='html5-video'{$_with_control}";
		if(!empty($video_auto_play)) $_video_elements .= " autoplay";
		$_video_elements .= " loop>";

		$_video_elements .= "<source src='{$video_mp4}' type='video/mp4'>";
		$_video_elements .= "<source src='{$video_webm}' type='video/webm'>";
		$_video_elements .= "</video>";
		break;
	default:
		if($force_fit !== '') $force_fit = " data-force-fit";
		$_media_data_attributes = ' data-image';
		break;
}
// css ID
	$_css_id = 'slide-'.TM_Shortcodes::tm_serial_number();

if($_image_html === TRUE ) {
	if($image_source === 'image_url' && !empty($image_url)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_url,$title);
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_id,$title);
	} else {
		$_image_html = '';
	}
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
			$_media_data_attributes .= " data-overlay-bkg-color='{$_overlay_background_color_converted[0]}' data-overlay-bkg-opacity='$_overlay_background_color_converted[1]'";
		} else {
			$_media_data_attributes .= " data-overlay-bkg-color='#000000' data-overlay-bkg-opacity='0.01'";
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} .tms-overlay {".TM_Shortcodes::construct_gradient_css($overlay_background_color,$overlay_background_use_gradient,$overlay_background_gradient_end_color,$overlay_background_gradient_angle)."}");
		}
	}

// slide_transition
	if($slide_transition !== '') {
		$slide_transition = " data-animation='{$slide_transition}'";
	}

// caption_vertical_alignment
	if($caption_vertical_alignment!==''){
		$caption_vertical_alignment = ' '.$caption_vertical_alignment;
	}

// caption_horizontal_alignment
	if($caption_horizontal_alignment!==''){
		$caption_horizontal_alignment = ' '.$caption_horizontal_alignment;
	}

// $_nav_palette_attribute
	$_nav_palette_attribute = ($pagination_color_palette === 'nav_color_2') ? ' data-nav-dark' : '';

$_slideContent = TM_Shortcodes::tm_do_shortcode($content);
if ($_slideContent !== '') {
 	$_slideContent = "<div class='tms-content'><div class='tms-content-inner{$caption_vertical_alignment}{$caption_horizontal_alignment}'><div class='row'><div class='column width-12'>{$_slideContent}</div></div></div></div>";
}

$_output = "<li class='{$_css_id} tms-slide' data-as-bkg-image{$_nav_palette_attribute}{$_media_data_attributes}{$force_fit}{$slide_transition}{$_el_id}>{$_slideContent}{$_image_html}{$_video_elements}</li>";

/** Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);
