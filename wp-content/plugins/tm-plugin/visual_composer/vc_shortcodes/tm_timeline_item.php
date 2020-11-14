<?php
namespace ThemeMountain;

$_output = $_menu_line_class = $_description_horizon_class = $_date_description_class = $_timeline_section = $_entry_alignment = '';

extract(shortcode_atts(array(
	'title' => '', // textfield title used as date
	'is_new_timeline_section' => '', // #963
	'entry_alignment' => 'left', // #963
	'padding_bottom' => '30',
	'date_animation' => '', // dropdown
	'date_animation_duration' => '1000', // textfield
	'date_animation_delay' => '0', // textfield
	'date_animation_threshold' => '0.5', // textfield
	'description_animation' => '', // dropdown
	'description_animation_duration' => '1000', // textfield
	'description_animation_delay' => '0', // textfield
	'description_animation_threshold' => '0.5', // textfield
), $atts));

// css ID
	$_css_id = 'tm-timeline-item-'.TM_Shortcodes::tm_serial_number();

// Clean up
	$title = TM_Shortcodes::tm_wp_kses($title);
	$content = TM_Shortcodes::tm_do_shortcode($content);
	$_timeline_section = ($is_new_timeline_section === 'true') ? ' timeline-section' : '';
	$_entry_alignment = (!empty($entry_alignment)) ? ' entry-'.esc_attr($entry_alignment) : ' entry-left';

// padding class
	// padding botton
	if($padding_bottom !=='' && $padding_bottom !== 'inherit') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}.timeline .timeline-content { padding-bottom: {$padding_bottom}px; }");
	}

// animation for date
	if ($date_animation !== '' ) {
		// sanitization
		$date_animation = esc_attr($date_animation);
		$date_animation_duration = esc_attr($date_animation_duration);
		$date_animation_delay = esc_attr($date_animation_delay);
		$date_animation_threshold = esc_attr($date_animation_threshold);
		if($date_animation_threshold !== ''){
			$date_animation_threshold = " data-threshold='{$date_animation_threshold}'";
		}
		$date_animation = " data-animate-in='preset:{$date_animation};duration:{$date_animation_duration}ms;delay:{$date_animation_delay}ms;'{$date_animation_threshold}";
		$_date_description_class = ' horizon';
	}

// animation for description
	if ($description_animation !== '' ) {
		// sanitization
		$description_animation = esc_attr($description_animation);
		$description_animation_duration = esc_attr($description_animation_duration);
		$description_animation_delay = esc_attr($description_animation_delay);
		$description_animation_threshold = esc_attr($description_animation_threshold);
		if($description_animation_threshold !== ''){
			$description_animation_threshold = " data-threshold='{$description_animation_threshold}'";
		}
		$description_animation = " data-animate-in='preset:{$description_animation};duration:{$description_animation_duration}ms;delay:{$description_animation_delay}ms;'{$description_animation_threshold}";
		$_description_horizon_class = ' horizon';
	}

// construct output
$_output .= <<<CONTENT
	<li class="$_css_id timeline-item$_timeline_section$_entry_alignment">
		<div class="timeline-info{$_date_description_class}"$date_animation>
			<p>$title</p>
		</div>
		<div class="timeline-content{$_description_horizon_class}"$description_animation>
			$content
		</div>
	</li>
CONTENT;

/** Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);