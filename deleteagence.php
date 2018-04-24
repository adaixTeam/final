<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$ida = $_GET['ida'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM agence WHERE ida=$ida");

//redirecting to the display page (agence.php in our case)
header("Location:agence.php");
?>

