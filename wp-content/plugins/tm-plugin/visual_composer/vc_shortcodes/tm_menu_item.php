<?php
namespace ThemeMountain;

$_output = $_menu_line_class = $_menu_item_class = '';

extract(shortcode_atts(array(
	'title' => '',
	'menu_item_description' => '',
	'menu_item_price' => '',
	'show_price' => 'true',
	'menu_item_line_class' => 'dashed',
), $atts));

// css ID
	// $_css_id = 'tm-menu-item-'.TM_Shortcodes::tm_serial_number();

// Clean up
	$title = TM_Shortcodes::tm_wp_kses($title);
	$menu_item_description = TM_Shortcodes::tm_wp_kses($menu_item_description);
	$menu_item_price = TM_Shortcodes::tm_wp_kses($menu_item_price);
	$show_price = ($show_price!== '') ? TRUE : FALSE;

// menu line appearance
	// if($show_price === TRUE) {
	// }
	switch($menu_item_line_class) {
		case 'solid':
		$_menu_item_class = ' solid';
		break;
		case 'dashed':
		$_menu_item_class = ' dashed';
		break;
		case 'dotted':
		$_menu_item_class = ' dotted';
		break;
		default:
		$_menu_line_class = ' hide';
		break;
	}

// construct output
$_output .= <<<CONTENT
				<li class="menu-item$_menu_item_class">
					<h4>
						<span class="menu-title">$title</span>
CONTENT;

if($show_price === TRUE) $_output .= "<span class='menu-price'>{$menu_item_price}</span>";

$_output .= "<span class='menu-line{$_menu_line_class}'></span>";

$_output .= <<<CONTENT
					</h4>
					<p class="menu-content">
						<span class="menu-description">$menu_item_description</span>
					</p>
				</li>
CONTENT;

/** Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);

