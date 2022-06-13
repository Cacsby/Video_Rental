
<?php

//FUNZIONI  DI UTILITA' GENERALE

//stabilisci un percorso per i tuoi uploads
$cartellaImg = "immagini";

//crea una funzione per le operazioni CRUD sul DB
function query($sql){
global $connessione;

return mysqli_query($connessione , $sql);

}

//crea una funzione per la gestione degli errori di connessione
function conferma($risultato){
    global $connessione;
    if(!$risultato){
        die('Richiesta fallita' . mysqli_error($connessione));
        }
}

//crea una funzione per ciclare l'array e ricavare dati dal DB
function fetch_array($risultato){
    return mysqli_fetch_array($risultato);
}

//crea una funzione per la gestione dei messaggi
function creaAvviso($msg){
if(!empty($msg)){
  $_SESSION['messaggio'] = $msg;
}else{
  $msg = " ";
}
}

//crea una funzione per  mostrare un messaggio all'interno di una pagina
function mostraAvviso(){
if(isset($_SESSION['messaggio'])){
echo $_SESSION['messaggio'];
unset ($_SESSION['messaggio']);
}
}

//crea una funzione per ricavare e mostare il risultato dell'ultima sessione avviata
function idUltimo(){
global $connessione;
  return mysqli_insert_id($connessione);
}


//crea una funzione per gestire il percorso della cartella delle immagini
function mostraImg($imgProdotto){
  global $cartellaImg;
 return $cartellaImg . DS . $imgProdotto;
}


//FUNZIONI DEL FRONTEND

//crea una funzione per mostrare i prodotti nelll'home del negozio (pagina index.php)
function mostraProdotti(){
$ricercaProdotti = query('SELECT * FROM film ');

conferma($ricercaProdotti);

while ($row = fetch_array($ricercaProdotti)){
    //echo $row['nome_prodotto'];

    $prodotti = <<<STRINGA_PDT

    <div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
    
      <div class="card-body">
        <h4 class="card-title">
          <a href="prodotto.php?id={$row['id_film']}">{$row['titolo']}</a>
        </h4>
        <h5>Durata: {$row['durata']} minuti</h5>
        
      
      </div>
      <div class="card-footer text-center">
     <a href="prodotto.php?id={$row['id_film']}" class="btn btn-success btn-small">Dettagli</a>
      </div>
    </div>
  </div>
STRINGA_PDT;
echo $prodotti;
}
}

//crea una funzione per mostrare l'elenco delle categorie (pagina sidebar.php)
function mostraCategorie(){

  $ricercaCategorie = query('SELECT * FROM genere');
  conferma($ricercaCategorie);

  while($row = fetch_array($ricercaCategorie)){

$categorie = <<<STRINGA_CAT

<a href='categorie.php?id={$row['id_genere']}' class='list-group-item'>{$row['genere']}</a>

STRINGA_CAT;

echo $categorie;
}
}

//crea una funzione  per mostrare prodotti associati ad una categoria (pagina categorie.php)
function paginaCategoria(){
$pdtCategoria = query("SELECT * FROM film WHERE genere_id_genere = {$_GET['id']}");
conferma($pdtCategoria);

while($row = fetch_array($pdtCategoria)){

$pdtSingolaCat = <<<STRINGA_PDT

<div class="col-lg-4 col-md-6 mb-4">
<div class="card h-100">

  <div class="card-body">
    <h4 class="card-title">
      <a href="prodotto.php?id={$row['id_film']}">{$row['titolo']}</a>
    </h4>
    <h5>Durata: {$row['durata']} minuti</h5>
    
  
  </div>
  <div class="card-footer text-center">
 <a href="prodotto.php?id={$row['id_film']}" class="btn btn-success btn-small">Dettagli</a>
  </div>
</div>
</div>

STRINGA_PDT;
echo $pdtSingolaCat;

}
}

//crea una funzione per mostrare il nome e la didascalia di una categoria selezionata (pagina categorie.php)
function mostra_nome_cat(){
$nomeCategoria = query("SELECT nome_cat , didascalia FROM categorie WHERE id_cat = {$_GET['id']} ");

while($row= fetch_array($nomeCategoria)){

$mostra_nome_cat = <<<STRINGA
<h4 class="text-center">Benvenuto nella sezione del genere:</h4>
<h2 class="display-3 text-center">{$row['nome_cat']}</h2> 
<p class="lead">{$row['didascalia']} </p> 

STRINGA;
echo $mostra_nome_cat;
}
}

//crea una funzione per mostrare tutti i prodotti in una pagina (pagina negozio.php)
function catalogoProdotti(){
$catalogo = query("SELECT * FROM prodotti");
conferma($catalogo);

while($row = fetch_array($catalogo)){

  $shopCatalogo = <<<CATALOGO
  <div class="col-lg-3 col-md-6 mb-4">
  <div class="card altezza">
  <img class="card-img-top" src="../risorse/immagini/{$row['immagine']}" alt="">
  <div class="card-body">
    <h4 class="card-title">{$row['nome_prodotto']}</h4>
    <h5>€{$row['prezzo']}</h5>
    <p class="card-text">{$row['descr_prodotto']}</p>
  </div>
  <div class="card-footer text-center">
    <a href="carrello.php?add={$row['id_prodotto']}" class="btn btn-success btn-small">Acquista</a> 
    <a href="prodotto.php?id={$row['id_prodotto']}" class="btn btn-info btn-small">Dettagli</a>
  </div>
</div>
</div>

CATALOGO;
echo $shopCatalogo;
}
}

//crea una funzione per un modulo di  ricerca (pagina ricerca.php)
function ricerca(){
  if(isset($_POST['invia_ricerca'])){
  
  $ricercaUtente = $_POST['ricerca'];
  //echo $ricercaUtente;
  
  $ricerca = query("SELECT * FROM film WHERE titolo  LIKE  '%$ricercaUtente%' ");
  
  conferma($ricerca);
  }
  $risultatoRicerca = mysqli_num_rows($ricerca);
  if($risultatoRicerca == 0){
  
    echo "Non ci sono prodotti";
  }else{
    //echo "E' stato trovato un prodotto";
  
  while($row = fetch_array($ricerca)){
  
  $mostraRicerca = <<<STRINGA
  <div class="card mt-4">
  <img class="card-img-top img-fluid" src="https://www.mirkocuneo.it/wp-content/uploads/2020/08/Blockbuster-airbnb-1024x683.png" alt="">
  <div class="card-body">
    <h3 class="card-title text-center mb-5">{$row['titolo']}</h3>
    <h4 class="mb-5">Durata: {$row['durata']} minuti</h4>
    <h5>Trama</h5>
    <p class="card-text">{$row['trama']}</p></div>
    <a href="noleggio.php?add={$row['id_film']}" class="btn btn-info">Noleggia</a>
  
  </div>
  <div class="card card-outline-secondary my-4">
  </div>
  
STRINGA;
  
  echo $mostraRicerca;
  
  }
  }
  }
  
  




