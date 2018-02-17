<!DOCTYPE HTML>
<!--
Je me suis inspirée de ce template en modifiant le HTML et la CSS à ma guise :

	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
	
La "wordpressification" de ce template a été faite par mes soins.
-->
<html>

<head>
	<title>Brussely</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
	<meta name="description" content="Brussely, un média participatif de jeunes reporters avec Bruxelles pour terrain de jeu." />
	<!-- <meta property="og:image" content="<?php /* bloginfo('template_url'); */?>/images/banniere-jour.png"> -->
	<link rel="stylesheet" href= "<?php bloginfo('template_url');?>/assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	<link rel="icon" href="<?php bloginfo('template_url');?>/images/logo-cercle-jaune.png" />
	<link rel="stylesheet" href= "<?php bloginfo('template_url');?>/style.css" />
	<?php wp_head(); ?>
</head>

<body class="is-loading" <?php  body_class();?> >


	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">

		<!-- Intro -->
		<div id="intro">
			<!-- <h1>Brussely</h1> -->
			<img src="<?php bloginfo('template_url');?>/images/logo-transparent.png" width= "400px">
			<p>De jeunes blogueurs avec Bruxelles comme terrain de jeu.</p>
			<ul class="actions">
				<li><a href="#header" class="button icon solo fa-arrow-down scrolly">Continue</a></li>
			</ul>
		</div>

		<!-- Header -->
		<header id="header">
			<a href="#header" class="logo">Because we love Brussels</a>
		</header>

		<!-- Nav -->
		<nav id="nav">
			
			<ul class="links">
				<li> <?php wp_nav_menu(array('theme_location' => 'menu-1',)); ?> </li>
			</ul>

			<ul class="icons">
				<li><a href="https://twitter.com/brussel_y" target="_blank" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="https://facebook.com/brussely" target="_blank" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="https://instagram.com/brussel_y" target="_blank" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="https://www.youtube.com/channel/UCfsGB-kgWg6nigqX9NHzbBg" target="_blank" class="icon fa-youtube"><span class="label">YouTube</span></a></li>
				<li><a href="https://medium.com/brussely" target="_blank" class="icon fa-medium"><span class="label">Medium</span></a></li>
				<li><a href="https://soundcloud.com/brussely" target="_blank" class="icon fa-soundcloud"><span class="label">SoundCloud</span></a></li>
			</ul>

		</nav>

<!-- Fil d'Ariane -->
		
		 	<div class="fil-ariane">
			<?php
				if(function_exists('bcn_display')) {
					bcn_display();
				}
			?>
			</div>


	
		
				 
			
