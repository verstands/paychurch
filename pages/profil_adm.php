<?php
    include'body/menu.php';
    include'function/profil.fonc.php';
    if (isset($_POST['creer'])) {
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        eglise($login, $password);
        header('Location:index.php?page=login');
    }
    if (!isset($_SESSION['adminS']) OR !isset($_SESSION['sous'])) {
        header('Location/index.php?pae=error');
    }
?>

<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-8">
            <h4 class="font-weight-bold py-3 mb-0">Profile</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?page=accueil"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Profil</li>
                </ol>
            </div>
            <?php
                if (isset($_SESSION['adminS'])) {
            ?>

                <?php
                $affiche = $con->query("SELECT * FROM admin WHERE  email = '{$_SESSION['adminS']}'  ");
                foreach( $affiche as $affiches):
            ?>
            <div class="card mb-4">
                <h6 class="card-header">Adm</h6>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label">Login</label>
                            <input type="text" value="<?= $affiches['login']; ?>" name="login" required class="form-control">
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Pasword</label>
                            <input type="text" value="<?= $affiches['password']; ?>" name="password" required class="form-control">
                            <div class="clearfix"></div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="creer">Modifier</button>
                    </form>
                </div>
            </div>
            <?php
                endforeach;
            ?>
            <?php
                }elseif(isset($_SESSION['sous'])){
            ?>
                <?php
                $affiche = $con->query("SELECT * FROM admin WHERE  email = '{$_SESSION['sous']}'  ");
                foreach( $affiche as $affiches):
                ?>
                <div class="card mb-4">
                <h6 class="card-header">Adm</h6>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label">Login</label>
                            <input type="text" value="<?= $affiches['login']; ?>" name="login" required class="form-control">
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Pasword</label>
                            <input type="text" value="<?= $affiches['password']; ?>" name="password" required class="form-control">
                            <div class="clearfix"></div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="creer">Modifier</button>
                    </form>
                </div>
            </div>
            <?php
                endforeach;
            ?>
            <?php
                }elseif (isset($_SESSION['trois'])) {
            ?>

                <?php
                $affiche = $con->query("SELECT * FROM administrateur WHERE  email = '{$_SESSION['trois']}'  ");
                foreach( $affiche as $affiches):
                ?>
                <div class="card mb-4">
                <h6 class="card-header">Adm</h6>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label">Login</label>
                            <input type="text" value="<?= $affiches['login']; ?>" name="login" required class="form-control">
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Pasword</label>
                            <input type="text" value="<?= $affiches['password']; ?>" name="password" required class="form-control">
                            <div class="clearfix"></div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="creer">Modifier</button>
                    </form>
                </div>
            </div>
            <?php
                endforeach;
            ?>
            <?php
                }else{
                    heaer('Location:index.php?page=error');
                }


            ?>

            </div>
            <div class="col-md-4">
                <div class="layout-content">
                    <div class="container-fluid flex-grow-1 container-p-y">
                    <br><br><br><br>
                        <center>
                        <i class="fa fa-user-circle" style="font-size:200px;"></i><br>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                