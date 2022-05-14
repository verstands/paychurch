<?php   
    include'main.fonc.php';
    function login($user, $password){
        global $con;
        $tableau = array(
            'login' => $user,
            'password' => $password
        );
    }
    $req = $con->prepare("SELECT id_admin FROM admin WHRE login = :login AND password = :password " );
    $req->execute($tableau);
    $resultat = $req->rowCount();
    return $resultat;
?>