<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Parallax with play button and info", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_parallax-with-play-button-and-info tm-tmp-category_parallax';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="1" column_push="" column_pull="" width="1/1"][tm_parallax image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-app-1@2x-1.jpg" use_fade="" text_color="#ffffff" parallax_id="3f14c684-01fb-5"][tm_aux_icon icon_id="tm-entypo-icon-play" link_icon="use_lightbox" media_type="vimeo" lightbox_caption="This is a Vimeo video, but you can also use YouTube or other videos" video_vimeo_id="214051739" icon_style="icon-circled" bkg_color="rgba(255,255,255,0.01)" bkg_color_hover="#ffffff" border_color="#ffffff" border_color_hover="#ffffff" label_color="#ffffff" label_color_hover="#33363a" content_animation="scaleOut" video_url_parameters="autoplay=1"][tm_aux_caption textarea_html_bkg_color="#ffffff" content_animation="scaleIn"]
<h3 class="lead title-medium mb-30">Why Choose Onboard.</h3>
With over one million users OnBoard is the fastest growing community traveling app in the AppStore. Download today and start traveling like a boss![/tm_aux_caption][/tm_parallax][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
