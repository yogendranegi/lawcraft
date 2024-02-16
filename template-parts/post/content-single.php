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
        <div class="title">
            <h1 class="entry-title">
                <?php the_title(); ?>
            </h1>
        </div>
        <div class="meta">
            <?php
                $postedon = esc_html(get_theme_mod('lawcraft_single_post_posted_on_text',esc_html__('posted_on','lawcraft')));
                $postedby = esc_html(get_theme_mod('lawcraft_single_post_posted_on_text',esc_html__('posted_by','lawcraft')));
                $comments = esc_html(get_theme_mod('lawcraft_single_posts_comments_text',esc_html__('Comments','lawraft')));
            ?>

            <span class="meta-item author-single"><?php echo $postedby ?><a class="author-post-url" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')))?>"><?php the_author() ?></a>
            </span>
            <span class="meta-item date-single"><?php echo $postedon the_time(get_option('date_format'))?>
            </span>
            <span class="meta-item comments-single"><?php echo $comments ?><a class="post-comments-url" href="<?php the_permalink() ?> #comments"><?php comments_number('0','1','%');?></a>
            </span>
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
        <div class="image">
            <?php
                if(has_post_thumbnail()) {
                    the_posty_thumbnail('full');
                }
            ?>
        </div>
        <div class="content">
            <?php
                the_content();
                wp_link_pages(array(
                    'before'       => '<div class="page-link">' . esc_html__('pages','blogson'),
                    'after'        => '</div>',
                    'link_before'  => '<span>'
                    'link_after'   => '</span>'
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
 <?php esc_html(lawcraft_single_post_after_content($post->ID)); 