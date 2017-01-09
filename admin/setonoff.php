<?php
	include("../inc_header.php"); 
	include("./inc_func.php"); 
?>

<?php
//Parameter auswerten -> weil registerglobals off
//	echo $_SERVER['argc'];
	if (isset($_SERVER['argc'])) {
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
	$wert = $_GET["wert"];
// ********************************************************

//echo $wert;
				$filename = "../frei.txt";
			   	if (!$handle = fopen($filename, "w")) {
//		        	print "Kann die Datei $filename nicht �ffnen";
		   	     	exit;
				}
			    if (!fputs($handle, $wert)) {
// 	    		print "Kann in die Datei $filename nicht schreiben";
   	    			exit;
   				}
//				print "Fertig, geschrieben";
				fclose($handle);
				include("./admin.php");
?>

<?php include("../inc_footer.php"); ?>
