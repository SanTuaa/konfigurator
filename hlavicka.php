<?php
session_start();
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
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Konfigurátor PC sestav</title>
	<link rel="stylesheet" href="./styles/default.css" type="text/css" media="all" />
	<link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon" />
</head>
	<body>
		<div id="telo">
			<div id="hlavicka">
				<a href="."><img id="logo" src="./img/favicon_w.png"></a>
				<h1 id="bila">Konfigurátor PC sestav</h1>
				<h3 id="bila">Šimonova nejdokonalejší seminárka</h3>
				<a href="./nova_sestava.php"><div id="sestava_button">Nová sestava</div></a>
			</div>
			<div id="obsah">