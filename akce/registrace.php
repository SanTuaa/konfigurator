<?php
#sebere informace z formulare a registruje uzivatele
include_once "../db.php";

#jmeno, heslo a rezervni heslo z formulare
$nick = $_POST['nick'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];

#overeni, jestli je vsechno v poradku a registrace muze probehnout
$continue = true;

#najdeme si, jestli uzivatel s timto jmenem uz neexistuje
$q = "SELECT id FROM uzivatele WHERE uzivatele.nick = '$nick'";
$q_link = mysqli_query($connection, $q);
echo mysqli_error($connection);
$nick_exists = mysqli_fetch_assoc($q_link);

#jmeno neni validni
if(!strlen($nick) or strlen($nick)>64):
	$continue = false;
	$msg = "Zadejte prosím validní uživatelské jméno.";

#jmeno neni unikatni
elseif($nick_exists):
	$continue = false;
	$msg = "Uživatel s tímto jménem již existuje.";

#heslo je kratke/dlouhe
elseif(strlen($pw)<8 or strlen($pw)>64):
	$continue = false;
	$msg = "Heslo musí obsahovat mezi 8 a 64 znaky.";

#heslo neobsahuje prislusne znaky
elseif(!preg_match('/[A-Z]/', $pw) or !preg_match('/[a-z]/', $pw) or !preg_match('/[0-9]/', $pw)):
	$continue = false;
	$msg = "Heslo musí obsahovat velké písmeno, malé písmeno a číslo.";

#hesla se neshoduji
elseif ($pw != $pw2):
	$continue = false;
	$msg = "Zadaná hesla se neshodují.";
endif;
#pokud je continue stale true, registrace muze pokracovat

if($continue):
	#query posle heslo do db a prozene ho sifrovanim MD5
	$q = "
	INSERT INTO 
		uzivatele(nick, heslo)			
	VALUES
		('$nick', MD5( '$pw' ));
	";

	#zapise uzivatele do db
	$q_link = mysqli_query($connection, $q);

	#druha query, ktera si najde id uzivatele (posledni vytvorene)
	$q = "SELECT LAST_INSERT_ID() as id;";
	$q_link = mysqli_query($connection, $q);
	echo mysqli_error($connection);

	#id vytvoreneho uzivatele si zapiseme do sessiony
	$z = mysqli_fetch_assoc($q_link);
	$_SESSION['u'] = $z['id'];

	#pokud mam otevrenou sestavu a jsem vlastnik, zapisu se do db jako autor
	#NEDODELANE NENECHAVEJ TO TAKTO NEBUDE TO FUNGOVAT
	if($_SESSION['s'] and $_SESSION['owner']):
		$q = "
	INSERT INTO 
		sestavy(uzivatel)
	WHERE

	VALUES
		('$z["id"]');
	";
	#$q_link = mysqli_query($connection, $q);
	echo mysqli_error($connection);
	endif;	

	header("Location: ../user.php");

else:
	#uzivatel neco pokazil, vratime ho zpatky do registrace

	#v poli pro nick by melo zustat to, co tam bylo (heslo uzivatel napise znovu)
	$_SESSION['nick_reg'] = $nick;
	$_SESSION['msg'] = $msg;
	header("Location: ../user.php?msg_r=true");
endif;