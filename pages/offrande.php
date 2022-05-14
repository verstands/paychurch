<?php
    include'body/menu.php';
    include'function/offrande.fonc.php';
    if (isset($_POST['creer'])) {
        $devise = htmlspecialchars($_POST['devise']);
        $id = htmlspecialchars($_POST['id']);
        offrande($devise, $id);
        echo"<script>alert('l'action a ete bien fait !');</script>";
    }
    if (!isset($_SESSION['adminS'])) {
        header('Location:index.php?page=error');
    }
?>

<div class="layout-content">
    <div class="container">
        <h4 class="font-weight-bold py-3 mb-0"> <i class="fa fa-shopping-cart" style="font-size:25px;"></i>  Ajouter un Don</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="idex.php?page=accueil"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Don</li>
            </ol>
        </div>
        <a href="index.php?page=aff_offrande" class=" btn btn-primary">Les Dons</a><br><br>
        <div class="card mb-4 ">
            <h6 class="card-header">Don</h6>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-label">Nom</label>
                        <input type="text" name="devise" required class="form-control ">
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Company</label>
                        <?php $offrande = $con->query("SELECT * FROM eglise")?>
                        <select class="form-control" name="id">
                            <?php foreach($offrande as $offrandes): ?>
                            <option value="<?= $offrandes['id_eg']; ?>"><?= $offrandes['nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="clearfix"></div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="creer">Creer</button>
                </form>
            </div>
        </div>
    </div>
</div>
                