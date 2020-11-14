<?php
/**
 * tm_hero_split_slider_holder
 *
 * @since      1.1
 */
namespace ThemeMountain;

$_output = $_inline_style_slider_wrapper = '';

extract(shortcode_atts(array(
	'height' => 'regular',
	'height_custom' => '500',
	'el_id' => '',
	'el_class' => '',
	/** Navigation */
	'auto_advance' => '',
	'auto_advance_interval' => '5000',
	'pause_on_hover' => 'true',
	'progress_bar' => 'true',
	'show_nav_arrows' => 'true',
	'use_pagination' => 'true',
	'nav_on_hover' => '',
	/** Design Options */
	'media_alignment' => 'left',
	'pagination_color_1' => '#FFF',
	'pagination_color_2' => '#000',
	/** Animation */
	'transition_easing' => 'linear',
	'transition_speed' => '700',
), $atts));

// css ID
	$_css_id = 'tm-hero-split-slider-content-holder-'.TM_Shortcodes::tm_serial_number();

/**
 * Slight Height
 */
	switch ($height) {
		case 'custom':
			$_window_height_class = '';
			if(!empty($height_custom)) {
				$height_custom = esc_attr($height_custom);
				TM_Shortcodes::tm_add_inline_css("@media only screen and (min-width: 768px){ .section-block.$_css_id .hero-slider { min-height:{$height_custom}px;height:auto; } }");
				$_width_height = " data-height='{$height_custom}'";
			}
			break;
		case 'window_height':
			$_window_height_class = ' window-height';
			break;
		default: // regular
			$_window_height_class = '';
			$_width_height = " data-height='760'";
			$height_custom = '760';
			break;
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
			$auto_advance_interval = esc_attr($auto_advance_interval);
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

// nav color palette CSS 1
	TM_Shortcodes::tm_add_inline_css(".$_css_id .tms-bullet-nav { background-color: {$pagination_color_1} }");
// 2
	TM_Shortcodes::tm_add_inline_css(".$_css_id .tms-nav-dark .tms-bullet-nav { background-color: {$pagination_color_2} }");

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
 * Build output
 */
$_output = <<<CONTENT
		<div class="tm-slider-container hero-slider{$_window_height_class}"{$_inline_style_slider_wrapper}$transition_easing$transition_speed$auto_advance$pause_on_hover{$_data_nav_show_on_hover}$auto_advance_interval$progress_bar$show_nav_arrows$use_pagination$show_nav_arrows_attr$use_pagination_attr data-scale-under="0" data-width="722">
			<ul class="tms-slides">
CONTENT;

$content = TM_Shortcodes::tm_do_shortcode($content);
$_output .= preg_replace('/<\/p>\n$/i', '', $content);
$_output .= <<<CONTENT
			</ul>
		</div>
CONTENT;

/* Output */
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'padding_class' => ' pt-0 pb-0',
		'has_non_replicable_content' => TRUE,
		'skip_row_div' => TRUE,
		);
	TM_Shortcodes::output_shortcode_content('holder', $_output, "{$media_alignment} show-media-column-on-mobile" , '', $_args);
