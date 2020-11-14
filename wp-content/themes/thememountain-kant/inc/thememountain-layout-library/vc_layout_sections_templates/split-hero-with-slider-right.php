<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Split hero with slider right", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_split-hero-with-slider-right tm-tmp-category_heros';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#f8f8f8"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_hero_split_slider_holder height="window_height" content_media_width="split_60_40" tabs_id="tabs-1525800822-6" auto_advance="" show_nav_arrows="true" use_pagination="true" media_alignment="right" content_alignment="left" pagination_color_1="#ffffff" pagination_color_2="#000000" transition_easing="easeInOutCubic" transition_speed="1000"][tm_hero_split_slider_item title="Slide" is_hero_content="true" textarea_html_bkg_color="#ffffff" pagination_color_palette="nav_color_1" slide_animation="fade" tab_id="tab-1525800773-1-98"]
<h3 style="text-align: left;">Strategy</h3>
<p class="lead" style="text-align: left;">Kant is an elegant multi-purpose template that is big, bold and beautiful.</p>
<p class="mb-50" style="text-align: left;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>

<h4 style="text-align: left;">Marketing</h4>
<ul style="text-align: left;">
 	<li>Block-based design</li>
 	<li>20+ Components</li>
 	<li>70+ Purpose-built blocks</li>
 	<li>10+ Plugins</li>
 	<li>and much more...</li>
</ul>
[/tm_hero_split_slider_item][tm_hero_split_slider_item title="Slide" is_hero_content="no" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-half-2@2x.jpg" pagination_color_palette="nav_color_1" slide_animation="slideLeftRight" tab_id="tab_id-1525800916737-10"][/tm_hero_split_slider_item][tm_hero_split_slider_item title="Slide" is_hero_content="no" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-half-5@2x.jpg" pagination_color_palette="nav_color_1" slide_animation="scaleIn" tab_id="tab_id-1525800955797-1"][/tm_hero_split_slider_item][/tm_hero_split_slider_holder][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
