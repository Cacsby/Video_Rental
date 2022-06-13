

<?php require_once("../risorse/config.php"); ?>
<?php  include(FRONT_END . DS . 'header.php'); ?>

  <body>

 
<?php 


if(isset($_POST['reso'])){

  $film=$_POST['film'];
  

$aumento=query("UPDATE copie SET n_copie=n_copie+1 WHERE id_copie=$film");

echo $aumento;
}
?>


  <body>
    <div class="container my-5">
      <div class="row">
      

    
    <div class="col-sm-6">

<h2> Film Restituito</h2>
<br>
    <form action="consegna.php" method="post">

    <div class="form-group">


    <div class="form-group">
    <label for="film"> Seleziona noleggio restituito:</label>
     <select id="select" name="film" class="form-control">
    <option value="" > Seleziona noleggio</option>
    <?php
     
 $ricercaImpiegato = query('SELECT * FROM noleggio
 INNER JOIN copie ON noleggio.copie_id_copie= copie.id_copie
 INNER JOIN film ON copie.film_id_film=film.id_film'); 

conferma($ricercaImpiegato);

while($row = fetch_array($ricercaImpiegato)){
  echo "<option value='{$row['id_noleggio']}' >Noleggio ID n. {$row['id_noleggio']} Titolo: {$row['titolo']}</option>";
}
?>
    </select> 
    </div> 

    <input type="submit" name="stampa" value="Stampa Ricevuta" class="btn btn-success" onclick="window.print();">
    <br>
    <br>

    <input type="submit" name="reso" value="Effettua Reso" class="btn btn-success">
    
</form>
<hr>


</div>

</div> </div>
    </div>
  </div>

  <?php include(FRONT_END.DS.'footer.php');
?>