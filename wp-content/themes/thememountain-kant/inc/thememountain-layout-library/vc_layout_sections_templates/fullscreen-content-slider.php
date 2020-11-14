<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Fullscreen content slider", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_fullscreen-content-slider tm-tmp-category_sliders';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#f9f9f9"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_slider_holder slider_type="full_width" height="window_height" slider_id="slide-1526214272-45" auto_advance="" show_nav_arrows="true" pagination_color_1="#ffffff" pagination_color_2="#000000" transition_easing="easeInOutCubic" parallax=""][tm_slider_item image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2017/10/project-3-1-1.jpg" background_color="#ffffff" overlay_background_color="rgba(0,0,0,0.01)" pagination_color_palette="nav_color_2" slide_transition="slideLeftRight" title="Slide 1" slide_id="slide-1526214208-1-16"][/tm_slider_item][tm_slider_item data_type="vimeo" pagination_color_palette="nav_color_1" slide_transition="slideLeftRight" title="Slide 2" slide_id="slide-1526214334282-1-9" video_vimeo="103318844" el_id="&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=3fb58b"][/tm_slider_item][/tm_slider_holder][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
