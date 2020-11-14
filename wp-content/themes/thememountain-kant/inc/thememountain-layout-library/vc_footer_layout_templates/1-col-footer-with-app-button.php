<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "1 Col Footer with App Button", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_footer_layout_templates tm-tmp_1-col-footer-with-app-button tm-tmp-category_single-columns';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="0" padding_bottom="20"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="3" column_push="" column_pull="" width="6/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>Kant</h3>
We&rsquo;re passionate about building simple, unique and functional websites that employ the latest technologies and standards. Our goal is to provide solid, simple to use, and beautiful looking products.

[/tm_textblock][tm_divider border_color="rgba(255,255,255,0.2)"][tm_button margin_bottom="0" margin_bottom_mobile="40" icon_id="tm-entypo-icon-app-store" button_type="app" button_label="AppStore" link_url="#" button_size="medium" bkg_color="rgba(255,255,255,0.01)" bkg_color_hover="#3fb58b" border_color="rgba(255,255,255,0.2)" border_color_hover="#3fb58b" label_color="#ffffff" label_color_hover="#ffffff" button_sub_label="Download on The"][/vc_column][/vc_row][vc_row equalize="true" columns_on_tablet="keep" padding_top="0" padding_bottom="40"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="3" column_push="" column_pull="" width="6/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p class="mb-10">&copy; ThemeMountain. All Rights Reserved.</p>
[/tm_textblock][tm_icon margin_bottom="0" margin_bottom_mobile="0" icon_id="tm-entypo-icon-facebook-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="#666666" label_color_hover="#666666"][tm_icon margin_bottom="0" margin_bottom_mobile="0" icon_id="tm-entypo-icon-twitter-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="#666666" label_color_hover="#666666"][tm_icon margin_bottom="0" margin_bottom_mobile="0" icon_id="tm-entypo-icon-dribbble-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="#666666" label_color_hover="#666666"][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
