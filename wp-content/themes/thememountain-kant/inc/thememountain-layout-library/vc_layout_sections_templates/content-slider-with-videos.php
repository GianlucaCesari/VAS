<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Content slider with videos", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_content-slider-with-videos tm-tmp-category_sliders';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep"][vc_column h_text_align="center" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_slider_holder slider_type="content" width="1110" height="custom" height_custom="624" slider_id="slide-1508488221-49" auto_advance="" show_nav_arrows="true" transition_easing="easeInOutQuint"][tm_slider_item data_type="youtube" video_auto_play="" video_mute="" background_color="#ffffff" overlay_background_color="rgba(0,0,0,0.01)" pagination_color_palette="nav_color_1" slide_transition="slideLeftRight" title="Slide 1" slide_id="slide-1508488130-1-8" video_youtube="Kkq8a6AV3HM"][/tm_slider_item][tm_slider_item data_type="youtube" video_mute="" background_color="#000000" pagination_color_palette="nav_color_1" slide_transition="slideLeftRight" title="Slide 2" slide_id="slide-1523996437350-2-7" video_youtube="ufBLI6bB9sg"][/tm_slider_item][/tm_slider_holder][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
