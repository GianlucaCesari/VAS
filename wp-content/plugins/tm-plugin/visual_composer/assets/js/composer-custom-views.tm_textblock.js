/**
 * Replace vc_column_text with tm_textblock
 */

(function ( $ ) {
	"use strict";

	/** customizes the behavior of "Add Text Block" button to use tm_textblock */
	vc.visualComposerView.prototype.addTextBlock = function(e) {
		var row, column, params, row_params, column_params;
		return e.preventDefault(), row_params = {}, row = vc.shortcodes.create({
			shortcode: "vc_row",
			params: row_params
		}), column_params = {
			width: "1/1"
		}, column = vc.shortcodes.create({
			shortcode: "vc_column",
			params: column_params,
			parent_id: row.id,
			root_id: row.id
		}), params = vc.getDefaults("tm_textblock"), vc.shortcodes.create({
			shortcode: "tm_textblock",
			parent_id: column.id,
			root_id: row.id,
			params: params
		})
	}

	vc.Storage.prototype.parseContent = function(data, content, parent) {
		var tags = _.keys(vc.map).join("|"),
		reg = window.wp.shortcode.regexp(tags),
		matches = content.trim().match(reg);
		return _.isNull(matches) ? data : (_.each(matches, function(raw) {
			var shortcode, map_settings, sub_matches = raw.match(this.regexp(tags)),
			sub_content = sub_matches[5],
			sub_regexp = new RegExp("^[\\s]*\\[\\[?(" + _.keys(vc.map).join("|") + ")(?![\\w-])"),
			id = window.vc_guid(),
			atts_raw = window.wp.shortcode.attrs(sub_matches[3]),
			atts = {};
			_.each(atts_raw.named, function(value, key) {
				atts[key] = this.unescapeParam(value)
			}, this), shortcode = {
				id: id,
				shortcode: sub_matches[2],
				order: this.order,
				params: _.extend({}, atts),
				parent_id: !!_.isObject(parent) && parent.id,
				root_id: _.isObject(parent) ? parent.root_id : id
			}, map_settings = vc.map[shortcode.shortcode], this.order += 1, data[id] = shortcode, id == shortcode.root_id && (data[id].html = raw), _.isString(sub_content) && sub_content.match(sub_regexp) && (_.isBoolean(map_settings.is_container) && !0 === map_settings.is_container || !_.isEmpty(map_settings.as_parent) && !1 !== map_settings.as_parent) ? data = this.parseContent(data, sub_content, data[id]) : _.isString(sub_content) && sub_content.length && "vc_row" === sub_matches[2] ? data = this.parseContent(data, '[vc_column width="1/1"][tm_textblock]' + sub_content + "[/tm_textblock][/vc_column]", data[id]) : _.isString(sub_content) && sub_content.length && "vc_column" === sub_matches[2] ? data = this.parseContent(data, "[tm_textblock]" + sub_content + "[/tm_textblock]", data[id]) : _.isString(sub_content) && (data[id].params.content = sub_content)
		}, this), data)
	}

	vc.Storage.prototype.wrapData = function(content) {
		var tags = _.keys(vc.map).join("|"),
		reg = this.regexp_split("vc_row"),
		starts_with_shortcode = new RegExp("^\\[(\\[?)(" + tags + ")", "g"),
		_this = this,
		storage = {},
		i = 0;
		content = wp.shortcode.replace("vc_section", content, function(data) {
			var toSave = {
				attrs: data.attrs.named,
				content: _this.wrapData(data.content)
			};
			i++;
			var hash = "vc_pseudo_section_" + i + "_" + VCS4() + VCS4();
			return storage[hash] = {
				tag: hash,
				data: toSave
			}, '[vc_row][vc_pseudo_section id="' + hash + '"][/vc_pseudo_section][/vc_row]'
		});
		var matches = _.filter(content.trim().split(reg), function(value) {
			if (!_.isEmpty(value)) return value
		});
		return content = _.reduce(matches, function(mem, value) {
			-1 !== value.trim().indexOf("vc_pseudo_section_") || value.trim().match(starts_with_shortcode) || (value = "[vc_row][vc_column][tm_textblock]" + value + "[/tm_textblock][/vc_column][/vc_row]");
			var matches_local = value.match(vc_regexp_shortcode());
			return !_.isArray(matches_local) || _.isUndefined(matches_local[2]) || -1 !== matches_local[2].indexOf("vc_pseudo_section_") || _.isUndefined(vc.map[matches_local[2]]) || !_.isUndefined(vc.map[matches_local[2]].is_container) && vc.map[matches_local[2]].is_container || !_.isEmpty(vc.map[matches_local[2]].as_parent) || (value = "[vc_row][vc_column]" + value + "[/vc_column][/vc_row]"), mem + value
		}, ""), Object.keys(storage).length > 0 && (content = content.replace(/\[vc_row\]\[vc_pseudo_section/g, "[vc_pseudo_section"), content = content.replace(/\[\/vc_pseudo_section\]\[\/vc_row\]/g, "[/vc_pseudo_section]"), content = wp.shortcode.replace("vc_pseudo_section", content, function(data) {
			var item = storage[data.attrs.named.id];
			return wp.shortcode.string({
				tag: "vc_section",
				attrs: item.data.attrs,
				content: item.data.content
			})
		})), content
	}
})( window.jQuery );