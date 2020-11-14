<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Contact Form 2", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_modal_layout_templates tm-tmp_contact-form-2 tm-tmp-category_forms';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="40" padding_bottom="10"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" use_background="" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>Get in Touch</h3>
Have a Pre-Purchase Question? We&rsquo;ll be happy to answer any questions you may have prior to purchase. Just get in touch with us.

[contact-form-7 id="3629" title="Simple Contact Form with Budget, Source, Newsletter"][/tm_textblock][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
