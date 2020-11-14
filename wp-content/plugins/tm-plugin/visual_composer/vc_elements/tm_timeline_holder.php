<?php
use ThemeMountain\TM_Vc as TM_Vc;

$slider_id = 'fullscreen-' . time() . '-' . rand( 0, 100 );
$slide_id_1 = 'fullscreen-' . time() . '-1-' . rand( 0, 100 );
// ref http://framework.thememountain.com/servelet/avalanche-slider#

vc_map( array(
	"base"      => "tm_timeline_holder",
	"name"      => esc_html__("Timeline", 'thememountain-plugin'),
	"icon"      => "tm_vc_icon_timeline",
	'class' => 'tm_element_vertical_tab_holder',
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'show_settings_on_create' => true,
	'is_container' => true,
	'description' => '',
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Timeline Title', 'thememountain-plugin' ),
			'param_name' => 'title',
			'description' => esc_html__( 'Enter a timeline title.', 'thememountain-plugin' )
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'No Indication ', 'thememountain-plugin' ),
			'param_name' => 'without_indication',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'description'=> esc_html__( 'Determines if the timeline indication should be hidden.', 'thememountain-plugin' ),
			),
		/** Please update VC timeline element #963 */
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Alignment', 'thememountain-plugin' ),
			'param_name' => 'timeline_alignment',
			'value' => array(
				esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
				esc_html__( 'Center', 'thememountain-plugin' ) => 'center',
				esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
				),
			'std' => 'left',
			'description' => esc_html__( 'Determines whether the timeline should be left, center or right aligned.', 'thememountain-plugin' )
			),
		// array(
		// 	'type' => 'textfield',
		// 	'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
		// 	'param_name' => 'el_id',
		// 	),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description'=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'thememountain-plugin' )
		),
		array(
			'type' => 'tab_id',
			'heading' => esc_html__( 'Slider ID', 'thememountain-plugin' ),
			'param_name' => "slider_id",
			'value'=> $slider_id,
			'description' => ''
			),
		// 'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Border Width', 'thememountain-plugin' ),
			'param_name' => 'border_width',
			'value' => array(
				esc_html__( 'Thin', 'thememountain-plugin' ) => 'thin',
				esc_html__( 'Thick', 'thememountain-plugin' ) => 'thick',
				),
			'std' => 'thin',
			'description' => esc_html__( 'Determines the thickness of the timline.', 'thememountain-plugin' )
			),
		// colors
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Dot Background Color', 'thememountain-plugin' ),
			'param_name' => 'dot_bkg_color',
			'std' => '#FFFFFF',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Dot Border Color', 'thememountain-plugin' ),
			'param_name' => 'dot_border_color',
			'std' => '#EEEEEE',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Line Background Color', 'thememountain-plugin' ),
			'param_name' => 'line_bkg_color',
			'std' => '#eee',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Date Color', 'thememountain-plugin' ),
			'param_name' => 'date_color',
			'std' => '#000',
			),
	),
	'custom_markup' => TM_Vc::tabs_custom_markup('timeline',esc_html__( 'Timeline', 'thememountain-plugin' )),
	'default_content' => '
	[tm_timeline_item title="' . esc_html__( 'New Timeline Item 1', 'thememountain-plugin' ) . '"][/tm_timeline_item]',
	'js_view' => 'TmTabsView'
) );

class WPBakeryShortCode_tm_timeline_holder extends WPBakeryShortCode_tm_slider_holder {
	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_timeline_item title="New Timeline Item 1"][/tm_timeline_item]' ) . '</div>';
	}
}