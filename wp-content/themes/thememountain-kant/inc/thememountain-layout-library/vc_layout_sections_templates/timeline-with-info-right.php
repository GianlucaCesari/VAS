<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Timeline with info right", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_timeline-with-info-right tm-tmp-category_timeline';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row columns_on_tablet="keep"][vc_column h_text_align="left" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="7" column_pull="" width="5/12"][tm_textblock textarea_html_bkg_color="#ffffff"]</p>
<h3 class="mb-mobile-40">I've worked for some great companies before working for ThemeMountain, here's a brief.</h3>
<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
<p>[/tm_textblock][tm_button margin_bottom="0" margin_bottom_mobile="40" icon_id="tm-entypo-icon-download" button_label="Download Full List" button_size="medium"][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="5" width="7/12"][tm_timeline_holder slider_id="fullscreen-1526148322-1" dot_bkg_color="#3fb58b" dot_border_color="#3fb58b" line_bkg_color="#eeeeee" date_color="#3fb58b" title="Experience"][tm_timeline_item textarea_html_bkg_color="#ffffff" title="2010" tab_id="1526148321893-3"]</p>
<h4>Front-end Developer Danone</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.[/tm_timeline_item][tm_timeline_item textarea_html_bkg_color="#ffffff" title="2015" tab_id="tab_id-1526148629847-7"]</p>
<h4>Front-end Developer Nike</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.[/tm_timeline_item][tm_timeline_item textarea_html_bkg_color="#ffffff" title="2016" tab_id="tab_id-1526148657679-3"]</p>
<h4>Front-end Developer Danone</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.[/tm_timeline_item][tm_timeline_item textarea_html_bkg_color="#ffffff" title="2018" tab_id="tab_id-1526148757096-4"]</p>
<h4>Front-end Developer ThemeMountain</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.[/tm_timeline_item][/tm_timeline_holder][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
