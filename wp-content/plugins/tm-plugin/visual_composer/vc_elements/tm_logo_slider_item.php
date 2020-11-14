<?php
/**
	ThemeMountain tm_logo_slider_item
*/

// Checks up if the Visual Composer is activated.
if (class_exists( 'Vc_Manager' )) {
	/**
	    Note: please see initVisualComposer.php ... this file is included upon the vc_before_init hook.
	*/
	vc_map( array(
		'name' => esc_html__( 'Logo Slider Item', 'thememountain-plugin' ),
		'base' => 'tm_logo_slider_item',
		"icon"      => "tm_vc_icon_logo_slider",
		// 'allowed_container_element' => false,
		'is_container' => true,
		"as_child" => array('only' => 'tm_logo_slider_holder'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    	"content_element" => false,
    	'description' => '',
		'params' => array(
			array(
				// group Social List
	    		'type' => 'textfield',
	    		'heading' => esc_html__( 'Slide Title', 'thememountain-plugin' ),
	    		'param_name' => 'title',
				'value' => '',
				'admin_label' => true,
				'description' => esc_html__( 'Used to identify this slide in the Visual Composer.', 'thememountain-plugin' ),
	    	),
			// Image
			ThemeMountain\TM_Vc::get_image_selector_vc_field('',esc_html__( 'Image', 'thememountain-plugin'),esc_html__( 'Upload image.', 'thememountain-plugin' )),
			ThemeMountain\TM_Vc::get_attach_image_vc_field(),
			ThemeMountain\TM_Vc::get_image_url_vc_field(),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
				'param_name' => 'el_class',
				'description'=> esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' )
				),
			array(
				'type' => 'tab_id',
				'heading' => esc_html__( 'Slide Tab ID', 'thememountain-plugin' ),
				'param_name' => "tab_id",
				),
		),
		'js_view' => 'TmTabView'
	) );
}

class WPBakeryShortCode_tm_logo_slider_item extends WPBakeryShortCode_tm_tab_item {

}