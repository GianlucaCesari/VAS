<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Cookie", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_modal_layout_templates tm-tmp_cookie tm-tmp-category_notifications';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="0" padding_bottom="40"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]By using this website you agree to our <a class="common-Link" href=''>cookie policy</a>. You can set your modals to autolaunch, to show only once and much much more.[/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
