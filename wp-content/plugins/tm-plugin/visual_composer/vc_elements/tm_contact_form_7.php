<?php
/**
	ThemeMountain tm_contact_form_7
*/

/**
 * Add Shortcode To Visual Composer
 */

function _return_cf7_form_list () {
	$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
	$contact_forms = array();
	if ( $cf7 ) {
		foreach ( $cf7 as $cform ) {
			$contact_forms[ $cform->post_title ] = $cform->ID;
		}
	} else {
		$contact_forms[ esc_html__( 'No contact forms found', 'js_composer' ) ] = 0;
	}
	return $contact_forms;
}

vc_map( array(
	'name' => esc_html__( 'Contact Form 7', 'thememountain-plugin' ),
	'category' => esc_html__( 'ThemeMountain', 'thememountain-plugin' ),
	'base' => 'tm_contact_form_7',
	'icon' => 'icon-wpb-contactform7',
	'is_container' => false,
	'description' => '',
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Select contact form', 'thememountain-plugin' ),
			'param_name' => 'id',
			'value' => _return_cf7_form_list(),
			'save_always' => true,
			'description' => esc_html__( 'Choose previously created contact form from the drop down list.', 'thememountain-plugin' ),
			),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Search title', 'thememountain-plugin' ),
			'param_name' => 'title',
			'admin_label' => true,
			'description' => esc_html__( 'Enter optional title to search if no ID selected or cannot find by ID.', 'thememountain-plugin' ),
			),
	)
) );

class WPBakeryShortCode_tm_contact_form_7 extends WPBakeryShortCode {}