<?php
/**
ThemeMountain tm_team_holder
*/
use ThemeMountain\TM_Vc as TM_Vc;

$slider_id = time() . '-' . rand( 0, 100 );
$tab_id_1 = time() . '-1-' . rand( 0, 100 );

vc_map( array(
	"base"      => "tm_team_holder",
	"name"      => esc_html__("Team", 'thememountain-plugin'),
	"icon"      => "tm_vc_icon_team_block",
	'class' => 'tm_element_tab_holder',
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'show_settings_on_create' => true,
	'is_container' => true,
	'description' => '',
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Team Type', 'thememountain-plugin' ),
			'param_name' => 'team_type',
			'value' => array(
				esc_html__( 'Team Section 1', 'thememountain-plugin' ) => 'team-1',
				esc_html__( 'Team Section 2', 'thememountain-plugin' ) => 'team-2',
				esc_html__( 'Team Section 3', 'thememountain-plugin' ) => 'team-3',
				esc_html__( 'Team Section 4', 'thememountain-plugin' ) => 'team-4',
				esc_html__( 'Team Section 5', 'thememountain-plugin' ) => 'team-5',
				esc_html__( 'Team Section 6', 'thememountain-plugin' ) => 'team-6',
				esc_html__( 'Team Slider', 'thememountain-plugin' ) => 'team-slider-1',
			),
			'std' => 'team-1',
			'save_always' => true,
			'description' => esc_html__( 'Sets the team section type to either Team Section 1, Team Section 2 or to Team Slider.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Items Per Row', 'thememountain-plugin' ),
			'param_name' => 'items_per_row',
			'value' => array(
				esc_html__( '2 Team Members', 'thememountain-plugin' ) => '2',
				esc_html__( '3 Team Members', 'thememountain-plugin' ) => '3',
				esc_html__( '4 Team Members', 'thememountain-plugin' ) => '4',
				esc_html__( '5 Team Members', 'thememountain-plugin' ) => '5',
				esc_html__( '6 Team Members', 'thememountain-plugin' ) => '6',
			),
			'std' => '3',
			'save_always' => true,
			'dependency' => array('element' => 'team_type','value'=>array('team-1','team-2')),
			'description' => esc_html__( 'Determines the number of team members per row. Possible values are 3-6 team members per row.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Items Per Row', 'thememountain-plugin' ),
			'param_name' => 'items_per_row_slider',
			'value' => array(
				esc_html__( '2 Team Members', 'thememountain-plugin' ) => '2',
				esc_html__( '3 Team Members', 'thememountain-plugin' ) => '3',
				esc_html__( '4 Team Members', 'thememountain-plugin' ) => '4',
			),
			'std' => '3',
			'save_always' => true,
			'dependency' => array('element' => 'team_type','value'=>'team-slider-1'),
			'description' => '',
		),
		//
		// image
		ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Background Image', 'thememountain-plugin'),esc_html__( 'Upload background image for the team section.', 'thememountain-plugin' )),
		ThemeMountain\TM_Vc::get_attach_image_vc_field(),
		ThemeMountain\TM_Vc::get_image_url_vc_field(),
		// extra css class name
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
		// Navigation
		array(
			'group' => esc_html__( 'Navigation', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Advance Automatically', 'thememountain-plugin' ),
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
			'heading' => esc_html__( 'Pause on Hover', 'thememountain-plugin' ),
			'param_name' => 'pause_on_hover',
			'save_always' => true,
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => 'true',
			'dependency' => array('element' => 'auto_advance','value'=>'true'),
			'description' => esc_html__( 'Determines whether auto advancing should pause upon hover.', 'thememountain-plugin' )
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
	),
	'custom_markup' => TM_Vc::tabs_custom_markup('team_block',esc_html__("Team", 'thememountain-plugin')),
	'default_content' => '[tm_team_item title="' . esc_html__( 'New Team Member', 'thememountain-plugin' ) . '" tab_id="' . $tab_id_1 . '"][/tm_team_item]',
	'js_view' => 'TmTabsView'
) );

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-tabs.php' );

class WPBakeryShortCode_tm_team_holder extends WPBakeryShortCode_tm_tab_holder {
	// protected $controls_template_file = 'editors/partials/backend_controls_tab.tpl.php';
	protected $predefined_atts = array(
		'tab_id' => TM_NEW_TITLE,
		'title' => ''
	);

	protected function getFileName() {
		return 'tm_team_holder';
	}

	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_team_item title="' . TM_NEW_TITLE . '" tab_id=""][/tm_team_item]' ) . '</div>';
	}

}