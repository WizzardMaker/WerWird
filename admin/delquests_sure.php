﻿<?php

	include("./getcookie-inf.php");
	include("./inc_func.php"); 
/*
//Parameter auswerten -> weil registerglobals off
//	echo $_SERVER['argc'];
	if ($_SERVER['argc'] > 0) {
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
	}*/
// ********************************************************

//	if ($AdminCookie != "master") {	
//		include("./admin.php");
//	}
//	else {
		
		$filepath = "../files/";

		$lastname_int = lastfilename_int($filepath, ".frage"); //enth�lt den int-wert des letzten files im verz.

		if 	($lastname_int > "-1") {
			//namen aller files im verz. emitteln
			$filenames_feld = getthefilenames($filepath, $lastname_int, ".frage");	

			//testen ob filenames auch existieren
			$filenames_feld = filenames_exist($filepath, $filenames_feld);
			for ($i=0; $i<count($filenames_feld); $i++) {
				// echo $filenames_feld[$i]."<br>";
				delfile($filepath, $filenames_feld[$i]);
				$ausgabe = "alle Fragen gelöscht";
			}
		}
		
//	}
	include("./login.php");
?>