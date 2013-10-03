<!DOCTYPE HTML>
<!--
	Arcana 2.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Blog KitMaker</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700" rel="stylesheet" />
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/style-ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	</head>
	<body>

		<!-- Header -->

			<div id="header-wrapper">
				<header class="container" id="site-header">
					<div class="row">
						<div class="12u">
							<div id="logo">
								<h1>Blog KitMaker</h1>
							</div>
							<nav id="nav">
								<ul>
									<li class="current_page_item"><a href='<?php echo base_url()."main/inicio"; ?>'>Ver Post</a></li>
									<li><a href='<?php echo base_url()."main/login"; ?>'>Acceso usuarios</a></li>
									<li><a href='<?php echo base_url()."main/registro"; ?>'>Registro usuarios</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</header>
			</div>

		<!-- Main -->

			<div id="main-wrapper">
				<div class="container">
					
					<!-- Banner -->

						<div class="row">
							<div class="12u">
								<div id="banner">
									<a href="#"><img src="images/banner.jpg" alt="" /></a>
									<div class="caption">
										<span><strong>Blog KitMaker</strong>: Esto es una prueba para KitMaker</span>
										<a href='<?php echo base_url()."main/login"; ?>' class="button">Comenzar</a>
									</div>
								</div>
							</div>
						</div>
						
					<!-- Thumbnails -->

						<div class="row">
							<div class="12u">
								<section class="thumbnails first last">
								
									<div> <!-- Bloque de comentario dinamico-->
										<div class="row">
											<div class="4u">
												<div class="thumbnail first">
													<a href="#"><img src="images/pic1.jpg" alt="" /></a>
													<blockquote>Duis neque nisi, dapibus sed mattis et quis, rutrum accumsan sed. Suspendisse eu varius nibh. Suspendapibus sed mattis quis.</blockquote>
													<cite><strong>Jane Doe</strong> Lorem Ipsum Dolore</cite>
												</div>
											</div>
											<div class="4u">
												<div class="thumbnail">
													<a href="#"><img src="images/pic2.jpg" alt="" /></a>
													<blockquote>Duis neque nisi, dapibus sed mattis et quis, rutrum accumsan sed. Suspendisse eu varius nibh. Suspenddapibus sed mattis quis.</blockquote>
													<cite><strong>John Doe</strong> Lorem Ipsum Dolore</cite>
												</div>
											</div>
											<div class="4u">
												<div class="thumbnail">
													<a href="#"><img src="images/pic3.jpg" alt="" /></a>
													<blockquote>Duis neque nisi, dapibus sed mattis et quis, rutrum accumsan sed. Suspendisse eu varius nibh. Suspenddapibus sed mattis quis.</blockquote>
													<cite><strong>Jane Doe</strong> Lorem Ipsum Dolore</cite>
												</div>
											</div>
										</div> <!-- Bloque de comentario dinamico-->
										
										<div class="row">
											<div class="12u">
												<div class="divider"></div>
											</div>
										</div>
									</div>
									
								</section>
							</div>  <!-- div 12u thumb row -->
						</div> <!-- div thumbnails row -->
				</div> <!-- div container -->
			</div> <!-- div main -->

		<!-- Footer -->
			<div id="footer-wrapper">
				<footer class="container" id="site-footer">
					<div class="row">
						<div class="12u">
							<div id="copyright">
								&copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a> | Images: <a href="http://fotogrph.com">fotogrph</a>
							</div>
						</div>
					</div>
				</footer>
			</div>
	</body>
</html>