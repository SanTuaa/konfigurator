<?php
#formular pro prihlaseni a registraci uzivatele
?>
<div id="registrace"><?php

	#vypis specialni message pro registraci
	$msg = "<p id='msg'>". $_SESSION['msg']. "</p>";
	echo ($_GET['msg_r'] == 'true') ? $msg : "";

	#pokud je sem uzivatel vracen z neuspesne registrace, bude v poli nick
	$nick_reg = $_SESSION['nick_reg'];
	?>
	<h2>Nemáte ještě svůj účet?</h2>
	<h2>Zde se můžete zaregistrovat</h2>
	<form id='reg_form' method='post' action='./akce/registrace.php'>
		<input type='text' name='nick' placeholder='Uživatelské jméno' value='<?php echo $nick_reg ?>'/>
		<input type='password' name='pw' placeholder='Heslo' />
		<input type='password' name='pw2' placeholder='Heslo znovu' />
		<input class='btn large left' type='submit' value='Registrovat' />		
	</form>
</div>
<div id="hlavni_obsah"><?php

	#vypis message
	$msg = "<p id='msg'>". $_SESSION['msg']. "</p>";
	echo ($_GET['msg'] == 'true') ? $msg :"";

	#pokud je sem uzivatel vracen z neuspesneho loginu, bude v poli nick
	$nick = $_SESSION['nick'];
	?>

	<h1>Přihlásit se</h1>
	<form method='post' action='./akce/login.php'>
		<input type='text' name='nick' placeholder='Uživatelské jméno' value='<?php echo $nick ?>' />
		<input type='password' name='pw' placeholder='Heslo' />
		<input class='btn large left' type='submit' value='Přihlásit' />		
	</form>
</div>
