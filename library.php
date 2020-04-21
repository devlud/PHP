<?php

function html_header($titre="") {
	return <<<BLOC_HTML
	<!DOCTYPE html>
	<html lang="fr">
	<head>
		<title>{$titre}</title>
	</head>
	<body>\n
BLOC_HTML;
}

/*
 * variante 
function html_header($titre="") {
	return '<!DOCTYPE html>
	<html lang="fr">
	<head>
		<title>'.$titre.'</title>
	</head>
	<body>';
}
*/
function html_footer() {
	return <<<BLOC_HTML
</body>
</html>
BLOC_HTML;
}

function gen_input($nom, $libelle, $value="") {
	echo <<<BLOC_HTML
	<label>$libelle</label><br>
	<input name="$nom" id="$nom" value="$value" /><br>\n
BLOC_HTML;
}

function dbconnect() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = 'test';

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully"; 
		$conn->query("SET NAMES utf8");
		
		}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	return $conn ;
}
