<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Full width hero with scroll down button", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_full-width-hero-with-scroll-down-button tm-tmp-category_heros';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row columns_on_tablet="keep" use_background="yes" background_color="#232323"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_slider_holder slider_type="full_width" height="regular" minimum_height="550" slider_id="slide-1502195317-59" auto_advance="" show_nav_arrows="true" pagination_color_1="#ffffff" pagination_color_2="#000000" transition_easing="easeInOutCirc" parallax="true" parallax_fade_on_scroll="true"][tm_slider_item image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/slide-5-page-intro@2x-1.jpg" background_color="#232323" overlay_background_color="rgba(0,0,0,0.25)" pagination_color_palette="nav_color_2" slide_transition="scaleOut" title="Slide 1" slide_id="slide-1502195278-1-61"][tm_slider_caption margin_bottom="40" margin_bottom_mobile="10" textarea_html_bkg_color="#666666" display_inline="true" caption_animation="slideInUpShort" caption_animation_duration="800" caption_animation_delay="200"]</p>
<p class="title-large"><span style="color: #ffffff">Create Amazing Product Pages</span></p>
<p>[/tm_slider_caption][tm_slider_caption margin_bottom="50" margin_bottom_mobile="10" column_width="6" column_offset="3" textarea_html_bkg_color="#666666" caption_animation="slideInUpShort" caption_animation_duration="800" caption_animation_delay="800"]</p>
<p class="lead"><span style="color: #ffffff">Build stunning looking product pages in mintues using carefully crafted content-blocks</span></p>
<p>[/tm_slider_caption][tm_slider_icon margin_bottom="0" margin_bottom_mobile="0" icon_id="tm-entypo-icon-down" link_icon="scroll_to_section" link_url="#brief" label_color="#ffffff" label_color_hover="rgba(255,255,255,0.5)" icon_animation="slideInUpShort" icon_animation_delay="1100"][/tm_slider_item][/tm_slider_holder][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
