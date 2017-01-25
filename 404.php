<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Barebones
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'barebones' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content grid">
				<p class="element"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'barebones' ); ?></p>

				<div class="element element-search-form">
					<?php get_search_form(); ?>
				</div>

				<?php the_widget( 'WP_Widget_Recent_Posts', '', "before_widget=<div class=\"widget element is-half\">" ); ?>

				<?php
				// Only show the widget if site has multiple categories.
				if ( barebones_categorized_blog() ) :
					?>

				<div class="widget element is-half widget_categories">
					<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'barebones' ); ?></h2>
					<ul>
						<?php
						wp_list_categories( array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
							) );
							?>
						</ul>
					</div><!-- .widget -->

					<?php
					endif;
					/* translators: %1$s: smiley */
					$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'barebones' ), convert_smilies( ':)' ) ) . '</p>';
					?>
					<?php the_widget( 'WP_Widget_Archives', 'dropdown=1', "before_widget=<div class=\"widget element is-half\">", "after_title=</h2>$archive_content" ); ?>

					<?php the_widget( 'WP_Widget_Tag_Cloud','', "before_widget=<div class=\"widget element is-half\">"); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	get_footer();
