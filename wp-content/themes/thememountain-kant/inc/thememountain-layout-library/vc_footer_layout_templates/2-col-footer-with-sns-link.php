<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "2 Col Footer with SNS Link", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_footer_layout_templates tm-tmp_2-col-footer-with-sns-link tm-tmp-category_two-columns';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="0" padding_bottom="0"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="6/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>Kant&trade;</h3>
[/tm_textblock][/vc_column][vc_column h_text_align="right" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="2" column_push="" column_pull="" width="4/12"][tm_icon margin_bottom="0" margin_bottom_mobile="0" icon_id="tm-entypo-icon-twitter-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="#666666" label_color_hover="#666666"][tm_icon margin_bottom="0" margin_bottom_mobile="0" icon_id="tm-entypo-icon-dribbble-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="#666666" label_color_hover="#666666"][tm_icon margin_bottom="0" margin_bottom_mobile="0" icon_id="tm-entypo-icon-facebook-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="#666666" label_color_hover="#666666"][/vc_column][/vc_row][vc_row columns_on_tablet="keep" clear_all_padding="yes"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_divider border_color="#333333"][/vc_column][/vc_row][vc_row equalize="true" columns_on_tablet="keep" padding_top="0" padding_bottom="10"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p class="mb-10" style="text-align: left">&copy; ThemeMountain. All Rights Reserved.</p>
[/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
