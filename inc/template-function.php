<?php
/**
 * @package lawcraft
 */


/**
 * Header
 */


 if (! function_exists('lawcraft_header_menu_styles')) :
    function lawcraft_header_menu_styles() {
        get_template_part( 'inc/header-menu/content',esc_html(get_theme_mod('lawcraft_header_menu_style','style1')));
    }
 endif;
    add_action( 'lawcraft_action_header', 'lawcraft_header_menu_styles' ); 
    

/*header closed*/ 