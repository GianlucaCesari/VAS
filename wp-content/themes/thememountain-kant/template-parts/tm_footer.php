<?php
namespace ThemeMountain;
?>
<!-- Footer Preview -->
<footer class="footer">
<?php while (have_posts()) : the_post();?>
<?php
	$thememountain_footer_content = get_the_content();
	$thememountain_footer_column_number = TM_PageFooterServices::$footer_column_number;
	$thememountain_two_columns_on_tablet = ($thememountain_footer_column_number == 4) ? ' two-columns-on-tablet' : '';
	?>
	<div class="footer-top<?php echo esc_attr($thememountain_two_columns_on_tablet); ?>">
		<?php echo apply_filters( 'the_content', $thememountain_footer_content ); ?>
	</div>
<?php endwhile; ?>
</footer>
<!-- Footer Preview End -->