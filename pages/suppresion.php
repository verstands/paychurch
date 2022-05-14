<?php
    if (isset($_GET['eglise']) AND !empty($_GET['eglise'])) {
        $suppresion = "DELETE FROM eglise WHERE id_eg = :id_eg";
        $a = $con->prepare($suppresion);
        $a->execute(array('id_eg' => $_GET['eglise']));
        header('Location:index.php?page=aff_eglise');
    }
    if (isset($_GET['des']) AND !empty($_GET['des'])) {
        $suppresion = "UPDATE eglise SET active = :active WHERE id_eg = '{$_GET['des']}'";
        $a = $con->prepare($suppresion);
        $a->execute(array('active' => '2'));
        header('Location:index.php?page=aff_eglise');
    }
    if (isset($_GET['act']) AND !empty($_GET['act'])) {
        $suppresion = "UPDATE eglise SET active = :active WHERE id_eg = '{$_GET['act']}'";
        $a = $con->prepare($suppresion);
        $a->execute(array('active' => '1'));
        header('Location:index.php?page=aff_eglise');
    }
    if (isset($_GET['adm']) AND !empty($_GET['adm'])) {
        $suppresion = "DELETE FROM admin WHERE id_admin = :id_admin";
        $a = $con->prepare($suppresion);
        $a->execute(array('id_admin' => $_GET['adm']));
        header('Location:index.php?page=adm');
    }
    if (isset($_GET['admS']) AND !empty($_GET['admS'])) {
        $suppresion = "DELETE FROM administrateur WHERE id_admin = :id_admin";
        $a = $con->prepare($suppresion);
        $a->execute(array('id_admin' => $_GET['admS']));
        header('Location:index.php?page=admS');
    }
    if (isset($_GET['devise']) AND !empty($_GET['devise'])) {
        $suppresion = "DELETE FROM admin WHERE id_devise = :id_devise";
        $a = $con->prepare($suppresion);
        $a->execute(array('id_devise' => $_GET['devise']));
        header('Location:index.php?page=aff_devise');
    }
    if (isset($_GET['off']) AND !empty($_GET['off'])) {
        $suppresion = "DELETE FROM offrande WHERE id_off = :id_off";
        $a = $con->prepare($suppresion);
        $a->execute(array('id_off' => $_GET['off']));
        header('Location:index.php?page=aff_offrande');
    }
    if (isset($_GET['paye']) AND !empty($_GET['paye'])) {
        $suppresion = "DELETE FROM paiement WHERE id_paiement = :id_paiement";
        $a = $con->prepare($suppresion);
        $a->execute(array('id_paiement' => $_GET['paye']));
        header('Location:index.php?page=aff_paiement');
    }
?>