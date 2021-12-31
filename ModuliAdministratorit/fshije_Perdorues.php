<?php
//including the database connection file
include("config.php");

//getting ID_Perdoruesi of the data from url
$ID_Perdoruesi = $_GET['ID_Perdoruesi'];

//deleting the row from table
$result = mysqli_query($conn_perdorues,"CALL fshijePerdorues($ID_Perdoruesi)");

//redirecting to the display page (index.php in our case)
header("Location:fshije_perdorues_forma.php");
?>
