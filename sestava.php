<?php
#stranka se sestavou uzivatele, pripadne nasdilenou sestavou
#pokud nema sestavu, je presmerovan na formular pro vytvoreni nove

#info pro hlavicku, ze ma nacist jiny opengraph 
$og = true;
include_once "./hlavicka.php";

#nacteni id sestavy
$id_s = $_SESSION['s'] ? $_SESSION['s'] : false;

$q = "
	SELECT
		*
	FROM
		sestavy
	WHERE
		sestavy.id = '$id_s';
";
?>
<div id="hlavni_obsah">
	<?php
	$msg = "<p id='msg'>". $_SESSION['msg']. "</p>";
	echo ($_GET['msg'] == 'true') ? $msg :"";

	#formular pro vytvoreni nove sestavy, pokud zadna neni nactena
	if(!$id_s):
		include_once "./forms/nova_sestava.php";

	else:
		#nacteni sestavy
		$q_link = mysqli_query($connection, $q);
		echo mysqli_error($connection);
		$sestava = mysqli_fetch_assoc($q_link);
		$id_autora = $sestava['uzivatel'];

		#"hlavicka" stranky
		echo "<h1>".$sestava['jmeno']."</h1>";
		echo "<p>ID sestavy: ".$id_s."</p>";

		#najdeme si autora sestavy, pokud ma ucet, a napiseme jeho jmeno
		if($id_autora):
			$q = "SELECT nick FROM uzivatele WHERE uzivatele.id = '$id_autora'";
			$q_link = mysqli_query($connection, $q);
			echo mysqli_error($connection);
			$nick = mysqli_fetch_assoc($q_link);
			$nick = $nick['nick'];
			echo "<p>Autorem sestavy je ".$nick."</p>";
		endif;

		#hledame komponenty v dane sestave
		$q = "
		SELECT
			komponenty.id, komponenty.vyrobce, komponenty.jmeno, komponenty.cena, komponenty.dostupnost
		FROM
			sestavy_komp
		LEFT JOIN
			komponenty ON komponenty.id = sestavy_komp.id_komponenty
		WHERE
			sestavy_komp.id_sestavy = '$id_s'
		";
		$q_link = mysqli_query($connection, $q);
		echo mysqli_error($connection);

		#pocitadlo celkove ceny
		$suma = 0;

		#hlavni smycka vypisu zbozi
		while($k = mysqli_fetch_assoc($q_link)):

			$suma += $k['cena'];
			$name = $k['vyrobce'] . " " . $k['jmeno'];

			#shopbox, stejne jako v indexu ale bez tlacitka pridat (pochopitelne)?>
			<div class="shopbox"><a href="./zbozi.php?id=<?php echo $k['id']?>">
				<div class="shopbox_thumb"><img class="thumb_img" src="./zbozi/<?php echo $k['id']?>.jfif"></div>

				<div class="shopbox_info">
					<h3><?php echo $name ?></h3>
					<h2><?php echo $k['cena'] ?>,- Kč</h2>
					<p <?php if(!$k['dostupnost']) echo "class='red'"?>>
						Zboží je <?php echo (!$k['dostupnost']) ? "ne" : "";?>dostupné</p>
				</div><?php 

				#pro tlacitko Odstranit musime overit "vlastnika sestavy"
				if($_SESSION['owner']): ?>
					<a href="./akce/odstranit_ze_sestavy.php?id=<?php echo $k['id']?>">
						<div class="btn red">ODSTRANIT</div>
					</a><?php 
				endif; ?>

			</a></div><?php
		endwhile;

		#vypis celkove ceny
		echo "<h2 id='suma'>Celkem ".$suma.",- Kč</h2>";

		#odkaz pro sdileni
		$sharelink = "http://" . $_SERVER['SERVER_NAME'];
		if($_SERVER["SERVER_ADDR"]=="127.0.0.1") $sharelink .= "/konfigurator";
		$sharelink .= "/akce/share.php?id=".$id_s;

		echo "<h2>Odkaz pro sdílení:</h2>";
		echo "<form><input id='share' type='text' onclick='this.select()' readonly value='". $sharelink. "' /></form>";

		#odnacist sestavu?>
		<a href="./akce/reset_sestava.php">
			<div class='btn large left_red'>CHCI JINOU SESTAVU</div>
		</a><?php

	endif;?>
	<div class="empty"></div>
</div>

<?php include_once "./patka.php";?>