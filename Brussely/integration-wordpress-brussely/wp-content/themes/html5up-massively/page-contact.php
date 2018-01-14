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
<!-- Footer pour le FORMULAIRE-->
	<footer id="footer">
		<section>
			<form method="post" action="traitement_formulaire.php">
				<div class="field">
					<h6> Formulaire de contact : </h6>
					<label for="name">Nom</label>
					<input type="text" name="name" id="name" required/>
				</div>
				<div class="field">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" required/>
				</div>
				<div class="field">
					<label for="message">Envoie-nous ton message :) </label>
					<textarea name="message" id="message" rows="3" required></textarea>
				</div>
				<!-- On va mettre en place un piège à spam honeypot que seul un bot ou un hacker peut voir car il est en statut hidden -->
				<div>
				<input type="checkbox" name="potdemiel" hidden="yes">
				</div>

				<ul class="actions">
					<li><input type="submit" value="Envoi message" /></li>
				</ul>
			</form>
		</section>
		<section class="split contact">
			<section class="alt">
				<h3>Adresse</h3>
				<p> <a href="https://www.google.be/maps/search/Rue+Darimon+10,+1080++10,+place+de+la+minoterie+1080+-+Bruxelles-Saint-Jean/@50.8548627,4.3385132,17z/data=!3m1!4b1" target="_blank">10, place de la minoterie <br/> 1080 - Bruxelles</a> </p>
			</section>
			<section>
				<h3>Téléphone</h3>
				<p><a href="tel:+324830077"> +32(0)483/51.00.77</a></p>
			</section>
			<section>
				<h3>Email</h3>
				<p><a href="mailto:hello.brussely@gmail.com">hello.brussely@gmail.com</a></p>
			</section>
			<section>
				<h3>Suis-nous sur les réseaux sociaux :) </h3>
				<ul class="icons alt">
					<li><a href="https://twitter.com/brussel_y" target="_blank" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="https://facebook.com/brussely" target="_blank" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="https://instagram.com/brussel_y" target="_blank" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="https://www.youtube.com/channel/UCfsGB-kgWg6nigqX9NHzbBg" target="_blank" class="icon alt fa-youtube"><span class="label">YouTube</span></a></li>
					<li><a href="https://medium.com/brussely" target="_blank" class="icon alt fa-medium"><span class="label">Medium</span></a></li>
					<li><a href="https://soundcloud.com/brussely" target="_blank" class="icon alt fa-soundcloud"><span class="label">SoundCloud</span></a></li>
				</ul>
			</section>
		</section>
	</footer>
	<?php
	get_sidebar();
	get_footer();
	?>
		</main><!-- #main -->
	</div><!-- #primary -->


