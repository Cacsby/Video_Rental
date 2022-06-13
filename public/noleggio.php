

<?php require_once("../risorse/config.php"); ?>
<?php  include(FRONT_END . DS . 'header.php'); ?>

  <body>

  <?php 


if(isset($_POST['transazione'])){

  
  $data_restituzione=$_POST['data_restituzione'];
  $data_noleggio=$_POST['data_noleggio'];
  $impiegato=$_POST['impiegato'];

  function dateDiff($data_restituzione,$data_noleggio,$format)
  {
  $datetime1 = new DateTime($data_restituzione);
  $datetime2 = new DateTime($data_noleggio);
  $interval = $datetime1->diff($datetime2);
  return $interval->format($format);
  }
  //la data attuale
  $date1="2014-10-23";
  $date2="2014-11-15";
  $format="%a";
  echo dateDiff($data_restituzione,$data_noleggio,$format);

  $costo=dateDiff($data_restituzione,$data_noleggio,$format)*4;


 
 
  $transazione="INSERT INTO costo (data_pagamento, costo, impiegato_id_impiegato)
   VALUES('{$data_restituzione}','{$costo}','{$impiegato}')";
   echo $transazione;
   
$creaTransazione= query($transazione);

 if($creaTransazione){

  echo ("Transazione registrata correttamente");

 }else{
   echo ("Compilare tutti i campi");

 }}
?>



<?php 


if(isset($_POST['noleggio'])){


 

  $film=$_POST['film'];
  $data_restituzione=$_POST['data_restituzione'];
  $data_noleggio=$_POST['data_noleggio'];
  $cliente=$_POST['cliente'];
  $impiegato=$_POST['impiegato'];
  $costo=$_POST['costo'];


 
 
  $noleggio="INSERT INTO noleggio (data_noleggio, data_restituzione, clienti_id_clienti,
   copie_id_copie, impiegato_id_impiegato, costo_id_costo)
   VALUES('{$data_noleggio}','{$data_restituzione}','{$cliente}','{$film}','{$impiegato}','{$costo}')";

$creaNoleggio= query($noleggio);

 if($creaNoleggio){

  echo ("Noleggio avvenuto correttamente");

 }else{
   echo ("Compilare tutti i campi");

 }

$diminuzione=query("UPDATE copie SET n_copie=n_copie-1 WHERE id_copie=$film");

}
?>

<?php 
if(isset($_POST['carico'])){

  $film=$_POST['film'];
  $carico="DELETE FROM copie WHERE id_copie=$film";
  
  $creaCarico= query($carico);

  if($creaCarico){
 
   echo ("Restituzione avvenuta correttamente");
 
  }else{
    echo ("Compilare tutti i campi");
 
  }}
 ?>

  <body>
    <div class="container my-5">
      <div class="row">
      

    
    <div class="col-sm-6">

<h2> Registra transazione</h2>
<br>
    <form action="noleggio.php" method="post">

    <div class="form-group">

    <div class="form-group">
    <label for="data_scarico">Data di noleggio</label>
    <input type="date" name="data_noleggio" class="form-control">
    </div>
    <div class="form-group">
    <label for="data_restituzione">Data di restituzione</label>
    <input type="date" name="data_restituzione" class="form-control">
    </div>

    <div class="form-group">
    <label for="impiegato"> Eseguito da:</label>
     <select id="select" name="impiegato" class="form-control">
    <option value="" > Seleziona impiegato</option>
    <?php
     
 $ricercaImpiegato = query('SELECT * FROM impiegato '); 

conferma($ricercaImpiegato);

while($row = fetch_array($ricercaImpiegato)){
  echo "<option value='{$row['id_impiegato']}' >{$row['nome']} {$row['cognome']} Matricola: {$row['matricola']}</option>";
}
?>
    </select> 
    </div> 

   
    <br>

    <input type="submit" name="transazione" value="Effettua Noleggio" class="btn btn-success">
    
</form>
<hr>

<h2> Effettua noleggio</h2>
<br>
    <form action="noleggio.php" method="post">

    <div class="form-group">
    <label for="film">  Seleziona copia del Film:</label>
     <select id="select" name="film" class="form-control">
    <option value="" > Seleziona copia del Film</option>
    <?php
     
 $ricercaCopie = query('SELECT * FROM copie INNER JOIN film ON copie.film_id_film= film.id_film'); 

conferma($ricercaCopie);

while($row = fetch_array($ricercaCopie)){
  echo "<option value='{$row['id_copie']}' >{$row['titolo']}. Copie rimanenti: {$row['n_copie']}</option>";
}
?>
    </select> 
    </div> 


    <div class="form-group">
    <label for="data_scarico">Data di noleggio</label>
    <input type="date" name="data_noleggio" class="form-control">
    </div>
    <div class="form-group">
    <label for="data_restituzione">Data di restituzione</label>
    <input type="date" name="data_restituzione" class="form-control">
    </div>

    <div class="form-group">
    <label for="costo"> Ultima Transazione Registrata n. ID:</label>
     <select id="select" name="costo" class="form-control">
    <option value="" > Seleziona ID</option>
    <?php
     
 $ricercaImpiegato = query('SELECT id_costo, costo, MAX(id_costo) FROM costo'); 

conferma($ricercaImpiegato);

while($row = fetch_array($ricercaImpiegato)){
  echo "<option value='{$row['id_costo']}' >{$row['MAX(id_costo)']} </option>";
}
?>
    </select> 
    </div> 


    <div class="form-group">
    <label for="cliente"> Seleziona Cliente:</label>
     <select id="select" name="cliente" class="form-control">
    <option value="" > Seleziona Cliente</option>
    <?php
     
 $ricercaCliente = query('SELECT * FROM clienti'); 

conferma($ricercaCliente);

while($row = fetch_array($ricercaCliente)){
  echo "<option value='{$row['id_clienti']}' >{$row['nome']} {$row['cognome']} CF: {$row['CF']}</option>";
}
?>
    </select> 
    </div> 

 
    <div class="form-group">
    <label for="impiegato"> Eseguito da:</label>
     <select id="select" name="impiegato" class="form-control">
    <option value="" > Seleziona impiegato</option>
    <?php
     
 $ricercaImpiegato = query('SELECT * FROM impiegato '); 

conferma($ricercaImpiegato);

while($row = fetch_array($ricercaImpiegato)){
  echo "<option value='{$row['id_impiegato']}' >{$row['nome']} {$row['cognome']} Matricola: {$row['matricola']}</option>";
}
?>
    </select> 
    </div> 

    <input type="submit" name="stampa" value="Stampa Ricevuta" class="btn btn-success" onclick="window.print();">
    <br><br>

    <input type="submit" name="noleggio" value="Effettua Noleggio" class="btn btn-success">
    
</form>
<hr>


</div> </div>
    </div>
  </div>

  <?php include(FRONT_END.DS.'footer.php');
?>