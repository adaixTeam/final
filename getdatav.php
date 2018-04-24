<?php
$databaseHost = 'localhost';
$databaseName = 'location';
$databaseUsername = 'root';
$databasePassword = 'root';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$matricule = $_GET["matricule"];
if($matricule != ""){

$res = mysqli_query($mysqli, "select * from users where matricule='$matricule'");


echo "<select onchange='change_state()'>";
    while($row = mysqli_fetch_array($res))
    {
        echo "<option>"; echo $row['marque']; echo "</option>";

    }
echo "</select>";
}



?>
