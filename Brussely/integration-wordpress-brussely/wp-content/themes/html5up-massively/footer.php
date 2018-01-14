<?php wp_footer(); ?>
			<!-- Footer de PAGINATION -->
	<footer>
		<div class="pagination">
			
		<?php echo paginate_links( $args ); ?>

		</div>
	</footer>
	
<!-- Fin de la div id="main" -->
</div>

	<!-- Copyright -->
	<div id="copyright">
		<h3>Suis-nous sur les réseaux sociaux :) </h3>
		<ul class="icons alt">
			<li><a href="https://twitter.com/brussel_y" target="_blank" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
			<li><a href="https://facebook.com/brussely" target="_blank" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
			<li><a href="https://instagram.com/brussel_y" target="_blank" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
			<li><a href="https://www.youtube.com/channel/UCfsGB-kgWg6nigqX9NHzbBg" target="_blank" class="icon alt fa-youtube"><span class="label">YouTube</span></a></li>
			<li><a href="https://medium.com/brussely" target="_blank" class="icon alt fa-medium"><span class="label">Medium</span></a></li>
			<li><a href="https://soundcloud.com/brussely" target="_blank" class="icon alt fa-soundcloud"><span class="label">SoundCloud</span></a></li>
		</ul>
		</br>
		<ul>
			<li> <a href="https://github.com/Safia54/Site-projet" target="_blank"> &copy; Brussely</a></li>
			<li>Design inspiré de <a href="https://html5up.net">HTML5 UP</a></li>
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
