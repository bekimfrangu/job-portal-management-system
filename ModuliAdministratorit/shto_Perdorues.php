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
	<body>
		<?php
			//including the database connection file
			include_once("config.php");

			if(isset($_POST['shtoPerdorues'])) {	
				$Emri_Perdoruesi = $_POST['Emri_Perdoruesi'];
				$Fjalekalimi_Perdoruesi = MD5($_POST['Fjalekalimi_Perdoruesi']);
			
				$Email_Perdoruesi = $_POST['Email_Perdoruesi'];
					
				// checking empty fields
				if(empty($Emri_Perdoruesi) || empty($Fjalekalimi_Perdoruesi)|| empty($Email_Perdoruesi)) {			
				if(empty($Emri_Perdoruesi)) {echo "<font color='red'>Fusha perdoruesi eshte e zbrazet.</font><br/>";}
				if(empty($Fjalekalimi_Perdoruesi)) {echo "<font color='red'>Fusha fjalekalimi eshte e zbrazet.</font><br/>";}
				
				if(empty($Email_Perdoruesi)) {echo "<font color='red'>Fusha Email_Perdoruesi eshte e zbrazet.</font><br/>";}
				//link to the previous Fjalekalimi_Perdoruesi
				
				echo "<br/><a href='javascript:self.history.back();'>Kthehu mbrapa</a>";
			} else { 
				$Email_Perdoruesi = filter_var($Email_Perdoruesi, FILTER_SANITIZE_EMAIL);
				if (filter_var($Email_Perdoruesi, FILTER_VALIDATE_EMAIL) === false) {
				echo("<b> $Email_Perdoruesi</b> nuk eshte adrese valide");
				echo "<br/><a href='javascript:self.history.back();'><b> Kthehu ne formen e shtimit te perdoruesve</b></a>";
				}  else {
					
					echo("$Email_Perdoruesi eshte adrese valide");
					
					
					
					// if all the fields are filled (not empty) 
					//insert data to database	
					$result = mysqli_query($conn_perdorues, "CALL shtoPerdorues('$Emri_Perdoruesi','$Fjalekalimi_Perdoruesi','$Email_Perdoruesi')");
					//display success messpassword
					echo "<script>
					 setTimeout(function(){
						window.location.href = 'perdoruesit.php';
					 }, 5000);
				  </script>";
					 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
				
					//echo "<font color='green'>Data added successfully.";
					//echo "<br/><a href='perdoruesit.php'>View Result</a>";
				}
			}
		}
		?>

</body>
</html>
