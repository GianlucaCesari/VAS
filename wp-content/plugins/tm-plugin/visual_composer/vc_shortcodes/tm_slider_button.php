<?php
/**
 * tm_slider_button shortcode
 */
namespace ThemeMountain;

$_output = $_css_id = $_button_inner_html = $_data_animate_in = $_link_to_class = $_link_to_attrs = $_app_button_size = $_lightbox_caption = $_data_lightbox_animation = $_lightbox_toolbar = '';

extract(shortcode_atts(array(
	'margin_bottom' => '30',
	'margin_bottom_mobile' => '30',
	'column_width' => '12',
	'column_offset' => '',
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
	'button_type' => '', // regular blank or app
	'button_sub_label' => '',
	'scroll_offset' => '0', // textfield
	'link_target' => '_self', // dropdown
	'modal_target' => 0,
	'el_id' => '', // textfield
	'el_class' => '', // textfield
	// design options
	'display_inline' => '',
	'icon_alignment' => 'left', // dropdown
	'button_size' => 'medium', // dropdown
	'border_style' => '', // dropdown
	'bkg_color' => '#eee', // colorpicker
	'bkg_color_hover' => '#d0d0d0', // colorpicker
	'border_color' => '#eee', // colorpicker
	'border_color_hover' => '#d0d0d0', // colorpicker
	'label_color' => '#666', // colorpicker
	'label_color_hover' => '#666', // colorpicker
	'drop_shadow' => '', // checkbox
	// Animation
	'button_animation' => 'fadeIn', // dropdown Ref. Appendix 2: Animation Presets
	'button_animation_duration' => '1000', // textfield
	'button_animation_delay' => '0', // textfield
	'lightbox_animation' => 'fade',
	), $atts));

// css ID
	$_css_id = 'slider-button-'.TM_Shortcodes::tm_serial_number();

// variable conversion
	$el_class = ($el_class !== '' ) ? ' '.$el_class : '';
	$button_size = ($button_size !== '') ? " ".esc_attr($button_size) : '';
	$border_style = ($border_style !== '') ? " ".esc_attr($border_style) : '';
	$drop_shadow = ($drop_shadow !== '' && $drop_shadow !== 'false') ? " shadow" : '';
	// column
	$column_width = esc_attr($column_width);
	$column_offset = ($column_offset !=='') ? " offset-".esc_attr($column_offset) : '';

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

			// lightbox animation
			$_data_lightbox_animation = " data-lightbox-animation='".esc_attr($lightbox_animation)."'";

			$link_target = '';
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
if( $button_type === 'app' ) {
	$icon_id = str_replace('tm-entypo-','',esc_attr($icon_id));
	if($icon_alignment == 'right' ) {
		$_button_inner_html = "<span class='button-content right'><span><small>".TM_Shortcodes::tm_wp_kses($button_sub_label)."</small>".TM_Shortcodes::tm_wp_kses($button_label)."</span><span class='{$icon_id} right medium'></span></span>";
	} else {
		// left as default
		$_button_inner_html = "<span class='button-content left'><span class='{$icon_id} medium left'></span><span><small>".TM_Shortcodes::tm_wp_kses($button_sub_label)."</small>".TM_Shortcodes::tm_wp_kses($button_label)."</span></span>";
	}
} else if( $icon_id !== '' ) {
	$icon_id = str_replace('tm-entypo-','',esc_attr($icon_id));
	if($icon_alignment == 'right' ) {
		$_button_inner_html = TM_Shortcodes::tm_wp_kses($button_label)."<span class='{$icon_id} right'></span>";
	} else {
		// left as default
		$_button_inner_html = "<span class='{$icon_id} left'></span>".TM_Shortcodes::tm_wp_kses($button_label);
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
		TM_Shortcodes::tm_add_inline_css("a.{$_css_id}, a.{$_css_id} span {color:$label_color !important;}");
	}
	// label_color_hover
	if ( $label_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css("a.{$_css_id}:hover, a.{$_css_id}:hover span {color:$label_color_hover !important;}");
	}

$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);

/* Animation Attributes */
	if($button_animation !== '') {
		$_data_animate_in = " data-no-scale data-animate-in='preset:{$button_animation};duration:{$button_animation_duration}ms;delay:{$button_animation_delay}ms;'";
	}
/** construct output */
	$_output = "<div class='tms-caption no-scale{$margin_bottom}{$margin_bottom_mobile}'{$_data_animate_in}><a class='button {$_css_id}{$_link_to_class}{$button_size}{$border_style}{$drop_shadow}{$el_class}'{$link_url}{$link_target}{$_link_to_attrs}{$el_id}{$lightbox_group_id}{$_lightbox_toolbar}{$_lightbox_caption}{$_data_lightbox_animation}>{$_button_inner_html}</a></div>";
/** column */
	if(!empty($display_inline)) {
		$_output = "<div class='row'><div class='column width-{$column_width}{$column_offset}'>{$_output}</div></div>";
	} else {
		$_output .= "{$display_inline}";
	}
/** Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);
