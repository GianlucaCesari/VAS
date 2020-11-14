<?php
namespace ThemeMountain;

// Skip immediately if the option is not enabled.
$thememountain_show_recent_post_title = TM_TemplateServices::get_current_page_data(array('options','show_recent_post_title'));
if($thememountain_show_recent_post_title == FALSE) return;

$thememountain_recent_post_title = TM_TemplateServices::get_current_page_data(array('options','recent_post_title'));
$thememountain_recent_post_title_alignment = TM_TemplateServices::get_current_page_data(array('options','recent_post_title_alignment'));
$thememountain_recent_post_title_bottom_padding = 'pb-'.TM_TemplateServices::get_current_page_data(array('options','recent_post_title_bottom_padding'));
?>
<!-- Recent Post Title -->
<div class="section-block pt-0 <?php echo esc_attr($thememountain_recent_post_title_bottom_padding); ?>">
	<div class="row">
		<div class="column background-cover width-12 v-align-middle <?php echo esc_attr($thememountain_recent_post_title_alignment); ?> left-on-mobile">
			<h2><?php echo esc_html($thememountain_recent_post_title); ?></h2>
		</div>
	</div>
</div>
<!-- Recent Post Title End -->