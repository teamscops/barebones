<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Barebones
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if (has_post_thumbnail()) :?>
		<div class="post-image element" style="<?php //post_cover_image('post-thumb-index'); // add .cover css class ?>">
			<?php the_post_thumbnail('post-thumb-index'); ?>
		</div>
	<?php endif; ?>

	<div class="post-content element">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'barebones' ),
				'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

			<?php if ( get_edit_post_link() ) : ?>
				<footer class="entry-footer">
					<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', 'barebones' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
							),
						'<span class="edit-link">',
						'</span>'
						);
						?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
			</div>
		</article><!-- #post-## -->
