<?php
use ThemeMountain\TM_Shortcodes as TM_Shortcodes;
add_shortcode( 'tm_content_progress_bar', 'tm_content_progress_bar' );
function tm_content_progress_bar($atts, $content, $tagname) {
	$_output = $label_output = '';

	extract(shortcode_atts(array(
		'margin_bottom' => '30',
		'margin_bottom_mobile' => '30',
		'label' => '',
		'hide_measure' => '',
		'percentage' => '50',
		'measure' => '%',
		'animate' => 'true',
		'size' => 'medium',
		'border_style' => '',
	    'el_class' => '',
	    'el_id' => '',
	    'track_background_color' => '#eee',
	    'track_border_color' => '#eee',
	    'bar_background_color' => '#d0d0d0',
	    'bar_border_color' => '#d0d0d0',
	    'text_color' => '',
	), $atts));

	// css id
		$_css_id = 'tm-progress-bar-'.TM_Shortcodes::tm_serial_number();

	// class name
		if(!empty($border_style)) $border_style = ' '.$border_style;
		if(!empty($size)) $size = ' '.$size;


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

	// percentage
	if($hide_measure !== 'true') {
		$hide_measure = '<span class="pull-right">'.TM_Shortcodes::tm_wp_kses($percentage).$measure.'</span>';
	} else {
		$hide_measure = '';
	}

	// label
	if($label !== '') {
		$label_output = $label_output = '<span class="progress-bar-label">'.TM_Shortcodes::tm_wp_kses($label).$hide_measure.'</span>';
	}

	if($animate !== '') {
		$animate = ' horizon';
		$_data_animate_in =' data-animate-in="transX:-100%;duration:1000ms;easing:swing;"';
	} else {
		$_data_animate_in = '';
	}

	// css
		// track_background_color
		if ( $track_background_color !== '' ) {
			TM_Shortcodes::tm_add_inline_css(".$_css_id {background-color:$track_background_color;}");
		}
		// track_border_color
		if ( $track_border_color !== '' ) {
			TM_Shortcodes::tm_add_inline_css(".$_css_id {border-color:$track_border_color;}");
		}

		// bar_background_color
		if ( $bar_background_color !== '' ) {
			TM_Shortcodes::tm_add_inline_css(".$_css_id .bar {background-color:$bar_background_color;}");
		}
		// bar_border_color
		if ( $bar_border_color !== '' ) {
			TM_Shortcodes::tm_add_inline_css(".$_css_id .bar {border-color:$bar_border_color;}");
		}

		// text_color
		if ( $text_color !== '' ) {
			TM_Shortcodes::tm_add_inline_css(".$_css_id .bar {color:$text_color;}");
		}

	// class / id
		$el_class = ($el_class !== '' ) ? ' '.$el_class : '';
		$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);

	$_output = "{$label_output}<div class='{$_css_id} progress-bar {$size}{$border_style}{$margin_bottom}{$margin_bottom_mobile}{$el_class}'{$el_id}><div class='bar{$animate}' style='width:{$percentage}%;'{$_data_animate_in}></div></div>";

	/** Output */
		return $_output;
}