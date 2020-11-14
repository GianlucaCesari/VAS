<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Contact form with info left", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_contact-form-with-info-left tm-tmp-category_forms';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h2 class="mb-30">Let's Talk</h2>
Have a Pre-Purchase Question? We&rsquo;ll be happy to answer any questions you may have prior to purchase. Just get in touch with us.
<h5><span style="color: #808080;">Socialize With Us</span></h5>
[/tm_textblock][tm_icon icon_id="tm-entypo-icon-facebook-with-circle" link_icon="link_to_page" display_inline="true" label_color="" label_color_hover=""][tm_icon icon_id="tm-entypo-icon-twitter-with-circle" link_icon="link_to_page" display_inline="true" label_color="" label_color_hover=""][tm_icon icon_id="tm-entypo-icon-linkedin-with-circle" link_icon="link_to_page" display_inline="true" label_color="" label_color_hover=""][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="8/12"][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_contact_form_7 id="3629"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
