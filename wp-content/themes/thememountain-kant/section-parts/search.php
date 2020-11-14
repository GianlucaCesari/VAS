<?php
namespace ThemeMountain;
$thememountain_search_message = TM_TemplateServices::get_current_page_data(array('options','search_message'));
?>
<!-- Search Section -->
<div class="section-block">
	<div class="row">
		<div class="column width-12">
			<div class="column width-8 offset-2 center">
				<p class="lead"><?php echo esc_html($thememountain_search_message); ?></p>
				<!-- searchform is not used to differentiate from that used for widget areas-->
				<div class="search-form-container">
					<form role="search" method="get" id="searchform_content" name="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" novalidate>
						<div class="row">
							<div class="column width-12">
								<div class="field-wrapper">
									<input type="text" name="s" class="form-search form-element xlarge" placeholder="<?php esc_attr_e('Search...',"thememountain-kant"); ?>" value="<?php echo get_search_query(); ?>">
									<span class="border"></span>
								</div>
							</div>
							<div class="column width-12">
								<input type="submit" value="<?php echo esc_attr_x( 'Find It', 'submit button' , "thememountain-kant" ); ?>" class="form-submit button bkg-charcoal bkg-hover-pink color-grey-light color-hover-white text-uppercase">
							</div>
						</div>
					</form>
					<div class="form-response"></div>
				</div>
				<!-- End searchform -->
			</div>
		</div>
	</div>
</div>
<!-- Search Section End -->