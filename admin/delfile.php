<?php include("./getcookie-inf.php"); ?>
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
// ********************************************************

//echo $delfilename;
	$delfilename = $_GET["delfilename"];
	//username und pwd auswerten
	if ($AdminCookie == "master") {
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
	}

include("./download.php");
?>