<?php
#formular pro vytvoreni nove sestavy, pokud zadna neni nactena
?>

<h1>Vytvořit novou sestavu</h1>
<form method='post' action='./akce/nova_sestava.php'>
	<input type='text' name='jmeno' placeholder='Jméno sestavy' /><div class='empty_smol'></div>
	<input class='btn large left' type='submit' value='VYTVOŘIT' />		
</form>
