<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Barebones
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid'); ?>>
	<?php if (has_post_thumbnail()) :?>
		<div class="post-image element" style="<?php post_cover_image('post-thumb-index'); ?>"></div>
	<?php endif; ?>

	<div class="post-content element">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if (has_post_thumbnail()) :?>
				<div class="post-image element" style="<?php //post_cover_image('post-thumb-index'); // add .cover css class ?>">
					<?php the_post_thumbnail('post-thumb-index'); ?>
				</div>
			<?php endif; ?>
			
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<?php barebones_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
