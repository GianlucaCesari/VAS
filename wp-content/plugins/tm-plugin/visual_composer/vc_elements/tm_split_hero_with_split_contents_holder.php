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
	'name' => esc_html__( 'Split Hero With Split Content (Two Columns)', 'thememountain-plugin' ),
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'base' => 'tm_split_hero_with_split_contents_holder',
	'icon' => 'tm_vc_icon_split_hero_with_split_contents',
	'class' => 'tm_element_tab_holder',
	'is_container' => true,
	"as_parent" => array('only' => 'tm_split_hero_with_split_contents_item'),
	'show_settings_on_create' => true,
	'description' => 'hero-5',
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Height', 'thememountain-plugin' ),
			'param_name' => 'height',
			'value' => array(
				esc_html__( 'Small', 'thememountain-plugin' ) => '',
				esc_html__( 'Window height', 'thememountain-plugin' ) => 'window_height',
				esc_html__( 'Auto', 'thememountain-plugin' ) => 'auto',
				esc_html__( 'Custom', 'thememountain-plugin' ) => 'custom',
			),
			'std' => '',
			'description'=> esc_html__( 'Sets the hero section height to either Small, Window Height, Auto or to Custom.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Custom Height', 'thememountain-plugin' ),
			'param_name' => 'height_custom',
			'dependency' => array('element' => 'height','value'=>'custom'),
			'value' => '400',
			'description'=> esc_html__( 'Allows you to set your preferred height. If you like to enter the value as pixels, it should be i.e. 400.', 'thememountain-plugin' ),
		),
		// extra
		// array(
		// 	'type' => 'textfield',
		// 	'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
		// 	'param_name' => 'el_id',
		// 	'value' => '',
		// 	),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' ),
			),
	),
	'custom_markup' => TM_Vc::tabs_custom_markup('split_hero_with_split_contents',esc_html__( 'Hero Columns', 'thememountain-plugin' )),
	'default_content' => '[tm_split_hero_with_split_contents_item title="' . esc_html__( 'Hero Column', 'thememountain-plugin' ) . '" tab_id="' . $tab_id_1 . '"][/tm_split_hero_with_split_contents_item]',
	'js_view' => 'TmTabsView'
) );

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-tabs.php' );

class WPBakeryShortCode_tm_split_hero_with_split_contents_holder extends WPBakeryShortCode_tm_tab_holder {
	// protected $controls_template_file = 'editors/partials/backend_controls_tab.tpl.php';
	protected $predefined_atts = array(
		'tab_id' => TM_NEW_TITLE,
		'title' => ''
		);

	protected function getFileName() {
		return 'tm_split_hero_with_split_contents_holder';
	}

	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_split_hero_with_split_contents_item title="Hero Column" tab_id=""][/tm_split_hero_with_split_contents_item]' ) . '</div>';
	}
}