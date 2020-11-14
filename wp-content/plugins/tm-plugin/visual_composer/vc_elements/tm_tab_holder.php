<?php
use ThemeMountain\TM_Vc as TM_Vc;
$tab_id_1 = time() . '-1-' . rand( 0, 100 );
vc_map( array(
	"name" => esc_html__( 'Tabs', 'thememountain-plugin' ),
	'base' => 'tm_tab_holder',
	'show_settings_on_create' => true,
	'is_container' => true,
	'icon' => 'tm_vc_icon_tabs',
	'class' => 'tm_element_tab_holder',
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'description' => '',
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Alignment', 'thememountain-plugin' ),
			'param_name' => 'alignment',
			'value' => array(
				esc_html__( 'Left', 'thememountain-plugin' ) => '',
				esc_html__( 'Center', 'thememountain-plugin' ) => 'center',
				esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
				),
			'std' => '',
			'description' => esc_html__( 'Whether the tabs should be left, center (horizontal tabs only) or right aligned.', 'thememountain-plugin' )
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' )
		),
		// 'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Tab Style', 'thememountain-plugin' ),
			'param_name' => 'tab_style',
			'value' => array(
				esc_html__( 'Default', 'thememountain-plugin' ) => 'default',
				esc_html__( 'Button Tabs', 'thememountain-plugin' ) => 'button',
				esc_html__( 'Line Tabs', 'thememountain-plugin' ) => 'line',
				esc_html__( 'Text Tabs', 'thememountain-plugin' ) => 'text',
				),
			'std' => 'default',
			'description' => ''
		),

		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Tab Size', 'thememountain-plugin' ),
			'param_name' => 'size',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['sizes'],
			'std' => 'medium',
			'description' => esc_html__( 'Set the tabs size, small, medium, large or extra large. Determined by content padding.', 'thememountain-plugin' )
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Tab Border Style', 'thememountain-plugin' ),
			'param_name' => 'border_style',
			'value' => array(
				esc_html__( 'Regular', 'thememountain-plugin' ) => '',
				esc_html__( 'Rounded', 'thememountain-plugin' ) => 'rounded',
				),
			'std' => 'Choose whether the tabs should have sharp or rounded corners.',
		),
		/**
		 * colour group
		 */
		// 'default','button'
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Button Background Color', 'thememountain-plugin' ),
			'param_name' => 'button_background_color',
			'std' => '#f4f4f4',
			'dependency' => array('element' => 'tab_style','value'=>array('default','button')),
			'description' => '',
			),
		// 'default','button'
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Button Background Color Hover', 'thememountain-plugin' ),
			'param_name' => 'button_background_color_hover',
			'std' => '#dddddd',
			'dependency' => array('element' => 'tab_style','value'=>array('default','button')),
			'description' => '',
			),
		// 'default','button'
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Button Background Color Active', 'thememountain-plugin' ),
			'param_name' => 'button_background_color_active',
			'std' => '#FFFFFF',
			'dependency' => array('element' => 'tab_style','value'=>array('default','button')),
			'description' => '',
			),
		// 'default','button'
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Button Border Color', 'thememountain-plugin' ),
			'param_name' => 'button_border_color',
			'std' => '#f4f4f4',
			'dependency' => array('element' => 'tab_style','value'=>array('default','button','line')),

			'description' => '',
			),
		// 'default','button'
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Button Border Color Hover', 'thememountain-plugin' ),
			'param_name' => 'button_border_color_hover',
			'std' => '#dddddd',
			'dependency' => array('element' => 'tab_style','value'=>array('default','button','line')),
			'description' => '',
			),
		// 'default','button','text'
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Button Border Color Active', 'thememountain-plugin' ),
			'param_name' => 'button_border_color_active',
			'std' => '#EEEEEE',
			'dependency' => array('element' => 'tab_style','value'=>array('default','button','line')),
			'description' => '',
			),
		// all
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Button Text Color', 'thememountain-plugin' ),
			'param_name' => 'button_text_color',
			'std' => '#666666',
			'description' => '',
			),
		// all
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Button Text Color Hover', 'thememountain-plugin' ),
			'param_name' => 'button_text_color_hover',
			'std' => '#232323',
			'description' => '',
			),
		// all
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Button Text Color Active', 'thememountain-plugin' ),
			'param_name' => 'button_text_color_active',
			'std' => '#0cbacf',
			'description' => '',
			),
		// all
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Tab Panel Text Color', 'thememountain-plugin' ),
			'param_name' => 'panel_text_color',
			'std' => 'inherit',
			'description' => '',
			),
			array(
				'type' => 'tab_id',
				'heading' => esc_html__( 'Tabs Shortcode ID', 'thememountain-plugin' ),
				'param_name' => "tabs_id"
				)
	),
	'custom_markup' => TM_Vc::tabs_custom_markup('tabs', esc_html__( 'Tabs', 'thememountain-plugin' )),
	'default_content' => '[tm_tab_item title="' . esc_html__( 'New Tab', 'thememountain-plugin' ) . '" tab_id="' . $tab_id_1 . '"][/tm_tab_item]',
	'js_view' => 'TmTabsView'
) );