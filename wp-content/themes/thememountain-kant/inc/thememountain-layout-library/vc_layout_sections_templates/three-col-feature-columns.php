<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Three col feature columns", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_three-col-feature-columns tm-tmp-category_feature-columns';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" el_id="brief"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/3"][tm_feature_columns icon_id="tm-entypo-icon-water" textarea_html_bkg_color="#ffffff" icon_alignment="center" label_color="#33363a" label_color_hover="#33363a" slide_id="01314186-0f70-10"]
<h4>Waterproof</h4>
<h5><span style="color: #999999;">TO 300M</span></h5>
Use feature columns to highlight key information of one or multiple sections. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.[/tm_feature_columns][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/3"][tm_feature_columns icon_id="tm-entypo-icon-fingerprint" textarea_html_bkg_color="#ffffff" icon_alignment="center" label_color="#33363a" label_color_hover="#33363a" slide_id="01314186-0f70-10"]
<h4>Touch ID</h4>
<h5><span style="color: #999999;">2 LEVEL SECURITY</span></h5>
Use feature columns to highlight key information of one or multiple sections. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.[/tm_feature_columns][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/3"][tm_feature_columns icon_id="tm-entypo-icon-back-in-time" textarea_html_bkg_color="#ffffff" icon_alignment="center" label_color="#33363a" label_color_hover="#33363a" slide_id="01314186-0f70-10"]
<h4>Daily Backups</h4>
<h5><span style="color: #999999;">ON A DAILY BASIS</span></h5>
Use feature columns to highlight key information of one or multiple sections. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.[/tm_feature_columns][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
