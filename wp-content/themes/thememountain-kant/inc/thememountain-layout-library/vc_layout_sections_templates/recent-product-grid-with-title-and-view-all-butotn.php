<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Recent product grid with title and view all butotn", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_recent-product-grid-with-title-and-view-all-butotn tm-tmp-category_grids';
$thememountain_data['content'] = <<<CONTENT
[vc_row columns_on_tablet="keep" el_id="recent-products"][vc_column h_text_align="center" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][vc_row_inner columns_on_tablet="keep" padding_top="0" padding_bottom="40"][vc_column_inner h_text_align="left" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/2"][tm_textblock textarea_html_bkg_color="#ffffff"]
<h2><strong>Recently Added Products</strong></h2>
[/tm_textblock][/vc_column_inner][vc_column_inner h_text_align="right" h_text_align_mobile="left-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/2"][tm_button margin_bottom="0" margin_bottom_mobile="0" button_label="View All Products" link_url="/thememountain-kant/shop" button_size="medium"][/vc_column_inner][/vc_row_inner][vc_row_inner columns_on_tablet="keep" clear_all_padding="yes"][vc_column_inner h_text_align="right" h_text_align_mobile="center-on-mobile" v_align="v-align-middle" column_offset="" column_push="" column_pull="" width="1/1"][products columns="3" orderby="date" order="" ids="6937, 6964, 6948, 6967, 6970, 6929, 6958, 7000"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
vc_add_default_templates( $thememountain_data );
