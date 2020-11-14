<?php
/**
	ThemeMountain tm_client_item
*/

// Checks up if the Visual Composer is activated.
	/**
		Note: please see initVisualComposer.php ... this file is included upon the vc_before_init hook.
	*/
vc_map( array(
	'name' => esc_html__( 'Client Profile', 'thememountain-plugin' ),
	'base' => 'tm_client_item',
	// 'allowed_container_element' => false,
	'is_container' => true,
	"as_child" => array('only' => 'tm_clients_holder'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	'content_element' => false,
	'description' => '',
	'params' => array(
		array(
			// group Social List
			'type' => 'textfield',
			'heading' => esc_html__( 'Client Name', 'thememountain-plugin' ),
			'param_name' => 'title',
			'value' => '',
			'description' => esc_html__( 'Enter the client name.', 'thememountain-plugin' ),
		),
		array(
			// group Social List
			'type' => 'textarea_html',
			'heading' => esc_html__( 'Client Description', 'thememountain-plugin' ),
			'param_name' => 'content',
			'value' => '',
			'admin_label' => true,
			'description' => esc_html__( 'Enter the client description.', 'thememountain-plugin' ),
		),
		ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field(),
		// extra css class name
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' ),
			),
	),
	'js_view' => 'TmTabView'
) );

class WPBakeryShortCode_tm_client_item extends WPBakeryShortCode_tm_tab_item {

}