<?php
namespace ThemeMountain;

// ThemeStrings - see theme files
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

/**
 * The followins are included in TM_ThemeServices::on_init()
 * The default values are set in TM_Customizer::setup_kirki()
 */

/**
 * FOOTER FORM Color settings
 */

/**
	Form Background Color
	Form Border Color
	Form Placeholder Color
	Form Focus Background Color

	form_background_color
	form_border_color
	form_placeholder_color
	form_focus_background_color
 */

TM_Customizer::tm_add_customizer_field('tm_footer_form_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '#333',
		'priority'    => 10,
				'css_selector' => '.footer .form-element, .footer textarea, .footer .wpcf7-form-control-wrap input, .footer .wpcf7-form-control-wrap textarea',
		'css'			=> 'background-color: %s;',
		) ));

TM_Customizer::tm_add_customizer_field('tm_footer_form_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '#333',
		'priority'    => 10,
				'css_selector' => '.footer .form-element, .footer textarea, .footer .wpcf7-form-control-wrap input, .footer .wpcf7-form-control-wrap textarea',
		'css'			=> 'border-color: %s;',
		) ));

TM_Customizer::tm_add_customizer_field('tm_footer_form_placeholder_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_placeholder_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '#888',
		'priority'    => 10,
				'css_selector' => array(
			'.footer ::-webkit-input-placeholder, .footer .wpcf7 ::-webkit-input-placeholder',
			'.footer :focus::-webkit-input-placeholder, .footer .wpcf7 :focus ::-webkit-input-placeholder',
			'.footer ::-moz-placeholder, .footer .wpcf7 :-moz-placeholder',
			'.footer :focus::-moz-placeholder, .footer .wpcf7 :focus ::-moz-placeholder',
			'.footer :-ms-input-placeholder, .footer .wpcf7 :-ms-input-placeholder',
			'.footer :focus:-ms-input-placeholder, .footer .wpcf7 :focus:-ms-input-placeholder',
			),
		'css'			=> 'color: %s;',
		) ));

TM_Customizer::tm_add_customizer_field('tm_footer_form_focus_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_focus_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '#fff',
		'priority'    => 10,
				'css_selector' => '.footer .form-element:focus, .footer textarea:focus,.footer .form-element.required-field:focus, .footer textarea.required-field:focus, .footer .wpcf7-form-control-wrap input:focus, .footer .wpcf7-form-control-wrap textarea:focus, .footer .wpcf7-form-control-wrap input.wpcf7-not-valid:focus, .footer .wpcf7-form-control-wrap textarea.wpcf7-not-valid:focus',
		'css' => 'background-color: %s;',
		) ));
/**
 * 	Form Focus Border Color
	Form Focus Text Color
	Form Error Background Color
	Form Error Border Color

	form_focus_border_color
	form_focus_text_color
	form_error_background_color
	form_error_border_color
 */

TM_Customizer::tm_add_customizer_field('tm_footer_form_focus_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_focus_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '#fff',
		'priority'    => 10,
				'css_selector' => '.footer .form-element:focus, .footer textarea:focus,.footer .form-element.required-field:focus, .footer textarea.required-field:focus, .footer .wpcf7-form-control-wrap input:focus, .footer .wpcf7-form-control-wrap textarea:focus, .footer .wpcf7-form-control-wrap input.wpcf7-not-valid:focus, .footer .wpcf7-form-control-wrap textarea.wpcf7-not-valid:focus',
		'css'			=> 'border-color: %s;',
		) ));

TM_Customizer::tm_add_customizer_field('tm_footer_form_focus_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_focus_text_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '#000',
		'priority'    => 10,
				'css_selector' => '.footer .form-element:focus, .footer textarea:focus,.footer .form-element.required-field:focus, .footer textarea.required-field:focus, .footer .wpcf7-form-control-wrap input:focus, .footer .wpcf7-form-control-wrap textarea:focus, .footer .wpcf7-form-control-wrap input.wpcf7-not-valid:focus, .footer .wpcf7-form-control-wrap textarea.wpcf7-not-valid:focus',
		'css'			=> 'color: %s;',
		) ));

// added 10 Nov 2016 (#44)
TM_Customizer::tm_add_customizer_field('tm_footer_form_required_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_required_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '#ddd',
		'priority'    => 10,
				'css_selector' => '.footer .form-element.required-field, .footer textarea.required-field, .footer .wpcf7-form-control-wrap input.wpcf7-not-valid, .footer .wpcf7-form-control-wrap textarea.wpcf7-not-valid',
		'css'			=> 'background-color: %s;',
		) ));
// added 10 Nov 2016 (#44)
TM_Customizer::tm_add_customizer_field('tm_footer_form_required_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_required_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '#ddd',
		'priority'    => 10,
				'css_selector' => '.footer .form-element.required-field, .footer textarea.required-field, .footer .wpcf7-form-control-wrap input.wpcf7-not-valid, .footer .wpcf7-form-control-wrap textarea.wpcf7-not-valid',
		'css'			=> 'border-color: %s;',
		) ));
// added 10 Nov 2016 (#44)
TM_Customizer::tm_add_customizer_field('tm_footer_form_required_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_required_text_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '#ddd',
		'priority'    => 10,
				'css_selector' => '.footer .form-element.required-field, .footer textarea.required-field, .footer .wpcf7-form-control-wrap input.wpcf7-not-valid, .footer .wpcf7-form-control-wrap textarea.wpcf7-not-valid',
		'css'			=> 'color: %s;',
		) ));

TM_Customizer::tm_add_customizer_field('tm_footer_form_error_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_error_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '#666',
		'priority'    => 10,
				'css_selector' => '.footer .wpcf7-form-control-wrap input.wpcf7-not-valid, .footer .wpcf7-form-control-wrap textarea.wpcf7-not-valid',
		'css'			=> 'background-color: %s;',
		) ));

TM_Customizer::tm_add_customizer_field('tm_footer_form_error_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_error_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '#666',
		'priority'    => 10,
				'css_selector' => '.footer .wpcf7-form-control-wrap input.wpcf7-not-valid, .footer .wpcf7-form-control-wrap textarea.wpcf7-not-valid',
		'css'			=> 'border-color: %s;',
		) ));

/**
	Form Error Text Color
	Form Submit Background Color
	Form Submit Border Color
	Form Submit Text Color
	Form Submit Hover Background Color

	form_error_text_color
	form_submit_background_color
	form_submit_border_color
	form_submit_text_color
	form_submit_hover_background_color
 */

TM_Customizer::tm_add_customizer_field('tm_footer_form_error_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_error_text_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '',
		'priority'    => 10,
				'css_selector' => '.footer .wpcf7-form-control-wrap input.wpcf7-not-valid, .footer .wpcf7-form-control-wrap textarea.wpcf7-not-valid',
		'css'			=> 'color: %s;',
		) ));

TM_Customizer::tm_add_customizer_field('tm_footer_form_submit_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_submit_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '',
		'priority'    => 10,
		'css_selector' => '.footer .form-submit',
		'css'			=> 'background-color: %s;',
		) ));

TM_Customizer::tm_add_customizer_field('tm_footer_form_submit_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_submit_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '',
		'priority'    => 10,
		'css_selector' => '.footer .form-submit',
		'css'			=> 'border-color: %s;',
		) ));

TM_Customizer::tm_add_customizer_field('tm_footer_form_submit_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_submit_text_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '',
		'priority'    => 10,
		'css_selector' => '.footer .form-submit',
		'css'			=> 'color: %s;',
		) ));

TM_Customizer::tm_add_customizer_field('tm_footer_form_submit_hover_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_submit_hover_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '',
		'priority'    => 10,
		'css_selector' => '.footer .form-submit:hover',
		'css'			=> 'background-color: %s;',
		) ));

TM_Customizer::tm_add_customizer_field('tm_footer_form_submit_hover_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_submit_hover_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '',
		'priority'    => 10,
		'css_selector' => '.footer .form-submit:hover',
		'css'			=> 'border-color: %s;',
		) ));

TM_Customizer::tm_add_customizer_field('tm_footer_form_submit_hover_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_submit_hover_text_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '',
		'priority'    => 10,
		'css_selector' => '.footer .form-submit:hover',
		'css'			=> 'color: %s;',
		) ));

// Form Response Message Color
TM_Customizer::tm_add_customizer_field('tm_footer_form_response_message_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_footer_form_response_message_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_footer_form_color',
		'default'     => '',
		'priority'    => 10,
		'css_selector' => '.footer .form-response, .footer .form-consent label, .footer .form-consent .consent-notice, .footer .wpcf7-response-output.wpcf7-validation-errors',
		'css'			=> 'color: %s;',
		) ));