<?php
    include'body/menu.php';
    if (!isset($_SESSION['adminS'])) {
        header('Location:index.php?page=error');
    }
?>
<div class="container">
    <h4 class="font-weight-bold py-3 mb-0"><i class="fa fa-money-bill-alt"></i> type de paiement<i class="fa fa-pulse"></i></h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=accueil"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item active" >type de paiement</li>
        </ol>
    </div>
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
        <thead>
            <tr>
                <th>Date</th>
                <th>Nom</th>
                <th>icon</th>
                <th>lien</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $affiche = $con->query("SELECT * FROM paiement");
                foreach( $affiche as $affiches):
            ?>
            <tr>
                <th><?= $affiches['dates']; ?></th>
                <th><?= $affiches['type_p']; ?></th>
                <th><?= $affiches['icon']; ?></th>
                <th><?= $affiches['lien_p']; ?></th>
                <th><a href="index.php?page=suppresion&amp;paye=<?= $affiches['id_paiement']; ?>" title="supprimer"><i class="fa fa-recycle"></i></a></th>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>