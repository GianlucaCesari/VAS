<?php
/**
 * ThemeMountain tm_accordion_tab_item
 */


vc_map( array(
	'name' => esc_html__( 'Accordinon Item', 'thememountain-plugin' ),
	'base' => 'tm_accordion_tab_item',
	'is_container' => false,
	'content_element' => false,
	'show_settings_on_create' => true,
	'description' => '',
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Panel Title', 'thememountain-plugin' ),
			'param_name' => 'title',
			'description' => esc_html__( 'Sets the accordion tab title.', 'thememountain-plugin' )
			),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Make Active', 'thememountain-plugin' ),
			'param_name' => 'is_active',
			'value' => array( esc_html__( 'Make this active', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'description' => esc_html__( 'Determines whether the accordion panel is active by default i.e. whether it will be upon page load.', 'thememountain-plugin' )
			),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Content', 'thememountain-plugin'),
			'param_name' => 'content',
			'value' => '',
			'description' => esc_html__('Acoordion panel content, text and images are supported.', 'thememountain-plugin')
			),
		ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field(),
		array(
			'type' => 'tab_id',
			'heading' => esc_html__( 'Accordion ID', 'thememountain-plugin' ),
			'param_name' => "accordion_id",
			'description' => esc_html__( 'This is for internal use.', 'thememountain-plugin' )
			),
	),
	'js_view' => 'TmAccordionTabItemView'
) );
