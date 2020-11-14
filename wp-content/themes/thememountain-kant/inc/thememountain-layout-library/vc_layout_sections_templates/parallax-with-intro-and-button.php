<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Parallax with intro and button", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_parallax-with-intro-and-button tm-tmp-category_parallax';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#333333"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_parallax image_id="7930" height_type="custom" use_fade="" text_color="#ffffff" overlay_background_use_gradient="true" overlay_background_gradient_end_color="rgba(0,0,0,0.45)" parallax_id="306036e2-3e6c-0"][tm_aux_caption textarea_html_bkg_color="#ffffff"]
<h3>Build truly stunning layouts quickly using purpose-built content blocks. Simple!</h3>
Kant comes with some 70+ page layouts that offer unique and beautifully design blocks that look great on desktop, tablet and mobile. Kant now also includes fully functional onepage layouts! The possibilities are endless.[/tm_aux_caption][tm_aux_button margin_bottom="0" margin_bottom_mobile="0" link_to="modal" button_label="Let's Discuss Your Project" modal_target="3949" button_size="medium"][/tm_parallax][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
