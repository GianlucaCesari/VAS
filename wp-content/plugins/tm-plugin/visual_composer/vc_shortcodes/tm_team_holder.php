<?php
use ThemeMountain\TM_Shortcodes as TM_Shortcodes;

$_output = $_teamContent = $_team_type_class = $_content_grid = '';

extract( shortcode_atts( array(
	'force_fullwidth' => 'true',
	'team_type' => 'team-1', // dropdown. team-1~6, team-slider-1
	'items_per_row'=>'3', // dropdown. 3 4 5 6
	'items_per_row_slider'=>'3',
	'image_source' => 'image_id',
	'image_id' => '',
	'image_url' => '',
	'el_id' => '',
	'el_class' => '',
	'tabs_id' => '', // tab_id. auto generated.
	// Navigation
	'auto_advance' => '',
	'auto_advance_interval' => '5000',
	'pause_on_hover' => 'true',
	// Design Options
	'pagination_color' => '#000',
), $atts ) );

// css ID
	$_css_id = 'team-holder-'.TM_Shortcodes::tm_serial_number();

// sanitization
	$items_per_row = esc_attr($items_per_row);
	$items_per_row_slider = esc_attr($items_per_row_slider);
	$tabs_id = esc_attr($tabs_id);

// data-auto-advance
	$auto_advance = ($auto_advance !=='') ? ' data-auto-advance' : '';
	if($auto_advance !=='') {
		if( is_numeric($auto_advance_interval) === TRUE ) {
			$auto_advance_interval  = " data-auto-advance-interval='{$auto_advance_interval}'";
		} else {
			$auto_advance_interval = " data-auto-advance-interval='2000'";
		}
	} else {
		$auto_advance_interval = '';
	}

// data-pause-on-hover
	$pause_on_hover = ($pause_on_hover !=='') ? ' data-pause-on-hover' : ' data-pause-on-hover="false"';

/* nav color palette */
	TM_Shortcodes::tm_add_inline_css(".{$_css_id} .tms-pagination a { background-color: {$pagination_color}; }");

// const argument
	$_args = array(
		'css_id' => $_css_id,
		'el_id' => esc_attr($el_id),
		'el_class' => esc_attr($el_class),
		'force_fullwidth' => $force_fullwidth,
		'skip_row_div' => TRUE,
		);
	// Background image. When image_id is 0, there must be error or some sort.
	if($image_source === 'image_url' && !empty($image_url)) {
		$_args['use_background'] = 'true';
		$_args['image_url'] = esc_url($image_url);
	} else if($image_source === 'image_id' && !empty($image_id)) {
		$_args['use_background'] = 'true';
		$_args['image_id'] = $image_id;
	}

if($team_type === 'team-slider-1') {
	$content = str_replace('[tm_team_item ','[tm_team_item team_type="'.$team_type.'" ',$content);
	$_teamContent = TM_Shortcodes::tm_do_shortcode($content, FALSE);
	$_slide_id = 'team-slider-'.time() . rand( 0, 100 );
	$_output = "<!-- team row -->\n<div class='row' data-animate-in='preset:slideInUpShort;duration:1000ms;delay:200ms;' data-threshold='0.7'><div class='column width-12'></div><div class='column width-12 slider-column no-padding'><div id='{$_slide_id}' class='tm-slider-container team-slider team-slider-1' data-progress-bar='false' data-carousel-1140='3' data-carousel-1024='2' data-carousel-768='1' data-carousel-visible-slides='{$items_per_row_slider}' data-height='500'{$auto_advance}{$pause_on_hover}{$auto_advance_interval}><ul class='tms-slides'>{$_teamContent}</ul></div></div></div>";
	/* Output */
	$_args['skip_row_div'] = TRUE;
	TM_Shortcodes::output_shortcode_content('holder', $_output, '' , '', $_args);
} else {
	// $_team_type_class dependent on $team_type attribute
	switch ($team_type) {
		case 'team-slider-1':
			$_team_type_class = $team_type;
			break;
		case 'team-3':
			$_team_type_class = 'team-1 alt-2';
			$_content_grid = " content-grid-{$items_per_row} flex";
			break;
		case 'team-4':
			$_team_type_class = 'team-2 alt-1';
			$_content_grid = " content-grid-{$items_per_row} flex";
			break;
		case 'team-5':
			$_team_type_class = 'team-4';
			$_content_grid = " content-grid-{$items_per_row} flex";
			break;
		case 'team-6':
			$_team_type_class = 'team-2 alt-2';
			$_content_grid = " content-grid-{$items_per_row} flex";
			break;
		default:
			if(empty($_team_type_class)) $_team_type_class = $team_type;
			$_content_grid = " content-grid-{$items_per_row} flex";
			break;
	}

	// send $team_type attribute to the nested child shortcode
	$content = str_replace('[tm_team_item ','[tm_team_item team_type="'.$team_type.'" ',$content);
	// develop shortcode
	$_teamContent = TM_Shortcodes::tm_do_shortcode($content, FALSE);
	// construct the markup
	$_output = "<!-- team grid row -->\n<div class='row'><div class='column width-12'><div class='row{$_content_grid}'>{$_teamContent}</div></div></div><!-- End team grid row -->\n";

	/* Output */
	TM_Shortcodes::output_shortcode_content('holder', $_output, $_team_type_class, '' , $_args);
}
