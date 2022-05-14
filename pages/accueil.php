<?php
    include'body/menu.php';
    if (!isset($_SESSION['adminS']) AND empty($_SESSION['adminS'])) {
        header('Location:index.php?page=error');
    }


?>
<div class="layout-content">
                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <h4 class="font-weight-bold py-3 mb-0">Dashboard</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?page=acceuil"><i class="feather icon-home"></i></a></li>
                            </ol>
                        </div>
					    <div class="row">
                            <!-- 1st row Start -->
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        <?php 
                                                            $count = $con->query("SELECT COUNT(*) as nom FROM eglise ");
                                                        ?>
                                                        <?php foreach($count as $counts): ?>
                                                        <h2 class="mb-2"><?= $counts['nom']; ?></h2>
                                                        <?php endforeach; ?>
                                                        <p class="text-muted mb-0">Nombre d'eglise</p>
                                                    </div>
                                                    <div class="lnr lnr-chart-bars display-4 text-success"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        <?php 
                                                            $count = $con->query("SELECT COUNT(*) as user FROM transaction ");
                                                        ?>
                                                        <?php foreach($count as $counts): ?>
                                                        <h2 class="mb-2"><?= $counts['user']; ?></h2>
                                                        <?php endforeach; ?>
                                                        <p class="text-muted mb-0">Nombre des utilisateurs</p>
                                                    </div>
                                                    <div class="fa fa-users text-success" style="font-size:50px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        <?php 
                                                            $date = date('Y-m-d');
                                                            $count = $con->query("SELECT COUNT(*) as user FROM transaction WHERE dates = '$date' ");
                                                        ?>
                                                        <?php foreach($count as $counts): ?>
                                                        <h2 class="mb-2"><?= $counts['user']; ?></h2>
                                                        <?php endforeach; ?>
                                                        <p class="text-muted mb-0">Les transanction d'aujourdhui</p>
                                                    </div>
                                                    <div class="fa fa-exchange-alt text-success" style="font-size:50px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        <?php 
                                                            $date = date('Y-m-d');
                                                            $count = $con->query("SELECT COUNT(*) as user FROM transaction");
                                                        ?>
                                                        <?php foreach($count as $counts): ?>
                                                        <h2 class="mb-2"><?= $counts['user']; ?></h2>
                                                        <?php endforeach; ?>
                                                        <p class="text-muted mb-0">Tout les transactions</p>
                                                    </div>
                                                    <div class="fa fa-exchange-alt text-success" style="font-size:50px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        <?php 
                                                            $date = date('Y-m-d');
                                                            $count = $con->query("SELECT COUNT(*) as user FROM admin WHERE type_admi = '2'");
                                                        ?>
                                                        <?php foreach($count as $counts): ?>
                                                        <h2 class="mb-2"><?= $counts['user']; ?></h2>
                                                        <?php endforeach; ?>
                                                        <p class="text-muted mb-0">Les sous admin</p>
                                                    </div>
                                                    <div class="fa fa-users text-success" style="font-size:50px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        <?php 
                                                            $date = date('Y-m-d');
                                                            $count = $con->query("SELECT COUNT(*) as user FROM administrateur");
                                                        ?>
                                                        <?php foreach($count as $counts): ?>
                                                        <h2 class="mb-2"><?= $counts['user']; ?></h2>
                                                        <?php endforeach; ?>
                                                        <p class="text-muted mb-0">Les sous-sous admin</p>
                                                    </div>
                                                    <div class="fa fa-users text-success" style="font-size:50px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card mb-4">
                                    <div class="card-header with-elements">
                                        <h6 class="card-header-title mb-0">Statistics</h6>
                                        <div class="card-header-elements ml-auto">
                                            <label class="text m-0">
                                                <span class="text-light text-tiny font-weight-semibold align-middle">SHOW STATS</span>
                                                <span class="switcher switcher-primary switcher-sm d-inline-block align-middle mr-0 ml-2"><input type="checkbox" class="switcher-input" checked><span class="switcher-indicator"><span class="switcher-yes"></span><span
                                                            class="switcher-no"></span></span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="statistics-chart-1" style="height:300px"></div>

                                    </div>
                                </div>
                            </div>
                            <!-- 1st row Start -->
                        </div>
                        <div class="row">
                            <!-- 3rd row Start -->
                            
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header with-elements pb-0">
                                        <h6 class="card-header-title mb-0">Les administrateur</h6>
                                        <div class="card-header-elements ml-auto p-0">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#sale-stats">Les administrateur</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#latest-sales">Les transaction</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nav-tabs-top">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="sale-stats">
                                                <div style="height: 330px" id="tab-table-1">
                                                    <table class="table table-hover card-table">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <label class="custom-control custom-checkbox mb-0">
                                                                        <span class="custom-control-label"><strong>Active <i class="fa fa-circle text-success"></i></strong></span>
                                                                    </label>
                                                                </th>
                                                                <th>User</th>
                                                                <th>Company</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $user = $con->query("SELECT * FROM  admin, eglise WHERE admin.active = '1' AND admin.id_eg = eglise.id_eg");
                                                                foreach($user as $users):
                                                            ?>
                                                            
                                                            <tr>
                                                                <td>
                                                                    <label class="custom-control custom-checkbox mb-0">
                                                                        <i class="fa fa-circle text-success"></i>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <div class="media mb-0">
                                                                        <i class="fa fa-user-circle" style="font-size:40px;"> </i>
                                                                        <div class="media-body align-self-center ml-3">
                                                                            <h6 class="mb-0"><?= $users['login']; ?></h6>
                                                                            <i class="mb-0"><?= $users['email']; ?></i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-inline-block align-middle">
                                                                        <h6 class="mb-1"><i><?= $users['nom']; ?></i>  
                                                                </h6>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="latest-sales">
                                                <div style="height: 330px" id="tab-table-2">
                                                    <table class="table table-hover card-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Utilisateur</th>
                                                                <th>Devise.</th>
                                                                <th>Montant</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $user = $con->query("SELECT * FROM  transaction,devise WHERE transaction.id_devise = devise.id_devise ");
                                                                foreach($user as $users):
                                                            ?>
                                                            <tr>
                                                                <td class="align-middle">
                                                                    <a href="javascript:" class="text-dark"><?= $users['user'] ?></a>
                                                                </td>
                                                                <td class="align-middle"><?= $users['devise'] ?></td>
                                                                <td class="align-middle"><?= $users['montant'] ?></td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br><hr><hr>
                                    <div class="card-header with-elements pb-0">
                                        <h6 class="card-header-title mb-0">Les sous sous administrateur</h6>
                                        <div class="card-header-elements ml-auto p-0">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#sale-stats">Les sous sous administrateur</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nav-tabs-top">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="sale-stats">
                                                <div style="height: 330px" id="tab-table-1">
                                                    <table class="table table-hover card-table">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <label class="custom-control custom-checkbox mb-0">
                                                                        <span class="custom-control-label"><strong>Active <i class="fa fa-circle text-success"></i></strong></span>
                                                                    </label>
                                                                </th>
                                                                <th>User</th>
                                                                <th>Company</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $user = $con->query("SELECT * FROM  administrateur, eglise WHERE administrateur.active = '1' AND administrateur.id_eg = eglise.id_eg ");
                                                                foreach($user as $users):
                                                            ?>
                                                            
                                                            <tr>
                                                                <td>
                                                                    <label class="custom-control custom-checkbox mb-0">
                                                                        <i class="fa fa-circle text-success"></i>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <div class="media mb-0">
                                                                        <i class="fa fa-user-circle" style="font-size:40px;"> </i>
                                                                        <div class="media-body align-self-center ml-3">
                                                                            <h6 class="mb-0"><?= $users['login']; ?></h6>
                                                                            <i class="mb-0"><?= $users['email']; ?></i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-inline-block align-middle">
                                                                        <h6 class="mb-1"><i><?= $users['nom']; ?></i>  
                                                                </h6>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 3rd row Start -->
                        </div>
                        
					</div>
                    <!-- [ content ] End -->

                    <!-- [ Layout footer ] Start -->
                    <nav class="layout-footer footer bg-white">
                        <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
                            <div class="pt-3">
                                <span class="footer-text font-weight-semibold">&copy; <a href="https://srthemesvilla.com" class="footer-link" target="_blank">Em</a></span>
                            </div>
                        </div>
                    </nav>
                    <!-- [ Layout footer ] End -->
                </div>
            