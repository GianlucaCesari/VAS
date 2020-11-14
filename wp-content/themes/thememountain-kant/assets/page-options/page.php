<?php
/**
 *  This file is a template config file and is loaded in ThemeMountain\TM_PageOptions
 */
namespace ThemeMountain {
	/**
	 * Note on show_on_cb:
	 * The custom filter tries not to show the page option when the page posttype belongs to a custom page template.
	 */
	// $thememountain_pageoption_str contains a translation string for the tab labels
	$thememountain_pageoption_str = TM_ThemeStrings::$text_strings['page_options'];
	TM_PageOptions::add_page_options_for_post_type('page', array(
		'meta_box_config' => array(
			'id' => 'tm_settings_page',
			'title' => $thememountain_pageoption_str['page'][0],
			'object_types'  => array( 'page' ),
			'show_on_cb' => function () {
				// if this is a page_for_posts.
				global $post;
				if ( $post->ID == get_option( 'page_for_posts' ) && empty( $post->post_content ) ) {
					return FALSE;
				}

				// if this is a custom template
				if( get_page_template_slug() !== '' ) {
					return FALSE;
				} else {
					return TRUE;
				}
			},
			'context' => 'normal',
			'priority' => 'high',
			'show_names'    => true,
			),
		'meta_box_fields' => array(
			// $thememountain_pageoption_str contains a translation string for the tab labels
			$thememountain_pageoption_str['page'][1] => array('fields_preheader'),
			$thememountain_pageoption_str['page'][2] => array('fields_nav_menu'),
			$thememountain_pageoption_str['page'][3] => array('fields_footer'),
			$thememountain_pageoption_str['page'][4] => array('fields_page_head','fields_featured_media'),
			$thememountain_pageoption_str['page'][5] => array('fields_sidebar'),
			$thememountain_pageoption_str['page'][6] => array('fields_loop'),
			$thememountain_pageoption_str['page'][7] => array('fields_grids')
			)
	));
}

