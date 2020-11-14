<?php
namespace ThemeMountain;
?>
<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
<?php
	$thememountain_runtime_post_variables_array = TM_TemplateServices::get_current_page_data('');
	// set the original settings value
	$thememountain_runtime_use_sidebar = get_transient('thememountain_use_sidebar');
	$thememountain_additional_sidebar_classes = '';
	if($thememountain_runtime_use_sidebar === 'left') {
		$thememountain_additional_sidebar_classes = ' pull-9';
	}
?>
<!-- Sidebar -->
<div class="column width-3 sidebar <?php echo esc_attr($thememountain_runtime_use_sidebar.$thememountain_additional_sidebar_classes); ?>">
	<div class="sidebar-inner">
		<?php dynamic_sidebar( 'blog_sidebar' ); ?>
	</div>
</div>
<?php endif; ?>