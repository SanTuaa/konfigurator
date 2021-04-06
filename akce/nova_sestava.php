<?php
#sebere informace z formulare a vytvori sestavu uzivatele
include_once "../db.php";

#jmeno sestavy z formulare
$jmeno = $_POST['jmeno'];

#id uzivatele, ktere se napise k sestave
$id_u = $_SESSION['u'] ? $_SESSION['u'] : NULL;

#overeni, jestli je jmeno validni
if(strlen($jmeno) and strlen($jmeno)<=64):
	if($id_u):
		#uzivatel je prihlasen
		$q = "
	INSERT INTO 
		sestavy(jmeno, uzivatel)			
	VALUES
		('$jmeno', '$id_u');
	";

	else:
		#uzivatel neni prihlasen, v db bude null
		$q = "
	INSERT INTO 
		sestavy(jmeno)			
	VALUES
		('$jmeno');
	";
	endif;

	#zapise sestavu do db
	$q_link = mysqli_query($connection, $q);

	#druha query, ktera si najde id sestavy (posledni vytvorene)
	$q = "SELECT LAST_INSERT_ID() as id;";
	$q_link = mysqli_query($connection, $q);
	echo mysqli_error($connection);

	#id vytvorene sestavy si zapiseme do sessiony
	$z = mysqli_fetch_assoc($q_link);
	$_SESSION['s'] = $z['id'];

	#sestava byla prave vytvorena, uzivatel je vlastnik
	$_SESSION['owner'] = true;
	$_SESSION['msg'] = "Sestava byla úspěšně vytvořena, nyní můžete přidávat zboží.";
	header("Location: ../index.php?msg=true");
else:
	#v pripade, ze je jmeno prilis dlouhe/pole je prazdne
	$_SESSION['msg'] = "Sestava bohužel nemohla být vytvořena, zkuste jiné jméno.";
	#uzivatel zustane na stejne strance, zobrazi se mu msg
	header("Location: ../sestava.php?msg=true");
endif;

?>