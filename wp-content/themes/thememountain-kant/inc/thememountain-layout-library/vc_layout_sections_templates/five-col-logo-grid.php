<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Five col logo grid", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_five-col-logo-grid tm-tmp-category_logos';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="40" padding_bottom="40" use_background="yes" background_color="#f4f4f4"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_logos items_per_row="5" logos_id="6443,6445,6157,7788,7787"][/tm_logos][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
