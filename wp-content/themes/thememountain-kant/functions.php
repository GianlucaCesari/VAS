<?php
/**
* ThemeMountain WordPress functions
 *
 * All the functions and variables defined by theme are contained under ThemeMountain namaspece
 * to avoid polluting the global name space.
 *
 * Note: If you make your child theme, your functions.php will be loaded before this parent functions.php
 * That means this functions.php will not be overridden unlike style.css
 * For anything that you need to include after this file, please use inc/user_functions.php
 *
 * @package ThemeMountain
 * @subpackage Core
 * @since 1.0
*/
namespace ThemeMountain {
	
    function test() {
        return 'testing the shortcode';
    }
    
    add_shortcode( 'riunioni_loop', 'test' );
    
    /**
	 * This theme requires at least php version 5.6 to run.
	 */
	if (version_compare(phpversion(), '5.6', '>')) {
		/**
		 * This theme requires at least Wordpress version 4.7 to run.
		 */
		$thememountain_wordpress_version = get_bloginfo('version');
		if ( version_compare( $thememountain_wordpress_version , '4.7', '<') )  {
			echo '<div class="box large warning">'.sprintf(esc_html__('You are currently running Wordpress version %s This theme requires PHP version <strong>4.7 or later</strong>. Please update your Wordpress or the theme will not work normally.',"thememountain-kant"),$thememountain_wordpress_version).'</div>';
		}
		/**
		 * Auto Classloader is required.
		 */
		if (!locate_template('assets/class/ThemeMountain-TM_ClassLoader.php', TRUE, TRUE)) {
			trigger_error(esc_html__('TM_ClassLoader is required.', "thememountain-kant"), E_USER_ERROR);
		} else {
			new TM_ClassLoader("thememountain-kant",array('inc/class/','assets/class/'));
		}

		/**
		 * Loading user functions file (reserved for child themes)
		 */
		get_template_part('inc/user_functions');

		/**
		 * Load the ThemeMountain Theme Configuration class.
		 * It is pluggable and can be overridden with inc/user_functions.php
		 */
		if (!class_exists('TM_ThemeStrings')) {
			new TM_ThemeStrings();
		}

		/**
		 * Load the ThemeMountain core class to begin.
		 * It is pluggable and can be overridden with inc/user_functions.php
		 */
		if (!class_exists('TM_ThemeMountain')) {
			/** The TM_ThemeMountain class requires $theme_id, $required_tmplugin_version, $required_tmcommerce_version (optional) and $required_oneclick_version (optional) to be passed as argument */
			new TM_ThemeMountain(TM_ThemeStrings::$theme_id,'1.1.20','1.1.7','1.4');
		}
		
	} else if (!is_admin() && $GLOBALS['pagenow'] !== 'wp-login.php') {
		header("Content-type: text/html; charset=UTF-8");
		echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"></head><body>';
		echo '<p>You are currently running php version '.phpversion().'. This theme requires PHP version <strong>5.6 or later</strong>. Please update your PHP and try again. For more information please refer to <a href="https://wordpress.org/about/requirements/">this page</a> for more information.</p><p>To return to admin page, please follow <a href="'.admin_url().'">this link</a>.</p>';
		echo "</body></html>";
		exit;
	}
}

    
    
