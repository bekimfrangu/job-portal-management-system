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
<body>
<?php
		//including the database connection file
		include_once("config.php");

		if(isset($_POST['shtoKontakt'])) {	
			$Subjekti = mysqli_real_escape_string($_POST['Subjekti']);
			$Mesazhi = mysqli_real_escape_string($_POST['Mesazhi']);
			$Email = mysqli_real_escape_string($_POST['Email']);
				
			// checking empty fields
			if(empty($Subjekti) || empty($Mesazhi) || empty($Email)) {			
				if(empty($Subjekti)) {echo "<font color='red'>Fusha Subjekti është e zbrazët.</font><br/>";}
				if(empty($Mesazhi)) {echo "<font color='red'>>Fusha Mesazhi është e zbrazët.</font><br/>";}
				if(empty($Email)) {echo "<font color='red'>>Fusha Email është e zbrazët.</font><br/>";}
				//link to the previous Mesazhi
				echo "<br/><a href='javascript:self.history.back();'>Kthehu Mbrapa</a>";
			} else { 
				// if all the fields are filled (not empty) 
				//insert data to database	
				$result = mysqli_query($conn_kontakt, "CALL shtoKontakt('$Subjekti','$Mesazhi','$Email')");
				//display success messMesazhi
			//	echo "<font color='green'>Data added successfully.";
				//echo "<br/><a href='contact.php'>View Result</a>";
				echo "<script>
				 setTimeout(function(){
					window.location.href = 'index.php';
				 }, 5000);
			  </script>";
				 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
			
			}
		}
		?>
</body>
</html>
