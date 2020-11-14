<?php
/**
	ThemeMountain tm_stats_item
*/

// Checks up if the Visual Composer is activated.
	/**
		Note: please see initVisualComposer.php ... this file is included upon the vc_before_init hook.
	*/
vc_map( array(
	'name' => esc_html__( 'Stats Item', 'thememountain-plugin' ),
	'base' => 'tm_stats_item',
	// 'allowed_container_element' => false,
	'is_container' => true,
	"as_child" => array('only' => 'tm_stats_holder'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"content_element" => FALSE,
	'description' => '',
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Item Name', 'thememountain-plugin' ),
			'param_name' => 'title',
			'value' => '',
			'description' => '',
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Stat From', 'thememountain-plugin' ),
			'param_name' => 'stat_from',
			'value' => '0',
			'description' => '',
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Stat to', 'thememountain-plugin' ),
			'param_name' => 'stat_to',
			'value' => '100',
			'description' => '',
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Measure', 'thememountain-plugin' ),
			'param_name' => 'stat_measure',
			'value' => '',
			'description' => esc_html__( 'Enter a measure i.e. %, $, €. The measure is added to the right of the stat. Leave blank not to show.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Description', 'thememountain-plugin' ),
			'param_name' => 'description',
			'value' => '',
			'description' => '',
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use Second Row', 'thememountain-plugin' ),
			'param_name' => 'use_second_row',
			'value' => array( esc_html__( 'Use Second Row', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'save_always' => true,
			'description' => ''
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Second Row Stat From', 'thememountain-plugin' ),
			'param_name' => 'stat_from_2nd',
			'value' => '0',
			'dependency' => array('element' => 'use_second_row','value'=>'true'),
			'description' => '',
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Second Row Stat to', 'thememountain-plugin' ),
			'param_name' => 'stat_to_2nd',
			'value' => '100',
			'dependency' => array('element' => 'use_second_row','value'=>'true'),
			'description' => '',
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Second Row Description', 'thememountain-plugin' ),
			'param_name' => 'description_2nd',
			'value' => '',
			'dependency' => array('element' => 'use_second_row','value'=>'true'),
			'description' => '',
		),
		// 'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
		array(
			'type' => 'textfield',
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'heading' => esc_html__( 'Stat Font Size', 'thememountain-plugin' ),
			'param_name' => 'stat_font_size',
			'value' => '30px',
			'description' => '',
		),
		array(
			'type' => 'textfield',
			'group' => 'Design Options',
			'heading' => esc_html__( 'Description Font Size', 'thememountain-plugin' ),
			'param_name' => 'stat_description_font_size',
			'value' => '14px',
			'description' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Stat Color', 'thememountain-plugin' ),
			'param_name' => 'stat_color',
			'std' => '#666666',
			'description' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Stat Description Color', 'thememountain-plugin' ),
			'param_name' => 'stat_description_color',
			'std' => '#666666',
			'description' => '',
			),
		// extra css class name
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => '',
			),
	),
	'js_view' => 'TmTabView'
) );

class WPBakeryShortCode_tm_stats_item extends WPBakeryShortCode_tm_tab_item {

}