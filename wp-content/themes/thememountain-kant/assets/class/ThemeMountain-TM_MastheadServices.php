<?php
namespace ThemeMountain {
	/**
	 * ThemeMountain Masthead Services
	 *
	 * This class is extended from TM_TemplateServices but can still work as an independent class.
	 *
	 * @package ThemeMountain
	 * @subpackage Core
	 * @since 1.0
	 */
	class TM_MastheadServices extends TM_TemplateServices {
		/**
		 * Public Run time variables
		 */

		/**
		 * Protected Run time variables
		 */

		/**
		 * Used for storing runtime post data such as page options and other post information.
		 *
		 * @since 1.0
		 * @access private
		 * @see        TM_TemplateServices::the_masthead_height_class()
		 *
		 * @var        string Page head height class
		 *
		 */
		private static $tm_masthead_height_class = '';

		/**
		 * End Properties
		 *
		 * Begin Method
		 */

		/**
		 * Class Constructor Magic Method.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       preprocess_custom_options_for_nav_menu action hook
		 * @see        TM_TemplateServices::on_template_include() preprocess_custom_options_for_nav_menu action hook is executed.
		 */
		public function __construct() {
			add_filter( 'tm_preprocess_custom_options', ['ThemeMountain\\TM_MastheadServices','preprocess_custom_options_for_masthead'] );
		}

		/**
		 * Public Methods for hooks
		 */

		/**
		 * Set up custom options for header. Namely the masthead.
		 *
		 * Add inline CSS into the header for custom settings Selects correct classes.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       TM_TemplateServices::$current_page_data[]  Data of currently displayed page.
		 *
		 * @see        TM_TemplateServices::on_template_include() This method is called.
		 */
		public static function preprocess_custom_options_for_masthead () {
			/**
			 * Masthead settings
			 */
			$_template_type = self::$current_page_data['post_type'];
			$_skip_page_head_title_settings = FALSE;

			/** Of Page Option */
			if ( is_singular() ) {
				/* choices of customizer, custom and none */
				$_use_custom_settings_of = (isset(parent::$current_page_data['options']['tm_use_masthead_title_settings_of'])) ? parent::$current_page_data['options']['tm_use_masthead_title_settings_of'] : '';

				/* in case of none */
				if( empty($_use_custom_settings_of) || $_use_custom_settings_of === 'none' ) {
						// explicityly set that the head title will not be used
					parent::$current_page_data['options']['use_masthead_title'] = FALSE;
						// not necessary to set the global settings
					$_skip_page_head_title_settings = TRUE;
					/* in case of custom */
				} else if ($_use_custom_settings_of === 'custom') {
					parent::$current_page_data['options']['use_masthead_title'] = TRUE;
					if(array_key_exists('thumbnail_image_id', self::$current_page_data)) {
						parent::$current_page_data['options']['tm_page_header_image_id'] = parent::$current_page_data['thumbnail_image_id'];
					}
						// not necessary to set the global settings
					$_skip_page_head_title_settings = TRUE;
				}
			}

			/**
			 * Use the global option (home) if use_custom_settings is false
			 */
			if( TM_Customizer::tm_get_theme_mod('tm_use_custom_settings_'.$_template_type) == FALSE ) {
				$_template_type = 'home';
			}

			/** Use customizer settings */
			if($_skip_page_head_title_settings === FALSE) {
				parent::$current_page_data['options']['use_masthead_title'] = TM_Customizer::tm_get_theme_mod('tm_use_masthead_title_'.$_template_type);
				/**
				 * If set to hide, return.
				 */
				if(parent::$current_page_data['options']['use_masthead_title'] == FALSE) return;
				/**
				 * otherwise keep on. The followins are all related to the page head title.
				 */
				parent::$current_page_data['options']['tm_page_header_image_id'] = attachment_url_to_postid(TM_Customizer::tm_get_theme_mod('tm_page_head_title_background_image_'.$_template_type));
				parent::$current_page_data['options']['tm_featured_media_type'] = 'image';
				parent::$current_page_data['options']['tm_page_head_title_background_color'] = TM_Customizer::tm_get_theme_mod('tm_page_head_title_background_color_'.$_template_type);
				parent::$current_page_data['options']['tm_page_head_title_font_color'] = TM_Customizer::tm_get_theme_mod('tm_page_head_title_font_color_'.$_template_type);
				/** @since Common Assets 1.1 */
				parent::$current_page_data['options']['tm_page_head_title_overlay_background_color'] = TM_Customizer::tm_get_theme_mod('tm_page_head_title_overlay_background_color_'.$_template_type);

				// tm_masthead_height
				parent::$current_page_data['options']['tm_masthead_height'] = 'regular';
			}

			/**
			 * Page Head Title color styles, Color for page head and caption
			 * We set the css here to avoid FOUC (Flash of Unstyled Content) issue
			 */
			if (
				isset(parent::$current_page_data['options']['use_masthead_title']) &&
				parent::$current_page_data['options']['use_masthead_title'] == TRUE
			) {
				$_page_head_title_font_color= parent::$current_page_data['options']['tm_page_head_title_font_color'];
				$_page_head_title_background_color = parent::$current_page_data['options']['tm_page_head_title_background_color'];
				// add inline css style
				if(!empty($_page_head_title_font_color)) {
					TM_StyleAndScripts::tm_add_inline_css_head(".page-head-title * { color: $_page_head_title_font_color;}");
				}
				if(!empty($_page_head_title_background_color)) {
					TM_StyleAndScripts::tm_add_inline_css_head(".page-head-title, .featured-media .tm-slider-container { background-color: $_page_head_title_background_color !important; }");
				}
				/**
				 * Height class and inline css
				 */
				switch (parent::$current_page_data['options']['tm_masthead_height']) {
					case 'custom':
						// Do nothing. TM_MastheadServices::the_masthead_height_attributes() and TM_MastheadServices::the_masthead_slider_height_attributes() are used instead.
						break;
					case 'window-height':
						self::$tm_masthead_height_class = ' window-height';
						break;
					default:
						// do nothing
						break;
				}
			}
		}

		/**
		 * Public Methods for accessing from front end files only
		 */

		/**
		 * Gets the type of page head height.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       TM_TemplateServices::get_current_page_data()
		 * @see        page_head_title.php
		 *
		 * @return     string|boolean  The page head type.
		 */
		public static function which_masthead_title_type () {
			/**
			 * All the settings are initialized in TM_TemplateServices::set_current_template_data();
			 */
			$thememountain_featured_media_type = parent::get_current_page_data(array('options','tm_featured_media_type'));
			$_use_masthead_title = parent::get_current_page_data(array('options','use_masthead_title'));
			$thememountain_page_header_image_id = parent::get_current_page_data(array('options','tm_page_header_image_id'));

			/**
			 * tm_featured_media_type is one of those page options that determine media type used
			 * for the page header
			 */
			$thememountain_featured_media_type = ($thememountain_featured_media_type != FALSE) ? $thememountain_featured_media_type : FALSE;

			/**
			 * tm_page_header_image_id is defined in TM_TemplateServices::set_current_template_data().
			 * If $thememountain_page_header_image_id is FALSE or 0, it means that the image does not exist.
			 */
			$_page_header_image_id = ($thememountain_page_header_image_id != FALSE) ? $thememountain_page_header_image_id : '';

			/**
			 * If page header image id is present Or Video is possibly set, page_header_slider is loaded.
			 * Otherwise show the page header with a solid background color.
			 */
			if( $_use_masthead_title == FALSE ){
				return FALSE;
			/* filter out those with image but image id is not specified */
			} else if( empty($_page_header_image_id) && $thememountain_featured_media_type === 'image' ) {
				return 'solid';
			/* anything other than none */
			} else if( $thememountain_featured_media_type !== 'none' ) {
				return 'slider';
			/* otherwise none */
			} else {
				return 'solid';
			}
		}

		/**
		 * Gets the page head height class.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       TM_TemplateServices::$tm_masthead_height_class
		 * @see        page_header-solid.php
		 * @see        page_header-slider.php
		 *
		 * @param      string $pageHeaderType 		Page Header Type. E.g. slider, solid.
		 *
		 * @return     string  The page head height class.
		 */
		public static function the_masthead_height_class ($pageHeaderType) {
			switch ($pageHeaderType) {
				case 'slider':
					echo 'section-block featured-media tm-slider-parallax-container page-head-title '.esc_attr(self::$tm_masthead_height_class);
					break;
				default: // solid
					echo 'section-block intro-title-1 page-head-title '.esc_attr(self::$tm_masthead_height_class);
					break;
			}
		}

		/**
		 * Returns inline style attribute for masthead height as well as minimum height
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       TM_TemplateServices::$current_page_data['options']['tm_page_head_min_height']
		 * @see        page_header-slider.php
		 *
		 * @return     string  inline style attribute  for the masthead.
		 */
		public static function the_masthead_height_attributes () {
			// blank var
			$_style_attribute = '';
			// conditions
			if (
				isset(parent::$current_page_data['options']['use_masthead_title']) &&
				parent::$current_page_data['options']['use_masthead_title'] == TRUE &&
				parent::$current_page_data['options']['tm_masthead_height'] === 'custom'
			) {
				$_style_attribute = " style='height: ".esc_attr(parent::$current_page_data['options']['tm_masthead_height_custom'])."px;'";
			}
			/** all the attributes escaped right above */
			echo ($_style_attribute);
		}

		/**
		 * Returns data attribute for masthead height as well as minimum height
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       TM_TemplateServices::$current_page_data['options']['tm_page_head_min_height']
		 * @see        page_header-slider.php
		 *
		 * @return     string  The data-scale-min-height and data-height (if necessary) attributes for the masthead.
		 */
		public static function the_masthead_slider_height_attributes () {
			// min height if set
			if(
				!array_key_exists('tm_page_head_min_height', parent::$current_page_data['options']) ||
				parent::$current_page_data['options']['tm_page_head_min_height'] === '' ||
				parent::$current_page_data['options']['tm_featured_media_type'] == 'none'
			) {
				$_data_attributes = "";
			} else if(parent::$current_page_data['options']['tm_page_head_min_height'] !== '') {
				// set the attribute line
				$_data_attributes = " data-scale-min-height='".esc_attr(parent::$current_page_data['options']['tm_page_head_min_height'])."'";
			}
			// custom height (if applicable)
			if (
				isset(parent::$current_page_data['options']['use_masthead_title']) &&
				parent::$current_page_data['options']['use_masthead_title'] == TRUE &&
				parent::$current_page_data['options']['tm_masthead_height'] === 'custom'
			) {
				$_data_attributes .= " data-height='".esc_attr(parent::$current_page_data['options']['tm_masthead_height_custom'])."'";
			}
			/** all the attributes escaped above */
			echo ($_data_attributes);
		}

		/**
		 * Returns data attribute for page head title animation
		 *
		 * @since 1.0
		 * @access public
		 * @uses       TM_TemplateServices::$current_page_data['options']['tm_page_head_title_animation']
		 * @see        page_header-solid.php
		 * @see        page_header-slider.php
		 *
		 * @return     string  The animation attributes for the page head title.
		 */
		public static function print_tm_page_head_title_horizon_class () {
			// animation if set
			if( !array_key_exists('tm_page_head_title_animation', parent::$current_page_data['options']) ) {
				$_horizon_class = " no-transition";
			} else if (
				parent::$current_page_data['options']['tm_page_head_title_animation'] === '' ||
				parent::$current_page_data['options']['tm_page_head_title_animation'] === 'none'
			) {
				$_horizon_class = " no-transition";
			} else if(!empty(parent::$current_page_data['options']['tm_page_head_title_animation'])) {
				// set the attribute line
				$_horizon_class = " horizon";
			}
			/** no need to escape because the variable is static. */
			echo ($_horizon_class);
		}

		/**
		 * Prints style attribute with value set in tm_page_head_title_overlay_background_color (Page Option)
		 *
		 * @since 1.0
		 * @access public
		 * @uses       TM_TemplateServices::$current_page_data['options']['tm_page_head_title_animation']
		 * @see        page_header-solid.php
		 */
		public static function print_overlay_element_for_title_overlay_background_color () {
			$thememountain_page_head_title_overlay_background_color = parent::get_current_page_data(array('options','tm_page_head_title_overlay_background_color'));
			if(!empty($thememountain_page_head_title_overlay_background_color)){
				$thememountain_page_head_title_overlay_background_color = esc_attr($thememountain_page_head_title_overlay_background_color);
				echo " <div class='tms-overlay' style='background-color: {$thememountain_page_head_title_overlay_background_color}; opacity: 0;'></div>";
			}
		}

		/**
		 * Prints data attribute for page head title animation
		 *
		 * @since 1.0
		 * @access public
		 * @uses       TM_TemplateServices::$current_page_data['options']['tm_page_head_title_animation']
		 * @see        page_header-solid.php
		 * @see        page_header-slider.php
		 *
		 * @return     string  The animation attributes for the page head title.
		 */
		public static function the_page_head_title_animate_in_attribute () {
			// animation if set
			if( !array_key_exists('tm_page_head_title_animation', parent::$current_page_data['options']) ) {
				$_data_animate_in = "";
			} else if (
				parent::$current_page_data['options']['tm_page_head_title_animation'] === '' ||
				parent::$current_page_data['options']['tm_page_head_title_animation'] === 'none'
			) {
				$_data_animate_in = "";
			} else if(!empty(parent::$current_page_data['options']['tm_page_head_title_animation'])) {
				// init variables. set to default.
				$_animation_duration = '1000';
				$_animation_delay = '0';
				// tm_page_head_title_animation_duration
				if(array_key_exists('tm_page_head_title_animation_duration',parent::$current_page_data['options'] )) {
					$_animation_duration = esc_attr(parent::$current_page_data['options']['tm_page_head_title_animation_duration']);
				}
				// tm_page_head_title_animation_delay
				if(array_key_exists('tm_page_head_title_animation_delay',parent::$current_page_data['options'] )) {
					$_animation_delay = esc_attr(parent::$current_page_data['options']['tm_page_head_title_animation_delay']);
				}
				// set the attribute line
				$_data_animate_in = " data-animate-in='preset:".esc_attr(parent::$current_page_data['options']['tm_page_head_title_animation']).";duration:".esc_attr($_animation_duration)."ms;delay:".esc_attr($_animation_delay)."ms;easing:easeFastSlow;'";
			}
			/** all the attributes are escaped above */
			echo ($_data_animate_in);
		}

		/**
		 * Prints Page Header Fullscreen Slider Section
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       TM_TemplateServices::get_current_page_data()
		 * @uses       TM_TemplateServices::tm_fromRGBtoHEX()
		 * @uses       TM_TemplateServices::generate_image_tag_from_id()
		 * @uses       TM_MastheadServices::the_page_head_title_animate_in_attribute()
		 *
		 * @see        page_header-slider.php
		 */
		public static function the_page_header_fullscreen_slider_contents($masthead_type = '') {
			/* init variables */
			$_image_html = $_video_html = $_video_html_attributes = $_slide_attributes = $_data_animate_in = $_video_options = '';
			$_show_caption = TRUE;
			$_tms_caption_margin = ' no-margin-bottom';
			/**
			 * Page options. All the settings are initialized in TM_TemplateServices::set_current_template_data();
			 */
			$thememountain_featured_media_type = parent::get_current_page_data(array('options','tm_featured_media_type'));
			$thememountain_page_header_image_id = parent::get_current_page_data(array('options','tm_page_header_image_id'));
			$thememountain_featured_media_youtube = parent::get_current_page_data(array('options','tm_featured_media_youtube'));
			$thememountain_featured_media_vimeo = parent::get_current_page_data(array('options','tm_featured_media_vimeo'));
			$thememountain_featured_media_video_mp4 = TM_TemplateServices::strip_http_and_https_from_link(parent::get_current_page_data(array('options','tm_featured_media_video_mp4')));
			$thememountain_featured_media_video_webm = TM_TemplateServices::strip_http_and_https_from_link(parent::get_current_page_data(array('options','tm_featured_media_video_webm')));
			$thememountain_featured_media_thumbnail = TM_TemplateServices::strip_http_and_https_from_link(parent::get_current_page_data(array('options','tm_featured_media_thumbnail')));
			$thememountain_featured_media_mute_video = parent::get_current_page_data(array('options','tm_featured_media_mute_video'));
			$thememountain_featured_media_loop_video = parent::get_current_page_data(array('options','tm_featured_media_loop_video'));
			$thememountain_featured_media_video_mode = parent::get_current_page_data(array('options','tm_featured_media_video_mode'));
			$thememountain_page_head_title_overlay_background_color = parent::get_current_page_data(array('options','tm_page_head_title_overlay_background_color'));

			/**
			 * tm_featured_media_type is one of those page options that determine media type used
			 * for the page header
			 */
			$thememountain_featured_media_type = (isset($thememountain_featured_media_type) && $thememountain_featured_media_type != FALSE) ? $thememountain_featured_media_type : FALSE;

			// return if $thememountain_featured_media_type is FALSE for any reasons (exception).
			if($thememountain_featured_media_type === FALSE) return;

			/**
			 * tm_page_header_image_id is defined in parent::set_current_template_data().
			 * If $thememountain_page_header_image_id is FALSE or 0, it means that the image does not exist.
			 */
			$_page_header_image_id = ($thememountain_page_header_image_id != FALSE) ? $thememountain_page_header_image_id : '';

			// Default slide attribute
			$_slide_attributes .= ' data-as-bkg-image';

			/**
			 * Overlay attributes
			 */
			if( $thememountain_page_head_title_overlay_background_color !=='' ) {
				$thememountain_page_head_title_overlay_background_color_converted = TM_TemplateServices::tm_fromRGBtoHEX($thememountain_page_head_title_overlay_background_color);
				$_slide_attributes .= " data-overlay-bkg-color='{$thememountain_page_head_title_overlay_background_color_converted[0]}' data-overlay-bkg-opacity='{$thememountain_page_head_title_overlay_background_color_converted[1]}'";
			}

			/**
			 * construct video html markup &amp;
			 *
			 * defines:
			 * 	$_slide_attributes
			 * 	$_video_html
			 */
			switch ($thememountain_featured_media_type) {
				case 'youtube':
					if(isset($thememountain_featured_media_youtube) && !empty($thememountain_featured_media_youtube)){
						$_slide_attributes .= ' data-pause-on-scroll data-video';
						// tm_featured_media_loop_video
						if(isset($thememountain_featured_media_loop_video) && $thememountain_featured_media_loop_video === 'loop') {
							$_video_options .= '&amp;loop=1';
						} else {
							$_video_options .= '&amp;loop=0';
						}
						// tm_featured_media_mute_video
						if(isset($thememountain_featured_media_mute_video) && $thememountain_featured_media_mute_video === 'play_sound') {
							// no action
						} else {
							// mute
							$_slide_attributes .= ' data-mute-video';
						}
						// background or regular
						if( $thememountain_featured_media_video_mode === 'background' ) {
							$_slide_attributes .= ' data-video-bkg-youtube data-force-fit';
							$_video_html_attributes = ' width="2500" height="1600"';
						} else {
							$_slide_attributes .= ' data-video';
							$_show_caption = FALSE;
							// reset to hide
							$_page_header_image_id = '';

						}
						// iframe tag name
						$_iframe_tag = 'iframe';
						$_video_html = '<'.$_iframe_tag.$_video_html_attributes.' src="//www.youtube.com/embed/'.esc_attr($thememountain_featured_media_youtube).'?enablejsapi=1'.esc_attr($_video_options).'" allow="autoplay"></'.$_iframe_tag.'>';
					} else {
						// no video. please set id
						$_slide_attributes .= ' data-image data-force-fit';
					}
					break;
				case 'vimeo':
					if(isset($thememountain_featured_media_vimeo) && !empty($thememountain_featured_media_vimeo)){
						$_slide_attributes .= ' data-pause-on-scroll data-video';
						// tm_featured_media_loop_video
						if($thememountain_featured_media_video_mode === 'regular'){
							if(isset($thememountain_featured_media_loop_video) && $thememountain_featured_media_loop_video === 'loop') {
								$_video_options .= '&amp;loop=1';
							} else {
								$_video_options .= '&amp;loop=0';
							}
						}
						// tm_featured_media_mute_video
						if(isset($thememountain_featured_media_mute_video) && $thememountain_featured_media_mute_video === 'play_sound') {

						} else {
							// mute
							$_slide_attributes .= ' data-mute-video';
						}

						// background or regular
						if( $thememountain_featured_media_video_mode === 'background' ) {
							$_slide_attributes .= ' data-video-bkg-vimeo data-force-fit';
							$_video_html_attributes = ' width="2500" height="1600"';
						} else {
							$_show_caption = FALSE;
							// reset to hide
							$_page_header_image_id = '';
						}
						// iframe tag name
						$_iframe_tag = 'iframe';
						$_video_html = '<'.$_iframe_tag.$_video_html_attributes.' src="//player.vimeo.com/video/'.esc_attr($thememountain_featured_media_vimeo).'?api=1'.$_video_options.'"  allow="autoplay"></'.$_iframe_tag.'>';
					} else {
						// no video. please set id
						$_slide_attributes .= ' data-image data-force-fit';
					}
					break;
				case 'html5':
					$_video_counter = 0;
					$_slide_attributes .= ' data-pause-on-scroll data-video';
						// tm_featured_media_mute_video
						if(isset($thememountain_featured_media_mute_video) && $thememountain_featured_media_mute_video === 'play_sound') {

						} else {
							// mute
							$_slide_attributes .= ' data-mute-bkg-video';
						}
					// background or regular
					if( $thememountain_featured_media_video_mode === 'background' ) {
						$_slide_attributes .= ' data-video-bkg';
					} else {
						$_show_caption = FALSE;
					}
					// video files
					if(isset($thememountain_featured_media_video_mp4) && !empty($thememountain_featured_media_video_mp4)) {
						$_video_html .= '<source type="video/mp4" src="'.esc_html($thememountain_featured_media_video_mp4).'" />';
						$_video_counter ++;
					}
					if(isset($thememountain_featured_media_video_webm) && !empty($thememountain_featured_media_video_webm)) {
						$_video_html .= '<source type="video/webm" src="'.esc_html($thememountain_featured_media_video_webm).'" />';
						$_video_counter ++;
					}
					// wrap around
					if(isset($thememountain_featured_media_thumbnail) && $_video_counter !== 0) {
						$_video_html = '<video poster="'.esc_html($thememountain_featured_media_thumbnail).'">'.$_video_html.'</video>';
					} else if ($_video_counter !== 0) {
						$_video_html = '<video>'.$_video_html.'</video>';
					} else {
						// no video. please set id
						$_slide_attributes .= ' data-image data-force-fit';
					}
					break;
				default:
					// default is image
					$_slide_attributes .= ' data-image data-force-fit';
					break;
			}

			// masthead type dependent
			if($masthead_type === 'kant'){
				$_tms_caption_margin = ' mb-10';
			}

			// Construct image if any
			// $_slide_attributes attributes escaped already
			?>
			<li class="tms-slide"<?php echo ($_slide_attributes); ?>>
				<?php if($_show_caption === TRUE) { ?>
				<div class="tms-content">
					<div class="tms-content-inner center">
						<div class="row">
							<div class="column width-12">
								<h1 class="tms-caption title-xlarge<?php echo ($_tms_caption_margin);?>"<?php self::the_page_head_title_animate_in_attribute(); ?> data-no-scale><?php echo esc_html(parent::get_current_page_data('title')); ?></h1>
							<?php if($masthead_type === 'kant' && is_single() && get_post_type() === 'post'){
								global $post;
								$_post_id = $post->ID;
								?>
								<div class="clear"></div>
								<p class="tms-caption post-info text-medium no-margins" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:400ms;" data-no-scale>
									<span class="post-date"><?php echo get_the_date('',$_post_id); ?></span>, <span class="author">By <?php echo get_the_author_meta('display_name',get_post_field( 'post_author', $_post_id )); ?></span>, <span class="category">in <?php echo TM_TemplateServices::get_category_name_and_links(1); ?></span>
								</p>
							<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php
					if(!empty($_page_header_image_id)) {
						/*+ generate_image_tag_from_id is a wrapper method which returns wp_get_attachment_image() */
						echo parent::generate_image_tag_from_id($_page_header_image_id,parent::get_current_page_data('title'));
					}
				?>
				<?php
					/** url and paramters in the html mark up contained in the $_video_html variable are already escaped in advance above while $_slide_attributes is escaped at the very last moment (according to the Always Escape Late). */
					echo ($_video_html);
				?>
			</li>
			<?php
		}

		/**
		 * Public Methods for accessing from broad external files including admin.
		 */


		/**
		 *	Protected Methods
		 */


		/**
		 * End
		 */
	}
}