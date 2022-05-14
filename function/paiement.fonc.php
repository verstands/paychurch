<?php
  function paye($nom, $icon, $lien){
    global $con;
    $tableau = array(
        'type_p' => $nom,
        'icon' => $icon,
        'lien_p' => $lien
    );
        if (isset($_SESSION['adminS'])) {
            $req = $con->prepare("INSERT INTO paiement(type_p, icon, lien_p, dates)VALUES(:type_p, :icon, :lien_p, NOW())");
            $req->execute($tableau);
            $resultat = $req->rowCount();
        }else{
            echo"<script>alert('icorrect !');</script>";
            ;
        }
  }

?>