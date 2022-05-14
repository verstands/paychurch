<?php
  function devise($type_d){
    global $con;
    $tableau = array(
        'type_d' => $type_d,
    );
        if (isset($_SESSION['adminS'])) {
            $req = $con->prepare("INSERT INTO devise(type_d, dates)VALUES(:type_d, NOW())");
            $req->execute($tableau);
            $resultat = $req->rowCount();
        }else{
            echo"<script>alert('incorrect!');</script>";
            ;
        }
  }

?>