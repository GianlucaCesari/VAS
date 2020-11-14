<?php
namespace ThemeMountain;

$_output = $_style_class = $_tab_panes_target_hover = $_tab_panes_target_active = $_current_tab_id = '';

$_css_target = array();

extract(shortcode_atts(array(
	'el_class' => '',
	'alignment' => '', // right or vertical.
	'tab_style' => 'default',
	'size' => 'medium', // none for default medium. small, medium, large or xlarge
	'button_background_color' => '#f4f4f4',
	'button_background_color_hover' => '#dddddd',
	'button_background_color_active' => '#FFFFFF',
	'button_border_color' => '#f4f4f4',
	'button_border_color_hover' => '#dddddd',
	'button_border_color_active' => '#EEEEEE',
	'button_text_color' => '#666666',
	'button_text_color_hover' => '#232323',
	'button_text_color_active' => '#0cbacf',
	'panel_text_color' => 'inherit',
	'border_style' => '', // none or rounded
	'el_class' => '',
	'tabs_id' => ''
), $atts));

/**
 * Make sure that the colors are set properly when they are sent as blank
 */
	$button_background_color = (!empty($button_background_color)) ? esc_attr($button_background_color) : "#f4f4f4";
	$button_background_color_hover = (!empty($button_background_color_hover)) ? esc_attr($button_background_color_hover) : "#dddddd";
	$button_background_color_active = (!empty($button_background_color_active)) ? esc_attr($button_background_color_active) : "#FFFFFF";
	$button_border_color = (!empty($button_border_color)) ? esc_attr($button_border_color) : "#f4f4f4";
	$button_border_color_hover = (!empty($button_border_color_hover)) ? esc_attr($button_border_color_hover) : "#dddddd";
	$button_border_color_active = (!empty($button_border_color_active)) ? esc_attr($button_border_color_active) : "#EEEEEE";
	$button_text_color = (!empty($button_text_color)) ? esc_attr($button_text_color) : "#666666";
	$button_text_color_hover = (!empty($button_text_color_hover)) ? esc_attr($button_text_color_hover) : "#232323";
	$button_text_color_active = (!empty($button_text_color_active)) ? esc_attr($button_text_color_active) : "#0cbacf";
	$panel_text_color = (!empty($panel_text_color)) ? esc_attr($panel_text_color) : "inherit";

// css ID
	$_css_id = 'tm_tab_holder-'.TM_Shortcodes::tm_serial_number();

// Styles
	switch($tab_style) {
		case 'button':
			$_style_class = ' style-1';
			$_css_target = array(
				'button_background_color' => ".{$_css_id}.tabs.style-1 .tab-nav > li > a",
				'button_background_color_hover' => ".{$_css_id}.tabs.style-1 .tab-nav > li > a:hover",
				'button_background_color_active' => ".{$_css_id}.tabs.style-1 .tab-nav > li.active > a",
				'button_border_color' => ".{$_css_id}.tabs.style-1 .tab-nav > li a",
				'button_border_color_hover' => ".{$_css_id}.tabs.style-1 .tab-nav > li a:hover",
				'button_border_color_active' => ".{$_css_id}.tabs.style-1 .tab-nav > li a.active",
				'button_text_color' => ".{$_css_id}.tabs.style-1 .tab-nav > li > a",
				'button_text_color_hover' => ".{$_css_id}.tabs.style-1 .tab-nav > li > a:hover",
				'button_text_color_active' => ".{$_css_id}.tabs.style-1 .tab-nav > li.active a, .{$_css_id}.tabs.style-1 .tab-nav > li.active > a:hover",
				'panel_text_color' => ".{$_css_id}.tabs.style-1 .tab-content",
				);
			break;
		case 'line':
			$_style_class = ' style-2';
			$_tab_panes_target_hover = " .{$_css_id} .tab-panes";
			$_css_target = array(
				'button_border_color_line' => ".{$_css_id}.tabs.style-2 .tab-nav > li a, .{$_css_id}.tabs.style-2.vertical .tab-nav > li a,.{$_css_id}.tabs.style-2:not(.vertical) .tab-panes, .{$_css_id}.tabs.style-2.vertical.right .tab-nav>li a",
				'button_border_color_hover' => ".{$_css_id}.tabs.style-2 .tab-nav > li:not(.active) > a:hover",
				'button_border_color_active_line' => ".{$_css_id}.tabs.style-2 .tab-nav > li.active a, .{$_css_id}.tabs.style-2 .tab-nav > li.active a:hover,.{$_css_id}.tabs.style-2.vertical .tab-nav > li.active a, .{$_css_id}.tabs.style-2.vertical.right .tab-nav > li.active a, .{$_css_id}.tabs.style-2.vertical .tab-nav > li.active a:hover, .{$_css_id}.tabs.style-2.vertical.right .tab-nav > li.active a:hover",
				'button_text_color' => ".{$_css_id}.tabs.style-2 .tab-nav > li > a",
				'button_text_color_hover' => ".{$_css_id}.tabs.style-2 .tab-nav > li > a:hover",
				'button_text_color_active_line' => ".{$_css_id}.tabs.style-2 .tab-nav > li.active a, .{$_css_id}.tabs.style-2 .tab-nav > li.active > a:hover,.{$_css_id}.tabs.style-2.vertical .tab-nav > li.active a, .{$_css_id}.tabs.style-2.vertical .tab-nav > li.active > a:hover",
				'panel_text_color' => ".{$_css_id}.tabs.style-2 .tab-content",
				);
			$border_style = '';
			break;
		case 'text':
			$_style_class = ' style-3';
			$_css_target = array(
				'button_text_color' => ".{$_css_id}.tabs.style-3 .tab-nav > li > a",
				'button_text_color_hover' => ".{$_css_id}.tabs.style-3 .tab-nav > li > a:hover",
				'button_text_color_active' => ".{$_css_id}.tabs.style-3 .tab-nav > li.active a, .{$_css_id}.tabs.style-3 .tab-nav > li.active > a:hover,.{$_css_id}.tabs.style-3.vertical .tab-nav > li.active a, .{$_css_id}.tabs.style-3.vertical .tab-nav > li.active > a:hover",
				'panel_text_color' => ".{$_css_id}.tabs.style-3 .tab-content",
				);
			$border_style = '';
			break;
		default:
			$_css_target = array(
				'button_background_color' => ".{$_css_id}.tabs .tab-nav > li > a",
				'button_background_color_hover' => ".{$_css_id}.tabs .tab-nav > li:not(.active) > a:hover",
				'button_background_color_active' => ".{$_css_id}.tabs .tab-nav > li.active > a, .{$_css_id}.tabs .tab-nav > li.active > a:hover",
				'button_border_color' => ".{$_css_id}.tabs .tab-nav > li > a",
				'button_border_color_hover' => ".{$_css_id}.tabs .tab-nav > li:not(.active) > a:hover",
				'button_border_color_active' => ".{$_css_id}.tabs .tab-nav > li.active > a, .{$_css_id}.tabs .tab-nav > li.active > a:hover",
				'button_border_color_active_bottom' => ".{$_css_id}.tabs .tab-nav > li:not(.active) > a, .{$_css_id}.tabs .tab-nav > li:not(.active) > a:hover ",
				'button_text_color' => ".{$_css_id}.tabs .tab-nav > li > a",
				'button_text_color_hover' => ".{$_css_id}.tabs .tab-nav > li > a:hover",
				'button_text_color_active' => ".{$_css_id}.tabs .tab-nav > li.active a, .{$_css_id}.tabs .tab-nav > li.active > a:hover",
				'panel_text_color' => ".{$_css_id}.tabs .tab-content",
				'tab_panes_target_active' => " .{$_css_id}.tabs .tab-panes"
				);
			break;
	}

// style settings tab buttons
	/**
	* BUTTON BACKGROUND COLOR
	*/
	if ( $button_background_color !== '' && isset($_css_target['button_background_color'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['button_background_color']." {background-color:$button_background_color;}");
	}
	if ( $button_background_color_hover !== '' && isset($_css_target['button_background_color_hover'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['button_background_color_hover']." {background-color:$button_background_color_hover;}");
	}
	// background, active, hover
	if ( $button_background_color_active !== '' && isset($_css_target['button_background_color_active'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['button_background_color_active']." {background-color:$button_background_color_active;}");
	}

	/**
	* BUTTON BORDER COLOR
	*/
	if ( $button_border_color !== '' && isset($_css_target['button_border_color'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['button_border_color']." {border-left-color: {$button_border_color}; border-right-color: {$button_border_color}; border-top-color: {$button_border_color};}");
	}
	// for lines
	if ( $button_border_color !== '' && isset($_css_target['button_border_color_line'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['button_border_color_line']." {border-color: {$button_border_color};}");
	}

	if ( $button_border_color_hover !== '' && isset($_css_target['button_border_color_hover'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['button_border_color_hover']." {border-color:$button_border_color_hover;}");
	}

	if ( $button_border_color_active !== '' && isset($_css_target['button_border_color_active'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['button_border_color_active']." {border-left-color: {$button_border_color_active}; border-right-color: {$button_border_color_active}; border-top-color: {$button_border_color_active};} /* button_border_color_active */");
		if($button_border_color_active !== '' && isset($_css_target['tab_panes_target_active'])) {
			TM_Shortcodes::tm_add_inline_css($_css_target['tab_panes_target_active']." {border-color:$button_border_color_active;} /*  tab_panes_target_active */");
		}
	}

	// for lines
	if ( $button_border_color_active !== '' && isset($_css_target['button_border_color_active_line'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['button_border_color_active_line']." {border-color: {$button_border_color_active};}");
	}

	// active bottom
	if ( $button_border_color_active !== '' && isset($_css_target['button_border_color_active_bottom'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['button_border_color_active_bottom']." {border-bottom-color: {$button_border_color_active}; } /* button_border_color_active_bottom */");
	}

	/**
	 * BUTTON TEXT
	 */
	if ( $button_text_color !== '' && isset($_css_target['button_text_color'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['button_text_color']." {color:$button_text_color;}");
	}

	if ( $button_text_color_hover !== '' && isset($_css_target['button_text_color_hover'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['button_text_color_hover']." {color:$button_text_color_hover;}");
	}

	if ( $button_text_color_active !== '' && isset($_css_target['button_text_color_active'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['button_text_color_active']." {color:$button_text_color_active;} /* button_text_color_active */");
	}

	// for line
	if ( $button_text_color_active !== '' && isset($_css_target['button_text_color_active_line'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['button_text_color_active_line']." {color:$button_text_color_active;}");
	}

	// style settings tab panel
	if ( $panel_text_color !== '' && isset($_css_target['panel_text_color'])) {
		TM_Shortcodes::tm_add_inline_css($_css_target['panel_text_color']." {color:$panel_text_color;}");
	}

// other attributes (class names)
	$el_class = ($el_class!=='') ? ' '.esc_attr($el_class) : '';
	if($size === 'medium') $size = '';
	if($size !== '') $size = ' '.esc_attr($size);
	if($border_style !== '') $border_style = ' '.esc_attr($border_style);
	if($alignment !== '') $alignment = ' '.esc_attr($alignment);

$_tabContent = TM_Shortcodes::tm_do_shortcode($content);


// Extract tab titles
preg_match_all( '/tm_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
$tab_titles = array();

if ( isset( $matches[1] ) ) {
	$tab_titles = $matches[1];
}
// active tab exists
if(strpos($content, 'is_active="true"') > 0){
	$_no_active_tab = FALSE;
} else {
	$_no_active_tab = TRUE;
}

$_tabs_nav = '';
$_tabs_nav .= "<ul class='tab-nav'>";

foreach ( $tab_titles as $tab ) {
	$_tab_atts = shortcode_parse_atts( $tab[0] );
	if ( isset( $_tab_atts['title'] ) && isset( $_tab_atts['tab_id'] )  ) {
		$_current_tab_id = $_css_id.'-'.sanitize_title( $_tab_atts['title'] );
		$_tabs_nav .= '<li';
		if(isset( $_tab_atts['is_active']) || $_no_active_tab === TRUE) {
			$_tabs_nav .= ' class="active"';
			$_no_active_tab = FALSE;
		}
		$_tabs_nav .= '><a href="#' .$_current_tab_id.'">' . $_tab_atts['title'] . '</a></li>';
		$content = str_replace( $_tab_atts['tab_id'], $_current_tab_id , $content);
	}
}
$_tabs_nav .= '</ul>';
$_tabContent = TM_Shortcodes::tm_do_shortcode($content);

$_output = "<div class='{$_css_id} tabs{$_style_class}{$size}{$border_style}{$alignment}{$el_class}'>\n{$_tabs_nav}\n<div class='tab-panes'>\n{$_tabContent}\n</div></div>\n";

/* Output */
	TM_Shortcodes::output_shortcode_content('inline_holder', $_output);
