<?php
namespace ThemeMountain;
/**
* vc_row (custom)
*/

$map_data = array(
	'name' => esc_html__( 'Row / Section Block', 'thememountain-plugin' ),
	'base' => 'vc_row',
	'is_container' => true,
	'icon' => 'tm_vc_icon_row',
	'show_settings_on_create' => false,
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
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
			'std' => '',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'description' => esc_html__( 'Forces the row to become full width.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Equalize', 'thememountain-plugin' ),
			'param_name' => 'equalize',
			'std' => '',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'description' => esc_html__( 'When designing layouts it might come in handy to equalize columns. If this option is checked, it means that no matter the content in each column, the columns will all become the same height as the tallest column.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Columns on Tablet', 'thememountain-plugin' ),
			'param_name' => 'columns_on_tablet',
			'value' => array (
				esc_html__('Keep columns', 'thememountain-plugin') => 'keep',
				esc_html__('Force to two columns', 'thememountain-plugin') => 'force_2',
				esc_html__('Force to single column', 'thememountain-plugin') => 'force_1',
				),
			'std' => 'keep',
			'save_always' => true,
			'description' => esc_html__( 'Determines whether columns should be broken down to two or a single column on tablet. This is useful if you are using 4+ columns on desktop.', 'thememountain-plugin' ),
			),
		/**
		 * Reserved
		 */
    	array(
    		//'group' => esc_html__( 'Reserved', 'thememountain-plugin' ),
    		'type' => 'checkbox',
    		'heading' => esc_html__( 'Use Font Color', 'thememountain-plugin' ),
    		'param_name' => 'set_font_color',
    		'value' => array( esc_html__( 'Set font color for this row or section block.', 'thememountain-plugin' ) => 'yes' ),
    		'std' => '',
    		'description' => '',
    	),
		array(
			//'group' => esc_html__( 'Reserved', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Font Color', 'thememountain-plugin' ),
			'param_name' => 'font_color',
			'std' => '#666666',
			'dependency' => array('element' => 'set_font_color','value'=>'yes'),
			'description' => '',
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			'param_name' => 'el_id',
			'description' => esc_html__( 'Give this section a unique ID. This is useful if you want to initiate scroll or link to this section.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' ),
			),
		/**
		 * Spacing
		 */
		/* Note: clears all section block padding by adding no-padding to div.section-block */
    	array(
    		'group' => esc_html__( 'Spacing', 'thememountain-plugin' ),
    		'type' => 'checkbox',
    		'heading' => esc_html__( 'Clear All Padding', 'thememountain-plugin' ),
    		'param_name' => 'clear_all_padding',
    		'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'yes' ),
    		'std' => '',
    		'description' => esc_html__( 'Clears both top and bottom padding of the row/section-block.', 'thememountain-plugin' ),
    	),
		array(
			'group' => esc_html__( 'Spacing', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Padding Top', 'thememountain-plugin' ),
			'param_name' => 'padding_top',
			'value' => TM_Vc::$vc_elements_variable['spacing_notches'],
			'std' => 'inherit',
			'description' => esc_html__( 'Sets the top padding of a section block. Default is set to 110px. Possible values range from 0-150px.', 'thememountain-plugin' ),
		),
		array(
			'group' => esc_html__( 'Spacing', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Padding Bottom', 'thememountain-plugin' ),
			'param_name' => 'padding_bottom',
			'value' => TM_Vc::$vc_elements_variable['spacing_notches'],
			'std' => 'inherit',
			'description' => esc_html__( 'Sets the bottom padding of a section block. Default is set to 110px. Possible values range from 0-150px.', 'thememountain-plugin' ),
		),
		/**
		 * Design Options
		 */
    	array(
    		'group' => esc_html__( 'Background', 'thememountain-plugin' ),
    		'type' => 'checkbox',
    		'heading' => esc_html__( 'Background color or image', 'thememountain-plugin' ),
    		'param_name' => 'use_background',
    		'value' => array( esc_html__( 'Use background color or image.', 'thememountain-plugin' ) => 'yes' ),
    		'std' => '',
    		'description' => esc_html__( 'If this option is checked, options for setting background color or adding image will appear.', 'thememountain-plugin' ),
    	),
    	// background color with gradient support
		array(
			'group' => esc_html__( 'Background', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Background Color', 'thememountain-plugin' ),
			'param_name' => 'background_color',
			'std' => '#FFFFFF',
			'dependency' => array('element' => 'use_background','value'=>'yes'),
			'description' => esc_html__( 'Sets the background color of the row or section block.', 'thememountain-plugin' ),
		),
		array(
			'group' => esc_html__( 'Background', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use gradient for background', 'thememountain-plugin' ),
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'param_name' => 'background_use_gradient',
			'std' => '',
			'description' => esc_html__( 'This will create a background image gradient, which means that if you have set an image as a background, the gradient will replace it. If selected, Background Color will be used as the start color for the gradient.', 'thememountain-plugin' ),
			'dependency' => array('element' => 'use_background','value'=> 'yes'),
		),
		array(
			'group' => esc_html__( 'Background', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'End Background Color Gradient', 'thememountain-plugin' ),
			'param_name' => 'background_gradient_end_color',
			'std' => '',
			'dependency' => array('element' => 'background_use_gradient','value'=>'true'),
		),
		array(
			'group' => esc_html__( 'Background', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Angle for the Background Color Gradient', 'thememountain-plugin' ),
			'param_name' => 'background_gradient_angle',
			'description'=> esc_html__( 'Sets the angle of your gradient, acceptable values range from 0-360', 'thememountain-plugin' ),
			'dependency' => array('element' => 'background_use_gradient','value'=>'true'),
		),
		// end background color with gradient support
		/** overlay **/
    	array(
    		'group' => esc_html__( 'Background', 'thememountain-plugin' ),
    		'type' => 'checkbox',
    		'heading' => esc_html__( 'Add overlay', 'thememountain-plugin' ),
    		'param_name' => 'add_overlay',
    		'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
    		'std' => '',
    		'description' => '',
    		'dependency' => array('element' => 'use_background','value'=> 'yes'),
    	),
    	// Overlay background color with gradient support
		array(
			'group' => 'Background',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Overlay Background Color', 'thememountain-plugin' ),
			'param_name' => 'overlay_background_color',
			'std' => 'rgba(0,0,0,0.3)',
			'description' => '',
			'dependency' => array('element' => 'add_overlay','value'=>'true'),
			),
		array(
			'group' => esc_html__( 'Background', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use gradient for overlay background', 'thememountain-plugin' ),
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'param_name' => 'overlay_background_use_gradient',
			'std' => '',
			'description' => esc_html__( 'This will create a background image gradient, which means that if you have set an image as a background, the gradient will replace it. If selected, Background Color will be used as the start color for the gradient.', 'thememountain-plugin' ),
			'dependency' => array('element' => 'add_overlay','value'=>'true'),
		),
		array(
			'group' => esc_html__( 'Background', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'End Overlay Background Color Gradient', 'thememountain-plugin' ),
			'param_name' => 'overlay_background_gradient_end_color',
			'std' => '',
			'dependency' => array('element' => 'overlay_background_use_gradient','value'=>'true'),
		),
		array(
			'group' => esc_html__( 'Background', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Angle for the Overlay Background Color Gradient', 'thememountain-plugin' ),
			'param_name' => 'overlay_background_gradient_angle',
			'description'=> esc_html__( 'Sets the angle of your gradient, acceptable values range from 0-360', 'thememountain-plugin' ),
			'dependency' => array('element' => 'overlay_background_use_gradient','value'=>'true'),
		),
		/** background image */
		TM_Vc::get_image_selector_vc_field(esc_html__( 'Background', 'thememountain-plugin' ),esc_html__( 'Background Image', 'thememountain-plugin'),esc_html__( 'Sets the background image of the row or section block.', 'thememountain-plugin' ),array('element' => 'use_background','value'=>'yes')),
		TM_Vc::get_attach_image_vc_field(esc_html__( 'Background', 'thememountain-plugin' )),
		TM_Vc::get_image_url_vc_field(esc_html__( 'Background', 'thememountain-plugin' )),
	),
	'js_view' => 'VcRowView'
);

// vc_column
vc_map($map_data);

// vc_column_inner
$map_data['base'] = 'vc_row_inner';
$map_data['name'] = esc_html__( 'Row / Section Block (Inner)', 'thememountain-plugin' );
$map_data['content_element'] = false;
vc_map($map_data);
