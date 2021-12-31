<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>
<?php
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
										<h3>Shto të dhënat e pozitës</h3>
										
											<form enctype="multipart/form-data"  method="post" action="shto_Pozite.php" >
												<div class="row gtr-uniform">
													<div class="col-6 col-12-xsmall">
													<table border="0">
														<tr>
															<select name="ID_Kompania">
																<option selected="selected">Zgjedh Kompaninë</option>
																	<?php
																	$res=mysqli_query($conn_kompani,"CALL zgjedhKompanite()");
																	while($row=$res->fetch_array())
																	{
																		?>
																		<option value="<?php echo $row['ID_Kompania']; ?>"><?php echo $row['Emri_Kompania']; ?></option>
																		<?php
																	}
																	?>
															</select><br />
														</tr>
														<tr> 
															<td>Pozita</td>
															<td><input type="text" name="Emri_Pozita"></td>
														</tr>
														<tr> 
															<td>Përshkrimi</td>
															<td><textarea rows="10" cols="30"  name="Pershkrimi_Pozita"></textarea></td>
														</tr>
														<tr> 
															<td>Vendi</td>
															<td><input type="text" name="Vendi_Pozita"></td>
														</tr>
														<tr> 
															<td>Orari</td>
															<td><input type="text" name="Orari_Pozita"></td>
														</tr>
														<tr>
															<td><input type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
															<td><input name="userfile" type="file" /></td>
														</tr>
														
														<tr> 
															<td></td>
															<td><input type="submit" class="primary" name="shtoPozite" value="Shto"></td>
														</tr>
												
												</table>
												</div>
												</div> 
											</form>
										
										
										<br>
										
										<form method="post" action="">
											<table>
												<tr>
													<h3>Kërko të dhënat e pozitës për modifikim ose fshirje</h3>
												</tr>
												
												<tr>
													<td>
														Shkruaj:
													</td>
													<td>
														<input type="text" name="term" id="term" placeholder="Pozita ose Vendi" value="%" />
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
														<td>Pozita</td>
														<td>Përshkrimi</td>
														<td>Vendi</td>
														<td>Orari</td>
												
														
														<td>Foto</td>
														<td>Emri skedar-it</td>
														<td>Kompania</td>
														
														
														<td>Modifiko</td>
														<td>Fshijë</td>
													</tr>
													
													<?php
														if (!empty($_REQUEST['term'])) {
														$term = mysqli_real_escape_string
														($conn_pozite,$_REQUEST['term']);     
														$sql = mysqli_query($conn_pozite,
														"CALL zgjedhKontrolloPozita('$term')"); 
														while($row = mysqli_fetch_array($sql)) { 		
																echo "<tr>";
																echo "<td>".$row['Emri_Pozita']."</td>";
																echo "<td>".$row['Pershkrimi_Pozita']."</td>";
																echo "<td>".$row['Vendi_Pozita']."</td>";
																echo "<td>".$row['Orari_Pozita']."</td>";
																echo "<td><img src=data:image/jpeg;base64,".base64_encode($row['Foto_Pozita'])." width='80'  height='100'/></td>";
																echo "<td>".$row['Emri_Foto']."</td>";
																echo "<td>".$row['Emri_Kompania']."</td>";
																echo "<td><a href=\"modifiko_Pozite.php?ID_Pozita=$row[ID_Pozita]\" class='button' class='button primary'>
														Modifiko</a></td>";
														echo "<td><a href=\"fshije_Pozite.php?ID_Pozita=$row[ID_Pozita]\" onClick=\"return confirm('A jeni te sigurt se deshironi te fshini Pozitën?')\" class='button' class='button primary'>Fshijë</a>
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