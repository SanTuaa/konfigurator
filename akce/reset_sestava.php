<?php
#odnacte sestavu
session_start();
$_SESSION['s'] = null;

$_SESSION['msg'] = "Vaše sestava byla momentálně zmizena, ale pořád ji najdete na svém účtu. Můžete si vytvořit novou.";
header("Location: ../sestava.php?msg=true");
?>