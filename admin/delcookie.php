﻿<?php
	setcookie ("wwadmin", "", time() - 3600, "/");
	header('Location: ./admin.php');
?>