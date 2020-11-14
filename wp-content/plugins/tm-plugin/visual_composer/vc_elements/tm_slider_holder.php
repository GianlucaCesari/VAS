<?php
/**
ThemeMountain tm_slider_holder
*/
use ThemeMountain\TM_Vc as TM_Vc;

$slider_id = 'slide-' . time() . '-' . rand( 0, 100 );
$slide_id_1 = 'slide-' . time() . '-1-' . rand( 0, 100 );

vc_map( array(
	"base"      => "tm_slider_holder",
	"name"      => esc_html__("Slider", 'thememountain-plugin'),
	"icon"      => "tm_vc_icon_slider",
	'class' => 'tm_element_tab_holder',
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'show_settings_on_create' => true,
	'is_container' => true,
	'admin_enqueue_js' => plugins_url('', dirname( __FILE__ ) ).'/assets/js/composer-custom-views.tm_slider_holder.js',
	'description' => '',
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Slider Type', 'thememountain-plugin' ),
			'param_name' => 'slider_type',
			'value' => array(
				esc_html__( 'Fullscreen Slider', 'thememountain-plugin' ) => 'fullscreen',
				esc_html__( 'Full Width Slider', 'thememountain-plugin' ) => 'full_width',
				esc_html__( 'Content slider', 'thememountain-plugin' ) => 'content',
			),
			'std' => 'content',
			'save_always' => true,
			'description' => esc_html__( 'Determines the slider type to be used, either Content, Full Width or Fullscreen slider.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Width', 'thememountain-plugin' ),
			'param_name' => 'width',
			'value' => '1140',
			'dependency' => array('element'=>'slider_type','value'=>'content'),
			'description' => esc_html__( 'Determines the width of the slider. Defaults to 1140 (px).', 'thememountain-plugin' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Height', 'thememountain-plugin' ),
			'param_name' => 'height',
			'value' => array(
				esc_html__( 'Regular', 'thememountain-plugin' ) => 'regular',
				esc_html__( 'Window height', 'thememountain-plugin' ) => 'window_height',
				esc_html__( 'Custom', 'thememountain-plugin' ) => 'custom'
			),
			'std' => 'regular',
			'save_always' => true,
			'dependency' => array(
				'element' => 'slider_type',
				'value' => array('full_width','content')
				),
			'description' => esc_html__( 'Determines the starting height of the slider.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Custom Height', 'thememountain-plugin' ),
			'param_name' => 'height_custom',
			'value' => '500',
			'dependency' => array('element'=>'height','value'=>'custom'),
			'description' => esc_html__( 'Allows you to set your preferred height. If you like to enter the value as pixels, it should be i.e. 400px.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Scale Under', 'thememountain-plugin' ),
			'param_name' => 'scale_under',
			'value' => '960',
			'description' => esc_html__( 'Determines at what screen width the slider should start scaling down in size.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Minimum Height', 'thememountain-plugin' ),
			'param_name' => 'minimum_height',
			'value' => '265',
			'description' => esc_html__( 'Determines the height in px beyond which the slider will not scale.', 'thememountain-plugin' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'tab_id',
			'heading' => esc_html__( 'Slider ID (internal use)', 'thememountain-plugin' ),
			'param_name' => "slider_id",
			'value'=> $slider_id,
		),
		// 'group' => 'Navigation',
		array(
			'group' => 'Navigation',
			'type' => 'checkbox',
			'heading' => esc_html__( 'Advance automatically', 'thememountain-plugin' ),
			'param_name' => 'auto_advance',
			'value' => array( esc_html__( 'Auto advance', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'save_always' => true,
			'description' => esc_html__( 'Determines whether the slider should auto advance from slide to slide i.e. slideshow.', 'thememountain-plugin' ),
		),
		array(
			'group' => 'Navigation',
			'type' => 'textfield',
			'heading' => esc_html__( 'Auto advance interval', 'thememountain-plugin' ),
			'param_name' => 'auto_advance_interval',
			'value' => '5000',
			'dependency' => array('element' => 'auto_advance','value'=>'true'),
			'description' => '',
		),
		array(
			'group' => 'Navigation',
			'type' => 'checkbox',
			'heading' => esc_html__( 'Pause On Hover', 'thememountain-plugin' ),
			'param_name' => 'pause_on_hover',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => 'true',
			'save_always' => true,
			'dependency' => array('element' => 'auto_advance','value'=>'true'),
			'description' => esc_html__( 'Determines whether auto advancing should pause upon hover.', 'thememountain-plugin' ),
		),

		// progress_bar
		array(
			'group' => 'Navigation',
			'type' => 'checkbox',
			'heading' => esc_html__( 'Show Progress Bar', 'thememountain-plugin' ),
			'param_name' => 'progress_bar',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'dependency' => array('element' => 'auto_advance','value'=>'true'),
			'description' => '',
		),
		// nav arrows
		array(
			'group' => 'Navigation',
			'type' => 'checkbox',
			'heading' => esc_html__( 'Navigation Arrows', 'thememountain-plugin' ),
			'param_name' => 'show_nav_arrows',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => 'true',
			'save_always' => true,
			'description' => esc_html__( 'Determines whether the slider should have navigation arrows.', 'thememountain-plugin' ),
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
			'std' => '#000',
			'description' => esc_html__( 'Sets an alternative pagination color of the slider. This is useful when you need a darker or lighter pagination for a particular slide.', 'thememountain-plugin' ),
			),
		// 'group' => 'Animation',
		// transition
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
		// parallax
		array(
			'group' => 'Animation',
			'type' => 'checkbox',
			'heading' => esc_html__( 'Parallax', 'thememountain-plugin' ),
			'param_name' => 'parallax',
			'value' => array( esc_html__( 'Use Parallax', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'dependency' => array(
				'element' => 'slider_type',
				'value'=>array('fullscreen','full_width')
				),
			'save_always' => true,
			'description' => esc_html__( 'Determines whether the slider should parallax upon scrolling. IMPORTANT: Parallax will only function if the slider is the first element in the page content. If parallax sections are required, use the Parallax section.', 'thememountain-plugin' ),
		),
		array(
			'group' => 'Animation',
			'type' => 'checkbox',
			'heading' => esc_html__( 'Parallax Fade on Scroll', 'thememountain-plugin' ),
			'param_name' => 'parallax_fade_on_scroll',
			'value' => array( esc_html__( 'Parallax fadeout', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'dependency' => array('element' => 'parallax','value'=>'true'),
			'description' => '',
		),
	),
	'custom_markup' => TM_Vc::tabs_custom_markup('slider',esc_html__("Slider", 'thememountain-plugin')),
	'default_content' => '[tm_slider_item title="' . esc_html__( 'Slide', 'thememountain-plugin' ) . '" slide_id="' . $slide_id_1 . '"][/tm_slider_item]',
	'js_view' => 'TmAvalancheView'
) );
