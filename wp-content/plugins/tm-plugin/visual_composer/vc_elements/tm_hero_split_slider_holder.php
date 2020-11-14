<?php
use ThemeMountain\TM_Vc as TM_Vc;
/**
 * tm_hero_split_slider_holder
 *
 * @since      1.1
 */

/** random id */
$slider_id = 'tabs-' . time() . '-' . rand( 0, 100 );
$tab_id_1 = 'tab-' . time() . '-1-' . rand( 0, 100 );

/**
 * VC mapping
 */
vc_map( array(
	'name' => esc_html__( 'Split Hero Slider', 'thememountain-plugin' ),
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'base' => 'tm_hero_split_slider_holder',
	'icon' => 'tm_vc_icon_hero-5-slider_image',
	'class' => 'tm_element_tab_holder',
	'is_container' => true,
	"as_parent" => array('only' => 'tm_hero_split_slider_item'),
	'show_settings_on_create' => true,
	'description' => esc_html__( 'Sliding images only', 'thememountain-plugin' ) ,
	'params' => array(
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
			'type' => 'dropdown',
			'heading' => esc_html__( 'Content Media Width', 'thememountain-plugin' ),
			'param_name' => 'content_media_width',
			'value' => array(
				esc_html__( 'Split 50/50', 'thememountain-plugin' ) => 'split_50_50',
				esc_html__( 'Split 60/40', 'thememountain-plugin' ) => 'split_60_40',
				esc_html__( 'Split 75/25', 'thememountain-plugin' ) => 'split_75_25'
			),
			'std' => 'split_50_50',
			'save_always' => true,
			'description' =>'',
		),
		// extra id / class
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'ID', 'thememountain-plugin' ),
			'param_name' => 'el_id',
			'value' => '',
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra Class Name', 'thememountain-plugin' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style this component differently, then use the extra class name field to add one or several class names and then refer to it in your css file.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'tab_id',
			'heading' => esc_html__( 'Hero Slider ID', 'thememountain-plugin' ),
			'param_name' => "tabs_id",
			'value'=> $slider_id,
			),
		/** Navigation */
		array(
			'group' => esc_html__( 'Navigation', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Auto Advance', 'thememountain-plugin' ),
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
		array(
			'group' => esc_html__( 'Navigation', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Show Progress Bar', 'thememountain-plugin' ),
			'param_name' => 'progress_bar',
			'save_always' => true,
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => 'true',
			'dependency' => array('element'=>'auto_advance','value'=>'true'),
			'description' => ''
			),
		array(
			'group' => esc_html__( 'Navigation', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Show Nav Arrows', 'thememountain-plugin' ),
			'param_name' => 'show_nav_arrows',
			'save_always' => true,
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => 'true',
			'description' => esc_html__( 'Determines whether the slider should have navigation arrows.', 'thememountain-plugin' )
			),
		array(
			'group' => esc_html__( 'Navigation', 'thememountain-plugin' ),
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use Pagination', 'thememountain-plugin' ),
			'param_name' => 'use_pagination',
			'save_always' => true,
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => 'true',
			'description' => esc_html__( 'Determines whether the slider should have pagination bullets.', 'thememountain-plugin' )
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
		/** Design Options */
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Media Alignment', 'thememountain-plugin' ),
			'param_name' => 'media_alignment',
			'value' => array(
				esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
				esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
			),
			'std' => 'left',
			'save_always' => true,
			'description' => esc_html__( 'Determines whether the hero media column should be left or right aligned.', 'thememountain-plugin' ),
			),
			array(
				'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
				'type' => 'dropdown',
				'heading' => esc_html__( 'Content Alignment', 'thememountain-plugin' ),
				'param_name' => 'content_alignment',
				'value' => array(
					esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
					esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
					),
				'std' => 'left',
				'save_always' => true,
				'description' => esc_html__( 'Determines whether the hero content column should be left or right aligned.', 'thememountain-plugin' ),
				),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Pagination Color 1', 'thememountain-plugin' ),
			'param_name' => 'pagination_color_1',
			'std' => '#FFF',
			'description' => esc_html__( 'Sets the default pagination color of the slider.', 'thememountain-plugin' )
			),
		array(
			'group' => esc_html__( 'Design Options', 'thememountain-plugin' ),
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Pagination Color 2', 'thememountain-plugin' ),
			'param_name' => 'pagination_color_2',
			'std' => '#000',
			'description' => esc_html__( 'Sets an alternative pagination color of the slider. This is useful when you need a darker or lighter pagination for a particular slide.', 'thememountain-plugin' )
			),
		/** Animation */
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Slider Transition Easing', 'thememountain-plugin' ),
			'param_name' => 'transition_easing',
			'value' => TM_Vc::$vc_elements_variable['easing'],
			'std' => 'linear',
			'save_always' => true,
			'description' => esc_html__( 'Determines the easing type of the slider transitions.', 'thememountain-plugin' ),
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Slider Transition Speed', 'thememountain-plugin' ),
			'param_name' => 'transition_speed',
			'value' => '700'
			),
	),
	'custom_markup' => TM_Vc::tabs_custom_markup('hero-5-slider_image',esc_html__( 'Hero Split Slider', 'thememountain-plugin' )),
	'default_content' => '[tm_hero_split_slider_item title="' . esc_html__( 'Slide', 'thememountain-plugin' ) . '" tab_id="' . $tab_id_1 . '"][/tm_hero_split_slider_item]',
	'js_view' => 'TmTabsView'
) );

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-tabs.php' );

class WPBakeryShortCode_tm_hero_split_slider_holder extends WPBakeryShortCode_tm_tab_holder {
	protected $predefined_atts = array(
		'tab_id' => TM_NEW_TITLE,
		'title' => ''
		);

	protected function getFileName() {
		return 'tm_hero_split_slider_holder';
	}

	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_hero_split_slider_item title="Slide" tab_id=""][/tm_hero_split_slider_item]' ) . '</div>';
	}
}