<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
	
	include_once("config.php");
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
										
										
										<form method="post" action="">
											<table>
												<tr>
													<h3>Kërko të dhënat e kontaktit për fshirje</h3>
												</tr>
												
												<tr>
													<td>
														Shkruaj:
													</td>
													<td>
														<input type="text" name="term" placeholder="Subjektin ose Email-in" value="%" />
													</td>
													<td> <input type="submit" value="Kërko" /></td>
												</tr>
												
												
											</table>
										</form>
										
										
								</section>
								
								<section>
										<div class="table-wrapper">
											<table>
												
													<tr>
														<td>Subjekti</td>
														<td>Mesazhi</td>
														<td>Email-i</td>
														<td>Fshijë</td>
													</tr>
													
													<?php
														if (!empty($_REQUEST['term'])) {
														$term = mysqli_real_escape_string
														($conn_kontakt,$_REQUEST['term']);     
														$sql = mysqli_query($conn_kontakt,
														"CALL zgjedhKontrolloKontakt('$term')"); 
														while($row = mysqli_fetch_array($sql)) { 		
																echo "<tr>";
																echo "<td>".$row['Subjekti']."</td>";
																echo "<td>".$row['Mesazhi']."</td>";
																echo "<td>".$row['Email']."</td>";	
																echo "<td><a href=\"fshije_Kontakt.php?ID_Kontakti=$row[ID_Kontakti]\" onClick=\"return confirm('A jeni te sigurt se deshironi te fshini kontaktin?')\" class='button' class='button primary'>Fshijë</a>
																</td></tr>";	
															}

														}

													?>
											</table>
										</div>
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