<?php
namespace ThemeMountain;

$_output = '';

extract(shortcode_atts(array(
	'media_alignment' => 'left', // dropdown. left, right
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'el_id' => '', // textfield
	'el_class' => '', // textfield
	// animation
	'content_animation' => 'fadeIn', // dropdown
	'content_animation_duration' => '1000', // textfield
	'content_animation_delay' => '0', // textfield
	'content_animation_threshold' => '0.5',
	'media_animation' => 'fadeIn', // dropdown
	'media_animation_duration' => '1000', // textfield
	'media_animation_delay' => '0', // textfield
	'media_animation_threshold' => '0.5',
	), $atts));

// css ID
	$_css_id = 'tm-feature-section-'.TM_Shortcodes::tm_serial_number();

// sanitization
	$media_alignment = esc_attr($media_alignment);

// construct $_image_html
	if($image_source === 'image_url' && !empty($image_url)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_url,'Feature section');
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_id, 'Feature section');
	} else {
		$_image_html = '';
	}

// animation
	if ($content_animation !== '' ) {
		// sanitization
		$content_animation = esc_attr($content_animation);
		$content_animation_duration = esc_attr($content_animation_duration);
		$content_animation_delay = esc_attr($content_animation_delay);
		$content_animation_threshold = esc_attr($content_animation_threshold);
		if($content_animation_threshold !== ''){
			$content_animation_threshold = " data-threshold='{$content_animation_threshold}'";
		}
		$content_animation = "data-animate-in='preset:{$content_animation};duration:{$content_animation_duration}ms;delay:{$content_animation_delay}ms;'{$content_animation_threshold}";
	}

	if($media_animation !== '') {
		$_media_content_horizon = ' horizon';
		// sanitization
		$media_animation = esc_attr($media_animation);
		$media_animation_duration = esc_attr($media_animation_duration);
		$media_animation_delay = esc_attr($media_animation_delay);
		$media_animation_threshold = esc_attr($media_animation_threshold);
		if($media_animation_threshold !== ''){
			$media_animation_threshold = " data-threshold='{$media_animation_threshold}'";
		}
		$media_animation = "data-animate-in='preset:{$media_animation};duration:{$media_animation_duration}ms;delay:{$media_animation_delay}ms;'{$media_animation_threshold}";
	}

/**
 * dirty fix to remove stray tags
 */
	$content = TM_Shortcodes::tm_rudementary_p_tag_remover($content);
	$content = TM_Shortcodes::tm_do_shortcode($content,FALSE);

// media_alignment
if($media_alignment === 'left') {
	/** LEFT */
	$media_alignment = '';
$_output = <<<CONTENT
	<div class="row flex">
		<div class="column width-6 push-5 offset-1">
			<div class="feature-image mb-mobile-50">
				<div class="feature-image-inner center-on-mobile horizon" $media_animation>
					$_image_html
				</div>
			</div>
		</div>
		<div class="column width-5 pull-7">
			<div class="feature-content">
				<div class="feature-content-inner horizon" $content_animation>
					$content
				</div>
			</div>
		</div>
	</div>
CONTENT;
} else {
	/** RIGHT */
	$media_alignment = ' right';
$_output = <<<CONTENT
	<div class="row flex">
		<div class="column width-6">
			<div class="feature-image">
				<div class="feature-image-inner center-on-mobile horizon" $media_animation>
					$_image_html
				</div>
			</div>
		</div>
		<div class="column width-5 offset-1">
			<div class="feature-content">
				<div class="feature-content-inner left horizon" $content_animation>
					$content
				</div>
			</div>
		</div>
	</div>
CONTENT;
}

// const argument
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'skip_row_div' => TRUE,
		'has_non_replicable_content' => TRUE,
		);

/* Output */
	TM_Shortcodes::output_shortcode_content('feature_section', $_output, "section-block feature-2{$media_alignment}", '', $_args);