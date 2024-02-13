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
	</div>
	<!-- Begin Footer Section -->
	<footer id="footer" class="lawcraft-footer" itemscope itemtype="https://schema.org/WPFooter">
		<div class="container footer-widgets">
			<div class="row">
				<div class="footer-widgets-wrapper">
	                <?php get_sidebar( 'footer' ); ?>
	            </div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container copyrights">
				<div class="row">
					<div class="footer-copyrights-wrapper">
						<?php
							/**
							 * Hook - lawcraft_action_footer.
							 *
							 * @hooked lawcraft_footer_copyrights - 10
							 */
							do_action( 'lawcraft_action_footer' );
						?>
					</div>
				</div>
			</div>
		</div>
    </footer>
	<?php wp_footer(); ?>
</body>