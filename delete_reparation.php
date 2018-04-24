<?php
//including the database connection file
$databaseHost = 'localhost';
$databaseName = 'location';
$databaseUsername = 'root';
$databasePassword = 'root';
$mysqli = mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);
//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM reparation WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:ajouter_reparation.php");
?>
