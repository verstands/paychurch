<?php 
$msg='';
function str_rount($leng){
    $string = 'azertyuioplkhfdsqwxcvbnAZERTYUIOPLKQSHDGFVBNCVCB123456789';
    return 'LIBAOO'.substr(str_shuffle(str_repeat($string, $leng)), 0,$leng);
}
        if(isset($_GET['reference'],$_GET['phone'],$_GET['amount'], $_GET['devise'])){
            if(!empty($_GET['reference']) && !empty($_GET['phone']) && !empty($_GET['amount']) && !empty($_GET['devise'])){
                $msg='Veuillez patienter et confirmer votre paiement en ligne sur le prochain popup sur votre téléphone';
                $reference= trim(htmlspecialchars($_GET['reference']));
                $phone= trim(htmlspecialchars($_GET['phone']));
                $amount= trim(htmlspecialchars($_GET['amount']));
                $devise= trim(htmlspecialchars($_GET['devise']));
                $data = array(
                    "merchant" => 'ELECTRAPPS',
                    "type" => 1,
                    "phone"=>$phone,
                    "reference" => $reference,
                    "amount" => $amount,
                    "currency" => $devise,
                    "callbackUrl" => 'callback.php?phone='.$phone,
                   );
                   $data = json_encode($data);
                   $gateway = "http://41.243.7.46:3006/api/rest/v1/paymentService";
                   $ch = curl_init();
                   curl_setopt($ch, CURLOPT_URL, $gateway);
                   curl_setopt($ch, CURLOPT_POST, true);
                   curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json","Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJcL2xvZ2luIiwicm9sZXMiOlsiTUVSQ0hBTlQiXSwiZXhwIjoxNzAxOTUyNDA1LCJzdWIiOiJjNjczODEzNmYzMzkzNTdjMzQ2NDM2N2RiZGUxMWQ2OSJ9.5HxqAAwkTRli4HCrFbsS4vODf6UrlLGXR4DCY1Hj6QY")); 
                   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
                   $response = curl_exec($ch);
                   if(curl_errno($ch)) {
                    $msg = 'Une erreur lors du traitement de votre requête';
                    
                   }else {
                    curl_close($ch);
                    $jsonRes = json_decode($response);
                    $code = $jsonRes->code;
                    if ($code != "0") {
                        header('location: erreur.php');
                    
                    }else{
                        $message = $jsonRes->message;
                        $orderNumber = $jsonRes->orderNumber;
                        }
                    }                       
                             
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api</title>
</head>
<body>
<div style="width: 100%;height: 100vh;display: flex;justify-content: center;align-items: center;">

        <div style="text-align: center;">
        <h1 style="text-align: center;font-family:sans-serif"><?= $msg; ?></h1>
        <img src="9151-loading-spinner.gif" alt="" style="width: 200px;">
        </div>
    </div>
    <script>
       const traitement = ()=>{
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "./traitement.ajax.php?phone=<?= $phone ?>&reference=<?= $reference;?>");
        xhr.addEventListener("readystatechange", () => {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let reponse = xhr.response;
                if (reponse.success === 1) {
                   document.location='response.php';
                }
                if(reponse.success === 2){
                    document.location='erreur.php';
                }
                 console.log(reponse);
            }
        });
        xhr.responseType = "json";
        xhr.send();

       }
       window.addEventListener('load',()=>{
                setInterval(()=>{
                    traitement()
            },1000)
       })
    </script>
    
</body>
</html>