<?php
  
        $tableau = array(
            'user' => $_POST['phone'],
            'montant' => $_GET['phone'],
            'id_devise' => $_GET['devise'],
            'id_eg' => $_SESSION['id'],
            'id_off' => $_SESSION['t'],
            'id_paiement' => $_SESSION['p'],
        );
        $req = $con->prepare("INSERT INTO transaction(user, monatant, id_devise, id_eg, id_off, id_paiement,dates)VALUES(:user, :monatant, , '$_SESSION['id']', '$_SESSION['t']', '$_SESSION['p']', NOW())");
        $req->execute($tableau);
        $resultat = $req->rowCount();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etrapps</title>
</head>

<body>
    <div style="width: 100%;height: 100vh;display: flex;justify-content: center;align-items: center;">
        <div style="text-align: center;">
            <script>alert('PAIEMENT EFFECTUEZ AVEC SUCCES');</script>
            <h3 style="font-family: sans-serif;">PAIEMENT EFFECTUEZ AVEC SUCCES</h3>
            <img src="10355-loading-success.gif" alt="" srcset="">
        </div>
    </div>
</body>

</html>