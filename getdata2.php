<?php
$databaseHost = 'localhost';
$databaseName = 'location';
$databaseUsername = 'root';
$databasePassword = 'root';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$cin = $_GET["cin"];
if($cin != ""){

$res = mysqli_query($mysqli, "select * from clients2 where cin='$cin'");


echo "<select onchange='change_state()'>";
    while($row = mysqli_fetch_array($res))
    {
        echo "<option>"; echo $row['telephone']; echo "</option>";

    }
echo "</select>";
}



?>
