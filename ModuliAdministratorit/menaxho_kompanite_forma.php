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
										<h3>Shto të dhënat e kompanisë</h3>
										<form method="post" action="shto_Kompani.php">
											<div class="row gtr-uniform">
												<div class="col-6 col-12-xsmall">
													<input type="text" name="Emri_Kompania" id="Emri_Kompania" value="" placeholder="Kompania" />
												</div>
												
												<div class="col-12">
													<ul class="actions">
														<li><input type="submit" name="shtoKompani" value="Shto" class="primary" /></li>
													
													</ul>
												</div>
											</div>
										</form>
										
										<br>
										
										<form method="post" action="">
											<table>
												<tr>
													<h3>Kërko të dhënat e kompanisë për modifikim ose fshirje</h3>
												</tr>
												
												<tr>
													<td>
														Shkruaj:
													</td>
													<td>
														<input type="text" name="term" id="term" placeholder="Kompaninë" value="%"/>
													</td>
													<td> <input type="submit" value="Kërko" /></td>
												</tr>
												
												
											</table>
										</form>
										
										
								
										<div class="table-wrapper">
											<table>
												
													<tr>
														<td>Kompania</td>
														<td>Modifiko</td>
														<td>Fshijë</td>
													</tr>
													
													<?php
														if (!empty($_REQUEST['term'])) {
														$term = mysqli_real_escape_string
														($conn_kompani,$_REQUEST['term']);     
														$sql = mysqli_query($conn_kompani,
														"CALL zgjedhKontrolloKompani('$term')"); 
														 
														while($row = mysqli_fetch_array($sql)) { 		
																echo "<tr>";
																echo "<td>".$row['Emri_Kompania']."</td>";
																echo "<td><a href=\"modifiko_Kompani.php?ID_Kompania=$row[ID_Kompania]\" class='button' class='button primary'>
														Modifiko</a></td>";
														echo "<td><a href=\"fshije_Kompani.php?ID_Kompania=$row[ID_Kompania]\" onClick=\"return confirm('A jeni te sigurt se deshironi te fshini Kompaninë?')\" class='button' class='button primary'>Fshijë</a>
																</td>
																</tr>";		
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