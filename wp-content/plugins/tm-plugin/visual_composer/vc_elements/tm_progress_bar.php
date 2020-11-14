<?php
/**
 * tm_progress_bar
 *
 * @since      1.0
 */

vc_map( array(
	'name' => esc_html__( 'Progress Bar', 'thememountain-plugin' ),
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'base' => 'tm_progress_bar',
	'is_container' => false,
	'icon' => 'tm_vc_icon_progress_bars',
	'show_settings_on_create' => true,
	'description' => '',
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Label', 'thememountain-plugin' ),
			'param_name' => 'label',
			'description' => esc_html__( 'Progress bar title.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Hide Measure', 'thememountain-plugin' ),
			'param_name' => 'hide_measure',
			'value' => array( esc_html__( 'Hide Measure', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'description' => esc_html__( 'Whether the bar measure should be hidden or shown.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Percentage', 'thememountain-plugin' ),
			'param_name' => 'percentage',
			'value' => '50',
			'description' => esc_html__( 'Width of the progress bar in percentage. Possible values range from <b>0-100</b>.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Measure', 'thememountain-plugin' ),
			'param_name' => 'measure',
			'value' => '%',
			'description' => esc_html__( 'The progress bar measure i.e 50% or 50/100 .', 'thememountain-plugin' ),
			),

		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Animate', 'thememountain-plugin' ),
			'param_name' => 'animate',
			'value' => array( esc_html__( 'Animate', 'thememountain-plugin' ) => 'true' ),
			'std' => 'true',
			'description' => esc_html__( 'Whether the bar animate upon entering the viewport.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description'=> esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' )
			),
		// 'group' => 'Design Options',
		array(
			'group' => 'Design Options',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Size', 'thememountain-plugin' ),
			'param_name' => 'size',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['sizes'],
			'std' => 'medium',
			'description' => esc_html__( 'Determines whether progress bar should be small, medium, large or extra large in size.', 'thememountain-plugin' ),
			),
		array(
			'group' => 'Design Options',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Border Style', 'thememountain-plugin' ),
			'param_name' => 'border_style',
			'value' => array(
				esc_html__( 'None', 'thememountain-plugin' ) => '',
				esc_html__( 'Rounded', 'thememountain-plugin' ) => 'rounded',
				esc_html__( 'Pill', 'thememountain-plugin' ) => 'pill',
				),
			'std' => '',
			'description' => esc_html__( 'Whether progress bar should have sharp corners, rounded corners, or be pill shaped.', 'thememountain-plugin' ),
			),
		/**
		 * Colors
		 */
		/**
		 * Track background color (default: #eee )
			Track border color (default: #eee )
			Bar background color ( default: #d0d0d0 )
			Bar border color ( default: #d0d0d0 )
			Text color ( default: body text color)
		 */
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Track background color', 'thememountain-plugin' ),
			'param_name' => 'track_background_color',
			'std' => '#eee',
			),
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Track border color', 'thememountain-plugin' ),
			'param_name' => 'track_border_color',
			'std' => '#eee',
			),
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Bar background color', 'thememountain-plugin' ),
			'param_name' => 'bar_background_color',
			'std' => '#d0d0d0',
			),
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Bar border color', 'thememountain-plugin' ),
			'param_name' => 'bar_border_color',
			'std' => '#d0d0d0',
			),
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Text Color', 'thememountain-plugin' ),
			'param_name' => 'text_color',
			'std' => '',
			),
	),
	'custom_markup' => '<h4 class="wpb_element_title"> <i class="vc_general vc_element-icon tm_vc_icon_progress_bars" data-is-container="true"></i> Progress Bar</h4><div class="wpb_element_preview"></div>'
	,
	'js_view' => 'TmProgressBarView'
));

class WPBakeryShortCode_tm_progress_bar extends WPBakeryShortCode {
}
