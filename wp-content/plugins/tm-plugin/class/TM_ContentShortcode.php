<?php
namespace ThemeMountain {
	/**
	 * ThemeMountain shortcode assistant and ThemeMountain Content Shortcodes.
	 * Adds a function button in the tinymce rich text editor and registers content shortcodes.
	 *
	 * This class is used even if VC is not active.
	 *
	 * @package ThemeMountain
	 * @subpackage Core/tm-plugin
	 * @since 1.0
	 */
	class TM_ContentShortcode {
		/**
		 * Configuration Properties
		 *
		 * @since      1.0
		 * @access     private
		 */
			/**
			 * Cache of plugin_dir_path()
			 *
			 * @var        string 	Set in the constructor.
			 */
			private static $local_plugin_dir;

			/**
			 * Cache of plugins_url()
			 *
			 * @var        string	Set in the constructor.
			 */
			private static $local_plugin_dir_uri;

		/**
		 * Constructor
		 *
		 * @param      array  $_class_settings  The class settings
		 */
		public function __construct( $_class_settings = array () ) {
			self::$local_plugin_dir = $_class_settings['local_plugin_dir'];
			self::$local_plugin_dir_uri = $_class_settings['local_plugin_dir_uri'];
			self::add_content_shortcodes(self::$local_plugin_dir ."tm_content_shortcode/*.php");
			if(is_admin()) {
				add_action('admin_init', array('ThemeMountain\\TM_ContentShortcode','tm_add_mce_button'));
				add_action('admin_enqueue_scripts',array('ThemeMountain\\TM_ContentShortcode','TM_Shortcodes_mce_enqueue'));
			}
		}

		/**
		 * Private methods for initialization
		 *
		 * @since      1.0
		 * @access     private
		 */

		/**
		 * Adds content shortcodes.
		 *
		 * @uses       add_shortcode()
		 *
		 * @param      string $target_dir_path Shortcode path to scan.
		 */
		private static function add_content_shortcodes ($target_dir_path) {
			$_files = glob( $target_dir_path );
			foreach ( $_files as $_file_path ) {
				include($_file_path);
			}
		}

		/**
		 * Public methods for hooks and filters
		 *
		 * @since      1.0
		 * @access     public
		 */

		/**
		 * Adds filters for adding a MCE button in the rich text editor and plugin.
		 *
		 * @since      1.0
		 *
		 * @uses       admin_init action hook
		 */
		public static function tm_add_mce_button() {
			// check user permissions
			if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
				return;
			}
			// check if WYSIWYG is enabled
			if ( 'true' == get_user_option( 'rich_editing' ) ) {
				add_filter( 'mce_buttons',  array('ThemeMountain\\TM_ContentShortcode','tm_register_mce_button') );
				add_filter( 'mce_external_plugins', array('ThemeMountain\\TM_ContentShortcode','tm_add_tinymce_plugin'));
			}
		}

		/**
		 * Registers new button in the editor.
		 *
		 * @since      1.0
		 *
		 * @uses       mce_buttons action hook
		 */
		public static function tm_register_mce_button( $buttons ) {
			array_push( $buttons, 'tm_mce_button' );
			return $buttons;
		}

		/**
		 * Declare script for new button.
		 *
		 * @uses       mce_external_plugins filter hook
		 *
		 * @param      array  $plugin_array  The plugin array
		 *
		 * @return     array  Array value with tm_mce_button added.
		 */
		public static function tm_add_tinymce_plugin( $plugin_array ) {
			$plugin_array['tm_mce_button'] =  self::$local_plugin_dir_uri.'/tm_shortcodes/assets/js/tm-mce-button.js';
			return $plugin_array;
		}

		/**
		 * Enqueues CSS file for the shortcode assistant.
		 *
		 * @since      1.0
		 *
		 * @uses       admin_enqueue_scripts action hook
		 */
		public static function TM_Shortcodes_mce_enqueue() {
			wp_enqueue_style('tm-shortcodes-admin', self::$local_plugin_dir_uri.'/tm_shortcodes/assets/css/tm-mce-style.css');
		}

		/**
		 * Add rich editor to Excerpt meta box
		 * Replaces the meta boxes.
		 * @return void
		 */
		public static function richtext_excerpt_switch_boxes()
		{
			if (!post_type_supports($GLOBALS['post']->post_type, 'excerpt')) {
				return;
			}

			remove_meta_box('postexcerpt', '', 'normal');

			add_meta_box(
				'postexcerpt2',
				TM_ThemeStrings::$text_strings['TM_CustomFunctions']['excerpt'],
				array('ThemeMountain\\TM_CustomFunctions', 'richtext_excerpt_show'),
				null, 'normal', 'core'
			);
		}
	}
}