<?php
	
	$Pspwd = $_POST["spwd"];
	
	$isEmbedded = false;
	
	$fn = "./pwd.txt";
	$handle = fopen ($fn, "r");
	$content = fread ($handle, filesize ($fn));
	fclose ($handle);

	//username und pwd auswerten
	if (($Pspwd == $content)) {
		include("./eingabe.php");
	}
	else {
		echo "<table bgcolor=\"#ffffff\" align=\"center\"><tr><td>Passwort ist falsch</td></tr></table>";
		include("index.php");
	}
?>
