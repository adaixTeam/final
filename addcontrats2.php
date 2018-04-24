<?php

//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	//Locataire

	  $cin = mysqli_real_escape_string($mysqli, $_POST['cin']);
    $nom = mysqli_real_escape_string($mysqli, $_POST['nom']);
    $adresse = mysqli_real_escape_string($mysqli, $_POST['adresse']);
	  $telephone = mysqli_real_escape_string($mysqli, $_POST['telephone']);
		$permi = mysqli_real_escape_string($mysqli, $_POST['permi']);
		$delivre = mysqli_real_escape_string($mysqli, $_POST['delivre']);
		$ville = mysqli_real_escape_string($mysqli, $_POST['ville']);
	//Conducteur Supplémentaire
		$cinn = mysqli_real_escape_string($mysqli, $_POST['cinn']);
    $nomm = mysqli_real_escape_string($mysqli, $_POST['nomm']);
    $adressee = mysqli_real_escape_string($mysqli, $_POST['adressee']);
		$telephonee = mysqli_real_escape_string($mysqli, $_POST['telephonee']);
		$permii = mysqli_real_escape_string($mysqli, $_POST['permii']);
		$delivree = mysqli_real_escape_string($mysqli, $_POST['delivree']);
		$villee = mysqli_real_escape_string($mysqli, $_POST['villee']);
	//Voiture
		$matricule= mysqli_real_escape_string($mysqli, $_POST['matricule']);
		$marque= mysqli_real_escape_string($mysqli, $_POST['marque']);
		$model= mysqli_real_escape_string($mysqli, $_POST['model']);
		$carburant= mysqli_real_escape_string($mysqli, $_POST['carburant']);
//Info du Contrats
	$datedep= mysqli_real_escape_string($mysqli, $_POST['datedep']);
	$dateret= mysqli_real_escape_string($mysqli, $_POST['dateret']);
	$heure= mysqli_real_escape_string($mysqli, $_POST['heure']);
	$duree= mysqli_real_escape_string($mysqli, $_POST['duree']);

//Facture
	$mode= mysqli_real_escape_string($mysqli, $_POST['mode']);
	$total= mysqli_real_escape_string($mysqli, $_POST['total']);
	$avance= mysqli_real_escape_string($mysqli, $_POST['avance']);
	$rest= mysqli_real_escape_string($mysqli, $_POST['rest']);


	// checking empty fields
		if(empty($cin)) {





		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {

		/*echo '<script type="text/javascript">
		alert("'.$cin.'");
		alert("'.$nom.'");
		alert("'.$adresse.'");
		alert("'.$telephone.'");
		alert("'.$permi.'");
		alert("'.$delivre.'");
		alert("'.$ville.'");
		alert("'.$cinn.'");
		alert("'.$nomm.'");
		alert("'.$adressee.'");
		alert("'.$telephonee.'");
		alert("'.$permii.'");
		alert("'.$delivree.'");
		alert("'.$villee.'");
		alert("'.$matricule.'");
		alert("'.$marque.'");
		alert("'.$model.'");
		alert("'.$carburant.'");
		alert("'.$datedep.'");
		alert("'.$dateret.'");
		alert("'.$heure.'");
		alert("'.$duree.'");
		alert("'.$mode.'");
		alert("'.$total.'");
		alert("'.$avance.'");
		alert("'.$nom.'");
		alert("'.$rest.'");
		</script>';*/
		// if all the fields are filled (not empty)

		//insert data to database
			//$result1 = mysqli_query($mysqli, "UPDATE users SET st=2 WHERE matricule='".$matricule."'");
			//$result2 = mysqli_query($mysqli, "UPDATE clients SET st=2 WHERE cin='".$cin."'");

			$result = mysqli_query($mysqli, "INSERT INTO contrats2(cin,nom,adresse,telephone,permi,delivre,ville,cin2,nom2,adresse2,telephone2,permi2,delivre2,ville2,matricule,marque,model,carburant,datedep,dateret,heure,duree,pay,total,avance,rest,st) VALUES('$cin','$nom','$adresse','$telephone','$permi','$delivre','$ville','$cinn','$nomm','$adressee','$telephonee','$permii','$delivree','$villee','$matricule','$marque','$model','$carburant','$datedep','$dateret','$heure','$duree','$mode','$total','$avance','$rest','0')");
			 header("Location:tables-contrats.php");
			//display success message
			echo "<font color='green'>Data added successfully.";
			echo "<br/><a href='http://localhost/web/contrats.php'>View Result</a>";
	}
}
?>
