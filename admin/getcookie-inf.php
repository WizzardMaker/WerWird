<?php
	if (isset($_COOKIE['wwadmin'])) {
		$AdminCookie = $_COOKIE["wwadmin"];
	}
	else {
<<<<<<< Updated upstream
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
