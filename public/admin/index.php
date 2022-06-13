<?php require_once("../../risorse/config.php");  ?> 
 <?php include(BACK_END . DS. "header.php"); ?>  

<?php 
if(!isset($_SESSION['username'])){

    header('Location: ../../public');
}
?>

<!-- INIZIO INDEX -->
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Pannello di amministrazione 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="material-icons">dashboard</i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <?php 
                if($_SERVER['REQUEST_URI'] == "/ECOMM/public/admin/" || $_SERVER['REQUEST_URI'] == "/ECOMM/public/admin/index.php" ){

                    include(BACK_END . DS. "content_admin.php");
                }
                if(isset($_GET['ordini'])){
                    include(BACK_END . DS. "ordini.php");
                }

                if(isset($_GET['prodotti-admin'])){
                    include(BACK_END . DS. "prodotti-admin.php");
                }

                if(isset($_GET['aggiungi-pdt'])){
                    include(BACK_END . DS. "aggiungi-pdt.php");
                }

                if(isset($_GET['aggiorna-pdt'])){
                    include(BACK_END . DS. "aggiorna-pdt.php");
                }

                if(isset($_GET['categorie-admin'])){
                    include(BACK_END . DS. "categorie-admin.php");
                }
                if(isset($_GET['rapporti'])){
                    include(BACK_END . DS. "rapporti.php");
                }

                ?>
               

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
  
    
    <?php include(BACK_END . DS. "footer.php"); ?>
