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

#stranka pro prihlaseneho uzivatele?>
<div id="hlavni_obsah">
	<h1>Vítej, <?php echo $nick?>!</h1>
	<div class="empty_smol"></div>
	<p>Zatím tu toho nemůžeš moc dělat. To ale vůbec nevadí! Máš účet! Nikdy nevíš, kdy se ti takový účet bude hodit, kamaráde.</p>

	<?php
	#odhlasit se
		?><a href="./akce/logout.php">
			<div class='btn large left_red'>Odhlásit se</div>
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