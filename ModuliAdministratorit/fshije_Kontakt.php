<?php
//including the database connection file
include("config.php");

//getting uid of the data from url
$ID_Kontakti = $_GET['ID_Kontakti'];

//deleting the row from table
$result = mysqli_query($conn_kontakt,"CALL fshijeKontakt($ID_Kontakti)");

//redirecting to the display page (index.php in our case)
header("Location:fshije_kontakt_forma.php");
?>
