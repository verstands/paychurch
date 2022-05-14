<?php
  function trans($number, $montant){
    global $con;
    $tableau = array(
        'user' => $type_d,
        'montant' => $type_d,
        'id_devise' => $type_d,
        'id_eg' => $type_d,
        'id_off' => $type_d,
        'id_paiement' => $type_d,
    );
        
        $req = $con->prepare("INSERT INTO transaction(user, monatant, id_devise, id_eg, id_off, id_paiement,dates)VALUES(:user, :monatant, 'USD', '$_SESSION['id']', '$_SESSION['t']', '$_SESSION['t']', NOW())");
        $req->execute($tableau);
        $resultat = $req->rowCount();
  }

?>