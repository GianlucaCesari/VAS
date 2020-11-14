<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive for WooCommerce
 *  @version     3.5.0
 */

namespace ThemeMountain;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Get page properties
 */
	$thememountain_use_masthead_title = TM_TemplateServices::get_current_page_data(array('options','use_masthead_title'));
	$thememountain_loop_style = TM_TemplateServices::get_current_page_data(array('options','tm_loop_style'));
	$thememountain_post_count = TM_TemplateServices::get_current_page_data(array('options','tm_post_count'));
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
 * Template
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
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

	<?php
		/**
		 * woocommerce_archive_description hook.
		 *
		 * @hooked woocommerce_taxonomy_archive_description - 10
		 * @hooked woocommerce_product_archive_description - 10
		 */
		do_action( 'woocommerce_archive_description' );
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
		<?php
		if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

			<?php if ( wc_get_loop_prop( 'total' ) ) { ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/**
						 * woocommerce_shop_loop hook.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
					?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php } ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				if(empty($thememountain_hide_pagination)) do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php
				/**
				 * woocommerce_no_products_found hook.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			?>

		<?php endif;?>
<?php
// do not output if no sidebar is necessary
if($thememountain_runtime_use_sidebar == 'left' || $thememountain_runtime_use_sidebar == 'right') :
		get_sidebar('page'); ?>
		</div>
		<?php
			/**
			 * woocommerce_sidebar hook.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action( 'woocommerce_sidebar' );
		?>
	</div>
</div><?php
endif;
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php get_footer( 'shop' ); ?>
