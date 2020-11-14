<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Avalanche Slider", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_templates tm-tmp_avalanche-slider tm-tmp-category_element-pages';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="80" is_section_block="yes"][vc_column h_text_align="center" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="1" column_push="" column_pull="" width="10/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p class="lead">Avalanche is a responsive, CSS3 transitions driven slider with a simple JS fallback for older browsers. It supports images, HTML5 backgorund video, YouTube and Vimeo videos, and a range of 3D transitions for captions and caption images.</p>
[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="0" padding_bottom="110" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_slider_holder slider_type="full_width" height="custom" height_custom="800" slider_id="slide-1484847574-38" auto_advance="" show_nav_arrows="true" pagination_color_1="#ffffff" pagination_color_2="#ffffff" transition_easing="easeInOutCubic" parallax=""][tm_slider_item image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2017/10/hero-1@2x.jpg" background_color="#ffffff" overlay_background_color="rgba(0,0,0,0.01)" pagination_color_palette="nav_color_1" slide_transition="slideLeftRight" title="Slide 1" slide_id="slide-1484847279-1-84"][tm_slider_caption textarea_html_bkg_color="#a8a8a8"]
<h2 style="text-align: center"><span style="color: #ffffff">This is a full width slider </span></h2>
[/tm_slider_caption][/tm_slider_item][tm_slider_item image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2017/09/Untitled-8.jpg" background_color="#ffffff" overlay_background_color="rgba(0,0,0,0.01)" pagination_color_palette="nav_color_1" slide_transition="scaleOut" title="Slide 2" slide_id="slide-1484847500933-1-9"][tm_slider_caption textarea_html_bkg_color="#666666" display_inline="true" caption_animation="flipInY"]
<h2><span style="color: #ffffff">This is </span></h2>
[/tm_slider_caption][tm_slider_caption textarea_html_bkg_color="#666666" display_inline="true" caption_animation="slideInDownShort" caption_animation_delay="300"]
<h2><span style="color: #ffffff">an </span></h2>
[/tm_slider_caption][tm_slider_caption textarea_html_bkg_color="#666666" display_inline="true" caption_animation="flipInY" caption_animation_delay="600"]
<h2><span style="color: #ffffff">advanced </span></h2>
[/tm_slider_caption][tm_slider_caption textarea_html_bkg_color="#666666" display_inline="true" caption_animation="slideInUpShort" caption_animation_duration="900"]
<h2><span style="color: #ffffff">caption </span></h2>
[/tm_slider_caption][tm_slider_caption textarea_html_bkg_color="#666666" display_inline="true" caption_animation="flipInY" caption_animation_delay="1200"]
<h2><span style="color: #ffffff">animation</span></h2>
[/tm_slider_caption][/tm_slider_item][/tm_slider_holder][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="90" padding_bottom="20" is_section_block="yes"][vc_column h_text_align="center" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="1" column_push="" column_pull="" width="10/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>Content Slider</h3>
[/tm_textblock][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="0" is_section_block="yes"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_slider_holder slider_type="content" width="1110" height="custom" height_custom="624" slider_id="slide-1484848118-70" auto_advance="" show_nav_arrows="true" transition_easing="easeInOutCubic"][tm_slider_item image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/content-slide-1.jpg" background_color="#ffffff" overlay_background_color="rgba(0,0,0,0.1)" pagination_color_palette="nav_color_1" slide_transition="slideTopBottom" title="Slide 1" slide_id="slide-1484848005-1-91"][tm_slider_caption textarea_html_bkg_color="#666666" caption_animation="dropUp"]
<h2><span style="color: #ffffff">This is an image slide caption</span></h2>
[/tm_slider_caption][/tm_slider_item][tm_slider_item data_type="vimeo" video_mute="" background_color="#000000" pagination_color_palette="nav_color_1" slide_transition="slideLeftRight" title="Slide 2" slide_id="slide-1507739425403-2-8" video_vimeo="238480244"][/tm_slider_item][tm_slider_item data_type="youtube" video_mute="" background_color="#000000" pagination_color_palette="nav_color_1" title="Slide 3" slide_id="1507739516179-2-3" video_youtube="Kkq8a6AV3HM"][/tm_slider_item][/tm_slider_holder][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
