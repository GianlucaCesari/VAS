<?php
/**
	tm_pricing_table_holder.php
*/
use ThemeMountain\TM_Vc as TM_Vc;
	// iconpicker custom icons
$table_column_id_1 = time() . rand( 0, 100 );

if (class_exists( 'Vc_Manager' )) {
	vc_map( array(
		'name' => esc_html__( 'Pricing Tables', 'thememountain-plugin' ),
		'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
		'base' => 'tm_pricing_table_holder',
		'icon' => 'tm_vc_icon_pricing_table',
		'class' => 'tm_element_tab_holder',
		'is_container' => true,
		'show_settings_on_create' => true,
		'description' => '',
		'is_container' => true,
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' ),
				),
			// array(
			// 	'type' => 'textfield',
			// 	'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			// 	'param_name' => 'el_id',
			// 	'value' => '',
			// 	),
			array(
				'type' => 'dropdown',
				'group' => 'Design Options',
				'heading' => esc_html__( 'Table Size', 'thememountain-plugin' ),
				'param_name' => 'table_size',
				'value' => array(
					esc_html__( 'Normal', 'thememountain-plugin' ) => '',
					esc_html__( 'Small', 'thememountain-plugin' ) => 'small',
					esc_html__( 'Medium', 'thememountain-plugin' ) => 'medium',
					esc_html__( 'Large', 'thememountain-plugin' ) => 'large',
					esc_html__( 'Xlarge', 'thememountain-plugin' ) => 'xlarge',
				),
				'std' => '',
				'description' => esc_html__( 'Determines whether the pricing table should be small, medium, large or extra large in size.', 'thememountain-plugin' ),
			),
			array(
				'type' => 'dropdown',
				'group' => 'Design Options',
				'heading' => esc_html__( 'Border Style', 'thememountain-plugin' ),
				'param_name' => 'border_style',
				'value' => array(
					esc_html__( 'None', 'thememountain-plugin' ) => '',
					esc_html__( 'Rounded', 'thememountain-plugin' ) => 'rounded',
				),
				'std' => '',
				'description' => esc_html__( 'Determines whether the table should have sharp corners or rounded corners.', 'thememountain-plugin' ),
			),
			array(
				'type' => 'dropdown',
				'group' => 'Design Options',
				'heading' => esc_html__( 'Table Content Alignment', 'thememountain-plugin' ),
				'param_name' => 'table_content_alignment',
				'value' => array(
					esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
					esc_html__( 'Center', 'thememountain-plugin' ) => 'center',
					esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
				),
				'std' => 'left',
				'description' => esc_html__( 'Determines pricing table content alignment.', 'thememountain-plugin' ),
			),
			/* tm_pricing tablet column padding update #841 */
			array(
				'type' => 'textfield',
				'group' => 'Design Options',
				'heading' => esc_html__( 'Table Header Top Padding', 'thememountain-plugin' ),
				'param_name' => 'table_header_top_padding',
				'value' => '30',
				'description' => esc_html__( 'Determines top padding of table header.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'group' => 'Design Options',
				'heading' => esc_html__( 'Table Header Bottom Padding', 'thememountain-plugin' ),
				'param_name' => 'table_header_bottom_padding',
				'value' => '30',
				'description' => esc_html__( 'Determines bottom padding of table header.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'group' => 'Design Options',
				'heading' => esc_html__( 'Table Price Top Padding', 'thememountain-plugin' ),
				'param_name' => 'table_price_top_padding',
				'value' => '30',
				'description' => esc_html__( 'Determines top padding of table price section.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'group' => 'Design Options',
				'heading' => esc_html__( 'Table Price Bottom Padding', 'thememountain-plugin' ),
				'param_name' => 'table_price_bottom_padding',
				'value' => '30',
				'description' => esc_html__( 'Determines bottom padding of table price section.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'group' => 'Design Options',
				'heading' => esc_html__( 'Table Footer Top Padding', 'thememountain-plugin' ),
				'param_name' => 'table_footer_top_padding',
				'value' => '30',
				'description' => esc_html__( 'Determines top padding of table price section.', 'thememountain-plugin' ),
				),
			array(
				'type' => 'textfield',
				'group' => 'Design Options',
				'heading' => esc_html__( 'Table Footer Bottom Padding', 'thememountain-plugin' ),
				'param_name' => 'table_footer_bottom_padding',
				'value' => '30',
				'description' => esc_html__( 'Determines bottom padding of table price section.', 'thememountain-plugin' ),
				),
			// design options , color
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Table Border Color', 'thememountain-plugin' ),
				'param_name' => 'border_color',
				'std' => '#666',
				),
		),
		'custom_markup' => TM_Vc::tabs_custom_markup('pricing_table',esc_html__( 'Pricing Tables', 'thememountain-plugin' )),
		'default_content' => '
			[tm_pricing_table_item title="' . esc_html__( 'New Table', 'thememountain-plugin' ) . '" tab_id="table-' . $table_column_id_1 . '"][/tm_pricing_table_item]',
		'js_view' => 'TmTabsView'
	) );
}

class WPBakeryShortCode_tm_pricing_table_holder extends WPBakeryShortCode_tm_tab_holder {
}