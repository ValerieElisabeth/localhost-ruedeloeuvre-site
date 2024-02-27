<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shopstar
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo !is_active_sidebar( 'sidebar-1' ) ? 'full-width' : ''; ?>">
		<main id="main" class="site-main" role="main">
		
		    <?php if ( function_exists( 'bcn_display' ) ) : ?>
		        <div class="breadcrumbs">
		            <?php bcn_display(); ?>
		        </div>
		    <?php endif; ?>
		
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header><!-- .page-header -->
			
			<div class="archive-container">
			
				<?php if ( have_posts() ) : ?>
				
					<?php
					$shopstar_blog_layout 			 	= get_theme_mod( 'shopstar-blog-layout', customizer_library_get_default( 'shopstar-blog-layout' ) );
					$shopstar_blog_masonry_grid_border = get_theme_mod( 'shopstar-blog-masonry-grid-border', customizer_library_get_default( 'shopstar-blog-masonry-grid-border' ) );
					
					if ( $shopstar_blog_layout == 'blog-post-masonry-grid-layout' ) {
					?>
					<div class="masonry-grid-container loading <?php echo $shopstar_blog_masonry_grid_border ? 'bordered' : ''; ?>">
					<?php
					}
					?>
				
					<?php while ( have_posts() ) : the_post(); ?>
		
						<?php
		
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'library/template-parts/content', get_post_format() );
						?>
		
					<?php endwhile; ?>
					
					<?php
					if ( $shopstar_blog_layout == 'blog-post-masonry-grid-layout' ) {
					?>
					</div>
					<?php
					}
					?>

					<?php
					// Prevent weirdness
					wp_reset_postdata();
					?>
		
					<?php the_posts_navigation(); ?>

				<?php else : ?>
		
					<?php get_template_part( 'library/template-parts/content', 'none' ); ?>
		
				<?php endif; ?>
				
			</div><!-- .archive-container -->

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
<?php get_footer(); ?>
