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



/**
 * Footer
 */


 if (! function_exists( 'lawcraft_footer_copyrights' ) );
 function lawcraft_footer_copyrights() {
    ?>
        <div class="row">
            <div class="copyrights">
                <p>
                    <?php

                        if("" != esc_html(get_theme_mod( 'lawcraft_footer_copyright_text'))) {
                            echo esc_html(get_theme_mod( 'lawcraft_footer_copyright_text'));
                            if(get_theme_mod('blogson_en_footer_credits',true)) {
                                ?><span><?php esc_html_e(' | Theme by ','lawcraft') ?><a href="<?php echo esc_url(LAWCRAFT_THEME_AUTH); ?>" target="_blank"><?php esc_html_e('Spiracle Themes','lawcraft') ?></a></span>
                                <?php  
                            }
                        }
                        else{
                            echo data_i18n(
                                /*translators: Copyright data format, see https://secure.php.net/date */
                                _x( 'Y', 'copyright data format','lawcraft')
                            );
                            ?>
                                <a href="<?php echo esc_url( home_url('/' ) ); ?>"><?php bloginfo('name' ); ?></a>
                                <span><?php esc_html_e(' | Theme by ','lawcraft') ?><a href="<?php echo esc_url(LAWCRAFT_THEME_AUTH); ?>" target="_blank"><?php esc_html_e('Spiracle Themes','lawcraft') ?></a></span>
                                <?php
                        }
                    ?>
                <p>
            </div>
        </div>
    <?php                        
 }
endif;
add_action( 'lawcraft_action_footer', 'lawcraft_footer_copyrights' );
    

/*footer closed*/ 