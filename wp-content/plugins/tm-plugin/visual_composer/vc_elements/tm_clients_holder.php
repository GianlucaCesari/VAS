<?php
use ThemeMountain\TM_Vc as TM_Vc;
/**
 * ThemeMountain Accordion VC Element Map
 */

/** random id */
$slider_id = 'tabs-' . time() . '-' . rand( 0, 100 );
$tab_id_1 = 'tab-' . time() . '-1-' . rand( 0, 100 );

/**
 * VC mapping
 */
vc_map( array(
	'name' => esc_html__( 'Clients', 'thememountain-plugin' ),
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'base' => 'tm_clients_holder',
	'icon' => 'tm_vc_icon_clients',
	'class' => 'tm_element_tab_holder',
	'is_container' => true,
	"as_parent" => array('only' => 'tm_client_item'),
	'show_settings_on_create' => true,
	'description' => '',
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Items Per Row', 'thememountain-plugin' ),
			'param_name' => 'items_per_row',
			'value' => array(
				'3 Clients' => '3',
				'4 Clients' => '4',
				'5 Clients' => '5',
				'6 Clients' => '6',
				),
			'std' => '4',
			'description' => esc_html__( 'Determines the number of clients per row. Possible values are <b>3-6 clients per row.</b>', 'thememountain-plugin' ),
			),
		// Image bkg
		ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Background Image', 'thememountain-plugin'),esc_html__( 'Upload background image for the clients section.', 'thememountain-plugin' )),
		ThemeMountain\TM_Vc::get_attach_image_vc_field(),
		ThemeMountain\TM_Vc::get_image_url_vc_field(),
		// extra
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			'param_name' => 'el_id',
			'value' => '',
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'tab_id',
			'heading' => esc_html__( 'Tm Team ID', 'thememountain-plugin' ),
			'param_name' => "tabs_id",
			'value'=> $slider_id,
			),
		// design options
		array(
			'group' => esc_html__( 'Design options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Client Name Color', 'thememountain-plugin' ),
			'param_name' => 'client_name_color',
			'std' => 'rgba(0,0,0,1)',
			),
		array(
			'group' => esc_html__( 'Design options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Client description Color', 'thememountain-plugin' ),
			'param_name' => 'client_description_color',
			'std' => 'rgba(0,0,0,0.7)',
			),
	),
	'custom_markup' => TM_Vc::tabs_custom_markup('clients',esc_html__( 'Clients', 'thememountain-plugin' )),
	'default_content' => '[tm_client_item title="' . esc_html__( 'New Client', 'thememountain-plugin' ) . '" tab_id="' . $tab_id_1 . '"][/tm_client_item]',
	'js_view' => 'TmTabsView'
) );

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-tabs.php' );

class WPBakeryShortCode_tm_clients_holder extends WPBakeryShortCode_tm_tab_holder {
	// protected $controls_template_file = 'editors/partials/backend_controls_tab.tpl.php';
	protected $predefined_atts = array(
		'tab_id' => TM_NEW_TITLE,
		'title' => ''
		);

	protected function getFileName() {
		return 'tm_clients_holder';
	}

	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_client_item title="New Client" tab_id=""][/tm_client_item]' ) . '</div>';
	}
}