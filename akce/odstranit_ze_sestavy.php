<?php
include_once "../db.php";

$q = "
	DELETE FROM
		sestavy_komp
	WHERE
		sestavy_komp.id_komponenty = '$_GET[id]'
		AND sestavy_komp.id_sestavy = '$_SESSION[s]'
	LIMIT
		1
";
$q_link = mysqli_query($connection, $q);
header("Location: ../sestava.php");
?>