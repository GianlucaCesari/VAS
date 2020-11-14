<?php
use ThemeMountain\TM_Vc as TM_Vc;

$slider_id = 'fullscreen-' . time() . '-' . rand( 0, 100 );
$slide_id_1 = 'fullscreen-' . time() . '-1-' . rand( 0, 100 );
// ref http://framework.thememountain.com/servelet/avalanche-slider#

vc_map( array(
	"base"      => "tm_menu_holder",
	"name"      => esc_html__("Menu", 'thememountain-plugin'),
	"icon"      => "tm_vc_icon_menu",
	'class' => 'tm_element_vertical_tab_holder',
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'show_settings_on_create' => true,
	'is_container' => true,
	'description' => '',
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Menu Title', 'thememountain-plugin' ),
			'param_name' => 'title',
			'description' => esc_html__( 'Enter a menu item title.', 'thememountain-plugin' )
		),
		// Image
		ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Attach Image', 'thememountain-plugin'),esc_html__( 'Upload image.', 'thememountain-plugin' )),
		ThemeMountain\TM_Vc::get_attach_image_vc_field(),
		ThemeMountain\TM_Vc::get_image_url_vc_field(),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Menu Column Width', 'thememountain-plugin' ),
			'param_name' => 'menu_column_width',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['column_width'],
			'std' => '10',
			'description'=> esc_html__( 'Determines the column width. Values range from 1 - 12 columns (full width).', 'thememountain-plugin' ),
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Menu Column Offset', 'thememountain-plugin' ),
			'param_name' => 'menu_column_offset',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['column_offset'],
			'std' => '1',
			'description'=> esc_html__( 'Determines the column offset. Refer to Rows & Columns > Column Alignment > Understanding Column Offset for detailed examples of column offsets.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			'param_name' => 'el_id',
			),
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
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Display Menu Items Inline', 'thememountain-plugin' ),
			'param_name' => 'display_menu_items_inline',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Menu Border Style', 'thememountain-plugin' ),
			'param_name' => 'menu_border_style',
			'value' => array(
				esc_html__( 'None', 'thememountain-plugin' ) => '',
				esc_html__( 'Rounded', 'thememountain-plugin' ) => 'rounded',
				),
			'std' => 'dashed',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Menu Title Alignment', 'thememountain-plugin' ),
			'param_name' => 'menu_title_alignment',
			'value' => array(
				esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
				esc_html__( 'Center', 'thememountain-plugin' ) => 'center',
				esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
				),
			'std' => 'left',
			'description' => esc_html__( 'Menu Title Alignment', 'thememountain-plugin' )
			),
		// 'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Menu Items Alignment', 'thememountain-plugin' ),
			'param_name' => 'menu_items_alignment',
			'value' => array(
				esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
				esc_html__( 'Center', 'thememountain-plugin' ) => 'center',
				esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
				),
			'std' => 'left',
			'description' => esc_html__( 'Menu Items Alignment', 'thememountain-plugin' )
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Show Menu Item Line', 'thememountain-plugin' ),
			'param_name' => 'menu_item_line_type',
			'value' => array(
				esc_html__( 'None', 'thememountain-plugin' ) => '',
				esc_html__( 'Solid', 'thememountain-plugin' ) => 'solid',
				esc_html__( 'Dotted', 'thememountain-plugin' ) => 'dotted',
				esc_html__( 'Dashed', 'thememountain-plugin' ) => 'dashed',
				),
			'std' => 'dashed',
			),
		// box
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Box Size', 'thememountain-plugin' ),
			'param_name' => 'box_size',
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
			'dependency' => array('element' => 'box_size','value'=> 'custom'),
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Box Left/Right Padding', 'thememountain-plugin' ),
			'param_name' => 'box_left_right_padding',
			'value' => 15,
			'dependency' => array('element' => 'box_size','value'=> 'custom'),
			),
    	// background color with gradient support
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Menu Background Color', 'thememountain-plugin' ),
			'param_name' => 'menu_bkg_color',
			'std' => '#FFFFFF',
			'description' => esc_html__( 'Sets the background color of the row or section block.', 'thememountain-plugin' ),
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
			'heading' => esc_html__( 'End Background Color Gradient', 'thememountain-plugin' ),
			'param_name' => 'background_gradient_end_color',
			'std' => '',
			'dependency' => array('element' => 'background_use_gradient','value'=>'true'),
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Angle for the Background Color Gradient', 'thememountain-plugin' ),
			'param_name' => 'background_gradient_angle',
			'description'=> esc_html__( 'Sets the angle of your gradient, acceptable values range from 0-360', 'thememountain-plugin' ),
			'dependency' => array('element' => 'background_use_gradient','value'=>'true'),
		),
		// end background color with gradient support
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Menu Border Color', 'thememountain-plugin' ),
			'param_name' => 'menu_border_color',
			'std' => '#EEEEEE',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Menu Title Color', 'thememountain-plugin' ),
			'param_name' => 'menu_title_color',
			'std' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Menu Item Title Color', 'thememountain-plugin' ),
			'param_name' => 'menu_item_title_color',
			'std' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Menu Item Description Color', 'thememountain-plugin' ),
			'param_name' => 'menu_item_description_color',
			'std' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Menu Item Line Color', 'thememountain-plugin' ),
			'param_name' => 'menu_item_line_color',
			'std' => '',
			),
    	// Overlay background color with gradient support
		array(
			'group' => 'Design Options',
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Overlay Background Color', 'thememountain-plugin' ),
			'param_name' => 'menu_item_overlay_color',
			'std' => 'rgba(0,0,0,0.3)',
			'description' => '',
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use gradient for overlay background', 'thememountain-plugin' ),
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'param_name' => 'overlay_background_use_gradient',
			'std' => '',
			'description' => esc_html__( 'This will create a background image gradient, which means that if you have set an image as a background, the gradient will replace it. If selected, Background Color will be used as the start color for the gradient.', 'thememountain-plugin' ),
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'End Overlay Background Color Gradient', 'thememountain-plugin' ),
			'param_name' => 'overlay_background_gradient_end_color',
			'std' => '',
			'dependency' => array('element' => 'overlay_background_use_gradient','value'=>'true'),
		),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Angle for the Overlay Background Color Gradient', 'thememountain-plugin' ),
			'param_name' => 'overlay_background_gradient_angle',
			'description'=> esc_html__( 'Sets the angle of your gradient, acceptable values range from 0-360', 'thememountain-plugin' ),
			'dependency' => array('element' => 'overlay_background_use_gradient','value'=>'true'),
		),
		// End Overlay background color with gradient support
	),
	'custom_markup' => TM_Vc::tabs_custom_markup('menu',esc_html__( 'Menu', 'thememountain-plugin' )),
	'default_content' => '
	[tm_menu_item title="' . esc_html__( 'New Menu Item 1', 'thememountain-plugin' ) . '"]',
	'js_view' => 'TmTabsView'
) );

class WPBakeryShortCode_tm_menu_holder extends WPBakeryShortCode_tm_slider_holder {

	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_menu_item title="New Menu Item 1"]' ) . '</div>';
	}
}