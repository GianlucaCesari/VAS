<?php
/**
 * The template for displaying tm_folio pages
 *
 * This page was created to prevent Wordpress to use
 * (posts shown front selected) to index.php as the home page
 *
 * @package WordPress
 * @subpackage thememountain-kant
 * @since thememountain-kant 1.0
 */

get_header();

get_template_part('template-parts/loop','tm_folio');

get_footer();
