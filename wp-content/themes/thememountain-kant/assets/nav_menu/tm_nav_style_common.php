<?php
/**
 * This is a nav style config file for default
 *
 * @package ThemeMountain
 * @subpackage thememountain-sartre
 * @since thememountain-sartre 1.0
 *
 * @uses       ThemeMountain\TM_NavMenuServices
 */
namespace ThemeMountain;


/**
 * Set up custom options for header. Namely the nav menu.
 *
 * Add inline CSS into the header for custom settings. Selects correct classes.
 *
 * @since 1.0.12
 * @access public
 *
 * @see        TM_NavMenuServices::preprocess_custom_options_for_nav_menu() This method is called by the method.
 */
add_action('tm_nav_style_config','ThemeMountain\thememountain_nav_style_config');
function thememountain_nav_style_config() {
	/*
	 * Page Option or Customizer
	 * Priority order : Page Option settings > Customizer Settings
	 */

	/**
	 * Get the Page Options. FALSE is returned if the called page does not have any page options.
	 * For example, loop pages.
	 */
	$thememountain_page_options = TM_TemplateServices::get_current_page_data('options');

	// deviate logo.
	$thememountain_deviate_logo = '';

	/** deviate, colors */
	if(
		$thememountain_page_options !== FALSE &&
		isset($thememountain_page_options['tm_navigation_menu_deviate']) &&
		$thememountain_page_options['tm_navigation_menu_deviate'] !== '' &&
		isset($thememountain_page_options['tm_navigation_color_set']) &&
		$thememountain_page_options['tm_navigation_color_set'] === 'custom'
	) {
		// top
		$thememountain_top_header_nav_button_background_color = $thememountain_page_options['tm_top_header_nav_button_background_color'];
		$thememountain_top_header_nav_button_border_color = $thememountain_page_options['tm_top_header_nav_button_border_color'];
		$thememountain_top_header_nav_button_text_color = $thememountain_page_options['tm_top_header_nav_button_text_color'];
		// hover
		$thememountain_top_header_nav_button_background_color_hover = $thememountain_page_options['tm_top_header_nav_button_background_color_hover'];
		$thememountain_top_header_nav_button_border_color_hover = $thememountain_page_options['tm_top_header_nav_button_border_color_hover'];
		$thememountain_top_header_nav_button_text_color_hover= $thememountain_page_options['tm_top_header_nav_button_text_color_hover'];
		// body
		$thememountain_body_header_nav_button_background_color = $thememountain_page_options['tm_body_header_nav_button_background_color'];
		$thememountain_body_header_nav_button_border_color = $thememountain_page_options['tm_body_header_nav_button_border_color'];
		$thememountain_body_header_nav_button_text_color = $thememountain_page_options['tm_body_header_nav_button_text_color'];
		// hover
		$thememountain_body_header_nav_button_background_color_hover = $thememountain_page_options['tm_body_header_nav_button_background_color_hover'];
		$thememountain_body_header_nav_button_border_color_hover = $thememountain_page_options['tm_body_header_nav_button_border_color_hover'];
		$thememountain_body_header_nav_button_text_color_hover= $thememountain_page_options['tm_body_header_nav_button_text_color_hover'];

	} else {
		// top
		$thememountain_top_header_nav_button_background_color = TM_Customizer::tm_get_theme_mod('tm_top_header_nav_button_background_color');
		$thememountain_top_header_nav_button_border_color = TM_Customizer::tm_get_theme_mod('tm_top_header_nav_button_border_color');
		$thememountain_top_header_nav_button_text_color = TM_Customizer::tm_get_theme_mod('tm_top_header_nav_button_text_color');
		// hover
		$thememountain_top_header_nav_button_background_color_hover = TM_Customizer::tm_get_theme_mod('tm_top_header_nav_button_background_color_hover');
		$thememountain_top_header_nav_button_border_color_hover = TM_Customizer::tm_get_theme_mod('tm_top_header_nav_button_border_color_hover');
		$thememountain_top_header_nav_button_text_color_hover = TM_Customizer::tm_get_theme_mod('tm_top_header_nav_button_text_color_hover');
		// body
		$thememountain_body_header_nav_button_background_color = TM_Customizer::tm_get_theme_mod('tm_body_header_nav_button_background_color');
		$thememountain_body_header_nav_button_border_color = TM_Customizer::tm_get_theme_mod('tm_body_header_nav_button_border_color');
		$thememountain_body_header_nav_button_text_color = TM_Customizer::tm_get_theme_mod('tm_body_header_nav_button_text_color');
		// hover
		$thememountain_body_header_nav_button_background_color_hover = TM_Customizer::tm_get_theme_mod('tm_body_header_nav_button_background_color_hover');
		$thememountain_body_header_nav_button_border_color_hover = TM_Customizer::tm_get_theme_mod('tm_body_header_nav_button_border_color_hover');
		$thememountain_body_header_nav_button_text_color_hover = TM_Customizer::tm_get_theme_mod('tm_body_header_nav_button_text_color_hover');
	}

	/** custom options except for color */
	if(
		$thememountain_page_options !== FALSE &&
		isset($thememountain_page_options['tm_navigation_menu_deviate']) &&
		$thememountain_page_options['tm_navigation_menu_deviate'] !== ''
	) {
		/** tm_header_width */
		$thememountain_header_width = $thememountain_page_options['tm_header_width'];
		/** Add the following header options to Custom Options for Post/Page > Navigation #47 */
		$thememountain_header_vertical_alignment = $thememountain_page_options['tm_header_vertical_alignment'];
		$thememountain_header_vertical_alignment_bottom_value = $thememountain_page_options['tm_header_vertical_alignment_bottom_value'];
		/** Add the following header options to Custom Options for Post/Page > Navigation #47 */
		$thememountain_header_position = $thememountain_page_options['tm_header_position'];
		$thememountain_header_fixed_on_mobile = $thememountain_page_options['tm_header_fixed_on_mobile'];

		// deviate logo
		if (
			isset($thememountain_page_options['tm_deviate_logo']) &&
			$thememountain_page_options['tm_deviate_logo'] === 'use_top_logo'
		) {
			$thememountain_deviate_logo = ' top-logo';
		} else if (
			isset($thememountain_page_options['tm_deviate_logo']) &&
			$thememountain_page_options['tm_deviate_logo'] === 'use_body_logo'
		) {
			$thememountain_deviate_logo = ' body-logo';
		}
	} else {
		/** tm_header_width */
		$thememountain_header_width = TM_Customizer::tm_get_theme_mod('tm_header_width');
		/** Add the following header options to Custom Options for Post/Page > Navigation #47 */
		$thememountain_header_vertical_alignment = TM_Customizer::tm_get_theme_mod('tm_header_vertical_alignment');
		$thememountain_header_vertical_alignment_bottom_value = TM_Customizer::tm_get_theme_mod('tm_header_vertical_alignment_bottom_value');
		/** Add the following header options to Custom Options for Post/Page > Navigation #47 */
		$thememountain_header_position = TM_Customizer::tm_get_theme_mod('tm_header_position');
		$thememountain_header_fixed_on_mobile = TM_Customizer::tm_get_theme_mod('tm_header_fixed_on_mobile');
	}

	/** CSS queue for button colors */
	TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_top_header_nav_button_background_color',$thememountain_top_header_nav_button_background_color, TRUE);
	TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_top_header_nav_button_border_color',$thememountain_top_header_nav_button_border_color, TRUE);
	TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_top_header_nav_button_text_color',$thememountain_top_header_nav_button_text_color, TRUE);
	TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_top_header_nav_button_background_color_hover',$thememountain_top_header_nav_button_background_color_hover, TRUE);
	TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_top_header_nav_button_border_color_hover',$thememountain_top_header_nav_button_border_color_hover, TRUE);
	TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_top_header_nav_button_text_color_hover',$thememountain_top_header_nav_button_text_color_hover, TRUE);
	TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_body_header_nav_button_background_color',$thememountain_body_header_nav_button_background_color, TRUE);
	TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_body_header_nav_button_border_color',$thememountain_body_header_nav_button_border_color, TRUE);
	TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_body_header_nav_button_text_color',$thememountain_body_header_nav_button_text_color, TRUE);
	TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_body_header_nav_button_background_color_hover',$thememountain_body_header_nav_button_background_color_hover, TRUE);
	TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_body_header_nav_button_border_color_hover',$thememountain_body_header_nav_button_border_color_hover, TRUE);
	TM_StyleAndScripts::process_and_enqueue_inline_customizer_css_settings('tm_body_header_nav_button_text_color_hover',$thememountain_body_header_nav_button_text_color_hover, TRUE);
	// refer to the issue #47, #141
	if($thememountain_header_vertical_alignment === 'bottom') {
		if(empty($thememountain_header_vertical_alignment_bottom_value)) {
			TM_StyleAndScripts::tm_add_inline_css_head(".header.header-bottom { bottom: 0; }");
		} else {
			TM_StyleAndScripts::tm_add_inline_css_head(".header.header-bottom { top: {$thememountain_header_vertical_alignment_bottom_value}px !important }");
		}
	}

	/**
	 * $header_width
	 * tm_header_width under tm_page_header_nav_appearance section defined in nav_menu_style-default.php
	 */
	if($thememountain_header_width=== 'full') {
		TM_NavMenuServices::$header_width .= ' full-width';
	}

	/** Set header classes */
	TM_NavMenuServices::$nav_menu_header_classes .= 'header header-transparent '.$thememountain_header_position.' '.$thememountain_header_fixed_on_mobile.$thememountain_deviate_logo;

	// tm_header_vertical_alignment
	if(!empty($thememountain_header_vertical_alignment) && $thememountain_header_vertical_alignment === 'bottom') {
		TM_NavMenuServices::$nav_menu_header_classes .= ' header-bottom ';
	}
}

/**
 * Customizer settings
 */

/**
 * wordpress-common-assets Header Button Colors (customization specs outline needed.) #7
 */

$thememountain_nav_menu_customizer_text = TM_ThemeStrings::$text_strings['nav_menu_customizer'];

/** TOP */
	// Top Header Button Background Color
		TM_Customizer::tm_add_customizer_field('tm_top_header_nav_button_background_color',array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_nav_menu_customizer_text['tm_top_header_nav_button_background_color'][0],
				'section'     => 'tm_page_header_button_appearance',
				'default'     => '#232323',
				'priority'    => 16,
				'do_custom_enqueue' =>	TRUE,
				'css_selector'	 => '.header .dropdown>.button:not(.nav-icon), .header .v-align-middle>.button:not(.nav-icon)',
				'css' => 'background-color: %s;',
				) ));
	// Top Header Button Border Color
		TM_Customizer::tm_add_customizer_field('tm_top_header_nav_button_border_color',array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_nav_menu_customizer_text['tm_top_header_nav_button_border_color'][0],
				'section'     => 'tm_page_header_button_appearance',
				'default'     => '#232323',
				'priority'    => 16,
								'do_custom_enqueue' =>	TRUE,
				'css_selector'	 => '.header .dropdown>.button:not(.nav-icon), .header .v-align-middle>.button:not(.nav-icon)',
				'css' => 'border-color: %s;',
				) ));
	// Top Header Button Text Color
		TM_Customizer::tm_add_customizer_field('tm_top_header_nav_button_text_color',array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_nav_menu_customizer_text['tm_top_header_nav_button_text_color'][0],
				'section'     => 'tm_page_header_button_appearance',
				'default'     => '#FFF',
				'priority'    => 16,
								'do_custom_enqueue' =>	TRUE,
				'css_selector'	 => '.header .dropdown>.button:not(.nav-icon), .header .v-align-middle>.button:not(.nav-icon)',
				'css' => 'color: %s;',
				) ));
	// Top Header Button Hover Background Color
		TM_Customizer::tm_add_customizer_field('tm_top_header_nav_button_background_color_hover',array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_nav_menu_customizer_text['tm_top_header_nav_button_background_color_hover'][0],
				'section'     => 'tm_page_header_button_appearance',
				'default'     => '#0cbacf',
				'priority'    => 16,
								'do_custom_enqueue' =>	TRUE,
				'css_selector'	 => '.header .dropdown>.button:not(.nav-icon), .header .v-align-middle>.button:not(.nav-icon):hover',
				'css' => 'background-color: %s;',
				) ));
	// Top Header Button Hover Border Color
		TM_Customizer::tm_add_customizer_field('tm_top_header_nav_button_border_color_hover',array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_nav_menu_customizer_text['tm_top_header_nav_button_border_color_hover'][0],
				'section'     => 'tm_page_header_button_appearance',
				'default'     => '#0cbacf',
				'priority'    => 16,
								'do_custom_enqueue' =>	TRUE,
				'css_selector'	 => '.header .dropdown>.button:not(.nav-icon), .header .v-align-middle>.button:not(.nav-icon):hover',
				'css' => 'border-color: %s;',
				) ));
	// Top Header Button Hover Text Color
		TM_Customizer::tm_add_customizer_field('tm_top_header_nav_button_text_color_hover',array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_nav_menu_customizer_text['tm_top_header_nav_button_text_color_hover'][0],
				'section'     => 'tm_page_header_button_appearance',
				'default'     => '#FFF',
				'priority'    => 16,
								'do_custom_enqueue' =>	TRUE,
				'css_selector'	 => '.header .dropdown>.button:not(.nav-icon), .header .v-align-middle>.button:not(.nav-icon):hover',
				'css' => 'color: %s;',
				) ));

/** Body */
	// Header Button Background Color
		TM_Customizer::tm_add_customizer_field('tm_body_header_nav_button_background_color',array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_nav_menu_customizer_text['tm_body_header_nav_button_background_color'][0],
				'section'     => 'tm_page_header_button_appearance',
				'default'     => '#232323',
				'priority'    => 16,
				'do_custom_enqueue' =>	TRUE,
				'css_selector'	 => '.header-background .dropdown>.button:not(.nav-icon), .header-background .v-align-middle>.button:not(.nav-icon)',
				'css' => 'background-color: %s;',
				) ));
	// Header Button Border Color
		TM_Customizer::tm_add_customizer_field('tm_body_header_nav_button_border_color',array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_nav_menu_customizer_text['tm_body_header_nav_button_border_color'][0],
				'section'     => 'tm_page_header_button_appearance',
				'default'     => '#232323',
				'priority'    => 16,
								'do_custom_enqueue' =>	TRUE,
				'css_selector'	 => '.header-background .dropdown>.button:not(.nav-icon), .header-background .v-align-middle>.button:not(.nav-icon)',
				'css' => 'border-color: %s;',
				) ));
	// Header Button Text Color
		TM_Customizer::tm_add_customizer_field('tm_body_header_nav_button_text_color',array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_nav_menu_customizer_text['tm_body_header_nav_button_text_color'][0],
				'section'     => 'tm_page_header_button_appearance',
				'default'     => '#FFF',
				'priority'    => 16,
								'do_custom_enqueue' =>	TRUE,
				'css_selector'	 => '.header-background .dropdown>.button:not(.nav-icon), .header-background .v-align-middle>.button:not(.nav-icon)',
				'css' => 'color: %s;',
				) ));
	// Header Button Hover Background Color
		TM_Customizer::tm_add_customizer_field('tm_body_header_nav_button_background_color_hover',array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_nav_menu_customizer_text['tm_body_header_nav_button_background_color_hover'][0],
				'section'     => 'tm_page_header_button_appearance',
				'default'     => '#0cbacf',
				'priority'    => 16,
								'do_custom_enqueue' =>	TRUE,
				'css_selector'	 => '.header-background .dropdown>.button:not(.nav-icon), .header-background .v-align-middle>.button:not(.nav-icon):hover',
				'css' => 'background-color: %s;',
				) ));
	// Header Button Hover Border Color
		TM_Customizer::tm_add_customizer_field('tm_body_header_nav_button_border_color_hover',array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_nav_menu_customizer_text['tm_body_header_nav_button_border_color_hover'][0],
				'section'     => 'tm_page_header_button_appearance',
				'default'     => '#0cbacf',
				'priority'    => 16,
								'do_custom_enqueue' =>	TRUE,
				'css_selector'	 => '.header-background .dropdown>.button:not(.nav-icon), .header-background .v-align-middle>.button:not(.nav-icon):hover',
				'css' => 'border-color: %s;',
				) ));
	// Header Button Hover Text Color
		TM_Customizer::tm_add_customizer_field('tm_body_header_nav_button_text_color_hover',array (
			TM_ThemeStrings::$theme_id, array(
				'type'        => 'color-alpha',
				'label'       => $thememountain_nav_menu_customizer_text['tm_body_header_nav_button_text_color_hover'][0],
				'section'     => 'tm_page_header_button_appearance',
				'default'     => '#FFF',
				'priority'    => 16,
								'do_custom_enqueue' =>	TRUE,
				'css_selector'	 => '.header-background .dropdown>.button:not(.nav-icon), .header-background .v-align-middle>.button:not(.nav-icon):hover',
				'css' => 'color: %s;',
				) ));