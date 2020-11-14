<?php
vc_map( array(
	'name' => esc_html__( 'Menu Item', 'thememountain-plugin' ),
	'base' => 'tm_menu_item',
	'allowed_container_element' => 'tm_menu_holder',
	'is_container' => false,
	'content_element' => false,
	'description' => '',
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Title', 'thememountain-plugin' ),
			'param_name' => 'title',
			'description' => esc_html__( 'Enter a menu item title.', 'thememountain-plugin' )
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Menu Item Description', 'thememountain-plugin' ),
			'param_name' => 'menu_item_description',
			'admin_label' => true,
			'description' => esc_html__( 'Enter a menu item description.', 'thememountain-plugin' )
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Menu Item Price', 'thememountain-plugin' ),
			'param_name' => 'menu_item_price',
			'admin_label' => true,
			'description' => esc_html__( 'Enter a menu item price.', 'thememountain-plugin' )
		),
		array(
			'type' => 'tab_id',
			'heading' => esc_html__( 'Tab ID', 'thememountain-plugin' ),
			'param_name' => "tab_id"
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Show Price', 'thememountain-plugin' ),
			'param_name' => 'show_price',
			'value' => array( esc_html__( 'Show Price', 'thememountain-plugin' ) => 'true' ),
			'std' => 'true',
			'description' => '',
			),
	),
	'js_view' => 'TmTabView'
) );

class WPBakeryShortCode_tm_menu_item extends WPBakeryShortCode_tm_tab_item {

}