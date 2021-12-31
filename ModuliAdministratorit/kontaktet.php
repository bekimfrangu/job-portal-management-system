<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
	
?>
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Moduli Administratorit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<?php include_once("fillimi_faqes.php"); ?>
				<!-- Nav -->
					<?php include_once("menyte.php"); ?>
				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							

						<!-- First Section -->
							<section id="first" class="main special">
							<p style="text-align:right;">Përshëndetje, <em><?php  echo $login_user;?>!</em></p>
								<header class="major">
									<h3 style="text-align:left"><b>MENAXHIMI TË DHËNAVE TË KONTAKTIT</b></h3>
								</header>
								<ul class="features">
									
									<li>
										<span class="icon major style3 fa-copy"></span>
										<a href="fshije_kontakt_forma.php"><h3>Fshijë Kontakt</h3>
										<p>Forma për fshirjen e kontakteve në webaplikacion me të drejta të administratorit..</p></a>
									</li>
									
									
									
								</ul>
								
							</section>

						<!-- Second Section -->
							

						<!-- Get Started -->
						

					</div>

				<!-- Footer -->
				<?php include_once("fundi_faqes.php"); ?>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>