<?php
/* Kontrollon nese logini mund te kryhet me sukses, nese username dhe passwordi qe ka shkruar useri ne Index.php gjindet ne db ne MySQL */
	session_start();
	include("config.php"); //Establishing connection with our database
	
	$error = ""; //Variable for storing our errors.
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["Emri_Perdoruesi"]) || empty($_POST["Fjalekalimi_Perdoruesi"]))
		{
			$error = "Dy fushat duhen që të plotësohen.";
		}else
		{
			// Define $username and $password
			$Emri_Perdoruesi=$_POST['Emri_Perdoruesi'];
			$Fjalekalimi_Perdoruesi=$_POST['Fjalekalimi_Perdoruesi'];
			//Check username and password from database
			$sql="CALL zgjedhPerdorues('$Emri_Perdoruesi','$Fjalekalimi_Perdoruesi')";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['Emri_Perdoruesi'] = $Emri_Perdoruesi; // Initializing Session
				header("location: faqja_Administruese.php"); // Redirecting To Other Page
			}else
			{
				$error = "Incorrect username or password.";
			}
		}
	}
?>