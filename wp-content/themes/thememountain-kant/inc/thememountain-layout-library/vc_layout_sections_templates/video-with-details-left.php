<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Video with details left", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_video-with-details-left tm-tmp-category_videos';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row equalize="true" columns_on_tablet="keep"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/2"][tm_textblock textarea_html_bkg_color="#ffffff"]</p>
<h6>A TEMPLATE THAT SUITS YOU</h6>
<p>All content blocks are designed to work well together no matter the order they are placed in. The combinations and possibilities are endless. Give it a try today!.</p>
<p><strong class="color-theme">@smashingmag</strong><br />
Simply Awesome - Signed up and tested it right away. Super satisfied!</p>
<p><strong class="color-theme">@techcrunch</strong><br />
An amazing product, install at this moment![/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/2"][tm_video video_type="vimeo" video_vimeo_id="161570867" video_url_parameters="title=0∓byline=0&amp;portrait=0"][/tm_video][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
