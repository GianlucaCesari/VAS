<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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

namespace ThemeMountain;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Get page properties
 */
	$thememountain_use_masthead_title = TM_TemplateServices::get_current_page_data(array('options','use_masthead_title'));
	// $thememountain_loop_style = TM_TemplateServices::get_current_page_data(array('options','tm_loop_style'));
	// $thememountain_post_count = TM_TemplateServices::get_current_page_data(array('options','tm_post_count'));
	$thememountain_hide_pagination = TM_TemplateServices::get_current_page_data(array('options','tm_hide_pagination'));

/**
 * Sidebar settings
 */
	$thememountain_runtime_use_sidebar = TM_TemplateServices::get_current_page_data(array('options','tm_use_sidebar'));

	// fail safe
	if($thememountain_runtime_use_sidebar !== 'left' && $thememountain_runtime_use_sidebar !== 'right') {
		$thememountain_runtime_use_sidebar = 'none';
	}

	// set column number accordingly
	if($thememountain_runtime_use_sidebar == 'left') {
		$thememountain_width_and_pull = 'width-9 push-3';
	} else if($thememountain_runtime_use_sidebar == 'right') {
		$thememountain_width_and_pull = 'width-9';
	} else { // left
		$thememountain_width_and_pull = 'width-12';
	}

/**
 * Template for single product page
 */

get_header( 'shop' ); ?>

	<?php
		/**
		 * ThemeMountain Masthead
		 */
		if( $thememountain_use_masthead_title == TRUE ) {
			get_template_part('section-parts/page_head_title');
		}
	?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

<?php
// do not output if no sidebar is necessary
if($thememountain_runtime_use_sidebar == 'left' || $thememountain_runtime_use_sidebar == 'right') :
?>
<div class="section-block clearfix no-padding-bottom">
	<div class="row">
		<!-- Content Inner-->
		<div class="column content-inner <?php echo esc_attr($thememountain_width_and_pull); ?>">
			<?php
endif; ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>
<?php
// do not output if no sidebar is necessary
if($thememountain_runtime_use_sidebar == 'left' || $thememountain_runtime_use_sidebar == 'right') :
		get_sidebar('page'); ?>
		</div>
	</div>
</div><?php
endif;
?>
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
