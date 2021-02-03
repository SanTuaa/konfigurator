<?php include_once "./hlavicka.php";
$id_s = $_SESSION[s] ? $_SESSION[s] : False;
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
	<?if(!$id_s):
		echo $nova;
	else:
		$q_link = mysqli_query($connection, $q);
		echo mysqli_error($connection);
		$sestava = mysqli_fetch_assoc($q_link);
		echo "<h1>$sestava[jmeno]</h1>";

	endif;?>
	<div id="empty"></div>
</div>

<?php include_once "./patka.php";?>