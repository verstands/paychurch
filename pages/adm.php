<?php
    include'body/menu.php';
    if (!isset($_SESSION['adminS'])) {
        header('Location:index.php?page=error');
    }
?>
<div class="container">
    <h4 class="font-weight-bold py-3 mb-0"><i class="fa fa-users-cog"></i> Les administrateur <i class="fa fa-pulse"></i></h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=accueil"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item active" >admi</li>
        </ol>
    </div>
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
        <thead>
            <tr>
                <th>company</th>
                <th>Login</th>
                <th>type d'amin</th>
                <th>Password</th>
                <th>Email</th>
                <th>Active</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $affiche = $con->query("SELECT * FROM admin, eglise WHERE type_admi != '1' AND admin.id_eg = eglise.id_eg");
                foreach( $affiche as $affiches):
            ?>
            <tr>
                <th><?= $affiches['nom']; ?></th>
                <th><?= $affiches['login']; ?></th>
                <th><?= $affiches['type_admi']; ?></th>
                <th><?= $affiches['password']; ?></th>
                <th><?= $affiches['email']; ?></th>
                <th><?= $affiches['active']; ?></th>
                <th><?=  $affiches['dates']; ?></th>
                <th>
                    <a href="index.php?page=suppresion&amp;adm=<?= $affiches['id_admin']; ?>" title="supprimer"><i class="fa fa-recycle"></i></a>
                    <a href="index.php?page=mod_adm&amp;adm=<?= $affiches['id_admin']; ?>" title="Modifier"><i class="fa fa-exchange-alt"></i></a>
                </th>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>