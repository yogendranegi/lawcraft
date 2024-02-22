<?php
/**
 * Template part for displaying posts in a single post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lawcraft
 */
?>
 <article id="post-<?php the_ID(); ?>" <?php post_class();?>>
    <div class="blog-post">
               
        <div class="image">
            <?php
                if(has_post_thumbnail()) {
                    the_post_thumbnail('full');
                }
            ?>
            <div class="meta">
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
        <?php
            if(has_tag()){
                ?>
                    <div class="post-tags">
                        <i class="fas fa-tags"></i> <?php the_tags(); ?>
                    </div>
                <?php
            }
        ?>
        </div>
        <div class="content">
        <div class="title">
            <h1 class="entry-title">
                <?php the_title(); ?>
            </h1>
        </div> 
            <?php
                the_content();
                wp_link_pages(array(
                    'before'       => '<div class="page-link">' . esc_html__('pages','lawcraft'),
                    'after'        => '</div>',
                    'link_before'  => '<span>',
                    'link_after'   => '</span>',
                ));
            ?>
            <div class="clearfix"></div>
            <div class="post-categories">
                <?php $cat = esc_html(get_theme_mod('lawcraft_single_post_category_text',esc_html__('Category','lawcraft')));?>
                <span><?php echo $cat ?></span><?php the_category(); ?>
            </div>
        </div>
    </div>
 </article>
 <?php 
