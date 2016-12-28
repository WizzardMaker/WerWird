<?php include("./getcookie-inf.php"); ?>
<?php
	if ($AdminCookie != "master") {
		include("./admin.php");
	}
	else {
		$Pergfilename = $_POST["ergfilename"];
	
		if ($Pergfilename == "") {
			echo "<font color=\"#ffffff\" face=\"Arial\" size=\"+2\">Filename nicht angegeben<br></font>";
			include("./getthequest.php");
		}
		else {
			$Pergfilename = $Pergfilename.".mil";
			$filepath = "../files/";
			$filename_old = $filepath.'temp.txt';
			$filename_new = $filepath.$Pergfilename;
			rename($filename_old, $filename_new);
			$ausgabe = "File ".$Pergfilename." erstellt.";
			include("./login.php");
		}
	include("../inc_footer.php");
	}
?>
