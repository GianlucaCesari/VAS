<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Hero with intro and play button", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_hero-with-intro-and-play-button tm-tmp-category_heros';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="150" padding_bottom="150" use_background="yes" background_color="#ffffff" add_overlay="true" overlay_background_color="rgba(0,0,0,0.2)" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-2@2x-1.jpg"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="3" column_push="" column_pull="" width="6/12"][tm_textblock textarea_html_bkg_color="#999999"]
<h3 class="mb-30"><span style="color: #ffffff;">Case Study: Home Design Inc.</span></h3>
<span style="color: #ffffff;">Amazing Apparel approached us with the idea of doing a short film showcasing core values and youthful spirit of the brand.</span>

[/tm_textblock][tm_icon margin_bottom="0" margin_bottom_mobile="0" icon_id="tm-entypo-icon-play" link_icon="use_lightbox" media_type="vimeo" lightbox_caption="A video caption, you can also add YouTube and other videos to the lightbox" video_vimeo_id="138283432" icon_style="icon-circled" bkg_color="#ffffff" bkg_color_hover="rgba(255,255,255,0.01)" border_color="#ffffff" border_color_hover="#ffffff" label_color="#33363a" label_color_hover="#ffffff" video_url_parameters="autoplay=1"][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
