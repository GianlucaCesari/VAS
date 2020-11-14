<?php
namespace ThemeMountain;
/**
 * Get option variables
 */
if(isset($_POST['is_vc_element_request']) && $_POST['is_vc_element_request'] === 'true' ) {
	$thememountain_mailchimp_form_settings = get_option('tm_mailchimp_form_settings');
	$email = sanitize_email($_POST['email']);
	$fname = (isset($_POST['fname']) && !empty($_POST['fname'])) ? sanitize_text_field($_POST['fname']) : '';
	$lname = (isset($_POST['lname']) && !empty($_POST['lname'])) ? sanitize_text_field($_POST['lname']) : '';
	$api_key = $thememountain_mailchimp_form_settings['api_key'];
	$list_id = $thememountain_mailchimp_form_settings['list_id'];
	// GDPR support
	$email_consent = (isset($_POST['checkbox-consent']) && !empty($_POST['checkbox-consent'])) ? TRUE : FALSE;
} else if(isset($_POST['widget_id']) && !empty($_POST['widget_id'])) {
	$widget_id = intval($_POST['widget_id']);
	$widget_data = get_option('widget_tm_mailchimp');
	$email = sanitize_email($_POST['email']);
	$fname = (isset($_POST['fname']) && !empty($_POST['fname'])) ? sanitize_text_field($_POST['fname']) : '';
	$lname = (isset($_POST['lname']) && !empty($_POST['lname'])) ? sanitize_text_field($_POST['lname']) : '';
	$api_key = $widget_data[$widget_id]['api_key'];
	$list_id = $widget_data[$widget_id]['list_id'];
	// GDPR support
	$email_consent = (isset($_POST['checkbox-consent']) && !empty($_POST['checkbox-consent'])) ? TRUE : FALSE;
} else {
	$ajaxResponseArray = TM_Ajax::constructAjaxResponseArray(FALSE,esc_html__('Configuration error: Widget ID is missing.','thememountain-plugin'));
}

if(empty($api_key) || empty($list_id)) {
	$ajaxResponseArray = TM_Ajax::constructAjaxResponseArray(FALSE,esc_html__('Configuration error: API key or list ID is missing','thememountain-plugin'));
}

if(empty($email)) {
	$ajaxResponseArray = TM_Ajax::constructAjaxResponseArray(FALSE,esc_html__('Error: email address is missing.','thememountain-plugin'));
}

// GDPR
$status = ($email_consent === TRUE) ? 'pending' : 'subscribed';

/**
 * see https://apidocs.mailchimp.com/api/2.0/lists/subscribe.php
 * When using a wrapper or XML-RPC, this is generally the parameter order.
 * When building JSON objects or serialized HTTP requests parameter order does not matter
 */
// var_dump($thememountain_mailchimp_form_settings,$email,$fname,$api_key,$list_id);
if( empty($ajaxResponseArray) ) {
	try {
		include_once( TM_Ajax::$local_plugin_dir . 'class/MailChimp/MailChimp.php');
		$MailChimp = new \DrewM\MailChimp\MailChimp($api_key);
		$result = $MailChimp->post("lists/$list_id/members", array(
			'email_address' => $email,
			'status'        => $status,
			'merge_fields'  => array(
				'FNAME'     => $fname,
				'LNAME'     => $lname
				)
			)
		);
		if($result['status'] == 'subscribed') {
			$ajaxResponseArray = TM_Ajax::constructAjaxResponseArray(TRUE,esc_html__('You have been added to our list!','thememountain-plugin'));
		} else if($result['status'] == 'pending') {
			$ajaxResponseArray = TM_Ajax::constructAjaxResponseArray(TRUE,esc_html__('We have sent you an email to confirm your subscription!','thememountain-plugin'));
		} else {
			$ajaxResponseArray = TM_Ajax::constructAjaxResponseArray(FALSE,(isset($result['title'])) ? $result['title'] : 'Mailchimp error.');
		}
	} catch (\Exception $_e) {
		$ajaxResponseArray = TM_Ajax::constructAjaxResponseArray(FALSE,$_e->getMessage());
	}
}