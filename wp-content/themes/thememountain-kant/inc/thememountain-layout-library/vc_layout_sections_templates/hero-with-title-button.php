<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Hero with title &amp; button", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_hero-with-title-button tm-tmp-category_heros';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row columns_on_tablet="keep"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_parallax image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-11@2x.jpg" column_width="8" column_offset="2" height_type="custom" custom_height="400" use_fade="" text_color="#ffffff" overlay_background_color="rgba(0,0,0,0.25)" parallax_id="f3c952de-9f48-3"][tm_aux_caption textarea_html_bkg_color="#999999" display_inline="true"]</p>
<h3 style="text-align: center">Ready to create something stunning with Kant?</h3>
<p>[/tm_aux_caption][tm_aux_button margin_bottom="0" margin_bottom_mobile="0" button_label="Become a Kantien" display_inline="true" button_size="medium" bkg_color="rgba(45,102,247,0.01)" bkg_color_hover="#3fb58e" border_color="#ffffff" border_color_hover="#3fb58e" label_color="#ffffff" label_color_hover="#ffffff"][/tm_parallax][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
