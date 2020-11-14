<?php
/**
 * ThemeMountain namespace reserved for ThemeMountain Wordpress themes
 * If you do not know what namespace is, please read http://php.net/manual/en/language.namespaces.php
 */
namespace ThemeMountain {
	/**
	 * Creates custom post types used for ThemeMountain Themes
	 *
	 * @package ThemeMountain
	 * @subpackage Core
	 * @since 1.0
	 */
	class TM_CustomPostTypes {
		/**
		 * Class Constructor Magic Method.
		 *
		 * Cache theme version, execute class setup method and add filter for option fields in the admin panel.
		 *
		 * @since 1.0
		 * @access public
		 * @uses Wordpress code wp_get_theme(), TM_ThemeServices::$theme_version, 'tm_admin_option_option_fields' filter hook of TM_Admin::option_fields() in tm-plugin.
		 */
		public function __construct() {
			/**
			 * custom post type
			 */
			add_action( 'init',array('ThemeMountain\\TM_CustomPostTypes','tm_create_tm_folio'));
			add_action( 'init',array('ThemeMountain\\TM_CustomPostTypes','tm_create_tm_preheader'));
			add_action( 'init',array('ThemeMountain\\TM_CustomPostTypes','tm_create_tm_footer'));
			add_action( 'init',array('ThemeMountain\\TM_CustomPostTypes','tm_create_tm_modal'));
			add_action( 'init',array('ThemeMountain\\TM_CustomPostTypes','tm_create_tm_error_page'));

			/**
			 * Custom Taxonomy
			 */
			add_action( 'init',array('ThemeMountain\\TM_CustomPostTypes','create_taxonomy_for_tm_folio'));
		}

		/**
		 * Public Methods for hooks
		 */

		/**
		 * Custom Post Type
		 */

		/**
		 * Create tm_folio custom post type
		 */
		public static function tm_create_tm_folio() {
			/**
			 * note: this option is confifured with admin panel using CMB2
			 * however the plugin function cmb2_get_option to get option is not
			 * probably available at the moment execution.
			 * Loading the option manually.
			 */
			$_slug = get_option('tm_folio_settings');
			if(is_array($_slug) && array_key_exists('tm_folio_slug', $_slug)) {
				$_slug = $_slug['tm_folio_slug'];
			} else {
				$_slug = 'portfolio';
			}

			$_labels = array(
				'name'               => _x( 'Folio items', 'post type general name' , 'thememountain-plugin'),
				'singular_name'      => _x( 'Folio item', 'post type singular name', 'thememountain-plugin' ),
				'add_new'            => _x( 'Add New', 'folio' , 'thememountain-plugin'),
				'add_new_item'       => esc_html__( 'Add New Folio' , 'thememountain-plugin'),
				'edit_item'          => esc_html__( 'Edit Folio' , 'thememountain-plugin'),
				'new_item'           => esc_html__( 'New Folio' , 'thememountain-plugin'),
				'all_items'          => esc_html__( 'All Folio' , 'thememountain-plugin'),
				'view_item'          => esc_html__( 'View Folio' , 'thememountain-plugin'),
				'search_items'       => esc_html__( 'Search Folio' , 'thememountain-plugin'),
				'not_found'          => esc_html__( 'No Folio found' , 'thememountain-plugin'),
				'not_found_in_trash' => esc_html__( 'No Folio found in the Trash' , 'thememountain-plugin'),
				'parent_item_colon'  => '',
				'menu_name'          => esc_html__( 'TM Folio' , 'thememountain-plugin' )
				);
			/**
			 * rewrite slug will be able to be changed via admin panel
			 */

			//exit;
			$_args = array(
				'labels'        => $_labels,
				'description'   => esc_html__('For portfolio pages', 'thememountain-plugin'),
				'public'        => true,
				'menu_position' => 5,
				'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
				'has_archive'   => true,
				'hierarchical' => true,
				'show_in_nav_menus' => true,
				'capability_type' => 'post',
				'rewrite' => array(
					'slug' => $_slug,
					'with_front' => false
					)
				);
			register_post_type( 'tm_folio', $_args );
			/**
			 * Categories and tags
			 */
			register_taxonomy_for_object_type('post_tag', 'tm_folio');
			// register_taxonomy_for_object_type('category', 'tm_folio');
			/**
			 * This is necessary for the custom post type to show pages instead of 404 not found
			 */
			flush_rewrite_rules();
		}

		/**
		 * Creates a taxonomy for tm folio.
		 *
		 * @since      1.0.6
		 */
		public static function create_taxonomy_for_tm_folio () {
			$_slug = get_option('tm_folio_settings');
			if(is_array($_slug) && array_key_exists('tm_folio_category_slug', $_slug)) {
				$_slug = $_slug['tm_folio_category_slug'];
			} else {
				$_slug = 'tm_folio_category';
			}

			$_labels = array(
				'name' => _x( 'Folio Categories', 'taxonomy general name', 'thememountain-plugin' ),
				'singular_name' => _x( 'Folio Category', 'taxonomy singular name', 'thememountain-plugin' ),
				'search_items' =>  __( 'Search Folio Categories', 'thememountain-plugin' ),
				'all_items' => __( 'All Folio Categories', 'thememountain-plugin' ),
				'parent_item' => __( 'Parent Folio Category', 'thememountain-plugin' ),
				'parent_item_colon' => __( 'Parent Folio Category:', 'thememountain-plugin' ),
				'edit_item' => __( 'Edit Folio Category', 'thememountain-plugin' ),
				'update_item' => __( 'Update Folio Category', 'thememountain-plugin' ),
				'add_new_item' => __( 'Add New Folio Category', 'thememountain-plugin' ),
				'new_item_name' => __( 'New Folio Category Name', 'thememountain-plugin' ),
				'menu_name' => __( 'Folio Categories', 'thememountain-plugin' ),
				);

			register_taxonomy('tm_folio_category',array('tm_folio'), array(
				'hierarchical' => true,
				'labels' => $_labels,
				'show_ui' => true,
				'show_admin_column' => true,
				'has_archive'   => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => $_slug , 'with_front' => false),
				));
		}

		/**
		 * Create tm_preheader custom post type
		 */
		public static function tm_create_tm_preheader() {
			/**
			 * note: this option is confifured with admin panel using CMB2
			 * however the plugin function cmb2_get_option to get option is not
			 * probably available at the moment execution.
			 * Loading the option manually.
			 */
			$_slug = get_option('tm_preheader_settings');
			if(is_array($_slug) && array_key_exists('tm_preheader_slug', $_slug)) {
				$_slug = $_slug['tm_preheader_slug'];
			} else {
				$_slug = 'preheader';
			}

			$_labels = array(
				'name'               => _x( 'Preheader items', 'post type general name' , 'thememountain-plugin'),
				'singular_name'      => _x( 'Preheader item', 'post type singular name', 'thememountain-plugin' ),
				'add_new'            => _x( 'Add New', 'preheader' , 'thememountain-plugin'),
				'add_new_item'       => esc_html__( 'Add New Preheader' , 'thememountain-plugin'),
				'edit_item'          => esc_html__( 'Edit Preheader' , 'thememountain-plugin'),
				'new_item'           => esc_html__( 'New Preheader' , 'thememountain-plugin'),
				'all_items'          => esc_html__( 'All Preheader' , 'thememountain-plugin'),
				'view_item'          => esc_html__( 'View Preheader' , 'thememountain-plugin'),
				'search_items'       => esc_html__( 'Search Preheader' , 'thememountain-plugin'),
				'not_found'          => esc_html__( 'No Preheader found' , 'thememountain-plugin'),
				'not_found_in_trash' => esc_html__( 'No Preheader found in the Trash' , 'thememountain-plugin'),
				'parent_item_colon'  => '',
				'menu_name'          => esc_html__( 'TM Preheader' , 'thememountain-plugin' )
				);
			/**
			 * rewrite slug will be able to be changed via admin panel
			 */

			//exit;
			$_args = array(
				'labels'        => $_labels,
				'description'   => esc_html__('Preheader', 'thememountain-plugin'),
				'public'        => true,
				'menu_position' => 5,
				'supports'      => array( 'title', 'editor' ),
				'has_archive'   => false,
				'hierarchical' => false,
				'show_in_nav_menus' => false,
				'capability_type' => 'post',
				'rewrite' => array(
					'slug' => $_slug,
					)
				);
			register_post_type( 'tm_preheader', $_args );

			/**
			 * This is necessary for the custom post type to show pages instead of 404 not found
			 */
			flush_rewrite_rules();
		}

		/**
		 * Create tm_footer custom post type
		 */
		public static function tm_create_tm_footer() {
			/**
			 * note: this option is confifured with admin panel using CMB2
			 * however the plugin function cmb2_get_option to get option is not
			 * probably available at the moment execution.
			 * Loading the option manually.
			 */
			$_slug = get_option('tm_footer_settings');
			if(is_array($_slug) && array_key_exists('tm_footer_slug', $_slug)) {
				$_slug = $_slug['tm_footer_slug'];
			} else {
				$_slug = 'footer';
			}

			$_labels = array(
				'name'               => _x( 'Footer items', 'post type general name' , 'thememountain-plugin'),
				'singular_name'      => _x( 'Footer item', 'post type singular name', 'thememountain-plugin' ),
				'add_new'            => _x( 'Add New', 'footer' , 'thememountain-plugin'),
				'add_new_item'       => esc_html__( 'Add New Footer' , 'thememountain-plugin'),
				'edit_item'          => esc_html__( 'Edit Footer' , 'thememountain-plugin'),
				'new_item'           => esc_html__( 'New Footer' , 'thememountain-plugin'),
				'all_items'          => esc_html__( 'All Footer' , 'thememountain-plugin'),
				'view_item'          => esc_html__( 'View Footer' , 'thememountain-plugin'),
				'search_items'       => esc_html__( 'Search Footer' , 'thememountain-plugin'),
				'not_found'          => esc_html__( 'No Footer found' , 'thememountain-plugin'),
				'not_found_in_trash' => esc_html__( 'No Footer found in the Trash' , 'thememountain-plugin'),
				'parent_item_colon'  => '',
				'menu_name'          => esc_html__( 'TM Footer' , 'thememountain-plugin' )
				);
			/**
			 * rewrite slug will be able to be changed via admin panel
			 */

			//exit;
			$_args = array(
				'labels'        => $_labels,
				'description'   => esc_html__('Page Footers', 'thememountain-plugin'),
				'public'        => true,
				'menu_position' => 5,
				'supports'      => array( 'title', 'editor' ),
				'has_archive'   => false,
				'hierarchical' => false,
				'show_in_nav_menus' => false,
				'capability_type' => 'post',
				'rewrite' => array(
					'slug' => $_slug,
					)
				);
			register_post_type( 'tm_footer', $_args );

			/**
			 * This is necessary for the custom post type to show pages instead of 404 not found
			 */
			flush_rewrite_rules();
		}

		/**
		 * Create tm_modal custom post type
		 */
		public static function tm_create_tm_modal() {
			/**
			 * note: this option is confifured with admin panel using CMB2
			 * however the plugin function cmb2_get_option to get option is not
			 * probably available at the moment execution.
			 * Loading the option manually.
			 */
			$_slug = get_option('tm_modal_settings');
			if(is_array($_slug) && array_key_exists('tm_modal_slug', $_slug)) {
				$_slug = $_slug['tm_modal_slug'];
			} else {
				$_slug = 'modal';
			}

			$_labels = array(
				'name'               => _x( 'Modal items', 'post type general name' , 'thememountain-plugin'),
				'singular_name'      => _x( 'Modal item', 'post type singular name', 'thememountain-plugin' ),
				'add_new'            => _x( 'Add New', 'modal' , 'thememountain-plugin'),
				'add_new_item'       => esc_html__( 'Add New Modal' , 'thememountain-plugin'),
				'edit_item'          => esc_html__( 'Edit Modal' , 'thememountain-plugin'),
				'new_item'           => esc_html__( 'New Modal' , 'thememountain-plugin'),
				'all_items'          => esc_html__( 'All Modal' , 'thememountain-plugin'),
				'view_item'          => esc_html__( 'View Modal' , 'thememountain-plugin'),
				'search_items'       => esc_html__( 'Search Modal' , 'thememountain-plugin'),
				'not_found'          => esc_html__( 'No Modal found' , 'thememountain-plugin'),
				'not_found_in_trash' => esc_html__( 'No Modal found in the Trash' , 'thememountain-plugin'),
				'parent_item_colon'  => '',
				'menu_name'          => esc_html__( 'TM Modal' , 'thememountain-plugin' )
				);
			/**
			 * rewrite slug will be able to be changed via admin panel
			 */

			//exit;
			$_args = array(
				'labels'        => $_labels,
				'description'   => esc_html__('Modals', 'thememountain-plugin'),
				'public'        => true,
				'menu_position' => 5,
				'supports'      => array( 'title', 'editor' ),
				'has_archive'   => false,
				'hierarchical' => false,
				'show_in_nav_menus' => true,
				'capability_type' => 'post',
				'rewrite' => array(
					'slug' => $_slug,
					)
				);
			register_post_type( 'tm_modal', $_args );

			/**
			 * This is necessary for the custom post type to show pages instead of 404 not found
			 */
			flush_rewrite_rules();
		}

		/**
		 * Create tm_error_page custom post type
		 */
		public static function tm_create_tm_error_page() {
			/**
			 * note: this option is confifured with admin panel using CMB2
			 * however the plugin function cmb2_get_option to get option is not
			 * probably available at the moment execution.
			 * Loading the option manually.
			 */
			$_slug = get_option('tm_error_page_settings');
			if(is_array($_slug) && array_key_exists('tm_error_page_slug', $_slug)) {
				$_slug = $_slug['tm_error_page_slug'];
			} else {
				$_slug = 'error_page';
			}

			$_labels = array(
				'name'               => _x( 'Error Page items', 'post type general name' , 'thememountain-plugin'),
				'singular_name'      => _x( 'Error Page item', 'post type singular name', 'thememountain-plugin' ),
				'add_new'            => _x( 'Add New', 'error_page' , 'thememountain-plugin'),
				'add_new_item'       => esc_html__( 'Add New Error Page' , 'thememountain-plugin'),
				'edit_item'          => esc_html__( 'Edit Error Page' , 'thememountain-plugin'),
				'new_item'           => esc_html__( 'New Error Page' , 'thememountain-plugin'),
				'all_items'          => esc_html__( 'All Error Page' , 'thememountain-plugin'),
				'view_item'          => esc_html__( 'View Error Page' , 'thememountain-plugin'),
				'search_items'       => esc_html__( 'Search Error Page' , 'thememountain-plugin'),
				'not_found'          => esc_html__( 'No Error Page found' , 'thememountain-plugin'),
				'not_found_in_trash' => esc_html__( 'No Error Page found in the Trash' , 'thememountain-plugin'),
				'parent_item_colon'  => '',
				'menu_name'          => esc_html__( 'TM Error Page' , 'thememountain-plugin' )
				);
			/**
			 * rewrite slug will be able to be changed via admin panel
			 */

			//exit;
			$_args = array(
				'labels'        => $_labels,
				'description'   => esc_html__('Error Pages', 'thememountain-plugin'),
				'public'        => true,
				'menu_position' => 5,
				'supports'      => array( 'title', 'editor' ),
				'has_archive'   => false,
				'hierarchical' => false,
				'show_in_nav_menus' => false,
				'capability_type' => 'post',
				'rewrite' => array(
					'slug' => $_slug,
					)
				);
			register_post_type( 'tm_error_page', $_args );

			/**
			 * This is necessary for the custom post type to show pages instead of 404 not found
			 */
			flush_rewrite_rules();
		}
		/**
		 * End
		 */
	}
}