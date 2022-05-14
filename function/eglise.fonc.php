<?php
  function eglise( $nom, $logo, $des ){
    global $con;
    $tableau = array(
        'nom' => $nom,
        'logo' => $logo,
        'des' => $des
    );
    if (!empty($_FILES)){
        $logo = $_FILES['logo']['name'];
        $ext = strrchr($logo, '.');
        $extention = array('.png', '.PNG', '.icon', '.JPG', '.jpg', '.JPEG');
        $chan = $_FILES['logo']['tmp_name'];
        $shnx = 'images/logo/'.$logo;
        if (in_array($ext, $extention)) {
            if (move_uploaded_file($chan, $shnx)) {
                $req = $con->prepare("INSERT INTO eglise(nom, logo, des, active, dates)VALUES(:nom, :logo, :des,'1',  NOW())");
                $req->execute($tableau);
                $resultat = $req->rowCount();
            }
            
        }
    }
  }
  function historique($nom, $logo){
    global $con;
    $tableau = array(
        '	description' => $nom,
        'icon' => $logo
    );
    if (!empty($_FILES)){
        $logo = $_FILES['logo']['name'];
        $ext = strrchr($logo, '.');
        $extention = array('.png', '.PNG', '.icon', '.JPG', '.jpg', '.JPEG');
        $chan = $_FILES['logo']['tmp_name'];
        $shnx = 'images/logo/'.$logo;
        if (in_array($ext, $extention)) {
            if (move_uploaded_file($chan, $shnx)) {
                $req = $con->prepare("INSERT INTO historique(	description, icon, dates)VALUES(:	description, :icon, NOW())");
                $req->execute($tableau);
                $resultat = $req->rowCount();
            }
            
        }
    }
  }
  function modification($nom, $logo, $des){
    global $con;
    $tableau = array(
        'nom' => $nom,
        'logo' => $logo,
        'des' => $des
    );
    if (!empty($_FILES)){
      $logo = $_FILES['logo']['name'];
      $ext = strrchr($logo, '.');
      $extention = array('.png', '.PNG', '.icon', '.JPG', '.jpg', '.JPEG');
      $chan = $_FILES['logo']['tmp_name'];
      $shnx = 'images/logo/'.$logo;
      if (in_array($ext, $extention)) {
          if (move_uploaded_file($chan, $shnx)) {
            if (isset($_SESSION['adminS'])) {
              $req = $con->prepare("UPDATE admin SET logo = :logo, nom = :nom, des = :des WHERE email = '{$_SESSION['adminS']}' ");
              $req->execute($tableau);
              $resultat = $req->rowCount();
            }else{
                header('Location:index.php?page=login');
            }  
          }  
    }}
  }
  function str_random($lenght)
    {
        $string='qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
        return substr(str_shuffle(str_repeat($string, $lenght)), 0,$lenght);
    }
   
    function lien($lien){
      global $con;
      $tableau = array(
          'lien' => $lien
      );
      $suppresion = "UPDATE eglise SET lien = :lien WHERE id_eg = '$lien'";
        $a = $con->prepare($suppresion);
        $a->execute(array('lien' =>$lien));
    }
?>