<?php
include_once "inc_cookie.php";

	if (isset($_COOKIE['wwadmin'])) {
		$AdminCookie = $_COOKIE["wwadmin"];
	}
	else {

        $filePath = "logins/logins.login";
        if(file_exists($filePath)){
            $AdminCookie = hasIP("logins/logins.login") ? "master" : "";
        }else{
            $AdminCookie = "";
        }
	}
?>
