<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Centered three col feature columns with intro", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_centered-three-col-feature-columns-with-intro tm-tmp-category_content';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][vc_row_inner columns_on_tablet="keep" padding_top="0" padding_bottom="40"][vc_column_inner h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="2" column_push="" column_pull="" width="8/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h2>Here's How</h2>
[/tm_textblock][tm_textblock textarea_html_bkg_color="#ffffff"]
<p class="lead">With a dedicated team and highly tailored services we ensure a calculated result each and every time. Have questions relating to the process, just get in touch with us.</p>
[/tm_textblock][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/3"][tm_feature_columns icon_id="tm-entypo-icon-list" textarea_html_bkg_color="#ffffff" icon_alignment="center" label_color="#3fb58b" label_color_hover="#3fb58b" slide_id="01314186-0f70-10"]
<h5>Find A Trip</h5>
Use feature columns to highlight key information of one or multiple sections. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.[/tm_feature_columns][/vc_column_inner][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/3"][tm_feature_columns icon_id="tm-entypo-icon-ticket" textarea_html_bkg_color="#ffffff" icon_alignment="center" label_color="#3fb58b" label_color_hover="#3fb58b" slide_id="01314186-0f70-10"]
<h5>Save Boardingpass</h5>
Use feature columns to highlight key information of one or multiple sections. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.[/tm_feature_columns][/vc_column_inner][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/3"][tm_feature_columns icon_id="tm-entypo-icon-aircraft-take-off" textarea_html_bkg_color="#ffffff" icon_alignment="center" label_color="#3fb58b" label_color_hover="#3fb58b" slide_id="01314186-0f70-10"]
<h5>Check-in &amp; Fly</h5>
Use feature columns to highlight key information of one or multiple sections. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.[/tm_feature_columns][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );