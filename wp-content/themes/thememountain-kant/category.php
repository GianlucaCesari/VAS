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

$thememountain_queried_object = get_queried_object();
$thememountain_custom_category_page = TM_CustomCategoryPage::get_custom_category_page_id($thememountain_queried_object->taxonomy,$thememountain_queried_object->slug);
$thememountain_use_masthead_title = TM_TemplateServices::get_current_page_data(array('options','use_masthead_title'));

get_header();

if(empty($thememountain_custom_category_page)) {
	get_template_part('template-parts/loop');
} else {
	if( $thememountain_use_masthead_title == TRUE ) {
		get_template_part('section-parts/page_head_title');
	}

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

		/** load comment template */
		comments_template( '', true);

		/** close the content if non vc content */
		if($thememountain_is_vc_content === FALSE) {
			echo '</div></div></div>';
		}

	endwhile;
}

get_footer();



