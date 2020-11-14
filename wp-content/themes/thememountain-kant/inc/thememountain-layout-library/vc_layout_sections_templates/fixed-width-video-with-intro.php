<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Fixed width video with intro", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_fixed-width-video-with-intro tm-tmp-category_videos';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#f8f8f8"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][vc_row_inner columns_on_tablet="keep" padding_top="0" padding_bottom="20"][vc_column_inner h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="2" column_push="" column_pull="" width="8/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h2 class="mb-30">Increasing Your Productivity</h2>
<p class="lead">Transform your team into a well oiled machine and streamline company tasks.</p>
[/tm_textblock][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_video video_type="vimeo" video_vimeo_id="143282979" video_url_parameters="title=0&amp;byline=0&amp;portrait=0&amp;loop=1&amp;color=3fb58b"][/tm_video][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
