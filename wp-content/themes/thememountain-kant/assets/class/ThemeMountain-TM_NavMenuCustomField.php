<?php
/**
 * ThemeMountain namespace reserved for ThemeMountain Wordpress themes
 */
namespace ThemeMountain {
	/**
	 * Customizes nav menu meta box. Adds TM's pull down menu.
	 *
	 * These codes were based on https://github.com/kucrut/wp-menu-item-custom-fields by kucrut
	 *
	 * @package ThemeMountain
	 * @subpackage wordpress-common-assets
	 * @since 1.0.2
	 */
	class TM_NavMenuCustomField extends TM_ThemeMountain {
		/**
		 * Properties
		 */

		/**
		 * Holds custom nav menu data fields
		 *
		 * @var        array
		 */
		protected static $navmenu_data_fields = array();

		/**
		 * Class Constructor Magic Method.
		 *
		 * Cache theme version, execute class setup method and add filter for option fields in the admin panel.
		 *
		 * @since 1.0.10
		 * @access public
		 *
		 * @uses
		 */
		public function __construct() {
			self::$navmenu_data_fields = array(
				'tm_custom_nav' => TM_ThemeStrings::$text_strings['TM_NavMenuCustomField']['tm_custom_nav'],
				'tm_custom_nav_modal_aux_classes' => TM_ThemeStrings::$text_strings['TM_NavMenuCustomField']['tm_custom_nav_modal_aux_classes'],
				);

			/** for overriding the default class so that we can inject our own custom fields HTML */
			add_filter( 'wp_edit_nav_menu_walker', function () {
				// load only on demand
				parent::locate_template_in_dir('assets/class/ThemeMountain-TM_WalkerNavMenuEdit.php');
				return 'ThemeMountain\\TM_WalkerNavMenuEdit';
			}, 99 );

			// add checkbox in the sliding menu above of admin dashboard
			add_filter( 'manage_nav-menus_columns', ['ThemeMountain\\TM_NavMenuCustomField','add_screen_option_toggle_for_tm_options'], 99 );
			// print out html fields in the meta box
			add_action( 'wp_nav_menu_item_custom_fields', ['ThemeMountain\\TM_NavMenuCustomField','_fields'], 10, 4 );
			// for saving
			add_action( 'wp_update_nav_menu_item', ['ThemeMountain\\TM_NavMenuCustomField','_save'], 10, 3 );
		}

		/**
		 * Public Methods for hooks
		 */
		/**
		 * Add checkbox for showing the custom fields
		 */
		public static function add_screen_option_toggle_for_tm_options ( $columns ) {
			$columns = array_merge( $columns, self::$navmenu_data_fields );
			return $columns;
		}

		/**
		 * Custom fields
		 */
		/**
		 * Construct menu and text field for the nav menu meta box.
		 *
		 * @uses       tm_nav_menu_custom_pulldown hook	To add item in the dropdown menu (except for tm_modal), use "tm_nav_menu_custom_pulldown" filter hook.
		 * @see        TM_NavMenuServices::tm_nav_buttons() Used for outputing custom HTML for buttons and other widgets in the nav bar.
		 * @see        TM_WalkerNavMenu::start_el()	Skips items for buttons.
		 *
		 * @param      <type>  $id     The identifier
		 * @param      <type>  $item   The item
		 * @param      <type>  $depth  The depth
		 * @param      <type>  $args   The arguments
		 */
		public static function _fields( $id, $item, $depth, $args ) {
			// for pull down menu
			$_key = 'tm_custom_nav';
			$_label = TM_ThemeStrings::$text_strings['TM_NavMenuCustomField'][$_key];
			// variables
				$_field_key   = sprintf( 'menu-item-%s', $_key );
				$_id    = esc_attr(sprintf( 'edit-%s-%s', $_field_key, $item->ID ));
				$_name  = esc_attr(sprintf( '%s[%s]', $_field_key, $item->ID ));
				$_value = esc_attr(get_post_meta( $item->ID, $_field_key, true ));
				$_class = esc_attr(sprintf( 'field-%s', $_key ));
				$_label = esc_html( $_label );
				/**
				 * Holds settings items for dropdown
				 *
				 * @var        array
				 */
				$_options = array();
				if($item->object === 'tm_modal') {
					$_options['modal_button'] = TM_ThemeStrings::$text_strings['TM_NavMenuCustomField']['tm_custom_nav_modalButton'];
				} else {
					$_options[''] = TM_ThemeStrings::$text_strings['TM_NavMenuCustomField']['tm_custom_nav_none'];
					$_options['megamenu_parent'] = TM_ThemeStrings::$text_strings['TM_NavMenuCustomField']['tm_custom_nav_megamenu'];
					$_options['button'] = TM_ThemeStrings::$text_strings['TM_NavMenuCustomField']['tm_custom_nav_button'];
					$_options['icon'] = TM_ThemeStrings::$text_strings['TM_NavMenuCustomField']['tm_custom_nav_icon'];
					// filter to add custom pulldown menu values
					$_options = apply_filters( 'tm_nav_menu_custom_pulldown', $_options, $id, $item, $depth, $args );
				}
			?>
				<p class="description description-wide <?php echo esc_attr( $_class ) ?>">
				<?php
					echo "<label for='{$_id}'>{$_label}<br />";
					echo "<select id='{$_id}' class='{$_id}' name='{$_name}'>";
					foreach ($_options as $_option_key => $_option_label ) {
						echo "<option value='{$_option_key}'";
						if($_value == $_option_key) echo " selected";
						echo ">{$_option_label}</option>";
					}
					echo "</select></label>"; ?>
				</p>
			<?php if($item->object === 'tm_modal') {
				/**
				 * Additional text field only for tm_modal
				 *
				 * @var        string
				 */
				$_key = 'tm_custom_nav_modal_aux_classes';
				$_label = TM_ThemeStrings::$text_strings['TM_NavMenuCustomField'][$_key];
				// variables
					$_field_key   = sprintf( 'menu-item-%s', $_key );
					$_id    = esc_attr(sprintf( 'edit-%s-%s', $_field_key, $item->ID ));
					$_name  = esc_attr(sprintf( '%s[%s]', $_field_key, $item->ID ));
					$_value = esc_attr(get_post_meta( $item->ID, $_field_key, true ));
					$_class = esc_attr(sprintf( 'field-%s', $_key ));
					$_label = esc_html( $_label );
			?>
				<p class="description description-wide <?php echo esc_attr( $_class ) ?>">
				<?php
					echo "<label for='{$_id}'>{$_label}<br />";
					echo "<input type='text' id='{$_id}' class='{$_id}' name='{$_name}' value='{$_value}'>";
					echo "</label>";
				?>
				</p>
			<?php }
		}

		/**
		 * For SAVING data values
		 */
		public static function _save( $menu_id, $menu_item_db_id, $menu_item_args ) {
			if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
				return;
			}
			check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );
			foreach ( self::$navmenu_data_fields as  $_key => $_value ) {
				$_key = sprintf( 'menu-item-%s', $_key );
				// Sanitization
				$value = (!empty( $_POST[ $_key ][ $menu_item_db_id ])) ? $_POST[$_key][$menu_item_db_id] : null;
				// Saving
				if ( !is_null( $value ) ) {
					update_post_meta( $menu_item_db_id, $_key, $value );
				} else {
					delete_post_meta( $menu_item_db_id, $_key );
				}
			}
		}

		/**
		 * End
		 */
	}
}