<?php
use ThemeMountain\TM_Vc as TM_Vc;
/**
 * ThemeMountain Accordion VC Element Map
 */
$slider_id = 'tabs-' . time() . '-' . rand( 0, 100 );
$tab_id_1 = 'tab-' . time() . '-1-' . rand( 0, 100 );
vc_map( array(
	'name' => esc_html__( 'Testimonials Slider', 'thememountain-plugin' ),
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'base' => 'tm_testimonials_holder',
	'icon' => 'tm_vc_icon_testimonials',
	'class' => 'tm_element_tab_holder',
	'is_container' => true,
	'show_settings_on_create' => true,
	'description' => '',
	'params' => array(
		/**
		 * Full Width
		 * @since      1.0
		 * @var        boolean force_fullwidth If set to true, adds the classes .full-width.collapse to div.section-block.replicable-content.row
		 */
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Full Width', 'thememountain-plugin' ),
			'param_name' => 'force_fullwidth',
			'std' => 'true',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'description' => esc_html__( 'Forces the row to become full width.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Minimum Height', 'thememountain-plugin' ),
			'param_name' => 'minimum_height',
			'value' => '400',
			'description' => esc_html__( 'Determines the height beyond which the slider will not scale.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			'param_name' => 'el_id',
			'value' => '',
			'description' => esc_html__('Give this section a unique ID. This is useful if you want to initiate scroll or link to this section.','thememountain-plugin'),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra class name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'tab_id',
			'heading' => esc_html__( 'Testimonial ID (internal use)', 'thememountain-plugin' ),
			'param_name' => "tab_id",
			'value'=> $slider_id,
		),
		array(
			'group' => 'Navigation',
			'type' => 'checkbox',
			'heading' => esc_html__( 'Advance Automatically', 'thememountain-plugin' ),
			'param_name' => 'use_auto_advance',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'save_always' => true,
			'description' => esc_html__( 'Determines whether the slider should auto advance from slide to slide i.e. slideshow.', 'thememountain-plugin' ),
		),
		array(
			'group' => 'Navigation',
			'type' => 'textfield',
			'heading' => esc_html__( 'Auto Advance Interval', 'thememountain-plugin' ),
			'param_name' => 'auto_advance_interval',
			'value' => '5000',
			'dependency' => array('element' => 'use_auto_advance','value'=>'true'),
			'description' => '',
		),
		array(
			'group' => 'Navigation',
			'type' => 'checkbox',
			'heading' => esc_html__( 'Pause On Hover', 'thememountain-plugin' ),
			'param_name' => 'use_pause_on_hover',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => 'true',
			'save_always' => true,
			'dependency' => array('element' => 'use_auto_advance','value'=>'true'),
			'description' => esc_html__( 'Determines whether auto advancing should pause upon hover.', 'thememountain-plugin' ),
		),
		array(
			'group' => 'Navigation',
			'type' => 'checkbox',
			'heading' => esc_html__( 'Show Progress Bar', 'thememountain-plugin' ),
			'param_name' => 'use_progress_bar',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'dependency' => array('element' => 'use_auto_advance','value'=>'true'),
			'description' => esc_html__( 'Determines whether the slider should have a progress bar.', 'thememountain-plugin' )
		),
		array(
			'group' => 'Navigation',
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use Pagination', 'thememountain-plugin' ),
			'param_name' => 'use_pagination',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => 'true',
			'description' => esc_html__( 'Determines whether the slider should have pagination bullets.', 'thememountain-plugin' ),
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
		// design options
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Pagination Color', 'thememountain-plugin' ),
			'param_name' => 'pagination_color',
			'std' => '#000',
			'description' => '',
			),
		array(
			'group' => 'Animation',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Slider Transition Easing', 'thememountain-plugin' ),
			'param_name' => 'transition_easing',
			'value' => TM_Vc::$vc_elements_variable['easing'],
			'std' => 'linear',
			'description' => esc_html__( 'Determines the easing type of the slider transitions.', 'thememountain-plugin' ),
		),
		array(
			'group' => 'Animation',
			'type' => 'textfield',
			'heading' => esc_html__( 'Transition Speed', 'thememountain-plugin' ),
			'param_name' => 'transition_speed',
			'value' => '700',
			'description' => esc_html__( 'Determines the transition speed of slide transition.', 'thememountain-plugin' ),
		),
	),
	'custom_markup' => TM_Vc::tabs_custom_markup('testimonials',esc_html__( 'Testimonials Slider', 'thememountain-plugin' )),
	'default_content' => '[tm_testimonials_item title="' . esc_html__( 'New Testimonial', 'thememountain-plugin' ) . '" tab_id="' . $tab_id_1 . '"][/tm_testimonials_item]',
	'js_view' => 'TmTabsView'
) );

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-tabs.php' );

class WPBakeryShortCode_tm_testimonials_holder extends WPBakeryShortCode_tm_tab_holder {
	// protected $controls_template_file = 'editors/partials/backend_controls_tab.tpl.php';
	protected $predefined_atts = array(
		'tab_id' => TM_NEW_TITLE,
		'title' => ''
		);

	protected function getFileName() {
		return 'tm_testimonials_holder';
	}

	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_testimonials_item title="' . TM_NEW_TITLE . '" tab_id=""][/tm_testimonials_item]' ) . '</div>';
	}
}