<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Split hero with slider left", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_split-hero-with-slider-left tm-tmp-category_heros';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#f8f8f8" el_id="about"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_hero_split_slider_holder height="window_height" content_media_width="split_60_40" tabs_id="tabs-1525800822-6" auto_advance="true" pause_on_hover="true" progress_bar="" show_nav_arrows="" use_pagination="true" media_alignment="left" content_alignment="left" pagination_color_1="#ffffff" pagination_color_2="#000000" transition_easing="easeInOutCubic" transition_speed="1000"][tm_hero_split_slider_item title="Slide" is_hero_content="true" textarea_html_bkg_color="#ffffff" pagination_color_palette="nav_color_1" slide_animation="fade" tab_id="tab-1525800773-1-981ebd-c81d281b-d16f"]
<h3 class="mb-30">What We Offer</h3>
<p class="lead">Being startup, time is always a factor. This is why we have carefully created ready-to-use content blockas that you can easily piece together to create a stunning website in a matter of minutes.</p>

<h4 style="text-align: left;">Key Aspects Of Kant</h4>
<ul style="text-align: left;">
 	<li>Block-based design</li>
 	<li>20+ Components</li>
 	<li>70+ Purpose-built blocks</li>
 	<li>10+ Plugins</li>
 	<li>and much more...</li>
</ul>
[tm_content_button margin_bottom="0" margin_bottom_mobile="0" display_inline="false" link_to="page" scroll_offset="0" button_type="" button_sub_label="" button_label="View Full Details" link_url="#" link_target="" modal_target="" button_size="medium" border_style="" icon_alignment="left" icon_id="" bkg_color="" bkg_color_hover="" border_color="" border_color_hover="" label_color="" label_color_hover="" drop_shadow="false" el_id="" el_class=""][/tm_hero_split_slider_item][tm_hero_split_slider_item title="Slide" is_hero_content="no" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-half-2@2x-4.jpg" pagination_color_palette="nav_color_1" slide_animation="slideLeftRight" tab_id="tab_id-1525800916737-101ebd-c81d281b-d16f"][/tm_hero_split_slider_item][tm_hero_split_slider_item title="Slide" is_hero_content="no" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-half-2-1@2x.jpg" pagination_color_palette="nav_color_1" slide_animation="slideTopBottom" tab_id="tab_id-1525800955797-11ebd-c81d281b-d16f"][/tm_hero_split_slider_item][/tm_hero_split_slider_holder][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
