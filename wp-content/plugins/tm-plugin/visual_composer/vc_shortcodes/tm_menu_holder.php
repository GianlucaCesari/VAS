<?php
namespace ThemeMountain;

$_output = '';

extract(shortcode_atts(array(
	'title' => '', // textfield
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'menu_column_width' => '10', // dropdown
	'menu_column_offset' => '1', // dropdown
	'el_class' => '', // textfield
	'el_id' => '', // textfield
	// Design Options
	'menu_title_alignment' => 'left',
	'menu_items_alignment' => 'left',
	// background color
	'menu_bkg_color' => '#FFFFFF',
	'background_use_gradient' => '',
	'background_gradient_end_color' => '',
	'background_gradient_angle' => '',
	// ovrelay
	'menu_item_overlay_color' => 'rgba(0,0,0,0.3)',
	'overlay_background_use_gradient' => '',
	'overlay_background_gradient_end_color' => '',
	'overlay_background_gradient_angle' => '',
	// other color
	'menu_border_color' => '#eee', // colorpicker
	'menu_title_color' => '', // colorpicker
	'menu_item_title_color' => '', // colorpicker
	'menu_item_description_color' => '', // colorpicker
	'menu_item_line_color' => '', // colorpicker
	// Display Options
	'menu_border_style' => '',
	'display_menu_items_inline' => '', // checkbox
	'menu_item_line_type' => 'dashed', // dropdown
	'box_size' => 'medium',
	'box_top_bottom_padding' => '15',
	'box_left_right_padding' => '15',
), $atts));

// css ID
	$_css_id = 'tm-menu-'.TM_Shortcodes::tm_serial_number();

// conversion
	if($el_class!== '') $el_class = ' '.esc_attr($el_class);
	$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);
	$image_id = ($image_source === 'image_id') ? $image_id : $image_url;
	$display_menu_items_inline = ($display_menu_items_inline!== '') ? ' menu-items-inline' : '';
	$menu_border_style = ' '.esc_attr($menu_border_style);

// box size
	if($box_size === 'custom') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}.menu-box { padding: {$box_top_bottom_padding}px {$box_left_right_padding}px; }");
		if(!empty($image_id) || !empty($image_url)) {
			TM_Shortcodes::tm_add_inline_css(".{$_css_id}.menu-box .thumbnail { margin: -{$box_top_bottom_padding}px -{$box_left_right_padding}px 3rem; }");
		}
		$box_size = ' size-custom';
	} else if(!empty($box_size)) {
		$box_size = ' '.$box_size;
	}

// Column settings
	$menu_column_width = esc_attr($menu_column_width);
	$menu_column_offset = ($menu_column_offset !=='') ? " offset-".esc_attr($menu_column_offset) : '';

// CSS cue
	// menu_bkg_color
	if($menu_bkg_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}, .{$_css_id} .menu-list .menu-description, .{$_css_id} .menu-list .menu-price, .{$_css_id} .menu-list .menu-title {".TM_Shortcodes::construct_gradient_css($menu_bkg_color,$background_use_gradient,$background_gradient_end_color,$background_gradient_angle,TRUE)."}");
	}

	// menu_border_color
	if($menu_border_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} { border-color: $menu_border_color; }");
	}

	// menu_title_color
	if($menu_title_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} > h4, .{$_css_id} .thumbnail > h4 { color: $menu_title_color; }");
	}

	// menu_item_title_color
	if($menu_item_title_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .menu-item .menu-title, .{$_css_id} .menu-item .menu-price { color: $menu_item_title_color; }");
	}

	// menu_item_description_color
	if($menu_item_description_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .menu-item .menu-content .menu-description { color:$menu_item_description_color; }");
	}

	// menu_item_overlay_color
	if($menu_item_overlay_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}.menu-box .caption-over-outer {".TM_Shortcodes::construct_gradient_css($menu_item_overlay_color,$overlay_background_use_gradient,$overlay_background_gradient_end_color,$overlay_background_gradient_angle)."}");
	}

	// menu_item_line_type and menu_item_line_color
	if(empty($menu_item_line_type)) {
		$content = str_replace('[tm_menu_item ', '[tm_menu_item menu_item_line_class="hide" ',$content);
	} else if ($menu_item_line_type === 'solid') {
		$content = str_replace('[tm_menu_item ', '[tm_menu_item menu_item_line_class="solid" ',$content);
		if($menu_item_line_color !== '') {
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} .solid .menu-line {background-image: linear-gradient(to right,$menu_item_line_color 100%,rgba(0,0,0,0) 0);}");
		}
	} else if ($menu_item_line_type === 'dotted') {
		$content = str_replace('[tm_menu_item ', '[tm_menu_item menu_item_line_class="dotted" ',$content);
		if($menu_item_line_color !== '') {
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} .dotted .menu-line {background-image: radial-gradient(circle closest-side,$menu_item_line_color 99%,rgba(0,0,0,0) 0);}");
		}
	} else {
		// dashed
		$content = str_replace('[tm_menu_item ', '[tm_menu_item menu_item_line_class="dashed" ',$content);
		if($menu_item_line_color !== '') {
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} .dashed .menu-line {background-image: linear-gradient(to right,$menu_item_line_color 50%,rgba(0,0,0,0) 0);}");
		}
	}

// Construct output
$_output .= <<<CONTENT
	<div class="$_css_id box menu-box{$box_size}{$menu_border_style}{$el_class}"{$el_id}>
CONTENT;



if(!empty($image_id)) {
	$_output .= '<div class="thumbnail">';
	$_output .= TM_Shortcodes::generate_image_tag_from_id($image_id,$title);
	if(!empty($title)) {
		$_output .= '<div class="caption-over-outer"><div class="caption-over-inner color-white"><h4 class="inline mb-50">'.esc_html($title).'</h4></div></div>';
	}
	$_output .= '</div>';
} else if(!empty($title)) {
	$_output .= '<h4 class="mb-50">'.esc_html($title).'</h4>';
}

$_output .= <<<CONTENT
		<div class="row">
			<div class="column width-$menu_column_width $menu_column_offset">
				<ul class="menu-list $menu_items_alignment$display_menu_items_inline">
CONTENT;

$_output .= TM_Shortcodes::tm_do_shortcode($content,FALSE);

$_output .= <<<CONTENT
				</ul>
			</div>
		</div>
	</div>
CONTENT;

/* Output */
	TM_Shortcodes::output_shortcode_content('inline_holder', $_output);
