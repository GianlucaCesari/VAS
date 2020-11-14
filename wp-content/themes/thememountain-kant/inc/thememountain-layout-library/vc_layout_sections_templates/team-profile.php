<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Team profile", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_team-profile tm-tmp-category_team';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row equalize="true" columns_on_tablet="force_2" padding_bottom="0" use_background="yes" background_color="#f8f8f8"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="5/12"][tm_textblock textarea_html_bkg_color="#ffffff"]</p>
<h1 class="title-large">Hi I'm John</h1>
<p class="lead">Kant is a powerful multi-layout and multi-purpose WordPress theme.</p>
<p>[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="7/12"][tm_image margin_bottom="0" margin_bottom_mobile="0" image_id="8052" link_image="none" textarea_html_bkg_color="#ffffff" caption_type=""][/tm_image][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
