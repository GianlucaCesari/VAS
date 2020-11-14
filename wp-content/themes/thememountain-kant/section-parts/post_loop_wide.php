<?php
/**
 * Note: All the variables are under the ThemeMountain namespace.
 * Anything decalred here are under the ThemeMountain namespace but not that of global.
 */
namespace ThemeMountain;

$thememountain_use_sidebar = TM_TemplateServices::get_current_page_data(array('options','tm_use_sidebar'));
// Transient API used to hand over tm_use_sidebar setting to sidebar.php. Valid only for 12 seconds.
set_transient( 'thememountain_use_sidebar', $thememountain_use_sidebar, 12);
$thememountain_hide_excerpt_in_loop = TM_TemplateServices::get_current_page_data(array('options','tm_hide_excerpt_in_loop'));

$thememountain_col_offset = '';

if($thememountain_use_sidebar === 'left') {
	$thememountain_col_class = ' width-9 push-3';
} else if ($thememountain_use_sidebar === 'right') {
	$thememountain_col_class = ' width-9';
} else {
	$thememountain_col_class = ' width-10 offset-1';
}

/**
 * post_rollover_background_color
 */
$thememountain_post_rollover_background_color_wide_grids = TM_TemplateServices::get_current_page_data(array('options','tm_post_rollover_background_color_wide_grids'));
$thememountain_post_rollover_background_color_wide_grids = TM_TemplateServices::tm_fromRGBtoHEX($thememountain_post_rollover_background_color_wide_grids);
if(isset($thememountain_post_rollover_background_color_wide_grids)) {
	$thememountain_post_rollover_background_color = " data-hover-bkg-color='{$thememountain_post_rollover_background_color_wide_grids[0]}' data-hover-bkg-opacity='{$thememountain_post_rollover_background_color_wide_grids[1]}'";
}
?>
<div class="section-block clearfix">
	<?php get_template_part('block-parts/post_recent_post_title'); ?>
	<div class="row">
		<div class="column content-inner blog-regular<?php echo esc_attr($thememountain_col_class); ?>">
<?php if (have_posts()) :
	while (have_posts()) :
		the_post();
			$thememountain_runtime_post_variables_array = TM_TemplateServices::get_runtime_page_data('',TRUE);
			$thememountain_runtime_post_date = $thememountain_runtime_post_variables_array['post_date'];
			$thememountain_runtime_author_posts_url = $thememountain_runtime_post_variables_array['author_posts_url'];
			$thememountain_runtime_nickname = $thememountain_runtime_post_variables_array['nickname'];
			$thememountain_runtime_thumbnail_image_src = (array_key_exists('thumbnail_image_src', $thememountain_runtime_post_variables_array)) ? $thememountain_runtime_post_variables_array['thumbnail_image_src'] : NULL;
			$thememountain_runtime_cat_name = (array_key_exists('cat_name', $thememountain_runtime_post_variables_array)) ? $thememountain_runtime_post_variables_array['cat_name'] : NULL;
			// video
			$thememountain_runtime_use_video_for_featured = (is_array($thememountain_runtime_post_variables_array['options']) && array_key_exists('tm_use_video_for_featured', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_use_video_for_featured'] : FALSE;
			// audio
			$thememountain_runtime_use_audio_for_featured = (array_key_exists('tm_use_audio_for_featured', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_use_audio_for_featured'] : FALSE;
			// cat ID
			$thememountain_runtime_cat_ID = (isset($thememountain_runtime_post_variables_array['cat_ID'])) ? $thememountain_runtime_post_variables_array['cat_ID'] : NULL;

			// inline styles for grid items
			// get values
			// .post-content
			$thememountain_grid_layout_box_article_background_color_item = (array_key_exists('tm_grid_layout_box_article_background_color_item', $thememountain_runtime_post_variables_array['options']) && !empty($thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_background_color_item'])) ? 'background-color:'.$thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_background_color_item'].';' : '';
			// .post-title, .post-title a
			$thememountain_grid_layout_box_article_title_color_item = (array_key_exists('tm_grid_layout_box_article_title_color_item', $thememountain_runtime_post_variables_array['options']) && !empty($thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_title_color_item'])) ? 'color:'.$thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_title_color_item'].';' : '';
			// .post-content
			$thememountain_grid_layout_box_article_color_item = (array_key_exists('tm_grid_layout_box_article_color_item', $thememountain_runtime_post_variables_array['options']) && !empty($thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_color_item'])) ? 'color:'.$thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_color_item'].';' : '';
			// .post-date, .read-more
			$thememountain_grid_layout_box_article_link_color_item = (array_key_exists('tm_grid_layout_box_article_link_color_item', $thememountain_runtime_post_variables_array['options']) && !empty($thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_link_color_item'])) ? 'color:'.$thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_link_color_item'].';' : '';
	?>
			<article <?php post_class('post'); ?>>
				<div class="post-info-aside">
					<span class="post-date">
						<span class="day"><?php echo get_the_date('d'); ?></span>
						<span class="month"><?php echo get_the_date('M'); ?></span>
					</span>
				</div>
				<div class="post-content">
					<?php if( $thememountain_runtime_use_video_for_featured == TRUE || $thememountain_runtime_use_audio_for_featured == TRUE) {
						get_template_part('block-parts/post_media');
					} else if( isset($thememountain_runtime_thumbnail_image_src) ) { ?>
					<div class="post-media">
						<div class="thumbnail img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700" <?php echo ($thememountain_post_rollover_background_color); ?>>
							<a class="overlay-link" href="<?php  the_permalink(); ?>">
								<?php TM_TemplateServices::generate_image_tag_from_id($thememountain_runtime_thumbnail_image_src[0], get_the_title(), TRUE); ?>
								<?php if( $thememountain_runtime_cat_name !== '' ) { ?>
								<span class="overlay-info">
									<span>
										<span>
											<span>
												<?php echo esc_html('More','thememountain-kant'); ?>
											</span>
										</span>
									</span>
								</span>
								<?php } ?>
							</a>
						</div>
					</div>
					<?php } ?>
					<?php if( $thememountain_hide_excerpt_in_loop == FALSE ) : ?>
					<div class="with-background" style="<?php echo esc_attr($thememountain_grid_layout_box_article_link_color_item.$thememountain_grid_layout_box_article_background_color_item); ?>">

						<div class="post-info">
							<span class="post-date hide show-on-mobile"><?php echo esc_html($thememountain_runtime_post_date); ?>,</span><span class="post-category"><?php echo sprintf(esc_html__( 'In %s', "thememountain-kant"),esc_html($thememountain_runtime_cat_name)); ?></span>
						</div>
						<h2 class="post-title" style="<?php echo esc_attr($thememountain_grid_layout_box_article_title_color_item); ?>">
							<a href="<?php  the_permalink(); ?>" style="<?php echo esc_attr($thememountain_grid_layout_box_article_title_color_item); ?>"><?php the_title(); ?></a>
						</h2>

						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="read-more" style="<?php echo esc_attr($thememountain_grid_layout_box_article_title_color_item); ?>"><?php echo esc_html('Read More','thememountain-kant'); ?></a>
					</div>
					<?php endif; ?>
				</div><!-- .post-content -->
			</article>
<?php
	endwhile;
endif;
wp_reset_postdata();
?>
		</div>
		<?php
		if($thememountain_use_sidebar == 'right' || $thememountain_use_sidebar == 'left') {
			get_sidebar();
		}
		// delete transient
		delete_transient('thememountain_use_sidebar');
		?>
	</div>
</div>