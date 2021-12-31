<?php
//including the database connection file
include("config.php");

//getting uid of the data from url
$ID_Kompania = $_GET['ID_Kompania'];

//deleting the row from table
$result = mysqli_query($conn_kompani,"CALL fshijeKompani($ID_Kompania)");

//redirecting to the display page (index.php in our case)
header("Location:menaxho_kompanite_forma.php");
?>
