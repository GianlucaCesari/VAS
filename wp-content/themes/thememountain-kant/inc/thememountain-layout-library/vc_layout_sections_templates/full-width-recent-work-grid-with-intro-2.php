<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Full width recent work grid with intro", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_full-width-recent-work-grid-with-intro-2 tm-tmp-category_grids';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row force_fullwidth="true" equalize="true" columns_on_tablet="keep" clear_all_padding="yes" el_class="collapse"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][tm_grid show_filter_menu="" show_project_title_and_description="false" grid_items="size:10|order_by:date|post_type:tm_folio|tax_query:173" width="full_width" fixed_thumb_dimensions="true" set_as_background_images="true" column_number="2" column_gutters="none" rollover_bkg_color="rgba(0,0,0,0.3)" project_title_color="#ffffff" project_description_color="#ffffff" rollover_animation="overlay-fade-img-scale-out"][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );
