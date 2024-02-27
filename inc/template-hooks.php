<?php
/**
 * Custom template hooks for this theme.
 *
 *
 * @package lawcraft
 */


/**
 * Before title meta hook
 */
if ( ! function_exists( 'lawcraft_before_title' ) ) :
function lawcraft_before_title() {
	do_action('lawcraft_before_title');
}
endif;


/**
 * Before title content hook
 */
if ( ! function_exists( 'lawcraft_before_title_content' ) ) :
	function lawcraft_before_title_content() {
		do_action('lawcraft_before_title_content');
	}
endif;


/**
 * After title content hook
 */
if ( ! function_exists( 'lawcraft_after_title_content' ) ) :
	function lawcraft_after_title_content() {
		do_action('lawcraft_after_title_content');
	}
endif;


/**
 * After title meta hook
 */
if ( ! function_exists( 'lawcraft_after_title' ) ) :
function lawcraft_after_title() {
	do_action('lawcraft_after_title');
}
endif;


/**
 * Single post content after meta hook
 */
if ( ! function_exists( 'lawcraft_single_post_after_content' ) ) :
function lawcraft_single_post_after_content($postID) {
	do_action('lawcraft_single_post_after_content',$postID);
}
endif;