<?php
if($_SERVER["SERVER_ADDR"]=="127.0.0.1"):
    define('DB_HOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PSW','vertrigo');
    define('DB_NAME','konfigurator');
endif;

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PSW) or die ("Není možné připojit databázový server.");
$db = mysqli_select_db($connection, DB_NAME) or die("Není možné vybrat databázi.");
mysqli_query ($connection, "SET NAMES 'UTF8'");
session_start();
?>