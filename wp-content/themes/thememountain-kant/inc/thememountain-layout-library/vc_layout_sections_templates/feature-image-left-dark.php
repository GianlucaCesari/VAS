<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Feature image left dark", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_feature-image-left-dark tm-tmp-category_feature';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_bottom="0" use_background="yes" background_color="#232323"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_feature_sections image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/04/feature-images-3.jpg" textarea_html_bkg_color="#232323" media_alignment="right" media_animation="slideInLeftShort" slide_id="9a33354c-47e8-0"]
<h2 class="mb-30"><span style="color: #ffffff;">Customise Kant WordPress to Your Liking</span></h2>
<p class="lead"><span style="color: #999999;">Kant offers you the possibility to create custom headers and footer for any page.</span></p>
<span style="color: #999999;">This is useful for when you need to create unique concepts that require a completely different approach to navigation, content, and footers. Build an unlimited number of menus and custom footers to suit your needs.  </span>[/tm_feature_sections][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
