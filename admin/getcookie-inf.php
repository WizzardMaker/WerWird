<?php
include_once "inc_cookie.php";

	if (isset($_COOKIE['wwadmin'])) {
		$AdminCookie = $_COOKIE["wwadmin"];
	}
	else {
        $filePath = "logins/".$_SERVER["REMOTE_ADDR"].".login";
        if(file_exists($filePath)){
            $AdminCookie = hasIP("logins/logins.login") ? "master" : "";
        }
		$AdminCookie = "";
	}
?>
