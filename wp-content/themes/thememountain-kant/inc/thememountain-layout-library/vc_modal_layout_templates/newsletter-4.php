<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Newsletter 4", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_modal_layout_templates tm-tmp_newsletter-4 tm-tmp-category_newsletter';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="40" padding_bottom="10" use_background="yes" background_color="#ffffff" add_overlay="true" overlay_background_color="rgba(63,181,139,0.7)" image_source="image_url" image_url="https://wpdev.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2017/10/project-6-landscape-large.jpg" use_overlay_background_color="true"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_textblock textarea_html_bkg_color="#999999"]
<h3 class="mb-30"><span style="color: #ffffff;">A Modal with Background
Image &amp; Subscribe Form</span></h3>
<span style="color: #ffffff;">Build elegant modals using our unique shortcodes. All our shortcodes can be used in our modals.</span>

[tm_content_mailchimp_form hide_name_field="false" hide_lastname_field="true" form_alignment="left" form_format="stacked" form_size="medium" form_corner_style="" email_field_placeholder="Email address*" fname_field_placeholder="First name*" lname_field_placeholder="Last name*" button_label="Sign Up" button_background_color="" button_background_color_hover="" button_border_color="" button_border_color_hover="" button_label_color="" button_label_color_hover="" form_background_color="" form_border_color="" form_placeholder_color="" form_focus_background_color="" form_focus_border_color="" form_focus_text_color="" form_error_background_color="" form_error_border_color="" form_error_text_color="" checkbox_radio_background_color="" checkbox_radio_border_color="" checkbox_checked_background_color="" checkbox_checked_color="" checkbox_error_border_color="" response_message_text_color="#fff" hide_initial_response_message="false" button_width="false" initial_response_message="We don't spam." el_id="" el_class=""][/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
