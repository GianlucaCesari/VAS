<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Single testimonial", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_single-testimonial tm-tmp-category_testimonial';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#f9f9f9"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="3" column_push="" column_pull="" width="6/12"][tm_blockquote quote="I&rsquo;m just starting out and it&rsquo;s my second theme, and I must say, it&rsquo;s great. Documentation quality and customer support make making great websites way easier. I highly recommend." cite="ADAMFOUR" size="large" alignment="center"][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
