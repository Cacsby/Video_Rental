<?php require_once("../risorse/config.php"); ?>
<?php  include(FRONT_END . DS . 'header.php'); ?>
    
    <!-- Page Content -->
    <div class="container my-5">

     <!-- Sidebar -->
      <div class="row">
      
      <div class="col-lg-3">
      <?php  include(FRONT_END . DS . 'sidebar.php'); ?></div>

        <div class="col-lg-9">
         
        
        <header class="jumbotron my-4">
      

    
      <h1 class="display-3">Video e Video</h1>
      <p class="lead">Qui trovi video per ogni momento.</p>
    
    </header>
          <div class="row">

          <?php mostraProdotti();  ?>
 
          </div>
          <!-- /.row -->

          </div>
        <!-- /.col-lg-9 -->
<!-- <h1><?php echo $_SESSION['prodotto_1']; ?></h1> -->
      </div>
      <!-- /.row -->
    
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php  include(FRONT_END . DS . 'footer.php'); ?>