<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Share this project", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_share-this-project tm-tmp-category_content';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" is_section_block="yes"][vc_column h_text_align="center" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="3" column_push="" column_pull="" width="6/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>Love this project? Show some love and Share</h4>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.

[tm_social_share margin_bottom="0" margin_bottom_mobile="0" use_facebook="true" use_twitter="true" use_pinterest="true" use_googleplus="true" alignment="center" size="" icon_type="circle" icon_color="" icon_color_hover="" el_id="" el_class=""][/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
