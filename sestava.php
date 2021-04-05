<?php 
$og = true;
include_once "./hlavicka.php";

#nacteni id sestavy
$id_s = $_SESSION['s'] ? $_SESSION['s'] : False;

#formular pro vytvoreni nove sestavy, pokud zadna neni nactena
$nova = "
	<h1>Vytvořit novou sestavu</h1>
	<form method='post' action='./akce/vytvorit_sestavu.php'>
		<input type='text' name='jmeno' placeholder='Jméno sestavy' /><div class='empty_smol'></div>
		<input class='btn large left' type='submit' value='Vytvořit' />		
	</form>
";
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
		echo $nova;

	else:
		#nacteni sestavy
		$q_link = mysqli_query($connection, $q);
		echo mysqli_error($connection);
		$sestava = mysqli_fetch_assoc($q_link);

		#"hlavicka" stranky
		echo "<h1>".$sestava['jmeno']."</h1>";
		echo "<p>ID sestavy: ".$id_s."</p>";

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
						<div class="btn red">Odstranit zboží</div>
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

		#smazat session (sestavu)?>
		<a href="./akce/reset_session.php">
			<div class='btn large left_red'>Odstranit sestavu</div>
		</a><?php

	endif;?>
	<div class="empty"></div>
</div>

<?php include_once "./patka.php";?>