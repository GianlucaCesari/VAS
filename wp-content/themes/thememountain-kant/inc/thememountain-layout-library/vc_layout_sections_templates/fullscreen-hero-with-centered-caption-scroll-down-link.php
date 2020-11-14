<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Fullscreen hero with centered caption &amp; scroll down link", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_fullscreen-hero-with-centered-caption-scroll-down-link tm-tmp-category_heros';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#232323"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_slider_holder slider_type="full_width" height="window_height" minimum_height="400" slider_id="slide-1502195317-59" auto_advance="" show_nav_arrows="true" pagination_color_1="#ffffff" pagination_color_2="#000000" transition_easing="easeInOutCirc" parallax="true" parallax_fade_on_scroll="true"][tm_slider_item image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/slide-14-fs@2x.jpg" background_color="#232323" overlay_background_color="rgba(0,0,0,0.25)" pagination_color_palette="nav_color_2" slide_transition="scaleOut" title="Slide 1" slide_id="slide-1502195278-1-61"][tm_slider_caption margin_bottom="10" margin_bottom_mobile="10" textarea_html_bkg_color="#666666" display_inline="true" caption_animation="slideInUpShort" caption_animation_duration="800" caption_animation_delay="200"]
<p class="title-xlarge" style="text-align: center;"><span style="color: #ffffff;">We Make Ideas Come To Life</span></p>
[/tm_slider_caption][tm_slider_caption column_width="6" column_offset="3" textarea_html_bkg_color="#666666" caption_animation="slideInUpShort" caption_animation_duration="800" caption_animation_delay="800"]
<p class="lead"><span style="color: #ffffff;">Let's discuss yours and let us help you make it a reality.</span></p>
[/tm_slider_caption][tm_slider_icon margin_bottom="0" margin_bottom_mobile="0" icon_id="tm-entypo-icon-down-open-mini" link_icon="scroll_to_section" link_url="#brief" icon_size="small" icon_style="icon-circled" bkg_color="#ffffff" bkg_color_hover="#ffffff" border_color="#ffffff" border_color_hover="#ffffff" label_color="#33363a" label_color_hover="#3fb58b" icon_animation="slideInUpShort" icon_animation_delay="1100"][/tm_slider_item][/tm_slider_holder][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
