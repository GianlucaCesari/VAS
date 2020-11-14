(function ( $ ) {
	"use strict";

	/**
	 * VC Elements Modal Customization
	 */
	$(document).on('DOMNodeInserted', 'iframe#wpb_tinymce_content_ifr', function(e) {
		// wait for vc modal to be loaded
		$('iframe#wpb_tinymce_content_ifr').on('load' , function(){
			/**
			 * Takes care of tinymce rich text editor background color changes
			 * VC element needs to have both textarea_html and colorpicker with
			 * param name of "textarea_html_bkg_color" for the following code to work.
			 */
			var $_textarea_html_bkg_color = $('input[name="textarea_html_bkg_color"]');

			// init
			if(typeof $_textarea_html_bkg_color[0] !== 'undefined') {
				var _color = $_textarea_html_bkg_color.val();
				$('.mce-container-body iframe').contents().find('body').css('background',_color);
			}
			// on change
			$_textarea_html_bkg_color.on('change' , function(){
				var _color = $_textarea_html_bkg_color.val();
				$('.mce-container-body iframe').contents().find('body').css('background',_color);
			});
		});
	});
})( window.jQuery );
