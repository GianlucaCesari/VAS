<?php
namespace ThemeMountain;
/**
 * the following has array in CMB2 format
 * https://github.com/WebDevStudios/CMB2/wiki/Field-Types#select
 */
TM_Admin::$option_metabox = array (
	array (
		'id' => 'tm_general_settings',
		'title' => esc_html__('General Settings','thememountain-plugin'),
		'weight' => 0,
		'show_on' =>
		array (
			'key' => 'options-page',
			'value' =>
			array (
				'general_settings',
				),
			),
		'show_names' => true,
		'fields' =>
		array (
			array (
				'name' => esc_html__('Theme Style','thememountain-plugin'),
				'id' => 'tm_theme_style',
				'type' => 'select',
				'show_option_none' => false,
				'default' => '',
				'options' =>
				array (
					),
				),
			),
			array (
				'name' => esc_html__('Add Rich Editor to Excerpt Meta Box','thememountain-plugin'),
				'id' => 'tm_add_rich_editor_to_excerpt_meta',
				'type' => 'select',
				'show_option_none' => false,
				'default' => '0',
				'options' =>
					array (
						'0' => esc_html__('Do not use rich editor for excerpt meta box','thememountain-plugin'),
						'1' => esc_html__('Use rich editor for excerpt meta box','thememountain-plugin'),
						),
			),
		),
	array (
		'id' => 'tm_post_settings',
		'title' => esc_html__('Post Settings','thememountain-plugin'),
		'weight' => 2,
		'show_on' =>
		array (
			'key' => 'options-page',
			'value' =>
			array (
				'tm_post_settings',
				),
			),
		'show_names' => true,
		'fields' =>
		array (
			array (
				'name' => esc_html__('Number of Single Post Categories to Show','thememountain-plugin'),
				'desc' => esc_html__('Set to -1 for not setting any limits to the nuber of categories to show in the single post description.','thememountain-plugin'),
				'id' => 'tm_categories_limit_number',
				'default' => '5',
				'type' => 'text',
				),
			array (
				'name' => esc_html__('Number of Single Post Tags to Show','thememountain-plugin'),
				'desc' => esc_html__('Set to -1 for not setting any limits to the nuber of tags to show in the single post description.','thememountain-plugin'),
				'id' => 'tm_tags_limit_number',
				'default' => '5',
				'type' => 'text',
				),
			),
		),
	array (
		'id' => 'tm_folio_settings',
		'title' => esc_html__('Portfolio Settings','thememountain-plugin'),
		'weight' => 4,
		'show_on' =>
		array (
			'key' => 'options-page',
			'value' =>
			array (
				'tm_folio_settings',
				),
			),
		'show_names' => true,
		'fields' =>
		array (
			array (
				'name' => esc_html__('Custom Post Type Slug','thememountain-plugin'),
				'desc' => esc_html__('Slug for the folio','thememountain-plugin'),
				'id' => 'tm_folio_slug',
				'default' => 'portfolio',
				'type' => 'text',
				),
			array (
				'name' => esc_html__('Custom Taxonomy Slug','thememountain-plugin'),
				'desc' => esc_html__('Slug for the folio category. Do no use the same slug as any other taxonomies or post types.','thememountain-plugin'),
				'id' => 'tm_folio_category_slug',
				'default' => 'tm_folio_category',
				'type' => 'text',
				),
			array (
				'name' => esc_html__('Category for Excluding from Pagination','thememountain-plugin'),
				'desc' => '',
				'id' => 'tm_folio_pagination_exclusion_category',
				'type' => 'select',
				'show_option_none' => TRUE,
				'default' => '',
				'options_cb' => function () {
					// argument
					$_args = array(
						'orderby' => 'id',
						'hide_empty' => FALSE
					);
					$_taxonomies=get_terms('tm_folio_category',$_args);
					// blank
					$_options = array();
					if (is_wp_error($_taxonomies) !== TRUE && $_taxonomies) {
						foreach ($_taxonomies  as $_taxonomy ) {
							$_options = $_options + array($_taxonomy->term_id => $_taxonomy->name);
						}
					}
					// end
					return $_options;
					},
				),
			),

		),
	array (
		'id' => 'tm_mailchimp_form_settings',
		'title' => esc_html__('Mailchimp Form Settings'),
		'weight' => 6,
		'show_on' =>
		array (
			'key' => 'options-page',
			'value' =>
			array (
				'tm_mailchimp_form_settings',
				),
			),
		'show_names' => true,
		'fields' =>
		array (
			array (
				'name' => esc_html__('Mailchimp API KEY','thememountain-plugin'),
				'desc' => esc_html__('Mailchimp API KEY','thememountain-plugin'),
				'id' => 'api_key',
				'default' => '',
				'type' => 'text',
			),
			array (
				'name' => esc_html__('Mailchimp List ID','thememountain-plugin'),
				'desc' => esc_html__('Mailchimp List ID','thememountain-plugin'),
				'id' => 'list_id',
				'default' => '',
				'type' => 'text',
			),
			array (
				'name' => esc_html__('Show marketing email consent checkbox','thememountain-plugin'),
				'id' => 'show_marketing_email_consent_checkbox',
				'type' => 'select',
				'show_option_none' => false,
				'default' => 'yes',
				'options' =>
				array (
					'no' => esc_html__('No','thememountain-plugin'),
					'yes' => esc_html__('Yes','thememountain-plugin'),
				),
			),
			array (
				'name' => esc_html__('Marketing email consent checkbox label','thememountain-plugin'),
				'id' => 'marketing_email_consent_checkbox_label',
				'type' => 'textarea',
				'default' => esc_html__('I give my consent to be emailed about promotions and offers.','thememountain-plugin'),
			),
			array (
				'name' => esc_html__('Marketing email consent notice','thememountain-plugin'),
				'id' => 'marketing_email_consent_notice',
				'type' => 'textarea',
				'default' => esc_html__('You can unsubscribe at any time.','thememountain-plugin'),
			),
			array (
				'name' => esc_html__('Privacy policy link','thememountain-plugin'),
				'id' => 'marketing_email_consent_privacy_policy_link',
				'desc' => 'Enter the link to your privacy policy.',
				'type' => 'text',
				'default' =>'',
			),
			array (
				'name' => esc_html__('Cookie policy link','thememountain-plugin'),
				'id' => 'marketing_email_consent_cookie_policy_link',
				'desc' => 'Enter the link to your cookie policy.',
				'type' => 'text',
				'default' =>'',
			),
			),
		),
	array (
		'id' => 'tm_googlemaps_settings',
		'title' => esc_html__('Google Maps Settings'),
		'weight' => 8,
		'show_on' =>
		array (
			'key' => 'options-page',
			'value' =>
			array (
				'tm_googlemaps_settings',
				),
			),
		'show_names' => true,
		'fields' =>
		array (
			array (
				'name' => esc_html__('Use Google Map API Key','thememountain-plugin'),
				'id' => 'tm_use_googlemaps_api_key',
				'type' => 'select',
				'show_option_none' => false,
				'default' => 'no',
				'options' =>
				array (
					'no' => esc_html__('Do not use Google Map API Key','thememountain-plugin'),
					'yes' => esc_html__('Use Google Map API Key.','thememountain-plugin'),
					),
				),
			array (
				'name' => esc_html__('Google Maps API Key','thememountain-plugin'),
				'id' => 'tm_googlemaps_api_key',
				'type' => 'text',
				'desc' => esc_html__('Enter your Google Map API key. If you do not yet have one, you can generate one here (link: https://developers.google.com/maps/documentation/javascript/get-api-key)','thememountain-plugin'),
				'default' => '',
				),
			),
		),
	array (
		'id' => 'tm_site_search_settings',
		'title' => esc_html__('Site Search Settings'),
		'weight' => 8,
		'show_on' =>
		array (
			'key' => 'options-page',
			'value' =>
			array (
				'tm_site_search_settings',
				),
			),
		'show_names' => true,
		'fields' =>
		array (
			array (
				'name' => esc_html__('Use Site Search','thememountain-plugin'),
				'id' => 'tm_use_site_search',
				'type' => 'select',
				'show_option_none' => false,
				'default' => 'no',
				'options' =>
				array (
					'no' => esc_html__('Do not use Site Search','thememountain-plugin'),
					'yes' => esc_html__('Use Site Search','thememountain-plugin'),
					),
				),
			array (
				'name' => esc_html__('Search Placeholder Text','thememountain-plugin'),
				'id' => 'tm_site_search_placeholder_text',
				'desc' => esc_html__('Set the placeholder text for the search field.','thememountain-plugin'),
				'type' => 'text',
				'default' => esc_html__('Type & Hit Enter...','thememountain-plugin'),
				),
			array (
				'name' => esc_html__('Seach Modal Close Text','thememountain-plugin'),
				'id' => 'tm_site_search_modal_close_text',
				'desc' => esc_html__('Set the search modal close link text.','thememountain-plugin'),
				'type' => 'text',
				'default' => esc_html__('Close','thememountain-plugin'),
				),
			),
		),
	array (
		'id' => 'tm_advanced_options',
		'title' => esc_html__('Advanced Settings','thememountain-plugin'),
		'weight' => 10,
		'show_on' =>
		array (
			'key' => 'options-page',
			'value' =>
			array (
				'advanced_options',
				),
			),
		'show_names' => true,
		'fields' =>
		array (
			array (
				'name' => esc_html__('Jpeg Image Quality','thememountain-plugin'),
				'id' => 'tm_jpeg_compression',
				'type' => 'select',
				'show_option_none' => false,
				'default' => '90',
				'options' =>
					array (
						'100' => esc_html__('Best quality','thememountain-plugin'),
						'90' => esc_html__('Wordpress Default','thememountain-plugin'),
						'50' => esc_html__('Low quality','thememountain-plugin'),
						),
			),
			array (
				'name' => esc_html__('Disable Image Cropping','thememountain-plugin'),
				'id' => 'tm_disable_image_crop',
				'type' => 'select',
				'show_option_none' => false,
				'default' => '0',
				'options' =>
					array (
						'0' => esc_html__('Crop (Wordpress default)','thememountain-plugin'),
						'1' => esc_html__('Disable Cropping','thememountain-plugin'),
						),
			),
			array (
				'name' => esc_html__('Disable SRCSET Support','thememountain-plugin'),
				'desc' => esc_html__("If you are uploading images to Amazon s3 some of your images might not be found because of WP's core support of srcset. In that case you might want to disable the Responsive Image feature.",'thememountain-plugin'),
				'id' => 'tm_disable_srcset_support',
				'type' => 'select',
				'show_option_none' => false,
				'default' => '0',
				'options' =>
					array (
						'0' => esc_html__('Use Srcset','thememountain-plugin'),
						'1' => esc_html__('Disable Srcset','thememountain-plugin'),
						),
			),
			array (
				'name' => esc_html__('vc_set_as_theme Support','thememountain-plugin'),
				'desc' => esc_html__("choose option",'thememountain-plugin'),
				'id' => 'tm_vc_set_as_theme',
				'type' => 'select',
				'show_option_none' => false,
				'default' => '1',
				'options' =>
				array (
					'0' => esc_html__('VC Not as theme','thememountain-plugin'),
					'1' => esc_html__('VC set as theme (default)','thememountain-plugin'),
				),
			),
			array (
				'name' => '',
				'id'   => 'reset_settings_title',
				'type' => 'title',
				'after' => '<button id="reset_settings" class="button button-primary" style="margin-bottom: 3rem;">'.esc_html__( 'Click this button to Reset Settings', 'thememountain-plugin' ).'</button>'
				)
		),)
	);