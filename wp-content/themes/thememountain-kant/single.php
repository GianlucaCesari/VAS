<?php
/**
 * The template for displaying single post
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

get_header();

if( $thememountain_use_masthead_title == TRUE ) {
	get_template_part('section-parts/page_head_title');
}

if(is_singular('riunioni')) {
	get_template_part('template-parts/single-riunione');
}
else if (is_singular('libri'))  {
    get_template_part('template-parts/single-libro');
}
else {
	get_template_part('template-parts/single');
}


get_footer();
