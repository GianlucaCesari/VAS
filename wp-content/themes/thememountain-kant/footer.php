<?php
namespace ThemeMountain;
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up to back top end
 *
 * @package WordPress
 * @subpackage thememountain-kant
 * @since thememountain-kant 1.0
 */
?>
			</div>
			<!-- Content End -->
			<?php
			if(TM_PageFooterServices::$footer_type !== 'hide_footer') {
				get_template_part ('section-parts/page_footer');
			}
			?>
		</div>
	</div>
	<?php TM_NavMenuServices::output_modal_HTML() ?>
	<?php
	  wp_footer();
	?>
</body>
</html>