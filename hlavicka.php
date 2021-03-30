<?php

include_once "./db.php";

#jednotlive druhy komponent
$komponenty = array(
	"cpu" => "Procesory",
	"chl" => "Chladiče",
	"mbo" => "Základní desky",
	"gpu" => "Grafické karty",
	"ram" => "Paměti RAM",
	"hdd" => "Úložiště",
	"pow" => "Zdroje",
	"cse" => "Počítačové skříně"
);
define('TITLE','KonfiguraTHOR');
define('SUBTITLE','Konfigurátor PC sestav');

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=TITLE?></title>
	<link rel="stylesheet" href="./styles/default.css" type="text/css" media="all" />
	<link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon" />
</head>
	<body>
		<div id="telo">
			<div id="hlavicka">
				<a href="."><img id="banner" src="./img/banner.png"></a>
				<div style="overflow: hidden;">	
					<a href="./sestava.php"><div id="header_button">Moje sestava</div></a>
					<a href="./user.php"><img id="uzivatel" src="./img/uzivatel.png"></a>
				</div>
			</div>
			<div id="obsah">