<?php
    include'body/menu.php';
    include'function/eglise.fonc.php';
    include'crypte/cry.php';
    if (isset($_POST['creer'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $des = htmlspecialchars($_POST['des']);
        $logo = $_FILES['logo']['name'];
        eglise($nom, $logo, $des);
        echo"<script>alert('Vous venez de crée une company !');</script>";
    }
    if (isset($_POST['generer'])){
        lien($_POST['lien']);
        echo"<script>alert('Vous venez de crée un lien !');</script>";
    }
    if (!isset($_SESSION['adminS'])) {
        header('Location:index.php?page=error');
    }
?>

<div class="layout-content">
    <div class="container">
        <h4 class="font-weight-bold py-3 mb-0"><i class="fa fa-user"></i> Creation d'une entreprise</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">C.R.E</li>
            </ol>
        </div>
        <a href="index.php?page=aff_eglise" class=" btn btn-primary">Les Company</a><br><br>

        <div class="card mb-4">
            <h6 class="card-header">Company</h6>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-label">Nom de la company</label>
                        <input type="text" name="nom" required class="form-control" placeholder="Nom de la company">
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea required class="form-control" name="des"></textarea>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label w-100">Telecharger un logo</label>
                        <input type="file" name="logo">
                        <small class="form-text text-muted">Exemple d'u logo...</small>
                    </div>
                    <button type="submit" class="btn btn-primary" name="creer">Creer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="layout-content">
    <div class="container">
        <div class="card mb-4">
            <h6 class="card-header">Gererer un lien de la company</h6>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label class="form-label">Nom de la company</label>
                        <select name="lien" class="form-control">
                            <?php $lien = $con->query("SELECT * FROM eglise"); ?>
                            <?php foreach($lien as $liens): ?>
                            <option value="<?= $liens['id_eg']; ?>"><?= $liens['nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="clearfix"></div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="generer">generer</button>
                </form>
            </div>
        </div>
    </div>
</div>
                