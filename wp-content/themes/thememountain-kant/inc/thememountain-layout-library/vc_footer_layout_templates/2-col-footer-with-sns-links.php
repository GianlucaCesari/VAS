<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "2 Col Footer with SNS Links", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_footer_layout_templates tm-tmp_2-col-footer-with-sns-links tm-tmp-category_single-columns';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="0" padding_bottom="10"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="2" column_push="" column_pull="" width="8/12"][tm_image image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2017/08/logo.png" image_width="100" link_image="none" textarea_html_bkg_color="#ffffff" caption_type=""][/tm_image][tm_textblock textarea_html_bkg_color="#ffffff"]
<p style="text-align: center">An awesome app for productive people</p>
[/tm_textblock][tm_icon icon_id="tm-entypo-icon-facebook-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="#666666" label_color_hover="#666666"][tm_icon icon_id="tm-entypo-icon-twitter-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="#666666" label_color_hover="#666666"][tm_icon icon_id="tm-entypo-icon-youtube-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="#666666" label_color_hover="#666666"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p style="text-align: center">&copy; ThemeMountain. All Rights Reserved.</p>
[/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
