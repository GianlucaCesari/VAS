<?php
namespace ThemeMountain;

if (TM_PreheaderServices::$preheader_type === 'use_tm_preheader') {
	$thememountain_preheader_content = TM_PreheaderServices::get_current_tm_preheader();
?>
<header class="<?php echo TM_NavMenuServices::$nav_menu_header_classes; ?>"<?php echo TM_NavMenuServices::$nav_menu_header_data_attrs; ?>>
	<?php get_template_part('block-parts/preheader'); ?>
</header>
<?php } ?>