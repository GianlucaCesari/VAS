<?php
/**
 * ThemeMountain tm_box
 */
if (class_exists( 'Vc_Manager' )) {
	vc_map( array(
		'name' => esc_html__( 'Box', 'thememountain-plugin' ),
		'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
		'base' => 'tm_box',
		'icon' => 'tm_vc_icon_box',
		'is_container' => true,
		'show_settings_on_create' => true,
		'description' => '',
		'params' => array(
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__( 'Box Content', 'thememountain-plugin' ),
				'param_name' => 'content',
				'admin_label' => TRUE,
				'description'=> esc_html__( 'Whether the tabs should be left, center (horizontal tabs only) or right aligned.', 'thememountain-plugin' ),
				),
			ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field(),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Dismissable', 'thememountain-plugin' ),
				'param_name' => 'is_dismissable',
				'value' => array( esc_html__( 'Make it dismissable', 'thememountain-plugin' ) => 'true' ),
				'std' => '',
				'description' => esc_html__( 'If this option is checked, the box will become a dismissable box, meaning the user can remove it.', 'thememountain-plugin' )
				),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
				'param_name' => 'el_class',
				'description'=> esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' )
				),
			// design options
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Type', 'thememountain-plugin' ),
				'param_name' => 'type',
				'value' => array(
					esc_html__( 'Info', 'thememountain-plugin' ) => 'info',
					esc_html__( 'Success', 'thememountain-plugin' ) => 'success',
					esc_html__( 'Alert', 'thememountain-plugin' ) => 'alert',
					esc_html__( 'Warning', 'thememountain-plugin' ) => 'warning',
					esc_html__( 'Custom', 'thememountain-plugin' ) => 'custom',
					),
				'std' => 'info',
				'description' => esc_html__( 'Choose box type: info, success, warning, alert, or custom (your own color).', 'thememountain-plugin' )
				),
			// border style
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Border Style', 'thememountain-plugin' ),
				'param_name' => 'border_style',
				'value' => array(
					esc_html__( 'None', 'thememountain-plugin' ) => '',
					esc_html__( 'Rounded', 'thememountain-plugin' ) => 'rounded',
					),
				'std' => '',
				'description' => esc_html__( 'Choose whether the tabs should have sharp or rounded corners.', 'thememountain-plugin' )
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Box Size', 'thememountain-plugin' ),
				'param_name' => 'size',
				'value' => array(
					esc_html__('Small', 'thememountain-plugin') => 'small',
					esc_html__('Medium', 'thememountain-plugin') => 'medium',
					esc_html__('Large', 'thememountain-plugin') => 'large',
					esc_html__('Xlarge', 'thememountain-plugin') => 'xlarge',
					esc_html__('Custom', 'thememountain-plugin') => 'custom',
					),
				'std' => 'medium',
				'description' => esc_html__( 'Set the box size, small, medium, large or extra large. Determined by content padding.', 'thememountain-plugin' ),
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'textfield',
				'heading' => esc_html__( 'Box Top/Bottom Padding', 'thememountain-plugin' ),
				'param_name' => 'box_top_bottom_padding',
				'value' => 15,
				'dependency' => array('element' => 'size','value'=> 'custom'),
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'textfield',
				'heading' => esc_html__( 'Box Left/Right Padding', 'thememountain-plugin' ),
				'param_name' => 'box_left_right_padding',
				'value' => 15,
				'dependency' => array('element' => 'size','value'=> 'custom'),
				),
			// custom only, with gradient color support
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Background Color', 'thememountain-plugin' ),
				'param_name' => 'background_color',
				'std' => '',
				'dependency' => array('element' => 'type','value'=>'custom'),
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'checkbox',
				'heading' => esc_html__( 'Use gradient', 'thememountain-plugin' ),
				'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
				'param_name' => 'background_use_gradient',
				'std' => '',
				'description' => esc_html__( 'This will create a background image gradient, which means that if you have set an image as a background, the gradient will replace it. If selected, Background Color will be used as the start color for the gradient.', 'thememountain-plugin' ),
				'dependency' => array('element' => 'type','value'=> 'custom'),
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
			// end custom only, with gradient color support
			// custom only
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Border Color', 'thememountain-plugin' ),
				'param_name' => 'border_color',
				'std' => '',
				'dependency' => array('element' => 'type','value'=>'custom'),
				),
			// custom only
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Font Color', 'thememountain-plugin' ),
				'param_name' => 'text_color',
				'std' => '',
				'dependency' => array('element' => 'type','value'=>'custom'),
				),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'checkbox',
				'heading' => esc_html__( 'Box Shadow', 'thememountain-plugin' ),
				'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
				'param_name' => 'box_shadow',
				'std' => '',
			),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'checkbox',
				'heading' => esc_html__( 'Box Shadow on Hover', 'thememountain-plugin' ),
				'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
				'param_name' => 'box_shadow_hover',
				'std' => '',
			),
		),
		// 'custom_markup' => '<h4 class="wpb_element_title"> <i class="vc_general vc_element-icon icon-wpb-row" data-is-container="true"></i> ThemeMountain Progress Bar</h4><div class="wpb_element_preview"></div>'
		// ,
		// 'js_view' => 'TmProgressBarView'
	) );
}

class WPBakeryShortCode_tm_box extends WPBakeryShortCode {
}