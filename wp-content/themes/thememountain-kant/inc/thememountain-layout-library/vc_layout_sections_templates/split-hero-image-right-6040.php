<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Split hero image right (60/40)", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_split-hero-image-right-6040 tm-tmp-category_heros';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#f8f8f8" el_id="about"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_hero_5 height="auto" media_content_type="image" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-half-6@2x.jpg" textarea_html_bkg_color="#ffffff" content_media_width="split_60_40" media_alignment="right" text_color="" overlay_background_color="rgba(0,0,0,0.01)" media_animation="slideInRightLong" content_animation="turnInRight"]
<h3>Office Space That Works</h3>
<p class="lead">Kant is an elegant multi-purpose template that is big, bold and beautiful.</p>
It combines elegance, functionality and design. If you are looking for a template that breaks the norm of multi-purpose template design, then Kantd is for you. With some 70+ pages, layouts, components, Kantd gives you a design toolkit to help you create an amazing project for you or your client!

Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.[/tm_hero_5][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
