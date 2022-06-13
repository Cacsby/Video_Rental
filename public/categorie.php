

<?php require_once('../risorse/config.php'); ?>

<?php include(FRONT_END.DS.'header.php');
?>


  <body>

    <!-- Page Content -->
    <div class="container my-5">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
      
      <h1 class="display-3">Video e Video</h1>
      <p class="lead">Qui trovi video per ogni momento.</p>
    
      </header>

      <!-- Page Features -->
      <div class="row text-center">

        <?php paginaCategoria();?>

      <!--  <div class="col-lg-3 col-md-6 mb-4">
          <div class="card altezza">
            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
            <div class="card-body">
              <h4 class="card-title">Categoria...</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Cerca altro</a>
            </div>
          </div> 
        </div> -->

       

        
          </div>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
 <?php include(FRONT_END.DS.'footer.php');?>

  