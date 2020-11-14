<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Google Map (color)", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_google-map-color tm-tmp-category_maps';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" clear_all_padding="yes"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_map is_button_or_embed="embed" map_coordinates_1="40.723301,-74.002988" map_info_1="Kant New York Headauarters" map_marker_1="7741"][/tm_map][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
