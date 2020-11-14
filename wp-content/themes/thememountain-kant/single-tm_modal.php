<?php
/**
 * The template for displaying tm_modal pages (for preview only)
 *
 * @package WordPress
 * @subpackage thememountain-kant
 * @since thememountain-kant 1.0.10
 */

namespace ThemeMountain;

TM_NavMenuServices::$skip_nav_menu = TRUE;
TM_PageFooterServices::$footer_type = 'hide_footer';

get_header();

get_template_part('template-parts/tm_modal');

get_footer();
