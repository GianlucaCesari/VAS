<?php
/**
 *  This file is a template config file and is loaded in ThemeMountain\TM_PageOptions
 */
namespace ThemeMountain {
	// $thememountain_pageoption_str contains a translation string for the tab labels
	$thememountain_pageoption_str = TM_ThemeStrings::$text_strings['page_options'];
	TM_PageOptions::add_page_options_for_post_type('product', array(
		'meta_box_config' => array(
			'id'            => 'tm_settings_product',
			'title'         => $thememountain_pageoption_str['product'][0],
			'object_types'  => array( 'product' ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			),
		'meta_box_fields' => array(
			// $thememountain_pageoption_str contains a translation string for the tab labels
			$thememountain_pageoption_str['product'][1] => array('fields_preheader'),
			$thememountain_pageoption_str['product'][2] => array('fields_nav_menu'),
			$thememountain_pageoption_str['product'][3] => array('fields_footer'),
			$thememountain_pageoption_str['product'][4] => array('fields_page_head','fields_featured_media'),
			$thememountain_pageoption_str['product'][5] => array('fields_sidebar'),
			$thememountain_pageoption_str['product'][6] => array('fields_grids'),
			)
	));
}
