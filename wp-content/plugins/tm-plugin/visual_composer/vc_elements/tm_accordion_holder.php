<?php
use ThemeMountain\TM_Vc as TM_Vc;
/**
 * ThemeMountain Accordion VC Element Map
 */
if (class_exists( 'Vc_Manager' )) {
	$accordion_id = time() . '-' . rand( 0, 100 );
	$accordion_id_1 = time() . '-' . rand( 0, 100 );
	vc_map( array(
		'name' => esc_html__( 'Accordion', 'thememountain-plugin' ),
		'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
		'base' => 'tm_accordion_holder',
		'is_container' => true,
		'icon' => 'tm_vc_icon_accordion',
		'class' => 'tm_element_tab_holder',
		'show_settings_on_create' => false,
		'description' => '',
		'params' => array(
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Multiple Active Panels', 'thememountain-plugin' ),
				'param_name' => 'toggle_multiple',
				'value' => array( esc_html__( 'Allow', 'thememountain-plugin' ) => 'true' ),
				'std' => '',
				'description' => esc_html__( 'If checked, this option will allow the accordion to have multiple active panels. Refer to Step 4. on how to set an active panel.', 'thememountain-plugin' )
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
				'param_name' => 'el_id',
				'description' => esc_html__( 'Give this section a unique ID. This is useful if you want to initiate scroll or link to this section.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' ),
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				"type" => "dropdown",
				"heading" => esc_html__("Accordion Style", 'thememountain-plugin'),
				"param_name" => "accordion_style",
				"value" => array(
					esc_html__('Default', 'thememountain-plugin') => 'default',
					esc_html__('Bordered Accordion', 'thememountain-plugin') => 'bordered',
					esc_html__('Line Accordion', 'thememountain-plugin') => 'line',
					),
				'std' => 'default',
				'description' => ''
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				"type" => "dropdown",
				"heading" => esc_html__("Accordion size", 'thememountain-plugin'),
				"param_name" => "accordion_size",
				"value" => ThemeMountain\TM_Vc::$vc_elements_variable['sizes'],
				'description' => ''
			),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				"type" => "dropdown",
				"heading" => esc_html__("Accordion Border Style", 'thememountain-plugin'),
				"param_name" => "accordion_border_style",
				"value" => array(
					esc_html__('Regular', 'thememountain-plugin') => '',
					esc_html__('Rounded', 'thememountain-plugin') => 'rounded',
					),
				'std' => '',
				'dependency' => array('element' => 'accordion_style','value'=>array('default','bordered')),
				'description' => ''
			),
			// design options
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'checkbox',
				'heading' => esc_html__( 'Use Icon', 'thememountain-plugin' ),
				'param_name' => 'use_icon',
				'value' => array( esc_html__( 'Use Icon', 'thememountain-plugin' ) => 'true' ),
				'std' => '',
				'save_always' => true,
				'description' => esc_html__( 'If checked, +/- icon is added to the accordion header and toggled upon clicking.', 'thememountain-plugin' )
				),
			// default
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Header Background Color', 'thememountain-plugin' ),
				'param_name' => 'header_background_color',
				'std' => '#f4f4f4',
				'dependency' => array('element' => 'accordion_style','value'=>'default'),
				'description' => '',
				),
			// default
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Header Background Color Hover', 'thememountain-plugin' ),
				'param_name' => 'header_background_color_hover',
				'std' => '#dddddd',
				'dependency' => array('element' => 'accordion_style','value'=>'default'),
				'description' => '',
				),
			// default
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Header Background Color Active', 'thememountain-plugin' ),
				'param_name' => 'header_background_color_active',
				'std' => '#0cbacf',
				'dependency' => array('element' => 'accordion_style','value'=>'default'),
				'description' => '',
				),
			// all
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Header Border Color', 'thememountain-plugin' ),
				'param_name' => 'header_border_color',
				'std' => '#f4f4f4',
				'description' => '',
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Header Border Color Hover', 'thememountain-plugin' ),
				'param_name' => 'header_border_color_hover',
				'std' => '#dddddd',
				'description' => '',
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Header Border Color Active', 'thememountain-plugin' ),
				'param_name' => 'header_border_color_active',
				'std' => '#0cbacf',
				'description' => '',
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Header Text Color', 'thememountain-plugin' ),
				'param_name' => 'header_text_color',
				'std' => '#666666',
				'description' => '',
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Header Text Color Active', 'thememountain-plugin' ),
				'param_name' => 'header_text_color_active',
				'std' => '#FFFFFF',
				'description' => '',
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Header Text Color Hover', 'thememountain-plugin' ),
				'param_name' => 'header_text_color_hover',
				'std' => '#666666',
				'description' => '',
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Tab Panel Text Color', 'thememountain-plugin' ),
				'param_name' => 'panel_text_color',
				'std' => '',
				'description' => '',
				),
			// default only
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Accordion Content Border Color', 'thememountain-plugin' ),
				'param_name' => 'accordion_content_border_color',
				'std' => '#eeeeee',
				'dependency' => array('element' => 'accordion_style','value'=>'default'),
				'description' => '',
				),
			array(
				'type' => 'tab_id',
				'heading' => esc_html__( 'Tabs Shortcode ID', 'thememountain-plugin' ),
				'param_name' => "accordion_id"
				)
			),
		'custom_markup' => '<div class="wpb_element_wrapper "><h4 class="wpb_element_title tm_element_title"><i class="vc_general vc_element-icon tm_vc_icon_accordion"></i>'.esc_html__( 'Accordion', 'thememountain-plugin' ).'</h4></div><div class=" wpb_holder clearfix vc_container_for_children">%content%</div><div class="tab_controls"><a class="add_tab" title="' . esc_html__( 'Add box', 'thememountain-plugin' ) . '"><span class="vc_icon"></span> <span class="tab-label">' . esc_html__( 'Add box', 'thememountain-plugin' ) . '</span></a></div>',
		'default_content' => '[tm_accordion_tab_item title="' . esc_html__( 'Section 1', 'thememountain-plugin' ) . '" accordion_id="'.$accordion_id.'"]Lorem Ipsum[/tm_accordion_tab_item][tm_accordion_tab_item title="' . esc_html__( 'Section 2', 'thememountain-plugin' ) . '" accordion_id="'.$accordion_id_1.'"]Lorem Ipsum[/tm_accordion_tab_item]',
		'js_view' => 'TmAccordionView',
	) );
}