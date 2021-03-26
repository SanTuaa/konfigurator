<?php include_once "./hlavicka.php";

#nalezeni prislusne komponenty
$id = $_GET['id'];
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
	<?php

	#jmeno zbozi, nadpis stranky
	$name = $z['vyrobce'] . " " . $z['jmeno'];
	echo "<h1>", $name, "</h1>";

	#udaje primo pod nadpisem ?>
	<p>Zpět na: <a href=".?typ=<?php echo $z['typ_zbozi']?>"><?php echo $komponenty[$z['typ_zbozi']]?></a></p> 
	<p>ID zboží: <?php echo $id?></p>
	<img id = "foto_zbozi", src="./zbozi/<?php echo $id?>.jfif">


	<?php #tady zacina pravy sloupec s parametry ?>
	<div id = "parametry_zbozi">		
		<ul><?php

		#query pro vyhledani parametru zbozi
		$q = "
		SELECT
			parametry.hodnota_text, parametry.hodnota_cislo, parametry_jmena.parametr AS jmeno,
			parametry_jmena.typ AS typ
		FROM
			parametry
		LEFT JOIN
			parametry_jmena ON parametry_jmena.id = parametry.id_parametr
		WHERE
			parametry.id_komponent = '$id'
		";
		$q_link = mysqli_query($connection, $q);
		echo mysqli_error($connection);
		while($p = mysqli_fetch_assoc($q_link)):
			$hodnota = $p['typ'] ? $p['hodnota_text'] : $p['hodnota_cislo'];
			echo "<li>", $p['jmeno'], ": ", $hodnota, "</li>";
		endwhile;
		?></ul><br />
		<h1><?php echo $z['cena']?>,- Kč</h1>
		<p <?php if(!$z['dostupnost']) echo "id=nedostupne"?> >
			Zboží je momentálně <?php echo (!$z['dostupnost']) ? "ne" : "";?>dostupné</p>
		<a <?php echo $z['dostupnost'] ? "href='./akce/pridat_zbozi.php?id=".$id."'" : "";?> >
			<?php
			if(!$z['dostupnost']):
				echo "<div id='zbozi_nedostupny_button'>Nedostupné zboží</div>";
			elseif($id == $_SESSION['pridano']):
				echo "<div id='zbozi_pridano_button'>Zboží bylo přidáno</div>";
			else:
				echo "<div id='zbozi_button'>Přidat do sestavy</div>";
			endif;
		?></a>
	</div>
</div>
<?php include_once "./patka.php";?>
