<?php
#odhlasi uzivatele
session_start();
$_SESSION['u'] = null;
header("Location: ../user.php");
?>