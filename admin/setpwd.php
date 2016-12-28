<?php include("./getcookie-inf.php"); ?>
<?php
	include("../inc_header.php"); 
	include("./inc_func.php"); 
?>
<?php
//Parameter auswerten -> weil registerglobals off
//	echo $_SERVER['argc'];
/*
	if ($_SERVER['argc'] > 0) {
		//mind. ein Parameter
		if ($_SERVER['argc'] == 1) {
			//genau ein Parameter
			$parameter = $_SERVER['argv'][0]; //holt den benötigten Parameter
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
	}*/
// ********************************************************


	//username und pwd auswerten
	if ($AdminCookie != "master") {	
		include("./admin.php");
	}else{
?>
<img src="./spacer.gif" border="0" alt="0" height="20" width="1">
<center><font color="#ffffff" face="Arial" size="+3">Neues Passwort eingeben</font></center>
<img src="./spacer.gif" border="0" alt="0" height="20" width="1">
<form action="writenewpwd.php" method="post">
	<table align="center">
		<tr>
			<td bgcolor="#ffffff">Password:</td>
			<td>&nbsp;</td>
			<td><input name="neuspwd" type="password" size="10" maxlength="10"></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><img src="./spacer.gif" border="0" alt="0" height="20" width="1"></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><input type="submit" value=" Ã„NDERN "></td>
		</tr>
	</table>
</form>
<?php
	}
?>
<?php include("../inc_footer.php"); ?>
