<?php 
    if(isset($_GET['t']) AND !empty($_GET['t'])){
        $_SESSION['t'] = htmlspecialchars($_GET['t']);
      }else{
        header('Location:localhost/lite/pages/pay_file/index.php');
      }
?>    
<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">

<head>
    <title>Empire | B4+ admin template by Srthemesvilla</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Empire Bootstrap admin template made using Bootstrap 4, it has tons of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="Empire, bootstrap admin template, bootstrap admin panel, bootstrap 4 admin template, admin template">
    <meta name="author" content="Srthemesvilla" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.css">
    <link rel="stylesheet" href="assets/fonts/linearicons.css">
    <link rel="stylesheet" href="assets/fonts/open-iconic.css">
    <link rel="stylesheet" href="assets/fonts/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="assets/fonts/feather.css">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap-material.css">
    <link rel="stylesheet" href="assets/css/shreerang-material.css">
    <link rel="stylesheet" href="assets/css/uikit.css">

    <!-- Libs -->
    <link rel="stylesheet" href="assets/libs/perfect-scrollbar/perfect-scrollbar.css">
    <!-- Page -->
    <link rel="stylesheet" href="assets/css/pages/authentication.css">
</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ content ] Start -->
    <div class="authentication-wrapper authentication-1 px-4">
        <div class="authentication-inner py-5">

            <!-- [ Logo ] Start -->
            <div class="d-flex justify-content-center align-items-center">
                <div class="ui-w-60">
                <div class="w-100 position-relative">
                     <?php 
                          $imag = $con->query("SELECT * FROM eglise WHERE id_eg = '{$_SESSION['id']}'")
                        ?>
                       
                        <?php foreach($imag as $image): ?>
                        <img src="images/logo/<?= $image['logo']; ?>" width="80" style="border-radius:50%;" height="60">
                        

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <center>
                <h5><?= $image['nom']; ?></h5>
                <p>
                    <?= $image['des']; ?>
                </p>
            </center>
             <?php endforeach ?>
            <br><br>
            
            <div class="row">
              <?php $offrande = $con->query("SELECT * FROM paiement"); ?>
              <?php foreach($offrande as $offrandes): ?>
                <hr>
              <div class="col-md-12" >
                <a href="<?= $offrandes['lien_p']; ?>&amp;p=<?= $offrandes['id_paiement']; ?>" class="btn btn-primary btn-block mt-4"><i class="fa fa-<?= $offrandes['icon'] ?>"></i> <?= $offrandes['type_p'] ?></a>
              </div><hr><br><br>
              <?php endforeach;?>
            </div>

            <hr>


        </div>
    </div>

    <!-- [ content ] End -->

    <!-- Core scripts -->
    <script src="assets/js/pace.js"></script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/libs/popper/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/sidenav.js"></script>
    <script src="assets/js/layout-helpers.js"></script>
    <script src="assets/js/material-ripple.js"></script>

    <!-- Libs -->
    <script src="assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <!-- Demo -->
    <script src="assets/js/demo.js"></script><script src="assets/js/analytics.js"></script>
</body>

</html>
