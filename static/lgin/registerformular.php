<form action='index.php?a=register' method='POST'>
	<table>
		<h2><b>Registrieren</b></h2>
		<tr>
			<td><b>Username: </b></td>
			<td><input type='text' maxlength='32' name='username' value='<?=($_POST['username'])?($_POST['username']):("");?>'></td>
			<td><small>3-32 Zeichen (nur a-Z,0-9)</small></td>
		</tr>
		<tr>
			<td><b>Passwort: </b></td>
			<td><input type='password' maxlength='32' name='passwort1' value='<?=($_POST['passwort1'])?($_POST['passwort1']):("");?>'></td>
			<td><small>5-32 Zeichen (nur a-Z,0-9)</small></td>
		</tr>
		<tr>
			<td><b>Passwort bestätigen: </b></td>
			<td><input type='password' maxlength='32' name='passwort2' value='<?=($_POST['passwort2'])?($_POST['passwort2']):("");?>'></td>
		</tr>
		<tr>
			<td><b>E-Mail Adresse: </b></td>
			<td><input type='mail' maxlength='32' name='mail1' value='<?=($_POST['mail1'])?($_POST['mail1']):("");?>'></td>
			<td><small>(Max. 32 Zeichen)</small></td>
		</tr>
		<tr>
			<td><b>E-Mail bestätigen: </b></td>
			<td><input type='mail' maxlength='32' name='mail2' value='<?=($_POST['mail2'])?($_POST['mail2']):("");?>'></td>
		</tr>
		<tr>
			<td><b>Löschcode: </b></td>
			<td><input type='text' maxlength='7' name='loeschcode' value='<?=($_POST['loeschcode'])?($_POST['loeschcode']):("");?>'></td>
			<td><small>7 Zeichen (nur a-Z,0-9)</small></td>
		</tr>
		<tr>
			<td><b>Captcha: </b></td>
			<td>
				<img src="static/captcha/captcha.php" title="Captcha"/>&nbsp;
				<input type='text' maxlength='5' name='captcha' size='5'>
			</td>
		</tr>
	</table>
	<input type='submit' name='register' value='Registrieren!'><br><hr>
	<small><a href='index.php?a=login'>Zurück zum Login</a></small>
</form>