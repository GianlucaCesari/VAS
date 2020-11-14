<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Three col feature columns with icons &amp; sub titles", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_three-col-feature-columns-with-icons-sub-titles tm-tmp-category_feature-columns';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/3"][tm_feature_columns icon_id="tm-entypo-icon-location" textarea_html_bkg_color="#ffffff" icon_alignment="center" label_color="#969aa1" label_color_hover="#969aa1" slide_id="01314186-0f70-10"]
<h3 class="mb-5">Pop On By</h3>
<h6 class="mb-30">MON-FRI 9:00 AM -10:00 PM</h6>
Just feel like visiting our uber cool offices &amp; have a chat about your next project or just see what we're currently working on.[/tm_feature_columns][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/3"][tm_feature_columns icon_id="tm-entypo-icon-phone" textarea_html_bkg_color="#ffffff" icon_alignment="center" label_color="#969aa1" label_color_hover="#969aa1" slide_id="01314186-0f70-10"]
<h3 class="mb-5">Give Us A Call</h3>
<h6 class="mb-30">+1 987 874 32 / EXT. 4</h6>
Get in touch with us and let's chat about your next project and how to reach its full potential. We're available on the phone Mon thru. Thur.[/tm_feature_columns][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/3"][tm_feature_columns icon_id="tm-entypo-icon-twitter" textarea_html_bkg_color="#ffffff" icon_alignment="center" label_color="#969aa1" label_color_hover="#969aa1" slide_id="01314186-0f70-10"]
<h3 class="mb-5">Chat With Us</h3>
<h6 class="mb-30">@THEMEMOUNTAINCO</h6>
Just want to have a chant, hit us up on Twitter with any questions or comments and we'll respond to you right away![/tm_feature_columns][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
