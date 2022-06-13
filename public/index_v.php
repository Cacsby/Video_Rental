<?php require_once("risorse/config.php"); ?>
<!DOCTYPE html>
<html lang="it">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Videonoleggio</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
<!-- Material Icon-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
<!--  Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Prompt|Ubuntu:400,700" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-md  bg-primary fixed-top" id ="navigazione">
    <a class="navbar-brand" href="#">Video e Video</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="material-icons">menu</i>
        </button>

        
            
              <a class="nav-link" href="#">Cacialli Matteo N. Matricola 0012040
                <span class="sr-only">(current)</span>
              </a>
            </li>
    </nav>
    <?php if(isset($_POST['login'])){

$matricola=$_POST['matricola'];
$password=$_POST['password'];   
$matricola=mysqli_real_escape_string($connessione, $matricola);
$password=mysqli_real_escape_string($connessione, $password);

$query=" SELECT * FROM impiegato WHERE matricola='$matricola'";
echo $query;

$RicercaLogin=mysqli_query($connessione,$query);
if(!$RicercaLogin){
    die( 'LOGIN FALLITO'.mysqli_error($connessione));
} 
while($row=mysqli_fetch_array($RicercaLogin)) {

   echo $id_matricola=$row['matricola'];
    echo $ps_password=$row['password'];
}

  if($matricola===$id_matricola && $password===$ps_password){

    header('Location:home.php');
  } else{
    header('Location:index_v.php');  
  }
}
  ?>
 
<!------------------------------------------------>
<div class="container my-5">
<h4 class="bg-warning text-center"></h4>
        <form class="form-horizontal" role="form" method="post" action="index_v.php">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Accesso responsabile/addetto negozio</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">    
                    <div class="form-group">
                    <label for="matricola">Matricola</label>
                        <label class="sr-only" for="matricola">Nome utente </label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            
                            <input type="text" name="matricola" class="form-control">

                        </div>
                        
                    </div>
                </div>
              
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="password">Password</label>
                        <label class="sr-only" for="password">Password</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="material-icons">verified_user</i></div>
                            <input type="password" name="password" class="form-control">
                            <hr>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        
                        </span>
                    </div>
                </div>
            </div>
           
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button typ="submit" name="login" class="btn btn-success btn-block">Login</button>
               
                </div>
            </div>
        </form>
        <h6>Numero Matricola: 1020 </h6>
        <h6>Password: 0000 </h6>
        <hr>

        
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        
                        </span>
                    </div>
                </div>
            </div>
           
            <div class="row" style="padding-top: 1rem">
               
               
                </div>
            </div>
        </form>
        
    </div>
</body>
</html>