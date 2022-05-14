<?php
    if (isset($_POST['btn'])) {
        $login = htmlspecialchars(trim($_POST['login']));
        $password = htmlspecialchars(trim($_POST['password']));
        $tableau = array(
            'email' => $login,
            'password' => $password
        );
        $req = $con->prepare("SELECT id_admin FROM admin WHERE email = :email AND password = :password AND type_admi = '1' ");
        $req2 = $con->prepare("SELECT id_admin FROM admin WHERE email = :email AND password = :password AND type_admi = '2'");
        $req3 = $con->prepare("SELECT id_admin FROM administrateur WHERE email = :email AND password = :password");
        $req->execute($tableau);
        $req2->execute($tableau);
        $req3->execute($tableau);
        $resultat = $req->fetch();
        $resultat2 = $req2->fetch();
        $resultat3 = $req3->fetch();
        if ($resultat) {
            $_SESSION['adminS'] = $login;
            if (isset($_SESSION['adminS']) AND !empty($_SESSION['adminS'])) {
                $suppresion = "UPDATE admin SET active = :active WHERE email = '{$_SESSION['adminS']}'";
                $a = $con->prepare($suppresion);
                $a->execute(array('active' => '1'));
            } 
            header('Location:index.php?page=accueil');
        }elseif ($resultat2) {
            $_SESSION['sous'] = $login;
            if (isset($_SESSION['sous']) AND !empty($_SESSION['sous'])) {
                $suppresion = "UPDATE admin SET active = :active WHERE email = '{$_SESSION['sous']}'";
                $a = $con->prepare($suppresion);
                $a->execute(array('active' => '1'));
            }
            header('Location:index.php?page=dashboad');
        }elseif ($resultat3) {
            $_SESSION['trois'] = $login;
            if (isset($_SESSION['trois']) AND !empty($_SESSION['trois'])) {
                $suppresion = "UPDATE administrateur SET active = :active WHERE email = '{$_SESSION['trois']}'";
                $a = $con->prepare($suppresion);
                $a->execute(array('active' => '1'));
            }
            header('Location:index.php?page=trans');
        }
        else{
            echo"<script>alert('Utilisateur incorrect!');</script>";
        }
        
    }
?>
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
                        <img src="assets/img/logo-dark.png" alt="Brand Logo" class="img-fluid">
                    </div>
                </div>
            </div>
            <!-- [ Logo ] End -->

            <!-- [ Form ] Start -->
            <form class="my-5" method="POST">
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="text" name="login" class="form-control" required >
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="form-label d-flex justify-content-between align-items-end">
                        <span>Password</span>
                        <a href="#" class="d-block small">Forgot password?</a>
                    </label>
                    <input type="password" name="password" class="form-control" required>
                    <div class="clearfix"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center m-0">
                    <button type="submit" class="btn btn-primary" name="btn">Se connecter</button>
                </div>
            </form>
            <!-- [ Form ] End -->

            

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
