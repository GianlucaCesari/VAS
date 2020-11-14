<?php
namespace ThemeMountain;
/**
 * Used for widget only.
 *
 * @package    ThemeMountain
 * @subpackage Core
 *
 * @see        section-parts/page_searchform.php Search form for content areas.
 */
?>

<div class="search-form-container">
	<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" novalidate>
		<div class="row">
			<div class="column width-12">
				<div class="field-wrapper">
					<input type="text" name="s" class="form-search form-element medium" placeholder="<?php esc_html_e('Search...',"thememountain-kant"); ?>" value="<?php echo get_search_query(); ?>">
					<span class="border"></span>
				</div>
			</div>
			<div class="column width-12">
				<input type="submit" value="<?php echo esc_attr_x( 'Find It', 'submit button' , "thememountain-kant" ); ?>" class="form-submit button medium bkg-charcoal bkg-hover-pink color-grey-light color-hover-white text-uppercase">
			</div>
		</div>
	</form>
	<div class="form-response"></div>
</div>