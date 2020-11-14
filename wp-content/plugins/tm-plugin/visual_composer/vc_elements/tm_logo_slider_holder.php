<?php
/**
ThemeMountain tm_logo_slider_holder
*/
use ThemeMountain\TM_Vc as TM_Vc;

$slider_id = time() . '-' . rand( 0, 100 );
$tab_id_1 = time() . '-1-' . rand( 0, 100 );

vc_map( array(
	"base"      => "tm_logo_slider_holder",
	"name"      => esc_html__("Logo Slider", 'thememountain-plugin'),
	"icon"      => "tm_vc_icon_logo_slider",
	'class' => 'tm_element_tab_holder',
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'show_settings_on_create' => true,
	'is_container' => true,
	'description' => '',
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Visible Slides', 'thememountain-plugin' ),
			'param_name' => 'visible_slides',
			'value' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
			),
			'std' => '4',
			'save_always' => true,
			'description' => esc_html__( 'Determines the number of visible slides at any given time.', 'thememountain-plugin' ),
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
			'heading' => esc_html__( 'Tm Logo Slider ID', 'thememountain-plugin' ),
			'param_name' => "tabs_id",
			'value'=> $slider_id,
			),
		/** Navigation */
		array(
			'group' => esc_html__( 'Navigation', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Advance automatically', 'thememountain-plugin' ),
			'param_name' => 'auto_advance',
			'save_always' => true,
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'description' => esc_html__( 'Determines whether the slider should auto advance from slide to slide i.e. slideshow.', 'thememountain-plugin' )
			),
		array(
			'group' => esc_html__( 'Navigation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Auto Advance Interval', 'thememountain-plugin' ),
			'param_name' => 'auto_advance_interval',
			'value' => '5000',
			'dependency' => array('element'=>'auto_advance','value'=>'true'),
			),
		array(
			'group' => esc_html__( 'Navigation', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Pause On Hover', 'thememountain-plugin' ),
			'param_name' => 'pause_on_hover',
			'save_always' => true,
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => 'true',
			'dependency' => array('element' => 'auto_advance','value'=>'true'),
			'description' => esc_html__( 'Determines whether auto advancing should pause upon hover.', 'thememountain-plugin' )
			),
		array(
			'group' => esc_html__( 'Navigation', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Show Progress Bar', 'thememountain-plugin' ),
			'param_name' => 'progress_bar',
			'save_always' => true,
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => 'true',
			'dependency' => array('element'=>'auto_advance','value'=>'true'),
			'description' => ''
			),
		// array(
		// 	'group' => esc_html__( 'Navigation', 'thememountain-plugin' ),
		// 	'type' => 'checkbox',
		// 	'heading' => esc_html__( 'Use Nav Arrows', 'thememountain-plugin' ),
		// 	'param_name' => 'show_nav_arrows',
		// 	'save_always' => true,
		// 	'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
		// 	'std' => '',
		// 	'description' => esc_html__( 'Determines whether the slider should have navigation arrows.', 'thememountain-plugin' )
		// 	),
		array(
			'group' => esc_html__( 'Navigation', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use Pagination', 'thememountain-plugin' ),
			'param_name' => 'use_pagination',
			'save_always' => true,
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => 'true',
			'description' => esc_html__( 'Determines whether the slider should have pagination bullets.', 'thememountain-plugin' )
			),
		array(
			'group' => 'Navigation',
			'type' => 'checkbox',
			'heading' => esc_html__( 'Show Navigation on Hover', 'thememountain-plugin' ),
			'param_name' => 'nav_on_hover',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'description' => esc_html__( 'Determines whether the slider navigation arrows and pagination should only appear upon mouse hover.', 'thememountain-plugin' ),
		),
		/** Design Options */
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Pagination Color', 'thememountain-plugin' ),
			'param_name' => 'pagination_color',
			'std' => '#000',
			'description' => '',
			),
		/** Animation */
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Slider Transition Easing', 'thememountain-plugin' ),
			'param_name' => 'transition_easing',
			'value' =>TM_Vc::$vc_elements_variable['easing'],
			'std' => 'linear',
			'save_always' => true,
			'description' => esc_html__( 'Determines the easing type of the slider transitions.', 'thememountain-plugin' ),
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Slider Transition Speed', 'thememountain-plugin' ),
			'param_name' => 'transition_speed',
			'value' => '700'
			),
	),
	'custom_markup' => TM_Vc::tabs_custom_markup('logo_slider',esc_html__("Logo Slider", 'thememountain-plugin')),
	'default_content' => '[tm_logo_slider_item title="' . esc_html__( 'New Logo Item', 'thememountain-plugin' ) . '" tab_id="' . $tab_id_1 . '"][/tm_logo_slider_item]',
	'js_view' => 'TmTabsView'
) );

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-tabs.php' );

class WPBakeryShortCode_tm_logo_slider_holder extends WPBakeryShortCode_tm_tab_holder {
	// protected $controls_template_file = 'editors/partials/backend_controls_tab.tpl.php';
	protected $predefined_atts = array(
		'tab_id' => TM_NEW_TITLE,
		'title' => ''
	);

	protected function getFileName() {
		return 'tm_logo_slider_holder';
	}

	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_logo_slider_item title="' . TM_NEW_TITLE . '" tab_id=""][/tm_logo_slider_item]' ) . '</div>';
	}

}