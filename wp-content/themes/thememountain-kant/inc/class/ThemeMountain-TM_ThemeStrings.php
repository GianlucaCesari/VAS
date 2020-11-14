<?php
/**
 * ThemeMountain namespace reserved for ThemeMountain Wordpress themes
 * If you do not know what namespace is, please read http://php.net/manual/en/language.namespaces.php
 */
namespace ThemeMountain {
	/**
	 * ThemeMountain parent core class providing common utility methods
	 *
	 * @package ThemeMountain
	 * @subpackage Core
	 * @since 1.0
	 */
	class TM_ThemeStrings {
		/**
		 * Configs
		 */
		/**
		 * Theme Text Domain ID.
		 * @var        string
		 */
		public static $theme_id = "thememountain-kant";

		/**
		 * Text strings
		 */
		public static $text_strings = array ();

		/**
		 * Class Constructor Magic Method.
		 *
		 * Cache theme version, execute class setup method and add filter for option fields in the admin panel.
		 *
		 * @since 1.0
		 * @access public
		 * @uses Wordpress code wp_get_theme(), TM_ThemeServices::$theme_version, 'tm_admin_option_option_fields' filter hook of TM_admin::option_fields() in tm-plugin.
		 */
		public function __construct() {
			self::define_text_strings();
		}

		/**
		 * @since 1.0.8
		 * @access public
		 * @uses       TM_ThemeStrings::$theme_id
		 */
		public static function define_text_strings () {
			self::$text_strings['TM_CustomCategoryPage'] = array(
				'custom_category_page' => esc_html__('Custom Category Page',"thememountain-kant"),
				'do_not_use_custom_page' => esc_html__('Do not use custom page',"thememountain-kant"),
				'choose_page' => esc_html__('Choose Page',"thememountain-kant"),
			);

			self::$text_strings['TM_CustomFunctions'] = array(
				'comment_waiting_for_moderation' => esc_html__('Your comment is awaiting moderation.',"thememountain-kant"),
				'comment_time' => esc_html__('%1$s at %2$s',"thememountain-kant"),
				'edit' => esc_html__('Edit',"thememountain-kant"),
				'excerpt' => esc_html__('Excerpt',"thememountain-kant"),
			);

			self::$text_strings['TM_NavMenuServices'] = array(
				'hide_navigation_menu' => esc_html__('Hide Navigation Menu',"thememountain-kant"),
				'none' => esc_html__('None',"thememountain-kant"),
				'please_create_a_new_menu' => esc_html__('Please create a new menu',"thememountain-kant"),
			);

			self::$text_strings['TM_TemplateServices'] = array(
				'category_archives' => esc_html__('Category Archives: %s',"thememountain-kant"),
				'search_results_for' => esc_html__('Search Results for: %s',"thememountain-kant"),
				'search_more' => esc_html__('Search further.',"thememountain-kant"),
				'all_posts_by' => esc_html__('All posts by %s',"thememountain-kant"),
				'not_found_title_caption' => esc_html__('404 Not Found',"thememountain-kant"),
				'results_not_found_message' => esc_html__('Please check the URL for proper spelling or capitalization. Alternatively try to search below.',"thememountain-kant"),
				'portfolio' => esc_html__('Portfolio',"thememountain-kant"),
			);

			self::$text_strings['TM_NavMenuCustomField'] = array(
				'tm_custom_nav' => esc_html__('Register Menu Item As:',"thememountain-kant"),
				'tm_custom_nav_none' => esc_html__('None',"thememountain-kant"),
				'tm_custom_nav_megamenu' => esc_html__('Mega Menu Parent Link',"thememountain-kant"),
				'tm_custom_nav_button' => esc_html__('Regular button (links to URL)',"thememountain-kant"),
				'tm_custom_nav_icon' => esc_html__('Icon (links to URL)',"thememountain-kant"),
				'tm_custom_nav_modalButton' => esc_html__('Modal button (links to modal)',"thememountain-kant"),
				'tm_custom_nav_modal_aux_classes' => esc_html__('Modal Auxiliary Classes',"thememountain-kant"),

			);

			/**
			 * Navigtion Location
			 */
			self::$text_strings['nav_menu_locations'] = array(
				'main_nav_menu' => esc_html__('Main Navigation Menu',"thememountain-kant"),
				/** overlay */
				'overlay_menu'	=> esc_html__('Overlay Menu',"thememountain-kant"),
				'overlay_secondary_menu' => esc_html__('Overlay Secondary Menu',"thememountain-kant"),
				'overlay_social_links' => esc_html__('Overlay Social Links',"thememountain-kant"),
				/** off canvas */
				'off_canvas_menu'	=> esc_html__('Off-Canvas Menu',"thememountain-kant"),
				'off_canvas_secondary_menu'	=> esc_html__('Off-Canvas Secondary Menu',"thememountain-kant"),
				'off_canvas_social_links' => esc_html__('Off-Canvas Social Links',"thememountain-kant"),
				);

			/**
			 * Menu Style Names
			 */
			self::$text_strings['nav_menu_styles'] = array(
				'default' => esc_html__('Default',"thememountain-kant"),
				'hamburger' => esc_html__('Hamburger',"thememountain-kant"),
				'hide' => esc_html__('Hide Nav Menu',"thememountain-kant"),
				'hybrid' => esc_html__('Default and Hamburger (hybrid)',"thememountain-kant"),
				);

			/**
			 * Navigation Customizer Settings
			 * array index 0 for label and 1 for description.
			 */
			self::$text_strings['nav_menu_customizer'] = array(
				/** default menu style */
				'tm_header_navigation_alignment' => array(
					esc_html__( 'Navigation Menu Alignment', "thememountain-kant" ),
					esc_html__( 'Determines the primary navigation alignment.', "thememountain-kant" ),
					esc_html__( 'Left', "thememountain-kant" ),
					esc_html__( 'Center', "thememountain-kant" ),
					esc_html__( 'Right', "thememountain-kant" ),
					),
				'tm_header_width' => array(
					esc_html__( 'Header Width', "thememountain-kant" ),
					esc_html__( 'Determines the Header Width either fixed or full width.', "thememountain-kant" ),
					esc_html__( 'Fixed Width', "thememountain-kant" ),
					esc_html__( 'Full Width', "thememountain-kant" ),
					),
				'tm_header_secondary_navigation_alignment' => array(
					esc_html__( 'Secondary Navigation Alignment', "thememountain-kant" ),
					esc_html__( 'Determines the secondary navigation alignment.', "thememountain-kant" ),
					esc_html__( 'Left', "thememountain-kant" ),
					esc_html__( 'Right', "thememountain-kant" ),
					),
				// Top Header Navigation Color
				'tm_page_header_nav_default_menu_top_color' => array(
					esc_html__( 'Top Header Navigation Color', "thememountain-kant" ),
					),
				'tm_page_header_nav_default_menu_top_color_hover' => array(
					esc_html__( 'Top Header Navigation Hover Color', "thememountain-kant" ),
					),
				'tm_page_header_nav_default_menu_top_color_current' => array(
					esc_html__( 'Top Header Navigation Current Color', "thememountain-kant" ),
					),
				// Header Nenu Menu Body
				'tm_page_header_nav_default_menu_body_color' => array(
					esc_html__( 'Body Header Navigation Color', "thememountain-kant" ),
					),
				'tm_page_header_nav_default_menu_body_color_hover' => array(
					esc_html__( 'Body Header Navigation Hover Color', "thememountain-kant" ),
					),
				'tm_page_header_nav_default_menu_body_color_active' => array(
					esc_html__( 'Body Header Navigation Active Color', "thememountain-kant" ),
					),
				'tm_page_header_nav_default_menu_sub_bkg_color' => array(
					esc_html__( 'Sub Menu Background Color', "thememountain-kant" ),
					),
				'tm_page_header_nav_default_menu_sub_link_color' => array(
					esc_html__( 'Sub Menu Link Color', "thememountain-kant" ),
					),
				'tm_page_header_nav_default_menu_sub_link_color_hover' => array(
					esc_html__( 'Sub Menu Link Hover Color', "thememountain-kant" ),
					),
				'tm_page_header_nav_default_menu_sub_link_color_active' => array(
					esc_html__( 'Sub Menu Link Active Color', "thememountain-kant" ),
					),
				'tm_page_header_nav_default_menu_sub_link_background_color_hover' => array(
					esc_html__( 'Sub Menu Link & Active Background Color', "thememountain-kant" ),
					),
				'tm_page_header_nav_mega_submenu_border_color' => array(
					esc_html__( 'Mega Sub Menu Border Color', "thememountain-kant" ),
					),
				'tm_page_header_default_menu_top_bkg_color' => array(
					esc_html__( 'Top Header Background Color', "thememountain-kant" ),
					),
				'tm_page_header_default_menu_body_bkg_color' => array(
					esc_html__( 'Body Header Background Color', "thememountain-kant" ),
					esc_html__( 'The background color the header receives as the user begins to scroll the page.', "thememountain-kant" ),
					),
				/** hamburger menu style */
				'tm_page_header_hamburger_menu_bkg_color' => array(
					esc_html__( 'Hamburger Navigation Background Color', "thememountain-kant" ),
					),
				'tm_page_header_hamberger_menu_icon_color' => array(
					esc_html__( 'Hamburger Navigation Color', "thememountain-kant" ),
					),
				'tm_page_header_hamberger_menu_icon_hover_color' => array(
					esc_html__( 'Hamburger Navigation Hover Color', "thememountain-kant" ),
					),
				'tm_page_header_hamberger_mobile_header_background_color' => array(
					esc_html__( 'Hamburger Mobile Header Background Color', "thememountain-kant" ),
					),
				'tm_page_header_hamberger_mobile_header_border_color' => array(
					esc_html__( 'Mobile Header Border Color', "thememountain-kant" ),
					),
				/* Logo Background Color */
				'tm_page_header_logo_background_color' => array(
					esc_html__( 'Logo Background Color', "thememountain-kant" ),
				),
				/** tm_page_header_button_appearance */
				// TOP
				'tm_top_header_nav_button_background_color' => array(
					esc_html__( 'Top Header Button Background Color', "thememountain-kant" ),
					),
				'tm_top_header_nav_button_border_color' => array(
					esc_html__( 'Top Header Button Border Color', "thememountain-kant" ),
					),
				'tm_top_header_nav_button_text_color' => array(
					esc_html__( 'Top Header Button Text Color', "thememountain-kant" ),
					),
				'tm_top_header_nav_button_background_color_hover' => array(
					esc_html__( 'Top Header Button Hover Background Color', "thememountain-kant" ),
					),
				'tm_top_header_nav_button_border_color_hover' => array(
					esc_html__( 'Top Header Button Hover Border Color', "thememountain-kant" ),
					),
				'tm_top_header_nav_button_text_color_hover' => array(
					esc_html__( 'Top Header Button Hover Text Color', "thememountain-kant" ),
					),
				// BODY
				'tm_body_header_nav_button_background_color' => array(
					esc_html__( 'Body Header Button Background Color', "thememountain-kant" ),
					),
				'tm_body_header_nav_button_border_color' => array(
					esc_html__( 'Body Header Button Border Color', "thememountain-kant" ),
					),
				'tm_body_header_nav_button_text_color' => array(
					esc_html__( 'Body Header Button Text Color', "thememountain-kant" ),
					),
				'tm_body_header_nav_button_background_color_hover' => array(
					esc_html__( 'Body Header Button Hover Background Color', "thememountain-kant" ),
					),
				'tm_body_header_nav_button_border_color_hover' => array(
					esc_html__( 'Body Header Button Hover Border Color', "thememountain-kant" ),
					),
				'tm_body_header_nav_button_text_color_hover' => array(
					esc_html__( 'Body Header Button Hover Text Color', "thememountain-kant" ),
					),
				);

			/**
			 * Preheader Customizer Settings
			 */
			self::$text_strings['preheader_customizer'] = array(
				/** default menu style */
				'tm_preheader_type' => array(
					esc_html__( 'Show Pre Header', "thememountain-kant" ),
					esc_html__( 'Determines whether the pre-header should be shown.', "thememountain-kant" ),
					esc_html__( 'Use preheader', "thememountain-kant" ),
					esc_html__( 'Do not show preheader', "thememountain-kant" ),
					esc_html__( 'Use the settings as set in the Customizer', "thememountain-kant" ),
					),
				'tm_preheader_height' => array(
					esc_html__( 'Pre Header Height', "thememountain-kant" ),
					esc_html__( 'Determines initial pre-header height. Note: default is set to auto, which means it auto expands to its content. Any numerical value requires the suffix px to be entered.', "thememountain-kant" ),
					),
				'tm_preheader_id_to_show' => array(
					esc_html__( 'Pre Header to show', "thememountain-kant" ),
					esc_html__( 'Determines which custom pre-header to use.', "thememountain-kant" ),
					),
				'tm_preheader_link_color' => array(
					esc_html__( 'Pre Header Link Color', "thememountain-kant" ),
					),
				'tm_preheader_link_color_hover' => array(
					esc_html__( 'Pre Header Link Hover Color', "thememountain-kant" ),
					),
				); // end

			/**
			 * customizer panels
			 */
			self::$text_strings['customizer_panels'] = array(
				'tm_header_settings' => array(
					esc_html__( 'Header Settings', "thememountain-kant" ),
					esc_html__( 'This section allows you to manage your site logo, main and mobile navigation colors, header background color states and positions.', "thememountain-kant" ),
					),
				'tm_aux_nav_settings' => array(
					esc_html__( 'Auxiliary Navigation Settings', "thememountain-kant" ),
					),
				'tm_content_settings' => array(
					esc_html__( 'Content Settings', "thememountain-kant" ),
					esc_html__( 'In this section you can manage everything from fonts, font colors, to default titles for pages such as Tm folio, 404 pages, archive, category, search and author index pages.', "thememountain-kant" ),
					),
				'tm_footer_settings' => array(
					esc_html__( 'Footer Settings', "thememountain-kant" ),
					esc_html__( 'In this section you can manage the number of footer columns, footer colors and footer form colors.', "thememountain-kant" ),
					),
				'tm_form_settings' => array(
					esc_html__( 'Form Settings', "thememountain-kant" ),
					esc_html__( 'In this section you can manage all form colors relating to contact forms, comment forms, and search fields.', "thememountain-kant" ),
					),
				);

			/**
			 * customizer sections
			 */
			self::$text_strings['customizer_sections'] = array(
				// Navigation Header
				'tm_navigation_header_logo' => array(
					esc_html__( 'Header Logo', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				'tm_page_header_nav_appearance' => array(
					esc_html__( 'Header Navigation Appearance', "thememountain-kant" ),
					esc_html__( 'Determines whether your site should employ a default main navigation or the more modern, hamburger navigation. Below are dependent color options for each navigation type.', "thememountain-kant" ),
					),
				'tm_page_header_appearance' => array(
					esc_html__( 'Header Appearance', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				'tm_page_header_button_appearance' => array(
					esc_html__( 'Header Button Appearance', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				'tm_page_header_site_search_appearance' => array(
					esc_html__( 'Site Search Appearance', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				'tm_preheader_settings' => array(
					esc_html__( 'Pre-Header Settings', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				// Overlay Navigation
				'tm_overlay_nav_settings' => array(
					esc_html__( 'Overlay Navigation Settings', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				'tm_off_canvas_nav_settings' => array(
					esc_html__( 'Off-Canvas Navigation Settings', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				// Content Layout Settings
				'tm_language_settings' => array(
					esc_html__( 'Language', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				'tm_content_font_settings' => array(
					esc_html__( 'Fonts', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				'tm_content_navigation' => array(
					esc_html__( 'Content Navigation', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				'tm_content_body' => array(
					esc_html__( 'Content Body Color', "thememountain-kant" ),
					esc_html__( 'Page Layout Settings for content body', "thememountain-kant" ),
					),
				// home / global
				'tm_layout_home' => array(
					esc_html__( 'Blog Index Page', "thememountain-kant" ),
					esc_html__( 'Blog Index Page Layout. The settings are also used as the global settings.', "thememountain-kant" ),
					),
				// single post
				'tm_layout_post' => array(
					esc_html__( 'Single Post', "thememountain-kant" ),
					esc_html__( 'Page Layout for single post pages', "thememountain-kant" ),
					),
				'tm_layout_page' => array(
					esc_html__( 'Page', "thememountain-kant" ),
					esc_html__( 'Page Layout for single pages', "thememountain-kant" ),
					),
				'tm_layout_tm_folio' => array(
					esc_html__( 'Project Page', "thememountain-kant" ),
					esc_html__( 'Page Layout for Project Pages', "thememountain-kant" ),
					),
				'tm_layout_404' => array(
					esc_html__( '404 Page', "thememountain-kant" ),
					esc_html__( '404 Page Index Page Layout', "thememountain-kant" ),
					),
				'tm_layout_shop' => array(
					esc_html__( 'Shop Page', "thememountain-kant" ),
					esc_html__( 'WooCommerce Shop Page Product Archive Page Layout', "thememountain-kant" ),
					),
				// Index Pages
				'tm_layout_archive' => array(
					esc_html__( 'Archive Index Page', "thememountain-kant" ),
					esc_html__( 'Home Page Index Page Layout', "thememountain-kant" ),
					),
				'tm_layout_category' => array(
					esc_html__( 'Category Index Page', "thememountain-kant" ),
					esc_html__( 'Home Page Index Page Layout', "thememountain-kant" ),
					),
				'tm_layout_search' => array(
					esc_html__( 'Search Index Page', "thememountain-kant" ),
					esc_html__( 'Home Page Index Page Layout', "thememountain-kant" ),
					),
				'tm_layout_author' => array(
					esc_html__( 'Author Index Page', "thememountain-kant" ),
					esc_html__( 'Home Page Index Page Layout', "thememountain-kant" ),
					),
				'tm_light_box' => array(
					esc_html__( 'Lightbox', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				'tm_loader' => array(
					esc_html__( 'Loader', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				// Footer Settings sections
				'tm_footer_columns' => array(
					esc_html__( 'Footer Columns', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				'tm_footer_color' => array(
					esc_html__( 'Footer Colors', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				'tm_footer_form_color' => array(
					esc_html__( 'Footer Form Colors', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				// Form
				'tm_cf7_border_style_section' => array(
					esc_html__( 'Form Border Style', "thememountain-kant" ),
					esc_html__( '-', "thememountain-kant" ),
					),
				'tm_cf7_color' => array(
					esc_html__( 'Contact Form 7 & Woo Form Colors', "thememountain-kant" ),
					esc_html__( 'Color settings for Contact Form 7 and Woo Commerce form elements', "thememountain-kant" ),
					),
				'tm_theme_form_color' => array(
					esc_html__( 'Theme Form Colors', "thememountain-kant" ),
					esc_html__( 'Color Settings for Theme Forms, which inlcudes, post reply forms, search forms, sidebar subscribe forms.', "thememountain-kant" ),
					),
				);

			/**
			 * Customizer Settings
			 * array index 0 for label and 1 for description
			 */
			self::$text_strings['customizer'] = array(
				// fields.php
				'tm_show_back_to_top' => array(
					esc_html__( 'Show back to top button', "thememountain-kant" ),
					esc_html__( 'Determines whether the "back to top" link should be shown or hidden.', "thememountain-kant" ),
					esc_html__( 'Show', "thememountain-kant" ),
					esc_html__( 'Hide', "thememountain-kant" ),
					),
				// fields_content_font_settings.php
				'tm_copyright_notice' => array(
					esc_html__( 'Copyright Notice', "thememountain-kant" ),
					esc_html__( '&#169; 2018 THEMEMOUNTAIN. All Rights Reserved.', "thememountain-kant" ),
					esc_html__( 'Copyright Notice', "thememountain-kant" ),
					),
				'tm_privacy_policy_link' => array(
					esc_html__( 'Link to privacy policy', "thememountain-kant" ),
					),
				'tm_cookie_policy_link' => array(
					esc_html__( 'Link to cookie policy', "thememountain-kant" ),
					),
				// fields_content_layout_settings.php
				// Language settings
				// Font settings
				'tm_content_font_presets' => array(
					esc_html__( 'Font Presets', "thememountain-kant" ),
					esc_html__( 'Font presets are carefully selected fonts that work well together. We have created these to save you time. In this section you can select between 30+ different font pairs selected by the ThemeMountain Team.', "thememountain-kant" ),
					esc_html__( 'Please choose a preset to load.', "thememountain-kant" ),
					),
				// font settings
				'tm_body_font' => array(
					esc_html__( 'Body Font', "thememountain-kant" ),
					),
				'tm_body_font_target' => array(
					esc_html__( 'Body Font CSS Target', "thememountain-kant" ),
					),
				'tm_title_font' => array(
					esc_html__( 'Title Font', "thememountain-kant" ),
					),
				'tm_title_font_target' => array(
					esc_html__( 'Title Font CSS Target', "thememountain-kant" ),
					),
				'tm_lead_font' => array(
					esc_html__( 'Lead Font', "thememountain-kant" ),
					),
				'tm_lead_font_target' => array(
					esc_html__( 'Lead Font CSS Target', "thememountain-kant" ),
					),
				/** Navigation */
				'tm_navigtion_font' => array(
					esc_html__( 'Navigation Font', "thememountain-kant" ),
					),
				'tm_navigtion_font_target' => array(
					esc_html__( 'Navigation Font CSS Target', "thememountain-kant" ),
					),
				/** Form */
				'tm_form_font' => array(
					esc_html__( 'Form Font', "thememountain-kant" ),
					),
				'tm_form_font_target' => array(
					esc_html__( 'Form Font CSS Target', "thememountain-kant" ),
					),
				/** Project Title and Description Elements */
				'tm_project_title_and_description_font' => array(
					esc_html__( 'Project Title and Description Font', "thememountain-kant" ),
					),
				'tm_project_title_and_description_font_target' => array(
					esc_html__( 'Project Title and Description Font CSS Target', "thememountain-kant" ),
					),
				'tm_blockquote_font' => array(
					esc_html__( 'Blockquote Font', "thememountain-kant" ),
					),
				'tm_blockquote_font_target' => array(
					esc_html__( 'Blockquote Font CSS Target', "thememountain-kant" ),
					),
				// alt fonts
				'tm_alt_font_1' => array(
					esc_html__( 'Font Alternative 1', "thememountain-kant" ),
					),
				'tm_alt_font_1_target' => array(
					esc_html__( 'Font Alternative 1 CSS Target', "thememountain-kant" ),
					),
				'tm_alt_font_2' => array(
					esc_html__( 'Font Alternative 2', "thememountain-kant" ),
					),
				'tm_alt_font_2_target' => array(
					esc_html__( 'Font Alternative 2 CSS Target', "thememountain-kant" ),
					),
				'tm_alt_font_3' => array(
					esc_html__( 'Font Alternative 3', "thememountain-kant" ),
					),
				'tm_alt_font_3_target' => array(
					esc_html__( 'Font Alternative 3 CSS Target', "thememountain-kant" ),
					),
				// heading titles
				'tm_h_tag_font_sizes' => array(
					esc_html__( 'H Tag Font Sizes', "thememountain-kant" ),
					),
				'tm_aux_title_font_sizes' => array(
					esc_html__( 'Auxiliary Title Font Sizes', "thememountain-kant" ),
					),
				'tm_lead_font_size' => array(
					esc_html__( 'Lead Font Size', "thememountain-kant" ),
					),
				'tm_aux_text_font_sizes' => array(
					esc_html__( 'Auxiliary Text Font Sizes', "thememountain-kant" ),
					),
				/* H Tag Font Sizes */
				'tm_title_font_size_h1' => array(
					esc_html__( 'Title H1 Font Size', "thememountain-kant" ),
					),
				'tm_title_font_size_h2' => array(
					esc_html__( 'Title H2 Font Size', "thememountain-kant" ),
					),
				'tm_title_font_size_h3' => array(
					esc_html__( 'Title H3 Font Size', "thememountain-kant" ),
					),
				'tm_title_font_size_h4' => array(
					esc_html__( 'Title H4 Font Size', "thememountain-kant" ),
					),
				'tm_title_font_size_h5' => array(
					esc_html__( 'Title H5 Font Size', "thememountain-kant" ),
					),
				'tm_title_font_size_h6' => array(
					esc_html__( 'Title H6 Font Size', "thememountain-kant" ),
					),
				/* Auxiliary Title Font Sizes */
				'tm_title_font_size_extra_large' => array(
					esc_html__( 'Extra Large Title Font Size', "thememountain-kant" ),
				),
				'tm_title_font_size_large' => array(
					esc_html__( 'Large Title Font Size', "thememountain-kant" ),
				),
				'tm_title_font_size_medium' => array(
					esc_html__( 'Medium Title Font Size', "thememountain-kant" ),
				),
				'tm_title_font_size_small' => array(
					esc_html__( 'Small Title Font Size', "thememountain-kant" ),
				),
				/* Lead Font Size */
				'tm_title_font_size_lead' => array(
					esc_html__( 'Lead Font Size', "thememountain-kant" ),
				),
				/* Auxiliary Text Font Sizes */
				'tm_text_font_size_extra_large' => array(
					esc_html__( 'Extra Large Text Font Size', "thememountain-kant" ),
				),
				'tm_text_font_size_large' => array(
					esc_html__( 'Large Text Font Size', "thememountain-kant" ),
				),
				'tm_text_font_size_medium' => array(
					esc_html__( 'Medium Text Font Size', "thememountain-kant" ),
				),
				'tm_text_font_size_small' => array(
					esc_html__( 'Small Text Font Size', "thememountain-kant" ),
				),
				// fields_footer_form.php
				// Global Loop Settings
				'tm_global_loop_info_intro' => array(
					esc_html__( 'This is for %sBlog Index page%s. And anything set here is used for other loop index pages unless you do not specify custom settings on them.', "thememountain-kant" ),
					),
				'tm_post_twitter' => array(
					esc_html__( 'Enable Twitter SNS icon', "thememountain-kant" ),
					esc_html__( 'Whether the single post page should have a Twitter share icon', "thememountain-kant" ),
					),
				'tm_post_facebook' => array(
					esc_html__( 'Enable Facebook SNS icon', "thememountain-kant" ),
					esc_html__( 'Whether the single post page should have a Facebook share icon', "thememountain-kant" ),
					),
				'tm_post_googleplus' => array(
					esc_html__( 'Enable Google + SNS icon', "thememountain-kant" ),
					esc_html__( 'Whether the single post page should have a Google+ share icon', "thememountain-kant" ),
					),
				'tm_post_pinterest' => array(
					esc_html__( 'Enable Pinterest icon', "thememountain-kant" ),
					esc_html__( 'Whether the single post page should have a Pinterest share icon', "thememountain-kant" ),
					),
				// Home
				'tm_page_header_title_home' => array(
					esc_html__( 'Page Header Title', "thememountain-kant" ),
					esc_html__( 'Sets the page title for the blog index. Leave blank to use your site tag line for your home page index page title.', "thememountain-kant" ),
					),
				// 404
				'tm_error_page_type' => array(
					esc_html__( 'Error Page Type', "thememountain-kant" ),
					esc_html__( 'Determines whether the error page should use the default 404 page layout, or whether a custom post type layout should be used (layout created using Visual Composer).', "thememountain-kant" ),
					esc_html__( 'Use Default Layout', "thememountain-kant" ),
					esc_html__( 'Use TM Error Page', "thememountain-kant" ),
				),
				'tm_error_page_id_to_show' => array(
					esc_html__( 'TM Error Page to Show', "thememountain-kant" ),
					'',
					esc_html__( 'Select a Error Page', "thememountain-kant" ),
					),
				'tm_page_header_title_404' => array(
					esc_html__( 'Page Header Title', "thememountain-kant" ),
					esc_html__( 'Sets the page title for the 404 index. Leave blank to use default.', "thememountain-kant" ),
					),
				'tm_search_message_404' => array(
					esc_html__( 'Search Message', "thememountain-kant" ),
					esc_html__( 'Sets the page title for the 404 search message. Leave blank to use default.', "thememountain-kant" ),
					),
				// Search
				'tm_page_header_title_search' => array(
					esc_html__( 'Page Header Title', "thememountain-kant" ),
					esc_html__( 'Sets the page title for the search index. Leave blank to use default.', "thememountain-kant" ),
					),
				'tm_search_message_search' => array(
					esc_html__( 'Search Message', "thememountain-kant" ),
					esc_html__( 'Sets the page title for the search message. Leave blank to use default.', "thememountain-kant" ),
					),
				// Archive
				'tm_page_header_title_archive' => array(
					esc_html__( 'Page Header Title', "thememountain-kant" ),
					esc_html__( 'Sets the page title for the archive index. Leave blank to use default.', "thememountain-kant" ),
					),
				// Category
				'tm_page_header_title_category' => array(
					esc_html__( 'Page Header Title', "thememountain-kant" ),
					esc_html__( 'Sets the page title for the category index. Leave blank to use default.', "thememountain-kant" ),
					),
				// Author
				'tm_page_header_title_author' => array(
					esc_html__( 'Page Header Title', "thememountain-kant" ),
					esc_html__( 'Sets the page title for the author index. Leave blank to use default.', "thememountain-kant" ),
					),
				// tm_folio
				'tm_page_header_title_tm_folio' => array(
					esc_html__( 'Page Header Title', "thememountain-kant" ),
					esc_html__( 'Sets the page title for the ThemeMountain Portofolio custom post type index. Leave blank to use default.', "thememountain-kant" ),
					),
				// Search Info
				'tm_search_loop_info_intro' => array(
					esc_html__( 'This is for %ssearch index page%s.', "thememountain-kant" ),
					),
				// 404
				'tm_404_info_intro' => array(
					esc_html__( 'This is for %s404 index page%s.', "thememountain-kant" ),
					),
				// Advanced menu
				'tm_use_custom_settings_home' => array(
					esc_html__( 'Show advanced setting items.', "thememountain-kant" ),
					esc_html__( 'This section controls advanced settings such as blog index layout, sidebar options and header styles.', "thememountain-kant" ),
					),
				'tm_use_custom_settings_a' => array(
					esc_html__( 'Use Custom Setings.', "thememountain-kant" ),
					esc_html__( 'By default global settings are used. You can specify unique settings for the single page by turning on "Use Custom Settings".', "thememountain-kant" ),
					),
				'tm_use_custom_settings_b' => array(
					esc_html__( 'Use Custom Setings.', "thememountain-kant" ),
					esc_html__( 'By default global settings are used.', "thememountain-kant" ),
					),
				// Recent Post Title
				'show_recent_post_title_' => array(
					esc_html__( 'Show Recent Post Title', "thememountain-kant" ),
					'',
					),
				'recent_post_title_' => array(
					esc_html__( 'Recent Post Title', "thememountain-kant" ),
					'',
					esc_html__( 'Recent Posts', "thememountain-kant" ),
					),
				'recent_post_title_alignment_' => array(
					esc_html__( 'Recent Post Title Alignment', "thememountain-kant" ),
					'',
					esc_html__( 'Left', "thememountain-kant" ),
					esc_html__( 'Center', "thememountain-kant" ),
					esc_html__( 'Right', "thememountain-kant" ),
					),
				'recent_post_title_bottom_padding_' => array(
					esc_html__( 'Recent Post Title Bottom Padding', "thememountain-kant" ),
					'',
					),
				// Excerpt Layout Style
				'tm_loop_style_' => array(
					esc_html__( 'Excerpt Layout Style', "thememountain-kant" ),
					esc_html__( 'Determines the blog index page layout, either Wide Layout, 3 Column Layout or 4 Column Layout.', "thememountain-kant" ),
					esc_html__( 'Wide Layout', "thememountain-kant" ),
					esc_html__( 'Grid Layout', "thememountain-kant" ),
					esc_html__( 'Creative Layout', "thememountain-kant" ),
					),
				'tm_excerpt_grid_layout_columns_' => array(
					esc_html__( 'Grid Layout Columns', "thememountain-kant" ),
					'',
					esc_html__( '2', "thememountain-kant" ),
					esc_html__( '3', "thememountain-kant" ),
					esc_html__( '4', "thememountain-kant" ),
					),
				'tm_column_gutters_' => array(
					esc_html__( 'Column Gutters', "thememountain-kant" ),
					'',
					esc_html__( 'None', "thememountain-kant" ),
					esc_html__( 'Small', "thememountain-kant" ),
					esc_html__( 'Large', "thememountain-kant" ),
					),
				'tm_loop_thumbnail_ratio_' => array(
					esc_html__( 'Thumbnail Ratio', "thememountain-kant" ),
					esc_html__( 'The ratio used for calculating grid item with and height. Changing the ratio will change the height of the masonry grid items.', "thememountain-kant" ),
					),
				'tm_grid_layout_width_' => array(
					esc_html__( 'Grid Layout Width', "thememountain-kant" ),
					esc_html__( 'Determines whether the blog index page layout should be fixed or full width.', "thememountain-kant" ),
					esc_html__( 'Fixed Width', "thememountain-kant" ),
					esc_html__( 'Full Width', "thememountain-kant" ),
					),
				// Blog grid item background color and post color needs color options in Customiser #192
				'tm_grid_layout_box_article_background_color_' => array(
					esc_html__( 'Article Background Color', "thememountain-kant" ),
					'',
					),
				'tm_grid_layout_box_article_color_' => array(
					esc_html__( 'Article Color', "thememountain-kant" ),
					'',
					),
				'tm_grid_layout_box_article_title_color_' => array(
					esc_html__( 'Article Title Color', "thememountain-kant" ),
					'',
					),
				'tm_grid_layout_box_article_title_color_hover_' => array(
					esc_html__( 'Article Title Hover Color', "thememountain-kant" ),
					'',
					),
				'tm_grid_layout_box_article_link_color_' => array(
					esc_html__( 'Article Link Color', "thememountain-kant" ),
					'',
					),
				'tm_grid_layout_box_article_link_color_hover_' => array(
					esc_html__( 'Article Link Hover Color', "thememountain-kant" ),
					'',
					),
				// End #192
				// #226
				'tm_grid_layout_box_article_post_meta_color_' => array(
					esc_html__( 'Article Post Meta Color', "thememountain-kant" ),
					'',
					),
				// End #226
				'tm_use_sidebar_' => array(
					esc_html__( 'Sidebar Settings', "thememountain-kant" ),
					esc_html__( 'Determines whether the blog index page layout should have No sidebar, Sidebar to the left or Sidebar to the right.', "thememountain-kant" ),
					esc_html__( 'No side bar', "thememountain-kant" ),
					esc_html__( 'Right', "thememountain-kant" ),
					esc_html__( 'Left', "thememountain-kant" ),
					),
				/** Add overlay info color colorpicker to Under Customizing> Content Settings > Blog Index Page #90 */
				'tm_post_rollover_background_color_wide_grids_' => array(
					esc_html__( 'Post Rollover Background Color', "thememountain-kant" ),
					),
				'tm_post_rollover_background_color_creative_' => array(
					esc_html__( 'Post Rollover Background Color', "thememountain-kant" ),
					),
				// end #90
				// Add blog rollover color option to customiser #180
				// Content Settings > Blog Index Page, and Page options, Recent Posts
				'tm_post_rollover_color_wide_grids_home' => array(
					esc_html__( 'Post Rollover Color', "thememountain-kant" ),
					''
				),
				'tm_post_rollover_color_creative_home' => array(
					esc_html__( 'Post Rollover Color', "thememountain-kant" ),
					''
				),
				//
				// end #180
				'tm_use_masthead_title_' => array(
					esc_html__( 'Use Masthead Title', "thememountain-kant" ),
					esc_html__( 'Determines whether a masthead title should be used.', "thememountain-kant" ),
					),
				/** Page Head Background Title Color */
				'tm_page_head_title_background_color_' => array(
					esc_html__( 'Masthead Title Background Color', "thememountain-kant" ),
					),
				'tm_page_head_title_font_color_' => array(
					esc_html__( 'Masthead Title Font Color', "thememountain-kant" ),
					),
				'tm_page_head_title_background_image_' => array(
					esc_html__( 'Masthead Title Background Image', "thememountain-kant" ),
					esc_html__( 'Upload a header background image.', "thememountain-kant" ),
					),
				'tm_page_head_title_overlay_background_color_' => array(
					esc_html__( 'Masthead Overlay Background Color', "thememountain-kant" ),
					),
				// Pagination Options
				'tm_pagination_background_color_' => array(
					esc_html__( 'Pagination Link Background Color', "thememountain-kant" ),
				),
				'tm_pagination_background_color_hover_' => array(
					esc_html__( 'Pagination Link Background Hover Color', "thememountain-kant" ),
				),
				'tm_pagination_background_color_active_' => array(
					esc_html__( 'Link Active Background Color', "thememountain-kant" ),
				),
				'tm_pagination_border_color_' => array(
					esc_html__( 'Pagination LInk Border Color', "thememountain-kant" ),
				),
				'tm_pagination_border_color_hover_' => array(
					esc_html__( 'Pagination Link Border Hover Color', "thememountain-kant" ),
				),
				'tm_pagination_border_color_active_' => array(
					esc_html__( 'Pagination Link Active Border Color', "thememountain-kant" ),
				),
				'tm_pagination_link_color_' => array(
					esc_html__( 'Pagination Link Color', "thememountain-kant" ),
				),
				'tm_pagination_link_color_hover_' => array(
					esc_html__( 'Pagination Link Hover Color', "thememountain-kant" ),
				),
				'tm_pagination_link_color_active_' => array(
					esc_html__( 'Pagination Link Active Color', "thememountain-kant" ),
				),
				'tm_pagination_return_to_index_' => array(
					esc_html__( 'Pagination Return to Index', "thememountain-kant" ),
					'',
					esc_html__( 'None', "thememountain-kant" ),
					esc_html__( 'Label', "thememountain-kant" ),
					esc_html__( 'Icon', "thememountain-kant" ),
				),
				'tm_pagination_return_to_index_label_' => array(
					esc_html__( 'Pagination Return to Index Label', "thememountain-kant" ),
				),
				// content body
				'tm_content_body_background_color' => array(
					esc_html__( 'Body Background Color', "thememountain-kant" ),
					),
				'tm_section_block_background_color' => array(
					esc_html__( 'Section Block Background Color', "thememountain-kant" ),
					),
				'tm_content_body_text_color' => array(
					esc_html__( 'Content Body Text Color', "thememountain-kant" ),
					),
				'tm_content_body_title_color' => array(
					esc_html__( 'Title Color', "thememountain-kant" ),
					),
				'tm_content_body_title_link_color' => array(
					esc_html__( 'Title Link Color', "thememountain-kant" ),
					),
				'tm_content_body_title_link_color_hover' => array(
					esc_html__( 'Title Link Hover Color', "thememountain-kant" ),
					),
				'tm_content_body_link_color' => array(
					esc_html__( 'Link Color', "thememountain-kant" ),
					),
				'tm_content_body_link_color_hover' => array(
					esc_html__( 'Link Hover Color', "thememountain-kant" ),
					),
				'tm_lead_font_color' => array(
					esc_html__( 'Lead Font Color', "thememountain-kant" ),
					),
				// Single Post Options
				'tm_show_author_bio' => array(
					esc_html__( 'Show Author Bio', "thememountain-kant" ),
					''
					),
				// Global Button Color
				'tm_button_set_global_color' => array(
					esc_html__( 'Set Global Button Color', "thememountain-kant" ),
					esc_html__( 'Determines whether global button sizes, styles and colors should apply. You can override the colors individually for form elements and button shortcodes.', "thememountain-kant" ),
					),
				// Button Size (dropdown)
				'tm_button_size' => array(
					esc_html__( 'Button Size', "thememountain-kant" ),
					esc_html__( 'Determines whether button should be small, medium, large or extra large in size.', "thememountain-kant" ),
					esc_html__( 'Small', "thememountain-kant" ),
					esc_html__( 'Medium', "thememountain-kant" ),
					esc_html__( 'Large', "thememountain-kant" ),
					esc_html__( 'Extra Large', "thememountain-kant" ),
					),
				// Button Style (dropdown)
				'tm_button_style' => array(
					esc_html__( 'Button Style', "thememountain-kant" ),
					esc_html__( 'Whether button should have sharp corners, rounded corners, or be pill-shaped.', "thememountain-kant" ),
					esc_html__( 'None', "thememountain-kant" ),
					esc_html__( 'Rounded', "thememountain-kant" ),
					esc_html__( 'Pill', "thememountain-kant" ),
					),
				// Global Button Background Color (colorpicker)
				'tm_button_bkg_color' => array(
					esc_html__( 'Global Button Background Color', "thememountain-kant" ),
					),
				// Global Button Background Color Hover (colorpicker)
				'tm_button_bkg_color_hover' => array(
					esc_html__( 'Global Button Background Color Hover', "thememountain-kant" ),
					),
				// Global Button Border Color (colorpicker)
				'tm_button_border_color' => array(
					esc_html__( 'Global Button Border Color', "thememountain-kant" ),
					),
				// Global Button Border Color Hover (colorpicker)
				'tm_button_border_color_hover' => array(
					esc_html__( 'Global Button Border Color Hover', "thememountain-kant" ),
					),
				// Global Button Label Color (colorpicker)
				'tm_button_label_color' => array(
					esc_html__( 'Global Button Label Color', "thememountain-kant" ),
					),
				// Global Button Label Color Hover (colorpicker)
				'tm_button_label_color_hover' => array(
					esc_html__( 'Global Button Label Color Hover', "thememountain-kant" ),
					),
				// fields_footer.php
				'tm_footer_type' => array(
					esc_html__( 'Footer Type', "thememountain-kant" ),
					esc_html__( 'Determines whether the footer should use the WordPress default widget space, or whether the footer should use a custom post type (layout created using Visual Composer).', "thememountain-kant" ),
					esc_html__( 'Use Widget Space', "thememountain-kant" ),
					esc_html__( 'Use TM Footer', "thememountain-kant" ),
					esc_html__( 'Hide Footer', "thememountain-kant" ),
					),
				'tm_footer_id_to_show' => array(
					esc_html__( 'TM Footer to show', "thememountain-kant" ),
					esc_html__( 'Determines which custom footer to use.', "thememountain-kant" ),
					),
				'tm_footer_column_number' => array(
					esc_html__( 'The number of columns in the footer', "thememountain-kant" ),
					esc_html__( 'Determines the number of columns the footer should have. Note: Our themes support 1-4 footer columns.', "thememountain-kant" ),
					esc_html__( '1 Column', "thememountain-kant" ),
					esc_html__( '2 Columns', "thememountain-kant" ),
					esc_html__( '3 Columns', "thememountain-kant" ),
					esc_html__( '4 Columns', "thememountain-kant" ),
					esc_html__( '5 Columns', "thememountain-kant" ),
					),
				'tm_footer_column_align_' => array(
					esc_html__( 'Column %s Content Alignment', "thememountain-kant" ),
					esc_html__( 'Determines the content alignment of each footer column. Alignment can be set for each individual column.', "thememountain-kant" ),
					esc_html__( 'Left', "thememountain-kant" ),
					esc_html__( 'Center', "thememountain-kant" ),
					esc_html__( 'Right', "thememountain-kant" ),
					),
				'tm_footer_position' => array(
					esc_html__( 'Footer Position', "thememountain-kant" ),
					esc_html__( 'Determines whether the footer should scroll with the content or fixed and revealed by the content.', "thememountain-kant" ),
					esc_html__( 'Relative', "thememountain-kant" ),
					esc_html__( 'Fixed', "thememountain-kant" ),
					),
				'tm_footer_scale_content_upon_footer_reveal' => array(
					esc_html__( 'Scale content upon footer reveal', "thememountain-kant" ),
					esc_html__( 'Determines if the content should scale and animate as the footer is revealed.', "thememountain-kant" ),
					),
				// Footer Color Section
				'tm_footer_background_color' => array(
					esc_html__( 'Footer Background Color', "thememountain-kant" ),
					),
				'tm_footer_text_color' => array(
					esc_html__( 'Footer Text Color', "thememountain-kant" ),
					),
				'tm_footer_link_text_color' => array(
					esc_html__( 'Footer Link Text Color', "thememountain-kant" ),
					),
				'tm_footer_link_text_color_hover' => array(
					esc_html__( 'Footer Link Hover Color', "thememountain-kant" ),
					),
				'tm_footer_title_color' => array(
					esc_html__( 'Footer Title Color', "thememountain-kant" ),
					),
				'tm_footer_text_font_size' => array(
					esc_html__( 'Footer Text Font Size', "thememountain-kant" ),
					),
				'tm_footer_form_background_color' => array(
					esc_html__( 'Form Background Color', "thememountain-kant" ),
					),
				'tm_footer_form_border_color' => array(
					esc_html__( 'Form Border Color', "thememountain-kant" ),
					),
				'tm_footer_form_placeholder_color' => array(
					esc_html__( 'Form Placeholder Color', "thememountain-kant" ),
					),
				'tm_footer_form_focus_background_color' => array(
					esc_html__( 'Form Focus Background Color', "thememountain-kant" ),
					),
				'tm_footer_form_focus_border_color' => array(
					esc_html__( 'Form Focus Border Color', "thememountain-kant" ),
					),
				'tm_footer_form_focus_text_color' => array(
					esc_html__( 'Form Focus Text Color', "thememountain-kant" ),
					),
				'tm_footer_form_required_background_color' => array(
					esc_html__( 'Form Required Background Color', "thememountain-kant" ),
					),
				'tm_footer_form_required_border_color' => array(
					esc_html__( 'Form Required Border Color', "thememountain-kant" ),
					),
				'tm_footer_form_required_text_color' => array(
					esc_html__( 'Form Required Text Color', "thememountain-kant" ),
					),
				'tm_footer_form_error_background_color' => array(
					esc_html__( 'Form Error Background Color', "thememountain-kant" ),
					),
				'tm_footer_form_error_border_color' => array(
					esc_html__( 'Form Error Border Color', "thememountain-kant" ),
					),
				'tm_footer_form_error_text_color' => array(
					esc_html__( 'Form Error Text Color', "thememountain-kant" ),
					),
				'tm_footer_form_submit_background_color' => array(
					esc_html__( 'Form Submit Background Color', "thememountain-kant" ),
					),
				'tm_footer_form_submit_border_color' => array(
					esc_html__( 'Form Submit Border Color', "thememountain-kant" ),
					),
				'tm_footer_form_submit_text_color' => array(
					esc_html__( 'Form Submit Text Color', "thememountain-kant" ),
					),
				'tm_footer_form_submit_hover_background_color' => array(
					esc_html__( 'Form Submit Hover Background Color', "thememountain-kant" ),
					),
				'tm_footer_form_submit_hover_border_color' => array(
					esc_html__( 'Form Submit Hover Border Color', "thememountain-kant" ),
					),
				'tm_footer_form_submit_hover_text_color' => array(
					esc_html__( 'Form Submit Hover Text Color', "thememountain-kant" ),
					),
				'tm_footer_form_response_message_color' => array(
					esc_html__( 'Form Response Message Color', "thememountain-kant" ),
					),
				// fields_form.php
				'tm_theme_form_background_color' => array(
					esc_html__( 'Form Background Color', "thememountain-kant" ),
					),
				'tm_theme_form_border_color' => array(
					esc_html__( 'Form Border Color', "thememountain-kant" ),
					),
				'tm_theme_form_placeholder_color' => array(
					esc_html__( 'Form Placeholder Color', "thememountain-kant" ),
					),
				'tm_theme_form_placeholder_focus_color' => array(
					esc_html__( 'Form Placeholder Focus Color', "thememountain-kant" ),
					),
				'tm_theme_form_focus_background_color' => array(
					esc_html__( 'Form Focus Background Color', "thememountain-kant" ),
					),
				'tm_theme_form_focus_border_color' => array(
					esc_html__( 'Form Focus Border Color', "thememountain-kant" ),
					),
				'tm_theme_form_focus_text_color' => array(
					esc_html__( 'Form Focus Text Color', "thememountain-kant" ),
					),
				// submit
				'tm_theme_form_submit_background_color' => array(
					esc_html__( 'Form Submit Background Color', "thememountain-kant" ),
					),
				'tm_theme_form_submit_border_color' => array(
					esc_html__( 'Form Submit Border Color', "thememountain-kant" ),
					),
				'tm_theme_form_submit_text_color' => array(
					esc_html__( 'Form Submit Text Color', "thememountain-kant" ),
					),
				'tm_theme_form_submit_hover_background_color' => array(
					esc_html__( 'Form Submit Hover Background Color', "thememountain-kant" ),
					),
				'tm_theme_form_submit_hover_border_color' => array(
					esc_html__( 'Form Submit Hover Border Color', "thememountain-kant" ),
					),
				'tm_theme_form_submit_hover_text_color' => array(
					esc_html__( 'Form Submit Hover Text Color', "thememountain-kant" ),
					),
				// fields_form_cf7.php
				// tm_cf7_border_style_section
				'tm_cf7_border_style' => array(
					esc_html__( 'Form Border Style', "thememountain-kant" ),
					'',
					esc_html__( 'None', "thememountain-kant" ),
					esc_html__( 'Rounded', "thememountain-kant" ),
					esc_html__( 'Pill', "thememountain-kant" ),
				),
				'tm_cf7_background_color' => array(
					esc_html__( 'Form Background Color', "thememountain-kant" ),
					),
				'tm_cf7_border_color' => array(
					esc_html__( 'Form Border Color', "thememountain-kant" ),
					),
				'tm_cf7_placeholder_color' => array(
					esc_html__( 'Form Placeholder Color', "thememountain-kant" ),
					),
				'tm_cf7_form_text_color' => array(
					esc_html__( 'Form Text Color', "thememountain-kant" ),
					),
				'tm_cf7_placeholder_focus_color' => array(
					esc_html__( 'Form Placeholder Focus Color', "thememountain-kant" ),
					),
				'tm_cf7_focus_background_color' => array(
					esc_html__( 'Form Focus Background Color', "thememountain-kant" ),
					),
				'tm_cf7_focus_border_color' => array(
					esc_html__( 'Form Focus Border Color', "thememountain-kant" ),
					),
				'tm_cf7_focus_text_color' => array(
					esc_html__( 'Form Focus Text Color', "thememountain-kant" ),
					),
				'tm_cf7_error_background_color' => array(
					esc_html__( 'Form Error Background Color', "thememountain-kant" ),
					),
				'tm_cf7_error_border_color' => array(
					esc_html__( 'Form Error Border Color', "thememountain-kant" ),
					),
				'tm_cf7_error_text_color' => array(
					esc_html__( 'Form Error Text Color', "thememountain-kant" ),
					),
				'tm_cf7_submit_background_color' => array(
					esc_html__( 'Form Submit Background Color', "thememountain-kant" ),
					),
				'tm_cf7_submit_border_color' => array(
					esc_html__( 'Form Submit Border Color', "thememountain-kant" ),
					),
				'tm_cf7_submit_text_color' => array(
					esc_html__( 'Form Submit Text Color', "thememountain-kant" ),
					),
				'tm_cf7_submit_hover_background_color' => array(
					esc_html__( 'Form Submit Hover Background Color', "thememountain-kant" ),
					),
				'tm_cf7_submit_hover_border_color' => array(
					esc_html__( 'Form Submit Hover Border Color', "thememountain-kant" ),
					),
				'tm_cf7_submit_hover_text_color' => array(
					esc_html__( 'Form Submit Hover Text Color', "thememountain-kant" ),
					),
				'tm_cf7_response_message_color' => array(
					esc_html__( 'Form Response Message Color', "thememountain-kant" ),
					),
				'tm_cf7_checkbox_radio_background_color' => array(
					esc_html__( 'Checkbox & Radio Background Color', "thememountain-kant" ),
					),
				'tm_cf7_checkbox_radio_border_color' => array(
					esc_html__( 'Checkbox & Radio Border Color', "thememountain-kant" ),
					),
				'tm_cf7_checkbox_checked_background_color' => array(
					esc_html__( 'Checkbox Checked Background Color', "thememountain-kant" ),
					),
				'tm_cf7_radio_checked_background_color' => array(
					esc_html__( 'Radio Checked Background Color', "thememountain-kant" ),
					),
				'tm_cf7_checkbox_check_color' => array(
					esc_html__( 'Checkbox Check Color', "thememountain-kant" ),
					),
				'tm_cf7_radiobutton_checked_color' => array(
					esc_html__( 'Radio Button Checked Color', "thememountain-kant" ),
					),
				// fields_lightbox.php
				'tm_lightbox_overlay_background_color' => array(
					esc_html__( 'Lightbox Overlay Background Color', "thememountain-kant" ),
					),
				'tm_lightbox_navigation_color' => array(
					esc_html__( 'Lightbox Navigation Color', "thememountain-kant" ),
					),
				'tm_lightbox_caption_background_color' => array(
					esc_html__( 'Lightbox Caption Background Color', "thememountain-kant" ),
					),
				'tm_lightbox_caption_color' => array(
					esc_html__( 'Lightbox Caption Color', "thememountain-kant" ),
					),
				// fields_loader.php
				'tm_loader_color' => array(
					esc_html__( 'Loader Color', "thememountain-kant" ),
					),
				'tm_loader_border_thickness' => array(
					esc_html__( 'Loader Border Thickness', "thememountain-kant" ),
					),
				'tm_loader_size' => array(
					esc_html__( 'Loader Size', "thememountain-kant" ),
					),
				// #175. In tm_off_canvas_nav_settings in fields_off_canvas_nav_settings.php
				'tm_off_canvas_nav_menu_width' => array(
					esc_html__( 'Off-canvas Navigation Width', "thememountain-kant" ),
					esc_html__( 'Determines the Off-canvas navigation width.', "thememountain-kant" ),
					esc_html__( 'Default', "thememountain-kant" ),
					esc_html__( '50%', "thememountain-kant" ),
					),
				// tm_off_canvas_nav_settings in fields_off_canvas_nav_settings.php
				'tm_off_canvas_nav_menu_alignment' => array(
					esc_html__( 'Off-canvas Navigation Alignment', "thememountain-kant" ),
					esc_html__( 'Determines the Off-canvas navigation alignment.', "thememountain-kant" ),
					esc_html__( 'Left', "thememountain-kant" ),
					esc_html__( 'Center', "thememountain-kant" ),
					esc_html__( 'Right', "thememountain-kant" ),
					),
				'tm_off_canvas_title_display' => array(
					esc_html__( 'Off-Canvas Menu Title Display', "thememountain-kant" ),
					esc_html__( 'Determines the Off-Canvas Menu Title Display.', "thememountain-kant" ),
					esc_html__( 'Show', "thememountain-kant" ),
					esc_html__( 'Hide', "thememountain-kant" ),
					),
				'tm_secondary_off_canvas_title_display' => array(
					esc_html__( 'Off-Canvas Secondary Menu Title Display', "thememountain-kant" ),
					esc_html__( 'Determines the Off-Canvas Secondary Menu Title Display.', "thememountain-kant" ),
					esc_html__( 'Show', "thememountain-kant" ),
					esc_html__( 'Hide', "thememountain-kant" ),
					),
				// Off-Canvas Navigation Color
				'tm_off_canvas_nav_color' => array(
					esc_html__( 'Off-Canvas Navigation Color', "thememountain-kant" ),
					),
				'tm_off_canvas_nav_color_hover_active' => array(
					esc_html__( 'Off-Canvas Navigation Hover & Active Color', "thememountain-kant" ),
					),
				'tm_off_canvas_background_color' => array(
					esc_html__( 'Off-Canvas Background Color', "thememountain-kant" ),
					),
				'tm_offcanvas_exit_button_color' => array(
					esc_html__( 'Off-Canvas Exit Button Color', "thememountain-kant" ),
					),
				'tm_offcanvas_exit_button_color_hover' => array(
					esc_html__( 'Off-Canvas Exit Button Hover Color', "thememountain-kant" ),
					),
				'tm_off_canvas_nav_copyright_color' => array(
					esc_html__( 'Off-Canvas Navigation Copyright Color', "thememountain-kant" ),
					),
				'tm_off_canvas_nav_position' => array(
					esc_html__( 'Off-Canvas Navigation Position', "thememountain-kant" ),
					'',
					esc_html__( 'Enter Left', "thememountain-kant" ),
					esc_html__( 'Enter Right', "thememountain-kant" ),
					),
				'tm_off_canvas_nav_animation' => array(
					esc_html__( 'Off-Canvas Navigation Animation', "thememountain-kant" ),
					'',
					esc_html__( 'Content slide out', "thememountain-kant" ),
					esc_html__( 'Nav slide in', "thememountain-kant" ),
					esc_html__( 'Nav push in', "thememountain-kant" ),
					esc_html__( 'Nav scale in', "thememountain-kant" ),
					),
				// Add color options for cart to Side Navigation options in Customiser: #211
				'tm_offcanvas_sub_menu_navigation_color' => array(
					esc_html__( 'Off-Canvas Sub Menu Navigation Color', "thememountain-kant" ),
				),
				'tm_offcanvas_sub_menu_navigation_color_hover' => array(
					esc_html__( 'Off-Canvas Sub Menu Navigation Hover Color', "thememountain-kant" ),
				),
				'tm_offcanvas_cart_delete_button_background_color' => array(
					esc_html__( 'Off-Canvas Cart Delete Button Bkg Color', "thememountain-kant" ),
				),
				// Added in #218
				'tm_offcanvas_cart_badge_background_color' => array(
					esc_html__( 'Off-Canvas Cart Badge Background Color', "thememountain-kant" ),
				),
				'tm_offcanvas_cart_badge_color' => array(
					esc_html__( 'Off-Canvas Cart Badge Color', "thememountain-kant" ),
				),
				// End #218
				'tm_offcanvas_cart_delete_button_color' => array(
					esc_html__( 'Off-Canvas Cart Delete Button Color', "thememountain-kant" ),
				),
				'tm_offcanvas_cart_delete_button_color_hover' => array(
					esc_html__( 'Off-Canvas Cart Delete Button Hover Color', "thememountain-kant" ),
				),
				'tm_offcanvas_cart_price_color' => array(
					esc_html__( 'Off-Canvas Cart Price Color', "thememountain-kant" ),
				),
				'tm_offcanvas_cart_total_color' => array(
					esc_html__( 'Off-Canvas Cart Total Color', "thememountain-kant" ),
				),
				'tm_offcanvas_cart_total_divider_color' => array(
					esc_html__( 'Off-Canvas Cart Total Divider Color', "thememountain-kant" ),
				),
				'tm_offcanvas_button_background_color' => array(
					esc_html__( 'Off-Canvas Button Background Color', "thememountain-kant" ),
				),
				'tm_offcanvas_button_border_color' => array(
					esc_html__( 'Off-Canvas Button Border Color', "thememountain-kant" ),
				),
				'tm_offcanvas_button_text_color' => array(
					esc_html__( 'Off-Canvas Button Text Color', "thememountain-kant" ),
				),
				'tm_offcanvas_button_background_color_hover' => array(
					esc_html__( 'Off-Canvas Button Hover Background Color', "thememountain-kant" ),
				),
				'tm_offcanvas_button_border_color_hover' => array(
					esc_html__( 'Off-Canvas Button Hover Border Color', "thememountain-kant" ),
				),
				'tm_offcanvas_button_text_color_hover' => array(
					esc_html__( 'Off-Canvas Button Hover Text Color', "thememountain-kant" ),
				),
				// end #211
				// fields_overlay_appearance.php
				'tm_overlay_nav_menu_alignment' => array(
					esc_html__( 'Overlay Navigation Alignment', "thememountain-kant" ),
					esc_html__( 'Determines the Overlay navigation alignment.', "thememountain-kant" ),
					esc_html__( 'Left', "thememountain-kant" ),
					esc_html__( 'Center', "thememountain-kant" ),
					esc_html__( 'Right', "thememountain-kant" ),
					),
				'tm_overlay_menu_title_display' => array(
					esc_html__( 'Overlay Menu Title Display', "thememountain-kant" ),
					esc_html__( 'Determines the Overlay Menu Title Display.', "thememountain-kant" ),
					esc_html__( 'Show', "thememountain-kant" ),
					esc_html__( 'Hide', "thememountain-kant" ),
					),
				'tm_secondary_overlay_title_display' => array(
					esc_html__( 'Overlay Secondary Menu Title Display', "thememountain-kant" ),
					esc_html__( 'Determines the Overlay Secondary Menu Title Display.', "thememountain-kant" ),
					esc_html__( 'Show', "thememountain-kant" ),
					esc_html__( 'Hide', "thememountain-kant" ),
					),
				// Overlay Navigation Color
				'tm_overlay_background_color' => array(
					esc_html__( 'Overlay Navigation Background Color', "thememountain-kant" ),
					),
				'tm_overlay_exit_button_color' => array(
					esc_html__( 'Overlay Navigation Exit Button Color', "thememountain-kant" ),
					),
				'tm_overlay_exit_button_color_hover' => array(
					esc_html__( 'Overlay Navigation Exit Button Color', "thememountain-kant" ),
					),
				'tm_overlay_nav_title_color' => array(
					esc_html__( 'Overlay Navigation Title Color', "thememountain-kant" ),
					),
				'tm_overlay_nav_copyright_color' => array(
					esc_html__( 'Overlay Navigation Copyright Color', "thememountain-kant" ),
					),
				'tm_overlay_nav_animation' => array(
					esc_html__( 'Overlay Navigation Animation', "thememountain-kant" ),
					'',
					esc_html__( 'Slide in Top', "thememountain-kant" ),
					esc_html__( 'Slide in Right', "thememountain-kant" ),
					esc_html__( 'Slide in Bottom', "thememountain-kant" ),
					esc_html__( 'Slide in Left', "thememountain-kant" ),
					esc_html__( 'Scale In', "thememountain-kant" ),
					),
				// fields_overlay_nav_appearance.php
				'tm_overlay_navigation_color' => array(
					esc_html__( 'Overlay Navigation Color', "thememountain-kant" ),
					),
				'tm_overlay_navigation_color_hover_active' => array(
					esc_html__( 'Overlay Navigation Hover & Active Color', "thememountain-kant" ),
					),
				// Add color options for cart to Side Navigation options in Customiser: #212
				'tm_overlay_sub_menu_navigation_color' => array(
					esc_html__( 'Overlay Sub Menu Navigation Color', "thememountain-kant" ),
				),
				'tm_overlay_sub_menu_navigation_color_hover' => array(
					esc_html__( 'Overlay Sub Menu Navigation Hover Color', "thememountain-kant" ),
				),
				// Added in #218
				'tm_overlay_cart_badge_background_color' => array(
					esc_html__( 'Overlay Cart Badge Background Color', "thememountain-kant" ),
				),
				'tm_overlay_cart_badge_color' => array(
					esc_html__( 'Overlay Cart Badge Color', "thememountain-kant" ),
				),
				// End #218
				'tm_overlay_cart_delete_button_background_color' => array(
					esc_html__( 'Overlay Cart Delete Button Bkg Color', "thememountain-kant" ),
				),
				'tm_overlay_cart_delete_button_color' => array(
					esc_html__( 'Overlay Cart Delete Button Color', "thememountain-kant" ),
				),
				'tm_overlay_cart_delete_button_color_hover' => array(
					esc_html__( 'Overlay Cart Delete Button Hover Color', "thememountain-kant" ),
				),
				'tm_overlay_cart_price_color' => array(
					esc_html__( 'Overlay Cart Price Color', "thememountain-kant" ),
				),
				'tm_overlay_cart_total_color' => array(
					esc_html__( 'Overlay Cart Total Color', "thememountain-kant" ),
				),
				'tm_overlay_cart_total_divider_color' => array(
					esc_html__( 'Overlay Cart Total Divider Color', "thememountain-kant" ),
				),
				'tm_overlay_button_background_color' => array(
					esc_html__( 'Overlay Button Background Color', "thememountain-kant" ),
				),
				'tm_overlay_button_border_color' => array(
					esc_html__( 'Overlay Button Border Color', "thememountain-kant" ),
				),
				'tm_overlay_button_text_color' => array(
					esc_html__( 'Overlay Button Text Color', "thememountain-kant" ),
				),
				'tm_overlay_button_background_color_hover' => array(
					esc_html__( 'Overlay Button Hover Background Color', "thememountain-kant" ),
				),
				'tm_overlay_button_border_color_hover' => array(
					esc_html__( 'Overlay Button Hover Border Color', "thememountain-kant" ),
				),
				'tm_overlay_button_text_color_hover' => array(
					esc_html__( 'Overlay Button Hover Text Color', "thememountain-kant" ),
				),
				// end #212
				// Site Search
				'tm_search_modal_overlay_background_color' => array(
					esc_html__( 'Search Modal Overlay Background Color', "thememountain-kant" ),
					),
				'tm_search_modal_form_placeholder_color' => array(
					esc_html__( 'Search Modal Form Placeholder Color', "thememountain-kant" ),
					),
				'tm_search_modal_form_focus_color' => array(
					esc_html__( 'Search Modal Form Focus Text Color', "thememountain-kant" ),
					),
				'tm_search_modal_close_link_color' => array(
					esc_html__( 'Search Modal Close Link Color', "thememountain-kant" ),
					),
				// fields_tm_navigation_header_logo.php
				'tm_use_top_logo' => array(
					esc_html__( 'Use top logo', "thememountain-kant" ),
					esc_html__( 'Our themes allow you to use two logos for the header. Namely, a top and body header logo. The first appears by default, and the second appears as the user begins to scroll the page. This options determines whether your site should have a top logo.', "thememountain-kant" ),
					),
				'custom_logo' => array(
					esc_html__( 'Top Logo Image', "thememountain-kant" ),
					esc_html__( 'This is where you upload your top logo. Note: the default logo width is set to 95px. This means that your logo image should measure at least 190px to ensure it looks sharp on retina displays.', "thememountain-kant" ),
					),
				'tm_page_header_logo_common_menu_hover_opacity' => array(
					esc_html__( 'Header Logo Hover Opacity', "thememountain-kant" ),
					esc_html__( 'Determines the logo opacity upon hover.', "thememountain-kant" ),
					),
				'tm_logo_top_width_hamburger' => array(
					esc_html__( 'Top Logo Width (hamburger)', "thememountain-kant" ),
					esc_html__( 'Determines the initial width of the top logo. Note: your logo will proportionally scale in height based on its width. If you have a vertical shaped logo, consider modifying the "Top Header Height" and "Body Header Height" under "Header Settings > Header Navigation Apperance". Default: 120', "thememountain-kant" ),
					),
				'tm_logo_top_width_default' => array(
					esc_html__( 'Top Logo Width (default)', "thememountain-kant" ),
					esc_html__( 'Determines the initial width of the top logo. Note: your logo will proportionally scale in height based on its width. If you have a vertical shaped logo, consider modifying the "Top Header Height" and "Body Header Height" under "Header Settings > Header Navigation Apperance". Default: 120', "thememountain-kant" ),
					),
				'tm_use_body_logo' => array(
					esc_html__( 'Use body logo', "thememountain-kant" ),
					esc_html__( 'Determines whether your site should use the same image that you uploaded for the top logo for the body logo, whether it should be different or whether you should use no body logo.', "thememountain-kant" ),
					esc_html__( 'Same as the top logo', "thememountain-kant" ),
					esc_html__( 'Different from top logo', "thememountain-kant" ),
					esc_html__( 'Do not use body logo', "thememountain-kant" ),
					),
				'tm_logo_body' => array(
					esc_html__( 'Body Logo Image', "thememountain-kant" ),
					esc_html__( 'This is where you upload your body logo.', "thememountain-kant" ),
					),
				'tm_logo_body_width_default' => array(
					esc_html__( 'Body Logo Width', "thememountain-kant" ),
					esc_html__( 'Determines the initial width of the body logo. Note: If the header is reduced in height upon scroll, consider reducing the logo width as well for the body logo. Default: 95', "thememountain-kant" ),
					),
				// fields_tm_page_header_appearance.php
				'tm_body_header_presets' => array(
					esc_html__( 'Header Style Presets', "thememountain-kant" ),
					esc_html__( 'Determines the header style and position. Note that this is a present and that each individual option for the preset can be overridden below.', "thememountain-kant" ),
					esc_html__( 'Header Above Content', "thememountain-kant" ),
					esc_html__( 'Header Above Content - Sticky on Scroll', "thememountain-kant" ),
					esc_html__( 'Header Over Content', "thememountain-kant" ),
					esc_html__( 'Header Over Content - Sticky on Scroll', "thememountain-kant" ),
					esc_html__( 'Header Over Content - Fixed', "thememountain-kant" ),
					esc_html__( 'Header Bottom', "thememountain-kant" ),
					esc_html__( 'Header Bottom - Sticky on Scroll', "thememountain-kant" ),
					),
				'tm_header_position' => array(
					esc_html__( 'Header Position', "thememountain-kant" ),
					esc_html__( 'Determines the initial position of the header. The header can either be positioned relative to the page content i.e. above page content, positioned absolutely, where the header overlays the content but scrolls with the page, or, positioned fixed, where the header overlays content and remains sticky at all times.', "thememountain-kant" ),
					esc_html__( 'Relative', "thememountain-kant" ),
					esc_html__( 'Absolute', "thememountain-kant" ),
					esc_html__( 'Fixed', "thememountain-kant" ),
					),
				'tm_header_fixed_on_mobile' => array(
					esc_html__( 'Header Position Mobile', "thememountain-kant" ),
					esc_html__( 'Determines whether the header should scroll with the content or remain fixed on mobile.', "thememountain-kant" ),
					esc_html__( 'Fix header on mobile', "thememountain-kant" ),
					esc_html__( 'Do not fix header on mobile', "thememountain-kant" ),
					),
				'tm_header_vertical_alignment' => array(
					esc_html__( 'Header Vertical Alignment', "thememountain-kant" ),
					esc_html__( 'Determines whether the header should be position top or bottom of the viewport.', "thememountain-kant" ),
					esc_html__( 'Top', "thememountain-kant" ),
					esc_html__( 'Bottom', "thememountain-kant" ),
					),
				'tm_header_vertical_alignment_bottom_value' => array(
					esc_html__( 'Header Bottom Value', "thememountain-kant" ),
					esc_html__( 'Determines the bottom position pixel value of the header.', "thememountain-kant" ),
					),
				'tm_top_header_common_menu_height' => array(
					esc_html__( 'Top Header Height', "thememountain-kant" ),
					esc_html__( 'Determines initial header height. Note: default is set to 80px.', "thememountain-kant" ),
					),
				'tm_body_header_default_menu_height' => array(
					esc_html__( 'Body Header Height', "thememountain-kant" ),
					esc_html__( 'Determines body header height. Note: default is set to 65px.', "thememountain-kant" ),
					),
				'tm_body_header_default_menu_height_threshold' => array(
					esc_html__( 'Body Header Height Threshold', "thememountain-kant" ),
					esc_html__( 'Determines how many pixels the user must scroll before the header swaps height. Note: default is set to 100px. Leave blank not to apply.', "thememountain-kant" ),
					),
				'tm_body_header_background_color_threshold' => array(
					esc_html__( 'Body Header Background Color Threshold', "thememountain-kant" ),
					esc_html__( 'Determines how many pixels the user must scroll before the header swaps background color. Note: default is set to 100px. Leave blank not to apply.', "thememountain-kant" ),
					),
				'tm_body_header_compact_threshold' => array(
					esc_html__( 'Body Header Compact Threshold', "thememountain-kant" ),
					esc_html__( 'Determines the number of pixels the user must scroll before the header should be reduced in height, i.e. compacted. Leave blank not to apply.', "thememountain-kant" ),
					),
				'tm_body_header_sticky_threshold' => array(
					esc_html__( 'Header Sticky Threshold', "thememountain-kant" ),
					esc_html__( 'Determines the number of pixels the user must scroll before the header should become sticky, i.e. remain fixed. Leave blank not to apply.', "thememountain-kant" ),
					),
				'tm_body_header_helper_out_threshold' => array(
					esc_html__( 'Header Helper Out Threshold', "thememountain-kant" ),
					esc_html__( 'Determines the number of pixels the user must scroll before the header should slide out and default to its original position. Leave blank not to apply.', "thememountain-kant" ),
					),
				// fields_tm_page_header_nav_appearance.php
				'tm_header_navigation_type' => array(
					esc_html__( 'Header Navigation Type', "thememountain-kant" ),
					esc_html__( 'Determines whether your site should employ a default main navigation or the more modern, hamburger navigation.', "thememountain-kant" ),
					),
				'tm_page_header_nav_top_header_border_color' => array(
					esc_html__( 'Top Header Border Color', "thememountain-kant" ),
					),
				'tm_page_header_nav_body_header_border_color' => array(
					esc_html__( 'Body Header Border Color', "thememountain-kant" ),
					),
				// Added #218
				'tm_page_header_cart_badge_background_color' => array(
					esc_html__( 'Header Cart Badge Background Color', "thememountain-kant" ),
				),
				'tm_page_header_cart_badge_color' => array(
					esc_html__( 'Header Cart Badge Color', "thememountain-kant" ),
				),
				// End #218
				// default values for tm_pagination_return_to_index_label
				'tm_pagination_return_to_index_label_tm_folio' => esc_html__( 'Folio index', "thememountain-kant" ),
				'tm_pagination_return_to_index_label_home' => esc_html__( 'Blog index', "thememountain-kant" ),
				);

			/**
			 * Page Options Settings
			 * array index 0 for label and 1 for description
			 */
			self::$text_strings['page_options'] = array(
				/** Tab strings */
				'homepage_with_posts' => array(
					esc_html__( 'Custom options for homepage with posts', "thememountain-kant" ),
					esc_html__( 'Pre-Header', "thememountain-kant" ),
					esc_html__( 'Navigation Menu', "thememountain-kant" ),
					esc_html__( 'Footer', "thememountain-kant" ),
					esc_html__( 'Recent Posts', "thememountain-kant" ),
					esc_html__( 'Featured Media', "thememountain-kant" ),
					esc_html__( 'Grids', "thememountain-kant" ),
					),
				'page' => array(
					esc_html__( 'Custom options for page', "thememountain-kant" ),
					esc_html__( 'Pre-Header', "thememountain-kant" ),
					esc_html__( 'Navigation Menu', "thememountain-kant" ),
					esc_html__( 'Footer', "thememountain-kant" ),
					esc_html__( 'Featured Media', "thememountain-kant" ),
					esc_html__( 'Sidebar Location', "thememountain-kant" ),
					esc_html__( 'Loop', "thememountain-kant" ),
					esc_html__( 'Grids', "thememountain-kant" ),
					),
				'post' => array(
					esc_html__( 'Custom options for post', "thememountain-kant" ),
					esc_html__( 'Pre-Header', "thememountain-kant" ),
					esc_html__( 'Navigation Menu', "thememountain-kant" ),
					esc_html__( 'Footer', "thememountain-kant" ),
					esc_html__( 'Featured Media', "thememountain-kant" ),
					esc_html__( 'Post Media', "thememountain-kant" ),
					esc_html__( 'Sidebar Location', "thememountain-kant" ),
					esc_html__( 'Loop', "thememountain-kant" ),
					esc_html__( 'Grids', "thememountain-kant" ),
					),
				'tm_error_page' => array(
					esc_html__( 'Custom options for TM Error Page', "thememountain-kant" ),
					esc_html__( 'Pre-Header', "thememountain-kant" ),
					esc_html__( 'Navigation Menu', "thememountain-kant" ),
					esc_html__( 'Footer', "thememountain-kant" ),
					esc_html__( 'Featured Media', "thememountain-kant" ),
					esc_html__( 'Sidebar Location', "thememountain-kant" ),
					esc_html__( 'Loop', "thememountain-kant" ),
					esc_html__( 'Grids', "thememountain-kant" ),
					),
				'tm_folio' => array(
					esc_html__( 'Custom options for Folio', "thememountain-kant" ),
					esc_html__( 'Pre-Header', "thememountain-kant" ),
					esc_html__( 'Navigation Menu', "thememountain-kant" ),
					esc_html__( 'Footer', "thememountain-kant" ),
					esc_html__( 'Featured Media', "thememountain-kant" ),
					esc_html__( 'Loop', "thememountain-kant" ),
					esc_html__( 'Grids', "thememountain-kant" ),
					esc_html__( 'Pagination', "thememountain-kant" ),
					),
				'tm_modal' => array(
					esc_html__( 'Custom options for Modal items', "thememountain-kant" ),
					esc_html__( 'Modal Animation Settings', "thememountain-kant" ),
					),
				/** for WooCommerce */
				'product' => array(
					esc_html__( 'Custom options for WooCommerce product page', "thememountain-kant" ),
					esc_html__( 'Pre-Header', "thememountain-kant" ),
					esc_html__( 'Navigation Menu', "thememountain-kant" ),
					esc_html__( 'Footer', "thememountain-kant" ),
					esc_html__( 'Featured Media', "thememountain-kant" ),
					esc_html__( 'Sidebar Location', "thememountain-kant" ),
					esc_html__( 'Grids', "thememountain-kant" ),
					),
				/** Featured Media */
				'tm_featured_media_type' => array(
					esc_html__( 'Featured Media Type', "thememountain-kant" ),
					esc_html__( 'Sets featured media to either image or video.', "thememountain-kant" ),
					esc_html__( 'None', "thememountain-kant" ),
					esc_html__( 'Image', "thememountain-kant" ),
					esc_html__( 'Use Vimeo Video', "thememountain-kant" ),
					esc_html__( 'Use YouTube Video', "thememountain-kant" ),
					esc_html__( 'Use HTML5 Video', "thememountain-kant" ),
					),
				'tm_featured_media_youtube' => array(
					esc_html__( 'Youtube Video ID', "thememountain-kant" ),
					''
					),
				'tm_featured_media_vimeo' => array(
					esc_html__( 'Vimeo Video ID', "thememountain-kant" ),
					''
					),
				'tm_featured_media_video_mp4' => array(
					esc_html__( 'Video File (mp4)', "thememountain-kant" ),
					'',
					esc_html__( 'Set video file', "thememountain-kant" ),
					),
				'tm_featured_media_video_webm' => array(
					esc_html__( 'Video File (webm)', "thememountain-kant" ),
					'',
					esc_html__( 'Set video file', "thememountain-kant" ),
					),
				'tm_featured_media_thumbnail' => array(
					esc_html__( 'Video Thumbnail', "thememountain-kant" ),
					'',
					esc_html__( 'Set video thumbnail image file', "thememountain-kant" ),
					),
				'tm_featured_media_loop_video' => array(
					esc_html__( 'Loop Video', "thememountain-kant" ),
					'',
					esc_html__( 'Do not loop', "thememountain-kant" ),
					esc_html__( 'Loop', "thememountain-kant" ),
					),
				'tm_featured_media_mute_video' => array(
					esc_html__( 'Mute Sound', "thememountain-kant" ),
					'',
					esc_html__( 'Mute', "thememountain-kant" ),
					esc_html__( 'Play sound', "thememountain-kant" ),
					),
				'tm_featured_media_video_mode' => array(
					esc_html__( 'Video Format', "thememountain-kant" ),
					'',
					esc_html__( 'Regular (with controls)', "thememountain-kant" ),
					esc_html__( 'Background Video (no controls)', "thememountain-kant" ),
					),
				/** Page Head */
				'tm_use_masthead_title_settings_of' => array(
					esc_html__( 'Custom Masthead Title', "thememountain-kant" ),
					esc_html__( 'Check if you want to use custom settings for the masthead title block. (optional)', "thememountain-kant" ),
					esc_html__( 'Use customiser settings', "thememountain-kant" ),
					esc_html__( 'Set masthead title options for this post', "thememountain-kant" ),
					esc_html__( 'Hide the masthead title', "thememountain-kant" ),
					),
				'tm_masthead_height' => array(
					esc_html__( 'Post Media Height', "thememountain-kant" ),
					esc_html__( 'Media Height.', "thememountain-kant" ),
					esc_html__( 'Default (500px)', "thememountain-kant" ),
					esc_html__( 'Window Height', "thememountain-kant" ),
					esc_html__( 'Custom', "thememountain-kant" ),
					),
				'tm_page_head_min_height' => array(
					esc_html__( 'Minimum Height', "thememountain-kant" ),
					esc_html__( 'Determines the height beyond which the slider will not scale.', "thememountain-kant" ),
					),
				'tm_masthead_height_custom' => array(
					esc_html__( 'Custom Page Head Height', "thememountain-kant" ),
					'',
					),
				'tm_page_head_title_animation' => array(
					esc_html__( 'Masthead Title Animation', "thememountain-kant" ),
					'',
					esc_html__( 'No animation effects', "thememountain-kant" ),
					esc_html__( 'Fade in', "thememountain-kant" ),
					esc_html__( 'Slide in from bottom short', "thememountain-kant" ),
					esc_html__( 'Slide in from right short', "thememountain-kant" ),
					esc_html__( 'Slide in from top short', "thememountain-kant" ),
					esc_html__( 'Slide in from left short', "thememountain-kant" ),
					esc_html__( 'Slide in from bottom long', "thememountain-kant" ),
					esc_html__( 'Slide in from right long', "thememountain-kant" ),
					esc_html__( 'Slide in from top long', "thememountain-kant" ),
					esc_html__( 'Slide in from left long', "thememountain-kant" ),
					esc_html__( 'Bounce in', "thememountain-kant" ),
					esc_html__( 'Bounce out', "thememountain-kant" ),
					esc_html__( 'Bounce in from bottom', "thememountain-kant" ),
					esc_html__( 'Bounce in from right', "thememountain-kant" ),
					esc_html__( 'Bounce in from top', "thememountain-kant" ),
					esc_html__( 'Bounce in from left', "thememountain-kant" ),
					esc_html__( 'Scale in', "thememountain-kant" ),
					esc_html__( 'Scale out', "thememountain-kant" ),
					esc_html__( 'Flip in X', "thememountain-kant" ),
					esc_html__( 'Flip in Y', "thememountain-kant" ),
					esc_html__( 'Spin in X', "thememountain-kant" ),
					esc_html__( 'Spin in Y', "thememountain-kant" ),
					esc_html__( 'Helicopter in', "thememountain-kant" ),
					esc_html__( 'Helicopter out', "thememountain-kant" ),
					esc_html__( 'Sign swing in from top', "thememountain-kant" ),
					esc_html__( 'Sign swing in from right', "thememountain-kant" ),
					esc_html__( 'Sign swing in from bottom', "thememountain-kant" ),
					esc_html__( 'Sign swing in from left', "thememountain-kant" ),
					esc_html__( 'Wiggle X', "thememountain-kant" ),
					esc_html__( 'Wiggle Y', "thememountain-kant" ),
					esc_html__( 'Drop in from bottom', "thememountain-kant" ),
					esc_html__( 'Drop in from top', "thememountain-kant" ),
					esc_html__( 'Roll in from left', "thememountain-kant" ),
					esc_html__( 'Roll in from right', "thememountain-kant" ),
					esc_html__( 'Turn in from right', "thememountain-kant" ),
					esc_html__( 'Turn in from left', "thememountain-kant" ),
					),
				'tm_page_head_title_animation_duration' => array(
					esc_html__( 'Animation Duration', "thememountain-kant" ),
					esc_html__( 'How long the animation should be. Expressed in milliseconds i.e. 1000 represents 1 second.', "thememountain-kant" ),
					),
				'tm_page_head_title_animation_delay' => array(
					esc_html__( 'Animation Delay', "thememountain-kant" ),
					esc_html__( 'How long before the animation should begin upon entering the viewport. Expressed in milliseconds i.e. 100 represents 0.1 second.', "thememountain-kant" ),
					),
				/** Sidebar */
				'tm_use_sidebar' => array(
					esc_html__( 'Sidebar Location', "thememountain-kant" ),
					esc_html__( 'Determines whether the page template should have No sidebar, Sidebar to the left or Sidebar to the right.', "thememountain-kant" ),
					esc_html__( 'Use the Customiser setting', "thememountain-kant" ),
					esc_html__( 'Show sidebar on right', "thememountain-kant" ),
					esc_html__( 'Show sidebar on left', "thememountain-kant" ),
					esc_html__( 'Do not show sidebar', "thememountain-kant" ),
					),
				/** Post Media */
				'tm_use_post_media' => array(
					esc_html__( 'Post Media', "thememountain-kant" ),
					esc_html__( 'Use post media.', "thememountain-kant" ),
					esc_html__( 'Do not use media', "thememountain-kant" ),
					esc_html__( 'Use Vimeo', "thememountain-kant" ),
					esc_html__( 'Use Youtube', "thememountain-kant" ),
					esc_html__( 'Use self hosted video', "thememountain-kant" ),
					esc_html__( 'Use self hosted audio', "thememountain-kant" ),
					),
				'tm_media_height' => array(
					esc_html__( 'Post Media Height', "thememountain-kant" ),
					esc_html__( 'Media Height.', "thememountain-kant" ),
					esc_html__( 'Default (500px)', "thememountain-kant" ),
					esc_html__( 'Window Height', "thememountain-kant" ),
					esc_html__( 'Custom', "thememountain-kant" ),
					),
				'tm_media_height_custom' => array(
					esc_html__( 'Custom Video Height', "thememountain-kant" ),
					esc_html__( 'Custom Video Height', "thememountain-kant" ),
					),
				'tm_media_youtube' => array(
					esc_html__( 'Youtube Video ID', "thememountain-kant" ),
					esc_html__( 'Enter Youtube video ID', "thememountain-kant" ),
					),
				'tm_media_vimeo' => array(
					esc_html__( 'Vimeo Video ID', "thememountain-kant" ),
					esc_html__( 'Enter Vimeo video ID', "thememountain-kant" ),
					),
				'tm_media_video_mp4' => array(
					esc_html__( 'Video File (mp4)', "thememountain-kant" ),
					'',
					esc_html__( 'Set video file', "thememountain-kant" ),
					),
				'tm_media_video_webm' => array(
					esc_html__( 'Video File (webm)', "thememountain-kant" ),
					'',
					esc_html__( 'Set video file', "thememountain-kant" ),
					),
				'tm_media_thumbnail' => array(
					esc_html__( 'Video Thumbnail', "thememountain-kant" ),
					'',
					esc_html__( 'Set video thumbnail image file', "thememountain-kant" ),
					),
				'tm_use_video_for_featured' => array(
					esc_html__( 'Use Video for Featured Media in Loop', "thememountain-kant" ),
					'',
					),
				/** Audio */
				'tm_media_audio' => array(
					esc_html__( 'Audio File (mp3)', "thememountain-kant" ),
					'',
					esc_html__( 'Set audio file', "thememountain-kant" ),
					),
				'tm_use_audio_for_featured' => array(
					esc_html__( 'Use Audio for Featured Media in Loop', "thememountain-kant" ),
					'',
					),
				/** Fields Loop */
				'tm_hide_excerpt_in_loop' => array(
					esc_html__( 'Excerpt in loop', "thememountain-kant" ),
					esc_html__( 'Check this box to hide excerpt in loop (optional)', "thememountain-kant" ),
					),
				/** Grids */
				'tm_grid_thumbnail' => array(
					esc_html__( 'Grid Thumbnail', "thememountain-kant" ),
					esc_html__( 'Upload a different image that will appear in the grid.', "thememountain-kant" ),
					esc_html__( 'Select grid thumbnail image', "thememountain-kant" ),
					),
				'tm_grid_linked_item' => array(
					esc_html__( 'Link Grid Item To', "thememountain-kant" ),
					'',
					esc_html__( 'Post', "thememountain-kant" ),
					esc_html__( 'Lightbox', "thememountain-kant" ),
					esc_html__( 'Custom URL', "thememountain-kant" ),
					esc_html__( 'Not Linked', "thememountain-kant" ),
					),
				'tm_grid_custom_url' => array(
					esc_html__( 'Custom URL', "thememountain-kant" ),
					''
					),
				'tm_grid_lightbox_caption' => array(
					esc_html__( 'Lightbox Caption', "thememountain-kant" ),
					''
					),
				/**
				 * see tm_grid item need to add an additional option to grid rollovers #39
				 *  - text_with_thumbnail_rollover added and labels for text_with_thumbnail has been changed
				 */
				'tm_grid_box_type' => array(
					esc_html__( 'Grid Box Appearance', "thememountain-kant" ),
					esc_html__( 'Determines appearance of page/post in the grid', "thememountain-kant" ),
					esc_html__( 'Ignored if no Featured Media or grid thumbnail has been set', "thememountain-kant" ),
					esc_html__( 'Show thumb with project title & description below', "thememountain-kant" ),
					esc_html__( 'Show thumb with project title & description on rollover', "thememountain-kant" ),
					esc_html__( 'Show title & excerpt with solid background color', "thememountain-kant" ),
					esc_html__( 'Do not show in the grid', "thememountain-kant" ),
					),
				/**
				 * see tm_grid item need to add an additional option to grid rollovers #39
				 */
				'tm_grid_box_title' => array(
					esc_html__( 'Grid Box Title', "thememountain-kant" ),
					'',
					),
				/**
				 * see tm_grid item need to add an additional option to grid rollovers #39
				 */
				'tm_grid_box_description' => array(
					esc_html__( 'Grid Box Description', "thememountain-kant" ),
					'',
					),
				'tm_grid_box_thumb_format' => array(
					esc_html__( 'Grid box thumbnail format and size', "thememountain-kant" ),
					esc_html__( 'Determines the format of the thumbnail in the grid', "thememountain-kant" ),
					esc_html__( 'Do not specify', "thememountain-kant" ),
					esc_html__( 'Large Landscape', "thememountain-kant" ),
					esc_html__( 'Portrait', "thememountain-kant" ),
					esc_html__( 'Large Portrait', "thememountain-kant" ),
					esc_html__( 'Wide', "thememountain-kant" ),
					),
				// Blog Creative Layout Options and Fixes #15
				'tm_grid_box_content_vertical_alignment' => array(
					esc_html__( 'Grid Box Content Vertical Alignment', "thememountain-kant" ),
					'',
					esc_html__( 'Top', "thememountain-kant" ),
					esc_html__( 'Middle', "thememountain-kant" ),
					esc_html__( 'Bottom', "thememountain-kant" ),
					),
				'tm_grid_box_content_horizontal_alignment' => array(
					esc_html__( 'Gird Box Content Horizontal Alignment', "thememountain-kant" ),
					'',
					esc_html__( 'Left', "thememountain-kant" ),
					esc_html__( 'Center', "thememountain-kant" ),
					esc_html__( 'Right', "thememountain-kant" ),
					),
				// Blog Creative Layout Options and Fixes #15 End
				'tm_grid_box_text' => array(
					esc_html__( 'Grid Box Text', "thememountain-kant" ),
					''
					),
				/** Pagination (for tm_folio) */
				'tm_pagination_hide' => array(
					esc_html__( 'Hide Pagination', "thememountain-kant" ),
					esc_html__( 'Yes', "thememountain-kant" ),
					),
				/** Navigation Menu */
				'tm_navigation_menu_deviate' => array(
					esc_html__( 'Change Navigation Appearance for this Page', "thememountain-kant" ),
					esc_html__( 'Check this box if you would like to alter the main navigation for this page/post only. Leave blank to default to Customiser settings.', "thememountain-kant" ),
					),
				'tm_deviate_logo' => array(
					esc_html__( 'Logo', "thememountain-kant" ),
					esc_html__( 'Determines which logo to use for the header.', "thememountain-kant" ),
					esc_html__( 'User Customiser Setting', "thememountain-kant" ),
					esc_html__( 'Use Top Logo', "thememountain-kant" ),
					esc_html__( 'Use Body Logo', "thememountain-kant" ),
					),
				'tm_navigation_menu_item_main_nav_menu' => array(
					esc_html__( 'Main Navigation Menu', "thememountain-kant" ),
					'',
					),
				'tm_navigation_menu_item_overlay_menu' => array(
					esc_html__( 'Overlay Navigation Menu', "thememountain-kant" ),
					esc_html__( 'Sets the overlay navigation menu.', "thememountain-kant" ),
					),
				'tm_navigation_menu_item_overlay_secondary_menu' => array(
					esc_html__( 'Overlay Secondary Navigation Menu', "thememountain-kant" ),
					esc_html__( 'Determines the secondary overlay menu alignment.', "thememountain-kant" ),
					),
				'tm_navigation_menu_item_off_canvas_menu' => array(
					esc_html__( 'Off-Canvas Navigation Menu', "thememountain-kant" ),
					esc_html__( 'Sets the off-canvas navigation menu.', "thememountain-kant" ),
					),
				'tm_navigation_menu_item_off_canvas_secondary_menu' => array(
					esc_html__( 'Off-Canvas Secondary Navigation Menu', "thememountain-kant" ),
					esc_html__( 'Determines the secondary off-canvas menu alignment.', "thememountain-kant" ),
					),
				'tm_navigation_color_set' => array(
					esc_html__( 'Navigation Color Set', "thememountain-kant" ),
					'',
					esc_html__( 'Default', "thememountain-kant" ),
					esc_html__( 'Custom', "thememountain-kant" ),
					),
				/** Homepage with Posts Template Options */
				'tm_hide_pagination' => array(
					esc_html__( 'Hide Pagination', "thememountain-kant" ),
					esc_html__( 'Determines whether to show the blog pagination.', "thememountain-kant" ),
					),
				'tm_post_count' => array(
					esc_html__( 'Post Count', "thememountain-kant" ),
					esc_html__( 'Determines the number of posts to be shown.', "thememountain-kant" ),
					),
				/** TM Footer */
				'tm_footer_type' => array(
					esc_html__( 'Footer Type', "thememountain-kant" ),
					esc_html__( 'Determines whether the footer should use the WordPress default widget space, or whether the footer should use a custom post type (layout created using Visual Composer).', "thememountain-kant" ),
					esc_html__( 'Use Customizer Settings', "thememountain-kant" ),
					esc_html__( 'Use Widget Space', "thememountain-kant" ),
					esc_html__( 'Use TM Footer', "thememountain-kant" ),
					esc_html__( 'Hide Footer', "thememountain-kant" ),
					),
				'tm_footer_id_to_show' => array(
					esc_html__( 'TM Footer to show', "thememountain-kant" ),
					esc_html__( 'Determines which custom footer to use for this page.', "thememountain-kant" ),
					),
				'tm_footer_column_number' => array(
					esc_html__( 'The number of columns in the footer', "thememountain-kant" ),
					esc_html__( 'Determines the number of columns the footer should have. Note: Our themes support 1-4 footer columns.', "thememountain-kant" ),
					esc_html__( '1 Column', "thememountain-kant" ),
					esc_html__( '2 Columns', "thememountain-kant" ),
					esc_html__( '3 Columns', "thememountain-kant" ),
					esc_html__( '4 Columns', "thememountain-kant" ),
					esc_html__( '5 Columns', "thememountain-kant" ),
					),
				'tm_footer_column_align_1' => array(
					esc_html__( 'Column 1 Content Alignment', "thememountain-kant" ),
					'',
					esc_html__( 'Left', "thememountain-kant" ),
					esc_html__( 'Center', "thememountain-kant" ),
					esc_html__( 'Right', "thememountain-kant" ),
					),
				'tm_footer_column_align_2' => array(
					esc_html__( 'Column 2 Content Alignment', "thememountain-kant" ),
					'',
					esc_html__( 'Left', "thememountain-kant" ),
					esc_html__( 'Center', "thememountain-kant" ),
					esc_html__( 'Right', "thememountain-kant" ),
					),
				'tm_footer_column_align_3' => array(
					esc_html__( 'Column 3 Content Alignment', "thememountain-kant" ),
					'',
					esc_html__( 'Left', "thememountain-kant" ),
					esc_html__( 'Center', "thememountain-kant" ),
					esc_html__( 'Right', "thememountain-kant" ),
					),
				'tm_footer_column_align_4' => array(
					esc_html__( 'Column 4 Content Alignment', "thememountain-kant" ),
					'',
					esc_html__( 'Left', "thememountain-kant" ),
					esc_html__( 'Center', "thememountain-kant" ),
					esc_html__( 'Right', "thememountain-kant" ),
					),
				'tm_footer_column_align_5' => array(
					esc_html__( 'Column 5 Content Alignment', "thememountain-kant" ),
					'',
					esc_html__( 'Left', "thememountain-kant" ),
					esc_html__( 'Center', "thememountain-kant" ),
					esc_html__( 'Right', "thememountain-kant" ),
					),
				/** TM Modal */
				'tm_modal_width' => array(
					esc_html__( 'Modal Width', "thememountain-kant" ),
					''
					),
				'tm_modal_content_animation' => array(
					esc_html__( 'Modal Content Animation', "thememountain-kant" ),
					'',
					esc_html__( 'Fade', "thememountain-kant" ),
					esc_html__( 'Slide in top', "thememountain-kant" ),
					esc_html__( 'Slide in bottom', "thememountain-kant" ),
					esc_html__( 'Scale in', "thememountain-kant" ),
					esc_html__( 'Scale out', "thememountain-kant" ),
					),
				'tm_modal_lightbox_overlay_animation' => array(
					esc_html__( 'Lightbox Overlay Animation', "thememountain-kant" ),
					'',
					esc_html__( 'Fade', "thememountain-kant" ),
					esc_html__( 'Slide in top', "thememountain-kant" ),
					esc_html__( 'Slide in right', "thememountain-kant" ),
					esc_html__( 'Slide in bottom', "thememountain-kant" ),
					esc_html__( 'Slide in left', "thememountain-kant" ),
					),
				/** tm modal add a few options to Custom options for modal items #69 */
				'tm_modal_header' => array(
					esc_html__( 'Add Modal Header', "thememountain-kant" ),
					''
					),
				// tm_modal custom post type add an option for rounded corners for lightbox #74
				'tm_modal_border_style' => array(
					esc_html__( 'Modal Border Style', "thememountain-kant" ),
					'',
					esc_html__( 'None', "thememountain-kant" ),
					esc_html__( 'Rounded', "thememountain-kant" ),
				),
				'tm_modal_header_title' => array(
					esc_html__( 'Modal Header Title', "thememountain-kant" ),
					''
					),
				'tm_modal_header_background_color' => array(
					esc_html__( 'Modal Header Background Color', "thememountain-kant" ),
					''
					),
				'tm_modal_header_title_color' => array(
					esc_html__( 'Modal Header Title Color', "thememountain-kant" ),
					''
					),
				'tm_modal_close_button_color' => array(
					esc_html__( 'Modal Close Button Color', "thememountain-kant" ),
					''
				),
				'tm_modal_custom_classes' => array(
					esc_html__( 'Modal Custom Classes', "thememountain-kant" ),
					''
					),
				/* #69 end */
				'tm_modal_auto_launch' => array(
					esc_html__( 'Auto Launch Modal', "thememountain-kant" ),
					'',
					),
				'tm_modal_auto_launch_delay' => array(
					esc_html__( 'Modal Auto Launch Delay', "thememountain-kant" ),
					esc_html__( 'Determines the delay before the modal is launched upon page load. Expressed in milliseconds i.e. 5000, represents 5 seconds.', "thememountain-kant" ),
					),
				'tm_modal_auto_close' => array(
					esc_html__( 'Auto Close Modal', "thememountain-kant" ),
					esc_html__( 'This option will only work if you have added a Contact Form to the modal. If checked, the modal will auto close upon form success.', "thememountain-kant" ),
					),
				'tm_modal_auto_launch_cookie' => array(
					esc_html__( 'Set Cookie', "thememountain-kant" ),
					esc_html__( 'Sets a cookies so that the modal only autolaunches a single time. This is useful if you create a autolaunching signup using a modal.', "thememountain-kant" ),
					),
				);
		}

		/**
		 * End
		 */
	}
}
