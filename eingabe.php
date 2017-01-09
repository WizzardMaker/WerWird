<?php include("inc_header.php"); ?>
<?php
	$farbe = "#FFFFFF";
	$fehlerfarbe = "#FF0000";

    if($isEmbedded == true || isset($fehler) == false){
	    $ausgabe = "";
	    $joker50_fehler = false;
	    $frage_fehler = false;
	    $antworta_fehler = false;
	    $antwortb_fehler = false;
	    $antwortc_fehler = false;
	    $antwortd_fehler = false;
	
	    //Eingabefehler auswerten
	    $fehler = 0;
	    $fehlerstr = "";
	    $Prichtigeantwort = "";
	    $Pjoker50_1 = "";
	    $Pjoker50_2 = "";
	    $Pschwierigkeit = "";
	    $Pfrage = "";
	    $Pantworta = "";
	    $Pantwortb = "";
	    $Pantwortc = "";
	    $Pantwortd = "";
    }
?>
<table border="0" cellpadding="0" cellspacing="0" background="bg.jpg" width="1024" height="634" align="center">
	<tr>
		<td valign="top">
		
			<table border="0" align="center" cellpadding="0" cellspacing="0">
				<tr><td><img src="spacer.gif" border="0" alt="" width="1" height="10"></td></tr>
				<tr>
					<td>
						<table align="center" border="0">
							<tr>
								<td><img src="spacer.gif" border="0" alt="" width="50" height="1"></td>
								<td bgcolor="#ffffff"><font face="Arial" size="5">Wer wird... Eingabemaske</font></td>
								<td><img src="spacer.gif" border="0" alt="" width="50" height="1"></td>
							</tr>
						</table>
					</td>
				</tr>
				<form action="writefile.php" method="post">
				<?php
					if ($fehler == 0) {
						echo "<tr><td><img src=\"spacer.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"320\"></td></tr>";
						if ($ausgabe != "") { 
							echo "<tr><td><table align=\"center\"><tr><td bgcolor=\"#008000\"><font face=\"Arial\" size=\"3\">".$ausgabe."</font></td></tr></table></td></tr>";
						}
					}
					else {
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
									<input type="submit" value=" Übertragen ">
								</td>
							</tr>
						</table>						
						
					</td>
				</tr>
				</form>
			</table>
		
		</td>
	</tr>
</table>
<?php include("inc_footer.php"); ?>
