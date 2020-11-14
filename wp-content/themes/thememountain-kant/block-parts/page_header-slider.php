<?php
namespace ThemeMountain;
?>
<!-- Page Header Fullscreen Slider Section -->
<section class="<?php echo TM_MastheadServices::the_masthead_height_class('slider'); ?>"<?php TM_MastheadServices::the_masthead_height_attributes(); ?>>
	<div class="tm-slider-container featured-media full-width-slider fixed-height" data-parallax data-external-padding=".wrapper-inner" data-animation="slide" data-scale-under="1140"<?php TM_MastheadServices::the_masthead_slider_height_attributes(); ?>>
		<ul class="tms-slides">
			<?php TM_MastheadServices::the_page_header_fullscreen_slider_contents('kant'); ?>
		</ul>
	</div>
</section>
<!-- Page Header Fullscreen Slider -->