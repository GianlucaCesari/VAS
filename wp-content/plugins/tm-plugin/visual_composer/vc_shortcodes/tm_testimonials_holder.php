<?php
namespace ThemeMountain;

$_output = $_pagination_attr = $minimum_height_attr = $_transition_attr = '';

extract( shortcode_atts( array(
	'force_fullwidth' => 'true',
	'minimum_height' => '400',
	'el_class' => '',
	'el_id' => '',
	/**
	 * design options
	 */
	'pagination_color' => '#000',
	/*
		Slider Parameters
	*/
	// Visual Effets
	'transition_easing' => 'linear',
	'transition_speed' => '700',
     // navigation
	'use_pagination' => 'true', // checkbox
	'nav_on_hover' => '',
	'use_auto_advance' => 'true',
	'auto_advance_interval' => '5000',
	'use_pause_on_hover' => 'true',
	'use_progress_bar' => '',
), $atts ) );

/**
 * General
 */
// css ID
	$_css_id = 'testimonials-'.TM_Shortcodes::tm_serial_number();

// sanitization
	$minimum_height = esc_attr($minimum_height);
	$transition_easing = esc_attr($minimum_height);
	$transition_speed = esc_attr($transition_speed);
	$auto_advance_interval = esc_attr($auto_advance_interval);

// min_height (int)
	if($minimum_height !=='') {
		$minimum_height_attr = " data-scale-min-height='{$minimum_height}'";
	} else {
		$minimum_height_attr = " data-scale-min-height=''";
	}

/**
 * Visual
 */

// transition
	if($transition_easing!=='') {
		$_transition_attr .= " data-easing='{$transition_easing}'";
	}

	if( is_numeric($transition_easing) === TRUE ) {
		$_transition_attr .= " data-speed='$transition_speed'";
	} else {
		$_transition_attr .= ' data-speed="700"';
	}

// background style
	if(!empty($pagination_color)) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .tms-bullet-nav { background: {$pagination_color}; }");
	}

/**
* Navigation
*/
	// {$_data_nav_show_on_hover}
	$_data_nav_show_on_hover = (empty($nav_on_hover)) ? ' data-nav-show-on-hover="false"' : ' data-nav-show-on-hover';
	// use_pagination
	if( $use_pagination !=='' ) {
		$_pagination_attr = ' data-nav-pagination="true"';
		// data-auto-advance
		if($use_auto_advance !=='') {
			$_pagination_attr .= " data-auto-advance data-auto-advance-interval='{$auto_advance_interval}'";
		}
		// data-pause-on-hover
		if ($use_pause_on_hover !=='') {
			$_pagination_attr .= ' data-pause-on-hover';
		} else {
			$_pagination_attr .= ' data-pause-on-hover="false"';
		}
		// use_progress_bar
		if ($use_progress_bar !=='') {
			$_pagination_attr .= ' data-progress-bar';
		} else {
			$_pagination_attr .= ' data-progress-bar="false"';
		}
	} else {
		$_pagination_attr = ' data-nav-pagination="false"';
	}

/**
 * Content (tm_testimonials_item)
 */
	// dirty workaround for Wordpress p bugs
	$_testimonialContent = TM_Shortcodes::tm_do_shortcode($content);
	$_testimonialContent = str_replace("<p><li", '<li', $_testimonialContent);
	$_testimonialContent = str_replace("</li></p>\n", '</li>', $_testimonialContent);

// const argument
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'force_fullwidth' => $force_fullwidth,
		'has_non_replicable_content' => TRUE,
		'skip_row_div' => TRUE,
		);

// class extra
	$el_class = ($el_class!=='') ? ' '.esc_attr($el_class) : '';

// construct html
	$_output .= "<div class='testimonial-slider tm-slider-container'{$_data_nav_show_on_hover}{$minimum_height_attr}{$_transition_attr}{$_pagination_attr}{$el_class}>\n<ul class='tms-slides'>\n{$_testimonialContent}\n</ul>\n</div>\n";

/* Output */
	TM_Shortcodes::output_shortcode_content('holder', $_output, '', '', $_args);
