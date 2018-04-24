<html>
<head>
	<title>Ajouter</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->

    <link href="css/agency.min.css" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body id="page-top">
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['enregistrer'])) {	
	$nom = mysqli_real_escape_string($mysqli, $_POST['nom']);
	$ville = mysqli_real_escape_string($mysqli, $_POST['ville']);
	$adresse = mysqli_real_escape_string($mysqli, $_POST['adresse']);
	$tel = mysqli_real_escape_string($mysqli, $_POST['tel']);
	$fax = mysqli_real_escape_string($mysqli, $_POST['fax']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
	$nomma = mysqli_real_escape_string($mysqli, $_POST['nomma']);
	$prenomma = mysqli_real_escape_string($mysqli, $_POST['prenomma']);
	$emailma = mysqli_real_escape_string($mysqli, $_POST['emailma']);
	$telma = mysqli_real_escape_string($mysqli, $_POST['telma']);
	$Postema = mysqli_real_escape_string($mysqli, $_POST['Postema']);
	$Pseudoma = mysqli_real_escape_string($mysqli, $_POST['Pseudoma']);
	$mdpma = mysqli_real_escape_string($mysqli, $_POST['mdpma']);	
	// checking empty fields
	
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO agence(nom,ville,adresse,tel,fax,email,nombre,nomma,prenomma,emailma,telma,Postema,Pseudoma,mdpma)
		 	VALUES('$nom','$ville','$adresse','$tel','$fax','$email','$nombre','$nomma','$prenomma','$emailma','$telma','$Postema','$Pseudoma','$mdpma')");
		header("Location:agence.php");
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='http://localhost/location/pages/agence.php'>View Result</a>";
	
}
?>
</body>
</html>
