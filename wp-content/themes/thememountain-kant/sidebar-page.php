<?php
namespace ThemeMountain;
?>
<?php if ( is_active_sidebar( 'page_sidebar' ) ) :
	$thememountain_runtime_use_sidebar = TM_TemplateServices::get_current_page_data(array('options','tm_use_sidebar'));
	// set column number accordingly
	if($thememountain_runtime_use_sidebar == 'right') {
		$thememountain_width_and_pull = 'width-3';
	} else { // left
		$thememountain_width_and_pull = 'width-3 pull-9';
	}
?>
<!-- Sidebar -->
<aside class="column sidebar <?php echo esc_attr($thememountain_width_and_pull); ?> <?php echo esc_attr($thememountain_runtime_use_sidebar); ?>">
	<div class="sidebar-inner">
		<?php dynamic_sidebar( 'page_sidebar' ); ?>
	</div>
</aside>
<!-- Sidebar End -->
<?php endif; ?>