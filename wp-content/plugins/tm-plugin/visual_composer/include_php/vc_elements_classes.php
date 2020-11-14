<?php
/**
 * The followings are modified version of VC classes for TTAs.
 *
 * WPBakeryShortCode_tm_tab_item
 * WPBakeryShortCode_tm_vertical_tab_holder
 * WPBakeryShortCode_tm_tab_holder
 *
 * WPBakeryShortCode_tm_accordion_holder
 * WPBakeryShortCode_tm_accordion_tab_item
 *
 * Avalanche slide
 */
/**
 * Tabs
 */

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-column.php' );

class WPBakeryShortCode_tm_tab_item extends WPBakeryShortCode_VC_Column {
	protected $controls_css_settings = 'tc vc_control-container';
	protected $controls_list = array( 'add', 'edit', 'clone', 'delete' );
	protected $predefined_atts = array(
		'tab_id' => '',
		'title' => ''
	);
	// protected $controls_template_file = 'editors/partials/backend_controls_tab.tpl.php';

	public function __construct( $settings ) {
		parent::__construct( $settings );
	}

	public function customAdminBlockParams() {
		return ' id="tab-' . $this->atts['tab_id'] . '"';
	}

	public function mainHtmlBlockParams( $width, $i ) {
		return 'data-element_type="' . $this->settings["base"] . '" class="wpb_' . $this->settings['base'] . ' wpb_sortable wpb_content_holder"' . $this->customAdminBlockParams();
	}

	public function containerHtmlBlockParams( $width, $i ) {
		// return 'class="wpb_column_container"';
		return false; // 'class="wpb_element_wrapper"';
	}
}

/**
 * Constants
 */
define( 'TM_NEW_TITLE', esc_html__( "Untitled", 'thememountain-plugin' ) );

/**
 * Vertical Tab
 */

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-tabs.php' );

class WPBakeryShortCode_tm_vertical_tab_holder extends WPBakeryShortCode_tm_tab_holder {
	// protected $controls_template_file = 'editors/partials/backend_controls_tab.tpl.php';
	protected $predefined_atts = array(
		'tab_id' => TM_NEW_TITLE,
		'title' => ''
	);

	protected function getFileName() {
		return 'tm_vertical_tab_holder';
	}

	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_tab_item title="' . TM_NEW_TITLE . '" tab_id=""][/tm_tab_item]' ) . '</div>';
	}

}

/**
 * Tab Items
 */

class WPBakeryShortCode_tm_tab_holder extends WPBakeryShortCode {
	static $filter_added = false;
	protected $controls_css_settings = 'out-tc vc_controls-content-widget';
	protected $controls_list = array( 'edit', 'clone', 'delete' );

	public function __construct( $settings ) {
		parent::__construct( $settings );
		if ( ! self::$filter_added ) {
			$this->addFilter( 'vc_inline_template_content', 'setCustomTabId' );
			self::$filter_added = true;
		}
	}

	public function contentAdmin( $atts, $content = null) {
		$width = $custom_markup = '';
		$shortcode_attributes = array( 'width' => '1/1' );
		foreach ( $this->settings['params'] as $param ) {
			if ( $param['param_name'] != 'content' ) {
				//$shortcode_attributes[$param['param_name']] = $param['value'];
				if ( isset( $param['value'] ) && is_string( $param['value'] ) ) {
					$shortcode_attributes[ $param['param_name'] ] = esc_html__( $param['value'], 'thememountain-plugin' );
				} elseif ( isset( $param['value'] ) ) {
					$shortcode_attributes[ $param['param_name'] ] = $param['value'];
				}
			} else if ( $param['param_name'] == 'content' && $content == null ) {
				//$content = $param['value'];
				$content = esc_html__( $param['value'], 'thememountain-plugin' );
			}
		}

		extract( shortcode_atts(
			$shortcode_attributes
			, $atts ) );

		// Extract tab titles

		preg_match_all( '/tm_tab_item title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$output = '';
		$tab_titles = array();

		if ( isset( $matches[0] ) ) {
			$tab_titles = $matches[0];
		}
		$tmp = '';
		if ( count( $tab_titles ) ) {
			$tmp .= '<ul class="clearfix tabs_controls">';
			foreach ( $tab_titles as $tab ) {
				preg_match( '/title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
				if ( isset( $tab_matches[1][0] ) ) {
					$tmp .= '<li><a href="#tab-' . ( isset( $tab_matches[3][0] ) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) . '">' . $tab_matches[1][0] . '</a></li>';

				}
			}
			$tmp .= '</ul>' . "\n";
		} else {
			$output .= do_shortcode( $content );
		}

		$elem = $this->getElementHolder( $width );

		$iner = '';
		foreach ( $this->settings['params'] as $param ) {
			$custom_markup = '';
			$param_value = isset( ${$param['param_name']} ) ? ${$param['param_name']} : '';

			if ( is_array( $param_value ) ) {
				// Get first element from the array
				reset( $param_value );
				$first_key = key( $param_value );
				$param_value = $param_value[ $first_key ];
			}
			$iner .= $this->singleParamHtmlHolder( $param, $param_value );
		}
		//$elem = str_ireplace('%wpb_element_content%', $iner, $elem);

		if ( isset( $this->settings["custom_markup"] ) && $this->settings["custom_markup"] != '' ) {
			if ( $content != '' ) {
				$custom_markup = str_ireplace( "%content%", $tmp . $content, $this->settings["custom_markup"] );
			} else if ( $content == '' && isset( $this->settings["default_content_in_template"] ) && $this->settings["default_content_in_template"] != '' ) {
				$custom_markup = str_ireplace( "%content%", $this->settings["default_content_in_template"], $this->settings["custom_markup"] );
			} else {
				$custom_markup = str_ireplace( "%content%", '', $this->settings["custom_markup"] );
			}
			//$output .= do_shortcode($this->settings["custom_markup"]);
			$iner .= do_shortcode( $custom_markup );
		}
		$elem = str_ireplace( '%wpb_element_content%', $iner, $elem );
		$output = $elem;
		return $output;
	}

	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_tab_item title="Tab" tab_id=""][/tm_tab_item]' ) . '</div>';
	}

	public function setCustomTabId( $content ) {
		return preg_replace( '/tab\_id\=\"([^\"]+)\"/', 'tab_id="$1-' . time() . '"', $content );
	}
}

/**
 * Accordion
 */

class WPBakeryShortCode_tm_accordion_holder extends WPBakeryShortCode {
	protected $controls_css_settings = 'out-tc vc_controls-content-widget';

	public function __construct( $settings ) {
		parent::__construct( $settings );
	}


	public function contentAdmin( $atts, $content = null) {
		$width = $custom_markup = '';
		$shortcode_attributes = array( 'width' => '1/1' );
		foreach ( $this->settings['params'] as $param ) {
			if ( 'content' !== $param['param_name'] ) {
				$shortcode_attributes[ $param['param_name'] ] = isset( $param['value'] ) ? $param['value'] : null;
			} elseif ( 'content' === $param['param_name'] && null === $content ) {
				$content = $param['value'];
			}
		}
		extract( shortcode_atts( $shortcode_attributes, $atts ) );

		$elem = $this->getElementHolder( $width );

		$inner = '';
		foreach ( $this->settings['params'] as $param ) {
			$param_value = isset( ${$param['param_name']} ) ? ${$param['param_name']} : '';
			if ( is_array( $param_value ) ) {
				// Get first element from the array
				reset( $param_value );
				$first_key = key( $param_value );
				$param_value = $param_value[ $first_key ];
			}
			$inner .= $this->singleParamHtmlHolder( $param, $param_value );
		}

		$tmp = '';

		if ( isset( $this->settings['custom_markup'] ) && '' !== $this->settings['custom_markup'] ) {
			if ( '' !== $content ) {
				$custom_markup = str_ireplace( '%content%', $tmp . $content, $this->settings['custom_markup'] );
			} elseif ( '' === $content && isset( $this->settings['default_content_in_template'] ) && '' !== $this->settings['default_content_in_template'] ) {
				$custom_markup = str_ireplace( '%content%', $this->settings['default_content_in_template'], $this->settings['custom_markup'] );
			} else {
				$custom_markup = str_ireplace( '%content%', '', $this->settings['custom_markup'] );
			}
			$inner .= do_shortcode( $custom_markup );
		}
		$output = str_ireplace( '%wpb_element_content%', $inner, $elem );

		return $output;
	}
}

/**
 * Accordion tabs
 */
class WPBakeryShortCode_tm_accordion_tab_item extends WPBakeryShortCode_tm_tab_item {
	protected $controls_css_settings = 'tc vc_control-container';
	protected $controls_list = array( 'add', 'edit', 'clone', 'delete' );
	protected $predefined_atts = array(
		'el_class' => '',
		'width' => '',
		'title' => ''
	);

	public function contentAdmin( $atts, $content = null ) {
		$width = $el_class = $title = '';
		extract( shortcode_atts( $this->predefined_atts, $atts ) );
		$output = '';

		$column_controls = $this->getColumnControls( $this->settings( 'controls' ) );
		$column_controls_bottom = $this->getColumnControls( 'add', 'bottom-controls' );
		$width = array( '' );
		$sortable = ( vc_user_access_check_shortcode_all( $this->shortcode ) ? 'wpb_sortable' : $this->nonDraggableClass );

		for ( $i = 0; $i < count( $width ); $i ++ ) {
			$output .= '<div class="group wpb_sortable">';
			$output .= '<h3><span class="tab-label"><%= params.title %></span></h3>';
			$output .= '<div ' . $this->mainHtmlBlockParams( $width, $i ) . '>';
			$output .= str_replace( "%column_size%", wpb_translateColumnWidthToFractional( $width[ $i ] ), $column_controls );
			$output .= '<div class="wpb_element_wrapper">';
			// $output .= '<div ' . $this->containerHtmlBlockParams( $width, $i ) . '>';
			// $output .= '</div>';
			$output .= '</div>';
			// $output .= str_replace( "%column_size%", wpb_translateColumnWidthToFractional( $width[ $i ] ), $column_controls_bottom );
			$output .= '</div>';
			$output .= '</div>';
		}

		return $output;
	}

	public function mainHtmlBlockParams( $width, $i ) {
		return 'data-element_type="' . $this->settings["base"] . '" class=" wpb_' . $this->settings['base'] . '"' . $this->customAdminBlockParams();
	}

	public function containerHtmlBlockParams( $width, $i ) {
		return 'class="wpb_column_container vc_container_for_children"';
	}

	public function contentAdmin_old( $atts, $content = null ) {
		$width = $el_class = $title = '';
		extract( shortcode_atts( $this->predefined_atts, $atts ) );
		$output = '';
		$column_controls = $this->getColumnControls( $this->settings( 'controls' ) );
		for ( $i = 0; $i < count( $width ); $i ++ ) {
			$output .= '<div class="group wpb_sortable">';
			$output .= '<div class="wpb_element_wrapper">';
			$output .= '<div class="vc_row-fluid wpb_row_container">';
			$output .= '<h3><a href="#">' . $title . '</a></h3>';
			$output .= '<div data-element_type="' . $this->settings["base"] . '" class=" wpb_' . $this->settings['base'] . ' wpb_sortable">';
			$output .= '<div class="wpb_element_wrapper">';
			$output .= '<div class="vc_row-fluid wpb_row_container">';
			$output .= do_shortcode( shortcode_unautop( $content ) );
			$output .= '</div>';
			if ( isset( $this->settings['params'] ) ) {
				$inner = '';
				foreach ( $this->settings['params'] as $param ) {
					$param_value = isset( ${$param['param_name']} ) ? ${$param['param_name']} : '';
					if ( is_array( $param_value ) ) {
						// Get first element from the array
						reset( $param_value );
						$first_key = key( $param_value );
						$param_value = $param_value[ $first_key ];
					}
					$inner .= $this->singleParamHtmlHolder( $param, $param_value );
				}
				$output .= $inner;
			}
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
		}

		return $output;
	}

	protected function outputTitle( $title ) {
		return '';
	}

	public function customAdminBlockParams() {
		return '';
	}
}

// slide

class WPBakeryShortCode_tm_slider_holder extends WPBakeryShortCode {
	static $filter_added = false;
	protected $controls_css_settings = 'out-tc vc_controls-content-widget';
	protected $controls_list = array('edit', 'clone', 'delete');
	public function __construct( $settings ) {
		parent::__construct( $settings );
		if ( ! self::$filter_added ) {
			$this->addFilter( 'vc_inline_template_content', 'setCustomTabId' );
			self::$filter_added = true;
		}
	}

	public function contentAdmin( $atts, $content = null ) {
		$width = $custom_markup = '';
		$shortcode_attributes = array( 'width' => '1/1' );
		foreach ( $this->settings['params'] as $param ) {
			if ( $param['param_name'] != 'content' ) {
			//$shortcode_attributes[$param['param_name']] = $param['value'];
				if ( isset( $param['value'] ) && is_string( $param['value'] ) ) {
					$shortcode_attributes[$param['param_name']] = esc_html__( $param['value'],  'thememountain-plugin' );
				} elseif ( isset( $param['value'] ) ) {
					$shortcode_attributes[$param['param_name']] = $param['value'];
				}
			} else if ( $param['param_name'] == 'content' && $content == NULL ) {
			//$content = $param['value'];
				$content = esc_html__( $param['value'], 'thememountain-plugin' );
			}
		}
		extract( shortcode_atts(
			$shortcode_attributes
			, $atts ) );

		// Extract tab titles
		preg_match_all( '/tm_slider_item title="([^\"]+)"(\sslide_id\=\"([^\"]+)\"){0,1}/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$output = '';
		$slide_titles = array();

		if ( isset( $matches[0] ) ) {
			$slide_titles = $matches[0];
		}
		$tmp = '';
		if ( count( $slide_titles ) ) {
			$tmp .= '<ul class="clearfix tabs_controls">';
			foreach ( $slide_titles as $slide ) {
				preg_match( '/title="([^\"]+)"(\sslide_id\=\"([^\"]+)\"){0,1}/i', $slide[0], $slide_matches, PREG_OFFSET_CAPTURE );
				if ( isset( $slide_matches[1][0] ) ) {
					$tmp .= '<li><a href="#slide-' . ( isset( $slide_matches[3][0] ) ? $slide_matches[3][0] : sanitize_title( $slide_matches[1][0] ) ) . '">' . $slide_matches[1][0] . '</a></li>';

				}
			}
			$tmp .= '</ul>' . "\n";
		} else {
			$output .= do_shortcode( $content );
		}

		$elem = $this->getElementHolder( $width );

		$iner = '';
		foreach ( $this->settings['params'] as $param ) {
			$custom_markup = '';
			$param_value = isset( ${$param['param_name']} ) ? ${$param['param_name']} : '';
			if ( is_array( $param_value ) ) {
						// Get first element from the array
				reset( $param_value );
				$first_key = key( $param_value );
				$param_value = $param_value[$first_key];
			}
			$iner .= $this->singleParamHtmlHolder( $param, $param_value );
		}
				//$elem = str_ireplace('%wpb_element_content%', $iner, $elem);

		if ( isset( $this->settings["custom_markup"] ) && $this->settings["custom_markup"] != '' ) {
			if ( $content != '' ) {
				$custom_markup = str_ireplace( "%content%", $tmp . $content, $this->settings["custom_markup"] );
			} else if ( $content == '' && isset( $this->settings["default_content_in_template"] ) && $this->settings["default_content_in_template"] != '' ) {
				$custom_markup = str_ireplace( "%content%", $this->settings["default_content_in_template"], $this->settings["custom_markup"] );
			} else {
				$custom_markup = str_ireplace( "%content%", '', $this->settings["custom_markup"] );
			}
					//$output .= do_shortcode($this->settings["custom_markup"]);
			$iner .= do_shortcode( $custom_markup );
		}
		$elem = str_ireplace( '%wpb_element_content%', $iner, $elem );
		$output = $elem;

		return $output;
	}

	public function getTabTemplate() {
		return '<div class="wpb_template">' . do_shortcode( '[tm_slider_item title="Slide" slide_id=""][/tm_slider_item]' ) . '</div>';
	}

	public function setCustomTabId( $content ) {
		return preg_replace( '/slide\_id\=\"([^\"]+)\"/', 'slide_id="$1-' . time() . '"', $content );
	}
}

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-column.php' );

class WPBakeryShortCode_tm_slider_item extends WPBakeryShortCode_VC_Column {
	protected $controls_css_settings = 'tc vc_control-container';
	protected $controls_list = array( 'add', 'edit', 'clone', 'delete' );
	protected $predefined_atts = array(
		'slide_id' => TM_NEW_TITLE,
		'title' => ''
		);
	// protected $controls_template_file = 'editors/partials/backend_controls_tab.tpl.php';

	public function __construct( $settings ) {
		parent::__construct( $settings );
	}

	public function customAdminBlockParams() {
		return ' id="slide-' . $this->atts['slide_id'] . '"';
	}

	public function mainHtmlBlockParams( $width, $i ) {
		return 'data-element_type="' . $this->settings["base"] . '" class="wpb_' . $this->settings['base'] . ' wpb_sortable wpb_content_holder"' . $this->customAdminBlockParams();
	}

	public function containerHtmlBlockParams( $width, $i ) {
		return 'class="wpb_column_container vc_container_for_children"';
	}

	public function getColumnControls( $controls, $extended_css = '' ) {
		return $this->getColumnControlsModular( $extended_css );
	}
}
