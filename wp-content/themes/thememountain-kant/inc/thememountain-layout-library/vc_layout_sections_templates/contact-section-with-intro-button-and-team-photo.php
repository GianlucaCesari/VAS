<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Contact section with intro, button and team photo", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_contact-section-with-intro-button-and-team-photo tm-tmp-category_content';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_bottom="0"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="2" column_push="" column_pull="" width="8/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h2>Have some pre-sale questions?</h2>
<p class="mb-50">With every purchase of a ThemeMountain product you get 6 months premium support! We provide our customers with friendly, timely, and carefully detailed support. For any pre-sale questions, please contact us through our profile.</p>
[/tm_textblock][tm_button margin_bottom="0" margin_bottom_mobile="0" link_to="modal" icon_id="tm-entypo-icon-chat" button_label="Get in touch today!" modal_target="3949" button_size="medium"][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_image margin_bottom="0" margin_bottom_mobile="0" image_source="image_url" image_url="https://wpdev.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-product-4.jpg" link_image="none" textarea_html_bkg_color="#ffffff" caption_type=""][/tm_image][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
