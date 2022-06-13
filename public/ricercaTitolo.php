<?php require_once("../risorse/config.php");
?>

<?php include(FRONT_END.DS.'header.php');
?>
  <body>

  

    <!-- Page Content -->
    <div class="container my-5">

      <div class="row">
      <?php include(FRONT_END.DS.'sidebar.php');?>

     

        <div class="col-lg-9">
<?php ricerca(); ?>
          
          </div>
          <!-- /.card -->

          <!--<div class="card card-outline-secondary my-4"> -->
            
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->
        
      </div>

    </div>
    <!-- /.container -->

     <!-- Footer -->
     <?php include(FRONT_END.DS.'footer.php');?>
