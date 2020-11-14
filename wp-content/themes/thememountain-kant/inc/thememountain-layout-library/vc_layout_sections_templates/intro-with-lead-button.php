<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Intro with lead, button", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_intro-with-lead-button tm-tmp-category_content';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row columns_on_tablet="keep" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][vc_row_inner columns_on_tablet="keep" padding_top="0" padding_bottom="30"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]</p>
<p class="lead">We've built more than 1000+ sites, designed more than 500 identities and we've won a ton of awards. You dream it, we build it!</p>
<p>[/tm_textblock][tm_button button_label="Let's Discuss Your Project" button_size="medium"][/vc_column_inner][/vc_row_inner][vc_row_inner equalize="true" columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/2"][tm_textblock textarea_html_bkg_color="#ffffff"]</p>
<h5 class="mb-30">4 About Page Layouts</h5>
<p>To help you get started we've provided you with four about page variations, that you can modify and mix, or you can create your very own using some of the 100+ sections that come with the theme.[/tm_textblock][/vc_column_inner][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-top" column_offset="" column_push="" column_pull="" width="1/2"][tm_textblock textarea_html_bkg_color="#ffffff"]</p>
<h5 class="mb-30">Extend Provided Layouts</h5>
<p>Want to make a layout your own. No problem, we&rsquo;ve prepared every section as a separate element that you can insert and modify using Visual Composer Page Builder.[/tm_textblock][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
