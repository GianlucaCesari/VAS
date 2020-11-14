<?php
/**
 * This is a nav menu location config file.
 *
 * @package ThemeMountain
 * @subpackage thememountain-sartre
 * @since thememountain-sartre 1.0
 *
 * @uses       ThemeMountain\TM_NavMenuServices
 * @uses       TM_ThemeStrings::$text_strings['nav_menu_locations']	Translatable strings
 */
namespace ThemeMountain;

$thememountain_text_strings = TM_ThemeStrings::$text_strings['nav_menu_locations'];

/** Add Menu Locations */
TM_NavMenuServices::set_nav_menu_config(array(
	'main_nav_menu' => $thememountain_text_strings['main_nav_menu'],
	/** overlay */
	'overlay_menu'	=> $thememountain_text_strings['overlay_menu'],
	'overlay_secondary_menu' => $thememountain_text_strings['overlay_secondary_menu'],
	'overlay_social_links' => $thememountain_text_strings['overlay_social_links'],
	/** off canvas */
	'off_canvas_menu'	=> $thememountain_text_strings['off_canvas_menu'],
	'off_canvas_secondary_menu'	=> $thememountain_text_strings['off_canvas_secondary_menu'],
	'off_canvas_social_links' => $thememountain_text_strings['off_canvas_social_links'],
	));

/**
 * Sets up nav location and menu type to use for page option.
 *
 * @since 1.0
 * @access public
 *
 * @uses       tm_nav_style_location_setup action hook
 * @see        TM_NavMenuServices::preprocess_custom_options_for_nav_menu()
 */
add_action('tm_nav_style_location_setup_page_option','ThemeMountain\thememountain_nav_style_location_setup_page_option');
function thememountain_nav_style_location_setup_page_option() {
	// Main Navigation Menu
	$thememountain_page_options = TM_TemplateServices::get_current_page_data('options');
	// tm_navigation_menu_item_main_nav_menu
	TM_NavMenuServices::update_nav_menu_locations_menu_item('main_nav_menu',$thememountain_page_options['tm_navigation_menu_item_main_nav_menu']);
	// tm_navigation_menu_item_overlay_menu
	TM_NavMenuServices::update_nav_menu_locations_menu_item('overlay_menu',$thememountain_page_options['tm_navigation_menu_item_overlay_menu']);
	// tm_navigation_menu_item_overlay_secondary_menu
	TM_NavMenuServices::update_nav_menu_locations_menu_item('overlay_secondary_menu',$thememountain_page_options['tm_navigation_menu_item_overlay_secondary_menu']);
	// tm_navigation_menu_item_off_canvas_menu
	TM_NavMenuServices::update_nav_menu_locations_menu_item('off_canvas_menu',$thememountain_page_options['tm_navigation_menu_item_off_canvas_menu']);
	// tm_navigation_menu_item_off_canvas_secondary_menu
	TM_NavMenuServices::update_nav_menu_locations_menu_item('off_canvas_secondary_menu',$thememountain_page_options['tm_navigation_menu_item_off_canvas_secondary_menu']);
}
