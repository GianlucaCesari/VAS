<?php
namespace ThemeMountain;

/**
 * Sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/sidebar.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_active_sidebar( 'shop' ) ) {
	$thememountain_runtime_post_variables_array = TM_TemplateServices::get_current_page_data('');
	// set the original settings value
	$thememountain_runtime_use_sidebar = (isset($thememountain_runtime_post_variables_array['options']['tm_use_sidebar'])) ? ' '.$thememountain_runtime_post_variables_array['options']['tm_use_sidebar'] : '';
	?>
	<!-- Sidebar -->
	<aside class="column width-3 sidebar<?php echo esc_attr($thememountain_runtime_use_sidebar); ?>">
		<div class="sidebar-inner">
			<?php dynamic_sidebar( 'shop' ); ?>
		</div>
	</aside>
<?php }

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
