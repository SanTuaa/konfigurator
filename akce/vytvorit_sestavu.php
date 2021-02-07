<?php
include_once "../db.php";

$q = "
	INSERT INTO 
		sestavy(jmeno)			
	VALUES
		('$_POST[jmeno]');
	";
$q_link = mysqli_query($connection, $q);
$q = "SELECT LAST_INSERT_ID() as id;";
$q_link = mysqli_query($connection, $q);
echo mysqli_error($connection);
$z = mysqli_fetch_assoc($q_link);
$_SESSION[s] = $z['id'];
header("Location: ../index.php");
?>