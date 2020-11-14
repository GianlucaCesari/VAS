(function ($) {
	"use strict";

	/**
	* Visual Composer Mod. Layout Template Modal
	*/

	/**
	 * VC customization
	 */
		/** remove unwanted element tab */
		$('.vc_edit-form-tab-control[data-vc-ui-element="panel-add-element-tab"]').each(function(){
			// we only want All and ThemeMountain
			// target element
			var $_target = $(this);
			var _label = $_target.text().trim();
			if(_label != 'All' && _label != 'ThemeMountain') {
				$_target.remove();
			}
		});
		/** Remove the Download Template tab */
		$('button[data-vc-ui-element-target]').each( function ( i, e ) {
			var $_target = $(e);
			var _data_vc_ui_element_target = $_target.attr('data-vc-ui-element-target');
			if(_data_vc_ui_element_target == "[data-tab=shared_templates]") {
				$_target.hide();
			}
		});

	/**
	 * Masthead manipulation
	 */
		var $panel = $('.vc_templates-panel[data-vc-ui-element="panel-templates"]');
		var $panel_tab = $panel.find('.vc_edit-form-tab.vc_row.vc_ui-flex-row[data-tab="default_templates"] .vc_col-md-12');

		/** Heading text */
		$panel_tab.find('h3').html('<span class="tm-logo">ThemeMountain Template Library</span>');

		/** Template conditional */
		if(pagenow && pagenow === 'tm_footer') {
			/** Add vc_footer_layout_templates */
			addCategoryFilterMenu('vc_footer_layout_templates');
		} else if(pagenow && pagenow === 'tm_modal') {
			/** Add vc_modal_layout_templates */
			addCategoryFilterMenu('vc_modal_layout_templates');
		} else {
			/** Add vc_layout_templates */
			addCategoryFilterMenu('vc_layout_templates');
		}
		/** support function for above, preparation of filter menu */
		function addCategoryFilterMenu(targetTempalteGroup) {
			// group label
			var _targetTempalteGroupLabel = _capitalizeWords(targetTempalteGroup.replace('vc_','').replace('_template',''));
			/** Add Layout Types Menu */
			$panel_tab.append('<div class="vc_col-md-12" id="typeSelectionMenuWrap"><button class="tmp-filterMenu active" data-category="'+targetTempalteGroup+'">'+_targetTempalteGroupLabel+'</button><button class="tmp-filterMenu" data-category="vc_layout_sections_templates">Sections</button></div>');
			/** ADD filter menu for the target Tempalte Group */
			$panel_tab.append('<div class="vc_col-md-12 filterMenuWrap" id="filterMenuWrap-'+targetTempalteGroup+'"><button class="tmp-filterMenu active" data-category="all">All</button> '+_constructMastheadMenu(targetTempalteGroup)+'</div>');
			// append sections group
			$panel_tab.append('<div class="vc_col-md-12 filterMenuWrap" id="filterMenuWrap-vc_layout_sections_templates"><button class="tmp-filterMenu active" data-category="all">All</button> '+_constructMastheadMenu('vc_layout_sections_templates')+'</div>');
			// remove unused thumbnails
			removeUnusedTemplates(targetTempalteGroup);
		}
		function findAllCategoriesInGroup(targetTempalteGroup) {
			var _categories = {};
			$('.'+targetTempalteGroup).each(function(i,e){
				var _currentElementClasses = $(this).attr('class');
				// find tm-tmp-category_
				var _className = _currentElementClasses.match(/(tm\-tmp\-category_)([^\s]*)/g);
				if(_className instanceof Array){
					for(var _key in _className) {
						 if(_categories[_className[_key]] === undefined) {
							var _categorySlug = _className[_key].replace('tm-tmp-category_','');
							_categories[_categorySlug] = _capitalizeWords(_categorySlug);
						 }
					}

				}
			});
			return _categories;
		}
		function _capitalizeWords(textString){
			return textString.replace(/(-|^)([^-]?)/g, function(_, prep, letter) {
				return (prep && ' ') + letter.toUpperCase();
			});
		}
		function removeUnusedTemplates(targetTempalteGroup) {
			if(targetTempalteGroup !== 'vc_layout_templates') $panel.find('.vc_layout_templates').remove();
			if(targetTempalteGroup !== 'vc_footer_layout_templates') $panel.find('.vc_footer_layout_templates').remove();
			if(targetTempalteGroup !== 'vc_modal_layout_templates') $panel.find('.vc_modal_layout_templates').remove();
			// section temapltes are always available for all the post types
		}

		/** Type Menu Click Event */
		/** Filter Menu Click Event */
		$('.vc_edit-form-tab.vc_row.vc_ui-flex-row[data-tab="default_templates"] .tmp-filterMenu, #typeSelectionMenuWrap .tmp-filterMenu').click(function ( e ) {
			/** .tmp-filterMenu */
			var $_currentMenuItem = $(e.currentTarget);
			var $_menuWrapper = $_currentMenuItem.parent();
			var _menuWrapperID = $_menuWrapper.attr('id');
			/** remove active class from all the filter menu items once. */
			$_menuWrapper.find('.tmp-filterMenu').removeClass('active');
			/** Add the the current target */
			$_currentMenuItem.addClass('active');
			/** typeSelectionMenuWrap */
			if(_menuWrapperID === 'typeSelectionMenuWrap') {
				changeCategoryType();
			}
			/** Reflect */
			changeCategory($_currentMenuItem);
		});
		/** Category change function */
		function changeCategory($targetMenuItem) {
			/** This is where the thumbnails are found. */
			var $_thumbnails = $('.vc_ui-template.vc_templates-template-type-default_templates');
			$_thumbnails.addClass('hide');
			/** hide all once */
			/** Read type */
			var _category_type = _findCurrentCategoryType();
			/** current active filter menu item */
			/** Read category slug from the menu item */
			var _category_name = $('#filterMenuWrap-'+_category_type).find('.tmp-filterMenu.active').attr('data-category');
			if(!_category_name || _category_name === 'all') {
				/** Show all */
				$('.'+_category_type).stop().removeClass('hide').fadeIn();
			} else {
				/** Show all the items belonging to the specified category */
				$('.vc_ui-template-list.vc_templates-list-default_templates.vc_ui-list-bar .tm-tmp-category_'+_category_name).removeClass('hide').fadeIn();
			}
			_addGridSizer();
			applyMasonry();
		}
		/** Category type function */
		function changeCategoryType() {
			var _category_type = _findCurrentCategoryType();
			$('.filterMenuWrap').hide();
			$('#filterMenuWrap-'+_category_type).fadeIn();
			return _category_type;
		}
		/** Utility helper function for constructing filter menu */
		function _constructMastheadMenu(targetTempalteGroup){
			var _menuArray = findAllCategoriesInGroup(targetTempalteGroup);
			var _menuHTML = '';
			for(var _key in _menuArray){
				_menuHTML += ' <button class="tmp-filterMenu" data-mode="'+targetTempalteGroup+'" data-category="'+_key+'">'+_menuArray[_key]+'</button>';
			}
			return _menuHTML;
		}
		/* find current template type */
		function _findCurrentCategoryType(){
			var $_categoryTypeMenu = $('#typeSelectionMenuWrap');
			var $_currentActive = $_categoryTypeMenu.find('.active');
			if($_currentActive.length) {
				return $_currentActive.attr('data-category');
			} else {
				return 'vc_layout_templates';
			}
		}

	/**
	 * Thumbnail Manipulation
	 */
		var $vc_ui_template_content = $('.vc_edit-form-tab[data-tab="default_templates"] .vc_ui-template-content');
		/** Scan each thumbnail accordion to modify the appearance */
		$vc_ui_template_content.each(function(i,e){
			var $_content = $(e);
			var $_parent = $_content.parent();
			var $_list_bar = $_parent.find('.vc_ui-list-bar-item');
			// remove preview button
			$_parent.find('[data-vc-preview-handler]').remove();
			/** is theme layout template ? */
			var _is_layout_section_template = $_parent.hasClass('vc_layout_sections_templates');
			var _is_layout_footer_template = $_parent.hasClass('vc_footer_layout_templates');
			var _is_layout_modal_template = $_parent.hasClass('vc_modal_layout_templates');
			/** Get class name */
			var _class = $_parent.attr('class');
			/** Get thumbnail file name. tm-tmp_ class name followed by the thumb name. */
			var _result = _class.match(/(tm\-tmp_)([^\s]*)/g);
			var _target_image_dir = '';
			if(_is_layout_section_template == true) {
				_target_image_dir = layout_sections_dir + 'thumbnails/';
			} else if(_is_layout_footer_template == true) {
				_target_image_dir = theme_footer_layout_templates_dir + 'thumbnails/';
			} else if(_is_layout_modal_template == true) {
				_target_image_dir = theme_modal_layout_templates_dir + 'thumbnails/';
			} else {
				_target_image_dir = theme_layout_templates_dir + 'thumbnails/';
			}
			/** Append the thumbnail JPG image */
			if(_result && _result[0]) {
				$_content.append('<img src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" class="lazyload" data-src="'+_target_image_dir+_result[0].replace('tm-tmp_','')+'.jpg">').show();
			}
			/** Move list bar into the content */
			$_list_bar.detach().appendTo($_content);
			/** Wrap the content with div */
			$_content.wrapInner('<div></div>');
		});

	/**
	* Lazy Loading
	* .vc_templates-panel .vc_ui-panel-content
	*/
	// run
	var $lazyInstance = $('.vc_templates-panel .vc_ui-panel-content .lazyload').lazyload();

	/**
	 *  Ticker News
	 */
		/** We need 28px padding-bottom to the thumbnail container */
		$('.vc_ui-template-list.vc_templates-list-default_templates.vc_ui-list-bar').parent().css('padding-bottom','28px');
		/** Make new ticker Container Object */
		var $tickerNews_wrapper = $('<div id="tm-news"></div>');
		/** add to the modal body */
		$panel.find('.vc_ui-panel-window-inner').append($tickerNews_wrapper);
		/** Cache the tm-news element */
		var $tickerNews_content = $('#tm-news');
		/** init the message of tm-news */
		$tickerNews_content.html('<ul class="marquee"><li class="centered">Please wait while loading...</li></ul>');
		/** Instantiate the news ticker jQuery plugin. */
		$('#tm-news ul.marquee').marquee({yScroll: "bottom"});
		/** Pause once for now */
		pauseTicker();
		/** AJAX REQUEST to retrieve the latest news from the tm update server */
		$.ajax({
			'url': ajaxurl,
			'type': 'POST',
			'data': {
				'action': 'TM_Ajax',
				'_tm_ajax_nonce': tm_news_nonce,
				'ajax_command': 'getTMnewsTickers',
				'current_stylesheet': current_stylesheet,
			}
		}).done(function( _response ) {
			if(_response.message) {
				updateNewsTicker(_response.message);
			} else {
				updateNewsTicker([{"class":"centered","message":"<a target='_blank' href='https://thememountain.com/'>ThemeMountain.com</a>"}]);
			}
		}).fail(function( _response ) {
			updateNewsTicker([{"class":"centered","message":"<a target='_blank' href='https://thememountain.com/'>ThemeMountain.com</a>"}]);
		});
		/** ticker controls functions */
		function updateNewsTicker( messageArray ) {
			var $_message_contents = $('<ul class="marquee"></ul>');
			for ( var _key in messageArray ) {
				/** Add each message line to the contents */
				var $_message_line = $('<li></li>').html(messageArray[_key].message);
				if(messageArray[_key].class) {
					$_message_line.attr('class',messageArray[_key].class);
				}
				$_message_contents.append($_message_line);
			}
			/** add content of ticker news */
			$tickerNews_content.html($_message_contents);
			/** update the news ticker message */
			$('#tm-news ul.marquee').marquee('update');
			/** pause once if the modal is hidden */
			if($('.vc_templates-panel[data-vc-ui-element="panel-templates"]').hasClass('vc_active') != true) {
				pauseTicker();
			}
		}
		function newsTicker(){
			$('#tm-news ul.marquee').marquee("resume");
		}

		function pauseTicker(){
			$('#tm-news ul.marquee').marquee("pause");
		}

	/**
	 * Prepend overlay
	 */
		$panel.find('.vc_ui-panel-window-inner').prepend($('<div class="modal-overlay hide"><div class="modal-message"><span>Adding Template to Editor</span></div></div>'));

	/**
	 * loadTemplate event (VC) ()
	 */
		$('.vc_ui-template-list button[data-template-handler]').click( function (){
			/** modal, remove hide to show the background. */
			$panel.find('.vc_ui-panel-window-inner .modal-overlay').removeClass('hide');
		});

	/**
	 * More customizations
	 */
		/**
		 * - Detect modal show event.
		 * - Make sure that the current active filter menu item matches with the contents of thumbnails.
		 * - Resume news ticker.
		 * - Textarea Background Color updates
		 */
		vc.events.on("app.render", function() {
			/** Make sure that the view is defined. */
			/**
			 * Detect modal "show" event.
			 */
			vc.templates_panel_view.on("show", function(){
				/** modal, set to the default state. hidden on startup */
				$panel.find('.vc_ui-panel-window-inner .modal-overlay').addClass('hide');
				/** Reflect to the view */
				var _category_type = changeCategoryType();
				/** Find the current active filter menu item */
				var $_targetMenuItem = $('#filterMenuWrap-'+_category_type).find('.tmp-filterMenu.active');
				changeCategory($_targetMenuItem);
				newsTicker();

			});

			/**
			 * Detect modal hide event
			 * Pause ticker.
			 */
			vc.PanelView.prototype.hide = function(e) {
				var _id = this.el.id;
				/** Is the hide request for the modal? */
				if(_id === 'vc_ui-panel-templates') {
					/** Pause the news ticker */
					pauseTicker();
				}
				e && e.preventDefault(), this.model && (this.model = null), vc.active_panel = !1, this.$el.removeClass("vc_active")
			}

			/**
			 * Override vc for Textarea Background Color updates
			 */
			vc.shortcode_view.prototype.render = function() {
				var $shortcode_template_el = $("#vc_shortcode-template-" + this.model.get("shortcode"));
				$shortcode_template_el.is("script") && this.html2element($shortcode_template_el.html());
				this.model.view = this;
				this.$controls_buttons = this.$el.find(".vc_controls > :first");
				vc.shortcodes.trigger("shortcodeView.render",this);
				return this;
			}

			/**
			 * Triggered when shortcodes are added and rendered in the tinymce editor
			 */
			vc.shortcodes.on("shortcodeView.render", function(e) {
				if(e.model.attributes.params) {
					// ship the collection for process
					_changeTextareaColorInVCBackendEditorIfNecessary(e.model);
				}
			})

			/**
			 * Triggered when shortcode settings are changed i.e. settings changed and saved in modal.
			 */
			vc.shortcodes.on("sync", function(collection) {
				// when modal is active vc.active_panel has a collection of the one being edited.
				if(!vc.active_panel) return;
				// ship the collection for process
				_changeTextareaColorInVCBackendEditorIfNecessary(vc.active_panel.model);
			})

			function _changeTextareaColorInVCBackendEditorIfNecessary(model){
				if(!model || !('attributes' in model)) return;
				var params = model.attributes.params;
				if(
					'textarea_html_bkg_color' in params &&
					'content' in params
				){
					var _colorHexCode = params.textarea_html_bkg_color;
					var $_targetElement = model.view.$el.find('div.wpb_element_wrapper');
					$_targetElement.css('background-color',_colorHexCode);
				}
			}

			/**
			 * Search function override
			 */
			$(document).on('keyup','#vc_templates_name_filter',function(e){
				setTimeout(
					function(){ vc_templates-list-my_templates
						$( '.vc_ui-template-list.vc_templates-list-default_templates .vc_ui-template' ).removeClass('grid-sizer');
						$( '.vc_ui-template-list.vc_templates-list-default_templates .vc_ui-template' ).each(function(i,e){
							var $_targetElement = $(e);
							var _cssDisplay = $(e).css('display');
							if(_cssDisplay === 'block') {
								$_targetElement.addClass('grid-sizer');
								$( '.vc_ui-template-list.vc_templates-list-default_templates' ).isotope( 'layout' );
								// end the each loop
								return false;
							}
						});

					},200
				);
			});
		});

	// grid-sizer for masonry
	function _addGridSizer(){
		// remove .grid-sizer class from any underneath $vc_ui_template_content once
		$('.vc_ui-template').removeClass('grid-sizer');
		// add .grid-sizer to the first thumbnail within $vc_ui_template_content
		// for the isotope plugin
		$vc_ui_template_content.each(function(i,e){
			var $_content = $(e);
			var $_parent = $_content.parent();
			if(!$_parent.hasClass('hide')) {
				// add the class
				$_parent.addClass('grid-sizer');
				// break out of jQuery each() method loop
				return false;
			}
		});
	}

})(window.jQuery);

/**
 * This function needs to be in the global scope because a modified version of lazyload.min.js requires it.
 */

function applyMasonry(){
	imagesLoaded( '.vc_ui-template-list.vc_templates-list-default_templates', function() {
		jQuery( '.vc_ui-template-list.vc_templates-list-default_templates' ).isotope({
			filter: '*',
			itemSelector: '.vc_ui-template',
			isResizeBound: false,
			transitionDuration: 700,
			layoutMode: 'masonry',
			stamp: '.masonry-stamp',
			masonry: {
				// Specify grid item reference
				// Class added to the item selector.
				columnWidth: '.grid-sizer'
			}
		});
	});
}