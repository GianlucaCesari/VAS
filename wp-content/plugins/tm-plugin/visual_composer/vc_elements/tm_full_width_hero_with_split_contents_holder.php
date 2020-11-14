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
	'name' => esc_html__( 'Full Width Hero With Split Content (Two Columns)', 'thememountain-plugin' ),
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'base' => 'tm_full_width_hero_with_split_contents_holder',
	'icon' => 'tm_vc_icon_full_width_hero_with_split_contents',
	'class' => 'tm_element_tab_holder',
	'is_container' => true,
	"as_parent" => array('only' => 'tm_full_width_hero_with_split_contents_item'),
	'show_settings_on_create' => true,
	'description' => 'hero-4',
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
			// Image
		ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Image', 'thememountain-plugin'),esc_html__( 'Upload hero 4 background image.', 'thememountain-plugin' )),
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
		/** background color with gradient support */
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Split Content Background Color', 'thememountain-plugin' ),
			'param_name' => 'split_content_bkg_color',
			'std' => 'rgba(0,0,0,0.5)',
			'description' => '',
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use gradient', 'thememountain-plugin' ),
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'param_name' => 'background_use_gradient',
			'std' => '',
			'description' => esc_html__( 'This will create a background image gradient, which means that if you have set an image as a background, the gradient will replace it. If selected, Background Color will be used as the start color for the gradient.', 'thememountain-plugin' ),
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'End Color', 'thememountain-plugin' ),
			'param_name' => 'background_gradient_end_color',
			'std' => '',
			'dependency' => array('element' => 'background_use_gradient','value'=>'true'),
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Angle', 'thememountain-plugin' ),
			'param_name' => 'background_gradient_angle',
			'description'=> esc_html__( 'Sets the angle of your gradient, acceptable values range from 0-360', 'thememountain-plugin' ),
			'dependency' => array('element' => 'background_use_gradient','value'=>'true'),
		),
		/** end background color with gradient support */
	),
	'custom_markup' => TM_Vc::tabs_custom_markup('full_width_hero_with_split_contents',esc_html__( 'Hero Columns', 'thememountain-plugin' )),
	'default_content' => '[tm_full_width_hero_with_split_contents_item title="' . esc_html__( 'Hero Column', 'thememountain-plugin' ) . '" tab_id="' . $tab_id_1 . '"][/tm_full_width_hero_with_split_contents_item]',
	'js_view' => 'TmTabsView'
) );

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-tabs.php' );

class WPBakeryShortCode_tm_full_width_hero_with_split_contents_holder extends WPBakeryShortCode_tm_tab_holder {
	// protected $controls_template_file = 'editors/partials/backend_controls_tab.tpl.php';
	protected $predefined_atts = array(
		'tab_id' => TM_NEW_TITLE,
		'title' => ''
		);

	protected function getFileName() {
		return 'tm_full_width_hero_with_split_contents_holder';
	}

	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_full_width_hero_with_split_contents_item title="Hero Column" tab_id=""][/tm_full_width_hero_with_split_contents_item]' ) . '</div>';
	}
}