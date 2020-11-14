<?php
/**
 * ThemeMountain-WP_Widget_tm_mailchimp
 */
namespace ThemeMountain {
	register_widget( 'ThemeMountain\\WP_Widget_tm_mailchimp' );
	class WP_Widget_tm_mailchimp extends \WP_Widget {
		private static $stylesheet_directory_uri; // = get_stylesheet_directory_uri();

		/**
		 * PHP Magic Method
		 * Constructor
		 */
		function __construct() {
			parent::__construct(
			'tm_mailchimp', // Base ID
			'TM MailChimp Sign Up Form', // Name
			array( 'description' => '', ) // Args
			);
		}

		public function widget( $args, $instance ) {
			// blank vars init
			$_show_marketing_email_consent_checkbox = $_marketing_email_consent_checkbox_label = $_marketing_email_consent_privacy_policy_link = $_marketing_email_consent_cookie_policy_link = '';
			// options
			$widget_id = str_replace('tm_mailchimp-', '', $args['widget_id']);
			$_admin_ajax_url = admin_url( 'admin-ajax.php', is_ssl() ? 'https' : 'http' );
			$thememountain_ajax_nonce = wp_create_nonce('TM_Ajax');
			$_widget_title = (array_key_exists('title',$instance)) ? $instance['title'] : '';
			$_use_last_name = (array_key_exists('use_last_name',$instance)) ? $instance[ 'use_last_name' ] : '';
			$_use_first_name = (array_key_exists('use_first_name',$instance)) ? $instance[ 'use_first_name' ] : 'on';
			/**
			 * Email Field Placeholder : email_field_placeholder
			 * First Name Field Placeholder : fname_field_placeholder
			 * Last Name Field Placeholder : lname_field_placeholder
			 * Button Width: button_width
			 */
			$_email_field_placeholder = (array_key_exists('email_field_placeholder',$instance)) ? $instance['email_field_placeholder'] : esc_html__( "Email address*", 'thememountain-plugin' );
			$_fname_field_placeholder = (array_key_exists('fname_field_placeholder',$instance)) ? $instance['fname_field_placeholder'] : esc_html__( "First name*", 'thememountain-plugin' );
			$_lname_field_placeholder = (array_key_exists('lname_field_placeholder',$instance)) ? $instance['lname_field_placeholder'] : esc_html__( "Last name*", 'thememountain-plugin' );
			$_button_width = (array_key_exists('button_width',$instance)) ? $instance[ 'button_width' ] : '';

			// GDPR support
			$_show_marketing_email_consent_checkbox = TM_Admin::tm_admin_option('tm_mailchimp_form_settings','show_marketing_email_consent_checkbox');

			// start output
			echo $args['before_widget'];
?>
<!-- tm_mailchimp -->
<div class="signup-form-container">
	<form class="signup-form" action="<?php echo esc_attr($_admin_ajax_url); ?>" method="post" novalidate>
		<div class="row">
			<?php if ($_widget_title !=='' ) : ?>
			<div class="column width-12">
				<h4><?php echo esc_html($_widget_title); ?></h4>
			</div>
			<?php endif; ?>
<?php if(!empty($_use_first_name)) : ?>
			<div class="column width-12">
				<div class="field-wrapper">
					<input type="text" name="fname" class="form-name form-element medium" placeholder="<?php echo $_fname_field_placeholder; ?>" tabindex="4" required="">
					<span class="border"></span>
				</div>
			</div>
<?php endif; ?>
<?php if(!empty($_use_last_name)) : ?>
			<div class="column width-12">
				<div class="field-wrapper">
					<input type="text" name="lname" class="form-name form-element medium" placeholder="<?php echo $_lname_field_placeholder; ?>" tabindex="4" required="">
					<span class="border"></span>
				</div>
			</div>
<?php endif; ?>
			<div class="column width-12">
				<div class="field-wrapper">
					<input type="email" name="email" class="form-email form-element medium" placeholder="<?php echo $_email_field_placeholder; ?>" tabindex="5" required="">
					<span class="border"></span>
				</div>
			</div>
<?php
	// Output GDPR mail consent form if enabled.
	TM_Shortcodes::output_mail_consent_form(TRUE,'checkbox-'.esc_attr($widget_id));
?>
			<div class="column width-12">
				<input type="submit" value="<?php _e( "Signup", 'thememountain-plugin' ); ?>" class="form-submit button small bkg-charcoal bkg-hover-pink color-grey-light color-hover-white text-uppercase<?php if(!empty($_button_width)) echo ' full-width'; ?>">
			</div>
		</div>
		<input type="text" name="honeypot" class="form-honeypot form-element">
		<input name='_tm_ajax_nonce' value="<?php echo $thememountain_ajax_nonce; ?>" type='hidden' />
		<input name='widget_id' value="<?php echo esc_attr($widget_id); ?>" type='hidden' />
		<input name='ajax_command' value="mailchimp" type='hidden' />
		<input name='action' value="TM_Ajax" type='hidden' />
	</form>
	<div class="form-response color-white show"><?php _e( "We don't spam, promise!", 'thememountain-plugin' ); ?></div>
</div>
<!-- end tm_mailchimp -->
<?php
			echo $args['after_widget'];
		}

		public function form( $instance ){
			$title = (array_key_exists('title',$instance)) ? $instance['title'] : '';
			$title_name = $this->get_field_name('title');
			$title_id = $this->get_field_id('title');
			?>
			<p>
				<label for="<?php echo esc_attr($title_id); ?>"><?php _e( 'Title', 'thememountain-plugin' ); ?> :</label>
				<input class="widefat" id="<?php echo esc_attr($title_id); ?>" name="<?php echo esc_attr($title_name); ?>" type="text" value="<?php echo esc_attr($title); ?>">
			</p><?php
			$api_key = (array_key_exists('api_key',$instance)) ? $instance['api_key'] : TM_Admin::tm_admin_option('tm_mailchimp_form_settings','api_key');
			$api_key_name = $this->get_field_name('api_key');
			$api_key_id = $this->get_field_id('api_key');
			?>
			<p>
				<label for="<?php echo esc_attr($api_key_id); ?>"><?php _e( 'Mailchimp API Key', 'thememountain-plugin' ); ?> :</label>
				<input class="widefat" id="<?php echo esc_attr($api_key_id); ?>" name="<?php echo esc_attr($api_key_name); ?>" type="text" value="<?php echo esc_attr( $api_key ); ?>">
			</p><?php
			$list_id = (array_key_exists('list_id',$instance)) ? $instance['list_id'] :  TM_Admin::tm_admin_option('tm_mailchimp_form_settings','list_id');
			$list_id_name = $this->get_field_name('list_id');
			$list_id_id = $this->get_field_id('list_id');
			?>
			<p>
				<label for="<?php echo esc_attr($list_id_id); ?>"><?php _e( 'Mailchimp List ID', 'thememountain-plugin' ); ?> :</label>
				<input class="widefat" id="<?php echo esc_attr($list_id_id); ?>" name="<?php echo esc_attr($list_id_name); ?>" type="text" value="<?php echo esc_attr( $list_id ); ?>">
			</p><?php
			$use_first_name = (array_key_exists('use_first_name',$instance)) ? $instance['use_first_name'] : 'on';
			$use_first_name_name = $this->get_field_name('use_first_name');
			$use_first_name_id = $this->get_field_id('use_first_name');
			?>
			<p>
				<label for="<?php echo esc_attr($use_first_name_id); ?>"><?php _e( 'Use First Name', 'thememountain-plugin' ); ?> :</label>
				<input class="checkbox" type="checkbox" id="<?php echo esc_attr($use_first_name_id); ?>" name="<?php echo esc_attr($use_first_name_name); ?>" <?php checked($use_first_name, 'on' ); ?>>
			</p><?php
			$use_last_name = (array_key_exists('use_last_name',$instance)) ? $instance['use_last_name'] : '';
			$use_last_name_name = $this->get_field_name('use_last_name');
			$use_last_name_id = $this->get_field_id('use_last_name');
			?>
			<p>
				<label for="<?php echo esc_attr($use_last_name_id); ?>"><?php _e( 'Use Last Name', 'thememountain-plugin' ); ?> :</label>
				<input class="checkbox" type="checkbox" id="<?php echo esc_attr($use_last_name_id); ?>" name="<?php echo esc_attr($use_last_name_name); ?>" <?php checked($use_last_name, 'on' ); ?>>
			</p>
			<?php // email_field_placeholder
			$email_field_placeholder = (array_key_exists('email_field_placeholder',$instance)) ? $instance['email_field_placeholder'] : esc_html__( "Email address*", 'thememountain-plugin' );
			$email_field_placeholder_name = $this->get_field_name('email_field_placeholder');
			$email_field_placeholder_id = $this->get_field_id('email_field_placeholder');
			?>
			<p>
				<label for="<?php echo esc_attr($email_field_placeholder_id); ?>"><?php _e( 'Email Field Placeholder', 'thememountain-plugin' ); ?> :</label>
				<input class="widefat" id="<?php echo esc_attr($email_field_placeholder_id); ?>" name="<?php echo esc_attr($email_field_placeholder_name); ?>" type="text" value="<?php echo esc_attr( $email_field_placeholder ); ?>">
			</p>
			<?php // fname_field_placeholder
			$fname_field_placeholder = (array_key_exists('fname_field_placeholder',$instance)) ? $instance['fname_field_placeholder'] : esc_html__( "First name*", 'thememountain-plugin' );
			$fname_field_placeholder_name = $this->get_field_name('fname_field_placeholder');
			$fname_field_placeholder_id = $this->get_field_id('fname_field_placeholder');
			?>
			<p>
				<label for="<?php echo esc_attr($fname_field_placeholder_id); ?>"><?php _e( 'First Name Field Placeholder', 'thememountain-plugin' ); ?> :</label>
				<input class="widefat" id="<?php echo esc_attr($fname_field_placeholder_id); ?>" name="<?php echo esc_attr($fname_field_placeholder_name); ?>" type="text" value="<?php echo esc_attr( $fname_field_placeholder ); ?>">
			</p>
			<?php // lname_field_placeholder
			$lname_field_placeholder = (array_key_exists('lname_field_placeholder',$instance)) ? $instance['lname_field_placeholder'] : esc_html__( "Last name*", 'thememountain-plugin' );
			$lname_field_placeholder_name = $this->get_field_name('lname_field_placeholder');
			$lname_field_placeholder_id = $this->get_field_id('lname_field_placeholder');
			?>
			<p>
				<label for="<?php echo esc_attr($lname_field_placeholder_id); ?>"><?php _e( 'Last Name Field Placeholder', 'thememountain-plugin' ); ?> :</label>
				<input class="widefat" id="<?php echo esc_attr($lname_field_placeholder_id); ?>" name="<?php echo esc_attr($lname_field_placeholder_name); ?>" type="text" value="<?php echo esc_attr( $lname_field_placeholder ); ?>">
			</p><?php
			// Button Width (checkbox)
			$button_width = (array_key_exists('button_width',$instance)) ? $instance['button_width'] : '';
			$button_width_name = $this->get_field_name('button_width');
			$button_width_id = $this->get_field_id('button_width');
			?>
			<p>
				<label for="<?php echo esc_attr($button_width_id); ?>"><?php _e( 'Make Button Full Width', 'thememountain-plugin' ); ?> :</label>
				<input class="checkbox" type="checkbox" id="<?php echo esc_attr($button_width_id); ?>" name="<?php echo esc_attr($button_width_name); ?>" <?php checked($button_width, 'on' ); ?>>
			</p>
			<?php
		}

		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			if(!array($instance)) $instance = array();
			$instance[ 'title' ] = TM_Shortcodes::tm_wp_kses($new_instance[ 'title' ]);
			$instance[ 'api_key' ] = sanitize_text_field($new_instance[ 'api_key' ]);
			$instance[ 'list_id' ] = sanitize_text_field($new_instance[ 'list_id' ]);
			$instance[ 'use_first_name' ] = sanitize_text_field($new_instance[ 'use_first_name' ]);
			$instance[ 'use_last_name' ] = sanitize_text_field($new_instance[ 'use_last_name' ]);
			$instance[ 'email_field_placeholder' ] = sanitize_text_field($new_instance[ 'email_field_placeholder' ]);
			$instance[ 'fname_field_placeholder' ] = sanitize_text_field($new_instance[ 'fname_field_placeholder' ]);
			$instance[ 'lname_field_placeholder' ] = sanitize_text_field($new_instance[ 'lname_field_placeholder' ]);
			$instance[ 'button_width' ] = sanitize_text_field($new_instance[ 'button_width' ]);
			return $instance;
		}
	}
}
