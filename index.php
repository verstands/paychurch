<?php 
    include"function/main.fonc.php";
	$pages = scandir('pages/');
    if(isset($_GET['page']) && !empty($_GET['page'])){
        if(in_array($_GET['page'].'.php',$pages)){
            $page = $_GET['page'];
        }else{
            $page = "error";
        }
    }elseif(!isset($_GET['page'])) {
        $page = "login";
    }else{
        $page = "error";
    }
 ?>
 <?php session_start(); ?>
<?php include"body/header.php"; ?>

<div class="page-loader">
    <div class="bg-primary"></div>
</div>
<div class="layout-wrapper layout-2">
    <div class="layout-inner">
        
        <?php include'pages/'.$page.'.php';  ?>
        <script>
            $(document).on('ready', function() {
                var table = $('#dataTable').DataTable({
                    data: table
                });
            });
        </script>
        <?php include"body/footer.php"; ?>
    </div>
</div>