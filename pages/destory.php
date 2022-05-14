<?php 
	if (isset($_SESSION['adminS']) AND !empty($_SESSION['adminS'])) {
        $suppresion = "UPDATE admin SET active = :active WHERE email = '{$_SESSION['adminS']}'";
        $a = $con->prepare($suppresion);
        $a->execute(array('active' => '0'));
     }elseif(isset($_SESSION['sous']) AND !empty($_SESSION['sous'])){
     	$suppresion = "UPDATE admin SET active = :active WHERE email = '{$_SESSION['sous']}'";
        $a = $con->prepare($suppresion);
        $a->execute(array('active' => '0'));
     }elseif(isset($_SESSION['trois']) AND !empty($_SESSION['trois'])){
     	$suppresion = "UPDATE administrateur SET active = :active WHERE email = '{$_SESSION['trois']}'";
        $a = $con->prepare($suppresion);
        $a->execute(array('active' => '0'));
     }
     $_SESSION = array();
	session_destroy();
	header('Location:index.php?page=login');
 ?>