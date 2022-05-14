<?php
require_once('api/akajo.api.php');
require_once('api/database.php');

$data = file_get_contents('php://input');
$json = json_decode($data, true);
$reference = $json['reference'];
$code = $json['code'];
$provider_reference = $json['provider_reference'] ;
$orderNumber = $json['orderNumber'];

if(isset($_GET['phone'])){
    $user= (int) trim(htmlspecialchars($_GET['phone']));
    if(Insert('api_pay',['phone','reference','date_pay','status'],['?','?','NOW()','?'],[$user,$reference,$code])){
        $msg='enregistrement reussi';
    }
}

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "code : ".$json['code']."\n";
$txt.=' reference : '.$json['reference']."\n";
$txt.=' provider_reference : '.$json['provider_reference'] ;
$txt.=' orderNumber : '.$json['orderNumber'];
fwrite($myfile, $txt);
fclose($myfile);

?>