<?php
/**
 * Name: CMB2 RGBa Colorpicker
 * URI:  https://github.com/JayWood/CMB2_RGBa_Picker
 * Description: Adds a RGBa Colorpicker to the CMB2 field types, original JS from 23r9i0 on github.
 * Version:     0.2.0
 * Author:      Jay Wood
 * Author URI:  http://plugish.com
 * Donate link: http://plugish.com
 * License:     GPLv2+
 * Text Domain: jw-cmb2-slider
 */

/**
 * Copyright (c) 2015 Jay Wood (email : jay@plugish.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

class CMB2_JW_Fancy_Color {
	const VERSION = '0.2.0';
	public function __construct() {
		// if(is_customize_preview()) return; // to avoid conflict with Kirki color-alpha control
		self::hooks();
	}
	public static function hooks() {
		add_action( 'cmb2_render_rgba_colorpicker', ['CMB2_JW_Fancy_Color', 'render_color_picker'], 10, 5 );
		add_action( 'admin_enqueue_scripts', ['CMB2_JW_Fancy_Color', 'setup_admin_scripts'] );
	}

	public static function render_color_picker( $field, $field_escaped_value, $field_object_id, $field_object_type, $field_type_object ) {
		/** The object below can not and does not have to be sanirized. */
		echo ($field_type_object->input( array(
			'class'              => 'cmb2-colorpicker color-picker',
			'data-default-color' => $field->args( 'default' ),
			'data-alpha'         => 'true',
		) ) );
	}

	public static function setup_admin_scripts() {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'jw-cmb2-rgba-picker-js', get_template_directory_uri(). '/assets/js/jw-cmb2-rgba-picker.js', array( 'wp-color-picker' ), self::VERSION, true );
	}
}