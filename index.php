<?php
include_once "./hlavicka.php";

#import hodnot z metody GET
$typ = $_GET["typ"] ? $_GET["typ"] : "cpu";
$sort = $_GET["sort"];
$f = $_GET["f"];

?>

<div id="menu">
	<h3>Typ zboží</h3>
	<ul><?php
		#vypis jednotlivych typu zbozi
		#seznam ulozeny v souboru hlavicky
		foreach($komponenty as $kod => $display)
			echo "<li><a href='.?typ=", $kod, "'>", $display, "</a></li>";
		?>
	</ul>
	<br />

	<h3>Třídění zboží</h3>
	<ul>
		<li><a href='<?php echo ".?typ=", $typ, "&f=", $f?>'>Výchozí</a></li>
		<li><a href='<?php echo ".?typ=", $typ, "&f=", $f?>&sort=l'>Nejlevnější</a></li>
		<li><a href='<?php echo ".?typ=", $typ, "&f=", $f?>&sort=d'>Nejdražší</a></li>
	</ul>
	<br />

	<h3>Filtrování zboží</h3>
	<ul>
		<li><a href='<?php echo ".?typ=".$typ."&sort=".$sort?>&f=dostupne'>Dostupné zboží</a></li><?php

		#tady bude odlisny filtr pro kazdy typ zbozi
		foreach($filtr as $kod => $display)
			echo "<li><a href='.?typ=", $typ, "&sort=", $sort, "&f=", $kod, "'>", $display, "</a></li>";
		
		#posledni v seznamu... vymazani filtru?>
		<br /><li><a href='.?typ=<?php echo $typ?>&sort=<?php echo $sort?>'>Zrušit filtr</a></li></ul>	
</div>
<div id="hlavni_obsah"><?php

	#nektere stranky vracejici zpatky na homepage poslou zpravu, co se vlastne na webu stalo
	$msg = "<p id='msg'>". $_SESSION['msg']. "</p>";
	echo ($_GET['msg'] == 'true') ? $msg :"";
	#nadpis stranky, ukazuje typ komponent, trideni, filtry
	$nadpis = "<h2>Výběr komponent: ". $komponenty[$typ];
	if($sort=="l"):
		$nadpis .= ", od nejlevnějšího";
	elseif($sort=="d"):
		$nadpis .= ", od nejdražšího";
	endif;

	if($f)
		$nadpis .= ", " . $filtr[$f]; 
	echo $nadpis, "</h2>";

		$q = "
		SELECT
			komponenty.id, komponenty.typ_zbozi, komponenty.vyrobce, komponenty.jmeno,
			komponenty.cena, komponenty.dostupnost, parametry.id_parametr,
			parametry.hodnota_text, parametry.hodnota_cislo
		FROM
			komponenty
		LEFT JOIN
			parametry ON parametry.id_komponent = komponenty.id
		WHERE
			komponenty.typ_zbozi = '$typ'
			";

		#filtrovani zbozi, pridani dalsi podminky k WHERE
		if($f == "1151"):
			$q .= " AND parametry.id_parametr = '1' AND parametry.hodnota_text = '1151'";
		elseif($f == "1200"):
			$q .= " AND parametry.id_parametr = '1' AND parametry.hodnota_text = '1200'";
		elseif($f == "AM4"):
			$q .= " AND parametry.id_parametr = '1' AND parametry.hodnota_text = 'AM4'";
		elseif($f == "tichy"):
			$q .= " AND parametry.id_parametr = '7' AND parametry.hodnota_cislo <= '20'";
		elseif($f == "ATX"):
			$q .= " AND parametry.id_parametr = '10' AND parametry.hodnota_text = 'ATX'";
		elseif($f == "mATX"):
			$q .= " AND parametry.id_parametr = '10' AND parametry.hodnota_text = 'mATX'";
		elseif($f == "vykon"):
			$q .= " AND parametry.id_parametr = '19' AND parametry.hodnota_cislo > '1000'";
		elseif($f == "pamet"):
			$q .= " AND parametry.id_parametr = '18' AND parametry.hodnota_cislo > '4'";
		#pokud nemam zadny filtr, nepotrebuji left join parametry - nova query
		elseif($f == "dostupne"):
			$q = "SELECT * FROM komponenty WHERE komponenty.typ_zbozi = '$typ' AND
				komponenty.dostupnost = '1'";
		else:
			$q = "SELECT * FROM komponenty WHERE komponenty.typ_zbozi = '$typ'";
		endif;

		#trideni zbozi, pridani do query
		if($sort == "l"):
			$q .= "ORDER BY komponenty.cena ASC";
		elseif($sort == "d"):
			$q .= "ORDER BY komponenty.cena DESC";
		endif;

		$q_link = mysqli_query($connection, $q);
		echo mysqli_error($connection);

		#iterativni vypis pro kazdy kus zbozi na strance
		while($r = mysqli_fetch_assoc($q_link)):

			#pozdeji vyuzite promenne
			$name = $r['vyrobce'] . " " . $r['jmeno'];
			$href = "href='./akce/pridat_zbozi.php?id=".$r['id']."'";

			#cela plocha zbozi by mela slouzit jako odkaz na stranku zbozi
			?><div id="shop_box"><a href="./zbozi.php?id=<?php echo $r['id']?>"><?php 

				#vlozeni obrazku do vlastniho divu za ucelem zarovnani na stred ?>
				<div id="thumb_ram"><img id="thumb_img" src="./zbozi/<?php echo $r['id']?>.jfif"></div>

				<div id="shop_box_content">
					<h3 id="jmeno_zbozi"><?php echo $name ?></h3>
					<h2 id="cena"><?php echo $r['cena'] ?>,- Kč</h2><?php

					#ukazatel toho, jestli je zbozi dostupne nebo ne?>
					<p <?php if(!$r['dostupnost']) echo "id=nedostupne" ?> >
						Zboží je <?php echo (!$r['dostupnost']) ? "ne" : "";?>dostupné</p><?php 

					#tlacitko pro okamzite prihozeni zbozi do sestavy?>
					<a <?php echo $r['dostupnost'] ? $href : "";?> >
						<?php
						if(!$r['dostupnost']):
							echo "<div id='nedostupny_button'>Nedostupné zboží</div>";

						#toto se aktivuje, pokud se jedna o posledni pridane zbozi
						elseif($r['id'] == $_SESSION['pridano']):
							echo "<div id='pridano_button'>Zboží bylo přidáno</div>";

						else:
							echo "<div id='pridat_button'>Přidat do sestavy</div>";
						endif;
						?></a>
				</div>
			</a></div><?php
		endwhile;
	?>
	</table>	
</div>

<?php include_once "./patka.php";?>