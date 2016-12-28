<?php

	if (isset($AdminCookie) && $AdminCookie == "master") {
?>
	<table align="center">
		<tr>
			<td bgcolor="#ffffff">
				<?php
					echo "<a href=\"./delcookie.php\">Abmelden</a>";
				?>
			</td>
		</tr>
	</table>
<?php
	}
?>
