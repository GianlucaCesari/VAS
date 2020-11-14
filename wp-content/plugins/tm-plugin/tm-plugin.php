<?php

/**
 *
 * @link              http://thememountain.com
 * @package           tm-plugin
 *
 * Version:           1.1.22
 * @wordpress-plugin
 * Plugin Name:       ThemeMountain Plugin
 * Plugin URI:        http://thememountain.com
 * Description:       This is a support plugin for ThemeMountain WordPress theme products.
 * Author:            ThemeMountain
 * Author URI:        http://thememountain.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       thememountain-plugin
 * Domain Path:       /languages
 */

namespace ThemeMountain {
	/** Activation hook  to check up plugin compatibility */
		register_activation_hook( __FILE__, function() {
			/** get plugin data */
			$_plugin_data = get_plugin_data(__FILE__,FALSE,FALSE);
			$_plugin_version = $_plugin_data['Version'];
			/* Create transient data */
			if(
				method_exists('ThemeMountain\TM_ThemeMountain','get_required_tmplugin_version') === TRUE &&
				version_compare($_plugin_version,TM_ThemeMountain::get_required_tmplugin_version(), '>=') === FALSE
			) :
				set_transient( 'tm-admin-notice-tmplugin-cannot-be-activated', true, 5 );
			endif;
		},9999);

		add_action( 'admin_notices', function(){
			/* Check transient, if available display notice */
			if( get_transient( 'tm-admin-notice-tmplugin-cannot-be-activated' ) ) :
				?>
				<div class="error">
					<p><strong><?php echo esc_html__( 'ThemeMountain Plugin could not be activated.', 'thememountain-plugin' ); ?></strong> <?php echo esc_html__( 'Please make sure that you have installed the lastest ThemeMountain theme.', 'thememountain-plugin' ); ?></p>
				</div>
				<?php
				/** deactivate this plugin  */
				deactivate_plugins( __FILE__ );
				/** Making sure that Plugin Activated message will not be shown */
				if ( isset( $_GET['activate'] ) ) {
					unset( $_GET['activate'] );
				}
			endif;
		} );

	/**
	 * Making sure that the php version is 5.6 or later.
	 */
	if (version_compare(phpversion(), '5.6', '>')) {
		// If this file is called directly, abort.
		if ( ! defined( 'WPINC' ) ) {
			die;
		}

		/* other variables */
		$_local_plugin_dir = plugin_dir_path( __FILE__ );
		$_local_plugin_dir_uri = plugins_url('', __FILE__ );

		/**
		 * Custom Post Types (plugin-territory functionality)
		 */
		require_once $_local_plugin_dir . 'class/TM_CustomPostTypes.php';
		new TM_CustomPostTypes();

		/**
		 * Admin
		 */
		require_once $_local_plugin_dir . 'class/TM_Admin.php';
		new TM_Admin(
			array (
				'local_plugin_dir' => $_local_plugin_dir,
				'local_plugin_dir_uri' => $_local_plugin_dir_uri,
				'plugin_basename' => plugin_basename( __FILE__ )
			)
		);

		/**
		* Add ajax support
		*/
		require_once $_local_plugin_dir . 'class/TM_Ajax.php';
		new TM_Ajax(
			array (
				'local_plugin_dir' => $_local_plugin_dir,
				'local_plugin_dir_uri' => $_local_plugin_dir_uri,
			)
		);

		/**
		 * Loads widget
		 */
		require_once $_local_plugin_dir . 'class/TM_Widgets.php';
		new TM_Widgets(
			array (
				'local_plugin_dir' => $_local_plugin_dir,
				'local_plugin_dir_uri' => $_local_plugin_dir_uri,
			)
		);

		/**
		 * Adds custom style formats to the tinymce style dropdown menu.
		 */
		require_once $_local_plugin_dir . 'class/TM_StyleFormats.php';
		new TM_StyleFormats(
			array (
				'local_plugin_dir' => $_local_plugin_dir,
				'local_plugin_dir_uri' => $_local_plugin_dir_uri,
			)
		);

		/**
		 * Adds shortcode support
		 */
		require_once $_local_plugin_dir . 'class/TM_Shortcodes.php';
		new TM_Shortcodes(
			array (
				'local_plugin_dir' => $_local_plugin_dir,
				'local_plugin_dir_uri' => $_local_plugin_dir_uri,
			)
		);

		require_once $_local_plugin_dir . 'class/TM_ContentShortcode.php';
		new TM_ContentShortcode(
			array (
				'local_plugin_dir' => $_local_plugin_dir,
				'local_plugin_dir_uri' => $_local_plugin_dir_uri,
			)
		);

		/**
		* Add VC support
		*/
		if (class_exists( 'Vc_Manager' )) {
			require_once $_local_plugin_dir . 'class/TM_Vc.php';
			new TM_Vc(
				array (
					'local_plugin_dir' => $_local_plugin_dir,
					'local_plugin_dir_uri' => $_local_plugin_dir_uri,
				)
			);
		}

		require_once $_local_plugin_dir . 'class/TM_SNS.php';
		new TM_SNS(
			array (
				'local_plugin_dir' => $_local_plugin_dir,
				'local_plugin_dir_uri' => $_local_plugin_dir_uri,
			)
		);

		unset($_local_plugin_dir, $_local_plugin_dir_uri);
	}
}