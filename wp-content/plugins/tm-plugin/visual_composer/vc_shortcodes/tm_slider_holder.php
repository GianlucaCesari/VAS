<?php
namespace ThemeMountain;

$_output = $_sliderContent = $_window_height = $slider_type_class = $_window_height_class = $_custom_height_style = $_parallax_class = $_width_height = $_section_block_id = $_section_inline_style_for_custom_height = $_inline_style_slider_wrapper = '';

$_is_inline_element = FALSE;

extract( shortcode_atts( array(
	'slider_type' => 'content', // full, full_width, content
	'width'=>'1140',
	'height'=>'regular', // dropdown. regular, window_height, custom
	'height_custom' => '500', // textfield
	'scale_under' => '960',
	'minimum_height' => '265',
	'el_class' => '',
	'slider_id' => '', // tab_id. auto generated.
	/*
		Slider Parameters
	*/
	// design options
	'pagination_color_1' => '#FFFFFF',
	'pagination_color_2' => '#000',
	// Visual Effets
	'transition_easing' => 'linear',
	'transition_speed' => '700',
	'parallax' => '', // depends on type full and full_width
	'parallax_fade_on_scroll' => '', // depends on parallax, true
     // navigation
	'auto_advance' => '', // checkbox
	'auto_advance_interval' => '5000', // textfield. depends on auto_advance = true
	'pause_on_hover' => 'true', // checkbox
	'progress_bar' => '', // checkbox
	'show_nav_arrows' => 'true',
	'use_pagination' => 'true', // checkbox
	'nav_on_hover' => '',
), $atts ) );

/**
 * CSS ID
 *
 * @var        string
 */
	$_css_id = 'slider-'.TM_Shortcodes::tm_serial_number();

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
 * Parallax VFX
 */
	if($parallax !== '' && ($slider_type == 'fullscreen' || $slider_type == 'full_width') ) {
		$parallax = ' data-parallax';
		if($parallax_fade_on_scroll !== '') {
			$parallax_fade_on_scroll = ' data-parallax-fade-out';
		}
		$_parallax_class = ' tm-slider-parallax-container';
	} else {
		$_parallax_class = '';
		$parallax_fade_on_scroll = '';
		if ($slider_type == 'fullscreen' || $slider_type == 'full_width') {
			$_is_inline_element = FALSE;
			$parallax = ' data-parallax';
		}
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


// slider type. translate into class names & $external_padding
	switch ($slider_type) {
		case 'full_width':
			$slider_type_class = ' full-width-slider featured-media';
			$external_padding = " data-external-padding='.wrapper-inner'";
			break;
		case 'fullscreen':
			$slider_type_class = ' fullscreen featured-media';
			$external_padding = " data-external-padding='.wrapper-inner'";
			break;
		case 'content':
		default:
			$slider_type_class = ' content-slider';
			$external_padding = "";
			// slider width
			$_is_inline_element = TRUE;
			break;
	}
/**
 * Slight Height
 */
	// slider height (default value depends on type)
	$width = esc_attr($width);
	if($slider_type === 'full_width' || $slider_type === 'content') {
		switch ($height) {
			case 'custom':
				$_window_height_class = '';
				$_custom_height_style .= 'height:'.esc_attr($height_custom).'px;';
				$_width_height = " data-height='".esc_attr($height_custom)."'";
				if($slider_type=='content' && $width !==''){
					$_width_height = $_width_height." data-width='{$width}'";
				}
				break;
			case 'window_height':
				$_window_height_class = ' window-height';
				break;
			default: // regular
				$_window_height_class = '';
				if($slider_type === 'content'){
					$_width_height = " data-height='760'";
					$height_custom = '760';
					if($width !=='' ){
						$_width_height = $_width_height." data-width='{$width}'";
					}
				}
				break;
		}
	} else {
		// fullscreen
		/** NOTE: although the fullscreen slider does not have a height option, it will require the window-height class by default as we are wrapping it in a section block */
		$_window_height_class = ' window-height';
	}

	// scale_under (int)
	if($scale_under !=='') {
		$scale_under = esc_attr($scale_under);
		$scale_under = " data-scale-under='{$scale_under}'";
	}

	// min_height (int)
	if($minimum_height !=='') {
		$minimum_height = esc_attr($minimum_height);
		$minimum_height = " data-scale-min-height='{$minimum_height}'";
	} else {
		$minimum_height = " data-scale-min-height=''";
	}

/**
 * nav color palette
 */
	// nav color palette CSS 1
	TM_Shortcodes::tm_add_inline_css(".$_css_id .tms-bullet-nav { background-color: {$pagination_color_1} }");
	// nav color palette CSS 2
	TM_Shortcodes::tm_add_inline_css(".$_css_id.tms-nav-dark .tms-bullet-nav { background-color: {$pagination_color_2} }");


	/** Set Height inline as attribute */
	if($_is_inline_element !== TRUE) {
		$_height_class_section = $_window_height_class;
		$_height_class_container = '';
	} else {
		$_height_class_section = '';
		$_height_class_container = $_window_height_class;
	}

// custom height style
	if($_custom_height_style !== '' ) {
		// TM_Shortcodes::tm_add_inline_css(".{$_css_id} { $_custom_height_style }");
		$_inline_style_slider_wrapper .= " style='{$_custom_height_style}'";
	}


/** slider content. li block for each slide */
	$_sliderContent = preg_replace( '/<\/?p\>/', "\n", TM_Shortcodes::tm_do_shortcode($content));

/**
 * If slider type is fullscreen or full-width-slider and when the paralax is off, then wrap with section block.
 * Otherwise treat that as an inline element.
 */
	/** Treat as a sectiob block */
	if($_is_inline_element !== TRUE) {
		$_args = array(
			'el_class' => esc_attr($el_class),
			'css_id' => $_css_id,
			'padding_class' => ' pt-0 pb-0',
			'has_non_replicable_content' => TRUE,
			'skip_row_div' => TRUE,
			);
		$_output = "<div class='tm-slider-container{$slider_type_class}'{$_width_height}{$scale_under}{$minimum_height}{$parallax}{$parallax_fade_on_scroll}{$transition_easing}{$transition_speed}{$_data_nav_show_on_hover}{$auto_advance}{$pause_on_hover}{$auto_advance_interval}{$progress_bar}{$show_nav_arrows}{$use_pagination}{$external_padding}{$show_nav_arrows_attr}{$use_pagination_attr}>\n<ul class='tms-slides'>\n{$_sliderContent}\n</ul>\n</div>\n";

		/* Output */
		TM_Shortcodes::output_shortcode_content('holder', $_output, "featured-media{$_parallax_class}{$_height_class_section}" , "{$_inline_style_slider_wrapper}", $_args);
	/** Treat as an inline element */
	} else {
		$el_class = ($el_class !== '') ? ' '.esc_attr($el_class) : '';
		$_output = "<div class='{$_css_id} tm-slider-container{$slider_type_class}{$_height_class_container}{$el_class}'{$_width_height}{$scale_under}{$minimum_height}{$parallax}{$parallax_fade_on_scroll}{$transition_easing}{$transition_speed}{$_data_nav_show_on_hover}{$auto_advance}{$pause_on_hover}{$auto_advance_interval}{$progress_bar}{$show_nav_arrows}{$use_pagination}{$external_padding}{$show_nav_arrows_attr}{$use_pagination_attr}{$_inline_style_slider_wrapper}>\n<ul class='tms-slides'>\n{$_sliderContent}\n</ul>\n</div>\n";
		/* Output */
		TM_Shortcodes::output_shortcode_content('inline', $_output);
	}

/**
 * End
 */

