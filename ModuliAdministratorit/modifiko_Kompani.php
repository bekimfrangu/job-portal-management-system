<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>
<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['modifiko_Kompani']))
{	
	$ID_Kompania = $_POST['ID_Kompania'];
	
	$Emri_Kompania=$_POST['Emri_Kompania'];
	
	
	// checking empty fields
	if(empty($Emri_Kompania) ) {	
			
		if(empty($Emri_Kompania)) {
			echo "<font color='red'>Fusha Kompania është e zbrazët</font><br/>";
		}
		
	
	} else {	
		mysqli_query($conn_kompani, "SET @p_ID_Kompania=${ID_Kompania}");
		mysqli_query($conn_kompani, "SET @p_Emri_Kompania='${Emri_Kompania}'");
		//updating the table
		$result = mysqli_query($conn_kompani,"CALL modifikoKompani(@p_ID_Kompania,@p_Emri_Kompania)");
		
		//redirectig to the display pProgrami. In our case, it is admin.php
		header("Location: menaxho_kompanite_forma.php");
	}
}
?>
<?php
//getting uid from url
$ID_Kompania = $_GET['ID_Kompania'];

//selecting data associated with this particular uid
$result = mysqli_query($conn_kompani,"CALL zgjedhIdKompani('$ID_Kompania')");

while($res = mysqli_fetch_array($result))
{
	$Emri_Kompania=$res['Emri_Kompania'];

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
									<form Emri_Kompania="form1" method="post" action="modifiko_Kompani.php" enctype="multipart/form-data">
									<h3>Modifiko të dhënat e Fakultetit</h3>
										
											<div class="row gtr-uniform">
												<div class="col-6 col-12-xsmall">
													Kompania:
													<input type="text" name="Emri_Kompania"  value='<?php echo $Emri_Kompania;?>'   required />
												</div>
												
												<div class="col-12">
													<ul class="actions">
														<li><input type="hidden" name="ID_Kompania" value='<?php echo $_GET['ID_Kompania'];?>' /></li>
														<li><input type="submit" name="modifiko_Kompani" value="Modifiko" class="primary" /></li>
													
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