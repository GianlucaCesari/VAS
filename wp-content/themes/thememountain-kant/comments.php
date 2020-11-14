<?php
namespace ThemeMountain;

/**
 * Find about whether comment needs to be shown.
 */
if ( !is_user_logged_in() || post_password_required() || ( is_page() && !comments_open()  ) ) {
	return;
}


/**
 * Post Author
 */
if(TM_Customizer::tm_get_theme_mod('tm_show_author_bio') == true) {
	$thememountain_author_id = get_the_author_meta('ID');
	$thememountain_user_post_count = count_user_posts( $thememountain_author_id , get_post_type() );
	$thememountain_author_meta_description = get_the_author_meta('description');
?>


<!-- Post Author -->
<div id="author" class="post-author">
	<div class="post-author-aside">
		<span class="author-title">Author</span>
		<a href="<?php echo get_author_posts_url($thememountain_author_id); ?>"><span class="icon-paper"></span><?php echo sprintf( _n( '%s Article', '%s Articles', $thememountain_user_post_count, "thememountain-kant" ), $thememountain_user_post_count ); ?></a>
	</div>
	<article class="author-bio">
		<div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta('email') , 90 ); ?>
		</div>
		<div class="author-content">
			<div class="row">
				<div class="column width-12">
					<h5 class="name"><?php echo get_the_author(); ?></h5>
					<p><?php echo TM_TemplateServices::tm_wp_kses($thememountain_author_meta_description); ?></p>
				</div>
			</div>
		</div>
	</article>
</div>
<?php
}
?>
<?php if ( TM_CustomFunctions::has_pings('pings',get_the_ID()) ) : // Level 1 comment listings ?>
<div class="post-comments">
	<h3 class="comments-title"><?php echo esc_html_e( 'Trackbacks', "thememountain-kant" ); ?></h3>
	<div class="pings">
		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					// 'callback' => 'ThemeMountain\\TM_CustomFunctions::tm_list_comments',
					'type'  => 'pings',
				) );
			?>
		</ul>
	</div>
	<?php paginate_comments_links(); ?>
</div>
<?php endif; // TM_CustomFunctions::has_pings() ?>
<?php if ( have_comments() ) : // Level 1 comment listings ?>
<div id="comments" class="post-comments">
	<h3 class="comments-title"><?php printf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', "thememountain-kant" ), number_format_i18n( get_comments_number() )); ?></h3>
	<div class="comments">
		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'callback' => 'ThemeMountain\\TM_CustomFunctions::tm_list_comments',
					'type'  => 'comment',
				) );
			?>
		</ul>
	</div>
	<?php paginate_comments_links(); ?>
</div>
<?php elseif(comments_open()) : ?>
<div id="comments" class="post-comments">
	<div class="comments">
		<ul class="comment-list">
			<li>
				<p><?php esc_html_e('Thank you for your reading. Join the conversation by posting a comment.', "thememountain-kant"); ?></p>
			</li>
		</ul>
	</div>
</div>
<?php endif; // have_comments() ?>
<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
<div class="post-comments">
	<h3 class="comments-title">
		<?php esc_html_e( 'Comments are closed.', "thememountain-kant" ); ?>
	</h3>
</div>
<?php endif; ?>
<?php
	/*
		comment form template

		ref: http://codex.wordpress.org/Function_Reference/comment_form

		Note : the order of outputting comment field since WP v 4.4
		see https://make.wordpress.org/core/2015/09/25/changes-to-fields-output-by-comment_form-in-wordpress-4-4/

		Currently the order has been reverted to the one before. Customization taken care in ThemeMountain-TM_CustomFunctions.php
	*/

	$thememountain_commenter = wp_get_current_commenter();
	$thememountain_req = get_option( 'require_name_email' );
	$thememountain_required_text = 'Required';
	$thememountain_aria_req = ( $thememountain_req ? " aria-required='true'" : '' );

	/** GDPR support */
	$thememountain_consent  = empty( $thememountain_commenter['comment_author_email'] ) ? '' : ' checked="checked"';

	$thememountain_fields =  array(
		'div_open' => '<div class="row">',
		'author' =>
		'<div class="column width-4"><input type="text" name="author" id="author" class="form-name form-element" ' . $thememountain_aria_req . ' placeholder="' . esc_attr__( 'Name', "thememountain-kant" ) . ''. ( $thememountain_req ? '*' : '' ) .'" tabindex="1" '. ( $thememountain_req ? 'required=""' : '' ) .' value="'. esc_attr( $thememountain_commenter['comment_author'] ) .'"></div>',

		'email' =>
		'<div class="column width-4"><input type="text" name="email" id="email" class="form-name form-element" ' . $thememountain_aria_req . ' placeholder="' . esc_attr__( 'Email', "thememountain-kant" ) . '*'.'" tabindex="1" '. ( $thememountain_req ? 'required=""' : '' ) .' value="'. esc_attr( $thememountain_commenter['comment_author_email'] ) .'"></div>',

		'url' =>
		'<div class="column width-4"><input type="text" name="url" id="url" class="form-website form-element" placeholder="' . esc_attr__( 'Website', "thememountain-kant" ) . '" tabindex="4" value="' . esc_attr( $thememountain_commenter['comment_author_url'], "thememountain-kant" ) . '"></div>',
		/** GDPR support */
		'cookies' => '<div class="column width-12"><p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $thememountain_consent . ' class="form-element checkbox">' .'<label for="wp-comment-cookies-consent" class="checkbox-label mb-0">' . __( 'Save my name, email, and website in this browser for the next time I comment.' , "thememountain-kant") . '</label></p></div>',
		'div_close' => '</div>',
		'honeypot' =>
		'<div class="column width-4"><input type="text" name="honeypot" class="form-honeypot form-element"></div>',
		'div_close' => '</div>',
	);
	global $user_identity;
	$thememountain_args = array(
		'id_form'           => 'commentform',
		'id_submit'         => 'submit',
		'title_reply'       => esc_html__( 'Leave a Comment',"thememountain-kant" ),
		'title_reply_to'    => esc_html__( 'Leave a Comment to %s',"thememountain-kant" ),
		'cancel_reply_link' => esc_html__( 'Cancel Reply',"thememountain-kant" ),
		'label_submit'      => esc_html__( 'Post Comment',"thememountain-kant" ),
		'fields' => apply_filters( 'comment_form_default_fields', $thememountain_fields ),
		'comment_field' =>  '<div class="row"><div class="column width-12 comment-form-comment"><textarea id="comment" name="comment" class="form-message form-element" placeholder="'.esc_attr__('Comment',"thememountain-kant").'*" tabindex="5" required="">' .
		'</textarea></div></div>',
		'must_log_in' => '<p class="must-log-in">' .
		sprintf(
		esc_html__( 'You must be', "thememountain-kant").' <a href="%s">'.esc_html__('logged in', "thememountain-kant").'</a> '.esc_html__('to post a comment.', "thememountain-kant"),
		wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
		) . '</p>',

		'logged_in_as' => '<p class="logged-in-as">' .
		sprintf(
		esc_html__('Logged in as', "thememountain-kant").' <a href="%1$s">%2$s</a>. <a href="%3$s" title="'.esc_attr__('Log out of this account', "thememountain-kant").'">'.esc_html__('Log out?', "thememountain-kant").'</a>',
		admin_url( 'profile.php' ),
		$user_identity,
		wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
		) . '</p>',

		'comment_notes_before' => '<p class="comment-notes">' .
		esc_html__( 'Your email address will not be published.' ,"thememountain-kant" ) . ( $thememountain_req ? ' ('.$thememountain_required_text.')' : '' ) .
		'</p>',
		'comment_notes_after' => '',

		'class_submit' => 'form-submit button medium bkg-black thick bkg-hover-pink color-white color-hover-white no-margin-bottom',
	); ?>

<?php comment_form($thememountain_args);
