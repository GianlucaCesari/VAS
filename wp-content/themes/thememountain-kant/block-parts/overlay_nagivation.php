<?php
namespace ThemeMountain;
?>
<div class="overlay-navigation-wrapper<?php TM_NavMenuServices::tm_overlay_nav_animation_class();?>" data-no-scrollbar<?php TM_NavMenuServices::tm_overlay_nav_animation_data_attrs(); ?>>
	<div class="overlay-navigation-scroll-pane">
		<div class="overlay-navigation-inner">
			<div class="v-align-middle">
				<div class="overlay-navigation-header row collapse full-width">
					<div class="column width-12">
						<div class="navigation-hide overlay-nav-hide">
							<a href="#">
								<span class="icon-cancel"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="row collapse full-width">
					<div class="column width-12">
						<?php
						if(!empty($thememountain_overlay_secondary_menu_title = TM_NavMenuServices::tm_nav_menu_title('overlay_menu'))) :
							?>
						<nav class="overlay-navigation nav-block<?php TM_NavMenuServices::tm_overlay_nav_menu_alignment_class(TRUE); ?> clear-float-on-mobile">
							<span class="menu-title<?php TM_NavMenuServices::tm_overlay_menu_title_display_class(); ?>"><?php echo esc_html($thememountain_overlay_secondary_menu_title); ?></span>
							<?php
							TM_NavMenuServices::tm_nav_menu('overlay_menu');
							?>
						</nav>
						<?php endif; ?>
						<?php
						if(!empty($thememountain_overlay_secondary_menu_title = TM_NavMenuServices::tm_nav_menu_title('overlay_secondary_menu'))) :
							?>
						<nav class="overlay-navigation nav-block<?php TM_NavMenuServices::tm_overlay_nav_menu_alignment_class(TRUE); ?> clear-float-on-mobile">
							<span class="menu-title<?php TM_NavMenuServices::tm_secondary_overlay_title_display_class(); ?>"><?php echo esc_html($thememountain_overlay_secondary_menu_title); ?></span>
							<?php
							TM_NavMenuServices::tm_nav_menu('overlay_secondary_menu');
							?>
						</nav>
						<?php endif; ?>
						<?php if(TM_ThemeServices::tm_admin_option('tm_cart_nav_menu','tm_use_ajax_cart_nav_memu') !== '0' && class_exists('\\ThemeMountain\\TM_CartNavMenu') && method_exists('\\ThemeMountain\\TM_CartNavMenu','get_cart_contents_count')) :
							?>
						<!-- Overlay Cart -->
						<nav id="overlay-ajax-cart" class="overlay-navigation nav-block clear-float-on-mobile<?php TM_NavMenuServices::tm_overlay_nav_menu_alignment_class(TRUE); ?>">
							<ul>
								<li class="tm-commerce-ajax-cart">
									<a href="#" class="contains-sub-menu cart"><?php echo esc_html__('Cart',"thememountain-kant"); ?> <span class="cart-indication"><span class="badge"><?php echo TM_CartNavMenu::get_cart_contents_count(); ?></span></span></a>
									<ul class="sub-menu custom-content cart-overview<?php TM_NavMenuServices::tm_secondary_overlay_title_display_class(); ?>">
										<?php echo TM_CartNavMenu::get_cart_overview_html(); ?>
									</ul>
								</li>
							</ul>
						</nav>
						<?php endif; ?>
					</div>
				</div>

				<div class="overlay-navigation-footer row<?php TM_NavMenuServices::tm_overlay_nav_menu_alignment_class(TRUE); ?>">
					<div class="column width-12 no-padding">
						<?php TM_NavMenuServices::tm_nav_menu('overlay_social_links','social-list list-horizontal'); ?>
						<?php
						$thememountain_copyright_notice = TM_Customizer::tm_get_theme_mod('tm_copyright_notice');
						if($thememountain_copyright_notice !== '') :
							?>
						<p class="copyright"><?php echo esc_html($thememountain_copyright_notice); echo TM_TemplateServices::get_privacy_and_terms_link(_x('View [privacy_policy] and [cookie_policy].','Do not translate [privacy_policy] and [cookie_policy]',"thememountain-kant"),__('Privacy Policy',"thememountain-kant"),__('Cookie Policy',"thememountain-kant")); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>