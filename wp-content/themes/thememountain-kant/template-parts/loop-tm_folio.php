<?php
namespace ThemeMountain;

$thememountain_use_masthead_title = TM_TemplateServices::get_current_page_data(array('options','use_masthead_title'));

if( $thememountain_use_masthead_title == TRUE ) {
	get_template_part('section-parts/page_head_title');
}

get_template_part('section-parts/post_loop_grids','tm_folio');

get_template_part('block-parts/pagination','arrows_return_to_index');
