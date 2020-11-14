<?php
namespace ThemeMountain {
	/**
	 * Initializes Kirki Customizer menu.
	 *
	 * Initializes Kirki if it is available. It also handles ajax request (for custom Kirki UI). Without Kirki plugin activated, certain Customizer setting items are not available but the option setting values are still effective.
	 *
	 * @package ThemeMountain
	 * @subpackage Core
	 * @since 1.0
	 * @uses       Kirki, TM_ThemeServices
	 * @uses       TM_ThemeMountain
	 */
	class TM_Customizer extends TM_ThemeMountain {
		/**
		 * Shared Config
		 */

		/**
		 * Holds customizer configuration settings.
		 *
		 * Used for Customizer Options powered by Kirki but is also used as a reference even when Kirki is not active. TM_Customizer::tm_get_theme_mod() method is used to read setting item value. TM_Customizer::get_theme_mod_field_property() is also used to retrieve settings of cerrtain field at once.
		 *
		 * Please be reminded that some of the default values are merged with those defined in the layout config stored in TM_ThemeServices::$theme_styles only when Kirki is active. See TM_Customizer::merge_theme_mod_fields_with_current_theme_style_settings().
		 *
		 * Array Structure
		 *
		 * array (
		 * 		[0] array('theme-id-used-for-customizer'), // Required by Kirki to identifty setting item group
		 * 		[1] array(
		 * 			["settings"] => string Customizer Setting item field id
		 * 			["type"]=>  string Kirki Customizer Field Type
		 *		    ["label"]=> string Kirki Customizer Label
		 *		    ["section"]=> string Customizer Section ID
		 *		    ["description"]=> string Customizer description
		 *		    ["default"]=> string|integer|boolean The default value
		 *		    ["priority"]=> integer Priority in Customizer
		 *			["active_callback"]=> array Kirki dependency option
		 *			// ThemeMountain custom properties
		 *		    ["customizer_default_slug"] => string Uses the default value of field as specified id instead.
		 *			// ThemeMountain CSS - All defined in current theme style are output according to the followings
		 *		    ["css_selector"]=> string ThemeMountain theme uses this property for css output
		 *		    ["css"]=> string ThemeMountain theme uses this property for css output. Uses sprintf.
		 *		    ["do_custom_enqueue"] => boolean ignored in queue if TRUE
		 * 		),
		 * 		[2] array( string or integer of current setting value defiend dynamically at run time )
		 * ), ...
		 *
		 * @since 1.0
		 * @access private
		 * @var array
		 * @uses       TM_Customizer::tm_add_customizer_field() Registering a field.
		 * @see        TM_Customizer::tm_get_theme_mod()
		 * @see        TM_Customizer::get_theme_mod_field_property()
		 * @see        TM_Customizer::merge_theme_mod_fields_with_current_theme_style_settings()
		 */
		private static $theme_mod_fields = array ();

		/**
		 * Kirki Customizer Config
		 * $theme_mod_fields is in this class
		 */

		/**
		 * Kirki Customizer Panels configuration
		 *
		 * Ready to be set e.g. \Kirki::add_panel($_key,$_value)
		 *
		 * @since 1.0
		 * @access private
		 * @uses       TM_Customizer::tm_add_customizer_panel()
		 * @see        TM_Customizer::setup_kirki()
		 *
		 * @var        array
		 */
		private static $theme_mod_panels = array ();

		/**
		 * Kirki Customizer Sections configuration
		 *
		 * Ready to be set e.g. \Kirki::add_section($_key,$_value)
		 *
		 * @since 1.0
		 * @access private
		 * @uses       TM_Customizer::tm_add_customizer_section()
		 * @see        TM_Customizer::setup_kirki()
		 *
		 * @var        array
		 */
		private static $theme_mod_sections = array ();

		/**
		 * ThemeMountain Font Pairs
		 *
		 * The data is used to dynamically update the font pair UI with javascript. (see custom-customizer-ui.js)
		 *
		 * Array Structure
		 * 		Font pair name (do not use colon or anything that could cause problem when they are in array)
		 * 		field type:
		 * 			typography
		 *    			tm_body_font
		 * 	     		tm_title_font
		 * 	     		tm_lead_font (added on 30 Mar 2016)
		 * 	     		tm_blockquote_font (added on 30 Mar 2016)
		 *          text
		 *          	tm_title_font_target
		 *          	tm_lead_font_target (added on 30 Mar 2016)
		 *          	tm_blockquote_font_target (added on 30 Mar 2016)
		 * 			color
		 * 		 		tm_font_link_color
		 * 		   		tm_font_link_color_hover
		 *
		 * Note: font variant of 400 must be set as "regular" please see https://kirki.org/docs/controls/typography.html for specifications
		 *
		 * @since 1.0
		 * @access private
		 * @uses       TM_Customizer::tm_add_customizer_font_pairs()
		 * @see        TM_Customizer::customize_preview_js_css()
		 *
		 * @var        array
		 */
		private static $font_presets = array ();

		/**
		 * Blog loop layout styles
		 *
		 * @see        tm_loop_style_* customizer option in section tm_layout_*
		 * @var        string	$tm_loop_style_default
		 * @var        array 	$tm_loop_style_choices
		 */
		public static $tm_loop_style_default = '';
		public static $tm_loop_style_choices = array();

		/**
		 * Class Constructor Magic Method.
		 *
		 * @since 1.0
		 * @access public
		 */
		public function __construct() {
			/**
			 * tm_load_customizer_fields hook is provide to load any additional customizer settings.
			 */
			do_action('tm_load_customizer_fields');


			/**
			 * Load font presets.
			 * Required by fields_content_font_settings.php loaded as one of field settings.
			 *
			 * @uses       TM_Customizer::tm_add_customizer_font_pairs()
			 * @uses       TM_Customizer::$font_presets
			 * @see        fields_content_font_settings.php
			 * @see        custom-customizer-ui.js Handles font preset changes.
			 */
			parent::locate_template_in_dir('inc/font-presets/font_presets.php');

			/**
			 * Load fields data for customizer. The field data is always required even when Kirki is not active.
			 * The field settings files are all stored under assets/customizer/fields directory.
			 */
			parent::locate_template_in_dir('assets/customizer/fields/*');

			/**
			 * Set up Kirki if Kirki plugin is active.
			 */
			if ( class_exists( 'Kirki' ) ) {
				// set up kirki
				add_action( 'init',['ThemeMountain\\TM_Customizer','setup_kirki']);
			} else {
				add_action( 'init',['ThemeMountain\\TM_Customizer','merge_theme_mod_fields_with_current_theme_style_settings']);
			}
		}

		/**
		 * Kirki related. Used only when Kirki is active.
		 * Public Methods for hooks
		 */

		/**
		 * Sets up Kirki
		 *
		 * @since 1.0
		 * @access public
		 * @uses       TM_ThemeMountain::locate_template_in_dir()
		 * @uses       TM_ThemeMountain::is_pagenow()
		 * @uses       TM_ThemeMountain::$theme_id
		 * @uses       TM_Customizer::merge_theme_mod_fields_with_current_theme_style_settings()
		 * @uses       Kirki
		 */
		public static function setup_kirki () {
			/**
			 * Create a Kirki Configuration with the text domain as the configuration id.
			 */
			\Kirki::add_config( parent::$theme_id, array(
				'capability'    => 'edit_theme_options',
				'disable_output'   => TRUE,
				) );

			/**
			 * include Customizer configs (Kirki required)
			 * fields*.php are loaded in the constructor of this class
			 */
			parent::locate_template_in_dir('assets/customizer/panels.php');
			parent::locate_template_in_dir('assets/customizer/sections.php');

			/**
			 * Changes default WP behaviors
			 */
			add_action( 'customize_register', array('ThemeMountain\\TM_Customizer', 'customize_register'));
			add_action( 'customize_register', array('ThemeMountain\\TM_Customizer', 'customizer_sections'));

			/**
			 * customize_controls_enqueue_scripts for the customizer UI.
			 * use customize_preview_init hook to load the script in the preview frame
			 * as well as css
			 */
			add_action( 'customize_controls_enqueue_scripts', array('ThemeMountain\\TM_Customizer', 'customize_preview_js_css'));

			// rest font preset chooser if tm_show_advanced_font_settings (manual) is on
			if( parent::is_pagenow('customize.php') == TRUE && get_theme_mod('tm_show_advanced_font_settings') == 1 ) {
				remove_theme_mod('tm_content_font_presets');
			}

			// register panels
			foreach (self::$theme_mod_panels as $_key => $_value) {
				\Kirki::add_panel($_key,$_value);
			}

			// register section
			foreach (self::$theme_mod_sections as $_key => $_value) {
				\Kirki::add_section($_key,$_value);
			}

			/**
			 * Merge Theme Mod Fields with Current Theme Style Default Settings values
			 */
			self::merge_theme_mod_fields_with_current_theme_style_settings();

			/**
			 * Add fields config to Kirki
			 */
			foreach (self::$theme_mod_fields as $_value) {
				if(array_key_exists( 'customizer_default_slug', $_value[1] )) {
					$_customizer_default_slug = $_value[1]['customizer_default_slug'];
					$_value[1]['default'] = (array_key_exists('default', $_value[1])) ? self::$theme_mod_fields[$_customizer_default_slug][1]['default'] : '';
				}
				/**
				 * If [0] is not set, the customizer setting option exists.
				 */
				if(isset($_value[0])) {
					\Kirki::add_field($_value[0],$_value[1]);
				}
			}
		}

		/**
		 * Merge Theme Mod Fields with Current Theme Style Default Settings values
		 *
		 * @since 1.0
		 * @access public
		 * @uses       TM_Customizer::$theme_mod_fields
		 * @uses       TM_ThemeServices::get_current_theme_style_properties()
		 * @see        TM_Customizer::setup_kirki
		 */
		public static function merge_theme_mod_fields_with_current_theme_style_settings () {
			$_current_theme_style_settings = TM_ThemeServices::get_current_theme_style_properties('settings');
			foreach ($_current_theme_style_settings as $_key => $_value) {
				if($_value !== NULL) {
					self::$theme_mod_fields[$_key][1]['default'] = $_value;
				}
			}
		}

		/**
		 * Used to enqueue javascript as well as font presets javascript variables for enhancing the Customizer functionality.
		 *
		 * 'customize_controls_enqueue_scripts' action hook is used to limit the scope of execution.
		 *
		 * @since 1.0
		 * @access public
		 * @uses       Kirki
		 */
		public static function customize_preview_js_css () {
			/**
			 * Enqueue CSS for customizing Kirki and Customizer
			 */
			wp_enqueue_style(  'tm-custom-customizer-ui', get_template_directory_uri().'/assets/css/admin/custom-customizer-ui.css' );
			/**
			 * Enqueue script for customizing Kirki and Customizer
			 */
			wp_enqueue_script( 'tm-custom-customizer-ui', get_template_directory_uri() . '/assets/js/custom-customizer-ui.js', array('jquery'), TM_ThemeServices::$theme_version, TRUE );
			/**
			 * Used for ThemeMountain Font Pairs chooser in the Customizer.
			 */
			if(!empty(self::$font_presets )) {
				// wp_localize_script() outputs data as a javascript variable in the html.
				wp_localize_script( 'tm-custom-customizer-ui', 'tm_font_presets', self::$font_presets );
			}
		}

		/**
		 * Removes and reset the customizer settings.
		 *
		 * AJAX call for Kirki invoked by javascript (tm-custom-customizer-ui).
		 *
		 * @since 1.0
		 * @access public
		 * @uses       Wordpress core remove_theme_mod()
		 * @see        TM_Customizer::customize_preview_js_css()
		 */
		public static function tm_reset_theme_mod () {
			foreach ( self::$theme_mod_fields as $key => $value ) {
				remove_theme_mod( $key );
			}
		}

		/**
		 * Transport set to postMessage for custom js controls for preview
		 *
		 * @since 1.0
		 * @access public
		 * @param      object WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public static function customize_register( $wp_customize ) {
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		}

		/**
		 * Removes default sections
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @param  object WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public static function customizer_sections ( $wp_customize ) {
			$wp_customize->remove_section( 'nav' );
			$wp_customize->remove_section( 'colors' );
			$wp_customize->remove_section( 'header_image' );
			$wp_customize->remove_section( 'background_image' );

			/**
			 * NOTE: widgets Panels can not be hidden.
			 */

			// move control section
			// $wp_customize->get_control( 'custom_logo' )->section = 'tm_navigation_header_logo';
		}

		/**
		 * Kirki related. Used only when Kirki is active.
		 * Public Methods accessed from both classes and config files.
		 */

		/**
		 * Returns as is.
		 *
		 * Used in 'sanitize_callback' of 'tm_title_font_target' customizer field.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @param      any  $value  The value
		 *
		 * @return     any The value as is.
		 */
		public static function return_as_is ($value) {
			return $value;
		}

		/**
		 * Add Customizer Panel ($theme_mod_panels). $theme_mod_panels is private accessible only within this class.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @param      string  $option_name  The option name
		 * @param      array  $field_array  The field array for the customizer field settings
		 */
		public static function tm_add_customizer_panel ($option_name, $data_array) {
			self::$theme_mod_panels[$option_name] = $data_array;
		}

		/**
		 * Add Customizer Section ($theme_mod_sections). $theme_mod_sections is private accessible only within this class.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @param      string  $option_name  The option name
		 * @param      array  $data_array  The field array for the customizer field settings
		 */
		public static function tm_add_customizer_section ($option_name, $data_array) {
			self::$theme_mod_sections[$option_name] = $data_array;
		}

		/**
		 * Add Font Pairs to be used for Kirki Customizer
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @param      string  $option_name  The option name
		 * @param      array  $data_array   The data array
		 */
		public static function tm_add_customizer_font_pairs ($data_array) {
			self::$font_presets = $data_array;
		}

		/**
		 * Returns a list of registered fonts for the Customizer select dropdown choices.
		 *
		 * @uses       TM_Customizer::$font_presets
		 */
		public static function get_registered_font_pairs_choices () {
			// get customizer strings
			$_customizer_str = TM_ThemeStrings::$text_strings['customizer'];
			$_choices = array('none' => $_customizer_str['tm_content_font_presets'][2]);
			foreach (self::$font_presets as $_key => $_value) {
				$_choices = $_choices + array($_key => $_key);
			}
			return $_choices;
		}

		/**
		 * END of Kirki setcion
		 */

		/**
		 * Methods related to Customizer Field Config.
		 * Public methods accessible from anywhere.
		 */

		/**
		 * Returns Customizer theme mod by option name.
		 *
		 * @since 1.0
		 * @access public
		 * @uses       TM_Customizer::$theme_mod_fields The array containing field data
		 *
		 * @param      string  $option_name  	The option name
		 * @param      boolean $get_default		Return default if set to TRUE.
		 *
		 * @return     boolean|string|integer  The value of setting item. Returns FALSE is there is any problem.
		 */
		public static function tm_get_theme_mod ($option_name,$get_default = FALSE) {
			if(!array_key_exists($option_name,self::$theme_mod_fields)) {
				return FALSE;
			} else if ($get_default === TRUE) {
				if( isset(self::$theme_mod_fields[$option_name][1]['default']) ) {
					return self::$theme_mod_fields[$option_name][1]['default'];
				} else if(isset(self::$theme_mod_fields[$option_name][1]['customizer_default_slug'])) {
					$_customizer_default_slug = self::$theme_mod_fields[$option_name][1]['customizer_default_slug'];
					if(isset(self::$theme_mod_fields[$_customizer_default_slug][1]['default'])) {
						return self::$theme_mod_fields[$_customizer_default_slug][1]['default'];
					} else {
						return FALSE;
					}
				} else {
					return FALSE;
				}
			} else if(empty(self::$theme_mod_fields[$option_name][2])) {
				if( isset(self::$theme_mod_fields[$option_name][1]['default']) ) {
					self::$theme_mod_fields[$option_name][2] = get_theme_mod($option_name,self::$theme_mod_fields[$option_name][1]['default']);
					return self::$theme_mod_fields[$option_name][2];
				} else if(isset(self::$theme_mod_fields[$option_name][1]['customizer_default_slug'])) {
					// if customizer_default_slug is set it USES the default value of that as specified by customizer_default_slug.
					$_customizer_default_slug = self::$theme_mod_fields[$option_name][1]['customizer_default_slug'];

					if(isset($option_name,self::$theme_mod_fields[$_customizer_default_slug][1]['default'])) {
						self::$theme_mod_fields[$option_name][2] = get_theme_mod($option_name,self::$theme_mod_fields[$_customizer_default_slug][1]['default']);
					} else {
						self::$theme_mod_fields[$option_name][2] = get_theme_mod($option_name);
					}

					return self::$theme_mod_fields[$option_name][2];
				}
				return FALSE;
			} else {
				return self::$theme_mod_fields[$option_name][2];
			}
		}

		/**
		 * Gets the $theme_mod_fields property.
		 *
		 * @since 1.0
		 * @access public
		 * @uses       TM_Customizer::$theme_mod_fields
		 * @see        TM_StyleAndScripts::enqueueInlineCustomizerCss(),
		 *
		 * @param      string  $option_name    The option name
		 * @param      string  $property_name  The property name
		 *
		 * @return     string|NULL  The theme modifier property.
		 */
		public static function get_theme_mod_field_property($option_name,$property_name = NULL) {
			if(
				isset(self::$theme_mod_fields[$option_name]) &&
				!isset(self::$theme_mod_fields[$option_name][1][$property_name])
			) {
				return self::$theme_mod_fields[$option_name][1];
			} else if(
				isset(self::$theme_mod_fields[$option_name]) &&
				isset(self::$theme_mod_fields[$option_name][1][$property_name])
			) {
				return self::$theme_mod_fields[$option_name][1][$property_name];
			}
			// no matches
			return NULL;
		}

		/**
		 * Add Customizer field ($theme_mod_fields).
		 *
		 * Used in customizer field files under customizer/fields directory. The $field_array is formatted so that it is ready to be used e.g. \Kirki::add_field($field_array[0],$field_array[1]).
		 *
		 * @since 1.0
		 * @access public
		 * @uses       TM_ThemeServices::$theme_mod_fields
		 *
		 * @param      string $option_name 	Option name
		 * @param      array $field_array 	Field array compatible with Kirki Customizer field configuration.
		 */
		public static function tm_add_customizer_field ($option_name, $field_array) {
			$field_array[1]['settings'] = $option_name;
			self::$theme_mod_fields[$option_name] = $field_array;
		}

		/**
		 * Evaluate Active callback ('active_callback') of the self::$theme_mod_fields.
		 *
		 * @since 1.0
		 * @access protected
		 * @uses       TM_Customizer::$theme_mod_fields,
		 * @uses       TM_Customizer::dynamicComparisonOperator()
		 * @uses       TM_Customizer::tm_get_theme_mod
		 * @see        TM_TemplateServices::tm_return_field_data_attribute()
		 * @see        TM_StyleAndScripts::enqueueInlineCustomizerCss()
		 *
		 * @param      string $option_name Option name
		 *
		 * @return boolean True if condition met. Otherwise false. IF active_callback is not present, return NULL.
		 */
		public static function evaluate_active_callback ( $option_name ) {
			$_theme_mod_field = self::$theme_mod_fields[$option_name][1];
			/**
			 * Skip this if is_advanced_toggle
			 */
			if( isset($_theme_mod_field['is_advanced_toggle']) ) {
				return FALSE;
			}
			/**
			 * No active callback evaluation needed. return NULL to identify this result.
			 */
			if( is_array($_theme_mod_field) && !array_key_exists('active_callback', $_theme_mod_field) ) {
				return NULL;
			}
			/**
			 * Evaluate conditions.
			 */
			$_active_callback = $_theme_mod_field['active_callback'];
			$_result = TRUE;
			foreach($_active_callback as $_condition ) {
	 			// setting is a string with id that needs to be evaluated
				$_setting = $_condition['setting'];
				// $_operator is a string with comparison operator such as ==, != etc.
				$_operator = $_condition['operator'];
				$_value = $_condition['value'];
				$_value_of_setting = self::tm_get_theme_mod($_setting);
				/**
				 * all the conditions in the array must be met to be qualified. In other terms
				 * return FALSE if any one of them do not meet any of the conditions given.
				 */
				if(self::dynamicComparisonOperator($_value, $_value_of_setting, $_operator) === FALSE) {
					$_result = FALSE;
				}
			}
			return $_result;
		}

		/**
		 * Private Methods
		 */

		/**
		 * Compare a pair of string values with dynamic comparison operator.
		 *
		 * @since 1.0
		 * @access private
		 * @see        TM_ThemeServices::get_theme_style_ids_and_names()
		 *
		 * @param      integer  $value1    The value 1
		 * @param      integer  $value2    The value 2
		 * @param      string  $operator  The operator
		 *
		 * @return     boolean  Result of comparison
		 */
		private static function dynamicComparisonOperator( $value1, $value2, $operator ) {
			switch ( $operator ) {
				case '===':
					return $value1 === $value2;
				case '==':
				case '=':
				case 'equals':
				case 'equal':
					return $value1 == $value2; // jshint ignore:line
				case '!==':
					return $value1 !== $value2;
				case '!=':
				case 'not equal':
					return $value1 != $value2; // jshint ignore:line
				case '>=':
				case 'greater or equal':
				case 'equal or greater':
					return $value1 >= $value2;
				case '<=':
				case 'smaller or equal':
				case 'equal or smaller':
					return $value1 <= $value2;
				case '>':
				case 'greater':
					return $value1 > $value2;
				case '<':
				case 'smaller':
					return $value1 < $value2;
				case 'contains':
				case 'in':
					if ( is_array( $value1 ) && ! is_array( $value2 ) ) {
						$array  = $value1;
						$string = $value2;
					} elseif ( is_array( $value2 ) && ! is_array( $value1 ) ) {
						$array  = $value2;
						$string = $value1;
					}
					if ( isset( $array ) && isset( $string ) ) {
						if ( ! in_array( $string, $array, true ) ) {
							$_show = FALSE;
						}
					} else {
						if ( false === strrpos( $value1, $value2 ) && false === strpos( $value2, $value1 ) ) {
							$_show = FALSE;
						}
					}
					if ( isset( $_show ) ) {
						return $_show;
					} else {
						return true;
					}
					break;
				default:
					return TRUE;

			}
		}

		/**
		 * End
		 */
	}
}