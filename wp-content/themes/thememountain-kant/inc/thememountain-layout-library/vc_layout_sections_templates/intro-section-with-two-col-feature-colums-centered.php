<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Intro section with two col feature colums centered", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_intro-section-with-two-col-feature-colums-centered tm-tmp-category_content';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" el_id="intro"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][vc_row_inner columns_on_tablet="keep" padding_top="0" padding_bottom="40"][vc_column_inner h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="2" column_push="" column_pull="" width="8/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p class="lead">We've built a product that makes your startup look professional, elegant and focused. Start building a beautiful site today.</p>
[/tm_textblock][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="1" column_push="" column_pull="" width="5/12"][tm_feature_columns icon_id="tm-entypo-icon-back-in-time" textarea_html_bkg_color="#ffffff" slide_id="f69fe512-3a24-7"]
<h4>Auto Backup</h4>
To help you get started with your web app landing or homepage, we&rsquo;ve provided 4 variations of the web app concept, including a one-page demo as well.[/tm_feature_columns][/vc_column_inner][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="5/12"][tm_feature_columns icon_id="tm-entypo-icon-fingerprint" textarea_html_bkg_color="#ffffff" label_color="#666666" label_color_hover="#666666" slide_id="f69fe512-3a24-7"]
<h4>Two Level Security</h4>
Want to make a layout your own. No problem, we&rsquo;ve prepared every section as a separate element that you can insert and modify using Visual Composer Page Builder.[/tm_feature_columns][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="1" column_push="" column_pull="" width="5/12"][tm_feature_columns icon_id="tm-entypo-icon-upload-to-cloud" textarea_html_bkg_color="#ffffff" slide_id="f69fe512-3a24-7"]
<h4>Instant Uploads</h4>
To help you get started with your web app landing or homepage, we&rsquo;ve provided 4 variations of the web app concept, including a one-page demo as well.[/tm_feature_columns][/vc_column_inner][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="5/12"][tm_feature_columns icon_id="tm-entypo-icon-github" textarea_html_bkg_color="#ffffff" label_color="#666666" label_color_hover="#666666" slide_id="f69fe512-3a24-7"]
<h4>GitHub Repos</h4>
Want to make a layout your own. No problem, we&rsquo;ve prepared every section as a separate element that you can insert and modify using Visual Composer Page Builder.[/tm_feature_columns][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
