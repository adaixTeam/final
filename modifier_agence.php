<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{

	$ida = mysqli_real_escape_string($mysqli, $_POST['ida']);

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

	 {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE agence SET nom='$nom',ville='$ville',adresse='$adresse',tel='$tel',fax='$fax',email='$email',nombre='$nombre',nomma='$nomma',prenomma='$prenomma',emailma='$emailma',telma='$telma',Postema='$Postema',Pseudoma='$Pseudoma',mdpma='$mdpma' WHERE ida=$ida");

		//redirectig to the display page. In our case, it is index.php
		header("Location: agence.php");
	}
}
?>
    <?php
//getting id from url
$ida = $_GET['ida'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM agence WHERE ida=$ida");

while($res = mysqli_fetch_array($result))
{
	$nom = $res['nom'];
    $ville= $res['ville'];
    $adresse = $res['adresse'];
	$tel = $res['tel'];
	$fax = $res['fax'];
	$email = $res['email'];
	$nombre = $res['nombre'];
	$nomma = $res['nomma'];
	$prenomma = $res['prenomma'];
	$emailma = $res['emailma'];
	$telma = $res['telma'];
	$Postema = $res['Postema'];
	$Pseudoma = $res['Pseudoma'];
	$mdpma = $res['mdpma'];
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->



    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Martech Location - Admin Dashboard</title>
        <link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">




        <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
        <!-- vendor css files -->
        <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/vendor/animate.css">
        <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="assets/js/vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/datatables.bootstrap.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/Responsive/css/dataTables.responsive.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/ColVis/css/dataTables.colVis.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/TableTools/css/dataTables.tableTools.min.css">

        <!-- project main css files -->
        <link rel="stylesheet" href="assets/css/main.css">
        <!--/ stylesheets -->



        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
        <script src="assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <!--/ modernizr -->




    </head>





    <body id="minovate" class="appWrapper">






        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->












        <!-- ====================================================
        ================= Application Content ===================
        ===================================================== -->
        <div id="wrap" class="animsition">






            <!-- ===============================================
            ================= HEADER Content ===================
            ================================================ -->
            <section id="header">
                <header class="clearfix">

                    <!-- Branding -->
                    <div class="branding">
                        <a class="brand" href="index.html">
                            <span><strong style="color:#f79421;">Martech</strong> Location</span>
                        </a>
                        <a href="#" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
                    </div>
                    <!-- Branding end -->



                    <!-- Left-side navigation -->
                    <ul class="nav-left pull-left list-unstyled list-inline">
                        <li class="sidebar-collapse divided-right">
                            <a href="#" class="collapse-sidebar">
                                <i class="fa fa-outdent"></i>
                            </a>
                        </li>
                        <li class="dropdown divided-right settings">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </a>
                            <ul class="dropdown-menu with-arrow animated littleFadeInUp" role="menu">
                                <li>

                                    <ul class="color-schemes list-inline">
                                        <li class="title">Header Color:</li>
                                        <li><a href="#" class="scheme-drank header-scheme" data-scheme="scheme-default"></a></li>
                                        <li><a href="#" class="scheme-black header-scheme" data-scheme="scheme-black"></a></li>
                                        <li><a href="#" class="scheme-greensea header-scheme" data-scheme="scheme-greensea"></a></li>
                                        <li><a href="#" class="scheme-cyan header-scheme" data-scheme="scheme-cyan"></a></li>
                                        <li><a href="#" class="scheme-lightred header-scheme" data-scheme="scheme-lightred"></a></li>
                                        <li><a href="#" class="scheme-light header-scheme" data-scheme="scheme-light"></a></li>
                                        <li class="title">Branding Color:</li>
                                        <li><a href="#" class="scheme-drank branding-scheme" data-scheme="scheme-default"></a></li>
                                        <li><a href="#" class="scheme-black branding-scheme" data-scheme="scheme-black"></a></li>
                                        <li><a href="#" class="scheme-greensea branding-scheme" data-scheme="scheme-greensea"></a></li>
                                        <li><a href="#" class="scheme-cyan branding-scheme" data-scheme="scheme-cyan"></a></li>
                                        <li><a href="#" class="scheme-lightred branding-scheme" data-scheme="scheme-lightred"></a></li>
                                        <li><a href="#" class="scheme-light branding-scheme" data-scheme="scheme-light"></a></li>
                                        <li class="title">Sidebar Color:</li>
                                        <li><a href="#" class="scheme-drank sidebar-scheme" data-scheme="scheme-default"></a></li>
                                        <li><a href="#" class="scheme-black sidebar-scheme" data-scheme="scheme-black"></a></li>
                                        <li><a href="#" class="scheme-greensea sidebar-scheme" data-scheme="scheme-greensea"></a></li>
                                        <li><a href="#" class="scheme-cyan sidebar-scheme" data-scheme="scheme-cyan"></a></li>
                                        <li><a href="#" class="scheme-lightred sidebar-scheme" data-scheme="scheme-lightred"></a></li>
                                        <li><a href="#" class="scheme-light sidebar-scheme" data-scheme="scheme-light"></a></li>
                                        <li class="title">Active Color:</li>
                                        <li><a href="#" class="scheme-drank color-scheme" data-scheme="drank-scheme-color"></a></li>
                                        <li><a href="#" class="scheme-black color-scheme" data-scheme="black-scheme-color"></a></li>
                                        <li><a href="#" class="scheme-greensea color-scheme" data-scheme="greensea-scheme-color"></a></li>
                                        <li><a href="#" class="scheme-cyan color-scheme" data-scheme="cyan-scheme-color"></a></li>
                                        <li><a href="#" class="scheme-lightred color-scheme" data-scheme="lightred-scheme-color"></a></li>
                                        <li><a href="#" class="scheme-light color-scheme" data-scheme="light-scheme-color"></a></li>
                                    </ul>

                                </li>

                                <li>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-xs-8 control-label">Fixed header</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch lightred small">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="fixed-header" checked="">
                                                    <label class="onoffswitch-label" for="fixed-header">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-xs-8 control-label">Fixed aside</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch lightred small">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="fixed-aside" checked="">
                                                    <label class="onoffswitch-label" for="fixed-aside">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Left-side navigation end -->




                    <!-- Search -->
                    <!--div class="search" id="main-search">
                        <input type="text" class="form-control underline-input" placeholder="Search...">
                    </div!-->
                    <!-- Search end -->




                    <!-- Right-side navigation -->
                    <ul class="nav-right pull-right list-inline">
                        <li class="dropdown users">

                            <!--a href class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span class="badge bg-lightred">2</span>
                            </a!-->

                            <div class="dropdown-menu pull-right with-arrow panel panel-default animated littleFadeInUp" role="menu">

                                <div class="panel-heading">
                                    You have <strong>2</strong> requests
                                </div>

                                <ul class="list-group">

                                    <li class="list-group-item">
                                        <a href="#" class="media">
                                            <span class="pull-left media-object thumb thumb-sm">
                                                <img src="assets/images/arnold-avatar.jpg" alt="" class="img-circle">
                                            </span>
                                            <div class="media-body">
                                                <span class="block">Arnold sent you a request</span>
                                                <small class="text-muted">15 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="#" class="media">
                                            <span class="pull-left media-object  thumb thumb-sm">
                                                <img src="assets/images/george-avatar.jpg" alt="" class="img-circle">
                                            </span>
                                            <div class="media-body">
                                                <span class="block">George sent you a request</span>
                                                <small class="text-muted">5 hours ago</small>
                                            </div>
                                        </a>
                                    </li>

                                </ul>

                                <div class="panel-footer">
                                    <a href="#">Show all requests <i class="fa fa-angle-right pull-right"></i></a>
                                </div>

                            </div>

                        </li>

                        <li class="dropdown messages">

                            <!--a href class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="badge bg-lightred">4</span>
                            </a!-->

                            <div class="dropdown-menu pull-right with-arrow panel panel-default animated littleFadeInDown" role="menu">

                                <div class="panel-heading">
                                    You have <strong>4</strong> messages
                                </div>

                                <ul class="list-group">

                                    <li class="list-group-item">
                                        <a href="#" class="media">
                                            <span class="pull-left media-object thumb thumb-sm">
                                                <img src="assets/images/ici-avatar.jpg" alt="" class="img-circle">
                                            </span>
                                            <div class="media-body">
                                                <span class="block">Imrich sent you a message</span>
                                                <small class="text-muted">12 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="#" class="media">
                                            <span class="pull-left media-object  thumb thumb-sm">
                                                <img src="assets/images/peter-avatar.jpg" alt="" class="img-circle">
                                            </span>
                                            <div class="media-body">
                                                <span class="block">Peter sent you a message</span>
                                                <small class="text-muted">46 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="#" class="media">
                                            <span class="pull-left media-object  thumb thumb-sm">
                                                <img src="assets/images/random-avatar1.jpg" alt="" class="img-circle">
                                            </span>
                                            <div class="media-body">
                                                <span class="block">Bill sent you a message</span>
                                                <small class="text-muted">1 hour ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="#" class="media">
                                            <span class="pull-left media-object  thumb thumb-sm">
                                                <img src="assets/images/random-avatar3.jpg" alt="" class="img-circle">
                                            </span>
                                            <div class="media-body">
                                                <span class="block">Ken sent you a message</span>
                                                <small class="text-muted">3 hours ago</small>
                                            </div>
                                        </a>
                                    </li>

                                </ul>

                                <div class="panel-footer">
                                    <a href="#">Show all messages <i class="pull-right fa fa-angle-right"></i></a>
                                </div>

                            </div>

                        </li>

                        <li class="dropdown notifications">

                            <!--a href class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                <span class="badge bg-lightred">3</span>
                            </a!-->

                            <div class="dropdown-menu pull-right with-arrow panel panel-default animated littleFadeInLeft">

                                <div class="panel-heading">
                                    You have <strong>3</strong> notifications
                                </div>

                                <ul class="list-group">

                                    <li class="list-group-item">
                                        <a href="#" class="media">
                                            <span class="pull-left media-object media-icon bg-danger">
                                                <i class="fa fa-ban"></i>
                                            </span>
                                            <div class="media-body">
                                                <span class="block">User Imrich cancelled account</span>
                                                <small class="text-muted">6 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="#" class="media">
                                            <span class="pull-left media-object media-icon bg-primary">
                                                <i class="fa fa-bolt"></i>
                                            </span>
                                            <div class="media-body">
                                                <span class="block">New user registered</span>
                                                <small class="text-muted">12 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="#" class="media">
                                            <span class="pull-left media-object media-icon bg-greensea">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                            <div class="media-body">
                                                <span class="block">User Robert locked account</span>
                                                <small class="text-muted">18 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>

                                </ul>

                                <div class="panel-footer">
                                    <a href="#">Show all notifications <i class="fa fa-angle-right pull-right"></i></a>
                                </div>

                            </div>

                        </li>

                        <li class="dropdown nav-profile">

                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                <img src="assets/images/profile-photo.jpg" alt="" class="img-circle size-30x30">
                                <span>John Douey <i class="fa fa-angle-down"></i></span>
                            </a>

                            <ul class="dropdown-menu animated littleFadeInRight" role="menu">

                                <li>
                                    <a href="#">
                                        <span class="badge bg-greensea pull-right">86%</span>
                                        <i class="fa fa-user"></i>Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label bg-lightred pull-right">new</span>
                                        <i class="fa fa-check"></i>Tasks
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-cog"></i>Settings
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-lock"></i>Lock
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-sign-out"></i>Logout
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <li class="toggle-right-sidebar">
                            <!--a href="#">
                                <i class="fa fa-comments"></i>
                            </a!-->
                        </li>
                    </ul>
                    <!-- Right-side navigation end -->



                </header>

            </section>
            <!--/ HEADER Content  -->





            <!-- =================================================
            ================= CONTROLS Content ===================
            ================================================== -->
            <div id="controls">





                <!-- ================================================
                ================= SIDEBAR Content ===================
                ================================================= -->
                <aside id="sidebar">


                    <div id="sidebar-wrap">

                        <div class="panel-group slim-scroll" role="tablist">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#sidebarNav">
                                            Navigation <i class="fa fa-angle-up"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">


                                        <!-- ===================================================
                                        ================= NAVIGATION Content ===================
                                        ==================================================== -->
                                        <ul id="navigation">
                                            <li><a href="index.html"><i class="fa fa-dashboard"></i> <span>Accueil</span></a></li>

                                            </li>

                                            <li >

                                                    <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                    <li><a href="tables-datatables.php"><i class="fa fa-car"></i>Les Véhicule</a></li>
                                                    <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->

                                            </li>
                                            <li>

                                                    <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                    <li><a href="tables-clients.php"><i class="fa fa-users"></i>Les Clients</a></li>
                                                    <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->

                                            </li>
																						<li>
												                      <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
												                      <li><a href="tables-reservation.php"><i class="fa fa-edit"></i>Les Reservation</a></li>
												                      <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
												                    </li>
                                            <li>

                                                    <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                    <li><a href="tables-Contrats.php"><i class="fa fa-book"></i>Les Contrats</a></li>
                                                    <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->

                                            </li>
																						<li>
																								<!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
																								<li><a href="tables-retour.php"><i class="fa fa-align-justify"></i>Confirmation de Retour</a></li>
																								<!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
																						</li>
																						<li>

                                                    <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                    <li><a href="ajoute_devis.php"><i class="fa fa-book"></i>Devis</a></li>
                                                    <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->

                                            </li>
                                            <li>

                                                    <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                    <li><a href="tables-factures.php"><i class="fa fa-paste"></i>Les Factures</a></li>
                                                    <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->

                                            </li>
																						<li>

                                                    <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                    <li class="active"><a href="tables-agence.php"><i class="fa fa-building-o"></i>Agence</a></li>
                                                    <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->

                                            </li>
                                            <li>

                                                    <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                    <li><a href="tables-datatables.php"><i class="fa fa-user"></i>Les Utilisateurs</a></li>
                                                    <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->

                                            </li>

																						<li>
												                        <a role="button" tabindex="0"><i class="fa fa-clipboard"></i> <span>Black lists</span></a>
												                        <ul>
												                            <li><a href="blackliste.html"><i class="fa fa-clipboard"></i>Déclaration</a></li>
												                            <li><a href="tables-cherche.html"><i class="fa fa-search"></i>Recherche</a></li>
												                        </ul>
												                    </li>

																						<li>
																								<a role="button" tabindex="0"><i class="fa fa-dollar"></i> <span>Gestion de Caisse</span></a>
																								<ul>
																										<li><a href="tables-entrer_caisse.php"><i class="fa fa-clipboard"></i>Les entres</a></li>
																										<li><a href="tables-sortir_caisse.php"><i class="fa fa-search"></i>Les sortie</a></li>
																										<li><a href="la_caisse.php"><i class="fa fa-search"></i>La caisse</a></li>
																										<li><a href="tables-categorie.php"><i class="fa fa-search"></i>Les Categories</a></li>
																								</ul>
																						</li>
																						<li>
                                                <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                <li><a href="gestion_d'infraction.php"><i class="fa fa-car"></i>Gestion d'infraction</a></li>
                                                <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>

                                            <li>
                                                <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                <li><a href="GPS.php"><i class="fa fa-car"></i>GPS</a></li>
                                                <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>

                                            <li>
                                                <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                <li><a href="tables-reservation_onligne.php"><i class="fa fa-align-justify"></i>Résérvation Online</a></li>
                                                <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>


                                        </ul>
                                        <!--/ NAVIGATION Content -->


                                    </div>
                                </div>
                            </div>
                            <!--div class="panel charts panel-default">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#sidebarCharts">
                                            Orders Summary <i class="fa fa-angle-up"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="sidebarCharts" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="summary">

                                            <div class="media">
                                                <a class="pull-right" role="button" tabindex="0">
                                                    <span class="sparklineChart"
                                                          values="5, 8, 3, 4, 6, 2, 1, 9, 7"
                                                          sparkType="bar"
                                                          sparkBarColor="#92424e"
                                                          sparkBarWidth="6px"
                                                          sparkHeight="36px">
                                                    Loading...</span>
                                                </a>
                                                <div class="media-body">
                                                    This week sales
                                                    <h4 class="media-heading">26, 149</h4>
                                                </div>
                                            </div>

                                            <div class="media">
                                                <a class="pull-right" role="button" tabindex="0">
                                                    <span class="sparklineChart"
                                                          values="2, 4, 5, 3, 8, 9, 7, 3, 5"
                                                          sparkType="bar"
                                                          sparkBarColor="#397193"
                                                          sparkBarWidth="6px"
                                                          sparkHeight="36px">
                                                    Loading...</span>
                                                </a>
                                                <div class="media-body">
                                                    This week balance
                                                    <h4 class="media-heading">318, 651</h4>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div!-->
                            <!--div class="panel settings panel-default">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#sidebarControls">
                                            General Settings <i class="fa fa-angle-up"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="sidebarControls" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="row">
                                              <label class="col-xs-8 control-label">Switch ON</label>
                                              <div class="col-xs-4 control-label">
                                                <div class="onoffswitch greensea">
                                                  <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch-on" checked="">
                                                  <label class="onoffswitch-label" for="switch-on">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-xs-8 control-label">Switch OFF</label>
                                              <div class="col-xs-4 control-label">
                                                <div class="onoffswitch greensea">
                                                  <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch-off">
                                                  <label class="onoffswitch-label" for="switch-off">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div!-->
                        </div>

                    </div>


                </aside>
                <!--/ SIDEBAR Content -->





                <!-- =================================================
                ================= RIGHTBAR Content ===================
                ================================================== -->
                <aside id="rightbar">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab"><i class="fa fa-users"></i></a></li>
                            <li role="presentation"><a href="#history" aria-controls="history" role="tab" data-toggle="tab"><i class="fa fa-clock-o"></i></a></li>
                            <li role="presentation"><a href="#friends" aria-controls="friends" role="tab" data-toggle="tab"><i class="fa fa-heart"></i></a></li>
                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-cog"></i></a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="users">
                                <h6><strong>Online</strong> Users</h6>

                                <ul>

                                    <li class="online">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/ici-avatar.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Ing. Imrich <strong>Kamarel</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Ulaanbaatar, Mongolia</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="online">
                                        <div class="media">

                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/arnold-avatar.jpg" alt>
                                            </a>
                                            <span class="badge bg-lightred unread">3</span>

                                            <div class="media-body">
                                                <span class="media-heading">Arnold <strong>Karlsberg</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Bratislava, Slovakia</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>

                                        </div>
                                    </li>

                                    <li class="online">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/peter-avatar.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Peter <strong>Kay</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Kosice, Slovakia</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="online">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/george-avatar.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">George <strong>McCain</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Prague, Czech Republic</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="busy">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/random-avatar1.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Lucius <strong>Cashmere</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Wien, Austria</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="busy">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/random-avatar2.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Jesse <strong>Phoenix</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Berlin, Germany</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                </ul>

                                <h6><strong>Offline</strong> Users</h6>

                                <ul>

                                    <li class="offline">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/random-avatar4.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Dell <strong>MacApple</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Paris, France</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="offline">
                                        <div class="media">

                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/random-avatar5.jpg" alt>
                                            </a>

                                            <div class="media-body">
                                                <span class="media-heading">Roger <strong>Flopple</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Rome, Italia</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>

                                        </div>
                                    </li>

                                    <li class="offline">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/random-avatar6.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Nico <strong>Vulture</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Kyjev, Ukraine</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="offline">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/random-avatar7.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Bobby <strong>Socks</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Moscow, Russia</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="offline">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/random-avatar8.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Anna <strong>Opichia</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Budapest, Hungary</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="history">
                                <h6><strong>Chat</strong> History</h6>

                                <ul>

                                    <li class="online">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/ici-avatar.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Ing. Imrich <strong>Kamarel</strong></span>
                                                <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="busy">
                                        <div class="media">

                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/arnold-avatar.jpg" alt>
                                            </a>
                                            <span class="badge bg-lightred unread">3</span>

                                            <div class="media-body">
                                                <span class="media-heading">Arnold <strong>Karlsberg</strong></span>
                                                <small>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>

                                        </div>
                                    </li>

                                    <li class="offline">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/peter-avatar.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Peter <strong>Kay</strong></span>
                                                <small>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit </small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="friends">
                                <h6><strong>Friends</strong> List</h6>
                                <ul>

                                    <li class="online">
                                        <div class="media">

                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/arnold-avatar.jpg" alt>
                                            </a>
                                            <span class="badge bg-lightred unread">3</span>

                                            <div class="media-body">
                                                <span class="media-heading">Arnold <strong>Karlsberg</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Bratislava, Slovakia</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>

                                        </div>
                                    </li>

                                    <li class="offline">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/random-avatar8.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Anna <strong>Opichia</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Budapest, Hungary</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="busy">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/random-avatar1.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Lucius <strong>Cashmere</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Wien, Austria</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="online">
                                        <div class="media">
                                            <a class="pull-left thumb thumb-sm" href="#">
                                                <img class="media-object img-circle" src="assets/images/ici-avatar.jpg" alt>
                                            </a>
                                            <div class="media-body">
                                                <span class="media-heading">Ing. Imrich <strong>Kamarel</strong></span>
                                                <small><i class="fa fa-map-marker"></i> Ulaanbaatar, Mongolia</small>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="settings">
                                <h6><strong>Chat</strong> Settings</h6>

                                <ul class="settings">

                                    <li>
                                        <div class="form-group">
                                            <label class="col-xs-8 control-label">Show Offline Users</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch greensea">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-offline" checked="">
                                                    <label class="onoffswitch-label" for="show-offline">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="col-xs-8 control-label">Show Fullname</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch greensea">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-fullname">
                                                    <label class="onoffswitch-label" for="show-fullname">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="col-xs-8 control-label">History Enable</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch greensea">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-history" checked="">
                                                    <label class="onoffswitch-label" for="show-history">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="col-xs-8 control-label">Show Locations</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch greensea">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-location" checked="">
                                                    <label class="onoffswitch-label" for="show-location">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="col-xs-8 control-label">Notifications</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch greensea">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-notifications">
                                                    <label class="onoffswitch-label" for="show-notifications">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label class="col-xs-8 control-label">Show Undread Count</label>
                                            <div class="col-xs-4 control-label">
                                                <div class="onoffswitch greensea">
                                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-unread" checked="">
                                                    <label class="onoffswitch-label" for="show-unread">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>

                </aside>
                <!--/ RIGHTBAR Content -->




            </div>
            <!--/ CONTROLS Content -->




            <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
            <section id="content">

                <div class="page page-tables-datatables">

                    <div class="pageheader">

                        <h2>Les Clients</h2>

                        <div class="page-bar">

                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html"><i class="fa fa-home"></i> Martech</a>
                                </li>
                                <li>
                                    <a href="tables-clients.php">Clients</a>
                                </li>
                                <li>
                                    <a href="#">Modifier Clients</a>
                                </li>
                            </ul>

                        </div>

                    </div>

                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">


                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                              <!--  <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Basic</strong> Usage</h1>
                                    <div class="note"><strong>including:</strong> multi-column sorting, row select and colReorder</div>
                                    <ul class="controls">
                                        <li class="dropdown">

                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                                <i class="fa fa-cog"></i>
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </a>

                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-toggle">
                                                        <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                                                        <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-refresh">
                                                        <i class="fa fa-refresh"></i> Refresh
                                                    </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-fullscreen">
                                                        <i class="fa fa-expand"></i> Fullscreen
                                                    </a>
                                                </li>
                                            </ul>

                                        </li>
                                        <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                                    </ul>
                                </div>!-->
                                <!-- /tile header -->

                                <!-- tile body -->
                              <!--  <div class="tile-body">
                                    <div class="table-responsive">
                                        <table class="table table-custom" id="basic-usage">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!-- /tile body -->

                            </section>
                            <!-- /tile -->

                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font">Les <strong>Clients</strong></h1>
                                    <ul class="controls">

                                        <li class="dropdown">

                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                                <i class="fa fa-cog"></i>
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </a>

                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-toggle">
                                                        <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                                                        <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-refresh">
                                                        <i class="fa fa-refresh"></i> Refresh
                                                    </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-fullscreen">
                                                        <i class="fa fa-expand"></i> Fullscreen
                                                    </a>
                                                </li>
                                            </ul>

                                        </li>

                                    </ul>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body">
                                  <!-- /.panel-heading -->

																	<form name="form2" method="post" action="editag.php">
																			<table border="0" >

																						 <div class="md-form">
																						 <td><h3><center><font color="#2BB3A0">Informations sur l'agence</font></center></h3><td>
																							<tr>
																							<td>Nom d'agence</td>
																							<td><input class="form-control" type="text" name="nom" value="<?php echo $nom;?>"></td>
																							</div>
																					</tr>
																					<tr>
																							<td>Ville</td>
																							<td><input class="form-control" type="text" name="ville" value="<?php echo $ville;?>"></td>
																					</tr>
																					<tr>
																							<td>Adresse</td>
																							<td><input class="form-control" type="text" name="adresse" value="<?php echo $adresse;?>"></td>
																					</tr>
																					<tr>
																							<td>N°Téléphone</td>
																							<td><input class="form-control" type="text" name="tel" value="<?php echo $tel;?>"></td>
																					</tr>
																					<tr>
																							<td>Fax</td>
																							<td><input class="form-control" type="text" name="fax" value="<?php echo $fax;?>"></td>
																					</tr>
																						<tr>
																							<td>Email</td>
																							<td><input class="form-control" type="text" name="email" value="<?php echo $email;?>"></td>
																					</tr>
																						<tr>
																							<td>Nombre d'emploiyés</td>
																							<td><input class="form-control" type="text" name="nombre" value="<?php echo $nombre;?>"></td>
																					</tr>
																				<td>  <h3><center><font color="#2BB3A0">Informations sur le manager</font></center></h3></td>
																						<tr>
																							<td>Nom</td>
																							<td><input class="form-control" type="text" name="nomma" value="<?php echo $nomma;?>"></td>
																					</tr>
																						<tr>
																							<td>Prenom</td>
																							<td><input class="form-control" type="text" name="prenomma" value="<?php echo $prenomma;?>"></td>
																					</tr>
																						<tr>
																							<td>Email</td>
																							<td><input class="form-control" type="text" name="emailma" value="<?php echo $emailma;?>"></td>
																					</tr>
																						<tr>
																							<td>Téléphone</td>
																							<td><input class="form-control" type="text" name="telma" value="<?php echo $telma;?>"></td>
																					</tr>
																						<tr>
																							<td>Poste</td>
																							<td><input class="form-control" type="text" name="Postema" value="<?php echo $Postema;?>"></td>
																					</tr>
																						<tr>
																							<td>Pseudo</td>
																							<td><input class="form-control" type="text" name="Pseudoma" value="<?php echo $Pseudoma;?>"></td>
																					</tr>
																					<tr>
																							<td>Mot de passe</td>
																							<td><input class="form-control" type="text" name="mdpma" value="<?php echo $mdpma;?>"></td>
																					</tr>

																					<tr>
																							<td><input  type="hidden" name="ida" value=<?php echo $_GET[ 'ida'];?>></td>
																							<td><input style="background-color: #555555;padding:20px;border-radius:8px;margin-left:10px;color:white;margin-top:10px;" type="submit" name="update" value="enregistrer"></td>
																					</tr>
																			</table>
																	</form>


                                  <!-- /.panel-body -->

                                </div>
                                <!-- /tile body -->

                            </section>
                            <!-- /tile -->

                            <!-- tile -->
                            <!--<section class="tile">

                                <!-- tile header --
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Responsive</strong> Table</h1>
                                    <ul class="controls">
                                        <li class="dropdown">

                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                                <i class="fa fa-cog"></i>
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </a>

                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-toggle">
                                                        <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                                                        <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-refresh">
                                                        <i class="fa fa-refresh"></i> Refresh
                                                    </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-fullscreen">
                                                        <i class="fa fa-expand"></i> Fullscreen
                                                    </a>
                                                </li>
                                            </ul>

                                        </li>
                                        <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /tile header --

                                <!-- tile body --
                                <div class="tile-body">
                                    <table class="table table-custom dt-responsive" id="responsive-usage" width="100%">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th class="none">Phone</th>
                                            <th class="none">Street Address</th>
                                            <th class="none">City</th>
                                            <th class="none">State</th>
                                            <th class="none">ZIP</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- /tile body --

                            </section>!-->
                            <!-- /tile -->

                            <!-- tile -->
                            <!--<section class="tile">

                                <!-- tile header --
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Advanced</strong> Table</h1>
                                    <ul class="controls">
                                        <li class="dropdown">

                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                                <i class="fa fa-cog"></i>
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </a>

                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-toggle">
                                                        <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                                                        <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-refresh">
                                                        <i class="fa fa-refresh"></i> Refresh
                                                    </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-fullscreen">
                                                        <i class="fa fa-expand"></i> Fullscreen
                                                    </a>
                                                </li>
                                            </ul>

                                        </li>
                                        <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body --
                                <div class="tile-body">
                                    <div class="row">
                                        <div class="col-md-6"><div id="tableTools"></div></div>
                                        <div class="col-md-6"><div id="colVis"></div></div>
                                    </div>
                                    <table class="table table-custom" id="advanced-usage">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- /tile body --

                            </section>!-->
                            <!-- /tile -->

                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->

                </div>

            </section>
            <!--/ CONTENT -->






        </div>
        <!--/ Application Content -->














        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>

        <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>

        <script src="assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/vendor/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
        <script src="assets/js/vendor/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/js/vendor/datatables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
        <script src="assets/js/vendor/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
        <script src="assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>

        <!--/ vendor javascripts -->




        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="assets/js/main.js"></script>
        <!--/ custom javascripts -->






        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            $(window).load(function(){

                //initialize basic datatable
                var table = $('#basic-usage').DataTable({
                    "ajax": 'assets/extras/datatables-basic.json',
                    "columns": [
                        { "data": "id" },
                        { "data": "firstName" },
                        { "data": "lastName" }
                    ],
                    "aoColumnDefs": [
                      { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ],
                    "dom": 'Rlfrtip'
                });

                $('#basic-usage tbody').on( 'click', 'tr', function () {
                    if ( $(this).hasClass('row_selected') ) {
                        $(this).removeClass('row_selected');
                    }
                    else {
                        table.$('tr.row_selected').removeClass('row_selected');
                        $(this).addClass('row_selected');
                    }
                });
                //*initialize basic datatable




                //initialize editable datatable

                function restoreRow(oTable, nRow) {
                    var aData = oTable.row(nRow).data();
                    var jqTds = $('>td', nRow);

                    for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                        oTable.row(nRow).data(aData[i]);
                    }

                    oTable.draw();
                }

                function editRow(oTable, nRow) {
                    var aData = oTable.row(nRow).data();
                    var jqTds = $('>td', nRow);
                    jqTds[0].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[0] + '">';
                    jqTds[1].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[1] + '">';
                    jqTds[2].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[2] + '">';
                    jqTds[3].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[3] + '">';
                    jqTds[4].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[4] + '">';
                    jqTds[5].innerHTML = '<a role="button" tabindex="0" class="edit text-success text-uppercase text-strong text-sm mr-10">Save</a><a role="button" tabindex="0" class="cancel text-warning text-uppercase text-strong text-sm mr-10">Cancel</a>';
                }

                function saveRow(oTable, nRow) {
                    var jqInputs = $('input', nRow);
                    oTable.cell(nRow, 0).data(jqInputs[0].value);
                    oTable.cell(nRow, 1).data(jqInputs[1].value);
                    oTable.cell(nRow, 2).data(jqInputs[2].value);
                    oTable.cell(nRow, 3).data(jqInputs[3].value);
                    oTable.cell(nRow, 4).data(jqInputs[4].value);
                    oTable.cell(nRow, 5).data('<a role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">Edit</a><a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10">Remove</a>');
                    oTable.draw();
                }

                var table2 = $('#editable-usage');

                var oTable = $('#editable-usage').DataTable({
                    "aoColumnDefs": [
                      { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ]
                });

                var nEditing = null;
                var nNew = false;

                $('#add-entry').click(function (e) {
                    e.preventDefault();

                    if (nNew && nEditing) {
                        if (confirm("Previous row is not saved yet. Save it ?")) {
                            saveRow(oTable, nEditing); // save
                            $(nEditing).find("td:first").html("Untitled");
                            nEditing = null;
                            nNew = false;

                        } else {
                            oTable.row(nEditing).remove().draw(); // cancel
                            nEditing = null;
                            nNew = false;

                            return;
                        }
                    }

                    var aiNew = oTable.row.add(['', '', '', '', '', '', '']).draw();
                    var nRow = oTable.row(aiNew[0]).node();
                    editRow(oTable, nRow);
                    nEditing = nRow;
                    nNew = true;
                });

                table2.on('click', '.delete', function (e) {
                    e.preventDefault();

                    if (confirm("Are you sure?") == false) {
                        return;
                    }

                    var nRow = $(this).parents('tr')[0];
                    oTable.row(nRow).remove().draw();
                    alert("Deleted!");
                });

                table2.on('click', '.cancel', function (e) {
                    e.preventDefault();
                    if (nNew) {
                        oTable.row(nEditing).remove().draw();
                        nEditing = null;
                        nNew = false;
                    } else {
                        restoreRow(oTable, nEditing);
                        nEditing = null;
                    }
                });

                table2.on('click', '.edit', function (e) {
                    e.preventDefault();

                    /* Get the row as a parent of the link that was clicked on */
                    var nRow = $(this).parents('tr')[0];

                    if (nEditing !== null && nEditing != nRow) {
                        /* Currently editing - but not this row - restore the old before continuing to edit mode */
                        restoreRow(oTable, nEditing);
                        editRow(oTable, nRow);
                        nEditing = nRow;
                    } else if (nEditing == nRow && this.innerHTML == "Save") {
                        /* Editing this row and want to save it */
                        saveRow(oTable, nEditing);
                        nEditing = null;
                        alert("Updated!");
                    } else {
                        /* No edit in progress - let's start one */
                        editRow(oTable, nRow);
                        nEditing = nRow;
                    }
                });
                //*initialize editable datatable

                //initialize responsive datatable
                var table3 = $('#responsive-usage').DataTable({
                    "ajax": 'assets/extras/datatables-responsive.json',
                    "columns": [
                        { "data": "id" },
                        { "data": "firstName" },
                        { "data": "lastName" },
                        { "data": "tel" },
                        { "data": "address" },
                        { "data": "city" },
                        { "data": "state" },
                        { "data": "zip" }
                    ],
                    "aoColumnDefs": [
                      { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ]
                });
                //*initialize responsive datatable

                //initialize responsive datatable
                function stateChange(iColumn, bVisible) {
                    console.log('The column', iColumn, ' has changed its status to', bVisible);
                }

                var table4 = $('#advanced-usage').DataTable({
                    "ajax": 'assets/extras/datatables-basic.json',
                    "columns": [
                        { "data": "id" },
                        { "data": "firstName" },
                        { "data": "lastName" }
                    ],
                    "aoColumnDefs": [
                      { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ]
                });

                var colvis = new $.fn.dataTable.ColVis(table4);

                $(colvis.button()).insertAfter('#colVis');
                $(colvis.button()).find('button').addClass('btn btn-default').removeClass('ColVis_Button');

                var tt = new $.fn.dataTable.TableTools(table4, {
                    sRowSelect: 'single',
                    "aButtons": [
                        'copy',
                        'print', {
                            'sExtends': 'collection',
                            'sButtonText': 'Save',
                            'aButtons': ['csv', 'xls', 'pdf']
                        }
                    ],
                    "sSwfPath": "assets/js/vendor/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                });

                $(tt.fnContainer()).insertAfter('#tableTools');
                //*initialize responsive datatable

            });
        </script>
        <!--/ Page Specific Scripts -->





        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

    </body>
</html>
