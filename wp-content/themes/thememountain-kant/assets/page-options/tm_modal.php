<?php
/**
 *  This file is a template config file and is loaded in ThemeMountain\TM_PageOptions
 */
namespace ThemeMountain {
	// $thememountain_pageoption_str contains a translation string for the tab labels
	$thememountain_pageoption_str = TM_ThemeStrings::$text_strings['page_options'];
	TM_PageOptions::add_page_options_for_post_type('tm_modal', array(
		'meta_box_config' => array(
			'id'            => 'tm_settings_tm_modal',
			'title'         => $thememountain_pageoption_str['tm_modal'][0],
			'object_types'  => array( 'tm_modal' ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			),
		'meta_box_fields' => array(
			// $thememountain_pageoption_str contains a translation string for the tab labels
			$thememountain_pageoption_str['tm_modal'][1] => array('fields_modal'),
			)
	));
}
