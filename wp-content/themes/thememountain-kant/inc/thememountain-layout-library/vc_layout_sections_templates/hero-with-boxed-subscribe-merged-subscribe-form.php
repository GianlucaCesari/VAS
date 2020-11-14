<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Hero with boxed subscribe, merged subscribe form", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_hero-with-boxed-subscribe-merged-subscribe-form tm-tmp-category_forms';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="150" padding_bottom="150" use_background="yes" background_color="#ffffff" add_overlay="true" overlay_background_color="rgba(0,0,0,0.1)" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/signup-5@2x.jpg"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" style="boxed_round" box_size="custom" box_top_bottom_padding="40" box_left_right_padding="50" box_background_color="#ffffff" box_background_color_hover="#ffffff" box_border_color="#ffffff" box_border_color_hover="#ffffff" column_offset="1" column_push="" column_pull="" width="10/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3 class="">Always Get The Latest</h3>
Subscribe to Onboard and get the latest notifications and updates. We take spamming seriously.

[tm_content_mailchimp_form hide_name_field="false" hide_lastname_field="true" form_alignment="left" form_format="horizontal_merged" form_size="medium" form_corner_style="" email_field_placeholder="Email address*" fname_field_placeholder="First name*" lname_field_placeholder="Last name*" button_label="Subscribe" button_background_color="" button_background_color_hover="" button_border_color="" button_border_color_hover="" button_label_color="" button_label_color_hover="" form_background_color=" form_border_color="" form_placeholder_color="" form_focus_background_color="" form_focus_border_color="" form_focus_text_color="" form_error_background_color="" form_error_border_color="" form_error_text_color="" checkbox_radio_background_color="" checkbox_radio_border_color="" checkbox_checked_background_color="" checkbox_checked_color="" checkbox_error_border_color="" response_message_text_color="" hide_initial_response_message="false" button_width="false" initial_response_message="We don't spam." el_id="" el_class=""][/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
