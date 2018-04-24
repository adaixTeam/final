
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$nom = mysqli_real_escape_string($mysqli, $_POST['nom']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $telphone = mysqli_real_escape_string($mysqli, $_POST['telphone']);
	$post = mysqli_real_escape_string($mysqli, $_POST['post']);
	$cin = mysqli_real_escape_string($mysqli, $_POST['cin']);
	

	// checking empty fields
	if(empty($nom) || empty($email) || empty($telphone) || empty($post) || empty($cin) ) {

		if(empty($nom)) {
			echo "<font color='red'>nom field is empty.</font><br/>";
		}

		if(empty($email)) {
			echo "<font color='red'>telephone field is empty.</font><br/>";
		}

		if(empty($telphone)) {
			echo "<font color='red'>N° Telephone field is empty.</font><br/>";
		}
        if(empty($post)) {
			echo "<font color='red'>Post le field is empty.</font><br/>";
		}
        if(empty($cin) ) {
			echo "<font color='red'>Identité field is empty.</font><br/>";
		}
		

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)

		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO employes(nom,email,telphone,post,cin) VALUES('$nom','$email','$telphone','$post','$cin')");
		header("Location:tables-employe.php");
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='http://localhost/web/tables-employe.php'>View Result</a>";
	}
}
?>
