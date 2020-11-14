<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Social links", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_social-links tm-tmp-category_sns-links';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row columns_on_tablet="keep" padding_top="50" padding_bottom="40" use_background="yes" background_color="#f8f8f8"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_icon margin_bottom="0" margin_bottom_mobile="0" icon_id="tm-entypo-icon-facebook-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="" label_color_hover="#3fb58b"][tm_icon margin_bottom="0" margin_bottom_mobile="0" icon_id="tm-entypo-icon-twitter-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="" label_color_hover="#3fb58b"][tm_icon margin_bottom="0" margin_bottom_mobile="0" icon_id="tm-entypo-icon-linkedin-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="" label_color_hover="#3fb58b"][tm_icon margin_bottom="0" margin_bottom_mobile="0" icon_id="tm-entypo-icon-skype-with-circle" link_icon="link_to_page" link_url="#" display_inline="true" label_color="" label_color_hover="#3fb58b"][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
