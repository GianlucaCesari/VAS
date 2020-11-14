/**
 * Custom view for Visual Composer
 */

(function ( $ ) {
	"use strict";

	var Shortcodes = vc.shortcodes;

	/**
	* Override add text block since we are now using tm_textblock in place of vc_column_text
	*/
	vc.visualComposerView.prototype.addTextBlock = function(e) {
		var row, column, params, row_params, column_params;
		return e.preventDefault(), row_params = {}, "undefined" != typeof window.vc_settings_presets.vc_row && (row_params = _.extend(row_params, window.vc_settings_presets.vc_row)), row = vc.shortcodes.create({
			shortcode: "vc_row",
			params: row_params
		}), column_params = {
			width: "1/1"
		}, "undefined" != typeof window.vc_settings_presets.vc_column && (column_params = _.extend(column_params, window.vc_settings_presets.vc_column)), column = vc.shortcodes.create({
			shortcode: "vc_column",
			params: column_params,
			parent_id: row.id,
			root_id: row.id
		}), params = vc.getDefaults("tm_textblock"), "undefined" != typeof window.vc_settings_presets.tm_textblock && (params = _.extend(params, window.vc_settings_presets.tm_textblock)), vc.shortcodes.create({
			shortcode: "tm_textblock",
			parent_id: column.id,
			root_id: row.id,
			params: params
		})
	};

	 /**
	  * VC Custom Views
	  */
	window.TmAccordionView = vc.shortcode_view.extend( {
		adding_new_tab: false,
		events: {
			'click .add_tab': 'addTab',
			'click > .vc_controls .column_delete, > .vc_controls .vc_control-btn-delete': 'deleteShortcode',
			'click > .vc_controls .column_edit, > .vc_controls .vc_control-btn-edit': 'editElement',
			'click > .vc_controls .column_clone,> .vc_controls .vc_control-btn-clone': 'clone'
		},
		render: function () {
			window.TmAccordionView.__super__.render.call( this );
			// check user role to add controls
			if ( ! this.hasUserAccess() ) {
				return this;
			}
			this.$content.sortable( {
				axis: "y",
				handle: "h3",
				stop: function ( event, ui ) {
					// IE doesn't register the blur when sorting
					// so trigger focusout handlers to remove .ui-state-focus
					ui.item.prev().triggerHandler( "focusout" );
					$( this ).find( '> .wpb_sortable' ).each( function () {
						var shortcode = $( this ).data( 'model' );
						shortcode.save( { 'order': $( this ).index() } ); // Optimize
					} );
				}
			} );
			return this;
		},
		changeShortcodeParams: function ( model ) {
			var params, collapsible;

			window.TmAccordionView.__super__.changeShortcodeParams.call( this, model );
			params = model.get( 'params' );
			collapsible = _.isString( params.collapsible ) && params.collapsible === 'yes' ? true : false;
			if ( this.$content.hasClass( 'ui-accordion' ) ) {
				this.$content.accordion( "option", "collapsible", collapsible );
			}
		},
		changedContent: function ( view ) {
			if ( this.$content.hasClass( 'ui-accordion' ) ) {
				this.$content.accordion( 'destroy' );
			}
			var collapsible = _.isString( this.model.get( 'params' ).collapsible ) && this.model.get( 'params' ).collapsible === 'yes' ? true : false;
			this.$content.accordion( {
				header: "h3",
				navigation: false,
				autoHeight: true,
				heightStyle: "content",
				collapsible: collapsible,
				active: this.adding_new_tab === false && view.model.get( 'cloned' ) !== true ? 0 : view.$el.index()
			} );
			this.adding_new_tab = false;
		},
		addTab: function ( e ) {
			e.preventDefault();
			// check user role to add controls
			if ( ! this.hasUserAccess() ) {
				return false;
			}
			this.adding_new_tab = true;
			vc.shortcodes.create( {
				shortcode: 'tm_accordion_tab_item',
				params: { title: window.i18nLocale.section },
				parent_id: this.model.id
			} );
		},
		cloneModel: function ( model, parent_id, save_order ) {
			var new_order,
			model_clone,
			params,
			tag;

			new_order = _.isBoolean( save_order ) && save_order === true ? model.get( 'order' ) : parseFloat( model.get( 'order' ) ) + vc.clone_index;
			params = _.extend( {}, model.get( 'params' ) );
			tag = model.get( 'shortcode' );

			switch ( tag ) {
				case 'tm_accordion_holder':
					_.extend( params,{ accordion_id: + new Date() + Math.floor( Math.random() * 11 ) } );
					break;
				case 'tm_accordion_tab_item':
					_.extend( params,{ accordion_id: + new Date() + Math.floor( Math.random() * 11 ) } );
					break;
			}

			model_clone = Shortcodes.create( {
				shortcode: tag,
				id: vc_guid(),
				parent_id: parent_id,
				order: new_order,
				cloned: (tag !== 'tm_accordion_holder'), // todo review this by @say2me
				cloned_from: model.toJSON(),
				params: params
			} );

			_.each( Shortcodes.where( { parent_id: model.id } ), function ( shortcode ) {
				this.cloneModel( shortcode, model_clone.get( 'id' ), true );
			}, this );
			return model_clone;
		},
		_loadDefaults: function () {
			window.TmAccordionView.__super__._loadDefaults.call( this );
		}
	} );

	window.TmAccordionTabItemView = window.VcColumnView.extend( {
		events: {
			'click > [data-element_type] > .vc_controls .vc_column-delete': 'deleteShortcode',
			'click > [data-element_type] >  .vc_controls .vc_control-btn-prepend': 'addElement',
			'click > [data-element_type] >  .vc_controls .column_edit': 'editElement',
			'click > [data-element_type] > .vc_controls .vc_control-btn-clone': 'clone',
			'click > [data-element_type] > .wpb_element_wrapper > .tm_empty-container': 'addToEmpty'
		},
		setContent: function () {
			this.$content = this.$el.find( '> [data-element_type] > .wpb_element_wrapper > .vc_container_for_children' );
		},
		changeShortcodeParams: function ( model ) {
			var params;

			window.TmAccordionTabItemView.__super__.changeShortcodeParams.call( this, model );
			params = model.get( 'params' );
			if ( _.isObject( params ) && _.isString( params.title ) ) {
				this.$el.find( '> h3 .tab-label' ).text( params.title );
			}
			if ( _.isObject( params ) && _.isString( params.content ) ) {
				this.$el.find( '.wpb_element_wrapper' ).html( '<p>'+params.content+'</p>' );
			}
		},
		setEmpty: function () {
			$( '> [data-element_type]', this.$el ).addClass( 'vc_empty-column' );
			this.$content.addClass( 'tm_empty-container' );
		},
		unsetEmpty: function () {
			$( '> [data-element_type]', this.$el ).removeClass( 'vc_empty-column' );
			this.$content.removeClass( 'tm_empty-container' );
		}
	} );

	/**
	 * Used in tm_pricing_table_holder, tm_tab_item
	 */
	window.TmTabsView = vc.shortcode_view.extend( {
		new_tab_adding: false,
		/* registers */
		shortcodeName: '',
		childShortcode: '',
		idprefix : '',
		newItemName : '',
		/* BS */
		events: {
			'click .add_tab': 'addTab',
			'click > .vc_controls .vc_control-btn-delete': 'deleteShortcode',
			'click > .vc_controls .vc_control-btn-edit': 'editElement',
			'click > .vc_controls .vc_control-btn-clone': 'clone'
		},
		initialize: function ( params ) {
			window.TmTabsView.__super__.initialize.call( this, params );
			_.bindAll( this, 'stopSorting' );

			this.shortcodeName = this.model.get('shortcode');
			switch (this.shortcodeName) {
				case 'tm_pricing_table_holder':
					this.childShortcode = 'tm_pricing_table_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'New Table';
					break;
				case 'tm_team_holder':
					this.childShortcode = 'tm_team_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'New Team Member';
					break;
				case 'tm_hero_split_slider_holder':
					this.childShortcode = 'tm_hero_split_slider_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'Slide';
					break;
				case 'tm_hero_split_slider_content_holder':
					this.childShortcode = 'tm_hero_split_slider_content_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'Slide';
					break;
				case 'tm_full_width_hero_with_split_contents_holder':
					this.childShortcode = 'tm_full_width_hero_with_split_contents_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'Hero Column';
					break;
				case 'tm_split_hero_with_split_contents_holder':
					this.childShortcode = 'tm_split_hero_with_split_contents_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'Hero Column';
					break;
				case 'tm_clients_holder':
					this.childShortcode = 'tm_client_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'New Client';
					break;
				case 'tm_carousel_slider_holder':
					this.childShortcode = 'tm_carousel_slider_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'New Slide';
					break;
				case 'tm_logo_slider_holder':
					this.childShortcode = 'tm_logo_slider_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'New Logo';
					break;
				case 'tm_color_swatch_holder':
					this.childShortcode = 'tm_color_swatch_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'New Swatch';
					break;
				case 'tm_stats_holder':
					this.childShortcode = 'tm_stats_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'New Stats';
					break;
				case 'tm_testimonials_holder':
					this.childShortcode = 'tm_testimonials_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'New Testimonial';
					break;
				case 'tm_menu_holder':
					this.childShortcode = 'tm_menu_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'New Menu Item';
					break;
				case 'tm_timeline_holder':
					this.childShortcode = 'tm_timeline_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'New Timeline Item';
					break;
				default: // tm_tab_item
					this.childShortcode = 'tm_tab_item';
					this.idprefix = 'tab_id';
					this.newItemName = 'New Tab';
					break;
			}
		},
		render: function () {
			window.TmTabsView.__super__.render.call( this );
			this.$tabs = this.$el.find( '.wpb_tabs_holder' );
			this.createAddTabButton();
			return this;
		},
		ready: function ( e ) {
			window.TmTabsView.__super__.ready.call( this, e );
		},
		createAddTabButton: function () {
			var new_tab_button_id = (+ new Date() + '-' + Math.floor( Math.random() * 11 ));
			this.$tabs.append( '<div id="new-tab-' + new_tab_button_id + '" class="new_element_button"></div>' );
			this.$add_button = $( '<li class="add_tab_block"><a href="#new-tab-' + new_tab_button_id + '" class="add_tab" title="' + window.i18nLocale.add_tab + '"></a></li>' ).appendTo( this.$tabs.find( ".tabs_controls" ) );
		},
		addTab: function ( e ) {
			e.preventDefault();
			// check user role to add controls
			if ( ! this.hasUserAccess() ) {
				return false;
			}

			this.new_tab_adding = true;

			var tab_id = (+ new Date() + '-' + Math.floor( Math.random() * 11 ));
			var _param = { 'title': this.newItemName, 'tab_id': 'tab_id-'+tab_id };

			vc.shortcodes.create( {
				shortcode: this.childShortcode,
				params: _param,
				parent_id: this.model.id
			} );
			return false;
		},
		stopSorting: function ( event, ui ) {
			var shortcode;
			this.$tabs.find( 'ul.tabs_controls li:not(.add_tab_block)' ).each( function ( index ) {
				var href = $( this ).find( 'a' ).attr( 'href' ).replace( "#", "" );
				// $('#' + href).appendTo(this.$tabs);
				shortcode = vc.shortcodes.get( $( '[id=' + $( this ).attr( 'aria-controls' ) + ']' ).data( 'model-id' ) );
				vc.storage.lock();
				shortcode.save( { 'order': $( this ).index() } ); // Optimize
			} );
			shortcode && shortcode.save();
		},
		changedContent: function ( view ) {
			var params = view.model.get( 'params' );
			if ( ! this.$tabs.hasClass( 'ui-tabs' ) ) {
				this.$tabs.tabs( {
					select: function ( event, ui ) {
						return ! $( ui.tab ).hasClass( 'add_tab' );
					}
				} );
				this.$tabs.find( ".ui-tabs-nav" ).prependTo( this.$tabs );
				// check user role to add controls
				if ( this.hasUserAccess() ) {
					this.$tabs.find( ".ui-tabs-nav" ).sortable( {
						axis: (this.$tabs.closest( '[data-element_type]' ).data( 'element_type' ) == 'tm_vertical_tab_holder' ? 'y' : 'x'),
						update: this.stopSorting,
						items: "> li:not(.add_tab_block)"
					} );
				}
			}
			if ( view.model.get( 'cloned' ) === true ) {
				var cloned_from = view.model.get( 'cloned_from' ),
					$tab_controls = $( '.tabs_controls > .add_tab_block', this.$content ),
					$new_tab = $( "<li><a href='#tab-" + params.tab_id + "'>" + params.title + "</a></li>" ).insertBefore( $tab_controls );
				this.$tabs.tabs( 'refresh' );
				this.$tabs.tabs( "option", 'active', $new_tab.index() );
			} else {
				$( "<li><a href='#tab-" + params.tab_id + "'>" + params.title + "</a></li>" )
					.insertBefore( this.$add_button );
				this.$tabs.tabs( 'refresh' );
				this.$tabs.tabs( "option",
					"active",
					this.new_tab_adding ? $( '.ui-tabs-nav li', this.$content ).length - 2 : 0 );

			}
			this.new_tab_adding = false;
		},
		cloneModel: function ( model, parent_id, save_order ) {
			var new_order,
				model_clone,
				params,
				tag;

			new_order = _.isBoolean( save_order ) && save_order === true ? model.get( 'order' ) : parseFloat( model.get( 'order' ) ) + vc.clone_index;
			params = _.extend( {}, model.get( 'params' ) );
			tag = model.get( 'shortcode' );

			if(this.shortcodeName == tag) {
				_.extend( params,{ tabs_id: + new Date() + '-' + this.$tabs.find( '[data-element-type='+this.shortcodeName+']' ).length + '-' + Math.floor( Math.random() * 11 ) } );
			} else {
				_.extend( params,{ tab_id: + new Date() + '-' + this.$tabs.find( '[data-element-type='+this.shortcodeName+']' ).length + '-' + Math.floor( Math.random() * 11 ) } );
			}

			model_clone = Shortcodes.create( {
				shortcode: tag,
				id: vc_guid(),
				parent_id: parent_id,
				order: new_order,
				cloned: (tag !== 'vc_tab'), // todo review this by @say2me
				cloned_from: model.toJSON(),
				params: params
			} );

			_.each( Shortcodes.where( { parent_id: model.id } ), function ( shortcode ) {
				this.cloneModel( shortcode, model_clone.get( 'id' ), true );
			}, this );
			return model_clone;
		}
	} );
	// TODO: window.VcColumnView
	window.TmTabView = window.VcColumnView.extend( {
		events: {
			'click > .vc_controls .column_delete': 'deleteShortcode',
			'click > .vc_controls .vc_control-btn-prepend': 'addElement',
			'click > .vc_controls .vc_column-edit': 'editElement',
			'click > .vc_controls .vc_control-btn-clone': 'clone',
			'click > .wpb_element_wrapper > .tm_empty-container': 'addToEmpty'
		},
		render: function () {
			var params = this.model.get( 'params' );
			window.TmTabView.__super__.render.call( this );
			/**
			 * @deprecated 4.4.3
			 * @see composer-atts.js vc.atts.tab_id.addShortcode
			 */
			if ( ! params.tab_id/* || params.tab_id.indexOf('def') != -1*/ ) {
				params.tab_id = (+ new Date() + '-' + Math.floor( Math.random() * 11 ));
				this.model.save( 'params', params );
			}
			this.id = 'tab-' + params.tab_id;
			this.$el.attr( 'id', this.id );
			return this;
		},
		ready: function ( e ) {
			window.TmTabView.__super__.ready.call( this, e );
			this.$tabs = this.$el.closest( '.wpb_tabs_holder' );
			var params = this.model.get( 'params' );
			return this;
		},
		changeShortcodeParams: function ( model ) {
			var params;
			window.TmTabView.__super__.changeShortcodeParams.call( this, model );
			params = model.get( 'params' );
			if ( _.isObject( params ) && _.isString( params.title ) && _.isString( params.tab_id ) ) {
				this.$el.parent().parent().find( '.ui-tabs-nav [href="#tab-' + params.tab_id + '"]' ).text( params.title );
			}
			var tag, settings, view;
                tag = model.get("shortcode"), params = model.get("params"), settings = vc.map[tag], _.isArray(settings.params) && _.each(settings.params, function(param_settings) {
                    if (!_.isUndefined(param_settings.admin_label) && param_settings.admin_label) {
                    	var name, heading, value, $wrapper, $admin_label;
                    	name = param_settings.param_name;
                    	heading = param_settings.heading;
                    	$wrapper = this.$el.find("> .wpb_element_wrapper");
                    	$admin_label = $wrapper.children(".admin_label_" + name);
                    	if($admin_label.length == 0) {
                    		$wrapper.append("<div class='admin_label_" + name + "'><label>"+heading+"</label></div>");
                    		$admin_label = $wrapper.children(".admin_label_" + name);
                    	}
                        value = params[name], $admin_label.length && ("" === value || _.isUndefined(value) ? $admin_label.hide().addClass("hidden-label") : ("type" === name && (_.isUndefined(params["icon_" + value]) || (value = vc_toTitleCase(value) + " - <i class='" + params["icon_" + value] + "'></i>")), $admin_label.html("<label>" + $admin_label.find("label").text() + "</label>: " + value), $admin_label.show().removeClass("hidden-label")));
                        if(name === 'hex_reference_color' && value !== '') {
                        	this.$el.find('.admin_label_hex_reference_color').html('<label>Reference Color:</label> <span style="color:'+value+'">'+value+'</span>');
                        }
                    }
                    // icon-colours  for color swatch
                }, this), view = vc.app.views[this.model.get("parent_id")], !1 !== model.get("parent_id") && _.isObject(view) && view.checkIsEmpty()
		},
		deleteShortcode: function ( e ) {
			_.isObject( e ) && e.preventDefault();
			var answer = confirm( window.i18nLocale.press_ok_to_delete_section ),
				parent_id = this.model.get( 'parent_id' );
			if ( answer !== true ) {
				return false;
			}
			this.model.destroy();
			if ( ! vc.shortcodes.where( { parent_id: parent_id } ).length ) {
				var parent = vc.shortcodes.get( parent_id );
				parent.destroy();
				return false;
			}
			var params = this.model.get( 'params' ),
				current_tab_index = $( '[href="#tab-' + params.tab_id + '"]', this.$tabs ).parent().index();
			$( '[href="#tab-' + params.tab_id + '"]' ).parent().remove();
			var tab_length = this.$tabs.find( '.ui-tabs-nav li:not(.add_tab_block)' ).length;
			if ( tab_length > 0 ) {
				this.$tabs.tabs( 'refresh' );
			}
			if ( current_tab_index < tab_length ) {
				this.$tabs.tabs( "option", "active", current_tab_index );
			} else if ( tab_length > 0 ) {
				this.$tabs.tabs( "option", "active", tab_length - 1 );
			}

		},
		cloneModel: function ( model, parent_id, save_order ) {
			var new_order,
				model_clone,
				params,
				tag;

			new_order = _.isBoolean( save_order ) && save_order === true ? model.get( 'order' ) : parseFloat( model.get( 'order' ) ) + vc.clone_index;
			params = _.extend( {}, model.get( 'params' ) );
			tag = model.get( 'shortcode' );

			model_clone = Shortcodes.create( {
				shortcode: tag,
				parent_id: parent_id,
				order: new_order,
				cloned: true,
				cloned_from: model.toJSON(),
				params: params
			} );

			_.each( Shortcodes.where( { parent_id: model.id } ), function ( shortcode ) {
				this.cloneModel( shortcode, model_clone.get( 'id' ), true );
			}, this );
			return model_clone;
		}
	} );

	window.TmButtonView = vc.shortcode_view.extend( {
		events: function () {
			return _.extend( {
				'click button': 'buttonClick'
			}, window.VcToggleView.__super__.events );
		},
		buttonClick: function ( e ) {
			e.preventDefault();
		},
		changeShortcodeParams: function ( model ) {
			var params;

			window.TmButtonView.__super__.changeShortcodeParams.call( this, model );
			params = model.get( 'params' );
			if ( _.isObject( params ) ) {
				var el_class;
				el_class = params.color + ' ' + params.size + ' ' + params.icon;
				this.$el.find( '.wpb_element_wrapper' ).removeClass( el_class );
				this.$el.find( 'button' ).attr( { "class": "title textfield wpb_button " + el_class } );
				if ( params.icon_id !== '' && this.$el.find( 'button i.icon' ).length === 0 ) {
					this.$el.find( 'button' ).append( '<i class="icon '+params.icon_id+'"></i>' );
				} else {
					this.$el.find( 'button i.icon' ).remove();
				}
			}
		}
	} );

	window.TmIconView = vc.shortcode_view.extend( {
		events: function () {
			return _.extend( {
				'click button': 'buttonClick'
			}, window.VcToggleView.__super__.events );
		},
		buttonClick: function ( e ) {
			e.preventDefault();
		},
		changeShortcodeParams: function ( model ) {
			var params;

			window.TmButtonView.__super__.changeShortcodeParams.call( this, model );
			params = model.get( 'params' );
			if ( _.isObject( params ) ) {
				var el_class;
				var $_admin_label_icon_id = this.$el.find( '.admin_label_icon_id' );
				if ( params.icon_id !== '' && $_admin_label_icon_id.length !== 0 ) {
					$_admin_label_icon_id.html( '<label>Selected Icon:</label> <i class="icon small '+params.icon_id+'"></i>' );
				} else {
					$_admin_label_icon_id.html('');
				}
			}
		}
	} );

	window.TmProgressBarView = vc.shortcode_view.extend( {
		changeShortcodeParams: function ( model ) {
			var params;
			var $_element_wrapper = this.$el.find( '.wpb_element_wrapper' );

			window.TmProgressBarView.__super__.changeShortcodeParams.call( this, model );
			// add wpb_element_preview
			params = model.get( 'params' );
			// clear .wpb_element_preview
			this.$el.find( '.wpb_element_wrapper .wpb_element_preview' ).html('');
			//
			var $_wpb_element_preview = this.$el.find( '.wpb_element_preview');

			// if ( _.isObject( params ) ) {
			// 	if ( params.label ) {
			// 		$_wpb_element_preview.append('<p>'+params.label+'</p>');
			// 	}
			// 	if ( params.percentage ) {
			// 		$_wpb_element_preview.append('<p>'+params.percentage+'</p>');
			// 	}
			// 	if ( params.size ) {
			// 		$_wpb_element_preview.append('<p>'+params.size+'</p>');
			// 	}
			// 	if ( params.style ) {
			// 		$_wpb_element_preview.append('<p>'+params.style+'</p>');
			// 	}
			// }
		}
	} );

	window.VcColumnExtendedView =  window.VcColumnView.extend({
		changeShortcodeParams: function(model) {
			window.VcColumnView.__super__.changeShortcodeParams.call(this, model), this.setColumnClasses(), this.buildDesignHelpers();
			var params = model.get( 'params' );
			var $_vc_control_column = this.$el.find( '.vc_controls.vc_control-column');
			/** change the top border to the background_color if use_background is on */
			if(params.use_background && params.use_background !== '' && params.background_color !== '') {
				$_vc_control_column.first().append('<span class="vc_control column_edit tm_indicator_icon icon p_background_color tm-entypo-icon-bucket" style="color:'+params.background_color+'"></span>');
			} else {
				$_vc_control_column.first().remove('p_background_color');
			}
			// icon-brush
			// icon-edit
			// icon-bucket
		},
	});
	/**
	 * Append tab_id tempalate filters
	 */
	vc.addTemplateFilter( function ( string ) {
		var random_id = VCS4() + '-' + VCS4();
		return string.replace( /tab\_id\=\"([^\"]+)\"/g, 'tab_id="$1' + random_id + '"' );
	} );
})( window.jQuery );