<?php
/**
 * Lawfiz Theme Customizer Helper Functions
 *
 * @package lawfiz
 */


/**
* Render callback for site title
* 
* @return void
*/
function lawfiz_site_title_callback() {
    bloginfo( 'name' );
}

/**
* Render callback for site description
* 
* @return void
*/
function lawfiz_site_description_callback() {
    bloginfo( 'description' );
}


/**
 * Check if the single post no sidebar is enabled or not
 */
function lawfiz_single_post_no_sidebar_enable( $control ) {
	if ( $control->manager->get_setting( 'lawfiz_blog_single_sidebar_layout' )->value() == "no" ) {
		return true;
	} else {
		return false;
	}
}


/**
 * Check if the single post no sidebar is enabled & full width disabled
 */
function lawfiz_single_post_no_sidebar_enable_full_width_disable( $control ) {
	if ( $control->manager->get_setting( 'lawfiz_blog_single_sidebar_layout' )->value() == "no" && $control->manager->get_setting( 'lawfiz_enable_single_post_full_width' )->value() == false  ) {
		return true;
	} else {
		return false;
	}
}


/**
 * Check if the menu sidebar is enabled or not
 */
function lawfiz_menu_sidebar_enable( $control ) {
	if ( $control->manager->get_setting( 'lawfiz_enable_menu_left_sidebar' )->value() == true ) {
		return true;
	} else {
		return false;
	}
}


/**
 * Check if the category archive settigns is enabled or not
 */
function lawfiz_cat_archive_enable( $control ) {
	if ( $control->manager->get_setting( 'lawfiz_enable_cat_archive_settings' )->value() == true ) {
		return true;
	} else {
		return false;
	}
}

