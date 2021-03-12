<?php

include_once "./db.php";

$komponenty = array(
	"cpu" => "Procesory",
	"chl" => "Chladiče",
	"mbo" => "Základní desky",
	"gpu" => "Grafické karty",
	"ram" => "Paměti RAM",
	"hdd" => "Pevné disky",
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
				<a href="."><img id="logo" src="./img/favicon_w.png"></a>
				<h1 id="bila"><?=TITLE?></h1>
				<h3 id="bila"><?=SUBTITLE;?></h3>
				<a href="./sestava.php"><div id="header_button">Moje sestava</div></a>
			</div>
			<div id="obsah">