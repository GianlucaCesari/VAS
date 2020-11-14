<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Video", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_templates tm-tmp_video tm-tmp-category_element-pages';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="80" padding_bottom="50" is_section_block="yes"][vc_column h_text_align="center" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" use_background="" column_offset="1" column_push="" column_pull="" width="10/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p class="lead">Embed beautifully responsive videos on the fly. Embed or launch a video using our Summit lightbox that supports Vimeo, YouTube and iframe content.</p>
[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="0" padding_bottom="0" is_section_block="yes"][vc_column h_text_align="center" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" use_background="" column_offset="" column_push="" column_pull="" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]

<hr />

[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="90" padding_bottom="0" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" use_background="" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>Vimeo Video</h3>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" use_background="" width="8/12"][tm_video video_type="vimeo" video_vimeo_id="195433452"][/tm_video][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="60" padding_bottom="0" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" use_background="" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>YouTube Video</h3>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" use_background="" width="8/12"][tm_video video_type="youtube" video_youtube_id="2BZ4sHuQuEY"][/tm_video][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="60" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" use_background="" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>Other Video</h3>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" use_background="" width="8/12"][tm_video video_type="other" video_url="//www.dailymotion.com/embed/video/x2mivum"][/tm_video][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
