<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Split hero image right (50/50)", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_split-hero-image-right-5050 tm-tmp-category_heros';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row columns_on_tablet="keep" use_background="yes" background_color="#232323"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_hero_5 height="auto" media_content_type="image" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/hero-half-7@2x.jpg" textarea_html_bkg_color="#ffffff" media_alignment="right" text_color="#ffffff" overlay_background_color="rgba(0,0,0,0.01)"]</p>
<h3 style="text-align: left">Strategy</h3>
<p class="lead" style="text-align: left">Kant is an elegant multi-purpose template that is big, bold and beautiful.</p>
<p class="mb-50" style="text-align: left">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
<h4 style="text-align: left">Marketing</h4>
<ul style="text-align: left">
<li>Block-based design</li>
<li>20+ Components</li>
<li>70+ Purpose-built blocks</li>
<li>10+ Plugins</li>
<li>and much more...</li>
</ul>
<p>[/tm_hero_5][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
