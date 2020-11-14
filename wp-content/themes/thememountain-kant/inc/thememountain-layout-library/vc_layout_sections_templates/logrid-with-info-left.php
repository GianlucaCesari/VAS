<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Logrid with info left", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_logrid-with-info-left tm-tmp-category_logos';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row equalize="true" columns_on_tablet="keep" padding_bottom="110" use_background="yes" background_color="#3fb58b"][vc_column h_text_align="left" h_text_align_mobile="center-on-mobile" v_align="v-align-top" column_offset="" column_push="" column_pull="" width="5/12"][tm_textblock textarea_html_bkg_color="#3fb58b"]</p>
<h3 class="mb-mobile-40"><span style="color: #ffffff">Here are some awesome brands and people that I've worked with in the past.</span></h3>
<p><span style="color: #ffffff">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </span></p>
<p>[/tm_textblock][tm_button margin_bottom="0" margin_bottom_mobile="40" icon_id="tm-entypo-icon-download" button_label="Download Full List" button_size="medium" bkg_color="rgba(0,0,0,0.01)" bkg_color_hover="#ffffff" border_color="#ffffff" border_color_hover="#ffffff" label_color="#ffffff" label_color_hover="#3fb58b"][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="7/12"][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_logos logo_type="3" border_bkg_color_hover="rgba(255,255,255,0.2)" logo_bkg_color_hover="rgba(10,10,10,0.1)" logos_id="6582,6583,6584,6585,6586,6587,6588,6589,6590"][/tm_logos][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
