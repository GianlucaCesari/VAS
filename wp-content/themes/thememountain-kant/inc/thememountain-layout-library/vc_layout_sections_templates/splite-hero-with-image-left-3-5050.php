<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Splite hero with image left 3 (50/50)", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_splite-hero-with-image-left-3-5050 tm-tmp-category_heros';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_bottom="50" use_background="yes" background_color="#f8f8f8"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_hero_5 height="custom" height_custom="600" media_content_type="image" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-half-1@2x-2.jpg" textarea_html_bkg_color="#ffffff" text_color="#666666" overlay_background_color="rgba(0,0,0,0.01)"]
<h3>We're A Cool Bunch, Contact us</h3>
<p class="lead text-large color-theme mb-50">We'd love to hear about your project and help you achieve its full potential.</p>
Kant is focused around 8 unique concepts with 3 variations each. Kant has got you covered whether you are a startup or established business.[/tm_hero_5][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
