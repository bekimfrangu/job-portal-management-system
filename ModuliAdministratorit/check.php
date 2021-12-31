<?php
/* Kontrollon sesionin */
include('config.php');
session_start();
$user_check=$_SESSION['Emri_Perdoruesi'];
$ses_sql = mysqli_query($conn,"CALL kontrolloPerdorues('$user_check')  ");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_user=$row['Emri_Perdoruesi'];
if(!isset($user_check))
{ header("Location: index.php");} 
?>