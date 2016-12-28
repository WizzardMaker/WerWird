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
	$Pwritefilename = $_POST["writefilename"];
	
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
	$joker50_fehler = FALSE;
	$frage_fehler = FALSE;
	$antworta_fehler = FALSE;
	$antwortb_fehler = FALSE;
	$antwortc_fehler = FALSE;
	$antwortd_fehler = FALSE;
	
	//Eingabefehler auswerten
	$fehler = 0;
	$fehlerstr = "";
	if ($Prichtigeantwort == $Pjoker50_1) {
		$fehler = $fehler + 1;
		$joker50_fehler = TRUE;
		$fehlerstr = $fehlerstr."Die richtige Antwort darf nicht vom 50:50 Joker entfert werden<br>";
	}
	if ($Prichtigeantwort == $Pjoker50_2) {
		$fehler = $fehler + 1;
		$joker50_fehler = TRUE;
		$fehlerstr = $fehlerstr."Die richtige Antwort darf nicht vom 50:50 Joker entfert werden<br>";
	}
	if ($Pfrage == "") {
		$fehler = $fehler + 1;
		$frage_fehler = TRUE;
		$fehlerstr = $fehlerstr."es wurde keine Frage eingegeben<br>";
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
/*
		echo "<font color=\"#ff0000\">";
		echo "-----------------------------------------------<br>";
		echo $fehler." Fehler:<br>";
		echo $fehlerstr."";
		echo "-----------------------------------------------<br>";
		echo "</font>";
		echo "<a href=\"javascript:history.back()\">zur�ck</a>";
*/
		$aktfile = $Pwritefilename;
		include("./editquest.php");
	}
	else {
//		echo "<font color=\"#008000\">-----------------------------------------------<br>keine Fehler<br>-----------------------------------------------<br></font><br>";
		$inhalt_file = "empty\nfrage.jpg\n".$Pschwierigkeit."\n".$Prichtigeantwort."\n".$Pfrage."\n".$Pantworta."\n".$Pantwortb."\n".$Pantwortc."\n".$Pantwortd."\n".$Pjoker50_1."\n".$Pjoker50_2."\n#\n";
//		echo "Inhalt f�r die Datei:<br>-----------------------------------------------<br> ".$inhalt_file."-----------------------------------------------<br>";
		
	

		//****************************************************************
		// Name des zu schreibenden Files ermittel

		// File schreiben
		$filename = "../files/".$Pwritefilename;						//Path f�r file setzen
		if (!$handle = fopen($filename, "w")) {						//file f�r schreiben �ffnen
   			print "Kann die Datei $filename nicht �ffnen";
   			exit;
		}
		if (!fwrite($handle, $inhalt_file)) {							//inhalt schreiben
			print "Kann in die Datei $filename nicht schreiben";
			exit;
		}
		$ausgabe = "Frage geändert";
		//print "<br>".$filename." geschrieben";
		fclose($handle);											//file schliessen
		//echo "<center><a href=\"./eingabe.php\">zur�ck</a></center>";
		$Prichtigeantwort = "";
		$Pjoker50_1 = "";
		$Pjoker50_2 = "";
		$Pschwierigkeit = "";
		$Pfrage = "";
		$Pantworta = "";
		$Pantwortb = "";
		$Pantwortc = "";
		$Pantwortd = "";
		$aktfile = $Pwritefilename;
		include ("./editquest.php");
	}
?>

