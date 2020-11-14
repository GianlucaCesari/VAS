/**
 * Avalahche UI Views for the slide and slider
 */

(function ($) {
	"use strict";

	window.TmAvalancheView = vc.shortcode_view.extend({
		new_tab_adding:false,
		childShortcode: '',
		idprefix : '',
		slideTitle: '',
		events:{
			'click .add_tab':'addTab',
			'click > .vc_controls .vc_control-btn-delete':'deleteShortcode',
			'click > .vc_controls .vc_control-btn-edit':'editElement',
			'click > .vc_controls .vc_control-btn-clone':'clone'
		},
		initialize:function (params) {
			window.TmAvalancheView.__super__.initialize.call(this, params);
			_.bindAll(this, 'stopSorting');
			var _shortcodeName = params.model.get('shortcode');
			switch (_shortcodeName) {
				case 'tm_fullscreen_presentation_holder':
					this.childShortcode = 'tm_fullscreen_presentation_item';
					this.idprefix = 'fullscreen-section-id';
					this.slideTitle = 'Section';
					break;
				case 'tm_slider_holder':
					this.childShortcode = 'tm_slider_item';
					this.idprefix = 'slide';
					this.slideTitle = 'Slide';
					break;
				// case 'tm_team_holder':
				// 	this.childShortcode = 'tm_team_item';
				// 	this.idprefix = 'team';
				// 	this.slideTitle = 'Profile';
				// 	break;
			}
		},
		render:function () {
			window.TmAvalancheView.__super__.render.call(this);
			this.$tabs = this.$el.find('.wpb_tabs_holder');
			this.createAddTabButton();
			return this;
		},
		ready:function (e) {
			window.TmAvalancheView.__super__.ready.call(this, e);
			// hide add control button of VC
			var params = this.model.get('params');
			if (params.slider_type && params.slider_type !== 'content') {
				this.$el.parent().parent().next().hide();
			}
		},
		createAddTabButton:function () {
			var new_tab_button_id = (+new Date() + '-' + Math.floor(Math.random() * 11));
			this.$tabs.append('<div id="new-tab-' + new_tab_button_id + '" class="new_element_button"></div>');
			// window.i18nLocale.add_tab
			this.$add_button = $('<li class="add_tab_block"><a href="#new-tab-' + new_tab_button_id + '" class="add_tab" title="Add Slide"></a></li>').appendTo(this.$tabs.find(".tabs_controls"));
		},
		addTab:function (e) {
			e.preventDefault();
			this.new_tab_adding = true;
			var slide_title = this.slideTitle, // window.i18nLocale.tab,
				tabs_count = this.$tabs.find('[data-element_type='+this.childShortcode+']').length,
				slide_id = this.idprefix + '-' + (+new Date() + '-' + tabs_count + '-' + Math.floor(Math.random() * 11));
			vc.shortcodes.create({shortcode:this.childShortcode, params:{title:slide_title, slide_id:slide_id}, parent_id:this.model.id});
			return false;
		},
		stopSorting:function (event, ui) {
			var shortcode;
			this.$tabs.find('ul.tabs_controls li:not(.add_tab_block)').each(function (index) {
				var href = $(this).find('a').attr('href').replace("#", "");
				// $('#' + href).appendTo(this.$tabs);
				shortcode = vc.shortcodes.get($('[id=' + $(this).attr('aria-controls') + ']').data('model-id'));
				vc.storage.lock();
				shortcode.save({'order':$(this).index()}); // Optimize
			});
			shortcode.save();
		},
		changedContent:function (view) {
			var params = view.model.get('params');
			if (!this.$tabs.hasClass('ui-tabs')) {
				this.$tabs.tabs({
					select:function (event, ui) {
						return !$(ui.tab).hasClass('add_tab');
					}
				});
				this.$tabs.find(".ui-tabs-nav").prependTo(this.$tabs);
				this.$tabs.find(".ui-tabs-nav").sortable({
					axis:(this.$tabs.closest('[data-element_type]').data('element_type') == 'vc_tour' ? 'y' : 'x'),
					update:this.stopSorting,
					items:"> li:not(.add_tab_block)"
				});
			}
			if (view.model.get('cloned') === true) {
				var cloned_from = view.model.get('cloned_from'),
					$tab_controls = $('.tabs_controls > .add_tab_block', this.$content),
					$new_tab = $("<li><a href='#slide-" + params.slide_id + "'>" + params.title + "</a></li>").insertBefore($tab_controls);
				this.$tabs.tabs('refresh');
				this.$tabs.tabs("option", 'active', $new_tab.index());
			} else {
				$("<li><a href='#slide-" + params.slide_id + "'>" + params.title + "</a></li>")
					.insertBefore(this.$add_button);
				this.$tabs.tabs('refresh');
				this.$tabs.tabs("option", "active", this.new_tab_adding ? $('.ui-tabs-nav li', this.$content).length - 2 : 0);
			}
			this.new_tab_adding = false;
		},
		cloneModel:function (model, parent_id, save_order) {
			if(typeof Shortcodes == 'undefined') var _Shortcodes = vc.shortcodes;
			var shortcodes_to_resort = [],
				new_order = _.isBoolean(save_order) && save_order === true ? model.get('order') : parseFloat(model.get('order')) + vc.clone_index,
				model_clone,
				new_params = _.extend({}, model.get('params'));
			var _shortcodeName = model.get('shortcode');
			if (_shortcodeName === this.childShortcode) {
				_.extend(new_params, {slide_id:+new Date() + '-' + this.$tabs.find('[data-element-type='+this.childShortcode+']').length + '-' + Math.floor(Math.random() * 11)});
			} else {
				_.extend(new_params, {slider_id:+new Date() + '-' + this.$tabs.find('[data-element-type='+_shortcodeName+']').length + '-' + Math.floor(Math.random() * 11)});
			}
			model_clone = _Shortcodes.create({shortcode:_shortcodeName, id:vc_guid(), parent_id:parent_id, order:new_order, cloned:(_shortcodeName !== this.childShortcode), cloned_from:model.toJSON(), params:new_params});
			_.each(_Shortcodes.where({parent_id:model.id}), function (shortcode) {
				this.cloneModel(shortcode, model_clone.get('id'), true);
			}, this);
			return model_clone;
		}
	});
	//
	window.TmAvalancheSlideView = window.VcColumnView.extend({
		events:{
		  'click > .vc_controls .vc_control-btn-delete':'deleteShortcode',
		  'click > .vc_controls .vc_control-btn-prepend':'addElement',
		  'click > .vc_controls .vc_control-btn-edit':'editElement',
		  'click > .vc_controls .vc_control-btn-clone':'clone',
		  'click > .wpb_element_wrapper > .vc_empty-container':'addToEmpty'
		},
		initialize: function(params) {
			window.TmAvalancheSlideView.__super__.initialize.call(this, params);
		},
		render:function () {
			var params = this.model.get('params');
			window.TmAvalancheSlideView.__super__.render.call(this);
			if(!params.slide_id) {
			  params.slide_id = (+new Date() + '-' + Math.floor(Math.random() * 11));
			  this.model.save('params', params);
			}
			this.id = 'slide-' + params.slide_id;
			this.$el.attr('id', this.id);
			$(this).next().css('background','red');
			return this;
		},
		ready:function (e) {
			window.TmAvalancheSlideView.__super__.ready.call(this, e);
			this.$tabs = this.$el.closest('.wpb_tabs_holder');
			var params = this.model.get('params');
			this.changeSlideHolderBackground(params);
			return this;
		},
		changeShortcodeParams:function (model) {
			var params = model.get('params');

			window.TmAvalancheSlideView.__super__.changeShortcodeParams.call(this, model);
			if (_.isObject(params) && _.isString(params.title) && _.isString(params.slide_id)) {
				$('.ui-tabs-nav [href="#slide-' + params.slide_id + '"]').text(params.title);
			}
			this.changeSlideHolderBackground(params);
		},
		deleteShortcode:function (e) {
			_.isObject(e) && e.preventDefault();
			var answer = confirm(window.i18nLocale.press_ok_to_delete_section),
				parent_id = this.model.get('parent_id');
			if (answer !== true) return false;
			this.model.destroy();
			if(!vc.shortcodes.where({parent_id: parent_id}).length) {
			  vc.shortcodes.get(parent_id).destroy();
			  return false;
			}
			var params = this.model.get('params'),
				current_tab_index = $('[href="#slide-' + params.slide_id + '"]', this.$tabs).parent().index();
			$('[href="#slide-' + params.slide_id + '"]').parent().remove();
			var tab_length = this.$tabs.find('.ui-tabs-nav li:not(.add_tab_block)').length;
			if(tab_length > 0) {
				this.$tabs.tabs('refresh');
			}
			if (current_tab_index < tab_length) {
				this.$tabs.tabs("option", "active", current_tab_index);
			} else if (tab_length > 0) {
				this.$tabs.tabs("option", "active", tab_length - 1);
			}

		},
		cloneModel:function (model, parent_id, save_order) {
			if(typeof Shortcodes == 'undefined') var _Shortcodes = vc.shortcodes;
			var shortcodes_to_resort = [],
				new_order = _.isBoolean(save_order) && save_order === true ? model.get('order') : parseFloat(model.get('order')) + vc.clone_index,
				new_params = _.extend({}, model.get('params'));
			var _shortcodeName = model.get('shortcode');
			// if (_shortcodeName === 'tm_slider_item' || _shortcodeName === 'tm_fullscreen_presentation_item') {
			//     _.extend(new_params, {slide_id:+new Date() + '-' + this.$tabs.find('[data-element_type='+_shortcodeName+']').length + '-' + Math.floor(Math.random() * 11)});
			// }
			_.extend(new_params, {slide_id:+new Date() + '-' + this.$tabs.find('[data-element_type='+_shortcodeName+']').length + '-' + Math.floor(Math.random() * 11)});

			var model_clone = _Shortcodes.create({shortcode:_shortcodeName, parent_id:parent_id, order:new_order, cloned:true, cloned_from:model.toJSON(), params:new_params});
			_.each(_Shortcodes.where({parent_id:model.id}), function (shortcode) {
				this.cloneModel(shortcode, model_clone.id, true);
			}, this);
			return model_clone;
		},
		// custom utils
		changeSlideHolderBackground: function (_params) {
			if(typeof _params.background_color != 'undefined') {
				var _content_holder_elm = this.$el;
				_content_holder_elm.css('background-color',_params.background_color);
			}
			// update background image of .wpb_tm_slider_item.wpb_content_holder
			if(typeof _params.image_id != 'undefined') {
				var _content_holder_elm = this.$el;
				this.fillBackgroundWithImage(_params.image_id,_content_holder_elm);
			}
		},
		fillBackgroundWithImage: function (_image_post_id,_target_elm,_size) {
			if(!_image_post_id || _image_post_id === 0) return;
			jQuery.ajax({
				url: ajaxurl,
				type: 'POST',
				data: {
					'action': 'TM_Ajax',
					'_tm_ajax_nonce': jQuery('input#_tm_ajax_nonce').val(),
					'ajax_command': 'returnImageUrlByID',
					'image_post_id': _image_post_id,
				}
			}).done(function(_response){
				if(_response.response) {
					_target_elm.css('background-image','url('+_response.json+')');
				} else {
					// alert('error');
				}
			}).fail(function(_response) {
				console.log(_response);
			});
		}
	});
})(window.jQuery);