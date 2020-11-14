<?php
namespace ThemeMountain;

$thememountain_use_masthead_title = TM_TemplateServices::get_current_page_data(array('options','use_masthead_title'));
$thememountain_loop_style = TM_TemplateServices::get_current_page_data(array('options','tm_loop_style'));

if( $thememountain_use_masthead_title == TRUE ) {
	get_template_part('section-parts/page_head_title');
}

if ( $thememountain_loop_style === 'wide') {
	get_template_part('section-parts/post_loop_wide');
} else if ( $thememountain_loop_style === 'creative') {
	get_template_part('section-parts/post_loop_creative');
} else {
	get_template_part('section-parts/post_loop_grids');
}

get_template_part('block-parts/pagination','numeric');
