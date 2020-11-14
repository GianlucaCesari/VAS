<?php
/**
 * The template for displaying tm_footer pages (for preview)
 *
 * @package WordPress
 * @subpackage thememountain-kant
 * @since thememountain-kant 1.0
 */

namespace ThemeMountain;

TM_NavMenuServices::$skip_nav_menu = TRUE;
TM_PageFooterServices::$footer_type = 'hide_footer';

get_header();

get_template_part('template-parts/tm_footer');

get_footer();
