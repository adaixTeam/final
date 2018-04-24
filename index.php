<?php
//including the database connection file
/*include_once("config.php");*/

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


$databaseHost = 'localhost';
$databaseName = 'location';
$databaseUsername = 'root';
$databasePassword = 'root';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users");

$count_client = mysqli_query($mysqli, "SELECT * FROM clients");
$count_car = mysqli_query($mysqli, "SELECT * FROM users WHERE st=0");
$count_contrat = mysqli_query($mysqli, "SELECT * FROM contrats2");
$count_retour = mysqli_query($mysqli, "SELECT * FROM users WHERE st!=0");

$count_assr_noPay = mysqli_query($mysqli, "SELECT * FROM users where assurance <= Now()");
$count_visite = mysqli_query($mysqli, "SELECT * FROM users where visite <= Now()");
$count_reservation = mysqli_query($mysqli, "SELECT * FROM reservation");
$count_autorisation = mysqli_query($mysqli, "SELECT * FROM users where autorisation <= Now()");

//les lignes

$ligne_client = mysqli_num_rows($count_client);
$ligne_car = mysqli_num_rows($count_car);
$ligne_contrat = mysqli_num_rows($count_contrat);
$ligne_retour = mysqli_num_rows($count_retour);

$ligne_assur = mysqli_num_rows($count_assr_noPay);
$ligne_visite = mysqli_num_rows($count_visite);
$ligne_reserv = mysqli_num_rows($count_reservation);
$ligne_auto = mysqli_num_rows($count_autorisation);

// using mysqli_query instead
?>

    <!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js" lang="">
    <!--<![endif]-->



    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Martech Location - Admin Accueil</title>
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
        <link rel="stylesheet" href="assets/js/vendor/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="assets/js/vendor/morris/morris.css">
        <link rel="stylesheet" href="assets/js/vendor/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="assets/js/vendor/owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="assets/js/vendor/rickshaw/rickshaw.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/datatables.bootstrap.min.css">
        <link rel="stylesheet" href="assets/js/vendor/chosen/chosen.css">
        <link rel="stylesheet" href="assets/js/vendor/summernote/summernote.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/datatables.bootstrap.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/Responsive/css/dataTables.responsive.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/ColVis/css/dataTables.colVis.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/TableTools/css/dataTables.tableTools.min.css">

        <!-- project main css files -->
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
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
                        <a class="brand" href="index.php">
                            <span><strong style="color: #f79421;">Martech</strong> Location</span>
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
                    </div>
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
                                <img src="assets/images/profile-photo.png" alt="" class="img-circle size-30x30">
                                <span>Martech <i class="fa fa-angle-down"></i></span>
                            </a>

                            <ul class="dropdown-menu animated littleFadeInRight" role="menu">
                                <li>
                                    <a href="index.php?logout='1'">
                                        <i class="fa fa-sign-out"></i>Déconnecte
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
                                            <li class="active"><a href="index.php"><i class="fa fa-home"></i> <span>Accueil</span></a></li>
                                            <!--<li>
                                                <a role="button" tabindex="0"><i class="fa fa-envelope-o"></i> <span>Mail</span> <span class="badge bg-lightred">6</span></a>
                                                <ul>
                                                    <li><a href="mail-inbox.html"><i class="fa fa-caret-right"></i> Inbox</a></li>
                                                    <li><a href="mail-compose.html"><i class="fa fa-caret-right"></i> Compose Mail</a></li>
                                                    <li><a href="mail-single.html"><i class="fa fa-caret-right"></i> Single Mail</a></li>
                                                </ul>!-->
                                            </li>
                                            <!--<li><a href="calendar.html"><i class="fa fa-calendar-o"></i> <span>Calendar</span> <span class="label label-success">new events</span></a></li>!-->
                                            <!--<li>
                                                <a role="button" tabindex="0"><i class="fa fa-list"></i> <span>Form Stuff</span></a>
                                                <ul>
                                                    <li><a href="form-common.html"><i class="fa fa-caret-right"></i> Common Elements</a></li>
                                                    <li><a href="form-validate.html"><i class="fa fa-caret-right"></i> Validation Elements</a></li>
                                                    <li><a href="form-wizard.html"><i class="fa fa-caret-right"></i> Form Wizard <span class="badge badge-success">13</span></a></li>
                                                    <li><a href="form-upload.html"><i class="fa fa-caret-right"></i> File Upload</a></li>
                                                    <li><a href="form-imgcrop.html"><i class="fa fa-caret-right"></i> Image Crop</a></li>
                                                </ul>
                                            </li>!-->
                                            <!--<li>
                                                <a role="button" tabindex="0"><i class="fa fa-pencil"></i> <span>UI Kit</span></a>
                                                <ul>
                                                    <li><a href="ui-general.html"><i class="fa fa-caret-right"></i> General Elements</a></li>
                                                    <li><a href="ui-buttons-icons.html"><i class="fa fa-caret-right"></i> Buttons & Icons</a></li>
                                                    <li><a href="ui-typography.html"><i class="fa fa-caret-right"></i> Typography</a></li>
                                                    <li><a href="ui-navs.html"><i class="fa fa-caret-right"></i> Navigation & Accordions</a></li>
                                                    <li><a href="ui-modals.html"><i class="fa fa-caret-right"></i> Modals</a></li>
                                                    <li><a href="ui-tiles.html"><i class="fa fa-caret-right"></i> Tiles</a></li>
                                                    <li><a href="ui-portlets.html"><i class="fa fa-caret-right"></i> Portlets</a></li>
                                                    <li><a href="ui-grid.html"><i class="fa fa-caret-right"></i> Grid</a></li>
                                                    <li><a href="ui-widgets.html"><i class="fa fa-caret-right"></i> Widgets</a></li>
                                                    <li><a href="ui-tree.html"><i class="fa fa-caret-right"></i> Tree </a></li>
                                                    <li><a href="ui-lists.html"><i class="fa fa-caret-right"></i> Lists</a></li>
                                                    <li><a href="ui-alerts.html"><i class="fa fa-caret-right"></i> Alerts & Notifications</a></li>
                                                </ul>
                                            </li>!-->
                                            <!--<li>
                                                <a role="button" tabindex="0"><i class="fa fa-shopping-cart"></i> <span>Shop</span> <span class="label label-success">new</span></a>
                                                <ul>
                                                    <li><a href="shop-orders.html"><i class="fa fa-caret-right"></i> Orders</a></li>
                                                    <li><a href="shop-single-order.html"><i class="fa fa-caret-right"></i> Single Order</a></li>
                                                    <li><a href="shop-products.html"><i class="fa fa-caret-right"></i> Products</a></li>
                                                    <li><a href="shop-single-product.html"><i class="fa fa-caret-right"></i> Single Product</a></li>
                                                    <li><a href="shop-invoices.html"><i class="fa fa-caret-right"></i> Invoices</a></li>
                                                    <li><a href="shop-single-invoice.html"><i class="fa fa-caret-right"></i> Single Invoice</a></li>
                                                </ul>
                                            </li>!-->
                                            <li>
                                                <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                <li><a href="tables-datatables.php"><i class="fa fa-car"></i>Les Véhicules</a></li>
                                                <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>
                                            <li>
                                                <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                <li><a href="tables-clients.php"><i class="fa fa-users"></i>Les Clients</a></li>
                                                <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>

                                            <li>
                                                <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                <li><a href="tables-reservation.php"><i class="fa fa-edit"></i>Les Résérvations</a></li>
                                                <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>

                                            <li>
                                                <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                <li><a href="tables-contrats.php"><i class="fa fa-folder-open"></i>Les Contrats</a></li>
                                                <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>
                                            <li>
                                                <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                <li><a href="tables-retour.php"><i class="fa fa-reply"></i>Confirmation de Retour</a></li>
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
                                                <li><a href="tables-agence.php"><i class="fa fa-building-o"></i>Agence</a></li>
                                                <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>
                                            <li>
                                                <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                <li><a href="tables-employe.php"><i class="fa fa-user"></i>Employee</a></li>
                                                <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>
                                            <!--li>
                      <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!--
                      <li><a href="tables-datatables.php"><i class="fa fa-clipboard"></i>Les Utilisateurs</a></li>
                      <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!--

                    </li!-->
                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-square"></i> <span>Black lists</span></a>
                                                <ul>
                                                    <li><a href="blackliste.html"><i class="fa fa-archive"></i>Déclaration</a></li>
                                                    <li><a href="tables-cherche.html"><i class="fa fa-search"></i>Recherche</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-dollar"></i> <span>Gestion de Caisse</span></a>
                                                <ul>
                                                    <li><a href="tables-entrer_caisse.php"><i class="fa fa-reply-all"></i>Les entrées</a></li>
                                                    <li><a href="tables-sortir_caisse.php"><i class="fa fa-search"></i>Les sorties</a></li>
                                                    <li><a href="la_caisse.php"><i class="fa fa-dollar"></i>La caisse</a></li>
                                                    <li><a href="tables-categorie.php"><i class="fa fa-folder-open"></i>Les Catégories</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                <li><a href="gestion_d'infraction.php"><i class="fa fa-toggle-off"></i>Gestion d'infraction</a></li>
                                                <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>

                                            <li>
                                                <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                <li><a href="GPS.php"><i class="fa fa-venus"></i>GPS</a></li>
                                                <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>

                                            <li>
                                                <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                <li><a href="tables-reservation_onligne.php"><i class="fa fa-signal"></i>Réservation Online</a></li>
                                                <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>
                                            <li>
                                                <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                <li><a href="parametres.html"><i class="fa fa-align-justify"></i>Paramètres</a></li>
                                                <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>
                                            <!--<li>
                                                <a role="button" tabindex="0"><i class="fa fa-desktop"></i> <span>Extra Pages</span></a>
                                                <ul>
                                                    <li><a href="login.html"><i class="fa fa-caret-right"></i> Login Page</a></li>
                                                    <li><a href="signup.html"><i class="fa fa-caret-right"></i> Signup Page</a></li>
                                                    <li><a href="forgotpass.html"><i class="fa fa-caret-right"></i> Forgot Password Page</a></li>
                                                    <li><a href="page404.html"><i class="fa fa-caret-right"></i> Page 404</a></li>
                                                    <li><a href="page500.html"><i class="fa fa-caret-right"></i> Page 500</a></li>
                                                    <li><a href="page-offline.html"><i class="fa fa-caret-right"></i> Page Offline</a></li>
                                                    <li><a href="locked.html"><i class="fa fa-caret-right"></i> Locked Screen</a></li>
                                                    <li><a href="gallery.html"><i class="fa fa-caret-right"></i> Gallery</a></li>
                                                    <li><a href="timeline.html"><i class="fa fa-caret-right"></i> Timeline</a></li>
                                                    <li><a href="chat.html"><i class="fa fa-caret-right"></i> Chat</a></li>
                                                    <li><a href="search-results.html"><i class="fa fa-caret-right"></i> Search Results</a></li>
                                                    <li><a href="profile.html"><i class="fa fa-caret-right"></i> Profile Page</a></li>
                                                </ul>
                                            </li>!-->
                                            <!--<li>
                                                <a role="button" tabindex="0"><i class="fa fa-delicious"></i> <span>Layouts</span></a>
                                                <ul>
                                                    <li><a href="layout-boxed.html"><i class="fa fa-caret-right"></i> Boxed layout</a></li>
                                                    <li><a href="layout-fullwidth.html"><i class="fa fa-caret-right"></i> Full-width layout</a></li>
                                                    <li><a href="layout-sidebar-sm.html"><i class="fa fa-caret-right"></i> Small sidebar</a></li>
                                                    <li><a href="layout-sidebar-xs.html"><i class="fa fa-caret-right"></i> Extra-small sidebar</a></li>
                                                    <li><a href="layout-offcanvas.html"><i class="fa fa-caret-right"></i> Off-canvas sidebar  <span class="label label-success">new</span></a></li>
                                                    <li><a href="layout-hz-menu.html"><i class="fa fa-caret-right"></i> Horizontal menu</a></li>
                                                    <li><a href="layout-rtl.html"><i class="fa fa-caret-right"></i> RTL layout</a></li>
                                                </ul>
                                            </li>!-->
                                            <!--<li>
                                                <a role="button" tabindex="0"><i class="fa fa-file-o"></i> <span>Front Themes</span> <span class="label label-success">new</span></a>
                                                <ul>
                                                    <li><a href="http://www.tattek.sk/minovate-corp" target="_blank"><i class="fa fa-caret-right"></i> Corporate</a></li>
                                                    <li><a href="http://www.tattek.sk/minovate-commerce" target="_blank"><i class="fa fa-caret-right"></i> Commerce</a></li>
                                                </ul>
                                            </li>!-->




                                            <!--<li>
                                                <a role="button" tabindex="0"><i class="fa fa-magic"></i> <span>Menu Levels</span></a>
                                                <ul>
                                                    <li>
                                                        <a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Menu Level 1.1</a>
                                                        <ul>
                                                            <li><a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Menu Level 2.1</a></li>
                                                            <li><a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Menu Level 2.2</a></li>
                                                            <li>
                                                                <a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Menu Level 2.3</a>
                                                                <ul>
                                                                    <li><a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Menu Level 3.1</a></li>
                                                                    <li><a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Menu Level 3.2</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Menu Level 1.2</a>
                                                        <ul>
                                                            <li>
                                                                <a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Menu Level 2.1</a>
                                                                <ul>
                                                                    <li><a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Menu Level 3.1</a></li>
                                                                    <li>
                                                                        <a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Menu Level 3.2</a>
                                                                        <ul>
                                                                            <li><a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Menu Level 4.1</a></li>
                                                                            <li><a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Menu Level 4.2</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li><a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Menu Level 3.3</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a role="button" tabindex="0"><i class="fa fa-caret-right"></i> Menu Level 2.2</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>!-->


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
                            <!--<div class="panel settings panel-default">
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
                            </div>!-->
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
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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

                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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

                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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

                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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

                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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
                                            <a class="pull-left thumb thumb-sm" role="button" tabindex="0">
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

                <div class="page page-dashboard">

                    <div class="pageheader">

                        <h2>Accueil</h2>

                        <div class="page-bar">

                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.php"><i class="fa fa-home"></i> Martech</a>
                                </li>
                                <li>
                                    <a href="#">Accueil</a>
                                </li>
                            </ul>

                            <!--div class="page-toolbar">
              <a role="button" tabindex="0" class="btn btn-lightred no-border pickDate">
                                    <i class="fa fa-calendar"></i>&nbsp;&nbsp;<span></span>&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                                </a>
            </div!-->

                        </div>

                    </div>

                    <!-- cards row -->
                    <div class="row">

                        <!-- col -->
                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-greensea" style="border-radius: 7px;">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <i class="fa fa-users fa-4x"></i>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">
                                                <?php echo $ligne_client;?>
                                            </p>
                                            <span>Nombre de Clients</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-greensea">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->

                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-12">
                                            <a href=tables-clients.php><i class="fa fa-users fa-2x"></i> Nombre de clients</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->

                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                            </div>
                        </div>
                        <!-- /col -->

                        <!-- col -->
                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-lightred" style="border-radius: 7px;">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <i class="fa fa-car fa-4x"></i>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">
                                                <?php echo $ligne_car;?>
                                            </p>
                                            <span>Nombre de Véhicule</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-lightred">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->

                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-12">
                                            <a href=tables-datatables.php><i class="fa fa-car fa-2x"></i> Nombre de Véhicule</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->

                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                            </div>
                        </div>
                        <!-- /col -->

                        <!-- col -->
                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-blue" style="border-radius: 7px;">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <i class="fa fa-book fa-4x"></i>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">
                                                <?php echo $ligne_contrat;?>
                                            </p>
                                            <span>Nombre Contrats</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-blue">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->

                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-12">
                                            <a href=tables-contrats.php><i class="fa fa-book fa-2x"></i> Nombre Contrats</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->

                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                            </div>
                        </div>
                        <!-- /col -->

                        <!-- col -->
                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-slategray" style="border-radius: 7px;">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <i class="fa fa-calendar fa-4x"></i>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">
                                                <?php echo $ligne_retour;?>
                                            </p>
                                            <span>Retour d'aujourd'hui</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-slategray">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->

                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-12">
                                            <a href=#><i class="fa fa-calendar fa-2x"></i>Retour d'aujourd'hui</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->

                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                            </div>
                        </div>
                        <!-- /col -->

                    </div>
                    <!-- /row -->
                    <div class="row">

                        <!-- col -->
                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-slategray" style="border-radius: 7px;">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <i class="fa fa-car fa-4x"></i>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">
                                                <?php echo $ligne_assur;?>
                                            </p>
                                            <span>Assurance Non Payé</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-slategray">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->

                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-12">
                                            <a href=assurance_non_paye.php><i class="fa fa-car fa-2x"></i> Assurance Non Payé</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->

                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                            </div>
                        </div>

                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-blue" style="border-radius: 7px;">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <i class="fa fa-cogs fa-4x"></i>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">
                                                <?php echo $ligne_visite;?>
                                            </p>
                                            <span>Visite Technique</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-blue">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->

                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-12">
                                            <a href=visite_technique.php><i class="fa fa-cogs fa-2x"></i> Manque Visite Technique</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->

                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                            </div>
                        </div>

                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-lightred" style="border-radius: 7px;">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <i class="fa fa-edit fa-4x"></i>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">
                                                <?php echo $ligne_reserv;?>
                                            </p>
                                            <span>Reservation</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-lightred">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->

                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-12">
                                            <a href=tables-reservation.php><i class="fa fa-edit fa-2x"></i> Nombre de Reservation</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->

                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                            </div>
                        </div>

                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-greensea" style="border-radius: 7px;">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <i class="fa fa-users fa-4x"></i>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">
                                                <?php echo $ligne_auto;?>
                                            </p>
                                            <span>Autorisation</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-greensea">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->

                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-12">
                                            <a href=autorisation.php><i class="fa fa-users fa-2x"></i> Autorisation de circulation</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->

                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                            </div>
                        </div>

                    </div>



                    <!-- row -->
                    <div class="row">



                        <!-- col -->
                        <div class="col-md-8" style="display: inline;float: none;">

                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font">Touts <strong>Véhicules</strong></h1>
                                    <ul class="controls">
                                        <li>
                                            <a href="ajoute.php" tabindex="0"><i class="fa fa-plus mr-5"></i> Ajoute une voiture</a>
                                        </li>


                                    </ul>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body">
                                    <div class="table-responsive">
                                        <table class="table table-custom" id="editable-usage">
                                            <thead>
                                                <tr>
                                                    <th>Marque</th>
                                                    <th>Modele</th>
                                                    <th>Couleur</th>
                                                    <th>Matricule</th>
                                                    <th>Prix/jour</th>
                                                    <th>Carburant</th>
                                                    <th style="width: 150px;">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                              while($res = mysqli_fetch_array($result)) {
                                  $a = $res['couleur'];
                                echo "<tr>";
                                echo "<td style='padding-bottom: 25px;padding-top: 25px;font-style:bold;font-weight: bold;font-size: 18px;'>".$res['marque']."</td>";
                                    echo "<td style='padding-bottom: 25px;padding-top: 25px;'>".$res['modele']."</td>";
                                    echo "<td style='padding-bottom: 25px;padding-top: 25px;background:$a;'></td>";
                                echo "<td style='padding-bottom: 25px;padding-top: 25px;'>".$res['matricule']."</td>";
                                echo "<td style='padding-bottom: 25px;padding-top: 25px;'>".$res['prix']." Dhs</td>";
                                  echo "<td style='padding-bottom: 25px;padding-top: 25px;'>".$res['Carburant']."</td>";
                                echo "<td style='padding-bottom: 25px;padding-top: 25px;'><a style='background-color:#22beef;color:#fff;padding: 10px;border-radius: 10px;' href=\"modifier_voitur.php?id=$res[id]\">
                                <i style='padding:10px;' class='fa fa-edit'></i></a> | <a style='background-color:#d9534f;color:#fff;padding-bottom: 10px;padding-top: 10px;padding-right: 10px;padding-left: 10px;border-radius: 10px;' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i style='padding:10px;' class='fa fa-trash'></i></a></td>";
                              }
                              ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /tile body -->

                            </section>
                            <!-- /tile -->

                        </div>
                        <!-- /col -->



                        <!-- col -->
                        <div class="col-md-4">

                            <!-- tile -->
                            <!--section class="tile" fullscreen="isFullscreen02">

              <!-- tile header --
              <div class="tile-header dvd dvd-btm">
                <h1 class="custom-font"><strong>Browser </strong>Usage</h1>
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

                            <!-- tile widget --
              <div class="tile-widget">
                <div id="browser-usage" style="height: 250px"></div>
              </div>
              <!-- /tile widget -->

                            <!-- tile body --
              <div class="tile-body p-0">

                <div class="panel-group icon-plus" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default panel-transparent">
                    <div class="panel-heading" role="tab" id="headingOne">
                      <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <span><i class="fa fa-minus text-sm mr-5"></i> This Month</span>
                                                        <span class="badge pull-right bg-lightred">3</span>
                                                    </a>
                                                </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                        <table class="table table-no-border m-0">
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Chrome</td>
                              <td>6985</td>
                              <td><i class="fa fa-caret-up text-success"></i></td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Other</td>
                              <td>2697</td>
                              <td><i class="fa fa-caret-up text-success"></i></td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Safari</td>
                              <td>3597</td>
                              <td><i class="fa fa-caret-down text-danger"></i></td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Firefox</td>
                              <td>2145</td>
                              <td><i class="fa fa-caret-up text-success"></i></td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>Internet Explorer</td>
                              <td>1854</td>
                              <td><i class="fa fa-caret-down text-danger"></i></td>
                            </tr>
                            <tr>
                              <td>6</td>
                              <td>Opera</td>
                              <td>654</td>
                              <td><i class="fa fa-caret-up text-success"></i></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default panel-transparent">
                    <div class="panel-heading" role="tab" id="headingTwo">
                      <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        <span><i class="fa fa-minus text-sm mr-5"></i> Last Month</span>
                                                    </a>
                                                </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                      <div class="panel-body">
                        <table class="table table-no-border m-0">
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Chrome</td>
                              <td>6985</td>
                              <td><i class="fa fa-caret-up text-success"></i></td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Other</td>
                              <td>2697</td>
                              <td><i class="fa fa-caret-up text-success"></i></td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Safari</td>
                              <td>3597</td>
                              <td><i class="fa fa-caret-down text-danger"></i></td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Firefox</td>
                              <td>2145</td>
                              <td><i class="fa fa-caret-up text-success"></i></td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>Internet Explorer</td>
                              <td>1854</td>
                              <td><i class="fa fa-caret-down text-danger"></i></td>
                            </tr>
                            <tr>
                              <td>6</td>
                              <td>Opera</td>
                              <td>654</td>
                              <td><i class="fa fa-caret-up text-success"></i></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default panel-transparent">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        <span><i class="fa fa-minus text-sm mr-5"></i> This Year</span>
                                                    </a>
                                                </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                      <div class="panel-body">
                        <table class="table table-no-border m-0">
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Chrome</td>
                              <td>6985</td>
                              <td><i class="fa fa-caret-up text-success"></i></td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Other</td>
                              <td>2697</td>
                              <td><i class="fa fa-caret-up text-success"></i></td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Safari</td>
                              <td>3597</td>
                              <td><i class="fa fa-caret-down text-danger"></i></td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Firefox</td>
                              <td>2145</td>
                              <td><i class="fa fa-caret-up text-success"></i></td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>Internet Explorer</td>
                              <td>1854</td>
                              <td><i class="fa fa-caret-down text-danger"></i></td>
                            </tr>
                            <tr>
                              <td>6</td>
                              <td>Opera</td>
                              <td>654</td>
                              <td><i class="fa fa-caret-up text-success"></i></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /tile body --

            </section!-->
                            <!-- /tile -->

                        </div>
                        <!-- /col -->


                    </div>
                    <!-- /row -->





                    <!-- row -->
                    <div class="row">


                        <!-- col -->
                        <div class="col-md-4">

                            <!-- tile -->
                            <!--<section class="tile tile-simple bg-lightred" style="min-height: 190px; overflow: hidden;">

                                <!-- tile header --
                                <div class="tile-header">
                                    <h1 class="custom-font">Todos's</h1>
                                    <ul class="controls">
                                        <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /tile header -->

                            <!-- tile body --
                                <div class="tile-body">

                                    <div id="todo-carousel" class="owl-carousel">

                                        <div>
                                            <div class="progress-list">
                                                <div class="details">
                                                    <div class="title"><i class="fa fa-caret-right mr-5"></i> <span class="text-md">Release update</span></div>
                                                    <div class="description text-transparent-white text-lowercase">high priority, started at: 12.08.2014</div>
                                                </div>
                                                <div class="clearfix" style="height: 45px"></div>
                                                <div class="progress transparent-black not-rounded mb-10">
                                                  <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                                    50%
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-border btn-rounded-20 btn-white btn-xs mr-5" style="width:22px;"><i class="fa fa-thumbs-o-up"></i></button>
                                                <button type="button" class="btn btn-border btn-rounded-20 btn-white btn-xs mr-5" style="width:22px;"><i class="fa fa-caret-down"></i></button>
                                                <button type="button" class="btn btn-border btn-rounded-20 btn-white btn-xs" style="width:22px;"><i class="fa fa-ellipsis-h"></i></button>
                                            </div>
                                            <p class="text-thin">Deadline: <strong>12h 15m</strong></p>
                                        </div>

                                        <div>
                                            <div class="progress-list">
                                                <div class="details">
                                                    <div class="title"><i class="fa fa-caret-right mr-5"></i> <span class="text-md">Fix navigation</span></div>
                                                    <div class="description text-transparent-white text-lowercase">normal priority, started at: 20.09.2014</div>
                                                </div>
                                                <div class="clearfix" style="height: 45px"></div>
                                                <div class="progress transparent-black not-rounded mb-10">
                                                  <div class="progress-bar" role="progressbar" aria-valuenow="26" aria-valuemin="0" aria-valuemax="100" style="width: 26%;">
                                                    26%
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-border btn-rounded-20 btn-white btn-xs mr-5" style="width:22px;"><i class="fa fa-thumbs-o-up"></i></button>
                                                <button type="button" class="btn btn-border btn-rounded-20 btn-white btn-xs mr-5" style="width:22px;"><i class="fa fa-caret-down"></i></button>
                                                <button type="button" class="btn btn-border btn-rounded-20 btn-white btn-xs" style="width:22px;"><i class="fa fa-ellipsis-h"></i></button>
                                            </div>
                                            <p class="text-thin">Deadline: <strong>2d 9h 45m</strong></p>
                                        </div>

                                        <div>
                                            <div class="progress-list">
                                                <div class="details">
                                                    <div class="title"><i class="fa fa-caret-right mr-5"></i> <span class="text-md">Remove dependencies</span></div>
                                                    <div class="description text-transparent-white text-lowercase">high priority, started at: 26.10.2014</div>
                                                </div>
                                                <div class="clearfix" style="height: 45px"></div>
                                                <div class="progress transparent-black not-rounded mb-10">
                                                  <div class="progress-bar" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
                                                    78%
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-border btn-rounded-20 btn-white btn-xs mr-5" style="width:22px;"><i class="fa fa-thumbs-o-up"></i></button>
                                                <button type="button" class="btn btn-border btn-rounded-20 btn-white btn-xs mr-5" style="width:22px;"><i class="fa fa-caret-down"></i></button>
                                                <button type="button" class="btn btn-border btn-rounded-20 btn-white btn-xs" style="width:22px;"><i class="fa fa-ellipsis-h"></i></button>
                                            </div>
                                            <p class="text-thin">Deadline: <strong>1h 5m</strong></p>
                                        </div>

                                    </div>

                                </div>
                                <!-- /tile body --

                            </section>
                            <!-- /tile -->


                            <!-- tile -->
                            <!--section class="tile">

              <!-- tile header --
              <div class="tile-header dvd dvd-btm">
                <h1 class="custom-font"><strong>Realtime </strong>Load</h1>
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

              <!-- tile widget -
              <div class="tile-widget mb-40">

                <div class="progress-list mt-20">
                  <div class="details">
                    <div class="title text-lg" style="line-height: 30px"><strong>125</strong> Users Online</div>
                  </div>
                  <div class="status pull-right bg-greensea">
                    <span>41</span>%
                  </div>
                  <div class="clearfix"></div>
                  <div class="progress not-rounded mb-10">
                    <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100" style="width: 41%;"></div>
                  </div>
                </div>

                <!-- row --
                <div class="row">
                  <!-- col --
                  <div class="col-md-4">
                    <h4 class="text-light">HDD 1 <i class="fa fa-caret-up text-success"></i></h4>
                    <div class="progress progress-xs not-rounded mb-0">
                      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                    </div>
                    <small>Health: <span class="text-success">Good</span></small>
                  </div>
                  <!-- /col -->
                            <!-- col --
                  <div class="col-md-4">
                    <h4 class="text-light">HDD 2 <i class="fa fa-caret-up text-success"></i></h4>
                    <div class="progress progress-xs not-rounded mb-0">
                      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                    </div>
                    <small>Health: <span class="text-success">Good</span></small>
                  </div>
                  <!-- /col -->
                            <!-- col --
                  <div class="col-md-4">
                    <h4 class="text-light">HDD 3 <i class="fa fa-caret-down text-danger"></i></h4>
                    <div class="progress progress-xs not-rounded mb-0">
                      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                    </div>
                    <small>Health: <span class="text-danger">Bad</span></small>
                  </div>
                  <!-- /col --
                </div>
                <!-- /row --

              </div>
              <!-- /tile widget -->

                            <!-- tile body --
              <div class="tile-body p-0" style="height: 133px">

                <div class="rickshaw" id="realtime-rickshaw"></div>

              </div>
              <!-- /tile body --

            </section!-->
                            <!-- /tile -->


                        </div>
                        <!-- /col -->



                        <!-- col -->
                        <div class="col-md-4">

                            <!-- tile -->
                            <!--<section class="tile tile-simple bg-blue" style="min-height: 190px; overflow: hidden;">

                                <!-- tile header --
                                <div class="tile-header">
                                    <h1 class="custom-font"><strong>Social</strong> Feed</h1>
                                    <ul class="controls">
                                        <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /tile header -->

                            <!-- tile body --
                                <div class="tile-body">

                                    <div id="feed-carousel" class="owl-carousel">

                                        <div class="media social-feed">
                                            <span class="pull-left">
                                                <i class="fa fa-facebook fa-2x icon-border wh45 text-center" style="line-height: 45px"></i>
                                            </span>

                                            <div class="media-body">
                                                <p class="media-heading"><strong>Imrich Kamarel</strong> <small class="text-light text-transparent-white">18 minutes ago</small></p>
                                                <p class="text-transparent-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim...</p>
                                            </div>
                                        </div>

                                        <div class="media social-feed">
                                            <span class="pull-left">
                                                <i class="fa fa-twitter fa-2x icon-border wh45 text-center" style="line-height: 45px"></i>
                                            </span>

                                            <div class="media-body">
                                                <p class="media-heading"><strong>George Schwarz</strong> <small class="text-light text-transparent-white">1 hour ago</small></p>
                                                <p class="text-transparent-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim...</p>
                                            </div>
                                        </div>

                                        <div class="media social-feed">
                                            <span class="pull-left">
                                                <i class="fa fa-google-plus fa-2x icon-border wh45 text-center" style="line-height: 45px"></i>
                                            </span>

                                            <div class="media-body">
                                                <p class="media-heading"><strong>Milan Klement</strong> <small class="text-light text-transparent-white">56 minutes ago</small></p>
                                                <p class="text-transparent-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim...</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /tile body --

                            </section>!-->
                            <!-- /tile -->



                            <!-- tile -->
                            <!--<section class="tile widget-todo" fullscreen="isFullscreen04" ng-controller="TodoWidgetCtrl">

                                <!-- tile header --
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Todo </strong>List</h1>
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
                                <div class="tile-body lined-paper">

                                    <form class="form-horizontal" role="form">
                                        <label for="todo" class="text-strong mb-0">Add Todo: </label>
                                        <div class="form-group mb-0">
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control input-unstyled" id="todo" placeholder="type todo here..." required>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="submit" class="btn btn-link"><i class="fa fa-chevron-right text-lg"></i></button>
                                            </div>
                                        </div>
                                    </form>

                                    <ul class="todo-list list-unstyled">
                                        <li>
                                            <div class="view">
                                                <label class="checkbox checkbox-custom m-0 text-muted inline">
                                                    <input type="checkbox"><i></i>
                                                </label>
                                                <span>Release Update</span>
                                                <a role="button" tabindex="0" class="text-danger remove-todo pull-right">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="view">
                                                <label class="checkbox checkbox-custom m-0 text-muted inline">
                                                    <input type="checkbox"><i></i>
                                                </label>
                                                <span>Make a backup</span>
                                                <a role="button" tabindex="0" class="text-danger remove-todo pull-right">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="completed">
                                            <div class="view">
                                                <label class="checkbox checkbox-custom m-0 text-muted inline">
                                                    <input type="checkbox" checked><i></i>
                                                </label>
                                                <span>Send e-mail to Ici</span>
                                                <a role="button" tabindex="0" class="text-danger remove-todo pull-right">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="view">
                                                <label class="checkbox checkbox-custom m-0 text-muted inline">
                                                    <input type="checkbox"><i></i>
                                                </label>
                                                <span>Buy tickets</span>
                                                <a role="button" tabindex="0" class="text-danger remove-todo pull-right">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="view">
                                                <label class="checkbox checkbox-custom m-0 text-muted inline">
                                                    <input type="checkbox"><i></i>
                                                </label>
                                                <span>Resolve Issues</span>
                                                <a role="button" tabindex="0" class="text-danger remove-todo pull-right">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="view">
                                                <label class="checkbox checkbox-custom m-0 text-muted inline">
                                                    <input type="checkbox"><i></i>
                                                </label>
                                                <span>Compile new version</span>
                                                <a role="button" tabindex="0" class="text-danger remove-todo pull-right">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                                <!-- /tile body --

                            </section>!-->
                            <!-- /tile -->



                        </div>
                        <!-- /col -->


                        <!-- col -->
                        <div class="col-md-4">

                            <!-- tile -->
                            <!--<section class="tile tile-simple" style="min-height: 190px; overflow: hidden;">

                                <!-- tile header --
                                <div class="tile-header p-0">
                                    <ul class="controls">
                                        <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /tile header -->

                            <!-- tile body --
                                <div class="tile-body lined-paper">
                                    <div id="notes-carousel" class="owl-carousel">

                                        <div>
                                            <h4 class="mt-5 mb-5">This is my note #1</h4>
                                            <p class="text-muted mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad.</p>
                                        </div>

                                        <div>
                                            <h4 class="mt-5 mb-5">This is my note #2</h4>
                                            <p class="text-muted mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad.</p>
                                        </div>

                                        <div>
                                            <h4 class="mt-5 mb-5">This is my note #3</h4>
                                            <p class="text-muted mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad.</p>
                                        </div>

                                    </div>
                                </div>
                                <!-- /tile body --

                            </section>!-->
                            <!-- /tile -->



                            <!-- tile -->
                            <!--section class="tile bg-slategray widget-calendar">

              <!-- tile header --
              <div class="tile-header dvd dvd-btm">
                <h1 class="custom-font"><strong>Mini </strong>Calendar</h1>
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
              <div class="tile-body p-0">
                <div id="mini-calendar"></div>
              </div>
              <!-- /tile body --

            </section!-->
                            <!-- /tile -->



                        </div>
                        <!-- /col -->


                    </div>
                    <!-- /row -->





                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <!--<div class="col-md-8">
                            <!-- tile --
                            <section class="tile">

                                <!-- tile header --
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Project </strong>Progress</h1>
                                    <ul class="controls">
                                        <li>
                                            <a role="button" tabindex="0" class="pickDate">
                                                <span></span>&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                                            </a>
                                        </li>
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
                                <div class="tile-body table-custom">

                                    <div class="table-responsive">
                                        <table class="table table-custom" id="project-progress">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Project</th>
                                                <th>Priority</th>
                                                <th style="width: 200px;">Status</th>
                                                <th style="width: 60px;" class="text-right no-sort">Chart</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Graphic layout for client</td>
                                                <td><small class="text-danger">High Priority</small></td>
                                                <td>
                                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px">
                                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100" style="width: 42%;"></div>
                                                    </div>
                                                    <small>42%</small>
                                                </td>
                                                <td class="text-right">
                                                    <span class="sparklineChart"
                                                          values="1,3,2,3,5,6,8,5,9,8"
                                                          sparkType="bar"
                                                          sparkBarColor="#cd97eb"
                                                          sparkBarWidth="4px"
                                                          sparkHeight="18px">
                                                    Loading...</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Make website responsive</td>
                                                <td><small class="text-success">Low Priority</small></td>
                                                <td>
                                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px">
                                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                                                    </div>
                                                    <small>89%</small>
                                                </td>
                                                <td class="text-right">
                                                    <span class="sparklineChart"
                                                          values="2,5,3,4,6,5,1,8,9,10"
                                                          sparkType="bar"
                                                          sparkBarColor="#a2d200"
                                                          sparkBarWidth="4px"
                                                          sparkHeight="18px">
                                                    Loading...</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Clean html/css/js code</td>
                                                <td><small class="text-danger">High Priority</small></td>
                                                <td>
                                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px">
                                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                                                    </div>
                                                    <small>23%</small>
                                                </td>
                                                <td class="text-right">
                                                    <span class="sparklineChart"
                                                          values="5,6,8,2,1,6,8,4,3,5"
                                                          sparkType="bar"
                                                          sparkBarColor="#ffc100"
                                                          sparkBarWidth="4px"
                                                          sparkHeight="18px">
                                                    Loading...</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Database optimization</td>
                                                <td><small class="text-warning">Normal Priority</small></td>
                                                <td>
                                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px">
                                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%;"></div>
                                                    </div>
                                                    <small>56%</small>
                                                </td>
                                                <td class="text-right">
                                                    <span class="sparklineChart"
                                                          values="2,9,8,7,5,9,2,3,4,2"
                                                          sparkType="bar"
                                                          sparkBarColor="#16a085"
                                                          sparkBarWidth="4px"
                                                          sparkHeight="18px">
                                                    Loading...</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Database migration</td>
                                                <td><small class="text-success">Low Priority</small></td>
                                                <td>
                                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px">
                                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;"></div>
                                                    </div>
                                                    <small>48%</small>
                                                </td>
                                                <td class="text-right">
                                                    <span class="sparklineChart"
                                                          values="3,5,6,2,8,9,5,4,3,2"
                                                          sparkType="bar"
                                                          sparkBarColor="#1693A5"
                                                          sparkBarWidth="4px"
                                                          sparkHeight="18px">
                                                    Loading...</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Email server backup</td>
                                                <td><small class="text-warning">Normal Priority</small></td>
                                                <td>
                                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px">
                                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                                                    </div>
                                                    <small>10%</small>
                                                </td>
                                                <td class="text-right">
                                                    <span class="sparklineChart"
                                                          values="7,8,6,4,3,5,8,9,10,7"
                                                          sparkType="bar"
                                                          sparkBarColor="#3f4e62"
                                                          sparkBarWidth="4px"
                                                          sparkHeight="18px">
                                                    Loading...</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- /tile body --

                            </section>
                            <!-- /tile --
                        </div>!-->
                        <!-- /col -->





                        <!-- col -->
                        <!--<div class="col-md-4">
                            <!-- tile --
                            <section class="tile">

                                <!-- tile header --
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Users </strong>Feed</h1>
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

                                <!-- tile widget --
                                <div class="tile-widget">
                                    <!-- row --
                                    <div class="row">
                                        <!-- col --
                                        <div class="col-lg-6">
                                            <div class="media mb-20">
                                                <div class="pull-left thumb">
                                                    <img class="media-object img-circle" src="assets/images/ici-avatar.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading mb-0">Imrich <strong>Kamarel</strong></h4>
                                                    <small class="text-lightred">UI/UX Designer</small>
                                                </div>
                                            </div>
                                            <!-- row --
                                            <div class="row">
                                                <!-- col --
                                                <div class="col-xs-4 text-center b-r b-solid">
                                                    <small class="text-lightred"><i class="fa fa-heart-o"></i> 125</small>
                                                </div>
                                                <!-- /col -->
                        <!-- col --
                                                <div class="col-xs-4 text-center b-r b-solid">
                                                    <small class="text-greensea"><i class="fa fa-star-o"></i> 67</small>
                                                </div>
                                                <!-- /col -->
                        <!-- col --
                                                <div class="col-xs-4 text-center">
                                                    <small class="text-blue"><i class="fa fa-comment-o"></i> 26</small>
                                                </div>
                                                <!-- /col --
                                            </div>
                                            <!-- /row --
                                        </div>
                                        <!-- /col -->
                        <!-- col --
                                        <div class="col-lg-6">
                                            <dl class="text-sm">
                                                <dt>About: </dt>
                                                <dd>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</dd>
                                                <dt>Hobbies: </dt>
                                                <dd>Sleep,  games,  animals, nature</dd>
                                                <dt>Skills: </dt>
                                                <dd>jquery, html, css, angularjs</dd>
                                                <dt>Rating: </dt>
                                                <dd class="text-lightred"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></dd>
                                            </dl>
                                        </div>
                                        <!-- /col --
                                    </div>
                                    <!-- /row --

                                </div>
                                <!-- /tile widget -->


                        <!-- tile body --
                                <div class="tile-body p-0">



                                    <div role="tabpanel">

                                        <!-- Nav tabs --
                                        <ul class="nav nav-tabs tabs-dark" role="tablist">
                                            <li role="presentation" class="active"><a href="#feed-all" aria-controls="all" role="tab" data-toggle="tab">All</a></li>
                                            <li role="presentation"><a href="#feed-superheroes" aria-controls="superheroes" role="tab" data-toggle="tab">Superheroes</a></li>
                                            <li role="presentation"><a href="#feed-friends" aria-controls="friends" role="tab" data-toggle="tab">Friends</a></li>
                                        </ul>

                                        <!-- Tab panes --
                                        <div class="tab-content">

                                            <div role="tabpanel" class="tab-pane active" id="feed-all">
                                                <div class="wrap-reset" style="max-height: 216px;overflow:auto;">
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar8.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Anna <strong>Opichia</strong></p>
                                                            <small class="text-lightred">lead designer</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar7.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Bobby <strong>Socks</strong></p>
                                                            <small class="text-lightred">CEO</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar6.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Nico <strong>Vulture</strong></p>
                                                            <small class="text-lightred">Referent</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar5.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Roger <strong>Flopple</strong></p>
                                                            <small class="text-lightred">Manager</small>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar4.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Deel <strong>McApple</strong></p>
                                                            <small class="text-lightred">Print master</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane" id="feed-superheroes">
                                                <div class="wrap-reset" style="max-height: 216px;overflow:auto;">
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar7.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Bobby <strong>Socks</strong></p>
                                                            <small class="text-lightred">CEO</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar6.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Nico <strong>Vulture</strong></p>
                                                            <small class="text-lightred">Referent</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar8.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Anna <strong>Opichia</strong></p>
                                                            <small class="text-lightred">lead designer</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar5.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Roger <strong>Flopple</strong></p>
                                                            <small class="text-lightred">Manager</small>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar4.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Deel <strong>McApple</strong></p>
                                                            <small class="text-lightred">Print master</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane" id="feed-friends">
                                                <div class="wrap-reset" style="max-height: 216px;overflow:auto;">
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar5.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Roger <strong>Flopple</strong></p>
                                                            <small class="text-lightred">Manager</small>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar4.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Deel <strong>McApple</strong></p>
                                                            <small class="text-lightred">Print master</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar8.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Anna <strong>Opichia</strong></p>
                                                            <small class="text-lightred">lead designer</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar7.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Bobby <strong>Socks</strong></p>
                                                            <small class="text-lightred">CEO</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="assets/images/random-avatar6.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Nico <strong>Vulture</strong></p>
                                                            <small class="text-lightred">Referent</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!-- /tile body --

                            </section>
                            <!-- /tile --
                        </div>!-->
                        <!-- /col -->




                    </div>
                    <!-- /row -->





                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <!--<div class="col-md-4">
                            <!-- tile --
                            <section class="tile widget-message">

                                <!-- tile header --
                                <div class="tile-header bg-blue dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Quick </strong>Message</h1>
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

                        <!-- tile widget --
                                <div class="tile-widget bg-blue">

                                    <form role="form">
                                        <div class="form-group">
                                            <select data-placeholder="Select recipients..." multiple="" tabindex="3" class="chosen-select input-underline" style="width: 100%;">
                                                <option value="ici@gmail.com">ici@gmail.com</option>
                                                <option value="johny@gmail.com">johny@gmail.com</option>
                                                <option value="arnie@gmail.com">arnie@gmail.com</option>
                                                <option value="pete@gmail.com">pete@gmail.com</option>
                                                <option value="gorge@gmail.com">gorge@gmail.com</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control underline-input" placeholder="Type subject...">
                                        </div>
                                    </form>

                                </div>
                                <!-- /tile widget -->

                        <!-- tile body --
                                <div class="tile-body p-0">

                                    <div id="summernote">Hello Summernote</div>

                                </div>
                                <!-- /tile body -->

                        <!-- tile footer --
                                <div class="tile-footer bg-blue text-right">

                                    <button class="btn btn-blue btn-ef btn-ef-7 btn-ef-7h" activate-button="success"><i class="fa fa-envelope"></i> Send message</button>

                                </div>
                                <!-- /tile footer --

                            </section>
                            <!-- /tile --
                        </div>
                        <!-- /col -->



                        <!-- col -->
                        <div class="col-md-4">
                            <!-- tile -->
                            <!--<section class="tile widget-chat">

                                <!-- tile header --
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font">Chat</h1>
                                    <ul class="controls">
                                        <li class="dropdown">

                                            <a role="button" tabindex="0" class="dropdown-toggle" data-toggle="dropdown">John Douey <i class="fa fa-angle-down ml-5"></i></a>

                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                                <li>
                                                    <a role="button" tabindex="0">Imrich Kamarel</a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0">Arnold Schwarz</a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0">Deel McApple</a>
                                                </li>

                                            </ul>

                                        </li>
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
                                <div class="tile-body slim-scroll" style="max-height: 320px;overflow:auto;">

                                    <ul class="chats p-0">
                                        <li class="in">
                                            <div class="media">
                                                <div class="pull-left thumb thumb-sm">
                                                    <img class="media-object img-circle" src="assets/images/random-avatar2.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <p class="media-heading"><a role="button" tabindex="0" class="name">John Douey </a><span class="datetime">at 12.10.2014</span></p>
                                                    <span class="body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="out">
                                            <div class="media">
                                                <div class="pull-right thumb thumb-sm">
                                                    <img class="media-object img-circle" src="assets/images/random-avatar1.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <p class="media-heading"><a role="button" tabindex="0" class="name">You </a><span class="datetime">2 hours ago</span></p>
                                                    <span class="body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="in">
                                            <div class="media">
                                                <div class="pull-left thumb thumb-sm">
                                                    <img class="media-object img-circle" src="assets/images/random-avatar2.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <p class="media-heading"><a role="button" tabindex="0" class="name">John Douey </a><span class="datetime">2 hours ago</span></p>
                                                    <span class="body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="out">
                                            <div class="media">
                                                <div class="pull-right thumb thumb-sm">
                                                    <img class="media-object img-circle" src="assets/images/random-avatar1.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <p class="media-heading"><a role="button" tabindex="0" class="name">You </a><span class="datetime">1 hours ago</span></p>
                                                    <span class="body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="in">
                                            <div class="media">
                                                <div class="pull-left thumb thumb-sm">
                                                    <img class="media-object img-circle" src="assets/images/random-avatar2.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <p class="media-heading"><a role="button" tabindex="0" class="name">John Douey </a><span class="datetime">53 minutes ago</span></p>
                                                    <span class="body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="out">
                                            <div class="media">
                                                <div class="pull-right thumb thumb-sm">
                                                    <img class="media-object img-circle" src="assets/images/random-avatar1.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <p class="media-heading"><a role="button" tabindex="0" class="name">You </a><span class="datetime">40 minutes ago</span></p>
                                                    <span class="body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                                <!-- /tile body -->

                            <!-- tile footer --
                                <div class="tile-footer">
                                    <div class="chat-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type your message here...">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button"><i class="fa fa-chevron-right"></i></button>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tile footer --

                            </section>!-->
                            <!-- /tile -->
                        </div>
                        <!-- /col -->




                        <!-- col -->
                        <!--<div class="col-md-4">
                            <!-- tile --
                            <section class="tile bg-greensea widget-appointments">

                                <!-- tile header --
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font">Appointments</h1>
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
                                        <li class="remove"><a role="button" tabindex="0"  class="tile-close"><i class="fa fa-times"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /tile header -->

                        <!-- tile body --
                                <div class="tile-body">
                                    <!-- row --
                                    <div class="row">
                                        <!-- col --
                                        <div class="col-md-6 text-center">

                                            <h4 class="text-light">Bratislava</h4>
                                            <div style="width: 100%;">
                                            <canvas id="c1" class="CoolClock:minovateClock:50"></canvas>
                                            </div>
                                            <span class="text-light">30&deg;C</span>

                                        </div>
                                        <!-- /col -->
                        <!-- col --
                                        <div class="col-md-6 b-l text-center">
                                            <span class="day">15</span><br/>
                                            <span class="month">May</span>
                                        </div>
                                        <!-- /col --
                                    </div>
                                    <!-- /row --
                                </div>
                                <!-- /tile body -->

                        <!-- tile footer --
                                <div class="tile-footer dvd dvd-top mt-20">

                                    <div class="owl-carousel" id="appointments-carousel">

                                        <div>
                                            <p class="text-center text-strong"><i class="fa fa-clock-o"></i> 16:00, <small class="text-thin">Estimated time: 2 hours</small></p>
                                            <p>
                                            <h5 class="mt-10 mb-0 text-strong">Release Update</h5>
                                            <small class="text-thin text-transparent-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</small>
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-center text-strong"><i class="fa fa-clock-o"></i> 19:00, <small class="text-thin">Estimated time: 5 hours</small></p>
                                            <p>
                                            <h5 class="mt-10 mb-0 text-strong">Make a Backup</h5>
                                            <small class="text-thin text-transparent-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</small>
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-center text-strong"><i class="fa fa-clock-o"></i> 22:45, <small class="text-thin">Estimated time: 8 hours 45 minutes</small></p>
                                            <p>
                                            <h5 class="mt-10 mb-0 text-strong">Buy Tickets</h5>
                                            <small class="text-thin text-transparent-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</small>
                                            </p>
                                        </div>

                                    </div>

                                </div>
                                <!-- /tile footer --

                            </section>
                            <!-- /tile --
                        </div>!-->
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
        <script>
            window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')

        </script>

        <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>
        <script src="assets/js/vendor/d3/d3.min.js"></script>
        <script src="assets/js/vendor/d3/d3.layout.min.js"></script>
        <script src="assets/js/vendor/rickshaw/rickshaw.min.js"></script>
        <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>
        <script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
        <script src="assets/js/vendor/daterangepicker/daterangepicker.js"></script>
        <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>
        <script src="assets/js/vendor/flot/jquery.flot.min.js"></script>
        <script src="assets/js/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
        <script src="assets/js/vendor/flot-spline/jquery.flot.spline.min.js"></script>
        <script src="assets/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>
        <script src="assets/js/vendor/raphael/raphael-min.js"></script>
        <script src="assets/js/vendor/morris/morris.min.js"></script>
        <script src="assets/js/vendor/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>
        <script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>
        <script src="assets/js/vendor/summernote/summernote.min.js"></script>
        <script src="assets/js/vendor/coolclock/coolclock.js"></script>
        <script src="assets/js/vendor/coolclock/excanvas.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')

        </script>
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



        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="assets/js/main.js"></script>
        <!--/ custom javascripts -->








        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            $(window).load(function() {

                //initialize basic datatable
                var table = $('#basic-usage').DataTable({
                    "ajax": 'assets/extras/datatables-basic.json',
                    "columns": [{
                            "data": "id"
                        },
                        {
                            "data": "firstName"
                        },
                        {
                            "data": "lastName"
                        }
                    ],
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': ["no-sort"]
                    }],
                    "dom": 'Rlfrtip'
                });

                $('#basic-usage tbody').on('click', 'tr', function() {
                    if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                    } else {
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
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': ["no-sort"]
                    }]
                });

                var nEditing = null;
                var nNew = false;

                $('#add-entry').click(function(e) {
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

                table2.on('click', '.delete', function(e) {
                    e.preventDefault();

                    if (confirm("Are you sure?") == false) {
                        return;
                    }

                    var nRow = $(this).parents('tr')[0];
                    oTable.row(nRow).remove().draw();
                    alert("Deleted!");
                });

                table2.on('click', '.cancel', function(e) {
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

                table2.on('click', '.edit', function(e) {
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
                    "columns": [{
                            "data": "id"
                        },
                        {
                            "data": "firstName"
                        },
                        {
                            "data": "lastName"
                        },
                        {
                            "data": "tel"
                        },
                        {
                            "data": "address"
                        },
                        {
                            "data": "city"
                        },
                        {
                            "data": "state"
                        },
                        {
                            "data": "zip"
                        }
                    ],
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': ["no-sort"]
                    }]
                });
                //*initialize responsive datatable

                //initialize responsive datatable
                function stateChange(iColumn, bVisible) {
                    console.log('The column', iColumn, ' has changed its status to', bVisible);
                }

                var table4 = $('#advanced-usage').DataTable({
                    "ajax": 'assets/extras/datatables-basic.json',
                    "columns": [{
                            "data": "id"
                        },
                        {
                            "data": "firstName"
                        },
                        {
                            "data": "lastName"
                        }
                    ],
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': ["no-sort"]
                    }]
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
        <script>
            $(window).load(function() {
                // Initialize Statistics chart
                var data = [{
                    data: [
                        [1, 15],
                        [2, 40],
                        [3, 35],
                        [4, 39],
                        [5, 42],
                        [6, 50],
                        [7, 46],
                        [8, 49],
                        [9, 59],
                        [10, 60],
                        [11, 58],
                        [12, 74]
                    ],
                    label: 'Unique Visits',
                    points: {
                        show: true,
                        radius: 4
                    },
                    splines: {
                        show: true,
                        tension: 0.45,
                        lineWidth: 4,
                        fill: 0
                    }
                }, {
                    data: [
                        [1, 50],
                        [2, 80],
                        [3, 90],
                        [4, 85],
                        [5, 99],
                        [6, 125],
                        [7, 114],
                        [8, 96],
                        [9, 130],
                        [10, 145],
                        [11, 139],
                        [12, 160]
                    ],
                    label: 'Page Views',
                    bars: {
                        show: true,
                        barWidth: 0.6,
                        lineWidth: 0,
                        fillColor: {
                            colors: [{
                                opacity: 0.3
                            }, {
                                opacity: 0.8
                            }]
                        }
                    }
                }];

                var options = {
                    colors: ['#e05d6f', '#61c8b8'],
                    series: {
                        shadowSize: 0
                    },
                    legend: {
                        backgroundOpacity: 0,
                        margin: -7,
                        position: 'ne',
                        noColumns: 2
                    },
                    xaxis: {
                        tickLength: 0,
                        font: {
                            color: '#fff'
                        },
                        position: 'bottom',
                        ticks: [
                            [1, 'JAN'],
                            [2, 'FEB'],
                            [3, 'MAR'],
                            [4, 'APR'],
                            [5, 'MAY'],
                            [6, 'JUN'],
                            [7, 'JUL'],
                            [8, 'AUG'],
                            [9, 'SEP'],
                            [10, 'OCT'],
                            [11, 'NOV'],
                            [12, 'DEC']
                        ]
                    },
                    yaxis: {
                        tickLength: 0,
                        font: {
                            color: '#fff'
                        }
                    },
                    grid: {
                        borderWidth: {
                            top: 0,
                            right: 0,
                            bottom: 1,
                            left: 1
                        },
                        borderColor: 'rgba(255,255,255,.3)',
                        margin: 0,
                        minBorderMargin: 0,
                        labelMargin: 20,
                        hoverable: true,
                        clickable: true,
                        mouseActiveRadius: 6
                    },
                    tooltip: true,
                    tooltipOpts: {
                        content: '%s: %y',
                        defaultTheme: false,
                        shifts: {
                            x: 0,
                            y: 20
                        }
                    }
                };

                var plot = $.plot($("#statistics-chart"), data, options);

                $(window).resize(function() {
                    // redraw the graph in the correctly sized div
                    plot.resize();
                    plot.setupGrid();
                    plot.draw();
                });
                // * Initialize Statistics chart

                //Initialize morris chart
                Morris.Donut({
                    element: 'browser-usage',
                    data: [{
                            label: 'Chrome',
                            value: 25,
                            color: '#00a3d8'
                        },
                        {
                            label: 'Safari',
                            value: 20,
                            color: '#2fbbe8'
                        },
                        {
                            label: 'Firefox',
                            value: 15,
                            color: '#72cae7'
                        },
                        {
                            label: 'Opera',
                            value: 5,
                            color: '#d9544f'
                        },
                        {
                            label: 'Internet Explorer',
                            value: 10,
                            color: '#ffc100'
                        },
                        {
                            label: 'Other',
                            value: 25,
                            color: '#1693A5'
                        }
                    ],
                    resize: true
                });
                //*Initialize morris chart


                // Initialize owl carousels
                $('#todo-carousel, #feed-carousel, #notes-carousel').owlCarousel({
                    autoPlay: 5000,
                    stopOnHover: true,
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    singleItem: true,
                    responsive: true
                });

                $('#appointments-carousel').owlCarousel({
                    autoPlay: 5000,
                    stopOnHover: true,
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    navigation: true,
                    navigationText: ['<i class=\'fa fa-chevron-left\'></i>', '<i class=\'fa fa-chevron-right\'></i>'],
                    singleItem: true
                });
                //* Initialize owl carousels


                // Initialize rickshaw chart
                var graph;

                var seriesData = [
                    [],
                    []
                ];
                var random = new Rickshaw.Fixtures.RandomData(50);

                for (var i = 0; i < 50; i++) {
                    random.addData(seriesData);
                }

                graph = new Rickshaw.Graph({
                    element: document.querySelector("#realtime-rickshaw"),
                    renderer: 'area',
                    height: 133,
                    series: [{
                        name: 'Series 1',
                        color: 'steelblue',
                        data: seriesData[0]
                    }, {
                        name: 'Series 2',
                        color: 'lightblue',
                        data: seriesData[1]
                    }]
                });

                var hoverDetail = new Rickshaw.Graph.HoverDetail({
                    graph: graph,
                });

                graph.render();

                setInterval(function() {
                    random.removeData(seriesData);
                    random.addData(seriesData);
                    graph.update();

                }, 1000);
                //* Initialize rickshaw chart

                //Initialize mini calendar datepicker
                $('#mini-calendar').datetimepicker({
                    inline: true
                });
                //*Initialize mini calendar datepicker


                //todo's
                $('.widget-todo .todo-list li .checkbox').on('change', function() {
                    var todo = $(this).parents('li');

                    if (todo.hasClass('completed')) {
                        todo.removeClass('completed');
                    } else {
                        todo.addClass('completed');
                    }
                });
                //* todo's


                //initialize datatable
                $('#project-progress').DataTable({
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': ["no-sort"]
                    }],
                });
                //*initialize datatable

                //load wysiwyg editor
                $('#summernote').summernote({
                    toolbar: [
                        //['style', ['style']], // no style button
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        //['insert', ['picture', 'link']], // no insert buttons
                        //['table', ['table']], // no table button
                        //['help', ['help']] //no help button
                    ],
                    height: 143 //set editable area's height
                });
                //*load wysiwyg editor
            });

        </script>
        <!--/ Page Specific Scripts -->






        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b, o, i, l, e, r) {
                b.GoogleAnalyticsObject = l;
                b[l] || (b[l] =
                    function() {
                        (b[l].q = b[l].q || []).push(arguments)
                    });
                b[l].l = +new Date;
                e = o.createElement(i);
                r = o.getElementsByTagName(i)[0];
                e.src = 'https://www.google-analytics.com/analytics.js';
                r.parentNode.insertBefore(e, r)
            }(window, document, 'script', 'ga'));
            ga('create', 'UA-XXXXX-X', 'auto');
            ga('send', 'pageview');

        </script>

    </body>

    </html>
