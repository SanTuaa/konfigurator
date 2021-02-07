<?php
include_once "../db.php";

$q = "
	SELECT
		COUNT(id) AS pocet
	FROM
		sestavy_komp
	WHERE
		sestavy_komp.id_komponenty = '$_GET[id]'
		AND sestavy_komp.id_sestavy = '$_SESSION[s]'
";
$search = mysqli_fetch_assoc(mysqli_query($connection, $q));
if(!$search[pocet]):
	$q = "
		INSERT INTO 
			sestavy_komp(id_komponenty, id_sestavy)			
		VALUES
			('$_GET[id]', '$_SESSION[s]');
		";
	$q_link = mysqli_query($connection, $q);
	echo mysqli_error($connection);

	$_SESSION[pridano] = $_GET[id];
	$q = "SELECT komponenty.vyrobce, komponenty.jmeno FROM komponenty WHERE komponenty.id = '$_GET[id]'";
	$search = mysqli_fetch_assoc(mysqli_query($connection, $q));
	$_SESSION[msg] = "Zboží $search[vyrobce] $search[jmeno] bylo přidáno do sestavy.";
endif;
header("Location: ../?msg=true");
?>