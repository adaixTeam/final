
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$nom = mysqli_real_escape_string($mysqli, $_POST['nom']);
    $telephone = mysqli_real_escape_string($mysqli, $_POST['telephone']);
    $permi = mysqli_real_escape_string($mysqli, $_POST['permi']);
	$delivre = mysqli_real_escape_string($mysqli, $_POST['delivre']);
	$cin = mysqli_real_escape_string($mysqli, $_POST['cin']);
	$adresse= mysqli_real_escape_string($mysqli, $_POST['adresse']);
$nationalite= mysqli_real_escape_string($mysqli, $_POST['nationalite']);
$ville= mysqli_real_escape_string($mysqli, $_POST['ville']);

	// checking empty fields
	if(empty($nom) || empty($telephone) || empty($permi) || empty($delivre) || empty($cin)|| empty($adresse)|| empty($nationalite)|| empty($ville)) {

		if(empty($nom)) {
			echo "<font color='red'>nom field is empty.</font><br/>";
		}

		if(empty($telephone)) {
			echo "<font color='red'>telephone field is empty.</font><br/>";
		}

		if(empty($permi)) {
			echo "<font color='red'>N° Permi field is empty.</font><br/>";
		}
        if(empty($delivre)) {
			echo "<font color='red'>Délivré le field is empty.</font><br/>";
		}
        if(empty($cin) ) {
			echo "<font color='red'>Identité field is empty.</font><br/>";
		}
		if(empty($adresse)) {
	echo "<font color='red'>adresse field is empty.</font><br/>";
}
if(empty($nationalite)) {
echo "<font color='red'>Nationalite field is empty.</font><br/>";
}
if(empty($ville)) {
echo "<font color='red'>Ville field is empty.</font><br/>";
}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO clients(nom,telephone,permi,delivre,cin,adresse,nationalite,ville,st) VALUES('$nom','$telephone','$permi','$delivre','$cin','$adresse','$nationalite','$ville','0')");
		header("Location:tables-clients.php");
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='http://localhost/web/clients.php'>View Result</a>";
	}
}
?>
