<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Split hero slider", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_split-hero-slider tm-tmp-category_heros';
$thememountain_data['content'] = <<<CONTENT
[vc_row force_fullwidth="true" columns_on_tablet="keep" clear_all_padding="yes" use_background="yes" background_color="#f9f9f9" el_id="concept"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_hero_split_slider_content_holder height="custom" height_custom="700" tabs_id="tabs-1525879362-21" auto_advance="" show_nav_arrows="true" use_pagination="true" media_alignment="left" pagination_color_1="#ffffff" pagination_color_2="#33363a" transition_easing="easeInOutCubic" transition_speed="1000"][tm_hero_split_slider_content_item title="Slide 1" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-half-4@2x.jpg" textarea_html_bkg_color="#ffffff" content_media_width="split_50_50" background_color="#f8f8f8" pagination_color_palette="nav_color_1" slide_animation="slideLeftRight" tab_id="tab-1525879298-1-88"]
<h2 class="mb-30">Concept</h2>
<p class="lead">Kant is the perfect toolkit for startups that need a professional way to presents their products or services.</p>
We only send you products that relate to your preference and previous purchases. Offers are sent out on a weekly basis. Unsubscribe at any moment.[/tm_hero_split_slider_content_item][tm_hero_split_slider_content_item title="Slide 2" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-half-2@2x-2.jpg" textarea_html_bkg_color="#ffffff" content_media_width="split_50_50" media_alignment="right" background_color="#f8f8f8" pagination_color_palette="nav_color_2" slide_animation="slideLeftRight" tab_id="tab_id-1525880344648-10"]
<h2 class="mb-30">Handcrafted</h2>
<p class="lead">We're proud of this product and we hope you'll be eqully as proud building a site with Kant.</p>
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.[/tm_hero_split_slider_content_item][tm_hero_split_slider_content_item title="Slide 3" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-half-3@2x.jpg" textarea_html_bkg_color="#ffffff" content_media_width="split_50_50" background_color="#f8f8f8" pagination_color_palette="nav_color_1" slide_animation="scaleIn" tab_id="tab_id-1525880437022-3"]
<h2 class="mb-30">Accessories</h2>
<p class="lead">We're proud of this product and we hope you'll be eqully as proud building a site with Kant.</p>
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.[/tm_hero_split_slider_content_item][/tm_hero_split_slider_content_holder][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
