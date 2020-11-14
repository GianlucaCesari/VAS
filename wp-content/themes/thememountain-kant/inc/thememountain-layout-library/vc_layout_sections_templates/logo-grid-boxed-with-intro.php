<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Logo grid (boxed) with intro", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_logo-grid-boxed-with-intro tm-tmp-category_logos';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#f2f2f2"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][vc_row_inner columns_on_tablet="keep" padding_top="0" padding_bottom="40"][vc_column_inner h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="2" column_push="" column_pull="" width="8/12"][tm_textblock textarea_html_bkg_color="#f2f2f2"]
<h3>We're sponsored by some of the greatest people in tech</h3>
<p class="lead">Apply for our incubator and receive top-of-the-line advice from people that have turned startups into multimillion dollar companies.</p>
[/tm_textblock][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_logos items_per_row="5" logo_type="2" bkg_color_logo="#ffffff" bkg_color_logo_hover="#ffffff" logos_id="7789,6156,6155,7993,6157,6152,6443,6445,7788,7787"][/tm_logos][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
