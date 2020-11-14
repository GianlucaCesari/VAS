<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Hero with simple caption", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_hero-with-simple-caption tm-tmp-category_heros';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row equalize="true" columns_on_tablet="keep" use_background="yes" background_color="" add_overlay="true" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-product-3-1@2x.jpg"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_textblock textarea_html_bkg_color="#939393"]</p>
<h2 class="mb-10"><span style="color: #ffffff">Simple Pricing Options</span></h2>
<p class="lead"><span style="color: #ffffff">From small single man teams to large organizations.</span></p>
<p>[/tm_textblock][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
