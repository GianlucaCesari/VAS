<?php
namespace ThemeMountain {
    /**
     * Initializes TGMPA
     *
     * @package ThemeMountain
     * @subpackage Core/marquez-by-thememountain
     * @since 1.0
     * @uses       TGM_Plugin_Activation
     */
    class TM_InitTGMPA extends TM_ThemeMountain
    {
        public function __construct()
        {
            /**
             * Instantiate TGM_Plugin_Activation class of the theme
             * only if it is not. (auto loaded by the theme on demand)
             */
            if (!class_exists('TGM_Plugin_Activation')) {
                new \TGM_Plugin_Activation(); // it is in the global namespace
            }
            add_action('tgmpa_register', ['ThemeMountain\\TM_InitTGMPA', 'thememountain_marquez_register_required_plugins']);
        }

        /**
         * Public Methods for hooks
         */

        /**
         * Register required plugins to TGMPA.
         *
         * @since 1.0
         * @access public
         * @uses       tgmpa() of TGM_Plugin_Activation
         */
        public static function thememountain_marquez_register_required_plugins()
        {
            /**
             * Array of plugin arrays. Required keys are name and slug.
             * If the source is NOT from the .org repo, then source is also required.
             */
            $_plugins = array(
                array(
                    'name' => 'WPBakery Visual Composer Version 5.4.7',
                    'slug' => 'js_composer',
                    'version' => '5.4.7',
                    'required' => true,
                    'source' => get_template_directory() . '/assets/plugins/js_composer.5.4.7.zip',
                ),
                array(
                    'name' => 'Kirki',
                    'slug' => 'kirki',
                    'version' => '2.1.0.1',
                    'required' => true,
                ),
                array(
                    'name' => 'CMB2',
                    'slug' => 'cmb2',
                    'version' => '2.2.1',
                    'required' => true,
                ),
                array(
                    'name' => 'Contact Form 7',
                    'slug' => 'contact-form-7',
                    'version' => '4.4.2',
                    'required' => true,
                ),
                array(
                    'name' => 'SVG Support (Optional)',
                    'slug' => 'svg-support',
                    'version' => '2.3.6',
                    'required' => true,
                ),
                array(
                    'name' => 'WooCommerce (Optional)',
                    'slug' => 'woocommerce',
                    'version' => '3.2.6',
                    'required' => false,
                ),
                array(
                    'name' => 'Cookie Consent (Optional)',
                    'slug' => 'uk-cookie-consent',
                    'version' => '2.3.10',
                    'required' => false,
                ),
                array(
                    'name' => 'ThemeMountain Plugin',
                    'slug' => 'tm-plugin',
                    'version' => '1.1.22',
                    'required' => true,
                    'source' => get_template_directory() . '/assets/plugins/tm-plugin.zip',
                ),
                array(
                    'name' => 'ThemeMountain OneClick (Optional)',
                    'slug' => 'tm-oneclick',
                    'version' => '1.5',
                    'required' => false,
                    'source' => get_template_directory() . '/assets/plugins/tm-oneclick.zip',
                ),
                array(
                    'name' => 'ThemeMountain Commerce Plugin (Optional)',
                    'slug' => 'tm-commerce',
                    'version' => '1.1.7',
                    'required' => false,
                    'source' => get_template_directory() . '/assets/plugins/tm-commerce.zip',
				),
            );
            $_config = array(
                'id' => parent::$theme_id, // Unique ID for hashing notices for multiple instances of TGMPA.
                'default_path' => '', // Default absolute path to bundled plugins.
                'menu' => 'tgmpa-install-plugins', // Menu slug.
                'parent_slug' => 'themes.php', // Parent menu slug.
                'capability' => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
                'has_notices' => true, // Show admin notices or not.
                'dismissable' => true, // If false, a user cannot dismiss the nag message.
                'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
                'is_automatic' => false, // Automatically activate plugins after installation or not.
                'message' => '', // Message to output right before the plugins table.
            );

            tgmpa($_plugins, $_config);
        }
    }
}
