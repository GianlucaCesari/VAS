<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Blockquotes", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_templates tm-tmp_blockquotes tm-tmp-category_element-pages';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="80" padding_bottom="50" is_section_block="yes"][vc_column h_text_align="center" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="2" column_push="" column_pull="" width="8/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p class="lead">Accordions are a great way for presenting information in a limited amount of space. Accordions can be altered in size and allow for multiple open panels.</p>
[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="0" padding_bottom="0" is_section_block="yes"][vc_column h_text_align="center" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]

<hr />

[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="90" padding_bottom="0" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>Default Blockquote</h3>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="8/12"][tm_blockquote quote="Successful design is not the achievement of perfection but the minimization and accommodation of imperfection. " cite="Henry Petroski"][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="90" padding_bottom="0" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>With Icon</h3>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="8/12"][tm_blockquote quote="In most people's vocabularies, design means veneer. It's interior decorating. It's the fabric of the curtains and the sofa. But to me, nothing could be further from the meaning of design." cite="Steve Jobs" type="icon" icon_color="#666666"][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="90" padding_bottom="0" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>With Border</h3>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="8/12"][tm_blockquote quote="The mind is like a richly woven tapestry in which the colors are distilled from the experiences of the senses, and the design drawn from the convolutions of the intellect." cite="Carson McCullers" type="border" size="large" border_color="#666666"][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="90" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>With Avatar</h3>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="8/12"][tm_blockquote quote="I'm not like most designers, who have to set sail on an exotic getaway to get inspired. Most of the time, it's on my walk to work, or sitting in the subway and seeing something random or out of context." cite="Alexander Wang" type="avatar" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2017/10/testimonial-avatar-1.jpg"][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
