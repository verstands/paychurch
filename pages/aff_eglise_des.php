<?php
    include'body/menu.php';
    if (!isset($_SESSION['adminS'])) {
        header('Location:index.php?page=error');
    }
?>
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Les eglises <i class="fa fa-pulse"></i></h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=accueil"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item active" >les company</li>
        </ol>
    </div>
    <a href="index.php?page=aff_eglise" class=" btn btn-primary">Les company activer</a><br><br>

    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-hover display">
        <thead>
            <tr>
                <th>Date</th>
                <th>Identifiant</th>
                <th>Nom</th>
                <th>Logo</th>
                <th>lien</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $affiche = $con->query("SELECT * FROM eglise WHERE active = '2' ");
                foreach( $affiche as $affiches):
            ?>
            <tr>
                <td><?= $affiches['dates']; ?></td>
                <td><?= $affiches['id_eg']; ?></td>
                <td><?= $affiches['nom']; ?></td>
                <td><a href="index.php?page=pupop&amp;Qw=<?= $affiches['active'] ?>&amp;v=<?= sha1($affiches['nom']);?>&amp;S=<?= $affiches['lien'] ?>">http://localhost/lite/index.php?page=pupop&amp;Qw=<?= $affiches['active'] ?>&amp;v=<?= sha1($affiches['nom']);?>&amp;S=<?= $affiches['lien'] ?></a></td>
                <td><img src="images/logo/<?= $affiches['logo'];?> " width="150" height="50"   alt=""></td>
                <td><a href="index.php?page=suppresion&amp;eglise=<?= $affiches['id_eg']; ?>" tooltip="Supprimer"><i class="fa fa-recycle"></i></a> <a href="index.php?page=mod_eglise&amp;eglise=<?= $affiches['id_eg']; ?>"><i class="fa fa-exchange-alt"></i></a> <a href="index.php?page=suppresion&amp;act=<?= $affiches['id_eg']; ?>" class="btn btn-success">Activer</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>