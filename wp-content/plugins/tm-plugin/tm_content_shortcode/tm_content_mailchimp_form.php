<?php
use ThemeMountain\TM_Shortcodes as TM_Shortcodes;

/**
 * tm_content_mailchimp_form
 *
 * This is for content shortcode. Not available as a VC element
 */
add_shortcode( 'tm_content_mailchimp_form', 'tm_content_mailchimp_form' );
/**
 * Shows mail chimp form
 *
 * @package ThemeMountain
 * @subpackage theme-plugin
 * @since 1.1
 *
 * @param      array   $atts     The attrinbutes
 * @param      string  $content  The content
 * @param      string  $tagname  The tagname (tm_content_mailchimp_form)
 *
 * @return     string  ( description_of_the_return_value )
 */
function tm_content_mailchimp_form($atts, $content, $tagname) {
	$_output = $_style = $_sns_icons = $_href = $_link_target = $_button_width_class = '';

	extract(shortcode_atts(array(
		'hide_name_field' => '',
		'hide_lastname_field' => '',
		'form_alignment' => 'left',
		'form_format' => 'horizontal',
		'form_size' => 'medium',
		'form_corner_style' => '',
		'email_field_placeholder' => esc_html__( "Email address*", 'thememountain-plugin' ),
		'fname_field_placeholder' => esc_html__( "First name*", 'thememountain-plugin' ),
		'lname_field_placeholder' => esc_html__( "Last name*", 'thememountain-plugin' ),
		'button_label' => esc_html__( "Subscribe", 'thememountain-plugin' ),
		'button_background_color' => '#eee',
		'button_background_color_hover' => '#d0d0d0',
		'button_border_color' => '#eee',
		'button_border_color_hover' => '#d0d0d0',
		'button_label_color' => '#666',
		'button_label_color_hover' => '#666',
		'form_background_color' => '#fff',
		'form_border_color' => '#eee',
		'form_placeholder_color' => '#666',
		'form_focus_background_color' => '#fff',
		'form_focus_border_color' => '#eee',
		'form_focus_text_color' => '#000',
		'form_error_background_color' => '#ddd',
		'form_error_border_color' => 'rgba(221, 221, 221, 0)',
		'form_error_text_color' => '#666',
		// tm-plugin #1039
		'checkbox_radio_background_color' => '',
		'checkbox_radio_border_color' => '',
		'checkbox_checked_background_color' => '',
		'checkbox_checked_color' => '',
		'checkbox_error_border_color' => '',
		// End #1039
		'response_message_text_color' => 'inherit',
		'hide_initial_response_message' => '',
		'button_width' => '',
		'initial_response_message' => "We don't spam.",
		'el_id' => '',
		'el_class' => '',
	), $atts));

// css ID
		$_css_id = 'signup-form-container-'.TM_Shortcodes::tm_serial_number();

// class / id
		$el_class = ($el_class !== '' ) ? ' '.$el_class : '';
		$el_id = TM_Shortcodes::wrap_with_id_attr($el_id);

/**
 * CSS
 */
	/** Button Background Color */
	if ( $button_background_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .button {background-color:$button_background_color !important;}");
	}
	if ( $button_background_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .button:hover {background-color:$button_background_color_hover !important;}");
	}
	/** Button Border Color */
	if ( $button_border_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .button {border-color:$button_border_color !important;}");
	}
	if ( $button_border_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .button:hover {border-color:$button_border_color_hover !important;}");
	}
	/** Button Label Color */
	if ( $button_label_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .button {color:$button_label_color !important;}");
	}
	if ( $button_label_color_hover !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .button:hover {color:$button_label_color_hover !important;}");
	}
	/** Form Background Color */
	if ( $form_background_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .form-element {background-color:$form_background_color !important;}");
	}
	/** Form Border Color */
	if ( $form_border_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .form-element {border-color:$form_border_color !important;}");
	}
	/** Form Placeholder Color */
	if ( $form_placeholder_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .form-element::-webkit-input-placeholder {color:$form_placeholder_color !important;} .{$_css_id} .form-element:-moz-placeholder {color:$form_placeholder_color !important;} .{$_css_id} .form-element::-moz-placeholder {color:$form_placeholder_color !important;} .{$_css_id} .form-element:-ms-input-placeholder {color:$form_placeholder_color !important;}");
	}
	/** Form Focus Background Color */
	if ( $form_focus_background_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .form-element:focus,.{$_css_id} .form-element.required-field:focus {background-color:$form_focus_background_color !important;}");
	}
	/** Form Focus Border Color */
	if ( $form_focus_border_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .form-element:focus, .{$_css_id} .form-element.required-field:focus {border-color:$form_focus_border_color !important;}");
	}
	/** Form Focus Text Color */
	if ( $form_focus_text_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .form-element:focus {color:$form_focus_text_color !important;}");
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .form-element:focus::-webkit-input-placeholder {color:$form_focus_text_color !important;} .{$_css_id} .form-element:focus:-moz-placeholder {color:$form_focus_text_color !important;} .{$_css_id} form-element:focus::-moz-placeholder {color:$form_focus_text_color !important;} .{$_css_id} .form-element:focus:-ms-input-placeholder {color:$form_focus_text_color !important;}");

	}

	/** Form Error Background Color */
	if ( $form_error_background_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .form-element.required-field {background-color:$form_error_background_color !important;}");
	}
	/** Form Error Border Color */
	if ( $form_error_border_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .form-element.required-field {border-color:$form_error_border_color !important;}");
	}
	/** Form Error Text Color */
	if ( $form_error_text_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .form-element.required-field {color:$form_error_text_color !important;}");
	}

	/** Checkbox colors */
	// Checkbox & Radio Background Color
	if ( $checkbox_radio_background_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .checkbox + .checkbox-label:before {background:$checkbox_radio_background_color !important;}");
	}
	// Checkbox & Radio Border Color
	if ( $checkbox_radio_border_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .checkbox + .checkbox-label:before {border-color:$checkbox_radio_border_color !important;}");
	}
	// Checkbox Checked Background Color
	if ( $checkbox_checked_background_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .checkbox:checked + .checkbox-label:before {background:$checkbox_checked_background_color !important;border-color:$checkbox_checked_background_color !important;}");
	}
	// Checkbox Checked Color
	if ( $checkbox_checked_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .checkbox:checked + .checkbox-label:before {color:$checkbox_checked_color !important;}");
	}
	// Checkbox Error Border Color
	if ( $checkbox_error_border_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .checkbox.required-field + .checkbox-label:before {border-color:$checkbox_error_border_color !important;}");
	}

	/** Response Message and Consent Notice Text Color */
	if ( $response_message_text_color !== '' ) {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .form-response,.{$_css_id} label,.{$_css_id} .consent-notice,.{$_css_id} .consent-notice a {color:$response_message_text_color !important;}");
	}

/**
 * Attributes
 */
	// $form_alignment = 'left';
	// $form_size = '';
	// $form_corner_style = '';
	if($hide_initial_response_message === 'true') {
		$initial_response_message = '';
	}

// button width
	if($button_width === 'true'){
		$_button_width_class = ' full-width';
	}

/**
 * System use
 */
	$_admin_ajax_url = admin_url( 'admin-ajax.php', is_ssl() ? 'https' : 'http' );
	$thememountain_ajax_nonce = wp_create_nonce('TM_Ajax');

/**
 * Labels
 */
	$_label_subscribe = esc_html($button_label);

/**
 * Column and Width
 */
	$_button_column_width = '';
	$_form_column_width = '';
	$_signup_form_class = '';

	switch($form_format) {
		case 'stacked':
			$_signup_form_class .= ' form-stacked stacked-form-elements';
			break;
		case 'horizontal_merged':
			// set the merged-form-elements class
			$_signup_form_class .= ' form-horizontal-merged merged-form-elements';
			if($hide_name_field === 'true' && $hide_lastname_field === 'true') {
				$_signup_form_class .= ' single-field';
			} else {
				$_signup_form_class .= ' multiple-fields';
			}
			break;
		case 'horizontal':
			$_signup_form_class .= ' form-horizontal';
		default:
			break;
	}

// column widths
	if ($form_format === 'stacked' ) {
		$_form_column_width = 'width-12';
		$_button_column_width = 'width-12';
	} else if($hide_name_field === 'true' && $hide_lastname_field === 'true') {
		$_form_column_width = 'width-8';
		$_button_column_width = 'width-4';
	} else if($hide_name_field === 'true' || $hide_lastname_field === 'true') {
		$_form_column_width = 'width-4';
		$_button_column_width = 'width-4';
	} else {
		$_button_column_width = 'width-3';
		$_form_column_width = 'width-3';
	}

/**
 * Form fragements
 */
/** name field */

/**
 * Form html
 */
	$_html_text =
<<<CONTENT

<div class="signup-form-container $_css_id $form_alignment">
	<form action="$_admin_ajax_url" class="signup-form{$_signup_form_class}" method="post" novalidate="">
		<div class="row">
CONTENT;
	if($hide_name_field !== 'true') {
		$_html_text .=
<<<CONTENT
			<div class="column $_form_column_width">
				<div class="field-wrapper">
					<input type="text" name="fname" class="form-name form-element $form_size $form_corner_style" placeholder="$fname_field_placeholder" tabindex="1" required="">
				</div>
			</div>
CONTENT;
	}
	if($hide_lastname_field !== 'true') {
		$_html_text .=
<<<CONTENT
			<div class="column $_form_column_width">
				<div class="field-wrapper">
					<input type="text" name="lname" class="form-name form-element $form_size $form_corner_style" placeholder="$lname_field_placeholder" tabindex="1" required="">
				</div>
			</div>
CONTENT;
	}
	$_html_text .=
<<<CONTENT
			<div class="column $_form_column_width">
				<div class="field-wrapper">
					<input type="email" name="email" class="form-email form-element $form_size $form_corner_style" placeholder="$email_field_placeholder" tabindex="2" required="">
				</div>
			</div>
CONTENT;

/**
 * Output GDPR mail consent form if enabled and $form_format is stacked
 */
if ($form_format === 'stacked' ){
	$_html_text .= TM_Shortcodes::output_mail_consent_form(FALSE,'checkbox-'.$_css_id);
}

	$_html_text .=
<<<CONTENT
			<div class="column $_button_column_width">
				<div class="field-wrapper">
					<input type="submit" value="$_label_subscribe" class="form-submit button $form_size $form_corner_style$_button_width_class">
				</div>
			</div>
CONTENT;

/**
 * Output GDPR mail consent form if enabled and $form_format is NOT stacked
 */
if ($form_format !== 'stacked' ){
	$_html_text .= TM_Shortcodes::output_mail_consent_form(FALSE,'checkbox-'.$_css_id);
}

	$_html_text .=
<<<CONTENT
			<input type="text" name="honeypot" class="form-element form-honeypot">
			<input name='_tm_ajax_nonce' value="$thememountain_ajax_nonce" type='hidden' />
			<input name='ajax_command' value="mailchimp" type='hidden' />
			<input name='action' value="TM_Ajax" type='hidden' />
			<input name='is_vc_element_request' value="true" type='hidden' />
		</div>
		<div class="form-response show">$initial_response_message</div>
	</form>
</div>
CONTENT;

	return $_html_text;
}