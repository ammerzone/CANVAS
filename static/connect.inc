<?php
$_db_host = "localhost";
$_db_datenbank = "game_2d";
$_db_username =  "root";
$_db_passwort = "";
$connection = mysql_connect($_db_host, $_db_username, $_db_passwort) or die ("Es konnte keine Verbindung hergestellt werden!");

if(!mysql_select_db ("$_db_datenbank", $connection)){
	$errormsg = "
		<fieldset style='margin:5%;background:#e5e5e5;border:1px solid #000000;'>
			<legend>
				<b>Fatal Error:</b>
			</legend>
			<p>Es ist ein Problem mit der Datenbankverbindung (fehlerhafte Verbindung) aufgetreten, bitte aktualisieren Sie Ihren Browser 
			oder wenden Sie sich an das Entwickler-Team.</p>
			<p>Wir bedanken uns f&uuml;r Ihr Verst&auml;ndnis.</p>
		</filedset>";
	die ($errormsg);
}
?>