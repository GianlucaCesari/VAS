<?php
/*
	tm wp plugin manager class
	Licensed under Creative Commons

	http://thememountain.com
*/
namespace ThemeMountain {
	class TM_Ajax {
		/**
		 * Properties for plugin
		*/

		/**
		 * Plugin dir locations
		 *
		 * @var string
		 */
		public static $local_plugin_dir;
		public static $local_plugin_dir_uri;

		/**
		 * Constructor
		 */
		public function __construct( $_class_settings = array () ) {
			self::$local_plugin_dir = $_class_settings['local_plugin_dir'];
			self::$local_plugin_dir_uri = $_class_settings['local_plugin_dir_uri'];

			/*
				AJAX detection
			*/
			// ajax, only when AJAX requests
			if (defined('DOING_AJAX') && DOING_AJAX) {
				add_action( 'wp_loaded', array('ThemeMountain\\TM_Ajax','ajax_hooks') );
			} else if( is_admin() && self::is_edit_page() ){
				add_action('admin_footer', array('ThemeMountain\\TM_Ajax','output_tm_ajax_nonce_admin'));
			}
		}

		/**
		 * output ajax nonce (reference only)
		 */
		public static function output_tm_ajax_nonce_admin () {
			$_thememountain_ajax_nonce = wp_create_nonce('TM_Ajax');
			echo "<input type='hidden' id='_tm_ajax_nonce' value='{$_thememountain_ajax_nonce}'>\n";
		}

		/**
		 * AJAX ROUTINES
		 */

		/**
		 * register ajax hooks for the theme
		 */
		public static function ajax_hooks () {
			add_action( 'wp_ajax_TM_Ajax', array('ThemeMountain\\TM_Ajax','ajax_callback'));
			add_action( 'wp_ajax_nopriv_TM_Ajax', array('ThemeMountain\\TM_Ajax','ajax_callback'));
		}
		/**
		 * process ajax calls
		 * requires ajax_command and tm_nonce variables sent from client
		 */
		public static function ajax_callback () {
			/**
			 * Set ajax command.
			 * Command names are in alphabets only. command length limited to 63 chars.
			 */
			$_ajax_command = preg_replace('/[^a-zA-Z]/', '', mb_substr($_REQUEST['ajax_command'],0,63));

			/* is the ajax command set? */
			if($_ajax_command === '') {
				self::returnAndExitAjaxResponse(
					self::constructAjaxResponseArray(FALSE,'NO_COMMAND')
					);
			}

			/**
			 * nonce check
			 * see : http://codex.wordpress.org/Function_Reference/check_ajax_referer
			 */
			if(!check_ajax_referer( 'TM_Ajax', '_tm_ajax_nonce' , FALSE)===TRUE) {
			// print ajax response
				self::returnAndExitAjaxResponse(
					self::constructAjaxResponseArray(
						FALSE,
						'NONCE_INVALID',
						array('_tm_ajax_nonce'=> (key_exists('_tm_ajax_nonce',$_REQUEST)) ? $_REQUEST['_tm_ajax_nonce'] : 'invalid')
						)
					);
			}

			/**
			 * Print ajax response
			 */
			if(!file_exists(self::$local_plugin_dir ."ajax/{$_ajax_command}.php")) {
				/**
				 * error
				 */
				self::returnAndExitAjaxResponse(
					self::constructAjaxResponseArray(
						FALSE,
						'COMMAND_DOES_NOT_EXIST',
						array('command'=> $_ajax_command)
						)
					);
			} else {
				/**
				 * execute the command
				 */
				$ajaxResponseArray = array();
				include_once(self::$local_plugin_dir ."ajax/{$_ajax_command}.php");
				self::returnAndExitAjaxResponse($ajaxResponseArray);
			}
		}

		/**
		 * construct ajax response array
		 * Input: Result (bool), Message (optional), Data to be sent back in array
		 *
		 * @param      <type>  $_response  The response
		 * @param      string  $_message   The message
		 * @param      <type>  $_json      The json
		 *
		 * @return     array   ( description_of_the_return_value )
		 */
		public static function constructAjaxResponseArray ($_response, $_message = '', $_json = null) {
			$_responseArray = array();
			$_response = ( $_response === TRUE ) ? TRUE : FALSE;
			$_responseArray['response'] = $_response;
			if(isset($_message)) $_responseArray['message'] = $_message;
			if(isset($_json)) $_responseArray['json'] = $_json;

			return $_responseArray;
		}

		/**
		 * Output data in the Gframe ajax format and exit.
		 * Input: data array processed by constructAjaxResponseArray ()
		 * Outputs as a html stream then exits.
		 *
		 * @param      array  $_ajaxResponse  The ajax response
		 */
		public static function returnAndExitAjaxResponse ($_ajaxResponse) {
		// callback
			$_callback = (array_key_exists('callback',$_REQUEST)) ? $_REQUEST['callback'] : null;
			if(!$_ajaxResponse){
				$_ajaxResponse = array('response'=>false,'message'=>'Unknown error occurred.');
			}
			header( "Content-Type: application/json" );
			if(!is_null($_callback)) echo esc_attr($_callback).' ';
			if(!is_null($_callback)) echo '(';
			echo json_encode($_ajaxResponse);
			if(!is_null($_callback)) echo ')';
			die();
		}

		/**
		 * set ajax meta
		 *
		 * @return     <type>  The ajax meta.
		 */
		public static function getAjaxMeta () {
			return (array_key_exists('json',$_REQUEST)) ? json_decode($_REQUEST['json']) : null;
		}
		/**
		 * set ajax data stream for Backbone.js
		 */
		public static function getAjaxData () {
			self::$ajax_data = wp_remote_get("php://input");
		}

		/**
		 * UTILITIES
		 */
		/**
		* is_edit_page
		* function to check if the current page is a post edit page
		*
		* @author Ohad Raz <admin@bainternet.info>
		*
		* @param  string  $new_edit what page to check for accepts new - new post page ,edit - edit post page, null for either
		* @return boolean
		*/
		private static function is_edit_page($new_edit = null){
			global $pagenow;
			if (!is_admin()) {
				return false;
			}
			if($new_edit == "edit") {
				return in_array( $pagenow, array( 'post.php',  ) );
			} else if ($new_edit == "new") {
				return in_array( $pagenow, array( 'post-new.php' ) );
			} else {
				return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
			}
		}
	}
}