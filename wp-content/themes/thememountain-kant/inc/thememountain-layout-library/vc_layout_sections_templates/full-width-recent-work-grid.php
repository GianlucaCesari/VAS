<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Full width recent work grid", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_full-width-recent-work-grid tm-tmp-category_grids';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" clear_all_padding="yes" use_background="yes" background_color="#f9f9f9"][vc_column h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/1"][tm_grid show_filter_menu="" show_project_title_and_description="false" grid_items="size:10|order_by:date|post_type:tm_folio|tax_query:131" width="full_width" fixed_thumb_dimensions="true" set_as_background_images="true" column_number="4" column_gutters="none" link_color="#666666" link_color_hover="#000000" rollover_bkg_color="rgba(0,0,0,0.3)" project_title_color="#ffffff" project_description_color="#ffffff"][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
