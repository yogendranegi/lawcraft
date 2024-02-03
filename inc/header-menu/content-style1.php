<?php
/**
 * Template part for displaying header menu
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lawcraft
 */

?>
<?php
    $page_val= is_front_page() ? 'home':'page' ;

?>

<header id="<?php echo esc_attr($page_val);?>-inner" class="elementer-menu-anchor   theme-menu-wrapper full-width-menu style1 page" role="banner">
    <?php
        if(true===get_theme_mod('lawcraft_enable_highlighted area',true) && is_front_page()){
            ?><a class="skip-link screen-reader-text" herf="#content"><?php esc_html_e('skip to content','lawcraft'); ?> </a> <?php
        }
        else{
        ?><a class="skip-link screen-reader-text" herf="#main"><?php esc_html_e('skip to content','lawcraft');?></a> <?php
    }
    ?>

    <div id="header-main" class="header-wrapper">
        <div class="col-md-3">
            <div class="logo">
                <div class="container">
                    <?php 
                        if(has_custom_logo()){
                            lawcraft_custom_logo();
                        }
                    ?>
        
                    <?php
                        $alt_logo=esc_url(get_theme_mod('lawcraft_sticky_logo'));
                            if(!empty($alt_logo)){
                                ?>
                                    <a id="logo-alt" class="logo-alt" href="<?php echo esc_url(home_url('/'));?>"> <img src="<?php echo esc_url(get_theme_mod('lawcraft_sticky_logo'));?>" alt="logo"></a>
                                <?php
                            }
                    ?>
                    <?php
                        $show_title =(true===get_theme_mod('lawcraft_display_site_title_tagline',true));
                        $header_class=$show_title ?
                        'site-title' :
                        'screen-reader-text';
                            if(!empty(get_bloginfo('name'))) {
                                if( is_front_page() || is_home()) {
                                ?>
                                <h1 class="<?php echo esc_attr($header_class);?>">
                                    <a href="<?php echo esc_url(home_url('/')); ?>"
                                    rel="home"><?php esc_html(bloginfo( 'name' ));?></a>
                                    </h1>
                                <?php

                                if(true===get_theme_mod(
                                    'lawcraft_display_site_title_tagline',true)) {
                                        $description = esc_html(get_bloginfo('description','display'));
                                            if($description || is_customize_preview()) {
                                                ?>
                                                    <p class="site-description"><?php echo $description;?></p>
                                                <?php
                                            }
                                    }
                                }
                                else {
                                    ?>
                                        <p class="<?php echo esc_attr($header_class);?>">
                                            <a herf="<?php echo esc_url(home_url('/'));?>" rel="home"><?php esc_html(bloginfo('name'));?></a>
                                        </p>
                                    <?php

                                    if(true=== get_theme_mod('lawcraft_display_site_title_tagline',true)) {
                                        $description= esc_html(get_bloginfo('descriptiopn','display'));
                                        if ($description || is_customize_preview()){
                                            ?>
                                                <p class="site-description"><?php echo $description;?></p>
                                            <?php
                                        }
                                    }
                                }
                            }
                    ?>
        
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="top-menu-wrapper">
                <div class="container">
                    <nav class="top-menu" role="navigation" aria-label="<?php esc_attr_e('primary','lawraft' ); ?>">
                        <div class="menu-header">
                            <span><?php esc_html_e('MENU','lawcraft');?> </span>
                            <button type="button" class="hd-bar-opener navbar-toggle collapsed"data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only"><?php esc_html_e('Toggle navigation','lawcraft');?></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="search-box"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix" id="navbar-collapse-1">
                            <?php 
                                wp_nav_menu(array(
                                    'theme_location' =>'primary',
                                    'depth'          =>3,
                                    'container'      =>'ul',
                                    'container_class'=>'navigation',
                                    'container_id'   =>'menu-primary',
                                    'menu_class'     =>'navigation',
                                ));
                                ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>    
</header>