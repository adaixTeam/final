<?php
//including the database connection file
/*include_once("config.php");*/
session_start(); if (!isset($_SESSION['username'])) { $_SESSION['msg'] = "You must log in first"; header('location: login.php'); } if (isset($_GET['logout'])) { session_destroy(); unset($_SESSION['username']); header("location: login.php"); }

$databaseHost = 'localhost';
$databaseName = 'location';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM contrats2 ORDER BY idcont DESC"); // using mysqli_query instead $zak = mysqli_query($mysqli, "SELECT * FROM clients2 where st='0' ORDER BY idc DESC"); // using mysqli_query instead $zak1 = mysqli_query($mysqli, "SELECT * FROM users where st='0' ORDER BY id DESC");

 // using mysqli_query instead
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
        <!--/ stylesheets -->
        <link rel="stylesheet" href="assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">

        <!-- project main css files -->
        <link rel="stylesheet" href="assets/css/main.css">
        <!--/ stylesheets -->



        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
        <script src="assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <!--/ modernizr -->



        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
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
                                            <li><a href="index.php"><i class="fa fa-home"></i> <span>Accueil</span></a></li>
                                            <!--<li>
                                                <a role="button" tabindex="0"><i class="fa fa-envelope-o"></i> <span>Mail</span> <span class="badge bg-lightred">6</span></a>
                                                <ul>
                                                    <li><a href="mail-inbox.html"><i class="fa fa-caret-right"></i> Inbox</a></li>
                                                    <li><a href="mail-compose.html"><i class="fa fa-caret-right"></i> Compose Mail</a></li>
                                                    <li><a href="mail-single.html"><i class="fa fa-caret-right"></i> Single Mail</a></li>
                                                </ul>!-->
                                            </li>
                                            <!--li><a href="calendar.html"><i class="fa fa-calendar-o"></i> <span>Calendar</span></a></li!-->
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
                                                    <li><a href="tables-reservation.php"><i class="fa fa-edit"></i>Les Réservations</a></li>
                                                    <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->

                                            </li>
                                            <li>

                                                    <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                                    <li class="active"><a href="tables-contrats.php"><i class="fa fa-folder-open"></i>Les Contrats</a></li>
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
                                                <li><a href="tables-employe.php"><i class="fa fa-user"></i>Employé</a></li>
                                                <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>
                                            <!--<li>

                                                    <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!--
                                                    <li><a href="tables-datatables.php"><i class="fa fa-clipboard"></i>Les Utilisateurs</a></li>
                                                    <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!--

                                            </li>!-->
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
                                                    <li><a href="tables-sortir_caisse.php"><i class="fa fa-share-square"></i>Les sorties</a></li>
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
                                            <li>
                                              <!--<li><a href="tables-bootstrap.html"><i class="fa fa-caret-right"></i> Bootstrap Tables</a></li>!-->
                                              <li><a href="http://eprocess.mtpnet.gov.ma/InfractionWeb/web/#/login"><i class="fa fa-car"></i>Gestion d'infraction</a></li>
                                              <!--<li><a href="tables-footable.html"><i class="fa fa-caret-right"></i> FooTable</a></li>!-->
                                            </li>
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

                        <h2>Black Liste</h2>

                        <div class="page-bar">

                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.php"><i class="fa fa-home"></i> Martech</a>
                                </li>
                                <li>
                                    <a href="#">Tables</a>
                                </li>
                                <li>
                                    <a href="blackliste.html">Déclaration</a>
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
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font">Crée une<strong> Contrats</strong></h1>
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
                                <div id="page-wrapper">
                                  <div class="row">
                                      <div class="col-lg-10">

                                          <!-- Large modal -->

                                          <section class="tile">
                                              <div class="tile-body" style="padding-left: 27%; padding-top: 5%;">
                                                <form class="form-horizontal" action="addcontr.php" method="post" name="form1">
                                                    <fieldset>

                                                        <!-- Form Name -->
                                                        <legend>
                                                            <h2>
                                                                <font color="#293380">
                                                                    <center>Ajouter une nouvelle Contrts</center>
                                                                </font>
                                                            </h2>
                                                        </legend>
                                                        <h3>
                                                            <center>
                                                                <font color="#2BB3A0">Voiture</font>
                                                            </center>
                                                        </h3>

                                                        <!-- File Button -->

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="matricule">Matricule</label>
                                                            <div class="col-md-4">
                                                                <select name="matricule" class="form-control" required id="matricule">
                                                                  <option value="" </option>
                                                                    <?php
                                                                    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                                                                    while($res = mysqli_fetch_array($zak1)) {

                                                                      echo "<option value=".$res['matricule'].">".$res['matricule']." </option>";
                                                                    }
                                                                    ?>
                                                                  </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Marque </label>
                                                            <div class="col-md-4">
                                                              <select class="form-control" name="marque" id="marque" onchange="change_state()">
                                                              <option value=""></option>
                                                          </select>
                                                                <!--input name="marque" type="text" placeholder="" class="form-control input-md" required-->
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Modél </label>
                                                            <div class="col-md-4">
                                                              <select class="form-control" name="model" id="model" >
                                                              <option value=""></option>
                                                          </select>
                                                                <!--input name="model" type="text" placeholder="" class="form-control input-md" required-->
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Carburant  </label>
                                                            <div class="col-md-4">
                                                              <select class="form-control" name="carburant" id="carburant" >
                                                              <option value=""></option>
                                                          </select>
                                                                <!--input name="carburant" type="tel" placeholder="" class="form-control input-md" required-->
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <h3>
                                                            <center>
                                                                <font color="#2BB3A0">Informations sur le Locataire</font>
                                                            </center>
                                                        </h3>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="cin">Identité</label>
                                                            <div class="col-md-4" id='state'>
                                                                <select name="cin" class="form-control" id="cin">
                                                                  <option value="">Select CIN</option>
                                                                  <?php
                                                            //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                                                              while($res = mysqli_fetch_array($zak)) {
                                                                  echo "<option value=".$res['cin'].">".$res['cin']." </option>\n";
                                                                }
                                                                ?>
                                                                        </select>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Nom et Prénom</label>
                                                            <div class="col-md-4">
                                                                <select class="form-control" name="nom" id="nom">
                                                                <option value=""></option>
                                                            </select>
                                                                <!-- <input id="nom" name="nom" type="text" placeholder="" class="form-control input-md" required> -->
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Adresse </label>
                                                            <div class="col-md-4">
                                                                <select class="form-control" name="adresse" id="adresse">
                                                                  <option value=""></option>
                                                                </select>
                                                                <!--input id="adresse" name="adresse" type="text" placeholder="" class="form-control input-md" required-->
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Téléphone  </label>
                                                            <div class="col-md-4">
                                                                        <select class="form-control" name="telephone" id="telephone">
                                                                          <option value=""></option>
                                                                        </select>
                                                                <!--input name="telephone" type="tel" placeholder="" class="form-control input-md" required-->
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">N° Permi</label>
                                                            <div class="col-md-4">
                                                              <select class="form-control" name="permi" id="permi">
                                                  <option value=""></option>
                                              </select>
                                                                <!--input name="permi" type="text" placeholder="" class="form-control input-md" required-->
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Délivré le </label>
                                                            <div class="col-md-4">
                                                              <select class="form-control" name="delivre" id="delivre">
                                                  <option value=""></option>
                                              </select>
                                                                <!--input name="delivre" type="date" placeholder="" class="form-control input-md" required-->
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Ville</label>
                                                            <div class="col-md-4">
                                                              <select class="form-control" name="ville" id="ville">
                                                  <option value=""></option>
                                              </select>
                                                                <!--input name="ville" type="text" placeholder="" class="form-control input-md" required-->
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
                                                                <h3>
                                                                    <center>
                                                                        <font color="#2BB3A0">Conducteur Supplémentaire</font>
                                                                    </center>
                                                                </h3>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="cin">Identité</label>
                                                                    <div class="col-md-4">
                                                                        <input name="cinn" type="text" placeholder="" class="form-control input-md" value="null">
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">Nom et Prénom</label>
                                                                    <div class="col-md-4">
                                                                        <input name="nomm" type="text" placeholder="" class="form-control input-md" value="null">
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">Adresse </label>
                                                                    <div class="col-md-4">
                                                                        <input name="adressee" type="text" placeholder="" class="form-control input-md" value="null">
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">Téléphone  </label>
                                                                    <div class="col-md-4">
                                                                        <input name="telephonee" type="tel" placeholder="" class="form-control input-md" value="null">
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">N° Permi</label>
                                                                    <div class="col-md-4">
                                                                        <input name="permii" type="text" placeholder="" class="form-control input-md" value="null">
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">Délivré le </label>
                                                                    <div class="col-md-4">
                                                                        <input name="delivree" type="date" placeholder="" class="form-control input-md" value="null">
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label" for="textinput">Ville</label>
                                                                    <div class="col-md-4">
                                                                        <input name="villee" type="text" placeholder="" class="form-control input-md" value="null">
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Form Name -->

                                                        <h3>
                                                            <center>
                                                                <font color="#2BB3A0">Info du Contrats</font>
                                                            </center>
                                                        </h3>

                                                        <!-- File Button -->

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="matricule">Date de Prise en charge</label>
                                                            <div class="col-md-4">
                                                                <input name="datedep" type="date" placeholder="" class="form-control input-md" required>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Durée</label>
                                                            <div class="col-md-4">
                                                                <input name="duree" type="number" placeholder="" class="form-control input-md" required>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Date de Restitution </label>
                                                            <div class="col-md-4">
                                                                <input name="dateret" type="date" placeholder="" class="form-control input-md" required>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Heure de Restitution </label>
                                                            <div class="col-md-4">
                                                                <input name="heure" type="time" placeholder="" class="form-control input-md" required>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>

                                                        <h3>
                                                            <center>
                                                                <font color="#2BB3A0">Facture</font>
                                                            </center>
                                                        </h3>

                                                        <!-- File Button -->
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="mode">Mode de Réglement</label>
                                                            <div class="col-md-4">
                                                                <select name="mode" class="form-control" required>
                                                                  <option value="" </option>
                                                                    <option value="Cheque" >Chèque</option>
                                                                    <option value="Virement" >Essence</option>
                                                                    <option value="Espece" >Electrique</option>
                                                                  </select>

                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="matricule">Total</label>
                                                            <div class="col-md-4">
                                                                <input name="total" type="number" placeholder="" class="form-control input-md" required>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Avance</label>
                                                            <div class="col-md-4">
                                                                <input name="avance" type="number" placeholder="" class="form-control input-md" required>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <label class="col-md-4 control-label" for="textinput">Rest</label>
                                                        <div class="col-md-4">
                                                            <input name="rest" type="number" placeholder="" class="form-control input-md" required>
                                                            <span class="help-block"></span>
                                                        </div>
                                            </div>
                                            </fieldset>
                                            <div class="modal-footer">
                                                <a href="tables-contrats.php"> <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button> </a>
                                                <button type="submit" class="btn btn-primary" name="Submit">Enregistrer</button>
                                            </div>

                                            </form>


                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                  </section>



                          </section>



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

        <script type="text/javascript">
            $(document).ready(function() {
                $('#cin').change(function() {
                    var cin = $(this).val();
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("GET", "getdata.php?cin=" + cin, false);
                    xmlhttp.send(null);
                    /*alert(xmlhttp.responseText);*/
                    document.getElementById("nom").innerHTML = xmlhttp.responseText;
                });
            });

            function change_state(){
                alert('hello');
            }

        </script>
<script type="text/javascript">
            $(document).ready(function() {
                $('#cin').change(function() {
                    var cin = $(this).val();
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("GET", "getdata1.php?cin=" + cin, false);
                    xmlhttp.send(null);
                    /*alert(xmlhttp.responseText);*/
                    document.getElementById("adresse").innerHTML = xmlhttp.responseText;
                });
            });

            function change_state(){
                alert('hello');
            }

        </script>
<script type="text/javascript">
            $(document).ready(function() {
                $('#cin').change(function() {
                    var cin = $(this).val();
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("GET", "getdata2.php?cin=" + cin, false);
                    xmlhttp.send(null);
                    /*alert(xmlhttp.responseText);*/
                    document.getElementById("telephone").innerHTML = xmlhttp.responseText;
                });
            });

            function change_state(){
                alert('hello');
            }

        </script>
        <script type="text/javascript">
                        $(document).ready(function() {
                            $('#cin').change(function() {
                                var cin = $(this).val();
                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.open("GET", "getdata3.php?cin=" + cin, false);
                                xmlhttp.send(null);
                                /*alert(xmlhttp.responseText);*/
                                document.getElementById("permi").innerHTML = xmlhttp.responseText;
                            });
                        });

                        function change_state(){
                            alert('hello');
                        }

                    </script>
                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#cin').change(function() {
                                            var cin = $(this).val();
                                            var xmlhttp = new XMLHttpRequest();
                                            xmlhttp.open("GET", "getdata4.php?cin=" + cin, false);
                                            xmlhttp.send(null);
                                            /*alert(xmlhttp.responseText);*/
                                            document.getElementById("delivre").innerHTML = xmlhttp.responseText;
                                        });
                                    });

                                    function change_state(){
                                        alert('hello');
                                    }

                                </script>
                                <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $('#cin').change(function() {
                                                        var cin = $(this).val();
                                                        var xmlhttp = new XMLHttpRequest();
                                                        xmlhttp.open("GET", "getdata5.php?cin=" + cin, false);
                                                        xmlhttp.send(null);
                                                        /*alert(xmlhttp.responseText);*/
                                                        document.getElementById("ville").innerHTML = xmlhttp.responseText;
                                                    });
                                                });

                                                function change_state(){
                                                    alert('hello');
                                                }

                                            </script>
                                              <!-- rechargemment du voiture-->
                                            <script type="text/javascript">
                                                            $(document).ready(function() {
                                                                $('#matricule').change(function() {
                                                                    var matricule = $(this).val();
                                                                    var xmlhttp = new XMLHttpRequest();
                                                                    xmlhttp.open("GET", "getdatav.php?matricule=" + matricule, false);
                                                                    xmlhttp.send(null);
                                                                    /*alert(xmlhttp.responseText);*/
                                                                    document.getElementById("marque").innerHTML = xmlhttp.responseText;
                                                                });
                                                            });

                                                            function change_state(){
                                                                alert('hello');
                                                            }

                                                        </script>
                                                        <script type="text/javascript">
                                                                        $(document).ready(function() {
                                                                            $('#matricule').change(function() {
                                                                                var matricule = $(this).val();
                                                                                var xmlhttp = new XMLHttpRequest();
                                                                                xmlhttp.open("GET", "getdatav1.php?matricule=" + matricule, false);
                                                                                xmlhttp.send(null);
                                                                                /*alert(xmlhttp.responseText);*/
                                                                                document.getElementById("model").innerHTML = xmlhttp.responseText;
                                                                            });
                                                                        });

                                                                        function change_state(){
                                                                            alert('hello');
                                                                        }

                                                                    </script>
                                                                    <script type="text/javascript">
                                                                                    $(document).ready(function() {
                                                                                        $('#matricule').change(function() {
                                                                                            var matricule = $(this).val();
                                                                                            var xmlhttp = new XMLHttpRequest();
                                                                                            xmlhttp.open("GET", "getdatav2.php?matricule=" + matricule, false);
                                                                                            xmlhttp.send(null);
                                                                                            /*alert(xmlhttp.responseText);*/
                                                                                            document.getElementById("carburant").innerHTML = xmlhttp.responseText;
                                                                                        });
                                                                                    });

                                                                                    function change_state(){
                                                                                        alert('hello');
                                                                                    }

                                                                                </script>
                                                                                <div id="txtHint"><b>Person info will be listed here.</b></div>


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
