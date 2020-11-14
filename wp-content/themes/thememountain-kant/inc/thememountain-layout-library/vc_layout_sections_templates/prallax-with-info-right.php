<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Prallax with info right", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_prallax-with-info-right tm-tmp-category_parallax';
$thememountain_data['content'] = <<<CONTENT
[vc_row equalize="true" columns_on_tablet="keep"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="6" column_pull="" width="1/2"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h2 class="mb-20">Sport Version</h2>
<p class="lead">For the sport fanatic within you.</p>
[tm_content_divider show_on="" border_style="solid" border_thickness="thin" border_color="#eee" el_id="" el_class=""]

Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.
<p class="text-xlarge"><strong>$289.00</strong></p>
[/tm_textblock][tm_button button_label="Buy This Product" link_url="#" button_size="medium"][/vc_column][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="6" column_animation="parallax_on_scroll" width="1/2"][tm_image image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/feature-product-2.jpg" link_image="none" textarea_html_bkg_color="#ffffff" caption_type=""][/tm_image][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
