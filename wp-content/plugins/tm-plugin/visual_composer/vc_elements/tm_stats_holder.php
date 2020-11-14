<?php
use ThemeMountain\TM_Vc as TM_Vc;
/**
 * ThemeMountain stats VC Element Map
 */
if (class_exists( 'Vc_Manager' )) {
	$slider_id = 'tabs-' . time() . '-' . rand( 0, 100 );
	$tab_id_1 = 'tab-' . time() . '-1-' . rand( 0, 100 );
	vc_map( array(
		'name' => esc_html__( 'Stats', 'thememountain-plugin' ),
		'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
		'base' => 'tm_stats_holder',
		'icon' => 'tm_vc_icon_stats',
		'class' => 'tm_element_tab_holder',
		'is_container' => true,
		'show_settings_on_create' => false,
		'description' => '',
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Stat Type', 'thememountain-plugin' ),
				'param_name' => 'stat_type',
				'value' => array(
					esc_html__( 'Stat 1', 'thememountain-plugin' ) => '1',
					esc_html__( 'Stat 2', 'thememountain-plugin' ) => '2',
					esc_html__( 'Stat 3', 'thememountain-plugin' ) => '3',
					),
				'std' => '1',
				'description' => '',
				),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Stats Per Row', 'thememountain-plugin' ),
				'param_name' => 'items_per_row',
				'value' => array(
					esc_html__( '1 Stats', 'thememountain-plugin' ) => '1',
					esc_html__( '2 Stats', 'thememountain-plugin' ) => '2',
					esc_html__( '3 Stats', 'thememountain-plugin' ) => '3',
					esc_html__( '4 Stats', 'thememountain-plugin' ) => '4',
					esc_html__( '5 Stats', 'thememountain-plugin' ) => '5',
					esc_html__( '6 Stats', 'thememountain-plugin' ) => '6',
					),
				'std' => '3',
				'description' => '',
				),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Stat Alignment', 'thememountain-plugin' ),
				'param_name' => 'stat_alignment',
				'value' => array(
					esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
					esc_html__( 'Center', 'thememountain-plugin' ) => 'center',
					esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
					),
				'std' => 'center',
				'description' => '',
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
				'param_name' => 'el_class',
				'description' => '',
				),
			array(
				'type' => 'tab_id',
				'heading' => esc_html__( 'Tm Stats ID', 'thememountain-plugin' ),
				'param_name' => "tabs_id",
				'value'=> $slider_id,
				),
			// 'group' => 'Design Options',
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'checkbox',
				'heading' => esc_html__( 'Boxed', 'thememountain-plugin' ),
				'param_name' => 'is_boxed',
				'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
				'std' => '',
				'dependency' => array('element' => 'stat_type','value'=>array('1')),
				'description' => '',
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Border Style', 'thememountain-plugin' ),
				'param_name' => 'border_style',
				'value' => array(
					esc_html__( 'None', 'thememountain-plugin' ) => '',
					esc_html__( 'Rounded', 'thememountain-plugin' ) => 'rounded',
					),
				'std' => '',
				'dependency' => array('element' => 'is_boxed','value'=>'true'),
				'description' => esc_html__( 'Choose whether the tabs should have sharp or rounded corners.', 'thememountain-plugin' )
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Box Size', 'thememountain-plugin' ),
				'param_name' => 'box_size',
				'value' => array(
					esc_html__('Small', 'thememountain-plugin') => 'small',
					esc_html__('Medium', 'thememountain-plugin') => 'medium',
					esc_html__('Large', 'thememountain-plugin') => 'large',
					esc_html__('Xlarge', 'thememountain-plugin') => 'xlarge',
					),
				'std' => 'medium',
				'dependency' => array('element' => 'is_boxed','value'=>'true'),
				'description' => esc_html__( 'Set the box size, small, medium, large or extra large. Determined by content padding.', 'thememountain-plugin' ),
				),
			// custom only
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Background Color', 'thememountain-plugin' ),
				'param_name' => 'background_color',
				'std' => '',
				'dependency' => array('element' => 'is_boxed','value'=>'true'),
				),

			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Stat Border Color', 'thememountain-plugin' ),
				'param_name' => 'border_color',
				'std' => '#666666',
				// 'dependency' => array('element' => 'stat_type','value'=>array('2','3')),
				'description' => '',
				),
			),

		'custom_markup' => TM_Vc::tabs_custom_markup('stats',esc_html__( 'Stats', 'thememountain-plugin' )),
		'default_content' => '[tm_stats_item title="' . esc_html__( 'New Stats', 'thememountain-plugin' ) . '" tab_id="' . $tab_id_1 . '"][/tm_stats_item]',
		'js_view' => 'TmTabsView'
		) );
}

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-tabs.php' );

class WPBakeryShortCode_tm_stats_holder extends WPBakeryShortCode_tm_tab_holder {
	// protected $controls_template_file = 'editors/partials/backend_controls_tab.tpl.php';
	protected $predefined_atts = array(
		'tab_id' => TM_NEW_TITLE,
		'title' => ''
		);

	protected function getFileName() {
		return 'tm_stats_holder';
	}

	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_stats_item title="' . TM_NEW_TITLE . '" tab_id=""][/tm_stats_item]' ) . '</div>';
	}
}
