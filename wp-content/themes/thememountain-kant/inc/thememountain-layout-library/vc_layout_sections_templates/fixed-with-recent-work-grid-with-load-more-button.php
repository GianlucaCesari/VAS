<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Fixed with recent work grid with load more button", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_fixed-with-recent-work-grid-with-load-more-button tm-tmp-category_grids';
$thememountain_data['content'] = <<<CONTENT
[vc_row force_fullwidth="true" columns_on_tablet="keep" padding_top="40"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_grid grid_preloading="infinite_scroll_with_load_button" show_project_title_and_description="true" grid_items="size:25|order_by:date|post_type:tm_folio|tax_query:106,117,130" fixed_thumb_dimensions="true" set_as_background_images="true" alignment="center" link_color="#666666" link_color_hover="#000000" link_color_active="#ffffff" link_border_color_active="rgba(255,255,255,0.01)" use_gridmenu_link_background_color="true" gridmenu_link_background_color="#ffffff" gridmenu_link_background_color_hover="rgba(255,255,255,0.01)" gridmenu_link_background_color_active="#232323" rollover_bkg_color="rgba(0,0,0,0.5)" project_title_color="#ffffff" project_description_color="#ffffff" rollover_animation="overlay-img-scale-in" rollover_animation_duration="400" rollover_easing="easeOutQuad"][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
