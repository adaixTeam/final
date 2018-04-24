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
?>  <html>

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

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   
      

</head>
 <body> <div id="wrapper">
 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
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
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
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
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
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
         <div id="page-wrapper">
         <div class="panel-body">
						 <ul class="list-inline">
							<li><a href="#">Accueil</a></li>
							<li><a href="clients.html">Clients</a></li>
							
						</ul>
                        </div>
           <header class="masthead">
                <div class="container">
                    <div style="height:100px;">
                    </div>
                </div>
            </header>
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion des clients</h1>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="card">
                <div class="card-body">
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
                </div>
            </div>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
        </body>

        </html>
