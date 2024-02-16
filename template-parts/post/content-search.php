<?php
/**
 * Template part for displaying posts results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lawcraft
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="meta">
				<?php
                    $postedon = esc_html(get_theme_mod( 'lawcraft_post_posted_on_text', esc_html__('Posted on','lawcraft')));
                    $postedby = esc_html(get_theme_mod( 'lawcraft_post_posted_by_text', esc_html__('Posted by','lawcraft')));
                    $comments = esc_html(get_theme_mod( 'lawcraft_post_comments_text', esc_html__('Comments','lawcraft')));
                ?>
	            <span class="meta-item"><?php echo $postedon ?><?php the_time(get_option('date_format')) ?></span>
	            <span class="meta-item"><?php echo $postedby ?><a class="author-post-url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php the_author() ?></a></span>
	            <span class="meta-item"><?php echo $comments ?><a class="post-comments-url" href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%'); ?></a></span>
	        </div>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php lawcraft_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
