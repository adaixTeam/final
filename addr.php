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
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="http://localhost/web">Association Alwaha</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="http://localhost/web/#services">Secteur D'activites</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="http://localhost/web/#portfolio">Galerie</a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Team</a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="http://localhost/web/#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="http://localhost/web/index2.php">Gestion D'adhérent</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <header class="masthead">
        <div class="container">
            <div style="height:100px;">
            </div>
        </div>
    </header>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$cin = mysqli_real_escape_string($mysqli, $_POST['cin']);
	$nom = mysqli_real_escape_string($mysqli, $_POST['nom']);
  $matricule = mysqli_real_escape_string($mysqli, $_POST['matricule']);
  $dater = mysqli_real_escape_string($mysqli, $_POST['dater']);
	$dated = mysqli_real_escape_string($mysqli, $_POST['dated']);
	$duree = mysqli_real_escape_string($mysqli, $_POST['duree']);

	// checking empty fields
	if(empty($nom) || empty($matricule) || empty($dater) || empty($dated)|| empty($cin)) {


		if(empty($nom)) {
			echo "<font color='red'>nom field is empty.</font><br/>";
		}

		if(empty($matricule)) {
			echo "<font color='red'>Matricule field is empty.</font><br/>";
		}

		if(empty($dater)) {
			echo "<font color='red'>Date de Reservation  field is empty.</font><br/>";
		}
        if(empty($dated)) {
			echo "<font color='red'>Date de Départe field is empty.</font><br/>";
		}
        if(empty($cin) ) {
			echo "<font color='red'>Identité field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)
		$result1 = mysqli_query($mysqli, "UPDATE users SET st=1 WHERE matricule='".$matricule."'");
		$result2 = mysqli_query($mysqli, "UPDATE clients SET st=1 WHERE cin='".$cin."'");
		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO reservation(cin,nom,matricule,dater,dated,duree,st) VALUES('$cin','$nom','$matricule','$dater','$dated','$duree','0')");
		header("Location:tables-reservation.php");
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='http://localhost/web/Reservation.php'>View Result</a>";
	}
}
?>
</body>
</html>
