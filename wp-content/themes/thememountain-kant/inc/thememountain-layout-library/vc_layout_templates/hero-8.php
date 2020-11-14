<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Hero 8", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_templates tm-tmp_hero-8 tm-tmp-category_hero-pages';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#232323"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_slider_holder slider_type="full_width" height="window_height" minimum_height="550" slider_id="slide-1524292471-24" auto_advance="" show_nav_arrows="true" parallax=""][tm_slider_item image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/slide-2-fs@2x.jpg" background_color="#232323" overlay_background_color="rgba(0,0,0,0.2)" pagination_color_palette="nav_color_1" title="Slide" slide_id="slide-1524292418-1-54"][tm_slider_caption margin_bottom="20" margin_bottom_mobile="20" column_width="6" column_offset="3" textarea_html_bkg_color="#232323" hide_caption_on_mobile="true" caption_animation="scaleIn" caption_animation_delay="400"]
<p class="lead"><span style="color: #ffffff">Sed ut perspiciatis unde omnis iste natus error sit doloremque laudantium.</span></p>
[/tm_slider_caption][tm_slider_caption textarea_html_bkg_color="#232323" caption_animation="flipInX"]
<h1 class="title-large"><span style="color: #ffffff">Kant: Showcase Your Work Like a True Professional</span></h1>
[/tm_slider_caption][tm_slider_button button_label="Get Your Copy Today" link_url="#" bkg_color="rgba(255,255,255,0.01)" bkg_color_hover="#3fb58b" border_color="#ffffff" border_color_hover="#3fb58b" label_color="#ffffff" label_color_hover="#ffffff" button_animation="slideInUpShort" button_animation_delay="800"][/tm_slider_item][/tm_slider_holder][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
