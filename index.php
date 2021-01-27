<?php include_once "./hlavicka.php";
$typ = $_REQUEST[typ] ? $_REQUEST[typ] : "cpu";
?>

<div id="menu">
	<h3>Typ zboží</h3>
	<ul><?
		foreach($komponenty as $kod => $komp)
			echo "<li><a href='.?typ=", $kod, "'>", $komp, "</a></li>";
		?>
	</ul>
	<br>
	<h3>Třídění zboží</h3>	
</div>
<div id="hlavni_obsah">
	<h2>Výběr komponent: <?=$komponenty[$typ]?></h2>					
	<?php		
		$q = "
		SELECT
			*
		FROM
			komponenty
		WHERE
			komponenty.typ_zbozi = '$typ'
			";
		$id_v = mysqli_query($connection, $q);
		echo mysqli_error($connection);
		while($r = mysqli_fetch_assoc($id_v)):
			$name = $r[vyrobce] . " " . $r[jmeno];
			?><div id="shop_box"><a href="./zbozi.php?id=<?=$r[id]?>">
				<div id="thumb_ram"><img id="thumb_img" src="./zbozi/<?=$r[id]?>.jfif"></div>
				<div id="shop_box_content">
					<h3 id="jmeno_zbozi"><?=$name ?></h3>
					<h2 id="cena"><?=$r[cena] ?>,- Kč</h2>
					<p>Zboží je <?echo (!$r[dostupnost]) ? "ne" : "";?>dostupné</p>
					<a href="./akce/pridat_zbozi.php?id=<?=$r[id]?>">
						<div id="pridat_button">Přidat do sestavy</div></a>
				</div>
			</a></div><?php
		endwhile;
	?>
	</table>	
</div>

<?php include_once "./patka.php";?>
