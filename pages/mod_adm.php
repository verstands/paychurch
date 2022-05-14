<?php
    include'body/menu.php';
    include'function/offrande.fonc.php';
    if (isset($_POST['creer'])) {
        $name = htmlspecialchars($_POST['login']);       
        $password = htmlspecialchars($_POST['password']);       
        $email = htmlspecialchars($_POST['email']);       
        $suppresion = "UPDATE admin SET login = :login, password = :password, email = :email WHERE id_admin = '{$_GET['adm']}'";
        $a = $con->prepare($suppresion);
        $a->execute(array('login' => $name,
                          'password' => $password,
                          'email' => $email));
        header('Location:index.php?page=adm');
    }
?>

<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-8">
            <h4 class="font-weight-bold py-3 mb-0"><i class="fa fa-exchange-alt"></i> Modification d'un adm</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?page=accueil"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Administrateur </li>
                </ol>
            </div>
            <?php
                $affiche = $con->query("SELECT * FROM admin WHERE id_admin = '{$_GET["adm"]}' ");
                foreach( $affiche as $affiches):
            ?>
            <div class="card mb-4">
                <h6 class="card-header">Administrateur</h6>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label">Login</label>
                            <input type="text" value="<?= $affiches['login']; ?>" name="login" required class="form-control">
                            <div class="clearfix"></div>
                            <label class="form-label">Password</label>
                            <input type="text" value="<?= $affiches['password']; ?>" name="password" required class="form-control">
                             <label class="form-label">Email</label>
                            <input type="text" value="<?= $affiches['email']; ?>" name="email" required class="form-control">
                            <div class="clearfix"></div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="creer">Modifier</button>
                    </form>
                </div>
            </div>
            <?php
                endforeach;
            ?>
            </div>
            <div class="col-md-4">
                <div class="layout-content">
                    <div class="container-fluid flex-grow-1 container-p-y">
                    <br><br><br><br>
                        <center>
                        
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                