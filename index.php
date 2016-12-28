<?php include("./inc_header.php"); ?>
<?php
	//Abfragen ob Seite freigeschalten ist
	$fn = "./frei.txt";
	$handle = fopen ($fn, "r");
	$content = fread ($handle, filesize ($fn));
	fclose ($handle);
	
	//echo $content;

	if ($content != "ON") {
		echo "<table bgcolor=\"#ffffff\" align=\"center\"><tr><td>Die Seite ist gesperrt!</td></tr></table>";
	}
	else {
?>
<table border="0" cellpadding="0" cellspacing="0" background="bg.jpg" width="1024" height="634" align="center">
	<tr>
		<td valign="top">
			<table border="0" align="center" cellpadding="0" cellspacing="0">
				<tr><td><img src="spacer.gif" border="0" alt="" width="1" height="10"></td></tr>
				<tr>
					<td>
						<table align="center" border="0">
							<tr>
								<td><img src="spacer.gif" border="0" alt="" width="50" height="1"></td>
								<td bgcolor="#ffffff"><font face="Arial" size="5">Wer wird… Login</font></td>
								<td><img src="spacer.gif" border="0" alt="" width="50" height="1"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr><td><img src="spacer.gif" border="0" alt="" width="1" height="50"></td></tr>
				<tr>
					<td>
						<form action="pwd.php" method="post">
							<table align="center">
								<tr>
									<td bgcolor="#ffffff"><font face="Arial" size="2">Passwort: </font></td>
									<td>&nbsp;</td>
									<td><input name="spwd" type="password" size="10" maxlength="10"></td>
								</tr>
								<tr>
									<td colspan="3" align="center"><img src="./spacer.gif" border="0" alt="0" height="20" width="1"></td>
								</tr>
								<tr>
									<td colspan="3" align="center"><input type="submit" value=" LOGIN "></td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php
	} //content != ON
?>
<?php include("./inc_footer.php"); ?>