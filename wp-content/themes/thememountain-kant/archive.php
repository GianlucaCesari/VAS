<?php
/**
 * The template for displaying archive pages
 *
 * This page was created to prevent Wordpress to use
 * (posts shown front selected) to index.php as the home page
 *
 * @package WordPress
 * @subpackage thememountain-kant
 * @since thememountain-kant 1.0
 */

get_header();

get_template_part('template-parts/loop');

get_footer();
