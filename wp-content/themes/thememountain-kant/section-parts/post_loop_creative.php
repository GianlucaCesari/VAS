<?php
/**
 * Note: All the variables are under the ThemeMountain namespace.
 * Anything decalred here are under the ThemeMountain namespace but not that of global.
 */
namespace ThemeMountain;

$thememountain_excerpt_grid_layout_columns = TM_TemplateServices::get_current_page_data(array('options','tm_excerpt_grid_layout_columns'));
$thememountain_hide_pagination = TM_TemplateServices::get_current_page_data(array('options','tm_hide_pagination'));
$thememountain_grid_layout_width = TM_TemplateServices::get_current_page_data(array('options','tm_grid_layout_width'));
$thememountain_tm_loop_thumbnail_ratio = TM_TemplateServices::get_current_page_data(array('options','tm_loop_thumbnail_ratio'));
$thememountain_column_gutters = TM_TemplateServices::get_current_page_data(array('options','tm_column_gutters'));

// gutter
switch ($thememountain_column_gutters) {
	case 'small':
		$thememountain_column_gutters = ' small-margins';
		break;
	case 'none':
		$thememountain_column_gutters = ' no-margins';
		break;
	default:
		$thememountain_column_gutters = '';
		break;
}

// Used for the 1st grid item
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

// tm_loop_thumbnail_ratio default
$thememountain_tm_loop_thumbnail_ratio = (empty($thememountain_tm_loop_thumbnail_ratio)) ? '1.5' : $thememountain_tm_loop_thumbnail_ratio;

// full width detection
$thememountain_full_width = ($thememountain_grid_layout_width === 'full_width') ? ' full-width' : '';

// lightbox data-group
$thememountain_lightbox_data_group_id = 'lightbox_data_group-'.time() . rand( 0, 100 );

/**
 * tm_post_rollover_background_color_creative
 */
$thememountain_post_rollover_background_color_creative = TM_TemplateServices::get_current_page_data(array('options','tm_post_rollover_background_color_creative'));
$thememountain_post_rollover_background_color_creative = TM_TemplateServices::tm_fromRGBtoHEX($thememountain_post_rollover_background_color_creative);

if(isset($thememountain_post_rollover_background_color_creative)) {
	$thememountain_post_rollover_background_color = " data-hover-bkg-color='{$thememountain_post_rollover_background_color_creative[0]}' data-hover-bkg-opacity='{$thememountain_post_rollover_background_color_creative[1]}'";
}
?>
<div id="recent-posts" class="section-block<?php echo esc_attr($thememountain_padding_top); ?> blog-creative content-inner blog-masonry grid-container fade-in-progressively<?php echo esc_attr($thememountain_column_gutters).esc_attr($thememountain_full_width); ?>" data-layout-mode="masonry" data-grid-ratio="<?php echo esc_attr($thememountain_tm_loop_thumbnail_ratio); ?>" data-animate-resize data-set-dimensions data-animate-resize-duration="600" data-as-bkg-image>
	<?php get_template_part('block-parts/post_recent_post_title'); ?>
	<div class="row">
		<div class="column width-12">
			<div class="row grid content-grid-<?php echo esc_attr($thememountain_col_num); ?>">
				<!-- Post -->
<?php if (have_posts()) :
	while (have_posts()) :
		the_post();
			$thememountain_runtime_post_variables_array = TM_TemplateServices::get_runtime_page_data('',TRUE);

			// grid box type
			$thememountain_grid_box_type = (array_key_exists('tm_grid_box_type', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_grid_box_type'] : '';

			if($thememountain_grid_box_type === 'none') continue;

			$thememountain_runtime_post_date = $thememountain_runtime_post_variables_array['post_date'];
			$thememountain_runtime_author_posts_url = $thememountain_runtime_post_variables_array['author_posts_url'];
			$thememountain_runtime_nickname = $thememountain_runtime_post_variables_array['nickname'];
			$thememountain_runtime_featured_media_type = (array_key_exists('tm_featured_media_type', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_featured_media_type'] : FALSE;
			$thememountain_runtime_use_video_for_featured = (array_key_exists('tm_use_video_for_featured', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_use_video_for_featured'] : FALSE;
			$thememountain_runtime_thumbnail_image_src = (array_key_exists('thumbnail_image_src', $thememountain_runtime_post_variables_array)) ? $thememountain_runtime_post_variables_array['thumbnail_image_src'] : '';
			$thememountain_runtime_grid_thumbnail = (array_key_exists('tm_grid_thumbnail', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_grid_thumbnail'] : '';
			$thememountain_runtime_hide_excerpt_in_loop = (array_key_exists('tm_hide_excerpt_in_loop', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_hide_excerpt_in_loop'] : FALSE;
			$thememountain_runtime_cat_name = (array_key_exists('cat_name', $thememountain_runtime_post_variables_array)) ? $thememountain_runtime_post_variables_array['cat_name'] : '';
			// link target
			$thememountain_runtime_grid_linked_item = (array_key_exists('tm_grid_linked_item', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_grid_linked_item'] : 'linked';
			$thememountain_runtime_grid_lightbox_caption = (array_key_exists('tm_grid_lightbox_caption', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_grid_lightbox_caption'] : '';
			$thememountain_grid_box_thumb_format = (array_key_exists('tm_grid_box_thumb_format', $thememountain_runtime_post_variables_array['options'])) ? ($thememountain_runtime_post_variables_array['options']['tm_grid_box_thumb_format'] === 'none') ? '' : ' '.$thememountain_runtime_post_variables_array['options']['tm_grid_box_thumb_format'] : '';
			// alignments
			$thememountain_grid_box_content_vertical_alignment = (array_key_exists('tm_grid_box_content_vertical_alignment', $thememountain_runtime_post_variables_array['options'])) ? ' v-align-'.$thememountain_runtime_post_variables_array['options']['tm_grid_box_content_vertical_alignment'] : ' v-align-middle';
			$thememountain_grid_box_content_horizontal_alignment = (array_key_exists('tm_grid_box_content_horizontal_alignment', $thememountain_runtime_post_variables_array['options'])) ? ' '.$thememountain_runtime_post_variables_array['options']['tm_grid_box_content_horizontal_alignment'] : ' center';

			// .post-content / .content-outer
			$thememountain_grid_layout_box_article_background_color_item = (array_key_exists('tm_grid_layout_box_article_background_color_item', $thememountain_runtime_post_variables_array['options']) && $thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_background_color_item'] !== '') ? 'background-color:'.$thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_background_color_item'].';' : '';
			// .post-title, .post-title a
			$thememountain_grid_layout_box_article_title_color_item = (array_key_exists('tm_grid_layout_box_article_title_color_item', $thememountain_runtime_post_variables_array['options']) && $thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_title_color_item'] !== '') ? 'color:'.$thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_title_color_item'].';' : '';
			// .post-content / .content-outer
			$thememountain_grid_layout_box_article_color_item = (array_key_exists('tm_grid_layout_box_article_color_item', $thememountain_runtime_post_variables_array['options']) && $thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_color_item'] !== '') ? 'color:'.$thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_color_item'].';' : '';
			// .post-date, .read-more
			$thememountain_grid_layout_box_article_link_color_item = (array_key_exists('tm_grid_layout_box_article_link_color_item', $thememountain_runtime_post_variables_array['options']) && $thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_link_color_item'] !== '') ? 'color:'.$thememountain_runtime_post_variables_array['options']['tm_grid_layout_box_article_link_color_item'].';' : '';
	?>
				<div class="grid-item<?php echo esc_attr($thememountain_grid_box_thumb_format); echo esc_attr($thememountain_grid_sizer); $thememountain_grid_sizer = ''; ?>">
					<article <?php post_class('post'); ?>>
						<?php
						if(!empty($thememountain_runtime_grid_thumbnail)) {
							$thememountain_grid_thumbnail_url = $thememountain_runtime_grid_thumbnail;
						} else if(is_array($thememountain_runtime_thumbnail_image_src)) {
							$thememountain_grid_thumbnail_url = $thememountain_runtime_thumbnail_image_src[0];
						} else {
							$thememountain_grid_thumbnail_url = '';
						}
						?>
						<?php
						if ($thememountain_grid_box_type === 'text') :
							if(array_key_exists('tm_grid_box_background_color', $thememountain_runtime_post_variables_array['options'])) {
								$thememountain_grid_box_background_color = " style='background-color:".esc_attr($thememountain_runtime_post_variables_array['options']['tm_grid_box_background_color']).";'";
							} else {
								$thememountain_grid_box_background_color = '';
							}
						?>
						<div class="content-outer"<?php
							// An attribute used in the variable $thememountain_grid_box_background_color is escaped right above.
							echo esc_attr($thememountain_grid_box_background_color);
						?> style="<?php echo esc_attr($thememountain_grid_layout_box_article_link_color_item.$thememountain_grid_layout_box_article_background_color_item); ?>">
							<div class="content-inner<?php echo esc_attr($thememountain_grid_box_content_vertical_alignment).esc_attr($thememountain_grid_box_content_horizontal_alignment); ?>">
								<div class="post-title" style="<?php echo esc_attr($thememountain_grid_layout_box_article_title_color_item); ?>"><a href="<?php the_permalink(); ?>" style="<?php echo esc_attr($thememountain_grid_layout_box_article_title_color_item); ?>"><?php the_title(); ?></a></div>
								<div class="post-info">
									<span class="post-date" style="<?php echo esc_attr($thememountain_grid_layout_box_article_title_color_item); ?>"><?php echo esc_html($thememountain_runtime_post_date); ?></span>
								</div><?php
								$thememountain_grid_box_text = (array_key_exists('tm_grid_box_text', $thememountain_runtime_post_variables_array['options'])) ? $thememountain_runtime_post_variables_array['options']['tm_grid_box_text'] : '';
								if (!empty($thememountain_grid_box_text)) { ?>
								<div class="post-excerpt"><?php echo TM_TemplateServices::tm_wp_kses($thememountain_grid_box_text); ?></div>
								<?php } ?>
							</div>
						</div>
						<?php else: ?>
						<div class="post-media">
							<div class="thumbnail overlay-fade-img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700" <?php echo ($thememountain_post_rollover_background_color); ?>>
								<?php if($thememountain_runtime_grid_linked_item === '' || $thememountain_runtime_grid_linked_item === 'linked' ) { ?>
								<a class="overlay-link" href="<?php  the_permalink(); ?>">
								<?php } else if ($thememountain_runtime_grid_linked_item === 'lightbox') { ?>
								<a class="overlay-link lightbox-link" data-group="<?php echo esc_attr($thememountain_lightbox_data_group_id); ?>" data-caption="<?php $thememountain_runtime_grid_lightbox_caption; ?>" href="<?php
									if( $thememountain_runtime_featured_media_type == 'vimeo' ) {
										echo (array_key_exists('tm_featured_media_vimeo', $thememountain_runtime_post_variables_array['options']) && $thememountain_runtime_post_variables_array['options']['tm_featured_media_vimeo'] !== '' ) ? esc_html('//player.vimeo.com/video/'.$thememountain_runtime_post_variables_array['options']['tm_featured_media_vimeo']) : esc_html($thememountain_grid_thumbnail_url);
									} else if( $thememountain_runtime_featured_media_type == 'youtube' ) {
										echo (array_key_exists('tm_featured_media_youtube', $thememountain_runtime_post_variables_array['options']) && $thememountain_runtime_post_variables_array['options']['tm_featured_media_youtube'] !=='' ) ? esc_html('//www.youtube.com/embed/'.$thememountain_runtime_post_variables_array['options']['tm_featured_media_youtube']) : esc_html($thememountain_grid_thumbnail_url);
									} else {
										echo esc_url($thememountain_grid_thumbnail_url);
									}
									?>">
								<?php }
// class="content-inner<?php echo esc_attr($thememountain_grid_box_content_vertical_alignment).esc_attr($thememountain_grid_box_content_horizontal_alignment);
								?>
									<?php TM_TemplateServices::generate_image_tag_from_id($thememountain_grid_thumbnail_url,get_the_title(),TRUE,'grid-'.$thememountain_col_num); ?>
									<span class="overlay-info<?php echo esc_attr($thememountain_grid_box_content_vertical_alignment).esc_attr($thememountain_grid_box_content_horizontal_alignment); ?>">
										<span>
											<span>
												<span class="post-title"><?php the_title(); ?></span>
												<span class="post-info">
													<span class="post-date" style="<?php echo esc_attr($thememountain_grid_layout_box_article_title_color_item); ?>"><?php echo esc_html($thememountain_runtime_post_date); ?></span>
												</span>
											</span>
										</span>
									</span>
								<?php if( $thememountain_runtime_grid_linked_item !== 'not_linked' ) { ?>
								</a>
								<?php } ?>
							</div>
						</div>
						<?php endif; ?>
					</article>
				</div><!-- .grid-item -->
<?php
	endwhile;
endif;
wp_reset_postdata();
?>
				<!-- Post End -->
			</div>
		</div>
	</div>
</div>