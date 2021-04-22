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
define('DESCRIPTION','KonfiguraTHOR je open source konfigurátor počítačových sestav, vytvořený jako seminární práce. Uživatelé zde mohou vytvářet své sestavy a následně je sdílet.');

?>

<!DOCTYPE html>
<html lang="cs">
<head>
	<!-- OBECNE -->
	<title><?php echo TITLE;?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="<?php echo DESCRIPTION;?>">
	<meta name="author" content="Šimon Růžička">

	<!-- OPEN GRAPH -->
	<meta property="og:title" content="<?php echo ($og) ? 'Moje sestava na KonfiguraTHORu' : TITLE.' - '.SUBTITLE;?>" />
	<meta property="og:description" content="<?php echo DESCRIPTION;?>" />
	<meta property="og:image" content="http://konfigurathor.wz.cz/img/banner_og.png" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://konfigurathor.wz.cz<?php echo ($og) ? '/sestava.php' :'';?>">
	
	<!-- VZHLED STRANKY -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./styles/default.css" type="text/css" media="all" />
	<link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon" />
</head>
	<body>
		<div id="hlavicka">
			<a href="."><img id="banner" src="./img/banner.png"></a>
			<div style="overflow: hidden;">	
				<a href="./sestava.php">
					<div class="btn header">Moje sestava</div>
					<img id="sestava" alt="Sestava" src="./img/sestava.png" />
				</a>
				<a href="./user.php">
					<img id="uzivatel" alt="Uživatel" src="./img/uzivatel.png" />
				</a>
			</div>
		</div>
		<div id="obsah">