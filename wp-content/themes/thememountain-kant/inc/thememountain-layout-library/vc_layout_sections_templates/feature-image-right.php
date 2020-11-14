<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Feature image right", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_feature-image-right tm-tmp-category_feature';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="80"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_feature_sections image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/04/feature-images-2.jpg" textarea_html_bkg_color="#ffffff" media_animation="slideInRightShort" slide_id="9a33354c-47e8-0"]
<h2 class="mb-30">Build Faster with Our Template Library</h2>
<p class="lead">Build truly stunning layouts quickly using purpose-built content blocks. Simple!</p>
Kant comes with some 70+ page layouts that offer unique and beautifully design blocks that look great on desktop, tablet and mobile. Kant now also includes fully functional onepage layouts! The possibilities are endless.[/tm_feature_sections][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
