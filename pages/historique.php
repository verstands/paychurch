<?php
    include'body/menu.php';
    
?>
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Historique <i class="fa fa-book"></i></h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" >Tables</li>
            <li class="breadcrumb-item active" >Bootstrap</li>
        </ol>
    </div>
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
        <thead>
            <tr>
                <th>Date</th>
                <th>icon</th>
                <th>description</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $affiche = $con->query("SELECT * FROM transaction");
                foreach( $affiche as $affiches):
            ?>
            <tr>
                <th><?php $affiches['dates']; ?></th>
                <th><i class="fa fa-user"></i></th>
                <th><?php $affiches['description']; ?></th>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>