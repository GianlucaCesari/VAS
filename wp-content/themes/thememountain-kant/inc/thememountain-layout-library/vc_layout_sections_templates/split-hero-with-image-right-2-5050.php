<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Split hero with image right 2 (50/50)", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_split-hero-with-image-right-2-5050 tm-tmp-category_heros';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row columns_on_tablet="keep"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_hero_5 height="auto" media_content_type="image" image_source="image_url" image_url="https://wpdev.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-half-1@2x.jpg" textarea_html_bkg_color="#ffffff" media_alignment="right" text_color="" overlay_background_color="rgba(0,0,0,0.01)" media_animation="slideInRightLong" content_animation="turnInRight"]</p>
<h3 class="mb-30">Design &amp; Ilustration</h3>
<p class="mb-50">Morbi nec ultrices tellus. Fusce id est quis orci faucibus congue. Aliquam erat volutpat. Phasellus tortor velit, ornare at ullamcorper at. Ut enim ad minim veniam.</p>
<h5>Identity</h5>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
<h5>Typesetting</h5>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.[/tm_hero_5][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
