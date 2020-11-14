<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Boxes", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_templates tm-tmp_boxes tm-tmp-category_element-pages';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="80" padding_bottom="50" is_section_block="yes"][vc_column h_text_align="center" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" use_background="" column_offset="2" column_push="" column_pull="" width="8/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p class="lead">Accordions are a great way for presenting information in a limited amount of space. Accordions can be altered in size and allow for multiple open panels.</p>
[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="0" padding_bottom="0" is_section_block="yes"][vc_column h_text_align="center" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" use_background="" column_offset="" column_push="" column_pull="" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]

<hr />

[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="90" padding_bottom="0" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" use_background="" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>Regular Boxes</h3>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" use_background="" width="8/12"][tm_box textarea_html_bkg_color="#ffffff"]This is an info box.[/tm_box][tm_box textarea_html_bkg_color="#ffffff" box_shadow="true"]This is an info box.[/tm_box][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="90" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" use_background="" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>Dismissible Boxes</h3>
[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" use_background="" width="8/12"][tm_box textarea_html_bkg_color="#ffffff" is_dismissable="true" type="custom" border_style="rounded" background_color="rgba(226,226,226,0.01)" border_color="#e2e2e2"]<strong>This is a Dismissible Box</strong>[/tm_box][tm_box textarea_html_bkg_color="#ffffff" is_dismissable="true" type="custom" border_style="rounded" background_color="#fc6e51" border_color="#fc6e51" text_color="#ffffff"]<strong>This is a Dismissible Box</strong>[/tm_box][tm_box textarea_html_bkg_color="#ffffff" is_dismissable="true" type="custom" border_style="rounded" background_color="#48cfad" border_color="#48cfad" text_color="#ffffff"]<strong>This is a Dismissible Box</strong>[/tm_box][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
