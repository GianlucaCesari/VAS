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
		$thememountain_pagination_data['next']['state'] = ' disabled';
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
		$thememountain_pagination_data['prev']['state'] = ' disabled';
		$thememountain_pagination_data['prev']['link'] = 'javascript:void(0);';
		$thememountain_pagination_data['prev']['label'] = esc_html__('No More Posts',"thememountain-kant");
	} else {
		$thememountain_pagination_data['prev']['pagenum'] = $thememountain_prevpage;
		$thememountain_pagination_data['prev']['link'] = get_previous_posts_page_link();
		$thememountain_pagination_data['prev']['state'] = '';
		$thememountain_pagination_data['prev']['label'] = intval($thememountain_prevpage). ' '._n('More Page','More Pages',intval($thememountain_prevpage),"thememountain-kant");
	}
} else {
	$thememountain_pagination_data['prev']['state'] = ' disabled';
	$thememountain_pagination_data['prev']['link'] = 'javascript:void(0);';
	$thememountain_pagination_data['next']['label'] = esc_html__('No More Posts',"thememountain-kant");
	$thememountain_pagination_data['next']['state'] = ' disabled';
	$thememountain_pagination_data['next']['link'] = 'javascript:void(0);';
	$thememountain_pagination_data['prev']['label'] = esc_html__('No More Posts',"thememountain-kant");
}
?>
<!-- Pagination Section 5 -->
<div class="section-block pagination-3 pt-40 pb-40">
	<div class="row">
		<div class="column width-12">
			<ul>
				<li><a class="pagination-previous<?php echo esc_attr($thememountain_pagination_data['prev']['state']); ?>" href="<?php echo ($thememountain_pagination_data['prev']['link']); ?>"><span class="icon-left-open-mini"></span><?php echo esc_html($thememountain_pagination_data['prev']['label']); ?></a></li>
				<?php if($thememountain_max_page > 1) :?>
					<?php for ($thememountain_i = 1; $thememountain_i <= $thememountain_max_page; $thememountain_i++) { ?>
					<li>
						<?php if($thememountain_paged === $thememountain_i) { ?>
						<a class="current active"><?php echo esc_html($thememountain_i); ?></a>
						<?php } else { ?>
						<?php printf( '<a href="%s">%s</a>' . "\n", esc_url( get_pagenum_link( $thememountain_i ) ), $thememountain_i ); ?>
						<?php } ?>
					</li>
					<?php } ?>
				<?php endif; ?>
				<li><a class="pagination-next<?php echo esc_attr($thememountain_pagination_data['next']['state']); ?>" href="<?php echo ($thememountain_pagination_data['next']['link']); ?>"><?php echo esc_html($thememountain_pagination_data['next']['label']); ?><span class="icon-right-open-mini"></span></a></li>
			</ul>
		</div>
	</div>
</div>
<!-- Pagination Section 5 End -->