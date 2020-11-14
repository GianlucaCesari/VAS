<?php
/**
 *  This file is a template config file and is loaded in ThemeMountain\TM_PageOptions
 */
namespace ThemeMountain {
	// $thememountain_pageoption_str contains a translation string for the tab labels
	$thememountain_pageoption_str = TM_ThemeStrings::$text_strings['page_options'];
	TM_PageOptions::add_page_options_for_post_type('tm_folio', array(
		'meta_box_config' => array(
			'id'            => 'tm_settings_tm_folio',
			'title'         => $thememountain_pageoption_str['tm_folio'][0],
			'object_types'  => array( 'tm_folio' ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			),
		'meta_box_fields' => array(
			// $thememountain_pageoption_str contains a translation string for the tab labels
			$thememountain_pageoption_str['tm_folio'][1] => array('fields_preheader'),
			$thememountain_pageoption_str['tm_folio'][2] => array('fields_nav_menu'),
			$thememountain_pageoption_str['tm_folio'][3] => array('fields_footer'),
			$thememountain_pageoption_str['tm_folio'][4] => array('fields_page_head','fields_featured_media'),
			$thememountain_pageoption_str['tm_folio'][5] => array('fields_loop'),
			$thememountain_pageoption_str['tm_folio'][6] => array('fields_grids'),
			$thememountain_pageoption_str['tm_folio'][7] => array('fields_pagination'),
			)
	));
}
