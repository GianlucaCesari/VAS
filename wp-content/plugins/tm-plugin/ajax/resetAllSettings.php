<?php
namespace ThemeMountain;

if ( is_user_logged_in() !== TRUE ) {
	$ajaxResponseArray = TM_Ajax::constructAjaxResponseArray(FALSE,'');
} else {
	if(class_exists('ThemeMountain\TM_Customizer')) {
		TM_Customizer::tm_reset_theme_mod();
	}
	$option_tabs = TM_Admin::option_fields();
	foreach ($option_tabs as $index => $option_tab) {
		array_push(TM_Admin::$option_metabox_haystack, $option_tab['id']);
	}
	foreach ( TM_Admin::$option_metabox_haystack as $_value ){
		delete_option( $_value );
	}
	$ajaxResponseArray = TM_Ajax::constructAjaxResponseArray(TRUE,admin_url());
}