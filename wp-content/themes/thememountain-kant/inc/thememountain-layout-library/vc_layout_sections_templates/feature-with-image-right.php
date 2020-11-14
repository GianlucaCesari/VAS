<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Feature with image right", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_feature-with-image-right tm-tmp-category_features';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row columns_on_tablet="keep" el_id="brief"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_feature_sections image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/feature-1-product-2.jpg" textarea_html_bkg_color="#ffffff" slide_id="3ac286ad-2a3d-9"]</p>
<h3>Increase Productivity</h3>
<p class="lead">Kant is an elegant multi-purpose template that is big, bold and beautiful.</p>
<p class="mb-50">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
<p>[/tm_feature_sections][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
