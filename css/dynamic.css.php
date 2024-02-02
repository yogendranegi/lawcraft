<?php
/**
 * Lawcraft: Dynamic CSS Stylesheet
 * 
 */

function lawcraft_dynamic_css_stylesheet() {    
 
    $link_color= sanitize_hex_color(get_theme_mod( 'lawcraft_link_color','#444444' ));
    $link_hover_color= sanitize_hex_color(get_theme_mod( 'lawcraft_link_hover_color','#000000' ));
    

    $css = '        

        .wp-block-cover.alignwide,
        .wp-block-columns.alignwide,
        .wc-block-grid__products,
        .wp-block-cover-image .wp-block-cover__inner-container, 
        .wp-block-cover .wp-block-cover__inner-container {
             padding: 0 15px;
        }

        footer h4.widget-title {
            margin-bottom: 20px !important;
        }

        a {        
            color: ' . $link_color . '; 
            vertical-align: top;
        }

        a:hover {
            color: ' . $link_hover_color . '; 
            
        }
    ';

    //if sticky header disabled
    if(false===get_theme_mod( 'lawcraft_sticky_menu',true)) {
        $css .='        
             header.menu-wrapper.fixed { 
                display:none !important;
            }           
        ';  
    }

    return apply_filters( 'lawcraft_dynamic_css_stylesheet', lawcraft_minimize_css($css));
}
