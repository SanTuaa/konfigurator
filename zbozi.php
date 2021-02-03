<?php include_once "./hlavicka.php";
$id = $_REQUEST[id];
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
	<h1><?
	$name = $z[vyrobce] . " " . $z[jmeno];
	echo $name;?></h1>
	Zpět na: <a href=".?typ=<?=$z[typ_zbozi]?>"><?=$komponenty[$z[typ_zbozi]]?></a> 
	<p>ID zboží: <?=$z[id]?></p>
	<img id = "foto_zbozi", src="./zbozi/<?=$z[id]?>.jfif">
	<div id = "parametry_zbozi">		
		<ul><?
		$q = "
		SELECT
			parametry.hodnota_text, parametry.hodnota_cislo, parametry_jmena.parametr AS jmeno,
			parametry_jmena.typ AS typ
		FROM
			parametry
		LEFT JOIN
			parametry_jmena ON parametry_jmena.id = parametry.id_parametr
		WHERE
			parametry.id_komponent = '$z[id]'
		";
		$q_link = mysqli_query($connection, $q);
		echo mysqli_error($connection);
		while($p = mysqli_fetch_assoc($q_link)):
			$hodnota = $p[typ] ? $p[hodnota_text] : $p[hodnota_cislo];
			echo "<li>", $p[jmeno], ": ", $hodnota, "</li>";
		endwhile;
		?></ul><br />
		<h1><?=$z[cena]?>,- Kč</h1>
		<p <?if(!$z[dostupnost]) echo "id=nedostupne"?>>
			Zboží je momentálně <?echo (!$z[dostupnost]) ? "ne" : "";?>dostupné</p>
		<a href="./akce/pridat_zbozi.php?id=<?=$_REQUEST[id]?>">
			<div id="zbozi_button">Přidat do sestavy</div>
		</a>
	</div>
</div>
<?php include_once "./patka.php";?>