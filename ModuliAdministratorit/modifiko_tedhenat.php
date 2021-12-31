<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("check.php");	
?>
<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['modifiko_tedhenat']))
{	
	$ID_Tedhenat  = $_POST['ID_Tedhenat'];
	$Shenimi=$_POST['Shenimi'];
	$Shpjegimi=$_POST['Shpjegimi'];
	$Fajlli=$_POST['Fajlli'];
	$Pjesa_Faqes=$_POST['Pjesa_Faqes'];
			
		if(empty($Shenimi) || empty($Shpjegimi)||empty($Fajlli)||empty($Pjesa_Faqes)){
				
		if(empty($Shenimi)) {
			echo "<font color='red'>Fusha e titullit të të dhënës është e zbrazët.</font><br/>";
		}
		
		if(empty($Shpjegimi)) {
			echo "<font color='red'>Fusha e përshkrimit është e zbrazët.</font><br/>";
		}
		if(empty($Fajlli)) {
			echo "<font color='red'>Fusha e fajllit është e zbrazët.</font><br/>";
		}
		if(empty($Pjesa_Faqes)) {
			echo "<font color='red'>Fusha e pjeses se faqes është e zbrazët.</font><br/>";
		}
	
		
	
				
	} else {	
		//updating the table
		mysqli_query($conn_tedhena, "SET @p_ID_Tedhenat=${ID_Tedhenat}");
		mysqli_query($conn_tedhena, "SET @p_Shenimi='${Shenimi}'");
		mysqli_query($conn_tedhena, "SET @p_Shpjegimi='${Shpjegimi}'");
		mysqli_query($conn_tedhena, "SET @p_Fajlli='${Fajlli}'");
		mysqli_query($conn_tedhena, "SET @p_Pjesa_Faqes='${Pjesa_Faqes}'");

		$result=mysqli_query($conn_tedhena,"CALL modifikoTedhena(@p_ID_Tedhenat,@p_Shenimi,@p_Shpjegimi,@p_Fajlli,@p_Pjesa_Faqes)");
		//redirectig to the display ppassword. In our case, it is admin.php
		header("Location: modifiko_tedhenat_forma.php");
	}
}
?>
<?php
//getting uid from url
$ID_Tedhenat = $_GET['ID_Tedhenat'];

//selecting data associated with this particular uid
$result = mysqli_query($conn_tedhena,"CALL zgjedhIdTedhena('$ID_Tedhenat')");

while($res = mysqli_fetch_array($result))
{
	$Shenimi=$res['Shenimi'];
	$Shpjegimi=$res['Shpjegimi'];
	$Fajlli=$res['Fajlli'];
	$Pjesa_Faqes=$res['Pjesa_Faqes'];
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
					<header id="header" class="alt">
						<span class="logo"><img src="images/logo.svg" alt="" /></span>
						<h1>Uebaplikacioni për Menaxhimin e Pozitave të Punës në Fushën e Teknologjisë Informative (UMPPFTI)</h1>
			
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="ballina_Administrator.php" class="active">Ballina</a></li>
							<li><a href="kontaktet.php">Kontaktet</a></li>
							<li><a href="perdoruesit.php">Perdoruesit</a></li>
							<li><a href="logout.php">Ckycu</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<section id="content" class="main">

								<!-- Text -->
									<section>
										
										<p style="text-align:right;">Përshëndetje, <em><?php  echo $login_user;?>!</em></p>
										
									</section>

								<!-- Form -->
								<section>
									<form method="post" enctype="multipart/form-data" action="modifiko_tedhenat.php">
									<h3>Modifiko të dhënat</h3>
										
											<div class="row gtr-uniform">
												<div class="col-6 col-12-xsmall">
													Shënimi
													<input type="text" name="Shenimi"  value='<?php echo $Shenimi?>' required />
													<br>
													Shpjegimi
													<textarea  name="Shpjegimi" rows="10" cols="30" ><?php echo $Shpjegimi;?></textarea>
													<br>
													Emri i skedar-it
													<input type="text" name="Fajlli"  value='<?php echo $Fajlli;?>' required />
													<br>
													Pjesa e Faqes
													<input type="text" name="Pjesa_Faqes"  value='<?php echo $Pjesa_Faqes;?>' required />
													
												</div>
												
												<div class="col-12">
													<ul class="actions">
														<li><input type="hidden" name="ID_Tedhenat" value='<?php echo $_GET['ID_Tedhenat'];?>' /></li>
														<li><input type="submit" name="modifiko_tedhenat" value="Modifiko" class="primary" /></li>
													
													</ul>
												</div>
											</div>
										</form>
										
								</section>
								
							</section>
					
					</div>

				<!-- Footer -->
					<footer id="footer">
						<section>
							<h2>Përshkrim</h2>
							<p>Ky webaplikacion sherben per informim mbi pozitat e hapura te punes nga 
							kompani te ndryshme vendore dhe boterore me qellim te motivimit te te rinjeve
							per te ju dhene mundesin e shfaqjes se njohurive dhe shkathtesive te tyre ne pozitat
							e synuara per ta.</p>
							
						</section>
						<section>
							<h2>Info</h2>
							<dl class="alt">
								<dt>Adresa</dt>
								<dd>rr. Zija Shemsiu pn. 60000 Gjilan</dd>
								<dt>Tel</dt>
								<dd>+381 280-390-112</dd>
								<dt>Email</dt>
								<dd><a href="#">info@uni-gjilan.net</a></dd>
							</dl>
							<ul class="icons">
								<li><a href="#" class="icon brands fa-twitter alt"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands fa-instagram alt"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon brands fa-github alt"><span class="label">GitHub</span></a></li>
								<li><a href="#" class="icon brands fa-dribbble alt"><span class="label">Dribbble</span></a></li>
							</ul>
						</section>
						<p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
					</footer>


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
