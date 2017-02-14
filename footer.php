<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Barebones
 */

?>

			</div><!-- #content -->
		</div>
	</section>

	<section class="section section-sidebar">
		<div class="container collapse">
			<?php get_sidebar(); ?>
		</div>
	</section>

	<section class="footer">
		<div class="container">
			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					<?php printf( esc_html__( '%1$s by %2$s', 'barebones' ), 'Barebones', '<a href="https://scops.com/" rel="designer">Scops</a>' ); ?>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div>
	</section>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
