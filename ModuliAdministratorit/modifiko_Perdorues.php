<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>
<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['modifiko_Perdorues']))
{	
	$ID_Perdoruesi = $_POST['ID_Perdoruesi'];
	$Emri_Perdoruesi=$_POST['Emri_Perdoruesi'];
	$Fjalekalimi_Perdoruesi=MD5($_POST['Fjalekalimi_Perdoruesi']);
	$Email_Perdoruesi=$_POST['Email_Perdoruesi'];	
	

		
		if(empty($Emri_Perdoruesi) || empty($Fjalekalimi_Perdoruesi)  || empty($Email_Perdoruesi)) {	
			
		if(empty($Emri_Perdoruesi)) {
			echo "<font color='red'>Fusha perdoruesi eshte e zbrazet.</font><br/>";
		}
		
		if(empty($Fjalekalimi_Perdoruesi)) {
			echo "<font color='red'>Fusha fjalekalimi eshte e zbrazet.</font><br/>";
		}
		if(empty($Email_Perdoruesi)) {
			echo "<font color='red'>Fusha email eshte e zbrazet.</font><br/>";
		}		
	}else {	
		//updating the table
		mysqli_query($conn_perdorues, "SET @p_ID_Perdoruesi=${ID_Perdoruesi}");
		mysqli_query($conn_perdorues, "SET @p_Emri_Perdoruesi='${Emri_Perdoruesi}'");
		mysqli_query($conn_perdorues, "SET @p_Fjalekalimi_Perdoruesi='${Fjalekalimi_Perdoruesi}'");
		mysqli_query($conn_perdorues, "SET @p_Email_Perdoruesi='${Email_Perdoruesi}'");
		
		$result=mysqli_query($conn_perdorues,"CALL modifikoPerdorues(@p_ID_Perdoruesi,@p_Emri_Perdoruesi,@p_Fjalekalimi_Perdoruesi,@p_Email_Perdoruesi)");
		//redirectig to the display ppassword. In our case, it is admin.php
		header("Location: modifiko_perdorues_forma.php");
	}
}
?>
<?php
//getting uid from url
$ID_Perdoruesi = $_GET['ID_Perdoruesi'];

//selecting data associated with this particular uid
$result = mysqli_query($conn_perdorues,"CALL zgjedhIdPerdorues('$ID_Perdoruesi')");

while($res = mysqli_fetch_array($result))
{
	$Emri_Perdoruesi=$res['Emri_Perdoruesi'];
	$Fjalekalimi_Perdoruesi=$res['Fjalekalimi_Perdoruesi'];
	$Email_Perdoruesi=$res['Email_Perdoruesi'];



	

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
									<form Emri_Perdoruesi="form1" method="post" action="modifiko_Perdorues.php">
									<h3>Modifiko të dhënat e përdoruesit</h3>
										
											<div class="row gtr-uniform">
												<div class="col-6 col-12-xsmall">
													Përdoruesi
													<input type="text" name="Emri_Perdoruesi"  value='<?php echo $Emri_Perdoruesi;?>'/>
													<br>
													Fjalëkalimi
													<input type="text" name="Fjalekalimi_Perdoruesi"  value='<?php echo $Fjalekalimi_Perdoruesi;?>' required />
													<br>
													Email-i
													<input type="email" name="Email_Perdoruesi"  value='<?php echo $Email_Perdoruesi;?>'/>
												</div>
												
												<div class="col-12">
													<ul class="actions">
														<li><input type="hidden" name="ID_Perdoruesi" value='<?php echo $_GET['ID_Perdoruesi'];?>' /></li>
														<li><input type="submit" name="modifiko_Perdorues" value="Modifiko" class="primary" /></li>
													
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
