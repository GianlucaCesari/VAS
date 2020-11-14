<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Project brief style one", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_project-brief-style-one tm-tmp-category_content';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" is_section_block="yes" el_id="intro"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="7/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p class="lead text-xlarge color-theme mb-30">We rebuilt and revived a company identity that had lost touch with its target market; making it hip once again!</p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.[/tm_textblock][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="1" column_push="" column_pull="" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>Details</h4>
<strong>Client</strong>: Sweatshop
<strong>Date</strong>: June 12, 2014
<strong>Type</strong>: Art Direction, Design
<strong>Site</strong>: www.clientsite.com[/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
