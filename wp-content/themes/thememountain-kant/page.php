<?php
/**
 * The template for displaying pages
 *
 * This page was created to prevent Wordpress to use
 * (posts shown front selected) to index.php as the home page
 *
 * @package WordPress
 * @subpackage thememountain-kant
 * @since thememountain-kant 1.0
 */
namespace ThemeMountain;

$thememountain_use_masthead_title = TM_TemplateServices::get_current_page_data(array('options','use_masthead_title'));

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
 * Page Output begins.
 */

get_header();

if( $thememountain_use_masthead_title == TRUE ) {
	get_template_part('section-parts/page_head_title');
}

// do not output if no sidebar is necessary
if($thememountain_runtime_use_sidebar == 'left' || $thememountain_runtime_use_sidebar == 'right') :
?>
<div class="section-block clearfix no-padding-bottom">
	<div class="row">
		<!-- Content Inner-->
		<div class="column content-inner <?php echo esc_attr($thememountain_width_and_pull); ?>">
			<?php
endif;
			while (have_posts()) : the_post();
				$thememountain_content = get_the_content();
				/** check up if the content has any vc_row */
				$thememountain_is_vc_content = (strpos($thememountain_content, '[vc_row ') !== FALSE) ? TRUE : FALSE;
				$thememountain_content = apply_filters( 'the_content', $thememountain_content );
				/** wrap if non VC content */
				if($thememountain_is_vc_content === FALSE) {
					echo '<div class="section-block replicable-content"><div class="row"><div class="column width-12">';
				}
				if(!empty($thememountain_content)) echo str_replace( ']]>', ']]&gt;', $thememountain_content );

				if( wp_link_pages('echo=0') ): ?>
				<div class="row">
					<div class="column width-12">
						<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . esc_html__('Pages:', "thememountain-kant"), 'after' => '</p></nav>']); ?>
					</div>
				</div>
				<?php endif;

				/** load comment template */
				comments_template( '', true);

				/** close the content if non vc content */
				if($thememountain_is_vc_content === FALSE) {
					echo '</div></div></div>';
				} ?>
			<?php endwhile; ?>
		<!-- Content Inner End -->
<?php
// do not output if no sidebar is necessary
if($thememountain_runtime_use_sidebar == 'left' || $thememountain_runtime_use_sidebar == 'right') : ?>
		</div>
		<?php get_sidebar('page'); ?>
	</div>
</div><?php
endif;

get_footer();
