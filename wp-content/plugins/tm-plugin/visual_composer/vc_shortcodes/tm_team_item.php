<?php
namespace ThemeMountain;

$_output = $_teamProfileContent = $_image_html = $_caption_html = $_caption_text_color_style = $_social_list_html = $_var_social_list_icon = $_social_list_class = $_var_social_list_icon_url = $_divider_html = '';

extract( shortcode_atts( array(
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'image_width' => '',
 	// social_list_1 ~ 4
 	'title' => 'Untitled', // team_member_name

 	'team_member_occupation' => '',
 	'social_icon_1' => '',
 	'social_icon_url_1' => '',
 	'social_icon_2' => '',
 	'social_icon_url_2' => '',
 	'social_icon_3' => '',
 	'social_icon_url_3' => '',
 	'social_icon_4' => '',
 	'social_icon_url_4' => '',
	'el_class' => '', //  textfield
	// Background color with gradient support
	'team_content_bkg_color' => 'rgba(255,255,255,0)', //  colorpicker, dependancy team_type=2
	'background_use_gradient' => '',
	'background_gradient_end_color' => '',
	'background_gradient_angle' => '',
	//
	'box_border_color' => '#DDD', // Added with #1023. dep team-6
	'box_background_color' => '#FFF', // Added with #1023. dep team-6
	'team_title_color' => '#000',
	'team_title_background_color' => 'rgba(0,0,0,0.2)', // Added with #1023. dep team-4
	'team_occupation_color' => '#666',
	'team_divider_color' => '#999', // Added with #1023. dep team-3
	'team_text_color' => '#666', // Added with #1023
	'sns_icon_color' => '#333333', //  colorpicker, dependancy team_type=2
	'sns_icon_color_hover' => '', //  colorpicker
	'sns_background_color' => 'rgba(0,0,0,0.4)', // Changed in #1023. dep team-2 & team-6
	/* link_team_member_image */
	'link_team_member_image' => '', // false by default
	'link' => '',
	// Design Options
	'sns_icon_size' => 'medium',
	'team_content_alignment' => 'left',
	'image_style' => '', // None by default
	'caption_type' => '', // dropdown, No caption ('', blank), caption_over, caption_below, rollover_caption
	'caption_vertical_alignment' => 'v-align-middle', // dropdown
	'caption_horizontal_alignment' => 'center', // dropdown
	'rollover_bkg_color' => 'rgba(0,0,0,0.3)', // colorpicker
	'caption_text_color' => '#FFFFFF', // colorpicker
	// Animation
	'rollover_animation' => '', // dropdown, Presets are used
	'rollover_animation_duration' => '1000', // textfield
	'rollover_easing' => 'swing',
	// pass over from parent
	'team_type' => '', // team-1~6, team-slider-1
), $atts ) );

// css id
	$_css_id = 'tm_team_item-'.TM_Shortcodes::tm_serial_number();
// sanitization
	$el_class = ($el_class!== '') ? ' '.esc_attr($el_class) : '';
	$sns_icon_size = ($sns_icon_size!== '') ? ' '.esc_attr($sns_icon_size) : '';
	$image_style = ($image_style!=='') ? ' '.esc_attr($image_style) : '';
	$team_content_alignment = ($team_content_alignment !== '') ? ' '.esc_attr($team_content_alignment) : '';
	$title = esc_attr($title);
	$link = esc_url_raw($link);
	$team_member_occupation = TM_Shortcodes::tm_wp_kses($team_member_occupation);
	// rollover animation
	$rollover_animation = ($rollover_animation!=='') ? ' '.esc_attr($rollover_animation) : '';

// social list $_social_list_html. there are 4 max
	for($_i = 1; $_i < 5; $_i ++) {
		$_var_social_list_icon = 'social_icon_'.$_i;
		$_var_social_list_icon_url = 'social_icon_url_'.$_i;
		if(isset($$_var_social_list_icon) && $$_var_social_list_icon !== '') {
			if(isset($$_var_social_list_icon_url) && $$_var_social_list_icon_url !== '') {
				$_var_social_list_icon_url = "href='".esc_url($$_var_social_list_icon_url)."' ";
			} else {
				$_var_social_list_icon_url = '';
			}
			$_social_list_html .= "<li><a {$_var_social_list_icon_url}class='icon-".esc_attr($$_var_social_list_icon)."{$sns_icon_size}'></a></li>";
		}
	}

// CSS
	// Team Content Background Color
	TM_Shortcodes::tm_add_inline_css(".team-2 .{$_css_id} .team-content-info,.{$_css_id} .team-content-info {".TM_Shortcodes::construct_gradient_css($team_content_bkg_color,$background_use_gradient,$background_gradient_end_color,$background_gradient_angle,TRUE)." border-color: {$team_content_bkg_color}; }");
	// sns_icon_color
	if($sns_icon_color !== '') TM_Shortcodes::tm_add_inline_css(".{$_css_id} .social-list a { color: {$sns_icon_color} !important; }");
	if($sns_icon_color_hover !== '') TM_Shortcodes::tm_add_inline_css(".{$_css_id} .social-list a:hover { color: {$sns_icon_color_hover} !important; }");
	if($team_title_color !== '') TM_Shortcodes::tm_add_inline_css(".{$_css_id} h4 { color: {$team_title_color} !important; }");
	if($team_occupation_color !== '') TM_Shortcodes::tm_add_inline_css(".{$_css_id} [class*='team-'] .occupation { color: {$team_occupation_color}; }");
	if($team_text_color !== '') TM_Shortcodes::tm_add_inline_css(".{$_css_id} p { color: {$team_text_color}; }");
	// only for team-2
	if($team_type === 'team-2' && $sns_background_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".team-2 .{$_css_id} .social-list.boxed { background-color: {$sns_background_color}; }");
	}
	// only for team-5
	if($team_type === 'team-5' && $sns_background_color !== '') {
		TM_Shortcodes::tm_add_inline_css(".team-5 .{$_css_id} .social-list { background-color: {$sns_background_color}; }");
	}
	// only for team-3
	if($team_type === 'team-3' && $team_divider_color !== '') {
		// Team Divider Color
		TM_Shortcodes::tm_add_inline_css(".team-1 .{$_css_id} .divider { border-color: {$team_divider_color}; }");
	}
	// only for team-4
	if($team_type === 'team-4' && $team_title_background_color !== '') {
		// Team Title Background Color
		TM_Shortcodes::tm_add_inline_css(".team-2.alt-1 .{$_css_id} .caption-over-outer { background-color: {$team_title_background_color}; }");
	}

	// only for team-6
	if($team_type === 'team-6' && $box_border_color !=='') {
		// Box Border Color
		TM_Shortcodes::tm_add_inline_css(".team-2.alt-2 .{$_css_id} .box { border-color: {$box_border_color}; }");
	}
	// only for team-6
	if($team_type === 'team-6' && $box_background_color !=='') {
		// Box Background Color
		TM_Shortcodes::tm_add_inline_css(".team-2.alt-2 .{$_css_id} .box { background-color: {$box_background_color}; }");
	}

	// force image width
	if($image_width !=='') {
		TM_Shortcodes::tm_add_inline_css(".{$_css_id} .thumbnail > img { width: {$image_width}px; }");
	}


// Slider content
	$_teamProfileContent = TM_Shortcodes::tm_do_shortcode($content);

// construct $_image_html
	if($image_source === 'image_url' && !empty($image_url)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_url,$title);
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_image_html = TM_Shortcodes::generate_image_tag_from_id($image_id,$title);
	}

// Wrapping the image html
	if(!empty($link_team_member_image) && $caption_type === 'rollover_caption') {
		if($caption_type === 'caption_over' && $caption_text_color !== '') {
			if($caption_text_color == '#232323') {
				$caption_text_color == '#FFFFFF';
			}
			TM_Shortcodes::tm_add_inline_css(".{$_css_id} p, .{$_css_id} h1, .{$_css_id} h2, .{$_css_id} h3, .{$_css_id} h4, .{$_css_id} h5, .{$_css_id} h6 { color: {$caption_text_color}; }");
		}
			// $caption_text_color
		if($caption_text_color !== '') {
			$_caption_text_color_style = " style='color:{$caption_text_color};'";
		}
		// animation
		$rollover_bkg_color = TM_Shortcodes::tm_fromRGBtoHEX($rollover_bkg_color);
		$rollover_easing = esc_attr($rollover_easing);
		$rollover_animation_duration = esc_attr($rollover_animation_duration);
		$_data_attributes = " data-hover-easing='{$rollover_easing}' data-hover-speed='{$rollover_animation_duration}' data-hover-bkg-color='{$rollover_bkg_color[0]}' data-hover-bkg-opacity='$rollover_bkg_color[1]'";
		// image html
		if($team_type === 'team-4'){
			$_image_html = "<div class='thumbnail {$rollover_animation}'{$_data_attributes}><a class='overlay-link fade-location' href='{$link}'>{$_image_html}<span class='overlay-info'><span><span><span{$_caption_text_color_style}>View</span></span></span></span></a><div class='caption-over-outer'><div class='caption-over-inner v-align-bottom'><h4>{$title}</h4></div></div></div>";
		} else if($team_type === 'team-5'){
			$_social_list_class = ' center mb-20';
			$_image_html = "<div class='thumbnail {$rollover_animation}'{$_data_attributes}><div class='overlay-link'>{$_image_html}<div class='overlay-info v-align-bottom'><div><div><ul class='social-list list-horizontal{$_social_list_class}'>{$_social_list_html}</ul></div></div></div></div></div>";
		} else {
			$_image_html = "<div class='thumbnail {$rollover_animation}'{$_data_attributes}><a class='overlay-link fade-location' href='{$link}'>{$_image_html}<span class='overlay-info'><span><span><span{$_caption_text_color_style}>View</span></span></span></span></a></div>";
		}
	} else if (!empty($link_team_member_image) && $caption_type === '') {
		if(!empty($link)) {
			$_image_html = "<a href='{$link}' class='fade-location'>{$_image_html}</a>";
		}
		if($team_type === 'team-4'){
			$_image_html = "<div class='thumbnail'>{$_image_html}<div class='caption-over-outer'><div class='caption-over-inner v-align-bottom color-white'><h4>{$title}</h4></div></div></div>";
		} else if($team_type === 'team-5'){
			$_social_list_class = ' center mb-20';
			$_image_html = "<div class='thumbnail'><div class='overlay-link'>{$_image_html}<div class='overlay-info v-align-bottom'><div><div><ul class='social-list list-horizontal{$_social_list_class}'>{$_social_list_html}</ul></div></div></div></div></div>";
		} else {
			$_image_html = "<div class='thumbnail'>{$_image_html}</div>";
		}
	} else {
		if(!empty($link)) {
			$_image_html = "<a href='{$link}'>{$_image_html}</a>";
		}
		if($team_type === 'team-4'){
			$_image_html = "<div class='thumbnail{$image_style}'>{$_image_html}<div class='caption-over-outer'><div class='caption-over-inner v-align-bottom color-white'><h4>{$title}</h4></div></div></div>";
		} else if($team_type === 'team-5'){
			$_social_list_class = ' center mb-20';
			$_image_html = "<div class='thumbnail'><div class='overlay-link'>{$_image_html}<div class='overlay-info v-align-bottom'><div><div><ul class='social-list list-horizontal{$_social_list_class}'>{$_social_list_html}</ul></div></div></div></div></div>";
		} else {
			$_image_html = "<div class='thumbnail{$image_style}'>{$_image_html}</div>";
		}
	}

// Construct Item HTML output
	if($team_type == 'team-slider-1') {
		// output for slider
		$_output = "<li class='tms-slide {$_css_id}'><div class='team-content{$team_content_alignment}'>{$_image_html}<div class='team-content-info box large'><h4 class='mb-5'>{$title}</h4><h5 class='occupation mb-20'>{$team_member_occupation}</h5>{$_teamProfileContent}<ul class='social-list list-horizontal'>{$_social_list_html}</ul></div></div></li>";
	} else {
		// Dependency on $team_type attribute
		switch ($team_type) {
			case 'team-3':
				$_output = "<div class='grid-item {$_css_id}{$el_class}'><div class='team-content{$team_content_alignment}'><h4>{$title}</h4><h5 class='occupation'>{$team_member_occupation}</h5><div class='divider'></div>{$_image_html}<div class='team-content-info'>{$_teamProfileContent}<ul class='social-list list-horizontal{$_social_list_class}'>{$_social_list_html}</ul></div></div></div>";
				break;
			case 'team-4':
				$_output = "<div class='grid-item {$_css_id}{$el_class}'><div class='team-content{$team_content_alignment}'>{$_image_html}<div class='team-content-info'><h5 class='occupation'>{$team_member_occupation}</h5>{$_teamProfileContent}<ul class='social-list list-horizontal{$_social_list_class}'>{$_social_list_html}</ul></div></div></div>";
				break;
			case 'team-5':
				$_output = "<div class='grid-item {$_css_id}{$el_class}'><div class='team-content{$team_content_alignment}'><div class='team-content-info'><h4>{$title}</h4><h5 class='occupation'>{$team_member_occupation}</h5>{$_teamProfileContent}</div>{$_image_html}</div></div>";
				break;
			case 'team-6':
				$_output = "<div class='grid-item {$_css_id}{$el_class}'><div class='box medium'><div class='team-content{$team_content_alignment}'>{$_image_html}<div class='team-content-info'><h4>{$title}</h4><h5 class='occupation'>{$team_member_occupation}</h5>{$_teamProfileContent}<ul class='social-list list-horizontal{$_social_list_class}'>{$_social_list_html}</ul></div></div></div></div>";
				break;
			case 'team-2':
				$_social_list_class = ' boxed';
			default:
				$_output = "<div class='grid-item {$_css_id}{$el_class}'><div class='team-content{$team_content_alignment}'>{$_image_html}<div class='team-content-info'><h4>{$title}</h4><h5 class='occupation'>{$team_member_occupation}</h5>{$_teamProfileContent}<ul class='social-list list-horizontal{$_social_list_class}'>{$_social_list_html}</ul></div></div></div>";
				break;
		}
	}

/* Output */
	TM_Shortcodes::output_shortcode_content('holder_item', $_output);