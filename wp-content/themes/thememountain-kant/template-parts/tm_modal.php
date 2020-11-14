<?php
namespace ThemeMountain;
?>
<!-- Modal Preview -->
<?php while (have_posts()) : the_post();?>
<?php $thememountain_modal_content = get_the_content(); ?>
	<div>
		<?php echo apply_filters( 'the_content', $thememountain_modal_content ); ?>
	</div>
<?php endwhile; ?>
<!-- Modal Preview End -->