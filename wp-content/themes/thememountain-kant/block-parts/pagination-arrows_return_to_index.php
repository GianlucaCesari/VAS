<?php
namespace ThemeMountain;
/** Pagination Section 3 pagination_arrows_return_to_index */
/**
 * previous_posts_link and next_posts_link are replaced with the followings because those are not really customisable.
 */
/**
 * exclude uncategorized if tm_folio
 */
	if ( 'tm_folio' == get_post_type() ) {
		$thememountain_excluded_category = TM_TemplateServices::get_tm_folio_pagination_exclusion_category();
	} else {
		$thememountain_excluded_category = "";
	}
	$thememountain_pagination_data = array();
	$thememountain_previous_post = get_adjacent_post( false , $thememountain_excluded_category, true);
	$thememountain_next_post = get_adjacent_post( false , $thememountain_excluded_category, false);

	// next
	if ( $thememountain_next_post === "" ) {
		$thememountain_pagination_data['next']['link'] = 'javascript:void(0);';
		$thememountain_pagination_data['next']['state'] = ' disabled';
		$thememountain_pagination_data['next']['label'] = esc_html__('No More Posts',"thememountain-kant");
	} else {
		$thememountain_pagination_data['next']['state'] = '';
		$thememountain_pagination_data['next']['link'] = get_permalink($thememountain_next_post->ID);
		$thememountain_pagination_data['next']['label'] = $thememountain_next_post->post_title;
	}
	// prev page
	if ( $thememountain_previous_post === "" ) {
		$thememountain_pagination_data['prev']['state'] = ' disabled';
		$thememountain_pagination_data['prev']['link'] = 'javascript:void(0);';
		$thememountain_pagination_data['prev']['label'] = esc_html__('No More Posts',"thememountain-kant");
	} else {
		$thememountain_pagination_data['prev']['link'] = get_permalink($thememountain_previous_post->ID);
		$thememountain_pagination_data['prev']['state'] = '';
		$thememountain_pagination_data['prev']['label'] = $thememountain_previous_post->post_title;
	}

	/**
	 * Pagination Options
	 */
	$thememountain_pagination_return_to_index = TM_TemplateServices::get_current_page_data(array('options','tm_pagination_return_to_index'));
?>
<div class="section-block pagination-3 portfolio pt-40 pb-40">
	<div class="row">
		<div class="column width-12">
			<ul>
				<li>
					<a class="pagination-previous<?php echo esc_attr($thememountain_pagination_data['prev']['state']);?>" <?php if($thememountain_pagination_data['prev']['link']  !== '') { ?>href="<?php echo ($thememountain_pagination_data['prev']['link']); ?>"<?php } ?>><span class="icon-left-open-mini"></span><?php echo esc_html($thememountain_pagination_data['prev']['label']); ?></a>
					<div class="pagination-image post-1-previous"></div>
				</li>
				<?php
					if($thememountain_pagination_return_to_index === 'label') {
						$thememountain_pagination_return_to_index_label = TM_TemplateServices::get_current_page_data(array('options','tm_pagination_return_to_index_label'));
						?>
						<li><a class="back-to-grid with-label fade-location" href="<?php echo get_post_type_archive_link( get_post_type() ); ?>"><?php echo esc_html($thememountain_pagination_return_to_index_label); ?></a></li>
					<?php
					} else if ($thememountain_pagination_return_to_index === 'icon') { ?>
						<li><a class="back-to-grid fade-location" href="<?php echo get_post_type_archive_link( get_post_type() ); ?>"><span class="icon-grid large"></span></a></li>
					<?php
					}
				?>
				<li>
					<a class="pagination-next<?php echo esc_attr($thememountain_pagination_data['next']['state']);?>" <?php if($thememountain_pagination_data['next']['link']  !== '') { ?>href="<?php echo ($thememountain_pagination_data['next']['link']); ?>"<?php } ?>><?php echo esc_html($thememountain_pagination_data['next']['label']); ?><span class="icon-right-open-mini"></span></a>
					<div class="pagination-image"></div>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- Pagination Section 5 End -->