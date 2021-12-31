<?php 

	include("config.php");

?>
<!DOCTYPE HTML>

<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Moduli Perdoruesit</title>
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
							<?php 
								$visits=1;
								if(isset($_COOKIE["visits"])){
									$visits=(int)$_COOKIE["visits"];
								}$Month=2592000+ time();
								//this adds 30 days to the current time
								setcookie("visits",date("F jS - g:i a"), $Month);
								if(isset($_COOKIE['visits'])){
								$last=$_COOKIE['visits']; 
								echo "<p style='text-align:right;color:black;'>Vizita juaj e fundit ishte me: ".$last.".</p>";
								}
									else
									{
										echo "<p style='text-align:right; color:black;'>Vizita juaj e parë në uebaplikacionin tonë! Ju dëshirojmë mirëseardhje!</p>";
										}
							?>
						
							<?php
									$result = mysqli_query($conn_pozite, "CALL zgjedhPozitatBallina()");
													while ($row = mysqli_fetch_assoc($result)) {

													  extract($row);
													  
													  
										if($result==null)
										  mysqli_free_result($result);
									  
							?>
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2><?php echo $Emri_Kompania?> - <?php echo $Emri_Pozita?></h2>
										</header>
										<p><?php echo $Pershkrimi_Pozita?></p>
										
									</div>
									<span class="image"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Foto_Pozita'] ).'" width="100%" height="100%">'; ?></span>
							
							</div>
									
							
							</section>
					<?php } ?>
						<!-- First Section -->
							
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