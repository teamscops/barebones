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
		<div class="container">
			<?php get_sidebar(); ?>
		</div>
	</section>

	<section class="section section-footer">
		<div class="container">
			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'barebones' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'barebones' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'barebones' ), 'barebones', '<a href="https://automattic.com/" rel="designer">Scops</a>' ); ?>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div>
	</section>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
