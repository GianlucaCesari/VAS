<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Hero with centered subscribe form(name &amp; email)", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_hero-with-centered-subscribe-formname-email tm-tmp-category_forms';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#ffffff" add_overlay="true" overlay_background_color="rgba(0,0,0,0.5)" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/signup-3@2x-3.jpg"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="3" column_push="" column_pull="" width="6/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3 class=""><span style="color: #ffffff;">Always Get The Latest</span></h3>
<span style="color: #ffffff;">Subscribe to Onboard and get the latest notifications and updates. We take spamming seriously.</span>

[tm_content_mailchimp_form hide_name_field="false" hide_lastname_field="true" form_alignment="left" form_format="stacked" form_size="medium" form_corner_style="" email_field_placeholder="Email address*" fname_field_placeholder="First name*" lname_field_placeholder="Last name*" button_label="Subscribe" button_background_color="#33363a" button_background_color_hover="#3fb58b" button_border_color="#33363a" button_border_color_hover="#3fb58b" button_label_color="#fff" button_label_color_hover="#fff" form_background_color="#fff" form_border_color="#fff" form_placeholder_color="#33363a" form_focus_background_color="#fff" form_focus_border_color="#3fb58b" form_focus_text_color="#3fb58b" form_error_background_color="#fff" form_error_border_color="#fff" form_error_text_color="#3fb58b" checkbox_radio_background_color="" checkbox_radio_border_color="" checkbox_checked_background_color="" checkbox_checked_color="" checkbox_error_border_color="" response_message_text_color="#fff" hide_initial_response_message="false" button_width="false" initial_response_message="We don't spam." el_id="" el_class=""][/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
