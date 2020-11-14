<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Six col logo grid", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_six-col-logo-grid tm-tmp-category_logos';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row columns_on_tablet="keep" padding_top="40" padding_bottom="40"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_logos items_per_row="6" logos_id="6443,6445,7993,6157,7788,7787"][/tm_logos][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
