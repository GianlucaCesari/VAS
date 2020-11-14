<?php
vc_map( array(
	'name' => esc_html__( 'Tab', 'thememountain-plugin' ),
	'base' => 'tm_tab_item',
	'allowed_container_element' => 'vc_row',
	'is_container' => true,
	'content_element' => false,
	'description' => '',
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Title', 'thememountain-plugin' ),
			'param_name' => 'title',
			'description' => esc_html__( 'Sets the tabs tab title.', 'thememountain-plugin' )
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Make this active', 'thememountain-plugin' ),
			'param_name' => 'is_active',
			'value' => array( esc_html__( 'Make this active', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'description' => esc_html__( 'Determines whether the tabs panel is active by default i.e. whether it will be upon page load. If multiple tabs are set to active, not that only one will be set to active by default.', 'thememountain-plugin' )
			),
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"heading" => esc_html__("Message", 'thememountain-plugin'),
			"param_name" => "content",
			"value" => '',
			"description" => esc_html__("Tab panel content, text and images are supported.", 'thememountain-plugin')
			),
		ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field(),
		array(
			'type' => 'tab_id',
			'heading' => esc_html__( 'Tab ID', 'thememountain-plugin' ),
			'param_name' => "tab_id"
		)
	),
	'js_view' => 'TmTabView'
) );