<?php
  function eglise($login, $password){
    global $con;
    $tableau = array(
        'login' => $login,
        'password' => $password
    );
        if (isset($_SESSION['adminS'])) {
            $req = $con->prepare("UPDATE admin SET login = :login, password = :password WHERE email = '{$_SESSION['adminS']}' ");
            $req->execute($tableau);
            $resultat = $req->rowCount();
        }else{
            header('Location:index.php?page=login');
        }
  }

?>