<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Static stat section", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_static-stat-section tm-tmp-category_stats';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#f4f4f4"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][vc_row_inner columns_on_tablet="keep" padding_top="0" padding_bottom="40"][vc_column_inner h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="1" column_push="" column_pull="" width="10/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h2>Optimised for Speed</h2>
<p class="lead">We&rsquo;ve taken all the necessary steps to ensure that Kant loads faster and scores better than regular WordPress themes in tests like PageSpeed, YSlow and Pingdom.</p>
[/tm_textblock][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="force_2" padding_top="0" padding_bottom="20"][vc_column_inner h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" use_background="yes" background_color="#ffffff" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/04/page-speed.jpg" style="boxed_round" box_size="xlarge" box_background_color="#ffffff" box_background_color_hover="#ffffff" box_border_color="#eeeeee" box_border_color_hover="#eeeeee" column_offset="2" column_push="" column_pull="" column_animation="animation_on_scroll" animation="slideInLeftShort" width="1/3"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>PageSpeed Score</h4>
<p class="title-large"><span class="font-alt-1"><strong>94%</strong></span></p>
[/tm_textblock][tm_button button_label="Check the Report" link_url="https://gtmetrix.com/reports/wp.thememountain.com/kdkUYA2p" link_target="_blank" display_inline="true" button_size="medium" border_color="#ffffff" border_color_hover="#2d66f7" label_color="#ffffff"][/vc_column_inner][vc_column_inner h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" use_background="yes" background_color="#ffffff" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/04/yslow-1.jpg" style="boxed_round" box_size="xlarge" box_background_color="#ffffff" box_background_color_hover="#ffffff" box_border_color="#eeeeee" box_border_color_hover="#eeeeee" column_offset="" column_push="" column_pull="" column_animation="animation_on_scroll" animation="slideInRightShort" width="1/3"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4>YSlow Score</h4>
<p class="title-large"><span class="font-alt-1"><strong>90%</strong></span></p>
[/tm_textblock][tm_button button_label="Check the Report" link_url="https://gtmetrix.com/reports/wp.thememountain.com/kdkUYA2p" link_target="_blank" display_inline="true" button_size="medium" border_color="#ffffff" border_color_hover="#2d66f7" label_color="#ffffff"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
