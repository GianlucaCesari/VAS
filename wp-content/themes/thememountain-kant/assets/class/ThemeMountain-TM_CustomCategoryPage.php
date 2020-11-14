<?php
/**
 * ThemeMountain namespace reserved for ThemeMountain Wordpress themes
 * If you do not know what namespace is, please read http://php.net/manual/en/language.namespaces.php
 */
namespace ThemeMountain {
	/**
	 * Adds Custom Category Page Feature
	 *
	 * @package ThemeMountain
	 * @subpackage Core
	 * @since 1.0.2
	 */
	class TM_CustomCategoryPage extends TM_ThemeMountain {
		/**
		 * Public Configuration variable
		 */


		/**
		 * End Properties
		 *
		 * Begin Method
		 */

		/**
		 * Class Constructor Magic Method.
		 *
		 * Cache theme version, execute class setup method and add filter for option fields in the admin panel.
		 *
		 * @since 1.0.2
		 * @access public
		 */
		public function __construct() {
			if(is_admin()) {
				// Adds extra fields in category editor
				add_action ( 'category_edit_form_fields', ['ThemeMountain\\TM_CustomCategoryPage','tm_extra_category_fields']);
				add_action ( 'tm_folio_category_edit_form_fields', ['ThemeMountain\\TM_CustomCategoryPage','tm_extra_category_fields']);
				// Saves a change to settings
				add_action ( 'edited_category', ['ThemeMountain\\TM_CustomCategoryPage','tm_save_extra_category_fileds']);
				add_action ( 'edited_tm_folio_category', ['ThemeMountain\\TM_CustomCategoryPage','tm_save_extra_category_fileds']);
			}
		}

		/**
		 * Public Methods for hooks
		 */

		/**
		 * Add extra category field(s) for custom category page.
		 *
		 * @uses       edit_category_form_fields Wordpress action hook
		 * @see        TM_TemplateServices::set_current_template_data()
		 */
		public static function tm_extra_category_fields($tag) {
			/** category Id */
			$_term_id = $tag->term_id;
			// category meta
			$_cat_meta = get_option( "tm_category_meta_".$_term_id );
			/** find selected */
			$_selected = (isset($_cat_meta['page_id']) && !empty($_cat_meta['page_id'])) ? $_cat_meta['page_id'] : 0;
			?>
			<tr class="form-field">
				<th scope="row" valign="top"><label for="custom_category_page[page_id]"><?php echo TM_ThemeStrings::$text_strings['TM_CustomCategoryPage']['custom_category_page']; ?></label></th>
				<td>
					<?php wp_dropdown_pages(array('name'=>'custom_category_page[page_id]','selected'=>$_selected,'show_option_none'=>TM_ThemeStrings::$text_strings['TM_CustomCategoryPage']['do_not_use_custom_page'])); ?><br>
		            <p class="description"><?php echo TM_ThemeStrings::$text_strings['TM_CustomCategoryPage']['choose_page']; ?></p>
		        </td>
			</tr>
			<?php
		}

		/**
		 * Saves settings of extra category field(s) for custom category page.
		 *
		 * @uses       edited_category Wordpress action hook
		 *
		 */
		public static function tm_save_extra_category_fileds($term_id) {
			if ( isset( $_POST['custom_category_page'] ) ) {
				$_cat_meta = get_option( "tm_category_meta_".$term_id);
				$_cat_keys = array_keys($_POST['custom_category_page']);
				foreach ($_cat_keys as $key){
					if (isset($_POST['custom_category_page'][$key])){
						$cat_meta[$key] = $_POST['custom_category_page'][$key];
					}
				}
      			//save the option array
				update_option( "tm_category_meta_".$term_id, $cat_meta );
			}
		}


		/**
		 * Public Methods for both classes and front end template files.
		 */

		/**
		 * Gets the custom category page identifier.
		 *
		 * @see        TM_TemplateServices::set_current_template_data()
		 *
		 * @param      $_taxonomy_slug
		 *
		 * @return     <type>  The custom category page identifier.
		 */
		public static function get_custom_category_page_id($taxonomy,$slug) {
			$_taxonomy_object = get_term_by('slug' , $slug, $taxonomy);
			if($_taxonomy_object) {
				$_term_id = $_taxonomy_object->term_id;
				$_cat_meta = get_option( "tm_category_meta_".$_term_id);
				if(isset($_cat_meta['page_id']) && !empty($_cat_meta['page_id'])) {
					return $_cat_meta['page_id'];
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}

		/**
		 * Protected methods
		 */


		/**
		 * End
		 */
	}
}