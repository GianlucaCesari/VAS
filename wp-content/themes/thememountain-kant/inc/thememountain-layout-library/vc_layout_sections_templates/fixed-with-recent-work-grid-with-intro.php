<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Fixed with recent work grid with intro", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_fixed-with-recent-work-grid-with-intro tm-tmp-category_grids';
$thememountain_data['content'] = <<<CONTENT
[vc_row force_fullwidth="true" columns_on_tablet="keep"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/2"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h2>Our Recent Work</h2>
[/tm_textblock][/vc_column_inner][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" width="1/2"][tm_textblock textarea_html_bkg_color="#ffffff"]
<p class="lead">Here are some samples of work we have recently completed. For a full list, contact us.</p>
[/tm_textblock][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_grid show_project_title_and_description="true" grid_items="size:10|order_by:date|post_type:tm_folio|tax_query:113,103,95" fixed_thumb_dimensions="true" set_as_background_images="true" column_gutters="small" link_color="#666666" link_color_hover="#232323" link_color_active="#ffffff" link_border_color_active="rgba(0,0,0,0.01)" use_gridmenu_link_background_color="true" gridmenu_link_background_color="rgba(255,255,255,0.01)" gridmenu_link_background_color_hover="rgba(255,255,255,0.01)" gridmenu_link_background_color_active="#232323" rollover_bkg_color="rgba(0,0,0,0.5)" project_title_color="#ffffff" project_description_color="#ffffff" rollover_animation="overlay-img-scale-in" rollover_easing="easeInOutQuart"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
