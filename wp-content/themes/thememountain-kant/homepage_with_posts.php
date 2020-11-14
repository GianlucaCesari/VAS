<?php
/*
 Template Name: Homepage with Posts
 Template Post Type: page, tm_folio
 */

namespace ThemeMountain;

/**
 * The custom template for variated homepages
 *
 * @package WordPress
 * @subpackage thememountain-kant
 * @since thememountain-kant 1.0
 */

/**
 * Get page properties
 */
	$thememountain_use_masthead_title = TM_TemplateServices::get_current_page_data(array('options','use_masthead_title'));
	$thememountain_loop_style = TM_TemplateServices::get_current_page_data(array('options','tm_loop_style'));
	$thememountain_post_count = TM_TemplateServices::get_current_page_data(array('options','tm_post_count'));
	$thememountain_hide_pagination = TM_TemplateServices::get_current_page_data(array('options','tm_hide_pagination'));
/**
 * Get the content for this page
 */
	the_post();
	$thememountain_content = apply_filters( 'the_content', get_the_content() );

/**
 * Header
 */
	get_header();

/**
 * Custom loop query
 */
	global $wp_query,$paged;

	/** 'page' is referred instead of 'paged' to get a correct pagionation value */
	if(get_query_var('page')) {
		// used as homepage
		$paged = get_query_var('page');
	} else if (get_query_var('paged')) {
		// used as a regular page
		$paged = get_query_var('paged');
	} else {
		// default
		$paged = 1;
	}

	/* backup the original query */
	$thememountain_original_query = $wp_query;
	/* reset once */
	$wp_query = null;
	/* issue a query */
	$wp_query = new \WP_Query( array('posts_per_page'=>$thememountain_post_count, 'paged' =>  $paged ) );

/**
 * Content
 */
	if( $thememountain_use_masthead_title == TRUE ) {
		get_template_part('section-parts/page_head_title');
	}

	/**
	 * Print out the content for this page. $thememountain_content is straight out of get_the_content() with the the_content filter applied.
	 */
	if(!empty($thememountain_content)) echo str_replace( ']]>', ']]&gt;', $thememountain_content );

	if ( $thememountain_loop_style === 'wide') {
		get_template_part('section-parts/post_loop_wide');
	} else if ( $thememountain_loop_style === 'creative') {
		get_template_part('section-parts/post_loop_creative');
	} else {
		get_template_part('section-parts/post_loop_grids');
	}

	if(empty($thememountain_hide_pagination)) get_template_part('block-parts/pagination','numeric');

/**
 * Finalize the custom loop query
 */
	$wp_query = null;
	$wp_query = $thememountain_original_query;
	wp_reset_postdata();

/**
 * Footer
 */
	get_footer();
