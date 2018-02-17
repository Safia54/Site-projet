<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package base
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			<div class="team">
				<div class="author"> 
					<h2> <a href="<../author/safia/"> Safia </a> </h2>
					<a href="<../author/safia/"> <img src="<?php bloginfo('template_url');?>/images/team/safia.jpg"> </a>
				</div>

				<div class="author">
					<h2> <a href="<../author/yassine"> Yassine </a> </h2>
					<a href="<../author/yassine"> <img src="<?php bloginfo('template_url');?>/images/team/yassine.jpg"> </a>
				</div>
			
				<div class="author">
					<h2> <a href="../author/maria"> Maria </a> </h2>
					<a href="../author/maria"> <img src="<?php bloginfo('template_url');?>/images/team/maria.jpg"> </a>
				</div>

				<div class="author">	
					<h2> <a href="../author/emeline"> Emeline </a> </h2>
					<a href="../author/emeline"> <img src="<?php bloginfo('template_url');?>/images/team/emeline.jpg"> </a>
				</div>

				<div class="author">	
					<h2> <a href="../author/emeline"> Zaïd </a> </h2>
					<a href="../author/zaid"> <img src="<?php bloginfo('template_url');?>/images/team/zaid.jpg"> </a>
				</div>
			</div>

	<?php get_sidebar();?>
	<?php get_footer(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->


