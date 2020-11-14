<?php
namespace ThemeMountain;
?>
<?php while (have_posts()) : the_post();?>
	<?php $thememountain_pagination_hide = TM_TemplateServices::get_current_page_data(array('options','tm_pagination_hide')); ?>
	<?php the_content(); ?>
	<?php if ( comments_open() ) { ?>
	<div class="section-block clearfix no-padding-bottom">
		<div class="row">
			<div class="column width-12">
				<?php comments_template( '', true); ?>
			</div>
		</div>
	</div>
	<?php } ?>
<?php endwhile; ?>
<?php
	if($thememountain_pagination_hide == "") {
		get_template_part('block-parts/pagination','arrows_return_to_index');
	}
