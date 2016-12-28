<?php
	include("./getcookie-inf.php");
	include("../inc_header.php"); 
	include("./inc_func.php"); 
//Parameter auswerten -> weil registerglobals off
//	echo $_SERVER['argc'];
/*
	if (isset($_SERVER['argc'])) {
		//mind. ein Parameter
		if ($_SERVER['argc'] == 1) {
			//genau ein Parameter
			$parameter = $_SERVER['argv'][0]; //holt den benötigten Parameter
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
	}*/
// ********************************************************


	//username und pwd auswerten
//	if ($AdminCookie != "master") {
//		include("./admin.php");
//	}
//	else {
	//alle files öffnen und in feld schreiben
		$filepath = "../files/";

		$lastname_int = lastfilename_int($filepath, ".frage"); //enthält den int-wert des letzten files im verz.
//		echo "max-file:".$lastname_int."<br>";

		if 	($lastname_int > "-1") {
//			echo "drin";
			//namen aller files im verz. emitteln
			$filenames_feld = getthefilenames($filepath, $lastname_int, ".frage");
//			for ($i=0; $i<count($filenames_feld); $i++) {
//				echo "namen: ".$filenames_feld[$i]."<br>";
//			}

			//testen ob filenames auch existieren
			$filenames_feld = filenames_exist($filepath, $filenames_feld);
//			for ($i=0; $i<count($filenames_feld); $i++) {
//				echo "vorhanden namen: ".$filenames_feld[$i]."<br>";
//			}
		
			//inhalte aus files holen
			$inhalt_feld = array();
			for ($i=0; $i<count($filenames_feld); $i++) {
				$inhalt_feld[$i] = getthecontent_withoutDel($filepath, $filenames_feld[$i]);
			}
		
		} //end if 	($lastname_int > "-1")
		
		if ($lastname_int > "-1") {
		//filename abfragen
	?>
			<table align="center"><tr><td>
				<form action="writethefile.php" method="post">
					<table align="center">
						<tr>
							<td bgcolor="#ffffff">Filename (ohne Endung) :</td>
							<td><input name="ergfilename" type="text" size="10" maxlength="10"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value=" ZusammenfÃ¼gen "></td>
						</tr>
					</table>
				</form>
			</td></tr></table>
	<?php
			// in temp-file schreiben
			//echo "hier";
			$filename = $filepath.'temp.txt';

			if (file_exists($filename)) {
				if (unlink($filename)) {
					//echo "gelÃ¶scht<br>";
				}
				else {
					//echo "lÃ¶schen nicht mÃ¶glich<br>";
				}
			}
		
			for ($i=0; $i<count($inhalt_feld); $i++) {
			   	if (!$handle = fopen($filename, "a")) {
//		        	print "Kann die Datei $filename nicht öffnen";
		   	     	exit;
				}
			    if (!fputs($handle, $inhalt_feld[$i])) {
// 	    		print "Kann in die Datei $filename nicht schreiben";
   	    			exit;
   				}
//				print "Fertig, geschrieben";
				fclose($handle);
			}
	
	
			//alle inhalte zeigen
			echo "<table border=\"1\" bgcolor=\"#ffffff\"align=\"center\">";
			echo "<tr><td colspan=\"2\"align=\"center\">Inhalte:</td></tr>";
			for ($i=0; $i<count($inhalt_feld); $i++) {
				echo "<tr><td>".$filenames_feld[$i]."</td><td>".$inhalt_feld[$i]."</td></tr>";
			}
			echo "</table>";
			echo "<table align=\"center\"><tr><td><a href=\"./login.php\">ZurÃ¼ck zum Adminbereich</a></td></tr></table>";
			include("./logout.php");
			include("../inc_footer.php");
		} //end if 	($lastname_int > "-1")
		else {
			$ausgabe = "keine Fragen-Files vorhanden";
			include("./login.php");
		}
//	} //End else login ok

?>
