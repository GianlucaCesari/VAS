<?php
namespace ThemeMountain {
	/**
	 * Customizes WP default functions' behavior through officially available action hooks and filters.
	 *
	 * @package ThemeMountain
	 * @subpackage Core/marquez-by-thememountain
	 * @since 1.0
	 * @uses       TM_ThemeServices
	 */
	class TM_CustomFunctions extends TM_ThemeServices
	{
		/**
		 * Class Constructor Magic Method.
		 *
		 * @since 1.0
		 * @access public
		 */
		public function __construct()
		{
			/**
			 * Customization hooks
			 */
			add_action('init', ['ThemeMountain\\TM_CustomFunctions', 'tm_add_excerpts_to_pages']);
			add_action('after_setup_theme', array('ThemeMountain\\TM_CustomFunctions', 'remove_rest_output_link_wp_head'));

			/**
			 * Customization filters
			 */
			// add_filter( 'pre_get_posts', ['ThemeMountain\\TM_CustomFunctions','tm_exclude_pagetemplates_from_loop'] );
			add_filter('wp_insert_post_data', ['ThemeMountain\\TM_CustomFunctions', 'default_comments_off'], '', 2);
			add_filter('comment_form_fields', ['ThemeMountain\\TM_CustomFunctions', 'wpb_move_comment_field_to_bottom']);
			add_filter('get_custom_logo', ['ThemeMountain\\TM_CustomFunctions', 'tm_get_custom_logo']);
			add_filter('get_the_excerpt', ['ThemeMountain\\TM_CustomFunctions', 'custom_excerpt']);
			add_filter('excerpt_more', function ($more) {return ' ... ';});
			/**
			 * Needs for admin bar height fix. Tm's core css adjust the rest nicely.
			 *
			 * @see        _admin_bar_bump_cb()
			 * @see        WP_Admin_Bar::initialize()
			 */
			// add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
		}

		/**
		 * Sets default comments to off
		 */
		public static function default_comments_off($data, $postarr)
		{
			if ($data['post_type'] == 'tm_folio') {
				if (!($postarr['ID'])) {
					$data['comment_status'] = 0;
				}
			}
			return $data;
		}

		/**
		 * Returns a custom logo, linked to home. customized for ThemeMountain
		 *
		 * if 'custom_logo' is not set, the product logo will be shown instead.
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       TM_ThemeServices::get_current_theme_style_id()    Gets the current theme style id
		 *
		 * @param int $blog_id Optional. ID of the blog in question. Default is the ID of the current blog.
		 * @return string Custom logo markup.
		 */
		public static function tm_get_custom_logo($html_for_custom_logo = '', $blog_id = 0)
		{
			// the $html_for_custom_logo is handed from the Wordpress. We set blank once here.
			$html_for_custom_logo = '';

			// TM theme style id. e.g. degault, boxed etc.
			$_current_theme_style_id = parent::get_current_theme_style_id();

			if (is_multisite() && (int) $blog_id !== get_current_blog_id()) {
				switch_to_blog($blog_id);
			}

			// read settings
			$thememountain_logo_top_id = TM_Customizer::tm_get_theme_mod('custom_logo');

			/**
			 * Get Top Logo HTML Markup
			 */

			// Top Logo
			$_html_for_top_logo = '<!-- Top Logo -->' . self::get_site_logo_img_tag_by_id($thememountain_logo_top_id, get_template_directory_uri() . '/images/theme-logo-mini.png') . "\n";

			/**
			 * Get Body Logo HTML Markup
			 */

			// body logo
			switch (TM_Customizer::tm_get_theme_mod('tm_use_body_logo')) {
				case 'differrent_from_top_logo':
					$_logo_body_id = TM_Customizer::tm_get_theme_mod('tm_logo_body');
					break;
				case 'same_as_top_logo':
					$_logo_body_id = (empty($thememountain_logo_top_id)) ? '' : $thememountain_logo_top_id;
					break;
				default: // none
					$_logo_body_id = null;
					break;
			}

			// body logo only if necessary
			if(!is_null($_logo_body_id)){
				$_html_for_body_logo = '<!-- Body Logo -->' . self::get_site_logo_img_tag_by_id($_logo_body_id, get_template_directory_uri() . '/images/theme-logo.png');
				/**
				 * The html markup output inverted only when the current theme style is boxed.
				 */
				if ($_logo_body_id !== null && $_current_theme_style_id === 'boxed') {
					$html_for_custom_logo = $_html_for_top_logo . "\n" . $_html_for_body_logo;
				} else {
					$html_for_custom_logo .= $_html_for_body_logo . "\n" . $_html_for_top_logo;
				}
			} else {
				$html_for_custom_logo = $_html_for_top_logo;
			}

			if (is_multisite() && ms_is_switched()) {
				restore_current_blog();
			}

			return $html_for_custom_logo;
		}
		/**
		 * Support function for tm_get_custom_logo()
		 *
		 * @param      <integer|string>   The custom logo ID or Url
		 *
		 * @return     string  logo image tag html markup.
		 */
		private static function get_site_logo_img_tag_by_id($attachement_id, $default_image_url)
		{
			$_html = '';

			if ($attachement_id) {
				if (strpos($attachement_id, 'http') === 0) {
					// convert to id if it is url
					$attachement_id = attachment_url_to_postid($attachement_id);
				}
				$_html = sprintf('<a href="%1$s">%2$s</a>',
					esc_url(home_url('/')),
					wp_get_attachment_image($attachement_id, 'full', false, array(
						'alt' => 'Site Logo'))
				);
			} else {
				$_url = esc_url(home_url('/'));
				$_image_url = $default_image_url;
				$_html = "<a href='{$_url}'><img src='{$_image_url}' alt='Product Logo'></a>";
			}
			return $_html;
		}

		/**
		 * Support function to find out if a post has any ping or trackback
		 *
		 * @param      String     $type        pings, pingback or trackback
		 * @param      Integer     $post_id
		 */
		public static function has_pings($type, $post_id)
		{
			$_comments = get_comments('status=approve&type=' . $type . '&post_id=' . $post_id);
			$_comments = separate_comments($_comments);
			return 0 < count($_comments[$type]);
		}

		/**
		 * TM custom wp_list_comments
		 */
		public static function tm_list_comments($comment, $args, $depth)
		{
			$GLOBALS['comment'] = $comment;?>
			<li <?php comment_class();?> id="li-comment-<?php comment_ID();?>">
				<article class="comment" id="comment-<?php comment_ID();?>">
					<div class="user-avatar">
					<?php echo get_avatar($comment, $size = '70'); ?>
					</div>
					<?php if ($comment->comment_approved == '0'): ?>
					<div class="comment-content">
						<h5><?php echo TM_ThemeStrings::$text_strings['TM_CustomFunctions']['comment_waiting_for_moderation']; ?></h5>
					</div>
					<?php else: ?>
					<div class="comment-content">
						<h5 class="name"><?php
if ($comment->user_id != '0') {
				echo get_user_meta($comment->user_id, 'nickname', true);
			} else {
				echo get_comment_author_link();
			}
			?></h5>
						<div class="comment-meta commentmetadata">
							<a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>" class="comment-time"><?php printf(TM_ThemeStrings::$text_strings['TM_CustomFunctions']['comment_time'], get_comment_date(), get_comment_time())?></a>/<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])))?><?php edit_comment_link(TM_ThemeStrings::$text_strings['TM_CustomFunctions']['edit'], '  ', '')?>
						</div>
						<?php comment_text()?>
					</div>
					<?php endif;?>
				</article>
		<?php
// note : Note the lack of a trailing </li>. In order to accommodate nested replies, WordPress will add an appropriate closing tag after listing any child elements.
		}

		/**
		 * changes the form output order in comment forms
		 */
		public static function wpb_move_comment_field_to_bottom($fields)
		{
			$comment_field = $fields['comment'];
			unset($fields['comment']);
			$fields['comment'] = $comment_field;
			return $fields;
		}

		/**
		 * page excerpt support
		 */
		public static function tm_add_excerpts_to_pages()
		{
			add_post_type_support('page', 'excerpt');
		}

		/**
		 * Removes rest output link wp_head. This is a workaround to avoid w3c error.
		 */
		public static function remove_rest_output_link_wp_head(){
			remove_action('wp_head', 'rest_output_link_wp_head', 10);
			remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
		}

		/**
		 * Exclude page templates from loop
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @uses       pre_get_posts filter hook
		 *
		 * @param      StdObject $query Query object
		 */
		public static function tm_exclude_pagetemplates_from_loop($query)
		{
			global $wp_the_query;
			if (($wp_the_query === $query) && !is_admin()) {
				$_meta_query = array(
					'meta_query' => array(
						array(
							'key' => '_wp_page_template',
							'value' => 'homepage_with_posts.php',
							'compare' => '!=',
						),
					),
				);
				$query->set('meta_query', $_meta_query);
			}
		}

		/**
		 * Utilities
		 */
		/**
		 * show previous_posts_link and next_posts_link at once
		 */
		public static function displayPostNav()
		{
			previous_posts_link();
			next_posts_link();
			return false;
		}
		/**
		 * show post thumbnail.
		 */
		public static function displayPostThumbnail()
		{
			the_post_thumbnail();
			return false;
		}

		/******************************************************************************
		 * @Author: Boutros AbiChedid
		 * @Date: June 20, 2011
		 * @Websites: http://bacsoftwareconsulting.com/ ; http://blueoliveonline.com/
		 * @Description: Preserves HTML formating to the automatically generated Excerpt.
		 * Also Code modifies the default excerpt_length and excerpt_more filters.
		 * @Tested: Up to WordPress version 3.1.3
		 * Also it supports shortcodes in excerpt text.
		 *******************************************************************************/
		public static function custom_excerpt($text)
		{
			$raw_excerpt = $text;
			if ('' == $text) {
				//Retrieve the post content.
				$text = get_the_content('');
				//Delete all shortcode tags from the content.
				$text = strip_shortcodes($text);
				$text = str_replace(']]>', ']]&gt;', $text);

				// $allowed_tags = '<p>,<a>,<em>,<strong>'; /*** MODIFY THIS. Add the allowed HTML tags separated by a comma.***/
				$allowed_tags = '<p>,<em>,<strong>';
				$text = strip_tags($text, $allowed_tags);

				$excerpt_word_count = 55; /*** MODIFY THIS. change the excerpt word count to any integer you like.***/
				$excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
				$excerpt_end = ''; /*** MODIFY THIS. change the excerpt endind to something else.***/
				$excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);

				$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);

				if (count($words) > $excerpt_length) {
					array_pop($words);
					$text = implode(' ', $words);
					$text = $text . $excerpt_more;
				} else {
					$text = implode(' ', $words);
				}
			} else {
				// text from the excerpt metabox
				$text = do_shortcode($text);
			}
			// to prevent stray p tag in excerpt
			if( $text === '<p></p>') {
				$text = '';
			}
			return apply_filters('wp_trim_excerpt', self::closetags($text), $raw_excerpt);
		}
		/**
		 * close all open xhtml tags at the end of the string
		 *
		 * @param string $html
		 * @return string
		 * @author Milian Wolff <mail@milianw.de>
		 */
		private static function closetags($html)
		{
			#put all opened tags into an array
			preg_match_all('#<([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
			$openedtags = $result[1];

			#    put all closed tags into an array
			preg_match_all('#</([a-z]+)>#iU', $html, $result);
			$closedtags = $result[1];
			$len_opened = count($openedtags);
			# all tags are closed
			if (count($closedtags) == $len_opened) {
				return $html;
			}
			$openedtags = array_reverse($openedtags);
			# close tags
			for ($i = 0; $i < $len_opened; $i++) {
				if (!in_array($openedtags[$i], $closedtags)) {
					$html .= '</' . $openedtags[$i] . '>';
				} else {
					unset($closedtags[array_search($openedtags[$i], $closedtags)]);
				}
			}
			return $html;
		}

		/**
		 * Output for the meta box.
		 *
		 * @param  object $post
		 * @return void
		 */
		public static function richtext_excerpt_show($post)
		{
			?>
			<label class="screen-reader-text" for="excerpt"><?php echo TM_ThemeStrings::$text_strings['TM_CustomFunctions']['excerpt']; ?></label>
			<?php
wp_editor(
				self::richtext_excerpt_unescape($post->post_excerpt),
				'excerpt',
				array(
					'textarea_rows' => 15,
					'media_buttons' => false,
					'teeny' => false,
					'tinymce' => true,
				)
			);
		}

		/**
		 * The excerpt is escaped usually. This breaks the HTML editor.
		 *
		 * @param  string $str
		 * @return string
		 */
		public static function richtext_excerpt_unescape($str)
		{
			return str_replace(
				array('&lt;', '&gt;', '&quot;', '&amp;', '&nbsp;', '&amp;nbsp;')
				, array('<', '>', '"', '&', ' ', ' ')
				, $str
			);
		}

	}
}