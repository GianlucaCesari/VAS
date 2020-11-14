<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Feature image right dark", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_feature-image-right-dark tm-tmp-category_feature';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="80" use_background="yes" background_color="#232323"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_feature_sections image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/04/feature-images-4.jpg" textarea_html_bkg_color="#232323" content_animation="fadeIn" media_animation="slideInRightShort" slide_id="9a33354c-47e8-0"]
<h2 class="mb-30"><span style="color: #ffffff;">Showcase Your Work with Stunning Grids</span></h2>
<p class="lead"><span style="color: #999999;">Build amazing grids on the fly to showcase your designs, photography or products.</span></p>
<span style="color: #999999;">There is no limit the number of grids you can build. Modify grid layouts, rollovers, animations, tile ratios and margins individually for every grid. </span>[/tm_feature_sections][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
