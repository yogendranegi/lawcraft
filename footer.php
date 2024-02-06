<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lawcraft
 */

?>
</div></div>
<!-- Begin Footer Section -->
<footer id="footer">
	<div class="container">		
        <div class="row">
            <div class="footer-widgets-wrapper">
                <?php
                    if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' )  ) {
                        get_sidebar( 'footer' );
                    }
                ?>	
            </div>
        </div>
        <?php
            /**
             * Hook - lawcraft_action_footer.
             *
             * @hooked lawcraft_footer_copyrights - 10
             */
            do_action( 'lawcraft_action_footer' );
        ?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
<!-- end footer  --> 