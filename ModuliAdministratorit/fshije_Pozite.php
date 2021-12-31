<?php
//including the database connection file
include_once("config.php");

//getting uid of the data from url
$ID_Pozita = $_GET['ID_Pozita'];

//deleting the row from table
$result = mysqli_query($conn_pozite,"CALL fshijePozite($ID_Pozita)");

//redirecting to the display page (index.php in our case)
header("Location: menaxho_pozitat_forma.php");
?>
