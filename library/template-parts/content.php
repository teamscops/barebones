<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Barebones
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid'); ?>>
	
	<?php if (has_post_thumbnail()) :?>
		<div class="post-image element" style="<?php //post_cover_image('post-thumb-index'); // add .cover css class ?>">
			<?php the_post_thumbnail('post-thumb-index'); ?>
		</div>
	<?php endif; ?>

	<div class="post-content element <?php echo has_post_thumbnail() ? '' : ''; ?>">
		<header class="entry-header">
			<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php barebones_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'barebones' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'barebones' ),
				'after'  => '</div>',
				) );
				?>
				<footer class="entry-footer">
					<?php barebones_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</div><!-- .entry-content -->

		</div><!-- .post-content -->
	</article><!-- #post-## -->
