<?php
/**
	tm_color_swatch_holder.php
*/
use ThemeMountain\TM_Vc as TM_Vc;
	// iconpicker custom icons
	// https://wpbakery.atlassian.net/wiki/display/VC/Adding+Icons+to+vc_icon

$slider_id = time() . '-' . rand( 0, 100 );
$tab_id_1 = time() . '-1-' . rand( 0, 100 );
vc_map( array(
	"base"      => "tm_color_swatch_holder",
	"name"      => esc_html__("Color Swatch", 'thememountain-plugin'),
	"icon"      => "tm_vc_icon_color_swatch",
	'class' => 'tm_element_tab_holder',
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'show_settings_on_create' => false,
	'is_container' => true,
	'description' => '',
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Swatch List Alignment', 'thememountain-plugin' ),
			'param_name' => 'swatch_list_alignment',
			'value' => array(
				esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
				esc_html__( 'Center', 'thememountain-plugin' ) => 'center',
				esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
				),
			'std' => '',
			'description' => esc_html__( 'Whether color swaches should be left, center or right aligned.', 'thememountain-plugin' ),
			),
		// extra css class name
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'tab_id',
			'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			'param_name' => "tabs_id",
			'value'=> $slider_id,
			),
	),
	'custom_markup' => TM_Vc::tabs_custom_markup('color_swatch',esc_html__("Color Swatch", 'thememountain-plugin')),
	'default_content' => '[tm_color_swatch_item title="' . esc_html__( 'New Swatch', 'thememountain-plugin' ) . '" tab_id="' . $tab_id_1 . '"][/tm_color_swatch_item]',
	'js_view' => 'TmTabsView'
) );

class WPBakeryShortCode_tm_color_swatch_holder extends WPBakeryShortCode_tm_tab_holder {
	// protected $controls_template_file = 'editors/partials/backend_controls_tab.tpl.php';
	protected $predefined_atts = array(
		'tab_id' => TM_NEW_TITLE,
		'title' => 'New Swatch'
	);

	protected function getFileName() {
		return 'tm_color_swatch_holder';
	}

	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_color_swatch_item title="New Swatch" tab_id=""][/tm_color_swatch_item]' ) . '</div>';
	}
}