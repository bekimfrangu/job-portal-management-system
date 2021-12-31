<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Stellar by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
<body>
	<?php
		include_once("config.php");
	
		if(isset($_POST['shtoKompani'])) {	
			$Emri_Kompania = $_POST['Emri_Kompania'];
			
				
			// checking empty fields
			if(empty($Emri_Kompania)) {			
				if(empty($Emri_Kompania)) {echo "<font color='red'>Fusha Kompania është e zbrazët</font><br/>";}
				
				//link to the previous programi
				echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
			} else { 
				// if all the fields are filled (not empty) 
				//insert data to database	
				$result = mysqli_query($conn_kompani, "CALL shtoKompani('$Emri_Kompania')");
				//display success messprogrami
				//echo "<font color='green'>Data added successfully.";
				//echo "<br/><a href='ballina.php'>View Result</a>";
				echo "<script>
				 setTimeout(function(){
					window.location.href = 'menaxho_kompanite_forma.php';
				 }, 5000);
			  </script>";
				 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
			
			}
		}
	?>
</body>
</html>