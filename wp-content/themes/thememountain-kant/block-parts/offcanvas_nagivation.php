<?php
namespace ThemeMountain;
?>
<aside class="side-navigation-wrapper<?php TM_NavMenuServices::tm_off_canvas_nav_position_class(); TM_NavMenuServices::tm_off_canvas_nav_side_nav_wide_class(); ?>" data-no-scrollbar<?php TM_NavMenuServices::tm_off_canvas_nav_animation_data_attrs(); ?>>
	<div class="side-navigation-scroll-pane">
		<div class="side-navigation-inner">
			<div class="side-navigation-header">
				<div class="navigation-hide side-nav-hide">
					<a href="#">
						<span class="icon-cancel medium"></span>
					</a>
				</div>
			</div>
			<!-- primary menu -->
			<nav class="side-navigation nav-block<?php TM_NavMenuServices::tm_off_canvas_nav_menu_alignment_class(); ?>">
				<?php
					if(!empty($thememountain_offcanvas_menu_title = TM_NavMenuServices::tm_nav_menu_title('off_canvas_menu'))) : ?>
				<span class="menu-title<?php TM_NavMenuServices::tm_off_canvas_title_display_class(); ?>"><?php echo esc_html($thememountain_offcanvas_menu_title); ?></span>
				<?php endif; ?>
				<?php TM_NavMenuServices::tm_nav_menu('off_canvas_menu'); ?>
			</nav>
			<?php
				if(!empty($thememountain_offcanvas_secondary_menu_title = TM_NavMenuServices::tm_nav_menu_title('off_canvas_secondary_menu'))) : ?>
			<!-- secondary menu -->
			<nav class="side-navigation nav-block<?php TM_NavMenuServices::tm_off_canvas_nav_menu_alignment_class(); ?>">
				<span class="menu-title<?php TM_NavMenuServices::tm_secondary_off_canvas_title_display_class(); ?>"><?php echo esc_html($thememountain_offcanvas_secondary_menu_title); ?></span>
				<?php TM_NavMenuServices::tm_nav_menu('off_canvas_secondary_menu'); ?>
			</nav>
			<?php endif; ?>
			<?php if(TM_ThemeServices::tm_admin_option('tm_cart_nav_menu','tm_use_ajax_cart_nav_memu') !== '0' && class_exists('\\ThemeMountain\\TM_CartNavMenu') && method_exists('\\ThemeMountain\\TM_CartNavMenu','get_cart_contents_count')) :
				?>
			<!-- Sidenav Cart -->
			<nav id="sidenav-ajax-cart" class="side-navigation nav-block<?php TM_NavMenuServices::tm_off_canvas_nav_menu_alignment_class(); ?>">
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
			<?php
			$thememountain_copyright_notice = TM_Customizer::tm_get_theme_mod('tm_copyright_notice');
			if($thememountain_copyright_notice !== '') :
				?>
			<div class="side-navigation-footer<?php TM_NavMenuServices::tm_off_canvas_nav_menu_alignment_class(); ?>">
				<?php TM_NavMenuServices::tm_nav_menu('off_canvas_social_links','social-list list-horizontal'); ?>
				<p class="copyright"><?php echo esc_html($thememountain_copyright_notice); echo TM_TemplateServices::get_privacy_and_terms_link(_x('View [privacy_policy] and [cookie_policy].','Do not translate [privacy_policy] and [cookie_policy]',"thememountain-kant"),__('Privacy Policy',"thememountain-kant"),__('Cookie Policy',"thememountain-kant")); ?></p>
			</div>
			<?php endif; ?>
		</div>
	</div>
</aside>