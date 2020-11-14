<?php
/**
 * Name: CMB2_TM_Textarea_Background
 */

class CMB2_TM_Textarea_Background {
	const VERSION = '0.2.0';
	public function __construct() {
		// if(is_customize_preview()) return; // to avoid conflict with Kirki color-alpha control
		self::hooks();
	}
	public static function hooks() {
		add_action( 'admin_enqueue_scripts', ['CMB2_TM_Textarea_Background', 'setup_admin_scripts'] );
	}

	public static function setup_admin_scripts() {
		wp_enqueue_script( 'cmb2-textarea_background', get_template_directory_uri(). '/assets/js/cmb2-textarea_background.js', array( 'jquery' ), self::VERSION, true );
	}
}
