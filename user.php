<?php 
#stranka s uctem uzivatele
#presmerovava na formular loginu a registrace

include_once "./hlavicka.php";

#nacte id uzivatele (pokud je prihlaseny)
$id_u = $_SESSION['u'] ? $_SESSION['u'] : false;

#overime, jestli je uzivatel prihlaseny
if($id_u):

#najdeme si nick uzivatele
$q = "SELECT nick FROM uzivatele WHERE uzivatele.id = '$id_u'";
$q_link = mysqli_query($connection, $q);
echo mysqli_error($connection);
$nick = mysqli_fetch_assoc($q_link);
$nick = $nick['nick'];

#stranka pro prihlaseneho uzivatele ?>
<div id="hlavni_obsah">
	<h1 id="user_welcome">Vítej, <?php echo $nick?>!</h1>

	<h2>Tvoje sestavy:</h2>
	<ul><?php
	#vyhledani sestav prihlaseneho uzivatele
	$q = "
	SELECT
		sestavy.id, sestavy.jmeno
	FROM
		sestavy
	WHERE
		sestavy.uzivatel = '$id_u';
	";
	$q_link = mysqli_query($connection, $q);
	echo mysqli_error($connection);

	#vypis sestav do seznamu
	while($s = mysqli_fetch_assoc($q_link)):
		$polozka = "<li class='user_build'><a href='./akce/share.php?id=";
		$polozka .= $s['id']."'>";
		$polozka .= $s['jmeno']."</a></li>";
		echo $polozka;
	endwhile;
	echo "</ul>";

	#odhlasit se ?>
	<a href="./akce/logout.php">
		<div class='btn large left_red'>ODHLÁSIT SE</div>
	</a>
	<div class="empty"></div>
</div>
<?php	
else: 
	#uzivatel neni prihlaseny, jde na stranku login
	include_once "./forms/login.php";

endif; ?>

<?php include_once "./patka.php";
?>