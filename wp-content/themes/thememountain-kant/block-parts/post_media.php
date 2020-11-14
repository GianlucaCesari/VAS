<?php
namespace ThemeMountain;

/**
 * Load settings for loop
 */
if(is_singular()) {
	// no loop style
	$thememountain_loop_style = FALSE;
	// settings
	$thememountain_use_post_media = TM_TemplateServices::get_current_page_data(array('options','tm_use_post_media'));
	$thememountain_media_youtube = TM_TemplateServices::get_current_page_data(array('options','tm_media_youtube'));
	$thememountain_media_vimeo = TM_TemplateServices::get_current_page_data(array('options','tm_media_vimeo'));
	$thememountain_media_video_mp4 = TM_TemplateServices::strip_http_and_https_from_link(TM_TemplateServices::get_current_page_data(array('options','tm_media_video_mp4')));
	$thememountain_media_video_webm = TM_TemplateServices::strip_http_and_https_from_link(TM_TemplateServices::get_current_page_data(array('options','tm_media_video_webm')));
	$thememountain_media_thumbnail = TM_TemplateServices::strip_http_and_https_from_link(TM_TemplateServices::get_current_page_data(array('options','tm_media_thumbnail')));
	$thememountain_media_height = TM_TemplateServices::get_current_page_data(array('options','tm_media_height'));
	$thememountain_media_height_custom = TM_TemplateServices::get_current_page_data(array('options','tm_media_height_custom'));
	// audio
	$thememountain_media_audio = TM_TemplateServices::strip_http_and_https_from_link(TM_TemplateServices::get_current_page_data(array('options','tm_media_audio')));
	$thememountain_use_audio_for_featured = TM_TemplateServices::get_current_page_data(array('options','tm_use_audio_for_featured'));
} else {
	// Loop style
	$thememountain_loop_style = TM_TemplateServices::get_runtime_page_data(array('options','tm_loop_style'));
	if ( $thememountain_loop_style !== 'wide' ||  $thememountain_loop_style === 'creative' ) {
		$thememountain_loop_style = 'grids';
	}
	// settings
	$thememountain_use_post_media = TM_TemplateServices::get_runtime_page_data(array('options','tm_use_post_media'));
	$thememountain_media_youtube = TM_TemplateServices::get_runtime_page_data(array('options','tm_media_youtube'));
	$thememountain_media_vimeo = TM_TemplateServices::get_runtime_page_data(array('options','tm_media_vimeo'));
	$thememountain_media_video_mp4 = TM_TemplateServices::strip_http_and_https_from_link(TM_TemplateServices::get_runtime_page_data(array('options','tm_media_video_mp4')));
	$thememountain_media_video_webm = TM_TemplateServices::strip_http_and_https_from_link(TM_TemplateServices::get_runtime_page_data(array('options','tm_media_video_webm')));
	$thememountain_media_thumbnail = TM_TemplateServices::strip_http_and_https_from_link(TM_TemplateServices::get_runtime_page_data(array('options','tm_media_thumbnail')));
	$thememountain_media_height = TM_TemplateServices::get_runtime_page_data(array('options','tm_media_height'));
	$thememountain_media_height_custom = TM_TemplateServices::get_runtime_page_data(array('options','tm_media_height_custom'));
	// audio
	$thememountain_media_audio = TM_TemplateServices::strip_http_and_https_from_link(TM_TemplateServices::get_runtime_page_data(array('options','tm_media_audio')));

	$thememountain_use_audio_for_featured = TM_TemplateServices::get_runtime_page_data(array('options','tm_use_audio_for_featured'));
}

// variables for post media
// css ID
	$thememountain_css_id = ' post-media-wide-'.time() . rand( 0, 100 );
// height
	switch($thememountain_media_height) {
		case 'custom':
			$thememountain_media_height_custom = esc_attr($thememountain_media_height_custom);
			TM_StyleAndScripts::tm_add_inline_css_foot(".$thememountain_css_id { height:{$thememountain_media_height_custom}!important; }");
			$thememountain_media_height = '';
			break;
		case 'window-height':
			$thememountain_media_height = ' window-height';
			break;
		default:
			$thememountain_media_height = '';
			break;
	}
// iframe tag name
	$thememountain_iframe_tag = 'iframe';
if($thememountain_loop_style === 'columns') : ?>
<div class="post-media">
<?php else : ?>
<div class="post-media<?php echo esc_attr($thememountain_css_id).esc_attr($thememountain_media_height); ?>">
<?php endif; ?>
<?php
// video type
switch($thememountain_use_post_media) {
	case 'youtube':
		$thememountain_media_youtube = esc_attr($thememountain_media_youtube);
		echo "<div class='video-container'><{$thememountain_iframe_tag} src='//www.youtube.com/embed/{$thememountain_media_youtube}' width='560' height='315' ></{$thememountain_iframe_tag}></div>";
		break;
	case 'vimeo':
		$thememountain_media_vimeo = esc_attr($thememountain_media_vimeo);
		echo "<div class='video-container'><{$thememountain_iframe_tag} src='//player.vimeo.com/video/{$thememountain_media_vimeo}?title=0&amp;byline=0&amp;portrait=0&amp;color=304cd1&amp;loop=1' width='500' height='281'></{$thememountain_iframe_tag}></div>";
		break;
	case 'audio':
		$thememountain_media_thumbnail = esc_url($thememountain_media_audio);
		echo "<div class='mejs-container'><audio preload='none' src='{$thememountain_media_audio}'></audio></div>";
		break;
	case 'video':
		$thememountain_video_container_html = '';
		if ( !empty($thememountain_media_video_mp4) ) {
			$thememountain_media_video_mp4 = esc_url($thememountain_media_video_mp4);
			$thememountain_video_container_html .= "<source type='video/mp4' src='{$thememountain_media_video_mp4}'>\n";
		}
		if ( !empty($thememountain_media_video_webm) ) {
			$thememountain_media_video_webm = esc_url($thememountain_media_video_webm);
			$thememountain_video_container_html .= "<source type='video/webm' src='{$thememountain_media_video_webm}'>\n";
		}
		// wrap it up
		$thememountain_media_thumbnail = esc_url($thememountain_media_thumbnail);
		echo "<div class='mejs-container'><video poster='{$thememountain_media_thumbnail}'>\n{$thememountain_video_container_html}\n</video></div>";
		break;
	default:
		break;
}
?>
</div>
