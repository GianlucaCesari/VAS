<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Accordions with info right", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_accordions-with-info-right tm-tmp-category_content';
$thememountain_data['content'] = <<<CONTENT
[vc_row equalize="true" columns_on_tablet="force_1" use_background="yes" background_color="#ffffff"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="7/12"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h3 class="mb-50">Common Questions</h3>
[/tm_textblock][tm_accordion_holder accordion_border_style="rounded" use_icon="" header_background_color_active="#3fb58b" header_border_color="" header_border_color_active="rgba(255,255,255,0.01)" header_text_color_active="#ffffff" accordion_id="214c468b-dda7-7"][tm_accordion_tab_item is_active="true" textarea_html_bkg_color="#ffffff" title="Q: Is Coding Skills Needed?" accordion_id="149716f4-a671-4"]<strong>A:</strong> Nope, no coding knowledge is required to build a site with Kant.

Our theme comes with 8 in-house plugins, which means that when there is an update, you&rsquo;ll be sure to always have the latest version.  We&rsquo;ve also included Visual Composer and other third-party plugins.[/tm_accordion_tab_item][tm_accordion_tab_item textarea_html_bkg_color="#ffffff" title="Q: Is Support Included?" accordion_id="1523377096-53"]<strong>A:</strong> Yes. With every purchase, you get 6 months premium support included and access to our support forum.

Each concept can be imported separately and comes with portfolio pages, blog pages, and common pages.  Extend any concept using our template library and insert additional sections.[/tm_accordion_tab_item][tm_accordion_tab_item textarea_html_bkg_color="#ffffff" title="Q: Customisation Included?" accordion_id="1523377096-3"]<strong>A:</strong> Customisation is not included in your purchase. But we&rsquo;ll be happy to take a look at your customisation request and give you a quote.

Kant comes with some 70+ page layouts that offer unique and beautifully design blocks that look great on desktop, tablet and mobile. Kant now also includes fully functional onepage layouts! The possibilities are endless.[/tm_accordion_tab_item][tm_accordion_tab_item textarea_html_bkg_color="#ffffff" title="Q: Can Custom Headers &amp; Footers Be Created?" accordion_id="ef9a00b2-29e6-0"]<strong>A:</strong> Yup, you can create custom headers and footers for any page.

Kant offers you the possibility to create custom headers and footer for any page.

This is useful for when you need to create unique concepts that require a completely different approach to navigation, content, and footers. Build an unlimited number of menus and custom footers to suit your needs.[/tm_accordion_tab_item][tm_accordion_tab_item textarea_html_bkg_color="#ffffff" title="Q: Is This The Coolest Theme On The Planet" accordion_id="5912644d-0c0e-0"]<strong>A:</strong> Yup, it just might very well be!

Build amazing grids on the fly to showcase your designs, photography or products.

There is no limit to the number of grids you can build. Modify grid layouts, rollovers, animations, tile ratios and margins individually for every grid.[/tm_accordion_tab_item][/tm_accordion_holder][/vc_column][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-top" column_offset="1" column_push="" column_pull="" width="4/12"][tm_image image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/team-member-1-3.jpg" image_width="300" link_image="none" textarea_html_bkg_color="#ffffff" caption_type=""][/tm_image][tm_textblock textarea_html_bkg_color="#ffffff"]
<h4 class="mb-5">Need to talk to a human?</h4>
<p class="mb-mobile-30">Want to make a layout your own. We&rsquo;ve prepared every section as a separate element that you can insert and modify using Visual Composer Page Builder.</p>
[/tm_textblock][tm_button button_label="Get in touch" button_size="medium"][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
