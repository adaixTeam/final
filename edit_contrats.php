<?php
// including the database connection file
session_start();

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}

include_once("config.php");

if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
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
	if(empty($cin) ) {

		if(empty($cin)) {
			echo "<font color='red'>Identité field is empty.</font><br/>";
		}


	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE contrats2 SET cin='$cin',nom='$nom',adresse='$adresse',telephone='$telephone',permi='$permi',delivre='$delivre',ville='$ville',cin2='$cinn',nom2='$nomm',adresse2='$adressee',telephone2='$telephonee',permi2='$permii',delivre2='$delivree',ville2='$villee',matricule='$matricule',marque='$marque',model='$model',carburant='$carburant',datedep='$datedep',dateret='$dateret',heure='$heure',duree='$duree',pay='$mode',total='$total',avance='$avance',rest='$rest' WHERE idcont=$id");

		//redirectig to the display page. In our case, it is index.php
		header("Location: contrats.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM contrats2 WHERE idcont=$id");

while($res = mysqli_fetch_array($result))
{

	$cin = $res['cin'];
		$nom = $res['nom'];
		$adresse = $res['adresse'];
	$telephone = $res['telephone'];
	$permi = $res['permi'];
	$delivre = $res['delivre'];
	$ville = $res['ville'];
	//Conducteur Supplémentaire
	$cinn = $res['cinn'];
		$nomm = $res['nomm'];
		$adressee = $res['adressee'];
	$telephonee =$res['telephonee'];
	$permii =$res['permii'];
	$delivree = $res['delivree'];
	$villee = $res['villee'];
	//Voiture
$matricule= $res['matricule'];
$marque= $res['marque'];
$model= $res['model'];
$carburant= $res['carburant'];
//Info du Contrats
$datedep= $res['datedep'];
$dateret= $res['dateret'];
$heure= $res['heure'];
$duree= $res['duree'];

//Facture
$mode=$res['mode'];
$total=  $res['total'];
$avance=$res['avance'];
$rest= $res['rest'];

}
?>
        <html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
										<ul class="dropdown-menu animated littleFadeInRight" role="menu">
												<li>
														<a href="index.php?logout='1'">
																<i class="fa fa-sign-out"></i>Déconnecte
														</a>
												</li>
										</ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Accueil</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="active" href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->





        <!-- Navigation -->


        <!-- Page Content -->
        <div id="page-wrapper">
         <div class="panel-body">
						 <ul class="list-inline">
							<li><a href="#">Accueil</a></li>
							<li><a href="tables.html">Voiture</a></li>
							<li><span>Informations</span></li>
						</ul>
                        </div>


                <div class="col-lg-12">
                    <h1 class="page-header">Information sur la voiture </h1>
                </div>
                <!-- /.col-lg-12 -->

                        <div class="row" style="display:inline-flex">


							<!-- Profile Car -->
							<div class="profile-sidebar" style="width: 230px;">
								<div class="portlet light profile-sidebar-portlet ">
									<div class="profile-usertitle">
										<div class="profile-userpic">
											<img src="download.png" class="img-responsive">
										</div>
										<div class="profile-usertitle-name">
											<hr>

										</div>
									</div>
                                    <div class="profile-usermenu">
											<ul class="nav">
<li><a href="apercu.php" > Aperçu </a></li>

<li><a href="Les_Contrats_voitur.html" > Historique </a></li>

<li><a href="modifier_voitur.php"> Modifier </a></li>
<li><a href="supprimer-voitur.html"> Supprimer </a></li>

										</ul>
									</div>
                                    </div>
                          </div>



                             <div id="for" style="width:750px;">
            <div class="row" style="width:750px;">
                <div class="col-lg-12">

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <!-- /.panel-heading -->
                        <div class="panel-body">
								<form class="form-horizontal" action="edit_contrats.php" method="post" name="form1">
										 <fieldset>

										 <!-- Form Name -->
										 <legend><h2> <font color="#293380"> <center>Ajouter une nouvelle Contrts</center></font></h2> </legend>
										 <h3><center><font color="#2BB3A0">Voiture</font></center></h3>

										 <!-- File Button -->

										 <div class="form-group">
										   <label class="col-md-4 control-label" for="matricule">Matricule</label>
										   <div class="col-md-4">
										     <select  name="matricule" class="form-control" >
										                 <option value="" </option>
										                 <option value="Chèque" >Chèque</option>

										             </select>
										   <span class="help-block"></span>
										   </div>
										 </div>
										 <div class="form-group">
										   <label class="col-md-4 control-label" for="textinput">Marque </label>
										   <div class="col-md-4">
										   <input  name="marque" type="text" placeholder="" class="form-control input-md" value="<?php echo $marque;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>
										 <div class="form-group">
										   <label class="col-md-4 control-label" for="textinput">Modél </label>
										   <div class="col-md-4">
										   <input  name="model" type="text" placeholder="" class="form-control input-md"  value="<?php echo $model;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>
										 <div class="form-group">
										   <label class="col-md-4 control-label" for="textinput">Carburant  </label>
										   <div class="col-md-4">
										   <input  name="carburant" type="tel" placeholder="" class="form-control input-md" value="<?php echo $carburant;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>

										     <hr>
										 <h3><center><font color="#2BB3A0">Informations sur le Locataire</font></center></h3>
										 <div class="form-group">
										   <label class="col-md-4 control-label" for="cin">Identité</label>
										   <div class="col-md-4">
										     <select  name="cin" class="form-control"  value="<?php echo $cin;?>">
										       <option value="" </option>
										       <option value="Chèque" >Chèque</option>


										             </select>
										   <span class="help-block"></span>
										   </div>
										 </div>
										 <div class="form-group">
										   <label class="col-md-4 control-label" for="textinput">Nom et Prénom</label>
										   <div class="col-md-4">
										   <input  name="nom" type="text" placeholder="" class="form-control input-md"  value="<?php echo $nom;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>
										 <div class="form-group">
										   <label class="col-md-4 control-label" for="textinput">Adresse </label>
										   <div class="col-md-4">
										   <input  name="adresse" type="text" placeholder="" class="form-control input-md"  value="<?php echo $adresse;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>

										 <div class="form-group">
										   <label class="col-md-4 control-label" for="textinput">Téléphone  </label>
										   <div class="col-md-4">
										   <input  name="telephone" type="tel" placeholder="" class="form-control input-md" value="<?php echo $telephone;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>
										 <div class="form-group">
										   <label class="col-md-4 control-label" for="textinput">N° Permi</label>
										   <div class="col-md-4">
										   <input  name="permi" type="text" placeholder="" class="form-control input-md" value="<?php echo $permi;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>
										 <div class="form-group">
										   <label class="col-md-4 control-label" for="textinput">Délivré le </label>
										   <div class="col-md-4">
										   <input  name="delivre" type="date" placeholder="" class="form-control input-md"  value="<?php echo $delivre;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>
										 <div class="form-group">
										   <label class="col-md-4 control-label" for="textinput">Ville</label>
										   <div class="col-md-4">
										   <input  name="ville" type="text" placeholder="" class="form-control input-md"  value="<?php echo $ville;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>
										 <hr>
										 <div class="form-group">
										 <label class="col-md-4 control-label" for="Conducteur additionel">Conducteur Supplémentaire</label>
										 <div class="col-md-4">
										   <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
										    Oui
										   </a>
										 <span class="help-block"></span>
										 </div>
										 </div>

										 <div class="collapse" id="collapseExample">
										   <div class="well">
										 <h3><center><font color="#2BB3A0">Conducteur Supplémentaire</font></center></h3>
										 <div class="form-group">
										 <label class="col-md-4 control-label" for="cin">Identité</label>
										 <div class="col-md-4">
										 <input  name="cinn" type="text" placeholder="" class="form-control input-md"  value="<?php echo $cinn;?>">
										 <span class="help-block"></span>
										 </div>
										 </div>
										 <div class="form-group">
										 <label class="col-md-4 control-label" for="textinput">Nom et Prénom</label>
										 <div class="col-md-4">
										 <input  name="nomm" type="text" placeholder="" class="form-control input-md" value="<?php echo $nomm;?>">
										 <span class="help-block"></span>
										 </div>
										 </div>
										 <div class="form-group">
										 <label class="col-md-4 control-label" for="textinput">Adresse </label>
										 <div class="col-md-4">
										 <input  name="adressee" type="text" placeholder="" class="form-control input-md" value="<?php echo $adressee;?>">
										 <span class="help-block"></span>
										 </div>
										 </div>

										 <div class="form-group">
										 <label class="col-md-4 control-label" for="textinput">Téléphone  </label>
										 <div class="col-md-4">
										 <input  name="telephonee" type="tel" placeholder="" class="form-control input-md" value="<?php echo $telephonee;?>">
										 <span class="help-block"></span>
										 </div>
										 </div>
										 <div class="form-group">
										 <label class="col-md-4 control-label" for="textinput">N° Permi</label>
										 <div class="col-md-4">
										 <input  name="permii" type="text" placeholder="" class="form-control input-md" value="<?php echo $permii;?>">
										 <span class="help-block"></span>
										 </div>
										 </div>
										 <div class="form-group">
										 <label class="col-md-4 control-label" for="textinput">Délivré le </label>
										 <div class="col-md-4">
										 <input  name="delivree" type="date" placeholder="" class="form-control input-md" value="<?php echo $delivree;?>">
										 <span class="help-block"></span>
										 </div>
										 </div>
										 <div class="form-group">
										 <label class="col-md-4 control-label" for="textinput">Ville</label>
										 <div class="col-md-4">
										 <input  name="villee" type="text" placeholder="" class="form-control input-md" value="<?php echo $villee;?>">
										 <span class="help-block"></span>
										 </div>
										 </div>
										 </div>
										 </div>
										 <!-- Form Name -->

										 <h3><center><font color="#2BB3A0">Info du Contrats</font></center></h3>

										 <!-- File Button -->

										 <div class="form-group">
										   <label class="col-md-4 control-label" for="matricule">Date de Prise en charge</label>
										   <div class="col-md-4">
										   <input  name="datedep" type="date" placeholder="" class="form-control input-md" value="<?php echo $datedep;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>
										 <div class="form-group">
										   <label class="col-md-4 control-label" for="textinput">Durée</label>
										   <div class="col-md-4">
										   <input  name="duree" type="number" placeholder="" class="form-control input-md" value="<?php echo $duree;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>
										 <div class="form-group">
										   <label class="col-md-4 control-label" for="textinput">Date de Restitution </label>
										   <div class="col-md-4">
										   <input  name="dateret" type="date" placeholder="" class="form-control input-md" value="<?php echo $dateret;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>
										 <div class="form-group">
										   <label class="col-md-4 control-label" for="textinput">Heure de Restitution </label>
										   <div class="col-md-4">
										   <input  name="heure" type="text" placeholder="" class="form-control input-md" value="<?php echo $heure;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>

										 <h3><center><font color="#2BB3A0">Facture</font></center></h3>

										 <!-- File Button -->
										 <div class="form-group">
										   <label class="col-md-4 control-label" for="mode">Mode de Réglement</label>
										   <div class="col-md-4">
										     <select  name="mode" class="form-control" value="<?php echo $mode;?>">
										                 <option value="" </option>
										                 <option value="Chèque" >Chèque</option>
										                 <option value="Virement" >Essence</option>
										                 <option value="Espèce" >Electrique</option>
										             </select>

										   <span class="help-block"></span>
										   </div>
										 </div>

										 <div class="form-group">
										   <label class="col-md-4 control-label" for="matricule">Total</label>
										   <div class="col-md-4">
										   <input  name="total" type="number" placeholder="" class="form-control input-md"  value="<?php echo $total;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>
										 <div class="form-group">
										   <label class="col-md-4 control-label" for="textinput">Avance</label>
										   <div class="col-md-4">
										   <input  name="avance" type="number" placeholder="" class="form-control input-md"  value="<?php echo $avance;?>">
										   <span class="help-block"></span>
										   </div>
										 </div>
										 <label class="col-md-4 control-label" for="textinput">Rest</label>
										 <div class="col-md-4">
										 <input  name="rest" type="number" placeholder="" class="form-control input-md" value="<?php echo $rest;?>">
										 <span class="help-block"></span>
										 </div>

										 <input  type="hidden" name="id" value=<?php echo $_GET[ 'id'];?>>
										 </div>
										 </fieldset>
										 <div class="modal-footer">
										   <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
										   <button type="submit" class="btn btn-primary" name="update" >Enregistrer</button>
										 </div>

										 </form>


                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div></div>
                            </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            <!-- /.container-fluid -->

        <!-- /#page-wrapper -->


    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
