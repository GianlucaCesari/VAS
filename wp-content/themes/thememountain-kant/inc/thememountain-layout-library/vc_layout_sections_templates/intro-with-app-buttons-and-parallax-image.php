<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Intro with app buttons and parallax image", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_intro-with-app-buttons-and-parallax-image tm-tmp-category_content';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_bottom="0" use_background="yes" background_color="#33363a"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][vc_row_inner columns_on_tablet="keep" padding_top="80" padding_bottom="50"][vc_column_inner h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="1" column_push="" column_pull="" width="10/12"][tm_textblock textarea_html_bkg_color="#33363a"]
<h1 class="title-large"><span style="color: #ffffff;">Kant Le Voyageur</span></h1>
<p class="lead">Build a professional App landing page</p>
[/tm_textblock][tm_button icon_id="tm-entypo-icon-app-store" button_type="app" button_label="AppStore" link_url="#" display_inline="true" button_size="medium" bkg_color="#ffffff" bkg_color_hover="#3fb58b" border_color="#ffffff" border_color_hover="#3fb58b" label_color="#33363a" label_color_hover="#ffffff" button_sub_label="Download On The"][tm_button icon_id="tm-entypo-icon-google-play" button_type="app" button_label="GooglePlay" link_url="#" display_inline="true" button_size="medium" bkg_color="#ffffff" bkg_color_hover="#3fb58b" border_color="#ffffff" border_color_hover="#3fb58b" label_color="#33363a" label_color_hover="#ffffff" button_sub_label="Download On"][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" column_animation="parallax_on_scroll" parallax_speed="0.15" width="1/1"][tm_image margin_bottom="0" margin_bottom_mobile="0" image_id="7754" image_width="400" link_image="none" textarea_html_bkg_color="#ffffff" caption_type=""][/tm_image][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
