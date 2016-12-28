<?php include("./getcookie-inf.php"); ?>
<?php 
//	if ($AdminCookie != "master") {
//		include("./admin.php");
//	}
//	else { //angemeldet
	global $argc, $argv;
	
	include_once("../inc_header.php"); 
	include_once("./inc_func.php"); 
	$farbe = "#FFFFFF";
	$fehlerfarbe = "#FF0000";

//Parameter auswerten -> weil registerglobals off
//	echo $_SERVER['argc'];
	
	if(isset($_GET["aktfile"])){
		$aktfile = $_GET["aktfile"];
		
	}
	
	if ($argc > 0) {
		//mind. ein Parameter
		if ($_SERVER['argc'] == 1) {
			//genau ein Parameter
			$parameter = $_SERVER['argv'][0]; //holt den ben�tigten Parameter
			//echo "P:$parameter<br>";
			parse_str($parameter); //zerlegt den Parameter
		}//endif
		else {
			echo "zuviele Parameter<br>";
			exit();
		}
	}//endif
	else {
		//keine Parameter
	}
// ********************************************************

	//username und pwd auswerten
//	if (($username == "master") && ($pwd == "mko09ijn")) {
	//alle files �ffnen und in feld schreiben
		$filepath = "../files/";

		$lastname_int = lastfilename_int($filepath, ".frage"); //enth�lt den int-wert des letzten files im verz.
//		echo "max-file:".$lastname_int."<br>";

		if 	($lastname_int > "-1") {
			//namen aller files im verz. emitteln
			$filenames_feld = getthefilenames($filepath, $lastname_int, ".frage");

			//testen ob filenames auch existieren
			$filenames_feld = filenames_exist($filepath, $filenames_feld);
//			for ($i=0; $i<count($filenames_feld); $i++) {
//				echo $i."vorhanden namen: ".$filenames_feld[$i]."<br>";
//			}
			$nofiles = false;
		}
		else {
			$nofiles = TRUE;
		}
//	}

	if (!$nofiles) {
		
	if ($argc == 0) {
		//echo "kein Parameter<br>";
		if (!isset($aktfile)) {
			$aktfilenr = 0;
			$aktfile = $filenames_feld[0];
		}
	}
	else {
		//echo "Parameter - ".$aktfile."<br>";
		if (!isset($aktfile)) {
			$aktfilenr = 0;
			$aktfile = $filenames_feld[0];
		}
	}

	
	for ($i=0; $i<count($filenames_feld); $i++) {
		if ($filenames_feld[$i] == $aktfile) {
			$aktfilenr = $i;
		}
	}

	$maxfilenr = $i-1;
	$maxfilenr_out = $i;
	$aktfilenr_out = $aktfilenr+1;
	
//	echo "maxfilenr=".$maxfilenr."<br>";
//	echo "aktfilenr=".$aktfilenr."<br>";
	
	//n�chstes file
	if ($aktfilenr+1 <= $maxfilenr) {
		//echo "naechstes File: ".$filenames_feld[$aktfilenr+1]."<br>";
		$nextfile = $filenames_feld[$aktfilenr+1];
		$linknextfile = "<a href=\"./editquest.php?aktfile=$nextfile\">Nächste Frage</a>";
	}
	else {
		//echo "naechstes File: ".$filenames_feld[0]."<br>";
		$linknextfile = "<a href=\"./editquest.php?aktfile=$filenames_feld[0]\">Nächste Frage</a>";
	}

	//vorher file
	if ($aktfilenr-1 >= 0) {
//		echo "vorher File: ".$filenames_feld[$aktfilenr-1]."<br>";
		$predfile = $filenames_feld[$aktfilenr-1];
		$linkpredfile = "<a href=\"./editquest.php?aktfile=$predfile\">Vorherige Frage</a>";
	}
	else {
//		echo "vorher File: ".$filenames_feld[$maxfilenr]."<br>";
		$predfile = $filenames_feld[$maxfilenr];
		$linkpredfile = "<a href=\"./editquest.php?aktfile=$predfile\">Vorherige Frage</a>";
	}
	/*echo "<center style=\"background-color:white;\">";
	echo $linkpredfile;
	echo " -- ";
	echo $filenames_feld[$aktfilenr];
	echo " -- ";
	echo $linknextfile;
	echo "</center>";*/

	//inhalte aus file holen
	$inhalt = getthecontent_withoutDel($filepath, $filenames_feld[$aktfilenr]);
	
	list($devnull1, $devnull2, $Pschwierigkeit, $Prichtigeantwort, $Pfrage, $Pantworta, $Pantwortb, $Pantwortc, $Pantwortd, $Pjoker50_1, $Pjoker50_2, $devnull3, $devnull4) = explode("\n", $inhalt);
	
	
	//echo $inhalt."<br>";
	/*
	echo $Prichtigeantwort."<br>";
	echo $Pjoker50_1."<br>";
	echo $Pjoker50_2."<br>";
	echo $Pschwierigkeit."<br>";
	echo $Pfrage."<br>" ;
	echo $Pantworta."<br>";
	echo $Pantwortb."<br>" ;
	echo $Pantwortc."<br>";
	echo $Pantwortd."<br>";
*/
//	$temp = explode("\n", $inhalt);

//	for ($i=0; $i<count($temp); $i++) {
//		echo $i.": ".$temp[$i]."<br>";
//	}
	
	
	
	
?>
<table border="0" cellpadding="0" cellspacing="0" background="../bg.jpg" width="1024" height="634" align="center">
	<tr>
		<td valign="top">
		
			<table border="0" align="center" cellpadding="0" cellspacing="0">
				<tr><td><img src="../spacer.gif" border="0" alt="" width="1" height="10"></td></tr>
				<tr>
					<td>
						<table align="center" border="0">
							<tr>
								<td><img src="../spacer.gif" border="0" alt="" width="50" height="1"></td>
								<td bgcolor="#ffffff"><font face="Arial" size="5">Wer wird... Ändern der Fragen</font></td>
								<td><img src="../spacer.gif" border="0" alt="" width="50" height="1"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr><td><img src="../spacer.gif" border="0" alt="" width="1" height="10"></td></tr>
				<tr>
					<td>
						<table border="0" align="center" cellpadding="0" cellspacing="0" width="800">
							<tr>
								<td bgcolor="#ffffff" align="left"><font face="Arial" size="2"><?php echo $linkpredfile; ?></font></td>
								<td bgcolor="#ffffff"><img src="../spacer.gif" border="0" alt="" width="50" height="1"></td>
								<td bgcolor="#ffffff" align="center"><font face="Arial" size="2"><?php echo $filenames_feld[$aktfilenr]." - ".$aktfilenr_out."/".$maxfilenr_out; ?></font></td>
								<td bgcolor="#ffffff"><img src="../spacer.gif" border="0" alt="" width="50" height="1"></td>
								<td bgcolor="#ffffff" align="right"><font face="Arial" size="2"><?php echo $linknextfile; ?></font></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr><td><img src="../spacer.gif" border="0" alt="" width="1" height="10"></td></tr>
				<tr>
					<td>
						<table border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td>						
				<form action="modifyfile.php" method="post">
				<?php
					if (!isset($fehler)) {
						echo "<tr><td><img src=\"spacer.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"320\"></td></tr>";
						if (isset($ausgabe)) { 
							echo "<tr><td><table align=\"center\"><tr><td bgcolor=\"#008000\"><font face=\"Arial\" size=\"3\">".$ausgabe."</font></td></tr></table></td></tr>";
						}
					}
					else if($fehler > 1) {
						echo "<tr><td><img src=\"spacer.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"80\"></td></tr>";
						echo "<tr>";
							echo "<td>";
								echo "<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" width=\"400\" height=\"160\">"; 
									echo "<tr>";
										echo "<td bgcolor=\"#FF8080\" align=\"center\" height=\"10\">";
											echo "<font face=\"Arial\" size=\"3\"><b>".$fehler."</b> Fehler in der Eingabe<br></font>";
										echo "</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td bgcolor=\"#ffffff\" valign=\"top\">";
											echo "<font face=\"Arial\" size=\"2\">".$fehlerstr."</font>";
										echo "</td>";
									echo "</tr>";
								echo "</table>";
							echo "</td>";
						echo "</tr>";
						echo "<tr><td><img src=\"spacer.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"80\"></td></tr>";
					}else{
						echo "<tr><td><img src=\"spacer.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"320\"></td></tr>";
						if (isset($ausgabe)) { 
							echo "<tr><td><table align=\"center\"><tr><td bgcolor=\"#008000\"><font face=\"Arial\" size=\"3\">".$ausgabe."</font></td></tr></table></td></tr>";
						}
					}
				?>
				<tr>
					<td>
						<table border="0" cellpadding="0" cellspacing="0" align="center">
							<tr>
								<td bgcolor="<?php if ($frage_fehler) { echo $fehlerfarbe; } else { echo $farbe; } ?>"><font face="Arial" size="2">&nbsp;&nbsp;Frage &nbsp;&nbsp;</font></td>
								<td align="center" colspan="4">
									<input name="frage" type="text" size="117" maxlength="200" <?php if ($Pfrage != "") echo "value=\"".$Pfrage."\""; ?> >
								</td>
							</tr>
							<tr><td colspan="5"><img src="spacer.gif" border="0" alt="" width="1" height="15"></td></tr>
							<tr>
								<td bgcolor="<?php if ($antworta_fehler) { echo $fehlerfarbe; } else { echo $farbe; } ?>"><font face="Arial" size="2">&nbsp;&nbsp;Antwort A &nbsp;&nbsp;</font></td>
								<td align="center">
									<input name="antworta" type="text" size="80" maxlength="100" <?php if ($Pantworta != "") echo "value=\"".$Pantworta."\""; ?> >
								</td>
								<td><img src="spacer.gif" border="0" alt="" width="20" height="1"></td>
								<td bgcolor="#FFFFFF"><font face="Arial" size="2">&nbsp;&nbsp;Richtige Antwort &nbsp;&nbsp;</font></td>
								<td>
									<select name="richtigeantwort" size="1">
								      	<option <?php if ($Prichtigeantwort == "A") echo "selected"; ?> >A</option>
								      	<option <?php if ($Prichtigeantwort == "B") echo "selected"; ?> >B</option>
								      	<option <?php if ($Prichtigeantwort == "C") echo "selected"; ?> >C</option>
								      	<option <?php if ($Prichtigeantwort == "D") echo "selected"; ?> >D</option>
								    </select>
								</td>
							</tr>
							<tr><td><img src="spacer.gif" border="0" alt="" width="1" height="5"></td></tr>
							<tr>
								<td bgcolor="<?php if ($antwortb_fehler) { echo $fehlerfarbe; } else { echo $farbe; } ?>"><font face="Arial" size="2">&nbsp;&nbsp;Antwort B &nbsp;&nbsp;</font></td>
								<td align="center">
									<input name="antwortb" type="text" size="80" maxlength="100" <?php if ($Pantwortb != "") echo "value=\"".$Pantwortb."\""; ?> >
								</td>
								<td>&nbsp;</td>
								<td bgcolor="<?php if ($joker50_fehler) { echo $fehlerfarbe; } else { echo $farbe; } ?>"><font face="Arial" size="2">&nbsp;&nbsp;50:50 Joker &nbsp;&nbsp;</font></td>
								<td>
									<select name="joker50_1" size="1"><option <?php if ($Pjoker50_1 == "A") echo "selected"; ?> >A</option><option <?php if ($Pjoker50_1 == "B") echo "selected"; ?> >B</option><option <?php if ($Pjoker50_1 == "C") echo "selected"; ?> >C</option><option <?php if ($Pjoker50_1 == "D") echo "selected"; ?> >D</option></select><select name="joker50_2" size="1"><option <?php if ($Pjoker50_2 == "A") echo "selected"; ?> >A</option><option <?php if ($Pjoker50_2 == "B") echo "selected"; ?> >B</option><option <?php if ($Pjoker50_2 == "C") echo "selected"; ?> >C</option><option <?php if ($Pjoker50_2 == "D") echo "selected"; ?> >D</option></select>
								</td>
							</tr>
							<tr><td><img src="spacer.gif" border="0" alt="" width="1" height="5"></td></tr>
							<tr>
								<td bgcolor="<?php if ($antwortc_fehler) { echo $fehlerfarbe; } else { echo $farbe; } ?>"><font face="Arial" size="2">&nbsp;&nbsp;Antwort C &nbsp;&nbsp;</font></td>
								<td align="center">
									<input name="antwortc" type="text" size="80" maxlength="100" <?php if ($Pantwortc != "") echo "value=\"".$Pantwortc."\""; ?> >
								</td>
								<td>&nbsp;</td>
								<td bgcolor="#FFFFFF"><font face="Arial" size="2">&nbsp;&nbsp;Schwierigkeitsgrad &nbsp;&nbsp;</font></td>
								<td>
									<select name="schwierigkeit" size="1">
								      	<option <?php if ($Pschwierigkeit == 1) echo "selected"; ?> >1</option>
								      	<option <?php if ($Pschwierigkeit == 2) echo "selected"; ?> >2</option>
								      	<option <?php if ($Pschwierigkeit == 3) echo "selected"; ?> >3</option>
								    </select>
								</td>
							</tr>
							<tr><td><img src="spacer.gif" border="0" alt="" width="1" height="5"></td></tr>
							<tr>
								<td bgcolor="<?php if ($antwortd_fehler) { echo $fehlerfarbe; } else { echo $farbe; } ?>"><font face="Arial" size="2">&nbsp;&nbsp;Antwort D &nbsp;&nbsp;</font></td>
								<td align="center">
									<input name="antwortd" type="text" size="80" maxlength="100" <?php if ($Pantwortd != "") echo "value=\"".$Pantwortd."\""; ?> >
								</td>
								<td>&nbsp;</td>
								<td align="center" colspan="2">
									<input type="submit" value="&Uuml;bertragen ">
									<input name="writefilename" type="hidden" value="<?php echo $filenames_feld[$aktfilenr]; ?>">
								</td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
								<td align="center" colspan="2">
									<img src="spacer.gif" border="0" alt="" width="1" height="5"><br>
									<?php
										$delfilename = $filenames_feld[$aktfilenr];
										echo "<a href=\"./delfile_modify.php?filepath=$filepath&delfilename=$delfilename&username='master'&pwd='mko09ijn'\"><img src=\"../button_del.jpg\" border=\"0\"></a>";
									?>
								</td>
							</tr>
						</table>						
					</td>
				</tr>
				</form>
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
	else {
?>
<table border="0" cellpadding="0" cellspacing="0" background="../bg.jpg" width="1024" height="634" align="center">
	<tr>
		<td valign="top">
		
			<table border="0" align="center" cellpadding="0" cellspacing="0">
				<tr><td><img src="../spacer.gif" border="0" alt="" width="1" height="10"></td></tr>
				<tr>
					<td>
						<table align="center" border="0">
							<tr>
								<td><img src="../spacer.gif" border="0" alt="" width="50" height="1"></td>
								<td bgcolor="#ffffff"><font face="Arial" size="5">Wer wird... &Auml;ndern der Fragen</font></td>
								<td><img src="../spacer.gif" border="0" alt="" width="50" height="1"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr><td><img src="../spacer.gif" border="0" alt="" width="1" height="10"></td></tr>
				<tr>
					<td>
						<table border="1" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td bgcolor="#ff0000">Keine Fragen-Dateien vorhanden</td>
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
?>
<table align="center"><tr><td><a href="./login.php">Zurück zum Adminbereich</a></td></tr></table>
<?php
//	} //angemeldet
?>

<?php 
	include("./logout.php");
	include("../inc_footer.php"); 
?>

