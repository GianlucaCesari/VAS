<?php
/**
 * The template for displaying tm_folio pages
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

get_template_part('template-parts/tm_folio');

get_footer();
