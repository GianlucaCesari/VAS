<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Feature image left", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_feature-image-left tm-tmp-category_feature';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_bottom="0"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_feature_sections image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/04/feature-images-1.jpg" textarea_html_bkg_color="#ffffff" media_alignment="right" media_animation="slideInLeftShort" media_animation_threshold="0.3" slide_id="9a33354c-47e8-0"]
<h2 class="mb-30">Hit the Ground Running with Our OneClick Concepts</h2>
<p class="lead">With our OneClick Concept Importer, chose your concept, click import and start customizing.</p>
Each concept can be imported separately and comes with portfolio pages, blog pages, and common pages.  Extend any concept using our template library and insert additional sections.[/tm_feature_sections][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
