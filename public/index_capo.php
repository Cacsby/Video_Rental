<?php require_once("../risorse/config.php"); ?>



<!DOCTYPE html>
<?php  include(FRONT_END . DS . 'header.php'); ?>
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
    $ruolo_utente=$row['ruolo'];
}

  if($matricola===$id_matricola && $password===$ps_password){

    

    header('Location:incassi.php');
  } else{
    header('Location:index_capo.php');  
  }
}
  ?>
 
<!------------------------------------------------>
<div class="container my-5">
<h4 class="bg-warning text-center"></h4>
        <form class="form-horizontal" role="form" method="post" action="index_capo.php">
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
        <h6>Email: 2000 </h6>
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