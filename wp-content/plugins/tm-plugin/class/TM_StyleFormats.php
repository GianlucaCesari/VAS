<?php
namespace ThemeMountain {
	/**
	 * 	Adds custom style formats to the tinymce style dropdown menu.
	 *
	 * @package ThemeMountain
	 * @subpackage theme-plugin
	 * @since 1.0
	 */
	class TM_StyleFormats {
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
			 * tinymce. adds the text style formatting dropdown menu
			 */
			if(is_admin()) {
				add_action('admin_init', array('ThemeMountain\\TM_StyleFormats','tm_add_mce_style_formats_init'));
			}

		}

		/**
		 * Tinymce custom
		 */

		/**
		 * Adds the text style formatting dropdown menu
		 *
		 * @since      1.0
		 * @access     public
		 *
		 * @uses       admin_init action hook
		 */
		public static function tm_add_mce_style_formats_init() {
			if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
				return;
			}
			// check if WYSIWYG is enabled
			if ( 'true' == get_user_option( 'rich_editing' ) ) {
				add_filter('tiny_mce_before_init',array('ThemeMountain\\TM_StyleFormats','tm_mce_before_init_insert_formats'));
				add_filter('mce_buttons_2', array('ThemeMountain\\TM_StyleFormats','tm_add_mce_button_styleselect'));
				// add_editor_style is declared in TM_StyleAndScripts class of the theme.
			}
		}
		/**
		 * adds format button
		 */
		public static function tm_add_mce_button_styleselect ($buttons) {
			array_unshift($buttons, 'styleselect');
			return $buttons;
		}
		/**
		 * Callback function to filter the MCE settings
		 *
		 * @uses       tiny_mce_before_init hook
		 * @see        https://codex.wordpress.org/TinyMCE_Custom_Styles
		 *
		 * @param      array 	$init_array
		 * @return     array 	$init_array
		 */
		public static function tm_mce_before_init_insert_formats( $init_array ) {
			// Define the style_formats array
			$style_formats = array();

			// ThemeMountain Fonts
			$_thememountain_fonts = array(
				'title' => 'ThemeMountain Fonts',
				'items' => array(
					array(
						'title' => 'Alternative font 1',
						'inline' => 'span',
						'classes'  => 'font-alt-1'
					),
					array(
						'title' => 'Alternative font 2',
						'inline' => 'span',
						'classes'  => 'font-alt-2'
					),
					array(
						'title' => 'Alternative font 3',
						'inline' => 'span',
						'classes'  => 'font-alt-3'
					),
				)
			);

			// ThemeMountain Text Format classes
			$_thememountain = array(
				'title' => 'ThemeMountain Text Classes',
				'items' => array(
					array(
						'title' => 'Lead',
						'block' => 'p',
						'attributes' => array('class' => 'lead'),
						'wrapper' => false,
						// 'exact' => true,
						),
					array(
						'title' => 'Text Small',
						'block' => 'p',
						'attributes' => array('class' => 'text-small'),
						'wrapper' => false,
						// 'exact' => TRUE,
						),
					array(
						'title' => 'Text Medium',
						'block' => 'p',
						'attributes' => array('class' => 'text-medium'),
						'wrapper' => false,
						// 'exact' => TRUE,
						),
					array(
						'title' => 'Text Large',
						'block' => 'p',
						'attributes' => array('class' => 'text-large'),
						'wrapper' => false,
						// 'exact' => TRUE,
						),
					array(
						'title' => 'Text Extra Large',
						'block' => 'p',
						'attributes' => array('class' => 'text-xlarge'),
						'wrapper' => false,
						// 'exact' => TRUE,
						),
					array(
						'title' => 'Title Small',
						'block' => 'p',
						'attributes' => array('class' => 'title-small'),
						'wrapper' => false,
						// 'exact' => TRUE,
						),
					array(
						'title' => 'Title Medium',
						'block' => 'p',
						'attributes' => array('class' => 'title-medium'),
						'wrapper' => false,
						// 'exact' => TRUE,
						),
					array(
						'title' => 'Title Large',
						'block' => 'p',
						'attributes' => array('class' => 'title-large'),
						'wrapper' => false,
						// 'exact' => TRUE,
						),
					array(
						'title' => 'Title Extra Large',
						'block' => 'p',
						'attributes' => array('class' => 'title-xlarge'),
						'wrapper' => false,
						// 'exact' => TRUE,
						),
				)
			);

			$_notches = array(0,5,10,20,30,40,50,60,70,80,90,100,110,120,130,140,150);

			// mb
			$_mb = array('title' => 'Margin Bottom','items' => array());
			foreach($_notches as $_value ){
				array_push($_mb['items'], array(
					'title' => 'Margin-Bottom '.$_value,
					'block' => 'p',
					'attributes' => array('class' => 'mb-'.$_value),
					// 'exact' => TRUE,
					'wrapper' => false,
					));
			}

			// mb-mobile
			$_mb_mobile = array('title' => 'Margin Bottom (mobile)','items' => array());
			foreach($_notches as $_value ){
				array_push($_mb_mobile['items'], array(
					'title' => 'Margin-Bottom '.$_value,
					'block' => 'p',
					'attributes' => array('class' => 'mb-mobile-'.$_value),
					// 'exact' => TRUE,
					'wrapper' => false,
					));
			}

			array_push($style_formats, $_mb);
			array_push($style_formats, $_mb_mobile);
			array_push($style_formats, $_thememountain_fonts);
			array_push($style_formats, $_thememountain);

			// Insert the array, JSON ENCODED, into 'style_formats'
			$init_array['style_formats'] = json_encode( $style_formats );
			$init_array['style_formats_merge'] = true;
			return $init_array;
		}

		/**
		 * END
		 */
	}
}