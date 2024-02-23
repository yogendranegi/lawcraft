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

<header id="<?php echo esc_attr($page_val);?>-inner" class="elementer-menu-anchor theme-menu-wrapper full-width-menu style1 page" role="banner">
    <?php
        if(true===get_theme_mod('lawcraft_enable_highlighted area',true) && is_front_page()){
            ?><a class="skip-link screen-reader-text" herf="#content"><?php esc_html_e('skip to content','lawcraft'); ?> </a> <?php
        }
        else{
        ?><a class="skip-link screen-reader-text" herf="#main"><?php esc_html_e('skip to content','lawcraft');?></a> <?php
    }
    ?>


    <div id="top-bar" class="topbar-wrapper">  
        <div class="container">
            <div class="menutext">
                <div class="col-md-12">
                    <div class="topbar-items">
                        <span class="phone"><?php esc_html_e('call us:8889-123-4567','lawcraft');?> </span> 
                        <span class="email"><?php esc_html_e('Email us at:info@example.com','lawcraft');?> </span>
                    </div>
                </div>
            </div>          
        </div>
    </div>
    <div id="header-main" class="header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-9 col-sm-9">
                    <div class="logo">
                        
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
                <div class="col-md-9 col-xs-3 col-sm-3">
                    <div class="top-menu-wrapper">                       
                        <nav class="top-menu" role="navigation" aria-label="<?php esc_attr_e('primary','lawcraft' ); ?>">
                            <div class="menu-header">
                                <span><?php esc_html_e('MENU','lawcraft');?> </span>
                                    <button type="button" class="hd-bar-opener navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1"      aria-expanded="false">
                                        <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'lawcraft' ); ?></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
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
    </div>    
</header>

<!-- side bar -->
<section id="hd-left-bar" class="hd-bar left-align   mCustomScrollbar" data-mcs-theme="dark">
       <div class="hd-bar-closer">
            <butoon>
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>    
            <span class="qb-close-buttton"></span></button>
       </div>
       <div class="hd-bar-wrapper">
            <div class="side-menu">
                <?php
                    /**
		              * Hook - lawcraft_action_search_content
		              *
		            * @hooked lawcraft_search_content - 10
		            */
                    do_action('lawcraft_action_search_content');
                ?>
                <nav role="navigation">
                    <div class="side-navigation clearfix" id="navbar-collapse-2">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' =>'primary',
                                'depth'          => 3,
                                'container'      =>'ul',
                                'container_class'=>'navigation',
                                'container_id'   =>'menu-primary-mobile',
                                'menu_class'     =>'navigation',
                                )
                            );
                        ?>
                    </div>
                </nav>
            </div>
     </div>
</section>

<div class="clearfix"></div>
<div id="content" class="elementor-menu-anchor"></div>

<?php
    if(true===get_theme_mod('lawcraft_enable_highlight_area',true)){
         /**
	    * Hook - lawcraft_action_highlight_area
	    *
	    * @hooked lawcraft_highlight_area - 10
	    */
        do_action('lawcraft_action_highlighted_area');
    }
?>
<div class="content-wrap">
    <div class="container">

