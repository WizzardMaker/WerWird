<?php
	function getthemilfilenames($filepath, $endung) {
		$fh = opendir($filepath); //Verzeichnis
		$verzeichnisinhalt = array();
		while (true == ($file = readdir($fh))) {
			$verzeichnisinhalt[] = $file;
		}
		//Sortierung
		sort ($verzeichnisinhalt);
		natcasesort ($verzeichnisinhalt);
		reset ($verzeichnisinhalt);
		$rueckgabe = "";
		$j=0;
		for ($i=0; $i<count($verzeichnisinhalt); $i++) {
			if (($verzeichnisinhalt[$i] != ".") && ($verzeichnisinhalt[$i] != "..")) {
				if (preg_match("/".$endung."$/", $verzeichnisinhalt[$i])) {
					$rueckgabe[$j] = $verzeichnisinhalt[$i];
					$j = $j + 1;
				}
			}
		}

		return ($rueckgabe);
	}

	function lastfilename_int($filepath, $endung) {
		//gib den letzten filenamen im dir als int zur�ck
		// files in der form
		//		001.frage, 004.frage, 123.frage ...
		// ergebnis w�re 123

		$fh = opendir($filepath); //Verzeichnis
		$verzeichnisinhalt = array();
		while (true == ($file = readdir($fh))) {
			$verzeichnisinhalt[] = $file;
		}
		//Sortierung
		sort ($verzeichnisinhalt);
		natcasesort ($verzeichnisinhalt);
		reset ($verzeichnisinhalt);

		//$debug = preg_match("/^[0-9]{3}/", "000.frage");


		//
		for($i=0; $i < count($verzeichnisinhalt); $i++) {
			if (strlen($verzeichnisinhalt[$i]) < 10) {
				if (preg_match("/".$endung."$/", $verzeichnisinhalt[$i]) == 1) {
					if (preg_match("/^[0-9]{3}/", $verzeichnisinhalt[$i], $neu) == 1) {
						//echo $verzeichnisinhalt[$i]."<br>";
					}
					else {
//						echo $verzeichnisinhalt[$i]."   NEIN-Zahlen<br>";
					}
				}
				else {
//					echo $verzeichnisinhalt[$i]."   NEIN-frage<br>";
				}
			}
			else {
//				echo $verzeichnisinhalt[$i]."   NEIN-zulang<br>";
			}
		}


		$error = error_get_last();

		if(!isset($neu)){
			return(-1);
		}
		for ($i=0; $i<count($neu); $i++) {
			settype($neu[$i], 'integer');

			$erg = $neu[$i];
		}
		return($erg);
	}

	function getthefilenames($filepath, $lastname_int, $endung) {
	// ermittelt alle filenames ausgehen von der int
	//	Bsp:	lastname_int == 3
	//		->
	//	003.frage
	//	002.frage
	//	001.frage
	//	000.frage
	// als feld
		$erg_feld = array();
		for ($i=$lastname_int; $i>=0; $i--) {
			//echo "--".$i."";
			if ($i < 10) {
				$name_str = "00".$i;
			}
			else {
				if ($i < 100) {
					$name_str = "0".$i;
				}
				else {
					$name_str = $i;
				}
			}
	//		echo "name_str: ".$name_str."<br>";
			if ($i == "0") {
				$name_str = "000";
			}
			//echo " ".$name_str."<br>";
			$erg_feld[$i] = $name_str.$endung;
		}
		return($erg_feld);
	}

	function filenames_exist($filepath, $filenames_feld) {
	//pr�ft ob die namen aus $filenames_feld auch wirklich existieren
	// r�ckgabe des feldes nur mit ex. filenamen
		$j=0;
		$erg_feld = array();
		for ($i=0; $i<count($filenames_feld); $i++) {
			if (file_exists($filepath.$filenames_feld[$i])) {
				$erg_feld[$j] = $filenames_feld[$i];
				$j = $j + 1;
//			   print "The file $filename exists";
			}
			else {
//			   print "The file $filename does not exist";
			}
		}
		return($erg_feld);
	}

	function getthecontent($filepath, $filename) {
	// gibt den inhalt des files als string zur�ck
		$fn = $filepath.$filename;
		$handle = fopen ($fn, "r");
		$contents = fread ($handle, filesize ($fn));
		fclose ($handle);
		if (unlink($fn)) {
//			echo "gel�scht<br>";
		}
		else {
//				echo "l�schen nicht m�glich<br>";
		}
//		echo "--".$contents."<br>";
		return($contents);
	}

	function getthecontent_withoutDel($filepath, $filename) {
	// gibt den inhalt des files als string zur�ck
		$fn = $filepath.$filename;
		$handle = fopen ($fn, "r");
		$contents = fread ($handle, filesize ($fn));
		fclose ($handle);
//		echo "--".$contents."<br>";
		return($contents);
	}

	function delfile($filepath, $filename) {
	// l�scht file
		$fn = $filepath.$filename;
		if (unlink($fn)) {
//			echo "gel�scht<br>";
		}
		else {
//				echo "l�schen nicht m�glich<br>";
		}
//		echo "--".$contents."<br>";
	}
?>
