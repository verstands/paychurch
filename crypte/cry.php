<meta charset="utf-8">
<?php 
	function crypts($par){
		//miniscul
		$cryptage = MySQLi($par);
		$cryptage = str_replace('1', 'Az', $cryptage);
		$cryptage = str_replace('2', 'By', $cryptage);
		$cryptage = str_replace('3', 'cX', $cryptage);
		$cryptage = str_replace('4', 'dw', $cryptage);
		$cryptage = str_replace('5', 'ET', $cryptage);
		$cryptage = str_replace('6', 'Fo', $cryptage);
		$cryptage = str_replace('7', 'gp', $cryptage);
		$cryptage = str_replace('8', 'hi', $cryptage);
		$cryptage = str_replace('9', 'lN', $cryptage);
		$cryptage = str_replace('0', 'Qr', $cryptage);
		//MAJUSCUL
		return $cryptage;

	}
	//decryptage
	function BTCcrypt($par){
		$cryptage = mysql_real_escape_string($par);
		$cryptage = str_replace('←', '1', $cryptage);
		$cryptage = str_replace('∟', '2', $cryptage);
		$cryptage = str_replace('↔', '3', $cryptage);
		$cryptage = str_replace('▲', '4', $cryptage);
		$cryptage = str_replace('▼', '5', $cryptage);
		$cryptage = str_replace('<', '6', $cryptage);
		$cryptage = str_replace('>', '7', $cryptage);
		$cryptage = str_replace('#', '8', $cryptage);
		$cryptage = str_replace('%', '9', $cryptage);
		$cryptage = str_replace('0', '0', $cryptage);
		//MAJUSCUL
		return $cryptage;
		return $CRY;

	}
 ?>