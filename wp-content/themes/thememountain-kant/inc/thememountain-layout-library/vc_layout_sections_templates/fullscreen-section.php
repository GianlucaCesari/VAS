<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Fullscreen section", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_fullscreen-section tm-tmp-category_fullscreen-section';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_fullscreen_presentation_holder slider_id="fullscreen-1526119502-87" pagination_color_1="#ffffff"][tm_fullscreen_presentation_item column_width="8" column_offset="2" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/slide-1-fs@2x-1.jpg" use_overlay="true" pagination_color_palette="nav_color_1" image_overlay_bkg_color="rgba(0,0,0,0.5)" title="Section 1" slide_id="fullscreen-1526119478-1-51"][tm_aux_caption margin_bottom="0" margin_bottom_mobile="0" textarea_html_bkg_color="#bfbfbf"]
<h1 class="mb-30 title-xlarge"><span style="color: #ffffff;">Contact</span></h1>
<h4><span style="color: #ffffff;">Kant Creative Agency</span></h4>
<span style="color: #ffffff;">126-130 Crosby Street,</span>
<span style="color: #ffffff;">Soho New York City,</span>
<span style="color: #ffffff;">NY 10012, United States.</span>
<span style="color: #ffffff;"><a class="lightbox-link weight-bold" style="color: #ffffff;" href=''>Find Us On Google</a></span>
<p class="mb-0 mb-mobile-30"><span style="color: #ffffff;">Tel: + 1 756 984 322</span>
<span style="color: #ffffff;"><a style="color: #ffffff;" href=''>info@kant-newyork.com</a></span></p>
[/tm_aux_caption][/tm_fullscreen_presentation_item][/tm_fullscreen_presentation_holder][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
