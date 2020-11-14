<?php
$thememountain_data = array();
$thememountain_data['name'] = esc_html__( "Team lineup with info above", "thememountain-kant" );
$thememountain_data['weight'] = 0;
$thememountain_data['custom_class'] = 'vc_layout_sections_templates tm-tmp_team-lineup-with-info-above tm-tmp-category_team';
$thememountain_data['content'] = <<<CONTENT
<p>[vc_row columns_on_tablet="keep" padding_bottom="0"][vc_column h_text_align="left" h_text_align_mobile="left" v_align="v-align-middle" width="1/1"][tm_team_holder team_type="team-5" tabs_id="1503585430-100" auto_advance="" pagination_color="#000000"][tm_team_item title="Jason Ford" team_member_occupation="Developer" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/team-member-1-3.jpg" social_icon_1="github-with-circle" social_icon_url_1="#" social_icon_2="medium-with-circle" social_icon_url_2="#" social_icon_3="twitter-with-circle" social_icon_url_3="#" social_icon_4="facebook-with-circle" social_icon_url_4="#" team_content_bkg_color="rgba(255,255,255,0.01)" box_border_color="#e8e8e8" box_background_color="#f2f2f2" team_title_color="#000000" team_occupation_color="#666666" team_divider_color="#999999" team_text_color="#666666" tab_id="1503585265-1-7"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque.[/tm_team_item][tm_team_item title="Hannah Andrews" team_member_occupation="Designer" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/team-member-2-3.jpg" social_icon_1="facebook-with-circle" social_icon_url_1="#" social_icon_2="dribbble-with-circle" social_icon_url_2="#" social_icon_3="instagram-with-circle" social_icon_url_3="#" social_icon_4="vimeo-with-circle" team_content_bkg_color="rgba(255,255,255,0.01)" team_title_color="#000000" team_occupation_color="#666666" team_text_color="#666666" tab_id="tab_id-1503585561463-7"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.[/tm_team_item][tm_team_item title="Samuel Banks" team_member_occupation="Illustrator" image_source="image_url" image_url="https://wp.thememountain.com/thememountain-kant/wp-content/uploads/sites/7/2018/05/team-member-3-3.jpg" social_icon_1="flickr-with-circle" social_icon_url_1="#" social_icon_2="dribbble-with-circle" social_icon_url_2="#" social_icon_3="google-with-circle" social_icon_url_3="#" social_icon_4="twitter-with-circle" social_icon_url_4="#" team_content_bkg_color="rgba(255,255,255,0.01)" box_border_color="#ffffff" box_background_color="#ffffff" team_title_color="#000000" team_occupation_color="#666666" team_divider_color="#999999" team_text_color="#666666" tab_id="tab_id-1503585617331-8"]Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid.[/tm_team_item][/tm_team_holder][/vc_column][/vc_row]</p>

CONTENT;
vc_add_default_templates( $thememountain_data );