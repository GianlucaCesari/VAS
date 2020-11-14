(function ($) {
	"use strict";

	// #tm_reset_theme_mod
	$(document).on ('click', 'button#reset_settings', function () {
		if(window.confirm('Are you sure to reset all the ThemeMountain theme mod options to default?')){
			var nonce = reset_all_settings_nonce;
			var $message_elm = $(this).find('option[value="hide"]');
			$message_elm.text('Pelase wait while processing your request.');
			$.ajax({
				'url': ajaxurl,
				'type': 'post',
				'data': {
					'action': 'TM_Ajax',
					'_tm_ajax_nonce': nonce,
					'ajax_command': 'resetAllSettings',
				}
			})
			.done(function( _response ) {
				if(_response.response) {
					$message_elm.text('Theme Mod has been resetted. Refreshing the page now.');
					// window.location = _response.message;
				} else {
					$message_elm.text('There was an error in handling your request at the server. Please try again later.');
				}
			})
			.fail(function( _response ) {
				$message_elm.text('There was an error in handling your request. Please try again later.');
			});
		} else {
			// nothing to do
		}
		return false;
	});
})(window.jQuery);