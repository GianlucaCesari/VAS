<?php
namespace ThemeMountain;

$_output = $_map_info = $_map_markers = $_map_coordinates = $_css_classes = $_icon_html = $_inner_button_html = '';

$_class_array = array();

extract(shortcode_atts(array(
	'is_button_or_embed' => 'embed',
	'button_label' => 'See Google Maps',
	'map_style' => 'color',
	'map_coordinates_1' => '',
	'map_coordinates_2' => '',
	'map_marker_1' => '',
	'map_marker_2' => '',
	'map_info_1' => '',
	'map_info_2' => '',
	'zoom_level' => '16',
	'el_class' => '',
// design options
	'display_inline' => '',
	'icon_id' => '', // iconpicker
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
	), $atts));

// css ID
	$_css_id = 'tm-map-'.TM_Shortcodes::tm_serial_number();

// sanitization
	$map_coordinates_1 = $map_coordinates_1;
	$map_coordinates_2 = $map_coordinates_2;

// make sure id is set
	$_map_id = 'map-canvas-'.time() . rand( 0, 100 );

// info
	if($map_info_1 !== '') $map_info_1 = '"'.preg_replace('/\"|\'/','',$map_info_1).'"';
	if($map_info_2 !== '') $map_info_2 = '"'.preg_replace('/\"|\'/','',$map_info_2).'"';

// marker
	// 1st marker image
	if ($map_marker_1 !== '') {
		// regular size image
		$_image_info = wp_get_attachment_image_src($map_marker_1,'full');
		if(!empty($_image_info)) {
			$map_marker_1 = $_image_info[0];
		} else {
			$map_marker_1 = get_template_directory_uri()."/assets/images/assets/map-marker.png";
		}
	} else {
		$map_marker_1 = get_template_directory_uri()."/assets/images/assets/map-marker.png";
	}
	$map_marker_1 = '"'.$map_marker_1.'"';
	// 2nd marker image
	if ($map_marker_2 !== '') {
		// regular size image
		$_image_info = wp_get_attachment_image_src($map_marker_2,'full');
		if(!empty($_image_info)) {
			$map_marker_2 = $_image_info[0];
		} else {
			$map_marker_2 = get_template_directory_uri()."/assets/images/assets/map-marker.png";
		}
	} else {
		$map_marker_2 = get_template_directory_uri()."/assets/images/assets/map-marker.png";
	}
	$map_marker_2 = '"'.$map_marker_2.'"';

// construct output conditionally
if ($is_button_or_embed === 'button') {
	// display_inline
		if ( $display_inline !== '' ) {
			$display_inline = '';
		} else {
			$display_inline = '<div class="clear"></div>';
		}
	// attrs
		$icon_id = str_replace('tm-entypo-','',esc_attr($icon_id));
		$button_size = ($button_size !== '') ? " ".esc_attr($button_size) : '';
		$border_style = ($border_style !== '') ? " ".esc_attr($border_style) : '';
		$drop_shadow = ($drop_shadow !== '' && $drop_shadow !== 'false') ? " shadow" : '';
		if(!empty($icon_id)) {
			$_icon_html = "<span class='{$icon_id} ".esc_attr($icon_alignment)."'></span>";
			$button_label = TM_Shortcodes::tm_wp_kses($button_label);
			if($icon_alignment === 'left') {
				$_inner_button_html = $_icon_html.$button_label;
			} else {
				$_inner_button_html = $button_label.$_icon_html;
			}
		} else {
			$_inner_button_html = $button_label;
		}
	// colors
		// bkg_color
		if ( $bkg_color !== '' ) {
			TM_Shortcodes::tm_add_inline_css("a.{$_css_id} {background-color:$bkg_color;}");
		}
		// bkg_color_hover
		if ( $bkg_color_hover !== '' ) {
			TM_Shortcodes::tm_add_inline_css("a.{$_css_id}:hover {background-color:$bkg_color_hover;}");
		}
		// border_color
		if ( $border_color !== '' ) {
			TM_Shortcodes::tm_add_inline_css("a.{$_css_id} {border-color:$border_color;}");
		}
		// border_color_hover
		if ( $border_color_hover !== '' ) {
			TM_Shortcodes::tm_add_inline_css("a.{$_css_id}:hover {border-color:$border_color_hover;}");
		}
		// label_color
		if ( $label_color !== '' ) {
			TM_Shortcodes::tm_add_inline_css("a.{$_css_id} {color:$label_color;}");
		}
		// label_color_hover
		if ( $label_color_hover !== '' ) {
			TM_Shortcodes::tm_add_inline_css("a.{$_css_id}:hover {color:$label_color_hover;}");
		}
	// $_inner_button_html
	// button html
	$_output = "<a data-content='iframe' href='//maps.google.com/?q={$map_coordinates_1}&output=embed&z={$zoom_level}' class='{$_css_id} lightbox-link button {$button_size}{$border_style}{$drop_shadow}'>{$_inner_button_html}</a>{$display_inline}";
	/** Output */
		TM_Shortcodes::output_shortcode_content('inline', $_output);
} else {
	// map_coordinates
	if($map_coordinates_1 !== '') $map_coordinates_1 = "[{$map_coordinates_1}]";
	if($map_coordinates_2 !== '') $map_coordinates_2 = "[{$map_coordinates_2}]";
	// make json array
	if($map_coordinates_2 !=='') {
		$_map_coordinates = $map_coordinates_1.','.$map_coordinates_2;
	} else {
		$_map_coordinates = $map_coordinates_1;
	}
	// info
	if($map_info_2 !=='') {
		$_map_info = $map_info_1.','.$map_info_2;
	} else {
		$_map_info = $map_info_1;
	}
	// markers
	if($map_marker_2 !=='') {
		$_map_markers = $map_marker_1.','.$map_marker_2;
	} else {
		$_map_markers = $map_marker_1;
	}
	$_map_coordinates = urldecode($_map_coordinates);
	/** Data preparation */
	$_output = "<div class='row collapse full-width'><div class='column width-12'><div><div class='map-container' data-coordinates='[{$_map_coordinates}]' data-icon='{$_map_markers}' data-info='{$_map_info}' data-zoom-level='{$zoom_level}' data-style='{$map_style}'><div class='map-canvas' id='{$_map_id}'></div></div></div></div></div>";
	$_args = array(
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'force_fullwidth' => FALSE,
		'has_non_replicable_content' => TRUE,
		'skip_row_div' => TRUE,
		);
	/* Output */
	TM_Shortcodes::output_shortcode_content('map_section', $_output, '', '', $_args);
}

// enqueue google maps api
	TM_Shortcodes::enqueue_googlemaps_api();
