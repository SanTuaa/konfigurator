<?php
#odnacte sestavu
session_start();
$_SESSION['s'] = null;

$_SESSION['msg'] = "Vaše sestava byla zmizena. Můžete si vytvořit novou.";
header("Location: ../sestava.php?msg=true");
?>