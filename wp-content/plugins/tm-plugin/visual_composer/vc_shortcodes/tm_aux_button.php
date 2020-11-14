<?php
use ThemeMountain\TM_Shortcodes as TM_Shortcodes;

// find basename
	if(isset($this)) {
		$_base = $this->settings['base'];
	} else if (isset($tagname)) {
		$_base = $tagname;
	} else {
		$_base = FALSE;
	}

$_output = $_css_id = $_button_inner_html = $_data_animate_in = $_link_to_class = $_link_to_attrs = $_app_button_size = $_lightbox_caption = $_data_lightbox_animation = $_lightbox_toolbar = $_horizon = '';

extract(shortcode_atts(array(
	'margin_bottom' => '30',
	'margin_bottom_mobile' => '30',
	/* #850 */
	'link_to' => 'page', // checkbox
	'media_type' => 'vimeo',
	'lightbox_group_id' => '',
	'lightbox_toolbar_zoom_button' => '',
	'lightbox_toolbar_share_buttons' => '',
	'lightbox_caption' => '',
	'video_vimeo_id' => '',
	'video_youtube_id' => '',
	'video_url' => '',
	'video_url_parameters' => '',
	/* end #850 */
	// image
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'icon_id' => '', // iconpicker
	'button_label' => '', // textfield
	'link_url' => '', // textfield
	'scroll_offset' => '0', // textfield
	'link_target' => '_self', // dropdown
	'modal_target' => 0,
	'el_class' => '', // textfield
	// design options
	'button_type' => '',
	'button_sub_label' => '',
	'icon_alignment' => 'left', // dropdown
	'button_size' => '', // dropdown
	'border_style' => '', // dropdown
	'bkg_color' => '', // colorpicker
	'bkg_color_hover' => '', // colorpicker
	'border_color' => '', // colorpicker
	'border_color_hover' => '', // colorpicker
	'label_color' => '', // colorpicker
	'label_color_hover' => '', // colorpicker
	'drop_shadow' => '', // checkbox
	// display option
	'display_inline' => '',
	// Animation
	'lightbox_animation' => 'fade',
	'content_animation' => '', // dropdown
	'content_animation_duration' => '1000', // textfield
	'content_animation_delay' => '0', // textfield
	'content_animation_threshold' => '0.5',
	), $atts));

// css ID
	$_css_id = 'button-'.TM_Shortcodes::tm_serial_number();

// variable conversion
	$el_class = ($el_class !== '' ) ? ' '.$el_class : '';
	$button_size = ($button_size !== '') ? " ".esc_attr($button_size) : '';
	$border_style = ($border_style !== '') ? " ".esc_attr($border_style) : '';
	$drop_shadow = ($drop_shadow !== '' && $drop_shadow !== 'false') ? " shadow" : '';

// link_to : page, modal or scroll or lightbox (#850)
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
				$link_url = " href='".esc_url($video_url)."'";
			} else if ($media_type == 'vimeo') {
				$link_url = " href='//player.vimeo.com/video/{$video_vimeo_id}?portrait=0&amp;title=0&amp;byline=0&amp;loop=1{$video_url_parameters}'";
			} else if ($media_type == 'image') {
				$link_url = TM_Shortcodes::get_image_attributes_by_id($image_source,$image_id,$image_url,FALSE);
			} else { // youtube
				$link_url = " href='//www.youtube.com/embed/{$video_youtube_id}?showinfo=0&amp;loop=1{$video_url_parameters}'";
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

			$link_target = '';

			// lightbox animation
			$_data_lightbox_animation = " data-lightbox-animation='".esc_attr($lightbox_animation)."'";
			break;
		case 'scroll':
			$_link_to_attrs = " data-offset='".esc_attr($scroll_offset)."'";
			$link_url = ($link_url !== '') ? " href='".esc_url($link_url)."'" : '';
			$_link_to_class = ' scroll-link';
			$link_target = '';
			break;
		case 'modal':
			// data-content="inline" data-aux-classes="tml-form-modal height-auto" data-toolbar data-modal-mode data-modal-width="500" data-modal-animation="fade" data-lightbox-animation="fade" href="#wordpress-modal-xxx" class="lightbox-link button" data-auto-launch data-launch-delay="1000" data-set-cookie="cookie-modal-xxxx"
			$_link_to_class = ' lightbox-link';
			$link_url = '';
			$_link_to_attrs = TM_Shortcodes::get_modal_attributes($modal_target,'tml-form-modal height-auto');
			$link_target = '';
			break;
		case 'page':
		default:
			$link_url = ($link_url !== '') ? " href='".esc_url($link_url)."'" : '';
			$link_target = ($link_target !== '') ? " target='".esc_attr($link_target)."'" : '';
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

// $_button_inner_html
	if( $icon_id !== '' ) {
		$icon_id = str_replace('tm-entypo-','',esc_attr($icon_id));
		// button type
		if($button_type === 'app') {
			$_button_inner_html = "<span class='button-content {$icon_alignment}'><span class='{$icon_id} medium left'></span><span><small>{$button_sub_label}</small>".TM_Shortcodes::tm_wp_kses($button_label).'</span></span>';
			$_app_button_size = ' medium';
		} else {
			$_button_label_html = TM_Shortcodes::tm_wp_kses($button_label);
			if($icon_alignment == 'right' ) {
				$_button_inner_html = $_button_label_html."<span class='{$icon_id} right'></span>";
			} else {
				// left as default
				$_button_inner_html = "<span class='{$icon_id} left'></span>".$_button_label_html;
			}
		}
	} else {
		$_button_inner_html = TM_Shortcodes::tm_wp_kses($button_label);
	}

// display_inline
	if ( $display_inline !== '' ) {
		$display_inline = '';
	} else {
		$display_inline = '<div class="clear"></div>';
	}

// animation
	if ($content_animation !== '' ) {
		// sanitization
		$content_animation = esc_attr($content_animation);
		if(!empty($content_animation_duration)) $content_animation_duration = 'duration:'.esc_attr($content_animation_duration).'ms;';
		if($content_animation_delay !== '') $content_animation_delay = 'delay:'.esc_attr($content_animation_delay).'ms;';
		$content_animation_threshold = esc_attr($content_animation_threshold);
		if($content_animation_threshold !== ''){
			$content_animation_threshold = " data-threshold='{$content_animation_threshold}'";
		}
		$content_animation = " data-animate-in='preset:{$content_animation};{$content_animation_duration}{$content_animation_delay}'{$content_animation_threshold}";
		$_horizon = ' horizon';
	}


// css
	// bkg_color
	if ( $bkg_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css("a.{$_css_id} {background-color:$bkg_color !important;}");
	}
	// Background Hover Color
	if ( $bkg_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css("a.{$_css_id}:hover, a.{$_css_id}.current {background-color:$bkg_color_hover !important;}");
	}
	// border_color
	if ( $border_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css("a.{$_css_id} {border-color:$border_color !important;}");
	}
	// Border Hover Color
	if ( $border_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css("a.{$_css_id}:hover, a.{$_css_id}.current {border-color:$border_color_hover !important;}");
	}
	// label_color
	if ( $label_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css("a.{$_css_id} {color:$label_color !important;}");
	}
	// Label Color Hover
	if ( $label_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css("a.{$_css_id}:hover,a.{$_css_id}.current {color:$label_color_hover !important;}");
	}

switch( $_base ) {
	case 'tm_aux_button':
		$_output = "<div class='tmp-caption{$_horizon}{$margin_bottom}{$margin_bottom_mobile}'{$content_animation}><a class='button {$_css_id}{$_link_to_class}{$button_size}{$border_style}{$drop_shadow}{$el_class}'{$link_url}{$link_target}{$_link_to_attrs}{$lightbox_group_id}{$_lightbox_toolbar}{$_lightbox_caption}{$_data_lightbox_animation}>{$_button_inner_html}</a></div>{$display_inline}";
		/** Output */
		TM_Shortcodes::output_shortcode_content('holder_item', $_output);
		break;
	case 'tm_button':
		$_output = "<a class='button {$_css_id}{$_link_to_class}{$button_size}{$border_style}{$drop_shadow}{$margin_bottom}{$margin_bottom_mobile}{$el_class}'{$link_url}{$link_target}{$_link_to_attrs}{$lightbox_group_id}{$_lightbox_toolbar}{$_lightbox_caption}{$_data_lightbox_animation}>{$_button_inner_html}</a>{$display_inline}";
		/** Output */
		TM_Shortcodes::output_shortcode_content('inline', $_output);
		break;
}