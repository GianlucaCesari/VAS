<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Boxed subscribe section with info right", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_boxed-subscribe-section-with-info-right tm-tmp-category_forms';
$thememountain_data['content'] = <<<CONTENT
[vc_row equalize="true" columns_on_tablet="keep" use_background="yes" background_color="#f8f8f8"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" style="boxed_round" box_size="custom" box_top_bottom_padding="50" box_left_right_padding="50" box_background_color="#ffffff" box_background_color_hover="#ffffff" box_border_color="#ffffff" box_border_color_hover="#ffffff" box_shadow="true" column_offset="" column_push="" column_pull="" width="6/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3 class="mb-10">Subscribe To Newsletter</h3>
We only use your email for sending you offers.

[tm_content_mailchimp_form hide_name_field="false" hide_lastname_field="true" form_alignment="left" form_format="stacked" form_size="medium" form_corner_style="" email_field_placeholder="Email address*" fname_field_placeholder="First name*" lname_field_placeholder="Last name*" button_label="Subscribe" button_background_color="" button_background_color_hover="" button_border_color="" button_border_color_hover="" button_label_color="" button_label_color_hover="" form_background_color="" form_border_color="" form_placeholder_color="" form_focus_background_color="" form_focus_border_color="" form_focus_text_color="" form_error_background_color="" form_error_border_color="" form_error_text_color=""form_error_background_color="rgba(255,255,255,0.2)" form_error_border_color="" form_error_text_color="" checkbox_radio_background_color="" checkbox_radio_border_color="" checkbox_checked_background_color="" checkbox_checked_color="" checkbox_error_border_color="" response_message_text_color="" hide_initial_response_message="false" button_width="false" initial_response_message="We don't spam." el_id="" el_class=""][/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="1" column_push="" column_pull="" width="5/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p class="lead">Our subscribe forms integrate seamlessly with MailChimp, all you need is your email, list Id and API key.</p>

<h6>EMAIL SETUP</h6>
Quisque molestie elementum quam molestie malesuada. In sagittis urna vitae blandit molestie. Nam aliquet dui neque.
<h6>PRINT DESIGN</h6>
Quisque molestie elementum quam molestie malesuada. In sagittis urna vitae blandit molestie. Nam aliquet dui neque.[/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
