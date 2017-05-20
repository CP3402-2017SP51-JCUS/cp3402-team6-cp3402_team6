<?php
/**
 * The template for displaying the footer.
 *
 * @package T6_Theme
 * @since T6_Theme 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php get_sidebar( 'footer' ); ?>

			<div class="site-info-container">
				<div class="site-info">
					<?php do_action( 't6_theme_credits' ); ?>
					<?php printf( __( 'Theme by %1$s', 't6_theme' ), 'Team 6' ); ?>
				</div><!-- .site-info -->
			</div><!-- .site-info-container -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>