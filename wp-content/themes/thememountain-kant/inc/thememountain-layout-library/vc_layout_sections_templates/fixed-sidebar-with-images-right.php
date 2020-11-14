<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Fixed sidebar with images right", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_fixed-sidebar-with-images-right tm-tmp-category_sticky-columns';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" el_id="brief"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" make_column_sticky="true" extra_space_bottom="80" push_section=" .pagination-3" style="boxed_round" box_background_color="#f8f8f8" box_background_color_hover="#f8f8f8" box_border_color="#f8f8f8" box_border_color_hover="#f8f8f8" column_offset="" column_push="" column_pull="" width="4/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>Details</h4>
<strong>Client</strong>: Sweatshop
<strong>Date</strong>: June 12, 2014
<strong>Type</strong>: Art Direction, Design
<strong>Site</strong>: www.clientsite.com

[tm_content_divider show_on="" border_style="solid" border_thickness="thin" border_color="#eee" el_id="" el_class=""]
<h4 class="widget-title">About</h4>
<strong>Starting a new business?</strong> Then Kant is for you! This multi-purpose template offsers 8 carefully crafted concepts with two variations each, 20+ components and 8+ plugins.[/tm_textblock][tm_divider show_on="hide show-on-mobile" border_color="#eeeeee"][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="8/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>Visuals</h3>
[/tm_textblock][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_image image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2017/10/project-13-portrait.jpg" link_image="none" textarea_html_bkg_color="#ffffff" caption_type="caption_below"]This is an image caption added below the image. You can also add one over the image.[/tm_image][tm_image image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2017/10/project-17-landscape-large.jpg" link_image="none" textarea_html_bkg_color="#ffffff" caption_type="caption_below"]The brand.[/tm_image][tm_image image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2017/10/project-14-portrait.jpg" link_image="none" textarea_html_bkg_color="#ffffff" caption_type="caption_below"]Another image caption. The crossroads.[/tm_image][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>Conclusion</h3>
Showcase your work in style by using this project layout with sticky sidebar info. This particular layout is useful for instances when you need your viewers to always have access to key project info, share buttons, or anything of your choosing while reviewing the project. You have full control over which column becomes stick and when[/tm_textblock][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
