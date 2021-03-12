<?php include_once "./hlavicka.php";

$id_s = $_SESSION['s'] ? $_SESSION['s'] : False;
$nova = "
	<h1>Vytvořit novou sestavu</h1>
	<form method='post' action='./akce/vytvorit_sestavu.php'>
		<input type='text' name='jmeno' placeholder='Jméno sestavy' /><br />
		<input id='zbozi_button' type='submit' value='Vytvořit' />		
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
	<?php if(!$id_s):
		echo $nova;
	else:
		$q_link = mysqli_query($connection, $q);
		echo mysqli_error($connection);
		$sestava = mysqli_fetch_assoc($q_link);
		echo "<h1>".$sestava['jmeno']."</h1>";
		echo "<p>ID sestavy: ".$_SESSION['s']."</p>";

		$id_s = $_SESSION['s'];
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
		$suma = 0;
		while($k = mysqli_fetch_assoc($q_link)):
			$suma += $k['cena'];
			?><div id="shop_box"><a href="./zbozi.php?id=<?php echo $k['id']?>">
				<div id="thumb_ram"><img id="thumb_img" src="./zbozi/<?php echo $k['id']?>.jfif"></div>
				<div id="shop_box_content">
					<h3 id="jmeno_zbozi"><?php echo $name ?></h3>
					<h2 id="cena"><?php echo $k['cena'] ?>,- Kč</h2>
					<p <?php if(!$k['dostupnost']) echo "id=nedostupne"?>>
						Zboží je <?echo (!$k['dostupnost']) ? "ne" : "";?>dostupné</p>
					<a href="./akce/odstranit_ze_sestavy.php?id=<?php echo $k['id']?>">
						<div id='nedostupny_button'>Odstranit zboží</div>
					</a>
				</div>
			</a></div><?php
		endwhile;
		echo "<br><h2>Celkem $suma,- Kč</h2>";
	endif;?>
	<div id="empty"></div>
</div>

<?php include_once "./patka.php";?>