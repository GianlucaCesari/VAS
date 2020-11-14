<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Full width slider with animated captions", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_full-width-slider-with-animated-captions tm-tmp-category_sliders';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#232323"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_slider_holder slider_type="full_width" height="regular" minimum_height="400" slider_id="slide-1502195317-59" auto_advance="true" pause_on_hover="" show_nav_arrows="" use_pagination="" pagination_color_1="#ffffff" pagination_color_2="#000000" transition_easing="easeInOutCirc" parallax="true"][tm_slider_item image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/slide-12-page-intro@2x-1.jpg" background_color="#232323" pagination_color_palette="nav_color_2" title="Slide 1" slide_id="slide-1502195278-1-61"][tm_slider_caption margin_bottom="10" margin_bottom_mobile="10" textarea_html_bkg_color="#666666" display_inline="true" caption_animation="flipInX" caption_animation_duration="800" caption_animation_delay="500"]
<h1 class="title-xlarge"><span style="color: #ffffff;">I'm Jonas Kant.</span></h1>
[/tm_slider_caption][tm_slider_caption column_width="6" column_offset="3" textarea_html_bkg_color="#666666" caption_animation="scaleOut" caption_animation_duration="800" caption_animation_delay="800"]
<p class="lead"><span style="color: #ffffff;">I'm a creative art director from New York</span></p>
[/tm_slider_caption][/tm_slider_item][tm_slider_item image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/slide-12-page-intro@2x-1.jpg" background_color="#232323" pagination_color_palette="nav_color_2" title="Slide 2" slide_id="1525968241585-1-10"][tm_slider_caption margin_bottom="0" margin_bottom_mobile="0" textarea_html_bkg_color="#666666" display_inline="true" caption_animation="slideInRightShort" caption_animation_duration="800" caption_animation_delay="500" slide_id="1525968241622-2-6"]
<h2 class="title-large"><span style="color: #ffffff;">I design, I create, I just do cool things.</span></h2>
[/tm_slider_caption][/tm_slider_item][tm_slider_item image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/slide-12-page-intro@2x-1.jpg" background_color="#232323" pagination_color_palette="nav_color_2" title="Slide 3" slide_id="1525968332366-2-6"][tm_slider_caption margin_bottom="0" margin_bottom_mobile="0" textarea_html_bkg_color="#666666" display_inline="true" caption_animation="slideInLeftShort" caption_animation_duration="800" caption_animation_delay="500" slide_id="1525968332404-3-9"]
<h2 class="title-large"><span style="color: #ffffff;">I'd love to hear about your project.</span></h2>
[/tm_slider_caption][/tm_slider_item][/tm_slider_holder][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
