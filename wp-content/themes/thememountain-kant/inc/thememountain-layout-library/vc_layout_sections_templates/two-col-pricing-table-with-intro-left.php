<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Two col pricing table with intro left", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_two-col-pricing-table-with-intro-left tm-tmp-category_pricing-tables';
$thememountain_data['content'] = <<<CONTENT
[vc_row equalize="true" columns_on_tablet="keep" padding_top="120"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3 class="mb-50">Smart Simple Pricing</h3>
Aligning your product roadmap with company goals. Your product roadmap tells a story. It shows where your product is today, where it&rsquo;s headed, and how it&rsquo;s going to get there.[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="8/12"][tm_pricing_table_holder table_content_alignment="center" table_header_bottom_padding="0" table_price_bottom_padding="0" border_color="rgba(255,255,255,0.01)"][tm_pricing_table_item display_interval_on_new_line="true" icon_for_options="true" textarea_html_bkg_color="#ffffff" is_callout="true" show_column_button="true" link_target="_self" button_bkg_color="#3fb58b" bkg_color_hover="#33363a" border_color="#3fb58b" border_color_hover="#33363a" label_color="#ffffff" label_color_hover="#ffffff" title="Startup" tab_id="table-152595467113" table_price="12" table_currency="$" table_interval="per month" table_footer_text="See Full Details" link_url="#"]
<ul>
 	<li> 30-day free trial</li>
 	<li> 5 Team Accounts</li>
 	<li><del> Custom Domain</del></li>
 	<li><del> Custom Branding</del></li>
</ul>
[/tm_pricing_table_item][tm_pricing_table_item display_interval_on_new_line="true" icon_for_options="true" textarea_html_bkg_color="#ffffff" is_callout="" show_column_button="true" link_target="_self" button_bkg_color="#33363a" bkg_color_hover="#3fb58b" border_color="#33363a" border_color_hover="#3fb58b" label_color="#ffffff" label_color_hover="#ffffff" title="Organization" tab_id="tab_id-1525954942476-2" table_price="85" table_currency="$" table_interval="per month" table_footer_text="See Full Details" link_url="#"]
<ul>
 	<li>30-day free trial</li>
 	<li> 25 Team Accounts</li>
 	<li> Custom Domain</li>
 	<li> Custom Branding</li>
</ul>
[/tm_pricing_table_item][/tm_pricing_table_holder][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
