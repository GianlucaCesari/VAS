/**
 * TM Shortcode Asistant
 */

(function() {
	tinymce.PluginManager.add('tm_mce_button', function( editor, url ) {
		editor.addButton( 'tm_mce_button', {
			text: '',
			icon: 'tm-mce-icon',
			type: 'menubutton',
			menu: [
			/**
			 * Divider hr
			 */
						{
				text: 'Divider',
				onclick: function() {
					editor.windowManager.open( {
						title: 'Divider',
						name: 'tm_content_divider',
						body: [
						{
							type: 'listbox',
							name: 'show_on',
							label: 'Show On',
							'values': [
								{text: 'Desktop and Mobile', value: ''},
								{text: 'Mobile Only', value: 'hide show-on-mobile'},
								{text: 'Desktop Only', value: 'show hide-on-mobile'},
							]
						},
						{
							type: 'listbox',
							name: 'border_style',
							label: 'Border Style',
							'values': [
								{text: 'Solid', value: 'solid'},
								{text: 'Dotted', value: 'dotted'},
								{text: 'Dashed', value: 'dashed'},
							]
						},
						{
							type: 'listbox',
							name: 'border_thickness',
							label: 'Border Thickness',
							'values': [
								{text: 'Thin', value: 'thin'},
								{text: 'Thick', value: 'thick'},
							]
						},
						{
							type: 'textbox',
							name: 'border_color',
							label: 'Border Color',
							value: '#eee'
						},
						{
							type: 'textbox',
							name: 'el_id',
							label: 'Element ID',
							value: '',
						},
						{
							type: 'textbox',
							name: 'el_class',
							label: 'Extra class',
							value: '',
						},

						],
						onsubmit: function( _e ) {
							editor.insertContent(tm_parseShortcode( this._name, _e));
						}
					});

				},
			},
			/**
			 * Progress Bar
			 */
			{
				text: 'Progress Bar',
				onclick: function() {
					editor.windowManager.open( {
						title: 'Progress Bar',
						name: 'tm_content_progress_bar',
						body: [
						{
							type: 'listbox',
							name: 'margin_bottom',
							label: 'Margin Bottom',
							'values': [
								{text: 'Default (30)', value: '30'},
								{text: '0', value: '0'},
								{text: '5', value: '5'},
								{text: '10', value: '10'},
								{text: '20', value: '20'},
								{text: '30', value: '30'},
								{text: '40', value: '40'},
								{text: '50', value: '50'},
								{text: '60', value: '60'},
								{text: '70', value: '70'},
								{text: '80', value: '80'},
								{text: '90', value: '90'},
								{text: '100', value: '100'},
								{text: '110', value: '110'},
								{text: '120', value: '120'},
								{text: '130', value: '130'},
								{text: '140', value: '140'},
								{text: '150', value: '150'},
							]
						},
						{
							type: 'listbox',
							name: 'margin_bottom_mobile',
							label: 'Margin Bottom on Mobile',
							'values': [
								{text: 'Default (30)', value: '30'},
								{text: '0', value: '0'},
								{text: '5', value: '5'},
								{text: '10', value: '10'},
								{text: '20', value: '20'},
								{text: '30', value: '30'},
								{text: '40', value: '40'},
								{text: '50', value: '50'},
								{text: '60', value: '60'},
								{text: '70', value: '70'},
								{text: '80', value: '80'},
								{text: '90', value: '90'},
								{text: '100', value: '100'},
								{text: '110', value: '110'},
								{text: '120', value: '120'},
								{text: '130', value: '130'},
								{text: '140', value: '140'},
								{text: '150', value: '150'},
							]
						},
						{
							type: 'textbox',
							name: 'label',
							label: 'Label',
							value: ''
						},
						{
							type: 'textbox',
							name: 'percentage',
							label: 'Percentage (as integer 0~100)',
							value: '',
						},
						{
							type: 'textbox',
							name: 'measure',
							label: 'Measure',
							value: '%',
						},
						{
							type: 'checkbox',
							name: 'hide_measure',
							label: 'Hide Measure',
							value: '',
						},
						{
							type: 'checkbox',
							name: 'animate',
							label: 'Animate Bar',
							checked : true
						},
						{
							type: 'listbox',
							name: 'size',
							label: 'Bar Size',
							'values': [
								{text: 'Medium', value: 'medium'},
								{text: 'Small', value: 'small'},
								{text: 'Large', value: 'large'},
								{text: 'Xlarge', value: 'xlarge'},
							]
						},
						{
							type: 'listbox',
							name: 'border_style',
							label: 'Border Style',
							'values': [
								{text: 'None', value: ''},
								{text: 'Rounded', value: 'rounded'},
								{text: 'Pill', value: 'pill'},
							]
						},
						{
							type: 'textbox',
							name: 'track_background_color',
							label: 'Track Background Color',
							value: '#eeeeee',
						},
						{
							type: 'textbox',
							name: 'track_border_color',
							label: 'Track Border Color',
							value: '#eeeeee',
						},
						{
							type: 'textbox',
							name: 'bar_background_color',
							label: 'Bar Background Color',
							value: '#d0d0d0',
						},
						{
							type: 'textbox',
							name: 'bar_border_color',
							label: 'Bar Border Color',
							value: '#d0d0d0',
						},
						{
							type: 'textbox',
							name: 'text_color',
							label: 'Text Color',
							value: '',
						},
						{
							type: 'textbox',
							name: 'el_id',
							label: 'Element ID',
							value: '',
						},
						{
							type: 'textbox',
							name: 'el_class',
							label: 'Extra class',
							value: '',
						},
						],
						onsubmit: function( _e ) {
							editor.insertContent(tm_parseShortcode( this._name, _e));
						}
					});
				}
			},
			{
				text: 'Stat (count up/down)',
				onclick: function() {
					editor.windowManager.open( {
						title: 'Stat (count up/down)',
						name: 'tm_content_stats',
						body: [
						{
							type: 'listbox',
							name: 'margin_bottom',
							label: 'Margin Bottom',
							'values': [
								{text: 'Default (30)', value: '30'},
								{text: '0', value: '0'},
								{text: '5', value: '5'},
								{text: '10', value: '10'},
								{text: '20', value: '20'},
								{text: '30', value: '30'},
								{text: '40', value: '40'},
								{text: '50', value: '50'},
								{text: '60', value: '60'},
								{text: '70', value: '70'},
								{text: '80', value: '80'},
								{text: '90', value: '90'},
								{text: '100', value: '100'},
								{text: '110', value: '110'},
								{text: '120', value: '120'},
								{text: '130', value: '130'},
								{text: '140', value: '140'},
								{text: '150', value: '150'},
							]
						},
						{
							type: 'listbox',
							name: 'margin_bottom_mobile',
							label: 'Margin Bottom on Mobile',
							'values': [
								{text: 'Default (30)', value: '30'},
								{text: '0', value: '0'},
								{text: '5', value: '5'},
								{text: '10', value: '10'},
								{text: '20', value: '20'},
								{text: '30', value: '30'},
								{text: '40', value: '40'},
								{text: '50', value: '50'},
								{text: '60', value: '60'},
								{text: '70', value: '70'},
								{text: '80', value: '80'},
								{text: '90', value: '90'},
								{text: '100', value: '100'},
								{text: '110', value: '110'},
								{text: '120', value: '120'},
								{text: '130', value: '130'},
								{text: '140', value: '140'},
								{text: '150', value: '150'},
							]
						},
						{
							type: 'checkbox',
							name: 'display_inline',
							label: 'Display Inline',
							'value': '',
						},
						{
							type: 'checkbox',
							name: 'is_boxed',
							label: 'Boxed',
							'value': '',
						},
						{
							type: 'textbox',
							name: 'stat_from',
							label: 'Stat From',
							value: '0'
						},
						{
							type: 'textbox',
							name: 'stat_to',
							label: 'Stat To',
							value: '100',
						},
						{
							type: 'textbox',
							name: 'stat_measure',
							label: 'Measure',
							value: '',
						},
						{
							type: 'textbox',
							name: 'description',
							label: 'Description',
							value: '',
						},
						{
							type: 'textbox',
							name: 'stat_font_size',
							label: 'Font Size',
							value: '30px',
						},
						{
							type: 'textbox',
							name: 'stat_color',
							label: 'Stat Color',
							value: '#666666',
						},
						/** boxed options */
						{
							type: 'listbox',
							name: 'border_style',
							label: 'Border Style',
							'values': [
								{text: 'None', value: ''},
								{text: 'Rounded', value: 'rounded'}
							]
						},
						{
							type: 'listbox',
							name: 'box_size',
							label: 'Box Size',
							'values': [
								{text: 'Medium', value: 'medium'},
								{text: 'Small', value: 'small'},
								{text: 'Large', value: 'large'},
								{text: 'X Large', value: 'xlarge'},
							]
						},
						{
							type: 'textbox',
							name: 'background_color',
							label: 'Background Color',
							value: '',
						},
						{
							type: 'textbox',
							name: 'border_color',
							label: 'Border Color',
							value: '',
						},
						/** end boxed options */
						{
							type: 'textbox',
							name: 'stat_description_font_size',
							label: 'Description Font Size',
							value: '14px',
						},
						{
							type: 'textbox',
							name: 'stat_description_color',
							label: 'Description Color',
							value: '#666666',
						},
						{
							type: 'textbox',
							name: 'el_id',
							label: 'Element ID',
							value: '',
						},
						{
							type: 'textbox',
							name: 'el_class',
							label: 'Extra class',
							value: '',
						},

						],
						onsubmit: function( _e ) {
							editor.insertContent(tm_parseShortcode( this._name, _e));
						}
					});
				}
			},
			{
				text: 'Button',
				onclick: function() {
					editor.windowManager.open( {
						title: 'Button',
						name: 'tm_content_button',
						body: [
						{
							type: 'listbox',
							name: 'margin_bottom',
							label: 'Margin Bottom',
							'values': [
								{text: 'Default (30)', value: '30'},
								{text: '0', value: '0'},
								{text: '5', value: '5'},
								{text: '10', value: '10'},
								{text: '20', value: '20'},
								{text: '30', value: '30'},
								{text: '40', value: '40'},
								{text: '50', value: '50'},
								{text: '60', value: '60'},
								{text: '70', value: '70'},
								{text: '80', value: '80'},
								{text: '90', value: '90'},
								{text: '100', value: '100'},
								{text: '110', value: '110'},
								{text: '120', value: '120'},
								{text: '130', value: '130'},
								{text: '140', value: '140'},
								{text: '150', value: '150'},
							]
						},
						{
							type: 'listbox',
							name: 'margin_bottom_mobile',
							label: 'Margin Bottom on Mobile',
							'values': [
								{text: 'Default (30)', value: '30'},
								{text: '0', value: '0'},
								{text: '5', value: '5'},
								{text: '10', value: '10'},
								{text: '20', value: '20'},
								{text: '30', value: '30'},
								{text: '40', value: '40'},
								{text: '50', value: '50'},
								{text: '60', value: '60'},
								{text: '70', value: '70'},
								{text: '80', value: '80'},
								{text: '90', value: '90'},
								{text: '100', value: '100'},
								{text: '110', value: '110'},
								{text: '120', value: '120'},
								{text: '130', value: '130'},
								{text: '140', value: '140'},
								{text: '150', value: '150'},
							]
						},
						{
							type: 'checkbox',
							name: 'display_inline',
							label: 'Display Inline',
							'value': '',
						},
						{
							type: 'listbox',
							name: 'link_to',
							label: 'Link to',
							'values': [
								{text: 'To Page', value: 'page'},
								{text: 'To Modal', value: 'modal'},
								{text: 'Scroll to Section', value: 'scroll'},
							]
						},
						{
							type: 'textbox',
							name: 'scroll_offset',
							label: 'Scroll Offset',
							value: '0',
						},
						/** Button Type */
						{
							type: 'listbox',
							name: 'button_type',
							label: 'Button Type',
							'values': [
								{text: 'Regular Button', value: ''},
								{text: 'App Button', value: 'app'},
							]
						},
						{
							type: 'textbox',
							name: 'button_sub_label',
							label: 'Button Sub Label',
							value: '',
						},
						{
							type: 'textbox',
							name: 'button_label',
							label: 'Button Label',
							value: '',
						},
						{
							type: 'textbox',
							name: 'link_url',
							label: 'URL',
							value: '',
						},
						{
							type: 'listbox',
							name: 'link_target',
							label: 'Target',
							'values': [
								{text: 'Same Window', value: ''},
								{text: 'Blank', value: '_blank'},
							]
						},
						{
							type: 'textbox',
							name: 'modal_target',
							label: 'Modal ID',
							value: ''
						},
						{
							type: 'listbox',
							name: 'button_size',
							label: 'Button Size',
							'values': [
								{text: 'Medium', value: 'medium'},
								{text: 'Small', value: 'small'},
								{text: 'Large', value: 'large'},
								{text: 'X Large', value: 'xlarge'},
							]
						},
						{
							type: 'listbox',
							name: 'border_style',
							label: 'Button Style',
							'values': [
								{text: 'Default', value: ''},
								{text: 'Rounded', value: 'rounded'},
								{text: 'Pill', value: 'pill'},
							]
						},
						{
							type: 'listbox',
							name: 'icon_alignment',
							label: 'Icon Alignment',
							'values': [
								{text: 'Left', value: 'left'},
								{text: 'Center', value: 'center'},
								{text: 'Right', value: 'right'},
							]
						},
						{
							type: 'textbox',
							name: 'icon_id',
							label: 'Icon Name (ID)',
							value: 'icon-star'
						},
						{
							type: 'textbox',
							name: 'bkg_color',
							label: 'Background Color',
							'value': '#eee',
						},
						{
							type: 'textbox',
							name: 'bkg_color_hover',
							label: 'Background Hover Color',
							'value': '#d0d0d0',
						},
						{
							type: 'textbox',
							name: 'border_color',
							label: 'Border Color',
							'value': '#eee',
						},
						{
							type: 'textbox',
							name: 'border_color_hover',
							label: 'Border Hover Color',
							'value': '#d0d0d0',
						},
						{
							type: 'textbox',
							name: 'label_color',
							label: 'Label Color',
							'value': '#666',
						},
						{
							type: 'textbox',
							name: 'label_color_hover',
							label: 'Label Hover Color',
							'value': '#666',
						},
						{
							type: 'checkbox',
							name: 'drop_shadow',
							label: 'Drop shadow',
							'value': '',
						},
						{
							type: 'textbox',
							name: 'el_id',
							label: 'Element ID',
							value: '',
						},
						{
							type: 'textbox',
							name: 'el_class',
							label: 'Extra class',
							value: '',
						},

						],
						onsubmit: function( _e ) {
							editor.insertContent(tm_parseShortcode( this._name, _e));
						}
					});

				}
			},
			{
				text: 'Blockquote',
				onclick: function() {
					editor.windowManager.open( {
						title: 'Blockquote',
						name: 'tm_content_blockquote',
						body: [
						{
							type: 'textbox',
							name: 'quote',
							label: 'Quotation',
							value: '',
							multiline: true,
							minWidth: 300,
							minHeight: 100
						},
						{
							type: 'textbox',
							name: 'cite',
							label: 'Cite (Leave blank not to show)',
							value: ''
						},
						{
							type: 'listbox',
							name: 'type',
							label: 'Type',
							'values': [
								{text: 'None', value: ''},
								{text: 'With Icon', value: 'icon'},
								{text: 'With Border', value: 'border'},
								{text: 'With Avatar', value: 'avatar'},
							]
						},
						{
							type: 'textbox',
							name: 'avatar_image',
							label: 'Avatar Image URL (Applicable only if avatar type is chosen.)',
							value: ''
						},
						{
							type: 'listbox',
							name: 'size',
							label: 'Size',
							'values': [
								{text: 'Medium', value: 'medium'},
								{text: 'Small', value: 'small'},
								{text: 'Large', value: 'large'},
								{text: 'X-large', value: 'xlarge'},
							]
						},
						{
							type: 'listbox',
							name: 'alignment',
							label: 'Alignment',
							'values': [
								{text: 'Left', value: 'left'},
								{text: 'Center', value: 'center'},
								{text: 'Right', value: 'right'},
							]
						},
						{
							type: 'listbox',
							name: 'float',
							label: 'Float',
							'values': [
								{text: 'None', value: ''},
								{text: 'Pull Right', value: 'pull-right'},
								{text: 'Pull Left', value: 'pull-left'},
							]
						},
						{
							type: 'textbox',
							name: 'icon_id',
							label: 'Icon Name (ID)',
							value: 'icon-quote'
						},
						{
							type: 'textbox',
							name: 'icon_color',
							label: 'Icon Color',
							value: '#666'
						},
						{
							type: 'textbox',
							name: 'border_color',
							label: 'Border Color',
							value: ''
						},
						{
							type: 'textbox',
							name: 'quote_color',
							label: 'Quote Color',
							value: ''
						},
						{
							type: 'textbox',
							name: 'cite_color',
							label: 'Cite Color',
							value: ''
						},
						{
							type: 'textbox',
							name: 'el_id',
							label: 'Element ID',
							value: '',
						},
						{
							type: 'textbox',
							name: 'el_class',
							label: 'Extra class',
							value: '',
						},

						],
						onsubmit: function( _e ) {
							editor.insertContent( tm_parseShortcode( this._name, _e));
						}
					});
				}
			},
			{
				text: 'Social Share',
				onclick: function() {
					editor.windowManager.open( {
						title: 'Social Share',
						name: 'tm_social_share',
						body: [
						{
							type: 'listbox',
							name: 'margin_bottom',
							label: 'Margin Bottom',
							'values': [
								{text: 'Default (30)', value: '30'},
								{text: '0', value: '0'},
								{text: '5', value: '5'},
								{text: '10', value: '10'},
								{text: '20', value: '20'},
								{text: '30', value: '30'},
								{text: '40', value: '40'},
								{text: '50', value: '50'},
								{text: '60', value: '60'},
								{text: '70', value: '70'},
								{text: '80', value: '80'},
								{text: '90', value: '90'},
								{text: '100', value: '100'},
								{text: '110', value: '110'},
								{text: '120', value: '120'},
								{text: '130', value: '130'},
								{text: '140', value: '140'},
								{text: '150', value: '150'},
							]
						},
						{
							type: 'listbox',
							name: 'margin_bottom_mobile',
							label: 'Margin Bottom on Mobile',
							'values': [
								{text: 'Default (30)', value: '30'},
								{text: '0', value: '0'},
								{text: '5', value: '5'},
								{text: '10', value: '10'},
								{text: '20', value: '20'},
								{text: '30', value: '30'},
								{text: '40', value: '40'},
								{text: '50', value: '50'},
								{text: '60', value: '60'},
								{text: '70', value: '70'},
								{text: '80', value: '80'},
								{text: '90', value: '90'},
								{text: '100', value: '100'},
								{text: '110', value: '110'},
								{text: '120', value: '120'},
								{text: '130', value: '130'},
								{text: '140', value: '140'},
								{text: '150', value: '150'},
							]
						},
						{
							type: 'checkbox',
							name: 'use_facebook',
							label: 'Facebook',
							'value': '',
						},
						{
							type: 'checkbox',
							name: 'use_twitter',
							label: 'Twitter',
							'value': '',
						},
						{
							type: 'checkbox',
							name: 'use_pinterest',
							label: 'Pinterest',
							'value': '',
						},
						{
							type: 'checkbox',
							name: 'use_googleplus',
							label: 'Google Plus',
							'value': '',
						},
						{
							type: 'listbox',
							name: 'alignment',
							label: 'Alignment',
							'values': [
								{text: 'Left', value: 'left'},
								{text: 'Center', value: 'center'},
								{text: 'Right', value: 'right'},
							]
						},
						{
							type: 'listbox',
							name: 'size',
							label: 'Icon Size',
							'values': [
								{text: 'Medium', value: ''},
								{text: 'Small', value: 'small'},
								{text: 'Large', value: 'large'},
								{text: 'Xlarge', value: 'xlarge'},
							]
						},
						{
							type: 'textbox',
							name: 'icon_color',
							label: 'Icon Color',
							value: ''
						},
						{
							type: 'textbox',
							name: 'icon_color_hover',
							label: 'Icon Hover Color',
							value: ''
						},
						{
							type: 'textbox',
							name: 'el_id',
							label: 'Element ID',
							value: '',
						},
						{
							type: 'textbox',
							name: 'el_class',
							label: 'Extra class',
							value: '',
						},

						],
						onsubmit: function( _e ) {
							editor.insertContent(tm_parseShortcode( this._name, _e));
						}
					});

				},
			},
			/**
			 * Tm Icon Link
			 */
			{
				text: 'Icon',
				onclick: function() {
					editor.windowManager.open( {
						title: 'Icon',
						name: 'tm_icon_link',
						body: [
						{
							type: 'listbox',
							name: 'margin_bottom',
							label: 'Margin Bottom',
							'values': [
								{text: 'Default (30)', value: '30'},
								{text: '0', value: '0'},
								{text: '5', value: '5'},
								{text: '10', value: '10'},
								{text: '20', value: '20'},
								{text: '30', value: '30'},
								{text: '40', value: '40'},
								{text: '50', value: '50'},
								{text: '60', value: '60'},
								{text: '70', value: '70'},
								{text: '80', value: '80'},
								{text: '90', value: '90'},
								{text: '100', value: '100'},
								{text: '110', value: '110'},
								{text: '120', value: '120'},
								{text: '130', value: '130'},
								{text: '140', value: '140'},
								{text: '150', value: '150'},
							]
						},
						{
							type: 'listbox',
							name: 'margin_bottom_mobile',
							label: 'Margin Bottom on Mobile',
							'values': [
								{text: 'Default (30)', value: '30'},
								{text: '0', value: '0'},
								{text: '5', value: '5'},
								{text: '10', value: '10'},
								{text: '20', value: '20'},
								{text: '30', value: '30'},
								{text: '40', value: '40'},
								{text: '50', value: '50'},
								{text: '60', value: '60'},
								{text: '70', value: '70'},
								{text: '80', value: '80'},
								{text: '90', value: '90'},
								{text: '100', value: '100'},
								{text: '110', value: '110'},
								{text: '120', value: '120'},
								{text: '130', value: '130'},
								{text: '140', value: '140'},
								{text: '150', value: '150'},
							]
						},
						{
							type: 'listbox',
							name: 'scroll_to_section',
							label: 'Scroll to Section',
							'values': [
								{text: 'Do not scroll', value: ''},
								{text: 'Scroll', value: 'scroll-link'},
							]
						},
						{
							type: 'textbox',
							name: 'scroll_offset',
							label: 'Scroll Offset',
							value: '0',
						},
						{
							type: 'textbox',
							name: 'link_url',
							label: 'URL',
							value: ''
						},
						{
							type: 'textbox',
							name: 'icon_id',
							label: 'Icon Name (ID)',
							value: 'icon-star'
						},
						{
							type: 'listbox',
							name: 'link_target',
							label: 'Target',
							'values': [
								{text: 'blank', value: '_blank'},
								{text: 'self', value: '_self'},
							]
						},
						{
							type: 'listbox',
							name: 'icon_size',
							label: 'Icon Size',
							'values': [
								{text: 'Medium', value: 'medium'},
								{text: 'Small', value: 'small'},
								{text: 'Large', value: 'large'},
								{text: 'Xlarge', value: 'xlarge'},
							]
						},
						{
							type: 'textbox',
							name: 'icon_color',
							label: 'Icon Color',
							value: ''
						},
						{
							type: 'textbox',
							name: 'icon_color_hover',
							label: 'Icon Hover Color',
							value: ''
						},
						{
							type: 'textbox',
							name: 'el_id',
							label: 'Element ID',
							value: '',
						},
						{
							type: 'textbox',
							name: 'el_class',
							label: 'Extra class',
							value: '',
						},

						],
						onsubmit: function( _e ) {
							editor.insertContent(tm_parseShortcode( this._name, _e));
						}
					});

				},
			},
			/**
			 * Mailchimp form
			 */
			{
				text: 'Subscribe Form',
				onclick: function() {
					editor.windowManager.open( {
						title: 'Subscribe Form',
						name: 'tm_content_mailchimp_form',
						body: [
						{
							type: 'checkbox',
							name: 'hide_name_field',
							label: 'Hide Name Field',
							value: '',
						},
						{
							type: 'checkbox',
							name: 'hide_lastname_field',
							label: 'Hide Last Name Field',
							value: '',
						},
						{
							type: 'listbox',
							name: 'form_alignment',
							label: 'Form Alignment',
							'values': [
								{text: 'Left', value: 'left'},
								{text: 'Center', value: 'center'},
								{text: 'Right', value: 'right'},
							]
						},
						{
							type: 'listbox',
							name: 'form_format',
							label: 'Format',
							'values': [
								{text: 'Horizontal', value: 'horizontal'},
								{text: 'Horizontal Merged', value: 'horizontal_merged'},
								{text: 'Stacked', value: 'stacked'},
							]
						},
						{
							type: 'listbox',
							name: 'form_size',
							label: 'Form Size',
							'values': [
								{text: 'Medium', value: 'medium'},
								{text: 'Small', value: 'small'},
								{text: 'Large', value: 'large'},
								{text: 'X-large', value: 'xlarge'},
							]
						},
						{
							type: 'listbox',
							name: 'form_corner_style',
							label: 'Form Corner Style',
							'values': [
								{text: 'None', value: ''},
								{text: 'Rounded', value: 'rounded'},
								{text: 'Pill', value: 'pill'},
							]
						},
						/** placeholder */
						{
							type: 'textbox',
							name: 'email_field_placeholder',
							label: 'Email Field Placeholder',
							value: 'Email address*'
						},
						{
							type: 'textbox',
							name: 'fname_field_placeholder',
							label: 'First Name Field Placeholder',
							value: 'First name*'
						},
						{
							type: 'textbox',
							name: 'lname_field_placeholder',
							label: 'Last Name Field Placeholder',
							value: 'Last name*'
						},
						{
							type: 'textbox',
							name: 'button_label',
							label: 'Button Label',
							value: 'Subscribe'
						},
						{
							type: 'textbox',
							name: 'marketing_email_consent_checkbox_label',
							label: 'Marketing Email Consent Checkbox Label',
							value: 'You can unsubscribe at any time.'
						},
						/** color */
						{
							type: 'textbox',
							name: 'button_background_color',
							label: 'Button Background Color',
							value: '#eee'
						},
						{
							type: 'textbox',
							name: 'button_background_color_hover',
							label: 'Button Background Hover Color',
							value: '#d0d0d0'
						},
						{
							type: 'textbox',
							name: 'button_border_color',
							label: 'Button Border Color',
							value: '#eee'
						},
						{
							type: 'textbox',
							name: 'button_border_color_hover',
							label: 'Button Border Hover Color',
							value: '#d0d0d0'
						},
						{
							type: 'textbox',
							name: 'button_label_color',
							label: 'Button Label Color',
							value: '#666'
						},
						{
							type: 'textbox',
							name: 'button_label_color_hover',
							label: 'Button Label Hover Color',
							value: '#666'
						},
						{
							type: 'textbox',
							name: 'form_background_color',
							label: 'Form Background Color',
							value: '#fff'
						},
						{
							type: 'textbox',
							name: 'form_border_color',
							label: 'Form Border Color',
							value: '#eee'
						},
						{
							type: 'textbox',
							name: 'form_placeholder_color',
							label: 'Form Placeholder Color',
							value: '#666'
						},
						{
							type: 'textbox',
							name: 'form_focus_background_color',
							label: 'Form Focus Background Color',
							value: '#fff'
						},
						{
							type: 'textbox',
							name: 'form_focus_border_color',
							label: 'Form Focus Border Color',
							value: '#eee'
						},
						{
							type: 'textbox',
							name: 'form_focus_text_color',
							label: 'Form Focus Text Color',
							value: '#000'
						},
						{
							type: 'textbox',
							name: 'form_error_background_color',
							label: 'Form Error Background Color',
							value: '#ddd'
						},
						{
							type: 'textbox',
							name: 'form_error_border_color',
							label: 'Form Error Border Color',
							value: 'rgba(221, 221, 221, 0)'
						},
						{
							type: 'textbox',
							name: 'form_error_text_color',
							label: 'Form Error Text Color',
							value: '#666'
						},
						// tm-plugin #1039
						{
							type: 'textbox',
							name: 'checkbox_radio_background_color',
							label: 'Checkbox & Radio Background Color',
							value: ''
						},
						{
							type: 'textbox',
							name: 'checkbox_radio_border_color',
							label: 'Checkbox & Radio Border Color',
							value: ''
						},
						{
							type: 'textbox',
							name: 'checkbox_checked_background_color',
							label: 'Checkbox Checked Background Color',
							value: ''
						},
						{
							type: 'textbox',
							name: 'checkbox_checked_color',
							label: 'Checkbox Checked Color',
							value: ''
						},
						{
							type: 'textbox',
							name: 'checkbox_error_border_color',
							label: 'Checkbox Error Border Color',
							value: ''
						},
						// End #1039
						{
							type: 'textbox',
							name: 'response_message_text_color',
							label: 'Response Message and Consent Notice Text Color',
							value: 'inherit'
						},
						{
							type: 'checkbox',
							name: 'hide_initial_response_message',
							label: 'Hide Initial Response Message',
							value: '',
						},
						{
							type: 'checkbox',
							name: 'button_width',
							label: 'Make Button Full Width',
							value: '',
						},
						{
							type: 'textbox',
							name: 'initial_response_message',
							label: 'Initial Response Message',
							value: 'We don\'t spam.'
						},
						{
							type: 'textbox',
							name: 'el_id',
							label: 'Element ID',
							value: '',
						},
						{
							type: 'textbox',
							name: 'el_class',
							label: 'Extra class',
							value: '',
						},
						],
						onsubmit: function( _e ) {
							editor.insertContent( tm_parseShortcode( this._name, _e));
						}
					});
				}
			},
			{
				text: 'Contact Form',
				onclick: function() {
					editor.windowManager.open( {
						title: 'Contact Form',
						name: 'tm-contact-form-7',
						body: [
						{
							type: 'textbox',
							name: 'id',
							label: 'ID',
							value: ''
						},
						{
							type: 'textbox',
							name: 'title',
							label: 'Title',
							value: ''
						},
						],
						onsubmit: function( _e ) {
							editor.insertContent(tm_parseShortcode( this._name, _e));
						}
					});
				},
			},
			/* end */
			]
		});
});
})();

function tm_parseShortcode ( _name, _submit ) {
	var _attributes = [];
	var _output = '';
	var _data = _submit.data;
	// build attributes
	for(var _key in _data) {
		_attributes.push( _key + '="' + _data[_key] + '"' );
	}
	_attributes = _attributes.join(' ');
	_output = '[' + _name + ' ' + _attributes +']';
	if(_data.hasOwnProperty('content')) {
		_output += _data.content + '[/' + _name + ']';
	};
	return _output;
}
