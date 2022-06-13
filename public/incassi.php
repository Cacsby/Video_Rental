

<?php require_once("../risorse/config.php"); ?>
<?php  include(FRONT_END . DS . 'header.php'); ?>

  <body>


  <body>
    <div class="container my-5">
      <div class="row">
      

    
    <div class="col-sm-6">

<h2> Incassi giornalieri per addetto</h2>
<br>
    <form action="incassi.php" method="post">

    <div class="form-group">

    <div class="form-group">
    <label for="data_controllo">Data controllo</label>
    <input type="date" name="data_controllo" class="form-control">
    </div>
  
    <div class="form-group">
    <label for="impiegato"> Seleziona impiegato</label>
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

    <input type="submit" name="controllo_addetti" value="Incassi addetto" class="btn btn-success">
    <br><br>
    <?php 


if(isset($_POST['controllo_addetti'])){

  $data_restituzione=$_POST['data_controllo'];
  $impiegato=$_POST['impiegato'];

  $controllo="SELECT SUM(costo) AS incassoGiornaliero FROM `costo` 
  WHERE impiegato_id_impiegato=$impiegato AND data_pagamento LIKE '$data_restituzione%'";
   
$creaControllo= query($controllo);

 if($creaControllo){

  while($row = fetch_array($creaControllo)){

echo "<label for='impiegato'> Incasso giornaliero in euro:</label>";
echo "<input type=number value='{$row['incassoGiornaliero']}''> </input>";}
 }else{
   echo ("Compilare tutti i campi");
  

 }}
?>
    
</form>
<hr>

<h2> Incassi giornalieri per punto vendita</h2>
<br>
    <form action="incassi.php" method="post">

    <div class="form-group">

    <div class="form-group">
    <label for="data_controllo">Data controllo</label>
    <input type="date" name="data_controllo" class="form-control">
    </div>
  
    <div class="form-group">
    <label for="punto_vendita"> Seleziona punto vendita</label>
     <select id="select" name="punto_vendita" class="form-control">
    <option value="" > Seleziona punto vendita</option>
    <?php
     
 $ricercaPuntoVendita = query('SELECT * FROM punto_vendita '); 

conferma($ricercaPuntoVendita);

while($row = fetch_array($ricercaPuntoVendita)){
  echo "<option value='{$row['id_punto_vendita']}' >{$row['nome']}</option>";
}
?>
    </select> 
    </div> 

   
    <br>

    <input type="submit" name="controllo_punto_vendita" value="Incassi punto vendita" class="btn btn-success">
    <br><br>
    <?php 


if(isset($_POST['controllo_punto_vendita'])){

  $data_restituzione=$_POST['data_controllo'];
  $punto_vendita=$_POST['punto_vendita'];

  $controllo="SELECT SUM(costo) AS incassoGiornaliero FROM `costo` 
  INNER JOIN `impiegato` ON costo.impiegato_id_impiegato=impiegato.id_impiegato
  WHERE punto_vendita_id_punto_vendita=$punto_vendita AND data_pagamento LIKE '$data_restituzione%'";
  
   
$creaControllo= query($controllo);

 if($creaControllo){

  while($row = fetch_array($creaControllo)){


echo "<label for='impiegato'> Incasso giornaliero in euro</label>";
echo "<input type=number value='{$row['incassoGiornaliero']}''> </input>";}
 }else{
   echo ("Compilare tutti i campi");
  

 }}
?>
    
</form>
<hr>


</div> </div></div>
    </div>
  </div>

  <?php include(FRONT_END.DS.'footer.php');
?>