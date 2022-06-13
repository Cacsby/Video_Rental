<?php require_once("../risorse/config.php");
?>

<?php include(FRONT_END.DS.'header.php');
?>
  <body>

  

    <!-- Page Content -->
    <div class="container my-5">

      <div class="row">
      <?php include(FRONT_END.DS.'sidebar.php');?>

     <?php
         $pdtSingolo= query("SELECT*FROM film WHERE id_film ={$_GET['id']}");

         conferma($pdtSingolo);
     
         while($row = fetch_array($pdtSingolo)):
     
    

    
    ?>

        <div class="col-lg-9">

          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="https://www.mirkocuneo.it/wp-content/uploads/2020/08/Blockbuster-airbnb-1024x683.png" alt="">
            <div class="card-body">
              <h3 class="card-title"><?php echo $row['titolo']?></h3>
              <h4></h4>
              <p class="card-text"><?php echo $row['trama']?></p>
              <span class="card-text">Durata <?php echo $row['durata']?> minuti</span>
              
            </div>
            <a href="noleggio.php?add={$row['id_film']}" class="btn btn-info">Noleggia</a>
          </div>
          <!-- /.card -->

          <!--<div class="card card-outline-secondary my-4"> -->
            
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->
        <?php endwhile ?>
      </div>

    </div>
    <!-- /.container -->

     <!-- Footer -->
     <?php include(FRONT_END.DS.'footer.php');?>
