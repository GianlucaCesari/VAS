<?php
namespace ThemeMountain {
	/**
	 * 	Loads widget
	 *
	 * @package ThemeMountain
	 * @subpackage theme-plugin
	 * @since 1.0
	 */
	class TM_SNS {
		/**
		 * variables for plugin
		*/
		public static $local_plugin_dir;
		public static $local_plugin_dir_uri;

		/**
		 * Constructor
		 */
		public function __construct( $_class_settings = array () ) {
			self::$local_plugin_dir = $_class_settings['local_plugin_dir'];
			self::$local_plugin_dir_uri = $_class_settings['local_plugin_dir_uri'];

			/**
			 * Action hook to display post_social_list
			 */
			add_action( 'tm_post_social_list', array('ThemeMountain\\TM_SNS','tm_post_social_list'));
		}

		/**
		 * Display post_social_list
		 *
		 * @since      1.1
		 */
		public static function tm_post_social_list () {
			if(!class_exists('\\ThemeMountain\\TM_Customizer')) return;
			?>
			<ul class="social-list list-horizontal share">
				<?php if (TM_Customizer::tm_get_theme_mod('tm_post_facebook') == true) {?>
				<li><a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + location.href, 'sharer', 'width=626,height=436');" href="javascript: void(0)" title="<?php esc_html_e('Share on Facebook',"thememountain-plugin"); ?>"><span class="icon-facebook-with-circle medium "></span></a></li>
				<?php } ?>
				<?php if (TM_Customizer::tm_get_theme_mod('tm_post_twitter') == true) {?>
				<li><a onclick="popUp=window.open('https://twitter.com/share?url=<?php the_permalink(); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript: void(0)" title="<?php esc_html_e('Share on Twitter',"thememountain-plugin"); ?>"><span class="icon-twitter-with-circle medium"></span></a></li>
				<?php } ?>
				<?php if (TM_Customizer::tm_get_theme_mod('tm_post_googleplus') == true) {?>
				<li><a onclick="popUp=window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript: void(0)" title="<?php esc_html_e('Share on Google Plus',"thememountain-plugin"); ?>"><span class="icon-google-with-circle medium"></span></a></li>
				<?php } ?>
				<?php if (TM_Customizer::tm_get_theme_mod('tm_post_pinterest') == true) {
					if ( has_post_thumbnail() ) {
						$thememountain_thumbnailID = get_post_thumbnail_id();
						$thememountain_currentPostImage = wp_get_attachment_url($thememountain_thumbnailID);
						$thememountain_currentPostDescription = get_the_title();

					} else {
						$thememountain_currentPostImage = '';
						$thememountain_currentPostDescription = '';
					}
					?>

				<li><a onclick="popUp=window.open('https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo esc_attr($thememountain_currentPostImage); ?>&amp;description=<?php echo esc_attr($thememountain_currentPostDescription); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript: void(0)" title="Pin on Pinterest"><span class="icon-pinterest-with-circle medium"></span></a></li>
				<?php } ?>
			</ul><?php
		}
	}
}