<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "3 Col Footer with SNS Links Left", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_footer_layout_templates tm-tmp_3-col-footer-with-sns-links-left tm-tmp-category_three-columns';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="force_2" padding_top="0" padding_bottom="10"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="6/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>Kant</h4>
+1 324 245 879
<a href=''>info@thememountain.com</a>

[/tm_textblock][tm_icon icon_id="tm-entypo-icon-facebook-with-circle" link_icon="link_to_page" link_url="https://www.facebook.com/thememountain/" link_target="_blank" display_inline="true"][tm_icon icon_id="tm-entypo-icon-twitter-with-circle" link_icon="link_to_page" link_url="https://www.twitter.com/thememountainco/" link_target="_blank" display_inline="true"][tm_icon icon_id="tm-entypo-icon-instagram-with-circle" link_icon="link_to_page" link_url="https://www.instagram.com/thememountain/" link_target="_blank" display_inline="true"][tm_icon icon_id="tm-entypo-icon-youtube-with-circle" link_icon="link_to_page" link_url="https://www.youtube.com/channel/UCw6fJ2uosyoeWTO910DugtQ" link_target="_blank" display_inline="true"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p style="text-align: left">&copy; ThemeMountain. All Rights Reserved</p>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="3/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>Useful Links</h4>
<ul>
 	<li><a href=''>ThemeForest Profile</a></li>
 	<li><a href=''>Our Website</a></li>
 	<li><a href=''>The Blog</a></li>
 	<li><a href=''>Visit Support</a></li>
 	<li><a href=''>Pre-purchase Question</a></li>
</ul>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="3/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>About Us</h4>
We&rsquo;re passionate about building simple, unique and functional websites that employ the latest technologies and standards.[/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
