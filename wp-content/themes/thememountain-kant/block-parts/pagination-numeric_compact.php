<?php
global $wp_query,$paged;
$thememountain_pagination_data = array('next'=>array(),'prev'=>array());
$thememountain_max_page = $wp_query->max_num_pages;
$thememountain_paged = ($paged == 0) ? 1 : $paged;
if($thememountain_max_page > 1) {
						// next page
	$thememountain_nextpage = intval($thememountain_paged) + 1;
	if ( !$thememountain_max_page || $thememountain_max_page < $thememountain_nextpage ) {
		$thememountain_pagination_data['next']['link'] = 'javascript:void(0);';
		$thememountain_pagination_data['next']['state'] = 'disabled';
		$thememountain_pagination_data['next']['label'] = esc_html__('No More Posts',"thememountain-kant");
	} else {
		$thememountain_pagination_data['next']['pagenum'] = $thememountain_nextpage;
		$thememountain_pagination_data['next']['state'] = '';
		$thememountain_pagination_data['next']['link'] = get_next_posts_page_link(); // $pagenum is 1 by default
		$thememountain_pagination_data['next']['label'] = intval($thememountain_max_page - $thememountain_nextpage + 1).' '._n('More Page','More Pages',intval($thememountain_max_page - $thememountain_nextpage + 1),"thememountain-kant");
	}
	// prev page
	$thememountain_prevpage = intval($thememountain_paged) - 1;
	if ( $thememountain_prevpage < 1 ) {
		$thememountain_pagination_data['prev']['state'] = 'disabled';
		$thememountain_pagination_data['prev']['link'] = 'javascript:void(0);';
		$thememountain_pagination_data['prev']['label'] = esc_html__('No More Posts',"thememountain-kant");
	} else {
		$thememountain_pagination_data['prev']['pagenum'] = $thememountain_prevpage;
		$thememountain_pagination_data['prev']['link'] = get_previous_posts_page_link();
		$thememountain_pagination_data['prev']['state'] = '';
		$thememountain_pagination_data['prev']['label'] = intval($thememountain_prevpage). ' '._n('More Page','More Pages',intval($thememountain_prevpage),"thememountain-kant");
	}
} else {
	$thememountain_pagination_data['prev']['state'] = 'disabled';
	$thememountain_pagination_data['prev']['link'] = 'javascript:void(0);';
	$thememountain_pagination_data['next']['label'] = esc_html__('No More Posts',"thememountain-kant");
	$thememountain_pagination_data['next']['state'] = 'disabled';
	$thememountain_pagination_data['next']['link'] = 'javascript:void(0);';
	$thememountain_pagination_data['prev']['label'] = esc_html__('No More Posts',"thememountain-kant");
}
?>
<!-- Pagination Section 5 -->
<div class="section-block pagination-5">
	<div class="row">
		<div class="column width-12">
			<ul>
				<li>
					<a class="pagination-previous animated-link left <?php echo esc_attr($thememountain_pagination_data['prev']['state']);?>" <?php if($thememountain_pagination_data['prev']['link']  !== '') { ?>href="<?php echo ($thememountain_pagination_data['prev']['link']); ?>"<?php } ?>><span class="text-line bkg-charcoal"></span><span><?php echo esc_html($thememountain_pagination_data['prev']['label']); ?></span></a>
					<div class="pagination-image post-1-previous"></div>
				</li>
				<li>
					<a class="pagination-next animated-link right <?php echo esc_attr($thememountain_pagination_data['next']['state']);?>" <?php if($thememountain_pagination_data['next']['link']  !== '') { ?>href="<?php echo ($thememountain_pagination_data['next']['link']); ?>"<?php } ?>> <span class="text-line bkg-charcoal"></span><span><?php echo esc_html($thememountain_pagination_data['next']['label']); ?></span></a>
					<div class="pagination-image"></div>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- Pagination Section 5 End -->