<?php
/**
 * Note: All the variables are under the ThemeMountain namespace.
 * Anything decalred here are under the ThemeMountain namespace but not that of global.
 */
namespace ThemeMountain;

$thememountain_excerpt_grid_layout_columns = TM_TemplateServices::get_current_page_data(array('options','tm_excerpt_grid_layout_columns'));
$thememountain_hide_pagination = TM_TemplateServices::get_current_page_data(array('options','tm_hide_pagination'));
$thememountain_grid_layout_width = TM_TemplateServices::get_current_page_data(array('options','tm_grid_layout_width'));
$thememountain_grid_sizer = ' grid-sizer';

// Columns
	$thememountain_col_num = (!empty($thememountain_excerpt_grid_layout_columns)) ? $thememountain_excerpt_grid_layout_columns : 3;

/**
 * Exclude pt from homepage_with_posts.php custom page tempalte
 */
	$thememountain_page_template_slug = get_page_template_slug();
	if( $thememountain_page_template_slug === 'homepage_with_posts.php' ) {
		$thememountain_padding_top = '';
	} else {
		$thememountain_padding_top = ' pt-80';
	}

/**
 * Exclude pb if $thememountain_page_template_slug is custom home page and pagination is true
 */
	if(
		$thememountain_page_template_slug === 'homepage_with_posts.php' &&
		$thememountain_hide_pagination !== ''
	) {
		$thememountain_padding_bottom = '';
	} else {
		$thememountain_padding_bottom = ' pb-0';
	}


// full width detection
$thememountain_full_width = ($thememountain_grid_layout_width === 'full_width') ? ' full-width' : '';

// lightbox data-group
$thememountain_lightbox_data_group_id = 'lightbox_data_group-'.time() . rand( 0, 100 );

/**
 *thememountain_tm_folio_rollover_background_color
 */
$thememountain_tm_folio_rollover_background_color = " data-hover-bkg-color='#000000' data-hover-bkg-opacity='0.01'";
?>
<div id="recent-posts" class="section-block<?php echo esc_attr($thememountain_padding_top.$thememountain_padding_bottom); ?> content-inner blog-masonry grid-container fade-in-progressively<?php echo esc_attr($thememountain_full_width); ?>" data-layout-mode="masonry" data-grid-ratio="1.5" data-animate-resize data-animate-resize-duration="0">
	<?php get_template_part('block-parts/post_recent_post_title'); ?>
	<div class="row">
		<div class="column width-12">
			<div class="row grid content-grid-<?php echo esc_attr($thememountain_col_num); ?> clearfix">
<?php if (have_posts()) :
	while (have_posts()) :
		the_post();
			$thememountain_runtime_post_variables_array = TM_TemplateServices::get_runtime_page_data('',TRUE);
			$thememountain_runtime_post_date = $thememountain_runtime_post_variables_array['post_date'];
			$thememountain_runtime_author_posts_url = $thememountain_runtime_post_variables_array['author_posts_url'];
			$thememountain_runtime_nickname = $thememountain_runtime_post_variables_array['nickname'];
			$thememountain_runtime_featured_media_type = (array_key_exists('tm_featured_media_type', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_featured_media_type'] : FALSE;
			$thememountain_runtime_use_video_for_featured = (array_key_exists('tm_use_video_for_featured', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_use_video_for_featured'] : FALSE;
			$thememountain_runtime_thumbnail_image_src = (array_key_exists('thumbnail_image_src', $thememountain_runtime_post_variables_array)) ? $thememountain_runtime_post_variables_array['thumbnail_image_src'] : NULL;
			$thememountain_runtime_grid_thumbnail = (array_key_exists('tm_grid_thumbnail', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_grid_thumbnail'] : NULL;
			$thememountain_runtime_hide_excerpt_in_loop = (array_key_exists('tm_hide_excerpt_in_loop', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_hide_excerpt_in_loop'] : FALSE;
			$thememountain_runtime_cat_name = (array_key_exists('cat_name', $thememountain_runtime_post_variables_array)) ? $thememountain_runtime_post_variables_array['cat_name'] : '';
			// audio
			$thememountain_runtime_use_audio_for_featured = (array_key_exists('tm_use_audio_for_featured', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_use_audio_for_featured'] : FALSE;
			// link target
			$thememountain_runtime_grid_linked_item = (array_key_exists('tm_grid_linked_item', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_grid_linked_item'] : 'linked';
			$thememountain_runtime_grid_lightbox_caption = (array_key_exists('tm_grid_lightbox_caption', $thememountain_runtime_post_variables_array['options'])) ?$thememountain_runtime_post_variables_array['options']['tm_grid_lightbox_caption'] : '';
			// custom link
			$thememountain_runtime_grid_custom_url = (array_key_exists('tm_grid_custom_url', $thememountain_runtime_post_variables_array['options'])) ?$thememountain_runtime_post_variables_array['options']['tm_grid_custom_url'] : '';

			// inline styles for grid items
			// get values
			// .post-content / .content-outer
			$thememountain_grid_layout_box_article_background_color_item = (array_key_exists('tm_grid_layout_box_article_background_color_item', $thememountain_runtime_post_variables_array['options']) && $thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_background_color_item'] !== '') ? 'background-color:'.$thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_background_color_item'].';' : '';
			// .post-title, .post-title a
			$thememountain_grid_layout_box_article_title_color_item = (array_key_exists('tm_grid_layout_box_article_title_color_item', $thememountain_runtime_post_variables_array['options']) && $thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_title_color_item'] !== '') ? 'color:'.$thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_title_color_item'].';' : '';
			// .post-content / .content-outer
			$thememountain_grid_layout_box_article_color_item = (array_key_exists('tm_grid_layout_box_article_color_item', $thememountain_runtime_post_variables_array['options']) && $thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_color_item'] !== '') ? 'color:'.$thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_color_item'].';' : '';
			// .post-date, .read-more
			$thememountain_grid_layout_box_article_link_color_item = (array_key_exists('tm_grid_layout_box_article_link_color_item', $thememountain_runtime_post_variables_array['options']) && $thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_link_color_item'] !== '') ? 'color:'.$thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_link_color_item'].';' : '';
	?>
				<div class="grid-item<?php echo esc_attr($thememountain_grid_sizer); $thememountain_grid_sizer = ''; ?>">
					<article <?php post_class('post'); ?>>
						<?php if( $thememountain_runtime_use_video_for_featured == TRUE || $thememountain_runtime_use_audio_for_featured == TRUE) {
							get_template_part('block-parts/post_media');
						} else if( !empty($thememountain_runtime_thumbnail_image_src) || !empty($thememountain_runtime_grid_thumbnail) ) {
								if(!empty($thememountain_runtime_grid_thumbnail)) {
									$thememountain_grid_thumbnail_url = $thememountain_runtime_grid_thumbnail;
								} else {
									$thememountain_grid_thumbnail_url = $thememountain_runtime_thumbnail_image_src[0];
								}
							?>
						<div class="post-media">
							<div class="thumbnail overlay-fade-img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700" <?php echo ($thememountain_tm_folio_rollover_background_color); ?>>
								<?php
									if($thememountain_runtime_grid_linked_item === '' || $thememountain_runtime_grid_linked_item === 'linked' ) {
								?>
									<a class="overlay-link" href="<?php the_permalink(); ?>">
								<?php
									} else if ($thememountain_runtime_grid_linked_item === 'lightbox') {
								?>
									<a class="overlay-link lightbox-link" data-group="<?php echo esc_attr($thememountain_lightbox_data_group_id); ?>" data-caption="<?php $thememountain_runtime_grid_lightbox_caption; ?>" href="<?php
										if( $thememountain_runtime_featured_media_type == 'vimeo' ) {
											echo (array_key_exists('tm_featured_media_vimeo', $thememountain_runtime_post_variables_array['options']) && $thememountain_runtime_post_variables_array['options']['tm_featured_media_vimeo'] !== '' ) ? esc_html('//player.vimeo.com/video/'.$thememountain_runtime_post_variables_array['options']['tm_featured_media_vimeo']) : esc_html($thememountain_grid_thumbnail_url);
										} else if( $thememountain_runtime_featured_media_type == 'youtube' ) {
											echo (array_key_exists('tm_featured_media_youtube', $thememountain_runtime_post_variables_array['options']) && $thememountain_runtime_post_variables_array['options']['tm_featured_media_youtube'] !=='' ) ? esc_html('//www.youtube.com/embed/'.$thememountain_runtime_post_variables_array['options']['tm_featured_media_youtube']) : esc_html($thememountain_grid_thumbnail_url);
										} else {
											echo esc_url($thememountain_grid_thumbnail_url);
										}
									?>">
								<?php } else if($thememountain_runtime_grid_linked_item === 'custom_url') { ?>
									<a class="overlay-link" href="<?php echo esc_url($thememountain_runtime_grid_custom_url); ?>">
								<?php } ?>
									<?php TM_TemplateServices::generate_image_tag_from_id($thememountain_grid_thumbnail_url,get_the_title(),TRUE,'grid-'.$thememountain_col_num); ?>
									<span class="overlay-info">
										<span>
											<span>
												<span class="post-title"><?php the_title(); ?></span>
												<span class="project-description"><?php echo esc_html($thememountain_runtime_post_date); ?></span>
											</span>
										</span>
									</span>
								<?php if( $thememountain_runtime_grid_linked_item !== 'not_linked' ) { ?>
								</a>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
					</article>
				</div><!-- .grid-item -->
<?php
	endwhile;
endif;
wp_reset_postdata();
?>
			</div>
		</div>
	</div>
</div>