<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>
 <?php
// including the database connection file
include_once("config.php");

if(isset($_POST['modifikoPozite']))
{	
	$ID_Pozita = $_POST['ID_Pozita'];
	$Emri_Pozita=$_POST['Emri_Pozita'];
	$Pershkrimi_Pozita=$_POST['Pershkrimi_Pozita'];
	$Vendi_Pozita=$_POST['Vendi_Pozita'];	
	$Orari_Pozita = $_POST['Orari_Pozita'];
	
	$imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));	
	$name=$_FILES['userfile']['name'];
	$maxsize = 10000000; 
	
	$ID_Kompania=$_POST['ID_Kompania'];
	
	
	if(empty($Emri_Pozita) || empty($Pershkrimi_Pozita) || empty($Vendi_Pozita)||empty($Orari_Pozita)) {	
			
		if(empty($Emri_Pozita)) {
			echo "<font color='red'>Fusha Pozita është e zbrazët.</font><br/>";
		}
		
		if(empty($Pershkrimi_Pozita)) {
			echo "<font color='red'>Fusha Pershkrimi është e zbrazët.</font><br/>";
		}
		
		if(empty($Vendi_Pozita)) {
			echo "<font color='red'>Fusha Vendi është e zbrazët.</font><br/>";
		}if(empty($Orari_Pozita)) {
			echo "<font color='red'>Fusha Orari është e zbrazët.</font><br/>";
		}				
	} else {	
		
		mysqli_query($conn_pozite, "SET @p_ID_Pozita=${ID_Pozita}");
		mysqli_query($conn_pozite, "SET @p_Emri_Pozita='${Emri_Pozita}'");
		mysqli_query($conn_pozite, "SET @p_Pershkrimi_Pozita='${Pershkrimi_Pozita}'");
		mysqli_query($conn_pozite, "SET @p_Vendi_Pozita='${Vendi_Pozita}'");
		mysqli_query($conn_pozite, "SET @p_Orari_Pozita='${Orari_Pozita}'");
		
		mysqli_query($conn_pozite, "SET @p_Foto_Pozita='${imgData}'");
		mysqli_query($conn_pozite, "SET @p_Emri_Foto='${name}'");
		mysqli_query($conn_pozite, "SET @p_ID_Kompania='${ID_Kompania}'");
		
		$result=mysqli_query($conn_pozite,"CALL modifikoPozite(@p_ID_Pozita,@p_Emri_Pozita,@p_Pershkrimi_Pozita,@p_Vendi_Pozita, @p_Orari_Pozita,@p_Foto_Pozita,@p_Emri_Foto,@p_ID_Kompania)");
	
		header("Location: menaxho_pozitat_forma.php");
	}
}
?>
<?php
//getting ID_pajisjaElektroshtepiake from url
$ID_Pozita = $_GET['ID_Pozita'];

//selecting data associated with this particular ID_Pozita
$result = mysqli_query($conn_pozite,"CALL zgjedhIdPozite('$ID_Pozita')");

while($res = mysqli_fetch_array($result))
{
	$Emri_Pozita=$res['Emri_Pozita'];
	$Pershkrimi_Pozita=$res['Pershkrimi_Pozita'];
	$Vendi_Pozita=$res['Vendi_Pozita'];	
	$Orari_Pozita=$res['Orari_Pozita'];
	
	$imgData =$res['Foto_Pozita'];
	$ID_Kompania=$res['ID_Kompania'];
}
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
										
										
											<form enctype="multipart/form-data"  method="post" action="modifiko_Pozite.php" >
												<div class="row gtr-uniform">
													<div class="col-6 col-12-xsmall">
													<table border="0">
															<tr>
																<select name="ID_Kompania">
																	<option selected="selected" required>Zgjedh Kompaninë</option>
																		<?php
																		$res=mysqli_query($conn_kompani,"CALL zgjedhKompanite()");
																		while($row=$res->fetch_array())
																		{
																			?>
																			<option value="<?php echo $row['ID_Kompania']; ?>"><?php echo $row['Emri_Kompania']; ?></option>
																			<?php
																		}
																		?>
																</select>
															</tr>
														<tr> 
															<td>Pozita</td>
															<td><input type="text" name="Emri_Pozita" value='<?php echo $Emri_Pozita;?>' required ></td>
														</tr>
														<tr> 
															<td>Përshkrimi</td>
															<td><textarea name="Pershkrimi_Pozita" rows="10" cols="30" ><?php echo $Pershkrimi_Pozita?></textarea></td>
														</tr>
														<tr> 
															<td>Vendi</td>
															<td><input type="text" name="Vendi_Pozita" value='<?php echo $Vendi_Pozita;?>' required ></td>
														</tr>
														<tr> 
															<td>Orari</td>
															<td><input type="text" name="Orari_Pozita" value='<?php echo $Orari_Pozita;?>' required ></td>
														</tr>
														<tr>
															<td><input type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
															<td><input name="userfile" type="file" /></td>
														</tr>
														
														<tr> 
															<td><input type="hidden" name="ID_Pozita" value='<?php echo $_GET['ID_Pozita'];?>' /></td>
															<td><input type="submit" class="primary" name="modifikoPozite" value="Modifiko"></td>
														</tr>
												
												</table>
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