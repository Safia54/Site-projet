<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package base
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		?>
			<ul class="icons">
				<li> <a href="http://twitter.com/home?status=A voir : <?php the_permalink(); ?>" title="Partager sur Twitter !" target="_blank" class="icon fa-twitter">Partage sur Twitter !</a></li>
				<li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" title="Partager sur facebook" target="_blank" class="icon fa-facebook"> Partage sur Facebook !</a></li>
			</ul>	

		<?php	
			// Navigation de l'article
			// the_post_navigation();

			

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
