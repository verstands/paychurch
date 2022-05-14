<?php
    include'body/menu.php';
    if (!isset($_SESSION['adminS'])) {
        header('Location:index.php?page=error');
    }
?>
<div class="container">
    <h4 class="font-weight-bold py-3 mb-0"><i class="fa fa-shopping-cart"></i> Les Dons <i class="fa fa-pulse"></i></h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=accueil"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item active" >don</li>
        </ol>
    </div>
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
        <thead>
            <tr>
                <th>Date</th>
                <th>Nom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $affiche = $con->query("SELECT * FROM offrande");
                foreach( $affiche as $affiches):
            ?>
            <tr>
                <td><?= $affiches['dates']; ?></td>
                <td><?= $affiches['type_off']; ?></td>
                <td>
                    <a href="index.php?page=suppresion&amp;off=<?= $affiches['id_off']; ?>" title="supprimer"><i class="fa fa-recycle"></i></a>
                    <a href="index.php?page=mod_off&amp;off=<?= $affiches['id_off']; ?>" title="Modifier"><i class="fa fa-exchange-alt"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>