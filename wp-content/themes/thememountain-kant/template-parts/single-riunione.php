<?php
namespace ThemeMountain;
?>
<?php while (have_posts()) : the_post();
	$thememountain_runtime_post_variables_array = TM_TemplateServices::get_current_page_data('');
	$thememountain_runtime_post_date = $thememountain_runtime_post_variables_array['post_date'];
	$thememountain_runtime_author_posts_url = $thememountain_runtime_post_variables_array['author_posts_url'];
	$thememountain_runtime_nickname = $thememountain_runtime_post_variables_array['nickname'];
	$thememountain_runtime_use_post_media = isset($thememountain_runtime_post_variables_array['options']['tm_use_post_media']) ? $thememountain_runtime_post_variables_array['options']['tm_use_post_media'] : FALSE;
	$thememountain_runtime_cat_name = isset($thememountain_runtime_post_variables_array['cat_name']) ? $thememountain_runtime_post_variables_array['cat_name'] : NULL;
	$thememountain_runtime_cat_ID = isset($thememountain_runtime_post_variables_array['cat_ID']) ? $thememountain_runtime_post_variables_array['cat_ID'] : NULL;
	// set the original settings value
	$thememountain_runtime_use_sidebar = $thememountain_runtime_post_variables_array['options']['tm_use_sidebar'];
	// tm_use_sidebar customizer settings conditionals
	if($thememountain_runtime_use_sidebar === 'customizer') {
		$thememountain_use_custom_settings_post = TM_Customizer::tm_get_theme_mod('tm_use_custom_settings_post');
		if($thememountain_use_custom_settings_post == 1) {
			$thememountain_runtime_use_sidebar = TM_Customizer::tm_get_theme_mod('tm_use_sidebar_post');
		} else {
			$thememountain_runtime_use_sidebar = TM_Customizer::tm_get_theme_mod('tm_use_sidebar_home');
		}
	}
	// Transient API used to hand over tm_use_sidebar setting to sidebar.php. Valid only for 12 seconds.
	set_transient( 'thememountain_use_sidebar', $thememountain_runtime_use_sidebar, 12);
	// category admin settings
	$thememountain_categories_limit_number = TM_ThemeServices::tm_admin_option('tm_post_settings','tm_categories_limit_number','5');
	// set column number accordingly
	if($thememountain_runtime_use_sidebar === 'left') {
		$thememountain_col_num = '9 push-3';
	} else if ($thememountain_runtime_use_sidebar === 'right') {
		$thememountain_col_num = '9';
	} else {
		$thememountain_col_num = '10 offset-1';
	}
	// fail safe
	if (empty($thememountain_runtime_use_sidebar)) {
		$thememountain_runtime_use_sidebar = 'none';
	}

?>
	<div class="section-block clearfix no-padding-top pb-80">
		<!-- Post Meta -->
		<div class="section-block pt-50 pb-0<?php if($thememountain_runtime_use_sidebar === 'none') { echo ' center'; } ?>">
			<div class="row">
				<div class="column width-<?php echo esc_attr($thememountain_col_num); ?>">
					<?php get_template_part('block-parts/breadcrumbs'); ?>
				</div>
			</div>
		</div>
		<!-- Post Meta End -->

		<div class="row">
			<!-- Content Inner -->
			<div class="column width-<?php echo esc_attr($thememountain_col_num); ?> content-inner blog-single-post">
				<article <?php post_class(); ?>>
					<?php
						if( $thememountain_runtime_use_post_media !== 'none' ) {
							get_template_part('block-parts/post_media');
						}
					?>
					<div class="post-content">
                        <h2><?php the_content(); ?></h2>
                        <h2><?php the_post_thumbnail(); ?></h2>
						<p><b>Relatore: </b> <?php the_title(); ?></p>
                        <?php 
                        $date = new \DateTime(get_field('date_start'));
                        ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Data Riunione</th>
                                    <th>Orario</th>
                                    <th>Posti a sedere</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php print($date->format('d-m-Y'));?></td>
                                    <td><?php the_field('hour_start');?><?php (get_field('hour_end') ? ' - '.get_field('hour_end') : '.');?></td>
                                    <td><?php print(get_field('seat_number') ? get_field('seat_number') : 'illimitati.');?></td>
                                </tr>
                            </tbody>
                        </table>
						<?php if(the_field('luogo')) {?>
							La riunione si terrà presso <?php the_field('luogo')?>.
						<?php }?>
					</div>
					<?php do_action('tm_post_social_list'); ?>
					<?php if( wp_link_pages('echo=0') ): ?>
					<div class="row">
						<div class="column width-12">
							<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . esc_html__('Pages:', "thememountain-kant"), 'after' => '</p></nav>']); ?>
						</div>
					</div>
					<?php endif; ?>
				</article>
				<?php comments_template( '', true); ?>
			</div>
			<?php
			if($thememountain_runtime_use_sidebar == 'right' || $thememountain_runtime_use_sidebar == 'left') {
				get_sidebar();
			}
			// delete transient
			delete_transient('thememountain_use_sidebar');
			?>
		</div>
	</div>
<?php endwhile; ?>
<?php
	get_template_part('block-parts/pagination','arrows_titled');
?>