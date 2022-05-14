<?php
    include'body/menu.php';
    include'function/eglise.fonc.php';
    if (isset($_POST['creer'])) {
        $name = htmlspecialchars($_POST['nom']);
        $des = htmlspecialchars($_POST['des']);
        $logo = $_FILES['logo']['name'];
        
        modification($name, $logo, $des);
        header('Location:index.php?page=aff_eglise');
    }
?>

<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-8">
            <h4 class="font-weight-bold py-3 mb-0"><i class="fa fa-exchange-alt"></i> Modification d'un company</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?page=accueil"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Modification </li>
                </ol>
            </div>
            <?php
                $affiche = $con->query("SELECT * FROM eglise WHERE id_eg = '{$_GET["eglise"]}' ");
                foreach( $affiche as $affiches):
            ?>
            <div class="card mb-4">
                <h6 class="card-header">company</h6>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label">Nom</label>
                            <input type="text" value="<?= $affiches['nom']; ?>" name="nom" required class="form-control">
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                             <textarea class="form-control" name="des"><?= $affiches['des']; ?></textarea>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">logo</label>
                            <img src="images/logo/<?= $affiches['logo']; ?>"  width="150" height="50" alt="">
                            <input type="file" name="file"  class="form-control">
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
                