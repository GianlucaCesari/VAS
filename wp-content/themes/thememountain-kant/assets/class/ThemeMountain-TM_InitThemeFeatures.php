<?php
namespace ThemeMountain {
	/**
	 * Initialize Wordpress Theme Support
	 *
	 * @package ThemeMountain
	 * @subpackage Core/marquez-by-thememountain
	 * @since 1.0
	 */
	class TM_InitThemeFeatures extends TM_ThemeMountain {
		/**
		 * Class Constructor Magic Method.
		 *
		 * @since 1.0
		 * @access public
		 */
		public function __construct() {
			/**
			 * Required by Theme-Check plugin
			 */
			if ( ! isset( $content_width ) ) $content_width = 900;

			/**
			 * Required by ThemeForest (rev. Phase one September 9th, 2013)
			 * Reference : http://support.envato.com/index.php?/Knowledgebase/Article/View/472/85/wordpress-theme-submission-requirements
			 */

			/** Adds theme support as well as localization support  */
			add_action( 'after_setup_theme', ['ThemeMountain\\TM_InitThemeFeatures','tm_after_setup_theme'] );
			/** Registers  widgets */
			add_action( 'widgets_init', ['ThemeMountain\\TM_InitThemeFeatures','tm_widgets_init'] );
		}

		/**
		 * Public functions for Action hooks
		 */

		/**
		 * Registers widget area and custom widgets
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       widgets_init action hook
		 * @uses       register_sidebar()
		 */
		public static function tm_widgets_init() {
			/**
			 * register widget areas
			 */
			register_sidebar( array(
				'name'          => 'Footer 1',
				'id'            => 'footer_1',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4>',
				'after_title'   => '</h4>',
				) );

			register_sidebar( array(
				'name'          => 'Footer 2',
				'id'            => 'footer_2',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4>',
				'after_title'   => '</h4>',
				) );

			register_sidebar( array(
				'name'          => 'Footer 3',
				'id'            => 'footer_3',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4>',
				'after_title'   => '</h4>',
				) );

			register_sidebar( array(
				'name'          => 'Footer 4',
				'id'            => 'footer_4',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4>',
				'after_title'   => '</h4>',
				) );

			register_sidebar( array(
				'name'          => 'Footer 5',
				'id'            => 'footer_5',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4>',
				'after_title'   => '</h4>',
				) );

			register_sidebar(array(
				'name'=> 'Blog Sidebar',
				'id' => 'blog_sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
				));

			register_sidebar(array(
				'name'=> 'Page Sidebar',
				'id' => 'page_sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
				));
		}

		/**
		 * Registers theme support and load theme text domain.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       after_setup_theme action hook Generally used to initialize theme settings/options. This is the first action hook available to themes, triggered immediately after the active theme's functions.php file is loaded. add_theme_support() should be called here, since the init action hook is too late to add some features. At this stage, the current user is not yet authenticated.
		 * @uses       add_theme_support()
		 * @uses       load_theme_textdomain()
		 */
		public static function tm_after_setup_theme () {
			// reference http://codex.wordpress.org/Custom_Headers
			$defaults = array(
				'default-image'          => '',
				'random-default'         => false,
				'width'                  => 0,
				'height'                 => 0,
				'flex-height'            => false,
				'flex-width'             => false,
				'default-text-color'     => '',
				'header-text'            => true,
				'uploads'                => true,
				'wp-head-callback'       => '',
				'admin-head-callback'    => '',
				'admin-preview-callback' => '',
			);
			add_theme_support('custom-header', $defaults );

			// reference: http://codex.wordpress.org/Custom_Backgrounds
			$defaults = array(
				'default-color'          => '',
				'default-image'          => '',
				'default-repeat'         => '',
				'default-position-x'     => '',
				'wp-head-callback'       => '_custom_background_cb',
				'admin-head-callback'    => '',
				'admin-preview-callback' => ''
			);
			add_theme_support('custom-background', $defaults );

			add_theme_support('post-thumbnails' );

			// required since WP ver. 4.1
			add_theme_support('title-tag' );

			// http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
			add_theme_support('automatic-feed-links');

			/**
			 * Adds custom-logo
			 * @since Wordpress 4.5
			 */
			add_theme_support( 'custom-logo' );

			/** Localization. */
			load_theme_textdomain( parent::$theme_id, FALSE, get_template_directory() . '/inc/languages/' );
		}
	}
}