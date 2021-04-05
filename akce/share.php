<?php 
include_once "../db.php";

$id = $_GET['id'];


$_SESSION['s'] = $id;
$_SESSION['owner'] = false;
header("Location: ../sestava.php");

define('DESCRIPTION','KonfiguraTHOR je open source konfigurátor počítačových sestav, vytvořený jako seminární práce. Uživatelé zde mohou vytvářet své sestavy a následně je sdílet.'); ?>
<!--
<!DOCTYPE html>
<html lang="cs">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="<?php echo DESCRIPTION;?>">
	<meta name="author" content="Šimon Růžička">
	
	<meta property="og:title" content="Moje sestava na KonfiguraTHORu" />
	<meta property="og:description" content="<?php echo DESCRIPTION;?>" />
	<meta property="og:image" content="http://konfigurathor.wz.cz/img/banner_og.png" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://konfigurathor.wz.cz/akce/share.php" />

	<title>Moje sestava na KonfiguraTHORu</title>
	<link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon" />
	<meta http-equiv="refresh" content="0; URL=http://konfigurathor.wz.cz/sestava.php" />

</head>
<body>	
</body>
</html>
-->