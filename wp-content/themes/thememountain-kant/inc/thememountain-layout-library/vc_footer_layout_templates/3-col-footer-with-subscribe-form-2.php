<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "3 Col Footer with Subscribe Form", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_footer_layout_templates tm-tmp_3-col-footer-with-subscribe-form-2 tm-tmp-category_three-columns';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="0" padding_bottom="40"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/2"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>About Us</h4>
Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

126-130 Crosby Street, Soho
New York City, NY 10012, U.S.
&copy; ThemeMountain. All Rights Reserved.
View <a href=''>Privacy Policy</a> and <a href=''>Cookie Policy</a>

[tm_social_share margin_bottom="0" margin_bottom_mobile="30" use_facebook="true" use_twitter="true" use_pinterest="true" use_googleplus="true" alignment="left" size="small" icon_color="" icon_color_hover="" el_id="" el_class=""][/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/2"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>Stay Updated</h4>
Always get the latest from Marquez Creative Studio. Signup and get our monthly newsletter about design trends and much more.[/tm_textblock][tm_textblock textarea_html_bkg_color="#ffffff"][tm_content_mailchimp_form hide_name_field="true" hide_lastname_field="true" form_alignment="left" form_format="stacked" form_size="medium" form_corner_style="" email_field_placeholder="Email address*" fname_field_placeholder="First name*" lname_field_placeholder="Last name*" button_label="Subscribe" button_background_color="#3fb58b" button_background_color_hover="#33363a" button_border_color="#3fb58b" button_border_color_hover="#33363a" button_label_color="#fff" button_label_color_hover="#fff" form_background_color="rgba(0,0,0,0)" form_border_color="#eee" form_placeholder_color="#7a7d84" form_focus_background_color="rgba(0,0,0,0)" form_focus_border_color="#3fb58b" form_focus_text_color="#3fb58b" form_error_background_color="rgba(0,0,0,0)" form_error_border_color="#3fb58b" form_error_text_color="#fff" checkbox_radio_background_color="rgba(0,0,0,0)" checkbox_radio_border_color="#eee" checkbox_checked_background_color="#3fb58b" checkbox_checked_color="#fff" checkbox_error_border_color="#3fb58b" response_message_text_color="inherit" hide_initial_response_message="false" button_width="false" initial_response_message="We don't spam." el_id="" el_class=""][/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
