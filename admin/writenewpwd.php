<?php
	include("../inc_header.php"); 
	include("./inc_func.php"); 
?>

<?php
				$Pneuspwd = $_POST["neuspwd"];
				
				$filename = "../pwd.txt";
			   	if (!$handle = fopen($filename, "w")) {
//		        	print "Kann die Datei $filename nicht öffnen";
		   	     	exit;
				}
			    if (!fputs($handle, $Pneuspwd)) {
// 	    		print "Kann in die Datei $filename nicht schreiben";
   	    			exit;
   				}
//				print "Fertig, geschrieben";
				fclose($handle);
				include("./admin.php");
?>

<?php include("../inc_footer.php"); ?>
