<?php
    include'body/menu.php';
    include'function/sous_admi.fonc.php';
    if (isset($_POST['creer'])) {
        $login = htmlspecialchars($_POST['login']);
        $email = htmlspecialchars($_POST['password']);
        $password = htmlspecialchars($_POST['password']);
        $eglise = htmlspecialchars($_POST['eglise']);
        egliseS($login, $password, $email, $eglise);
        echo"<script>alert('Vous venez de crée un administrateur !');</script>";
    }
     if (!isset($_SESSION['sous'])) {
        header('Location:index.php?page=error');
    }
?>

<div class="layout-content">
    <div class="container">
        <h4 class="font-weight-bold py-3 mb-0"> <i class="fa fa-user-circle" style="font-size:25px;"></i>   Creation d'un administrateur</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">C.R.E</li>
            </ol>
        </div>
        <a href="index.php?page=admS" class=" btn btn-primary">Les administrateur</a><br><br>
        <div class="card mb-4 ">
            <h6 class="card-header">administrateur</h6>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-label">Nom de la company</label>
                        <?php
                            $affiche = $con->query("SELECT * FROM eglise, admin WHERE eglise.id_eg = admin.id_eg AND admin.email = '{$_SESSION['sous']}' ");
                        ?>
                        <select name="eglise" class="form-control " id="">
                            <?php foreach( $affiche as $affiches): ?>
                            <option value="<?= $affiches['id_eg']; ?>"><?= $affiches['nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Login</label>
                        <input type="text" name="login" required class="form-control " >
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" required class="form-control ">
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" required class="form-control "  >
                        <div class="clearfix"></div>
                    </div>
        
                    <button type="submit" class="btn btn-primary" name="creer">Creer</button>
                </form>
            </div>
        </div>
    </div>
</div>
                