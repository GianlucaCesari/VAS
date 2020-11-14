<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Three col stats with lead", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_three-col-stats-with-lead tm-tmp-category_stats';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row columns_on_tablet="keep" use_background="yes" background_color="#f8f8f8" el_id="intro"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][vc_row_inner columns_on_tablet="keep" padding_top="0" padding_bottom="30"][vc_column_inner h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="2" column_push="" column_pull="" width="8/12"][tm_textblock textarea_html_bkg_color="#ffffff"]</p>
<p class="lead">We design identities, build websites, create web and mobile applications, illustrate and create typography.</p>
<p>[/tm_textblock][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_stats_holder tabs_id="tabs-1522747052-49" is_boxed="true" border_style="rounded" box_size="large" background_color="#33363a" border_color="#33363a"][tm_stats_item title="Startups" stat_from="1110" stat_to="1234" stat_measure="+" description="Active startups at Kant" use_second_row="" stat_font_size="50px" stat_color="#ffffff" stat_description_color="#ffffff" tab_id="tab-1505388294-1-56d230-4e1a88be-d77b47b7-24055458-f269"][/tm_stats_item][tm_stats_item title="Funding" stat_from="244" stat_to="350" stat_measure="K" description="Average startup funding" use_second_row="" stat_font_size="50px" stat_color="#ffffff" stat_description_color="#ffffff" tab_id="tab_id-1505389351309-6d230-4e1a88be-d77b47b7-24055458-f269"][/tm_stats_item][tm_stats_item title="Awards" stat_from="365" stat_to="645" stat_measure="K" description="Mentions on social media" use_second_row="" stat_font_size="50px" stat_color="#ffffff" stat_description_color="#ffffff" tab_id="tab_id-1505389424670-5d230-4e1a88be-d77b47b7-24055458-f269"][/tm_stats_item][/tm_stats_holder][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
