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
						<section id="content" class="main">

								<!-- Text -->
								<section>
										
									<p style="text-align:right;">Përshëndetje, <em><?php  echo $login_user;?>!</em></p>
									
								</section>

								<!-- Form -->
								<section>
										<h3>Shto të dhënat e përdoruesit</h3>
										<form method="post" action="shto_Perdorues.php">
											<div class="row gtr-uniform">
												<div class="col-6 col-12-xsmall">
													<input type="text" name="Emri_Perdoruesi" id="Emri_Perdoruesi" value="" placeholder="Përdoruesi" />
												<br>
													<input type="password" name="Fjalekalimi_Perdoruesi" id="Fjalekalimi_Perdoruesi" value="" placeholder="Fjalekalimi" />
												<br>
													<input type="email" name="Email_Perdoruesi" id="Email_Perdoruesi" value="" placeholder="Email-i" />
												
												</div>
												
												<div class="col-12">
													<ul class="actions">
														<li><input type="submit" name="shtoPerdorues" value="Shto" class="primary" /></li>
													
													</ul>
												</div>
											</div>
										</form>
									
										
								</section>
								
							</section>
					
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