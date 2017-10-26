<?php wp_footer(); ?>
			<!-- Footer de PAGINATION -->
			<footer>
								<div class="pagination">
									<?php  wp_pagenavi();?>

<!-- 									<a href="#" class="previous">Prev</a>
									<a href="index.php" class="page active">1</a>
									<a href="page02.php" class="page">2</a>
									<a href="page03.html" class="page">3</a>
									<span class="extra">&hellip;</span>
									<a href="#" class="page">8</a>
									<a href="#" class="page">9</a>
									<a href="#" class="page">10</a>
									<a href="page02.php" class="next">Next</a> -->
								</div>
				</footer>

			 </div>

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
						<p>10, place de la minoterie<br /> 1080 - Bruxelles</p>
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

			<!-- Copyright -->
			<div id="copyright">
				<ul>
					<li>&copy; Brussely</li>
					<li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
				</ul>
			</div>

			</div>

			<!-- Scripts -->
			<script src="<?php bloginfo('template_url');?>/assets/js/jquery.min.js"></script>
			<script src="<?php bloginfo('template_url');?>/assets/js/jquery.scrollex.min.js"></script>
			<script src="<?php bloginfo('template_url');?>/assets/js/jquery.scrolly.min.js"></script>
			<script src="<?php bloginfo('template_url');?>/assets/js/skel.min.js"></script>
			<script src="<?php bloginfo('template_url');?>/assets/js/util.js"></script>
			<script src="<?php bloginfo('template_url');?>/assets/js/main.js"></script>
			
			<?php
					/* Vidéo responsive */
			function wpc_video_responsive() { 
			?>
			<script>
			jQuery(document).ready(function(){
			jQuery("#main").fitVids();
			});
			</script>
			<?php }
			add_action('wp_body', 'wpc_video_responsive');
			?>

</body>

</html>
