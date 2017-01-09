<?php
include_once "inc_cookie.php";

	if (isset($_COOKIE['wwadmin'])) {
		$AdminCookie = $_COOKIE["wwadmin"];
	}
	else {
<<<<<<< HEAD
<<<<<<< Updated upstream
=======
        $filePath = "logins/".$_SERVER["REMOTE_ADDR"].".login";
        if(file_exists($filePath)){
            $AdminCookie = hasIP("logins/logins.login") ? "master" : "";
        }
>>>>>>> 294d17a005f77580cbfc963ed27c701e8b4e2970
		$AdminCookie = "";
=======
        $filePath = "logins/logins.login";
        if(file_exists($filePath)){
            $AdminCookie = hasIP("logins/logins.login") ? "master" : "";
        }else{
            $AdminCookie = "";
        }
>>>>>>> Stashed changes
	}
?>
