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
$id_v = mysqli_query($connection, $q);
echo mysqli_error($connection);
$z = mysqli_fetch_assoc($id_v);
$cena = $z[cena];
?>

<div id="hlavni_obsah">
	<h1><?
	$name = $z[vyrobce] . " " . $z[jmeno];
	echo $name;?></h1>
	Zpět na: <a href=".?typ=<?=$z[typ_zbozi]?>"><?=$komponenty[$z[typ_zbozi]]?></a> 
	<p>ID zboží: <?=$z[id]?></p>
	<img id = "foto_zbozi", src="./zbozi/<?=$z[id]?>.jfif">
	<div id = "parametry_zbozi"><ul><?
		
		?>
	</ul></div>
</div>
<?php include_once "./patka.php";?>