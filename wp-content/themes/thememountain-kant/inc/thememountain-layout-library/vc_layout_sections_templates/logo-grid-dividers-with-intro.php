<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Logo grid (dividers) with intro", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_logo-grid-dividers-with-intro tm-tmp-category_logos';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row force_fullwidth="true" columns_on_tablet="keep"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][vc_row_inner columns_on_tablet="keep" padding_top="0" padding_bottom="40"][vc_column_inner h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="2" column_push="" column_pull="" width="8/12"][tm_textblock textarea_html_bkg_color="#ffffff"]</p>
<h3 class="mb-40">You're In Great Company</h3>
<p class="lead">We've been lucky enough to work with some of the best companies in the world, and we'd love for you to join the list.</p>
<p>[/tm_textblock][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_logos items_per_row="5" logo_type="4" logos_id="6442,6443,6444,6445,6157,6156,6155,6154,6152,6151"][/tm_logos][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
