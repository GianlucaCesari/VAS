<?php
namespace ThemeMountain {
	/**
	 * 	Loads widget
	 *
	 * @package ThemeMountain
	 * @subpackage theme-plugin
	 * @since 1.0
	 */
	class TM_Widgets {
		/**
		 * variables for plugin
		*/
		public static $local_plugin_dir;
		public static $local_plugin_dir_uri;

		/**
		 * Constructor
		 */
		public function __construct( $_class_settings = array () ) {
			self::$local_plugin_dir = $_class_settings['local_plugin_dir'];
			self::$local_plugin_dir_uri = $_class_settings['local_plugin_dir_uri'];

			/**
			 * Widget loading
			 */
			add_action( 'widgets_init', array('ThemeMountain\\TM_Widgets','tm_load_widgets'));

			/** Enable shortcodes in the widget text area */
			add_filter('widget_text','do_shortcode');

		}

		/**
		 * LOAD WIDGETs
		 */
		public static function tm_load_widgets () {
			/**
			 * registering widgets
			 * add action @ widgets_init
			 */
			self::require_once_in_dir( self::$local_plugin_dir . 'widgets/*.php');
		}

		/**
			plugin utils
		*/
		private static function require_once_in_dir ( $_target_dir_path ) {
			// scan through the shortcodes in the parent theme
			foreach (glob( $_target_dir_path ) as $_file_path) {
				require_once( $_file_path );
			}
		}
	}
}