<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Logo grid with dividers", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_logo-grid-with-dividers tm-tmp-category_logos';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row columns_on_tablet="keep"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_logos items_per_row="5" logo_type="4" logos_id="7788,7787,7789,7993,6444,6443,6442,6155,6154,6156,6157,6152,6151,6445,6150"][/tm_logos][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
