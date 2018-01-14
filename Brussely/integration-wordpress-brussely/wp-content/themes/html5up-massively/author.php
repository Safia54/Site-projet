<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package base
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			
			<!-- Posts -->
			<section class="posts">
				<?php
				/* Start the Loop */
					while (have_posts()) :
						the_post();
				?>
				<article>
					<header>
						<span class="date">Posté le <?php the_date();?> à <?php the_time();?></span>
						<h2><a href="<?php the_permalink();?>"> <?php the_title();?> </a></h2>
						<span class="date"> Réalisé par <?php coauthors_posts_links()?> </span>
					</header>

					<div class="video-container">
						<?php the_post_thumbnail(); ?> 
						<?php the_excerpt(); ?>
					</div>
					<ul class="actions">	
						<li><a href="<?php the_permalink();?>" class="button">Full Story</a></li>
					</ul>
					
				</article>
				<?php
					endwhile; 
				?>
			</section>
			<?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 

get_sidebar();
get_footer();

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
