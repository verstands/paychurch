<?php
    include'body/menu.php';
    include'function/offrande.fonc.php';
    if (isset($_POST['creer'])) {
        $name = htmlspecialchars($_POST['nom']);       
        $suppresion = "UPDATE offrande SET type_off = :type_off WHERE id_off = '{$_GET['off']}'";
        $a = $con->prepare($suppresion);
        $a->execute(array('type_off' => $name));
        header('Location:index.php?page=aff_offrande');
    }
?>

<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-8">
            <h4 class="font-weight-bold py-3 mb-0"><i class="fa fa-exchange-alt"></i> Modification d'un don</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?page=accueil"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Don </li>
                </ol>
            </div>
            <?php
                $affiche = $con->query("SELECT * FROM offrande WHERE id_off = '{$_GET["off"]}' ");
                foreach( $affiche as $affiches):
            ?>
            <div class="card mb-4">
                <h6 class="card-header">Don</h6>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label">Nom</label>
                            <input type="text" value="<?= $affiches['type_off']; ?>" name="nom" required class="form-control">
                            <div class="clearfix"></div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="creer">Modifier</button>
                    </form>
                </div>
            </div>
            <?php
                endforeach;
            ?>
            </div>
            <div class="col-md-4">
                <div class="layout-content">
                    <div class="container-fluid flex-grow-1 container-p-y">
                    <br><br><br><br>
                        <center>
                        
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                