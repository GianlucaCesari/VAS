<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up to back top end
 *
 * @package WordPress
 * @subpackage thememountain-kant
 * @since thememountain-kant 1.0
 */
namespace ThemeMountain;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport">
	<meta name="keywords" content="astrologia veneto spazio stelle oroscopo pianeti astrologo mestre gruppo sirio segni zodiacali zodiaco cielo">
	<?php
		wp_head();
	?>
</head>
<body <?php body_class(); ?>>

	<!-- Overlay Navigation Menu -->
	<?php
		/**
		 * If 'Off-Canvas Menu' is ticked in the Menu Settings / Display location of Menu admin,
		 * Off-Canvas navigation is shown otherwise overlay navigation is shown.
		 * @since 1.1.1
		 */
		if(TM_NavMenuServices::$skip_nav_menu == TRUE) {
			// do nothing
		} else if(empty(TM_NavMenuServices::get_current_menu_item_by_menu_location('off_canvas_menu'))) {
			get_template_part('block-parts/overlay_nagivation');
		} else {
			get_template_part('block-parts/offcanvas_nagivation');
		}
	?>
	<!-- Overlay Navigation Menu End -->

	<div class="wrapper reveal-side-navigation<?php TM_NavMenuServices::tm_off_canvas_nav_side_nav_wide_class();?>">
		<div class="wrapper-inner">
			<!-- Header -->
			<?php
				if(TM_NavMenuServices::$skip_nav_menu !== TRUE) {
					get_template_part('section-parts/page_navigation', TM_NavMenuServices::$header_navigation_type);
				}
			?>
			<!-- Header End -->
			<!-- Back Top -->
			<?php $thememountain_show_back_to_top = TM_Customizer::tm_get_theme_mod('tm_show_back_to_top'); ?>
			<?php if($thememountain_show_back_to_top === 'show' ) : ?>
			<div class="scroll-to-top fixed">
				<a href="#"><span class="icon-up-open-mini"></span></a>
			</div>
			<?php endif; ?>
			<!-- Back Top End -->
			<!-- Content -->
			<div class="content clearfix">
