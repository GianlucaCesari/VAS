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
	TM_PageOptions::add_page_options_for_post_type('tm_error_page', array(
		'meta_box_config' => array(
			'id' => 'tm_settings_error_page',
			'title' => $thememountain_pageoption_str['tm_error_page'][0],
			'object_types'  => array( 'tm_error_page' ),
			'context' => 'normal',
			'priority' => 'high',
			'show_names'    => true,
			),
		'meta_box_fields' => array(
			// $thememountain_pageoption_str contains a translation string for the tab labels
			$thememountain_pageoption_str['tm_error_page'][1] => array('fields_preheader'),
			$thememountain_pageoption_str['tm_error_page'][2] => array('fields_nav_menu'),
			$thememountain_pageoption_str['tm_error_page'][3] => array('fields_footer'),
			$thememountain_pageoption_str['tm_error_page'][5] => array('fields_sidebar'),
			$thememountain_pageoption_str['tm_error_page'][6] => array('fields_loop'),
			$thememountain_pageoption_str['tm_error_page'][7] => array('fields_grids')
			)
	));
}

