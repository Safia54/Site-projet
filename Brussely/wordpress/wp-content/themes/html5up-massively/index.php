<?php
get_header('header.php'); 
 ?>
		<!-- Main -->
		<div id="main">

			<!-- Featured Post -->
			<article class="post featured">
				<header class="major">
					<!-- <span class="date">April 25, 2017</span> -->
					<h2><a href="#action">Qu'est ce que l'aventure<br />
									Brussely ?</a></h2>
					<p>Brussely, c'est à la base un groupe de potes jeunes et cools qui s'est agrandi.<br /> On réalise des vidéos sur notre ville de coeur, Bruxelles, qui devient notre terrain de jeu.<br /> On chipote au montage, au web, et on vous fait découvrir des
						recoins de Bruxelles par notre regard jeune.</p>
				</header>
				<div class="image main"> <img src="<?php bloginfo('template_url');?>/assets/images/banniere.png" alt="" /></a>
					<ul class="actions">
						<li><a href="https://medium.com/brussely/quest-ce-que-l-aventure-brussely-a5916e90171e?source=collection_home---4------0-----------" target="_blank" class="button big">Découvre notre histoire sur Medium</a></li>
					</ul>
			</article>

			<!-- Posts -->
			<section class="posts">
				<?php
					while (have_posts()) :
						the_post();
				?>
				<article>
					<header>
						<span class="date"><?php the_date(); ?></span>
						<h2><a href="<?php the_permalink();?>"> <?php the_title();?> </a></h2>
						<span class="date"> Réalisé par <?php the_author_posts_link();?> </span>
					</header>
						<?php  
							the_post_thumbnail();
							//the_content();
							the_excerpt();
							
						?>
					<ul class="actions">	
						<li><a href="<?php the_permalink();?>" class="button">Full Story</a></li>
					</ul>
					
				</article>
				<?php
					endwhile; 
				?>
			</section>

<?php
get_footer('footer.php');

?>