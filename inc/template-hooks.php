<?php
/**
 * Custom template hooks for this theme.
 *
 *
 * @package lawfiz
 */


/**
 * Before title meta hook
 */
if ( ! function_exists( 'lawfiz_before_title' ) ) :
function lawfiz_before_title() {
	do_action('lawfiz_before_title');
}
endif;


/**
 * Before title content hook
 */
if ( ! function_exists( 'lawfiz_before_title_content' ) ) :
	function lawfiz_before_title_content() {
		do_action('lawfiz_before_title_content');
	}
endif;


/**
 * After title content hook
 */
if ( ! function_exists( 'lawfiz_after_title_content' ) ) :
	function lawfiz_after_title_content() {
		do_action('lawfiz_after_title_content');
	}
endif;


/**
 * After title meta hook
 */
if ( ! function_exists( 'lawfiz_after_title' ) ) :
function lawfiz_after_title() {
	do_action('lawfiz_after_title');
}
endif;


/**
 * Single post content after meta hook
 */
if ( ! function_exists( 'lawfiz_single_post_after_content' ) ) :
function lawfiz_single_post_after_content($postID) {
	do_action('lawfiz_single_post_after_content',$postID);
}
endif;