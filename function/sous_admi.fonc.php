<?php
  function eglise($login, $password, $email, $eglise ){
    global $con;
    $tableau = array(
        'login' => $login,
        'password' => $password,
        'email' => $email,
        'id_eg' => $eglise
    );
        if (isset($_SESSION['adminS'])) {
            $req = $con->prepare("INSERT INTO admin(login, type_admi, password, email, active, id_eg, dates)VALUES(:login, '2', :password, :email, '0', :id_eg, NOW())");
            $req->execute($tableau);
            $resultat = $req->rowCount();
        }else{
            echo"<script>alert('Vous venez de crée un administrateur !');</script>";
            ;
        }
  }

?>
<?php
  function egliseS($login, $password, $email, $eglise ){
    global $con;
    $tableau = array(
        'login' => $login,
        'password' => $password,
        'email' => $email,
        'id_eg' => $eglise
    );
        if (isset($_SESSION['sous'])) {
            $req = $con->prepare("INSERT INTO administrateur(login, type_admi, password, email, active, id_eg, admin, dates)VALUES(:login, '2', :password, :email, '0', :id_eg,'{$_SESSION['sous']}', NOW())");
            $req->execute($tableau);
            $resultat = $req->rowCount();
        }else{
            echo"<script>alert('Vous venez de crée un administrateur !');</script>";
            ;
        }
  }

?>