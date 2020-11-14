<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Lightbox", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_templates tm-tmp_lightbox tm-tmp-category_element-pages';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="80" padding_bottom="50" is_section_block="yes"][vc_column h_text_align="center" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="1" column_push="" column_pull="" width="10/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p class="lead">Our lightbox is light, reponsive, CSS3 transition driven with a simple JS fallback for older browsers. It supports images, YouTube &amp; Vimeo videos, inline HTML, iframes and ajax content.</p>
[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="0" padding_bottom="0" is_section_block="yes"][vc_column h_text_align="center" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]

<hr />

[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="90" padding_bottom="20" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>WordPress Lightbox Gallery</h3>
[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="0" padding_bottom="20" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]

[gallery size="full" ids="8412,8448,8300,8331,8391,8392,8318,8297,8285,8308"]

[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="90" padding_bottom="20" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>Thumbnail + Lightbox</h3>
[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="0" padding_bottom="110" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/3"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h6>Image</h6>
[/tm_textblock][tm_image image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2017/10/blog-1-landscape.jpg" link_image="use_lightbox" lightbox_toolbar_zoom_button="true" lightbox_toolbar_share_buttons="true" textarea_html_bkg_color="#ffffff" caption_type="rollover_caption" rollover_bkg_color="rgba(0,0,0,0.5)" caption_text_color="#ffffff" rollover_animation="img-scale-in" rollover_easing="easeInOutCubic" lightbox_caption="This is a caption"]View Image[/tm_image][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/3"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h6>Video</h6>
[/tm_textblock][tm_video video_type="vimeo" use_lightbox="lightbox_with_thumbnail_link" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2017/09/blog-9-landscape.jpg" textarea_html_bkg_color="#999999" lightbox_toolbar_zoom_button="true" lightbox_toolbar_share_buttons="true" rollover_bkg_color="rgba(0,0,0,0.5)" caption_text_color="#ffffff" rollover_animation="img-scale-in" rollover_easing="easeInOutCubic" lightbox_animation="slideInLeft" video_vimeo_id="203710832" lightbox_caption="This is a video caption. You can also link to a YouTube video." video_url_parameters="autoplay=1"]<span style="color: #ffffff">View Video</span>[/tm_video][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/3"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h6>Video + Icon</h6>
[/tm_textblock][tm_video video_type="vimeo" use_lightbox="lightbox_with_icon" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2017/10/project-31-landscape.jpg" icon_bkg_color="#ffffff" icon_bkg_color_hover="#3fb58b" icon_border_color="#ffffff" icon_border_color_hover="#3fb58b" icon_label_color="#33363a" icon_label_color_hover="#ffffff" lightbox_animation="slideInTop" video_vimeo_id="203710832" lightbox_caption="This is a video caption. You can also link to a YouTube video." video_url_parameters="autoplay=1"][/tm_video][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
