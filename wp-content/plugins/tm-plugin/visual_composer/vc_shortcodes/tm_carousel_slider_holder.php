<?php
namespace ThemeMountain;

$_output = $_sliderContent = $_window_height = $_section_block_id = $_section_inline_style_for_custom_height = $_inline_style_slider_wrapper = $_gutter_margin_class = '';

extract( shortcode_atts( array(
	// General
	'visible_slides' => '4',
	'slide_gutter' => 'large',
	'el_id' => '',
	'el_class' => '',
	'tabs_id' => '', // tab_id. auto generated.
    //
    'pagination_color' => '#000',
	// Navigation
	'auto_advance' => '',
	'auto_advance_interval' => '5000',
	'pause_on_hover' => 'true',
	'progress_bar' => '',
	'show_nav_arrows' => 'true',
	'use_pagination' => 'true',
	'nav_on_hover' => '',
	// Animation
	'transition_easing' => 'linear',
	'transition_speed' => '700',

	// Design Options
	// 'bkg_color' => '#FFFFFF', // colorpicker
), $atts ) );

/**
 * CSS ID
 *
 * @var        string
 */
	$_css_id = 'tm_carousel_slider-'.TM_Shortcodes::tm_serial_number();

/**
 * Transition VFX
 */
	if($transition_easing!=='') {
		$transition_easing = esc_attr($transition_easing);
		$transition_easing=" data-easing='{$transition_easing}'";
	}

	if( is_numeric($transition_easing) === TRUE ) {
		$transition_speed = esc_attr($transition_speed);
		$transition_speed = " data-speed='$transition_speed'";
	} else {
		$transition_speed = ' data-speed="700"';
	}

/**
 * Navigation
 */
	// {$_data_nav_show_on_hover}
	$_data_nav_show_on_hover = (empty($nav_on_hover)) ? ' data-nav-show-on-hover="false"' : ' data-nav-show-on-hover';

	// data-auto-advance
	$auto_advance = ($auto_advance !=='') ? ' data-auto-advance' : '';
	if($auto_advance !=='') {
		if( is_numeric($auto_advance_interval) === TRUE ) {
			$auto_advance_interval  = " data-auto-advance-interval='{$auto_advance_interval}'";
		} else {
			$auto_advance_interval = " data-auto-advance-interval='2000'";
		}
	} else {
		$auto_advance_interval = '';
	}

	// data-pause-on-hover
	$pause_on_hover = ($pause_on_hover !=='') ? ' data-pause-on-hover' : ' data-pause-on-hover="false"';

	// progress_bar
	$progress_bar = ($progress_bar !=='') ? ' data-progress-bar' : ' data-progress-bar="false"';

/**
 * Nav type
 */
	if( $show_nav_arrows !=='' ) {
		$show_nav_arrows = ' data-nav-arrows';
		$show_nav_arrows_attr = '';
	} else {
		$show_nav_arrows = '';
		$show_nav_arrows_attr = ' data-nav-arrows="false"';
	}

	// use_pagination
	if( $use_pagination !=='' ) {
		$use_pagination = ' data-nav-pagination';
		$use_pagination_attr = '';
	} else {
		$use_pagination = '';
		$use_pagination_attr = ' data-nav-pagination="false"';
	}

/**
 * nav color palette
 */
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} .tms-bullet-nav { background-color: {$pagination_color}; }");

	// // nav color palette CSS 1
	// TM_Shortcodes::tm_add_inline_css(".$_css_id .tms-bullet-nav { background-color: {$pagination_color_1} }");
	// // nav color palette CSS 2
	// TM_Shortcodes::tm_add_inline_css(".$_css_id.tms-nav-dark .tms-bullet-nav { background-color: {$pagination_color_2} }");

/**
 * Slide Gutter
 */
switch ($slide_gutter) {
	case 'none':
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .tm-slider-container.tms-carousel>ul>li { padding-left: 0; padding-right: 0; }");
		$_gutter_margin_class = ' no-margins';
		break;
	case 'small':
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .tm-slider-container.tms-carousel>ul>li { padding-left: 0.5rem; padding-right: 0.5rem; }");
		$_gutter_margin_class = ' small-margins';
		break;
	case 'large':
	default:
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .tm-slider-container.tms-carousel>ul>li { padding-left: 1.5rem; padding-right: 1.5rem; }");
		break;
}

/** slider content. li block for each slide */
	$_sliderContent = preg_replace( '/<\/?p\>/', "\n", TM_Shortcodes::tm_do_shortcode($content));

/**
 * Output
 */
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'has_non_replicable_content' => FALSE,
		'skip_row_div' => FALSE,
		);
	$_output = "<div class='column width-12 no-padding'>\n<div class='tm-slider-container recent-slider' data-carousel-visible-slides='{$visible_slides}'{$transition_easing}{$transition_speed}{$_data_nav_show_on_hover}{$auto_advance}{$pause_on_hover}{$auto_advance_interval}{$progress_bar}{$show_nav_arrows}{$use_pagination}{$show_nav_arrows_attr}{$use_pagination_attr}>\n<ul class='tms-slides'>\n{$_sliderContent}\n</ul>\n</div>\n</div>\n";
	/* Output */
	TM_Shortcodes::output_shortcode_content('holder', $_output, $_gutter_margin_class , '', $_args);

/**
 * End
 */
