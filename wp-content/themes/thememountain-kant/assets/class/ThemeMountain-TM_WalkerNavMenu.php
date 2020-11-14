<?php
namespace ThemeMountain {
	/**
	 * TM Custom Walker Class
	 *
	 * ThemeMountain Mega Menu specs (html Markup example)
	 *
	 * 		li.contains-mega-sub-menu 	(depth 0)
	 * 			a
	 * 			ul.mega-sub-menu
	 * 				li 					First column (depth 1)
	 * 					a
	 * 					ul
	 * 						li 			(depth 2)
	 * 						 	a
	 * 			     		li
	 * 			     			a
	 * 			     li 				Second column (depth 1)
	 * 			     	a
	 * 			     	ul
	 * 			     		li 			(depth 2)
	 * 			    	......
	 *
	 * @package ThemeMountain
	 * @subpackage wordpress-common-assets
	TM_NavMenuCustomField::enqueue_footer_HTML();
	 * @since 1.0
	 *
	 * @see        http://codex.wordpress.org/Function_Reference/wp_nav_menu#Using_a_Custom_Walker_Function Please see this page for how the walker class customization works.
	 */
	class TM_WalkerNavMenu extends \Walker_Nav_Menu {
		/**
		 * Internal register
		 * @var mixed FALSE or depth (Int)
		*/
		public $megamenu = FALSE;

		/**
		 * Overrides defailt Walker_Nav_Menu
		 */

		/**
		 * display_element is called for each menu item.
		 */
		function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
			// reset
			if($depth === 0) $this->megamenu = FALSE;

			// set id of field
			$id_field = $this->db_fields['id'];

			/**
			 * Sets if the menu hierarchy has children. Used for a tag with child menu underneath (start_el())
			 */
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
			}

			/**
			 * mega menu check up. user has to define megamenu in class attribute to make it a megamenu
			 * the followings set megamenu depth if megamenu is defined at the root
			 * Resets once the mega menu hierarchy is over
			 *
			 * the megamenu is applicable only when the location is "main_nav_menu"
			 */
			if(isset($args[0]->theme_location) && $args[0]->theme_location === 'main_nav_menu') {
				// searches for the megamenu class
				if ($this->megamenu !== FALSE && $depth == 0 ) {
					// the megamenu hierarchy is over
					$this->megamenu = FALSE;
				} else if( $this->megamenu !== FALSE && $depth !== 0 ) {
					// continuing the mega sub menu hiearcy. update the depth level
					$this->megamenu = $depth;
				} else {
					// check up if the hierarchy has megamenu class.
					$_tm_custom_nav = get_post_meta($element->ID, 'menu-item-tm_custom_nav', true);

					if( $_tm_custom_nav === 'megamenu_parent' && $depth == 0 ) {
					// megamenu class found and the current depth is 0
						$this->megamenu = $depth;
					}
				}
			}
			return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		/**
		 * Called in starting a new UL level. It adds the UL markup to begin with.
		 */
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = ( $depth > 0 ) ? str_repeat("\t",$depth ) : "";
			$display_depth=($depth+1);
			/**
			 * assign megamenu class to UL once for the mega menu parent hierarchy
			 */
			if($this->megamenu === 0) {
				$class_names = " class='mega-sub-menu row'";
			} else if($this->megamenu > 0) {
				$class_names = " class='menu-even sub-sub-menu menu-depth-".($this->megamenu + 1)."'";
			} else {
				$classes = array(
					'sub-menu',
					( $display_depth % 2 ? 'menu-odd' : 'menu-even' ),
					( $display_depth >=2 ? 'sub-sub-menu' : '' ),
					'menu-depth-' . $display_depth
					);
				$class_names = " class='".implode( ' ', $classes )."'";
			}
			/**
			 * Finally add the UL html markup code
			 */
			$output.="\n{$indent}<ul{$class_names}>\n";
		}

		/**
		 * Add up li and a tags underneath each ul level.
		 */
		function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			/**
			 * Do nothing if it is tm_modal.
			 * @see TM_NavMenuServices::registerModalButton() called from TM_NavMenuServices::tm_nav_buttons();
			 */
			if($item->object === 'tm_modal') return;
			/**
			 * Continue if the item is any other types.
			 */
			global $wp_query;
			/** find if it is a button / icon or not */
			$_tm_custom_nav = get_post_meta($item->ID, 'menu-item-tm_custom_nav', true);
			if(preg_match("/button|icon/",$_tm_custom_nav)) return;

			/** find indent */
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			// add misc classes
			$depth_classes = array(
				( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
				( $depth >=2 ? 'sub-sub-menu-item' : '' ),
				( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
				'menu-item-depth-' . $depth
				);
			/**
			 * Add contains-mega-sub-menu class to LI tag if this is the root megamenu level
			 * In other terms it initiates the megamenu.
			 * This is detected only when the $megamenu is set to the depth 0. (once)
			 */
			if($this->megamenu === 0) {
				array_push($depth_classes, 'contains-mega-sub-menu');
			} else if ($this->megamenu > 0 && $depth === 1) {
				array_push($depth_classes, 'column');
			}
			/**
			 * Class treatment
			 */
			// remove blank
			$depth_classes = array_filter($depth_classes, function($value) { return $value !== ''; });
			// joint array with space
			$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			// add current if it is current
			if( $item -> current == true ) array_push($classes, 'current');

			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
			/**
			 * menu id
			 */
			if(isset($args->menu_id)) {
				$id = apply_filters( 'nav_menu_item_id', $args->menu_id. $item->ID, $item, $args, $depth );
				$id = ($id) ? ' id="' . esc_attr( $id ) . '"' : '';
			} else {
				$id = '';
			}
			/**
			 * Counts child sub menu (only when it is in megamenu mode and the depth level is at 0)
			 */
			if($this->megamenu === 0) {
				$locations = get_nav_menu_locations();
				if(array_key_exists('main_nav_menu', $locations)){
					$menu = wp_get_nav_menu_object( $locations['main_nav_menu'] );
					$menu_items = wp_get_nav_menu_items($menu->term_id);
					$count = 0;
					if(is_array($menu_items)) {
						foreach( $menu_items as $menu_item ){
							if( $menu_item->menu_item_parent == $item->ID ){
								$count++;
							}
						}
					}
				}
			} else if ($this->megamenu === 1) {
				// megatext
				if(!empty($item->description)) {
					$column_text = '<ul><li><p>'.$item->description.'</p></li></ul>';
				}
			}

			// build html, LI level
			$output .= $indent . '<li'.$id.' class="' . $depth_class_names . ' ' . $class_names . '">';
			// href check up
			$_url = esc_attr( $item->url );
			$_scroll_link_class = '';
			if (substr($_url,  0, strlen('#')) === '#') {
				$_scroll_link_class = 'scroll-link ';
			}
			// attributes except for class
			$attributes = '';
			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )		 ? ' target="' . esc_attr( $item->target		 ) .'"' : '';
			$attributes .= ! empty( $item->xfn )			 ? ' rel="'	 . esc_attr( $item->xfn			 ) .'"' : '';
			$attributes .= ! empty( $item->url )			 ? ' href="'	 . $_url .'"' : '';

			// build link attributes for the following A tag right underneath.
			// if it is NOT a megamenu and has_children, add class of contains-sub-menu
			if(isset( $args->has_children) && isset($this->megamenu) && $args->has_children === TRUE && $this->megamenu === FALSE) {
				$attributes .= ' class="menu-link contains-sub-menu ' . $_scroll_link_class . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
			} else {
				$attributes .= ' class="menu-link ' . $_scroll_link_class . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
			}
					// sprintf output
			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s%7$s',
				isset($args->before) ? $args->before : '',
				$attributes,
				isset($args->link_before) ? $args->link_before : '',
				apply_filters( 'the_title', $item->title, $item->ID ),
				isset($args->link_after) ? $args->link_after : '',
				isset($column_text) ? $column_text : '',
				isset($args->after) ? $args->after : ''
				);

			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args , $id);
		}

		/**
		 * Ends the element output, if needed. (customized)
		 *
		 * @since 3.0.0
		 *
		 * @see Walker::end_el()
		 *
		 * @param string   $output Passed by reference. Used to append additional content.
		 * @param WP_Post  $item   Page data object. Not used.
		 * @param int      $depth  Depth of page. Not Used.
		 * @param stdClass $args   An object of wp_nav_menu() arguments.
		 */
		public function end_el( &$output, $item, $depth = 0, $args = array() ) {
			/**
			 * Do nothing if it is tm_modal. This is necessary to prevent from outputign li close tag.
			 * @see TM_NavMenuServices::registerModalButton() called from TM_NavMenuServices::tm_nav_buttons();
			 */
			if($item->object === 'tm_modal') return;

			/**
			 * If button, do nothing. Or redandunt LI tag will be output.
			 * The button markup has already been output.
			 */
			$_tm_custom_nav = get_post_meta($item->ID, 'menu-item-tm_custom_nav', true);
			if(preg_match("/button|icon/",$_tm_custom_nav)) return;

			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$output .= "</li>{$n}";
		}

		/**
		 * End
		 */
	}
} // namespace ThemeMountain ends