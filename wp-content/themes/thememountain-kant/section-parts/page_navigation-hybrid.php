<?php
namespace ThemeMountain;

$thememountain_tm_use_top_logo = TM_Customizer::tm_get_theme_mod('tm_use_top_logo');
?>
<header class="<?php echo TM_NavMenuServices::$nav_menu_header_classes; ?>"<?php echo TM_NavMenuServices::$nav_menu_header_data_attrs; ?>>
	<?php get_template_part('block-parts/preheader'); ?>
	<div class="header-inner">
		<div class="row nav-bar reveal-side-navigation<?php echo TM_NavMenuServices::$header_width; ?>">
			<div class="column width-12 nav-bar-inner">
				<?php if($thememountain_tm_use_top_logo != FALSE) : ?>
				<div class="logo<?php echo TM_NavMenuServices::$header_navigation_logo_alignment;?>">
					<div class="logo-inner">
						<?php echo get_custom_logo(); ?>
					</div>
				</div>
				<?php endif; ?>
				<nav class="navigation nav-block secondary-navigation nav-<?php echo TM_NavMenuServices::$header_secondary_navigation_alignment; ?>">
					<ul>
						<!-- Navigation Buttons -->
						<?php TM_NavMenuServices::tm_nav_buttons(); ?>

						<li class="aux-navigation">
							<div class="v-align-middle">
								<!-- Aux Navigation -->
								<a href="#" class="navigation-show <?php echo (empty(TM_NavMenuServices::get_current_menu_item_by_menu_location('off_canvas_menu'))) ? 'overlay-nav-show' : 'side-nav-show'; ?> nav-icon">
									<span class="icon-menu"></span>
								</a>
							</div>
						</li>
					</ul>
				</nav>
				<nav class="navigation  nav-block primary-navigation nav-<?php echo TM_NavMenuServices::$header_navigation_alignment; ?>">
					<?php TM_NavMenuServices::tm_nav_menu('main_nav_menu'); ?>
				</nav>
			</div>
		</div>
	</div>
</header>
