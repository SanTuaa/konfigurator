<?php
include_once "../db.php";

$id_k = $_GET['id'];
$id_s = $_SESSION['s'];

$q = "
	SELECT
		COUNT(id) AS pocet
	FROM
		sestavy_komp
	WHERE
		sestavy_komp.id_komponenty = '$id_k'
		AND sestavy_komp.id_sestavy = '$id_s'
";
$search = mysqli_fetch_assoc(mysqli_query($connection, $q));
if(!$search['pocet'] and $id_s):
	$q = "
		INSERT INTO 
			sestavy_komp(id_komponenty, id_sestavy)			
		VALUES
			('$id_k', '$id_s');
		";
	$q_link = mysqli_query($connection, $q);
	echo mysqli_error($connection);

	$_SESSION['pridano'] = $id_k;
	$q = "SELECT komponenty.vyrobce, komponenty.jmeno FROM komponenty WHERE komponenty.id = '$id_k'";
	$search = mysqli_fetch_assoc(mysqli_query($connection, $q));
	$_SESSION['msg'] = "Zboží ".$search['vyrobce']." ". $search['jmeno']." bylo přidáno do sestavy.";
else:
	$_SESSION['msg'] = "Zboží bohužel nemohlo být přidáno do sestavy.";
endif;
	header("Location: ../?msg=true");
?>