<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Logo grid (boxed) with testimonial slider above", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_logo-grid-boxed-with-testimonial-slider-above tm-tmp-category_logos';
$thememountain_data['content'] = <<<CONTENT
[vc_row force_fullwidth="true" columns_on_tablet="keep" use_background="yes" background_color="#f9f9f9"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][vc_row_inner columns_on_tablet="keep" padding_top="0" padding_bottom="40"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="3" column_push="" column_pull="" width="6/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h2 style="text-align: center;">Here's why people trust Kant</h2>
[/tm_textblock][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_testimonials_holder tab_id="tabs-1503587853-17" use_auto_advance="" pagination_color="#33363a"][tm_testimonials_item title="Supersuz - ThemeForest" column_width="8" column_offset="2" textarea_html_bkg_color="#ffffff" tab_id="tab-1503587805-1-18"]
<p style="text-align: center;">This is the second time I&rsquo;ve used this theme, and not only is stylish and beautifully responsive - but also the support is really awesome&hellip; I will continue to use Theme Mountain for future projects.</p>
[/tm_testimonials_item][tm_testimonials_item title="Marktmcewan - ThemeForest" column_width="8" column_offset="2" textarea_html_bkg_color="#ffffff" tab_id="tab_id-1503587974072-2"]
<p style="text-align: center;">Full marks for design and development quality. Support is the best support i have received from any purchase on Themeforest.</p>
[/tm_testimonials_item][tm_testimonials_item title=" Boica812 - ThemeForest" column_width="8" column_offset="2" textarea_html_bkg_color="#ffffff" tab_id="tab_id-1503588031952-0"]
<p style="text-align: center;">It is a marvelous product &hellip; but the flash customer support tops it all &hellip; HIGHLY RECOMMENDED! 5* product and service</p>
[/tm_testimonials_item][tm_testimonials_item title="Adamfor - ThemeForest" column_width="8" column_offset="2" textarea_html_bkg_color="#ffffff" tab_id="tab_id-1503588145711-10"]
<p style="text-align: center;">I&rsquo;m just starting out and it&rsquo;s my second theme, and I must say, it&rsquo;s great. Documentation quality and customer support make making great websites way easier. I highly recommend.</p>
[/tm_testimonials_item][/tm_testimonials_holder][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row columns_on_tablet="keep" padding_top="0" use_background="yes" background_color="#f9f9f9"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_logos items_per_row="5" logo_type="2" bkg_color_logo="#ffffff" bkg_color_logo_hover="#f8f8f8" logos_id="6153,6156,6158,6155,6157,6152,7034,6442,6151,6154"][/tm_logos][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
