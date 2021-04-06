<?php
#sebere informace z formulare a prihlasi uzivatele
include_once "../db.php";

#jmeno a heslo z formulare
$nick = $_POST['nick'];
$pw = $_POST['pw'];

#pomoci query si vyhledame zahashovane heslo
$q = "SELECT heslo FROM uzivatele WHERE uzivatele.nick = '$nick'";
$q_link = mysqli_query($connection, $q);
echo mysqli_error($connection);
$pw_real = mysqli_fetch_assoc($q_link);
$pw_real = $pw_real['heslo'];

#overeni, jestli je vsechno v poradku a prihlaseni muze probehnout
$continue = true;

#jmeno neni validni
if(!strlen($nick) or strlen($nick)>64):
	$continue = false;
	$msg = "Zadejte prosím validní uživatelské jméno.";

#uzivatel neexistuje
elseif(!$pw_real):
	$continue = false;
	$msg = "Uživatel s tímto jménem neexistuje.";

#nesedi heslo
elseif($pw_real != md5($pw)):
	$continue = false;
	$msg = "Zadali jste nesprávné heslo.";

endif;

#pokud true, probehne prihlaseni
if($continue):
	#najdeme si id uctu, do ktereho se uzivatel prihlasil
	$q = "SELECT id FROM uzivatele WHERE uzivatele.nick = '$nick'";
	$q_link = mysqli_query($connection, $q);
	echo mysqli_error($connection);
	$z = mysqli_fetch_assoc($q_link);

	#id zapiseme do sessiony
	$_SESSION['u'] = $z['id'];

	#uzivatel je navracen
	header("Location: ../user.php");
else:
	#uzivatel neco pokazil, vratime ho zpatky na login

	#v poli pro nick by melo zustat to, co tam bylo (heslo uzivatel napise znovu)
	$_SESSION['nick'] = $nick;
	$_SESSION['msg'] = $msg;
	header("Location: ../user.php?msg=true");
endif;