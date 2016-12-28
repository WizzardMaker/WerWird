<?php
	include("./getcookie-inf.php");
include("../inc_header.php");
include_once("./inc_func.php"); 

//	if ($AdminCookie != "master") {	
//		include("./admin.php");
//	}
//	else {

	$filepath = "../files/";

	$lastname_int = lastfilename_int($filepath, ".frage");

	if 	($lastname_int > "-1") {
		$nofiles = false;
	}
	else {
		$nofiles = TRUE;
	}

	if(!$nofiles){
?>
<table border="0" cellpadding="0" cellspacing="0" background="../bg.jpg" width="1024" height="634" align="center">
	<tr>
		<td valign="top">
			<table border="0" align="center" cellpadding="0" cellspacing="0">
				<tr><td><img src="spacer.gif" border="0" alt="" width="1" height="10"></td></tr>
				<tr>
					<td>
						<table align="center" border="0">
							<tr>
								<td><img src="spacer.gif" border="0" alt="" width="50" height="1"></td>
								<td bgcolor="#ffffff"><font face="Arial" size="5">Wer wird... Sicherheitsabfrage</font></td>
								<td><img src="spacer.gif" border="0" alt="" width="50" height="1"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr><td><img src="spacer.gif" border="0" alt="" width="1" height="50"></td></tr>
				<tr>
					<td>
						<table align="center" bgcolor="#ffffff">
							<tr>
								<td>Sicher ALLE Fragen-Dateien löschen?</td>
							</tr>
							<tr>
								<td>
									 <?php echo "<a href=\"./delquests_sure.php\"><font face=\"Arial\" size=\"2\">JA</font></a>"; ?>
								</td>
								<td>
									 <?php echo "<a href=\"./login.php\"><font face=\"Arial\" size=\"2\">NEIN</font></a>"; ?>
								</td>
							</tr>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php
	}else{
?>
		<table border="0" cellpadding="0" cellspacing="0" background="../bg.jpg" width="1024" height="634" align="center">
	<tr>
		<td valign="top">
		
			<table border="0" align="center" cellpadding="0" cellspacing="0">
				<tr><td><img src="../spacer.gif" border="0" alt="" width="1" height="10"></td></tr>
				<tr>
					<td>
						<table align="center" border="0">
							<tr>
								<td><img src="../spacer.gif" border="0" alt="" width="50" height="1"></td>
								<td bgcolor="#ffffff"><font face="Arial" size="5">Wer wird... &Auml;ndern der Fragen</font></td>
								<td><img src="../spacer.gif" border="0" alt="" width="50" height="1"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr><td><img src="../spacer.gif" border="0" alt="" width="1" height="10"></td></tr>
				<tr>
					<td>
						<table border="1" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td bgcolor="#ff0000">Keine Fragen-Dateien vorhanden</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php
	}
?>
<table align="center"><tr><td><a href="./login.php">Zurück zum Adminbereich</a></td></tr></table>
<?php
	include("./logout.php");
	include("../inc_footer.php"); 
?>