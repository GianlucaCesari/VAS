<?php
namespace ThemeMountain;
if(array_key_exists('image_post_id',$_POST)) {
	$_image_post_id = $_POST['image_post_id'];
	$_image_size = 'full';
	if(array_key_exists('size',$_POST)) {
		$_image_size = $_POST['size'];
	}
	$_image_info = wp_get_attachment_image_src($_image_post_id,$_image_size);
	$ajaxResponseArray = TM_Ajax::constructAjaxResponseArray(TRUE,'',$_image_info[0]);
} else {
	$ajaxResponseArray = TM_Ajax::constructAjaxResponseArray(FALSE,'NO_IMAGE_POST_ID');
}