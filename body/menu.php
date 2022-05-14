
<div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-dark">
                <!-- Brand demo (see assets/css/demo/demo.css) -->
                <div class="app-brand demo">
                    <span class="app-brand-logo demo">
                        <img src="assets/img/logo.png" alt="Brand Logo" class="img-fluid">
                    </span>
                    <a href="index.html" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Empire</a>
                    <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                        <i class="ion ion-md-menu align-middle"></i>
                    </a>
                </div>
                <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
                <ul class="sidenav-inner py-1">

                    <!-- Dashboards -->
                    <?php if (isset($_SESSION['adminS'])) {
                    ?>
                        <li class="sidenav-item">
                        <a href="index.php?page=accueil" class="sidenav-link">
                            <i class="fa fa-home sidenav-icon"></i>
                            <div>Dashboards</div>
                            <div class="pl-1 ml-auto">
                                <div class="badge badge-danger"><i class="fa fa-home"></i></div>
                            </div>
                        </a>
                    </li>
                        <li class="sidenav-divider mb-1"></li>
                        <li class="sidenav-item">
                            <a href="index.php?page=company" class="sidenav-link">
                                <i class="fa fa-user sidenav-icon"></i>
                                <div>Creation d'une entreprise</div>
                            </a>
                        </li>
                        <li class="sidenav-divider mb-1"></li>
                        <li class="sidenav-item">
                            <a href="index.php?page=transaction" class="sidenav-link">
                                <i class="fa fa-exchange-alt sidenav-icon"></i>
                                <div>Transaction</div>
                            </a>
                        </li>
                        <li class="sidenav-divider mb-1"></li>
                        <li class="sidenav-item">
                            <a href="index.php?page=sous_adm" class="sidenav-link">
                                <i class="fa fa-users sidenav-icon"></i>
                                <div>Les administrateur</div>
                            </a>
                        </li>
                        <li class="sidenav-divider mb-1"></li>
                        <li class="sidenav-item">
                            <a href="index.php?page=devise" class="sidenav-link">
                                <i class="fa fa-dollar-sign sidenav-icon"></i>
                                <div>Devise</div>
                            </a>
                        </li>
                        <li class="sidenav-divider mb-1"></li>
                        <li class="sidenav-item">
                            <a href="index.php?page=offrande" class="sidenav-link">
                                <i class="fa fa-shopping-cart sidenav-icon"></i>
                                <div>Don</div>
                            </a>
                        </li>
                        <li class="sidenav-divider mb-1"></li>
                        <li class="sidenav-item">
                            <a href="index.php?page=paiement" class="sidenav-link">
                                <i class="fa fa-money-bill sidenav-icon"></i>
                                <div>Paiement</div>
                            </a>
                        </li>
                    <?php
                    }elseif(isset($_SESSION['sous'])){
                    ?>
                    <li class="sidenav-item">
                        <a href="index.php?page=dashboad" class="sidenav-link">
                            <i class="sidenav-icon feather icon-home"></i>
                            <div>Dashboards</div>
                            <div class="pl-1 ml-auto">
                                <div class="badge badge-danger">Hot</div>
                            </div>
                        </a>
                    </li>
                    <li class="sidenav-divider mb-1"></li>
                    <li class="sidenav-item">
                        <a href="index.php?page=transactions" class="sidenav-link">
                            <i class="fa fa-exchange-alt sidenav-icon "></i>
                            <div>Transaction</div>
                        </a>
                    </li>
                    <li class="sidenav-divider mb-1"></li>
                    <li class="sidenav-divider mb-1"></li>
                    <li class="sidenav-item">
                        <a href="index.php?page=trois" class="sidenav-link">
                            <i class="fa fa-user-circle sidenav-icon">  </i>
                            <div> Creer un sous admin</div>
                        </a>
                    </li>
                    <?php
                    }elseif(isset($_SESSION['trois'])){
                    ?>
                        <li class="sidenav-item">
                        <a href="index.php?page=trans" class="sidenav-link">
                            <i class="fa fa-exchange-alt sidenav-icon "></i>
                            <div>Transaction</div>
                            <div class="pl-1 ml-auto">
                                <div class="badge badge-danger"><i class="fa fa-exchange-alt"></i></div>
                            </div>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->
                <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-dark container-p-x" id="layout-navbar">

                    <!-- Brand demo (see assets/css/demo/demo.css) -->
                    <a href="index.html" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
                        <span class="app-brand-logo demo">
                            <img src="assets/img/logo-dark.png" alt="Brand Logo" class="img-fluid">
                        </span>
                        <span class="app-brand-text demo font-weight-normal ml-2">Empire</span>
                    </a>

                    <!-- Sidenav toggle (see assets/css/demo/demo.css) -->
                    <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
                        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
                            <i class="ion ion-md-menu text-large align-middle"></i>
                        </a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse" id="layout-navbar-collapse">
                        <!-- Divider -->
                        <hr class="d-lg-none w-100 my-2">

                        <div class="navbar-nav align-items-lg-center">
                            <!-- Search -->
                            <label class="nav-item navbar-text navbar-search-box p-0 active">
                                <i class="feather icon-search navbar-icon align-middle"></i>
                                <span class="navbar-search-input pl-2">
                                  <input type="text" class="form-control navbar-text mx-2" placeholder="Search...">
                                </span>
                            </label>
                        </div>

                        <div class="navbar-nav align-items-lg-center ml-auto">
                            <!-- Divider -->
                            <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>
                            <div class="demo-navbar-user nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                                        <i class="fa fa-user-circle" style="font-size:30px;"></i>
                                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0">
                                            <?php   
                                                if (isset($_SESSION['adminS'])) {
                                                    echo $_SESSION['adminS'];
                                                }elseif(isset($_SESSION['sous'])){
                                                    echo $_SESSION['sous'];
                                                }elseif(isset($_SESSION['trois'])){
                                                    echo $_SESSION['trois'];
                                                }else{
                                                    
                                                }

                                            ?>
                                           
                                        </span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="index.php?page=profil_adm" class="dropdown-item">
                                        <i class="feather icon-user text-muted"></i> &nbsp; Mon profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="index.php?page=destory" class="dropdown-item">
                                        <i class="feather icon-power text-danger"></i> &nbsp; Se deconnecter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- [ Layout navbar ( Header ) ] End -->

                <!-- [ Layout content ] Start -->
                

                    