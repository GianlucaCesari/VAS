<?php
namespace ThemeMountain;
?>
<!-- Page Header Section 1 -->
<div class="<?php echo TM_MastheadServices::the_masthead_height_class('solid'); ?>">
	<div class="row">
		<div class="column width-12">
			<?php  TM_MastheadServices::print_overlay_element_for_title_overlay_background_color(); ?>
			<div class="title-container">
				<div class="title-container-inner center">
					<h1 class="title-xlarge horizon mb-10<?php TM_MastheadServices::print_tm_page_head_title_horizon_class(); ?>"<?php TM_MastheadServices::the_page_head_title_animate_in_attribute(); ?>><?php echo TM_TemplateServices::get_current_page_data('title'); ?></h1>
				<?php if(is_single() && get_post_type() === 'post'){
					global $post;
					$thememountain_post_id = $post->ID;
					?>
					<div class="clear"></div>
					<p class="post-info text-medium no-margins horizon" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:400ms;">
						<span class="post-date"><?php echo get_the_date('',$thememountain_post_id); ?></span>, <span class="author">By <?php echo get_the_author_meta('display_name',get_post_field( 'post_author', $thememountain_post_id )); ?></span>, <span class="category">in <?php echo TM_TemplateServices::get_category_name_and_links(1); ?></span><?php if(has_tag()) { ?>, <span class="tags"> <?php the_tags(); ?></span><?php } ?>
					</p>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Header Section 1 End -->