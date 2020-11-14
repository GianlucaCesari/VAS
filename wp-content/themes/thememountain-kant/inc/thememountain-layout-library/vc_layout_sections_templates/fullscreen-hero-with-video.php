<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Fullscreen hero with video", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_fullscreen-hero-with-video tm-tmp-category_videos';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#232323"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_slider_holder slider_type="full_width" height="window_height" minimum_height="400" slider_id="slide-1508258666-6" auto_advance="" show_nav_arrows="true" parallax="true" parallax_fade_on_scroll="true"][tm_slider_item data_type="vimeo" video_mute="" background_color="#232323" overlay_background_color="rgba(0,0,0,0.1)" pagination_color_palette="nav_color_1" title="Slide" slide_id="slide-1508258180-1-24" video_vimeo="167434033"][/tm_slider_item][/tm_slider_holder][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
