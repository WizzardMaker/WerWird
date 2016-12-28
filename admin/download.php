<?php
	include("./getcookie-inf.php");
	include("../inc_header.php"); 
	include("./inc_func.php"); 

//Parameter auswerten -> weil registerglobals off
//	echo $_SERVER['argc'];
	if (isset($_SERVER['argc'])) {
		//mind. ein Parameter
		if ($_SERVER['argc'] == 1) {
			//genau ein Parameter
			$parameter = $_SERVER['argv'][1]; //holt den ben�tigten Parameter
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
//	if ($AdminCookie != "master") {
//		include("./admin.php");
//	}
//	else {
	//alle files �ffnen und in feld schreiben
		$filepath = "../files/";

		$filenames = getthemilfilenames($filepath, ".mil");
		
		if(isset($filenames[0])){
			echo "<table align=\"center\">";
				echo "<tr><td align=\"center\"><font face=\"Arial\" size=\"3\" color=\"#ffffff\">DOWNLOAD</font></td></tr>";
				echo "<tr><td><img src=\"spacer.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"10\"></td></tr>";
				echo "<tr><td><font face=\"Arial\" size=\"2\" color=\"#ffffff\">Anzeigen: Dateiname linksklicken.</font></td></tr>";
				echo "<tr><td><font face=\"Arial\" size=\"2\" color=\"#ffffff\">Speichern: Dateiname rechtsklicken und Ziel speichern unter wählen.</font></td></tr>";
				echo "<tr><td><font face=\"Arial\" size=\"2\" color=\"#ffffff\">Löschen: auf Löschsymbol klicken. Achtung, keine Sicherheitsabfrage vorhanden.</font></td></tr>";
				echo "<tr><td><img src=\"spacer.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"10\"></td></tr>";
				echo "<tr><td>";
					echo "<table border=\"1\" bgcolor=\"#ffffff\" align=\"center\" width=\"500\">"; 
						echo "<tr><td><font face=\"Arial\" size=\"2\">Nr.</font></td><td><font face=\"Arial\" size=\"2\">Dateiname</font></td><td><font face=\"Arial\" size=\"2\">Löschen</font></td></tr>";


							for ($i=0; $i<count($filenames); $i++) {
								echo "<tr>";
									echo "<td><font face=\"Arial\" size=\"2\">".($i+1)."</font></td>";
									echo "<td><font face=\"Arial\" size=\"2\"><a href=\"".$filepath.$filenames[$i]."\">".$filenames[$i]."</a></font></td>";
									$delfilename = $filepath.$filenames[$i];
									echo "<td><a href=\"./delfile.php?delfilename=$delfilename\"><img src=\"../del_pic.gif\" border=\"0\" align=\"\"></a></td>";
								echo "</tr>";
							}
					echo "</table>";
				echo "</td></tr>";
			echo "</table>";
		}else{
			echo "<table align=\"center\">";
			echo "<td>";
				echo "<td><font face=\"Arial\" size=\"3\" color=\"#ffffff\">Es gibt keine .mil Dateien, du musst erst Fragen zusammenfassen!</font></td>";
			echo "</td>";
			
			echo "</table>";
		}
?>
	<table align="center">
		<tr>
			<td bgcolor="#ffffff">
				<?php
					echo "<a href=\"./login.php\">Adminbereich</a>";
				?>
			</td>
		</tr>
	</table>
<?php
	include("./logout.php");
	include("../inc_footer.php"); 
?>
