<?php 
	$localhost = "localhost";
	$dbname = "eglise";
	$user = "root";
	$password = "";
	try {
		$con = new PDO('mysql:host='.$localhost.';dbname='.$dbname, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	} catch (Exception $e) {
		die("erreur est souvenue lores de la connexion a la base de donnee");
	}
 ?>