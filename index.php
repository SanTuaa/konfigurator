<?php
include_once "./hlavicka.php";
$typ = $_GET["typ"] ? $_GET["typ"] : "cpu";
?>

<div id="menu">
	<h3>Typ zboží</h3>
	<ul><?php
		foreach($komponenty as $kod => $komp)
			echo "<li><a href='.?typ=", $kod, "'>", $komp, "</a></li>";
		?>
	</ul>
	<br>
	<h3>Třídění zboží</h3>
	<ul>
		<p id="nedostupne">Zatím není implementováno</p>
		<li><a href='.'>Nejlevnější</a></li>
		<li><a href='.'>Nejdražší</a></li>
	</ul>	
</div>
<div id="hlavni_obsah">
	<?php 
	$msg = "<p id='msg'>". $_SESSION['msg']. "</p>";
	echo ($_GET['msg'] == 'true') ? $msg :"";?>
	<h2>Výběr komponent: <?php echo $komponenty[$typ]?></h2>					
	<?php		
		$q = "
		SELECT
			*
		FROM
			komponenty
		WHERE
			komponenty.typ_zbozi = '$typ'
			";
		$q_link = mysqli_query($connection, $q);
		echo mysqli_error($connection);
		while($r = mysqli_fetch_assoc($q_link)):
			$name = $r['vyrobce'] . " " . $r['jmeno'];
			?><div id="shop_box"><a href="./zbozi.php?id=<?php echo$r['id']?>">
				<div id="thumb_ram"><img id="thumb_img" src="./zbozi/<?php echo$r['id']?>.jfif"></div>
				<div id="shop_box_content">
					<h3 id="jmeno_zbozi"><?php echo$name ?></h3>
					<h2 id="cena"><?php echo$r['cena'] ?>,- Kč</h2>
					<p <?if(!$r['dostupnost']) echo "id=nedostupne"?>
						Zboží je <?echo (!$r['dostupnost']) ? "ne" : "";?>dostupné</p>
					<a <?php $href = "href='./akce/pridat_zbozi.php?id=".$r['id']."'";
					echo $r['dostupnost'] ? $href : "";?>>
						<?php
						if(!$r['dostupnost']):
							echo "<div id='nedostupny_button'>Nedostupné zboží</div>";
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
