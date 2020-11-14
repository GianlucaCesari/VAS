<?php
/**
 * The template for displaying tm_modal pages (for preview only)
 *
 * @package WordPress
 * @subpackage thememountain-kant
 * @since thememountain-kant 1.0.10
 */

namespace ThemeMountain;

TM_NavMenuServices::$skip_nav_menu = TRUE;
TM_PageFooterServices::$footer_type = 'hide_footer';

get_header();
?>
<!-- Preheader -->
<header class="header">

<?php while (have_posts()) : the_post();?>
<?php
	$thememountain_footer_content = get_the_content();
	$thememountain_footer_column_number = TM_PageFooterServices::$footer_column_number;
	$thememountain_two_columns_on_tablet = ($thememountain_footer_column_number == 4) ? ' two-columns-on-tablet' : '';
	?>
	<div class="header-inner-top">
		<div class="nav-bar">
			<?php echo TM_TemplateServices::apply_content_filter_and_enqueue_deferred_css($thememountain_footer_content); ?>
		</div>
	</div>
<?php endwhile; ?>
</header>
<!-- Preheader  End -->
<?php
get_footer();
