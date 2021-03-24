<?php
include_once "../db.php";

$id = $_GET['id'];


$_SESSION['s'] = $id;
$_SESSION['owner'] = false;
header("Location: ../sestava.php");
?>