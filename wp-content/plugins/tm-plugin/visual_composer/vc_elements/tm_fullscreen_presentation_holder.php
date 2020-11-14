<?php
use ThemeMountain\TM_Vc as TM_Vc;

$slider_id = 'fullscreen-' . time() . '-' . rand( 0, 100 );
$slide_id_1 = 'fullscreen-' . time() . '-1-' . rand( 0, 100 );
// ref http://framework.thememountain.com/servelet/avalanche-slider#

vc_map( array(
	"base"      => "tm_fullscreen_presentation_holder",
	"name"      => esc_html__("Fullscreen Presentation", 'thememountain-plugin'),
	"icon"      => "tm_vc_icon_fullscreen_presentation",
	'class' => 'tm_element_vertical_tab_holder',
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'show_settings_on_create' => true,
	'is_container' => true,
	'description' => '',
	'params' => array(
		array(
			'type' => 'checkbox',
			'param_name' => 'use_navigation',
			'value' => array( esc_html__( 'Use Navigation', 'thememountain-plugin' ) => 'true' ),
			'std' => 'true',
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			'param_name' => 'el_id',
			),
		// extra css class name
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
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Pagination Color 1', 'thememountain-plugin' ),
			'param_name' => 'pagination_color_1',
			'std' => '#FFFFFF',
			'description' => esc_html__( 'Sets the default pagination color of the slider.', 'thememountain-plugin' ),
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Pagination Color 2', 'thememountain-plugin' ),
			'param_name' => 'pagination_color_2',
			'std' => '#000000',
			'description' => esc_html__( 'Sets an alternative pagination color of the fullscreen presentation. This is useful when you need a darker or lighter pagination for a particular fullscreen slide.', 'thememountain-plugin' ),
			),
	),
	'custom_markup' => TM_Vc::tabs_custom_markup('fullscreen_presentation',esc_html__( 'Fullscreen presentation', 'thememountain-plugin' )),
	'default_content' => '
	[tm_fullscreen_presentation_item title="' . esc_html__( 'Section 1', 'thememountain-plugin' ) . '" slide_id="' . $slide_id_1 . '"][/tm_fullscreen_presentation_item]
	',
	'js_view' => 'TmAvalancheView'
) );

class WPBakeryShortCode_tm_fullscreen_presentation_holder extends WPBakeryShortCode_tm_slider_holder {

	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_fullscreen_presentation_item title="Section" slide_id=""][/tm_fullscreen_presentation_item]' ) . '</div>';
	}
}