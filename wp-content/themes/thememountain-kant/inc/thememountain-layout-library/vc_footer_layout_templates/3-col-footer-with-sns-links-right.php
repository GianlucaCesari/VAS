<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "3 Col Footer with SNS Links Right", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_footer_layout_templates tm-tmp_3-col-footer-with-sns-links-right tm-tmp-category_three-columns';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" clear_all_padding="yes"][vc_column h_text_align="left" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="3/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4><strong>Kant.</strong>
Personal Concept</h4>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<ul>
 	<li><a href=''>ThemeForest Profile</a></li>
 	<li><a href=''>Our Website</a></li>
 	<li><a href=''>The Blog</a></li>
 	<li><a href=''>Visit Support</a></li>
 	<li><a href=''>Pre-purchase Question</a></li>
</ul>
[/tm_textblock][/vc_column][vc_column h_text_align="right" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="5/12"][tm_icon margin_bottom="5" margin_bottom_mobile="5" icon_id="tm-entypo-icon-facebook-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="#666666" label_color_hover="#3fb58b"][tm_icon margin_bottom="5" margin_bottom_mobile="5" icon_id="tm-entypo-icon-twitter-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="#666666" label_color_hover="#3fb58b"][tm_icon margin_bottom="5" margin_bottom_mobile="5" icon_id="tm-entypo-icon-dribbble-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="#666666" label_color_hover="#3fb58b"][tm_icon margin_bottom="5" margin_bottom_mobile="5" icon_id="tm-entypo-icon-vimeo-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="#666666" label_color_hover="#3fb58b"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p style="text-align: right">All photography is the property of
respective photographers.
&copy; ThemeMountain. All Rights Reserved.</p>
[/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
