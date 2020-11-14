<?php
use ThemeMountain\TM_Shortcodes as TM_Shortcodes;
/**
 * tm_icon_link shortcode.
 *
 * This is for content shortcode. Not available as a VC element
 */
add_shortcode( 'tm_icon_link', 'tm_icon_link' );
function tm_icon_link($atts, $content, $tagname) {
	$_output = $_style = $_sns_icons = $_href = $_link_to_class = $_link_target = $_element_tag = '';

	extract(shortcode_atts(array(
		'margin_bottom' => '30',
		'margin_bottom_mobile' => '30',
	    'icon_id' => '',
	    'link_url' => '',
	    'icon_size' => 'medium',
	    'icon_color' => '',
	    'icon_color_hover' => '',
	    /* image support */
	    'image_source' => 'image_id',
	    'image_id' => '',
	    'image_url' => '',
	    /* #878 */
		'link_to' => 'none', // checkbox
		'media_type' => 'image',
		'lightbox_group_id' => '',
		'lightbox_toolbar_zoom_button' => '',
		'lightbox_toolbar_share_buttons' => '',
		'lightbox_caption' => '',
		'video_vimeo_id' => '',
		'video_youtube_id' => '',
		'video_url' => '',
		'video_url_parameters' => '',
		'lightbox_animation' => 'fade',
	    /* #878 end */
	    'scroll_offset' => '',
	    'link_target' => '',
	    'el_id' => '', // textfield
	    'el_class' => '', // textfield
	), $atts));

	// css ID
		$_css_id = 'tm-icon-link-'.TM_Shortcodes::tm_serial_number();

// link_to : page, modal or scroll
	switch ($link_to) {
		case 'lightbox':
			/**
			 * Vars: $_lightbox_caption, $_data_lightbox_animation, $_lightbox_toolbar
			 */
			// $_link_to_class
			$_link_to_class = ' lightbox-link';

			// lightbox group id
			if( !isset($lightbox_group_id) || $lightbox_group_id == '' ) {
				$lightbox_group_id = 'summit-group-'.time() . rand( 0, 100 );
			}
			$lightbox_group_id = " data-group='".esc_attr($lightbox_group_id)."'";

			// $link_url
			if(!empty($video_url_parameters)){
				$video_url_parameters = '&amp;'.$video_url_parameters;
			}

			// $link_url
			if($media_type == 'other') {
				$_href = " href='".esc_url($video_url)."'";
			} else if ($media_type == 'vimeo') {
				$_href = " href='//player.vimeo.com/video/{$video_vimeo_id}?portrait=0&amp;title=0&amp;byline=0&amp;loop=1{$video_url_parameters}'";
			} else if ($media_type == 'image') {
				if(empty($link_url)){
					$_href = TM_Shortcodes::get_image_attributes_by_id($image_source,$image_id,$image_url,FALSE);
				} else {
					$_href = ' href="'.esc_url($link_url).'"';
				}
			} else { // youtube
				$_href = " href='//www.youtube.com/embed/{$video_youtube_id}?showinfo=0&amp;loop=1{$video_url_parameters}'";
			}

			// $_lightbox_caption
			if($lightbox_caption !== '') $_lightbox_caption = "  data-caption='".esc_attr($lightbox_caption)."'";

			// tool bar
			$_lightbox_toolbar = array();
			if($lightbox_toolbar_zoom_button !== '') array_push($_lightbox_toolbar, 'zoom');
			if($lightbox_toolbar_share_buttons !== '') array_push($_lightbox_toolbar, 'share');
			if(is_array($_lightbox_toolbar)) {
				$_lightbox_toolbar = implode(';', $_lightbox_toolbar);
				$_lightbox_toolbar = " data-toolbar='".esc_attr($_lightbox_toolbar)."'";
			} else {
				$_lightbox_toolbar = " data-toolbar";
			}

			// lightbox animation
			$_data_lightbox_animation = " data-lightbox-animation='".esc_attr($lightbox_animation)."'";
			$link_target = $scroll_offset = '';
			break;
		case 'scroll':
			$_link_to_attrs = " data-offset='".esc_attr($scroll_offset)."'";
			$_href = ($link_url !== '') ? " href='".esc_url($link_url)."'" : '';
			$_link_to_class = ' scroll-link';
			$link_target = '';
			break;
		case 'page':
		default:
			$_href = ($link_url !== '') ? " href='".esc_url($link_url)."'" : '';
			$link_target = (!empty($_href) && $link_target !== '') ? " target='".esc_attr($link_target)."'" : '';
			$scroll_offset = '';
			break;
	}

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
	// Icon Size
		$icon_size = ($icon_size!=='') ? ' '.$icon_size : '';

	// css
		if($icon_color !==''){
			TM_Shortcodes::tm_add_inline_css("a.{$_css_id} { color:{$icon_color}; }");
		}
		if($icon_color_hover !==''){
			TM_Shortcodes::tm_add_inline_css("a.{$_css_id}:hover { color:{$icon_color_hover}; }");
		}

	// class / id
		$el_class = ($el_class !== '' ) ? ' '.$el_class : '';
		$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);

	// $_href
		$_element_tag = ($_href !== '') ? 'a' : 'span';

	$_output = "<{$_element_tag}{$_href}{$_link_target}{$_style} class='{$_css_id} {$icon_id}{$icon_size}{$_link_to_class}{$margin_bottom}{$margin_bottom_mobile}{$el_class}'{$el_id}{$scroll_offset}{$link_target}></{$_element_tag}>";

	return $_output;
}