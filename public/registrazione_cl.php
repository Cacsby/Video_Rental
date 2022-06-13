

<?php require_once("../risorse/config.php"); ?>
<<?php  include(FRONT_END . DS . 'header.php'); ?>

 

    

<?php 



if(isset($_POST['registra_cl'])){

  $nome=$_POST['nome'];
  $cognome=$_POST['cognome'];
  $indirizzo=$_POST['indirizzo'];
  $telefono=$_POST['telefono'];
  $CF=$_POST['CF'];
  $sconto=$_POST['sconto'];
  $data_nascita=$_POST['data_nascita'];
  $email=$_POST['email'];
  $deliberatoria=$_POST['deliberatoria'];
  if(!empty($nome) && !empty($cognome) && !empty($indirizzo) && !empty($telefono) 
  && !empty($CF) && !empty($sconto) && !empty($data_nascita) && !empty($email)
  && !empty($deliberatoria)){
 
  $cliente="INSERT INTO clienti (nome, cognome, indirizzo, telefono, CF, email, data_nascita, sconto_id_sconto, n_liberatoria)
   VALUES('{$nome}','{$cognome}','{$indirizzo}','{$telefono}','{$CF}','{$email}','{$data_nascita}','{$sconto}','{$deliberatoria}')";
 

 echo $cliente;
$creaCliente= query($cliente);

 if($creaCliente){

  echo ("Registrazione avvenuta correttamente");

 }else{
   echo ("Compilare tutti i campi");
 


 }}}


?>
  <body>
    <div class="container my-5">
      <div class="row">
      

    
    <div class="col-sm-6">

<h2> Registra nuovo cliente </h2>
<br>
    <form action="registrazione_cl.php" method="post">

    <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" name="nome" class="form-control">
    </div>

    <div class="form-group">
    <label for="cognome">Cognome</label>
    <input type="text" name="cognome" class="form-control">
    </div>

    <div class="form-group">
    <label for="data_nascita">Data di nascita</label>
    <input type="date" name="data_nascita" class="form-control">
    </div>

    <div class="form-group">
    <label for="CF">Codice Fiscale</label>
    <input type="text" name="CF" class="form-control" maxlength="16">
    </div>

    <div class="form-group">
    <label for="telefono">Numero telefono</label>
    <input type="number" name="telefono" class="form-control">
    </div>


    <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control">
    </div>

    <div class="form-group">
    <label for="indirizzo">Indirizzo</label>
    <input type="text" name="indirizzo" class="form-control">
    </div>
 
    <div class="form-group">
    <label for="sconto"> Tipologia sconto</label>
     <select id="select" name="sconto" class="form-control">
    <option value="" > Seleziona tipologia</option>
    <?php
     
 $ricercaSconto = query('SELECT * FROM sconto '); 

conferma($ricercaSconto);

while($row = fetch_array($ricercaSconto)){
  echo "<option value='{$row['id_sconto']}' >{$row['nome']}</option>";
}
?>
    </select> 
    </div> 
   
    <div class="form-group">
    <label for="deliberatoria">Numero deliberatoria</label>
    <input type="number" name="deliberatoria" class="form-control">
    </div>

    <input type="checkbox" name="indirizzo" >
    <label for="indirizzo">Liberatoria per la legge sulla privacy</label>
    <br>
    <br>

  


    <input type="submit" name="registra_cl" value="Registra" class="btn btn-success">

    
</form>
    </div>
    </div>
  </div>
  </body>

  <?php include(FRONT_END.DS.'footer.php');
?>