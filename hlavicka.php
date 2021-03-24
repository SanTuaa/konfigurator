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

#prirazeni filtru k danemu typu zbozi
$filtr = array();
if ($typ == "cpu"):
	$filtr["1151"] = "Socket 1151";
	$filtr["1200"] = "Socket 1200";
	$filtr["AM4"] = "Socket AM4";
elseif ($typ == "chl"):
	$filtr["tichy"] = "Tichý větrák (pod 20 dB)";
elseif ($typ == "mbo"):
	$filtr["1151"] = "Socket 1151";
	$filtr["1200"] = "Socket 1200";
	$filtr["AM4"] = "Socket AM4";
	$filtr["ATX"] = "Formát ATX";
	$filtr["mATX"] = "Formát mATX";
elseif ($typ == "gpu"):
	$filtr["vykon"] = "Výkonná";
	$filtr["pamet"] = "Přes 4 GB grafické paměti";
elseif ($typ == "ram"):

elseif ($typ == "hdd"):

elseif ($typ == "pow"):

elseif ($typ == "cse"):

endif;

#asi by to chtelo neco podobneho pro trideni podle parametru, napr. velikosti uloziste
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
				<a href="."><img id="logo" src="./img/favicon_w.png"></a>
				<h1 id="bila"><?=TITLE?></h1>
				<h3 id="bila"><?=SUBTITLE;?></h3>
				<a href="./sestava.php"><div id="header_button">Moje sestava</div></a>
			</div>
			<div id="obsah">