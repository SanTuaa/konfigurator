<?php
include_once "../db.php";

$jmeno = $_POST['jmeno'];
$q = "
	INSERT INTO 
		sestavy(jmeno)			
	VALUES
		('$jmeno');
	";

if(strlen($jmeno) and strlen($jmeno)<=20):
	$q_link = mysqli_query($connection, $q);
	$q = "SELECT LAST_INSERT_ID() as id;";
	$q_link = mysqli_query($connection, $q);
	echo mysqli_error($connection);
	$z = mysqli_fetch_assoc($q_link);
	$_SESSION['s'] = $z['id'];
	$_SESSION['owner'] = true;
	$_SESSION['msg'] = "Sestava byla úspěšně vytvořena. Nyní můžete přidávat zboží.";
	header("Location: ../index.php?msg=true");
else:
	$_SESSION['msg'] = "Sestava bohužel nemohla být vytvořena, zkuste jiné jméno.";
	header("Location: ../sestava.php?msg=true");
endif;

?>