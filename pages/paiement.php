<?php
    include'body/menu.php';
    include'function/paiement.fonc.php';
    if (isset($_POST['creer'])) {
        $devise = htmlspecialchars($_POST['devise']);
        $icon = htmlspecialchars($_POST['icon']);
        $lien = htmlspecialchars($_POST['lien']);
       
        paye($devise, $icon, $lien);
        echo"<script>alert('Vous venez de crée un type de paiement !');</script>";
    }
    if (!isset($_SESSION['adminS'])) {
        header('Location:index.php?page=error');
    }
?>

<div class="layout-content">
    <div class="container">
        <h4 class="font-weight-bold py-3 mb-0"> <i class="fa fa-money-bill-alt" style="font-size:25px;"></i>  Ajouter un Paiement</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?page=accueil"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Paiement</li>
            </ol>
        </div>
        <a href="index.php?page=aff_paiement" class=" btn btn-primary">Les paiement</a><br><br>
        <div class="card mb-4 ">
            <h6 class="card-header">paiement</h6>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-label">Nom</label>
                        <input type="text" name="devise" required class="form-control ">
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Icon font-awesome</label>
                        <input type="text" name="icon" required class="form-control ">
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Lien</label>
                        <input type="text" name="lien" required class="form-control ">
                        <div class="clearfix"></div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="creer">Creer</button>
                </form>
            </div>
        </div>
    </div>
</div>
                