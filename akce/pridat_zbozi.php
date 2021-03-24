<?php
include_once "../db.php";

#nacteni id komponenty a sestavy, ktere se budou parovat
$id_k = $_GET['id'];
$id_s = $_SESSION['s'];

#overeni, jestli jiz komponenta v sestave neni
$q = "
	SELECT
		COUNT(id) AS pocet
	FROM
		sestavy_komp
	WHERE
		sestavy_komp.id_komponenty = '$id_k'
		AND sestavy_komp.id_sestavy = '$id_s'
";
$search = mysqli_fetch_assoc(mysqli_query($connection, $q));

#potrebne podminky, aby mohla komponenta jit do sestavy
#nesmi jiz byt sparovane, musim mit nactenou nejakou sestavu a musim byt vlastnik
if(!$search['pocet'] and $id_s and $_SESSION['owner']):
	$q = "
		INSERT INTO 
			sestavy_komp(id_komponenty, id_sestavy)			
		VALUES
			('$id_k', '$id_s');
		";
	$q_link = mysqli_query($connection, $q);
	echo mysqli_error($connection);

	#oznaceni posledni pridane komponenty, cudlik bude mit jinou barvu
	$_SESSION['pridano'] = $id_k;

	#najdu si jmeno komponenty, aby bylo videt v msg
	$q = "SELECT komponenty.vyrobce, komponenty.jmeno FROM komponenty WHERE komponenty.id = '$id_k'";
	$search = mysqli_fetch_assoc(mysqli_query($connection, $q));
	$_SESSION['msg'] = "Zboží ".$search['vyrobce']." ". $search['jmeno']." bylo přidáno do sestavy.";
elseif($search['pocet']):
	$_SESSION['msg'] = "Toto zboží již ve vaší sestavě je.";
elseif(!$_SESSION['owner']):
	$_SESSION['msg'] = "Nemáte povolení upravovat tuto sestavu. Zkuste založit novou.";
else:
	$_SESSION['msg'] = "Zboží bohužel nemohlo být přidáno do sestavy.";
endif;

if(!$id_s):
	#uzivatel jeste nema sestavu, je poslan na stranku kde si ji vytvori
	header("Location: ../sestava.php");
else:
	header("Location: ../?msg=true");
endif;
?>