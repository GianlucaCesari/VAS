<?php
namespace ThemeMountain;
/**
 * vc_row / vc_row_inner
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
	if($_base === 'vc_row_inner') {
		$_css_id_prefix = 'row_inner';
		$_is_inner = TRUE;
	} else {
		$_is_inner = FALSE;
		$_css_id_prefix = 'row';
	}

/** default settings */
	extract(shortcode_atts(array(
		/** General Options */
		'force_fullwidth' => '', /** Note: if true, adds the classes .full-width.collapse to div.section-block.replicable-content.row */
		'equalize' => '',
		'columns_on_tablet' => 'keep',
		'el_id' => '',
		'el_class' => '',
		/**
		 * Spacing
		 */
		'clear_all_padding' => '', /* Note: clears all section block padding by adding no-padding to div.section-block */
		'padding_top' => 'inherit',
		'padding_bottom' => 'inherit',
		/**
		 * Design Options
		 */
		// background
		'use_background' => '',
		'background_color' => '#FFFFFF',
		'background_use_gradient' => '',
		'background_gradient_end_color' => '',
		'background_gradient_angle' => '',
		// overlay
		'add_overlay' => '',
		'overlay_background_color' => 'rgba(0,0,0,0.3)',
		'overlay_background_use_gradient' => '',
		'overlay_background_gradient_end_color' => '',
		'overlay_background_gradient_angle' => '',
		// background image
		'image_source' => 'image_id',
		'image_id' => '',
		'image_url' => '',
		/**
		 * Reserved
		 */
		'set_font_color' => '',
		'font_color' => '',
		), $atts));

/** CSS ID */
	$_css_id = $_css_id_prefix.'-'.TM_Shortcodes::tm_serial_number();

/**
 * Sensors
 */
	/** $_has_non_replicable_content */
	if(
		strpos($content, '[tm_hero_') > 0 ||
		strpos($content, '[tm_testimonials_holder') > 0 ||
		strpos($content, '[tm_grid') > 0
	) {
		$_has_non_replicable_content = TRUE;
	} else {
		$_has_non_replicable_content = FALSE;
	}

	/**
	 * Find the number of vc_row* in the given content
	 */
	// $_row_count = preg_match_all("/\[vc_row(.*?)(.+?)?\](.*?)\[\/vc_row(.*?)\]/s",$content);
	$_row_count = preg_match_all("/\[(vc_row|vc_row_inner)\s.*?/s",$content);

	if(	$_row_count > 0) {
		/** the content contains 1 or more rows */
		$_has_vc_rows = TRUE;
	} else {
		/** the content has not any row. */
		$_has_vc_rows = FALSE;
	}

	/**
	 * Find names / the number of any element shortcodes other than those of Layout (vc_row* or vc_column*, and those holder item elements) in the given content
	 */
	preg_match_all("/\[(tm_accordion_holder|tm_box|tm_button|tm_progress_bar|tm_blockquote|tm_clients_holder|tm_color_swatch_holder|tm_fullscreen_presentation_holder|tm_grid|tm_hero_.*|tm_full_width_hero_with_split_contents_holder|tm_split_hero_with_split_contents_holder|tm_image|tm_icon|tm_logos|tm_map|tm_parallax|tm_pricing_table_holder|tm_raw_html|tm_slider_holder|tm_stats_holder|tm_tab_holder|tm_team_holder|tm_testimonials_holder|tm_vertical_tab_holder|tm_video|tm_textblock|tm_feature_columns|tm_feature_sections|tm_contact_form_7|tm_hero_split_slider_content_holder|tm_hero_split_slider_holder|tm_menu_holder|tm_timeline_holder|tm_carousel_slider_holder)[\s|\]].*?/s",$content, $_element_count);
	$_element_count = count($_element_count[0]);
	if(	$_element_count < 1) {
		/** the content contains no row */
		$_has_single_tm_element = NULL;
	} else if($_element_count === 1) {
		/** the content contains exactly 1 element */
		$_has_single_tm_element = TRUE;
	} else {
		/** the content has not any row. */
		$_has_single_tm_element = FALSE;
	}

/**
 * Logic
 */

/**
 * Settings
 */
	// padding class
		// padding class init
		$_padding_class = '';
		// $padding_top
		if($padding_top !== '' && $padding_top !== 'inherit') {
			$_padding_class .= " pt-".$padding_top;
		}
		// padding botton
		if($padding_bottom !=='' && $padding_bottom !== 'inherit') {
			$_padding_class .= " pb-".$padding_bottom;
		}

	// equalize
		if($equalize !== '') {
			$equalize = ' flex';
		}

	// columns_on_tablet
		switch ($columns_on_tablet) {
			case 'force_2':
				$_columns_on_tablet_class =' two-columns-on-tablet';
				break;
			case 'force_1':
				$_columns_on_tablet_class =' one-column-on-tablet';
				break;
			case 'keep':
			default:
				// do nothing
				$_columns_on_tablet_class = '';
				break;
		}

/**
 * Set Params to Inherit
 */
	$_args = array(
		'force_fullwidth' => $force_fullwidth,
		'set_font_color' => $set_font_color,
		'font_color' => $font_color,
		'clear_all_padding' => $clear_all_padding,
		'padding_class' => esc_attr($_padding_class),
		'columns_on_tablet_class' => $_columns_on_tablet_class,
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
		//
		'equalize' => $equalize,
		'el_class' => esc_attr($el_class),
		'el_id' => esc_attr($el_id),
		'css_id' => $_css_id,
		/** sensor attributes */
		'has_non_replicable_content' => $_has_non_replicable_content,
		'has_vc_rows' => $_has_vc_rows,
		'has_single_tm_element' => $_has_single_tm_element,
		/** extra option*/
		'skip_row_div' => FALSE,
		);

	// image_id. When image_id is 0, there must be error or some sort.
	if($image_source === 'image_url' && !empty($image_url)) {
		$_args['image_url'] = esc_url($image_url);
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_args['image_id'] = $image_id;
	}

/** Signal begin row */
	TM_Shortcodes::one_down_row($_args);

/* Output row */
	TM_Shortcodes::output_shortcode_content('row',$content);

/** Signal end row */
	TM_Shortcodes::one_up_row();

/* reset settings at root */
	if($_base === 'vc_row') {
		TM_Shortcodes::reset_row_manager();
	}
