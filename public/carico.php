

<?php require_once("../risorse/config.php"); ?>
<?php  include(FRONT_END . DS . 'header.php'); ?>

  <body>

    

<?php 
if(isset($_POST['scarico'])){

  $film=$_POST['film'];
  $data_scarico=$_POST['data_scarico'];
  $data_carico=$_POST['data_carico'];
  $n_copie=$_POST['n_copie'];
  $impiegato=$_POST['impiegato'];
  $fornitore=$_POST['fornitore'];
  
  if(!empty($film) && !empty($data_scarico) && !empty($data_carico) && !empty($n_copie) 
  && !empty($impiegato) && !empty($fornitore) ){
 
  $scarico="INSERT INTO copie (data_carico, data_scarico, film_id_film, impiegato_id_impiegato, fornitore_id_fornitore, n_copie)
   VALUES('{$data_carico}','{$data_scarico}','{$film}','{$impiegato}','{$fornitore}','{$n_copie}')";
   
$creaScarico= query($scarico);

 if($creaScarico){

  echo ("Ordine di scarico avvenuto correttamente");

 }else{
   echo ("Compilare tutti i campi");

 }}}
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

<h2> Scarica un nuovo Film </h2>
<br>
    <form action="carico.php" method="post">

     <div class="form-group">
    <label for="film">  Film da scaricare:</label>
     <select id="select" name="film" class="form-control">
    <option value="" > Seleziona Film</option>
    <?php
     
 $ricercaFilm = query('SELECT * FROM film '); 

conferma($ricercaFilm);

while($row = fetch_array($ricercaFilm)){
  echo "<option value='{$row['id_film']}' >{$row['titolo']}</option>";
}
?>
    </select> 
    </div> 

    <div class="form-group">
    <label for="data_scarico">Data di scarico</label>
    <input type="date" name="data_scarico" class="form-control">
    </div>
    <div class="form-group">
    <label for="data_carico">Data di restituzione</label>
    <input type="date" name="data_carico" class="form-control">
    </div>

    <div class="form-group">
    <label for="n_copie">Numero di copie richieste</label>
    <input type="number" name="n_copie" class="form-control">
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

    <div class="form-group">
    <label for="fornitore"> Presso fornitore:</label>
     <select id="select" name="fornitore" class="form-control">
    <option value="" > Seleziona fornitore</option>
    <?php
     
 $ricercaFornitore = query('SELECT * FROM fornitore '); 

conferma($ricercaFornitore);

while($row = fetch_array($ricercaFornitore)){
  echo "<option value='{$row['id_fornitore']}' >{$row['nome']} </option>";
}
?>
    </select> 
    </div> 
   
    <br>

    <input type="submit" name="scarico" value="Ordina Scarico" class="btn btn-success">
    
</form>
<hr>
<h2> Restituzione Film scaduti </h2> <br>

<form action="carico.php" method="post">

     <div class="form-group">
    <label for="film">  Seleziona Film:</label>
     <select id="select" name="film" class="form-control">
    <option value="" > Seleziona Film</option>
    <?php
     
 $ricercaCopie = query('SELECT * FROM copie INNER JOIN film ON copie.film_id_film= film.id_film'); 

conferma($ricercaCopie);

while($row = fetch_array($ricercaCopie)){
  echo "<option value='{$row['id_copie']}' >{$row['titolo']}</option>";
}
?>
    </select> 
    </div> 

    <br>
<input type="submit" name="carico" value="Ordina restituzione" class="btn btn-success">

    </div>
    </div>
  </div>

  <?php include(FRONT_END.DS.'footer.php');
?>