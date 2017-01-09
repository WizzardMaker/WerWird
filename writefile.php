<?php
	$Prichtigeantwort = $_POST["richtigeantwort"];
	$Pjoker50_1 = $_POST["joker50_1"];
	$Pjoker50_2 = $_POST["joker50_2"];
	$Pschwierigkeit = $_POST["schwierigkeit"];
	$Pfrage = $_POST["frage"];
	$Pantworta = $_POST["antworta"];
	$Pantwortb = $_POST["antwortb"];
	$Pantwortc = $_POST["antwortc"];
	$Pantwortd = $_POST["antwortd"];

	$isEmbedded = false;

//	echo "Richtige Antwort: ".$Prichtigeantwort."<br>";
//	echo "50:50 - 1: ".$Pjoker50_1."<br>";
//	echo "50:50 - 2: ".$Pjoker50_2."<br>";
//	echo "Schwierigkeit: ".$Pschwierigkeit."<br>";
//	echo "Frage: ".$Pfrage."<br>";
//	echo "Antwort A: ".$Pantworta."<br>";
//	echo "Antwort B: ".$Pantwortb."<br>";
//	echo "Antwort C: ".$Pantwortc."<br>";
//	echo "Antwort D: ".$Pantwortd."<br>";

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
	if ($Prichtigeantwort == $Pjoker50_1 || $Prichtigeantwort == $Pjoker50_2) {
		$fehler = $fehler + 1;
		$joker50_fehler = TRUE;
		$fehlerstr = $fehlerstr."Die richtige Antwort darf nicht vom 50:50 Joker entfert werden<br>";
	}
    if($Pjoker50_1== $Pjoker50_2){
        $fehler = $fehler + 1;
		$joker50_fehler = TRUE;
		$fehlerstr = $fehlerstr."Der 50:50 Joker muss 2 verschiedene Fragen elemenieren<br>";
    }
    if ($Pfrage == "") {
		$fehler = $fehler + 1;
		$frage_fehler = TRUE;
		$fehlerstr = $fehlerstr."Es wurde keine Frage eingegeben<br>";
	}
	if ($Pantworta == "") {
		$fehler = $fehler + 1;
		$antworta_fehler = TRUE;
		$fehlerstr = $fehlerstr."Antwort A fehlt<br>";
	}
	if ($Pantwortb == "") {
		$fehler = $fehler + 1;
		$antwortb_fehler = TRUE;
		$fehlerstr = $fehlerstr."Antwort B fehlt<br>";
	}
	if ($Pantwortc == "") {
		$fehler = $fehler + 1;
		$antwortc_fehler = TRUE;
		$fehlerstr = $fehlerstr."Antwort C fehlt<br>";
	}
	if ($Pantwortd == "") {
		$fehler = $fehler + 1;
		$antwortd_fehler = TRUE;
		$fehlerstr = $fehlerstr."Antwort D fehlt<br>";
	}

	if ($fehler != 0) {

		//echo "<font color=\"#ff0000\">";
		//echo "-----------------------------------------------<br>";
		//echo $fehler." Fehler:<br>";
		//echo $fehlerstr."";
		//echo "-----------------------------------------------<br>";
		//echo "</font>";
		//echo "<a href=\"javascript:history.back()\">zur&uumlck</a>";

		include("./eingabe.php");
	}
	else {
//		echo "<font color=\"#008000\">-----------------------------------------------<br>keine Fehler<br>-----------------------------------------------<br></font><br>";
		$inhalt_file = "empty".PHP_EOL."frage.jpg".PHP_EOL.$Pschwierigkeit.PHP_EOL.$Prichtigeantwort.PHP_EOL.$Pfrage.PHP_EOL.$Pantworta.PHP_EOL.$Pantwortb.PHP_EOL.$Pantwortc.PHP_EOL.$Pantwortd.PHP_EOL.$Pjoker50_1.PHP_EOL.$Pjoker50_2.PHP_EOL."#".PHP_EOL;
//		echo "Inhalt für die Datei:<br>-----------------------------------------------<br> ".$inhalt_file."-----------------------------------------------<br>";



		//****************************************************************
		// Name des zu schreibenden Files ermittel
		$filepath = "./files/";

		$fh = opendir($filepath); //Verzeichnis
		$verzeichnisinhalt = array();
		while (true == ($file = readdir($fh))) {
			$verzeichnisinhalt[] = $file;
		}
		//Sortierung
		sort ($verzeichnisinhalt);
		natcasesort ($verzeichnisinhalt);
		reset ($verzeichnisinhalt);


        $neu = array();
        $loop = 0;
		for($i=0; $i < count($verzeichnisinhalt); $i++) {
			if (strlen($verzeichnisinhalt[$i]) < 10) {
				if (preg_match("/frage$/", $verzeichnisinhalt[$i])) {
					if (preg_match("/[0-9]{3}/", $verzeichnisinhalt[$i], $neuSet)) {
                        array_push($neu,$neuSet[0]);
					}
					else {
//						echo $verzeichnisinhalt[$i]."   NEIN-Zahlen<br>";
					}
				}
				else {
//					echo $verzeichnisinhalt[$i]."   NEIN-mil<br>";
				}
			}
			else {
//				echo $verzeichnisinhalt[$i]."   NEIN-zulang<br>";
			}
		}

        //echo count($neu);
		for ($i=0; $i < count($neu); $i++) {

			settype($neu[$i], "int");
			$name_int = $neu[$i]+1;
		}

//		echo "name_int: ".$name_int."<br>";
		if ($name_int < 10) {
			$name_str = "00".$name_int;
		}
		else {
			if ($name_int < 100) {
				$name_str = "0".$name_int;
			}
			else {
				$name_str = $name_int;
			}
		}
//		echo "name_str: ".$name_str."<br>";
		if ($name_str == "00") {
			$name_str = "000";
		}
	//****************************************************************

		// File schreiben

		$filename = "./files/".$name_str.".frage";	//Path für file setzen
//        echo $filename;

		if (!$handle = fopen($filename, "w")) {						//file für schreiben öffnen
   			print "Kann die Datei $filename nicht öffnen";
   			exit;
		}
		if (!fwrite($handle, $inhalt_file)) {							//inhalt schreiben
			print "Kann in die Datei $filename nicht schreiben";
			exit;
		}
		$ausgabe = "Frage hinzugefügt";
		//print "<br>".$filename." geschrieben";
		fclose($handle);										//file schliessen
		chmod ($filename, 0666);	//schreibrechte setzen
		//echo "<center><a href=\"./eingabe.php\">zurück</a></center>";
		$Prichtigeantwort = "";
		$Pjoker50_1 = "";
		$Pjoker50_2 = "";
		$Pschwierigkeit = "";
		$Pfrage = "";
		$Pantworta = "";
		$Pantwortb = "";
		$Pantwortc = "";
		$Pantwortd = "";
		include ("./eingabe.php");
	}
?>

