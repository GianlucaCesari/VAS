<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Bold, centered intro with lead", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_bold-centered-intro-with-lead tm-tmp-category_content';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="150"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="1" column_push="" column_pull="" width="10/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h1 class="title-large">The simplest, most effective tool for small teams</h1>
<p class="lead">Take a screenshot, make a screencast or an animated gif straight from your browser and share with your team on the fly. <strong>Sign up now and get notified when we launch!</strong></p>
[/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
