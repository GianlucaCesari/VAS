<?php
/**
 * Note: All the variables are under the ThemeMountain namespace.
 * Anything decalred here are under the ThemeMountain namespace but not that of global.
 */
namespace ThemeMountain;
?>
<!-- Footer 1-->
<footer class="footer<?php echo TM_PageFooterServices::get_tm_footer_classes(); ?>"<?php echo TM_PageFooterServices::get_tm_footer_attributes();?>>
<?php
if (TM_PageFooterServices::$footer_type === 'use_tm_footer') {
	$thememountain_footer_content = TM_PageFooterServices::get_current_tm_footer();
	$thememountain_footer_column_number = TM_PageFooterServices::$footer_column_number;
	$thememountain_two_columns_on_tablet = ($thememountain_footer_column_number == 4) ? ' two-columns-on-tablet' : '';
?>
	<div class="footer-top<?php echo esc_attr($thememountain_two_columns_on_tablet); ?>">
		<?php echo TM_TemplateServices::apply_content_filter_and_enqueue_deferred_css($thememountain_footer_content); ?>
	</div>
<?php
} else {
	$thememountain_footer_column_number = TM_PageFooterServices::$footer_column_number;
	$thememountain_column_width = ['','width-12','width-6','width-4','width-3','width-2'];
	$thememountain_two_columns_on_tablet = ($thememountain_footer_column_number == 4) ? ' two-columns-on-tablet' : '';

?>
	<div class="footer-top<?php echo esc_attr($thememountain_two_columns_on_tablet); ?>">
		<div class="row">
		<?php
			for($thememountain_i = 1; $thememountain_i <= $thememountain_footer_column_number; $thememountain_i++ ) {
				$thememountain_footer_column_align = ' '.TM_PageFooterServices::$footer_column_align[$thememountain_i];
		?>
			<div class="column <?php echo esc_attr($thememountain_column_width[$thememountain_footer_column_number].$thememountain_footer_column_align); ?>">
				<?php
					if ( is_active_sidebar( "footer_{$thememountain_i}" ) ) {
						dynamic_sidebar( "footer_{$thememountain_i}" );
					}
				?>
			</div>
		<?php } ?>
		</div>
	</div>
<?php } ?>
</footer>
<!-- Footer 1 End -->