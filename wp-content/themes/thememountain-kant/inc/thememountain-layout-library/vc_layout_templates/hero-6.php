<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Hero 6", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_templates tm-tmp_hero-6 tm-tmp-category_hero-pages';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#232323"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_slider_holder slider_type="full_width" height="window_height" minimum_height="550" slider_id="slide-1524292471-24" auto_advance="" show_nav_arrows="true" parallax=""][tm_slider_item image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/slide-17-fs@2x.jpg" caption_horizontal_alignment="right" background_color="#232323" pagination_color_palette="nav_color_1" title="Slide" slide_id="slide-1524292418-1-54"][tm_slider_caption margin_bottom="5" margin_bottom_mobile="5" column_width="8" column_offset="4" textarea_html_bkg_color="#232323" caption_animation="slideInLeftShort"]
<h1 class="title-large"><span style="color: #ffffff">Build Your </span>
<span style="color: #ffffff">Website With Kant</span></h1>
[/tm_slider_caption][tm_slider_caption column_width="8" column_offset="4" textarea_html_bkg_color="#232323" caption_animation="slideInLeftShort" caption_animation_delay="400"]
<p class="lead"><span style="color: #ffffff">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</span></p>
[/tm_slider_caption][tm_slider_button column_width="8" column_offset="4" button_label="Get Your Copy Today" link_url="#" bkg_color="#3fb58b" bkg_color_hover="rgba(255,255,255,0.01)" border_color="#3fb58b" border_color_hover="#ffffff" label_color="#ffffff" label_color_hover="#ffffff" button_animation="slideInLeftShort" button_animation_delay="800"][/tm_slider_item][/tm_slider_holder][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
