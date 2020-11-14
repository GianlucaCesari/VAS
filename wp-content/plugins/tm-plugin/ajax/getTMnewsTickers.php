<?php
namespace ThemeMountain;
/**
 * ajax command: getTMnewsTickers
 */
if ( is_user_logged_in() !== TRUE ) {
	$ajaxResponseArray = TM_Ajax::constructAjaxResponseArray(FALSE,'');
} else {
	$_current_theme = sanitize_text_field($_POST['current_stylesheet']);
	$serverResponse = wp_remote_post(
		'https://update.thememountain.com/',
		array(
			'method' => 'POST',
			'body' =>
				array(
					'action' => 'tm_news',
					'current_theme' => $_current_theme
				)
		)
	);
	if(is_array($serverResponse)) {
		$ajaxResponseArray = TM_Ajax::constructAjaxResponseArray(TRUE, json_decode($serverResponse['body']));
	} else {
		$ajaxResponseArray = TM_Ajax::constructAjaxResponseArray(FALSE,'');
	}
}