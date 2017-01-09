<?php
include_once "inc_cookie.php";

	setcookie ("wwadmin", "", time() - 3600, "/");
    removeIP("logins/logins.login");

	header('Location: ./admin.php');
?>