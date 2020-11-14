<?php
/**
 * Note: All the variables are under the ThemeMountain namespace.
 * Anything decalred here are under the ThemeMountain namespace but not that of global.
 */
namespace ThemeMountain;

/**
 * TM_MastheadServices::which_masthead_title_type() returns either 'slider', 'solid' or FALSE
 * depending on conditions. See TM_MastheadServices::which_masthead_title_type() for details.
 */
if($thememountain_page_head_title_type = TM_MastheadServices::which_masthead_title_type()) {
	get_template_part('block-parts/page_header',$thememountain_page_head_title_type);
}
