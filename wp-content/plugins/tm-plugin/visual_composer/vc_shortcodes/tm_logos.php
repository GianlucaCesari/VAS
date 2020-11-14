<?php
namespace ThemeMountain;

$_output = $_logos_content = $_logos_content_opened = $_style = $_counter = '';

extract(shortcode_atts(array(
	'items_per_row' => '3', //
	'logo_type' => '1', // 1: Simple Grid, 2: Grid with boxes, 3:Grid with borders , 4: Grid with dividers
	'logos_id' => '',
	// 'image_id' => '',
	'el_id' => '',
	'el_class' => '',
	// 'bkg_color' => '#fff',
	'bkg_color_logo' => 'rgba(0,0,0,0.5)', //
	'bkg_color_logo_hover' => 'rgba(0,0,0,0.5)',
	'border_bkg_color_hover' => '#dddddd',
	'logo_bkg_color_hover' => '#dddddd',
	'border_color' => '#dddddd',
), $atts));

// css ID
	$_css_id = 'logos-'.TM_Shortcodes::tm_serial_number();

// style differs depending on logo type
// 1: Simple Grid, 2: Grid with boxes, 3:Grid with borders , 4: Grid with dividers
	$logo_type = esc_attr($logo_type);
	if( $logo_type == '2' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} a { background-color: {$bkg_color_logo}; }");
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} a:hover { background-color: {$bkg_color_logo_hover}; }");
	} else if ( $logo_type == '3') {
		// $logo_bkg_color_hover
		TM_Shortcodes::tm_add_inline_css(".{$_css_id}, .{$_css_id}:before, .{$_css_id} a:hover { background-color: {$logo_bkg_color_hover}; }");
		// $border_bkg_color_hover
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .grid-item, .{$_css_id} .grid-item:before, .{$_css_id} .grid-item:after { border-color: {$border_bkg_color_hover}; }");
	} else if ( $logo_type == '4') {
		// $border_bkg_color_hover
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .grid-item, .{$_css_id} .grid-item:before, .{$_css_id} .grid-item:after { border-color: {$border_bkg_color_hover}; }");
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .grid-item:before, .{$_css_id} .grid-item:after { border-color: {$border_color}; }");
	}

// row, added to $_logos_content
$logos_id = explode(',',$logos_id);
if(is_array($logos_id)){
	$items_per_row = esc_attr($items_per_row);
	$_logos_content .= "<div class='row content-grid-{$items_per_row}'>";
	foreach ($logos_id as $_logo_image_id){
		if ($_logo_image_id !== '') {
			$_logos_content .= "<div class='grid-item'><a>".TM_Shortcodes::generate_image_tag_from_id($_logo_image_id,'Logo image')."</a></div>\n";
		} else {
			continue;
		}
	}
	$_logos_content .= '</div>';
} else {
	return;
}

// const argument
	$_args = array(
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'css_id' => $_css_id,
		'skip_div_wrap' => TRUE,
		'image_id' => '',
		'has_non_replicable_content' => TRUE,
		);

/* Output */
	TM_Shortcodes::output_shortcode_content('section', $_logos_content, "logos-{$logo_type}", '', $_args);
