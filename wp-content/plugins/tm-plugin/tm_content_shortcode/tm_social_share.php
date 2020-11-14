<?php
use ThemeMountain\TM_Shortcodes as TM_Shortcodes;
/**
 * "Social Share" shortcode.
 *
 * This is for content shortcode. Not available as a VC element
 */
add_shortcode( 'tm_social_share', 'tm_social_share' );
function tm_social_share($atts, $content, $tagname) {
	$_output = $_sns_icons = $_with_circle = '';

	extract(shortcode_atts(array(
		'margin_bottom' => '30',
		'margin_bottom_mobile' => '30',
	    'use_facebook' => '',
	    'use_twitter' => '',
	    'use_pinterest' => '',
	    'use_googleplus' => '',
	    'size' => 'medium', // small, medium (blank), large, xlarge
	    'icon_type' => 'regular',
	    'icon_color' => '',
	    'icon_color_hover' => '',
	    'alignment' => 'left',
	    'el_id' => '', // textfield
	    'el_class' => '', // textfield
	), $atts));

	// css ID
		$_css_id = 'tm_social_share-'.TM_Shortcodes::tm_serial_number();

	// Size
	if(empty($size)) {
		$size = ' medium';
	} else {
		$size = ' '.esc_attr($size);
	}

	// Type
	if($icon_type === 'circle') {
		$_with_circle = '-with-circle';
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

	// construct li

	$_postID = get_the_ID();
	$_currentPostURL = get_permalink($_postID);
	if ( has_post_thumbnail() ) {
		$_thumbnailID = get_post_thumbnail_id($_postID);
		$_currentPostImage = wp_get_attachment_url($_thumbnailID);
		$_currentPostDescription = get_the_title($_postID);

	} else {
		$_currentPostImage = '';
		$_currentPostDescription = '';
	}

	if($use_facebook === 'true') {
		$_sns_icons .= "<li><a onclick='window.open(\"https://www.facebook.com/sharer/sharer.php?u=\" + location.href, \"sharer\", \"width=626,height=436\");' href='javascript: void(0)' title='".esc_html__('Share on Facebook','thememountain-plugin')."'><span class='icon-facebook{$_with_circle}{$size}'></span></a></li>";
	}

	if($use_twitter === 'true') {
		$_sns_icons .= "<li><a onclick='popUp=window.open(\"https://twitter.com/share?url={$_currentPostURL}\", \"popupwindow\", \"scrollbars=yes,width=800,height=400\");popUp.focus();return false;' href='javascript: void(0)' title='".esc_html__('Share on Twitter','thememountain-plugin')."'><span class='icon-twitter{$_with_circle}{$size}'></span></a></li>";
	}

	if($use_pinterest === 'true') {
		$_sns_icons .= "<li><a onclick='popUp=window.open(\"https://pinterest.com/pin/create/button/?url={$_currentPostURL}&amp;media={$_currentPostImage}&amp;description={$_currentPostDescription}\", \"popupwindow\", \"scrollbars=yes,width=800,height=400\");popUp.focus();return false;' href='javascript: void(0)' title='".esc_html__('Pin on Pinterest','thememountain-plugin')."'><span class='icon-pinterest{$_with_circle}{$size}'></span></a></li>";
	}

	if($use_googleplus === 'true') {
		$_sns_icons .= "<li><a onclick='popUp=window.open(\"https://plus.google.com/share?url={$_currentPostURL}\", \"popupwindow\", \"scrollbars=yes,width=800,height=400\");popUp.focus();return false;' href='javascript: void(0)' title='".esc_html__('Share on Google Plus','thememountain-plugin')."'><span class='icon-google{$_with_circle}{$size}'></span></a></li>";
	}

	// css
		if($icon_color !==''){
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} a span { color:{$icon_color}; }");
		}
		if($icon_color_hover !==''){
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} a:hover span { color:{$icon_color_hover}; }");
		}

	// class / id
		$el_class = ($el_class !== '' ) ? ' '.$el_class : '';
		$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);

	$_output = "<ul class='{$_css_id} social-list list-horizontal {$alignment}{$margin_bottom}{$margin_bottom_mobile}{$el_class}'{$el_id}>{$_sns_icons}</ul>";

	return $_output;
}