<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "3 Col Footer with Links &amp; Address", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_footer_layout_templates tm-tmp_3-col-footer-with-links-address tm-tmp-category_three-columns';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="force_2" clear_all_padding="yes"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="5/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>Kant Ecommerce</h4>
We&rsquo;re passionate about building simple, unique and functional websites that employ the latest technologies and standards. Our goal is to provide solid, simple to use, and beautiful looking products.[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="1" column_push="" column_pull="" width="3/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>Useful Links</h4>
<ul class="list-unstyled">
 	<li><a href=''>ThemeForest Profile</a></li>
 	<li><a href=''>Our Website</a></li>
 	<li><a href=''>The Blog</a></li>
 	<li><a href=''>Visit Support</a></li>
 	<li><a href=''>Pre-purchase Question</a></li>
 	<li></li>
</ul>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="3/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>Come Visit Us</h4>
<p class="mb-10">126-130 Crosby Street, Soho
New York City, NY 10012, U.S.</p>
<a href=''>info@thememountain.com</a>
<a class="no-margin-right" href=''>TWITTER</a>|<a href=''>FACEBOOK</a>[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="20" padding_bottom="10"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p style="text-align: left">&copy; ThemeMountain. All Rights Reserved.</p>
[/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
