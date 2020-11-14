<?php
use ThemeMountain\TM_Shortcodes as TM_Shortcodes;

/**
 * Overrides Wordpress default gallery shortcode
 */
remove_shortcode('gallery');
add_shortcode( 'gallery', 'tm_gallery_shortcode' );
function tm_gallery_shortcode($attr, $content, $tagname) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) ) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	/**
	 * Filters the default gallery shortcode output.
	 *
	 * If the filtered output isn't empty, it will be used instead of generating
	 * the default gallery template.
	 *
	 * @since 2.5.0
	 * @since 4.2.0 The `$instance` parameter was added.
	 *
	 * @see gallery_shortcode()
	 *
	 * @param string $output   The gallery output. Default empty.
	 * @param array  $attr     Attributes of the gallery shortcode.
	 * @param int    $instance Unique numeric ID of this gallery shortcode instance.
	 */
	$output = apply_filters( 'post_gallery', '', $attr, $instance );
	if ( $output != '' ) {
		return $output;
	}

	$html5 = current_theme_supports( 'html5', 'gallery' );
	$atts = shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => $html5 ? 'figure'     : 'div',
		'icontag'    => $html5 ? 'div'        : 'div',
		'captiontag' => $html5 ? 'figcaption' : 'span',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery' );

	$_gallery_id = intval( $atts['id'] );

	if ( ! empty( $atts['include'] ) ) {
		$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( ! empty( $atts['exclude'] ) ) {
		$attachments = get_children( array( 'post_parent' => $_gallery_id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	} else {
		$attachments = get_children( array( 'post_parent' => $_gallery_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	}

	if ( empty( $attachments ) ) {
		return '';
	}

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) {
			$output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
		}
		return $output;
	}

	// force options
	$atts['size'] = 'full';

	$itemtag = tag_escape( $atts['itemtag'] );
	$captiontag = tag_escape( $atts['captiontag'] );
	$icontag = tag_escape( $atts['icontag'] );
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) ) {
		$itemtag = 'div';
	}
	if ( ! isset( $valid_tags[ $captiontag ] ) ) {
		$captiontag = 'dd';
	}
	if ( ! isset( $valid_tags[ $icontag ] ) ) {
		$icontag = 'dt';
	}

	$columns = intval( $atts['columns'] );
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$size_class = sanitize_html_class( $atts['size'] );
	$gallery_div = "<div id='$selector' class='section-block no-padding grid-container fade-in-progressively gallery galleryid-{$_gallery_id} gallery-columns-{$columns} gallery-size-{$size_class}' data-layout-mode='masonry' data-animate-filter-duration='700' data-animate-resize data-animate-resize-duration='700' data-grid-ratio='1.5'><div class='row'><div class='column width-12'><div class='row grid content-grid-{$columns}'>\n\t\t";

	/**
	 * Filters the default gallery shortcode CSS styles.
	 *
	 * @since 2.5.0
	 */
	$output = apply_filters( 'gallery_style', $gallery_div );

	$i = 0;
	$_grid_sizer = ' grid-sizer';
	$_caption_output_html = '';
	$_caption_text = '';
	$_lightbox = '';
	$_attachment_link = '';

	// scan through each grid item
	foreach ( $attachments as $_attachment_id => $_attachment ) {
		// get attributes
		$_grid_item_attribute = ( trim( $_attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$_attachment_id" ) : '';
		// get image
		$image_output = wp_get_attachment_image( $_attachment_id, $atts['size'], false, $_grid_item_attribute );
		// check up the image link types.
		if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
			// media file
			// $image_output = wp_get_attachment_link( $_attachment_id, $atts['size'], false, false, false, $_grid_item_attribute );
			$_attachment_image_url = wp_get_attachment_url( $_attachment_id );
			$_lightbox = '';
		} elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
			// none specified
			// $image_output = wp_get_attachment_image( $_attachment_id, $atts['size'], false, $_grid_item_attribute );
			$_lightbox = $_attachment_image_url = '';
		} else {
			$_attachment_image_url = wp_get_attachment_url( $_attachment_id );
			$_lightbox = ' lightbox-link';
			// linked to the attachment page (to be replaced with light box in this custom function).
			// $image_output = wp_get_attachment_link( $_attachment_id, $atts['size'], true, false, false, $_grid_item_attribute );
		}

		// find orientation
		$image_meta  = wp_get_attachment_metadata( $_attachment_id );
		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
			$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
		}

		// start output grid item
		$output .= "<{$itemtag} class='grid-item {$orientation}{$_grid_sizer}'>";
		// reset grid sizer
		$_grid_sizer = '';
		// caption output
		if ( $captiontag && trim($_attachment->post_excerpt) ) {
			$_caption_text = wptexturize($_attachment->post_excerpt);
			$_caption_output_html = "
					<{$captiontag} class='overlay-info' id='$selector-{$_attachment_id}'><span><span><span class='project-title'>
					" . $_caption_text . "
					</span></span></span></{$captiontag}>";
		} else {
			$_caption_output_html = '';
			$_caption_text = '';
		}
		// constract icon tag
		$output .= "
			<{$icontag} class='thumbnail img-scale-in' data-hover-easing='swing' data-hover-speed='700' data-hover-bkg-color='#FFFFFF' data-hover-bkg-opacity='0.8'>
				<a class='overlay-link{$_lightbox}' data-group='lightbox_data_group-{$_gallery_id}' data-caption='{$_caption_text}' href='{$_attachment_image_url}'>
					$image_output
					{$_caption_output_html}
				</a>
			</{$icontag}>";
		// clsoe it.
		$output .= "\n\t\t</{$itemtag}>\n\t\t";
		// last
		// if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
		// 	$output .= '<br style="clear: both" />';
		// }
	}

	// if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
	// 	$output .= "
	// 		<br style='clear: both' />";
	// }

	$output .= "
		</div></div></div></div>\n";

	return $output;
}
