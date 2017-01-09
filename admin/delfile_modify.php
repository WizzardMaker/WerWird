<?php include("./getcookie-inf.php"); ?>
<?php
	include("./inc_func.php"); 
//Parameter auswerten -> weil registerglobals off
//	echo $_SERVER['argc'];
/*
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

if ($AdminCookie != "master") {
	include("./admin.php");
}
else {
	$delfilename = $_GET["delfilename"];
	
	//echo $delfilename;
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
		}

	for ($i=0; $i<count($filenames_feld); $i++) {
		if ($filenames_feld[$i] == $delfilename) {
			$aktfilenr = $i;
		}
	}

	$delfilename = $filepath.$delfilename;

//	echo "akt= ".$aktfilenr."<br>";
	$maxfilenr = $i-1;
	
	//n�chstes file
	if ($aktfilenr+1 <= $maxfilenr) {
		//echo "naechstes File: ".$filenames_feld[$aktfilenr+1]."<br>";
		$nextfile = $filenames_feld[$aktfilenr+1];
	}
	else {
		//echo "naechstes File: ".$filenames_feld[0]."<br>";
		$nextfile = $filenames_feld[0];
	}

	//username und pwd auswerten
	if (file_exists($delfilename)) {
		if (unlink($delfilename)) {
//				echo "gel�scht<br>";
		}
		else {
//				echo "l�schen nicht m�glich<br>";
		}
	}
	else {
	}
//echo $nextfile;
//include("editquest.php?aktfile=$nextfile");

$aktfile = $nextfile;

include("./editquest.php");
}

?>