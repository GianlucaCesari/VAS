<?php
namespace ThemeMountain;
/**
 * vc_column / vc_column_inner
 */

/** Find basename */
	if(isset($this)) {
		$_base = $this->settings['base'];
	} else if (isset($tagname)) {
		$_base = $tagname;
	} else {
		$_base = FALSE;
	}

/** Set $_is_inner and CSS ID Prefix */
	if($_base === 'vc_column_inner') {
		$_css_id_prefix = 'column_inner';
		$_is_inner = TRUE;
	} else {
		$_is_inner = FALSE;
		$_css_id_prefix = 'column';
	}

$_animation_data_attribute = $_freeze_attributes = $_parallax_data_attribute = '';

/** default settings */
	extract(shortcode_atts(array(
		'h_text_align' => 'left',
		'h_text_align_mobile' => 'left-on-mobile',
		'v_align' => '',
		'make_column_sticky' => '',
		'extra_space_top' => '80',
		'extra_space_bottom' => '0',
		'push_section' => '.footer',
		'el_class' => '',
		'el_id' => '',
		'width' => '1/1',
		'column_offset' => '',
		'column_push' => '',
		'column_pull' => '',
		/* Design Options */
		'style' => '', // No styling (blank), boxed, boxed_round
		'use_background'=>'',
		'box_min_height' => '',
		'image_source' => 'image_id',
		'image_id' => '',
		'image_url' => '',
		// background color
		'background_color' => '#FFFFFF',
		'background_use_gradient' => '',
		'background_gradient_end_color' => '',
		'background_gradient_angle' => '',
		// ovrelay
		'add_overlay' => '',
		'overlay_background_color' => 'rgba(0,0,0,0.3)',
		'overlay_background_use_gradient' => '',
		'overlay_background_gradient_end_color' => '',
		'overlay_background_gradient_angle' => '',
		// box
		'box_size' => 'medium',
		'box_top_bottom_padding' => '15',
		'box_left_right_padding' => '15',
		'box_background_color' => '#fff', //
		'box_background_color_hover' => '#fff',
		'box_border_color' => '#eee', //
		'box_border_color_hover' => '#eee',
		'box_title_color' => '',
		'box_title_color_hover' => '',
		'box_text_color' => '',
		'box_text_color_hover' => '',
		'box_shadow' => '',
		'box_shadow_hover' => '',
		/* animation */
		'column_animation' => '', // on_scroll, parallax_on_scroll
		'animation' => 'fadeIn',
		'duration' => '1000',
		'delay' => '0',
		'threshold' => '0.5',
		/** parallax_on_scroll */
		'parallax_speed' => '0.1',
		'rotation_scroll' => '',
		'fade_on_scroll' => '',
		), $atts));

/** CSS ID */
	$_css_id = $_css_id_prefix.'-'.TM_Shortcodes::tm_serial_number();

	// column VC to TM conversion
		if(strpos($width,'/')) {
			$width_check = explode('/',$width);
			if(isset($width[1])) {
				$_width_denominator = $width_check[0] * 12 / $width_check[1];
				$_translated_width = ' width-'.$_width_denominator;
			}
		} else if(is_numeric($width)) {
			$_translated_width = ' width-'.$width;
		} else {
			$_translated_width = '';
		}

	// h_text_align
		if( $h_text_align !=='' ) $h_text_align = " ".esc_attr($h_text_align);
	// h_text_align_mobile
		if( $h_text_align_mobile !=='' ) $h_text_align_mobile = " ".esc_attr($h_text_align_mobile);
	// v_align as class
		if( $v_align !=='' ) $v_align = ' '.esc_attr($v_align);
	// $column_offset
		if( $column_offset !=='' ) $column_offset = " offset-".esc_attr($column_offset);
	// $column_push
		if( $column_push !=='' ) $column_push = " push-".esc_attr($column_push);
	// $column_pull
		if( $column_pull !=='' ) $column_pull = " pull-".esc_attr($column_pull);

	// animation with horizon. column_animation is animation_on_scroll
	if( $column_animation == 'animation_on_scroll' ) {
		$_horizon = ' horizon';
		$animation = esc_attr($animation);
		$duration = esc_attr($duration);
		$delay = esc_attr($delay);
		$_animation_data_attribute = " data-animate-in='preset:{$animation};duration:{$duration}ms;delay:{$delay}ms;'";
		if($threshold !== ''){
			$threshold = esc_attr($threshold);
			$_animation_data_attribute .= " data-threshold='{$threshold}'";
		}
	} else if ($column_animation == 'parallax_on_scroll') {
		$_horizon = ' horizon';
		$_parallax_data_attribute = array();
		// parallax_speed
		if(!empty($parallax_speed)) {
			array_push($_parallax_data_attribute,'direction:vertical;speed:'.$parallax_speed);
		}
		// rotation_scroll
		if($rotation_scroll === 'clockwise') {
			array_push($_parallax_data_attribute,'rotate:clockwise');
		} else if ($rotation_scroll === 'anticlockwise') {
			array_push($_parallax_data_attribute,'rotate:anticlockwise');
		}
		// fade_on_scroll
		if(!empty($fade_on_scroll)) {
			array_push($_parallax_data_attribute,'opacity:fade');
		} else {
			array_push($_parallax_data_attribute,'opacity:1');
		}
		/** $_parallax_data_attribute is now a string */
		if(!empty($_parallax_data_attribute)) {
			$_parallax_data_attribute = implode(';',$_parallax_data_attribute);
		} else {
			$_parallax_data_attribute = '';
		}
	} else {
		$_horizon = '';
		$_animation_data_attribute = '';
	}

	// style.
	switch ($style) {
		case 'boxed':
			$_boxed = 'box';
			break;
		case 'boxed_round':
			$_boxed = 'box rounded';
			break;
		default:
			$_boxed = '';
			break;
	}

/** Boxed Column Design Options */
	if(!empty($_boxed)) {
		// Box Size
		if($box_size === 'custom') {
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} .box.size-custom { padding: {$box_top_bottom_padding}px {$box_left_right_padding}px; }");
			$_boxed .= ' size-custom';
		} else {
			$_boxed .= ' '.$box_size;
		}
		// Text Color Default to inherit
		if(empty($box_text_color)) $box_text_color = 'inherit';
		if(empty($box_text_color_hover)) $box_text_color_hover = 'inherit';
		// Color settings
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .box:hover { background-color:{$box_background_color_hover}; }");
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .box:hover { border-color:{$box_border_color_hover}; }");
		// title color
		if($box_title_color!=='') TM_Shortcodes::tm_add_inline_css(".{$_css_id} .box h1, .{$_css_id} .box h2, .{$_css_id} .box h3, .{$_css_id} .box h4, .{$_css_id} .box h5, .{$_css_id} .box h6 { color:{$box_title_color}; }");
		if($box_title_color_hover!=='') TM_Shortcodes::tm_add_inline_css(".{$_css_id} .box:hover h1, .{$_css_id} .box:hover h2, .{$_css_id} .box:hover h3, .{$_css_id} .box:hover h4, .{$_css_id} .box:hover h5, .{$_css_id} .box:hover h6 { color:{$box_title_color_hover}; }");
		// text color
		if($box_text_color!=='') TM_Shortcodes::tm_add_inline_css(".{$_css_id} .box, .{$_css_id} .box p { color:{$box_text_color}; }");
		if($box_text_color_hover!=='') TM_Shortcodes::tm_add_inline_css(".{$_css_id} .box:hover, .{$_css_id} .box:hover p { color:{$box_text_color_hover}; }");
		// Shadow
		if(!empty($box_shadow)) $_boxed .= ' shadow';
		if(!empty($box_shadow_hover)) $_boxed .= ' shadow-hover';

		// Box Min Height (textfield)
		if($box_min_height!=='') {
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} .box { min-height:{$box_min_height}px; }");
		}
	}

/** construct array for settings */
	$_args = array(
		'h_text_align' => $h_text_align,
		'h_text_align_mobile' => $h_text_align_mobile,
		'v_align' => $v_align,
		'el_class' => $el_class,
		'el_id' => $el_id,
		'translated_width' => $_translated_width,
		'column_offset' => $column_offset,
		'column_push' => $column_push,
		'column_pull' => $column_pull,
		'boxed' => $_boxed,
		// background color
		'use_background' => $use_background,
		'background_color' => $background_color,
		'background_use_gradient' => $background_use_gradient,
		'background_gradient_end_color' => $background_gradient_end_color,
		'background_gradient_angle' => $background_gradient_angle,
		// overlay background color
		'add_overlay' => $add_overlay,
		'overlay_background_color' => $overlay_background_color,
		'overlay_background_use_gradient' => $overlay_background_use_gradient,
		'overlay_background_gradient_end_color' => $overlay_background_gradient_end_color,
		'overlay_background_gradient_angle' => $overlay_background_gradient_angle,
		/* Design Options */
		'box_border_color' => $box_border_color,
		'box_background_color' => $box_background_color,
		/* animation */
		'horizon' => $_horizon,
		'parallax_data_attribute' => $_parallax_data_attribute,
		'animation_data_attribute' => $_animation_data_attribute,
		/* anything else generated here */
		'css_id' => $_css_id,
		);

/** freeze plugin support */
	if(!empty($make_column_sticky)) {
		$_freeze_attributes .= " data-extra-space-top='{$extra_space_top}'";
		$_freeze_attributes .= " data-extra-space-bottom='{$extra_space_bottom}'";
		$_freeze_attributes .= " data-push-section='{$push_section}'";
		$_args['freeze_attributes'] = $_freeze_attributes;
	}

	// image_id. When image_id is 0, there must be error or some sort.
	if($image_source === 'image_url' && !empty($image_url)) {
		$_args['image_url'] = esc_url($image_url);
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_args['image_id'] = $image_id;
	}

/** Begin a new column. Send settings to class */
	TM_Shortcodes::begin_column($_args);

/* Output row */
	TM_Shortcodes::output_shortcode_content('column',$content,'');

/** End column */
	TM_Shortcodes::end_column();