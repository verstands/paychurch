<?php
function francais()
{
	return setlocale(LC_ALL, 'fr_FR');
}
function convertionFrench()
{
	global $connect;
	$con = $connect->query('SET lc_time_names = fr_FR');
}
function tableauWithAnd($tab)
{
	$rec = ' ';
	for ($i = 0, $c = count($tab); $i < $c; $i++) {
		$rec .= $tab[$i] . '= ? ';
		$rec .= 'AND ';
	}
	return $rec;
}

function tableauWithVirgule($tab)
{
	$rec = ' ';
	for ($i = 0, $c = count($tab); $i < $c; $i++) {
		$rec .= $tab[$i] . '= ? ';
		$rec .= ', ';
	}
	return $rec;
}
function extension($fichier)
{
	return strtolower(substr(strrchr($_FILES[$fichier]['name'], '.'), 1));
}
// upload un fichier
function uploadFile($file, $nomfichier, $emplacement = 'upload/', $taille = 2048000, $extension = ['png', 'jpeg', 'jpg', 'gif', 'webp'])
{
	$lien = $nomfichier;
	$url = $emplacement . $lien;
	if ($_FILES[$file]['size'] <= $taille) {
		if (in_array($extension_upload, $extension)) {
			if (@move_uploaded_file($_FILES[$file]['tmp_name'], $url)) {
				return true;
			} else return 'Erreur lors de l\'ajout du fichier';
		} else return 'Extension du fichier non valide';
	} else return 'la taille du fichier trop volumineux';
}
function tableauWithVirguleAnd($tab)
{
	$rec = ' ';
	for ($i = 0, $c = count($tab); $i < $c; $i++) {
		$rec .= $tab[$i] . '=' . $tab[$i] . '- ? ';
		$rec .= ', ';
	}
	return $rec;
}
//connexion a la base de donnee
function Manager($dbname, $host = 'localhost', $user = 'root', $password = '')
{
	try {
		$connect = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $connect;
	} catch (PDOException $e) {
		die('Erreur : ' . $e->getMessage());
	}
}
//requete
function query_u($req)
{
	global $connect;
	$don = $connect->query($req);
	return (bool) $don;
}
//empecher l'injection sql
function entyInject($elem)
{
	return trim(htmlspecialchars($elem));
}
//compresse une image
function compress_image($source_url, $destination_url, $quality)
{

	$info = getimagesize($source_url);

	if ($info['mime'] == 'image/jpeg')
		$image = imagecreatefromjpeg($source_url);

	elseif ($info['mime'] == 'image/gif')
		$image = imagecreatefromgif($source_url);

	elseif ($info['mime'] == 'image/png')
		$image = imagecreatefrompng($source_url);

	imagejpeg($image, $destination_url, $quality);
	return $destination_url;
}

// les clause de selection
//verifie si une table contient des informations
function fieldTable($table)
{
	global $connect;
	$find = $connect->query("SELECT COUNT(*) FROM " . $table);
	$getFind = $find->fetchColumn();
	if ($getFind > 0)
		return true;
	else
		return false;
}
function fieldTableSUM($table, $col, $clause = '')
{
	global $connect;
	$find = $connect->query("SELECT SUM($col) FROM " . $table . " " . $clause);
	$getFind = $find->fetchColumn();
	if ($getFind > 0)
		return $getFind;
}
function fieldTableSUMWhereC($table, $col, $clause, $data)
{
	global $connect;
	$cl = tableauWithAnd($clause);
	$find = $connect->prepare("SELECT SUM($col) FROM " . $table . " WHERE " . $cl);
	$find->execute($data);
	$getFind = $find->fetchColumn();
	if ($getFind > 0)
		return $getFind;
}
function fieldTableNum($table, $clause = '')
{
	global $connect;
	$find = $connect->query("SELECT COUNT(*) FROM " . $table . " " . $clause);
	$getFind = $find->fetchColumn();
	if ($getFind > 0)
		return $getFind;
}
//verifie l'existance d'un champs
function fieldColumnNum($table, $champ, $element, $clause = '')
{
	global $connect;

	$rec = tableauWithAnd($champ);

	$req = "SELECT COUNT(*) FROM " . $table . " WHERE " . substr($rec, 0, -4) . ' ' . $clause;
	$find = $connect->prepare($req);
	$find->execute($element);
	$getFind = $find->fetchColumn();
	if ($getFind > 0)
		return true;
	else
		return false;
}
//compte le nombre de colonne trouver par rapport à d'un element

function fieldCountNum($table, $champ, $element, $clause = '')
{
	global $connect;

	$rec = tableauWithAnd($champ);

	$req = "SELECT COUNT(*) FROM " . $table . " WHERE " . substr($rec, 0, -4) . ' ' . $clause;
	$find = $connect->prepare($req);
	$find->execute($element);
	$getFind = $find->fetchColumn();
	if ($getFind > 0)
		return $getFind;
}
//retourne la somme par rapport a un champ

function fieldColumnSum($table, $sum, $champ, $element)
{
	global $connect;

	$rec = tableauWithAnd($champ);

	$req = "SELECT SUM($sum) FROM " . $table . " WHERE " . substr($rec, 0, -4);
	$find = $connect->prepare($req);
	$find->execute($element);
	$getFind = $find->fetchColumn();
	if ($getFind > 0)
		return $getFind;
}
//recuperer toute les colonnes
function getAllColumnsWhereC($table, $elementName, $valueElement, $clause = '', $colns = '*')
{
	global $connect;

	$rec = tableauWithAnd($elementName);

	if ($colns != '*') $coln = implode(",", $colns);
	else $coln = '*';

	$req = "SELECT " . $coln . " FROM " . $table . " WHERE " . substr($rec, 0, -4) . ' ' . $clause;
	$find = $connect->prepare($req);
	$find->execute($valueElement);
	return $find;
}

//return une liste des colonne par rapport a une table

function getAllColumns($table, string $clause = '', $colns = '*')
{
	global $connect;

	if ($colns != '*') $coln = implode(",", $colns);
	else $coln = '*';

	$find = $connect->query("SELECT " . $coln . " FROM " . $table . " " . $clause);
	return $find;
}

//les transactions

// les actions de la transaction
function startTransaction()
{
	global $connect;
	$trans = $connect->query('START TRANSACTION');
}
function commitTransaction()
{
	global $connect;
	$com = $connect->query('COMMIT');
}
function rollbackTransaction()
{
	global $connect;
	$roll = $connect->query('ROLLBACK');
}

//l'aleatoire
function str_random($lenght)
{
	$string = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
	return substr(str_shuffle(str_repeat($string, $lenght)), 0, $lenght);
}

// insertion informations sur la table
# Insert Data 
function Insert($table, $column, $data, $don)
{

	global $connect;

	$req = "INSERT INTO $table (" . implode(",", $column) . ") VALUES(" . implode(",", $data) . ")";
	$ins = $connect->prepare($req);
	$ins->execute($don);
	if ($ins) return true;
}
//insertion avec sous requete
function insertReq($table, $column, $data, $table2, $element, $rep, $don)
{
	global $connect;
	$req = " INSERT INTO $table (" . implode(",", $column) . ") SELECT " . implode(",", $data) . " FROM $table2 WHERE $element = $rep";
	$ins = $connect->prepare($req);
	$ins->execute($don);
	if ($ins) return true;
}

//suppression

function supColumn($table, $column, $value)
{
	global $connect;
	$rec = tableauWithAnd($column);

	$req = "DELETE FROM " . $table . " WHERE " . substr($rec, 0, -4);
	$ins = $connect->prepare($req);
	$ins->execute($value);
	if ($ins) return true;
}
function supStock($table, $column, $clauseVal, $value)
{
	global $connect;
	$rec = tableauWithAnd($clauseVal);
	$res = tableauWithVirguleAnd($column);
	$req = "UPDATE " . $table . " SET " . substr($res, 0, -2) . " WHERE " . substr($rec, 0, -4);
	$ins = $connect->prepare($req);
	$ins->execute($value);
	if ($ins) return true;
}

//mise a jour

function modColumn($table, $column, $clauseVal, $value)
{
	global $connect;
	$rec = tableauWithAnd($clauseVal);
	$res = tableauWithVirgule($column);
	$req = "UPDATE " . $table . " SET " . substr($res, 0, -2) . " WHERE " . substr($rec, 0, -4);
	$ins = $connect->prepare($req);
	$ins->execute($value);
	if ($ins) return true;
}

function note($nb)
{
	switch ($nb) {
		case 1:
			echo '
					<i class="py-1 fas fa-star amber-text"></i>
					<i class="py-1 fas fa-star-o amber-text"></i>
					<i class="py-1 fas fa-star-o amber-text"></i>
					<i class="py-1 fas fa-star-o amber-text"></i>
					<i class="py-1 fas fa-star-o amber-text"></i>
				';
			break;
		case 2:
			echo '
					<i class="py-1 fas fa-star amber-text"></i>
					<i class="py-1 fas fa-star amber-text"></i>
					<i class="py-1 fas fa-star-o amber-text"></i>
					<i class="py-1 fas fa-star-o amber-text"></i>
					<i class="py-1 fas fa-star-o amber-text"></i>
				';
			break;
		case 3:
			echo '
					<i class="py-1 fas fa-star amber-text"></i>
					<i class="py-1 fas fa-star amber-text"></i>
					<i class="py-1 fas fa-star amber-text"></i>
					<i class="py-1 fas fa-star-o amber-text"></i>
					<i class="py-1 fas fa-star-o amber-text"></i>
				';
			break;
		case 4:
			echo '
						<i class="py-1 fas fa-star amber-text"></i>
						<i class="py-1 fas fa-star amber-text"></i>
						<i class="py-1 fas fa-star amber-text"></i>
						<i class="py-1 fas fa-star amber-text"></i>
						<i class="py-1 fas fa-star-o amber-text"></i>
					';
			break;
		case 5:
			echo '
					<i class="py-1 fas fa-star amber-text"></i>
					<i class="py-1 fas fa-star amber-text"></i>
					<i class="py-1 fas fa-star amber-text"></i>
					<i class="py-1 fas fa-star amber-text"></i>
					<i class="py-1 fas fa-star amber-text"></i>
				';
			break;


		default:
			# code...
			break;
	}
}
