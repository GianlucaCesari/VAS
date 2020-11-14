<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "3 Col Footer with Subscribe Form Top", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_footer_layout_templates tm-tmp_3-col-footer-with-subscribe-form-top tm-tmp-category_three-columns';
$thememountain_data['content'] = <<<CONTENT
[vc_row equalize="true" columns_on_tablet="keep" clear_all_padding="yes"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-top" column_offset="" column_push="" column_pull="" width="1/2"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p class="mb-0"><img class="alignnone wp-image-7583" src="https://wpdev.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2017/08/logo.png" width="100" height="41" /></p>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/2"][tm_textblock textarea_html_bkg_color="#ffffff"][tm_content_mailchimp_form hide_name_field="true" hide_lastname_field="true" form_alignment="left" form_format="stacked" form_size="medium" form_corner_style="" email_field_placeholder="Email address*" fname_field_placeholder="First name*" lname_field_placeholder="Last name*" button_label="Subscribe" button_background_color="#3fb58b" button_background_color_hover="#33363a" button_border_color="#3fb58b" button_border_color_hover="#33363a" button_label_color="#fff" button_label_color_hover="#fff" form_background_color="rgba(0,0,0,0)" form_border_color="#eee" form_placeholder_color="#7a7d84" form_focus_background_color="rgba(0,0,0,0)" form_focus_border_color="#3fb58b" form_focus_text_color="#3fb58b" form_error_background_color="rgba(0,0,0,0)" form_error_border_color="#3fb58b" form_error_text_color="#fff" checkbox_radio_background_color="rgba(0,0,0,0)" checkbox_radio_border_color="#eee" checkbox_checked_background_color="#3fb58b" checkbox_checked_color="#fff" checkbox_error_border_color="#3fb58b" response_message_text_color="inherit" hide_initial_response_message="false" button_width="false" initial_response_message="We don't spam." el_id="" el_class=""][/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" clear_all_padding="yes"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_divider border_color="#333333"][/vc_column][/vc_row][vc_row columns_on_tablet="force_2" clear_all_padding="yes"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="5/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>About Us</h4>
We&rsquo;re passionate about building simple, unique and functional websites that employ the latest technologies and standards. Our goal is to provide solid, simple to use, and beautiful looking products.[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="1" column_push="" column_pull="" width="3/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>Useful Links</h4>
<ul class="list-unstyled">
 	<li><a href=''>ThemeForest Profile</a></li>
 	<li><a href=''>Our Website</a></li>
 	<li><a href=''>The Blog</a></li>
 	<li><a href=''>Visit Support</a></li>
 	<li><a href=''>Pre-purchase Question</a></li>
</ul>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="3/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>Come Visit Us</h4>
126-130 Crosby Street, Soho
New York City, NY 10012, U.S.
<p class="mb-10"><a href=''>info@thememountain.com</a></p>
[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="0" padding_bottom="10"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p style="text-align: left;">&copy; ThemeMountain. All Rights Reserved. View <a href=''>Privacy Policy</a> and <a href=''>Cookie Policy</a></p>
[/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
