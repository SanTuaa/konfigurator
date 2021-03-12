<?php include_once "./hlavicka.php";
$id = $_REQUEST['id'];
$q = "
	SELECT
		*
	FROM
		komponenty
	WHERE
		komponenty.id = '$id'
";
$q_link = mysqli_query($connection, $q);
echo mysqli_error($connection);
$z = mysqli_fetch_assoc($q_link);
?>

<div id="hlavni_obsah">
	<h1><?php
	$id_k = $z['id'];
	$name = $z['vyrobce'] . " " . $z['jmeno'];
	echo $name;
	$typ = $z['typ_zbozi'];?></h1>
	Zpět na: <a href=".?typ=<?php echo $typ?>"><?php echo $komponenty[$typ]?></a> 
	<p>ID zboží: <?php echo $id_k?></p>
	<img id = "foto_zbozi", src="./zbozi/<?php echo $id_k?>.jfif">
	<div id = "parametry_zbozi">		
		<ul><?php
		$q = "
		SELECT
			parametry.hodnota_text, parametry.hodnota_cislo, parametry_jmena.parametr AS jmeno,
			parametry_jmena.typ AS typ
		FROM
			parametry
		LEFT JOIN
			parametry_jmena ON parametry_jmena.id = parametry.id_parametr
		WHERE
			parametry.id_komponent = '$id_k'
		";
		$q_link = mysqli_query($connection, $q);
		echo mysqli_error($connection);
		while($p = mysqli_fetch_assoc($q_link)):
			$hodnota = $p['typ'] ? $p['hodnota_text'] : $p['hodnota_cislo'];
			echo "<li>", $p['jmeno'], ": ", $hodnota, "</li>";
		endwhile;
		?></ul><br />
		<h1><?=$z['cena']?>,- Kč</h1>
		<p <?if(!$z['dostupnost']) echo "id=nedostupne"?>
			Zboží je momentálně <?echo (!$z['dostupnost']) ? "ne" : "";?>dostupné</p>
		<a <?= $z['dostupnost'] ? "href='./akce/pridat_zbozi.php?id=".$id_k : "";?> >
			<?php
			if(!$z['dostupnost']):
				echo "<div id='zbozi_nedostupny_button'>Nedostupné zboží</div>";
			elseif($id_k == $_SESSION['pridano']):
				echo "<div id='zbozi_pridano_button'>Zboží bylo přidáno</div>";
			else:
				echo "<div id='zbozi_button'>Přidat do sestavy</div>";
			endif;
		?></a>
	</div>
</div>
<?php include_once "./patka.php";?>