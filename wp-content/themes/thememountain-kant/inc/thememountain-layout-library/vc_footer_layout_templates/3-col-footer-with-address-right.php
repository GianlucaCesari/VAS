<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "3 Col Footer with Address Right", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_footer_layout_templates tm-tmp_3-col-footer-with-address-right tm-tmp-category_three-columns';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" clear_all_padding="yes"][vc_column h_text_align="left" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>Kant.</h3>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="2" column_push="" column_pull="" width="3/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<ul>
 	<li><a href=''>ThemeForest Profile</a></li>
 	<li><a href=''>Our Website</a></li>
 	<li><a href=''>The Blog</a></li>
 	<li><a href=''>Visit Support</a></li>
 	<li><a href=''>Pre-purchase Question</a></li>
</ul>
[/tm_textblock][/vc_column][vc_column h_text_align="right" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="3/12"][tm_textblock textarea_html_bkg_color="#ffffff"]

126-130 Crosby Street, Soho
New York City, NY 10012, U.S.
Tel: + 44 543 22 343
Email: <a href=''>info@thememountain.com</a>

[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="0" padding_bottom="10"][vc_column h_text_align="left" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p style="text-align: left">&copy; ThemeMountain. All Rights Reserved.</p>
[/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
