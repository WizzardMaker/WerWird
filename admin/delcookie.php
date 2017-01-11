<?php
    include_once "inc_cookie.php";

	setcookie ("wwadmin", "", 1, "/");
    //removeIP("logins/logins.login");
    //echo "<script type='text/javascript'>window.location.href = './admin.php';</script>";
	header('Location: ./admin.php');
    //exit();
?>