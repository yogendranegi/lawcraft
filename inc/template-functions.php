<?php
/**
 * @package lawfiz
 */


/**
 * Header
 */
 if (! function_exists('lawfiz_header_menu_styles')) :
    function lawfiz_header_menu_styles() {
        get_template_part( 'inc/header-menu/content',esc_html(get_theme_mod('lawfiz_header_menu_style','style1')));
    }
 endif;
 add_action( 'lawfiz_action_header', 'lawfiz_header_menu_styles' ); 


 /**
 * Function for Minimizing dynamic CSS
 */
function lawfiz_minimize_css($css){
    $css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css);
    $css = preg_replace('/\s{2,}/', ' ', $css);
    $css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
    $css = preg_replace('/;}/', '}', $css);
    return $css;
}
 
/**
 * Footer
 */
 if (! function_exists( 'lawfiz_footer_copyrights' ) ):
    function lawfiz_footer_copyrights() {
        ?>
            <div class="row">
                <div class="copyrights">
                    <p>
                        <?php
                            if("" != esc_html(get_theme_mod( 'lawfiz_footer_copyright_text'))) :
                                echo esc_html(get_theme_mod( 'lawfiz_footer_copyright_text'));
                                if(get_theme_mod('lawfiz_en_footer_credits',true)) :
                                    ?><span><?php esc_html_e(' | Theme by ','lawfiz') ?><a href="<?php echo esc_url(LAWFIZ_THEME_AUTH); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e('Spiracle Themes','lawfiz') ?></a></span>
                                    <?php   
                                endif;
                            else :
                                echo date_i18n(
                                    /* translators: Copyright date format, see https://secure.php.net/date */
                                    _x( 'Y', 'copyright date format', 'lawfiz' )
                                );
                                ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                                    <span><?php esc_html_e(' | Theme by ','lawfiz') ?><a href="<?php echo esc_url(LAWFIZ_THEME_AUTH); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e('Spiracle Themes','lawfiz') ?></a></span>
                                <?php
                            endif;
                        ?>
                    </p>
                </div>
            </div>
        <?php    
    }
endif;
add_action( 'lawfiz_action_footer', 'lawfiz_footer_copyrights' );


/**
 * Page Title Settings
 */
if (!function_exists('lawfiz_show_page_title')):
    function lawfiz_show_page_title( $blogtitle=false,$archivetitle=false,$searchtitle=false,$pagenotfoundtitle=false ) {
        if(!is_front_page()) :
            if ( is_page() && has_post_thumbnail()) :
                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                ?>
                    <div class="page-title has-bg-image" style="background:url('<?php echo esc_url($featured_img_url) ?>') no-repeat scroll center center / cover;">
                        <div class="content-section img-overlay">
                        
                <?php
            else:
                ?>
                    <div class="page-title">
                        <div class="content-section">
                <?php
            endif;
            lawfiz_before_title_content(); 
            ?>
                <div class="container">
                    <?php
                        if( $blogtitle ) :
                            ?><h1 class="main-title"><?php single_post_title(); ?></h1><?php
                        endif;
                        if( $archivetitle ):
                            ?><h1 class="main-title"><?php the_archive_title(); ?></h1><?php
                        endif;
                        if( $searchtitle ) :
                            ?><h1 class="main-title"><?php esc_html_e('Search Results','lawfiz') ?></h1><?php
                        endif;
                        if( $pagenotfoundtitle ) :
                            ?><h1 class="main-title"><?php esc_html_e('Page Not Found','lawfiz') ?></h1><?php
                        endif;
                        if( $blogtitle==false && $archivetitle==false && $searchtitle==false && $pagenotfoundtitle==false ):
                            ?><h1 class="main-title"><?php the_title(); ?></h1><?php
                        endif;
                    ?>
                    <div class="breadcrumb-wrapper">
                        <?php 
                            if(get_theme_mod( 'lawfiz_enable_page_breadcrumbs',true)) :
                                do_action('lawfiz_breadcrumbs_hook');
                            endif;
                        ?>
                    </div>
                </div>
                <?php lawfiz_after_title_content(); ?>
                </div>
                </div>
            <?php    
        endif;
    }
endif;
add_action('lawfiz_get_page_title', 'lawfiz_show_page_title');
