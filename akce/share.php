<?php 
include_once "../db.php";

#id sestavy, kterou chci nacist
$id = $_GET['id'];
$_SESSION['s'] = $id;

#pokud je prihlaseny uzivatel autorem sestavy, bude nastaven jako vlastnik
#nejdriv si najdu autora sestavy, kterou nacitam
$q = "SELECT uzivatel FROM sestavy WHERE sestavy.id = '$id'";
$q_link = mysqli_query($connection, $q);
echo mysqli_error($connection);
$id_u = mysqli_fetch_assoc($q_link);
$id_u = $id_u['uzivatel'];

#porovnam id autora sestavy s prihlasenym uzivatelem, podle toho nastavim vlastnika
$_SESSION['owner'] = ($id_u == $_SESSION['u']) ? true : false;

header("Location: ../sestava.php");

?>