<?php
namespace ThemeMountain;

if (TM_PreheaderServices::$preheader_type === 'use_tm_preheader') {
	$thememountain_preheader_content = TM_PreheaderServices::get_current_tm_preheader();
?>
	<div class="header-inner-top">
		<div class="nav-bar">
			<?php echo TM_TemplateServices::apply_content_filter_and_enqueue_deferred_css($thememountain_preheader_content); ?>
		</div>
	</div>
<?php } ?>