<?php
/**
 * Thememountain Custom Recent Post Widget
 *
 * @package ThemeMountain
 * @subpackage theme-plugin
 * @since 1.0
 */
namespace ThemeMountain {
	/** register the widget */
	register_widget( 'ThemeMountain\TM_Widget_Recent_Posts' );

	/**
	 * Customizes Recent Posts widget
	 *
	 * @package ThemeMountain
	 * @subpackage theme-plugin
	 * @since 1.0
	 * @uses       WP_Widget_Recent_Posts
	 * @uses       TM_wordpress::tm_load_widgets() Loads all the files under widgets/*.php at widgets_init hook timing.
	 */
	class TM_Widget_Recent_Posts extends \WP_Widget {
		public function __construct() {
			$widget_ops = array(
				'classname' => 'widget_recent_entries',
				'description' => esc_html__( 'Your site&#8217;s most recent Posts.' , 'thememountain-plugin' ),
				'customize_selective_refresh' => true,
				);
			parent::__construct( 'tm-recent-posts', esc_html__( 'ThemeMountain Recent Posts' , 'thememountain-plugin' ), $widget_ops );
		}

		/**
		 * Outputs the content for the current Recent Posts widget instance. (customized wp v. 4.7.1)
		 *
		 * @since 1.0
		 * @access public
		 *
		 * @param array $args     Display arguments including 'before_title', 'after_title',
		 *                        'before_widget', and 'after_widget'.
		 * @param array $instance Settings for the current Recent Posts widget instance.
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}
			$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts' , 'thememountain-plugin');

			/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
			$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
			$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
			$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
			/**
			 * Filters the arguments for the Recent Posts widget.
			 *
			 * @since 3.4.0
			 *
			 * @see \WP_Query::get_posts()
			 *
			 * @param array $args An array of arguments used to retrieve the recent posts.
			 */
			$r = new \WP_Query( apply_filters( 'widget_posts_args', array(
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true
			) ) );

			if ($r->have_posts()) :
			?>
			<?php echo $args['before_widget']; ?>
			<?php if ( $title ) {
				echo $args['before_title'] . $title . $args['after_title'];
			} ?>
			<ul>
			<?php while ( $r->have_posts() ) : $r->the_post(); ?>
				<li>
					<?php if ( $show_date ) : ?>
					<span class="post-info"><span class="post-date"><?php echo get_the_date(); ?></span></span>
					<?php endif; ?>
					<a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
				</li>
			<?php endwhile; ?>
			</ul>
			<?php echo $args['after_widget']; ?>
			<?php
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

			endif;
		}

		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			if(!array($instance)) $instance = array();
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
			$instance['number'] = (int) $new_instance['number'];
			$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : TRUE;
			return $instance;
		}

		public function form( $instance ) {
			$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
			$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : TRUE;
			?>
			<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

				<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

			<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
				<?php
		}

	}
}
