<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Hero with subscribe form left", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_hero-with-subscribe-form-left tm-tmp-category_forms';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#f8f8f8" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/signup-2@2x.jpg"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="5/12"][tm_textblock textarea_html_bkg_color="#7c7c7c"]
<h3 class=""><span style="color: #ffffff;">Always Get The Latest</span></h3>
<span style="color: #ffffff;">Subscribe to Onboard and get the latest notifications and updates. We take spamming seriously.</span>

[tm_content_mailchimp_form hide_name_field="true" hide_lastname_field="true" form_alignment="left" form_format="stacked" form_size="medium" form_corner_style="" email_field_placeholder="Email address*" fname_field_placeholder="First name*" lname_field_placeholder="Last name*" button_label="Subscribe" button_background_color="#33363a" button_background_color_hover="#3fb58b" button_border_color="#33363a" button_border_color_hover="#3fb58b" button_label_color="#fff" button_label_color_hover="#fff" form_background_color="rgba(255,255,255,0.2)" form_border_color="rgba(255,255,255,0.2)" form_placeholder_color="#fff" form_focus_background_color="#fff" form_focus_border_color="#eee" form_focus_text_color="#fff" form_error_background_color="rgba(255,255,255,0.2)" form_error_border_color="#fff" form_error_text_color="#fff" checkbox_radio_background_color="rgba(255,255,255,0.2)" checkbox_radio_border_color="rgba(255,255,255,0.2)" checkbox_checked_background_color="" checkbox_checked_color="" checkbox_error_border_color="#fff" response_message_text_color="#fff" hide_initial_response_message="false" button_width="false" initial_response_message="We don't spam." el_id="" el_class=""][/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );