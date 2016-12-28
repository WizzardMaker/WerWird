<?php include("./getcookie-inf.php"); ?>
<?php
	if(isset($_POST["username"])){
		$Pusername = $_POST["username"];
		$Ppwd = $_POST["pwd"];
	}else{
		$Pusername = "";
		$Ppwd = "";
	}
		
	//echo "username: ".$Pusername."<br>";
	$login = false;
	
	//Authentifizierunh �ber Parameter und Cookie pr�fen:
	//Fall 1: Parameter + und cookie - 	-> login + und cookie setzten
	//Fall 2: Parameter + und cookie + 	-> login +
	//Fall 3: Parameter - und cookie -	-> login - und ausgabe fehlgeschlagen
	//Fall 4: Parameter - und cookie + 	-> login +
	
	if (($Pusername == "master") && ($Ppwd == "mko09ijn")) {
		//Fall 1 und Fall 2
		if ($AdminCookie != "master") {
//			echo "Fall 1";
			$test = setcookie ("wwadmin", "master", time()+2700, "/"); 
//			$keks = setcookie("admin", $loginName, time()+3600*24*365, "/");
		}
		else {
//			echo "Fall 2";
		}
		$login = true;
	}
	else {
		//Fall 3 und Fall 4
		if ($AdminCookie != "master") {
//			echo "Fall 3";
		}
		else {
//			echo "Fall 4";
			$login = true;
		}
	}


	if ($login) {
?>
<?php include("../inc_header.php"); ?>
<table border="0" cellpadding="0" cellspacing="0" background="../bg.jpg" width="1024" height="634" align="center">
	<tr>
		<td valign="top">
			<table border="0" align="center" cellpadding="0" cellspacing="0">
				<tr><td><img src="spacer.gif" border="0" alt="" width="1" height="10"></td></tr>
				<tr>
					<td>
						<table align="center" border="0">
							<tr>
								<td><img src="spacer.gif" border="0" alt="" width="50" height="1"></td>
								<td bgcolor="#ffffff"><font face="Arial" size="5">Wer wird... Admin-Bereich</font></td>
								<td><img src="spacer.gif" border="0" alt="" width="50" height="1"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr><td><img src="spacer.gif" border="0" alt="" width="1" height="50"></td></tr>
				<tr>
					<td>
						<?php if (isset($ausgabe)) { ?>
						<table align="center" bgcolor="#ffffff">
							<tr>
								<td>
									<?php
										echo "Meldung: ".$ausgabe."<br>";
									?>
								</td>
							</tr>
						</table>
						<table>
							<tr><td><img src="spacer.gif" border="0" alt="" width="1" height="10"></td></tr>
						</table>
						<?php } ?>
						<table align="center" bgcolor="#ffffff">
							<tr>
								<td>
									 <?php echo "<a href=\"./editquest.php\"><font face=\"Arial\" size=\"2\">Fragen bearbeiten</font></a>"; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <?php echo "<a href=\"./getthequest.php\"><font face=\"Arial\" size=\"2\">Fragen zusammenfügen</font></a>"; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <?php echo "<a href=\"./download.php\"><font face=\"Arial\" size=\"2\">Download</font></a>"; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <?php echo "<a href=\"./delquests.php\"><font face=\"Arial\" size=\"2\">ALLE Fragendateien löschen</font></a>"; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <?php
									 	$fn = "../pwd.txt";
										$handle = fopen ($fn, "r");
										$content = fread ($handle, filesize ($fn));
										fclose ($handle);
									 	echo "<font face=\"Arial\" size=\"2\">Passwort ist: [".$content."] -> <a href=\"./setpwd.php?username=$Pusername&pwd=$Ppwd\">Ändern</font></a>"; 
									 ?>
								</td>
							</tr>
							<tr>
								<td>
									 <?php
									 	$fnfrei = "../frei.txt";
										$handlefrei = fopen ($fnfrei, "r");
										$contentfrei = fread ($handlefrei, filesize ($fnfrei));
										fclose ($handlefrei);
										if ($contentfrei == "ON") {
									 		echo "<font face=\"Arial\" size=\"2\">Die Seite ist <font color=\"#008000\">ON</font>  -> <a href=\"./setonoff.php?wert=OFF\">Ändern</font></a>"; 
										}
										else {
									 		echo "<font face=\"Arial\" size=\"2\">Die Seite ist <font color=\"#ff0000\">OFF</font>  -> <a href=\"./setonoff.php?wert=ON\">Ändern</font></a>"; 
										}
									 ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php
	}
	else { //login=false
?>
	<table align="center">
		<tr>
			<td bgcolor="#FFFFFF"><font face="Arial" size="2">Login fehlgeschlagen</font></td>
		</tr>
	</table>
<?php
	include("./admin.php");
	}

?>
<?php
	include("./logout.php"); 
	include("../inc_footer.php"); 
?>
