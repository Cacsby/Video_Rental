<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Shop Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/custom-admin.css" rel="stylesheet">
<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700i" rel="stylesheet">
    <!--  material icon-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">

    <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
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
        <nav class="navbar navbar-dark bg-inverse navbar-fixed-top">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button class="navbar-toggler hidden-md-up pull-md-right" type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <i class="material-icons">menu</i>
                </button>
                <a class="navbar-brand" href="index.php">My Shop Admin</a>
                <a class="navbar-brand" href="../index.php">Visita il sito</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-nav top-nav navbar-right pull-xs-right">
                
                <li class="dropdown nav-item">
                    <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons ">account_circle</i> 
                   <?php 
                   if(isset($_SESSION['username'])){
echo 'Ciao, ' . $_SESSION['username'];
                   }else{
                       echo "utente non riconosciuto";
                   }
                   ?>
                   
                    
                    
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                            <a href="logout.php"><i class="material-icons">power_settings_new</i> Log Out</a>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("sidebar.php"); ?>
     
            <!-- /.navbar-collapse -->
        </nav>