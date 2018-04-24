
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$voiture = mysqli_real_escape_string($mysqli, $_POST['voiture']);
    $dateReparation = mysqli_real_escape_string($mysqli, $_POST['dateReparation']);
    $typeReparation = mysqli_real_escape_string($mysqli, $_POST['typeReparation']);
	$frais = mysqli_real_escape_string($mysqli, $_POST['frais']);
	$etat = mysqli_real_escape_string($mysqli, $_POST['etat']);
	

	// checking empty fields
	if(empty($voiture) || empty($dateReparation) || empty($typeReparation) || empty($frais) || empty($etat)) {

		if(empty($voiture)) {
			echo "<font color='red'>nom field is empty.</font><br/>";
		}

		if(empty($dateReparation)) {
			echo "<font color='red'>telephone field is empty.</font><br/>";
		}

		if(empty($typeReparation)) {
			echo "<font color='red'>N° Permi field is empty.</font><br/>";
		}
        if(empty($frais)) {
			echo "<font color='red'>Délivré le field is empty.</font><br/>";
		}
        if(empty($etat) ) {
			echo "<font color='red'>Identité field is empty.</font><br/>";
		}
		


		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)
        
		//insert data to database
        
         if($etat == 'enPanne'){
            $r = mysqli_query($mysqli, "UPDATE users SET st=2 WHERE matricule='".$voiture."'");
        }else{
            $r = mysqli_query($mysqli, "UPDATE users SET st=0 WHERE matricule='".$voiture."'");
         }
        
		$result = mysqli_query($mysqli, "INSERT INTO reparation(dateReparation,voiture,typeReparation,frais,etat) VALUES('$dateReparation','$voiture','$typeReparation','$frais','$etat')");
		header("Location:ajouter_reparation.php");
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='http://localhost/web/clients.php'>View Result</a>";
	}
}
?>
