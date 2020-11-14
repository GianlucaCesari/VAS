<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Video", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_video tm-tmp-category_videos';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#f9f9f9" is_section_block="yes" el_id="video-section"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_video video_type="vimeo" video_vimeo_id="147734113" video_url_parameters="color=3fb58b"][/tm_video][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
