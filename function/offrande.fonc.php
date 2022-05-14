<?php
  function offrande($type_d, $id_eg){
    global $con;
    $tableau = array(
        'type_off' => $type_d,
        'id_eg' => $id_eg
    );
        if (isset($_SESSION['adminS'])) {
            $req = $con->prepare("INSERT INTO offrande(type_off,id_eg, dates)VALUES(:type_off,:id_eg, NOW())");
            $req->execute($tableau);
            $resultat = $req->rowCount();
        }else{
            echo"<script>alert('l'action a ete bien fait !');</script>";
            ;
        }
  }

?>