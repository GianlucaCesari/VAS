<?php
/**
 * tm_hero_split_slider_holder
 *
 * @since      1.1
 */
namespace ThemeMountain;

$_output = $_media_column = $_inner_column = $_custom_height_style = $_hero_content = $_matches = $_value = $_slider_content = '';

extract(shortcode_atts(array(
	'height' => 'regular',
	'height_custom' => '500',
	'content_media_width' => 'split_50_50',
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
	$_css_id = 'tm-hero-split-slider-holder-'.TM_Shortcodes::tm_serial_number();

// sanitization
	$media_alignment = esc_attr($media_alignment);

/**
 * Slight Height
 */
	switch ($height) {
		case 'custom':
			$_window_height_class = '';
			if(!empty($height_custom)) {
				TM_Shortcodes::tm_add_inline_css(".$_css_id { height: {$height_custom}px; min-height: {$height_custom}px }");
			}
			break;
		case 'window_height':
			$_window_height_class = ' window-height';
			break;
		default: // regular
			$_window_height_class = '';
			$height_custom = '760';
			break;
	}

/**
 * Media Column Width
 */
switch ($content_media_width) {
	case 'split_50_50':
		if($media_alignment === 'left') {
			$_media_column = 'width-6';
			$_inner_column = 'width-5 offset-7';
		} else {
			$_media_column = 'width-6';
			$_inner_column = 'width-5';
		}
		break;
	case 'split_60_40':
		if($media_alignment === 'left') {
			$_media_column = 'width-5';
			$_inner_column = 'width-6 offset-6';
		} else {
			$_media_column = 'width-5';
			$_inner_column = 'width-6';
		}
		break;
	case 'split_75_25':
		if($media_alignment === 'left') {
			$_media_column = 'width-4';
			$_inner_column = 'width-7 offset-5';
		} else {
			$_media_column = 'width-4';
			$_inner_column = 'width-7';
		}
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

/** Look for a hero content*/
preg_match_all( '/\[tm_hero_split_slider_item.*?\](.*?)\[\/tm_hero_split_slider_item\]/s', $content, $_matches, PREG_OFFSET_CAPTURE );

// loop through
foreach($_matches[0] as $_value) {
	if(
		strpos($_value[0], 'is_hero_content="true"') !== FALSE
	) {
		if($_hero_content === '') {
			preg_match_all( '/\[tm_hero_split_slider_item.*?\](.*?)\[\/tm_hero_split_slider_item\]/s', $_value[0], $_matches, PREG_OFFSET_CAPTURE );
			// remove unwanted ps
			if(isset($_matches[1][0][0])) {
				$_hero_content = $_matches[1][0][0];
				$_hero_content = ltrim($_hero_content, '</p>');
				$_hero_content = rtrim($_hero_content, '<p>');
			}
			// wrap with p if plain text
			if(preg_match( "/\/[a-z]*>/i", $_hero_content ) == 0){
				$_hero_content = '<p>'.$_hero_content.'</p>';
			}
		}
	} else {
		$_slider_content .= $_value[0];
	}
}

$_output .= <<<CONTENT
	<div class="media-column $_media_column background-none">
		<div class="tm-slider-container content-slider"$transition_easing$transition_speed{$_data_nav_show_on_hover}$auto_advance$pause_on_hover$auto_advance_interval$progress_bar$show_nav_arrows$use_pagination$show_nav_arrows_attr$use_pagination_attr data-scale-under="0" data-width="722">
			<ul class="tms-slides">
CONTENT;

$_output .= preg_replace( '/<\/?p\>/', "\n", TM_Shortcodes::tm_do_shortcode($_slider_content));

$_output .= <<<CONTENT
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="column $_inner_column">
			<div class="hero-content split-hero-content">
				<div class="hero-content-inner">
CONTENT;

// $_output .= preg_replace( '/<\/?p\>/', "\n", TM_Shortcodes::tm_do_shortcode($_hero_content));
$_output .= TM_Shortcodes::tm_do_shortcode($_hero_content);

$_output .= <<<CONTENT
				</div>
			</div>
		</div>
	</div>
CONTENT;

/* Output */
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'has_non_replicable_content' => TRUE,
		'skip_row_div' => TRUE,
		);

	TM_Shortcodes::output_shortcode_content('holder', $_output, "hero-5 {$media_alignment} show-media-column-on-mobile$_window_height_class" , '', $_args);
