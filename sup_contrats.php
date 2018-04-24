<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];
$zak2 = mysqli_query($mysqli, "SELECT cin FROM contrats WHERE idcont=$id");
while($row = mysqli_fetch_array($zak2)){

            $z = $row['cin'];
            echo $z;
            $result2 = mysqli_query($mysqli, "UPDATE clients2 SET st=0 WHERE cin='$z'");
}

$zak = mysqli_query($mysqli, "SELECT matricule FROM contrats WHERE idcont=$id");
while($row2 = mysqli_fetch_array($zak)){

            $y = $row2['matricule'];
            echo $y;
            $result3 = mysqli_query($mysqli, "UPDATE users SET st=0 WHERE matricule='$y'");
}

//deleting the row from table

 // $result1 = mysqli_query($mysqli, "UPDATE users SET st=0 WHERE matricule=$zak");
$result = mysqli_query($mysqli, "DELETE FROM contrats WHERE idcont=$id");


//redirecting to the display page (index.php in our case)
header("Location:tables-contrats.php");
?>
