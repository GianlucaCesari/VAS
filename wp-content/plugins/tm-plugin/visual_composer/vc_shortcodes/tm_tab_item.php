<?php
namespace ThemeMountain;

extract(shortcode_atts(array(
    'title' => '',
    'is_active' => '',
    'tab_id' => '', // none for default medium. small, medium, large or xlarge
), $atts));

// sanitization
	$is_active = esc_attr($is_active);
	$tab_id = esc_attr($tab_id);

// attributes
	if( $is_active !== '' ) $is_active = ' class="active"';

// content
	$_tab_content = TM_Shortcodes::tm_do_shortcode($content);

/** Construct output */
	$_output = "<div id='".$tab_id."'{$is_active}><div class='tab-content'>{$_tab_content}</div></div>";

/** Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);
