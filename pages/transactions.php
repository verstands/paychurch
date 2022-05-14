<?php
    include'body/menu.php';
    if (!isset($_SESSION['sous'])) {
        header('Location:index.php?page=error');
    }
    
?>
<div class="container">
    <h4 class="font-weight-bold py-3 mb-0"><i class="fa fa-exchange-alt"></i> Transactions <i class="fa fa-pulse"></i></h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item active" >Transactions</li>
        </ol>
    </div>
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
        <thead>
            <tr>
                <th>Numero transaction</th>
                <th>Utilisateur</th>
                <th>Company</th>
                <th>Type de transaction</th>
                <th>Montant</th>
                <th>Davise</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $affiche = $con->query("SELECT * FROM transaction, eglise, admin, devise WHERE transaction.id_eg = eglise.id_eg AND admin.email = '{$_SESSION['sous']}' AND transaction.id_devise = devise.id_devise");
                foreach( $affiche as $affiches):
            ?>
            <tr>
                <th><?php $affiches['id_trans']; ?></th>
                <th><?php $affiches['user']; ?></th>
                <th><?php $affiches['id_eg']; ?></th>
                <th><?php $affiches['id_off']; ?></th>
                <th><?php $affiches['montant']; ?></th>
                <th><?php $affiches['devise']; ?></th>
                <th><?php $affiches['dates']; ?></th>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>