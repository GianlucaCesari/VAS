<?php
/**
 * The template for displaying home
 *
 * The home.php page is created to prevent Wordpress to use
 * (posts shown front selected) to index.php as the home page
 *
 * @package WordPress
 * @subpackage thememountain-kant
 * @since thememountain-kant 1.0
 */
namespace ThemeMountain;

get_header();

$thememountain_use_masthead_title = TM_TemplateServices::get_current_page_data(array('options','use_masthead_title'));

$thememountain_error_page_type =  TM_Customizer::tm_get_theme_mod('tm_error_page_type');
$thememountain_error_page_id_to_show =  TM_Customizer::tm_get_theme_mod('tm_error_page_id_to_show');

if($thememountain_error_page_type === 'error_page' && get_post_status($thememountain_error_page_id_to_show) === 'publish') {

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
					$thememountain_content_post = get_post($thememountain_error_page_id_to_show);
					$thememountain_content = $thememountain_content_post->post_content;
					/** check up if the content has any vc_row */
					$thememountain_is_vc_content = (strpos($thememountain_content, '[vc_row ') !== FALSE) ? TRUE : FALSE;
					$thememountain_content = apply_filters( 'the_content', $thememountain_content );
					/** wrap if non VC content */
					if($thememountain_is_vc_content === FALSE) {
						echo '<div class="section-block replicable-content"><div class="row"><div class="column width-12">';
					}
					if(!empty($thememountain_content)) echo str_replace( ']]>', ']]&gt;', $thememountain_content );

					/** close the content if non vc content */
					if($thememountain_is_vc_content === FALSE) {
						echo '</div></div></div>';
					} ?>
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

} else {
	if( $thememountain_use_masthead_title == TRUE ) {
		get_template_part('section-parts/page_head_title');
	}
	get_template_part('section-parts/search');
	get_footer();
}
