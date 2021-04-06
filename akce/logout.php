<?php
#odhlasi uzivatele a zaroven odnacte sestavu (ale ponecha zbytek sessiony)
session_start();
$_SESSION['u'] = null;
$_SESSION['s'] = null;

header("Location: ../user.php");
?>