<?php
namespace ThemeMountain;

// ThemeStrings - see theme files
$thememountain_customizer_str = TM_ThemeStrings::$text_strings['customizer'];

/**
 * The followins are included in TM_ThemeServices::on_init()
 * The default values are set in TM_Customizer::setup_kirki()
 */

/**
 * Form Border Style Section
 */

// Form Border Style
TM_Customizer::tm_add_customizer_field('tm_cf7_border_style',array (
	TM_ThemeStrings::$theme_id, array(
		'type'     => 'select',
		'label'    => $thememountain_customizer_str['tm_cf7_border_style'][0],
		'section'  => 'tm_cf7_border_style_section',
		'description'  => $thememountain_customizer_str['tm_cf7_border_style'][1],
		'default'  => 'none',
		'priority' => 10,
		'choices'     => array(
			'none' => $thememountain_customizer_str['tm_cf7_border_style'][2],
			'rounded' => $thememountain_customizer_str['tm_cf7_border_style'][3],
			'pill' => $thememountain_customizer_str['tm_cf7_border_style'][4],
			),
		) ));


/**
 * Contact Form 7 & Woo Form Colors section
 *
 * Color Settings for Theme Forms, which inlcudes, post reply forms, search forms, sidebar subscribe forms.
 */

// Form Background Color
TM_Customizer::tm_add_customizer_field('tm_cf7_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#333',
		'priority'    => 10,
		'css_selector' => 'input, textarea, select, .wpcf7-form-control-wrap input, .wpcf7-form-control-wrap textarea, .wpcf7-form-control-wrap[class*="select-"] select, .select2-container--default .select2-selection--single',
		'css'			=> 'background-color: %s;',
		) ));

// Form Border Color
TM_Customizer::tm_add_customizer_field('tm_cf7_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#333',
		'priority'    => 10,
		'css_selector' => 'input, textarea, select, .wpcf7-form-control-wrap input, .wpcf7-form-control-wrap textarea, .wpcf7-form-control-wrap[class*="select-"] select, .select2-container--default .select2-selection--single',
		'css'			=> 'border-color: %s;',
		) ));

// Form Placeholder Color
TM_Customizer::tm_add_customizer_field('tm_cf7_placeholder_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_placeholder_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#666',
		'priority'    => 10,
		'css_selector' => array(
			'.wpcf7 ::-webkit-input-placeholder',
			'.wpcf7 :-moz-placeholder',
			'.wpcf7 :-ms-input-placeholder',
			'.wpcf7-form-control-wrap[class*=select-] select',
			'.woocommerce input::-webkit-input-placeholder',
			'.woocommerce input:-moz-placeholder',
			'.woocommerce input:-ms-input-placeholder',
			'.woocommerce textarea::-webkit-input-placeholder',
			'.woocommerce textarea:-moz-placeholder',
			'.woocommerce textarea:-ms-input-placeholder',
			),
		'css' => 'color: %s;',
		) ));

// Form Text Color
// @see        #149/issuecomment-356721957
TM_Customizer::tm_add_customizer_field('tm_cf7_form_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_form_text_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#666',
		'priority'    => 10,
		'css_selector' => 'input, textarea,select,.wpcf7-form-control-wrap input,.wpcf7-form-control-wrap textarea,.wpcf7-form-control-wrap[class*="select-"] select,.select2-container--default .select2-selection--single,.wpcf7-form-control-wrap input.wpcf7-not-valid,.wpcf7-form-control-wrap textarea.wpcf7-not-valid,.wpcf7-form-control-wrap[class*="select-"] select.wpcf7-not-valid,.select2-container--default .select2-selection--single,.woocommerce form .form-row.woocommerce-invalid .select2-container .select2-selection--single,.woocommerce form .form-row.woocommerce-invalid input.input-text,.woocommerce form .form-row.woocommerce-invalid select,.woocommerce .select2-container--default .select2-selection--single .select2-selection__rendered',
		'css' => 'color: %s;',
		) ));

// Form Placeholder Focus Color
TM_Customizer::tm_add_customizer_field('tm_cf7_placeholder_focus_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_placeholder_focus_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#000',
		'priority'    => 10,
		'css_selector' => array(
			'.wpcf7 :focus::-webkit-input-placeholder',
			'.wpcf7 :focus :-moz-placeholder',
			'.wpcf7 :focus:-ms-input-placeholder',
			'.wpcf7-form-control-wrap[class*=select-] select',
			'.woocommerce input:focus::-webkit-input-placeholder',
			'.woocommerce input:focus:-moz-placeholder',
			'.woocommerce input:focus:-ms-input-placeholder',
			'.woocommerce textarea:focus::-webkit-input-placeholder',
			'.woocommerce textarea:focus:-moz-placeholder',
			'.woocommerce textarea:focus:-ms-input-placeholder',
			),
		'css' => 'color: %s !important;',
		) ));

// Form Focus Background Color
TM_Customizer::tm_add_customizer_field('tm_cf7_focus_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_focus_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#fff',
		'priority'    => 10,
		'css_selector' => 'input:focus, textarea:focus, select:focus, .wpcf7-form-control-wrap input:focus, .wpcf7-form-control-wrap textarea:focus, .wpcf7-form-control-wrap[class*="select-"] select:focus, .select2-container--default .select2-selection--single:focus, .wpcf7-form-control-wrap input.wpcf7-not-valid:focus, .wpcf7-form-control-wrap textarea.wpcf7-not-valid:focus, .wpcf7-form-control-wrap[class*="select-"] select.wpcf7-not-valid:focus, .select2-container--default .select2-selection--single:focus, .woocommerce form .form-row.woocommerce-invalid .select2-container .select2-selection--single:focus, .woocommerce form .form-row.woocommerce-invalid input.input-text:focus, .woocommerce form .form-row.woocommerce-invalid select:focus',
		'css' => 'background-color: %s;',
		) ));

// Form Focus Border Color
TM_Customizer::tm_add_customizer_field('tm_cf7_focus_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_focus_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#fff',
		'priority'    => 10,
		'css_selector' => 'input:focus, textarea:focus, select:focus, .wpcf7-form-control-wrap input:focus, .wpcf7-form-control-wrap textarea:focus, .wpcf7-form-control-wrap[class*="select-"] select:focus, .select2-container--default .select2-selection--single:focus, .wpcf7-form-control-wrap input.wpcf7-not-valid:focus, .wpcf7-form-control-wrap textarea.wpcf7-not-valid:focus, .wpcf7-form-control-wrap[class*="select-"] select.wpcf7-not-valid:focus, .select2-container--default .select2-selection--single:focus, .woocommerce form .form-row.woocommerce-invalid .select2-container .select2-selection--single:focus, .woocommerce form .form-row.woocommerce-invalid input.input-text:focus, .woocommerce form .form-row.woocommerce-invalid select:focus',
		'css'			=> 'border-color: %s;',
		) ));

// Form Error Text Color
TM_Customizer::tm_add_customizer_field('tm_cf7_error_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_error_text_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '',
		'priority'    => 10,
				'css_selector' => '.wpcf7-form-control-wrap input.wpcf7-not-valid, .wpcf7-form-control-wrap textarea.wpcf7-not-valid, .wpcf7-form-control-wrap[class*="select-"] select.wpcf7-not-valid',
		'css'			=> 'color: %s;',
		) ));

// Form Focus Text Color
TM_Customizer::tm_add_customizer_field('tm_cf7_focus_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_focus_text_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#000',
		'priority'    => 10,
		'css_selector' => 'input:focus, textarea:focus, select:focus, .wpcf7-form-control-wrap input:focus, .wpcf7-form-control-wrap textarea:focus, .wpcf7-form-control-wrap[class*="select-"] select:focus, .select2-container--default .select2-selection--single:focus, .wpcf7-form-control-wrap input.wpcf7-not-valid:focus, .wpcf7-form-control-wrap textarea.wpcf7-not-valid:focus, .wpcf7-form-control-wrap[class*="select-"] select.wpcf7-not-valid:focus, .select2-container--default .select2-selection--single:focus, .woocommerce form .form-row.woocommerce-invalid .select2-container .select2-selection--single:focus, .woocommerce form .form-row.woocommerce-invalid input.input-text:focus, .woocommerce form .form-row.woocommerce-invalid select:focus',
		'css'			=> 'color: %s;',
		) ));

// Form Error Background Color
TM_Customizer::tm_add_customizer_field('tm_cf7_error_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_error_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#666',
		'priority'    => 10,
				'css_selector' => '.wpcf7-form-control-wrap input.wpcf7-not-valid, .wpcf7-form-control-wrap textarea.wpcf7-not-valid, .wpcf7-form-control-wrap[class*="select-"] select.wpcf7-not-valid',
		'css'			=> 'background-color: %s;',
		) ));

// Form Error Border Color
TM_Customizer::tm_add_customizer_field('tm_cf7_error_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_error_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#666',
		'priority'    => 10,
				'css_selector' => '.wpcf7-form-control-wrap input.wpcf7-not-valid, .wpcf7-form-control-wrap textarea.wpcf7-not-valid, .wpcf7-form-control-wrap[class*="select-"] select.wpcf7-not-valid',
		'css'			=> 'border-color: %s;',
		) ));

// Form Submit Background Color
TM_Customizer::tm_add_customizer_field('tm_cf7_submit_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_submit_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '',
		'priority'    => 10,
		'css_selector' => '.wpcf7 .wpcf7-submit, .shop .cart-overview .button, .shop .product .button, .woocommerce a.button:not(.nav-icon), .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input[type="submit"]:not(:disabled), .woocommerce button.button',
		'css'			=> 'background-color: %s;',
		) ));

// Form Submit Border Color
TM_Customizer::tm_add_customizer_field('tm_cf7_submit_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_submit_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '',
		'priority'    => 10,
		'css_selector' => '.wpcf7 .wpcf7-submit, .shop .cart-overview .button, .shop .product .button, .woocommerce a.button:not(.nav-icon), .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input[type="submit"]:not(:disabled), .woocommerce button.button',
		'css'			=> 'border-color: %s;',
		) ));

// Form Submit Text Color
TM_Customizer::tm_add_customizer_field('tm_cf7_submit_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_submit_text_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '',
		'priority'    => 10,
		'css_selector' => '.wpcf7 .wpcf7-submit, .shop .cart-overview .button, .shop .product .button, .woocommerce a.button:not(.nav-icon), .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input[type="submit"]:not(:disabled), .woocommerce button.button',
		'css'			=> 'color: %s;',
		) ));

// Form Submit Hover Background Color
TM_Customizer::tm_add_customizer_field('tm_cf7_submit_hover_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_submit_hover_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '',
		'priority'    => 10,
		'css_selector' => '.wpcf7 .wpcf7-submit:hover, .shop .cart-overview .button:hover, .shop .product .button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-account .woocommerce-MyAccount-navigation li.is-active a, .woocommerce-account .woocommerce-MyAccount-navigation li.is-active a:hover,.select2-container--default .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-results__option--highlighted[data-selected], .woocommerce input[type="submit"]:not(:disabled):hover, .woocommerce button.button:hover',
		'css'			=> 'background-color: %s;',
		) ));

// Form Submit Hover Border Color
TM_Customizer::tm_add_customizer_field('tm_cf7_submit_hover_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_submit_hover_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '',
		'priority'    => 10,
		'css_selector' => '.wpcf7 .wpcf7-submit:hover, .shop .cart-overview .button:hover, .shop .product .button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-account .woocommerce-MyAccount-navigation li.is-active a, .woocommerce-account .woocommerce-MyAccount-navigation li.is-active a:hover,.select2-container--default .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-results__option--highlighted[data-selected], .woocommerce input[type="submit"]:not(:disabled):hover, .woocommerce button.button:hover',
		'css'			=> 'border-color: %s;',
		) ));

// Form Submit Hover Text Color
TM_Customizer::tm_add_customizer_field('tm_cf7_submit_hover_text_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_submit_hover_text_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '',
		'priority'    => 10,
		'css_selector' => '.wpcf7 .wpcf7-submit:hover, .shop .cart-overview .button:hover, .shop .product .button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce input[type="submit"]:not(:disabled):hover, .woocommerce button.button:hover',
		'css'			=> 'color: %s;',
		) ));

// Form Response Message Color
TM_Customizer::tm_add_customizer_field('tm_cf7_response_message_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_response_message_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '',
		'priority'    => 10,
				'css_selector' => '.footer .form-response, .wpcf7-response-output.wpcf7-validation-errors',
		'css'			=> 'color: %s;',
		) ));

// Checkbox & Radio Background Color
TM_Customizer::tm_add_customizer_field('tm_cf7_checkbox_radio_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_checkbox_radio_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#eee',
		'priority'    => 10,
				'css_selector' => '.wpcf7-checkbox input + .wpcf7-list-item-label:before, input.wpcf7-acceptance:before, .wpcf7-radio input + .wpcf7-list-item-label:before, .wpcf7-form-control-wrap .wpcf7-acceptance input[type=checkbox]',
		'css'			=> 'background-color: %s;',
		) ));

// Checkbox & Radio Border Color
TM_Customizer::tm_add_customizer_field('tm_cf7_checkbox_radio_border_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_checkbox_radio_border_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#ffffff',
		'priority'    => 10,
				'css_selector' => '.wpcf7-checkbox input + .wpcf7-list-item-label:before, input.wpcf7-acceptance:before, .wpcf7-radio input + .wpcf7-list-item-label:before, .wpcf7-form-control-wrap .wpcf7-acceptance input[type=checkbox]',
		'css'			=> 'border-color: %s;',
		) ));

// Checkbox Checked Background Color
TM_Customizer::tm_add_customizer_field('tm_cf7_checkbox_checked_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_checkbox_checked_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#ffffff',
		'priority'    => 10,
				'css_selector' => '.wpcf7-checkbox input:checked + .wpcf7-list-item-label:before, input:checked.wpcf7-acceptance:before, .wpcf7-form-control-wrap .wpcf7-acceptance input[type=checkbox]:checked',
		'css'			=> 'background-color: %s;',
		) ));

// Radio Checked Background Color
TM_Customizer::tm_add_customizer_field('tm_cf7_radio_checked_background_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_radio_checked_background_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#ffffff',
		'priority'    => 10,
				'css_selector' => '.wpcf7-radio input:checked + .wpcf7-list-item-label:before',
		'css'			=> 'box-shadow: inset 0px 0px 0px 4px %s;',
		) ));

// Checkbox Check Color
TM_Customizer::tm_add_customizer_field('tm_cf7_checkbox_check_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_checkbox_check_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#666',
		'priority'    => 10,
				'css_selector' => '.wpcf7-checkbox input:checked + .wpcf7-list-item-label:before, input:checked.wpcf7-acceptance:before,.wpcf7-form-control-wrap .wpcf7-acceptance input[type=checkbox]:checked:before',
		'css'			=> 'color: %s;',
		) ));

// Radio Button Checked Color
TM_Customizer::tm_add_customizer_field('tm_cf7_radiobutton_checked_color',array (
	TM_ThemeStrings::$theme_id, array(
		'label'       => $thememountain_customizer_str['tm_cf7_radiobutton_checked_color'][0],
		'type'        => 'color-alpha',
		'section'     => 'tm_cf7_color',
		'default'     => '#666',
		'priority'    => 10,
				'css_selector' => '.wpcf7-radio input:checked + .wpcf7-list-item-label:before',
		'css'			=> 'background-color: %s;',
		) ));
