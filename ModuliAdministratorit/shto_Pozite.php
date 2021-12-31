
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
		//including the database connection file
			include_once("config.php");

			if(isset($_POST['shtoPozite'])) {	
				$Emri_Pozita = $_POST['Emri_Pozita'];
				$Pershkrimi_Pozita = $_POST['Pershkrimi_Pozita'];
				$Vendi_Pozita = $_POST['Vendi_Pozita'];
				$Orari_Pozita = $_POST['Orari_Pozita'];
				$imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
				$name = $_FILES['userfile']['name'];
				
				$ID_Kompania = $_POST['ID_Kompania'];
				
				
				
				
				 $maxsize = 10000000; //set to approx 10 MB
				

				
				
				// checking empty fields
				if(empty($Emri_Pozita) || empty($Pershkrimi_Pozita)|| empty($Vendi_Pozita) || empty($Orari_Pozita)) {
							
					if(empty($Emri_Pozita)) {
						echo "<font color='red'>Fusha Pozita është e zbrazët.</font><br/>";
					}
					
					if(empty($Pershkrimi_Pozita)) {
						echo "<font color='red'>Fusha Pershkrimi është e zbrazët.</font><br/>";
					}
					
					if(empty($Vendi_Pozita)) {
						echo "<font color='red'>Fusha Vendi është e zbrazët.</font><br/>";
					}
					if(empty($Orari_Pozita)) {
						echo "<font color='red'>Fusha Orari është e zbrazët.</font><br/>";
					}
					
					//link to the previous pMbiemri
					echo "<br/><a href='javascript:self.history.back();'>Kthehu Mbrapa</a>";
				} else { 
					// if all the fields are filled (not empty) 
						
					//insert data to database	
					$result = mysqli_query($conn_pozite, "CALL shtoPozite('$Emri_Pozita','$Pershkrimi_Pozita','$Vendi_Pozita','$Orari_Pozita','$imgData','$name', '$ID_Kompania')");
					
					//display success message
						echo "<script>
					 setTimeout(function(){
						window.location.href = 'menaxho_pozitat_forma.php';
					 }, 5000);
				  </script>";
					 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
					 
					//echo "<font color='green'>Data added successfully.";
					//echo "<br/><a href='ballina.php'>View Result</a>";
				}
		}
	?>
</body>
</html>