<?php
vc_map( array(
	'name' => esc_html__( 'Timeline Item', 'thememountain-plugin' ),
	'base' => 'tm_timeline_item',
	'allowed_container_element' => 'tm_timeline_holder',
	'is_container' => true,
	'content_element' => false,
	'description' => '',
	'params' => array(
		/** Please update VC timeline element #963 */
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Is this a new timeline section', 'thememountain-plugin' ),
			'param_name' => 'is_new_timeline_section',
			'value' => array( esc_html__( 'Yes', 'thememountain-plugin' ) => 'true' ),
			'std' => '',
			'description'=> esc_html__( 'Description', 'thememountain-plugin' ),
			),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Entry Alignment', 'thememountain-plugin' ),
			'param_name' => 'entry_alignment',
			'value' => array(
				esc_html__( 'Left', 'thememountain-plugin' ) => 'left',
				esc_html__( 'Right', 'thememountain-plugin' ) => 'right',
				),
			'std' => 'left',
			'description' => esc_html__( 'If using a centered timline, this option determines whether the timeline content will appear to left or right of the timeline.', 'thememountain-plugin' )
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Date', 'thememountain-plugin' ),
			'param_name' => 'title',
			'description' => esc_html__( 'Enter a menu item title.', 'thememountain-plugin' )
		),
		array(
			'type' => 'textarea_html',
			'heading' => esc_html__( 'Description', 'thememountain-plugin' ),
			'param_name' => 'content',
			'admin_label' => true,
			'dependency' => array('element' => 'is_hero_content','value'=>'true'),
			'description'=> esc_html__( 'Enter a timeline item description.', 'thememountain-plugin' ),
			),
		ThemeMountain\TM_Vc::get_rich_text_editor_background_color_vc_field('',array('element' => 'is_hero_content','value'=>'true')),
		// Spacing
		array(
			'group' => esc_html__( 'Spacing', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Padding Bottom', 'thememountain-plugin' ),
			'param_name' => 'padding_bottom',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['spacing_notches'],
			'std' => '30',
			'description' => esc_html__( 'Sets the bottom padding of a section block. Default is set to 30px. Possible values range from 0-150px.', 'thememountain-plugin' ),
		),
		// ANIMATION for date
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Date Animation Type', 'thememountain-plugin' ),
			'param_name' => 'date_animation',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['animation'],
			'std' => '',
			'description'=> esc_html__( 'Determines the type of animation that will be applied to the column.', 'thememountain-plugin' ),
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Date Animation Duration', 'thememountain-plugin' ),
			'param_name' => 'date_animation_duration',
			'value' => '1000',
			'dependency' => array('element' => 'date_animation','not_empty' => TRUE ),
			'description'=> esc_html__( 'How long the animation should be. Expressed in milliseconds i.e. 1000 represents 1 second.', 'thememountain-plugin' ),
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Date Animation Delay', 'thememountain-plugin' ),
			'param_name' => 'date_animation_delay',
			'value' => '0',
			'dependency' => array('element' => 'date_animation','not_empty' => TRUE ),
			'description'=> esc_html__( 'How long before the animation should begin upon entering the viewport. Expressed in milliseconds i.e. 100 represents 0.1 second.', 'thememountain-plugin' ),
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Date Animation Threshold', 'thememountain-plugin' ),
			'param_name' => 'date_animation_threshold',
			'value' => '0.5',
			'dependency' => array('element' => 'date_animation','not_empty' => TRUE ),
			'description' => esc_html__( 'Represents what percentage of the element should be visible in the viewport before animation begins. Expressed as a decimal i.e. i.e. 0.5 represents 50%.', 'thememountain-plugin' ),
			),
		// ANIMATION for description
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'dropdown',
			'heading' => esc_html__( 'Description Animation Type', 'thememountain-plugin' ),
			'param_name' => 'description_animation',
			'value' => ThemeMountain\TM_Vc::$vc_elements_variable['animation'],
			'std' => '',
			'description'=> esc_html__( 'Determines the type of animation that will be applied to the column.', 'thememountain-plugin' ),
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Description Animation Duration', 'thememountain-plugin' ),
			'param_name' => 'description_animation_duration',
			'value' => '1000',
			'dependency' => array('element' => 'description_animation','not_empty' => TRUE ),
			'description'=> esc_html__( 'How long the animation should be. Expressed in milliseconds i.e. 1000 represents 1 second.', 'thememountain-plugin' ),
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Description Animation Delay', 'thememountain-plugin' ),
			'param_name' => 'description_animation_delay',
			'value' => '0',
			'dependency' => array('element' => 'description_animation','not_empty' => TRUE ),
			'description'=> esc_html__( 'How long before the animation should begin upon entering the viewport. Expressed in milliseconds i.e. 100 represents 0.1 second.', 'thememountain-plugin' ),
			),
		array(
			'group' => esc_html__( 'Animation', 'thememountain-plugin' ),
			'type' => 'textfield',
			'heading' => esc_html__( 'Description Animation Threshold', 'thememountain-plugin' ),
			'param_name' => 'description_animation_threshold',
			'value' => '0.5',
			'dependency' => array('element' => 'description_animation','not_empty' => TRUE ),
			'description' => esc_html__( 'Represents what percentage of the element should be visible in the viewport before animation begins. Expressed as a decimal i.e. i.e. 0.5 represents 50%.', 'thememountain-plugin' ),
			),
	),
	'js_view' => 'TmTabView'
) );

class WPBakeryShortCode_tm_timeline_item extends WPBakeryShortCode_tm_tab_item {

}