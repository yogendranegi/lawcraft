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


 /**
 * Function for Minimizing dynamic CSS
 */
function lawcraft_minimize_css($css){
    $css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css);
    $css = preg_replace('/\s{2,}/', ' ', $css);
    $css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
    $css = preg_replace('/;}/', '}', $css);
    return $css;
}
 
/**
 * Footer
 */
 if (! function_exists( 'lawcraft_footer_copyrights' ) ):
    function lawcraft_footer_copyrights() {
        ?>
            <div class="row">
                <div class="copyrights">
                    <p>
                        <?php
                            if("" != esc_html(get_theme_mod( 'lawcraft_footer_copyright_text'))) :
                                echo esc_html(get_theme_mod( 'lawcraft_footer_copyright_text'));
                                if(get_theme_mod('lawcraft_en_footer_credits',true)) :
                                    ?><span><?php esc_html_e(' | Theme by ','lawcraft') ?><a href="<?php echo esc_url(LAWCRAFT_THEME_AUTH); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e('Spiracle Themes','lawcraft') ?></a></span>
                                    <?php   
                                endif;
                            else :
                                echo date_i18n(
                                    /* translators: Copyright date format, see https://secure.php.net/date */
                                    _x( 'Y', 'copyright date format', 'lawcraft' )
                                );
                                ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                                    <span><?php esc_html_e(' | Theme by ','lawcraft') ?><a href="<?php echo esc_url(LAWCRAFT_THEME_AUTH); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e('Spiracle Themes','lawcraft') ?></a></span>
                                <?php
                            endif;
                        ?>
                    </p>
                </div>
            </div>
        <?php    
    }
endif;
add_action( 'lawcraft_action_footer', 'lawcraft_footer_copyrights' );


/**
 * Page Title Settings
 */
if (!function_exists('lawcraft_show_page_title')):
    function lawcraft_show_page_title( $blogtitle=false,$archivetitle=false,$searchtitle=false,$pagenotfoundtitle=false ) {
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
            lawcraft_before_title_content(); 
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
                            ?><h1 class="main-title"><?php esc_html_e('Search Results','lawcraft') ?></h1><?php
                        endif;
                        if( $pagenotfoundtitle ) :
                            ?><h1 class="main-title"><?php esc_html_e('Page Not Found','lawcraft') ?></h1><?php
                        endif;
                        if( $blogtitle==false && $archivetitle==false && $searchtitle==false && $pagenotfoundtitle==false ):
                            ?><h1 class="main-title"><?php the_title(); ?></h1><?php
                        endif;
                    ?>
                    <div class="breadcrumb-wrapper">
                        <?php 
                            if(get_theme_mod( 'lawcraft_enable_page_breadcrumbs',true)) :
                                do_action('lawcraft_breadcrumbs_hook');
                            endif;
                        ?>
                    </div>
                </div>
                <?php lawcraft_after_title_content(); ?>
                </div>
                </div>
            <?php    
        endif;
    }
endif;
add_action('lawcraft_get_page_title', 'lawcraft_show_page_title');
