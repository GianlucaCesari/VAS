<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Split hero with map right(greyscale)", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_split-hero-with-map-rightgreyscale tm-tmp-category_herso';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" use_background="yes" background_color="#ffffff"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_hero_5 height="custom" height_custom="600" media_content_type="map" textarea_html_bkg_color="#ffffff" media_alignment="right" text_color="" overlay_background_color="rgba(0,0,0,0.01)" map_style="greyscale" zoom_level="11" map_coordinates_1="40.723301,-74.002988" map_info_1="Store Location 1 - New York City" map_marker_1="7741" map_coordinates_2="40.723301,-73.907888" map_info_2="Store Location 2 - New York City" map_marker_2="7741"]
<h2 class="mb-40" style="text-align: left;">Visit Our Stores!</h2>
<p class="lead" style="text-align: left;"><span class="font-alt-1">Find special in-store starting today.</span></p>
<p class="mb-0" style="text-align: left;">With every purchase of a ThemeMountain product you get 6 months premium support! We provide our customers with friendly, timely, and carefully detailed support. For any pre-sale questions, please contact us through our profile.</p>
[/tm_hero_5][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
