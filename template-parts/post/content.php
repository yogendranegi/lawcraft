<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lawcraft
 */
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="blog-post">
            <div class="blog-image-wrapper">
                <div class="image">
                    <a href="<?php echo esc_url(get_permalink());?>" rel="bookmark">
                        <?php
                            if(has_post_thumbnail()) {
                                the_post_thumbnail('full');
                            }
                        ?>
                    </a>                    
                </div>               
                <div id="author-section" class="meta">
                    <?php

                        if(true===get_theme_mod('lawcraft_enable_posts_meta_author',true)) :
                            
                            $postedby = esc_html(get_theme_mod( 'lawcraft_post_posted_by_text', esc_html__(' ','lawcraft')));
                            ?>
                                <span class="meta-item author"><i class="fa fa-user"></i><?php echo $postedby ?><a class="author-post-url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php the_author() ?></a>
                                </span>
                            <?php
                        endif;

                        if(true===get_theme_mod('lawcraft_enable_posts_meta_date',true)) :
                            $postedon = esc_html(get_theme_mod( 'lawcraft_post_posted_on_text', esc_html__(' ','lawcraft')));
                            ?>
                                <span class="meta-item date"><i class="fas fa-calendar-day"></i><?php echo $postedon ?><?php the_time(get_option('date_format')) ?>
                                </span>
                            <?php
                        endif;

                        if(true===get_theme_mod('lawcraft_enable_posts_meta_comments',true)) :
                            $comments = esc_html(get_theme_mod( 'lawcraft_post_comments_text', esc_html__('Comments: ','lawcraft')));
                            ?>
                               <span class="meta-item comments"><i class="fas fa-comment"></i><?php echo $comments ?><a class="post-comments-url" href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%'); ?></a>
                                 </span>
                            <?php
                        endif;


                        
                        
                       
                    ?>

                   
                    
                    
                </div> 
            </div>
            <div class="blog-content-wrapper">            
                <h2 class="entry-title">
                    <?php
                        if (is_sticky() && is_home()) :
                            echo "<i class='fas fa-thumbtack'></i>";
                        endif;
                    ?>
                    <a href="<?php echo esc_url(get_permalink());?>"rel="bookmark"><?php the_title();?></a>
                </h2>                
                <div class="content">
                <?php
                        if(is_single()){
                            the_content();
                            wp_link_pages(array(
                                'before'      => '<div class="page-link">' . esc_html__('Pages:','lawcraft'),
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                            ));
                            ?>
                                <div class="post-tags">
                                    <?php the_tags(); ?>
                                </div>
                                <div class="post-categories">
                                    <?php esc_html_e('Categories:','lawcraft') ?><?php the_category(); ?>
                                </div>
                            <?php
                        }
                        else{
                            the_excerpt();
                            $readmore = esc_html(get_theme_mod('lawcraft_posts_readmore_text',esc_html__('READ MORE +','lawcraft')));
                            if(!empty($readmore)) {
                                ?>
                                    <div class="read-more">
                                        <a href="<?php echo esc_url(get_permalink() ); ?>"><?php echo $readmore ?></a>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </article>   