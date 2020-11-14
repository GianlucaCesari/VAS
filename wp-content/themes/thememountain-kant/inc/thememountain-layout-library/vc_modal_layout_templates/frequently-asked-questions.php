<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Frequently Asked Questions", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_modal_layout_templates tm-tmp_frequently-asked-questions tm-tmp-category_info';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" padding_top="40" padding_bottom="10"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3>Frequently Asked Questions</h3>
[/tm_textblock][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_accordion_holder use_icon="true" header_background_color_active="#3fb58b" header_border_color_active="#3fb58b" header_text_color_active="#ffffff" accordion_id="a9a61ef8-285d-8"][tm_accordion_tab_item is_active="true" textarea_html_bkg_color="#ffffff" title="How many sections comes with Kant?" accordion_id="1508599666-67"]Kant WordPress theme is highly customisable and offers some 100+ purpose-built content blocks, 24 concept layouts, a range of pre-designed headers, footers, modals and so much more.[/tm_accordion_tab_item][tm_accordion_tab_item textarea_html_bkg_color="#ffffff" title="Does Kant come with a slider?" accordion_id="1508599666-56"]Yes. Kant and all of our themes includes our very own Avalanche Slider. It's is a responsive, CSS3 transitions driven slider with a simple JS fallback for older browsers. It supports images, HTML5 backgorund video, YouTube and Vimeo videos, and a range of 3D transitions for captions and caption images.

Here are some examples of Avalanche Slider in use:
<ul>
 	<li><a href=''>Avalanche Slide</a></li>
 	<li><a href=''>Carousel Slider</a></li>
 	<li><a href=''>Logo Slider</a></li>
 	<li><a href=''>Team Slider</a></li>
 	<li><a href=''>Testimonial Slider</a></li>
 	<li><a href=''>Split Hero Slider</a></li>
</ul>
[/tm_accordion_tab_item][tm_accordion_tab_item textarea_html_bkg_color="#ffffff" title="Is supported included with my purchase?" accordion_id="7c212693-eb1b-1"]With every purchase from ThemeMountain, you get 6 months included premium support. You can either extend support upon on your purchase or extend it once the 6 months included support has expired.[/tm_accordion_tab_item][tm_accordion_tab_item textarea_html_bkg_color="#ffffff" title="Can I insert layouts and section on the fly?" accordion_id="a6bcc428-052f-5"]Yes, you can. Every layout and section you see in the demo can be directly inserted into any page or post from our template library, which is accessible through Visual Composer. This allows you to only insert the sections you need, without having to pollute your install.[/tm_accordion_tab_item][/tm_accordion_holder][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_divider][tm_textblock textarea_html_bkg_color="#ffffff"]
<p class="">Have a question that is not listed? Get in touch with us!</p>
[/tm_textblock][tm_button button_label="Email us a question" link_url="mailto:info@thememountain.com" button_size="medium"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
